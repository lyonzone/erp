<?php 
/**
 * Inv Page Controller
 * @category  Controller
 */
class InvController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "inv";
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
			"truck", 
			"transporter", 
			"supplier", 
			"mat", 
			"bill_dt", 
			"bill", 
			"qty", 
			"grnd", 
			"sapgr_date", 
			"invapp_qty", 
			"po_date", 
			"po_no", 
			"verification", 
			"remarks", 
			"verified_by", 
			"verifi_date", 
			"material_type", 
			"commercial_approval");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				inv.id LIKE ? OR 
				inv.date LIKE ? OR 
				inv.truck LIKE ? OR 
				inv.transporter LIKE ? OR 
				inv.supplier LIKE ? OR 
				inv.mat LIKE ? OR 
				inv.bill_dt LIKE ? OR 
				inv.bill LIKE ? OR 
				inv.qty LIKE ? OR 
				inv.grnd LIKE ? OR 
				inv.sapgr_date LIKE ? OR 
				inv.invapp_qty LIKE ? OR 
				inv.po_date LIKE ? OR 
				inv.po_no LIKE ? OR 
				inv.verification LIKE ? OR 
				inv.remarks LIKE ? OR 
				inv.verified_by LIKE ? OR 
				inv.verifi_date LIKE ? OR 
				inv.material_type LIKE ? OR 
				inv.lab_approval LIKE ? OR 
				inv.commercial_approval LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "inv/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("inv.id", ORDER_TYPE);
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
$record['sapgr_date'] = format_date($record['sapgr_date'],'d-m-Y');
$record['po_date'] = format_date($record['po_date'],'d-m-Y');
$record['verifi_date'] = format_date($record['verifi_date'],'d-m-Y');
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
		$page_title = $this->view->page_title = "Inv";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("inv/list.php", $data); //render the full page
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
			"truck", 
			"transporter", 
			"supplier", 
			"mat", 
			"bill_dt", 
			"bill", 
			"qty", 
			"grnd", 
			"sapgr_date", 
			"invapp_qty", 
			"po_date", 
			"po_no", 
			"verification", 
			"remarks", 
			"verified_by", 
			"verifi_date", 
			"material_type");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("inv.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$record['date'] = format_date($record['date'],'d-m-Y');
$record['sapgr_date'] = format_date($record['sapgr_date'],'d-m-Y');
$record['po_date'] = format_date($record['po_date'],'d-m-Y');
$record['verifi_date'] = format_date($record['verifi_date'],'d-m-Y');
			$page_title = $this->view->page_title = "View  Inv";
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
		return $this->render_view("inv/view.php", $record);
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
			$fields = $this->fields = array("date","truck","transporter","supplier","mat","material_type","bill_dt","bill","qty","grnd","sapgr_date","invapp_qty","po_date","po_no","verification","remarks","verified_by","verifi_date");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'truck' => 'required',
				'transporter' => 'required',
				'supplier' => 'required',
				'mat' => 'required',
				'material_type' => 'required',
				'bill_dt' => 'required',
				'bill' => 'required',
				'qty' => 'required',
				'grnd' => 'required',
				'sapgr_date' => 'required',
				'invapp_qty' => 'required',
				'po_date' => 'required',
				'po_no' => 'required',
				'verification' => 'required',
				'remarks' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'truck' => 'sanitize_string',
				'transporter' => 'sanitize_string',
				'supplier' => 'sanitize_string',
				'mat' => 'sanitize_string',
				'material_type' => 'sanitize_string',
				'bill_dt' => 'sanitize_string',
				'bill' => 'sanitize_string',
				'qty' => 'sanitize_string',
				'grnd' => 'sanitize_string',
				'sapgr_date' => 'sanitize_string',
				'invapp_qty' => 'sanitize_string',
				'po_date' => 'sanitize_string',
				'po_no' => 'sanitize_string',
				'verification' => 'sanitize_string',
				'remarks' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['verified_by'] = USER_NAME;
$modeldata['verifi_date'] = date_now();
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("inv");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Inv";
		$this->render_view("inv/add.php");
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
		$fields = $this->fields = array("id","date","truck","transporter","supplier","mat","material_type","bill_dt","bill","qty","grnd","sapgr_date","invapp_qty","po_date","po_no","verification","remarks","verified_by","verifi_date","commercial_approval");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'truck' => 'required',
				'transporter' => 'required',
				'supplier' => 'required',
				'mat' => 'required',
				'material_type' => 'required',
				'bill_dt' => 'required',
				'bill' => 'required',
				'qty' => 'required',
				'grnd' => 'required',
				'sapgr_date' => 'required',
				'invapp_qty' => 'required',
				'po_date' => 'required',
				'po_no' => 'required',
				'verification' => 'required',
				'remarks' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'truck' => 'sanitize_string',
				'transporter' => 'sanitize_string',
				'supplier' => 'sanitize_string',
				'mat' => 'sanitize_string',
				'material_type' => 'sanitize_string',
				'bill_dt' => 'sanitize_string',
				'bill' => 'sanitize_string',
				'qty' => 'sanitize_string',
				'grnd' => 'sanitize_string',
				'sapgr_date' => 'sanitize_string',
				'invapp_qty' => 'sanitize_string',
				'po_date' => 'sanitize_string',
				'po_no' => 'sanitize_string',
				'verification' => 'sanitize_string',
				'remarks' => 'sanitize_string',
				'commercial_approval' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['verified_by'] = USER_NAME;
$modeldata['verifi_date'] = date_now();
			if($this->validated()){
				$db->where("inv.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("inv");
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
						return	$this->redirect("inv");
					}
				}
			}
		}
		$db->where("inv.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Inv";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("inv/edit.php", $data);
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
		$fields = $this->fields = array("id","date","truck","transporter","supplier","mat","material_type","bill_dt","bill","qty","grnd","sapgr_date","invapp_qty","po_date","po_no","verification","remarks","verified_by","verifi_date","commercial_approval");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'date' => 'required',
				'truck' => 'required',
				'transporter' => 'required',
				'supplier' => 'required',
				'mat' => 'required',
				'material_type' => 'required',
				'bill_dt' => 'required',
				'bill' => 'required',
				'qty' => 'required',
				'grnd' => 'required',
				'sapgr_date' => 'required',
				'invapp_qty' => 'required',
				'po_date' => 'required',
				'po_no' => 'required',
				'verification' => 'required',
				'remarks' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'truck' => 'sanitize_string',
				'transporter' => 'sanitize_string',
				'supplier' => 'sanitize_string',
				'mat' => 'sanitize_string',
				'material_type' => 'sanitize_string',
				'bill_dt' => 'sanitize_string',
				'bill' => 'sanitize_string',
				'qty' => 'sanitize_string',
				'grnd' => 'sanitize_string',
				'sapgr_date' => 'sanitize_string',
				'invapp_qty' => 'sanitize_string',
				'po_date' => 'sanitize_string',
				'po_no' => 'sanitize_string',
				'verification' => 'sanitize_string',
				'remarks' => 'sanitize_string',
				'commercial_approval' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("inv.id", $rec_id);;
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
		$db->where("inv.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("inv");
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function lab($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"date", 
			"truck", 
			"transporter", 
			"supplier", 
			"mat", 
			"bill_dt", 
			"bill", 
			"qty", 
			"grnd", 
			"sapgr_date", 
			"invapp_qty", 
			"po_date", 
			"po_no", 
			"verification", 
			"remarks", 
			"verified_by", 
			"verifi_date", 
			"material_type", 
			"lab_approval");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				inv.id LIKE ? OR 
				inv.date LIKE ? OR 
				inv.truck LIKE ? OR 
				inv.transporter LIKE ? OR 
				inv.supplier LIKE ? OR 
				inv.mat LIKE ? OR 
				inv.bill_dt LIKE ? OR 
				inv.bill LIKE ? OR 
				inv.qty LIKE ? OR 
				inv.grnd LIKE ? OR 
				inv.sapgr_date LIKE ? OR 
				inv.invapp_qty LIKE ? OR 
				inv.po_date LIKE ? OR 
				inv.po_no LIKE ? OR 
				inv.verification LIKE ? OR 
				inv.remarks LIKE ? OR 
				inv.verified_by LIKE ? OR 
				inv.verifi_date LIKE ? OR 
				inv.material_type LIKE ? OR 
				inv.lab_approval LIKE ? OR 
				inv.commercial_approval LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "inv/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("inv.id", ORDER_TYPE);
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
$record['sapgr_date'] = format_date($record['sapgr_date'],'d-m-Y');
$record['po_date'] = format_date($record['po_date'],'d-m-Y');
$record['verifi_date'] = format_date($record['verifi_date'],'d-m-Y');
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
		$page_title = $this->view->page_title = "Inv";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("inv/lab.php", $data); //render the full page
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function approval($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"date", 
			"truck", 
			"transporter", 
			"supplier", 
			"mat", 
			"bill_dt", 
			"bill", 
			"qty", 
			"grnd", 
			"sapgr_date", 
			"invapp_qty", 
			"po_date", 
			"po_no", 
			"verification", 
			"remarks", 
			"verified_by", 
			"verifi_date", 
			"material_type", 
			"lab_approval", 
			"commercial_approval");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				inv.id LIKE ? OR 
				inv.date LIKE ? OR 
				inv.truck LIKE ? OR 
				inv.transporter LIKE ? OR 
				inv.supplier LIKE ? OR 
				inv.mat LIKE ? OR 
				inv.bill_dt LIKE ? OR 
				inv.bill LIKE ? OR 
				inv.qty LIKE ? OR 
				inv.grnd LIKE ? OR 
				inv.sapgr_date LIKE ? OR 
				inv.invapp_qty LIKE ? OR 
				inv.po_date LIKE ? OR 
				inv.po_no LIKE ? OR 
				inv.verification LIKE ? OR 
				inv.remarks LIKE ? OR 
				inv.verified_by LIKE ? OR 
				inv.verifi_date LIKE ? OR 
				inv.material_type LIKE ? OR 
				inv.lab_approval LIKE ? OR 
				inv.commercial_approval LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "inv/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("inv.id", ORDER_TYPE);
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
$record['sapgr_date'] = format_date($record['sapgr_date'],'d-m-Y');
$record['po_date'] = format_date($record['po_date'],'d-m-Y');
$record['verifi_date'] = format_date($record['verifi_date'],'d-m-Y');
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
		$page_title = $this->view->page_title = "Inv";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("inv/approval.php", $data); //render the full page
	}
}
