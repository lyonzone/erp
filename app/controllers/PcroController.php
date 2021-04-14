<?php 
/**
 * Pcro Page Controller
 * @category  Controller
 */
class PcroController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "pcro";
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
			"production", 
			"shift", 
			"sku", 
			"wt1", 
			"amber10", 
			"unmixed");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				pcro.id LIKE ? OR 
				pcro.date LIKE ? OR 
				pcro.production LIKE ? OR 
				pcro.shift LIKE ? OR 
				pcro.sku LIKE ? OR 
				pcro.wt1 LIKE ? OR 
				pcro.wt2 LIKE ? OR 
				pcro.wt3 LIKE ? OR 
				pcro.wt5 LIKE ? OR 
				pcro.wt6 LIKE ? OR 
				pcro.wt7 LIKE ? OR 
				pcro.wt8 LIKE ? OR 
				pcro.wt9 LIKE ? OR 
				pcro.wt10 LIKE ? OR 
				pcro.wt11 LIKE ? OR 
				pcro.wt12 LIKE ? OR 
				pcro.wt13 LIKE ? OR 
				pcro.wt14 LIKE ? OR 
				pcro.wt15 LIKE ? OR 
				pcro.wt16 LIKE ? OR 
				pcro.wt17 LIKE ? OR 
				pcro.wt18 LIKE ? OR 
				pcro.wt19 LIKE ? OR 
				pcro.wt20 LIKE ? OR 
				pcro.wt21 LIKE ? OR 
				pcro.wt22 LIKE ? OR 
				pcro.wt23 LIKE ? OR 
				pcro.wt24 LIKE ? OR 
				pcro.wt25 LIKE ? OR 
				pcro.wt26 LIKE ? OR 
				pcro.wt27 LIKE ? OR 
				pcro.wt28 LIKE ? OR 
				pcro.wt29 LIKE ? OR 
				pcro.wt30 LIKE ? OR 
				pcro.wt31 LIKE ? OR 
				pcro.wt32 LIKE ? OR 
				pcro.wt33 LIKE ? OR 
				pcro.wt34 LIKE ? OR 
				pcro.wt35 LIKE ? OR 
				pcro.wt36 LIKE ? OR 
				pcro.wt37 LIKE ? OR 
				pcro.wt38 LIKE ? OR 
				pcro.wt39 LIKE ? OR 
				pcro.wt40 LIKE ? OR 
				pcro.wt41 LIKE ? OR 
				pcro.wt42 LIKE ? OR 
				pcro.wt43 LIKE ? OR 
				pcro.wt44 LIKE ? OR 
				pcro.wt45 LIKE ? OR 
				pcro.wt46 LIKE ? OR 
				pcro.wt47 LIKE ? OR 
				pcro.wt48 LIKE ? OR 
				pcro.wt49 LIKE ? OR 
				pcro.wt50 LIKE ? OR 
				pcro.wt51 LIKE ? OR 
				pcro.wt52 LIKE ? OR 
				pcro.wt53 LIKE ? OR 
				pcro.wt54 LIKE ? OR 
				pcro.wt55 LIKE ? OR 
				pcro.wt56 LIKE ? OR 
				pcro.wt57 LIKE ? OR 
				pcro.wt58 LIKE ? OR 
				pcro.wt59 LIKE ? OR 
				pcro.wt60 LIKE ? OR 
				pcro.wt61 LIKE ? OR 
				pcro.wt62 LIKE ? OR 
				pcro.wt63 LIKE ? OR 
				pcro.wt64 LIKE ? OR 
				pcro.wt65 LIKE ? OR 
				pcro.wt67 LIKE ? OR 
				pcro.wt68 LIKE ? OR 
				pcro.wt69 LIKE ? OR 
				pcro.wt70 LIKE ? OR 
				pcro.wt71 LIKE ? OR 
				pcro.wt72 LIKE ? OR 
				pcro.wt73 LIKE ? OR 
				pcro.wt74 LIKE ? OR 
				pcro.wt75 LIKE ? OR 
				pcro.wt76 LIKE ? OR 
				pcro.wt77 LIKE ? OR 
				pcro.wt78 LIKE ? OR 
				pcro.wt79 LIKE ? OR 
				pcro.wt80 LIKE ? OR 
				pcro.wt81 LIKE ? OR 
				pcro.wt82 LIKE ? OR 
				pcro.wt83 LIKE ? OR 
				pcro.wt84 LIKE ? OR 
				pcro.wt85 LIKE ? OR 
				pcro.wt86 LIKE ? OR 
				pcro.wt87 LIKE ? OR 
				pcro.wt88 LIKE ? OR 
				pcro.wt89 LIKE ? OR 
				pcro.wt90 LIKE ? OR 
				pcro.wt91 LIKE ? OR 
				pcro.wt92 LIKE ? OR 
				pcro.wt93 LIKE ? OR 
				pcro.wt94 LIKE ? OR 
				pcro.wt95 LIKE ? OR 
				pcro.wt96 LIKE ? OR 
				pcro.wt97 LIKE ? OR 
				pcro.wt98 LIKE ? OR 
				pcro.wt99 LIKE ? OR 
				pcro.wt100 LIKE ? OR 
				pcro.wt101 LIKE ? OR 
				pcro.wt102 LIKE ? OR 
				pcro.wt103 LIKE ? OR 
				pcro.wt104 LIKE ? OR 
				pcro.wt105 LIKE ? OR 
				pcro.wt106 LIKE ? OR 
				pcro.wt107 LIKE ? OR 
				pcro.wt108 LIKE ? OR 
				pcro.wt109 LIKE ? OR 
				pcro.wt110 LIKE ? OR 
				pcro.wt111 LIKE ? OR 
				pcro.wt112 LIKE ? OR 
				pcro.wt113 LIKE ? OR 
				pcro.wt114 LIKE ? OR 
				pcro.wt115 LIKE ? OR 
				pcro.wt116 LIKE ? OR 
				pcro.wt117 LIKE ? OR 
				pcro.wt118 LIKE ? OR 
				pcro.wt119 LIKE ? OR 
				pcro.wt120 LIKE ? OR 
				pcro.wt121 LIKE ? OR 
				pcro.wt122 LIKE ? OR 
				pcro.LEAKERS LIKE ? OR 
				pcro.wt123 LIKE ? OR 
				pcro.wt124 LIKE ? OR 
				pcro.wt125 LIKE ? OR 
				pcro.wt126 LIKE ? OR 
				pcro.wt127 LIKE ? OR 
				pcro.wt128 LIKE ? OR 
				pcro.wt129 LIKE ? OR 
				pcro.wt130 LIKE ? OR 
				pcro.wt131 LIKE ? OR 
				pcro.wt132 LIKE ? OR 
				pcro.POUCH LIKE ? OR 
				pcro.wt133 LIKE ? OR 
				pcro.wt134 LIKE ? OR 
				pcro.wt135 LIKE ? OR 
				pcro.wt136 LIKE ? OR 
				pcro.wt137 LIKE ? OR 
				pcro.wt138 LIKE ? OR 
				pcro.wt139 LIKE ? OR 
				pcro.wt140 LIKE ? OR 
				pcro.wt141 LIKE ? OR 
				pcro.wt142 LIKE ? OR 
				pcro.netx LIKE ? OR 
				pcro.wt143 LIKE ? OR 
				pcro.netmin LIKE ? OR 
				pcro.wt144 LIKE ? OR 
				pcro.sd LIKE ? OR 
				pcro.wt145 LIKE ? OR 
				pcro.netmax LIKE ? OR 
				pcro.wt146 LIKE ? OR 
				pcro.defects LIKE ? OR 
				pcro.red LIKE ? OR 
				pcro.amber LIKE ? OR 
				pcro.sample LIKE ? OR 
				pcro.leaker LIKE ? OR 
				pcro.red1 LIKE ? OR 
				pcro.amber1 LIKE ? OR 
				pcro.damage LIKE ? OR 
				pcro.red2 LIKE ? OR 
				pcro.amber2 LIKE ? OR 
				pcro.burntseal LIKE ? OR 
				pcro.red3 LIKE ? OR 
				pcro.amber3 LIKE ? OR 
				pcro.wrinkeled LIKE ? OR 
				pcro.red4 LIKE ? OR 
				pcro.amber4 LIKE ? OR 
				pcro.skiew LIKE ? OR 
				pcro.red5 LIKE ? OR 
				pcro.amber5 LIKE ? OR 
				pcro.totaldefects LIKE ? OR 
				pcro.red6 LIKE ? OR 
				pcro.amber6 LIKE ? OR 
				pcro.powder LIKE ? OR 
				pcro.red7 LIKE ? OR 
				pcro.amber7 LIKE ? OR 
				pcro.sample1 LIKE ? OR 
				pcro.colour LIKE ? OR 
				pcro.red8 LIKE ? OR 
				pcro.amber8 LIKE ? OR 
				pcro.perfume LIKE ? OR 
				pcro.red9 LIKE ? OR 
				pcro.amber9 LIKE ? OR 
				pcro.foreignmat LIKE ? OR 
				pcro.red10 LIKE ? OR 
				pcro.amber10 LIKE ? OR 
				pcro.unmixed LIKE ? OR 
				pcro.red11 LIKE ? OR 
				pcro.amber11 LIKE ? OR 
				pcro.totaldef LIKE ? OR 
				pcro.percentage LIKE ? OR 
				pcro.pouchdef LIKE ? OR 
				pcro.red12 LIKE ? OR 
				pcro.amber12 LIKE ? OR 
				pcro.powderdef LIKE ? OR 
				pcro.red13 LIKE ? OR 
				pcro.amber13 LIKE ? OR 
				pcro.totaldedect LIKE ? OR 
				pcro.red14 LIKE ? OR 
				pcro.amber14 LIKE ? OR 
				pcro.red15 LIKE ? OR 
				pcro.amber15 LIKE ? OR 
				pcro.red16 LIKE ? OR 
				pcro.amber16 LIKE ? OR 
				pcro.totald LIKE ? OR 
				pcro.remarks LIKE ? OR 
				pcro.rdata LIKE ? OR 
				pcro.scatch LIKE ? OR 
				pcro.test LIKE ? OR 
				pcro.signature LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "pcro/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("pcro.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "PCRO";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("pcro/list.php", $data); //render the full page
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
			"production", 
			"shift", 
			"sku", 
			"wt1", 
			"wt2", 
			"wt3", 
			"wt4", 
			"wt5", 
			"wt6", 
			"wt7", 
			"wt8", 
			"wt9", 
			"wt10", 
			"wt11", 
			"wt12", 
			"wt13", 
			"wt14", 
			"wt15", 
			"wt16", 
			"wt17", 
			"wt18", 
			"wt19", 
			"wt20", 
			"wt21", 
			"wt22", 
			"wt23", 
			"wt24", 
			"wt25", 
			"wt26", 
			"wt27", 
			"wt28", 
			"wt29", 
			"wt30", 
			"wt31", 
			"wt32", 
			"wt33", 
			"wt34", 
			"wt35", 
			"wt36", 
			"wt37", 
			"wt38", 
			"wt39", 
			"wt40", 
			"wt41", 
			"wt42", 
			"wt43", 
			"wt44", 
			"wt45", 
			"wt46", 
			"wt47", 
			"wt48", 
			"wt49", 
			"wt50", 
			"wt51", 
			"wt52", 
			"wt53", 
			"wt54", 
			"wt55", 
			"wt56", 
			"wt57", 
			"wt58", 
			"wt59", 
			"wt60", 
			"wt61", 
			"wt62", 
			"wt63", 
			"wt64", 
			"wt65", 
			"wt67", 
			"wt68", 
			"wt69", 
			"wt70", 
			"wt71", 
			"wt72", 
			"wt73", 
			"wt74", 
			"wt75", 
			"wt76", 
			"wt77", 
			"wt78", 
			"wt79", 
			"wt80", 
			"wt81", 
			"wt82", 
			"wt83", 
			"wt84", 
			"wt85", 
			"wt86", 
			"wt87", 
			"wt88", 
			"wt89", 
			"wt90", 
			"wt91", 
			"wt92", 
			"wt93", 
			"wt94", 
			"wt95", 
			"wt96", 
			"wt97", 
			"wt98", 
			"wt99", 
			"wt100", 
			"wt101", 
			"wt102", 
			"wt103", 
			"wt104", 
			"wt105", 
			"wt106", 
			"wt107", 
			"wt108", 
			"wt109", 
			"wt110", 
			"wt111", 
			"wt112", 
			"wt113", 
			"wt114", 
			"wt115", 
			"wt116", 
			"wt117", 
			"wt118", 
			"wt119", 
			"wt120", 
			"wt121", 
			"wt122", 
			"LEAKERS", 
			"wt123", 
			"wt124", 
			"wt125", 
			"wt126", 
			"wt127", 
			"wt128", 
			"wt129", 
			"wt130", 
			"wt131", 
			"wt132", 
			"POUCH", 
			"wt133", 
			"wt134", 
			"wt135", 
			"wt136", 
			"wt137", 
			"wt138", 
			"wt139", 
			"wt140", 
			"wt141", 
			"wt142", 
			"netx", 
			"wt143", 
			"netmin", 
			"wt144", 
			"sd", 
			"wt145", 
			"netmax", 
			"wt146", 
			"defects", 
			"red", 
			"amber", 
			"sample", 
			"leaker", 
			"red1", 
			"amber1", 
			"damage", 
			"red2", 
			"amber2", 
			"burntseal", 
			"red3", 
			"amber3", 
			"wrinkeled", 
			"red4", 
			"amber4", 
			"skiew", 
			"red5", 
			"amber5", 
			"totaldefects", 
			"red6", 
			"amber6", 
			"powder", 
			"red7", 
			"amber7", 
			"sample1", 
			"colour", 
			"red8", 
			"amber8", 
			"perfume", 
			"red9", 
			"amber9", 
			"foreignmat", 
			"red10", 
			"amber10", 
			"unmixed", 
			"red11", 
			"amber11", 
			"totaldef", 
			"percentage", 
			"pouchdef", 
			"red12", 
			"amber12", 
			"powderdef", 
			"red13", 
			"amber13", 
			"totaldedect", 
			"red14", 
			"amber14", 
			"red15", 
			"amber15", 
			"red16", 
			"amber16", 
			"totald", 
			"remarks", 
			"rdata", 
			"scatch", 
			"test", 
			"signature");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("pcro.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  PCRO";
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
		return $this->render_view("pcro/view.php", $record);
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
			$fields = $this->fields = array("signature");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
			);
			$this->sanitize_array = array(
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['signature'] = USER_NAME;
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("pcro");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New PCRO Record";
		$this->render_view("pcro/add.php");
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
		$fields = $this->fields = array("id","date","production","shift","signature");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'production' => 'required',
				'shift' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'production' => 'sanitize_string',
				'shift' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['signature'] = USER_NAME;
			if($this->validated()){
				$db->where("pcro.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("pcro");
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
						return	$this->redirect("pcro");
					}
				}
			}
		}
		$db->where("pcro.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Pcro";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("pcro/edit.php", $data);
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
		$db->where("pcro.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("pcro");
	}
}
