<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("pcro/add");
$can_edit = ACL::is_allowed("pcro/edit");
$can_view = ACL::is_allowed("pcro/view");
$can_delete = ACL::is_allowed("pcro/delete");
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
<section class="page ajax-page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Pcro</h4>
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
                            <?php Html::ajaxpage_spinner(); ?>
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-date">
                                        <th class="title"> Date: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pcro/editfield/" . urlencode($data['id'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-production">
                                        <th class="title"> Production: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/pcro_production_option_list'); ?>' 
                                                data-value="<?php echo $data['production']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pcro/editfield/" . urlencode($data['id'])); ?>" 
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
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/pcro_shift_option_list'); ?>' 
                                                data-value="<?php echo $data['shift']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pcro/editfield/" . urlencode($data['id'])); ?>" 
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
                                        <td class="value"> <?php echo $data['sku']; ?></td>
                                    </tr>
                                    <tr  class="td-wt1">
                                        <th class="title"> Wt1: </th>
                                        <td class="value"> <?php echo $data['wt1']; ?></td>
                                    </tr>
                                    <tr  class="td-wt2">
                                        <th class="title"> Wt2: </th>
                                        <td class="value"> <?php echo $data['wt2']; ?></td>
                                    </tr>
                                    <tr  class="td-wt3">
                                        <th class="title"> Wt3: </th>
                                        <td class="value"> <?php echo $data['wt3']; ?></td>
                                    </tr>
                                    <tr  class="td-wt4">
                                        <th class="title"> Wt4: </th>
                                        <td class="value"> <?php echo $data['wt4']; ?></td>
                                    </tr>
                                    <tr  class="td-wt5">
                                        <th class="title"> Wt5: </th>
                                        <td class="value"> <?php echo $data['wt5']; ?></td>
                                    </tr>
                                    <tr  class="td-wt6">
                                        <th class="title"> Wt6: </th>
                                        <td class="value"> <?php echo $data['wt6']; ?></td>
                                    </tr>
                                    <tr  class="td-wt7">
                                        <th class="title"> Wt7: </th>
                                        <td class="value"> <?php echo $data['wt7']; ?></td>
                                    </tr>
                                    <tr  class="td-wt8">
                                        <th class="title"> Wt8: </th>
                                        <td class="value"> <?php echo $data['wt8']; ?></td>
                                    </tr>
                                    <tr  class="td-wt9">
                                        <th class="title"> Wt9: </th>
                                        <td class="value"> <?php echo $data['wt9']; ?></td>
                                    </tr>
                                    <tr  class="td-wt10">
                                        <th class="title"> Wt10: </th>
                                        <td class="value"> <?php echo $data['wt10']; ?></td>
                                    </tr>
                                    <tr  class="td-wt11">
                                        <th class="title"> Wt11: </th>
                                        <td class="value"> <?php echo $data['wt11']; ?></td>
                                    </tr>
                                    <tr  class="td-wt12">
                                        <th class="title"> Wt12: </th>
                                        <td class="value"> <?php echo $data['wt12']; ?></td>
                                    </tr>
                                    <tr  class="td-wt13">
                                        <th class="title"> Wt13: </th>
                                        <td class="value"> <?php echo $data['wt13']; ?></td>
                                    </tr>
                                    <tr  class="td-wt14">
                                        <th class="title"> Wt14: </th>
                                        <td class="value"> <?php echo $data['wt14']; ?></td>
                                    </tr>
                                    <tr  class="td-wt15">
                                        <th class="title"> Wt15: </th>
                                        <td class="value"> <?php echo $data['wt15']; ?></td>
                                    </tr>
                                    <tr  class="td-wt16">
                                        <th class="title"> Wt16: </th>
                                        <td class="value"> <?php echo $data['wt16']; ?></td>
                                    </tr>
                                    <tr  class="td-wt17">
                                        <th class="title"> Wt17: </th>
                                        <td class="value"> <?php echo $data['wt17']; ?></td>
                                    </tr>
                                    <tr  class="td-wt18">
                                        <th class="title"> Wt18: </th>
                                        <td class="value"> <?php echo $data['wt18']; ?></td>
                                    </tr>
                                    <tr  class="td-wt19">
                                        <th class="title"> Wt19: </th>
                                        <td class="value"> <?php echo $data['wt19']; ?></td>
                                    </tr>
                                    <tr  class="td-wt20">
                                        <th class="title"> Wt20: </th>
                                        <td class="value"> <?php echo $data['wt20']; ?></td>
                                    </tr>
                                    <tr  class="td-wt21">
                                        <th class="title"> Wt21: </th>
                                        <td class="value"> <?php echo $data['wt21']; ?></td>
                                    </tr>
                                    <tr  class="td-wt22">
                                        <th class="title"> Wt22: </th>
                                        <td class="value"> <?php echo $data['wt22']; ?></td>
                                    </tr>
                                    <tr  class="td-wt23">
                                        <th class="title"> Wt23: </th>
                                        <td class="value"> <?php echo $data['wt23']; ?></td>
                                    </tr>
                                    <tr  class="td-wt24">
                                        <th class="title"> Wt24: </th>
                                        <td class="value"> <?php echo $data['wt24']; ?></td>
                                    </tr>
                                    <tr  class="td-wt25">
                                        <th class="title"> Wt25: </th>
                                        <td class="value"> <?php echo $data['wt25']; ?></td>
                                    </tr>
                                    <tr  class="td-wt26">
                                        <th class="title"> Wt26: </th>
                                        <td class="value"> <?php echo $data['wt26']; ?></td>
                                    </tr>
                                    <tr  class="td-wt27">
                                        <th class="title"> Wt27: </th>
                                        <td class="value"> <?php echo $data['wt27']; ?></td>
                                    </tr>
                                    <tr  class="td-wt28">
                                        <th class="title"> Wt28: </th>
                                        <td class="value"> <?php echo $data['wt28']; ?></td>
                                    </tr>
                                    <tr  class="td-wt29">
                                        <th class="title"> Wt29: </th>
                                        <td class="value"> <?php echo $data['wt29']; ?></td>
                                    </tr>
                                    <tr  class="td-wt30">
                                        <th class="title"> Wt30: </th>
                                        <td class="value"> <?php echo $data['wt30']; ?></td>
                                    </tr>
                                    <tr  class="td-wt31">
                                        <th class="title"> Wt31: </th>
                                        <td class="value"> <?php echo $data['wt31']; ?></td>
                                    </tr>
                                    <tr  class="td-wt32">
                                        <th class="title"> Wt32: </th>
                                        <td class="value"> <?php echo $data['wt32']; ?></td>
                                    </tr>
                                    <tr  class="td-wt33">
                                        <th class="title"> Wt33: </th>
                                        <td class="value"> <?php echo $data['wt33']; ?></td>
                                    </tr>
                                    <tr  class="td-wt34">
                                        <th class="title"> Wt34: </th>
                                        <td class="value"> <?php echo $data['wt34']; ?></td>
                                    </tr>
                                    <tr  class="td-wt35">
                                        <th class="title"> Wt35: </th>
                                        <td class="value"> <?php echo $data['wt35']; ?></td>
                                    </tr>
                                    <tr  class="td-wt36">
                                        <th class="title"> Wt36: </th>
                                        <td class="value"> <?php echo $data['wt36']; ?></td>
                                    </tr>
                                    <tr  class="td-wt37">
                                        <th class="title"> Wt37: </th>
                                        <td class="value"> <?php echo $data['wt37']; ?></td>
                                    </tr>
                                    <tr  class="td-wt38">
                                        <th class="title"> Wt38: </th>
                                        <td class="value"> <?php echo $data['wt38']; ?></td>
                                    </tr>
                                    <tr  class="td-wt39">
                                        <th class="title"> Wt39: </th>
                                        <td class="value"> <?php echo $data['wt39']; ?></td>
                                    </tr>
                                    <tr  class="td-wt40">
                                        <th class="title"> Wt40: </th>
                                        <td class="value"> <?php echo $data['wt40']; ?></td>
                                    </tr>
                                    <tr  class="td-wt41">
                                        <th class="title"> Wt41: </th>
                                        <td class="value"> <?php echo $data['wt41']; ?></td>
                                    </tr>
                                    <tr  class="td-wt42">
                                        <th class="title"> Wt42: </th>
                                        <td class="value"> <?php echo $data['wt42']; ?></td>
                                    </tr>
                                    <tr  class="td-wt43">
                                        <th class="title"> Wt43: </th>
                                        <td class="value"> <?php echo $data['wt43']; ?></td>
                                    </tr>
                                    <tr  class="td-wt44">
                                        <th class="title"> Wt44: </th>
                                        <td class="value"> <?php echo $data['wt44']; ?></td>
                                    </tr>
                                    <tr  class="td-wt45">
                                        <th class="title"> Wt45: </th>
                                        <td class="value"> <?php echo $data['wt45']; ?></td>
                                    </tr>
                                    <tr  class="td-wt46">
                                        <th class="title"> Wt46: </th>
                                        <td class="value"> <?php echo $data['wt46']; ?></td>
                                    </tr>
                                    <tr  class="td-wt47">
                                        <th class="title"> Wt47: </th>
                                        <td class="value"> <?php echo $data['wt47']; ?></td>
                                    </tr>
                                    <tr  class="td-wt48">
                                        <th class="title"> Wt48: </th>
                                        <td class="value"> <?php echo $data['wt48']; ?></td>
                                    </tr>
                                    <tr  class="td-wt49">
                                        <th class="title"> Wt49: </th>
                                        <td class="value"> <?php echo $data['wt49']; ?></td>
                                    </tr>
                                    <tr  class="td-wt50">
                                        <th class="title"> Wt50: </th>
                                        <td class="value"> <?php echo $data['wt50']; ?></td>
                                    </tr>
                                    <tr  class="td-wt51">
                                        <th class="title"> Wt51: </th>
                                        <td class="value"> <?php echo $data['wt51']; ?></td>
                                    </tr>
                                    <tr  class="td-wt52">
                                        <th class="title"> Wt52: </th>
                                        <td class="value"> <?php echo $data['wt52']; ?></td>
                                    </tr>
                                    <tr  class="td-wt53">
                                        <th class="title"> Wt53: </th>
                                        <td class="value"> <?php echo $data['wt53']; ?></td>
                                    </tr>
                                    <tr  class="td-wt54">
                                        <th class="title"> Wt54: </th>
                                        <td class="value"> <?php echo $data['wt54']; ?></td>
                                    </tr>
                                    <tr  class="td-wt55">
                                        <th class="title"> Wt55: </th>
                                        <td class="value"> <?php echo $data['wt55']; ?></td>
                                    </tr>
                                    <tr  class="td-wt56">
                                        <th class="title"> Wt56: </th>
                                        <td class="value"> <?php echo $data['wt56']; ?></td>
                                    </tr>
                                    <tr  class="td-wt57">
                                        <th class="title"> Wt57: </th>
                                        <td class="value"> <?php echo $data['wt57']; ?></td>
                                    </tr>
                                    <tr  class="td-wt58">
                                        <th class="title"> Wt58: </th>
                                        <td class="value"> <?php echo $data['wt58']; ?></td>
                                    </tr>
                                    <tr  class="td-wt59">
                                        <th class="title"> Wt59: </th>
                                        <td class="value"> <?php echo $data['wt59']; ?></td>
                                    </tr>
                                    <tr  class="td-wt60">
                                        <th class="title"> Wt60: </th>
                                        <td class="value"> <?php echo $data['wt60']; ?></td>
                                    </tr>
                                    <tr  class="td-wt61">
                                        <th class="title"> Wt61: </th>
                                        <td class="value"> <?php echo $data['wt61']; ?></td>
                                    </tr>
                                    <tr  class="td-wt62">
                                        <th class="title"> Wt62: </th>
                                        <td class="value"> <?php echo $data['wt62']; ?></td>
                                    </tr>
                                    <tr  class="td-wt63">
                                        <th class="title"> Wt63: </th>
                                        <td class="value"> <?php echo $data['wt63']; ?></td>
                                    </tr>
                                    <tr  class="td-wt64">
                                        <th class="title"> Wt64: </th>
                                        <td class="value"> <?php echo $data['wt64']; ?></td>
                                    </tr>
                                    <tr  class="td-wt65">
                                        <th class="title"> Wt65: </th>
                                        <td class="value"> <?php echo $data['wt65']; ?></td>
                                    </tr>
                                    <tr  class="td-wt67">
                                        <th class="title"> Wt67: </th>
                                        <td class="value"> <?php echo $data['wt67']; ?></td>
                                    </tr>
                                    <tr  class="td-wt68">
                                        <th class="title"> Wt68: </th>
                                        <td class="value"> <?php echo $data['wt68']; ?></td>
                                    </tr>
                                    <tr  class="td-wt69">
                                        <th class="title"> Wt69: </th>
                                        <td class="value"> <?php echo $data['wt69']; ?></td>
                                    </tr>
                                    <tr  class="td-wt70">
                                        <th class="title"> Wt70: </th>
                                        <td class="value"> <?php echo $data['wt70']; ?></td>
                                    </tr>
                                    <tr  class="td-wt71">
                                        <th class="title"> Wt71: </th>
                                        <td class="value"> <?php echo $data['wt71']; ?></td>
                                    </tr>
                                    <tr  class="td-wt72">
                                        <th class="title"> Wt72: </th>
                                        <td class="value"> <?php echo $data['wt72']; ?></td>
                                    </tr>
                                    <tr  class="td-wt73">
                                        <th class="title"> Wt73: </th>
                                        <td class="value"> <?php echo $data['wt73']; ?></td>
                                    </tr>
                                    <tr  class="td-wt74">
                                        <th class="title"> Wt74: </th>
                                        <td class="value"> <?php echo $data['wt74']; ?></td>
                                    </tr>
                                    <tr  class="td-wt75">
                                        <th class="title"> Wt75: </th>
                                        <td class="value"> <?php echo $data['wt75']; ?></td>
                                    </tr>
                                    <tr  class="td-wt76">
                                        <th class="title"> Wt76: </th>
                                        <td class="value"> <?php echo $data['wt76']; ?></td>
                                    </tr>
                                    <tr  class="td-wt77">
                                        <th class="title"> Wt77: </th>
                                        <td class="value"> <?php echo $data['wt77']; ?></td>
                                    </tr>
                                    <tr  class="td-wt78">
                                        <th class="title"> Wt78: </th>
                                        <td class="value"> <?php echo $data['wt78']; ?></td>
                                    </tr>
                                    <tr  class="td-wt79">
                                        <th class="title"> Wt79: </th>
                                        <td class="value"> <?php echo $data['wt79']; ?></td>
                                    </tr>
                                    <tr  class="td-wt80">
                                        <th class="title"> Wt80: </th>
                                        <td class="value"> <?php echo $data['wt80']; ?></td>
                                    </tr>
                                    <tr  class="td-wt81">
                                        <th class="title"> Wt81: </th>
                                        <td class="value"> <?php echo $data['wt81']; ?></td>
                                    </tr>
                                    <tr  class="td-wt82">
                                        <th class="title"> Wt82: </th>
                                        <td class="value"> <?php echo $data['wt82']; ?></td>
                                    </tr>
                                    <tr  class="td-wt83">
                                        <th class="title"> Wt83: </th>
                                        <td class="value"> <?php echo $data['wt83']; ?></td>
                                    </tr>
                                    <tr  class="td-wt84">
                                        <th class="title"> Wt84: </th>
                                        <td class="value"> <?php echo $data['wt84']; ?></td>
                                    </tr>
                                    <tr  class="td-wt85">
                                        <th class="title"> Wt85: </th>
                                        <td class="value"> <?php echo $data['wt85']; ?></td>
                                    </tr>
                                    <tr  class="td-wt86">
                                        <th class="title"> Wt86: </th>
                                        <td class="value"> <?php echo $data['wt86']; ?></td>
                                    </tr>
                                    <tr  class="td-wt87">
                                        <th class="title"> Wt87: </th>
                                        <td class="value"> <?php echo $data['wt87']; ?></td>
                                    </tr>
                                    <tr  class="td-wt88">
                                        <th class="title"> Wt88: </th>
                                        <td class="value"> <?php echo $data['wt88']; ?></td>
                                    </tr>
                                    <tr  class="td-wt89">
                                        <th class="title"> Wt89: </th>
                                        <td class="value"> <?php echo $data['wt89']; ?></td>
                                    </tr>
                                    <tr  class="td-wt90">
                                        <th class="title"> Wt90: </th>
                                        <td class="value"> <?php echo $data['wt90']; ?></td>
                                    </tr>
                                    <tr  class="td-wt91">
                                        <th class="title"> Wt91: </th>
                                        <td class="value"> <?php echo $data['wt91']; ?></td>
                                    </tr>
                                    <tr  class="td-wt92">
                                        <th class="title"> Wt92: </th>
                                        <td class="value"> <?php echo $data['wt92']; ?></td>
                                    </tr>
                                    <tr  class="td-wt93">
                                        <th class="title"> Wt93: </th>
                                        <td class="value"> <?php echo $data['wt93']; ?></td>
                                    </tr>
                                    <tr  class="td-wt94">
                                        <th class="title"> Wt94: </th>
                                        <td class="value"> <?php echo $data['wt94']; ?></td>
                                    </tr>
                                    <tr  class="td-wt95">
                                        <th class="title"> Wt95: </th>
                                        <td class="value"> <?php echo $data['wt95']; ?></td>
                                    </tr>
                                    <tr  class="td-wt96">
                                        <th class="title"> Wt96: </th>
                                        <td class="value"> <?php echo $data['wt96']; ?></td>
                                    </tr>
                                    <tr  class="td-wt97">
                                        <th class="title"> Wt97: </th>
                                        <td class="value"> <?php echo $data['wt97']; ?></td>
                                    </tr>
                                    <tr  class="td-wt98">
                                        <th class="title"> Wt98: </th>
                                        <td class="value"> <?php echo $data['wt98']; ?></td>
                                    </tr>
                                    <tr  class="td-wt99">
                                        <th class="title"> Wt99: </th>
                                        <td class="value"> <?php echo $data['wt99']; ?></td>
                                    </tr>
                                    <tr  class="td-wt100">
                                        <th class="title"> Wt100: </th>
                                        <td class="value"> <?php echo $data['wt100']; ?></td>
                                    </tr>
                                    <tr  class="td-wt101">
                                        <th class="title"> Wt101: </th>
                                        <td class="value"> <?php echo $data['wt101']; ?></td>
                                    </tr>
                                    <tr  class="td-wt102">
                                        <th class="title"> Wt102: </th>
                                        <td class="value"> <?php echo $data['wt102']; ?></td>
                                    </tr>
                                    <tr  class="td-wt103">
                                        <th class="title"> Wt103: </th>
                                        <td class="value"> <?php echo $data['wt103']; ?></td>
                                    </tr>
                                    <tr  class="td-wt104">
                                        <th class="title"> Wt104: </th>
                                        <td class="value"> <?php echo $data['wt104']; ?></td>
                                    </tr>
                                    <tr  class="td-wt105">
                                        <th class="title"> Wt105: </th>
                                        <td class="value"> <?php echo $data['wt105']; ?></td>
                                    </tr>
                                    <tr  class="td-wt106">
                                        <th class="title"> Wt106: </th>
                                        <td class="value"> <?php echo $data['wt106']; ?></td>
                                    </tr>
                                    <tr  class="td-wt107">
                                        <th class="title"> Wt107: </th>
                                        <td class="value"> <?php echo $data['wt107']; ?></td>
                                    </tr>
                                    <tr  class="td-wt108">
                                        <th class="title"> Wt108: </th>
                                        <td class="value"> <?php echo $data['wt108']; ?></td>
                                    </tr>
                                    <tr  class="td-wt109">
                                        <th class="title"> Wt109: </th>
                                        <td class="value"> <?php echo $data['wt109']; ?></td>
                                    </tr>
                                    <tr  class="td-wt110">
                                        <th class="title"> Wt110: </th>
                                        <td class="value"> <?php echo $data['wt110']; ?></td>
                                    </tr>
                                    <tr  class="td-wt111">
                                        <th class="title"> Wt111: </th>
                                        <td class="value"> <?php echo $data['wt111']; ?></td>
                                    </tr>
                                    <tr  class="td-wt112">
                                        <th class="title"> Wt112: </th>
                                        <td class="value"> <?php echo $data['wt112']; ?></td>
                                    </tr>
                                    <tr  class="td-wt113">
                                        <th class="title"> Wt113: </th>
                                        <td class="value"> <?php echo $data['wt113']; ?></td>
                                    </tr>
                                    <tr  class="td-wt114">
                                        <th class="title"> Wt114: </th>
                                        <td class="value"> <?php echo $data['wt114']; ?></td>
                                    </tr>
                                    <tr  class="td-wt115">
                                        <th class="title"> Wt115: </th>
                                        <td class="value"> <?php echo $data['wt115']; ?></td>
                                    </tr>
                                    <tr  class="td-wt116">
                                        <th class="title"> Wt116: </th>
                                        <td class="value"> <?php echo $data['wt116']; ?></td>
                                    </tr>
                                    <tr  class="td-wt117">
                                        <th class="title"> Wt117: </th>
                                        <td class="value"> <?php echo $data['wt117']; ?></td>
                                    </tr>
                                    <tr  class="td-wt118">
                                        <th class="title"> Wt118: </th>
                                        <td class="value"> <?php echo $data['wt118']; ?></td>
                                    </tr>
                                    <tr  class="td-wt119">
                                        <th class="title"> Wt119: </th>
                                        <td class="value"> <?php echo $data['wt119']; ?></td>
                                    </tr>
                                    <tr  class="td-wt120">
                                        <th class="title"> Wt120: </th>
                                        <td class="value"> <?php echo $data['wt120']; ?></td>
                                    </tr>
                                    <tr  class="td-wt121">
                                        <th class="title"> Wt121: </th>
                                        <td class="value"> <?php echo $data['wt121']; ?></td>
                                    </tr>
                                    <tr  class="td-wt122">
                                        <th class="title"> Wt122: </th>
                                        <td class="value"> <?php echo $data['wt122']; ?></td>
                                    </tr>
                                    <tr  class="td-LEAKERS">
                                        <th class="title"> Leakers: </th>
                                        <td class="value"> <?php echo $data['LEAKERS']; ?></td>
                                    </tr>
                                    <tr  class="td-wt123">
                                        <th class="title"> Wt123: </th>
                                        <td class="value"> <?php echo $data['wt123']; ?></td>
                                    </tr>
                                    <tr  class="td-wt124">
                                        <th class="title"> Wt124: </th>
                                        <td class="value"> <?php echo $data['wt124']; ?></td>
                                    </tr>
                                    <tr  class="td-wt125">
                                        <th class="title"> Wt125: </th>
                                        <td class="value"> <?php echo $data['wt125']; ?></td>
                                    </tr>
                                    <tr  class="td-wt126">
                                        <th class="title"> Wt126: </th>
                                        <td class="value"> <?php echo $data['wt126']; ?></td>
                                    </tr>
                                    <tr  class="td-wt127">
                                        <th class="title"> Wt127: </th>
                                        <td class="value"> <?php echo $data['wt127']; ?></td>
                                    </tr>
                                    <tr  class="td-wt128">
                                        <th class="title"> Wt128: </th>
                                        <td class="value"> <?php echo $data['wt128']; ?></td>
                                    </tr>
                                    <tr  class="td-wt129">
                                        <th class="title"> Wt129: </th>
                                        <td class="value"> <?php echo $data['wt129']; ?></td>
                                    </tr>
                                    <tr  class="td-wt130">
                                        <th class="title"> Wt130: </th>
                                        <td class="value"> <?php echo $data['wt130']; ?></td>
                                    </tr>
                                    <tr  class="td-wt131">
                                        <th class="title"> Wt131: </th>
                                        <td class="value"> <?php echo $data['wt131']; ?></td>
                                    </tr>
                                    <tr  class="td-wt132">
                                        <th class="title"> Wt132: </th>
                                        <td class="value"> <?php echo $data['wt132']; ?></td>
                                    </tr>
                                    <tr  class="td-POUCH">
                                        <th class="title"> Pouch: </th>
                                        <td class="value"> <?php echo $data['POUCH']; ?></td>
                                    </tr>
                                    <tr  class="td-wt133">
                                        <th class="title"> Wt133: </th>
                                        <td class="value"> <?php echo $data['wt133']; ?></td>
                                    </tr>
                                    <tr  class="td-wt134">
                                        <th class="title"> Wt134: </th>
                                        <td class="value"> <?php echo $data['wt134']; ?></td>
                                    </tr>
                                    <tr  class="td-wt135">
                                        <th class="title"> Wt135: </th>
                                        <td class="value"> <?php echo $data['wt135']; ?></td>
                                    </tr>
                                    <tr  class="td-wt136">
                                        <th class="title"> Wt136: </th>
                                        <td class="value"> <?php echo $data['wt136']; ?></td>
                                    </tr>
                                    <tr  class="td-wt137">
                                        <th class="title"> Wt137: </th>
                                        <td class="value"> <?php echo $data['wt137']; ?></td>
                                    </tr>
                                    <tr  class="td-wt138">
                                        <th class="title"> Wt138: </th>
                                        <td class="value"> <?php echo $data['wt138']; ?></td>
                                    </tr>
                                    <tr  class="td-wt139">
                                        <th class="title"> Wt139: </th>
                                        <td class="value"> <?php echo $data['wt139']; ?></td>
                                    </tr>
                                    <tr  class="td-wt140">
                                        <th class="title"> Wt140: </th>
                                        <td class="value"> <?php echo $data['wt140']; ?></td>
                                    </tr>
                                    <tr  class="td-wt141">
                                        <th class="title"> Wt141: </th>
                                        <td class="value"> <?php echo $data['wt141']; ?></td>
                                    </tr>
                                    <tr  class="td-wt142">
                                        <th class="title"> Wt142: </th>
                                        <td class="value"> <?php echo $data['wt142']; ?></td>
                                    </tr>
                                    <tr  class="td-netx">
                                        <th class="title"> Netx: </th>
                                        <td class="value"> <?php echo $data['netx']; ?></td>
                                    </tr>
                                    <tr  class="td-wt143">
                                        <th class="title"> Wt143: </th>
                                        <td class="value"> <?php echo $data['wt143']; ?></td>
                                    </tr>
                                    <tr  class="td-netmin">
                                        <th class="title"> Netmin: </th>
                                        <td class="value"> <?php echo $data['netmin']; ?></td>
                                    </tr>
                                    <tr  class="td-wt144">
                                        <th class="title"> Wt144: </th>
                                        <td class="value"> <?php echo $data['wt144']; ?></td>
                                    </tr>
                                    <tr  class="td-sd">
                                        <th class="title"> Sd: </th>
                                        <td class="value"> <?php echo $data['sd']; ?></td>
                                    </tr>
                                    <tr  class="td-wt145">
                                        <th class="title"> Wt145: </th>
                                        <td class="value"> <?php echo $data['wt145']; ?></td>
                                    </tr>
                                    <tr  class="td-netmax">
                                        <th class="title"> Netmax: </th>
                                        <td class="value"> <?php echo $data['netmax']; ?></td>
                                    </tr>
                                    <tr  class="td-wt146">
                                        <th class="title"> Wt146: </th>
                                        <td class="value"> <?php echo $data['wt146']; ?></td>
                                    </tr>
                                    <tr  class="td-defects">
                                        <th class="title"> Defects: </th>
                                        <td class="value"> <?php echo $data['defects']; ?></td>
                                    </tr>
                                    <tr  class="td-red">
                                        <th class="title"> Red: </th>
                                        <td class="value"> <?php echo $data['red']; ?></td>
                                    </tr>
                                    <tr  class="td-amber">
                                        <th class="title"> Amber: </th>
                                        <td class="value"> <?php echo $data['amber']; ?></td>
                                    </tr>
                                    <tr  class="td-sample">
                                        <th class="title"> Sample: </th>
                                        <td class="value"> <?php echo $data['sample']; ?></td>
                                    </tr>
                                    <tr  class="td-leaker">
                                        <th class="title"> Leaker: </th>
                                        <td class="value"> <?php echo $data['leaker']; ?></td>
                                    </tr>
                                    <tr  class="td-red1">
                                        <th class="title"> Red1: </th>
                                        <td class="value"> <?php echo $data['red1']; ?></td>
                                    </tr>
                                    <tr  class="td-amber1">
                                        <th class="title"> Amber1: </th>
                                        <td class="value"> <?php echo $data['amber1']; ?></td>
                                    </tr>
                                    <tr  class="td-damage">
                                        <th class="title"> Damage: </th>
                                        <td class="value"> <?php echo $data['damage']; ?></td>
                                    </tr>
                                    <tr  class="td-red2">
                                        <th class="title"> Red2: </th>
                                        <td class="value"> <?php echo $data['red2']; ?></td>
                                    </tr>
                                    <tr  class="td-amber2">
                                        <th class="title"> Amber2: </th>
                                        <td class="value"> <?php echo $data['amber2']; ?></td>
                                    </tr>
                                    <tr  class="td-burntseal">
                                        <th class="title"> Burntseal: </th>
                                        <td class="value"> <?php echo $data['burntseal']; ?></td>
                                    </tr>
                                    <tr  class="td-red3">
                                        <th class="title"> Red3: </th>
                                        <td class="value"> <?php echo $data['red3']; ?></td>
                                    </tr>
                                    <tr  class="td-amber3">
                                        <th class="title"> Amber3: </th>
                                        <td class="value"> <?php echo $data['amber3']; ?></td>
                                    </tr>
                                    <tr  class="td-wrinkeled">
                                        <th class="title"> Wrinkeled: </th>
                                        <td class="value"> <?php echo $data['wrinkeled']; ?></td>
                                    </tr>
                                    <tr  class="td-red4">
                                        <th class="title"> Red4: </th>
                                        <td class="value"> <?php echo $data['red4']; ?></td>
                                    </tr>
                                    <tr  class="td-amber4">
                                        <th class="title"> Amber4: </th>
                                        <td class="value"> <?php echo $data['amber4']; ?></td>
                                    </tr>
                                    <tr  class="td-skiew">
                                        <th class="title"> Skiew: </th>
                                        <td class="value"> <?php echo $data['skiew']; ?></td>
                                    </tr>
                                    <tr  class="td-red5">
                                        <th class="title"> Red5: </th>
                                        <td class="value"> <?php echo $data['red5']; ?></td>
                                    </tr>
                                    <tr  class="td-amber5">
                                        <th class="title"> Amber5: </th>
                                        <td class="value"> <?php echo $data['amber5']; ?></td>
                                    </tr>
                                    <tr  class="td-totaldefects">
                                        <th class="title"> Totaldefects: </th>
                                        <td class="value"> <?php echo $data['totaldefects']; ?></td>
                                    </tr>
                                    <tr  class="td-red6">
                                        <th class="title"> Red6: </th>
                                        <td class="value"> <?php echo $data['red6']; ?></td>
                                    </tr>
                                    <tr  class="td-amber6">
                                        <th class="title"> Amber6: </th>
                                        <td class="value"> <?php echo $data['amber6']; ?></td>
                                    </tr>
                                    <tr  class="td-powder">
                                        <th class="title"> Powder: </th>
                                        <td class="value"> <?php echo $data['powder']; ?></td>
                                    </tr>
                                    <tr  class="td-red7">
                                        <th class="title"> Red7: </th>
                                        <td class="value"> <?php echo $data['red7']; ?></td>
                                    </tr>
                                    <tr  class="td-amber7">
                                        <th class="title"> Amber7: </th>
                                        <td class="value"> <?php echo $data['amber7']; ?></td>
                                    </tr>
                                    <tr  class="td-sample1">
                                        <th class="title"> Sample1: </th>
                                        <td class="value"> <?php echo $data['sample1']; ?></td>
                                    </tr>
                                    <tr  class="td-colour">
                                        <th class="title"> Colour: </th>
                                        <td class="value"> <?php echo $data['colour']; ?></td>
                                    </tr>
                                    <tr  class="td-red8">
                                        <th class="title"> Red8: </th>
                                        <td class="value"> <?php echo $data['red8']; ?></td>
                                    </tr>
                                    <tr  class="td-amber8">
                                        <th class="title"> Amber8: </th>
                                        <td class="value"> <?php echo $data['amber8']; ?></td>
                                    </tr>
                                    <tr  class="td-perfume">
                                        <th class="title"> Perfume: </th>
                                        <td class="value"> <?php echo $data['perfume']; ?></td>
                                    </tr>
                                    <tr  class="td-red9">
                                        <th class="title"> Red9: </th>
                                        <td class="value"> <?php echo $data['red9']; ?></td>
                                    </tr>
                                    <tr  class="td-amber9">
                                        <th class="title"> Amber9: </th>
                                        <td class="value"> <?php echo $data['amber9']; ?></td>
                                    </tr>
                                    <tr  class="td-foreignmat">
                                        <th class="title"> Foreignmat: </th>
                                        <td class="value"> <?php echo $data['foreignmat']; ?></td>
                                    </tr>
                                    <tr  class="td-red10">
                                        <th class="title"> Red10: </th>
                                        <td class="value"> <?php echo $data['red10']; ?></td>
                                    </tr>
                                    <tr  class="td-amber10">
                                        <th class="title"> SUPERVISOR : </th>
                                        <td class="value"> <?php echo $data['amber10']; ?></td>
                                    </tr>
                                    <tr  class="td-unmixed">
                                        <th class="title"> SHIFT EXECUTIVE: </th>
                                        <td class="value"> <?php echo $data['unmixed']; ?></td>
                                    </tr>
                                    <tr  class="td-red11">
                                        <th class="title"> Red11: </th>
                                        <td class="value"> <?php echo $data['red11']; ?></td>
                                    </tr>
                                    <tr  class="td-amber11">
                                        <th class="title"> Amber11: </th>
                                        <td class="value"> <?php echo $data['amber11']; ?></td>
                                    </tr>
                                    <tr  class="td-totaldef">
                                        <th class="title"> Totaldef: </th>
                                        <td class="value"> <?php echo $data['totaldef']; ?></td>
                                    </tr>
                                    <tr  class="td-percentage">
                                        <th class="title"> Percentage: </th>
                                        <td class="value"> <?php echo $data['percentage']; ?></td>
                                    </tr>
                                    <tr  class="td-pouchdef">
                                        <th class="title"> Pouchdef: </th>
                                        <td class="value"> <?php echo $data['pouchdef']; ?></td>
                                    </tr>
                                    <tr  class="td-red12">
                                        <th class="title"> Red12: </th>
                                        <td class="value"> <?php echo $data['red12']; ?></td>
                                    </tr>
                                    <tr  class="td-amber12">
                                        <th class="title"> Amber12: </th>
                                        <td class="value"> <?php echo $data['amber12']; ?></td>
                                    </tr>
                                    <tr  class="td-powderdef">
                                        <th class="title"> Powderdef: </th>
                                        <td class="value"> <?php echo $data['powderdef']; ?></td>
                                    </tr>
                                    <tr  class="td-red13">
                                        <th class="title"> Red13: </th>
                                        <td class="value"> <?php echo $data['red13']; ?></td>
                                    </tr>
                                    <tr  class="td-amber13">
                                        <th class="title"> Amber13: </th>
                                        <td class="value"> <?php echo $data['amber13']; ?></td>
                                    </tr>
                                    <tr  class="td-totaldedect">
                                        <th class="title"> Totaldedect: </th>
                                        <td class="value"> <?php echo $data['totaldedect']; ?></td>
                                    </tr>
                                    <tr  class="td-red14">
                                        <th class="title"> Red14: </th>
                                        <td class="value"> <?php echo $data['red14']; ?></td>
                                    </tr>
                                    <tr  class="td-amber14">
                                        <th class="title"> Amber14: </th>
                                        <td class="value"> <?php echo $data['amber14']; ?></td>
                                    </tr>
                                    <tr  class="td-red15">
                                        <th class="title"> Red15: </th>
                                        <td class="value"> <?php echo $data['red15']; ?></td>
                                    </tr>
                                    <tr  class="td-amber15">
                                        <th class="title"> Amber15: </th>
                                        <td class="value"> <?php echo $data['amber15']; ?></td>
                                    </tr>
                                    <tr  class="td-red16">
                                        <th class="title"> Red16: </th>
                                        <td class="value"> <?php echo $data['red16']; ?></td>
                                    </tr>
                                    <tr  class="td-amber16">
                                        <th class="title"> Amber16: </th>
                                        <td class="value"> <?php echo $data['amber16']; ?></td>
                                    </tr>
                                    <tr  class="td-totald">
                                        <th class="title"> Totald: </th>
                                        <td class="value"> <?php echo $data['totald']; ?></td>
                                    </tr>
                                    <tr  class="td-remarks">
                                        <th class="title"> Remarks: </th>
                                        <td class="value"> <?php echo $data['remarks']; ?></td>
                                    </tr>
                                    <tr  class="td-rdata">
                                        <th class="title"> Rdata: </th>
                                        <td class="value"> <?php echo $data['rdata']; ?></td>
                                    </tr>
                                    <tr  class="td-scatch">
                                        <th class="title"> Scatch: </th>
                                        <td class="value"> <?php echo $data['scatch']; ?></td>
                                    </tr>
                                    <tr  class="td-test">
                                        <th class="title"> Test: </th>
                                        <td class="value"> <?php echo $data['test']; ?></td>
                                    </tr>
                                    <tr  class="td-signature">
                                        <th class="title"> Signature: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['signature']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("pcro/editfield/" . urlencode($data['id'])); ?>" 
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
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("pcro/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("pcro/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
