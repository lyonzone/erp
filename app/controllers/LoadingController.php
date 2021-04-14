<?php 
/**
 * Loading Page Controller
 * @category  Controller
 */
class LoadingController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "loading";
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
			"wheels", 
			"driver", 
			"mobile", 
			"material_details", 
			"checksheet", 
			"transport", 
			"depot", 
			"valid_lic", 
			"dl_dt", 
			"insurance", 
			"polution_no", 
			"polution_dt", 
			"fitness", 
			"roadtax", 
			"texit");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				loading.id LIKE ? OR 
				loading.date LIKE ? OR 
				loading.vehicle LIKE ? OR 
				loading.wheels LIKE ? OR 
				loading.driver LIKE ? OR 
				loading.mobile LIKE ? OR 
				loading.material_details LIKE ? OR 
				loading.checksheet LIKE ? OR 
				loading.lrno LIKE ? OR 
				loading.bill LIKE ? OR 
				loading.transport LIKE ? OR 
				loading.depot LIKE ? OR 
				loading.valid_lic LIKE ? OR 
				loading.dl_dt LIKE ? OR 
				loading.insurance LIKE ? OR 
				loading.polution_no LIKE ? OR 
				loading.polution_dt LIKE ? OR 
				loading.fitness LIKE ? OR 
				loading.roadtax LIKE ? OR 
				loading.texit_time LIKE ? OR 
				loading.texit LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "loading/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("loading.id", ORDER_TYPE);
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
				$record['date'] = format_date($record['date'],'d-m-Y H:i:s');
