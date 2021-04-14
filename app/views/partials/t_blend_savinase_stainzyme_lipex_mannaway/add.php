<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New T Blend Savinase Stainzyme Lipex Mannaway</h4>
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
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="t_blend_savinase_stainzyme_lipex_mannaway-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("t_blend_savinase_stainzyme_lipex_mannaway/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="truck_entry">Truck Entry <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-truck_entry"  value="<?php  echo $this->set_field_value('truck_entry',""); ?>" type="text" placeholder="Enter Truck Entry"  required="" name="truck_entry"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="PRATICLE_SIZE_MEAN">Praticle Size Mean <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-PRATICLE_SIZE_MEAN"  value="<?php  echo $this->set_field_value('PRATICLE_SIZE_MEAN',""); ?>" type="text" placeholder="Enter Praticle Size Mean"  required="" name="PRATICLE_SIZE_MEAN"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="RANGE_1_PASSING_85">Range 1 Passing 85 <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-RANGE_1_PASSING_85"  value="<?php  echo $this->set_field_value('RANGE_1_PASSING_85',""); ?>" type="text" placeholder="Enter Range 1 Passing 85"  required="" name="RANGE_1_PASSING_85"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="RANGE_2_RETT_ON_12">Range 2 Rett On 12 <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-RANGE_2_RETT_ON_12"  value="<?php  echo $this->set_field_value('RANGE_2_RETT_ON_12',""); ?>" type="text" placeholder="Enter Range 2 Rett On 12"  required="" name="RANGE_2_RETT_ON_12"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="ENZYME_ACTIVITY_AMYLASE">Enzyme Activity Amylase <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-ENZYME_ACTIVITY_AMYLASE"  value="<?php  echo $this->set_field_value('ENZYME_ACTIVITY_AMYLASE',""); ?>" type="text" placeholder="Enter Enzyme Activity Amylase"  required="" name="ENZYME_ACTIVITY_AMYLASE"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="ENZYME_ACTIVITY_LIPASE_PLU">Enzyme Activity Lipase Plu <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-ENZYME_ACTIVITY_LIPASE_PLU"  value="<?php  echo $this->set_field_value('ENZYME_ACTIVITY_LIPASE_PLU',""); ?>" type="text" placeholder="Enter Enzyme Activity Lipase Plu"  required="" name="ENZYME_ACTIVITY_LIPASE_PLU"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="ENZYME_ACTIVITY_MANNANASE_MMU">Enzyme Activity Mannanase Mmu <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-ENZYME_ACTIVITY_MANNANASE_MMU"  value="<?php  echo $this->set_field_value('ENZYME_ACTIVITY_MANNANASE_MMU',""); ?>" type="text" placeholder="Enter Enzyme Activity Mannanase Mmu"  required="" name="ENZYME_ACTIVITY_MANNANASE_MMU"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="ENZYME_ACTIVITY_PROTEASE_UOM_1">Enzyme Activity Protease Uom 1 <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-ENZYME_ACTIVITY_PROTEASE_UOM_1"  value="<?php  echo $this->set_field_value('ENZYME_ACTIVITY_PROTEASE_UOM_1',""); ?>" type="text" placeholder="Enter Enzyme Activity Protease Uom 1"  required="" name="ENZYME_ACTIVITY_PROTEASE_UOM_1"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="ENZYME_ACTIVITY_ELUTRIATION_PROTEASE">Enzyme Activity Elutriation Protease <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-ENZYME_ACTIVITY_ELUTRIATION_PROTEASE"  value="<?php  echo $this->set_field_value('ENZYME_ACTIVITY_ELUTRIATION_PROTEASE',""); ?>" type="text" placeholder="Enter Enzyme Activity Elutriation Protease"  required="" name="ENZYME_ACTIVITY_ELUTRIATION_PROTEASE"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="ENZYME_ELUTRIATION_AMYLASE">Enzyme Elutriation Amylase <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <input id="ctrl-ENZYME_ELUTRIATION_AMYLASE"  value="<?php  echo $this->set_field_value('ENZYME_ELUTRIATION_AMYLASE',""); ?>" type="text" placeholder="Enter Enzyme Elutriation Amylase"  required="" name="ENZYME_ELUTRIATION_AMYLASE"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="ENZYME_ELUTRIATION_MANNANASE_MMU">Enzyme Elutriation Mannanase Mmu <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-ENZYME_ELUTRIATION_MANNANASE_MMU"  value="<?php  echo $this->set_field_value('ENZYME_ELUTRIATION_MANNANASE_MMU',""); ?>" type="text" placeholder="Enter Enzyme Elutriation Mannanase Mmu"  required="" name="ENZYME_ELUTRIATION_MANNANASE_MMU"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="BD_gm_ml">Bd Gm Ml <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-BD_gm_ml"  value="<?php  echo $this->set_field_value('BD_gm_ml',""); ?>" type="text" placeholder="Enter Bd Gm Ml"  required="" name="BD_gm_ml"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label class="control-label" for="COLOUR_VALUE_LAB_3COLOUMN">Colour Value Lab 3Coloumn <span class="text-danger">*</span></label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="">
                                                                                                <input id="ctrl-COLOUR_VALUE_LAB_3COLOUMN"  value="<?php  echo $this->set_field_value('COLOUR_VALUE_LAB_3COLOUMN',""); ?>" type="text" placeholder="Enter Colour Value Lab 3Coloumn"  required="" name="COLOUR_VALUE_LAB_3COLOUMN"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <label class="control-label" for="ENZYME_ELUTRIATION_LIPASE">Enzyme Elutriation Lipase <span class="text-danger">*</span></label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="">
                                                                                                    <input id="ctrl-ENZYME_ELUTRIATION_LIPASE"  value="<?php  echo $this->set_field_value('ENZYME_ELUTRIATION_LIPASE',""); ?>" type="text" placeholder="Enter Enzyme Elutriation Lipase"  required="" name="ENZYME_ELUTRIATION_LIPASE"  class="form-control " />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <label class="control-label" for="SIGN_OF_CHEMIST">Sign Of Chemist <span class="text-danger">*</span></label>
                                                                                                </div>
                                                                                                <div class="col-sm-8">
                                                                                                    <div class="">
                                                                                                        <input id="ctrl-SIGN_OF_CHEMIST"  value="<?php  echo $this->set_field_value('SIGN_OF_CHEMIST',""); ?>" type="text" placeholder="Enter Sign Of Chemist"  required="" name="SIGN_OF_CHEMIST"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group ">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4">
                                                                                                        <label class="control-label" for="SIGN_OF_AUTHORISER">Sign Of Authoriser <span class="text-danger">*</span></label>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="">
                                                                                                            <input id="ctrl-SIGN_OF_AUTHORISER"  value="<?php  echo $this->set_field_value('SIGN_OF_AUTHORISER',""); ?>" type="text" placeholder="Enter Sign Of Authoriser"  required="" name="SIGN_OF_AUTHORISER"  class="form-control " />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                                                <div class="form-ajax-status"></div>
                                                                                                <button class="btn btn-primary" type="submit">
                                                                                                    Submit
                                                                                                    <i class="fa fa-send"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
