    <?php
    $comp_model = new SharedController;
    $view_data = $this->view_data; //array of all  data passed from controller
    $field_name = $view_data['field_name'];
    $field_value = $view_data['field_value'];
    $form_data = $this->form_data; //request pass to the page as form fields values
    $can_list = ACL::is_allowed("pcro_wt/list/date/$field_value");$can_view = ACL::is_allowed("pcro_wt/view/$field_value");$can_add = ACL::is_allowed("pcro_wt/add/?date=$field_value");
    $page_id = random_str(6);
    ?>
    <div class="master-detail-page">
        <div class="card-header p-0 pt-2 px-2">
            <ul class="nav nav-tabs">
                <?php if($can_list){ ?>
                <li class="nav-item">
                    <a data-toggle="tab" href="#pcro_register_pcro_wt_List_<?php echo $page_id ?>" class="nav-link active">
                        List
                    </a>
                </li>
                <?php } ?>
                <?php if($can_view){ ?>
                <li class="nav-item">
                    <a data-toggle="tab" href="#pcro_register_pcro_wt_View_<?php echo $page_id ?>" class="nav-link ">
                        View
                    </a>
                </li>
                <?php } ?>
                <?php if($can_add){ ?>
                <li class="nav-item">
                    <a data-toggle="tab" href="#pcro_register_pcro_wt_Add_<?php echo $page_id ?>" class="nav-link ">
                        Add
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="tab-content">
            <?php if($can_list){ ?>
            <div class="tab-pane fade show active show" id="pcro_register_pcro_wt_List_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("pcro_wt/list/date/$field_value"); ?>
            </div>
            <?php } ?>
            <?php if($can_view){ ?>
            <div class="tab-pane fade show " id="pcro_register_pcro_wt_View_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("pcro_wt/view/$field_value"); ?>
            </div>
            <?php } ?>
            <?php if($can_add){ ?>
            <div class="tab-pane fade show " id="pcro_register_pcro_wt_Add_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("pcro_wt/add/?date=$field_value", array('date' => get_value('date'),'shift' => get_value('shift'),'product' => get_value('product'),'sku' => get_value('sku'),'mc_no' => get_value('mc_no'))); ?>
            </div>
            <?php } ?>
        </div>
    </div>
    