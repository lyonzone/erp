<?php 
/**
 * Unloading_materials Page Controller
 * @category  Controller
 */
class Unloading_materialsController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "unloading_materials";
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
			"vehicle", 
			"transporter", 
			"supplier", 
			"bill", 
			"bill_dt", 
			"material_name", 
			"bags", 
			"qnty", 
			"basic_price", 
			"amount", 
			"total_amount", 
			"coa", 
			"material_type", 
			"inventory");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				unloading_materials.id LIKE ? OR 
				unloading_materials.date LIKE ? OR 
				unloading_materials.vehicle LIKE ? OR 
				unloading_materials.transporter LIKE ? OR 
				unloading_materials.supplier LIKE ? OR 
				unloading_materials.bill LIKE ? OR 
				unloading_materials.bill_dt LIKE ? OR 
				unloading_materials.material_name LIKE ? OR 
				unloading_materials.bags LIKE ? OR 
				unloading_materials.qnty LIKE ? OR 
				unloading_materials.basic_price LIKE ? OR 
				unloading_materials.amount LIKE ? OR 
				unloading_materials.total_amount LIKE ? OR 
				unloading_materials.coa LIKE ? OR 
				unloading_materials.material_type LIKE ? OR 
				unloading_materials.inventory LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "unloading_materials/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("unloading_materials.id", ORDER_TYPE);
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
				$record['bill_dt'] = format_date($record['bill_dt'],'d-m-Y');
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
		$page_title = $this->view->page_title = "Unloading Materials";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("unloading_materials/list.php", $data); //render the full page
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
			"bill", 
			"bill_dt", 
			"supplier", 
			"material_name", 
			"material_type", 
			"bags", 
			"qnty", 
			"vehicle", 
			"basic_price", 
			"amount", 
			"coa", 
			"inventory", 
			"total_amount", 
			"transporter");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("unloading_materials.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$record['bill_dt'] = format_date($record['bill_dt'],'d-m-Y');
			$page_title = $this->view->page_title = "View  Unloading Materials";
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
		return $this->render_view("unloading_materials/view.php", $record);
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
			$fields = $this->fields = array("date","vehicle","transporter","supplier","bill","bill_dt","material_name","material_type","bags","qnty","coa","basic_price","amount","total_amount");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'vehicle' => 'required',
				'transporter' => 'required',
				'supplier' => 'required',
				'bill' => 'required',
				'bill_dt' => 'required',
				'material_name' => 'required',
				'material_type' => 'required',
				'bags' => 'required',
				'qnty' => 'required',
				'coa' => 'required',
				'basic_price' => 'required',
				'amount' => 'required',
				'total_amount' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'vehicle' => 'sanitize_string',
				'transporter' => 'sanitize_string',
				'supplier' => 'sanitize_string',
				'bill' => 'sanitize_string',
				'bill_dt' => 'sanitize_string',
				'material_name' => 'sanitize_string',
				'material_type' => 'sanitize_string',
				'bags' => 'sanitize_string',
				'qnty' => 'sanitize_string',
				'coa' => 'sanitize_string',
				'basic_price' => 'sanitize_string',
				'amount' => 'sanitize_string',
				'total_amount' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("unloading_materials");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Unloading Materials";
		$this->render_view("unloading_materials/add.php");
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
		$fields = $this->fields = array("id","date","vehicle","transporter","supplier","bill","bill_dt","material_name","material_type","bags","qnty","coa","basic_price","amount","total_amount");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'vehicle' => 'required',
				'transporter' => 'required',
				'supplier' => 'required',
				'bill' => 'required',
				'bill_dt' => 'required',
				'material_name' => 'required',
				'material_type' => 'required',
				'bags' => 'required',
				'qnty' => 'required',
				'coa' => 'required',
				'basic_price' => 'required',
				'amount' => 'required',
				'total_amount' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'vehicle' => 'sanitize_string',
				'transporter' => 'sanitize_string',
				'supplier' => 'sanitize_string',
				'bill' => 'sanitize_string',
				'bill_dt' => 'sanitize_string',
				'material_name' => 'sanitize_string',
				'material_type' => 'sanitize_string',
				'bags' => 'sanitize_string',
				'qnty' => 'sanitize_string',
				'coa' => 'sanitize_string',
				'basic_price' => 'sanitize_string',
				'amount' => 'sanitize_string',
				'total_amount' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("unloading_materials.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("unloading_materials");
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
						return	$this->redirect("unloading_materials");
					}
				}
			}
		}
		$db->where("unloading_materials.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Unloading Materials";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("unloading_materials/edit.php", $data);
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
		$db->where("unloading_materials.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("unloading_materials");
	}
}
