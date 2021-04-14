<?php 
/**
 * Warehouse Page Controller
 * @category  Controller
 */
class WarehouseController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "warehouse";
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
			"test", 
			"signature");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				warehouse.id LIKE ? OR 
				warehouse.date LIKE ? OR 
				warehouse.production LIKE ? OR 
				warehouse.shift LIKE ? OR 
				warehouse.sku LIKE ? OR 
				warehouse.wt1 LIKE ? OR 
				warehouse.wt2 LIKE ? OR 
				warehouse.wt3 LIKE ? OR 
				warehouse.wt4 LIKE ? OR 
				warehouse.wt5 LIKE ? OR 
				warehouse.wt6 LIKE ? OR 
				warehouse.wt7 LIKE ? OR 
				warehouse.wt8 LIKE ? OR 
				warehouse.wt9 LIKE ? OR 
				warehouse.wt10 LIKE ? OR 
				warehouse.wt11 LIKE ? OR 
				warehouse.wt12 LIKE ? OR 
				warehouse.wt13 LIKE ? OR 
				warehouse.wt14 LIKE ? OR 
				warehouse.wt15 LIKE ? OR 
				warehouse.wt16 LIKE ? OR 
				warehouse.wt17 LIKE ? OR 
				warehouse.wt18 LIKE ? OR 
				warehouse.wt19 LIKE ? OR 
				warehouse.wt20 LIKE ? OR 
				warehouse.wt21 LIKE ? OR 
				warehouse.wt22 LIKE ? OR 
				warehouse.wt23 LIKE ? OR 
				warehouse.wt24 LIKE ? OR 
				warehouse.wt25 LIKE ? OR 
				warehouse.wt26 LIKE ? OR 
				warehouse.wt27 LIKE ? OR 
				warehouse.wt28 LIKE ? OR 
				warehouse.wt29 LIKE ? OR 
				warehouse.wt30 LIKE ? OR 
				warehouse.wt31 LIKE ? OR 
				warehouse.wt32 LIKE ? OR 
				warehouse.wt33 LIKE ? OR 
				warehouse.wt34 LIKE ? OR 
				warehouse.wt35 LIKE ? OR 
				warehouse.wt36 LIKE ? OR 
				warehouse.wt37 LIKE ? OR 
				warehouse.wt38 LIKE ? OR 
				warehouse.wt39 LIKE ? OR 
				warehouse.wt40 LIKE ? OR 
				warehouse.wt41 LIKE ? OR 
				warehouse.wt42 LIKE ? OR 
				warehouse.wt43 LIKE ? OR 
				warehouse.wt44 LIKE ? OR 
				warehouse.wt45 LIKE ? OR 
				warehouse.wt46 LIKE ? OR 
				warehouse.wt47 LIKE ? OR 
				warehouse.wt48 LIKE ? OR 
				warehouse.wt49 LIKE ? OR 
				warehouse.wt50 LIKE ? OR 
				warehouse.wt51 LIKE ? OR 
				warehouse.wt52 LIKE ? OR 
				warehouse.wt53 LIKE ? OR 
				warehouse.wt54 LIKE ? OR 
				warehouse.wt55 LIKE ? OR 
				warehouse.wt56 LIKE ? OR 
				warehouse.wt57 LIKE ? OR 
				warehouse.wt58 LIKE ? OR 
				warehouse.wt59 LIKE ? OR 
				warehouse.wt60 LIKE ? OR 
				warehouse.wt61 LIKE ? OR 
				warehouse.wt62 LIKE ? OR 
				warehouse.wt63 LIKE ? OR 
				warehouse.wt64 LIKE ? OR 
				warehouse.wt65 LIKE ? OR 
				warehouse.wt67 LIKE ? OR 
				warehouse.wt68 LIKE ? OR 
				warehouse.wt69 LIKE ? OR 
				warehouse.wt70 LIKE ? OR 
				warehouse.wt71 LIKE ? OR 
				warehouse.wt72 LIKE ? OR 
				warehouse.wt73 LIKE ? OR 
				warehouse.wt74 LIKE ? OR 
				warehouse.wt75 LIKE ? OR 
				warehouse.wt76 LIKE ? OR 
				warehouse.wt77 LIKE ? OR 
				warehouse.wt78 LIKE ? OR 
				warehouse.wt79 LIKE ? OR 
				warehouse.wt80 LIKE ? OR 
				warehouse.wt81 LIKE ? OR 
				warehouse.wt82 LIKE ? OR 
				warehouse.wt83 LIKE ? OR 
				warehouse.wt84 LIKE ? OR 
				warehouse.wt85 LIKE ? OR 
				warehouse.wt86 LIKE ? OR 
				warehouse.wt87 LIKE ? OR 
				warehouse.wt88 LIKE ? OR 
				warehouse.wt89 LIKE ? OR 
				warehouse.wt90 LIKE ? OR 
				warehouse.wt91 LIKE ? OR 
				warehouse.wt92 LIKE ? OR 
				warehouse.wt93 LIKE ? OR 
				warehouse.wt94 LIKE ? OR 
				warehouse.wt95 LIKE ? OR 
				warehouse.wt96 LIKE ? OR 
				warehouse.wt97 LIKE ? OR 
				warehouse.wt98 LIKE ? OR 
				warehouse.wt99 LIKE ? OR 
				warehouse.wt100 LIKE ? OR 
				warehouse.wt101 LIKE ? OR 
				warehouse.wt102 LIKE ? OR 
				warehouse.wt103 LIKE ? OR 
				warehouse.wt104 LIKE ? OR 
				warehouse.wt105 LIKE ? OR 
				warehouse.wt106 LIKE ? OR 
				warehouse.wt107 LIKE ? OR 
				warehouse.wt108 LIKE ? OR 
				warehouse.wt109 LIKE ? OR 
				warehouse.wt110 LIKE ? OR 
				warehouse.wt111 LIKE ? OR 
				warehouse.wt112 LIKE ? OR 
				warehouse.wt113 LIKE ? OR 
				warehouse.wt114 LIKE ? OR 
				warehouse.wt115 LIKE ? OR 
				warehouse.wt116 LIKE ? OR 
				warehouse.wt117 LIKE ? OR 
				warehouse.wt118 LIKE ? OR 
				warehouse.wt119 LIKE ? OR 
				warehouse.wt120 LIKE ? OR 
				warehouse.wt121 LIKE ? OR 
				warehouse.wt122 LIKE ? OR 
				warehouse.LEAKERS LIKE ? OR 
				warehouse.wt123 LIKE ? OR 
				warehouse.wt124 LIKE ? OR 
				warehouse.wt125 LIKE ? OR 
				warehouse.wt126 LIKE ? OR 
				warehouse.wt127 LIKE ? OR 
				warehouse.wt128 LIKE ? OR 
				warehouse.wt129 LIKE ? OR 
				warehouse.wt130 LIKE ? OR 
				warehouse.wt131 LIKE ? OR 
				warehouse.wt132 LIKE ? OR 
				warehouse.POUCH LIKE ? OR 
				warehouse.wt133 LIKE ? OR 
				warehouse.wt134 LIKE ? OR 
				warehouse.wt135 LIKE ? OR 
				warehouse.wt136 LIKE ? OR 
				warehouse.wt137 LIKE ? OR 
				warehouse.wt138 LIKE ? OR 
				warehouse.wt139 LIKE ? OR 
				warehouse.wt140 LIKE ? OR 
				warehouse.wt141 LIKE ? OR 
				warehouse.wt142 LIKE ? OR 
				warehouse.netx LIKE ? OR 
				warehouse.wt143 LIKE ? OR 
				warehouse.netmin LIKE ? OR 
				warehouse.wt144 LIKE ? OR 
				warehouse.sd LIKE ? OR 
				warehouse.wt145 LIKE ? OR 
				warehouse.netmax LIKE ? OR 
				warehouse.wt146 LIKE ? OR 
				warehouse.defects LIKE ? OR 
				warehouse.red LIKE ? OR 
				warehouse.amber LIKE ? OR 
				warehouse.sample LIKE ? OR 
				warehouse.leaker LIKE ? OR 
				warehouse.red1 LIKE ? OR 
				warehouse.amber1 LIKE ? OR 
				warehouse.damage LIKE ? OR 
				warehouse.red2 LIKE ? OR 
				warehouse.amber2 LIKE ? OR 
				warehouse.burntseal LIKE ? OR 
				warehouse.red3 LIKE ? OR 
				warehouse.amber3 LIKE ? OR 
				warehouse.wrinkeled LIKE ? OR 
				warehouse.red4 LIKE ? OR 
				warehouse.amber4 LIKE ? OR 
				warehouse.skiew LIKE ? OR 
				warehouse.red5 LIKE ? OR 
				warehouse.amber5 LIKE ? OR 
				warehouse.totaldefects LIKE ? OR 
				warehouse.red6 LIKE ? OR 
				warehouse.amber6 LIKE ? OR 
				warehouse.powder LIKE ? OR 
				warehouse.red7 LIKE ? OR 
				warehouse.amber7 LIKE ? OR 
				warehouse.sample1 LIKE ? OR 
				warehouse.colour LIKE ? OR 
				warehouse.red8 LIKE ? OR 
				warehouse.amber8 LIKE ? OR 
				warehouse.perfume LIKE ? OR 
				warehouse.red9 LIKE ? OR 
				warehouse.amber9 LIKE ? OR 
				warehouse.foreignmat LIKE ? OR 
				warehouse.red10 LIKE ? OR 
				warehouse.amber10 LIKE ? OR 
				warehouse.unmixed LIKE ? OR 
				warehouse.red11 LIKE ? OR 
				warehouse.amber11 LIKE ? OR 
				warehouse.totaldef LIKE ? OR 
				warehouse.percentage LIKE ? OR 
				warehouse.pouchdef LIKE ? OR 
				warehouse.red12 LIKE ? OR 
				warehouse.amber12 LIKE ? OR 
				warehouse.powderdef LIKE ? OR 
				warehouse.red13 LIKE ? OR 
				warehouse.amber13 LIKE ? OR 
				warehouse.totaldedect LIKE ? OR 
				warehouse.red14 LIKE ? OR 
				warehouse.amber14 LIKE ? OR 
				warehouse.red15 LIKE ? OR 
				warehouse.amber15 LIKE ? OR 
				warehouse.red16 LIKE ? OR 
				warehouse.amber16 LIKE ? OR 
				warehouse.totald LIKE ? OR 
				warehouse.remarks LIKE ? OR 
				warehouse.rdata LIKE ? OR 
				warehouse.scatch LIKE ? OR 
				warehouse.test LIKE ? OR 
				warehouse.signature LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "warehouse/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("warehouse.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Warehouse";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("warehouse/list.php", $data); //render the full page
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
			$db->where("warehouse.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Warehouse";
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
		return $this->render_view("warehouse/view.php", $record);
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
			$fields = $this->fields = array("date","production","shift","sku","wt1","wt2","wt3","wt4","wt5","wt6","wt7","wt8","wt9","wt10","wt11","wt12","wt13","wt14","wt15","wt16","wt17","wt18","wt19","wt20","wt21","wt22","wt23","wt24","wt25","wt26","wt27","wt28","wt29","wt30","wt31","wt32","wt33","wt34","wt35","wt36","wt37","wt38","wt39","wt40","wt41","wt42","wt43","wt44","wt45","wt46","wt47","wt48","wt49","wt50","wt51","wt52","wt53","wt54","wt55","wt56","wt57","wt58","wt59","wt60","wt61","wt62","wt63","wt64","wt65","wt67","wt68","wt69","wt70","wt71","wt72","wt73","wt74","wt75","wt76","wt77","wt78","wt79","wt80","wt81","wt82","wt83","wt84","wt85","wt86","wt87","wt88","wt89","wt90","wt91","wt92","wt93","wt94","wt95","wt96","wt97","wt98","wt99","wt100","wt101","wt102","wt103","wt104","wt105","wt106","wt107","wt108","wt109","wt110","wt111","wt112","wt113","wt114","wt115","wt116","wt117","wt118","wt119","wt120","wt121","wt122","LEAKERS","wt123","wt124","wt125","wt126","wt127","wt128","wt129","wt130","wt131","wt132","POUCH","wt133","wt134","wt135","wt136","wt137","wt138","wt139","wt140","wt141","wt142","netx","wt143","netmin","wt144","sd","wt145","netmax","wt146","defects","red","amber","sample","leaker","red1","amber1","damage","red2","amber2","burntseal","red3","amber3","wrinkeled","red4","amber4","skiew","red5","amber5","totaldefects","red6","amber6","powder","red7","amber7","sample1","colour","red8","amber8","perfume","red9","amber9","foreignmat","red10","amber10","unmixed","red11","amber11","totaldef","red15","amber15","percentage","red16","amber16","pouchdef","red12","amber12","powderdef","red13","amber13","totaldedect","red14","amber14","remarks","rdata","scatch","test","signature");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'production' => 'required',
				'shift' => 'required',
				'sku' => 'required',
				'wt1' => 'numeric',
				'wt2' => 'required|numeric',
				'wt3' => 'required|numeric',
				'wt4' => 'required|numeric',
				'wt5' => 'required|numeric',
				'wt6' => 'required|numeric',
				'wt7' => 'required|numeric',
				'wt8' => 'required|numeric',
				'wt9' => 'required|numeric',
				'wt10' => 'required|numeric',
				'wt11' => 'required|numeric',
				'wt12' => 'required|numeric',
				'wt13' => 'required|numeric',
				'wt14' => 'required|numeric',
				'wt15' => 'required|numeric',
				'wt16' => 'required|numeric',
				'wt17' => 'required|numeric',
				'wt18' => 'required|numeric',
				'wt19' => 'required|numeric',
				'wt20' => 'required|numeric',
				'wt21' => 'required|numeric',
				'wt22' => 'required|numeric',
				'wt23' => 'required|numeric',
				'wt24' => 'required|numeric',
				'wt25' => 'required|numeric',
				'wt26' => 'required|numeric',
				'wt27' => 'required|numeric',
				'wt28' => 'required|numeric',
				'wt29' => 'required|numeric',
				'wt30' => 'required|numeric',
				'wt31' => 'required|numeric',
				'wt32' => 'required|numeric',
				'wt33' => 'required|numeric',
				'wt34' => 'required|numeric',
				'wt35' => 'required|numeric',
				'wt36' => 'required|numeric',
				'wt37' => 'required|numeric',
				'wt38' => 'required|numeric',
				'wt39' => 'required|numeric',
				'wt40' => 'required|numeric',
				'wt41' => 'required|numeric',
				'wt42' => 'required|numeric',
				'wt43' => 'required|numeric',
				'wt44' => 'required|numeric',
				'wt45' => 'required|numeric',
				'wt46' => 'required|numeric',
				'wt47' => 'required|numeric',
				'wt48' => 'required|numeric',
				'wt49' => 'required|numeric',
				'wt50' => 'required|numeric',
				'wt51' => 'required|numeric',
				'wt52' => 'required|numeric',
				'wt53' => 'required|numeric',
				'wt54' => 'required|numeric',
				'wt55' => 'required|numeric',
				'wt56' => 'required|numeric',
				'wt57' => 'required|numeric',
				'wt58' => 'required|numeric',
				'wt59' => 'required|numeric',
				'wt60' => 'required|numeric',
				'wt61' => 'required|numeric',
				'wt62' => 'required|numeric',
				'wt63' => 'required|numeric',
				'wt64' => 'required|numeric',
				'wt65' => 'required|numeric',
				'wt67' => 'required|numeric',
				'wt68' => 'required|numeric',
				'wt69' => 'required|numeric',
				'wt70' => 'required|numeric',
				'wt71' => 'required|numeric',
				'wt72' => 'required|numeric',
				'wt73' => 'required|numeric',
				'wt74' => 'required|numeric',
				'wt75' => 'required|numeric',
				'wt76' => 'required|numeric',
				'wt77' => 'required|numeric',
				'wt78' => 'required|numeric',
				'wt79' => 'required|numeric',
				'wt80' => 'required|numeric',
				'wt81' => 'required|numeric',
				'wt82' => 'required|numeric',
				'wt83' => 'required|numeric',
				'wt84' => 'required|numeric',
				'wt85' => 'required|numeric',
				'wt86' => 'required|numeric',
				'wt87' => 'required|numeric',
				'wt88' => 'required|numeric',
				'wt89' => 'required|numeric',
				'wt90' => 'required|numeric',
				'wt91' => 'required|numeric',
				'wt92' => 'required|numeric',
				'wt93' => 'required|numeric',
				'wt94' => 'required|numeric',
				'wt95' => 'required|numeric',
				'wt96' => 'required|numeric',
				'wt97' => 'required|numeric',
				'wt98' => 'required|numeric',
				'wt99' => 'required|numeric',
				'wt100' => 'required|numeric',
				'wt101' => 'required|numeric',
				'wt102' => 'required|numeric',
				'wt103' => 'required|numeric',
				'wt104' => 'required|numeric',
				'wt105' => 'required|numeric',
				'wt106' => 'required|numeric',
				'wt107' => 'required|numeric',
				'wt108' => 'required|numeric',
				'wt109' => 'required|numeric',
				'wt110' => 'required|numeric',
				'wt111' => 'required|numeric',
				'wt112' => 'required|numeric',
				'wt113' => 'required|numeric',
				'wt114' => 'required|numeric',
				'wt115' => 'required|numeric',
				'wt116' => 'required|numeric',
				'wt117' => 'required|numeric',
				'wt118' => 'required|numeric',
				'wt119' => 'required|numeric',
				'wt120' => 'required|numeric',
				'wt121' => 'required|numeric',
				'wt122' => 'required|numeric',
				'wt123' => 'required|numeric',
				'wt124' => 'required|numeric',
				'wt125' => 'required|numeric',
				'wt126' => 'required|numeric',
				'wt127' => 'required|numeric',
				'wt128' => 'required|numeric',
				'wt129' => 'required|numeric',
				'wt130' => 'required|numeric',
				'wt131' => 'required|numeric',
				'wt132' => 'required|numeric',
				'wt133' => 'required|numeric',
				'wt134' => 'required|numeric',
				'wt135' => 'required|numeric',
				'wt136' => 'required|numeric',
				'wt137' => 'required|numeric',
				'wt138' => 'required|numeric',
				'wt139' => 'required|numeric',
				'wt140' => 'required|numeric',
				'wt141' => 'required|numeric',
				'wt142' => 'required|numeric',
				'wt143' => 'required',
				'wt144' => 'required',
				'wt145' => 'required',
				'netmax' => 'numeric',
				'wt146' => 'required',
				'sample' => 'required',
				'leaker' => 'numeric',
				'red1' => 'required|numeric',
				'amber1' => 'required|numeric',
				'damage' => 'numeric',
				'red2' => 'required|numeric',
				'amber2' => 'required|numeric',
				'burntseal' => 'numeric',
				'red3' => 'required|numeric',
				'amber3' => 'required|numeric',
				'wrinkeled' => 'numeric',
				'red4' => 'required|numeric',
				'amber4' => 'required|numeric',
				'skiew' => 'numeric',
				'red5' => 'required|numeric',
				'amber5' => 'required|numeric',
				'totaldefects' => 'numeric',
				'red6' => 'required|numeric',
				'amber6' => 'required|numeric',
				'sample1' => 'required',
				'red8' => 'required|numeric',
				'amber8' => 'required|numeric',
				'red9' => 'required',
				'amber9' => 'required',
				'red10' => 'required|numeric',
				'amber10' => 'required|numeric',
				'red11' => 'required|numeric',
				'amber11' => 'required|numeric',
				'totaldef' => 'numeric',
				'red15' => 'required|numeric',
				'amber15' => 'required|numeric',
				'percentage' => 'numeric',
				'red16' => 'numeric',
				'amber16' => 'numeric',
				'red12' => 'required|numeric',
				'amber12' => 'required|numeric',
				'red13' => 'required|numeric',
				'amber13' => 'required|numeric',
				'totaldedect' => 'numeric',
				'red14' => 'required|numeric',
				'amber14' => 'required|numeric',
				'remarks' => 'numeric',
				'scatch' => 'numeric',
				'test' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'production' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'sku' => 'sanitize_string',
				'wt1' => 'sanitize_string',
				'wt2' => 'sanitize_string',
				'wt3' => 'sanitize_string',
				'wt4' => 'sanitize_string',
				'wt5' => 'sanitize_string',
				'wt6' => 'sanitize_string',
				'wt7' => 'sanitize_string',
				'wt8' => 'sanitize_string',
				'wt9' => 'sanitize_string',
				'wt10' => 'sanitize_string',
				'wt11' => 'sanitize_string',
				'wt12' => 'sanitize_string',
				'wt13' => 'sanitize_string',
				'wt14' => 'sanitize_string',
				'wt15' => 'sanitize_string',
				'wt16' => 'sanitize_string',
				'wt17' => 'sanitize_string',
				'wt18' => 'sanitize_string',
				'wt19' => 'sanitize_string',
				'wt20' => 'sanitize_string',
				'wt21' => 'sanitize_string',
				'wt22' => 'sanitize_string',
				'wt23' => 'sanitize_string',
				'wt24' => 'sanitize_string',
				'wt25' => 'sanitize_string',
				'wt26' => 'sanitize_string',
				'wt27' => 'sanitize_string',
				'wt28' => 'sanitize_string',
				'wt29' => 'sanitize_string',
				'wt30' => 'sanitize_string',
				'wt31' => 'sanitize_string',
				'wt32' => 'sanitize_string',
				'wt33' => 'sanitize_string',
				'wt34' => 'sanitize_string',
				'wt35' => 'sanitize_string',
				'wt36' => 'sanitize_string',
				'wt37' => 'sanitize_string',
				'wt38' => 'sanitize_string',
				'wt39' => 'sanitize_string',
				'wt40' => 'sanitize_string',
				'wt41' => 'sanitize_string',
				'wt42' => 'sanitize_string',
				'wt43' => 'sanitize_string',
				'wt44' => 'sanitize_string',
				'wt45' => 'sanitize_string',
				'wt46' => 'sanitize_string',
				'wt47' => 'sanitize_string',
				'wt48' => 'sanitize_string',
				'wt49' => 'sanitize_string',
				'wt50' => 'sanitize_string',
				'wt51' => 'sanitize_string',
				'wt52' => 'sanitize_string',
				'wt53' => 'sanitize_string',
				'wt54' => 'sanitize_string',
				'wt55' => 'sanitize_string',
				'wt56' => 'sanitize_string',
				'wt57' => 'sanitize_string',
				'wt58' => 'sanitize_string',
				'wt59' => 'sanitize_string',
				'wt60' => 'sanitize_string',
				'wt61' => 'sanitize_string',
				'wt62' => 'sanitize_string',
				'wt63' => 'sanitize_string',
				'wt64' => 'sanitize_string',
				'wt65' => 'sanitize_string',
				'wt67' => 'sanitize_string',
				'wt68' => 'sanitize_string',
				'wt69' => 'sanitize_string',
				'wt70' => 'sanitize_string',
				'wt71' => 'sanitize_string',
				'wt72' => 'sanitize_string',
				'wt73' => 'sanitize_string',
				'wt74' => 'sanitize_string',
				'wt75' => 'sanitize_string',
				'wt76' => 'sanitize_string',
				'wt77' => 'sanitize_string',
				'wt78' => 'sanitize_string',
				'wt79' => 'sanitize_string',
				'wt80' => 'sanitize_string',
				'wt81' => 'sanitize_string',
				'wt82' => 'sanitize_string',
				'wt83' => 'sanitize_string',
				'wt84' => 'sanitize_string',
				'wt85' => 'sanitize_string',
				'wt86' => 'sanitize_string',
				'wt87' => 'sanitize_string',
				'wt88' => 'sanitize_string',
				'wt89' => 'sanitize_string',
				'wt90' => 'sanitize_string',
				'wt91' => 'sanitize_string',
				'wt92' => 'sanitize_string',
				'wt93' => 'sanitize_string',
				'wt94' => 'sanitize_string',
				'wt95' => 'sanitize_string',
				'wt96' => 'sanitize_string',
				'wt97' => 'sanitize_string',
				'wt98' => 'sanitize_string',
				'wt99' => 'sanitize_string',
				'wt100' => 'sanitize_string',
				'wt101' => 'sanitize_string',
				'wt102' => 'sanitize_string',
				'wt103' => 'sanitize_string',
				'wt104' => 'sanitize_string',
				'wt105' => 'sanitize_string',
				'wt106' => 'sanitize_string',
				'wt107' => 'sanitize_string',
				'wt108' => 'sanitize_string',
				'wt109' => 'sanitize_string',
				'wt110' => 'sanitize_string',
				'wt111' => 'sanitize_string',
				'wt112' => 'sanitize_string',
				'wt113' => 'sanitize_string',
				'wt114' => 'sanitize_string',
				'wt115' => 'sanitize_string',
				'wt116' => 'sanitize_string',
				'wt117' => 'sanitize_string',
				'wt118' => 'sanitize_string',
				'wt119' => 'sanitize_string',
				'wt120' => 'sanitize_string',
				'wt121' => 'sanitize_string',
				'wt122' => 'sanitize_string',
				'LEAKERS' => 'sanitize_string',
				'wt123' => 'sanitize_string',
				'wt124' => 'sanitize_string',
				'wt125' => 'sanitize_string',
				'wt126' => 'sanitize_string',
				'wt127' => 'sanitize_string',
				'wt128' => 'sanitize_string',
				'wt129' => 'sanitize_string',
				'wt130' => 'sanitize_string',
				'wt131' => 'sanitize_string',
				'wt132' => 'sanitize_string',
				'POUCH' => 'sanitize_string',
				'wt133' => 'sanitize_string',
				'wt134' => 'sanitize_string',
				'wt135' => 'sanitize_string',
				'wt136' => 'sanitize_string',
				'wt137' => 'sanitize_string',
				'wt138' => 'sanitize_string',
				'wt139' => 'sanitize_string',
				'wt140' => 'sanitize_string',
				'wt141' => 'sanitize_string',
				'wt142' => 'sanitize_string',
				'netx' => 'sanitize_string',
				'wt143' => 'sanitize_string',
				'netmin' => 'sanitize_string',
				'wt144' => 'sanitize_string',
				'sd' => 'sanitize_string',
				'wt145' => 'sanitize_string',
				'netmax' => 'sanitize_string',
				'wt146' => 'sanitize_string',
				'defects' => 'sanitize_string',
				'red' => 'sanitize_string',
				'amber' => 'sanitize_string',
				'sample' => 'sanitize_string',
				'leaker' => 'sanitize_string',
				'red1' => 'sanitize_string',
				'amber1' => 'sanitize_string',
				'damage' => 'sanitize_string',
				'red2' => 'sanitize_string',
				'amber2' => 'sanitize_string',
				'burntseal' => 'sanitize_string',
				'red3' => 'sanitize_string',
				'amber3' => 'sanitize_string',
				'wrinkeled' => 'sanitize_string',
				'red4' => 'sanitize_string',
				'amber4' => 'sanitize_string',
				'skiew' => 'sanitize_string',
				'red5' => 'sanitize_string',
				'amber5' => 'sanitize_string',
				'totaldefects' => 'sanitize_string',
				'red6' => 'sanitize_string',
				'amber6' => 'sanitize_string',
				'powder' => 'sanitize_string',
				'red7' => 'sanitize_string',
				'amber7' => 'sanitize_string',
				'sample1' => 'sanitize_string',
				'colour' => 'sanitize_string',
				'red8' => 'sanitize_string',
				'amber8' => 'sanitize_string',
				'perfume' => 'sanitize_string',
				'red9' => 'sanitize_string',
				'amber9' => 'sanitize_string',
				'foreignmat' => 'sanitize_string',
				'red10' => 'sanitize_string',
				'amber10' => 'sanitize_string',
				'unmixed' => 'sanitize_string',
				'red11' => 'sanitize_string',
				'amber11' => 'sanitize_string',
				'totaldef' => 'sanitize_string',
				'red15' => 'sanitize_string',
				'amber15' => 'sanitize_string',
				'percentage' => 'sanitize_string',
				'red16' => 'sanitize_string',
				'amber16' => 'sanitize_string',
				'pouchdef' => 'sanitize_string',
				'red12' => 'sanitize_string',
				'amber12' => 'sanitize_string',
				'powderdef' => 'sanitize_string',
				'red13' => 'sanitize_string',
				'amber13' => 'sanitize_string',
				'totaldedect' => 'sanitize_string',
				'red14' => 'sanitize_string',
				'amber14' => 'sanitize_string',
				'remarks' => 'sanitize_string',
				'rdata' => 'sanitize_string',
				'scatch' => 'sanitize_string',
				'test' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['signature'] = USER_NAME;
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("warehouse");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Warehouse Record";
		$this->render_view("warehouse/add.php");
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
		$fields = $this->fields = array("id","date","production","shift","sku","wt1","wt2","wt3","wt4","wt5","wt6","wt7","wt8","wt9","wt10","wt11","wt12","wt13","wt14","wt15","wt16","wt17","wt18","wt19","wt20","wt21","wt22","wt23","wt24","wt25","wt26","wt27","wt28","wt29","wt30","wt31","wt32","wt33","wt34","wt35","wt36","wt37","wt38","wt39","wt40","wt41","wt42","wt43","wt44","wt45","wt46","wt47","wt48","wt49","wt50","wt51","wt52","wt53","wt54","wt55","wt56","wt57","wt58","wt59","wt60","wt61","wt62","wt63","wt64","wt65","wt67","wt68","wt69","wt70","wt71","wt72","wt73","wt74","wt75","wt76","wt77","wt78","wt79","wt80","wt81","wt82","wt83","wt84","wt85","wt86","wt87","wt88","wt89","wt90","wt91","wt92","wt93","wt94","wt95","wt96","wt97","wt98","wt99","wt100","wt101","wt102","wt103","wt104","wt105","wt106","wt107","wt108","wt109","wt110","wt111","wt112","wt113","wt114","wt115","wt116","wt117","wt118","wt119","wt120","wt121","wt122","LEAKERS","wt123","wt124","wt125","wt126","wt127","wt128","wt129","wt130","wt131","wt132","POUCH","wt133","wt134","wt135","wt136","wt137","wt138","wt139","wt140","wt141","wt142","netx","wt143","netmin","wt144","sd","wt145","netmax","wt146","defects","red","amber","sample","leaker","red1","amber1","damage","red2","amber2","burntseal","red3","amber3","wrinkeled","red4","amber4","skiew","red5","amber5","totaldefects","red6","amber6","powder","red7","amber7","sample1","colour","red8","amber8","perfume","red9","amber9","foreignmat","red10","amber10","unmixed","red11","amber11","totaldef","red15","amber15","percentage","red16","amber16","pouchdef","red12","amber12","powderdef","red13","amber13","totaldedect","red14","amber14","remarks","rdata","scatch","test","signature");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date' => 'required',
				'production' => 'required',
				'shift' => 'required',
				'sku' => 'required',
				'wt1' => 'numeric',
				'wt2' => 'required|numeric',
				'wt3' => 'required|numeric',
				'wt4' => 'required|numeric',
				'wt5' => 'required|numeric',
				'wt6' => 'required|numeric',
				'wt7' => 'required|numeric',
				'wt8' => 'required|numeric',
				'wt9' => 'required|numeric',
				'wt10' => 'required|numeric',
				'wt11' => 'required|numeric',
				'wt12' => 'required|numeric',
				'wt13' => 'required|numeric',
				'wt14' => 'required|numeric',
				'wt15' => 'required|numeric',
				'wt16' => 'required|numeric',
				'wt17' => 'required|numeric',
				'wt18' => 'required|numeric',
				'wt19' => 'required|numeric',
				'wt20' => 'required|numeric',
				'wt21' => 'required|numeric',
				'wt22' => 'required|numeric',
				'wt23' => 'required|numeric',
				'wt24' => 'required|numeric',
				'wt25' => 'required|numeric',
				'wt26' => 'required|numeric',
				'wt27' => 'required|numeric',
				'wt28' => 'required|numeric',
				'wt29' => 'required|numeric',
				'wt30' => 'required|numeric',
				'wt31' => 'required|numeric',
				'wt32' => 'required|numeric',
				'wt33' => 'required|numeric',
				'wt34' => 'required|numeric',
				'wt35' => 'required|numeric',
				'wt36' => 'required|numeric',
				'wt37' => 'required|numeric',
				'wt38' => 'required|numeric',
				'wt39' => 'required|numeric',
				'wt40' => 'required|numeric',
				'wt41' => 'required|numeric',
				'wt42' => 'required|numeric',
				'wt43' => 'required|numeric',
				'wt44' => 'required|numeric',
				'wt45' => 'required|numeric',
				'wt46' => 'required|numeric',
				'wt47' => 'required|numeric',
				'wt48' => 'required|numeric',
				'wt49' => 'required|numeric',
				'wt50' => 'required|numeric',
				'wt51' => 'required|numeric',
				'wt52' => 'required|numeric',
				'wt53' => 'required|numeric',
				'wt54' => 'required|numeric',
				'wt55' => 'required|numeric',
				'wt56' => 'required|numeric',
				'wt57' => 'required|numeric',
				'wt58' => 'required|numeric',
				'wt59' => 'required|numeric',
				'wt60' => 'required|numeric',
				'wt61' => 'required|numeric',
				'wt62' => 'required|numeric',
				'wt63' => 'required|numeric',
				'wt64' => 'required|numeric',
				'wt65' => 'required|numeric',
				'wt67' => 'required|numeric',
				'wt68' => 'required|numeric',
				'wt69' => 'required|numeric',
				'wt70' => 'required|numeric',
				'wt71' => 'required|numeric',
				'wt72' => 'required|numeric',
				'wt73' => 'required|numeric',
				'wt74' => 'required|numeric',
				'wt75' => 'required|numeric',
				'wt76' => 'required|numeric',
				'wt77' => 'required|numeric',
				'wt78' => 'required|numeric',
				'wt79' => 'required|numeric',
				'wt80' => 'required|numeric',
				'wt81' => 'required|numeric',
				'wt82' => 'required|numeric',
				'wt83' => 'required|numeric',
				'wt84' => 'required|numeric',
				'wt85' => 'required|numeric',
				'wt86' => 'required|numeric',
				'wt87' => 'required|numeric',
				'wt88' => 'required|numeric',
				'wt89' => 'required|numeric',
				'wt90' => 'required|numeric',
				'wt91' => 'required|numeric',
				'wt92' => 'required|numeric',
				'wt93' => 'required|numeric',
				'wt94' => 'required|numeric',
				'wt95' => 'required|numeric',
				'wt96' => 'required|numeric',
				'wt97' => 'required|numeric',
				'wt98' => 'required|numeric',
				'wt99' => 'required|numeric',
				'wt100' => 'required|numeric',
				'wt101' => 'required|numeric',
				'wt102' => 'required|numeric',
				'wt103' => 'required|numeric',
				'wt104' => 'required|numeric',
				'wt105' => 'required|numeric',
				'wt106' => 'required|numeric',
				'wt107' => 'required|numeric',
				'wt108' => 'required|numeric',
				'wt109' => 'required|numeric',
				'wt110' => 'required|numeric',
				'wt111' => 'required|numeric',
				'wt112' => 'required|numeric',
				'wt113' => 'required|numeric',
				'wt114' => 'required|numeric',
				'wt115' => 'required|numeric',
				'wt116' => 'required|numeric',
				'wt117' => 'required|numeric',
				'wt118' => 'required|numeric',
				'wt119' => 'required|numeric',
				'wt120' => 'required|numeric',
				'wt121' => 'required|numeric',
				'wt122' => 'required|numeric',
				'wt123' => 'required|numeric',
				'wt124' => 'required|numeric',
				'wt125' => 'required|numeric',
				'wt126' => 'required|numeric',
				'wt127' => 'required|numeric',
				'wt128' => 'required|numeric',
				'wt129' => 'required|numeric',
				'wt130' => 'required|numeric',
				'wt131' => 'required|numeric',
				'wt132' => 'required|numeric',
				'wt133' => 'required|numeric',
				'wt134' => 'required|numeric',
				'wt135' => 'required|numeric',
				'wt136' => 'required|numeric',
				'wt137' => 'required|numeric',
				'wt138' => 'required|numeric',
				'wt139' => 'required|numeric',
				'wt140' => 'required|numeric',
				'wt141' => 'required|numeric',
				'wt142' => 'required|numeric',
				'wt143' => 'required',
				'wt144' => 'required',
				'wt145' => 'required',
				'netmax' => 'numeric',
				'wt146' => 'required',
				'sample' => 'required',
				'leaker' => 'numeric',
				'red1' => 'required|numeric',
				'amber1' => 'required|numeric',
				'damage' => 'numeric',
				'red2' => 'required|numeric',
				'amber2' => 'required|numeric',
				'burntseal' => 'numeric',
				'red3' => 'required|numeric',
				'amber3' => 'required|numeric',
				'wrinkeled' => 'numeric',
				'red4' => 'required|numeric',
				'amber4' => 'required|numeric',
				'skiew' => 'numeric',
				'red5' => 'required|numeric',
				'amber5' => 'required|numeric',
				'totaldefects' => 'numeric',
				'red6' => 'required|numeric',
				'amber6' => 'required|numeric',
				'sample1' => 'required',
				'red8' => 'required|numeric',
				'amber8' => 'required|numeric',
				'red9' => 'required',
				'amber9' => 'required',
				'red10' => 'required|numeric',
				'amber10' => 'required|numeric',
				'red11' => 'required|numeric',
				'amber11' => 'required|numeric',
				'totaldef' => 'numeric',
				'red15' => 'required|numeric',
				'amber15' => 'required|numeric',
				'percentage' => 'numeric',
				'red16' => 'numeric',
				'amber16' => 'numeric',
				'red12' => 'required|numeric',
				'amber12' => 'required|numeric',
				'red13' => 'required|numeric',
				'amber13' => 'required|numeric',
				'totaldedect' => 'numeric',
				'red14' => 'required|numeric',
				'amber14' => 'required|numeric',
				'remarks' => 'numeric',
				'scatch' => 'numeric',
				'test' => 'required',
			);
			$this->sanitize_array = array(
				'date' => 'sanitize_string',
				'production' => 'sanitize_string',
				'shift' => 'sanitize_string',
				'sku' => 'sanitize_string',
				'wt1' => 'sanitize_string',
				'wt2' => 'sanitize_string',
				'wt3' => 'sanitize_string',
				'wt4' => 'sanitize_string',
				'wt5' => 'sanitize_string',
				'wt6' => 'sanitize_string',
				'wt7' => 'sanitize_string',
				'wt8' => 'sanitize_string',
				'wt9' => 'sanitize_string',
				'wt10' => 'sanitize_string',
				'wt11' => 'sanitize_string',
				'wt12' => 'sanitize_string',
				'wt13' => 'sanitize_string',
				'wt14' => 'sanitize_string',
				'wt15' => 'sanitize_string',
				'wt16' => 'sanitize_string',
				'wt17' => 'sanitize_string',
				'wt18' => 'sanitize_string',
				'wt19' => 'sanitize_string',
				'wt20' => 'sanitize_string',
				'wt21' => 'sanitize_string',
				'wt22' => 'sanitize_string',
				'wt23' => 'sanitize_string',
				'wt24' => 'sanitize_string',
				'wt25' => 'sanitize_string',
				'wt26' => 'sanitize_string',
				'wt27' => 'sanitize_string',
				'wt28' => 'sanitize_string',
				'wt29' => 'sanitize_string',
				'wt30' => 'sanitize_string',
				'wt31' => 'sanitize_string',
				'wt32' => 'sanitize_string',
				'wt33' => 'sanitize_string',
				'wt34' => 'sanitize_string',
				'wt35' => 'sanitize_string',
				'wt36' => 'sanitize_string',
				'wt37' => 'sanitize_string',
				'wt38' => 'sanitize_string',
				'wt39' => 'sanitize_string',
				'wt40' => 'sanitize_string',
				'wt41' => 'sanitize_string',
				'wt42' => 'sanitize_string',
				'wt43' => 'sanitize_string',
				'wt44' => 'sanitize_string',
				'wt45' => 'sanitize_string',
				'wt46' => 'sanitize_string',
				'wt47' => 'sanitize_string',
				'wt48' => 'sanitize_string',
				'wt49' => 'sanitize_string',
				'wt50' => 'sanitize_string',
				'wt51' => 'sanitize_string',
				'wt52' => 'sanitize_string',
				'wt53' => 'sanitize_string',
				'wt54' => 'sanitize_string',
				'wt55' => 'sanitize_string',
				'wt56' => 'sanitize_string',
				'wt57' => 'sanitize_string',
				'wt58' => 'sanitize_string',
				'wt59' => 'sanitize_string',
				'wt60' => 'sanitize_string',
				'wt61' => 'sanitize_string',
				'wt62' => 'sanitize_string',
				'wt63' => 'sanitize_string',
				'wt64' => 'sanitize_string',
				'wt65' => 'sanitize_string',
				'wt67' => 'sanitize_string',
				'wt68' => 'sanitize_string',
				'wt69' => 'sanitize_string',
				'wt70' => 'sanitize_string',
				'wt71' => 'sanitize_string',
				'wt72' => 'sanitize_string',
				'wt73' => 'sanitize_string',
				'wt74' => 'sanitize_string',
				'wt75' => 'sanitize_string',
				'wt76' => 'sanitize_string',
				'wt77' => 'sanitize_string',
				'wt78' => 'sanitize_string',
				'wt79' => 'sanitize_string',
				'wt80' => 'sanitize_string',
				'wt81' => 'sanitize_string',
				'wt82' => 'sanitize_string',
				'wt83' => 'sanitize_string',
				'wt84' => 'sanitize_string',
				'wt85' => 'sanitize_string',
				'wt86' => 'sanitize_string',
				'wt87' => 'sanitize_string',
				'wt88' => 'sanitize_string',
				'wt89' => 'sanitize_string',
				'wt90' => 'sanitize_string',
				'wt91' => 'sanitize_string',
				'wt92' => 'sanitize_string',
				'wt93' => 'sanitize_string',
				'wt94' => 'sanitize_string',
				'wt95' => 'sanitize_string',
				'wt96' => 'sanitize_string',
				'wt97' => 'sanitize_string',
				'wt98' => 'sanitize_string',
				'wt99' => 'sanitize_string',
				'wt100' => 'sanitize_string',
				'wt101' => 'sanitize_string',
				'wt102' => 'sanitize_string',
				'wt103' => 'sanitize_string',
				'wt104' => 'sanitize_string',
				'wt105' => 'sanitize_string',
				'wt106' => 'sanitize_string',
				'wt107' => 'sanitize_string',
				'wt108' => 'sanitize_string',
				'wt109' => 'sanitize_string',
				'wt110' => 'sanitize_string',
				'wt111' => 'sanitize_string',
				'wt112' => 'sanitize_string',
				'wt113' => 'sanitize_string',
				'wt114' => 'sanitize_string',
				'wt115' => 'sanitize_string',
				'wt116' => 'sanitize_string',
				'wt117' => 'sanitize_string',
				'wt118' => 'sanitize_string',
				'wt119' => 'sanitize_string',
				'wt120' => 'sanitize_string',
				'wt121' => 'sanitize_string',
				'wt122' => 'sanitize_string',
				'LEAKERS' => 'sanitize_string',
				'wt123' => 'sanitize_string',
				'wt124' => 'sanitize_string',
				'wt125' => 'sanitize_string',
				'wt126' => 'sanitize_string',
				'wt127' => 'sanitize_string',
				'wt128' => 'sanitize_string',
				'wt129' => 'sanitize_string',
				'wt130' => 'sanitize_string',
				'wt131' => 'sanitize_string',
				'wt132' => 'sanitize_string',
				'POUCH' => 'sanitize_string',
				'wt133' => 'sanitize_string',
				'wt134' => 'sanitize_string',
				'wt135' => 'sanitize_string',
				'wt136' => 'sanitize_string',
				'wt137' => 'sanitize_string',
				'wt138' => 'sanitize_string',
				'wt139' => 'sanitize_string',
				'wt140' => 'sanitize_string',
				'wt141' => 'sanitize_string',
				'wt142' => 'sanitize_string',
				'netx' => 'sanitize_string',
				'wt143' => 'sanitize_string',
				'netmin' => 'sanitize_string',
				'wt144' => 'sanitize_string',
				'sd' => 'sanitize_string',
				'wt145' => 'sanitize_string',
				'netmax' => 'sanitize_string',
				'wt146' => 'sanitize_string',
				'defects' => 'sanitize_string',
				'red' => 'sanitize_string',
				'amber' => 'sanitize_string',
				'sample' => 'sanitize_string',
				'leaker' => 'sanitize_string',
				'red1' => 'sanitize_string',
				'amber1' => 'sanitize_string',
				'damage' => 'sanitize_string',
				'red2' => 'sanitize_string',
				'amber2' => 'sanitize_string',
				'burntseal' => 'sanitize_string',
				'red3' => 'sanitize_string',
				'amber3' => 'sanitize_string',
				'wrinkeled' => 'sanitize_string',
				'red4' => 'sanitize_string',
				'amber4' => 'sanitize_string',
				'skiew' => 'sanitize_string',
				'red5' => 'sanitize_string',
				'amber5' => 'sanitize_string',
				'totaldefects' => 'sanitize_string',
				'red6' => 'sanitize_string',
				'amber6' => 'sanitize_string',
				'powder' => 'sanitize_string',
				'red7' => 'sanitize_string',
				'amber7' => 'sanitize_string',
				'sample1' => 'sanitize_string',
				'colour' => 'sanitize_string',
				'red8' => 'sanitize_string',
				'amber8' => 'sanitize_string',
				'perfume' => 'sanitize_string',
				'red9' => 'sanitize_string',
				'amber9' => 'sanitize_string',
				'foreignmat' => 'sanitize_string',
				'red10' => 'sanitize_string',
				'amber10' => 'sanitize_string',
				'unmixed' => 'sanitize_string',
				'red11' => 'sanitize_string',
				'amber11' => 'sanitize_string',
				'totaldef' => 'sanitize_string',
				'red15' => 'sanitize_string',
				'amber15' => 'sanitize_string',
				'percentage' => 'sanitize_string',
				'red16' => 'sanitize_string',
				'amber16' => 'sanitize_string',
				'pouchdef' => 'sanitize_string',
				'red12' => 'sanitize_string',
				'amber12' => 'sanitize_string',
				'powderdef' => 'sanitize_string',
				'red13' => 'sanitize_string',
				'amber13' => 'sanitize_string',
				'totaldedect' => 'sanitize_string',
				'red14' => 'sanitize_string',
				'amber14' => 'sanitize_string',
				'remarks' => 'sanitize_string',
				'rdata' => 'sanitize_string',
				'scatch' => 'sanitize_string',
				'test' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['signature'] = USER_NAME;
			if($this->validated()){
				$db->where("warehouse.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("warehouse");
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
						return	$this->redirect("warehouse");
					}
				}
			}
		}
		$db->where("warehouse.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Warehouse";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("warehouse/edit.php", $data);
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
		$db->where("warehouse.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("warehouse");
	}
}
