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
                        <form id="truck-invupdate-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="<?php print_link("truck/invupdate?csrf_token=$csrf_token") ?>" method="post" >
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="truck_entry">Truck Entry</label></th>
                                            <th class="bg-light"><label for="truck_no">Truck No</label></th>
                                            <th class="bg-light"><label for="no_of_wheel">No Of Wheel</label></th>
                                            <th class="bg-light"><label for="driver_name">Driver Name</label></th>
                                            <th class="bg-light"><label for="driver_mobile_no">Driver Mobile No</label></th>
                                            <th class="bg-light"><label for="dl_no">Dl No</label></th>
                                            <th class="bg-light"><label for="supplier">Supplier</label></th>
                                            <th class="bg-light"><label for="material">Material</label></th>
                                            <th class="bg-light"><label for="material_type">Material Type</label></th>
                                            <th class="bg-light"><label for="bill_no">Bill No</label></th>
                                            <th class="bg-light"><label for="bill_date">Bill Date</label></th>
                                            <th class="bg-light"><label for="quantity">Quantity</label></th>
                                            <th class="bg-light"><label for="unit">Unit</label></th>
                                            <th class="bg-light"><label for="lr_no">Lr No</label></th>
                                            <th class="bg-light"><label for="coa">Coa</label></th>
                                            <th class="bg-light"><label for="amount">Amount</label></th>
                                            <th class="bg-light"><label for="basic_rate">Basic Rate</label></th>
                                            <th class="bg-light"><label for="truck_exit">Truck Exit</label></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        for( $row = 1; $row <= 1; $row++ ){
                                        ?>
                                        <tr class="input-row">
                                            <td>
                                                <div id="ctrl-truck_entry-row<?php echo $row; ?>-holder" class="input-group">
                                                    <input id="ctrl-truck_entry-row<?php echo $row; ?>" class="form-control datepicker  datepicker" required="" value="<?php  echo $this->set_field_value('truck_entry',datetime_now(), $row); ?>" type="datetime"  name="row<?php echo $row ?>[truck_entry]" placeholder="Enter Truck Entry" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="d-m-Y H:i:s" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="ctrl-truck_no-row<?php echo $row; ?>-holder" class="">
                                                        <input id="ctrl-truck_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('truck_no',"", $row); ?>" type="text" placeholder="Enter Truck No"  required="" name="row<?php echo $row ?>[truck_no]"  class="form-control " />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div id="ctrl-no_of_wheel-row<?php echo $row; ?>-holder" class="">
                                                            <select required=""  id="ctrl-no_of_wheel-row<?php echo $row; ?>" name="row<?php echo $row ?>[no_of_wheel]"  placeholder="Select a value ..."    class="custom-select" >
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
                                                    </td>
                                                    <td>
                                                        <div id="ctrl-driver_name-row<?php echo $row; ?>-holder" class="">
                                                            <input id="ctrl-driver_name-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('driver_name',"", $row); ?>" type="text" placeholder="Enter Driver Name"  required="" name="row<?php echo $row ?>[driver_name]"  class="form-control " />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div id="ctrl-driver_mobile_no-row<?php echo $row; ?>-holder" class="">
                                                                <input id="ctrl-driver_mobile_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('driver_mobile_no',"", $row); ?>" type="text" placeholder="Enter Driver Mobile No"  required="" name="row<?php echo $row ?>[driver_mobile_no]"  class="form-control " />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="ctrl-dl_no-row<?php echo $row; ?>-holder" class="">
                                                                    <input id="ctrl-dl_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('dl_no',"", $row); ?>" type="text" placeholder="Enter Dl No"  required="" name="row<?php echo $row ?>[dl_no]"  class="form-control " />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div id="ctrl-supplier-row<?php echo $row; ?>-holder" class="">
                                                                        <input id="ctrl-supplier-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('supplier',"", $row); ?>" type="text" placeholder="Enter Supplier" list="supplier_list"  required="" name="row<?php echo $row ?>[supplier]"  class="form-control " />
                                                                            <datalist id="supplier_list">
                                                                                <?php 
                                                                                $supplier_options = $comp_model -> truck_supplier_option_list();
                                                                                if(!empty($supplier_options)){
                                                                                foreach($supplier_options as $option){
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
                                                                    </td>
                                                                    <td>
                                                                        <div id="ctrl-material-row<?php echo $row; ?>-holder" class="">
                                                                            <input id="ctrl-material-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('material',"", $row); ?>" type="text" placeholder="Enter Material" list="material_list"  required="" name="row<?php echo $row ?>[material]"  class="form-control " />
                                                                                <datalist id="material_list">
                                                                                    <?php 
                                                                                    $material_options = $comp_model -> truck_material_option_list();
                                                                                    if(!empty($material_options)){
                                                                                    foreach($material_options as $option){
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
                                                                        </td>
                                                                        <td>
                                                                            <div id="ctrl-material_type-row<?php echo $row; ?>-holder" class="">
                                                                                <select  id="ctrl-material_type-row<?php echo $row; ?>" name="row<?php echo $row ?>[material_type]"  placeholder="Select a value ..."    class="custom-select" >
                                                                                    <option value="">Select a value ...</option>
                                                                                    <?php
                                                                                    $material_type_options = Menu :: $material_type;
                                                                                    if(!empty($material_type_options)){
                                                                                    foreach($material_type_options as $option){
                                                                                    $value = $option['value'];
                                                                                    $label = $option['label'];
                                                                                    $selected = $this->set_field_selected('material_type', $value, "");
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
                                                                        </td>
                                                                        <td>
                                                                            <div id="ctrl-bill_no-row<?php echo $row; ?>-holder" class="">
                                                                                <input id="ctrl-bill_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('bill_no',"", $row); ?>" type="text" placeholder="Enter Bill No"  required="" name="row<?php echo $row ?>[bill_no]"  class="form-control " />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div id="ctrl-bill_date-row<?php echo $row; ?>-holder" class="input-group">
                                                                                    <input id="ctrl-bill_date-row<?php echo $row; ?>" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('bill_date',date_now(), $row); ?>" type="datetime" name="row<?php echo $row ?>[bill_date]" placeholder="Enter Bill Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div id="ctrl-quantity-row<?php echo $row; ?>-holder" class="">
                                                                                        <input id="ctrl-quantity-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('quantity',"", $row); ?>" type="text" placeholder="Enter Quantity"  required="" name="row<?php echo $row ?>[quantity]"  class="form-control " />
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div id="ctrl-unit-row<?php echo $row; ?>-holder" class="">
                                                                                            <select required=""  id="ctrl-unit-row<?php echo $row; ?>" name="row<?php echo $row ?>[unit]"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                <option value="">Select a value ...</option>
                                                                                                <?php
                                                                                                $unit_options = Menu :: $unit;
                                                                                                if(!empty($unit_options)){
                                                                                                foreach($unit_options as $option){
                                                                                                $value = $option['value'];
                                                                                                $label = $option['label'];
                                                                                                $selected = $this->set_field_selected('unit', $value, "");
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
                                                                                    </td>
                                                                                    <td>
                                                                                        <div id="ctrl-lr_no-row<?php echo $row; ?>-holder" class="">
                                                                                            <input id="ctrl-lr_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('lr_no',"", $row); ?>" type="text" placeholder="Enter Lr No"  required="" name="row<?php echo $row ?>[lr_no]"  class="form-control " />
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div id="ctrl-coa-row<?php echo $row; ?>-holder" class="">
                                                                                                <select required=""  id="ctrl-coa-row<?php echo $row; ?>" name="row<?php echo $row ?>[coa]"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                    <option value="">Select a value ...</option>
                                                                                                    <?php
                                                                                                    $coa_options = Menu :: $coa;
                                                                                                    if(!empty($coa_options)){
                                                                                                    foreach($coa_options as $option){
                                                                                                    $value = $option['value'];
                                                                                                    $label = $option['label'];
                                                                                                    $selected = $this->set_field_selected('coa', $value, "");
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
                                                                                        </td>
                                                                                        <td>
                                                                                            <div id="ctrl-amount-row<?php echo $row; ?>-holder" class="">
                                                                                                <input id="ctrl-amount-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('amount',"", $row); ?>" type="text" placeholder="Enter Amount"  required="" name="row<?php echo $row ?>[amount]"  class="form-control " />
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div id="ctrl-basic_rate-row<?php echo $row; ?>-holder" class="">
                                                                                                    <input id="ctrl-basic_rate-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('basic_rate',"", $row); ?>" type="text" placeholder="Enter Basic Rate"  required="" name="row<?php echo $row ?>[basic_rate]"  class="form-control " />
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <div id="ctrl-truck_exit-row<?php echo $row; ?>-holder" class="">
                                                                                                        <input id="ctrl-truck_exit-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('truck_exit',"Not Exit", $row); ?>" type="text" placeholder="Enter Truck Exit" list="truck_exit_list"  required="" name="row<?php echo $row ?>[truck_exit]"  class="form-control " />
                                                                                                            <datalist id="truck_exit_list">
                                                                                                                <?php
                                                                                                                $truck_exit_options = Menu :: $truck_exit;
                                                                                                                if(!empty($truck_exit_options)){
                                                                                                                foreach($truck_exit_options as $option){
                                                                                                                $value = $option['value'];
                                                                                                                $label = $option['label'];
                                                                                                                $selected = $this->set_field_selected('truck_exit', $value, "Not Exit");
                                                                                                                ?>
                                                                                                                <option><?php  echo $this->set_field_value('truck_exit',"Not Exit", $row); ?></option>
                                                                                                                <?php
                                                                                                                }
                                                                                                                }
                                                                                                                ?>
                                                                                                            </datalist>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <th class="text-center">
                                                                                                        <button type="button" class="close btn-remove-table-row">&times;</button>
                                                                                                    </th>
                                                                                                </tr>
                                                                                                <?php 
                                                                                                }
                                                                                                ?>
                                                                                            </tbody>
                                                                                            <tfoot>
                                                                                                <tr>
                                                                                                    <th colspan="100" class="text-right">
                                                                                                        <?php $template_id = "table-row-" . random_str(); ?>
                                                                                                        <button type="button" data-template="#<?php echo $template_id ?>" class="btn btn-sm btn-light btn-add-table-row"><i class="fa fa-plus"></i></button>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </tfoot>
                                                                                        </table>
                                                                                    </div>
                                                                                    <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                                        <div class="form-ajax-status"></div>
                                                                                        <button class="btn btn-primary" type="submit">
                                                                                            Submit
                                                                                            <i class="fa fa-send"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </form>
                                                                                <!--[table row template]-->
                                                                                <template id="<?php echo $template_id ?>">
                                                                                    <tr class="input-row">
                                                                                        <?php $row = 1; ?>
                                                                                        <td>
                                                                                            <div id="ctrl-truck_entry-row<?php echo $row; ?>-holder" class="input-group">
                                                                                                <input id="ctrl-truck_entry-row<?php echo $row; ?>" class="form-control datepicker  datepicker" required="" value="<?php  echo $this->set_field_value('truck_entry',datetime_now(), $row); ?>" type="datetime"  name="row<?php echo $row ?>[truck_entry]" placeholder="Enter Truck Entry" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="d-m-Y H:i:s" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                                                                    <div class="input-group-append">
                                                                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div id="ctrl-truck_no-row<?php echo $row; ?>-holder" class="">
                                                                                                    <input id="ctrl-truck_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('truck_no',"", $row); ?>" type="text" placeholder="Enter Truck No"  required="" name="row<?php echo $row ?>[truck_no]"  class="form-control " />
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <div id="ctrl-no_of_wheel-row<?php echo $row; ?>-holder" class="">
                                                                                                        <select required=""  id="ctrl-no_of_wheel-row<?php echo $row; ?>" name="row<?php echo $row ?>[no_of_wheel]"  placeholder="Select a value ..."    class="custom-select" >
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
                                                                                                </td>
                                                                                                <td>
                                                                                                    <div id="ctrl-driver_name-row<?php echo $row; ?>-holder" class="">
                                                                                                        <input id="ctrl-driver_name-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('driver_name',"", $row); ?>" type="text" placeholder="Enter Driver Name"  required="" name="row<?php echo $row ?>[driver_name]"  class="form-control " />
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <div id="ctrl-driver_mobile_no-row<?php echo $row; ?>-holder" class="">
                                                                                                            <input id="ctrl-driver_mobile_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('driver_mobile_no',"", $row); ?>" type="text" placeholder="Enter Driver Mobile No"  required="" name="row<?php echo $row ?>[driver_mobile_no]"  class="form-control " />
                                                                                                            </div>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div id="ctrl-dl_no-row<?php echo $row; ?>-holder" class="">
                                                                                                                <input id="ctrl-dl_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('dl_no',"", $row); ?>" type="text" placeholder="Enter Dl No"  required="" name="row<?php echo $row ?>[dl_no]"  class="form-control " />
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <div id="ctrl-supplier-row<?php echo $row; ?>-holder" class="">
                                                                                                                    <input id="ctrl-supplier-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('supplier',"", $row); ?>" type="text" placeholder="Enter Supplier" list="supplier_list"  required="" name="row<?php echo $row ?>[supplier]"  class="form-control " />
                                                                                                                        <datalist id="supplier_list">
                                                                                                                            <?php 
                                                                                                                            $supplier_options = $comp_model -> truck_supplier_option_list();
                                                                                                                            if(!empty($supplier_options)){
                                                                                                                            foreach($supplier_options as $option){
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
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <div id="ctrl-material-row<?php echo $row; ?>-holder" class="">
                                                                                                                        <input id="ctrl-material-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('material',"", $row); ?>" type="text" placeholder="Enter Material" list="material_list"  required="" name="row<?php echo $row ?>[material]"  class="form-control " />
                                                                                                                            <datalist id="material_list">
                                                                                                                                <?php 
                                                                                                                                $material_options = $comp_model -> truck_material_option_list();
                                                                                                                                if(!empty($material_options)){
                                                                                                                                foreach($material_options as $option){
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
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <div id="ctrl-material_type-row<?php echo $row; ?>-holder" class="">
                                                                                                                            <select  id="ctrl-material_type-row<?php echo $row; ?>" name="row<?php echo $row ?>[material_type]"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                                <option value="">Select a value ...</option>
                                                                                                                                <?php
                                                                                                                                $material_type_options = Menu :: $material_type;
                                                                                                                                if(!empty($material_type_options)){
                                                                                                                                foreach($material_type_options as $option){
                                                                                                                                $value = $option['value'];
                                                                                                                                $label = $option['label'];
                                                                                                                                $selected = $this->set_field_selected('material_type', $value, "");
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
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <div id="ctrl-bill_no-row<?php echo $row; ?>-holder" class="">
                                                                                                                            <input id="ctrl-bill_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('bill_no',"", $row); ?>" type="text" placeholder="Enter Bill No"  required="" name="row<?php echo $row ?>[bill_no]"  class="form-control " />
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                            <div id="ctrl-bill_date-row<?php echo $row; ?>-holder" class="input-group">
                                                                                                                                <input id="ctrl-bill_date-row<?php echo $row; ?>" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('bill_date',date_now(), $row); ?>" type="datetime" name="row<?php echo $row ?>[bill_date]" placeholder="Enter Bill Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                                                                                    <div class="input-group-append">
                                                                                                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <div id="ctrl-quantity-row<?php echo $row; ?>-holder" class="">
                                                                                                                                    <input id="ctrl-quantity-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('quantity',"", $row); ?>" type="text" placeholder="Enter Quantity"  required="" name="row<?php echo $row ?>[quantity]"  class="form-control " />
                                                                                                                                    </div>
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    <div id="ctrl-unit-row<?php echo $row; ?>-holder" class="">
                                                                                                                                        <select required=""  id="ctrl-unit-row<?php echo $row; ?>" name="row<?php echo $row ?>[unit]"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                                            <option value="">Select a value ...</option>
                                                                                                                                            <?php
                                                                                                                                            $unit_options = Menu :: $unit;
                                                                                                                                            if(!empty($unit_options)){
                                                                                                                                            foreach($unit_options as $option){
                                                                                                                                            $value = $option['value'];
                                                                                                                                            $label = $option['label'];
                                                                                                                                            $selected = $this->set_field_selected('unit', $value, "");
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
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    <div id="ctrl-lr_no-row<?php echo $row; ?>-holder" class="">
                                                                                                                                        <input id="ctrl-lr_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('lr_no',"", $row); ?>" type="text" placeholder="Enter Lr No"  required="" name="row<?php echo $row ?>[lr_no]"  class="form-control " />
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                    <td>
                                                                                                                                        <div id="ctrl-coa-row<?php echo $row; ?>-holder" class="">
                                                                                                                                            <select required=""  id="ctrl-coa-row<?php echo $row; ?>" name="row<?php echo $row ?>[coa]"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                                                <option value="">Select a value ...</option>
                                                                                                                                                <?php
                                                                                                                                                $coa_options = Menu :: $coa;
                                                                                                                                                if(!empty($coa_options)){
                                                                                                                                                foreach($coa_options as $option){
                                                                                                                                                $value = $option['value'];
                                                                                                                                                $label = $option['label'];
                                                                                                                                                $selected = $this->set_field_selected('coa', $value, "");
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
                                                                                                                                    </td>
                                                                                                                                    <td>
                                                                                                                                        <div id="ctrl-amount-row<?php echo $row; ?>-holder" class="">
                                                                                                                                            <input id="ctrl-amount-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('amount',"", $row); ?>" type="text" placeholder="Enter Amount"  required="" name="row<?php echo $row ?>[amount]"  class="form-control " />
                                                                                                                                            </div>
                                                                                                                                        </td>
                                                                                                                                        <td>
                                                                                                                                            <div id="ctrl-basic_rate-row<?php echo $row; ?>-holder" class="">
                                                                                                                                                <input id="ctrl-basic_rate-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('basic_rate',"", $row); ?>" type="text" placeholder="Enter Basic Rate"  required="" name="row<?php echo $row ?>[basic_rate]"  class="form-control " />
                                                                                                                                                </div>
                                                                                                                                            </td>
                                                                                                                                            <td>
                                                                                                                                                <div id="ctrl-truck_exit-row<?php echo $row; ?>-holder" class="">
                                                                                                                                                    <input id="ctrl-truck_exit-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('truck_exit',"Not Exit", $row); ?>" type="text" placeholder="Enter Truck Exit" list="truck_exit_list"  required="" name="row<?php echo $row ?>[truck_exit]"  class="form-control " />
                                                                                                                                                        <datalist id="truck_exit_list">
                                                                                                                                                            <?php
                                                                                                                                                            $truck_exit_options = Menu :: $truck_exit;
                                                                                                                                                            if(!empty($truck_exit_options)){
                                                                                                                                                            foreach($truck_exit_options as $option){
                                                                                                                                                            $value = $option['value'];
                                                                                                                                                            $label = $option['label'];
                                                                                                                                                            $selected = $this->set_field_selected('truck_exit', $value, "Not Exit");
                                                                                                                                                            ?>
                                                                                                                                                            <option><?php  echo $this->set_field_value('truck_exit',"Not Exit", $row); ?></option>
                                                                                                                                                            <?php
                                                                                                                                                            }
                                                                                                                                                            }
                                                                                                                                                            ?>
                                                                                                                                                        </datalist>
                                                                                                                                                    </div>
                                                                                                                                                </td>
                                                                                                                                                <th class="text-center">
                                                                                                                                                    <button type="button" class="close btn-remove-table-row">&times;</button>
                                                                                                                                                </th>
                                                                                                                                            </tr>
                                                                                                                                        </template>
                                                                                                                                        <!--[/table row template]-->
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </section>
