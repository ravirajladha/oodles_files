<?php require APPROOT . "/views/inc_home/header.php"; ?>
<!-- CSS only -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php $webinar = $data['get_single_webinar']; ?>
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
<!--Portfolio Details Start-->
<section class="portfolio-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="portfolio-details__img">
                    <img src="<?php echo URLROOT ?>/uploads/<?php echo $webinar->image ?>" style="width:300px;height:300px;text-align:center" alt="" class="center">
                </div>
            </div>
        </div>
        <div class="portfolio-details__content">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="portfolio-details__content-left">
                        <h3 class="portfolio-details__title">Webinar Topic: <?php echo $webinar->subject ?><?php if (isset($_SESSION['rexkod_oodles_student_id'])) {
                                                                                                                echo $_SESSION['rexkod_oodles_student_id'];
                                                                                                            } ?></h3>
                        <p class="portfolio-details__text-1"><?php echo $webinar->webinar_info ?></p>
                        <p class="portfolio-details__text-2"></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="portfolio-details__content-right">
                        <div class="portfolio-details__details-box">
                            <ul class="list-unstyled portfolio-details__details-list">
                                <li>
                                    <p class="portfolio-details__client">Seat Capacity</p>
                                    <h4 class="portfolio-details__name"><?php echo $webinar->audience_no ?></h4>
                                </li>
                                <li>
                                    <p class="portfolio-details__client">Date</p>
                                    <h4 class="portfolio-details__name"><?php echo $webinar->webinar_date ?></h4>
                                </li>
                                <li>
                                    <p class="portfolio-details__client">Start Time</p>
                                    <h4 class="portfolio-details__name"><?php echo $webinar->start_time ?></h4>
                                </li>
                                <li>
                                    <p class="portfolio-details__client">End Time</p>
                                    <h4 class="portfolio-details__name"><?php echo $webinar->end_time ?></h4>
                                </li>
                                <li>
                           
                                        <?php $homeMod = new Homes;
                                        $webinar_id = $webinar->id;
                                        $current_user_id = $_SESSION['rexkod_oodles_student_id'];
                                        $check_webinar_registration = $homeMod->check_webinar_registration($webinar_id, $current_user_id);
                                        ?>
                                        <?php if ($check_webinar_registration) { ?>
                                            <button type="button" class="btn btn-success">Already Registered
                                            </button>
                                        <?php } else { ?>
                                            <form method="post" action="<?php echo URLROOT; ?>/home/register_for_webinar/<?php echo $webinar->id ?>" autocomplete="off" class="register-form">
                                                <button type="submit" class="btn btn-success">Register
                                                </button>
                                            </form>
                                        <?php } ?>
                                   
                         
                        </div>
                        </li>

                        </ul>

                        <!-- Modal -->



                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>
<!-- Login modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="<?php echo URLROOT; ?>/home/webinar_login/<?php echo $webinar->id ?>" autocomplete="off" class="register-form">
                                                    <div class="modal-body">
                                                  <div class="form-group">
                                                            <!-- <h2 class="form-title">Login</h2><br> -->
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
                                                            <!-- <button class="btn btn-round btn-primary" type="submit" >Login</button> -->
                                                            <!-- <button class="thm-btn main-menu__main-menu-box-get-quote-btn-left" type="submit">Login</button> -->
                                                        </div>


                                                        <div class="social-login" style="text-align: center;">
                                                            <br>

                                                            <a href="<?php echo URLROOT; ?>/student/register"><span class="social-label">Don't have an account? Create an account</span></a>


                                                        </div>
                                                    </div>
                                       
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button class="btn btn-round btn-primary" type="submit">Login</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Modal end -->
                                    
<!--Portfolio Details End-->
<?php require APPROOT . "/views/inc_home/footer.php"; ?>