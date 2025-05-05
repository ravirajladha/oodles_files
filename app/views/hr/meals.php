
<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
           <h4>Meals</h4>
        </div>
        <!-- row -->
        <?php 
$model = New Page;
?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Breakfast</h4>
                    </div>
                    <div class="card-body">
                        <div>
                           <!-- Search Filter -->
					<div class="row filter-row">
					<h3>Breakfast (<?php echo count($data['breakfast']); ?>)</h3>
					</div>
					<div class="row">
                        <?php foreach($data['breakfast'] as $meal){ 
                        $employee = $model->get_employee($meal->user_id);
                        if($employee){
                            $name = $employee->employee_name;
                        }else {
                            $name = "ID: ".$meal->user_id;
                        }
                        ?>

                            <div class="col-md-4 col-lg-4 col-xl-3">
                                <div class="card user-card emp-card">
                                    <div class="user-img-sec">
                                        <h6 class="bg-1"><?php echo $name; ?></h6>
                                    </div>
                                    <div class="card-body pb-0">
                                        <h4>Employee ID: <span><?php echo $employee->mec_id; ?></span></h4>
                                        <h4>Designation: <span><?php echo $employee->designation; ?></span></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
					</div>


                    <div class="row filter-row">
					<h3>Lunch (<?php echo count($data['lunch']); ?>)</h3>
					</div>
					<div class="row">
                        <?php foreach($data['lunch'] as $meal){ 
                        $employee = $model->get_employee($meal->user_id);
                        if($employee){
                            $name = $employee->employee_name;
                        }else {
                            $name = "ID: ".$meal->user_id;
                        }
                        ?>

                            <div class="col-md-4 col-lg-4 col-xl-3">
                                <div class="card user-card emp-card">
                                    <div class="user-img-sec">
                                        <h6 class="bg-1"><?php echo $name; ?></h6>
                                    </div>
                                    <div class="card-body pb-0">
                                        <h4>Employee ID: <span><?php echo $employee->mec_id; ?></span></h4>
                                        <h4>Designation: <span><?php echo $employee->designation; ?></span></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
					</div>


                    <div class="row filter-row">
					<h3>Dinner (<?php echo count($data['dinner']); ?>)</h3>
					</div>
					<div class="row">
                        <?php foreach($data['dinner'] as $meal){ 
                        $employee = $model->get_employee($meal->user_id);
                        if($employee){
                            $name = $employee->employee_name;
                        }else {
                            $name = "ID: ".$meal->user_id;
                        }
                        ?>

                            <div class="col-md-4 col-lg-4 col-xl-3">
                                <div class="card user-card emp-card">
                                    <div class="user-img-sec">
                                        <h6 class="bg-1"><?php echo $name; ?></h6>
                                    </div>
                                    <div class="card-body pb-0">
                                        <h4>Employee ID: <span><?php echo $employee->mec_id; ?></span></h4>
                                        <h4>Designation: <span><?php echo $employee->designation; ?></span></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
					</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>