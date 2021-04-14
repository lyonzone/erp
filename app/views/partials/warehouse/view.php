<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("warehouse/add");
$can_edit = ACL::is_allowed("warehouse/edit");
$can_view = ACL::is_allowed("warehouse/view");
$can_delete = ACL::is_allowed("warehouse/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Warehouse</h4>
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
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-date">
                                        <th class="title"> Date: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="date" 
                                                data-title="Enter DATE" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-production">
                                        <th class="title"> Production: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/warehouse_production_option_list'); ?>' 
                                                data-value="<?php echo $data['production']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="production" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['production']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-shift">
                                        <th class="title"> Shift: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/warehouse_shift_option_list'); ?>' 
                                                data-value="<?php echo $data['shift']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="shift" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['shift']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-sku">
                                        <th class="title"> Sku: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['sku']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="sku" 
                                                data-title="Enter SKU" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['sku']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt1">
                                        <th class="title"> Wt1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt1" 
                                                data-title="POUCH WEIGHT (GMS)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt2">
                                        <th class="title"> Wt2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt2" 
                                                data-title="M/C No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt3">
                                        <th class="title"> Wt3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt3" 
                                                data-title="Hours" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt4">
                                        <th class="title"> Wt4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt4" 
                                                data-title="Enter " 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt5">
                                        <th class="title"> Wt5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt5" 
                                                data-title="Enter " 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt6">
                                        <th class="title"> Wt6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt6" 
                                                data-title="Enter " 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt7">
                                        <th class="title"> Wt7: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt7" 
                                                data-title="Enter " 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt8">
                                        <th class="title"> Wt8: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt8']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt8" 
                                                data-title="Enter " 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt8']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt9">
                                        <th class="title"> Wt9: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt9']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt9" 
                                                data-title="Enter " 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt9']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt10">
                                        <th class="title"> Wt10: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt10']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt10" 
                                                data-title="Enter " 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt10']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt11">
                                        <th class="title"> Wt11: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt11']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt11" 
                                                data-title="Enter " 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt11']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt12">
                                        <th class="title"> Wt12: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt12']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt12" 
                                                data-title="Enter " 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt12']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt13">
                                        <th class="title"> Wt13: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt13']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt13" 
                                                data-title="Enter " 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt13']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt14">
                                        <th class="title"> Wt14: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt14']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt14" 
                                                data-title="M/C No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt14']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt15">
                                        <th class="title"> Wt15: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt15']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt15" 
                                                data-title="Hours" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt15']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt16">
                                        <th class="title"> Wt16: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt16']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt16" 
                                                data-title="Enter Wt16" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt16']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt17">
                                        <th class="title"> Wt17: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt17']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt17" 
                                                data-title="Enter Wt17" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt17']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt18">
                                        <th class="title"> Wt18: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt18']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt18" 
                                                data-title="Enter Wt18" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt18']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt19">
                                        <th class="title"> Wt19: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt19']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt19" 
                                                data-title="Enter Wt19" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt19']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt20">
                                        <th class="title"> Wt20: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt20']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt20" 
                                                data-title="Enter Wt20" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt20']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt21">
                                        <th class="title"> Wt21: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt21']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt21" 
                                                data-title="Enter Wt21" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt21']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt22">
                                        <th class="title"> Wt22: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt22']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt22" 
                                                data-title="Enter Wt22" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt22']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt23">
                                        <th class="title"> Wt23: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt23']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt23" 
                                                data-title="Enter Wt23" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt23']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt24">
                                        <th class="title"> Wt24: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt24']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt24" 
                                                data-title="Enter Wt24" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt24']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt25">
                                        <th class="title"> Wt25: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt25']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt25" 
                                                data-title="Enter Wt25" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt25']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt26">
                                        <th class="title"> Wt26: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt26']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt26" 
                                                data-title="M/C No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt26']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt27">
                                        <th class="title"> Wt27: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt27']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt27" 
                                                data-title="Hours" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt27']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt28">
                                        <th class="title"> Wt28: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt28']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt28" 
                                                data-title="Enter Wt28" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt28']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt29">
                                        <th class="title"> Wt29: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt29']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt29" 
                                                data-title="Enter Wt29" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt29']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt30">
                                        <th class="title"> Wt30: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt30']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt30" 
                                                data-title="Enter Wt30" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt30']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt31">
                                        <th class="title"> Wt31: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt31']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt31" 
                                                data-title="Enter Wt31" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt31']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt32">
                                        <th class="title"> Wt32: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt32']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt32" 
                                                data-title="Enter Wt32" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt32']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt33">
                                        <th class="title"> Wt33: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt33']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt33" 
                                                data-title="Enter Wt33" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt33']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt34">
                                        <th class="title"> Wt34: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt34']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt34" 
                                                data-title="Enter Wt34" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt34']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt35">
                                        <th class="title"> Wt35: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt35']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt35" 
                                                data-title="Enter Wt35" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt35']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt36">
                                        <th class="title"> Wt36: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt36']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt36" 
                                                data-title="Enter Wt36" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt36']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt37">
                                        <th class="title"> Wt37: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt37']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt37" 
                                                data-title="Enter Wt37" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt37']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt38">
                                        <th class="title"> Wt38: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt38']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt38" 
                                                data-title="M/C No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt38']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt39">
                                        <th class="title"> Wt39: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt39']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt39" 
                                                data-title="Hours" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt39']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt40">
                                        <th class="title"> Wt40: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt40']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt40" 
                                                data-title="Enter Wt40" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt40']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt41">
                                        <th class="title"> Wt41: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt41']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt41" 
                                                data-title="Enter Wt41" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt41']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt42">
                                        <th class="title"> Wt42: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt42']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt42" 
                                                data-title="Enter Wt42" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt42']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt43">
                                        <th class="title"> Wt43: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt43']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt43" 
                                                data-title="Enter Wt43" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt43']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt44">
                                        <th class="title"> Wt44: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt44']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt44" 
                                                data-title="Enter Wt44" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt44']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt45">
                                        <th class="title"> Wt45: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt45']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt45" 
                                                data-title="Enter Wt45" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt45']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt46">
                                        <th class="title"> Wt46: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt46']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt46" 
                                                data-title="Enter Wt46" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt46']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt47">
                                        <th class="title"> Wt47: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt47']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt47" 
                                                data-title="Enter Wt47" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt47']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt48">
                                        <th class="title"> Wt48: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt48']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt48" 
                                                data-title="Enter Wt48" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt48']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt49">
                                        <th class="title"> Wt49: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt49']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt49" 
                                                data-title="Enter Wt49" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt49']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt50">
                                        <th class="title"> Wt50: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt50']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt50" 
                                                data-title="M/C No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt50']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt51">
                                        <th class="title"> Wt51: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt51']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt51" 
                                                data-title="Hours" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt51']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt52">
                                        <th class="title"> Wt52: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt52']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt52" 
                                                data-title="Enter Wt52" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt52']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt53">
                                        <th class="title"> Wt53: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt53']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt53" 
                                                data-title="Enter Wt53" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt53']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt54">
                                        <th class="title"> Wt54: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt54']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt54" 
                                                data-title="Enter Wt54" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt54']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt55">
                                        <th class="title"> Wt55: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt55']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt55" 
                                                data-title="Enter Wt55" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt55']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt56">
                                        <th class="title"> Wt56: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt56']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt56" 
                                                data-title="Enter Wt56" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt56']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt57">
                                        <th class="title"> Wt57: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt57']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt57" 
                                                data-title="Enter Wt57" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt57']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt58">
                                        <th class="title"> Wt58: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt58']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt58" 
                                                data-title="Enter Wt58" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt58']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt59">
                                        <th class="title"> Wt59: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt59']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt59" 
                                                data-title="Enter Wt59" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt59']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt60">
                                        <th class="title"> Wt60: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt60']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt60" 
                                                data-title="Enter Wt60" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt60']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt61">
                                        <th class="title"> Wt61: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt61']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt61" 
                                                data-title="Enter Wt61" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt61']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt62">
                                        <th class="title"> Wt62: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt62']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt62" 
                                                data-title="M/C No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt62']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt63">
                                        <th class="title"> Wt63: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt63']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt63" 
                                                data-title="Hours" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt63']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt64">
                                        <th class="title"> Wt64: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt64']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt64" 
                                                data-title="Enter Wt64" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt64']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt65">
                                        <th class="title"> Wt65: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt65']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt65" 
                                                data-title="Enter Wt65" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt65']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt67">
                                        <th class="title"> Wt67: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt67']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt67" 
                                                data-title="Enter Wt67" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt67']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt68">
                                        <th class="title"> Wt68: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt68']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt68" 
                                                data-title="Enter Wt68" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt68']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt69">
                                        <th class="title"> Wt69: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt69']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt69" 
                                                data-title="Enter Wt69" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt69']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt70">
                                        <th class="title"> Wt70: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt70']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt70" 
                                                data-title="Enter Wt70" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt70']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt71">
                                        <th class="title"> Wt71: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt71']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt71" 
                                                data-title="Enter Wt71" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt71']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt72">
                                        <th class="title"> Wt72: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt72']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt72" 
                                                data-title="Enter Wt72" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt72']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt73">
                                        <th class="title"> Wt73: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt73']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt73" 
                                                data-title="Enter Wt73" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt73']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt74">
                                        <th class="title"> Wt74: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt74']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt74" 
                                                data-title="Enter Wt74" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt74']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt75">
                                        <th class="title"> Wt75: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt75']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt75" 
                                                data-title="M/C No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt75']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt76">
                                        <th class="title"> Wt76: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt76']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt76" 
                                                data-title="Hours" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt76']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt77">
                                        <th class="title"> Wt77: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt77']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt77" 
                                                data-title="Enter Wt77" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt77']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt78">
                                        <th class="title"> Wt78: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt78']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt78" 
                                                data-title="Enter Wt78" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt78']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt79">
                                        <th class="title"> Wt79: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt79']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt79" 
                                                data-title="Enter Wt79" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt79']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt80">
                                        <th class="title"> Wt80: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt80']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt80" 
                                                data-title="Enter Wt80" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt80']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt81">
                                        <th class="title"> Wt81: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt81']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt81" 
                                                data-title="Enter Wt81" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt81']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt82">
                                        <th class="title"> Wt82: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt82']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt82" 
                                                data-title="Enter Wt82" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt82']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt83">
                                        <th class="title"> Wt83: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt83']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt83" 
                                                data-title="Enter Wt83" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt83']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt84">
                                        <th class="title"> Wt84: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt84']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt84" 
                                                data-title="Enter Wt84" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt84']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt85">
                                        <th class="title"> Wt85: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt85']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt85" 
                                                data-title="Enter Wt85" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt85']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt86">
                                        <th class="title"> Wt86: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt86']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt86" 
                                                data-title="Enter Wt86" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt86']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt87">
                                        <th class="title"> Wt87: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt87']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt87" 
                                                data-title="M/C No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt87']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt88">
                                        <th class="title"> Wt88: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt88']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt88" 
                                                data-title="Hours" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt88']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt89">
                                        <th class="title"> Wt89: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt89']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt89" 
                                                data-title="Enter Wt89" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt89']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt90">
                                        <th class="title"> Wt90: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt90']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt90" 
                                                data-title="Enter Wt90" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt90']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt91">
                                        <th class="title"> Wt91: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt91']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt91" 
                                                data-title="Enter Wt91" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt91']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt92">
                                        <th class="title"> Wt92: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt92']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt92" 
                                                data-title="Enter Wt92" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt92']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt93">
                                        <th class="title"> Wt93: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt93']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt93" 
                                                data-title="Enter Wt93" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt93']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt94">
                                        <th class="title"> Wt94: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt94']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt94" 
                                                data-title="Enter Wt94" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt94']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt95">
                                        <th class="title"> Wt95: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt95']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt95" 
                                                data-title="Enter Wt95" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt95']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt96">
                                        <th class="title"> Wt96: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt96']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt96" 
                                                data-title="Enter Wt96" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt96']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt97">
                                        <th class="title"> Wt97: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt97']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt97" 
                                                data-title="Enter Wt97" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt97']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt98">
                                        <th class="title"> Wt98: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt98']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt98" 
                                                data-title="Enter Wt98" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt98']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt99">
                                        <th class="title"> Wt99: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt99']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt99" 
                                                data-title="M/C no." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt99']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt100">
                                        <th class="title"> Wt100: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt100']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt100" 
                                                data-title="Hours" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt100']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt101">
                                        <th class="title"> Wt101: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt101']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt101" 
                                                data-title="Enter Wt101" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt101']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt102">
                                        <th class="title"> Wt102: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt102']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt102" 
                                                data-title="Enter Wt102" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt102']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt103">
                                        <th class="title"> Wt103: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt103']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt103" 
                                                data-title="Enter Wt103" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt103']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt104">
                                        <th class="title"> Wt104: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt104']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt104" 
                                                data-title="Enter Wt104" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt104']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt105">
                                        <th class="title"> Wt105: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt105']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt105" 
                                                data-title="Enter Wt105" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt105']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt106">
                                        <th class="title"> Wt106: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt106']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt106" 
                                                data-title="Enter Wt106" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt106']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt107">
                                        <th class="title"> Wt107: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt107']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt107" 
                                                data-title="Enter Wt107" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt107']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt108">
                                        <th class="title"> Wt108: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt108']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt108" 
                                                data-title="Enter Wt108" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt108']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt109">
                                        <th class="title"> Wt109: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt109']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt109" 
                                                data-title="Enter Wt109" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt109']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt110">
                                        <th class="title"> Wt110: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt110']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt110" 
                                                data-title="Enter Wt110" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt110']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt111">
                                        <th class="title"> Wt111: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt111']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt111" 
                                                data-title="M/C No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt111']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt112">
                                        <th class="title"> Wt112: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt112']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt112" 
                                                data-title="Hours" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt112']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt113">
                                        <th class="title"> Wt113: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt113']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt113" 
                                                data-title="Enter Wt113" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt113']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt114">
                                        <th class="title"> Wt114: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt114']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt114" 
                                                data-title="Enter Wt114" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt114']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt115">
                                        <th class="title"> Wt115: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt115']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt115" 
                                                data-title="Enter Wt115" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt115']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt116">
                                        <th class="title"> Wt116: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt116']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt116" 
                                                data-title="Enter Wt116" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt116']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt117">
                                        <th class="title"> Wt117: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt117']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt117" 
                                                data-title="Enter Wt117" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt117']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt118">
                                        <th class="title"> Wt118: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt118']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt118" 
                                                data-title="Enter Wt118" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt118']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt119">
                                        <th class="title"> Wt119: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt119']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt119" 
                                                data-title="Enter Wt119" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt119']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt120">
                                        <th class="title"> Wt120: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt120']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt120" 
                                                data-title="Enter Wt120" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt120']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt121">
                                        <th class="title"> Wt121: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt121']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt121" 
                                                data-title="Enter Wt121" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt121']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt122">
                                        <th class="title"> Wt122: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt122']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt122" 
                                                data-title="Enter Wt122" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt122']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-LEAKERS">
                                        <th class="title"> Leakers: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['LEAKERS']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="LEAKERS" 
                                                data-title="Leakers" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['LEAKERS']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt123">
                                        <th class="title"> Wt123: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt123']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt123" 
                                                data-title="Enter Wt123" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt123']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt124">
                                        <th class="title"> Wt124: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt124']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt124" 
                                                data-title="Enter Wt124" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt124']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt125">
                                        <th class="title"> Wt125: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt125']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt125" 
                                                data-title="Enter Wt125" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt125']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt126">
                                        <th class="title"> Wt126: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt126']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt126" 
                                                data-title="Enter Wt126" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt126']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt127">
                                        <th class="title"> Wt127: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt127']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt127" 
                                                data-title="Enter Wt127" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt127']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt128">
                                        <th class="title"> Wt128: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt128']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt128" 
                                                data-title="Enter Wt128" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt128']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt129">
                                        <th class="title"> Wt129: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt129']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt129" 
                                                data-title="Enter Wt129" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt129']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt130">
                                        <th class="title"> Wt130: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt130']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt130" 
                                                data-title="Enter Wt130" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt130']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt131">
                                        <th class="title"> Wt131: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt131']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt131" 
                                                data-title="Enter Wt131" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt131']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt132">
                                        <th class="title"> Wt132: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt132']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt132" 
                                                data-title="Enter Wt132" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt132']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-POUCH">
                                        <th class="title"> Pouch: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['POUCH']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="POUCH" 
                                                data-title="No of Pouches" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['POUCH']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt133">
                                        <th class="title"> Wt133: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt133']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt133" 
                                                data-title="Enter Wt133" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt133']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt134">
                                        <th class="title"> Wt134: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt134']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt134" 
                                                data-title="Enter Wt134" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt134']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt135">
                                        <th class="title"> Wt135: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt135']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt135" 
                                                data-title="Enter Wt135" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt135']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt136">
                                        <th class="title"> Wt136: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt136']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt136" 
                                                data-title="Enter Wt136" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt136']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt137">
                                        <th class="title"> Wt137: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt137']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt137" 
                                                data-title="Enter Wt137" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt137']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt138">
                                        <th class="title"> Wt138: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt138']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt138" 
                                                data-title="Enter Wt138" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt138']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt139">
                                        <th class="title"> Wt139: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt139']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt139" 
                                                data-title="Enter Wt139" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt139']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt140">
                                        <th class="title"> Wt140: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt140']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt140" 
                                                data-title="Enter Wt140" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt140']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt141">
                                        <th class="title"> Wt141: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt141']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt141" 
                                                data-title="Enter Wt141" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt141']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt142">
                                        <th class="title"> Wt142: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt142']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt142" 
                                                data-title="Enter Wt142" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt142']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-netx">
                                        <th class="title"> Netx: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['netx']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="netx" 
                                                data-title="Net(x)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['netx']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt143">
                                        <th class="title"> Wt143: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt143']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt143" 
                                                data-title="Enter Net(x)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt143']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-netmin">
                                        <th class="title"> Netmin: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['netmin']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="netmin" 
                                                data-title="Net(min)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['netmin']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt144">
                                        <th class="title"> Wt144: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt144']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt144" 
                                                data-title="Enter Net(min)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt144']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-sd">
                                        <th class="title"> Sd: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['sd']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="sd" 
                                                data-title="S.D." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['sd']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt145">
                                        <th class="title"> Wt145: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt145']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt145" 
                                                data-title="Enter S.D." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt145']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-netmax">
                                        <th class="title"> Netmax: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['netmax']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="netmax" 
                                                data-title="Net(max)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['netmax']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wt146">
                                        <th class="title"> Wt146: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wt146']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wt146" 
                                                data-title="Enter Net(max)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wt146']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-defects">
                                        <th class="title"> Defects: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['defects']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="defects" 
                                                data-title="Pouch Defects" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['defects']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red">
                                        <th class="title"> Red: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red" 
                                                data-title="Enter Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber">
                                        <th class="title"> Amber: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber" 
                                                data-title="Enter Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-sample">
                                        <th class="title"> Sample: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['sample']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="sample" 
                                                data-title="Sample Size" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['sample']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-leaker">
                                        <th class="title"> Leaker: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['leaker']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="leaker" 
                                                data-title="Leaker" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['leaker']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red1">
                                        <th class="title"> Red1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red1" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber1">
                                        <th class="title"> Amber1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber1" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-damage">
                                        <th class="title"> Damage: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['damage']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="damage" 
                                                data-title="Damage" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['damage']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red2">
                                        <th class="title"> Red2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red2" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber2">
                                        <th class="title"> Amber2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber2" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-burntseal">
                                        <th class="title"> Burntseal: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['burntseal']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="burntseal" 
                                                data-title="Burntseal" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['burntseal']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red3">
                                        <th class="title"> Red3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red3" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber3">
                                        <th class="title"> Amber3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber3" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wrinkeled">
                                        <th class="title"> Wrinkeled: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wrinkeled']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="wrinkeled" 
                                                data-title="Wrinkeled" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wrinkeled']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red4">
                                        <th class="title"> Red4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red4" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber4">
                                        <th class="title"> Amber4: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber4" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-skiew">
                                        <th class="title"> Skiew: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['skiew']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="skiew" 
                                                data-title="Skiew" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['skiew']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red5">
                                        <th class="title"> Red5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red5" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber5">
                                        <th class="title"> Amber5: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber5" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-totaldefects">
                                        <th class="title"> Totaldefects: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['totaldefects']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="totaldefects" 
                                                data-title="Totaldefects" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['totaldefects']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red6">
                                        <th class="title"> Red6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red6" 
                                                data-title="Red6" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber6">
                                        <th class="title"> Amber6: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber6" 
                                                data-title="Amber6" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-powder">
                                        <th class="title"> Powder: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['powder']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="powder" 
                                                data-title="Powder Defects" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['powder']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red7">
                                        <th class="title"> Red7: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red7" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber7">
                                        <th class="title"> Amber7: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber7" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-sample1">
                                        <th class="title"> Sample1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['sample1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="sample1" 
                                                data-title="Enter Sample1" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['sample1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-colour">
                                        <th class="title"> Colour: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['colour']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="colour" 
                                                data-title="Colour" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['colour']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red8">
                                        <th class="title"> Red8: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $red8); ?>' 
                                                data-value="<?php echo $data['red8']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red8" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red8']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber8">
                                        <th class="title"> Amber8: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $red8); ?>' 
                                                data-value="<?php echo $data['amber8']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber8" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber8']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-perfume">
                                        <th class="title"> Perfume: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['perfume']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="perfume" 
                                                data-title="Perfume" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['perfume']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red9">
                                        <th class="title"> Red9: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $red8); ?>' 
                                                data-value="<?php echo $data['red9']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red9" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red9']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber9">
                                        <th class="title"> Amber9: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $red8); ?>' 
                                                data-value="<?php echo $data['amber9']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber9" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber9']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-foreignmat">
                                        <th class="title"> Foreignmat: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['foreignmat']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="foreignmat" 
                                                data-title="Foreign Matter" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['foreignmat']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red10">
                                        <th class="title"> Red10: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red10']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red10" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red10']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber10">
                                        <th class="title"> Amber10: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber10']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber10" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber10']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-unmixed">
                                        <th class="title"> Unmixed: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['unmixed']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="unmixed" 
                                                data-title="Unmixed" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['unmixed']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red11">
                                        <th class="title"> Red11: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red11']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red11" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red11']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber11">
                                        <th class="title"> Amber11: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber11']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber11" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber11']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-totaldef">
                                        <th class="title"> Totaldef: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['totaldef']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="totaldef" 
                                                data-title="Total Defects" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['totaldef']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-percentage">
                                        <th class="title"> Percentage: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['percentage']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="percentage" 
                                                data-title="Percentage" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['percentage']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-pouchdef">
                                        <th class="title"> Pouchdef: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['pouchdef']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="pouchdef" 
                                                data-title="Poush Defects" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['pouchdef']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red12">
                                        <th class="title"> Red12: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red12']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red12" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red12']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber12">
                                        <th class="title"> Amber12: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber12']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber12" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber12']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-powderdef">
                                        <th class="title"> Powderdef: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['powderdef']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="powderdef" 
                                                data-title="Powder Defects" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['powderdef']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red13">
                                        <th class="title"> Red13: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red13']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red13" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red13']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber13">
                                        <th class="title"> Amber13: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber13']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber13" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber13']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-totaldedect">
                                        <th class="title"> Totaldedect: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['totaldedect']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="totaldedect" 
                                                data-title="Total Defects" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['totaldedect']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red14">
                                        <th class="title"> Red14: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red14']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red14" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red14']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber14">
                                        <th class="title"> Amber14: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber14']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber14" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber14']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red15">
                                        <th class="title"> Red15: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red15']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red15" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red15']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber15">
                                        <th class="title"> Amber15: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber15']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber15" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber15']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-red16">
                                        <th class="title"> Red16: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['red16']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="red16" 
                                                data-title="Red" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['red16']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-amber16">
                                        <th class="title"> Amber16: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['amber16']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="amber16" 
                                                data-title="Amber" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['amber16']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-totald">
                                        <th class="title"> Totald: </th>
                                        <td class="value"> <?php echo $data['totald']; ?></td>
                                    </tr>
                                    <tr  class="td-remarks">
                                        <th class="title"> Remarks: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['remarks']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="remarks" 
                                                data-title="Remarks" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['remarks']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-rdata">
                                        <th class="title"> Rdata: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="rdata" 
                                                data-title="Selected 10 bags from above shift production, checked 100% for defects, randomly collected 100 pouches for wt. checking, then refilled the bags, restitched and stacked at proper place" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['rdata']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-scatch">
                                        <th class="title"> Scatch: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $scatch); ?>' 
                                                data-value="<?php echo $data['scatch']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="scatch" 
                                                data-title="Scatch Tape Test" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['scatch']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-test">
                                        <th class="title"> Test: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $scatch); ?>' 
                                                data-value="<?php echo $data['test']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="test" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['test']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-signature">
                                        <th class="title"> Signature: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['signature']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("warehouse/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="signature" 
                                                data-title="Enter Signature" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['signature']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
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
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
