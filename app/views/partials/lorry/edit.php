<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Edit  Lorry</h4>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("lorry/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="transporter">Transporter <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-transporter"  value="<?php  echo $data['transporter']; ?>" type="text" placeholder="Enter Transporter"  required="" name="transporter"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="date">Date <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input id="ctrl-date"  value="<?php  echo $data['date']; ?>" type="text" placeholder="Enter Date"  required="" name="date"  class="form-control " />
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
                                                    <label class="control-label" for="vehicle">Vehicle No. <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-vehicle"  value="<?php  echo $data['vehicle']; ?>" type="text" placeholder="Enter Vehicle No."  required="" name="vehicle"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="vtype">Vehicle Type <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <select required=""  id="ctrl-vtype" name="vtype"  placeholder="Select a value ..."    class="custom-select" >
                                                                <option value="">Select a value ...</option>
                                                                <?php
                                                                $vtype_options = Menu :: $vtype;
                                                                $field_value = $data['vtype'];
                                                                if(!empty($vtype_options)){
                                                                foreach($vtype_options as $option){
                                                                $value = $option['value'];
                                                                $label = $option['label'];
                                                                $selected = ( $value == $field_value ? 'selected' : null );
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
                                                        <label class="control-label" for="wtype">Work Type <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-wtype"  value="<?php  echo $data['wtype']; ?>" type="text" placeholder="Enter Work Type"  required="" name="wtype"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="site">Site <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-site"  value="<?php  echo $data['site']; ?>" type="text" placeholder="Enter Site"  required="" name="site"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="check1">01. Are there any broken wooden planks <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input type="checkbox" id="ctrl-check1" value="<?php  echo $data['check1']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="check1" data-onlabel="Yes" data-offlabel="No" />
                                                                        <input type="hidden" name="check1"  value="<?php  echo $data['check1']; ?>" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="ckeck2">01. Are there any sharp edges or sharp objects (eg. Nails) protruding inside the truck body <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input type="checkbox" id="ctrl-ckeck2" value="<?php  echo $data['ckeck2']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="ckeck2" data-onlabel="Yes" data-offlabel="No" />
                                                                                <input type="hidden" name="ckeck2"  value="<?php  echo $data['ckeck2']; ?>" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="ckeck3">03. Is there any bad odour. <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <input type="checkbox" id="ctrl-ckeck3" value="<?php  echo $data['ckeck3']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="ckeck3" data-onlabel="Yes" data-offlabel="No" />
                                                                                        <input type="hidden" name="ckeck3"  value="<?php  echo $data['ckeck3']; ?>" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="check4">04. Is truck body inside clean and dry free from dust/cement/mud/stains water etc <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input type="checkbox" id="ctrl-check4" value="<?php  echo $data['check4']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="check4" data-onlabel="Yes" data-offlabel="No" />
                                                                                                <input type="hidden" name="check4"  value="<?php  echo $data['check4']; ?>" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <label class="control-label" for="check5">05. Are tarpaulins available for floor and cover <span class="text-danger">*</span></label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="">
                                                                                                    <input type="checkbox" id="ctrl-check5" value="<?php  echo $data['check5']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="check5" data-onlabel="Yes" data-offlabel="No" />
                                                                                                        <input type="hidden" name="check5"  value="<?php  echo $data['check5']; ?>" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group ">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4">
                                                                                                        <label class="control-label" for="check6">06. Is tarpaulin sixe adequate and of good condition <span class="text-danger">*</span></label>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="">
                                                                                                            <input type="checkbox" id="ctrl-check6" value="<?php  echo $data['check6']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="check6" data-onlabel="Yes" data-offlabel="No" />
                                                                                                                <input type="hidden" name="check6"  value="<?php  echo $data['check6']; ?>" />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group ">
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-4">
                                                                                                                <label class="control-label" for="check7">07. Are rope and rope guards (to prevent rope marks) provided either LANGLES <span class="text-danger">*</span></label>
                                                                                                            </div>
                                                                                                            <div class="col-sm-8">
                                                                                                                <div class="">
                                                                                                                    <input type="checkbox" id="ctrl-check7" value="<?php  echo $data['check7']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="check7" data-onlabel="Yes" data-offlabel="No" />
                                                                                                                        <input type="hidden" name="check7"  value="<?php  echo $data['check7']; ?>" />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group ">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-4">
                                                                                                                        <label class="control-label" for="check8">08. Are stoppers provided <span class="text-danger">*</span></label>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <div class="">
                                                                                                                            <input type="checkbox" id="ctrl-check8" value="<?php  echo $data['check8']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="check8" data-onlabel="Yes" data-offlabel="No" />
                                                                                                                                <input type="hidden" name="check8"  value="<?php  echo $data['check8']; ?>" />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="form-group ">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <label class="control-label" for="check9">09. Are there any flammables present inside the truck <span class="text-danger">*</span></label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-8">
                                                                                                                                <div class="">
                                                                                                                                    <input type="checkbox" id="ctrl-check9" value="<?php  echo $data['check9']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="check9" data-onlabel="Yes" data-offlabel="No" />
                                                                                                                                        <input type="hidden" name="check9"  value="<?php  echo $data['check9']; ?>" />
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group ">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-4">
                                                                                                                                        <label class="control-label" for="check10">10. Is cleaners assistance taken while reversing the vehicle <span class="text-danger">*</span></label>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-8">
                                                                                                                                        <div class="">
                                                                                                                                            <input type="checkbox" id="ctrl-check10" value="<?php  echo $data['check10']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="check10" data-onlabel="Yes" data-offlabel="No" />
                                                                                                                                                <input type="hidden" name="check10"  value="<?php  echo $data['check10']; ?>" />
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group ">
                                                                                                                                        <div class="row">
                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                <label class="control-label" for="check11">11. Truck driver Driving licence No.  </label>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                <div class="">
                                                                                                                                                    <input id="ctrl-check11"  value="<?php  echo $data['check11']; ?>" type="text" placeholder="Does the truck driver have a valid licence and RTO approval Present"  name="check11"  class="form-control " />
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group ">
                                                                                                                                            <div class="row">
                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                    <label class="control-label" for="check11_1">Driving Licence approval Present Till </label>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                    <div class="input-group">
                                                                                                                                                        <input id="ctrl-check11_1"  value="<?php  echo $data['check11_1']; ?>" type="text" placeholder="Enter Driving Licence approval Present Till"  name="check11_1"  class="form-control " />
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
                                                                                                                                                        <label class="control-label" for="check12">12. Does the truck number match with that given STN/Invoice <span class="text-danger">*</span></label>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                        <div class="">
                                                                                                                                                            <input type="checkbox" id="ctrl-check12" value="<?php  echo $data['check12']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="check12" data-onlabel="Yes" data-offlabel="No" />
                                                                                                                                                                <input type="hidden" name="check12"  value="<?php  echo $data['check12']; ?>" />
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="form-group ">
                                                                                                                                                        <div class="row">
                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                <label class="control-label" for="check13">13. Does the Truck contain material other than HUL <span class="text-danger">*</span></label>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                <div class="">
                                                                                                                                                                    <input type="checkbox" id="ctrl-check13" value="<?php  echo $data['check13']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="check13" data-onlabel="Yes" data-offlabel="No" />
                                                                                                                                                                        <input type="hidden" name="check13"  value="<?php  echo $data['check13']; ?>" />
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="form-group ">
                                                                                                                                                                <div class="row">
                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                        <label class="control-label" for="check14">14. Any other abnormality Found <span class="text-danger">*</span></label>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                                        <div class="">
                                                                                                                                                                            <input type="checkbox" id="ctrl-check14" value="<?php  echo $data['check14']; ?>" class="switch-checkbox" data-on="yes" data-off="no"  data-name="check14" data-onlabel="Yes" data-offlabel="No" />
                                                                                                                                                                                <input type="hidden" name="check14"  value="<?php  echo $data['check14']; ?>" />
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="form-group ">
                                                                                                                                                                        <div class="row">
                                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                                <label class="control-label" for="check15_1">15. Polution Clearance No. </label>
                                                                                                                                                                            </div>
                                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                                <div class="">
                                                                                                                                                                                    <input id="ctrl-check15_1"  value="<?php  echo $data['check15_1']; ?>" type="text" placeholder="Enter 15. Polution Clearance No."  name="check15_1"  class="form-control " />
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="form-group ">
                                                                                                                                                                            <div class="row">
                                                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                                                    <label class="control-label" for="check15">Polution Clearance Valid Till <span class="text-danger">*</span></label>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                                                    <div class="input-group">
                                                                                                                                                                                        <input id="ctrl-check15"  value="<?php  echo $data['check15']; ?>" type="text" placeholder="Enter Polution Clearance Valid Till"  required="" name="check15"  class="form-control " />
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
                                                                                                                                                                                        <label class="control-label" for="check16">16. Insurance Valid Till <span class="text-danger">*</span></label>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                                                        <div class="input-group">
                                                                                                                                                                                            <input id="ctrl-check16"  value="<?php  echo $data['check16']; ?>" type="text" placeholder="Enter 16. Insurance Valid Till"  required="" name="check16"  class="form-control " />
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
                                                                                                                                                                                            <label class="control-label" for="check17">17. Fitness Valid Till <span class="text-danger">*</span></label>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="col-sm-8">
                                                                                                                                                                                            <div class="input-group">
                                                                                                                                                                                                <input id="ctrl-check17"  value="<?php  echo $data['check17']; ?>" type="text" placeholder="Enter 17. Fitness Valid Till"  required="" name="check17"  class="form-control " />
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
                                                                                                                                                                                                <label class="control-label" for="check18">18. Road Tax valid Till <span class="text-danger">*</span></label>
                                                                                                                                                                                            </div>
                                                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                                                <div class="input-group">
                                                                                                                                                                                                    <input id="ctrl-check18"  value="<?php  echo $data['check18']; ?>" type="text" placeholder="Enter 18. Road Tax valid Till"  required="" name="check18"  class="form-control " />
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
                                                                                                                                                                                                    <label class="control-label" for="driver">Driver Name </label>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                                                                    <div class="">
                                                                                                                                                                                                        <input id="ctrl-driver"  value="<?php  echo $data['driver']; ?>" type="text" placeholder="Enter Driver Name"  name="driver"  class="form-control " />
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                            <div class="form-group ">
                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                                                        <label class="control-label" for="check19">19. Driver Cell No. </label>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="col-sm-8">
                                                                                                                                                                                                        <div class="">
                                                                                                                                                                                                            <input id="ctrl-check19"  value="<?php  echo $data['check19']; ?>" type="number" placeholder="Enter 19. Driver Cell No." step="1"  name="check19"  class="form-control " />
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="form-group ">
                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                        <div class="col-sm-4">
                                                                                                                                                                                                            <label class="control-label" for="remarks">Remarks </label>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="col-sm-8">
                                                                                                                                                                                                            <div class="">
                                                                                                                                                                                                                <input type="checkbox" id="ctrl-remarks" value="<?php  echo $data['remarks']; ?>" class="switch-checkbox" data-on="ok" data-off="not ok"  data-name="remarks" data-onlabel="Ok" data-offlabel="Not Ok" />
                                                                                                                                                                                                                    <input type="hidden" name="remarks"  value="<?php  echo $data['remarks']; ?>" />
                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="form-ajax-status"></div>
                                                                                                                                                                                                    <div class="form-group text-center">
                                                                                                                                                                                                        <button class="btn btn-primary" type="submit">
                                                                                                                                                                                                            Update
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
