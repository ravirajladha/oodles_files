<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Scholarship Application List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Students</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <!-- <li class="active">All Students List</li> -->
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
                                            <header>Scholarship Applied</header>
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
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($data['get_all_scholarship_app'] as $scholarship_app) { 
                                                        $newAdmin = new Admins ;
                                                        $student_detail = $newAdmin->get_single_student1($scholarship_app->student_id);
                                                        $scholarship_detail = $newAdmin->get_ind_scholarship($scholarship_app->scholarship_id);
                                                        ?>
                                                      
                                                        <tr class="odd gradeX">
                                                            <!-- <td class="patient-img">
                                                                <img src="../assets/img/user/user1.jpg" alt="">
                                                            </td> -->
                                                            
                                                            <td class="left"><?php echo $scholarship_app->id ?></td>
                                               
                                                            <td class="left"><a href="<?php echo URLROOT?>/student/scholarship_status/<?php echo $scholarship_app->id ?>"><?php echo $student_detail->name ?></td>
                                                            <td><?php echo $scholarship_detail->name?>     </a> </td>
                                                            <?php 
                                                            $date = $scholarship_app->application_createdat;
                                                                $pieces = explode(" ", $date);
                                                                $pieces[0];
                                                            ?>
                                                            <td class="left"><?php echo $pieces[0] ?></td>

                                                            <?php if($scholarship_app->status==0){?>
                                                            <td class="left" style="color:orange">Applied</td>
                                                            <?php }elseif($scholarship_app->status==1){?>
                                                                <td class="left" style="color:indigo">Processing</td>
                                                                <?php }elseif($scholarship_app->status==2){?>
                                                                    <td class="left" style="color:green">Granted</td>
                                                                    <?php }elseif($scholarship_app->status==3){?>
                                                                        <td class="left" style="color:red">Rejected</td>
                                                                        <?php } ?>

                                                            





                                                        </tr>
                                                                    </a>
                                                    <?php } ?>

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
<?php require APPROOT . '/views/inc_student/footer.php'; ?>