<?php 
/**
 * Soptchk_remarks Page Controller
 * @category  Controller
 */
class Soptchk_remarksController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "soptchk_remarks";
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
			"product", 
			"dosing_time", 
			"ad_batch", 
			"mc_batch", 
			"perfume", 
			"colour", 
			"dfr", 
			"rm_seive", 
			"fp_seive", 
			"magnet_condn", 
			"spray_qlty", 
			"powder_temp", 
			"submitted_by");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				soptchk_remarks.id LIKE ? OR 
				soptchk_remarks.date LIKE ? OR 
				soptchk_remarks.shift LIKE ? OR 
				soptchk_remarks.product LIKE ? OR 
				soptchk_remarks.dosing_time LIKE ? OR 
				soptchk_remarks.ad_batch LIKE ? OR 
				soptchk_remarks.mc_batch LIKE ? OR 
				soptchk_remarks.perfume LIKE ? OR 
				soptchk_remarks.colour LIKE ? OR 
				soptchk_remarks.dfr LIKE ? OR 
				soptchk_remarks.rm_seive LIKE ? OR 
				soptchk_remarks.fp_seive LIKE ? OR 
				soptchk_remarks.magnet_condn LIKE ? OR 
				soptchk_remarks.spray_qlty LIKE ? OR 
				soptchk_remarks.powder_temp LIKE ? OR 
				soptchk_remarks.submitted_by LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "soptchk_remarks/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("soptchk_remarks.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Soptchk Remarks";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("soptchk_remarks/list.php", $data); //render the full page
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
			"product", 
			"dosing_time", 
			"ad_batch", 
			"mc_batch", 
			"perfume", 
			"colour", 
			"dfr", 
			"rm_seive", 
			"fp_seive", 
			"magnet_condn", 
			"spray_qlty", 
			"powder_temp", 
			"submitted_by");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("soptchk_remarks.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Soptchk Remarks";
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
		return $this->render_view("soptchk_remarks/view.php", $record);
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
			$fields = $this->fields = array("date","shift","product","dosing_time","ad_batch","mc_batch","perfume","colour","dfr","rm_seive","fp_seive","magnet_condn","spray_qlty","powder_temp","submitted_by");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'product' => 'required',
				'dosing_time' => 'required',
				'ad_batch' => 'required',
				'mc_batch' => 'required',
				'perfume' => 'required',
				'colour' => 'required',
				'dfr' => 'required',
				'rm_seive' => 'required',
				'fp_seive' => 'required',
				'magnet_condn' => 'required',
				'spray_qlty' => 'required',
				'powder_temp' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'product' => 'sanitize_string',
				'dosing_time' => 'sanitize_string',
				'ad_batch' => 'sanitize_string',
				'mc_batch' => 'sanitize_string',
				'perfume' => 'sanitize_string',
				'colour' => 'sanitize_string',
				'dfr' => 'sanitize_string',
				'rm_seive' => 'sanitize_string',
				'fp_seive' => 'sanitize_string',
				'magnet_condn' => 'sanitize_string',
				'spray_qlty' => 'sanitize_string',
				'powder_temp' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("soptchk_remarks");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Soptchk Remarks";
		$this->render_view("soptchk_remarks/add.php");
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
		$fields = $this->fields = array("id","date","shift","product","dosing_time","ad_batch","mc_batch","perfume","colour","dfr","rm_seive","fp_seive","magnet_condn","spray_qlty","powder_temp","submitted_by");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'product' => 'required',
				'dosing_time' => 'required',
				'ad_batch' => 'required',
				'mc_batch' => 'required',
				'perfume' => 'required',
				'colour' => 'required',
				'dfr' => 'required',
				'rm_seive' => 'required',
				'fp_seive' => 'required',
				'magnet_condn' => 'required',
				'spray_qlty' => 'required',
				'powder_temp' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'product' => 'sanitize_string',
				'dosing_time' => 'sanitize_string',
				'ad_batch' => 'sanitize_string',
				'mc_batch' => 'sanitize_string',
				'perfume' => 'sanitize_string',
				'colour' => 'sanitize_string',
				'dfr' => 'sanitize_string',
				'rm_seive' => 'sanitize_string',
				'fp_seive' => 'sanitize_string',
				'magnet_condn' => 'sanitize_string',
				'spray_qlty' => 'sanitize_string',
				'powder_temp' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("soptchk_remarks.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("soptchk_remarks");
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
						return	$this->redirect("soptchk_remarks");
					}
				}
			}
		}
		$db->where("soptchk_remarks.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Soptchk Remarks";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("soptchk_remarks/edit.php", $data);
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
		$fields = $this->fields = array("id","date","shift","product","dosing_time","ad_batch","mc_batch","perfume","colour","dfr","rm_seive","fp_seive","magnet_condn","spray_qlty","powder_temp","submitted_by");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'date' => 'required',
				'shift' => 'required',
				'product' => 'required',
				'dosing_time' => 'required',
				'ad_batch' => 'required',
				'mc_batch' => 'required',
				'perfume' => 'required',
				'colour' => 'required',
				'dfr' => 'required',
				'rm_seive' => 'required',
				'fp_seive' => 'required',
				'magnet_condn' => 'required',
				'spray_qlty' => 'required',
				'powder_temp' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'product' => 'sanitize_string',
				'dosing_time' => 'sanitize_string',
				'ad_batch' => 'sanitize_string',
				'mc_batch' => 'sanitize_string',
				'perfume' => 'sanitize_string',
				'colour' => 'sanitize_string',
				'dfr' => 'sanitize_string',
				'rm_seive' => 'sanitize_string',
				'fp_seive' => 'sanitize_string',
				'magnet_condn' => 'sanitize_string',
				'spray_qlty' => 'sanitize_string',
				'powder_temp' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("soptchk_remarks.id", $rec_id);;
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
		$db->where("soptchk_remarks.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("soptchk_remarks");
	}
}
