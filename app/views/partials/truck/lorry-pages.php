    <?php
    $comp_model = new SharedController;
    $view_data = $this->view_data; //array of all  data passed from controller
    $field_name = $view_data['field_name'];
    $field_value = $view_data['field_value'];
    $form_data = $this->form_data; //request pass to the page as form fields values
    $page_id = random_str(6);
    ?>
    <div class="master-detail-page">
        <div class="card-header p-0 pt-2 px-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a data-toggle="tab" href="#truck_lorry_View_<?php echo $page_id ?>" class="nav-link active">
                        View
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#truck_lorry_Add_<?php echo $page_id ?>" class="nav-link ">
                        Add
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active show" id="truck_lorry_View_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("lorry/view/$field_value"); ?>
            </div>
            <div class="tab-pane fade show " id="truck_lorry_Add_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("lorry/add/?vehicle=$field_value", array('date' => get_value('date'),'inv' => get_value('inv'),'driver' => get_value('driver'),'check11' => get_value('check11'),'transporter' => get_value('transporter'))); ?>
            </div>
        </div>
    </div>
    