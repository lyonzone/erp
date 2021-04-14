<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("lab/add");
$can_edit = ACL::is_allowed("lab/edit");
$can_view = ACL::is_allowed("lab/view");
$can_delete = ACL::is_allowed("lab/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Dashboard</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_etpwateranalysysregister();  ?>
                    <a class="animated zoomIn record-count alert alert-info"  href="<?php print_link("etp/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-bullseye "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">ETP Water Analysys Register</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_qualityincidentregister();  ?>
                    <a class="animated zoomIn record-count card bg-success text-white"  href="<?php print_link("qir/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-barcode "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Quality Incident Register</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_acidcirculationregister();  ?>
                    <a class="animated zoomIn record-count card bg-danger text-white"  href="<?php print_link("acr/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-asterisk "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Acid Circulation Register</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_storagesamplerecord();  ?>
                    <a class="animated zoomIn record-count alert alert-info"  href="<?php print_link("ssr/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-area-chart "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Storage Sample Record</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_dailyanalysisregister();  ?>
                    <a class="animated zoomIn record-count alert alert-warning"  href="<?php print_link("dar/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Daily Analysis Register</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_pcroregister();  ?>
                    <a class="animated zoomIn record-count alert alert-warning"  href="<?php print_link("pcro/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-anchor "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">PCRO Register</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_warehousecheckingregister();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("warehouse/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-wordpress "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Warehouse Checking Register</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_holdlotinspection();  ?>
                    <a class="animated zoomIn record-count card bg-success text-white"  href="<?php print_link("hold/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Hold Lot Inspection</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_crqsregister();  ?>
                    <a class="animated zoomIn record-count card bg-dark text-white"  href="<?php print_link("crqs/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">CRQS Register</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
