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
                    <h4 class="record-title">Add New Pink Pas Neddles 95Percent</h4>
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
                        <form id="pink_pas_neddles_95percent-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("pink_pas_neddles_95percent/add?csrf_token=$csrf_token") ?>" method="post">
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
                                                <label class="control-label" for="LENTH">Lenth <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-LENTH"  value="<?php  echo $this->set_field_value('LENTH',""); ?>" type="text" placeholder="Enter Lenth"  required="" name="LENTH"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="LENTH_RANGE">Lenth Range <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-LENTH_RANGE"  value="<?php  echo $this->set_field_value('LENTH_RANGE',""); ?>" type="text" placeholder="Enter Lenth Range"  required="" name="LENTH_RANGE"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="DIAMETER">Diameter <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-DIAMETER"  value="<?php  echo $this->set_field_value('DIAMETER',""); ?>" type="text" placeholder="Enter Diameter"  required="" name="DIAMETER"  class="form-control " />
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
                                                                <label class="control-label" for="MC_Percent">Mc Percent <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-MC_Percent"  value="<?php  echo $this->set_field_value('MC_Percent',""); ?>" type="text" placeholder="Enter Mc Percent"  required="" name="MC_Percent"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="NDOM_Percent">Ndom Percent <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-NDOM_Percent"  value="<?php  echo $this->set_field_value('NDOM_Percent',""); ?>" type="text" placeholder="Enter Ndom Percent"  required="" name="NDOM_Percent"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="ALKALINITY_AS_NA2O">Alkalinity As Na2o <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-ALKALINITY_AS_NA2O"  value="<?php  echo $this->set_field_value('ALKALINITY_AS_NA2O',""); ?>" type="text" placeholder="Enter Alkalinity As Na2o"  required="" name="ALKALINITY_AS_NA2O"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="SAMPLE_WT_IN_gm">Sample Wt In Gm <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-SAMPLE_WT_IN_gm"  value="<?php  echo $this->set_field_value('SAMPLE_WT_IN_gm',""); ?>" type="text" placeholder="Enter Sample Wt In Gm"  required="" name="SAMPLE_WT_IN_gm"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="VOL">Vol <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <input id="ctrl-VOL"  value="<?php  echo $this->set_field_value('VOL',""); ?>" type="text" placeholder="Enter Vol"  required="" name="VOL"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="FACTOR">Factor <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-FACTOR"  value="<?php  echo $this->set_field_value('FACTOR',""); ?>" type="text" placeholder="Enter Factor"  required="" name="FACTOR"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent">Anionic Active As Alcohol Solpate Percent <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent"  value="<?php  echo $this->set_field_value('ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent',""); ?>" type="text" placeholder="Enter Anionic Active As Alcohol Solpate Percent"  required="" name="ANIONIC_ACTIVE_AS_ALCOHOL_SOLPATE_Percent"  class="form-control " />
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
