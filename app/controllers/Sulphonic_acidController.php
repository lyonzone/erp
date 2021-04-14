<?php 
/**
 * Sulphonic_acid Page Controller
 * @category  Controller
 */
class Sulphonic_acidController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "sulphonic_acid";
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
			"APPERANCE_COLOUR", 
			"COLOUR_KLETT", 
			"SAMPLE_WT", 
			"HYAMINE_FACTOR", 
			"VOL_OF_HYAMINE", 
			"PURITY", 
			"VOL_OF_NAOH", 
			"FACTOR_OF_1NNAOH", 
			"Percent_FREE_N2SO4", 
			"SAMPLE_W", 
			"VOLUME_OF_EATHER", 
			"WT_OF_RESIDUE", 
			"NDOM", 
			"SIGN_OF_CHEMIST", 
			"SIGN_OF_AUTHORISER");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				sulphonic_acid.id LIKE ? OR 
				sulphonic_acid.truck_entry LIKE ? OR 
				sulphonic_acid.APPERANCE_COLOUR LIKE ? OR 
				sulphonic_acid.COLOUR_KLETT LIKE ? OR 
				sulphonic_acid.SAMPLE_WT LIKE ? OR 
				sulphonic_acid.HYAMINE_FACTOR LIKE ? OR 
				sulphonic_acid.VOL_OF_HYAMINE LIKE ? OR 
				sulphonic_acid.PURITY LIKE ? OR 
				sulphonic_acid.VOL_OF_NAOH LIKE ? OR 
				sulphonic_acid.FACTOR_OF_1NNAOH LIKE ? OR 
				sulphonic_acid.Percent_FREE_N2SO4 LIKE ? OR 
				sulphonic_acid.SAMPLE_W LIKE ? OR 
				sulphonic_acid.VOLUME_OF_EATHER LIKE ? OR 
				sulphonic_acid.WT_OF_RESIDUE LIKE ? OR 
				sulphonic_acid.NDOM LIKE ? OR 
				sulphonic_acid.SIGN_OF_CHEMIST LIKE ? OR 
				sulphonic_acid.SIGN_OF_AUTHORISER LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "sulphonic_acid/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("sulphonic_acid.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Sulphonic Acid";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("sulphonic_acid/list.php", $data); //render the full page
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
			"APPERANCE_COLOUR", 
			"COLOUR_KLETT", 
			"SAMPLE_WT", 
			"HYAMINE_FACTOR", 
			"VOL_OF_HYAMINE", 
			"PURITY", 
			"VOL_OF_NAOH", 
			"FACTOR_OF_1NNAOH", 
			"Percent_FREE_N2SO4", 
			"SAMPLE_W", 
			"VOLUME_OF_EATHER", 
			"WT_OF_RESIDUE", 
			"NDOM", 
			"SIGN_OF_CHEMIST", 
			"SIGN_OF_AUTHORISER");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("sulphonic_acid.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Sulphonic Acid";
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
		return $this->render_view("sulphonic_acid/view.php", $record);
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
			$fields = $this->fields = array("truck_entry","APPERANCE_COLOUR","COLOUR_KLETT","SAMPLE_WT","HYAMINE_FACTOR","VOL_OF_HYAMINE","PURITY","VOL_OF_NAOH","FACTOR_OF_1NNAOH","Percent_FREE_N2SO4","SAMPLE_W","VOLUME_OF_EATHER","WT_OF_RESIDUE","NDOM","SIGN_OF_CHEMIST","SIGN_OF_AUTHORISER");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'truck_entry' => 'required',
				'APPERANCE_COLOUR' => 'required',
				'COLOUR_KLETT' => 'required',
				'SAMPLE_WT' => 'required',
				'HYAMINE_FACTOR' => 'required',
				'VOL_OF_HYAMINE' => 'required',
				'PURITY' => 'required',
				'VOL_OF_NAOH' => 'required',
				'FACTOR_OF_1NNAOH' => 'required',
				'Percent_FREE_N2SO4' => 'required',
				'SAMPLE_W' => 'required',
				'VOLUME_OF_EATHER' => 'required',
				'WT_OF_RESIDUE' => 'required',
				'NDOM' => 'required',
				'SIGN_OF_CHEMIST' => 'required',
				'SIGN_OF_AUTHORISER' => 'required',
			);
			$this->sanitize_array = array(
				'truck_entry' => 'sanitize_string',
				'APPERANCE_COLOUR' => 'sanitize_string',
				'COLOUR_KLETT' => 'sanitize_string',
				'SAMPLE_WT' => 'sanitize_string',
				'HYAMINE_FACTOR' => 'sanitize_string',
				'VOL_OF_HYAMINE' => 'sanitize_string',
				'PURITY' => 'sanitize_string',
				'VOL_OF_NAOH' => 'sanitize_string',
				'FACTOR_OF_1NNAOH' => 'sanitize_string',
				'Percent_FREE_N2SO4' => 'sanitize_string',
				'SAMPLE_W' => 'sanitize_string',
				'VOLUME_OF_EATHER' => 'sanitize_string',
				'WT_OF_RESIDUE' => 'sanitize_string',
				'NDOM' => 'sanitize_string',
				'SIGN_OF_CHEMIST' => 'sanitize_string',
				'SIGN_OF_AUTHORISER' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("sulphonic_acid");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Sulphonic Acid";
		$this->render_view("sulphonic_acid/add.php");
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
		$fields = $this->fields = array("id","truck_entry","APPERANCE_COLOUR","COLOUR_KLETT","SAMPLE_WT","HYAMINE_FACTOR","VOL_OF_HYAMINE","PURITY","VOL_OF_NAOH","FACTOR_OF_1NNAOH","Percent_FREE_N2SO4","SAMPLE_W","VOLUME_OF_EATHER","WT_OF_RESIDUE","NDOM","SIGN_OF_CHEMIST","SIGN_OF_AUTHORISER");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'truck_entry' => 'required',
				'APPERANCE_COLOUR' => 'required',
				'COLOUR_KLETT' => 'required',
				'SAMPLE_WT' => 'required',
				'HYAMINE_FACTOR' => 'required',
				'VOL_OF_HYAMINE' => 'required',
				'PURITY' => 'required',
				'VOL_OF_NAOH' => 'required',
				'FACTOR_OF_1NNAOH' => 'required',
				'Percent_FREE_N2SO4' => 'required',
				'SAMPLE_W' => 'required',
				'VOLUME_OF_EATHER' => 'required',
				'WT_OF_RESIDUE' => 'required',
				'NDOM' => 'required',
				'SIGN_OF_CHEMIST' => 'required',
				'SIGN_OF_AUTHORISER' => 'required',
			);
			$this->sanitize_array = array(
				'truck_entry' => 'sanitize_string',
				'APPERANCE_COLOUR' => 'sanitize_string',
				'COLOUR_KLETT' => 'sanitize_string',
				'SAMPLE_WT' => 'sanitize_string',
				'HYAMINE_FACTOR' => 'sanitize_string',
				'VOL_OF_HYAMINE' => 'sanitize_string',
				'PURITY' => 'sanitize_string',
				'VOL_OF_NAOH' => 'sanitize_string',
				'FACTOR_OF_1NNAOH' => 'sanitize_string',
				'Percent_FREE_N2SO4' => 'sanitize_string',
				'SAMPLE_W' => 'sanitize_string',
				'VOLUME_OF_EATHER' => 'sanitize_string',
				'WT_OF_RESIDUE' => 'sanitize_string',
				'NDOM' => 'sanitize_string',
				'SIGN_OF_CHEMIST' => 'sanitize_string',
				'SIGN_OF_AUTHORISER' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("sulphonic_acid.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("sulphonic_acid");
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
						return	$this->redirect("sulphonic_acid");
					}
				}
			}
		}
		$db->where("sulphonic_acid.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Sulphonic Acid";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("sulphonic_acid/edit.php", $data);
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
		$db->where("sulphonic_acid.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("sulphonic_acid");
	}
}
