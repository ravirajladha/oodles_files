<!DOCTYPE html>

<html lang="en">
<?php if (!isset($_SESSION['rexkod_oodles_access_id'])) {
    // session_destroy();
    // header("Location: " . URLROOT . "/home/login");
}
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> OodlesIN </title>
    <!-- favicons Icons 
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo URLROOT; ?>/assets_home/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URLROOT; ?>/assets_home/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URLROOT; ?>/assets_home/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="<?php echo URLROOT; ?>/assets_home/images/favicons/site.webmanifest" />
    <meta name="description" content="OodlesIN" />

   fonts -->
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/img/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <meta property="og:image" content="<?php echo URLROOT; ?>/assets/img/favicon_test.png">
    <meta property="og:image:secure_url" content="<?php echo URLROOT; ?>/assets/img/favicon_test.png">
    <meta property="og:image:type" content="image/png"> <!-- Replace "png" with the file format of your image -->
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">



    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/insur-icons/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/vendors/timepicker/timePicker.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- template styles -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/css/insur.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/css/insur-responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- font awesome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @media (min-width: 1200px){
            #navigation {
            width: 1180px;
        }
        }

        .main-menu .main-menu__list>li+li, .stricky-header .main-menu__list>li+li {
    margin-left: 20px;
}

    </style>
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>





    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->


    <div class="page-wrapper">
        <header class="main-header clearfix">
            <!-- <div class="main-header__top">
                <div class="container">
                    <div class="main-header__top-inner">
                        <div class="main-header__top-address">
                            <ul class="list-unstyled main-header__top-address-list">
                                <li>
                                    <i class="icon">
                                        <span class="icon-pin"></span>
                                    </i>
                                    <div class="text">
                                        <p>Asha Layout
