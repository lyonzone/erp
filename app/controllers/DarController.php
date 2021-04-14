<?php 
/**
 * Dar Page Controller
 * @category  Controller
 */
class DarController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "dar";
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
			"sln", 
			"time", 
			"vct", 
			"uct", 
			"ph", 
			"dfr", 
			"bd", 
			"time1", 
			"sample", 
			"descr", 
			"result", 
			"rod1", 
			"rod2", 
			"alkalinity", 
			"zeolity", 
			"avdye", 
			"checked", 
			"sku", 
			"sku1", 
			"sku3", 
			"signature");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				dar.id LIKE ? OR 
				dar.date LIKE ? OR 
				dar.shift LIKE ? OR 
				dar.sln LIKE ? OR 
				dar.time LIKE ? OR 
				dar.vct LIKE ? OR 
				dar.uct LIKE ? OR 
				dar.ph LIKE ? OR 
				dar.dfr LIKE ? OR 
				dar.bd LIKE ? OR 
				dar.time1 LIKE ? OR 
				dar.sample LIKE ? OR 
				dar.descr LIKE ? OR 
				dar.result LIKE ? OR 
				dar.rod1 LIKE ? OR 
				dar.rod2 LIKE ? OR 
				dar.alkalinity LIKE ? OR 
				dar.zeolity LIKE ? OR 
				dar.avdye LIKE ? OR 
				dar.checked LIKE ? OR 
				dar.sku LIKE ? OR 
				dar.sku1 LIKE ? OR 
				dar.sku3 LIKE ? OR 
				dar.signature LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "dar/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("dar.id", ORDER_TYPE);
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
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Dar";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("dar/list.php", $data); //render the full page
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
			"sln", 
			"time", 
			"vct", 
			"uct", 
			"ph", 
			"dfr", 
			"bd", 
			"time1", 
			"sample", 
			"descr", 
			"result", 
			"rod1", 
			"rod2", 
			"alkalinity", 
			"zeolity", 
			"avdye", 
			"checked", 
			"sku", 
			"sku1", 
			"sku3", 
			"signature");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("dar.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Dar";
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
		return $this->render_view("dar/view.php", $record);
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
			$fields = $this->fields = array("date","shift","sln","time","vct","uct","ph","dfr","bd","time1","sample","descr","result","rod1","rod2","alkalinity","zeolity","avdye","checked","sku","sku1","sku3","signature");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'sln' => 'required|numeric',
				'time' => 'required',
				'vct' => 'required|numeric',
				'uct' => 'required',
				'ph' => 'required|numeric',
				'dfr' => 'required|numeric',
				'bd' => 'required|numeric',
				'time1' => 'required',
				'sample' => 'required',
				'descr' => 'required',
				'result' => 'required',
				'rod1' => 'required',
				'rod2' => 'required',
				'alkalinity' => 'required|numeric',
				'zeolity' => 'required|numeric',
				'avdye' => 'required|numeric',
				'checked' => 'required',
				'sku' => 'required',
				'sku1' => 'required',
				'sku3' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'sln' => 'sanitize_string',
				'time' => 'sanitize_string',
				'vct' => 'sanitize_string',
				'uct' => 'sanitize_string',
				'ph' => 'sanitize_string',
				'dfr' => 'sanitize_string',
				'bd' => 'sanitize_string',
				'time1' => 'sanitize_string',
				'sample' => 'sanitize_string',
				'descr' => 'sanitize_string',
				'result' => 'sanitize_string',
				'rod1' => 'sanitize_string',
				'rod2' => 'sanitize_string',
				'alkalinity' => 'sanitize_string',
				'zeolity' => 'sanitize_string',
				'avdye' => 'sanitize_string',
				'checked' => 'sanitize_string',
				'sku' => 'sanitize_string',
				'sku1' => 'sanitize_string',
				'sku3' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['signature'] = USER_NAME;
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("dar");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Dar";
		$this->render_view("dar/add.php");
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
		$fields = $this->fields = array("id","date","shift","sln","time","vct","uct","ph","dfr","bd","time1","sample","descr","result","rod1","rod2","alkalinity","zeolity","avdye","checked","sku","sku1","sku3","signature");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'sln' => 'required|numeric',
				'time' => 'required',
				'vct' => 'required|numeric',
				'uct' => 'required',
				'ph' => 'required|numeric',
				'dfr' => 'required|numeric',
				'bd' => 'required|numeric',
				'time1' => 'required',
				'sample' => 'required',
				'descr' => 'required',
				'result' => 'required',
				'rod1' => 'required',
				'rod2' => 'required',
				'alkalinity' => 'required|numeric',
				'zeolity' => 'required|numeric',
				'avdye' => 'required|numeric',
				'checked' => 'required',
				'sku' => 'required',
				'sku1' => 'required',
				'sku3' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'sln' => 'sanitize_string',
				'time' => 'sanitize_string',
				'vct' => 'sanitize_string',
				'uct' => 'sanitize_string',
				'ph' => 'sanitize_string',
				'dfr' => 'sanitize_string',
				'bd' => 'sanitize_string',
				'time1' => 'sanitize_string',
				'sample' => 'sanitize_string',
				'descr' => 'sanitize_string',
				'result' => 'sanitize_string',
				'rod1' => 'sanitize_string',
				'rod2' => 'sanitize_string',
				'alkalinity' => 'sanitize_string',
				'zeolity' => 'sanitize_string',
				'avdye' => 'sanitize_string',
				'checked' => 'sanitize_string',
				'sku' => 'sanitize_string',
				'sku1' => 'sanitize_string',
				'sku3' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['signature'] = USER_NAME;
			if($this->validated()){
				$db->where("dar.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("dar");
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
						return	$this->redirect("dar");
					}
				}
			}
		}
		$db->where("dar.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Dar";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("dar/edit.php", $data);
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
		$db->where("dar.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("dar");
	}
}
