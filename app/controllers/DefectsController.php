<?php 
/**
 * Defects Page Controller
 * @category  Controller
 */
class DefectsController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "defects";
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
			"sku", 
			"varient", 
			"hour", 
			"defect_case", 
			"property", 
			"quality", 
			"defect_type", 
			"defect_quantity", 
			"samples_chk", 
			"defects", 
			"percent", 
			"qc_status", 
			"se_condition", 
			"remarks", 
			"remarks2", 
			"online_qc", 
			"shift_inch");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				defects.id LIKE ? OR 
				defects.date LIKE ? OR 
				defects.shift LIKE ? OR 
				defects.sku LIKE ? OR 
				defects.varient LIKE ? OR 
				defects.hour LIKE ? OR 
				defects.defect_case LIKE ? OR 
				defects.property LIKE ? OR 
				defects.quality LIKE ? OR 
				defects.defect_type LIKE ? OR 
				defects.defect_quantity LIKE ? OR 
				defects.samples_chk LIKE ? OR 
				defects.defects LIKE ? OR 
				defects.percent LIKE ? OR 
				defects.qc_status LIKE ? OR 
				defects.se_condition LIKE ? OR 
				defects.remarks LIKE ? OR 
				defects.remarks2 LIKE ? OR 
				defects.online_qc LIKE ? OR 
				defects.shift_inch LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "defects/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("defects.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Defects";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("defects/list.php", $data); //render the full page
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
			"sku", 
			"varient", 
			"quality", 
			"hour", 
			"defect_case", 
			"property", 
			"defect_type", 
			"defect_quantity", 
			"samples_chk", 
			"percent", 
			"defects", 
			"se_condition", 
			"remarks", 
			"remarks2", 
			"qc_status", 
			"online_qc", 
			"shift_inch");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("defects.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Defects";
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
		return $this->render_view("defects/view.php", $record);
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
			$fields = $this->fields = array("date","sku","shift","varient","hour","defect_case","property","quality","defect_type","defect_quantity","samples_chk","defects","percent","se_condition","remarks","remarks2","qc_status","online_qc");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'sku' => 'required',
				'shift' => 'required',
				'varient' => 'required',
				'hour' => 'required',
				'defect_case' => 'required',
				'property' => 'required',
				'quality' => 'required',
				'defect_type' => 'required',
				'defect_quantity' => 'required',
				'samples_chk' => 'required|numeric',
				'defects' => 'required|numeric',
				'percent' => 'required',
				'remarks' => 'required',
				'remarks2' => 'required',
				'qc_status' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'sku' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'varient' => 'sanitize_string',
				'hour' => 'sanitize_string',
				'defect_case' => 'sanitize_string',
				'property' => 'sanitize_string',
				'quality' => 'sanitize_string',
				'defect_type' => 'sanitize_string',
				'defect_quantity' => 'sanitize_string',
				'samples_chk' => 'sanitize_string',
				'defects' => 'sanitize_string',
				'percent' => 'sanitize_string',
				'se_condition' => 'sanitize_string',
				'remarks' => 'sanitize_string',
				'remarks2' => 'sanitize_string',
				'qc_status' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['online_qc'] = USER_NAME;
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("defects");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Defects";
		$this->render_view("defects/add.php");
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
		$fields = $this->fields = array("id","date","sku","shift","varient","hour","defect_case","property","quality","defect_type","defect_quantity","samples_chk","defects","percent","se_condition","remarks","remarks2","qc_status","online_qc");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'sku' => 'required',
				'shift' => 'required',
				'varient' => 'required',
				'hour' => 'required',
				'defect_case' => 'required',
				'property' => 'required',
				'quality' => 'required',
				'defect_type' => 'required',
				'defect_quantity' => 'required',
				'samples_chk' => 'required|numeric',
				'defects' => 'required|numeric',
				'percent' => 'required',
				'remarks' => 'required',
				'remarks2' => 'required',
				'qc_status' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'sku' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'varient' => 'sanitize_string',
				'hour' => 'sanitize_string',
				'defect_case' => 'sanitize_string',
				'property' => 'sanitize_string',
				'quality' => 'sanitize_string',
				'defect_type' => 'sanitize_string',
				'defect_quantity' => 'sanitize_string',
				'samples_chk' => 'sanitize_string',
				'defects' => 'sanitize_string',
				'percent' => 'sanitize_string',
				'se_condition' => 'sanitize_string',
				'remarks' => 'sanitize_string',
				'remarks2' => 'sanitize_string',
				'qc_status' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['online_qc'] = USER_NAME;
			if($this->validated()){
				$db->where("defects.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("defects");
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
						return	$this->redirect("defects");
					}
				}
			}
		}
		$db->where("defects.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Defects";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("defects/edit.php", $data);
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
		$db->where("defects.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("defects");
	}
}
