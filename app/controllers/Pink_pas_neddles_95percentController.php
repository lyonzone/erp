<?php 
/**
 * Pink_pas_neddles_95percent Page Controller
 * @category  Controller
 */
class Pink_pas_neddles_95percentController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "pink_pas_neddles_95percent";
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
			"LENTH", 
			"LENTH_RANGE", 
			"DIAMETER", 
			"BD_gm_ml", 
			"MC_Percent", 
			"NDOM_Percent", 
			"ALKALINITY_AS_NA2O", 
			"SAMPLE_WT_IN_gm", 
			"VOL", 
			"FACTOR", 
			"ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent", 
			"SIGN_OF_CHEMIST", 
			"SIGN_OF_AUTHORISER");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				pink_pas_neddles_95percent.id LIKE ? OR 
				pink_pas_neddles_95percent.truck_entry LIKE ? OR 
				pink_pas_neddles_95percent.LENTH LIKE ? OR 
				pink_pas_neddles_95percent.LENTH_RANGE LIKE ? OR 
				pink_pas_neddles_95percent.DIAMETER LIKE ? OR 
				pink_pas_neddles_95percent.BD_gm_ml LIKE ? OR 
				pink_pas_neddles_95percent.MC_Percent LIKE ? OR 
				pink_pas_neddles_95percent.NDOM_Percent LIKE ? OR 
				pink_pas_neddles_95percent.ALKALINITY_AS_NA2O LIKE ? OR 
				pink_pas_neddles_95percent.SAMPLE_WT_IN_gm LIKE ? OR 
				pink_pas_neddles_95percent.VOL LIKE ? OR 
				pink_pas_neddles_95percent.FACTOR LIKE ? OR 
				pink_pas_neddles_95percent.ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent LIKE ? OR 
				pink_pas_neddles_95percent.SIGN_OF_CHEMIST LIKE ? OR 
				pink_pas_neddles_95percent.SIGN_OF_AUTHORISER LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "pink_pas_neddles_95percent/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("pink_pas_neddles_95percent.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Pink Pas Neddles 95Percent";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("pink_pas_neddles_95percent/list.php", $data); //render the full page
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
			"LENTH", 
			"LENTH_RANGE", 
			"DIAMETER", 
			"BD_gm_ml", 
			"MC_Percent", 
			"NDOM_Percent", 
			"ALKALINITY_AS_NA2O", 
			"SAMPLE_WT_IN_gm", 
			"VOL", 
			"FACTOR", 
			"ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent", 
			"SIGN_OF_CHEMIST", 
			"SIGN_OF_AUTHORISER");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("pink_pas_neddles_95percent.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Pink Pas Neddles 95Percent";
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
		return $this->render_view("pink_pas_neddles_95percent/view.php", $record);
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
			$fields = $this->fields = array("truck_entry","LENTH","LENTH_RANGE","DIAMETER","BD_gm_ml","MC_Percent","NDOM_Percent","ALKALINITY_AS_NA2O","SAMPLE_WT_IN_gm","VOL","FACTOR","ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent","SIGN_OF_CHEMIST","SIGN_OF_AUTHORISER");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'truck_entry' => 'required',
				'LENTH' => 'required',
				'LENTH_RANGE' => 'required',
				'DIAMETER' => 'required',
				'BD_gm_ml' => 'required',
				'MC_Percent' => 'required',
				'NDOM_Percent' => 'required',
				'ALKALINITY_AS_NA2O' => 'required',
				'SAMPLE_WT_IN_gm' => 'required',
				'VOL' => 'required',
				'FACTOR' => 'required',
				'ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent' => 'required',
				'SIGN_OF_CHEMIST' => 'required',
				'SIGN_OF_AUTHORISER' => 'required',
			);
			$this->sanitize_array = array(
				'truck_entry' => 'sanitize_string',
				'LENTH' => 'sanitize_string',
				'LENTH_RANGE' => 'sanitize_string',
				'DIAMETER' => 'sanitize_string',
				'BD_gm_ml' => 'sanitize_string',
				'MC_Percent' => 'sanitize_string',
				'NDOM_Percent' => 'sanitize_string',
				'ALKALINITY_AS_NA2O' => 'sanitize_string',
				'SAMPLE_WT_IN_gm' => 'sanitize_string',
				'VOL' => 'sanitize_string',
				'FACTOR' => 'sanitize_string',
				'ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent' => 'sanitize_string',
				'SIGN_OF_CHEMIST' => 'sanitize_string',
				'SIGN_OF_AUTHORISER' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("pink_pas_neddles_95percent");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Pink Pas Neddles 95Percent";
		$this->render_view("pink_pas_neddles_95percent/add.php");
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
		$fields = $this->fields = array("id","truck_entry","LENTH","LENTH_RANGE","DIAMETER","BD_gm_ml","MC_Percent","NDOM_Percent","ALKALINITY_AS_NA2O","SAMPLE_WT_IN_gm","VOL","FACTOR","ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent","SIGN_OF_CHEMIST","SIGN_OF_AUTHORISER");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'truck_entry' => 'required',
				'LENTH' => 'required',
				'LENTH_RANGE' => 'required',
				'DIAMETER' => 'required',
				'BD_gm_ml' => 'required',
				'MC_Percent' => 'required',
				'NDOM_Percent' => 'required',
				'ALKALINITY_AS_NA2O' => 'required',
				'SAMPLE_WT_IN_gm' => 'required',
				'VOL' => 'required',
				'FACTOR' => 'required',
				'ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent' => 'required',
				'SIGN_OF_CHEMIST' => 'required',
				'SIGN_OF_AUTHORISER' => 'required',
			);
			$this->sanitize_array = array(
				'truck_entry' => 'sanitize_string',
				'LENTH' => 'sanitize_string',
				'LENTH_RANGE' => 'sanitize_string',
				'DIAMETER' => 'sanitize_string',
				'BD_gm_ml' => 'sanitize_string',
				'MC_Percent' => 'sanitize_string',
				'NDOM_Percent' => 'sanitize_string',
				'ALKALINITY_AS_NA2O' => 'sanitize_string',
				'SAMPLE_WT_IN_gm' => 'sanitize_string',
				'VOL' => 'sanitize_string',
				'FACTOR' => 'sanitize_string',
				'ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent' => 'sanitize_string',
				'SIGN_OF_CHEMIST' => 'sanitize_string',
				'SIGN_OF_AUTHORISER' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("pink_pas_neddles_95percent.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("pink_pas_neddles_95percent");
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
						return	$this->redirect("pink_pas_neddles_95percent");
					}
				}
			}
		}
		$db->where("pink_pas_neddles_95percent.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Pink Pas Neddles 95Percent";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("pink_pas_neddles_95percent/edit.php", $data);
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
		$db->where("pink_pas_neddles_95percent.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("pink_pas_neddles_95percent");
	}
}
