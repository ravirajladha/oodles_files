<?php require APPROOT . "/views/inc_home/header.php"; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

     <!--Page Header Start-->
     <section class="page-header">
            <div class="page-header-bg" style="background-image: url(<?php echo URLROOT?>/assets_home/images/backgrounds/page-header-bg.jpg)">
            </div>
            <div class="page-header-shape-1"><img src="<?php echo URLROOT?>/assets_home/images/shapes/page-header-shape-1.png" alt=""></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li>Webinars</li>
                    </ul>
                    <h2>Webinars</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--News One Start-->
        <section class="news-one">
            <div class="container">
                <div class="row">
                    <!--News One Single Start-->
                    <?php foreach($data['get_all_webinars'] as $webinar){ ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="news-one__single">
                            <div class="news-one__img">
                                <img src="<?php echo URLROOT?>/uploads/<?php echo $webinar->image?>" alt="">
                                <div class="news-one__tag">
                                    <p><i class="far fa-folder"></i>WEBINAR</p>
                                </div>
                                <div class="news-one__arrow-box">
                                    <a href="#" class="news-one__arrow">
                                        <span class="icon-right-arrow1"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="news-one__content">
                                <ul class="list-unstyled news-one__meta">
                                    <li><a href="#"><i class="far fa-calendar"></i><?php echo $webinar->webinar_date?></a>
                                    </li>
                                    <li><a href="#"><i class="far fa-clock"></i> <?php echo date('h:i A', strtotime($webinar->start_time));?>-<?php echo date('h:i A', strtotime($webinar->end_time));?></a>
                                    </li>
                                </ul>
                                <h3 class="news-one__title"><a href="#"><?php echo $webinar->subject?></a></h3>
                                <p class="news-one__text">Seat Capacity: <?php echo $webinar->audience_no?></p>
                                <div class="news-one__read-more">
                                <?php if (!isset($_SESSION['rexkod_oodles_student_id'])) { ?>
                                    <a href="" data-toggle="modal" data-target="#exampleModalCenter">Login to Register <i class="fas fa-angle-double-right"></i></a>
                                    <?php }else{ ?>
                                        <a href="<?php echo URLROOT?>/home/ind_webinar/<?php echo $webinar->id?>">Read More <i class="fas fa-angle-double-right"></i></a>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!--News One Single End-->
                   
                   
             
                </div>
            </div>
        </section>
        <!--News One End-->

        <!-- Modal start -->
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

<?php require APPROOT . "/views/inc_home/footer.php"; ?>