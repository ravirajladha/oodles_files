<?php require APPROOT . "/views/inc_home/header.php"; ?>
<style>
.services-two__single,
.bg-white {
  position: relative;
  display: block;
  background-color: #dee1d6;
  border-radius: var(--insur-bdr-radius);
  text-align: center;
  padding: 40px 35px 33px;
  border-bottom: 3px solid transparent;
  margin-bottom: 30px;
  -webkit-transition: all 500ms ease;
  transition: all 500ms ease;
}
.services-two__single:hover {
  border-bottom: 0px;
  transform: translateY(-5px);
  background-color: #dee1d6;
  
}
.services-two__single:hover  h3 a {
color: #000000;
}
.services-two__single:hover p{
color: #000000;
}

.border-blue {
  border: 1px solid blue;
}

.services-icon {
  position: relative;
  height: 85px;
  width: 85px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  margin: 0 auto;
  overflow: hidden;
  -webkit-transition: all 500ms ease;
  transition: all 500ms ease;
  z-index: 1;
}

.services-icon span {
  position: relative;
  display: inline-block;
  font-size: 36px;
  background: rgb(1, 97, 202);
  background: linear-gradient(90deg, rgba(1, 97, 202, 1) 41%, rgba(12, 222, 254, 1) 67%);
  -webkit-background-clip: text;
  -moz-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  -webkit-transition: all 500ms ease;
  transition: all 500ms ease;
}

.para {
  font-size: 12px;
  margin: 0;
  padding: 10px;
  background-color: white;
  border-radius: 4px;
}

.star-rating {
  margin-left: 10px;
}

.student-details {
  color: black;
}

.student-image {
  height: 30px;
  width: 30px;
  margin-left: 15px;
}

.student-info {
  margin-top: 15px;
}

.student-name {
  font-size: 15px;
  color: black;
  font-weight: bold;
}

.student-class {
  font-size: 12px;
}

.blog-slider {
  width: 95%;
  position: relative;
  max-width: 800px;
  margin: auto;
  background: #fff;
  box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2);
  padding: 25px;
  border-radius: 25px;
  height: 400px;
  transition: all .3s;
  margin-bottom:40px;
}

.blog-slider__item {
  display: flex;
  align-items: center;
}

.blog-slider__item.swiper-slide-active {
  .blog-slider__img img {
    opacity: 1;
    transition-delay: .3s;
  }
  .blog-slider__content > * {
    opacity: 1;
    transform: none;
  }
}

