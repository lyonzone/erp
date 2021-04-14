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
                    <h4 class="record-title">Add New Pcro Wt</h4>
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
                        <form id="pcro_wt-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="<?php print_link("pcro_wt/add?csrf_token=$csrf_token") ?>" method="post" >
                            <div>
                                <table class="table table-striped table-sm" data-maxrow="16" data-minrow="1">
                                    <thead>
                                        <tr>
                                            <th class="bg-light"><label for="date">Date</label></th>
                                            <th class="bg-light"><label for="shift">Shift</label></th>
                                            <th class="bg-light"><label for="product">Product</label></th>
                                            <th class="bg-light"><label for="sku">Sku</label></th>
                                            <th class="bg-light"><label for="mc_no">Mc No</label></th>
                                            <th class="bg-light"><label for="wt_hr">Wt Hr</label></th>
                                            <th class="bg-light"><label for="weight">Weight</label></th>
                                            <th class="bg-light"><label for="deviation">Deviation</label></th>
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
                                                    <div id="ctrl-shift-row<?php echo $row; ?>-holder" class="">
                                                        <input id="ctrl-shift-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('shift',"", $row); ?>" type="text" placeholder="Enter Shift"  required="" name="row<?php echo $row ?>[shift]"  class="form-control " />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div id="ctrl-product-row<?php echo $row; ?>-holder" class="">
                                                            <input id="ctrl-product-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('product',"", $row); ?>" type="text" placeholder="Enter Product"  required="" name="row<?php echo $row ?>[product]"  class="form-control " />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div id="ctrl-sku-row<?php echo $row; ?>-holder" class="">
                                                                <input id="ctrl-sku-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('sku',"", $row); ?>" type="text" placeholder="Enter Sku"  required="" name="row<?php echo $row ?>[sku]"  class="form-control " />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="ctrl-mc_no-row<?php echo $row; ?>-holder" class="">
                                                                    <input id="ctrl-mc_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('mc_no',"", $row); ?>" type="text" placeholder="Enter Mc No"  required="" name="row<?php echo $row ?>[mc_no]"  class="form-control " />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div id="ctrl-wt_hr-row<?php echo $row; ?>-holder" class="">
                                                                        <input id="ctrl-wt_hr-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('wt_hr',"", $row); ?>" type="text" placeholder="Enter Wt Hr"  required="" name="row<?php echo $row ?>[wt_hr]"  class="form-control " />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="ctrl-weight-row<?php echo $row; ?>-holder" class="">
                                                                            <input id="ctrl-weight-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('weight',"", $row); ?>" type="text" placeholder="Enter Weight"  required="" name="row<?php echo $row ?>[weight]"  class="form-control " />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="ctrl-deviation-row<?php echo $row; ?>-holder" class="">
                                                                                <input id="ctrl-deviation-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('deviation',"", $row); ?>" type="text" placeholder="Enter Deviation"  required="" name="row<?php echo $row ?>[deviation]"  class="form-control " />
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
                                                                        <div id="ctrl-shift-row<?php echo $row; ?>-holder" class="">
                                                                            <input id="ctrl-shift-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('shift',"", $row); ?>" type="text" placeholder="Enter Shift"  required="" name="row<?php echo $row ?>[shift]"  class="form-control " />
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="ctrl-product-row<?php echo $row; ?>-holder" class="">
                                                                                <input id="ctrl-product-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('product',"", $row); ?>" type="text" placeholder="Enter Product"  required="" name="row<?php echo $row ?>[product]"  class="form-control " />
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div id="ctrl-sku-row<?php echo $row; ?>-holder" class="">
                                                                                    <input id="ctrl-sku-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('sku',"", $row); ?>" type="text" placeholder="Enter Sku"  required="" name="row<?php echo $row ?>[sku]"  class="form-control " />
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div id="ctrl-mc_no-row<?php echo $row; ?>-holder" class="">
                                                                                        <input id="ctrl-mc_no-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('mc_no',"", $row); ?>" type="text" placeholder="Enter Mc No"  required="" name="row<?php echo $row ?>[mc_no]"  class="form-control " />
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div id="ctrl-wt_hr-row<?php echo $row; ?>-holder" class="">
                                                                                            <input id="ctrl-wt_hr-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('wt_hr',"", $row); ?>" type="text" placeholder="Enter Wt Hr"  required="" name="row<?php echo $row ?>[wt_hr]"  class="form-control " />
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div id="ctrl-weight-row<?php echo $row; ?>-holder" class="">
                                                                                                <input id="ctrl-weight-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('weight',"", $row); ?>" type="text" placeholder="Enter Weight"  required="" name="row<?php echo $row ?>[weight]"  class="form-control " />
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div id="ctrl-deviation-row<?php echo $row; ?>-holder" class="">
                                                                                                    <input id="ctrl-deviation-row<?php echo $row; ?>"  value="<?php  echo $this->set_field_value('deviation',"", $row); ?>" type="text" placeholder="Enter Deviation"  required="" name="row<?php echo $row ?>[deviation]"  class="form-control " />
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
