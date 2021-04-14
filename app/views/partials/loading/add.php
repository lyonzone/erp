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
                    <h4 class="record-title">Add New Loading</h4>
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
                        <form id="loading-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("loading/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="date">Date <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-date" class="form-control datepicker  datepicker" required="" value="<?php  echo $this->set_field_value('date',datetime_now()); ?>" type="datetime"  name="date" placeholder="Enter Date" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="d-m-Y H:i:s" data-inline="false" data-no-calendar="false" data-mode="single" /> 
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
                                                <label class="control-label" for="vehicle">Vehicle <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-vehicle"  value="<?php  echo $this->set_field_value('vehicle',""); ?>" type="text" placeholder="Enter Vehicle"  required="" name="vehicle"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="wheels">Wheels <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <select required=""  id="ctrl-wheels" name="wheels"  placeholder="Select a value ..."    class="custom-select" >
                                                            <option value="">Select a value ...</option>
                                                            <?php 
                                                            $wheels_options = $comp_model -> loading_wheels_option_list();
                                                            if(!empty($wheels_options)){
                                                            foreach($wheels_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = $this->set_field_selected('wheels',$value, "");
                                                            ?>
                                                            <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                <?php echo $label; ?>
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
                                                    <label class="control-label" for="driver">Driver <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-driver"  value="<?php  echo $this->set_field_value('driver',""); ?>" type="text" placeholder="Enter Driver"  required="" name="driver"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="mobile">Mobile <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-mobile"  value="<?php  echo $this->set_field_value('mobile',""); ?>" type="number" placeholder="Enter Mobile" step="1"  required="" name="mobile"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input id="ctrl-texit"  value="<?php  echo $this->set_field_value('texit',"Not Exit"); ?>" type="hidden" placeholder="Enter Truck Exit"  name="texit"  class="form-control " />
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="transport">Transport <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-transport"  value="<?php  echo $this->set_field_value('transport',""); ?>" type="text" placeholder="Enter Transport" list="transport_list"  required="" name="transport"  class="form-control " />
                                                                        <datalist id="transport_list">
                                                                            <?php 
                                                                            $transport_options = $comp_model -> loading_transport_option_list();
                                                                            if(!empty($transport_options)){
                                                                            foreach($transport_options as $option){
                                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                            ?>
                                                                            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                                            <?php
                                                                            }
                                                                            }
                                                                            ?>
                                                                        </datalist>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="depot">Depot <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-depot"  value="<?php  echo $this->set_field_value('depot',""); ?>" type="text" placeholder="Enter Depot" list="depot_list"  required="" name="depot"  class="form-control " />
                                                                            <datalist id="depot_list">
                                                                                <?php 
                                                                                $depot_options = $comp_model -> loading_depot_option_list();
                                                                                if(!empty($depot_options)){
                                                                                foreach($depot_options as $option){
                                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                ?>
                                                                                <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                                                <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                                            </datalist>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="valid_lic">Driving licence No <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-valid_lic"  value="<?php  echo $this->set_field_value('valid_lic',""); ?>" type="text" placeholder="Enter Driving licence No"  required="" name="valid_lic"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="dl_dt">Dl Dt <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="input-group">
                                                                                <input id="ctrl-dl_dt" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('dl_dt',date_now()); ?>" type="datetime" name="dl_dt" placeholder="Enter Dl Dt" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false" data-mode="single" />
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
                                                                                <label class="control-label" for="insurance">Insurance <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="input-group">
                                                                                    <input id="ctrl-insurance" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('insurance',date_now()); ?>" type="datetime" name="insurance" placeholder="Enter Insurance" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false" data-mode="single" />
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
                                                                                    <label class="control-label" for="polution_no">Polution No <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-polution_no"  value="<?php  echo $this->set_field_value('polution_no',""); ?>" type="text" placeholder="Enter Polution No"  required="" name="polution_no"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="polution_dt">Polution Dt <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="input-group">
                                                                                            <input id="ctrl-polution_dt" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('polution_dt',date_now()); ?>" type="datetime" name="polution_dt" placeholder="Enter Polution Dt" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false" data-mode="single" />
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
                                                                                            <label class="control-label" for="fitness">Fitness <span class="text-danger">*</span></label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="input-group">
                                                                                                <input id="ctrl-fitness" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('fitness',date_now()); ?>" type="datetime" name="fitness" placeholder="Enter Fitness" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false" data-mode="single" />
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
                                                                                                <label class="control-label" for="roadtax">Roadtax <span class="text-danger">*</span></label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="input-group">
                                                                                                    <input id="ctrl-roadtax" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('roadtax',date_now()); ?>" type="datetime" name="roadtax" placeholder="Enter Roadtax" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                                                        <div class="input-group-append">
                                                                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                                                        </div>
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
