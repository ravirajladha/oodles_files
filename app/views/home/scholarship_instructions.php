<?php require APPROOT . "/views/inc_home/header.php"; ?>
<?php $detail = $data['get_single_scholarship']; 
$check_scholarship_eligiblity = $data['check_scholarship_eligibility_status'];
?>

<script>
    $(function() {

        $("#buttonId1").click(
            function() {
                $("#exampleModal1").modal('show');
            });

    });
    document.oncontextmenu = function() {
        return false;
    };
</script>


<?php foreach ($data['scholarship_instruction'] as $instructions) { ?>
<?php } ?>


<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/scholarship_cover.png)">
    </div>
    <div class="page-header-shape-1"><img src="<?php echo URLROOT; ?>/assets_home/images/shapes/page-header-shape-1.png" alt=""></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="#">Home</a></li>
                <li><span>/</span></li>
                <li>Scholarship Details</li>
            </ul>
            <h2>Scholarship details</h2>

        </div>
    </div>
</section>


<section class="portfolio-details">
    <div class="container">


        <div class="portfolio-details__content">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="portfolio-details__content-left">
                        <h2>Instructions</h2>
                        <hr class="border border-primary border-3 opacity-75">
                        <p class="portfolio-details__text-1"><?php echo $detail->instructions ?> </p>
                        <!-- <p class="portfolio-details__text-1"><?php echo $instructions->description ?> </p>
                        <p class="portfolio-details__text-1"><?php echo $instructions->minimum_eligibility ?> </p>
                        <p class="portfolio-details__text-1"><?php echo $instructions->application_process ?> </p>
                        <p class="portfolio-details__text-1"><?php echo $instructions->reservation ?> </p>
                        <p class="portfolio-details__text-1"><?php echo $instructions->documents_required ?> </p> -->

                    </div>
                </div>


                <div class="col-xl-4 col-lg-4">
                    <div class="portfolio-details__content-right">
                        <div class="portfolio-details__details-box">
                            <ul class="list-unstyled portfolio-details__details-list">

                                <li>

                                    <?php if (isset($_SESSION['rexkod_oodles_student_id'])) { ?>
                                        <?php if (!($check_scholarship_eligiblity)) { ?>
                                        <div class="text-center">
                                            <h4>Dear <?php echo $_SESSION['rexkod_oodles_student_name'] ?>, You have logged in successfully. Now you can proceed to the application form</h4>
                                            <button type="button" id="buttonId1" class="btn btn-success mt-5" data-toggle="modal" data-target="#exampleModal1">Start Application</button>
                                            <!-- <button class="btn btn-success mt-5">Start Application</button> -->
                                            <h4 class="text-success mt-5 mb-3">or</h4>
                                            <a href="<?php echo URLROOT ?>/student/logout" class="text-success mt-5">Logout</a>
                                        </div>
                                        <?php }elseif($check_scholarship_eligiblity->status==0){ ?>
							<button type="button" class="btn btn-danger" >Criteria does not match</button>
							<?php }elseif($check_scholarship_eligiblity->status==1){ ?>
                                <div class="alert alert-success" role="alert">
  Eligibility Test Cleared<br><a href="<?php echo URLROOT; ?>/student/scholarship/<?php echo $detail->id; ?>" class="alert-link">Proceed to Student Portal</a>
</div>
							
								<?php } ?>



                                    <?php } else { ?>

                                        <a href="<?php echo URLROOT ?>/student/login" target="_blank">
                                            <div class="portfolio-details__social">
                                                <button class="btn btn-success">Login To Apply</button>
                                            </div>
                                        </a>
                                    <?php } ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- ============modal=============== -->
<div class="modal" id="exampleModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventTitle">Eligibility Criteria</h5>
                <!-- <h5 class="modal-title" id="editEventTitle">Edit Event</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mt-5 mx-5">

                    <!-- checking the scholarship validity is valid or not -->
                    <?php
                    if (($instructions->start_date <= date('Y-m-d')) && ($instructions->end_date >= date('Y-m-d'))) {
                        $scholarship_valid = 1;
                    } else {
                        $scholarship_valid = 0;
                    }
                    ?>
                    <!-- Criteria answering div -->
                    <form action="<?php echo URLROOT ?>/home/submit_criteria_answers/<?php echo $instructions->id ?>" method='POST'>
                        <div class="" <?php if ($scholarship_valid == 0) {
                                            echo "style='display:none;'";
                                        } ?>>
                            <div class="card-topline-aqua">
                                <header></header>
                            </div>
                            <div class="white-box">
                                <!-- Nav tabs -->
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo">
                                        <div id="biography">
                                            <?php
                                            $studentMod = new Students;
                                            $array = explode(',', $instructions->criteria);
                                            $student_class=$_SESSION['rexkod_oodles_student_class'];
                                            foreach ($array as $criteria_id) {
                                                 $get_criteria_detail = $studentMod->get_criteria_detail($criteria_id);
                                                // echo $get_criteria_detail->criteria_name;
                                                if($get_criteria_detail->class==$student_class){
                                                if ($get_criteria_detail->criteria_type == 1) { ?>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6 control-label"><?php echo $get_criteria_detail->criteria_name; ?></label>
                                                        <div class="col-sm-6"> <label class="switchToggle" style="float:right;">
                                                                <input type="checkbox" name="<?php echo $criteria_id; ?>" value="1">
                                                                <span class="slider aqua"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php
                                                } elseif ($get_criteria_detail->criteria_type == 2) { ?>

                                                    <div class="form-group row">
                                                        <label class="col-sm-6 control-label"><?php echo $get_criteria_detail->criteria_name; ?></label>
                                                        <div class="col-sm-6">
                                                            <input type="date" name="<?php echo $criteria_id; ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                <?php
                                                } elseif ($get_criteria_detail->criteria_type == 3) { ?>

                                                    <div class="form-group row">
                                                        <label class="col-sm-6 control-label"><?php echo $get_criteria_detail->criteria_name; ?></label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="<?php echo $criteria_id; ?>" class="form-control">

                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            }
                                            ?>
                                            <center><button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" id="buttonId1" data-toggle="modal" data-target="#exampleModal1">Submit</button></center>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!-- Criteria answering div end-->
                    <!-- Documents uploadation div -->
                    <form action="<?php echo URLROOT ?>/home/submit_scholarship_document/<?php echo $instructions->id; ?>" method='POST' enctype="multipart/form-data" autocomplete="OFF">
                        <div class="mt-5" <?php
                                        $studentMod = new Students;
                                        $get_scholarship_application = $studentMod->get_scholarship_application($instructions->id);


                                        if (!empty($get_scholarship_application)) {
                                            if (($get_scholarship_application->criteria_pass == 0) || ($scholarship_valid == 0)) {
                                                echo "style='display:none;'";
                                            }
                                        } else {
                                            echo "style='display:none;'";
                                        }
                                        ?>>

                            <div class="card-topline-aqua mt-5 text-center">
                                <header>You are eligible</header>
                            </div>
                            <div class="white-box">
                                <!-- Nav tabs -->
                                <!-- Tab panes -->
                                <div class="tab-content text-center">
                                    <div class="tab-pane active fontawesome-demo">
                                        <a href="<?php echo URLROOT ?>/student/scholarship/<?php echo $instructions->id; ?> " class="btn btn-success">continue</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!-- Documents uploadation div end-->
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>

    <?php require APPROOT . "/views/inc_home/footer.php"; ?>