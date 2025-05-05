<?php require APPROOT . "/views/inc_home/header.php"; ?>

<style>
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
.bg-blue {
  background-color:  var(--insur-base);
  border-radius: var(--insur-bdr-radius);
  text-align: center;
  padding: 40px 35px 33px;
  border-bottom: 3px solid transparent;
  margin-bottom: 30px;
  -webkit-transition: all 500ms ease;
  transition: all 500ms ease;
}
.card-title_main{
    color: #ffff;
    font-size: 40px;
    line-height: 50px;
    font-weight: 600;
    letter-spacing: 3px;
    margin-bottom: 7%;
}
.card-para_main{
    color: #ffff;
}
.thm-btn-white {
  background-color: var(--insur-white);
  color: var(--insur-base);
}
/* .thm-btn-blue:hover {
    background-color: #eb690b;
} */
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
.certificate{
    width: 75%;
    margin-left: auto;
    margin-right: auto;
    display: block;
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
.card-title_main_2{
    font-size: 36px;
    color: #fff;
    padding-bottom: 14%;
    padding-top: 2%;
    font-weight: 600!important;
    text-transform: uppercase;
}
.nationalAwardTextDesc {
    font-size: 24px;
    line-height: 1.55;
    color: #f3f1f1;
    text-align: left;
    margin-bottom: 35px;
    margin-top: 18px;
}
.nationalAwardText1 {
    text-align: center;
    color: #fff;
    font-size: 27px;
    font-weight: 500!important;
    line-height: 40px;
    position: relative;
    top: 0.79em;
    text-transform: uppercase;
    padding: 0 10% 8% 2%;
}
.straitLine {
    border-right: 1px solid #fff!important;
    margin-bottom: 3%;
    margin-top: 2%;
    height: 380px;
}
img.awardImage {
    border-left: 1px solid #fff!important;
    display: block;
    margin-left: 20%;
    margin-right: 10%;
    width: 60%;
    float: unset;
    text-align: center;
    height: 400px;
}
h3.startupIndia {
    text-align: center;
    font-size: 28px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 15%;
    margin-top: 8%;
    line-height: 1.55;
}
.straitLine1 {
    margin-bottom: 3%;
    margin-top: 2%;
    height: 380px;
}
img.awardImage1 {
    width: 70%;
    margin-left: 15%;
    margin-top: 14%;
}
.blue-box{
  background-color:  var(--insur-base);
    height: 150px;
    width: 200px;
    border-radius: 4px;
    margin-left:auto;
    margin-right:auto;
}
img.fullDataSectionImages {
    width: 11.8%;
    /* min-height: 160px; */
    margin-bottom: .3%;
    margin-right: .2%;
    max-height: 160px;
}
.iconBox{
    display: -ms-flexbox;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -ms-flex-align: center;
    align-items: center;
    padding: 0 6%;
    transition: .3s;
    border: 1px solid #eef0ef;
    margin-right: 0;
    width: 94%;
    margin-top: 3%;
    margin-bottom: 8%;
    min-height: inherit;
    transition: .3s;
    color: #000;
}
img.testImage {
    width: 60px;
    height: 60px;
}
.testmText {
    font-weight: 700;
    margin: 0 0 0 9%;
    padding: 0;
    line-height: 1;
    font-size: 21px;
}
label {
    font-weight: 500;
}
</style>

<!--Page Header Start-->
<!-- <section class="page-header" style="height: 70vh;margin-top:0;margin-bottom:0;">
            <div class="page-header-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/ccp.jpg)">
            </div>
            <div class="page-header-shape-1"><img class="image-fluid" src="assets/images/shapes/page-header-shape-1.png" alt=""></div>
            <div class="container">
                <div class="page-header__inner">
                    
                    <h2>Advance Career Counsellor
                    <br>Certification Program
                    </h2>
                    <p style="margin-top:20px;margin-bottom:20px;">Your complete career counselling business setup
with OodlesIN's support</p>
                    <div class="about-one__btn-box">
                        <a href="#" class="thm-btn about-one__btn" style="margin-right:50px;">Register Now</a>
                        <a href="#" class="thm-btn about-one__btn">View Video</a>

                    </div>
                </div>
            </div>
</section> -->
<section class="" style="margin-top:0;">
          
            <a href="<?php echo URLROOT; ?>/home/counsellor_register_view">
            <img class="img-fluid" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/1.png" width="100%" height="100%" alt="">
            </a>
            <!-- <a id="openModalLink" href="#" data-toggle="modal" data-target="#exampleModal">
  <img class="img-fluid" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/1.png" width="100%" height="100%" alt="">
</a> -->

            <!-- <div class="about-one__btn-box text-center">
                        <a href="#" class="thm-btn about-one__btn" style="margin-right:50px;">Register Now</a>
                        <a href="#" class="thm-btn about-one__btn">View Video</a>

                    </div> -->
</section>
<!--Page Header End-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalToggleLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 18px;">Counsellor Signup</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo URLROOT; ?>/home/counsellor_register" method="post">
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>First Name<span>*</span></label>
                    <input type="text" class="form-control mdl-textfield__input" id="f_name" name="f_name" placeholder="Enter Fast Name" required>
                </div>
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Last Name<span>*</span></label>
                    <input type="text" class="form-control mdl-textfield__input" id="l_name" name="l_name" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Email<span>*</span></label>
                    <input type="email" class="form-control mdl-textfield__input" id="email" name="email" placeholder="Enter Email" required>
                </div>
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Country<span>*</span></label>
                    <input type="text" class="form-control mdl-textfield__input" id="country" name="country" placeholder="Enter country" required>
                </div>
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Phone Number<span>*</span></label>
                    <input type="text" class="form-control mdl-textfield__input" id="phone" name="phone" placeholder="Enter country" required>
                </div>
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Password<span>*</span></label>
                    <input type="text" class="form-control mdl-textfield__input" id="password" name="password" placeholder="Enter country" required>
                </div>
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Postal Code<span>*</span></label>
                    <input type="text" class="form-control mdl-textfield__input" id="postal_code" name="postal_code" placeholder="Enter country" required>
                </div>
                <div class="form-group d-flex d-flex align-items-baseline">
                                <input type="checkbox" name="terms" id="" required>
                    <label for="agree-term" class="label-agree-term" style="font-size:15px; margin-left:4px;">I Agree To All The <a href="#" onclick="openModal()" class="term-service">Terms and Conditions*.</a></label>
                </div>
            </form>
      </div>
      <div class="modal-footer">
                <!-- <div class="d-flex">
                    <p style="font-size:12px; margin-right:10px;">Already Have Account </p>
                    <button data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" class="signup-image-link btn btn-warning" style="background-color:#F99300;">Sign In</button>
                </div> -->
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary">Register</button>
      </div>
    </div>
  </div>
</div>
<!-- modal end -->
<!-- 2nd modal for login -->
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hide this modal and show the first with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
      </div>
    </div>
  </div>
</div>
<!-- modal end -->

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
                                        <h3 class="odometer" data-count="1970">00</h3>
                                        <span class="counter-one__plus">+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Trained Counselors</p>
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
                                        <h3 class="odometer" data-count="30000">00</h3>
                                        <span class="counter-one__plus">+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Students Counseled</p>
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
                                        <h3 class="odometer" data-count="250">00</h3>
                                        <span class="counter-one__plus">+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Cities Covered</p>
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
                                        <h3 class="odometer" data-count="50000">00</h3>
                                        <span class="counter-one__plus">+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Psychometrics Conducted</p>
                        </div>
                    </div>
                    <!--Counter One Single End-->
                </div>
            </div>
        </Section>
        <!--Counter One End-->
        <section style="margin-top:50px;margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="bg-blue shadow-lg">
                            
                            <h2 class="card-title_main">OUR PROGRAM OVERVIEW</h2>
                            <p class="card-para_main">OodlesIN’s Career Counselor certification program is one of the industry leading career counselor certification program which is designed by industry best career counselors, top neuroscientists and advanced technology and industry experts from IIT, IIM & SJIM. This program covers the advance career counselor certification course followed by complete hand holding to set yourself up as a Career Counselor.</p>
                            <div class="about-one__btn-box" style="margin-top:15px">
                                <a href="#" class=" about-one__btn thm-btn-blue">Learn more</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="bg-white shadow-lg" style="padding:40px 25px 33px; min-height: 600px;">
                                <div class="services-icon">
                                <!-- <span class="icon-drive"></span> -->
                                <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/selfPacedVideo.png" alt="dfa" style="height: 80px; width:80px;">
                                </div>
                                    <h3 class="services-two__title"><a href="#">Free Recordings</a></h3>
                                    <p class="">15 Modules, 45+ Lectures to cover framework, approach, methodology, demo and practical aspects of career counseling including the training on career counseling platform, psychometric test & AI powered career guidance report</p>
                                    
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="bg-white shadow-lg" style="padding:40px 25px 33px;min-height: 600px;">
                                <div class="services-icon">
                                <!-- <span class="icon-drive"></span> -->
                                <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/onlineWebinar.png" alt="dfa" style="height: 80px; width:80px;">
                                </div>
                                <h3 class="services-two__title"><a href="#">Free Cobranding for your Brand</a></h3>
                                    <p class="">We offer you free cobranding to have your brand logo showcased on our reports and platform. We also have recorded lectures on branding, online setup, package creation & pricing of services, social media & offline marketing and proven strategies to multiply your students</p>
                                    
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="bg-white shadow-lg " style="padding:40px 25px 33px;min-height: 600px;">
                                <div class="services-icon">
                                <!-- <span class="icon-drive"></span> -->
                                <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/expertCounselor.png" alt="dfa" style="height: 80px; width:80px;">
                                </div>
                                <h3 class="services-two__title"><a href="#">Listing As Expert Career Counselor</a></h3>
                                    <p class="">Profile listing with your details on Find Expert Counselors Page on completion of the certification program. Students visiting OodlesIN’s website can see your profile and also search in a given city and state aided by your own webpage (completely free)</p>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </section>

        <section style="margin-top:50px;margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="margin-top:50px;margin-bottom:50px;">
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

        <section style="margin-top:50px;margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center"style="margin-top:50px;margin-bottom:50px;">
                        <h5 class="about-two__counter-text-1" style="color:var(--insur-base);">OodlesIN CAREER COUNSELING PLATFORM</h5>
                        <h2 class="section-title__title">STARTUP CHAMPIONS - DD</h2>

                    </div>
                    
                    
                </div>
                
                <div style="max-width: 800px; margin: 0 auto;">
    <!-- Paste your YouTube embed code here -->
    <iframe width="100%" height="450" src="https://www.youtube.com/embed/knn3ExY" frameborder="0" allowfullscreen></iframe>
        <!-- <img src="" alt=""> -->
</div>

                    
            </div>
        </section>

        <Section class="counter-one" style="margin-top:50px;margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h5 class="about-two__counter-text-1" style="color: #ffff;">SALIENT FEATURES</h5>
                        <h2 class="section-title__title" style="color: #ffff;">ADVANCE COUNSELLOR CERTIFICATION PROGRAM</h2>
                    </div>
                </div>
                <div class="row" style="margin-top:40px">
                    <div class="col-lg-6">
                        <ul class="text-left">
                            <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">11+ Hrs of Training on Career Counselling</li>
                            <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Self Paced Video Based + Live Instructor-Led Online Training Program</li>
                            <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Career Counseling Framework, Methodology & Approach</li>
                            <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Overview of Career Assessment Tool and Counselling Platform</li>
                            <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Conceptual & Practical Knowledge Through Case Studies, Scenarios Analysis & Demo Counseling Session.</li>
                            <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Your Own Branded Psychometric and Career Counselling Platform</li>
                            <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Career Counselor Certification</li>
                            <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Complete Hand Holding to Set You Up as a Career Counselor</li>
                            <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Marketing and Lead Generation Support</li>
                        </ul>
                        <div class="text-center">
                            <div class="about-one__btn-box">
                                <a href="<?php echo URLROOT; ?>/home/counsellor_register_view" class="thm-btn-orange about-one__btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="certificate" src="<?php echo URLROOT; ?>/assets/images/photos/1.jpg" alt="dfa">
                        <!-- <img class="certificate" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/certificate_sample.png" alt="dfa"> -->
                    </div>
                </div>
            </div>
        </section>

        <section style="margin-top:50px;margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="margin-top:50px;margin-bottom:50px;">
                        <h5 class="about-two__counter-text-1" >INTRODUCTION TO ACCP PROGRAM</h5>
                        <h2 class="section-title__title">ADVANCE COUNSELOR CERTIFICATION PROGRAM</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <div style="max-width: 800px; margin: 0 auto;">
    <!-- Paste your YouTube embed code here -->
    <iframe width="100%" height="350" src="https://www.youtube.com/embed/knn3ExYT" frameborder="0" allowfullscreen></iframe>
</div>
<div class="bg-white shadow-lg " style="padding:40px 25px 33px; text-align: center;">
<h4 class="card-title_main_2" style="color:#000">Advanced Career Counselor Certification Program</h4>

<div class="blue-box " style="padding-top:30px;">
    <p style="text-decoration: line-through;color:#ffff; font-size:20px;">&#x20B9;7499</p><br>
    <p style="color:#ffff;font-size:34px;">&#x20B9;2895</p>
</div>
</div>

                    </div>
                    <div class="col-lg-6">
                        <div class="bg-white shadow-lg " style="padding:40px 25px 33px; text-align: left;">
                        <p>OodlesIN is a national award winning Career Counseling Platforms and 30,000+ students have been career counselled on the platform. We also have a network of 1500+ counselors and 300+ schools in India.</p>
                        <p>OodlesIN is a member of Asia Pacific Career Development Association (APCDA) & International Association of Applied Psychology (IAAP)</p>
                        <p>What you get from the complete program:</p>
                        <ul class="text-left">
                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Career Counselor Certification Course - Lifetime Access</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Free access to OodlesIN's Career Counseling Platform</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Access to ask Q&A with the experts through the platform</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Access to Psychometric Test</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Training on Digital/Online Marketing and Pricing your Services as a Career Counselor</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Training course on OodlesIN's AI powered Career Guidance Report</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">1 free license for career guidance report (To conduct counseling for 1 student)</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Listing on OodlesIN's website as an Affiliated Career Counselor</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Support on Digital Marketing</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Complete hand holding and support at every stage to set yourself up as a Career Counselor</li>
                        </ul>
                        <div class="text-center">
                            <div class="about-one__btn-box">
                                <a href="<?php echo URLROOT; ?>/home/counsellor_register_view" class="thm-btn-orange about-one__btn">Buy Now</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- <Section class="counter-one" style="padding-left: 2%;padding-right: 2%; margin-top:50px;margin-bottom:50px;">
                <div class="row" style="margin-top:40px">
                    <div class="col-lg-4">
                        <h4 class="card-title_main_2">NATIONAL STARTUP AWARD, 2020</h4>
                        <p class="nationalAwardTextDesc" style="color: #ffff;">OodlesIN has won the National Startup Award 2020 in the 'Rural Impact Startup' Category. This is in space of Career Counseling and Personalized Learning space.</p>
                        <div class="text-center">
                            <div class="about-one__btn-box">
                                <a href="#" class="thm-btn-orange about-one__btn">Know More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="nationalAwardText1">NATIONAL STARTUP AWARD RURAL IMPACT</h4>
                        <div class="straitLine">
                            <img class="awardImage" src="<?php echo URLROOT; ?>/assets/images/photos/1.jpg" alt="">
                            
                        </div>
                        <h3 class="startupIndia">StartupIndia</h3>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="nationalAwardText1">STARTUP UNDER STARTUP PROMOTION CELL - GOA</h4>
                        <div class="straitLine1">
                            <img class="awardImage1" src="<?php echo URLROOT; ?>/assets/images/photos/1.jpg" alt="">
                            
                        </div>
                        <h3 class="startupIndia">Startuppromotioncell Goa</h3>
                    </div>
                </div>
                <div class="row" style="margin-top:40px">
                    <div class="col-lg-4">
                        
                    </div>
                    <div class="col-lg-4">
                        <h4 class="card-title_main_2">NATIONAL STARTUP AWARD, 2020</h4>
                        <p class="nationalAwardTextDesc" style="color: #ffff;">OodlesIN has won the National Startup Award 2020 in the 'Rural Impact Startup' Category. This is in space of Career Counseling and Personalized Learning space.</p>
                        <div class="text-center">
                            <div class="about-one__btn-box">
                                <a href="#" class="thm-btn-orange about-one__btn">Know More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    
                </div>

        </section> -->

        <Section style="margin-top:50px;margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="margin-top:50px;margin-bottom:50px;">
                        <h5 class="about-two__counter-text-1">COURSE SYLLABUS</h5>
                        <h2 class="section-title__title">ADVANCE COUNSELLOR CERTIFICATION PROGRAM</h2>
                    </div>
                    <div class="work-together__right">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Session 1: Counselling framework and approach (Video based)</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <ul class="text-left">
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Career Counselling Methodology</li>
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Career guidance framework</li>
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Holistic Skills & personality understanding</li>
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Student Interest and Aspirations</li>
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Career and stream options</li>
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Colleges after 10th or 12th</li>
                                            
                                        </ul>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4> Session 2: Usage of Technology to drive career counseling (Video based)</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <ul class="text-left">
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Using OodlesIN's platform for enabling career guidance for students</li>
                                            
                                        </ul>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Session 3: Career Guidance Report and Options (Video based)</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <ul class="text-left">
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Using Career Guidance Report</li>
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Using Career Job Options site</li>
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Career Stream Options</li>
                                        </ul>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Session 4: Enabling your own counselling setup (Video based)</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <ul class="text-left">
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Service Definitions</li>
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Approach for Pricing & Marketing your services</li>
                                        </ul>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Session 5: Branding and Marketing</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <ul class="text-left">
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Practical Aspects of Counseling</li>
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Branding & Social Media Marketing</li>
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Setting up your Digital Presence</li>
                                        </ul>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>Session 6: Demo Counseling Session</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <ul class="text-left">
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Demo Counseling Session</li>
                                        </ul>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion last-chiled">
                                    <div class="accrodion-title">
                                        <h4>Session 7: Ice breaking session with Parents & Students</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <ul class="text-left">
                                            <li class="services-two__text" style="color:#000;margin-bottom: 10px;font-size: 17px;">Ice breaking session with Parents & Students</li>
                                        </ul>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="text-center" style="margin-top:20px">
                            <div class="about-one__btn-box">
                                <a href="<?php echo URLROOT; ?>/home/counsellor_register_view" class="thm-btn-orange about-one__btn">Buy Now</a>
                            </div>
                        </div>
            </div>
        </section>
        <!-- <Section class="counter-one" style="padding-left: 2%;padding-right: 2%;" style="margin-top:50px;margin-bottom:50px;">
                <div class="row" style="margin-top:40px">
                    <div class="col-lg-2">
                        
                    </div>
                    <div class="col-lg-4">
                        <h4 class="card-title_main_2">Download our free ebook</h4>
                    </div>
                    <div class="col-lg-4">
                    <div class="text-center" style="padding-bottom: 20px;">
                            <div class="about-one__btn-box">
                                <a href="#" class="thm-btn-orange about-one__btn">Download Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-4 text-center">
                    <img class="eBookCoverPage" src="<?php echo URLROOT; ?>/assets/images/photos/1.jpg" width="200px" alt="dfa">
                    
                    </div>
                </div>
        </section> -->
        <section style="margin-top:50px;margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="margin-top:50px;margin-bottom:50px;">
                        <h5 class="about-two__counter-text-1" >SALIENT FEATURES</h5>
                        <h2 class="section-title__title">WHY IS ACCP PROGRAM CONSIDERED THE INDUSTRY BEST</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                    <div class="bg-white shadow-lg" style="padding:40px 25px 33px;">
                                <div class="services-icon">
                                <!-- <span class="icon-drive"></span> -->
                                <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/mostCompact.png" alt="dfa" style="height: 80px; width:80px;">
                                </div>
                                    <h3 class="services-two__title"><a href="#">Most Compact</a></h3>
                                    <p class="">The program is designed to make you ready as a career counselor in less than 2 weeks. It covers just the right set of information needed to start your career counselor journey and then keep learning with OodlesIN’s continuous learning programs.</p>
                                    
                                </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="bg-white shadow-lg" style="padding:40px 25px 33px;">
                                <div class="services-icon">
                                <!-- <span class="icon-drive"></span> -->
                                <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/valueForMoney.png" alt="dfa" style="height: 80px; width:80px;">
                                </div>
                                    <h3 class="services-two__title"><a href="#">Value for Money</a></h3>
                                    <p class="">OodlesIN’s Advance Career Counselor Certification Program is priced around 10 times lower than the price of an exactly similar course from our competitors. This program gives you an unparallel opportunity to start your career counselor career at very low investment.</p>
                                    
                                </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="bg-white shadow-lg" style="padding:40px 25px 33px;">
                                <div class="services-icon">
                                <!-- <span class="icon-drive"></span> -->
                                <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/completelyPractical.png" alt="dfa" style="height: 80px; width:80px;">
                                </div>
                                    <h3 class="services-two__title"><a href="#">Completely Practical</a></h3>
                                    <p class="">This is a very practical program which apart from counselor certification course covers aspects such as digital marketing, branding, strategies to multiply your students, social media marketing and help with real content material for campaigns & webinars.</p>
                                    
                                </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="bg-white shadow-lg" style="padding:40px 25px 33px;">
                                <div class="services-icon">
                                <!-- <span class="icon-drive"></span> -->
                                <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/leadSupport.png" alt="dfa" style="height: 80px; width:80px;">
                                </div>
                                    <h3 class="services-two__title"><a href="#">Lead Support</a></h3>
                                    <p class="">OodlesIN also provides you practical help by listing your profile on Find Expert Counselors page on OodlesIN’s website. Lacs of students and professionals have visited OodlesIN’s website in last few months and your counselor profile will be made visible to them.</p>
                                    
                                </div>
                    </div>
                </div>
            </div>

        </section>
        <section style="margin-top:50px;margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center mb-5" style="margin-top:50px;margin-bottom:50px;">
                        <h5 class="about-two__counter-text-1" >CERTIFICATION</h5>
                        <h2 class="section-title__title">ALL OUR PARTICIPANTS WILL GET THIS CERTIFICATE</h2>
                    </div>
                    
                </div>
                <div style="padding-left: 10%;padding-right: 10%;">
                    <img class="image-fluid" src="<?php echo URLROOT; ?>/assets/images/photos/1.jpg" alt="" style="display: block;margin-left: auto;margin-right: auto;max-width:100%">
                    <!-- <img class="image-fluid" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/certificate_sample.png" alt="" style="display: block;margin-left: auto;margin-right: auto;max-width:100%"> -->
                </div>
            </div>
        </section>

        <section style="margin-top:50px;margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="margin-top:50px;margin-bottom:50px;">
                        <h5 class="about-two__counter-text-1" >HOW CAN THIS PROGRAM</h5>
                        <h2 class="section-title__title">HOW CAN THIS PROGRAM HELP SCALE YOUR CAREER</h2>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-6">
                                <div class="bg-white shadow-lg" style="padding:40px 25px 33px;min-height: 280px;">
                                <div class="services-icon">
                                <!-- <span class="icon-drive"></span> -->
                                <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/psychologist.png" alt="dfa" style="height: 80px; width:80px;">
                                </div>
                                    <h3 class="services-two__title"><a href="#">Psychologists & Counselling Psychologists</a></h3>
                                   
                                    
                                </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="bg-white shadow-lg" style="padding:40px 25px 33px;min-height: 280px;">
                                <div class="services-icon">
                                <!-- <span class="icon-drive"></span> -->
                                <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/teacher.png" alt="dfa" style="height: 80px; width:80px;">
                                </div>
                                    <h3 class="services-two__title"><a href="#">Teachers, Trainers & Educationalist</a></h3>
                                   
                                    
                                </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="bg-white shadow-lg" style="padding:40px 25px 33px;min-height: 280px;">
                                <div class="services-icon">
                                <!-- <span class="icon-drive"></span> -->
                                <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/HR.png" alt="dfa" style="height: 80px; width:80px;">
                                </div>
                                    <h3 class="services-two__title"><a href="#">HR & Highly skilled Professionals</a></h3>
                                   
                                    
                                </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="bg-white shadow-lg" style="padding:40px 25px 33px;min-height: 280px;">
                                <div class="services-icon">
                                <!-- <span class="icon-drive"></span> -->
                                <img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/employee.png" alt="dfa" style="height: 80px; width:80px;">
                                </div>
                                    <h3 class="services-two__title"><a href="#">Corporate Employees & Educational Consultants</a></h3>
                                   
                                    
                                </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-blue shadow-lg" style="min-height: 590px;">
                            <ul class="text-left">
                                <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Professional Certification in Career Counselling</li>
                                <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Learn and Start Your Own Career Counselling Practice using State of the Art AI Powered Counseling Platform</li>
                                <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Implement Career Counselling in Schools, Colleges & other Educational Institutes</li>
                                <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Establish Your Brand, Improve Your online Visibility and Multiply Your Earnings</li>
                                <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">Practical and Handholding Support to Set You as a Successful Career Counselor</li>
                                <li class="services-two__text" style="color:#ffff;margin-bottom: 10px;font-size: 17px;">As per a survey by MHRD & EY, The market size for career assessment and guidance is currently estimated at over Rs 5,000 crore* in India and continuously growing.</li>
                            </ul>
                            <div class="about-one__btn-box" style="margin-top:15px">
                                <a href="<?php echo URLROOT; ?>/home/counsellor_register_view" class=" about-one__btn thm-btn-blue">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section style="margin-top:50px;margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="margin-top:50px;margin-bottom:50px;">
                        <h5 class="about-two__counter-text-1" >INDIA’S TOP CAREER COUNSELORS</h5>
                        <h2 class="section-title__title">TRAINED AND POWERED BY OodlesIN's AI PLATFORM</h2>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <img class="fullDataSectionImages" src="<?php echo URLROOT; ?>/assets/img/user/user1.jpg" alt="dfa">
                    <img class="fullDataSectionImages" src="<?php echo URLROOT; ?>/assets/img/user/user2.jpg" alt="dfa">
                    <img class="fullDataSectionImages" src="<?php echo URLROOT; ?>/assets/img/user/user3.jpg" alt="dfa">
                    <img class="fullDataSectionImages" src="<?php echo URLROOT; ?>/assets/img/user/user4.jpg" alt="dfa">
                    <img class="fullDataSectionImages" src="<?php echo URLROOT; ?>/assets/img/user/user5.jpg" alt="dfa">
                    <img class="fullDataSectionImages" src="<?php echo URLROOT; ?>/assets/img/user/user6.jpg" alt="dfa">
                    <img class="fullDataSectionImages" src="<?php echo URLROOT; ?>/assets/img/user/user7.jpg" alt="dfa">
                    <img class="fullDataSectionImages" src="<?php echo URLROOT; ?>/assets/img/user/user8.jpg" alt="dfa">
                    <img class="fullDataSectionImages" src="<?php echo URLROOT; ?>/assets/img/user/user9.jpg" alt="dfa">
                    <img class="fullDataSectionImages" src="<?php echo URLROOT; ?>/assets/img/user/user10.jpg" alt="dfa">


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3" style="min-height: 100px;">
                        <div class="iconBox">
                        <img class="testImage" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/testmonial1.png" alt="dfa">
                        <span class="testmText">Future Edu</span>
                        </div>
                    </div>
                    <div class="col-lg-3" style="min-height: 100px;">
                        <div class="iconBox">
                        <img class="testImage" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/testmonial2.png" alt="dfa">
                        <span class="testmText">Shivami</span>
                        </div>
                    </div>
                    <div class="col-lg-3" style="min-height: 100px;">
                        <div class="iconBox">
                        <img class="testImage" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/testmonial3.png" alt="dfa">
                        <span class="testmText">Career Guru</span>
                        </div>
                    </div>
                    <div class="col-lg-3" style="min-height: 100px;">
                        <div class="iconBox">
                        <img class="testImage" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/testmonial4.png" alt="dfa">
                        <span class="testmText">Spoken Pro</span>
                        </div>
                    </div>
                </div>
            </div>

        </section> -->
        
                <!--Testimonial One Start-->
        <section class="testimonial-one" style="margin-top:50px;margin-bottom:50px;">
            <div class="testimonial-one-shape-2 float-bob-y">
                <img src="assets/images/shapes/testimonial-one-shape-2.png" alt="">
            </div>
            <div class="testimonial-one-shape-3 float-bob-y">
                <img src="assets/images/shapes/testimonial-one-shape-3.png" alt="">
            </div>
            <div class="container">
            <div class="row">
                    <div class="col-lg-12 text-center" style="margin-bottom:50px;">
                        <h5 class="about-two__counter-text-1" >INDIA'S LEADING COUNSELORS SPEAK</h5>
                        <h2 class="section-title__title">COUNSELOR TESTIMONIALS ON OodlesIN PLATFORM</h2>
                    </div>
                </div>
                <div class="testimonial-one__bottom">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="owl-carousel owl-theme thm-owl__carousel testimonial-one__carousel" data-owl-options='{
                                "loop": true,
                                "autoplay": true,
                                "margin": 30,
                                "nav": false,
                                "dots": false,
                                "smartSpeed": 500,
                                "autoplayTimeout": 10000,
                                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                                "responsive": {
                                    "0": {
                                        "items": 1
                                    },
                                    "768": {
                                        "items": 2
                                    },
                                    "992": {
                                        "items": 2
                                    },
                                    "1200": {
                                        "items": 2
                                    }
                                }
                            }'>
                                <div class="item">
                                    <div class="testimonial-one__single">
                                        <div class="testimonial-one__single-inner">
                                            <div class="testimonial-one__shape-1">
                                                <img src="assets/images/shapes/testimonial-one-shape-1.png" alt="">
                                            </div>
                                            <div class="testimonial-one__client-info">
                                                <div class="testimonial-one__client-img-box">
                                                    <img src="<?php echo URLROOT; ?>/assets/img/user/user1.jpg" alt="">
                                                    <div class="testimonial-one__quote">
                                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="testimonial-one__client-content">
                                                    <div class="testimonial-one__client-review">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="testimonial-one__client-details">
                                                        <h3 class="testimonial-one__client-name">Smith Vectoria</h3>
                                                        <p class="testimonial-one__client-sub-title">Counselor, Bangalore</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="testimonial-one__text"> OodlesIN is one of the Best Platform for anyone looking to be a Career Counsellor.The best thing about OodlesIN is that everyone is very friendly & helpful right from the Director to their staff they are always ready to go for an extra mile to help you. I will recommend to anyone who is thinking to be a Career Counsellor to go with OodlesIN because it one of the most affordable in the market and the best. All My Best Wishes To OodlesIN.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-one__single">
                                        <div class="testimonial-one__single-inner">
                                            <div class="testimonial-one__shape-1">
                                                <img src="assets/images/shapes/testimonial-one-shape-1.png" alt="">
                                            </div>
                                            <div class="testimonial-one__client-info">
                                                <div class="testimonial-one__client-img-box">
                                                    <img src="<?php echo URLROOT; ?>/assets/img/user/user4.jpg" alt="">
                                                    <div class="testimonial-one__quote">
                                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="testimonial-one__client-content">
                                                    <div class="testimonial-one__client-review">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="testimonial-one__client-details">
                                                        <h3 class="testimonial-one__client-name">Christine Eve</h3>
                                                        <p class="testimonial-one__client-sub-title">Counselor, Mumbai</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="testimonial-one__text"> OodlesIN has given me an exclusive methodology to understand and counsel each student differently. The skill mapping and career recommendations algorithms prove out to be great enablers along with my personalized counselling frameworks. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-one__single">
                                        <div class="testimonial-one__single-inner">
                                            <div class="testimonial-one__shape-1">
                                                <img src="assets/images/shapes/testimonial-one-shape-1.png" alt="">
                                            </div>
                                            <div class="testimonial-one__client-info">
                                                <div class="testimonial-one__client-img-box">
                                                    <img src="<?php echo URLROOT; ?>/assets/img/user/user3.jpg" alt="">
                                                    <div class="testimonial-one__quote">
                                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="testimonial-one__client-content">
                                                    <div class="testimonial-one__client-review">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="testimonial-one__client-details">
                                                        <h3 class="testimonial-one__client-name">Hallen Smith</h3>
                                                        <p class="testimonial-one__client-sub-title">Counselor, kolkata</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="testimonial-one__text"> Very well explained Reports.Each and every part is explained in detail and easy to understand.Very supportive we get answers immediately. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-one__single">
                                        <div class="testimonial-one__single-inner">
                                            <div class="testimonial-one__shape-1">
                                                <img src="assets/images/shapes/testimonial-one-shape-1.png" alt="">
                                            </div>
                                            <div class="testimonial-one__client-info">
                                                <div class="testimonial-one__client-img-box">
                                                    <img src="<?php echo URLROOT; ?>/assets/img/user/user5.jpg" alt="">
                                                    <div class="testimonial-one__quote">
                                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="testimonial-one__client-content">
                                                    <div class="testimonial-one__client-review">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="testimonial-one__client-details">
                                                        <h3 class="testimonial-one__client-name">Kevin Martin</h3>
                                                        <p class="testimonial-one__client-sub-title">Counselor, London</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="testimonial-one__text"> It’s really a great learning and proud moment to be with such amazing people in OodlesIN around this certification program!!!!!!thank you for such enlightening and power packed sessions. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonial One End-->
        <section style="margin-top:50px;margin-bottom:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center" style="margin-bottom:50px;">
                        <h5 class="about-two__counter-text-1" >FREQUENTLY ASKED QUESTIONS</h5>
                        <h2 class="section-title__title">COMMON QUESTIONS AROUND THE PROGRAM</h2>
                    </div>
                    
                </div>
                <div class="work-together__right">
                            <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4><span>?</span>Is it a video based or a live online program ?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <p>This certification course is a self-paced video based program with the option to ask questions and seek answers from experts using 'Ask your teacher' feature which is built in the platform</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4> <span>?</span>After registration, how do I access the certification course ?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <p>You will get access to the certification course and the career counseling platform, as soon as you register for the course. You will immediately receive email with your course and platform access details on registration.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4><span>?</span>What is the total duration of the program ?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <p>On an average, counselors complete this program in 2 weeks.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4><span>?</span>What is covered under branded and marketing as part of the course?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <p>The topics around marketing and branding primarily covers the digital setup, branding, social media marketing and information on how to package and price your services.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4><span>?</span>Since the certification course is primarily video based, how can I clarify any doubts that I get during the course ?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <p>There is a query option given with each lecture in the webinar. You can use this option to directly send your questions to our support team and you will receive the response within a few hours.</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4><span>?</span>How does OodlesIN Support us with marketing and leads for counseling ?</h4>
                                    </div>
                                    <div class="accrodion-content">
                                        <div class="inner">
                                        <p>This certification course is a self-paced video based program with the option to ask questions and seek answers from experts using 'Ask your teacher' feature which is built in the platform</p>
                                        </div><!-- /.inner -->
                                    </div>
                                </div>
                                
                            </div>
                        </div>
            </div>

        </section>

<?php require APPROOT . "/views/inc_home/footer.php"; ?>
<script>
$(document).ready(function() {
  // Attach a click event handler to the anchor link
  $("#openModalLink").on("click", function(event) {
    // Prevent the default link behavior (avoid page reload)
    event.preventDefault();

    // Manually remove the previous modal backdrop
    $(".modal-backdrop").remove();

    // Manually trigger the modal to open
    $("#exampleModal").modal("show");
  });

  // Handle the modal hide event
  $("#exampleModal").on("hidden.bs.modal", function() {
    // Remove the modal backdrop manually
    $(".modal-backdrop").remove();
  });
});
</script>




