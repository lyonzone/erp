    <?php
    $comp_model = new SharedController;
    $view_data = $this->view_data; //array of all  data passed from controller
    $field_name = $view_data['field_name'];
    $field_value = $view_data['field_value'];
    $form_data = $this->form_data; //request pass to the page as form fields values
    $can_list = ACL::is_allowed("lorry/list/date/$field_value");$can_view = ACL::is_allowed("lorry/view/$field_value");$can_add = ACL::is_allowed("lorry/add/?date=$field_value");
    $page_id = random_str(6);
    ?>
    <div class="master-detail-page">
        <div class="card-header p-0 pt-2 px-2">
            <ul class="nav nav-tabs">
                <?php if($can_list){ ?>
                <li class="nav-item">
                    <a data-toggle="tab" href="#loading_lorry_List_<?php echo $page_id ?>" class="nav-link active">
                        List
                    </a>
                </li>
                <?php } ?>
                <?php if($can_view){ ?>
                <li class="nav-item">
                    <a data-toggle="tab" href="#loading_lorry_View_<?php echo $page_id ?>" class="nav-link ">
                        View
                    </a>
                </li>
                <?php } ?>
                <?php if($can_add){ ?>
                <li class="nav-item">
                    <a data-toggle="tab" href="#loading_lorry_Add_<?php echo $page_id ?>" class="nav-link ">
                        Add
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="tab-content">
            <?php if($can_list){ ?>
            <div class="tab-pane fade show active show" id="loading_lorry_List_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("lorry/list/date/$field_value"); ?>
            </div>
            <?php } ?>
            <?php if($can_view){ ?>
            <div class="tab-pane fade show " id="loading_lorry_View_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("lorry/view/$field_value"); ?>
            </div>
            <?php } ?>
            <?php if($can_add){ ?>
            <div class="tab-pane fade show " id="loading_lorry_Add_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("lorry/add/?date=$field_value", array('transporter' => get_value('transporter'),'date' => get_value('date'),'vehicle' => get_value('vehicle'),'check11_1' => get_value('check11_1'),'check15' => get_value('check15'),'check16' => get_value('check16'),'check17' => get_value('check17'),'check18' => get_value('check18'),'check19' => get_value('check19'),'check15_1' => get_value('check15_1'))); ?>
            </div>
            <?php } ?>
        </div>
    </div>
    