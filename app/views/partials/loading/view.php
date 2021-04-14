<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("loading/add");
$can_edit = ACL::is_allowed("loading/edit");
$can_view = ACL::is_allowed("loading/view");
$can_delete = ACL::is_allowed("loading/delete");
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
                    <h4 class="record-title">View  Loading</h4>
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
                                    <tr  class="td-date">
                                        <th class="title"> Date: </th>
                                        <td class="value">
                                            <?php
                                            $page_fields = array('date' => $data['date'],'vehicle' => $data['vehicle']);
                                            $page_link = "masterdetail/index/loading/bill_materials/vehicle/" . urlencode($data['vehicle']);
                                            $md_pagelink = set_page_link($page_link, $page_fields); 
                                            ?>
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link($md_pagelink) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['date'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-vehicle">
                                        <th class="title"> Vehicle: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['vehicle']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="vehicle" 
                                                data-title="Enter Vehicle" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['vehicle']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wheels">
                                        <th class="title"> Wheels: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/loading_wheels_option_list'); ?>' 
                                                data-value="<?php echo $data['wheels']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wheels" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wheels']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-texit">
                                        <th class="title"> Texit: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['texit']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="texit" 
                                                data-title="Enter Truck Exit" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['texit']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-texit_time">
                                        <th class="title"> Texit Time: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y H:i:s', minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['texit_time']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="texit_time" 
                                                data-title="Enter Texit Time" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['texit_time']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-material_details">
                                        <th class="title"> Material Details: </th>
                                        <td class="value">
                                            <?php
                                            $page_fields = array('date' => $data['date'],'vehicle' => $data['vehicle']);
                                            $page_link = "masterdetail/index/loading/bill_materials/date/" . urlencode($data['date']);
                                            $md_pagelink = set_page_link($page_link, $page_fields); 
                                            ?>
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link($md_pagelink) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['material_details'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-checksheet">
                                        <th class="title"> Checksheet: </th>
                                        <td class="value">
                                            <?php
                                            $page_fields = array('transporter' => $data['transport'],'date' => $data['date'],'vehicle' => $data['vehicle'],'check11_1' => $data['dl_dt'],'check15' => $data['polution_dt'],'check16' => $data['insurance'],'check17' => $data['fitness'],'check18' => $data['roadtax'],'check19' => $data['mobile'],'check15_1' => $data['polution_no']);
                                            $page_link = "masterdetail/index/loading/lorry/date/" . urlencode($data['date']);
                                            $md_pagelink = set_page_link($page_link, $page_fields); 
                                            ?>
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link($md_pagelink) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['checksheet'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-transport">
                                        <th class="title"> Transport: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/loading_transport_option_list'); ?>' 
                                                data-value="<?php echo $data['transport']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="transport" 
                                                data-title="Enter Transport" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['transport']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-depot">
                                        <th class="title"> Depot: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/loading_depot_option_list'); ?>' 
                                                data-value="<?php echo $data['depot']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="depot" 
                                                data-title="Enter Depot" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['depot']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-valid_lic">
                                        <th class="title"> Valid Lic: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['valid_lic']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="valid_lic" 
                                                data-title="Enter Driving licence No" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['valid_lic']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dl_dt">
                                        <th class="title"> Dl Dt: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['dl_dt']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dl_dt" 
                                                data-title="Enter Dl Dt" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dl_dt']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-insurance">
                                        <th class="title"> Insurance: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['insurance']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="insurance" 
                                                data-title="Enter Insurance" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['insurance']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-polution_no">
                                        <th class="title"> Polution No: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['polution_no']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="polution_no" 
                                                data-title="Enter Polution No" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['polution_no']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-polution_dt">
                                        <th class="title"> Polution Dt: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['polution_dt']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="polution_dt" 
                                                data-title="Enter Polution Dt" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['polution_dt']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-fitness">
                                        <th class="title"> Fitness: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['fitness']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="fitness" 
                                                data-title="Enter Fitness" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['fitness']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-roadtax">
                                        <th class="title"> Roadtax: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['roadtax']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="roadtax" 
                                                data-title="Enter Roadtax" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['roadtax']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-driver">
                                        <th class="title"> Driver: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['driver']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="driver" 
                                                data-title="Enter Driver" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['driver']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-mobile">
                                        <th class="title"> Mobile: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['mobile']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("loading/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="mobile" 
                                                data-title="Enter Mobile" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['mobile']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("loading/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("loading/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
