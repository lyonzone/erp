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
                    <h4 class="record-title">Add New Bill Materials</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container-fluid">
            <div class="row mx-auto">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="bill_materials-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="<?php print_link("bill_materials/add?csrf_token=$csrf_token") ?>" method="post" >
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="20" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="date">Date</label></th>
                                            <th class="bg-light"><label for="vehicle">Vehicle</label></th>
                                            <th class="bg-light"><label for="bill">Bill No</label></th>
                                            <th class="bg-light"><label for="lr_no">Lr No</label></th>
                                            <th class="bg-light"><label for="material_name">Select Material Name From Below</label></th>
                                            <th class="bg-light"><label for="bags">Bags</label></th>
                                            <th class="bg-light"><label for="truck_seal">Truck Seal</label></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        for( $row = 1; $row <= 1; $row++ ){
                                        ?>
                                        <tr class="input-row">
                                            <td>
                                                <div id="ctrl-date-row<?php echo $row; ?>-holder" class="input-group">
                                                    <input id="ctrl-date-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('date',"", $row); ?>" type="text" placeholder="Enter Date"  required="" name="row<?php echo $row ?>[date]"  class="form-control " />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="ctrl-vehicle-row<?php echo $row; ?>-holder" class="">
                                                        <input id="ctrl-vehicle-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('vehicle',"", $row); ?>" type="text" placeholder="Enter Vehicle"  required="" name="row<?php echo $row ?>[vehicle]"  class="form-control " />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div id="ctrl-bill-row<?php echo $row; ?>-holder" class="">
                                                            <input id="ctrl-bill-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('bill',"", $row); ?>" type="text" placeholder="Enter Bill No"  required="" name="row<?php echo $row ?>[bill]"  class="form-control " />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div id="ctrl-lr_no-row<?php echo $row; ?>-holder" class="">
                                                                <input id="ctrl-lr_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('lr_no',"", $row); ?>" type="text" placeholder="Enter Lr No"  name="row<?php echo $row ?>[lr_no]"  class="form-control " />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="ctrl-material_name-row<?php echo $row; ?>-holder" class="">
                                                                    <input id="ctrl-material_name-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('material_name',"", $row); ?>" type="text" placeholder="Enter Select Material Name From Below" list="material_name_list"  required="" name="row<?php echo $row ?>[material_name]"  class="form-control " />
                                                                        <datalist id="material_name_list">
                                                                            <?php 
                                                                            $material_name_options = $comp_model -> bill_materials_material_name_option_list();
                                                                            if(!empty($material_name_options)){
                                                                            foreach($material_name_options as $option){
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
                                                                    <div id="ctrl-bags-row<?php echo $row; ?>-holder" class="">
                                                                        <input id="ctrl-bags-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('bags',"", $row); ?>" type="text" placeholder="Enter Bags"  required="" name="row<?php echo $row ?>[bags]"  class="form-control " />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="ctrl-truck_seal-row<?php echo $row; ?>-holder" class="">
                                                                            <input id="ctrl-truck_seal-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('truck_seal',"", $row); ?>" type="text" placeholder="Enter Truck Seal"  name="row<?php echo $row ?>[truck_seal]"  class="form-control " />
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
                                                                <div id="ctrl-date-row<?php echo $row; ?>-holder" class="input-group">
                                                                    <input id="ctrl-date-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('date',"", $row); ?>" type="text" placeholder="Enter Date"  required="" name="row<?php echo $row ?>[date]"  class="form-control " />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div id="ctrl-vehicle-row<?php echo $row; ?>-holder" class="">
                                                                        <input id="ctrl-vehicle-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('vehicle',"", $row); ?>" type="text" placeholder="Enter Vehicle"  required="" name="row<?php echo $row ?>[vehicle]"  class="form-control " />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="ctrl-bill-row<?php echo $row; ?>-holder" class="">
                                                                            <input id="ctrl-bill-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('bill',"", $row); ?>" type="text" placeholder="Enter Bill No"  required="" name="row<?php echo $row ?>[bill]"  class="form-control " />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="ctrl-lr_no-row<?php echo $row; ?>-holder" class="">
                                                                                <input id="ctrl-lr_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('lr_no',"", $row); ?>" type="text" placeholder="Enter Lr No"  name="row<?php echo $row ?>[lr_no]"  class="form-control " />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div id="ctrl-material_name-row<?php echo $row; ?>-holder" class="">
                                                                                    <input id="ctrl-material_name-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('material_name',"", $row); ?>" type="text" placeholder="Enter Select Material Name From Below" list="material_name_list"  required="" name="row<?php echo $row ?>[material_name]"  class="form-control " />
                                                                                        <datalist id="material_name_list">
                                                                                            <?php 
                                                                                            $material_name_options = $comp_model -> bill_materials_material_name_option_list();
                                                                                            if(!empty($material_name_options)){
                                                                                            foreach($material_name_options as $option){
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
                                                                                    <div id="ctrl-bags-row<?php echo $row; ?>-holder" class="">
                                                                                        <input id="ctrl-bags-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('bags',"", $row); ?>" type="text" placeholder="Enter Bags"  required="" name="row<?php echo $row ?>[bags]"  class="form-control " />
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div id="ctrl-truck_seal-row<?php echo $row; ?>-holder" class="">
                                                                                            <input id="ctrl-truck_seal-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('truck_seal',"", $row); ?>" type="text" placeholder="Enter Truck Seal"  name="row<?php echo $row ?>[truck_seal]"  class="form-control " />
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
