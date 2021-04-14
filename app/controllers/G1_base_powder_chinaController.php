<?php 
/**
 * G1_base_powder_china Page Controller
 * @category  Controller
 */
class G1_base_powder_chinaController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "g1_base_powder_china";
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
			"TRUCK_ENTRY", 
			"MOISTURE", 
			"PH", 
			"DFR", 
			"UCT", 
			"SAMPLE_WT_Ingm", 
			"VOL_IN_MC", 
			"HYAMINE_FACTOR", 
			"AD_5", 
			"PASSING_THROUGH_85", 
			"SIGN_OF_CHEMIST", 
			"SIGN_OF_AUTHORISE");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				g1_base_powder_china.id LIKE ? OR 
				g1_base_powder_china.TRUCK_ENTRY LIKE ? OR 
				g1_base_powder_china.MOISTURE LIKE ? OR 
				g1_base_powder_china.PH LIKE ? OR 
				g1_base_powder_china.DFR LIKE ? OR 
				g1_base_powder_china.UCT LIKE ? OR 
				g1_base_powder_china.SAMPLE_WT_Ingm LIKE ? OR 
				g1_base_powder_china.VOL_IN_MC LIKE ? OR 
				g1_base_powder_china.HYAMINE_FACTOR LIKE ? OR 
				g1_base_powder_china.AD_5 LIKE ? OR 
				g1_base_powder_china.PASSING_THROUGH_85 LIKE ? OR 
				g1_base_powder_china.SIGN_OF_CHEMIST LIKE ? OR 
				g1_base_powder_china.SIGN_OF_AUTHORISE LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "g1_base_powder_china/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("g1_base_powder_china.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "G1 Base Powder China";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("g1_base_powder_china/list.php", $data); //render the full page
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
			"TRUCK_ENTRY", 
			"MOISTURE", 
			"PH", 
			"DFR", 
			"UCT", 
			"SAMPLE_WT_Ingm", 
			"VOL_IN_MC", 
			"HYAMINE_FACTOR", 
			"AD_5", 
			"PASSING_THROUGH_85", 
			"SIGN_OF_CHEMIST", 
			"SIGN_OF_AUTHORISE");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("g1_base_powder_china.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  G1 Base Powder China";
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
		return $this->render_view("g1_base_powder_china/view.php", $record);
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
			$fields = $this->fields = array("TRUCK_ENTRY","MOISTURE","PH","DFR","UCT","SAMPLE_WT_Ingm","VOL_IN_MC","HYAMINE_FACTOR","AD_5","PASSING_THROUGH_85","SIGN_OF_CHEMIST","SIGN_OF_AUTHORISE");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'TRUCK_ENTRY' => 'required',
				'MOISTURE' => 'required',
				'PH' => 'required',
				'DFR' => 'required',
				'UCT' => 'required',
				'SAMPLE_WT_Ingm' => 'required',
				'VOL_IN_MC' => 'required',
				'HYAMINE_FACTOR' => 'required',
				'AD_5' => 'required',
				'PASSING_THROUGH_85' => 'required',
				'SIGN_OF_CHEMIST' => 'required',
				'SIGN_OF_AUTHORISE' => 'required',
			);
			$this->sanitize_array = array(
				'TRUCK_ENTRY' => 'sanitize_string',
				'MOISTURE' => 'sanitize_string',
				'PH' => 'sanitize_string',
				'DFR' => 'sanitize_string',
				'UCT' => 'sanitize_string',
				'SAMPLE_WT_Ingm' => 'sanitize_string',
				'VOL_IN_MC' => 'sanitize_string',
				'HYAMINE_FACTOR' => 'sanitize_string',
				'AD_5' => 'sanitize_string',
				'PASSING_THROUGH_85' => 'sanitize_string',
				'SIGN_OF_CHEMIST' => 'sanitize_string',
				'SIGN_OF_AUTHORISE' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("g1_base_powder_china");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New G1 Base Powder China";
		$this->render_view("g1_base_powder_china/add.php");
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
		$fields = $this->fields = array("id","TRUCK_ENTRY","MOISTURE","PH","DFR","UCT","SAMPLE_WT_Ingm","VOL_IN_MC","HYAMINE_FACTOR","AD_5","PASSING_THROUGH_85","SIGN_OF_CHEMIST","SIGN_OF_AUTHORISE");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'TRUCK_ENTRY' => 'required',
				'MOISTURE' => 'required',
				'PH' => 'required',
				'DFR' => 'required',
				'UCT' => 'required',
				'SAMPLE_WT_Ingm' => 'required',
				'VOL_IN_MC' => 'required',
				'HYAMINE_FACTOR' => 'required',
				'AD_5' => 'required',
				'PASSING_THROUGH_85' => 'required',
				'SIGN_OF_CHEMIST' => 'required',
				'SIGN_OF_AUTHORISE' => 'required',
			);
			$this->sanitize_array = array(
				'TRUCK_ENTRY' => 'sanitize_string',
				'MOISTURE' => 'sanitize_string',
				'PH' => 'sanitize_string',
				'DFR' => 'sanitize_string',
				'UCT' => 'sanitize_string',
				'SAMPLE_WT_Ingm' => 'sanitize_string',
				'VOL_IN_MC' => 'sanitize_string',
				'HYAMINE_FACTOR' => 'sanitize_string',
				'AD_5' => 'sanitize_string',
				'PASSING_THROUGH_85' => 'sanitize_string',
				'SIGN_OF_CHEMIST' => 'sanitize_string',
				'SIGN_OF_AUTHORISE' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("g1_base_powder_china.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("g1_base_powder_china");
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
						return	$this->redirect("g1_base_powder_china");
					}
				}
			}
		}
		$db->where("g1_base_powder_china.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  G1 Base Powder China";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("g1_base_powder_china/edit.php", $data);
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
		$db->where("g1_base_powder_china.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("g1_base_powder_china");
	}
}
