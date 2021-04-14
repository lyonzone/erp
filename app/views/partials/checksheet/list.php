<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Checksheet</h4>
                </div>
                <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("checksheet/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Checksheet 
                    </a>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('checksheet'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('checksheet'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('checksheet'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="checksheet-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <th class="td-sno">#</th>
                                                <th  class="td-transporter"> Transporter</th>
                                                <th  class="td-date"> Date</th>
                                                <th  class="td-vehicle"> Vehicle</th>
                                                <th  class="td-inv"> Inv</th>
                                                <th  class="td-people"> People</th>
                                                <th  class="td-vtype"> Vtype</th>
                                                <th  class="td-wtype"> Wtype</th>
                                                <th  class="td-site"> Site</th>
                                                <th  class="td-check1"> Check1</th>
                                                <th  class="td-ckeck2"> Ckeck2</th>
                                                <th  class="td-ckeck3"> Ckeck3</th>
                                                <th  class="td-check4"> Check4</th>
                                                <th  class="td-check5"> Check5</th>
                                                <th  class="td-check6"> Check6</th>
                                                <th  class="td-check7"> Check7</th>
                                                <th  class="td-check8"> Check8</th>
                                                <th  class="td-check9"> Check9</th>
                                                <th  class="td-check10"> Check10</th>
                                                <th  class="td-check11"> Check11</th>
                                                <th  class="td-check12"> Check12</th>
                                                <th  class="td-check13"> Check13</th>
                                                <th  class="td-check14"> Check14</th>
                                                <th  class="td-check15"> Check15</th>
                                                <th  class="td-check16"> Check16</th>
                                                <th  class="td-check17"> Check17</th>
                                                <th  class="td-check18"> Check18</th>
                                                <th  class="td-check19"> Check19</th>
                                                <th  class="td-check15_1"> Check15 1</th>
                                                <th  class="td-remarks"> Remarks</th>
                                                <th  class="td-driver"> Driver</th>
                                                <th  class="td-check11_1"> Check11 1</th>
                                                <th  class="td-id"> Id</th>
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    <td class="td-transporter">
                                                        <span  data-value="<?php echo $data['transporter']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="transporter" 
                                                            data-title="Enter Transporter" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['transporter']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-date">
                                                        <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['date']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="date" 
                                                            data-title="Enter Date" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['date']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-vehicle">
                                                        <span  data-value="<?php echo $data['vehicle']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="vehicle" 
                                                            data-title="Enter Vehicle" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['vehicle']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-inv">
                                                        <span  data-value="<?php echo $data['inv']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="inv" 
                                                            data-title="Enter Inv" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['inv']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-people">
                                                        <span  data-value="<?php echo $data['people']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="people" 
                                                            data-title="Enter People" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['people']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-vtype">
                                                        <span  data-value="<?php echo $data['vtype']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="vtype" 
                                                            data-title="Enter Vtype" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['vtype']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wtype">
                                                        <span  data-value="<?php echo $data['wtype']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wtype" 
                                                            data-title="Enter Wtype" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['wtype']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-site">
                                                        <span  data-value="<?php echo $data['site']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="site" 
                                                            data-title="Enter Site" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['site']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check1">
                                                        <span  data-value="<?php echo $data['check1']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check1" 
                                                            data-title="Enter Check1" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check1']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ckeck2">
                                                        <span  data-value="<?php echo $data['ckeck2']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ckeck2" 
                                                            data-title="Enter Ckeck2" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['ckeck2']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ckeck3">
                                                        <span  data-value="<?php echo $data['ckeck3']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="ckeck3" 
                                                            data-title="Enter Ckeck3" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['ckeck3']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check4">
                                                        <span  data-value="<?php echo $data['check4']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check4" 
                                                            data-title="Enter Check4" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check4']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check5">
                                                        <span  data-value="<?php echo $data['check5']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check5" 
                                                            data-title="Enter Check5" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check5']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check6">
                                                        <span  data-value="<?php echo $data['check6']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check6" 
                                                            data-title="Enter Check6" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check6']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check7">
                                                        <span  data-value="<?php echo $data['check7']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check7" 
                                                            data-title="Enter Check7" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check7']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check8">
                                                        <span  data-value="<?php echo $data['check8']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check8" 
                                                            data-title="Enter Check8" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check8']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check9">
                                                        <span  data-value="<?php echo $data['check9']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check9" 
                                                            data-title="Enter Check9" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check9']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check10">
                                                        <span  data-value="<?php echo $data['check10']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check10" 
                                                            data-title="Enter Check10" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check10']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check11">
                                                        <span  data-value="<?php echo $data['check11']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check11" 
                                                            data-title="Enter Check11" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check11']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check12">
                                                        <span  data-value="<?php echo $data['check12']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check12" 
                                                            data-title="Enter Check12" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check12']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check13">
                                                        <span  data-value="<?php echo $data['check13']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check13" 
                                                            data-title="Enter Check13" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check13']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check14">
                                                        <span  data-value="<?php echo $data['check14']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check14" 
                                                            data-title="Enter Check14" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check14']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check15">
                                                        <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['check15']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check15" 
                                                            data-title="Enter Check15" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check15']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check16">
                                                        <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['check16']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check16" 
                                                            data-title="Enter Check16" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check16']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check17">
                                                        <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['check17']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check17" 
                                                            data-title="Enter Check17" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check17']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check18">
                                                        <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['check18']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check18" 
                                                            data-title="Enter Check18" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check18']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check19">
                                                        <span  data-value="<?php echo $data['check19']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check19" 
                                                            data-title="Enter Check19" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check19']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check15_1">
                                                        <span  data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check15_1" 
                                                            data-title="Enter Check15 1" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check15_1']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-remarks">
                                                        <span  data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="remarks" 
                                                            data-title="Enter Remarks" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['remarks']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-driver">
                                                        <span  data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="driver" 
                                                            data-title="Enter Driver" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['driver']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-check11_1">
                                                        <span  data-value="<?php echo $data['check11_1']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("checksheet/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="check11_1" 
                                                            data-title="Enter Check11 1" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['check11_1']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-id"><a href="<?php print_link("checksheet/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
                                                    <th class="td-btn">
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("checksheet/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("checksheet/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("checksheet/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                            <i class="fa fa-times"></i>
                                                            Delete
                                                        </a>
                                                    </th>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                                <!--endrecord-->
                                            </tbody>
                                            <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                        <?php 
                                        if(empty($records)){
                                        ?>
                                        <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                            <i class="fa fa-ban"></i> No record found
                                        </h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if( $show_footer && !empty($records)){
                                    ?>
                                    <div class=" border-top mt-2">
                                        <div class="row justify-content-center">    
                                            <div class="col-md-auto justify-content-center">    
                                                <div class="p-3 d-flex justify-content-between">    
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("checksheet/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <div class="dropup export-btn-holder mx-1">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-save"></i> Export
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                                </a>
                                                                <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                                <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                    <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                    </a>
                                                                    <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                    <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                        <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                        </a>
                                                                        <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                        <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                            <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                            </a>
                                                                            <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                            <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                                <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">   
                                                                    <?php
                                                                    if($show_pagination == true){
                                                                    $pager = new Pagination($total_records, $record_count);
                                                                    $pager->route = $this->route;
                                                                    $pager->show_page_count = true;
                                                                    $pager->show_record_count = true;
                                                                    $pager->show_page_limit =true;
                                                                    $pager->limit_count = $this->limit_count;
                                                                    $pager->show_page_number_list = true;
                                                                    $pager->pager_link_range=5;
                                                                    $pager->render();
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