Valagerahalli, Jnana Bharathi Extension, Kengeri satellite Town, Bengaluru, India 560060</p>

                                    </div>
                                </li>
                                <li>
                                    <i class="icon">
                                        <span class="icon-email"></span>
                                    </i>
                                    <div class="text">
                                        <p><a href="mailto:connect@oodlesin.com">connect@oodlesin.com</a></p>
                                    </div>
                                    <div class="text">
                                        <p></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="main-header__top-right">
                            <div class="main-header__top-menu-box">
                                <ul class="list-unstyled main-header__top-menu">
                                    <li><a href="tel:8151000945"><i class="fa fa-phone"></i>+91 81510 00945 </a></li>
                                   
                                </ul>
                            </div>
                            <div class="main-header__top-social-box">
                                <div class="main-header__top-social">
                                    <a href="https://twitter.com/OodlesIn" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/in/OodlesIn/" target="_blank"><i class="fab fa-linkedin"></i></a>
                                    <a href="https://in.pinterest.com/OodlesIn" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="https://www.instagram.com/oodlesin/" target="_blank"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <nav class="main-menu clearfix">
                <div class="main-menu__wrapper clearfix">
                    <div class="container" id="navigation">
                        <div class="main-menu__wrapper-inner clearfix">
                            <div class="main-menu__left">
                                <div class="main-menu__logo">
                                    <a href="<?php echo URLROOT ?>/home"><img src="<?php echo URLROOT; ?>/assets_home/images/resources/logo-1.png" alt="" width="175"></a>
                                </div>
                                <div class="main-menu__main-menu-box" style="padding-left: 0; padding-right: 0;">
                                    <div class="main-menu__main-menu-box-inner">
                                        <div class="">
                                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                            <ul class="main-menu__list" style = "padding-top: 5px;">
                                                <!-- <li class="dropdown current megamenu">
                                                <a href="<?php echo URLROOT ?>/home/index">Home </a>
                                              
                                            </li> -->

                                                <!-- <li class="dropdown ">

                                                </li>
                                                <li class="dropdown ">

                                                </li> -->
                                                <!-- <li class="dropdown ">
                                                    <a href="<?php echo URLROOT ?>/home/all_schools">School </a>

                                                </li>
                                                <li class="dropdown ">
                                                    <a href="<?php echo URLROOT ?>/home/all_colleges">College </a>

                                                </li>
                                                <li class="dropdown">
                                                    <a href="<?php echo URLROOT ?>/home/scholarships">Scholarships </a>

                                                </li> -->
                                                


                                                <li class="dropdown">
                                                    <a href="<?php echo URLROOT ?>/home">Quiz </a>

                                                    <ul>
                                                        <li>
                                                            <a href="<?php echo URLROOT ?>/home/quiz/1/0">Practice</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo URLROOT ?>/home/quiz/4/0">Contest</a>
                                                        </li>
                                                        <!-- <li>
                                                            <a href="<?php echo URLROOT ?>/home/quiz/3/0">Rapid Fire</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo URLROOT ?>/home/quiz/2/0">Merit</a>
                                                        </li> -->

                                                    </ul>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="https://learn.oodlesin.com">Learn </a>
                                                </li>
                                                <li class="dropdown ">
                                                    <a href="#">Career Assessment</a>
                                                    <ul style="width:300px;">
                                                        <li>
                                                            <a href="<?php echo URLROOT ?>/home/career_assesment_test">Career Assessment Test</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo URLROOT ?>/home/ccp">Career Counselling Program</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo URLROOT ?>/home/career_counsellor2">Become Our Partner</a>
                                                        </li>
                                                    </ul>

                                                </li>
                                                <li class="dropdown ">
                                                    <a href="#">Talk to our experts</a>
                                                    <ul style="width:300px;">
                                                        <li>
                                                            <a href="tel:8151000945">8151000945</a>
                                                        </li>
                                                        <li>
                                                            <a href="mailto:connect@oodlesin.com">connect@oodlesin.com</a>
                                                        </li>
                                                       
                                                    </ul>

                                                </li>
                                                <!-- <li class="dropdown ">
                                                    <a href="<?php echo URLROOT ?>/home/ccp">CCP </a>

                                                </li> -->
                                                <!-- <li class="dropdown ">
                                                    <a href="<?php echo URLROOT ?>/home/courses">Courses </a>

                                                </li> -->


                                                <!-- <?php if (!isset($_SESSION['rexkod_oodles_student_id'])) { ?>
                                    <a href=""  data-toggle="modal" data-target="#exampleModalCenter">Quiz</a>
                                    <?php } else { ?>
                                                    <a href="<?php echo URLROOT ?>/home/quizes">Quiz </a>
                                                <?php } ?> -->
                                                </li>

                                                <!-- <li class="dropdown ">
                                                    <a href="https://learn.oodlesin.com" style="color:#fc9d03;">Learn </a>

                                                </li> -->
                                                <!-- <li class="dropdown">
                                                    <a href="<?php echo URLROOT ?>/home/career_counsellor2"><span class="thm-btn-transition" style="color:#015fc9;">Become Our Partner</span></a>
                                                    
                                                </li> -->
                                                
                                        </div>
                                    </div>
                                    <!--   <div class="main-menu__main-menu-box-search-get-quote-btn ">
                                       <div class="main-menu__main-menu-box-search">
                                            <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                                        </div> 


                                        <div class="main-menu__main-menu-box-get-quote-btn-box">
                                            <a href="<?php echo URLROOT ?>/student/register" class="thm-btn main-menu__main-menu-box-get-quote-btn-right">Signup</a>
                                        </div> 

                                     <div class="main-menu__main-menu-box-get-quote-btn-box">
                                            <a href="<?php echo URLROOT ?>/student/login" class="thm-btn main-menu__main-menu-box-get-quote-btn-left">Login</a>
                                        </div> 

                                    </div>-->
                                </div>
                            </div>

                            <!-- <div class="main-menu__right">
                                <div class="main-menu__call">
                                    <div class="main-menu__call-icon">
                                       <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="main-menu__call-content">
                                 <a href="tel:8151000945">+91 81510 00945</a> 
                                  <p>Call to Our Experts</p>
                                    </div>
                                </div>
                            </div> -->
                            <div class="main-menu__right">
                                <div class="main-menu__call">
                                    <?php if (isset($_SESSION['rexkod_oodles_student_id'])) { ?>
                                        <div class="main-menu__main-menu-box-get-quote-btn-box">
                                        
                                            <a href="<?php echo URLROOT ?>/home/logout" class="thm-btn-blue main-menu__main-menu-box-get-quote-btn">Logout</a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="main-menu__main-menu-box-get-quote-btn-box">
                                            <a href="<?php echo URLROOT ?>/student/login" class="thm-btn-blue main-menu__main-menu-box-get-quote-btn"><i class="fa-sharp fa-solid fa-lock"></i>&nbsp;Login</a>
                                        </div>
                                        <div class="main-menu__main-menu-box-get-quote-btn-box"> &nbsp;</div>
                                        <div class="main-menu__main-menu-box-get-quote-btn-box">
                                            <a href="<?php echo URLROOT ?>/student/register" class="thm-btn-blue main-menu__main-menu-box-get-quote-btn"><i class="fa-regular fa-user"></i>&nbsp;Sign Up</a>
                                        </div>
                                    <?php } ?>
                                    <div class="main-menu__main-menu-box-get-quote-btn-box">
                                        <a href="tel:+918151000945" class="thm-btn-blue main-menu__main-menu-box-get-quote-btn" style="color:#000;font-weight: 400;"><i class="fa-brands fa-whatsapp"></i>&nbsp;+91 81510 00945</a>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="main-menu__main-menu-box-get-quote-btn-box">
                                            <a href="<?php echo URLROOT ?>/student/register" class="thm-btn main-menu__main-menu-box-get-quote-btn-right">Signup</a>
                                        </div> -->
                        </div>

                    </div>

                    <!-- <div class="main-menu__main-menu-box-get-quote-btn-box">
                                            <a href="<?php echo URLROOT ?>/student/login" class="thm-btn main-menu__main-menu-box-get-quote-btn-left">Login</a>
                                        </div> -->

                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <style>
            @media only screen and (min-width: 992px) {

                .main-slider_nav .swiper-button-next,
                .main-slider_nav .swiper-button-prev {
                    color: rgba(var(--insur-primary-rgb), 1) !important;
                    border: 5px solid rgba(var(--insur-primary-rgb), 1) !important;
                }
            }



            .complete {
                display: none;
            }

            .more {
                background: lightblue;
                color: navy;
                font-size: 13px;
                padding: 3px;
                cursor: pointer;
            }
        </style>
        <style>
            .feature-one__title {
                font-size: 20px !important;
                margin-left: -40px !important;
            }

            .float-container {
                position: fixed;
                top: 33%;
                right: 0;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                flex-direction: column;
                width: auto;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                -webkit-box-align: end;
                -ms-flex-align: end;
                align-items: flex-end;
                z-index: 999;
            }

            .float-container a {
                z-index: 99;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                width: 240px;
                height: 30px;
                margin-right: -190px;
                margin-bottom: 10px;
                padding: 10px 20px;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
                text-decoration: none;
                color: white;
                border-color: #46b8da;
                border-radius: 5px 0 0 5px;
                background-color: #eb690b;
                -webkit-box-shadow: 0 2px 4px #7d7d7d;
                box-shadow: 0 2px 4px #7d7d7d;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start;
                font-family: sans-serif;
            }

            .float-container a:hover {
                margin-right: 0;
                background-color: #f58220;
                -webkit-box-shadow: 0 2px 4px #7d7d7d;
                box-shadow: 0 2px 4px #7d7d7d;
            }

            /* Icon settings - remove if not needed*/
            .float-container .icon:before {
                font-family: "Font Awesome 5 Free";
                margin-right: 25px;
                -webkit-transition: all 0.25s ease-in-out;
                transition: all 0.25s ease-in-out;
            }

            .icon.one:before {
                content: "\f073";
            }

            .icon.two:before {
                content: "\f086";
            }

            .icon.three:before {
                content: "\f1d8";
            }

            /* Media queries */
            @media screen and (max-width:440px) {
                .float-container .icon:last-child {
                    display: none;
                }

                .float-container {
                    position: fixed;
                    top: auto;
                    bottom: 0;

                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-direction: row;
                    flex-direction: row;

                    width: 100%;

                    -webkit-box-orient: vertical;
                    -webkit-box-direction: normal;
                    -ms-flex-direction: auto;
                    -webkit-box-align: auto;
                    -ms-flex-align: auto;
                    align-items: auto;
                }

                .float-container a.icon {
                    right: 0;
                    bottom: 0;

                    width: 100%;
                    margin-right: 0;
                    margin-bottom: 0;
                    padding: 5px;

                    border-radius: 0;
                    -webkit-box-shadow: 0 0 0 #7d7d7d;
                    box-shadow: 0 0 0 #7d7d7d;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                    border-left: 1px solid darkorange;
                    border-right: 1px solid darkorange;
                }
                .float-container a{
                    font-size: 1.1rem;
                }
                
                
            }
        </style>
        <!-- Login modal -->
        <!-- <style>
    .close {
margin: 0;
/* position: absolute; */
opacity: 1;
z-index: 10;
cursor: pointer;
top: 150px; 
right: 150px; 
}
</style> -->
        <!-- <style>
        .center {
            margin: 0 auto;
            text-align: center;
            justify-content: center;
        }
        .btn-div {
            margin-top: 20px;
        }
    </style> -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
                        <!-- <button class="btn btn-round btn-primary" ><a href="<?php echo URLROOT ?>/student/register"> Signup</a></button> -->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!-- <button class="btn btn-round btn-primary" type="submit">Login</button> -->
                    </div>
                    <?php
                    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    // $last_part = substr($url, strrpos($url, '/') + 1);


                    $parts = explode('/', $url);
                    // $parsed_url = parse_url($url);
                    // $current_url =  implode("/", array_slice(explode("/", $parsed_url['path']),2));
                    $current_url = ($parts[3] . '/' . $parts[4]);
                    $first_part_url = $parts[3];
                    $second_part_url = $parts[4];
                    ?>
                    <form method="post" action="<?php echo URLROOT; ?>/home/home_user_login/<?php echo $first_part_url; ?>/<?php echo $second_part_url; ?>" autocomplete="off" class="register-form">
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