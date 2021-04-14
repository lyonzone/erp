<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("sodium_sulphate/add");
$can_edit = ACL::is_allowed("sodium_sulphate/edit");
$can_view = ACL::is_allowed("sodium_sulphate/view");
$can_delete = ACL::is_allowed("sodium_sulphate/delete");
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
                    <h4 class="record-title">View  Sodium Sulphate</h4>
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
                                    <tr  class="td-APPEARANCE">
                                        <th class="title"> Appearance: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['APPEARANCE']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
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
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-REFLECTANCE">
                                        <th class="title"> Reflectance: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['REFLECTANCE']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="REFLECTANCE" 
                                                data-title="Enter Reflectance" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['REFLECTANCE']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-BD">
                                        <th class="title"> Bd: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['BD']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="BD" 
                                                data-title="Enter Bd" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['BD']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-SAMPLE_WT">
                                        <th class="title"> Sample Wt: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['SAMPLE_WT']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="SAMPLE_WT" 
                                                data-title="Enter Sample Wt" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['SAMPLE_WT']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-LOSS_ON_DRYING">
                                        <th class="title"> Loss On Drying: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['LOSS_ON_DRYING']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="LOSS_ON_DRYING" 
                                                data-title="Enter Loss On Drying" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['LOSS_ON_DRYING']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-MC">
                                        <th class="title"> Mc: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['MC']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="MC" 
                                                data-title="Enter Mc" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['MC']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-PURITY">
                                        <th class="title"> Purity: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['PURITY']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="PURITY" 
                                                data-title="Enter Purity" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['PURITY']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-AFTER_SIEVE">
                                        <th class="title"> After Sieve: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['AFTER_SIEVE']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="AFTER_SIEVE" 
                                                data-title="Enter After Sieve" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['AFTER_SIEVE']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-RETTN_ON_30">
                                        <th class="title"> Rettn On 30: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['RETTN_ON_30']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="RETTN_ON_30" 
                                                data-title="Enter Rettn On 30" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['RETTN_ON_30']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-RETT_ON_16">
                                        <th class="title"> Rett On 16: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['RETT_ON_16']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="RETT_ON_16" 
                                                data-title="Enter Rett On 16" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['RETT_ON_16']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-PARTICLE_SIZE_MEAIN">
                                        <th class="title"> Particle Size Meain: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['PARTICLE_SIZE_MEAIN']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="PARTICLE_SIZE_MEAIN" 
                                                data-title="Enter Particle Size Meain" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['PARTICLE_SIZE_MEAIN']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-SIGN_OF_CHEMIST">
                                        <th class="title"> Sign Of Chemist: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['SIGN_OF_CHEMIST']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
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
                                                data-url="<?php print_link("sodium_sulphate/editfield/" . urlencode($data['id'])); ?>" 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("sodium_sulphate/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("sodium_sulphate/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
