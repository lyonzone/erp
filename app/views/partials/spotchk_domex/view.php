<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("spotchk_domex/add");
$can_edit = ACL::is_allowed("spotchk_domex/edit");
$can_view = ACL::is_allowed("spotchk_domex/view");
$can_delete = ACL::is_allowed("spotchk_domex/delete");
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
                    <h4 class="record-title">View  Spotchk Domex</h4>
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
                                    <tr  class="td-pcp_no">
                                        <th class="title"> Pcp No: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['pcp_no']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_domex/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pcp_no" 
                                                data-title="Enter Pcp No" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pcp_no']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-part">
                                        <th class="title"> Part: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['part']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_domex/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="part" 
                                                data-title="Enter Part" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['part']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-pcp_dt">
                                        <th class="title"> Pcp Dt: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['pcp_dt']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_domex/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pcp_dt" 
                                                data-title="Enter Pcp Dt" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pcp_dt']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-product">
                                        <th class="title"> Product: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/spotchk_domex_product_option_list'); ?>' 
                                                data-value="<?php echo $data['product']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_domex/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="product" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['product']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-batch_size">
                                        <th class="title"> Batch Size: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['batch_size']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_domex/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="batch_size" 
                                                data-title="Enter Batch Size" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['batch_size']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-target_ad">
                                        <th class="title"> Target Ad: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['target_ad']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_domex/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="target_ad" 
                                                data-title="Enter Target Ad" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['target_ad']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-target_mc">
                                        <th class="title"> Target Mc: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['target_mc']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_domex/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="target_mc" 
                                                data-title="Enter Target Mc" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['target_mc']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-date_time">
                                        <th class="title"> Date Time: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y H:i:s', minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date_time']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_domex/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="date_time" 
                                                data-title="Enter Date Time" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date_time']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-shift">
                                        <th class="title"> Shift: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/spotchk_domex_shift_option_list'); ?>' 
                                                data-value="<?php echo $data['shift']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_domex/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="shift" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['shift']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-mixer_optr">
                                        <th class="title"> Mixer Optr: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['mixer_optr']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_domex/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="mixer_optr" 
                                                data-title="Enter Mixer Optr" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['mixer_optr']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-submitted_by">
                                        <th class="title"> Submitted By: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['submitted_by']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_domex/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="submitted_by" 
                                                data-title="Enter Submitted By" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['submitted_by']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-addition">
                                        <th class="title"> Addition: </th>
                                        <td class="value">
                                            <?php
                                            $page_fields = array('datetime' => $data['date_time'],'shift' => $data['shift'],'product' => $data['product']);
                                            $page_link = "masterdetail/index/spotchk_domex/spotchk_domexad/datetime/" . urlencode($data['date_time']);
                                            $md_pagelink = set_page_link($page_link, $page_fields); 
                                            ?>
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link($md_pagelink) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['addition'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-summary">
                                        <th class="title"> Summary: </th>
                                        <td class="value">
                                            <?php
                                            $page_fields = array('datetime' => $data['date_time'],'shift' => $data['shift'],'product' => $data['product']);
                                            $page_link = "masterdetail/index/spotchk_domex/spotchk_domexsum/datetime/" . urlencode($data['date_time']);
                                            $md_pagelink = set_page_link($page_link, $page_fields); 
                                            ?>
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link($md_pagelink) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['summary'] ?>
                                            </a>
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("spotchk_domex/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("spotchk_domex/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
