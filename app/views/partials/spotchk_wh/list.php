<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("spotchk_wh/add");
$can_edit = ACL::is_allowed("spotchk_wh/edit");
$can_view = ACL::is_allowed("spotchk_wh/view");
$can_delete = ACL::is_allowed("spotchk_wh/delete");
?>
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
                    <h4 class="record-title">Spotchk Wh</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("spotchk_wh/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Spotchk Wh 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('spotchk_wh'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('spotchk_wh'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('spotchk_wh'); ?>">
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
                            <div id="spotchk_wh-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <?php } ?>
                                                <th class="td-sno">#</th>
                                                <th  class="td-date"> Date</th>
                                                <th  class="td-shift"> Shift</th>
                                                <th  class="td-addition"> Addition</th>
                                                <th  class="td-soda"> SODA ASH IN Kg.</th>
                                                <th  class="td-salt_pvd"> Salt in Kg. | PVD</th>
                                                <th  class="td-sul_tinopal"> Sulphonic Acid + Tinopal Water</th>
                                                <th  class="td-flow_aid"> White PAS in Kg.</th>
                                                <th  class="td-dolomite"> Dolomite in Kg.</th>
                                                <th  class="td-forcal_u"> Forcal U in Kg.</th>
                                                <th  class="td-orange_sp"> Orange Specle in Kg.</th>
                                                <th  class="td-blue_sp"> Blue Specle in Kg.</th>
                                                <th  class="td-perfume"> Perfume in Kg.</th>
                                                <th  class="td-water"> Water in Ltr</th>
                                                <th  class="td-blutton_c"> Blutton-C in Kg.</th>
                                                <th  class="td-mes"> MES in Kg.</th>
                                                <th  class="td-disc_wt"> Weight of the Disk</th>
                                                <th  class="td-disc_samplewt"> Weight of the Disk+Sample</th>
                                                <th  class="td-wtloss_dry"> Weight Loss after Drying</th>
                                                <th  class="td-Salt_Moisture"> Salt Moisture (%)</th>
                                                <th  class="td-submitted_by"> Submitted By</th>
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
                                                <?php if($can_delete){ ?>
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <?php } ?>
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    <td class="td-date">
                                                        <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['date']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="date" 
                                                            data-title="Enter Date" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['date']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-shift">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['shift']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="shift" 
                                                            data-title="Enter Shift" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['shift']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-addition">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $addition); ?>' 
                                                            data-value="<?php echo $data['addition']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="addition" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['addition']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-soda">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['soda']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="soda" 
                                                            data-title="Enter SODA ASH IN Kg." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['soda']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-salt_pvd">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['salt_pvd']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="salt_pvd" 
                                                            data-title="Enter Salt in Kg. | PVD" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['salt_pvd']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-sul_tinopal">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['sul_tinopal']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="sul_tinopal" 
                                                            data-title="Enter Sulphonic Acid + Tinopal Water" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['sul_tinopal']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-flow_aid">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['flow_aid']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="flow_aid" 
                                                            data-title="Enter White PAS in Kg." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['flow_aid']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-dolomite">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['dolomite']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="dolomite" 
                                                            data-title="Enter Dolomite in Kg." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['dolomite']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-forcal_u">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['forcal_u']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="forcal_u" 
                                                            data-title="Enter Forcal U in Kg." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['forcal_u']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-orange_sp">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['orange_sp']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="orange_sp" 
                                                            data-title="Enter Orange Specle in Kg." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['orange_sp']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-blue_sp">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['blue_sp']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="blue_sp" 
                                                            data-title="Enter Blue Specle in Kg." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['blue_sp']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-perfume">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['perfume']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="perfume" 
                                                            data-title="Enter Perfume in Kg." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['perfume']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-water">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['water']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="water" 
                                                            data-title="Enter Water in Ltr" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['water']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-blutton_c">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['blutton_c']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="blutton_c" 
                                                            data-title="Enter Blutton-C in Kg." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['blutton_c']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-mes">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['mes']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="mes" 
                                                            data-title="Enter MES in Kg." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['mes']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-disc_wt">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['disc_wt']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="disc_wt" 
                                                            data-title="Enter Weight of the Disk" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['disc_wt']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-disc_samplewt">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['disc_samplewt']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="disc_samplewt" 
                                                            data-title="Enter Weight of the Disk+Sample" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['disc_samplewt']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-wtloss_dry">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['wtloss_dry']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="wtloss_dry" 
                                                            data-title="Enter Weight Loss after Drying" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['wtloss_dry']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Salt_Moisture"> <?php echo $data['Salt_Moisture']; ?></td>
                                                    <td class="td-submitted_by">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['submitted_by']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("spotchk_wh/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="submitted_by" 
                                                            data-title="Enter Submitted By" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['submitted_by']; ?> 
                                                        </span>
                                                    </td>
                                                    <th class="td-btn">
                                                        <?php if($can_view){ ?>
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("spotchk_wh/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_edit){ ?>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("spotchk_wh/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_delete){ ?>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("spotchk_wh/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                            <i class="fa fa-times"></i>
                                                            Delete
                                                        </a>
                                                        <?php } ?>
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
                                                    <?php if($can_delete){ ?>
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("spotchk_wh/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <?php } ?>
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
