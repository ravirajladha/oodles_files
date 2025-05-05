<?php require APPROOT . "/views/inc_home/header.php"; ?>


<style>
    hr {
        height: 7px;
        color: white;

    }
</style>
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

<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/scholarship_cover.png)">
    </div>
    <div class="page-header-shape-1"><img src="<?php echo URLROOT; ?>/assets_home/images/shapes/page-header-shape-1.png" alt=""></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>Scholarship Details</li>
            </ul>
            <h2>Scholarship Details</h2>
        </div>
    </div>
</section>
<section class="mx-5">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">

            <div class="" id="navbarNavAltMarkup">
                <div class="navbar-nav gap-5">
                    <a class="h4 mx-5 text-white" href="#minimum_eligibility">Minimum Elibility</a>
                    <a class="h4 mx-5 text-white" href="#application_process">Application Process</a>
                    <a class="h4 mx-5 text-white" href="#reservation">Reservations</a>
                    <a class="h4 mx-5 text-white" href="#documents_required">Documents Required</a>
                </div>
            </div>
        </div>
    </nav>

</section>


<section class="container">
    <?php foreach ($data['get_all_scholarship'] as $detail) { ?>
    <?php } ?>

    <?php
    /*
    // The end date in YYYY-MM-DD format
    date_default_timezone_set('Asia/Kolkata');

    $end_date = "2023-02-02";

    // Convert the end date to a DateTime object
    $end_date_obj = new DateTime($end_date);

    // Get the current date as a DateTime object
    $current_date_obj = new DateTime();

    // Calculate the difference between the end date and the current date
    $interval = date_diff($current_date_obj, $end_date_obj);

    // Get the number of days between the end date and the current date
    $days_left = $interval->days;

    // Print the result
    if ($days_left > 0) {
        echo $days_left . " days left";
    } else {
        echo abs($days_left) . " days ago";
    }

*/
    ?>
    <div class="inbox">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="row">

                            <div class="col-md-10">
                                <div class="row">

                                    <div class="col-lg-12 col-md-12 col-12 col-sm-11 m-3">

                                        <div class="card border-info">
                                            <h3 class="card-header bg-info text-white py-4"><?php echo 'Scholarship By' . $detail->company_name . ' '; ?></h3>
                                            <div class="card-body">
                                                <h5 class="card-title mt-5"><?php echo $detail->name ?></h5>
                                                <?php if($detail->minimum_eligibility != Null ||  $detail->minimum_eligibility != ''){ ?>
                                                <div id="minimum_eligibility">
                                                    <h5 class="card-title mt-5">Minimum Elibility</h5>
                                                    <p class="card-text"><?php echo $detail->minimum_eligibility ?></p>
                                                </div>
                                                <?php } ?>

                                                <?php if($detail->application_process != Null ||  $detail->application_process != ''){ ?>
                                                <div id="application_process">
                                                    <h5 class="card-title mt-5">Application Process</h5>
                                                    <p class="card-text m"><?php echo $detail->application_process ?></p>
                                                </div>
<?php } ?>
<?php if($detail->reservation != Null ||  $detail->reservation != ''){ ?>
                                                <div id="reservation">
                                                    <h5 class="card-title mt-5">Reservations</h5>
                                                    <p class="card-text m"><?php echo $detail->reservation ?></p>
                                                </div>
<?php } ?>
<?php if($detail->documents_required != Null ||  $detail->documents_required != ''){ ?>

                                                <div id="documents_required">
                                                    <h5 class="card-title mt-5">Documents Required</h5>
                                                    <p class="card-text m">
                                                    <ul>
                                                    <?php $home = new Homes;
$single_document = explode(',', $detail->documents_required);
foreach($single_document as $doc){
    // echo $doc;
    $get_scholarship_doc  = $home->get_scholarship_doc($doc); ?>
   
 
        <li><?php echo    $get_scholarship_doc->name; ?></li>

<?php  }
    
                                                        ?>
                                                            </ul>
                                                </div>
                                                <?php } ?>
                                            </div>

                                            <div class="card-footer text-center">
                                                <!-- <a href="#" class="btn btn-success">Apply Now</a> -->

                                                <?php if (isset($_SESSION['rexkod_oodles_student_id'])) { ?>

                                                    <a href="<?php echo URLROOT; ?>/home/scholarship_instructions/<?php echo $detail->id ?>" class="btn btn-primary">Apply Now</a>


                                                <?php } else { ?>
                                                    <button type="button" id="buttonId1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">Login to apply</button>

                                                <?php } ?>



                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="inbox-sidebar">
                                    <div class="d-grid">
                                        <a href="" class="btn dark" type="button"><i class="fa fa-edit"></i>Featured Scholarships</a>
                                    </div>
                                    
                                    <?php $adminMod = new Admins;
                                        $featured_scholarships=$adminMod->get_featured_scholarship();
                                     foreach ($featured_scholarships as $scholarship) { ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/uploads/<?php echo $scholarship->scholarship_file; ?>" style="height:80px;width:80px;margin-top:5vh;">
                                        </div>
                                        <div class="col-md-6" style="font-size:12px;">
                                        <?php echo $scholarship->name; ?>
                                        </div>
                                    </div>
                                    <hr style="height: 7px;color: white;">
                                        <?php }?>
                                    <!-- <div class="row">
                                        <div class="col-md-6">
                                            <img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
                                        </div>
                                        <div class="col-md-6" style="font-size:12px;">
                                            Lorem ipsum, dolor sit amet consectetur
                                        </div>
                                    </div>
                                    <hr style="height: 7px;color: white;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
                                        </div>
                                        <div class="col-md-6" style="font-size:12px;">
                                            Lorem ipsum, dolor sit amet consectetur
                                        </div>
                                    </div>
                                    <hr style="height: 7px;color: white;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
                                        </div>
                                        <div class="col-md-6" style="font-size:12px;">
                                            Lorem ipsum, dolor sit amet consectetur
                                        </div>
                                    </div> -->

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

</section>
<!-- start page content -->

<!-- end page content -->


<div class="modal" id="exampleModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventTitle">Student Login</h5>
                <!-- <h5 class="modal-title" id="editEventTitle">Edit Event</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="signin-form col-md-8">
                    <h2 class="form-title">Login</h2><br>
                    <form method="post" action="<?php echo URLROOT; ?>/student/login" autocomplete="off" class="register-form">

                        <input type="hidden" name="scholarship_detail" value="<?php echo $detail->id ?>" />


                        <div class="form-group">
                            <div class="">
                                <input type="text" name="username" placeholder="Your Email ID / Mobile No" class="valo form-control input-height" />
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="">
                                <input type="password" name="password" placeholder="Password" class="valo form-control input-height" />
                            </div>
                        </div>


                        <div class="form-group form-button" style="text-align:right;">
                            <a href="<?php echo URLROOT; ?>/student/forgot_password" class="signup-image-link">Forgot Password?</a>

                        </div>
                        <!-- style="float:right"  -->
                        <div class="form-group form-button" style="text-align: center;">
                            <!-- <button class="thm-btn comment-form__btn" type="submit">Login</button> -->
                            <button class="btn btn-round btn-primary" type="submit">Login</button>
                            <!-- <button class="thm-btn main-menu__main-menu-box-get-quote-btn-left" type="submit">Login</button> -->
                        </div>


                    </form>
                    <div class="social-login" style="text-align: center;">
                        <br>
                        <a href="<?php echo URLROOT; ?>/student/register"><span class="social-label">Don't have an account? Create an account</span></a>


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc_home/footer.php'; ?>