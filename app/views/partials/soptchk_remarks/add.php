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
                    <h4 class="record-title">Add New Soptchk Remarks</h4>
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
                        <form id="soptchk_remarks-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("soptchk_remarks/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="date">Date <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-date" class="form-control datepicker  datepicker" required="" value="<?php  echo $this->set_field_value('date',""); ?>" type="datetime"  name="date" placeholder="Enter Date" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="shift">Shift <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-shift"  value="<?php  echo $this->set_field_value('shift',""); ?>" type="text" placeholder="Enter Shift"  required="" name="shift"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="product">Product <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-product"  value="<?php  echo $this->set_field_value('product',""); ?>" type="text" placeholder="Enter Product"  required="" name="product"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="dosing_time">Dosing Time <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <input id="ctrl-dosing_time"  value="<?php  echo $this->set_field_value('dosing_time',""); ?>" type="text" placeholder="Enter Dosing Time"  required="" name="dosing_time"  class="form-control " />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="ad_batch">Ad Batch <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-ad_batch"  value="<?php  echo $this->set_field_value('ad_batch',""); ?>" type="text" placeholder="Enter Ad Batch"  required="" name="ad_batch"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="mc_batch">Mc Batch <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-mc_batch"  value="<?php  echo $this->set_field_value('mc_batch',""); ?>" type="text" placeholder="Enter Mc Batch"  required="" name="mc_batch"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="perfume">Perfume <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <select required=""  id="ctrl-perfume" name="perfume"  placeholder="Select a value ..."    class="custom-select" >
                                                                            <option value="">Select a value ...</option>
                                                                            <?php
                                                                            $perfume_options = Menu :: $perfume;
                                                                            if(!empty($perfume_options)){
                                                                            foreach($perfume_options as $option){
                                                                            $value = $option['value'];
                                                                            $label = $option['label'];
                                                                            $selected = $this->set_field_selected('perfume', $value, "");
                                                                            ?>
                                                                            <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                <?php echo $label ?>
                                                                            </option>                                   
                                                                            <?php
                                                                            }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="colour">Colour <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <select required=""  id="ctrl-colour" name="colour"  placeholder="Select a value ..."    class="custom-select" >
                                                                            <option value="">Select a value ...</option>
                                                                            <?php
                                                                            $colour_options = Menu :: $colour;
                                                                            if(!empty($colour_options)){
                                                                            foreach($colour_options as $option){
                                                                            $value = $option['value'];
                                                                            $label = $option['label'];
                                                                            $selected = $this->set_field_selected('colour', $value, "");
                                                                            ?>
                                                                            <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                <?php echo $label ?>
                                                                            </option>                                   
                                                                            <?php
                                                                            }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="dfr">D.F.R <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-dfr"  value="<?php  echo $this->set_field_value('dfr',""); ?>" type="text" placeholder="Enter D.F.R"  required="" name="dfr"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="rm_seive">Rm Seive <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-rm_seive"  value="<?php  echo $this->set_field_value('rm_seive',""); ?>" type="text" placeholder="Enter Rm Seive"  required="" name="rm_seive"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="fp_seive">Fp Seive <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-fp_seive"  value="<?php  echo $this->set_field_value('fp_seive',""); ?>" type="text" placeholder="Enter Fp Seive"  required="" name="fp_seive"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="magnet_condn">Magnet Condn <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <select required=""  id="ctrl-magnet_condn" name="magnet_condn"  placeholder="Select a value ..."    class="custom-select" >
                                                                                        <option value="">Select a value ...</option>
                                                                                        <?php
                                                                                        $magnet_condn_options = Menu :: $magnet_condn;
                                                                                        if(!empty($magnet_condn_options)){
                                                                                        foreach($magnet_condn_options as $option){
                                                                                        $value = $option['value'];
                                                                                        $label = $option['label'];
                                                                                        $selected = $this->set_field_selected('magnet_condn', $value, "");
                                                                                        ?>
                                                                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                            <?php echo $label ?>
                                                                                        </option>                                   
                                                                                        <?php
                                                                                        }
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="spray_qlty">Spray Qlty <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <input id="ctrl-spray_qlty"  value="<?php  echo $this->set_field_value('spray_qlty',""); ?>" type="text" placeholder="Enter Spray Qlty"  required="" name="spray_qlty"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="powder_temp">Powder Temp <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-powder_temp"  value="<?php  echo $this->set_field_value('powder_temp',""); ?>" type="text" placeholder="Enter Powder Temp"  required="" name="powder_temp"  class="form-control " />
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
