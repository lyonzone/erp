<?php 
/**
 * Crqs Page Controller
 * @category  Controller
 */
class CrqsController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "crqs";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"date", 
			"shift", 
			"brand", 
			"sku", 
			"factory", 
			"mcno", 
			"pack_tech", 
			"category", 
			"seal_width", 
			"horizontal", 
			"vertical", 
			"gap", 
			"mrp", 
			"si_name");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				crqs.id LIKE ? OR 
				crqs.date LIKE ? OR 
				crqs.shift LIKE ? OR 
				crqs.brand LIKE ? OR 
				crqs.sku LIKE ? OR 
				crqs.factory LIKE ? OR 
				crqs.mcno LIKE ? OR 
				crqs.pack_tech LIKE ? OR 
				crqs.category LIKE ? OR 
				crqs.seal_width LIKE ? OR 
				crqs.horizontal LIKE ? OR 
				crqs.vertical LIKE ? OR 
				crqs.gap LIKE ? OR 
				crqs.mrp LIKE ? OR 
				crqs.si_name LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "crqs/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("crqs.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		if(	!empty($records)){
			foreach($records as &$record){
				$record['date'] = format_date($record['date'],'d-m-Y');
			}
		}
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "CRQS";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("crqs/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"date", 
			"shift", 
			"brand", 
			"sku", 
			"mrp", 
			"mcno", 
			"factory", 
			"pack_tech", 
			"category", 
			"seal_width", 
			"horizontal", 
			"vertical", 
			"gap", 
			"si_name");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("crqs.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$record['date'] = format_date($record['date'],'d-m-Y');
			$page_title = $this->view->page_title = "View  Crqs";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("crqs/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("date","shift","mcno","sku","mrp","factory","pack_tech","category","brand","seal_width","horizontal","vertical","gap","si_name");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'mcno' => 'required',
				'sku' => 'required',
				'mrp' => 'required',
				'brand' => 'required',
				'seal_width' => 'required',
				'horizontal' => 'required',
				'vertical' => 'required',
				'gap' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'mcno' => 'sanitize_string',
				'sku' => 'sanitize_string',
				'mrp' => 'sanitize_string',
				'factory' => 'sanitize_string',
				'pack_tech' => 'sanitize_string',
				'category' => 'sanitize_string',
				'brand' => 'sanitize_string',
				'seal_width' => 'sanitize_string',
				'horizontal' => 'sanitize_string',
				'vertical' => 'sanitize_string',
				'gap' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['si_name'] = USER_NAME;
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("crqs");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Crqs";
		$this->render_view("crqs/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","date","shift","mcno","sku","mrp","factory","pack_tech","category","brand","seal_width","horizontal","vertical","gap","si_name");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'mcno' => 'required',
				'sku' => 'required',
				'mrp' => 'required',
				'brand' => 'required',
				'seal_width' => 'required',
				'horizontal' => 'required',
				'vertical' => 'required',
				'gap' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'mcno' => 'sanitize_string',
				'sku' => 'sanitize_string',
				'mrp' => 'sanitize_string',
				'factory' => 'sanitize_string',
				'pack_tech' => 'sanitize_string',
				'category' => 'sanitize_string',
				'brand' => 'sanitize_string',
				'seal_width' => 'sanitize_string',
				'horizontal' => 'sanitize_string',
				'vertical' => 'sanitize_string',
				'gap' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['si_name'] = USER_NAME;
			if($this->validated()){
				$db->where("crqs.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("crqs");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("crqs");
					}
				}
			}
		}
		$db->where("crqs.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Crqs";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("crqs/edit.php", $data);
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("crqs.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("crqs");
	}
}
