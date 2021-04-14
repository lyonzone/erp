<?php 
/**
 * Truck Page Controller
 * @category  Controller
 */
class TruckController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "truck";
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
			"truck_entry", 
			"transporter", 
			"truck_no", 
			"driver_name", 
			"driver_mobile_no", 
			"dl_no", 
			"lr_no", 
			"no_of_wheel", 
			"material", 
			"truck_exit", 
			"submitted_by");
		$pagination = $this->get_pagination(10); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				truck.id LIKE ? OR 
				truck.truck_entry LIKE ? OR 
				truck.transporter LIKE ? OR 
				truck.truck_no LIKE ? OR 
				truck.driver_name LIKE ? OR 
				truck.driver_mobile_no LIKE ? OR 
				truck.dl_no LIKE ? OR 
				truck.lr_no LIKE ? OR 
				truck.no_of_wheel LIKE ? OR 
				truck.supplier LIKE ? OR 
				truck.material LIKE ? OR 
				truck.material_type LIKE ? OR 
				truck.bill_no LIKE ? OR 
				truck.bill_date LIKE ? OR 
				truck.quantity LIKE ? OR 
				truck.unit LIKE ? OR 
				truck.coa LIKE ? OR 
				truck.amount LIKE ? OR 
				truck.grn_date LIKE ? OR 
				truck.sap_gr_no LIKE ? OR 
				truck.inv_approval_qty LIKE ? OR 
				truck.basic_rate LIKE ? OR 
				truck.po_delivery_date LIKE ? OR 
				truck.po_no LIKE ? OR 
				truck.inventory_verification LIKE ? OR 
				truck.inventory_verified_by LIKE ? OR 
				truck.lab_verification LIKE ? OR 
				truck.lab_verification_by LIKE ? OR 
				truck.inventory_note LIKE ? OR 
				truck.lab_note LIKE ? OR 
				truck.commercial_approval LIKE ? OR 
				truck.commercial_note LIKE ? OR 
				truck.finance_approval LIKE ? OR 
				truck.finance_note LIKE ? OR 
				truck.inventory_verified_date LIKE ? OR 
				truck.lab_verified_date LIKE ? OR 
				truck.commercial_verified_date LIKE ? OR 
				truck.finance_verified_date LIKE ? OR 
				truck.truck_exit LIKE ? OR 
				truck.submitted_by LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "truck/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("truck.id", ORDER_TYPE);
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
				$record['truck_entry'] = format_date($record['truck_entry'],'d-m-Y H:i:s');
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
		$page_title = $this->view->page_title = "Unloading Vehicles";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("truck/list.php", $data); //render the full page
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
			"truck_entry", 
			"truck_no", 
			"driver_name", 
			"dl_no", 
			"lr_no", 
			"no_of_wheel", 
			"material", 
			"transporter", 
			"inventory_verification", 
			"submitted_by");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("truck.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$record['truck_entry'] = format_date($record['truck_entry'],'d-m-Y H:i:s');
			$page_title = $this->view->page_title = "View  Truck";
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
		return $this->render_view("truck/view.php", $record);
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
			$fields = $this->fields = array("truck_entry","transporter","truck_no","lr_no","no_of_wheel","driver_name","driver_mobile_no","dl_no","truck_exit","submitted_by");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'truck_entry' => 'required',
				'transporter' => 'required',
				'truck_no' => 'required',
				'lr_no' => 'required',
				'no_of_wheel' => 'required',
				'driver_name' => 'required',
				'driver_mobile_no' => 'required',
				'dl_no' => 'required',
			);
			$this->sanitize_array = array(
				'truck_entry' => 'sanitize_string',
				'transporter' => 'sanitize_string',
				'truck_no' => 'sanitize_string',
				'lr_no' => 'sanitize_string',
				'no_of_wheel' => 'sanitize_string',
				'driver_name' => 'sanitize_string',
				'driver_mobile_no' => 'sanitize_string',
				'dl_no' => 'sanitize_string',
				'truck_exit' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['submitted_by'] = USER_NAME;
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("truck");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Truck";
		$this->render_view("truck/add.php");
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
		$fields = $this->fields = array("id","truck_entry","transporter","truck_no","lr_no","no_of_wheel","driver_name","driver_mobile_no","dl_no","truck_exit","submitted_by");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'truck_entry' => 'required',
				'transporter' => 'required',
				'truck_no' => 'required',
				'lr_no' => 'required',
				'no_of_wheel' => 'required',
				'driver_name' => 'required',
				'driver_mobile_no' => 'required',
				'dl_no' => 'required',
			);
			$this->sanitize_array = array(
				'truck_entry' => 'sanitize_string',
				'transporter' => 'sanitize_string',
				'truck_no' => 'sanitize_string',
				'lr_no' => 'sanitize_string',
				'no_of_wheel' => 'sanitize_string',
				'driver_name' => 'sanitize_string',
				'driver_mobile_no' => 'sanitize_string',
				'dl_no' => 'sanitize_string',
				'truck_exit' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['submitted_by'] = USER_NAME;
			if($this->validated()){
				$db->where("truck.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("truck");
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
						return	$this->redirect("truck");
					}
				}
			}
		}
		$db->where("truck.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Truck";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("truck/edit.php", $data);
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
		$fields = $this->fields = array("id","truck_entry","transporter","truck_no","lr_no","no_of_wheel","driver_name","driver_mobile_no","dl_no","truck_exit","submitted_by");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'truck_entry' => 'required',
				'transporter' => 'required',
				'truck_no' => 'required',
				'lr_no' => 'required',
				'no_of_wheel' => 'required',
				'driver_name' => 'required',
				'driver_mobile_no' => 'required',
				'dl_no' => 'required',
			);
			$this->sanitize_array = array(
				'truck_entry' => 'sanitize_string',
				'transporter' => 'sanitize_string',
				'truck_no' => 'sanitize_string',
				'lr_no' => 'sanitize_string',
				'no_of_wheel' => 'sanitize_string',
				'driver_name' => 'sanitize_string',
				'driver_mobile_no' => 'sanitize_string',
				'dl_no' => 'sanitize_string',
				'truck_exit' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("truck.id", $rec_id);;
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
		$db->where("truck.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("truck");
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function loading_exit($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"truck_entry", 
			"truck_no", 
			"transporter", 
			"truck_exit", 
			"submitted_by");
		$pagination = $this->get_pagination(10); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				truck.id LIKE ? OR 
				truck.truck_entry LIKE ? OR 
				truck.truck_no LIKE ? OR 
				truck.driver_name LIKE ? OR 
				truck.driver_mobile_no LIKE ? OR 
				truck.transporter LIKE ? OR 
				truck.dl_no LIKE ? OR 
				truck.no_of_wheel LIKE ? OR 
				truck.supplier LIKE ? OR 
				truck.material LIKE ? OR 
				truck.material_type LIKE ? OR 
				truck.bill_no LIKE ? OR 
				truck.bill_date LIKE ? OR 
				truck.quantity LIKE ? OR 
				truck.unit LIKE ? OR 
				truck.lr_no LIKE ? OR 
				truck.coa LIKE ? OR 
				truck.amount LIKE ? OR 
				truck.grn_date LIKE ? OR 
				truck.sap_gr_no LIKE ? OR 
				truck.inv_approval_qty LIKE ? OR 
				truck.basic_rate LIKE ? OR 
				truck.po_delivery_date LIKE ? OR 
				truck.po_no LIKE ? OR 
				truck.inventory_verification LIKE ? OR 
				truck.inventory_verified_by LIKE ? OR 
				truck.lab_verification LIKE ? OR 
				truck.lab_verification_by LIKE ? OR 
				truck.inventory_note LIKE ? OR 
				truck.lab_note LIKE ? OR 
				truck.commercial_approval LIKE ? OR 
				truck.commercial_note LIKE ? OR 
				truck.finance_approval LIKE ? OR 
				truck.finance_note LIKE ? OR 
				truck.inventory_verified_date LIKE ? OR 
				truck.lab_verified_date LIKE ? OR 
				truck.commercial_verified_date LIKE ? OR 
				truck.finance_verified_date LIKE ? OR 
				truck.truck_exit LIKE ? OR 
				truck.submitted_by LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "truck/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("truck.id", ORDER_TYPE);
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
				$record['truck_entry'] = format_date($record['truck_entry'],'d-m-Y H:i:s');
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
		$page_title = $this->view->page_title = "Truck";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("truck/loading_exit.php", $data); //render the full page
	}
}
