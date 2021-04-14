<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("sodium_solphite_88percent/add");
$can_edit = ACL::is_allowed("sodium_solphite_88percent/edit");
$can_view = ACL::is_allowed("sodium_solphite_88percent/view");
$can_delete = ACL::is_allowed("sodium_solphite_88percent/delete");
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
                    <h4 class="record-title">View  Sodium Solphite 88Percent</h4>
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
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-APPEARANCE">
                                        <th class="title"> Appearance: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['APPEARANCE']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="APPEARANCE" 
                                                data-title="Enter Appearance" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['APPEARANCE']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ODOUR">
                                        <th class="title"> Odour: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ODOUR']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ODOUR" 
                                                data-title="Enter Odour" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ODOUR']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-RANGE_1">
                                        <th class="title"> Range 1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['RANGE_1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="RANGE_1" 
                                                data-title="Enter Range 1" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['RANGE_1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-RANGE_2">
                                        <th class="title"> Range 2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['RANGE_2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="RANGE_2" 
                                                data-title="Enter Range 2" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['RANGE_2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-RANGE_3">
                                        <th class="title"> Range 3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['RANGE_3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="RANGE_3" 
                                                data-title="Enter Range 3" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['RANGE_3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-BD_gm_ml">
                                        <th class="title"> Bd Gm Ml: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['BD_gm_ml']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-PH">
                                        <th class="title"> Ph: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['PH']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-MC_Percent">
                                        <th class="title"> Mc Percent: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['MC_Percent']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="MC_Percent" 
                                                data-title="Enter Mc Percent" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['MC_Percent']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-INSOLABLE_MATTEN_IN_WATER_Percent">
                                        <th class="title"> Insolable Matten In Water Percent: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['INSOLABLE_MATTEN_IN_WATER_Percent']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="INSOLABLE_MATTEN_IN_WATER_Percent" 
                                                data-title="Enter Insolable Matten In Water Percent" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['INSOLABLE_MATTEN_IN_WATER_Percent']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-SOLUBILITY_IN_WATER">
                                        <th class="title"> Solubility In Water: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['SOLUBILITY_IN_WATER']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="SOLUBILITY_IN_WATER" 
                                                data-title="Enter Solubility In Water" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['SOLUBILITY_IN_WATER']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ASSAY_PURITY_Percent">
                                        <th class="title"> Assay Purity Percent: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ASSAY_PURITY_Percent']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ASSAY_PURITY_Percent" 
                                                data-title="Enter Assay Purity Percent" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ASSAY_PURITY_Percent']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ALKALI_FREE">
                                        <th class="title"> Alkali Free: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ALKALI_FREE']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="ALKALI_FREE" 
                                                data-title="Enter Alkali Free" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ALKALI_FREE']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-CHLORIDE_AS_NALL">
                                        <th class="title"> Chloride As Nall: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['CHLORIDE_AS_NALL']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="CHLORIDE_AS_NALL" 
                                                data-title="Enter Chloride As Nall" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['CHLORIDE_AS_NALL']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-SIGN_OF_CHEMIST">
                                        <th class="title"> Sign Of Chemist: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['SIGN_OF_CHEMIST']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
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
                                                data-url="<?php print_link("sodium_solphite_88percent/editfield/" . urlencode($data['id'])); ?>" 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("sodium_solphite_88percent/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("sodium_solphite_88percent/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
