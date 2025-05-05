<?php require APPROOT . "/views/inc_home/header.php"; ?>

<style>
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
</style>
<style>
   .form-container {
        background-color: white;
        padding: 20px;
        width: 400px;
        margin-bottom: 100px;
        margin-left: 200px;
        position: relative; /* Add relative positioning */
        z-index: 1; /* Set z-index to 1 to position the form above the page-header */
    }

    .form-field {
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
    }

    .form-input {
        border: none;
        border-bottom: 1px solid black;
        padding: 5px;
        font-size: 16px;
        position: relative;
        outline: none; /* Remove the default blue outline on focus */
    }

    .form-input::before {
        content: attr(placeholder);
        position: absolute;
        bottom: 5px;
        left: 0;
        color: #a9a9a9;
    }

    .accept-terms {
        display: flex;
        align-items: center;
        font-size: 13px;
    }

    .accept-terms input[type="checkbox"] {
        margin-right: 10px;
    }
    .page-header-bg {
        background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpTWNpF5ubGbNsKAKnFGjYAS4aELKezphYMA&usqp=CAU);
        height: 85vh; /* Set the height to half of the viewport height */
        background-size: cover; /* Ensure the image covers the container */
        background-repeat: no-repeat;
        background-position: center;
        width: 100%;
    }


    .backgroundsection {
        /* Other existing styles... */
        background-image: url(https://media.istockphoto.com/id/1432473911/photo/abstract-blue-background-or-dark-paper-with-bright-center-spotlight-and-black-vignette-border.webp?b=1&s=170667a&w=0&k=20&c=50mGotB0tHvtn2qBU04aSKljqEsrV4Vglwr6FhIf7Ks=);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        margin-left: -1000px;
    }

    /* Adjust the width of the last section to cover the full viewport width */
    .backgroundsection .container {
        width: 100vw;
        max-width: 100%;
    }
  

 
    /* .process__icon-box {
        display: flex;
        align-items: center;
        justify-content: start;
    }
    .process__icon {
        float: left;
    } */

    .reviewbackground {
  background-image: url(https://media.istockphoto.com/id/1432473911/photo/abstract-blue-background-or-dark-paper-with-bright-center-spotlight-and-black-vignette-border.webp?b=1&s=170667a&w=0&k=20&c=50mGotB0tHvtn2qBU04aSKljqEsrV4Vglwr6FhIf7Ks=);
  /* margin-left: -300px; */
  /* height: 800px; */
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  overflow: hidden;
  position: relative;
}

.review-container {
  display: flex;
  flex-wrap: nowrap;
  transition: transform 0.3s ease-in-out;
  width: 100%;
  height: 100%;
}

.review-card {
  min-width: 300px;
  flex: 0 0 100%;
  margin-right: 20px;
  opacity: 0;
  position: absolute;
  right: 0; /* Set the initial position to the right */
  top: 0;
  transition: opacity 0.3s ease-in-out, right 0.3s ease-in-out; /* Add transition for right position */
 
  border-radius:10px;
  margin-right:-300px;
  margin-left:300px;
}

.review-card.active {
  opacity: 1;
  z-index: 1;
  right: 0; /* Set the active card position to the right */
 
}

.arrow {
  position: absolute;
  top: 40%;
  transform: translateY(-50%);
  font-size: 70px; /* Update the font size to make the arrows larger */
  cursor: pointer;
  margin-right:-300px;
  margin-left:300px;
}
.prev-arrow {
  left: -20px;

  
}

.next-arrow {
  right: -20px;
}
.imagess{
    height:80px;
    width:80px;
    border-radius: 50%;
    border: 4px solid white;
    overflow: hidden;
}
.student-image{
    height:50px;
    width:60px;
    border-radius: 50%;
    border: 4px solid white;
    overflow: hidden;
}
  
/* .process__title{
    margin-left:30px;
    margin-right:-30px;
}

.process__text{
    margin-left:30px;
    margin-right:-30px;
} */
 </style>   
<section class="" style="margin-top:0;">
            
            <a href="<?php echo URLROOT; ?>/home/counsellor_register_view">
            <img class="img-fluid" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/3.png" width="100%" height="100%" alt="">
            </a>
            
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
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <span class="icon-insurance-1"></span>
                                </div>
                                <div class="counter-one__count-box">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="98">00</h3>
                                        <span class="counter-one__plus">%+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Career Report Satisfaction Score</p>
                        </div>
                    </div>
                    <!--Counter One Single End-->
                    <!--Counter One Single Start-->
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <span class="icon-group"></span>
                                </div>
                                <div class="counter-one__count-box">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="2">00</h3>
                                        <span class="counter-one__plus">M+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">AI Powered Career
Rules</p>
                        </div>
                    </div>
                    <!--Counter One Single End-->
                    <!--Counter One Single Start-->
                    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="counter-one__single">
                            <div class="counter-one__top">
                                <div class="counter-one__icon">
                                    <span class="icon-life-insurance"></span>
                                </div>
                                <div class="counter-one__count-box">
                                    <div class="counter-one__count-box-inner">
                                        <h3 class="odometer" data-count="10">00</h3>
                                        <span class="counter-one__plus">K+</span>
                                    </div>
                                </div>
                            </div>
                            <p class="counter-one__text">Unique Personas
Analysis</p>
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
<section>
    <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center"style="margin-top:50px;margin-bottom:50px;">
                        <h2 class="section-title__title">OodlesIN Career Guidance Test</h2>
                    </div>
                    
                    
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <img class="img-fluid" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/desktop_AI_powered.png" width="100%" height="100%" alt="">

                    </div>
                    <div class="col-lg-6">
                    <h2 class="" style="margin-bottom: 20px; line-height:50px;">AI Powered Scholarship Platform to Shortlist The Right Candidate</h2>
                    <ul class="text-left">
                            <li class="services-two__text" style="color:#000;margin-bottom: 20px;font-size: 22px; line-height:30px;">Customized Form Generations</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 20px;font-size: 22px;line-height:30px;">Automated Filtering Rules</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 20px;font-size: 22px;line-height:30px;">AI Based Assessment Test</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 20px;font-size: 22px;line-height:30px;">Proctored Candidate Testing</li>
                            <li class="services-two__text" style="color:#000;margin-bottom: 20px;font-size: 22px;line-height:30px;">Real Time Notification</li>
                            
                        </ul>
                    </div>
                </div>
            
    </div>
</section>
        <section class="process">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="section-title__title" style="margin-bottom: 20px;">Approach to finding your perfect career</h2>
        </div>
        <div class="process__inner">
            <div class="process-shape-1">
                <img src="<?php echo URLROOT ?>assets_home/images/shapes/process-shape-1.png" alt="">
            </div>
            <div class="process-shape-2">
                <img src="<?php echo URLROOT ?>assets_home/images/shapes/process-shape-1.png" alt="">
            </div>
            <div class="row">
                <!--Process Single Start-->
                <div class="col-xl-2 col-lg-2 col-md-5 mb-4">
                    <div class="process__single">
                        <div class="process__icon-box d-flex align-items-start"> <!-- Add d-flex and align-items-start classes to align the icon to the left -->
                            <div class="process__icon">
                                <span class="icon-select"></span>
                            </div>
                            <div class="process__count"></div>
                        </div>
                        <div class="process__content">
                            <h3 class="process__title">Apply as a partner</h3>
                            <p class="process__text">Apply by filling in an online application form</p>
                        </div>
                    </div>
                </div>
                <!--Process Single End-->
                <!--Process Single Start-->
                <div class="col-xl-2 col-lg-2 col-md-6 mb-4">
                    <div class="process__single process__single-3">
                        <div class="process__icon-box d-flex align-items-start"> <!-- Add d-flex and align-items-start classes to align the icon to the left -->
                            <div class="process__icon">
                                <span class="icon-agreement"></span>
                            </div>
                            <div class="process__count"></div>
                        </div>
                        <div class="process__content">
                            <h3 class="process__title">Initial Screening</h3>
                            <p class="process__text">Our experts will screen your application</p>
                        </div>
                    </div>
                </div>
                <!--Process Single End-->
                <!--Process Single Start-->
                <div class="col-xl-2 col-lg-2 col-md-6 mb-4">
                    <div class="process__single process__single-2">
                        <div class="process__icon-box d-flex align-items-start"> <!-- Add d-flex and align-items-start classes to align the icon to the left -->
                            <div class="process__icon">
                                <span class="icon-meeting"></span>
                            </div>
                            <div class="process__count"></div>
                        </div>
                        <div class="process__content">
                            <h3 class="process__title">Service demo</h3>
                            <p class="process__text">Pick up a topic of your choice and give us a quick demo if needed</p>
                        </div>
                    </div>
                </div>
                <!--Process Single End-->
                <!--Process Single Start-->
                <div class="col-xl-2 col-lg-2 col-md-6 mb-4">
                    <div class="process__single process__single-3">
                        <div class="process__icon-box d-flex align-items-start"> <!-- Add d-flex and align-items-start classes to align the icon to the left -->
                            <div class="process__icon">
                                <span class="icon-agreement"></span>
                            </div>
                            <div class="process__count"></div>
                        </div>
                        <div class="process__content">
                            <h3 class="process__title">Onboarding Partner</h3>
                            <p class="process__text">Once selected, we will train and onboard you on the platform</p>
                        </div>
                    </div>
                </div>
                <!--Process Single End-->
                <div class="col-xl-2 col-lg-2 col-md-6 mb-4">
                    <div class="process__single">
                        <div class="process__icon-box d-flex align-items-start"> <!-- Add d-flex and align-items-start classes to align the icon to the left -->
                            <div class="process__icon">
                                <span class="icon-select"></span>
                            </div>
                            <div class="process__count"></div>
                        </div>
                        <div class="process__content">
                            <h3 class="process__title">First Session Online</h3>
                            <p class="process__text">Once trained, you will be listed on our platform and you will get your first session on time</p>
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

        
<section class="reviewbackground">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p style="margin-top:180px;margin-right:-200px;margin-left:90px;color:white;font-size:35px;padding:20px;">What do our trusted </p>
                <p style="margin-left:110px;color:white;font-size:35px;margin-right:-200px;">advisors have to say</p>
            </div>
            <div class="col-xl-7 col-lg-4 col-md-8">
                <div class="review-container">
                    <div class="review-card review-card1 wow fadeInUp" data-wow-delay="100ms">
                     <div class="card"  style="margin-top:100px; border-radius:10px;">
                        <div class="card-body">
      <p class="para">OodlesIN has given me an exclusive methodology to understand and counsel each student differently. The brain mapping and career recommendations algorithms prove out to be great enablers along with my personalized counselling frameworks.</p>
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
            <img class="student-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbVPpLP-07urtMgs8oBVI5fQ902bAl4hmH-DBqb7MROZIx4Rdon8S4hH5vEjRoyjzjy48&usqp=CAU">
          </div>
          <div class="col-9">
            <div class="student-details">
              <h4 class="student-name" >John Doe</h4>
              <p class="student-class">physics Teacher</p>
            </div>
          </div>
        </div>
      </div>
    </div>
                        </div>
                    </div>
                    <div class="review-card review-card2 wow fadeInUp" data-wow-delay="200ms">
                    <div class="card"  style="margin-top:100px; border-radius:10px;">
                            <!-- Card content goes here -->
                            <div class="card-body">
                            <p class="para">OodlesIN is pioneer in the field of holistic leaning and one of the most innovative learning platform in the world. OodlesIN does a 360⁰ assessment of the students to know the exact strengths and weaknesses and recommend tailor made learning packages for the learner.</p>
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
            <img class="student-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS31xzI_iJNIfIEaP4JiESGiSUUP-lmsAh20Q&usqp=CAU">
          </div>
          <div class="col-9">
            <div class="student-details">
              <h4 class="student-name" >sanjay</h4>
              <p class="student-class">Chemistry Teacher</p>
            </div>
          </div>
        </div>
      </div>
    </div>
                        </div>
                    </div>
                    <div class="review-card review-card3 wow fadeInUp" data-wow-delay="300ms">
                    <div class="card"  style="margin-top:100px; border-radius:10px;">
                            <!-- Card content goes here -->
                            <div class="card-body">
                            <p class="para">OodlesIN's teaching methodologies are unique and state of the art. The personalized knowledge graph not only understands where the basic concepts are lacking, but also recommends the right set of courses to exactly fill in the knowledge gaps.</p>
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
            <img class="student-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSX7vErBCDFWYSV6gaFlBn_BZJL_DAoMA18_Q&usqp=CAU">
          </div>
          <div class="col-9">
            <div class="student-details">
              <h4 class="student-name" >janardhan</h4>
              <p class="student-class">Yoga Teacher</p>
            </div>
          </div>
        </div>
      </div>
    </div>
                        </div>
                    </div>
                </div>
                <div class="arrow prev-arrow"  style="margin-top:120px">&#8249;</div>
                <div class="arrow next-arrow"  style="margin-top:120px">&#8250;</div>
            </div>
        </div>
    </div>

<div class="row" style="margin-top:300px">
    <div class="col-md-3" class="circle-image">
        <img src="data:image/jpeg;base64,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" alt="" class="imagess" style="margin-left:150px">
    </div>


<div class="col-md-3" class="circle-image">
        <img src="data:image/jpeg;base64,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" alt=""  class="imagess"style="margin-left:300px">
    </div>

<div class="col-md-3" class="circle-image">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSX7vErBCDFWYSV6gaFlBn_BZJL_DAoMA18_Q&usqp=CAU" alt="" class="imagess"style="margin-left:400px">
    </div>

<div class="col-md-3" class="circle-image">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPL57QdxTIBkBRoir433OHFYMDD9Xxs9VOdQ&usqp=CAU" alt="" class="imagess"style="margin-left:400px;margin-top:30px;height:110px;width:110px">
    </div>


<div class="col-md-2" class="circle-image">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS31xzI_iJNIfIEaP4JiESGiSUUP-lmsAh20Q&usqp=CAU" alt="" class="imagess"style="margin-left:500px;margin-top:30px;height:110px;width:110px">
    </div>


<div class="col-md-2" class="circle-image">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbVPpLP-07urtMgs8oBVI5fQ902bAl4hmH-DBqb7MROZIx4Rdon8S4hH5vEjRoyjzjy48&usqp=CAU" alt="" class="imagess"style="margin-left:700px;margin-top:30px">
    </div>
</div>

</section>
<?php require APPROOT . "/views/inc_home/footer.php"; ?>
