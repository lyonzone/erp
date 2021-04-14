<?php 
/**
 * Lorry Page Controller
 * @category  Controller
 */
class LorryController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "lorry";
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
			"transporter", 
			"vehicle", 
			"check19", 
			"submitted_by");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				lorry.id LIKE ? OR 
				lorry.date LIKE ? OR 
				lorry.transporter LIKE ? OR 
				lorry.vehicle LIKE ? OR 
				lorry.inv LIKE ? OR 
				lorry.people LIKE ? OR 
				lorry.vtype LIKE ? OR 
				lorry.wtype LIKE ? OR 
				lorry.site LIKE ? OR 
				lorry.check1 LIKE ? OR 
				lorry.ckeck2 LIKE ? OR 
				lorry.ckeck3 LIKE ? OR 
				lorry.check4 LIKE ? OR 
				lorry.check5 LIKE ? OR 
				lorry.check6 LIKE ? OR 
				lorry.check7 LIKE ? OR 
				lorry.check8 LIKE ? OR 
				lorry.check9 LIKE ? OR 
				lorry.check10 LIKE ? OR 
				lorry.check11 LIKE ? OR 
				lorry.check12 LIKE ? OR 
				lorry.check13 LIKE ? OR 
				lorry.check14 LIKE ? OR 
				lorry.check15 LIKE ? OR 
				lorry.check16 LIKE ? OR 
				lorry.check17 LIKE ? OR 
				lorry.check18 LIKE ? OR 
				lorry.driver LIKE ? OR 
				lorry.check19 LIKE ? OR 
				lorry.check15_1 LIKE ? OR 
				lorry.remarks LIKE ? OR 
				lorry.check11_1 LIKE ? OR 
				lorry.submitted_by LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "lorry/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("lorry.id", ORDER_TYPE);
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
				$record['date'] = format_date($record['date'],'Y-m-d H:i:s');
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
		$page_title = $this->view->page_title = "Lorry";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("lorry/list.php", $data); //render the full page
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
		$fields = array("transporter", 
			"date", 
			"vehicle", 
			"vtype", 
			"wtype", 
			"site", 
			"check1", 
			"ckeck2", 
			"ckeck3", 
			"check4", 
			"check5", 
			"check6", 
			"check7", 
			"check8", 
			"check9", 
			"check10", 
			"check11", 
			"check11_1", 
			"check12", 
			"check13", 
			"check14", 
			"check15_1", 
			"check15", 
			"check16", 
			"check17", 
			"check18", 
			"driver", 
			"check19", 
			"remarks", 
			"id", 
			"submitted_by");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("lorry.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$record['date'] = format_date($record['date'],'Y-m-d H:i:s');
			$page_title = $this->view->page_title = "View  Lorry";
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
		return $this->render_view("lorry/view.php", $record);
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
			$fields = $this->fields = array("transporter","date","vehicle","vtype","wtype","site","check1","ckeck2","ckeck3","check4","check5","check6","check7","check8","check9","check10","check11","check11_1","check12","check13","check14","check15_1","check15","check16","check17","check18","driver","check19","remarks","submitted_by");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'transporter' => 'required',
				'date' => 'required',
				'vehicle' => 'required',
				'vtype' => 'required',
				'wtype' => 'required',
				'site' => 'required',
				'check1' => 'required',
				'ckeck2' => 'required',
				'ckeck3' => 'required',
				'check4' => 'required',
				'check5' => 'required',
				'check6' => 'required',
				'check7' => 'required',
				'check8' => 'required',
				'check9' => 'required',
				'check10' => 'required',
				'check12' => 'required',
				'check13' => 'required',
				'check14' => 'required',
				'check15' => 'required',
				'check16' => 'required',
				'check17' => 'required',
				'check18' => 'required',
				'check19' => 'numeric',
			);
			$this->sanitize_array = array(
				'transporter' => 'sanitize_string',
				'date' => 'sanitize_string',
				'vehicle' => 'sanitize_string',
				'vtype' => 'sanitize_string',
				'wtype' => 'sanitize_string',
				'site' => 'sanitize_string',
				'check1' => 'sanitize_string',
				'ckeck2' => 'sanitize_string',
				'ckeck3' => 'sanitize_string',
				'check4' => 'sanitize_string',
				'check5' => 'sanitize_string',
				'check6' => 'sanitize_string',
				'check7' => 'sanitize_string',
				'check8' => 'sanitize_string',
				'check9' => 'sanitize_string',
				'check10' => 'sanitize_string',
				'check11' => 'sanitize_string',
				'check11_1' => 'sanitize_string',
				'check12' => 'sanitize_string',
				'check13' => 'sanitize_string',
				'check14' => 'sanitize_string',
				'check15_1' => 'sanitize_string',
				'check15' => 'sanitize_string',
				'check16' => 'sanitize_string',
				'check17' => 'sanitize_string',
				'check18' => 'sanitize_string',
				'driver' => 'sanitize_string',
				'check19' => 'sanitize_string',
				'remarks' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['submitted_by'] = USER_NAME;
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("lorry");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Lorry";
		$this->render_view("lorry/add.php");
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
		$fields = $this->fields = array("transporter","date","vehicle","vtype","wtype","site","check1","ckeck2","ckeck3","check4","check5","check6","check7","check8","check9","check10","check11","check11_1","check12","check13","check14","check15_1","check15","check16","check17","check18","driver","check19","remarks","submitted_by");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'transporter' => 'required',
				'date' => 'required',
				'vehicle' => 'required',
				'vtype' => 'required',
				'wtype' => 'required',
				'site' => 'required',
				'check1' => 'required',
				'ckeck2' => 'required',
				'ckeck3' => 'required',
				'check4' => 'required',
				'check5' => 'required',
				'check6' => 'required',
				'check7' => 'required',
				'check8' => 'required',
				'check9' => 'required',
				'check10' => 'required',
				'check12' => 'required',
				'check13' => 'required',
				'check14' => 'required',
				'check15' => 'required',
				'check16' => 'required',
				'check17' => 'required',
				'check18' => 'required',
				'check19' => 'numeric',
			);
			$this->sanitize_array = array(
				'transporter' => 'sanitize_string',
				'date' => 'sanitize_string',
				'vehicle' => 'sanitize_string',
				'vtype' => 'sanitize_string',
				'wtype' => 'sanitize_string',
				'site' => 'sanitize_string',
				'check1' => 'sanitize_string',
				'ckeck2' => 'sanitize_string',
				'ckeck3' => 'sanitize_string',
				'check4' => 'sanitize_string',
				'check5' => 'sanitize_string',
				'check6' => 'sanitize_string',
				'check7' => 'sanitize_string',
				'check8' => 'sanitize_string',
				'check9' => 'sanitize_string',
				'check10' => 'sanitize_string',
				'check11' => 'sanitize_string',
				'check11_1' => 'sanitize_string',
				'check12' => 'sanitize_string',
				'check13' => 'sanitize_string',
				'check14' => 'sanitize_string',
				'check15_1' => 'sanitize_string',
				'check15' => 'sanitize_string',
				'check16' => 'sanitize_string',
				'check17' => 'sanitize_string',
				'check18' => 'sanitize_string',
				'driver' => 'sanitize_string',
				'check19' => 'sanitize_string',
				'remarks' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['submitted_by'] = USER_NAME;
			if($this->validated()){
				$db->where("lorry.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("lorry");
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
						return	$this->redirect("lorry");
					}
				}
			}
		}
		$db->where("lorry.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Lorry";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("lorry/edit.php", $data);
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
		$db->where("lorry.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("lorry");
	}
}
