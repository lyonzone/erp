<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 >The Dashboard</h4>
                </div>
                <div class="col-md-6 comp-grid">
                    <div class=" ">
                        <?php  
                        $this->render_page("truck/loading_exit/truck.truck_exit/Not Exit?limit_count=10"); 
                        ?>
                    </div>
                </div>
                <div class="col-md-6 comp-grid">
                    <div class=" ">
                        <?php  
                        $this->render_page("loading/loading_exit/loading.texit/Not Exit?limit_count=20"); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
