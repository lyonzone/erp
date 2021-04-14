<?php 
/**
 * Emit_2_blend Page Controller
 * @category  Controller
 */
class Emit_2_blendController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "emit_2_blend";
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
			"APPEARANCE", 
			"COLOUR", 
			"ODOUR", 
			"BD_gm_ml", 
			"MC_Percent", 
			"ACTIVE_COMPONENT", 
			"SIGN_OF_CHEMIST", 
			"SIGN_OF_AUTHORISER", 
			"RANGE_1_MICRON");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				emit_2_blend.id LIKE ? OR 
				emit_2_blend.truck_entry LIKE ? OR 
				emit_2_blend.APPEARANCE LIKE ? OR 
				emit_2_blend.COLOUR LIKE ? OR 
				emit_2_blend.ODOUR LIKE ? OR 
				emit_2_blend.BD_gm_ml LIKE ? OR 
				emit_2_blend.MC_Percent LIKE ? OR 
				emit_2_blend.ACTIVE_COMPONENT LIKE ? OR 
				emit_2_blend.SIGN_OF_CHEMIST LIKE ? OR 
				emit_2_blend.SIGN_OF_AUTHORISER LIKE ? OR 
				emit_2_blend.RANGE_1_MICRON LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "emit_2_blend/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("emit_2_blend.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Emit 2 Blend";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("emit_2_blend/list.php", $data); //render the full page
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
			"APPEARANCE", 
			"COLOUR", 
			"ODOUR", 
			"BD_gm_ml", 
			"MC_Percent", 
			"ACTIVE_COMPONENT", 
			"SIGN_OF_CHEMIST", 
			"SIGN_OF_AUTHORISER", 
			"RANGE_1_MICRON");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("emit_2_blend.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Emit 2 Blend";
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
		return $this->render_view("emit_2_blend/view.php", $record);
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
			$fields = $this->fields = array("truck_entry","APPEARANCE","COLOUR","ODOUR","BD_gm_ml","MC_Percent","ACTIVE_COMPONENT","SIGN_OF_CHEMIST","SIGN_OF_AUTHORISER","RANGE_1_MICRON");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'truck_entry' => 'required',
				'APPEARANCE' => 'required',
				'COLOUR' => 'required',
				'ODOUR' => 'required',
				'BD_gm_ml' => 'required',
				'MC_Percent' => 'required',
				'ACTIVE_COMPONENT' => 'required',
				'SIGN_OF_CHEMIST' => 'required',
				'SIGN_OF_AUTHORISER' => 'required',
				'RANGE_1_MICRON' => 'required',
			);
			$this->sanitize_array = array(
				'truck_entry' => 'sanitize_string',
				'APPEARANCE' => 'sanitize_string',
				'COLOUR' => 'sanitize_string',
				'ODOUR' => 'sanitize_string',
				'BD_gm_ml' => 'sanitize_string',
				'MC_Percent' => 'sanitize_string',
				'ACTIVE_COMPONENT' => 'sanitize_string',
				'SIGN_OF_CHEMIST' => 'sanitize_string',
				'SIGN_OF_AUTHORISER' => 'sanitize_string',
				'RANGE_1_MICRON' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("emit_2_blend");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Emit 2 Blend";
		$this->render_view("emit_2_blend/add.php");
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
		$fields = $this->fields = array("id","truck_entry","APPEARANCE","COLOUR","ODOUR","BD_gm_ml","MC_Percent","ACTIVE_COMPONENT","SIGN_OF_CHEMIST","SIGN_OF_AUTHORISER","RANGE_1_MICRON");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'truck_entry' => 'required',
				'APPEARANCE' => 'required',
				'COLOUR' => 'required',
				'ODOUR' => 'required',
				'BD_gm_ml' => 'required',
				'MC_Percent' => 'required',
				'ACTIVE_COMPONENT' => 'required',
				'SIGN_OF_CHEMIST' => 'required',
				'SIGN_OF_AUTHORISER' => 'required',
				'RANGE_1_MICRON' => 'required',
			);
			$this->sanitize_array = array(
				'truck_entry' => 'sanitize_string',
				'APPEARANCE' => 'sanitize_string',
				'COLOUR' => 'sanitize_string',
				'ODOUR' => 'sanitize_string',
				'BD_gm_ml' => 'sanitize_string',
				'MC_Percent' => 'sanitize_string',
				'ACTIVE_COMPONENT' => 'sanitize_string',
				'SIGN_OF_CHEMIST' => 'sanitize_string',
				'SIGN_OF_AUTHORISER' => 'sanitize_string',
				'RANGE_1_MICRON' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("emit_2_blend.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("emit_2_blend");
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
						return	$this->redirect("emit_2_blend");
					}
				}
			}
		}
		$db->where("emit_2_blend.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Emit 2 Blend";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("emit_2_blend/edit.php", $data);
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
		$db->where("emit_2_blend.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("emit_2_blend");
	}
}
