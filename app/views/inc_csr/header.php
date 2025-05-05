<!DOCTYPE html>

<html lang="en">
<?php if(!isset($_SESSION['rexkod_oodles_access_id']) ){
//  header("Location: ".URLROOT."/home/login");
}
?>
<head>
<style>
/* .dropbtn {
  background-color: blue;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color:#015fc9;} */
</style>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    
 




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

    <!-- template styles -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/css/insur.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_home/css/insur-responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <div class="main-header__top">
                <div class="container">
                    <div class="main-header__top-inner">
                        <div class="main-header__top-address">
                            <ul class="list-unstyled main-header__top-address-list">
                                <li>
                                    <i class="icon">
                                        <span class="icon-pin"></span>
                                    </i>
                                    <div class="text">
                                        <p>30 Kengeri Road, Bengaluru 560060</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="icon">
                                        <span class="icon-email"></span>
                                    </i>
                                    <div class="text">
                                        <p><a href="mailto:supportp@oodlesin.com">supportp@oodlesin.com</a></p>
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
                                    <!-- <li><a href="tel:8151000945">+91 81510 00945 </a></li> -->
                                    <li><a href="tel:8151000945"><i class="fa fa-phone"></i>+91 81510 00945 </a></li>
                                    <li><a href="<?php echo URLROOT?>/home/faq"> FAQs</a></li>
                                    <li><a href="<?php echo URLROOT?>/home/about">About</a></li>
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
            </div>
            <nav class="main-menu clearfix">
                <div class="main-menu__wrapper clearfix">
                    <div class="container">
                        <div class="main-menu__wrapper-inner clearfix">
                            <div class="main-menu__left">
                                <div class="main-menu__logo">
                                    <a href="<?php echo URLROOT?>/home"><img src="<?php echo URLROOT; ?>/assets_home/images/resources/logo-1.png" alt="" width="175"></a>
                                </div>
                                <div class="main-menu__main-menu-box">
                                    <!-- <div class="main-menu__main-menu-box-inner">
                                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                        <button><ul class="main-menu__list">
                                            <li class="dropdown current megamenu">
                                            <a href="#">CSR</a>
                                            <ul>                               
                                            <li>
                                                <a href="<?php echo URLROOT?>/csr/sms">SMS</a>
                                               
                                            </li>
                                        
                                            <li>
                                                <a href="<?php echo URLROOT?>/csr/sts">STS</a>
                                               
                                            </li>
                                            <li>
                                                <a href="<?php echo URLROOT?>/csr/s2s">S2S</a>
                                               
                                            </li>
                                            
</ul>
                                            
                                        </ul></button>
                                    </div> -->
                                    <div class="main-menu__main-menu-box-search-get-quote-btn ">
                                        <!-- <div class="main-menu__main-menu-box-search">
                                            <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                                        </div> -->
                                     
                              
                                        <!-- <div class="main-menu__main-menu-box-get-quote-btn-box">
                                            <a href="<?php echo URLROOT?>/student/register" class="thm-btn main-menu__main-menu-box-get-quote-btn-right">Signup</a>
                                        </div> -->
                                 
                                        <!-- <div class="main-menu__main-menu-box-get-quote-btn-box">
                                            <a href="<?php echo URLROOT?>/student/login" class="thm-btn main-menu__main-menu-box-get-quote-btn-left">Login</a>
                                        </div> -->
                                        
                                    </div>
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
                                <a><ul class="main-menu__list">
                                            <li class="dropdown megamenu">
                                            <a href="#" style="width: 20px;
  height: 4px;
  background-color: black;
  margin: 8px 0;"></a>
  <a href="#" style="width: 20px;
  height: 4px;
  background-color: black;
  margin: 8px 0;"></a>
  <a href="#" style="width: 20px;
  height: 4px;
  background-color: black;
  margin: 8px 0;"></a>
                                            <ul>                               
                                            <li>
                                                <a href="<?php echo URLROOT?>/csr/sms">SAS</a>
                                               
                                            </li>
                                        
                                            <li>
                                                <a href="<?php echo URLROOT?>/csr/sts">STS</a>
                                               
                                            </li>
                                            <li>
                                                <a href="<?php echo URLROOT?>/csr/s2s">S2S</a>
                                               
                                            </li>
                                          <!--  <li>
                                                <a href="<?php echo URLROOT?>/home/individual_donor">Individual Donor</a>
                                               
                                            </li>-->
                                            <li>
                                            <a href="<?php echo URLROOT?>/home/ways_to_give">Donor</a>
                                               
                                            </li>
                                            
</ul>
                                            
                                        </ul></button>
                                        <!-- <div class="dropdown">
  <button class=" main-menu__main-menu-box-get-quote-btn-box dropbtn"><a href="<?php echo URLROOT?>/student/login">Login</a></button>
  <div class="dropdown-content">
    <ul>
  <li>
                                                <a href="<?php echo URLROOT?>/csr/sms">SMS</a>
                                               
                                            </li>
                                        
                                            <li>
                                                <a href="<?php echo URLROOT?>/csr/sts">STS</a>
                                               
                                            </li>
                                            <li>
                                                <a href="<?php echo URLROOT?>/csr/s2s">S2S</a>
                                               
                                            </li>
</ul>
  </div>
</div> -->
                                  <pre> </pre>
                                        <div class="main-menu__main-menu-box-get-quote-btn-box">
                                            <a href="<?php echo URLROOT?>/student/register" class="thm-btn main-menu__main-menu-box-get-quote-btn">Signup</a>
                                        </div>
                                </div>
                            </div>
                     
                            <!-- <div class="main-menu__main-menu-box-get-quote-btn-box">
                                            <a href="<?php echo URLROOT?>/student/register" class="thm-btn main-menu__main-menu-box-get-quote-btn-right">Signup</a>
                                        </div> -->
                        </div>
                
                    </div>
                   
                                        <!-- <div class="main-menu__main-menu-box-get-quote-btn-box">
                                            <a href="<?php echo URLROOT?>/student/login" class="thm-btn main-menu__main-menu-box-get-quote-btn-left">Login</a>
                                        </div> -->
                                      
                </div>
            </nav>
        </header>
        <br>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->
