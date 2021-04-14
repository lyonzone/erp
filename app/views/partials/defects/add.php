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
                    <h4 class="record-title">Add New Defects</h4>
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
                        <form id="defects-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("defects/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <label class="control-label" for="date">Date <span class="text-danger">*</span></label>
                                    <div id="ctrl-date-holder" class="input-group"> 
                                        <input id="ctrl-date"  value="<?php  echo $this->set_field_value('date',""); ?>" type="text" placeholder="Enter Date"  required="" name="date"  class="form-control " />
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label" for="sku">Sku <span class="text-danger">*</span></label>
                                        <div id="ctrl-sku-holder" class=""> 
                                            <input id="ctrl-sku"  value="<?php  echo $this->set_field_value('sku',""); ?>" type="text" placeholder="Enter Sku"  required="" name="sku"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label" for="shift">Shift <span class="text-danger">*</span></label>
                                            <div id="ctrl-shift-holder" class=""> 
                                                <input id="ctrl-shift"  value="<?php  echo $this->set_field_value('shift',""); ?>" type="text" placeholder="Enter Shift"  required="" name="shift"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label" for="varient">Varient <span class="text-danger">*</span></label>
                                                <div id="ctrl-varient-holder" class=""> 
                                                    <input id="ctrl-varient"  value="<?php  echo $this->set_field_value('varient',""); ?>" type="text" placeholder="Enter Varient"  required="" name="varient"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="control-label" for="hour">Hour <span class="text-danger">*</span></label>
                                                    <div id="ctrl-hour-holder" class=""> 
                                                        <select required=""  id="ctrl-hour" name="hour"  placeholder="Select a value ..."    class="custom-select" >
                                                            <option value="">Select a value ...</option>
                                                            <?php
                                                            $hour_options = Menu :: $hour;
                                                            if(!empty($hour_options)){
                                                            foreach($hour_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            $selected = $this->set_field_selected('hour', $value, "");
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
                                                <div class="form-group ">
                                                    <label class="control-label" for="defect_case">Defect Case <span class="text-danger">*</span></label>
                                                    <div id="ctrl-defect_case-holder" class=""> 
                                                        <select required=""  id="ctrl-defect_case" name="defect_case"  placeholder="Select a value ..."    class="custom-select" >
                                                            <option value="">Select a value ...</option>
                                                            <?php
                                                            $defect_case_options = Menu :: $defect_case;
                                                            if(!empty($defect_case_options)){
                                                            foreach($defect_case_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            $selected = $this->set_field_selected('defect_case', $value, "");
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
                                                <div class="form-group ">
                                                    <label class="control-label" for="property">Property <span class="text-danger">*</span></label>
                                                    <div id="ctrl-property-holder" class=""> 
                                                        <select required=""  id="ctrl-property" name="property"  placeholder="Select a value ..."    class="custom-select" >
                                                            <option value="">Select a value ...</option>
                                                            <?php
                                                            $property_options = Menu :: $property;
                                                            if(!empty($property_options)){
                                                            foreach($property_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            $selected = $this->set_field_selected('property', $value, "");
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
                                                <div class="form-group ">
                                                    <label class="control-label" for="quality">Quality Issue <span class="text-danger">*</span></label>
                                                    <div id="ctrl-quality-holder" class=""> 
                                                        <select required=""  id="ctrl-quality" name="quality"  placeholder="Select a value ..."    class="custom-select" >
                                                            <option value="">Select a value ...</option>
                                                            <?php
                                                            $quality_options = Menu :: $quality;
                                                            if(!empty($quality_options)){
                                                            foreach($quality_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            $selected = $this->set_field_selected('quality', $value, "");
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
                                                <div class="form-group ">
                                                    <label class="control-label" for="defect_type">Defect Type <span class="text-danger">*</span></label>
                                                    <div id="ctrl-defect_type-holder" class=""> 
                                                        <select required=""  id="ctrl-defect_type" name="defect_type"  placeholder="Select a value ..."    class="custom-select" >
                                                            <option value="">Select a value ...</option>
                                                            <?php
                                                            $defect_type_options = Menu :: $defect_type;
                                                            if(!empty($defect_type_options)){
                                                            foreach($defect_type_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            $selected = $this->set_field_selected('defect_type', $value, "");
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
                                                <div class="form-group ">
                                                    <label class="control-label" for="defect_quantity">Defect Quantity <span class="text-danger">*</span></label>
                                                    <div id="ctrl-defect_quantity-holder" class=""> 
                                                        <input id="ctrl-defect_quantity"  value="<?php  echo $this->set_field_value('defect_quantity',""); ?>" type="text" placeholder="Enter Defect Quantity"  required="" name="defect_quantity"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="control-label" for="samples_chk">Samples Chk <span class="text-danger">*</span></label>
                                                        <div id="ctrl-samples_chk-holder" class=""> 
                                                            <input id="ctrl-samples_chk"  value="<?php  echo $this->set_field_value('samples_chk',""); ?>" type="number" placeholder="Enter Samples Chk" step="1"  required="" name="samples_chk"  class="form-control " />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label" for="defects">Defects <span class="text-danger">*</span></label>
                                                            <div id="ctrl-defects-holder" class=""> 
                                                                <input id="ctrl-defects"  value="<?php  echo $this->set_field_value('defects',""); ?>" type="number" placeholder="Enter Defects" step="1"  required="" name="defects"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="percent">Percent <span class="text-danger">*</span></label>
                                                                <div id="ctrl-percent-holder" class=""> 
                                                                    <input id="ctrl-percent"  value="<?php  echo $this->set_field_value('percent',""); ?>" type="text" placeholder="Enter Percent"  required="" name="percent"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label" for="se_condition">Se Condition </label>
                                                                    <div id="ctrl-se_condition-holder" class=""> 
                                                                        <input id="ctrl-se_condition"  value="<?php  echo $this->set_field_value('se_condition',""); ?>" type="text" placeholder="Enter Se Condition"  name="se_condition"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label class="control-label" for="remarks">Remarks - DROP TEST - SACK POUCH <span class="text-danger">*</span></label>
                                                                        <div id="ctrl-remarks-holder" class=""> 
                                                                            <textarea placeholder="Enter Remarks - DROP TEST - SACK POUCH" id="ctrl-remarks"  required="" rows="5" name="remarks" class=" form-control"><?php  echo $this->set_field_value('remarks',""); ?></textarea>
                                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label class="control-label" for="remarks2">Remarks - Pin hole condition-M/C <span class="text-danger">*</span></label>
                                                                        <div id="ctrl-remarks2-holder" class=""> 
                                                                            <textarea placeholder="Enter Remarks - Pin hole condition-M/C" id="ctrl-remarks2"  required="" rows="5" name="remarks2" class=" form-control"><?php  echo $this->set_field_value('remarks2',""); ?></textarea>
                                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label class="control-label" for="qc_status">Qc Status <span class="text-danger">*</span></label>
                                                                        <div id="ctrl-qc_status-holder" class=""> 
                                                                            <input id="ctrl-qc_status"  value="<?php  echo $this->set_field_value('qc_status',""); ?>" type="text" placeholder="Enter Qc Status"  required="" name="qc_status"  class="form-control " />
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
