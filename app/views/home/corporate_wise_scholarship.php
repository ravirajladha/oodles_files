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
    // document.oncontextmenu = function() {
    //     return false;
    // };
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
                    <a class="h4 mx-5 text-white" href="#about">About the Program</a>
                    <a class="h4 mx-5 text-white" href="#scholarship">Scholarships</a>
                    <a class="h4 mx-5 text-white" href="#faqs">FAQs</a>
                    <a class="h4 mx-5 text-white" href="#contact">Contact Details</a>
                </div>
            </div>
        </div>
    </nav>

</section>


<section class="container">


    <?php

    ?>
    <div class="inbox">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="row">

                            <div class="col-md-9">
                                <div class="row">

                                    <div class="col-lg-12 col-md-12 col-12 col-sm-11 m-3">

                                        <div class="card border-info">
                                            <h3 class="card-header  text-white py-4" style="background:#015fc9; ">Corporate Name</h3>
                                            <div class="card-body">
                                                <h5 class="card-title mt-5">sdfsdf</h5>

                                                <div id="about">
                                                    <h5 class="card-title mt-5">Minimum Elibility</h5>
                                                    <p class="card-text">sdsdsd</p>
                                                </div>



                                                <div id="scholarship">
                                                   

                                                    <div class="col-xl-12 col-lg-12">
                                                        <!-- <div class="pricing__single"> -->
                                                            <!-- <div class="pricing-shape-1">
                                                                <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/pricing-shape-1.png" alt="">
                                                            </div> -->
                                                            <!-- <div class="pricing__single-top">
                                                                <div class="pricing__img">
                                                                    <img src="<?php echo URLROOT; ?>/assets_home/images/resources/pricing-img-1.png" alt="">
                                                                </div>
                                                                <div class="pricing__content">
                                                                    <h3>35$</h3>
                                                                    <p>Per month</p>
                                                                </div>
                                                            </div> -->
                                                            <!-- <div class="pricing__single-bottom"> -->
                                                            <h5 class="card-title mt-5">Application Process</h5>
                                                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                                                        <!-- <div class="blogThumb"> -->
                                                        <div class="card tab2-card">
                                                            <div class="card-header" style="background-color:orange;">
                                                                <h5> Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, aliquid!</h5>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-4  col-sm-4">

                                                                    <div class="thumb-center">
                                                                        <button type="button" class="btn btn-circle btn-default" style="margin-top:40px;">View Details</button>
                                                                        <br>
                                                                        <button type="button" class="btn btn-circle btn-success" style="margin-top:20px;">Apply Now</button>
                                                                    </div>


                                                                </div>
                                                                <div class="col-lg-8 col-md-8 col-8 col-sm-8">

                                                                    <div class="thumb-center"></div>
                                                                    <div class="course-box">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <h4 style="font-weight:bold;">Eligibility</h4>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <p style="color:blue;font-size:16px;text-decoration: underline;margin-top:15px;"><i class="material-icons f-left" style="font-size: 16px;">today</i>Deadline: 31/05/2023</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="text-muted"><span class="m-r-10">
                                                                                <ul>
                                                                                    <li>Lorem ipsum dolor sit amet.</li>
                                                                                    <li>Lorem ipsum dolor sit amet.</li>
                                                                                    <li>Lorem ipsum dolor sit amet.</li>

                                                                                    <!-- <u>Read More</u> -->
                                                                                </ul>
                                                                            </span>

                                                                        </div>

                                                                        <p><span><i class="fa fa-graduation-cap"></i> Benefits: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae.</span></p>
                                                                        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
                                                                            More</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                            </div>
                                                        </div>
                                                    <!-- </div> -->

                                                <!-- </div> -->

                                                <div id="faqs">
                                                    <h5 class="card-title mt-5">T&C</h5>
                                                    <p class="card-text m">sasdsd</p>
                                                </div>



                                                <div id="contact">
                                                    <h5 class="card-title mt-5">Contact</h5>
                                                    <p class="card-text m">
                                                    <ul>



                                                        <li>sdfsdfsdf</li>


                                                    </ul>
                                                </div>

                                            

                                            </div>

                                            <!-- <div class="card-footer text-center">

                                                <?php if (isset($_SESSION['rexkod_oodles_student_id'])) { ?>

                                                    <a href="<?php echo URLROOT; ?>/home/scholarship_instructions/<?php echo $detail->id ?>" class="btn btn-primary">Apply Now</a>


                                                <?php } else { ?>
                                                    <button type="button" id="buttonId1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">Login to apply</button>

                                                <?php } ?>



                                            </div> -->
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border-info">
                                    <div class="inbox-sidebar">
                                        <div class="d-grid ">
                                            <a href="" class="btn dark" type="button"><i class="fa fa-edit"></i>Featured Scholarships</a>
                                        </div>
                                        <div class="row" >
                                            <div class="col-md-6">
                                                <img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/assets/img/course/course2.jpg" style="height:80px;width:80px;margin-left:2vh;">
                                            </div>
                                            <div class="col-md-6" style="font-size:12px;">
                                                Lorem ipsum, dolor sit amet consectetur
                                            </div>
                                        </div>
                                        <hr style="height: 7px;color: white;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/assets/img/course/course2.jpg" style="height:80px;width:80px;margin-left:2vh;">
                                            </div>
                                            <div class="col-md-6" style="font-size:12px;">
                                                Lorem ipsum, dolor sit amet consectetur
                                            </div>
                                        </div>
                                        <hr style="height: 7px;color: white;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/assets/img/course/course2.jpg" style="height:80px;width:80px;margin-left:2vh;">
                                            </div>
                                            <div class="col-md-6" style="font-size:12px;">
                                                Lorem ipsum, dolor sit amet consectetur
                                            </div>
                                        </div>
                                        <hr style="height: 7px;color: white;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/assets/img/course/course2.jpg" style="height:80px;width:80px;margin-left:2vh;">
                                            </div>
                                            <div class="col-md-6" style="font-size:12px;">
                                                Lorem ipsum, dolor sit amet consectetur
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