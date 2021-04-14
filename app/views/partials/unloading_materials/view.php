<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("unloading_materials/add");
$can_edit = ACL::is_allowed("unloading_materials/edit");
$can_view = ACL::is_allowed("unloading_materials/view");
$can_delete = ACL::is_allowed("unloading_materials/delete");
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
                    <h4 class="record-title">View  Unloading Materials</h4>
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
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['date']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="date" 
                                                data-title="Enter Date" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-bill">
                                        <th class="title"> Bill: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['bill']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="bill" 
                                                data-title="Enter Bill" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['bill']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-bill_dt">
                                        <th class="title"> Bill Dt: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['bill_dt']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="bill_dt" 
                                                data-title="Enter Bill Dt" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['bill_dt']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-supplier">
                                        <th class="title"> Supplier: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/unloading_materials_supplier_option_list'); ?>' 
                                                data-value="<?php echo $data['supplier']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="supplier" 
                                                data-title="Enter Supplier" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['supplier']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-material_name">
                                        <th class="title"> Material Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/unloading_materials_material_name_option_list'); ?>' 
                                                data-value="<?php echo $data['material_name']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="material_name" 
                                                data-title="Enter Material Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['material_name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-material_type">
                                        <th class="title"> Material Type: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $material_type); ?>' 
                                                data-value="<?php echo $data['material_type']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="material_type" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['material_type']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-bags">
                                        <th class="title"> Unit: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $bags); ?>' 
                                                data-value="<?php echo $data['bags']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="bags" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['bags']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-qnty">
                                        <th class="title"> Qnty: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['qnty']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="qnty" 
                                                data-title="Enter Qnty" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['qnty']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-vehicle">
                                        <th class="title"> Vehicle: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['vehicle']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-basic_price">
                                        <th class="title"> Basic Price: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['basic_price']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="basic_price" 
                                                data-title="Enter Basic Price" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['basic_price']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amount">
                                        <th class="title"> Amount: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amount']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amount" 
                                                data-title="Enter Amount" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amount']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-coa">
                                        <th class="title"> Coa: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $coa); ?>' 
                                                data-value="<?php echo $data['coa']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="coa" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['coa']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-inventory">
                                        <th class="title"> Inventory: </th>
                                        <td class="value">
                                            <?php
                                            $page_fields = array('date' => $data['date'],'truck' => $data['vehicle'],'transporter' => $data['transporter'],'bill' => $data['bill'],'supplier' => $data['supplier'],'bill_dt' => $data['bill_dt'],'mat' => $data['material_name'],'qty' => $data['qnty'],'material_type' => $data['material_type']);
                                            $page_link = "masterdetail/index/unloading_materials/inv/date/" . urlencode($data['date']);
                                            $md_pagelink = set_page_link($page_link, $page_fields); 
                                            ?>
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link($md_pagelink) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['inventory'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-total_amount">
                                        <th class="title"> Total Amount: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['total_amount']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="total_amount" 
                                                data-title="Enter Total Amount" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['total_amount']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-transporter">
                                        <th class="title"> Transporter: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['transporter']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("unloading_materials/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="transporter" 
                                                data-title="Enter Transporter" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['transporter']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("unloading_materials/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("unloading_materials/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
