<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("g1_base_powder_china/add");
$can_edit = ACL::is_allowed("g1_base_powder_china/edit");
$can_view = ACL::is_allowed("g1_base_powder_china/view");
$can_delete = ACL::is_allowed("g1_base_powder_china/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  G1 Base Powder China</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-TRUCK_ENTRY">
                                        <th class="title"> Truck Entry: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['TRUCK_ENTRY']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="TRUCK_ENTRY" 
                                                data-title="Enter Truck Entry" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['TRUCK_ENTRY']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-MOISTURE">
                                        <th class="title"> Moisture: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['MOISTURE']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="MOISTURE" 
                                                data-title="Enter Moisture" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['MOISTURE']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-PH">
                                        <th class="title"> Ph: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['PH']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="PH" 
                                                data-title="Enter Ph" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['PH']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-DFR">
                                        <th class="title"> Dfr: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['DFR']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="DFR" 
                                                data-title="Enter Dfr" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['DFR']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-UCT">
                                        <th class="title"> Uct: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['UCT']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="UCT" 
                                                data-title="Enter Uct" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['UCT']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-SAMPLE_WT_Ingm">
                                        <th class="title"> Sample Wt Ingm: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['SAMPLE_WT_Ingm']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="SAMPLE_WT_Ingm" 
                                                data-title="Enter Sample Wt Ingm" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['SAMPLE_WT_Ingm']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-VOL_IN_MC">
                                        <th class="title"> Vol In Mc: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['VOL_IN_MC']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="VOL_IN_MC" 
                                                data-title="Enter Vol In Mc" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['VOL_IN_MC']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-HYAMINE_FACTOR">
                                        <th class="title"> Hyamine Factor: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['HYAMINE_FACTOR']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="HYAMINE_FACTOR" 
                                                data-title="Enter Hyamine Factor" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['HYAMINE_FACTOR']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-AD_5">
                                        <th class="title"> Ad 5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['AD_5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="AD_5" 
                                                data-title="Enter Ad 5" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['AD_5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-PASSING_THROUGH_85">
                                        <th class="title"> Passing Through 85: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['PASSING_THROUGH_85']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="PASSING_THROUGH_85" 
                                                data-title="Enter Passing Through 85" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['PASSING_THROUGH_85']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-SIGN_OF_CHEMIST">
                                        <th class="title"> Sign Of Chemist: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['SIGN_OF_CHEMIST']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="SIGN_OF_CHEMIST" 
                                                data-title="Enter Sign Of Chemist" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['SIGN_OF_CHEMIST']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-SIGN_OF_AUTHORISE">
                                        <th class="title"> Sign Of Authorise: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['SIGN_OF_AUTHORISE']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("g1_base_powder_china/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="SIGN_OF_AUTHORISE" 
                                                data-title="Enter Sign Of Authorise" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['SIGN_OF_AUTHORISE']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                            </a>
                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                </a>
                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                    </a>
                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("g1_base_powder_china/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("g1_base_powder_china/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
