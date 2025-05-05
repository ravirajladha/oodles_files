<?php require APPROOT . "/views/inc_home/header.php"; ?>
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
  

    .process .container {
        width: 100vw;
        max-width: 100%;
        margin-left: -50px;
       
    }
    .process__icon-box {
        display: flex;
        align-items: center;
        justify-content: start;
    }
    .process__icon {
        float: left;
    }

    .reviewbackground {
  background-image: url(https://media.istockphoto.com/id/1432473911/photo/abstract-blue-background-or-dark-paper-with-bright-center-spotlight-and-black-vignette-border.webp?b=1&s=170667a&w=0&k=20&c=50mGotB0tHvtn2qBU04aSKljqEsrV4Vglwr6FhIf7Ks=);
  margin-left: -300px;
  height: 800px;
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
  
.process__title{
    margin-left:30px;
    margin-right:-30px;
}

.process__text{
    margin-left:30px;
    margin-right:-30px;
}
 </style>   
<!--Page Header Start-->
<section class="page-header" style="background-color: white; margin-top:0;">
    <div class="page-header-bg" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpTWNpF5ubGbNsKAKnFGjYAS4aELKezphYMA&usqp=CAU)">
    </div>
    <div class="page-header-shape-1"><img src="assets/images/shapes/page-header-shape-1.png" alt=""></div>
    <div class="container">
        <div class="page-header__inner">
        <!-- <h2>Teach Online from the Comfort of
                    <br>Your Home - Best Online
                    <br>Teaching Platform
                    </h2>
                    <p>aunch Your Own Teaching and Training Courses Online</p> -->
            <div class="row">
                <div class="col-md-6" style="margin-top:60px">
                    <h1 style="color: black; margin-bottom: 20px; font-weight: bold;font-size: 40px;">Teach Online from the Comfort of Your Home - Best Online Teaching Platform
                    </h1>
                    <h4 style="color: black; margin-top: 20px; font-size: 20px;">Launch Your Own Teaching and Training Courses Online
                    </h4>

                    <div class="row" style="margin-top: 35vh; margin-left:50px">
                      <div class="col-md-4">
                        <p style="font-weight: bold; font-size:20px;margin-bottom:10px">4.8/5.0+</p>
                        <p>Average customer ratings on our platform</p>
                      </div>
                      <div class="col-md-4">
                        <p  style="font-weight: bold; font-size:20px;margin-bottom:10px">1000+</p>
                        <p >Courses from
                          different categories</p>
                      </div>
                      <div class="col-md-4">
                        <p  style="font-weight: bold; font-size:20px;margin-bottom:10px">100+</p>
                        <p >OodlesIn verified
                           teachers on our platform</p>
                      </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top:60px">
                    <!-- Form inside the card -->
                    <div class="form-container card" style="background-color: white;">
                        <form>
                <p style="font-size: 20px;margin-left:20px;margin-bottom:20px;font-weight:bold">
                    <span style="margin-left:25px">Teach on India's most advanced <span>
                    <span style="margin-left: 90px;">learning platform</span>
                </p>

                <div class="form-field">
                    <div id="firstName" class="form-input" contenteditable="true" placeholder="First Name" require></div>
                </div>

                <div class="form-field">
                    <div id="lastName" class="form-input" contenteditable="true" placeholder="Last Name"></div>
                </div>

                <div class="form-field">
                    <div id="email" class="form-input" contenteditable="true" placeholder="Email Address"></div>
                </div>

                <div class="form-field">
    <div class="form-input">
        <select id="country" style="border:none;width:350px" contenteditable="true" >
            <option value="" style="margin-right:10px">Select your country</option>
            <option value="usa">India</option>
            <option value="canada">Canada</option>
            <option value="uk">United Kingdom</option>
            <option value="uk">USA</option>
            <!-- Add more options for other countries as needed -->
        </select>
    </div>
</div>


                <div class="form-field">
                    <div id="phone" class="form-input" contenteditable="true" placeholder="Phone Number"></div>
                </div>
                <div class="form-field">
                    <div id="phone" class="form-input" contenteditable="true" placeholder="Password"></div>
                </div>
                <div class="form-field">
                    <div id="phone" class="form-input" contenteditable="true" placeholder="Postal Code"></div>
                </div>

                <div class="form-field accept-terms">
                  <div class="row">
                  <div class="col-md-1">
                    <input type="checkbox" id="termsCheckbox" required>
                    </div>
                    <div class="col-md-11">
                    <label for="termsCheckbox" style="width: 100%; font-size:13px;color:grey">I accept the terms and conditions and privacy policy of OodlesIn</label>
                    </div>
                </div>
                </div>

                <input type="submit" style="margin-left: 140px;border-radius:20px;width:100px;border:none;background-color:blue;color:white" value="Validate">
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
         <!--Services One Start-->
<section style="margin-bottom: 1000px; margin-left:250px; margin-bottom:-100px">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-sub-title-box">
               
              
                
            </div>
            <h2 class="section-title__title" style=" margin-right:300px">How Oodles Works</h2>
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
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="process__single">
                        <div class="process__icon-box">
                            <div class="process__icon">
                                <span class="icon-select"></span>
                            </div>
                         
                        </div>
                        <div class="process__content">
                            <h3 class="process__title" style="margin-right:18px;">Get verified requests from students</h3>
                            <p class="process__text"style="margin-right:18px;">Students opts for the leave online or video based courses offered by you</p>
                        </div>
                    </div>
                </div>
                <!--Process Single End-->
                <!--Process Single Start-->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="process__single">
                        <div class="process__icon-box">
                            <div class="process__icon">
                                <span class="icon-select"></span>
                            </div>
                          
                        </div>
                        <div class="process__content">
                            <h3 class="process__title"style="margin-right:18px;">Use oodles platform to deliver learning</h3>
                            <p class="process__text"style="margin-right:18px;">Use oodles platform to deliver online personalized eductation</p>
                        </div>
                    </div>
                </div>
                <!--Process Single End-->
                <!--Process Single Start-->

                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="process__single">
                        <div class="process__icon-box">
                            <div class="process__icon">
                                <span class="icon-select"></span>
                            </div>
                           
                        </div>
                        <div class="process__content">
                            <h3 class="process__title">Get verified requests from students</h3>
                            <p class="process__text">Choose the scholarship that you’re eligible for and the one that suits your profile.</p>
                        </div>
                    </div>
                </div>
                <!--Process Single End-->
                <!--Process Single Start-->
                
                <!--Process Single End-->
            </div>
        </div>

    </div>


    <section class="backgroundsection" style="margin-top:40px">
    <div class="container">
        <div class="row" style="margin-left: 600px;">
            <div class="col">
                <!-- <div class="card"> -->
                <div class="card-body" style="width:1300px;margin-top:40px;margin-bottom:40px;border-radius:20px">
                    <div class="row">
                        <!--Services Two Single Start-->
                        <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="card" style="border-radius:10px">
                                <div class="card-body">
                                    <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum
                                        incidunt consequuntur ab voluptates fugit expedita quasi impedit, aspernatur cumque
                                        id blanditiis excepturi . 
                                       </p>
                                       <hr style="border-top: 1px solid #ccc; margin-top: 10px;">

                                       <div class="row">
                                        <div class="col-md-5">
                                            <p style="font-weight: bold;">Zubin Mehta</p>
                                            <p >Digital Teacher</p>
                                        </div>
                                       </div>

                                        </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
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
        <h1 style="margin-left: 120px; font-weight:bold;color:black;margin-top:60px">Why To Become A Oodles Partner</h1>
        <div class="row">
      
        <div class="col-md-3">
            <img src="data:image/png;base64,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" alt="image1" style="margin-left:40px; height:180px;width:250px">
        </div>
        <div class="col-md-6" style="margin-top:40px;">
         <p  style="margin-top:10px;font-size:25px;font-weight:bold">Fulfill your passion for teaching</p>
         <p style="margin-top:10px;font-size:18px;">Make a difference to lives of millions of students by helping them maximize their potential</p>
        </div>

    </div>

  
   
  <div class="row">
      
      <div class="col-md-3">
          <img src="data:image/png;base64,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" alt="image1" style="margin-left:40px; height:180px;width:250px">
      </div>
      <div class="col-md-6" style="margin-top:40px;">
       <p  style="margin-top:10px;font-size:25px;font-weight:bold">Earn Well sence of fullfillment</p>
       <p style="margin-top:10px;font-size:18px;">High earning potential with consitency and control pure joy of sharing knowledge</p>
      </div>

  </div>

     
  <div class="row">
      
      <div class="col-md-3">
          <img src="data:image/png;base64,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" alt="image1" style="margin-left:40px; height:180px;width:250px">
      </div>
      <div class="col-md-6" style="margin-top:40px;">
       <p  style="margin-top:10px;font-size:25px;font-weight:bold">Deliver from your Home/Office</p>
       <p style="margin-top:10px;font-size:18px;">Use our state of the art online collabaration platform to deliver learning in real time</p>
      </div>

  </div>

  

</div>
</section>
<section class="process">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="section-title__title" style="margin-right: 120px; margin-bottom: 20px;">The Process</h2>
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
      <p class="para">OodlesIn has given me an exclusive methodology to understand and counsel each student differently. The brain mapping and career recommendations algorithms prove out to be great enablers along with my personalized counselling frameworks.</p>
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
                            <p class="para">OodlesIn is pioneer in the field of holistic leaning and one of the most innovative learning platform in the world. OodlesIn does a 360⁰ assessment of the students to know the exact strengths and weaknesses and recommend tailor made learning packages for the learner.</p>
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
                            <p class="para">OodlesIn's teaching methodologies are unique and state of the art. The personalized knowledge graph not only understands where the basic concepts are lacking, but also recommends the right set of courses to exactly fill in the knowledge gaps.</p>
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
</div>

</section>








    
</section>













<!-- Your HTML code remains unchanged -->

<!-- Add this JavaScript code at the end of your HTML body -->
<!-- Your HTML code remains unchanged -->

<!-- Add this JavaScript code at the end of your HTML body -->
<!-- Your HTML code remains unchanged -->

<!-- Add this JavaScript code at the end of your HTML body -->
<script>
   const container = document.querySelector('.review-container');
const cards = document.querySelectorAll('.review-card');
const prevArrow = document.querySelector('.prev-arrow');
const nextArrow = document.querySelector('.next-arrow');
const numCards = 3; // Total number of cards
let currentCard = 0;
let isAnimating = false;

prevArrow.addEventListener('click', () => {
  if (!isAnimating) {
    currentCard = Math.max(currentCard - 1, 0);
    updateCards();
  }
});

nextArrow.addEventListener('click', () => {
  if (!isAnimating) {
    currentCard = Math.min(currentCard + 1, numCards - 1);
    updateCards();
  }
});

function updateCards() {
  cards.forEach((card, index) => {
    if (index === currentCard) {
      card.classList.add('active');
    } else {
      card.classList.remove('active');
    }
  });
}


</script>





 


<?php require APPROOT . "/views/inc_home/footer.php"; ?>
