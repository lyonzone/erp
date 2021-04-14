<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("dar/add");
$can_edit = ACL::is_allowed("dar/edit");
$can_view = ACL::is_allowed("dar/view");
$can_delete = ACL::is_allowed("dar/delete");
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
                    <h4 class="record-title">View  Dar</h4>
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
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="date" 
                                                data-title="Enter Date" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-shift">
                                        <th class="title"> Shift: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="shift" 
                                                data-title="Enter Shift" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['shift']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-sln">
                                        <th class="title"> Sln: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['sln']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="sln" 
                                                data-title="Enter Sln" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['sln']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-time">
                                        <th class="title"> Time: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['time']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="time" 
                                                data-title="Enter Time" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="time" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['time']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-vct">
                                        <th class="title"> Vct: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-step="0.1" 
                                                data-value="<?php echo $data['vct']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="vct" 
                                                data-title="Enter Vct" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['vct']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-uct">
                                        <th class="title"> Uct: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['uct']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="uct" 
                                                data-title="Enter Uct" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['uct']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ph">
                                        <th class="title"> Ph: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-step="0.1" 
                                                data-value="<?php echo $data['ph']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ph" 
                                                data-title="Enter Ph" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ph']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dfr">
                                        <th class="title"> Dfr: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-step="0.1" 
                                                data-value="<?php echo $data['dfr']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dfr" 
                                                data-title="Enter Dfr" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dfr']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-bd">
                                        <th class="title"> Bd: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-step="0.1" 
                                                data-value="<?php echo $data['bd']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="bd" 
                                                data-title="Enter Bd" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['bd']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-time1">
                                        <th class="title"> Time1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['time1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="time1" 
                                                data-title="Enter Time1" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="time" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['time1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-sample">
                                        <th class="title"> Sample: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="sample" 
                                                data-title="Enter Sample" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['sample']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-descr">
                                        <th class="title"> Descr: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="descr" 
                                                data-title="Enter Descr" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['descr']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-result">
                                        <th class="title"> Result: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="result" 
                                                data-title="Enter Result" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['result']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-rod1">
                                        <th class="title"> Rod1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="rod1" 
                                                data-title="Enter Rod1" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['rod1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-rod2">
                                        <th class="title"> Rod2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="rod2" 
                                                data-title="Enter Rod2" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['rod2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-alkalinity">
                                        <th class="title"> Alkalinity: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-step="0.1" 
                                                data-value="<?php echo $data['alkalinity']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="alkalinity" 
                                                data-title="Enter Alkalinity" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['alkalinity']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-zeolity">
                                        <th class="title"> Zeolity: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-step="0.1" 
                                                data-value="<?php echo $data['zeolity']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="zeolity" 
                                                data-title="Enter Zeolity" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['zeolity']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-avdye">
                                        <th class="title"> Avdye: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-step="0.1" 
                                                data-value="<?php echo $data['avdye']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="avdye" 
                                                data-title="Enter Avdye" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['avdye']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-checked">
                                        <th class="title"> Checked: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['checked']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="checked" 
                                                data-title="Enter Checked" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['checked']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-sku">
                                        <th class="title"> Sku: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['sku']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="sku" 
                                                data-title="Enter Sku" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['sku']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-sku1">
                                        <th class="title"> Sku1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['sku1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="sku1" 
                                                data-title="Enter Sku1" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['sku1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-sku3">
                                        <th class="title"> Sku3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['sku3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="sku3" 
                                                data-title="Enter Sku3" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['sku3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-signature">
                                        <th class="title"> Signature: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['signature']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("dar/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="signature" 
                                                data-title="Enter Signature" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['signature']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("dar/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("dar/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