.blog-slider__img {
  width: 300px;
  flex-shrink: 0;
  height: 300px;
  background-image: linear-gradient(147deg, #fe8a39 0%, #fd3838 74%);
  /* box-shadow: 4px 13px 30px 1px rgba(252, 56, 56, 0.2); */
  border-radius: 20px;
  transform: translateX(-80px);
  overflow: hidden;
}


.blog-slider__content {
  padding-right: 25px;
}

.blog-slider__content > * {
  opacity: 0;
  transform: translateY(25px);
  transition: all .4s;
}

.blog-slider__code {
  color: #7b7992;
  margin-bottom: 15px;
  display: block;
  font-weight: 500;
}

.blog-slider__title {
  font-size: 24px;
  font-weight: 700;
  color: #0d0925;
  margin-bottom: 20px;
}

.blog-slider__text {
  color: #4e4a67;
  margin-bottom: 30px;
  line-height: 1.5em;
}

.blog-slider__button {
  display: inline-flex;
  background-image: linear-gradient(147deg, #fe8a39 0%, #fd3838 74%);
  padding: 15px 35px;
  border-radius: 50px;
  color: #fff;
  box-shadow: 0px 14px 80px rgba(252, 56, 56, 0.4);
  text-decoration: none;
  font-weight: 500;
  justify-content: center;
  text-align: center;
  letter-spacing: 1px;
}

.swiper-container-horizontal > .swiper-pagination-bullets,
.swiper-pagination-custom,
.swiper-pagination-fraction {
  bottom: 10px;
  left: 0;
  width: 100%;
}

.blog-slider__pagination {
  position: absolute;
  z-index: 21;
  right: 20px;
  width: 11px!important;
  text-align: center;
  left: auto!important;
  top: 50%;
  bottom: auto!important;
  transform: translateY(-50%);
}

.blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
  margin: 8px 0;
}

.blog-slider__pagination .swiper-pagination-bullet {
  width: 11px;
  height: 11px;
  display: block;
  border-radius: 10px;
  background: #062744;
  opacity: 0.2;
  transition: all .3s;
}

.blog-slider__pagination .swiper-pagination-bullet.swiper-pagination-bullet-active {
  opacity: 1;
  background: #fd3838;
  height: 30px;
  box-shadow: 0px 0px 20px rgba(252, 56, 56, 0.3);
}
.blog-slider__content h3{
  font-weight: bold;
  margin-bottom: 30px;
  margin-left:10px;
  color: black;
}
.blog-slider__content li{
margin-bottom: 10px;
}
.blog-slider__content p{
font-size:15px;
}
.button-row {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}

.button-container {
  flex-basis: 30%; /* Adjust the flex-basis value to control the width of button containers */
}

.btn {
  display: inline-flex;
  /* Adjust the padding to make the button height smaller */
  border-radius: 20px;
  color: white;
  text-decoration: none;
  font-weight: 500;
  justify-content: center;
  text-align: center;
  letter-spacing: 1px;
  background-color: blue; /* Set the background color to blue */
  font-size: 10px;
  height:30px;
  width:120px;
}
.blog-slider__content h4{
  color: black;
  margin-bottom: 20px;
  font-weight: bold;
  font-size: 20px;
}

.taketest{
  background-color:blue;
  width:190px;
  border-radius: 20px;
  color: white;
  margin-left: 490px;
  border: none;
  height: 40px;
  margin-bottom: 30px;
  
}
.certifi{
  width:300px;
  height:300px;
}
@media only screen and (max-width: 767px){
    .page-header__inner h2 {
    font-size: 30px;
}
.thm-btn {
    font-size: 12px;
    font-weight: 500;
    padding: 4px 10px 4px;
   
}
}
@media (max-width: 768px) {
  .blog-slider__item {
    flex-direction: column;
  }

  .blog-slider__img {
    margin: 0 auto;
    margin-bottom: 15px;
  }

  .blog-slider__content {
    text-align: center;
    padding-right: 0;
  }
  .blog-slider{
    height: 650px;
  }
  .association-image_container_1{
    border:none !important;
    margin-left: auto;
    margin-right: auto;
    
    
}
.thm-btn {
    font-size: 12px;
    font-weight: 500;
    padding: 4px 10px 4px;
   
}
}

.association-image_container_1{
    border-right:2px solid var(--insur-base);
    padding:0px 60px;
    margin-left: auto;
}
.association-image_container_2{
    /* border-right:2px solid var(--insur-base); */
    padding:0px 60px;
    margin-right: auto;
}
@media (max-width: 768px) {
  .association-image {
    flex-direction: column;
  }
  .association-image_container_1{
    border:none !important;
    margin-left: auto;
    margin-right: auto;
    
}
.association-image_container_2{
    margin-right: auto;
    margin-left: auto;
    margin-top:20px;

}
  
}
</style>
<!--Page Header Start-->
<!-- <section class="page-header" style="height: 70vh;margin-top:0;">
            <div class="page-header-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/2.png)">
            </div>
            <div class="page-header-shape-1"><img src="assets/images/shapes/page-header-shape-1.png" alt=""></div>
            <div class="container">
                <div class="page-header__inner">
                    
                    <h2>India's best Career Guidance Test <br> powered by AI
                    </h2>
                    <div class="about-one__btn-box">
                        <a href="#" class="thm-btn about-one__btn"  style="margin-right:50px;">Students</a>
                        <a href="#" class="thm-btn about-one__btn">Professional</a>

                    </div>
                </div>
            </div>
</section> -->
<section class="" style="margin-top:0;">
            
            <a href="http://careertest.oodlesin.com">
            <img class="img-fluid" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/2.png" width="100%" height="100%" alt="">
            </a>
            <div class="about-one__btn-box text-center" style="margin-top:10px;">
                        <a href="http://careertest.oodlesin.com" class="thm-btn about-one__btn"  style="margin-right:50px;">Students</a>
                        <a href="http://careertest.oodlesin.com" class="thm-btn about-one__btn">Professional</a>

                    </div>
</section>
        <!--Page Header End-->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="margin: 30px 0px;">
                        <h2 class="section-title__title">OodlesIN Features</h2>
                    </div>
                            <!--Services Two Single Start-->
                            <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class="services-two__single">
                                    <div class="services-two__icon-box">
                                        <div class="services-two__icon">
                                            <!-- <span class="icon-drive"></span> -->
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/completelyPractical.png" alt="" style="height: 80px; width:80px; clip-path: circle();">
                                        </div>
                                    </div>
                                    <h3 class="services-two__title"><a href="car-insurance.html">Personalized and Holisiting Learning</a></h3>
                                    <p class="services-two__text">We analyze your brain and see areas where you need interventions.</p>
                                </div>
                            </div>
                            <!--Services Two Single End-->
                            <!--Services Two Single Start-->
                            <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class="services-two__single">
                                    <div class="services-two__icon-box">
                                        <div class="services-two__icon">
                                            <!-- <span class="icon-drive"></span> -->
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/employee.png" alt="" style="height: 80px; width:80px; clip-path: circle();">
                                        </div>
                                    </div>
                                    <h3 class="services-two__title"><a href="car-insurance.html">Expert Teachers</a></h3>
                                    <p class="services-two__text">We select only the best in respective fields and constantly evaluate them.</p>
                                </div>
                            </div>
                            <!--Services Two Single End-->
                            <!--Services Two Single Start-->
                            <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class="services-two__single">
                                    <div class="services-two__icon-box">
                                        <div class="services-two__icon">
                                            <!-- <span class="icon-drive"></span> -->
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/teacher.png" alt="" style="height: 80px; width:80px; clip-path: circle();">
                                        </div>
                                    </div>
                                    <h3 class="services-two__title"><a href="car-insurance.html">Live Instructor Led Classes</a></h3>
                                    <p class="services-two__text">Adaptive learning with individual feedback given to the student.</p>
                                </div>
                            </div>
                            <!--Services Two Single End-->
                            <!--Services Two Single Start-->
                            <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class="services-two__single">
                                    <div class="services-two__icon-box">
                                        <div class="services-two__icon">
                                            <!-- <span class="icon-drive"></span> -->
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/onlineWebinar.png" alt="" style="height: 80px; width:80px; clip-path: circle();">
                                        </div>
                                    </div>
                                    <h3 class="services-two__title"><a href="car-insurance.html">Free Recordings</a></h3>
                                    <p class="services-two__text">With OodlesIN you can never miss classs as its always recorded for you.</p>
                                </div>
                            </div>
                            <!--Services Two Single End-->
                            
                </div>
            </div>
            

        </section>

        <!--Counter One Start-->
        <Section class="counter-one">
            <div class="counter-one-shape-1 float-bob-y">
                <img src="assets/images/shapes/counter-one-shape-1.png" alt="">
            </div>
            <div class="counter-one-shape-2 float-bob-y">
                <img src="assets/images/shapes/counter-one-shape-2.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <!--Counter One Single Start-->
                    <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <span class="icon-insurance-1"></span>
                                </div>
                                <div class="counter-one__count-box">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="1000">900</h3>
                                        <span class="counter-one__plus">+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Unique Personas
                                Analysed</p>
                        </div>
                    </div>
                    <!--Counter One Single End-->
                    <!--Counter One Single Start-->
                    <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <span class="icon-group"></span>
                                </div>
                                <div class="counter-one__count-box">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="500">00</h3>
                                        <span class="counter-one__plus">+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Experienced Career Counselors</p>
                        </div>
                    </div>
                    <!--Counter One Single End-->
                    <!--Counter One Single Start-->
                    <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <span class="icon-life-insurance"></span>
                                </div>
                                <div class="counter-one__count-box">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="98">00</h3>
                                        <span class="counter-one__plus">%</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Report Satisfaction Score</p>
                        </div>
                    </div>
                    <!--Counter One Single End-->
                    <!--Counter One Single Start-->
                    <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <span class="icon-success"></span>
                                </div>
                                <div class="counter-one__count-box">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="25000">24900</h3>
                                        <span class="counter-one__plus">+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Students Career Counseled</p>
                        </div>
                    </div>
                    <!--Counter One Single End-->
                </div>
            </div>
        </Section>
        <!--Counter One End-->

      <section>
        <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="margin: 30px 0px;">
                        <h2 class="section-title__title">Career Aptitude Test for students from 10th to 12th, graduates & professionals</h2>
                        <h5 class="about-two__counter-text-1">Find your perfect career</h5>
                    </div>
                            <!--Services Two Single Start-->
                            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class=" bg-white border-blue shadow-lg">
                                        <div class="services-icon">
                                            <!-- <span class="icon-drive"></span> -->
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/employee.png" alt="" style="height: 80px; width:80px; clip-path: circle();">
                                        </div>
                                    <h3 class="services-two__title" style="margin-top: 0px;"><a href="#">SCHOOL STUDENTS</a></h3>
                                    <p class="services-two__text">(6th - 12th)</p>
                                    <ul class="text-left" style="margin-top: 20px;">
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Recommended study stream selection</li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Most suited career recommendations</li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Persona & skill gap analysis & counsels</li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Personality analysis</li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Interventions for recommended careers</li>
                                    </ul>
                                    <a href="http://careertest.oodlesin.com" class="btn btn-circle btn-primary">GET STARTED</a>
                                </div>
                            </div>
                            <!--Services Two Single End-->
                            <!--Services Two Single Start-->
                            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class=" bg-white border-blue shadow-lg">
                                        <div class="services-icon">
                                            <!-- <span class="icon-drive"></span> -->
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/completelyPractical.png" alt="" style="height: 80px; width:80px; clip-path: circle();">
                                        </div>
                                    <h3 class="services-two__title" style="margin-top: 0px;"><a href="#">COLLEGE STUDENTS</a></h3>
                                    <p class="services-two__text">(Grad - POst Grad)</p>
                                    <ul class="text-left" style="margin-top: 20px;">
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Career advice based on interest & skills</li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Detailed skill map</li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Strengths & weakness analysis</li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Persona & skill gap analysis</li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Interventions for recommended careers</li>
                                    </ul>

                                    <a href="http://careertest.oodlesin.com" class="btn btn-circle btn-primary">GET STARTED</a>
                                </div>
                            </div>
                            <!--Services Two Single End-->
                            <!--Services Two Single Start-->
                            <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                                <div class=" bg-white border-blue shadow-lg">
                                        <div class="services-icon">
                                            <!-- <span class="icon-drive"></span> -->
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/expertCounselor.png" alt="" style="height: 80px; width:80px; clip-path: circle();">
                                        </div>
                                    <h3 class="services-two__title" style="margin-top: 0px;"><a href="#">CAREER PROFESSIONALS</a></h3>
                                    <p class="services-two__text">(Working Professional)</p>
                                    <ul class="text-left" style="margin-top: 20px;">
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Career advice based on interest & skills </li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Interventions needed for target careers</li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Persona & skill gap analysis</li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Strengths & weakness analysis</li>
                                        <li class="services-two__text" style="color:black;margin-bottom: 10px;">Learning recommendations</li>
                                    </ul>
                                        <a href="http://careertest.oodlesin.com" class="btn btn-circle btn-primary">GET STARTED</a>
                                </div>
                            </div>
                            <!--Services Two Single End-->
                </div>
            </div>
      </section>
    
        <section>
  <div class="container">
    <div class="row">
      <div class="col">
        <!-- <div class="card"> -->
          <div class="card-body">
            <div class="row">
              <!--Services Two Single Start-->
              <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                <div class="card">
                  <div class="card-body">
                    <!-- <p class="para">I am in class 10th and had kind of already decided on my stream in class 11th but wanted the right guidance on career options. OodlesIN's Career report not only confirmed my stream choice but also gave me a clear guidance on what career options are best for me and how can I pursue these careers.</p> -->
                    <p class="para">I personally believe that OodlesIN test series is much better than others. As exams are getting competitive with time, regular practice will assist you gain the confidence and speed you need to succeed. When compared to other exam test series, OodlesIN is the best option. Its exam questions repository is quite healthy.</p>
                    <div class="star-rating">
                      <span class="star filled"><i class="fas fa-star" style="color: orange;"></i></span>
                      <span class="star filled"><i class="fas fa-star" style="color: orange;"></i></span>
                      <span class="star filled"><i class="fas fa-star" style="color: orange;"></i></span>
                      <span class="star"><i class="fas fa-star" style="color: orange;"></i></span>
                      <span class="star"><i class="fas fa-star" style="color: orange;"></i></span>
                    </div>
                    <div class="student-info">
                      <div class="row">
                        <div class="col-3">
                          <img class="student-image" src="<?php echo URLROOT; ?>/public/assets/img/user/user3.jpg">
                        </div>
                        <div class="col-9">
                          <div class="student-details">
                            <h4 class="student-name" >A. Munisamy</h4>
                            <p class="student-class">Class 10th, Bangalore</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Services Two Single End-->
              <!--Services Two Single Start-->
              <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
  <div class="card">
    <div class="card-body">
      <!-- <p class="para">I was in final year BE and was confused between a career in IT or MBA. OodlesIN's Career test clearly showed how Eng./Advance science and IT were top suited professions for me and to do an MBA, what all skill gaps I had. I also got the right courses to fill in the skill gaps on OodlesIN's platform</p> -->
      <p class="para">OodlesIN test series' difficulty level closely matches the difficulty level of the actual exam. Their content is written by subject matter experts with extensive experience and is based on the most recent curriculum and exam patterns.</p>
      <div class="star-rating">
        <span class="star filled"><i class="fas fa-star" style="color: orange;"></i></span>
        <span class="star filled"><i class="fas fa-star" style="color: orange;"></i></span>
        <span class="star filled"><i class="fas fa-star" style="color: orange;"></i></span>
        <span class="star"><i class="fas fa-star" style="color: orange;"></i></span>
        <span class="star"><i class="fas fa-star" style="color: orange;"></i></span>
      </div>
      <div class="student-info">
        <div class="row">
          <div class="col-3">
            <img class="student-image" src="<?php echo URLROOT; ?>/public/assets/img/user/user10.jpg">
          </div>
          <div class="col-9">
            <div class="student-details">
              <h4 class="student-name" >Soham Borkar</h4>
              <p class="student-class">BTECH Student</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



              <!--Services Two Single End-->
              <!--Services Two Single Start-->
              <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
  <div class="card">
    <div class="card-body">
      <p class="para">My career as a BA was completely stagnated. OodlesIN's Career mentorship program run by Stanford and IIT/IIM grads provided me end to end guidance starting from right CV to BA interview preparation courses. Thanks to OodlesIN I got into a business consulting role with a leading MNC .</p>
      <div class="star-rating">
        <span class="star filled"><i class="fas fa-star" style="color: orange;"></i></span>
        <span class="star filled"><i class="fas fa-star" style="color: orange;"></i></span>
        <span class="star filled"><i class="fas fa-star" style="color: orange;"></i></span>
        <span class="star"><i class="fas fa-star" style="color: orange;"></i></span>
        <span class="star"><i class="fas fa-star" style="color: orange;"></i></span>
      </div>
      <div class="student-info">
        <div class="row">
          <div class="col-3">
            <img class="student-image" src="<?php echo URLROOT; ?>/public/assets/img/user/user4.jpg">
          </div>
          <div class="col-9">
            <div class="student-details">
              <h4 class="student-name" >Anukul Pai</h4>
              <p class="student-class">IT Professional
</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
              <!--Services Two Single End-->
            </div>
          </div>
        </div>
      </div>
    </div>
</section>         
   

        <section>
        <div class="container ">
            <div class="text-center">
                <h2 class="section-title__title" style="font-size:30px;margin-top:50px">Our unique approach for career assessments</h2>
            </div>

            <img class="img-fluid" src="https://www.OodlesIn.com/assets/Homepage/homepagebanner.png" alt="">
        </div>
        <div class="blog-slider">
  <div class="blog-slider__wrp swiper-wrapper">
    <div class="blog-slider__item swiper-slide">
      <div class="blog-slider__img">
        
        <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/HLLandingmiddleSection.png" alt="" style="width:350px;height:320px">
      </div>
      <div class="blog-slider__content">
      <h3 class="name">How are we different</h3>
            <ul class="description">
              <li>360⁰ brain and skill profile analysis</li>
              <li>Persona &amp; strength/weakness examination</li>
              <li>Right courses needed to fill in the skill gaps</li>
              <li>Exact interventions needed for the careers</li>
            </ul>
      </div>
    </div>
    <div class="blog-slider__item swiper-slide">
  <div class="blog-slider__img">
    <img  src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/holisticpageLandingladyImage.png" alt=""style="width:300px;height:320px">
  </div>
  <div class="blog-slider__content">
    <h4 class="name">Personalized Learning for students</h4>
    <p>Based on the career test, we plot your interest, potential and persona and suggest required learning interventions based on your current class and learning levels</p>
    
    <div class="button-row">
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn">Career Test</a>
      </div>
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn">Counseling</a>
      </div>
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn">Abroad Studies</a>
      </div>
    </div>
    <div class="button-row">
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn" >Online Courses</a>
      </div>
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn">Holistic Courses</a>
      </div>
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn">Test Series</a>
      </div>
    </div>
  </div>
</div>

    
    <div class="blog-slider__item swiper-slide">
      <div class="blog-slider__img">
        <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/holisticLandingboyImage.png" alt=""style="width:300px;height:320px">
      </div>
      <div class="blog-slider__content">
      <h4 class="name">Advanced Learning for Professionals</h4>
    <p>The brain test plots your interests, potential, persona and skill level. It does a GAP analysis of your skills and career options and provides the recommendation on career growth</p>
    
    <div class="button-row">
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn">Career Test</a>
      </div>
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn">Mentoring</a>
      </div>
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn">Interview Prep</a>
      </div>
    </div>
    <div class="button-row">
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn" >Resume Writing</a>
      </div>
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn">Certifications</a>
      </div>
      <div class="button-container">
        <a href="http://careertest.oodlesin.com" class="btn">Upskilling</a>
      </div>
    </div>
      </div>
    </div>
    
  </div>
  <div class="blog-slider__pagination"></div>
</div>

        </section>


        <section>
        <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="margin: 30px 0px;">
                      
                        <h2 style="color: black; font-weight:bold">Psychometric career tests</h2>
                    </div>
                            <!--Services Two Single Start-->
                            <div class="col-xl-2 col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="100ms">
                                <div class=" bg-white border-blue shadow-lg">
                                      
                                 <div class="row"> 
                                  <div class="col-md-2">
                                  <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/10.png" alt="dfa" style="height: 80px; width:80px;margin-right:40px">
                                  </div>
                                  <div class="col-md-10">
                                  
                                    <h4 style="color:black;font-weight:bold;margin-bottom:10px">AFTER 10TH STREAM SELECTOR</h4>
                                    <p style="font-size: 12px;  margin:0px;padding:5px;">For students in class 6th-10th, Advanced scientific algorithms to know study streams based on interest and potential Full guidance on stream selection</p>
                                  </div>
                                
                                </div>
                                 
                                   
                                 
                                </div>
                            </div>
                            <!--Services Two Single End-->
                            <!--Services Two Single Start-->
                            <div class="col-xl-2 col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="100ms">
                                <div class=" bg-white border-blue shadow-lg">
                                      
                                <div class="row"> 
                                  <div class="col-md-2">
                                  <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/12.png" alt="dfa" style="height: 80px; width:80px;margin-right:40px">
                                  </div>
                                  <div class="col-md-10">
                                  
                                    <h4 style="color:black;font-weight:bold;margin-bottom:10px">AFTER 12TH CAREER SELECTOR</h4>

                                    <p style="font-size: 12px;  margin:0px;padding:5px;">For students in class 11th-12th, Know most suited career options based on your interest and aptitude, Learn needed interventions & courses.</p>
                                  </div>
                                
                                </div>
                                  
                                   
                                 
                                </div>
                            </div>
                            <!--Services Two Single End-->
                            <!--Services Two Single Start-->
                           
                            <!--Services Two Single End-->
                </div>


                <div class="row">
                 <!--Services Two Single Start-->
                            <div class="col-xl-2 col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="100ms">
                                <div class=" bg-white border-blue shadow-lg">
                                      
                                 
                                <div class="row"> 
                                  <div class="col-md-2">
                                  <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/college.png" alt="dfa" style="height: 80px; width:80px;margin-right:40px">
                                  </div>
                                  <div class="col-md-10">
                                  
                                    <h4 style="color:black;font-weight:bold;margin-bottom:10px">IDEAL CAREER SELECTOR</h4>
                                    <p style="font-size: 12px;  margin: 0px;padding:5px;">For GRAD/POST GRAD students Know most suited career options based on your interest and aptitude, 360⁰ interventions to get to the career.</p>
                                  </div>
                                
                                </div>
                                   
                                 
                                </div>
                            </div>
                            <!--Services Two Single End-->
                            <!--Services Two Single Start-->
                            <div class="col-xl-2 col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="100ms">
                                <div class=" bg-white border-blue shadow-lg">
                                <div class="row"> 
                                  <div class="col-md-2">
                                  <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/MBA.png" alt="dfa" style="height: 80px; width:80px;margin-right:40px">
                                  </div>
                                  <div class="col-md-10">
                                  
                                    <h4 style="color:black;font-weight:bold;margin-bottom:10px">PROFESSIONAL CAREER SWITCH</h4>
                                    <p style="font-size: 12px;  margin: 0px;padding:10px;">Know most suited career options based on your interest and aptitude, Complete guidance on career switch and professional services on CV and interview preparation.</p>
                                  </div>
                                
                                </div>
                                 
                                  
                                   
                                 
                                </div>
                            </div>
                            <!--Services Two Single End-->
                            <!--Services Two Single Start-->
                           
                            <!--Services Two Single End-->
                            <a href="http://careertest.oodlesin.com">
                          <button class="taketest" >Take Career Test</button></a>

                </div>


            </div>
        </section>

        <section style="margin-top:40px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h5 class="about-two__counter-text-1" style="color:var(--insur-base);">OUR ASSOCIATIONS</h5>
                        <h2 class="section-title__title">OUR INTERNATIONAL ASSOCIATIONS</h2>

                    </div>
                </div>
                <div class="d-flex justify-content-center association-image">
                    <div class="association-image_container_1" >
                    <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/APCDALOGO.png" alt="dfa" style="height: 100px; width:200px;">
                    </div>
                    <div class="association-image_container_2">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/IAAPLOGO.png" alt="dfa" style="height: 100px; width:200px;">
                    </div>
                </div>
               
            </div>
        </section>


        <section  style="margin-top:40px;">
        <div class="container" >
                <div class="row">
                    
                            <!--Services Two Single Start-->
                            <div class="col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="100ms">
                                <div class="bg-white shadow-lg">
                                      
                                <div class="row"> 
                                  <div class="col-md-3">
                                    <h2 style="color: black;margin-top:90px;font-weight:bold;font-size:25px;padding:10px">OodlesIN's Career Guidance Report</h2>
                                  </div>
                                  <div class="col-md-5">
                                  
                                  
                                    <p style="  margin:0px;padding:5px; margin-top:70px;font-size:19px;padding:18px;">OodlesIN's deeply researched AI algorithm draws out complete brain profile and persona for the individual. It finds out the most suitable career options and interventions needed to. </p>
                                  </div>
                                  <div class="col-lg-4">
                                    <img class="" width="100%"  src="<?php echo URLROOT; ?>/assets/images/photos/1.jpg" alt="dfa">

                                  </div>
                                 
      


                                </div>
                               </div>
                             </div>


                </div>
            </div>
        </section>

        <section>
        <div class="container">
                <div class="row">
                    
                            <!--Services Two Single Start-->
                            <div class="col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="100ms">
                                <div class=" bg-white shadow-lg">
                                      
                                 <div class="row"> 
                                  <div class="col-md-4">
                               <h2 style="color: black;margin-top:20px;font-weight:bold;font-size:25px;padding:10px">Designed in guidance with the best Neuroscientist in india</h2>
                                  </div>
                                  <div class="col-md-8">
                                  
                                  
                                    <p style="  margin:0px;padding:5px; margin-top:10px;font-size:19px;padding:18px;">The approach followed by OodlesIN to arrive at the brain score and applicable job areas using AI is really wonderful and well structured. Such asn algorithm can help a lot of needy children who need introspection on what their true capabilities are. </p>
                                    <h6>Dr. Manoj Kumar. Neuroscientist</h6>
                                  </div>
                                 
     

                                  </div>
                                  </div>

                  </div>
                </div>
            </div>
        </section>










<?php require APPROOT . "/views/inc_home/footer.php"; ?>
<script>
  var swiper = new Swiper('.blog-slider', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      mousewheel: {
        invert: false,
      },
      // autoHeight: true,
      pagination: {
        el: '.blog-slider__pagination',
        clickable: true,
      }
    });
    </script>