$record['insurance'] = format_date($record['insurance'],'d-m-Y');
$record['polution_dt'] = format_date($record['polution_dt'],'d-m-Y');
$record['fitness'] = format_date($record['fitness'],'d-m-Y');
$record['roadtax'] = format_date($record['roadtax'],'d-m-Y');
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
		$page_title = $this->view->page_title = "Loading";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("loading/list.php", $data); //render the full page
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
			"vehicle", 
			"wheels", 
			"texit", 
			"texit_time", 
			"material_details", 
			"checksheet", 
			"transport", 
			"depot", 
			"valid_lic", 
			"dl_dt", 
			"insurance", 
			"polution_no", 
			"polution_dt", 
			"fitness", 
			"roadtax", 
			"driver", 
			"mobile");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("loading.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$record['date'] = format_date($record['date'],'d-m-Y H:i:s');
$record['texit_time'] = format_date($record['texit_time'],'d-m-Y');
$record['insurance'] = format_date($record['insurance'],'d-m-Y');
$record['polution_dt'] = format_date($record['polution_dt'],'d-m-Y');
$record['fitness'] = format_date($record['fitness'],'d-m-Y');
$record['roadtax'] = format_date($record['roadtax'],'d-m-Y');
			$page_title = $this->view->page_title = "View  Loading";
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
		return $this->render_view("loading/view.php", $record);
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
			$fields = $this->fields = array("date","vehicle","wheels","driver","mobile","texit","transport","depot","valid_lic","dl_dt","insurance","polution_no","polution_dt","fitness","roadtax");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'vehicle' => 'required',
				'wheels' => 'required',
				'driver' => 'required',
				'mobile' => 'required|numeric',
				'transport' => 'required',
				'depot' => 'required',
				'valid_lic' => 'required',
				'dl_dt' => 'required',
				'insurance' => 'required',
				'polution_no' => 'required',
				'polution_dt' => 'required',
				'fitness' => 'required',
				'roadtax' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'vehicle' => 'sanitize_string',
				'wheels' => 'sanitize_string',
				'driver' => 'sanitize_string',
				'mobile' => 'sanitize_string',
				'texit' => 'sanitize_string',
				'transport' => 'sanitize_string',
				'depot' => 'sanitize_string',
				'valid_lic' => 'sanitize_string',
				'dl_dt' => 'sanitize_string',
				'insurance' => 'sanitize_string',
				'polution_no' => 'sanitize_string',
				'polution_dt' => 'sanitize_string',
				'fitness' => 'sanitize_string',
				'roadtax' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("loading");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Loading";
		$this->render_view("loading/add.php");
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
		$fields = $this->fields = array("id","date","vehicle","wheels","driver","mobile","texit","texit_time","material_details","transport","depot","valid_lic","dl_dt","insurance","polution_no","polution_dt","fitness","roadtax");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'vehicle' => 'required',
				'wheels' => 'required',
				'driver' => 'required',
				'mobile' => 'required|numeric',
				'transport' => 'required',
				'depot' => 'required',
				'valid_lic' => 'required',
				'dl_dt' => 'required',
				'insurance' => 'required',
				'polution_no' => 'required',
				'polution_dt' => 'required',
				'fitness' => 'required',
				'roadtax' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'vehicle' => 'sanitize_string',
				'wheels' => 'sanitize_string',
				'driver' => 'sanitize_string',
				'mobile' => 'sanitize_string',
				'texit' => 'sanitize_string',
				'texit_time' => 'sanitize_string',
				'material_details' => 'sanitize_string',
				'transport' => 'sanitize_string',
				'depot' => 'sanitize_string',
				'valid_lic' => 'sanitize_string',
				'dl_dt' => 'sanitize_string',
				'insurance' => 'sanitize_string',
				'polution_no' => 'sanitize_string',
				'polution_dt' => 'sanitize_string',
				'fitness' => 'sanitize_string',
				'roadtax' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("loading.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("loading");
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
						return	$this->redirect("loading");
					}
				}
			}
		}
		$db->where("loading.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Loading";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("loading/edit.php", $data);
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
		$fields = $this->fields = array("id","date","vehicle","wheels","driver","mobile","texit","texit_time","material_details","transport","depot","valid_lic","dl_dt","insurance","polution_no","polution_dt","fitness","roadtax");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'date' => 'required',
				'vehicle' => 'required',
				'wheels' => 'required',
				'driver' => 'required',
				'mobile' => 'required|numeric',
				'transport' => 'required',
				'depot' => 'required',
				'valid_lic' => 'required',
				'dl_dt' => 'required',
				'insurance' => 'required',
				'polution_no' => 'required',
				'polution_dt' => 'required',
				'fitness' => 'required',
				'roadtax' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'vehicle' => 'sanitize_string',
				'wheels' => 'sanitize_string',
				'driver' => 'sanitize_string',
				'mobile' => 'sanitize_string',
				'texit' => 'sanitize_string',
				'texit_time' => 'sanitize_string',
				'material_details' => 'sanitize_string',
				'transport' => 'sanitize_string',
				'depot' => 'sanitize_string',
				'valid_lic' => 'sanitize_string',
				'dl_dt' => 'sanitize_string',
				'insurance' => 'sanitize_string',
				'polution_no' => 'sanitize_string',
				'polution_dt' => 'sanitize_string',
				'fitness' => 'sanitize_string',
				'roadtax' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("loading.id", $rec_id);;
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
		$db->where("loading.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("loading");
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
			"date", 
			"vehicle", 
			"transport", 
			"texit");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				loading.id LIKE ? OR 
				loading.date LIKE ? OR 
				loading.vehicle LIKE ? OR 
				loading.mobile LIKE ? OR 
				loading.transport LIKE ? OR 
				loading.wheels LIKE ? OR 
				loading.driver LIKE ? OR 
				loading.material_details LIKE ? OR 
				loading.checksheet LIKE ? OR 
				loading.lrno LIKE ? OR 
				loading.bill LIKE ? OR 
				loading.depot LIKE ? OR 
				loading.valid_lic LIKE ? OR 
				loading.dl_dt LIKE ? OR 
				loading.insurance LIKE ? OR 
				loading.polution_no LIKE ? OR 
				loading.polution_dt LIKE ? OR 
				loading.fitness LIKE ? OR 
				loading.roadtax LIKE ? OR 
				loading.texit_time LIKE ? OR 
				loading.texit LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "loading/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("loading.id", ORDER_TYPE);
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
				$record['date'] = format_date($record['date'],'d-m-Y H:i:s');
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
		$page_title = $this->view->page_title = "Loading Vehicles";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("loading/loading_exit.php", $data); //render the full page
	}
}
