<?php 
/**
 * Checksheet Page Controller
 * @category  Controller
 */
class ChecksheetController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "checksheet";
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
		$fields = array("transporter", 
			"date", 
			"vehicle", 
			"inv", 
			"people", 
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
			"check12", 
			"check13", 
			"check14", 
			"check15", 
			"check16", 
			"check17", 
			"check18", 
			"check19", 
			"check15_1", 
			"remarks", 
			"driver", 
			"check11_1", 
			"id");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				checksheet.transporter LIKE ? OR 
				checksheet.date LIKE ? OR 
				checksheet.vehicle LIKE ? OR 
				checksheet.inv LIKE ? OR 
				checksheet.people LIKE ? OR 
				checksheet.vtype LIKE ? OR 
				checksheet.wtype LIKE ? OR 
				checksheet.site LIKE ? OR 
				checksheet.check1 LIKE ? OR 
				checksheet.ckeck2 LIKE ? OR 
				checksheet.ckeck3 LIKE ? OR 
				checksheet.check4 LIKE ? OR 
				checksheet.check5 LIKE ? OR 
				checksheet.check6 LIKE ? OR 
				checksheet.check7 LIKE ? OR 
				checksheet.check8 LIKE ? OR 
				checksheet.check9 LIKE ? OR 
				checksheet.check10 LIKE ? OR 
				checksheet.check11 LIKE ? OR 
				checksheet.check12 LIKE ? OR 
				checksheet.check13 LIKE ? OR 
				checksheet.check14 LIKE ? OR 
				checksheet.check15 LIKE ? OR 
				checksheet.check16 LIKE ? OR 
				checksheet.check17 LIKE ? OR 
				checksheet.check18 LIKE ? OR 
				checksheet.check19 LIKE ? OR 
				checksheet.check15_1 LIKE ? OR 
				checksheet.remarks LIKE ? OR 
				checksheet.driver LIKE ? OR 
				checksheet.check11_1 LIKE ? OR 
				checksheet.id LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "checksheet/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("checksheet.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Checksheet";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("checksheet/list.php", $data); //render the full page
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
			"inv", 
			"people", 
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
			"check12", 
			"check13", 
			"check14", 
			"check15", 
			"check16", 
			"check17", 
			"check18", 
			"check19", 
			"check15_1", 
			"remarks", 
			"driver", 
			"check11_1", 
			"id");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("checksheet.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Checksheet";
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
		return $this->render_view("checksheet/view.php", $record);
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
			$fields = $this->fields = array("transporter","date","vehicle","inv","people","vtype","wtype","site","check1","ckeck2","ckeck3","check4","check5","check6","check7","check8","check9","check10","check11","check12","check13","check14","check15","check16","check17","check18","check19","check15_1","remarks","driver","check11_1");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'transporter' => 'required',
				'date' => 'required',
				'vehicle' => 'required',
				'inv' => 'required',
				'people' => 'required|numeric',
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
				'check11' => 'required',
				'check12' => 'required',
				'check13' => 'required',
				'check14' => 'required',
				'check15' => 'required',
				'check16' => 'required',
				'check17' => 'required',
				'check18' => 'required',
				'check19' => 'required|numeric',
				'check15_1' => 'required',
				'remarks' => 'required',
				'driver' => 'required',
				'check11_1' => 'required',
			);
			$this->sanitize_array = array(
				'transporter' => 'sanitize_string',
				'date' => 'sanitize_string',
				'vehicle' => 'sanitize_string',
				'inv' => 'sanitize_string',
				'people' => 'sanitize_string',
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
				'check12' => 'sanitize_string',
				'check13' => 'sanitize_string',
				'check14' => 'sanitize_string',
				'check15' => 'sanitize_string',
				'check16' => 'sanitize_string',
				'check17' => 'sanitize_string',
				'check18' => 'sanitize_string',
				'check19' => 'sanitize_string',
				'check15_1' => 'sanitize_string',
				'remarks' => 'sanitize_string',
				'driver' => 'sanitize_string',
				'check11_1' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("checksheet");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Checksheet";
		$this->render_view("checksheet/add.php");
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
		$fields = $this->fields = array("transporter","date","vehicle","inv","people","vtype","wtype","site","check1","ckeck2","ckeck3","check4","check5","check6","check7","check8","check9","check10","check11","check12","check13","check14","check15","check16","check17","check18","check19","check15_1","remarks","driver","check11_1","id");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'transporter' => 'required',
				'date' => 'required',
				'vehicle' => 'required',
				'inv' => 'required',
				'people' => 'required|numeric',
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
				'check11' => 'required',
				'check12' => 'required',
				'check13' => 'required',
				'check14' => 'required',
				'check15' => 'required',
				'check16' => 'required',
				'check17' => 'required',
				'check18' => 'required',
				'check19' => 'required|numeric',
				'check15_1' => 'required',
				'remarks' => 'required',
				'driver' => 'required',
				'check11_1' => 'required',
			);
			$this->sanitize_array = array(
				'transporter' => 'sanitize_string',
				'date' => 'sanitize_string',
				'vehicle' => 'sanitize_string',
				'inv' => 'sanitize_string',
				'people' => 'sanitize_string',
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
				'check12' => 'sanitize_string',
				'check13' => 'sanitize_string',
				'check14' => 'sanitize_string',
				'check15' => 'sanitize_string',
				'check16' => 'sanitize_string',
				'check17' => 'sanitize_string',
				'check18' => 'sanitize_string',
				'check19' => 'sanitize_string',
				'check15_1' => 'sanitize_string',
				'remarks' => 'sanitize_string',
				'driver' => 'sanitize_string',
				'check11_1' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("checksheet.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("checksheet");
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
						return	$this->redirect("checksheet");
					}
				}
			}
		}
		$db->where("checksheet.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Checksheet";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("checksheet/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("transporter","date","vehicle","inv","people","vtype","wtype","site","check1","ckeck2","ckeck3","check4","check5","check6","check7","check8","check9","check10","check11","check12","check13","check14","check15","check16","check17","check18","check19","check15_1","remarks","driver","check11_1","id");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'transporter' => 'required',
				'date' => 'required',
				'vehicle' => 'required',
				'inv' => 'required',
				'people' => 'required|numeric',
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
				'check11' => 'required',
				'check12' => 'required',
				'check13' => 'required',
				'check14' => 'required',
				'check15' => 'required',
				'check16' => 'required',
				'check17' => 'required',
				'check18' => 'required',
				'check19' => 'required|numeric',
				'check15_1' => 'required',
				'remarks' => 'required',
				'driver' => 'required',
				'check11_1' => 'required',
			);
			$this->sanitize_array = array(
				'transporter' => 'sanitize_string',
				'date' => 'sanitize_string',
				'vehicle' => 'sanitize_string',
				'inv' => 'sanitize_string',
				'people' => 'sanitize_string',
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
				'check12' => 'sanitize_string',
				'check13' => 'sanitize_string',
				'check14' => 'sanitize_string',
				'check15' => 'sanitize_string',
				'check16' => 'sanitize_string',
				'check17' => 'sanitize_string',
				'check18' => 'sanitize_string',
				'check19' => 'sanitize_string',
				'check15_1' => 'sanitize_string',
				'remarks' => 'sanitize_string',
				'driver' => 'sanitize_string',
				'check11_1' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("checksheet.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
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
		$db->where("checksheet.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("checksheet");
	}
}
