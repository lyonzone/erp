<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("lorry/add");
$can_edit = ACL::is_allowed("lorry/edit");
$can_view = ACL::is_allowed("lorry/view");
$can_delete = ACL::is_allowed("lorry/delete");
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
                    <h4 class="record-title">View  Lorry</h4>
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
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['transporter']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="transporter" 
                                                data-title="Enter Transporter" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['transporter']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-date">
                                        <th class="title"> Date: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['date']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="date" 
                                                data-title="Enter Date" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-vehicle">
                                        <th class="title"> Vehicle: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['vehicle']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="vehicle" 
                                                data-title="Enter Vehicle No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['vehicle']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-vtype">
                                        <th class="title"> Vehicle Type: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $vtype); ?>' 
                                                data-value="<?php echo $data['vtype']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="vtype" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['vtype']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-wtype">
                                        <th class="title"> Work Type: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['wtype']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="wtype" 
                                                data-title="Enter Work Type" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['wtype']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-site">
                                        <th class="title"> Site: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['site']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="site" 
                                                data-title="Enter Site" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['site']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check1">
                                        <th class="title"> 01. Are there any broken wooden planks: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['check1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check1" 
                                                data-title="Enter 01. Are there any broken wooden planks" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ckeck2">
                                        <th class="title"> 01. Are there any sharp edges or sharp objects (eg. Nails) protruding inside the truck body: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['ckeck2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="ckeck2" 
                                                data-title="Enter 01. Are there any sharp edges or sharp objects (eg. Nails) protruding inside the truck body" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ckeck2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ckeck3">
                                        <th class="title"> 03. Is there any bad odour.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['ckeck3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="ckeck3" 
                                                data-title="Enter 03. Is there any bad odour." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ckeck3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check4">
                                        <th class="title"> 04. Is truck body inside clean and dry free from dust/cement/mud/stains water etc: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['check4']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check4" 
                                                data-title="Enter 04. Is truck body inside clean and dry free from dust/cement/mud/stains water etc" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check4']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check5">
                                        <th class="title"> 04. Is truck body inside clean and dry free from dust/cement/mud/stains water etc: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['check5']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check5" 
                                                data-title="Enter 05. Are tarpaulins available for floor and cover" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check5']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check6">
                                        <th class="title"> Is tarpaulin sixe adequate and of good condition: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['check6']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check6" 
                                                data-title="Enter 06. Is tarpaulin sixe adequate and of good condition" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check6']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check7">
                                        <th class="title"> Are rope and rope guards (to prevent rope marks) provided either LANGLES: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['check7']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check7" 
                                                data-title="Enter 07. Are rope and rope guards (to prevent rope marks) provided either LANGLES" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check7']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check8">
                                        <th class="title"> 08. Are stoppers provided: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['check8']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check8" 
                                                data-title="Enter 08. Are stoppers provided" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check8']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check9">
                                        <th class="title"> 09. Are there any flammables present inside the truck: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['check9']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check9" 
                                                data-title="Enter 09. Are there any flammables present inside the truck" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check9']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check10">
                                        <th class="title"> 10. Is cleaners assistance taken while reversing the vehicle: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['check10']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check10" 
                                                data-title="Enter 10. Is cleaners assistance taken while reversing the vehicle" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check10']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check11">
                                        <th class="title"> 11. Truck driver Driving licence : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['check11']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check11" 
                                                data-title="Does the truck driver have a valid licence and RTO approval Present" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check11']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check11_1">
                                        <th class="title"> Driving Licence approval Present Till: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['check11_1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check11_1" 
                                                data-title="Enter Driving Licence approval Present Till" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check11_1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check12">
                                        <th class="title"> 12. Does the truck number match with that given STN/Invoice: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['check12']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check12" 
                                                data-title="Enter 12. Does the truck number match with that given STN/Invoice" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check12']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check13">
                                        <th class="title"> 13. Does the Truck contain material other than HUL: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['check13']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check13" 
                                                data-title="Enter 13. Does the Truck contain material other than HUL" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check13']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check14">
                                        <th class="title"> 14. Any other abnormality Found: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "yes", label: "Yes"},{value: "No", label: "No"}]' 
                                                data-value="<?php echo $data['check14']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check14" 
                                                data-title="Enter 14. Any other abnormality Found" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check14']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check15_1">
                                        <th class="title"> 15. Polution Clearance No.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['check15_1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check15_1" 
                                                data-title="Enter 15. Polution Clearance No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check15_1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check15">
                                        <th class="title"> Polution Clearance Valid Till: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['check15']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check15" 
                                                data-title="Enter Polution Clearance Valid Till" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check15']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check16">
                                        <th class="title"> 16. Insurance Valid Till: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['check16']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check16" 
                                                data-title="Enter 16. Insurance Valid Till" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check16']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check17">
                                        <th class="title"> 17. Fitness Valid Till: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['check17']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check17" 
                                                data-title="Enter 17. Fitness Valid Till" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check17']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check18">
                                        <th class="title"> 18. Road Tax valid Till: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['check18']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check18" 
                                                data-title="Enter 18. Road Tax valid Till" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check18']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-driver">
                                        <th class="title"> Driver: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['driver']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="driver" 
                                                data-title="Enter Driver Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['driver']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-check19">
                                        <th class="title"> 19. Driver Cell No.: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['check19']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="check19" 
                                                data-title="Enter 19. Driver Cell No." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['check19']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-remarks">
                                        <th class="title"> Remarks: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='[{value: "ok", label: "Ok"},{value: "Not Ok", label: "Not Ok"}]' 
                                                data-value="<?php echo $data['remarks']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
                                                data-name="remarks" 
                                                data-title="Enter Remarks" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['remarks']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-id">
                                        <th class="title"> Checksheet No.: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-submitted_by">
                                        <th class="title"> Submitted By: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['submitted_by']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("lorry/editfield/" . urlencode($data['slno'])); ?>" 
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
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("lorry/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("lorry/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <?php } ?>
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
