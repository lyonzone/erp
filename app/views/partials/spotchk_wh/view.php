<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("spotchk_wh/add");
$can_edit = ACL::is_allowed("spotchk_wh/edit");
$can_view = ACL::is_allowed("spotchk_wh/view");
$can_delete = ACL::is_allowed("spotchk_wh/delete");
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
                    <h4 class="record-title">View  Spotchk Wh</h4>
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
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
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
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['shift']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="shift" 
                                                data-title="Enter Shift" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['shift']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-addition">
                                        <th class="title"> Addition: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $addition); ?>' 
                                                data-value="<?php echo $data['addition']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="addition" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['addition']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-soda">
                                        <th class="title"> SODA ASH IN Kg.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['soda']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="soda" 
                                                data-title="Enter SODA ASH IN Kg." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['soda']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-salt_pvd">
                                        <th class="title"> Salt in Kg. | PVD: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['salt_pvd']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="salt_pvd" 
                                                data-title="Enter Salt in Kg. | PVD" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['salt_pvd']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-sul_tinopal">
                                        <th class="title"> Sulphonic Acid + Tinopal Water: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['sul_tinopal']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="sul_tinopal" 
                                                data-title="Enter Sulphonic Acid + Tinopal Water" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['sul_tinopal']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-flow_aid">
                                        <th class="title"> White PAS in Kg.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['flow_aid']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="flow_aid" 
                                                data-title="Enter White PAS in Kg." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['flow_aid']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-dolomite">
                                        <th class="title"> Dolomite in Kg.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['dolomite']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dolomite" 
                                                data-title="Enter Dolomite in Kg." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['dolomite']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-forcal_u">
                                        <th class="title"> Forcal U in Kg.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['forcal_u']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="forcal_u" 
                                                data-title="Enter Forcal U in Kg." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['forcal_u']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-orange_sp">
                                        <th class="title"> Orange Specle in Kg.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['orange_sp']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="orange_sp" 
                                                data-title="Enter Orange Specle in Kg." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['orange_sp']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-blue_sp">
                                        <th class="title"> Blue Specle in Kg.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['blue_sp']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="blue_sp" 
                                                data-title="Enter Blue Specle in Kg." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['blue_sp']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-perfume">
                                        <th class="title"> Perfume in Kg.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['perfume']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="perfume" 
                                                data-title="Enter Perfume in Kg." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['perfume']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-water">
                                        <th class="title"> Water in Ltr: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['water']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="water" 
                                                data-title="Enter Water in Ltr" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['water']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-blutton_c">
                                        <th class="title"> Blutton-C in Kg.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['blutton_c']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="blutton_c" 
                                                data-title="Enter Blutton-C in Kg." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['blutton_c']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-mes">
                                        <th class="title"> MES in Kg.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['mes']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="mes" 
                                                data-title="Enter MES in Kg." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['mes']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-disc_wt">
                                        <th class="title"> Weight of the Disk: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['disc_wt']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="disc_wt" 
                                                data-title="Enter Weight of the Disk" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['disc_wt']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-disc_samplewt">
                                        <th class="title"> Weight of the Disk+Sample: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['disc_samplewt']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="disc_samplewt" 
                                                data-title="Enter Weight of the Disk+Sample" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['disc_samplewt']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wtloss_dry">
                                        <th class="title"> Weight Loss after Drying: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wtloss_dry']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wtloss_dry" 
                                                data-title="Enter Weight Loss after Drying" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wtloss_dry']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-submitted_by">
                                        <th class="title"> Submitted By: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['submitted_by']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("spotchk_wh/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("spotchk_wh/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
