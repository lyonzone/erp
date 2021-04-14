<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("t_blend_savinase_stainzyme_lipex_mannaway/add");
$can_edit = ACL::is_allowed("t_blend_savinase_stainzyme_lipex_mannaway/edit");
$can_view = ACL::is_allowed("t_blend_savinase_stainzyme_lipex_mannaway/view");
$can_delete = ACL::is_allowed("t_blend_savinase_stainzyme_lipex_mannaway/delete");
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
                    <h4 class="record-title">View  T Blend Savinase Stainzyme Lipex Mannaway</h4>
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
                                    <tr  class="td-truck_entry">
                                        <th class="title"> Truck Entry: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['truck_entry']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="truck_entry" 
                                                data-title="Enter Truck Entry" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['truck_entry']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-PRATICLE_SIZE_MEAN">
                                        <th class="title"> Praticle Size Mean: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['PRATICLE_SIZE_MEAN']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="PRATICLE_SIZE_MEAN" 
                                                data-title="Enter Praticle Size Mean" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['PRATICLE_SIZE_MEAN']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-RANGE_1_PASSING_85">
                                        <th class="title"> Range 1 Passing 85: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['RANGE_1_PASSING_85']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="RANGE_1_PASSING_85" 
                                                data-title="Enter Range 1 Passing 85" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['RANGE_1_PASSING_85']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-RANGE_2_RETT_ON_12">
                                        <th class="title"> Range 2 Rett On 12: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['RANGE_2_RETT_ON_12']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="RANGE_2_RETT_ON_12" 
                                                data-title="Enter Range 2 Rett On 12" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['RANGE_2_RETT_ON_12']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ENZYME_ACTIVITY_AMYLASE">
                                        <th class="title"> Enzyme Activity Amylase: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ENZYME_ACTIVITY_AMYLASE']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ENZYME_ACTIVITY_AMYLASE" 
                                                data-title="Enter Enzyme Activity Amylase" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ENZYME_ACTIVITY_AMYLASE']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ENZYME_ACTIVITY_LIPASE_PLU">
                                        <th class="title"> Enzyme Activity Lipase Plu: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ENZYME_ACTIVITY_LIPASE_PLU']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ENZYME_ACTIVITY_LIPASE_PLU" 
                                                data-title="Enter Enzyme Activity Lipase Plu" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ENZYME_ACTIVITY_LIPASE_PLU']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ENZYME_ACTIVITY_MANNANASE_MMU">
                                        <th class="title"> Enzyme Activity Mannanase Mmu: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ENZYME_ACTIVITY_MANNANASE_MMU']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ENZYME_ACTIVITY_MANNANASE_MMU" 
                                                data-title="Enter Enzyme Activity Mannanase Mmu" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ENZYME_ACTIVITY_MANNANASE_MMU']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ENZYME_ACTIVITY_PROTEASE_UOM_1">
                                        <th class="title"> Enzyme Activity Protease Uom 1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ENZYME_ACTIVITY_PROTEASE_UOM_1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ENZYME_ACTIVITY_PROTEASE_UOM_1" 
                                                data-title="Enter Enzyme Activity Protease Uom 1" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ENZYME_ACTIVITY_PROTEASE_UOM_1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ENZYME_ACTIVITY_ELUTRIATION_PROTEASE">
                                        <th class="title"> Enzyme Activity Elutriation Protease: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ENZYME_ACTIVITY_ELUTRIATION_PROTEASE']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ENZYME_ACTIVITY_ELUTRIATION_PROTEASE" 
                                                data-title="Enter Enzyme Activity Elutriation Protease" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ENZYME_ACTIVITY_ELUTRIATION_PROTEASE']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ENZYME_ELUTRIATION_AMYLASE">
                                        <th class="title"> Enzyme Elutriation Amylase: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ENZYME_ELUTRIATION_AMYLASE']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ENZYME_ELUTRIATION_AMYLASE" 
                                                data-title="Enter Enzyme Elutriation Amylase" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ENZYME_ELUTRIATION_AMYLASE']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ENZYME_ELUTRIATION_MANNANASE_MMU">
                                        <th class="title"> Enzyme Elutriation Mannanase Mmu: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ENZYME_ELUTRIATION_MANNANASE_MMU']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ENZYME_ELUTRIATION_MANNANASE_MMU" 
                                                data-title="Enter Enzyme Elutriation Mannanase Mmu" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ENZYME_ELUTRIATION_MANNANASE_MMU']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-BD_gm_ml">
                                        <th class="title"> Bd Gm Ml: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['BD_gm_ml']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="BD_gm_ml" 
                                                data-title="Enter Bd Gm Ml" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['BD_gm_ml']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-COLOUR_VALUE_LAB_3COLOUMN">
                                        <th class="title"> Colour Value Lab 3Coloumn: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['COLOUR_VALUE_LAB_3COLOUMN']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="COLOUR_VALUE_LAB_3COLOUMN" 
                                                data-title="Enter Colour Value Lab 3Coloumn" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['COLOUR_VALUE_LAB_3COLOUMN']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ENZYME_ELUTRIATION_LIPASE">
                                        <th class="title"> Enzyme Elutriation Lipase: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ENZYME_ELUTRIATION_LIPASE']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ENZYME_ELUTRIATION_LIPASE" 
                                                data-title="Enter Enzyme Elutriation Lipase" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ENZYME_ELUTRIATION_LIPASE']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-SIGN_OF_CHEMIST">
                                        <th class="title"> Sign Of Chemist: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['SIGN_OF_CHEMIST']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-SIGN_OF_AUTHORISER">
                                        <th class="title"> Sign Of Authoriser: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['SIGN_OF_AUTHORISER']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="SIGN_OF_AUTHORISER" 
                                                data-title="Enter Sign Of Authoriser" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['SIGN_OF_AUTHORISER']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
