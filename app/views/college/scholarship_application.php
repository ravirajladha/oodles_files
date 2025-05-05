<?php require APPROOT . '/views/inc_college/header.php'; ?>
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">All Scholarship Application List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Students</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Scholarship Application List</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line">
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <!-- <li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">List
                                View</a></li> -->
                        <!-- <li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
                                View</a></li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active fontawesome-demo" id="tab1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-box">
                                        <div class="card-head">
                                            <header>Scholarship Application List</header>
                                            <div class="tools">
                                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-6">

                                                </div>
                                            </div>
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                <thead>
                                                    <tr>

                                                        <th> Id </th>
                                                        <th> Student Name </th>
                                                        <th> Scholarship Id </th>
                                                        <th> Applied Date </th>
                                                        <th>Conditions</th>
                                                        <th> Status </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                  <!-- <?php   if(!empty($data['get_all_scholarship_app'])){?> -->
                                                    <?php foreach ($data['get_all_scholarship_app'] as $scholarship_app) { 
                                                        $newAdmin = new Admins ;
                                                        $student_detail = $newAdmin->get_single_student1($scholarship_app->student_id);
                                                        $scholarship_detail = $newAdmin->get_all_scholarship_id($scholarship_app->scholarship_id);
                                                        ?>
                                                        <tr class="odd gradeX">
                                                            <!-- <td class="patient-img">
                                                                <img src="../assets/img/user/user1.jpg" alt="">
                                                            </td> -->
                                                            <td class="left"><?php echo $scholarship_app->id ?></td>
                                                            <td class="left"><?php echo $student_detail->name ?> </td>
                                                            <td class="left"><?php echo $scholarship_detail->name?> <?php echo $scholarship_app->scholarship_id?></td>
                                                            <?php 
                                                            $date = $scholarship_app->application_createdat;
                                                                $pieces = explode(" ", $date);
                                                                $pieces[0];
                                                            ?>
                                                            <td class="left"><?php echo $pieces[0] ?></td>
                                                         
                                                            <td class="left"><?php echo $scholarship_app->conditions ?></td>
                                                            <td class="left">
                                                                <form action="<?php echo URLROOT; ?>/corporate/update_scholarship_status/<?php echo $scholarship_app->id; ?>" method="post">
                                                                    <select class='form-control' name="scholarship_status" id="mySelect" onchange="this.form.submit()" style="font-size:12px;">
                                                                        <option value="0" <?php if ($scholarship_app->status == 0) {
                                                                                                echo "selected";
                                                                                            } ?>>Applied</option>
                                                                        <option value="1" <?php if ($scholarship_app->status == 1) {
                                                                                                echo "selected";
                                                                                            } ?>>Processing</option>
                                                                        <option value="2" <?php if ($scholarship_app->status == 2) {
                                                                                                echo "selected";
                                                                                            } ?>>Granted</option>
                                                                        <option value="3" <?php if ($scholarship_app->status == 3) {
                                                                                                echo "selected";
                                                                                            } ?>>Rejected</option>
                                                                    </select>

                                                                </form>
                                                            </td>





                                                        </tr>
                                                    <?php } ?>
                                                    <!-- <?php } ?> -->

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_college/footer.php'; ?>