
<?php require APPROOT . '/views/inc_teacher/header.php'; ?>
<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" /> -->
    <!-- icons -->
    <!-- <link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/font-awesome/v6/css/all.css" rel="stylesheet" type="text/css" />
    <link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" /> -->
    <!-- bootstrap -->
    <!-- <link href="<?php echo URLROOT?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- data tables -->
    <link href="<?php echo URLROOT?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Material Design Lite CSS -->
    <!-- <link rel="stylesheet" href="<?php echo URLROOT?>/assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT?>/assets/css/material_style.css"> -->

    <!-- Theme Styles -->
    <!-- <link href="<?php echo URLROOT?>/assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="<?php echo URLROOT?>/assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT?>/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT?>/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT?>/assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" /> -->
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo URLROOT?>/assets/img/favicon.ico" />
    <?php $schoolMod = new schools; ?>

      <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Quiz Result</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                        href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Quiz Result</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Quiz Result</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-head">
                                    <header>Quiz Result</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                            <th> Student name </th>
											<th> Points Earned</th>
											<th> Coins Earned</th>
											<th> % Scored</th>
											<th> Attempt</th>
											<th> Date</th>
											<th> Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach($data['get_quiz_score'] as $quiz_score) { ?>
                                            <tr>
                                            <?php
												$quiz_id = $quiz_score->quiz_id;

												$studentMod = new Students;
												$get_quiz_detail = $studentMod->get_quiz_detail($quiz_id);
												?>
												     <?php
                                        $get_user_detail = $schoolMod->get_student_detail($quiz_score->user_id);

                                        ?>
                                        <td class="left"><?php echo $get_user_detail->name; ?></td>
												<td class="left"><?php 
												
												if(empty($quiz_score->coins_earned)){ echo "0";}else{
													echo (round(($quiz_score->coins_earned),2));
												}
												?></td>

												<?php $coins1 = $quiz_score->coins_earned;
												$coins1 = intval($coins1);
												?>
												<td class="left"><?php echo (($coins1*5)/100); ?></td>
												<td class="left" style=<?php if($quiz_score->pass==0){ ?>color:#FF0000; <?php }else{ ?>
													color:#1e921e;
											<?php 	} ?>><?php echo round($quiz_score->score_per, 2) ?>%</td>
												<td class="left"><?php echo $quiz_score->current_attempt ?></td>
												

												<td class="left"><?php echo date('d/m/y', strtotime($quiz_score->created_by)) ?></td>
												<td class="left"><?php echo date('H:i:s a', strtotime($quiz_score->created_by)) ?></td>
                                            </tr>
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
                   


<?php require APPROOT . '/views/inc_teacher/footer.php'; ?>

<script src="<?php echo URLROOT?>/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo URLROOT?>/assets/plugins/popper/popper.js"></script>
    <script src="<?php echo URLROOT?>/assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
    <script src="<?php echo URLROOT?>/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo URLROOT?>/assets/plugins/feather/feather.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo URLROOT?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT?>/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- data tables -->
    <script src="<?php echo URLROOT?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo URLROOT?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo URLROOT?>/assets/js/pages/table/table_data.js"></script>
    <!-- Common js-->
    <!-- <script src="<?php echo URLROOT?>/assets/js/app.js"></script>
    <script src="<?php echo URLROOT?>/assets/js/layout.js"></script>
    <script src="<?php echo URLROOT?>/assets/js/theme-color.js"></script> -->
    <!-- Material -->
    <script src="<?php echo URLROOT?>/assets/plugins/material/material.min.js"></script>
