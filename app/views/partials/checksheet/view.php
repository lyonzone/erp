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
                    <h4 class="record-title">View  Checksheet</h4>
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
                                    <tr  class="td-transporter">
                                        <th class="title"> Transporter: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-date">
                                        <th class="title"> Date: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-vehicle">
                                        <th class="title"> Vehicle: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-inv">
                                        <th class="title"> Inv: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-people">
                                        <th class="title"> People: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-vtype">
                                        <th class="title"> Vtype: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-wtype">
                                        <th class="title"> Wtype: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-site">
                                        <th class="title"> Site: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check1">
                                        <th class="title"> Check1: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ckeck2">
                                        <th class="title"> Ckeck2: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-ckeck3">
                                        <th class="title"> Ckeck3: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check4">
                                        <th class="title"> Check4: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check5">
                                        <th class="title"> Check5: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check6">
                                        <th class="title"> Check6: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check7">
                                        <th class="title"> Check7: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check8">
                                        <th class="title"> Check8: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check9">
                                        <th class="title"> Check9: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check10">
                                        <th class="title"> Check10: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check11">
                                        <th class="title"> Check11: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check12">
                                        <th class="title"> Check12: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check13">
                                        <th class="title"> Check13: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check14">
                                        <th class="title"> Check14: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check15">
                                        <th class="title"> Check15: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check16">
                                        <th class="title"> Check16: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check17">
                                        <th class="title"> Check17: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check18">
                                        <th class="title"> Check18: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check19">
                                        <th class="title"> Check19: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check15_1">
                                        <th class="title"> Check15 1: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-remarks">
                                        <th class="title"> Remarks: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-driver">
                                        <th class="title"> Driver: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-check11_1">
                                        <th class="title"> Check11 1: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("checksheet/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("checksheet/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
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
