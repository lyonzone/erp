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
                    <h4 class="record-title">Add New Truck</h4>
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
                        <form id="truck-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("truck/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="truck_entry">Truck Entry <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-truck_entry" class="form-control datepicker  datepicker" required="" value="<?php  echo $this->set_field_value('truck_entry',datetime_now()); ?>" type="datetime"  name="truck_entry" placeholder="Enter Truck Entry" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="d-m-Y H:i:s" data-inline="false" data-no-calendar="false" data-mode="single" /> 
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
                                                <label class="control-label" for="transporter">Transporter <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-transporter"  value="<?php  echo $this->set_field_value('transporter',""); ?>" type="text" placeholder="Enter Transporter" list="transporter_list"  required="" name="transporter"  class="form-control " />
                                                        <datalist id="transporter_list">
                                                            <?php 
                                                            $transporter_options = $comp_model -> truck_transporter_option_list();
                                                            if(!empty($transporter_options)){
                                                            foreach($transporter_options as $option){
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
                                                    <label class="control-label" for="truck_no">Truck No <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-truck_no"  value="<?php  echo $this->set_field_value('truck_no',""); ?>" type="text" placeholder="Enter Truck No"  required="" name="truck_no"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="lr_no">Lr No <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-lr_no"  value="<?php  echo $this->set_field_value('lr_no',""); ?>" type="text" placeholder="Enter Lr No"  required="" name="lr_no"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="no_of_wheel">No Of Wheel <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <select required=""  id="ctrl-no_of_wheel" name="no_of_wheel"  placeholder="Select a value ..."    class="custom-select" >
                                                                    <option value="">Select a value ...</option>
                                                                    <?php 
                                                                    $no_of_wheel_options = $comp_model -> truck_no_of_wheel_option_list();
                                                                    if(!empty($no_of_wheel_options)){
                                                                    foreach($no_of_wheel_options as $option){
                                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                    $selected = $this->set_field_selected('no_of_wheel',$value, "");
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
                                                            <label class="control-label" for="driver_name">Driver Name <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-driver_name"  value="<?php  echo $this->set_field_value('driver_name',""); ?>" type="text" placeholder="Enter Driver Name"  required="" name="driver_name"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="driver_mobile_no">Driver Mobile No <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-driver_mobile_no"  value="<?php  echo $this->set_field_value('driver_mobile_no',""); ?>" type="text" placeholder="Enter Driver Mobile No"  required="" name="driver_mobile_no"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="dl_no">Dl No <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-dl_no"  value="<?php  echo $this->set_field_value('dl_no',""); ?>" type="text" placeholder="Enter Dl No"  required="" name="dl_no"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input id="ctrl-truck_exit"  value="<?php  echo $this->set_field_value('truck_exit',"Not Exit"); ?>" type="hidden" placeholder="Enter Truck Exit" list="truck_exit_list"  name="truck_exit"  class="form-control " />
                                                                <datalist id="truck_exit_list">
                                                                    <?php
                                                                    $truck_exit_options = Menu :: $truck_exit;
                                                                    if(!empty($truck_exit_options)){
                                                                    foreach($truck_exit_options as $option){
                                                                    $value = $option['value'];
                                                                    $label = $option['label'];
                                                                    $selected = $this->set_field_selected('truck_exit', $value, "Not Exit");
                                                                    ?>
                                                                    <option><?php  echo $this->set_field_value('truck_exit',"Not Exit"); ?></option>
                                                                    <?php
                                                                    }
                                                                    }
                                                                    ?>
                                                                </datalist>
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
