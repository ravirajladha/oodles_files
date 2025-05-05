<?php require APPROOT . "/views/inc_home/header.php"; ?>
<style>
       .bg-white {
  position: relative;
  display: block;
  background-color: #dee1d6;
  border-radius: var(--insur-bdr-radius);
  text-align: center;
  padding: 8px;
  border-bottom: 3px solid transparent;
  margin-bottom: 30px;
  -webkit-transition: all 500ms ease;
  transition: all 500ms ease;
}
    .bg-blue {
  background-color:  var(--insur-base);
  /* border-radius: var(--insur-bdr-radius); */
  text-align: center;
  padding: 20px;
  border-bottom: 3px solid transparent;
  margin-bottom: 30px;
  -webkit-transition: all 500ms ease;
  transition: all 500ms ease;
  margin: 20px 0 20px 0;
}
.card-title_main {
    color: #ffff;
    font-size: 30px;
    line-height: 50px;
    font-weight: 500;
    letter-spacing: 1px;
    margin-bottom: 1%;
}
.services-two__title {
    margin-top: 5px;
    margin-bottom: 5px;
}
/* .radio-buttons {
  display: flex;
  justify-content: space-between;
} */

.radio-button {
    padding: 10px 20px;
    border: 1px solid #a1a4b0;
    border-radius: 28px;
    background-color: transparent;
    cursor: pointer;
}

.radio-button.active {
  background-color: var(--insur-base);
  color: #fff;
}

/* Hide radio inputs */
input[type="radio"] {
  display: none;
}
.green {
    background-color: #0ce51a;
    width: 1px;
    border: 1px solid #0ce51a;
    padding: 4px 0 4px 13px;
    border-radius: 37px;
    font-size: 3px;
    position: relative;
    bottom: 3px;
    margin-right: 7px;
}
.red {
    background-color: #e50c0c;
    width: 1px;
    border: 1px solid #e50c0c;
    padding: 4px 0 4px 13px;
    border-radius: 37px;
    font-size: 3px;
    position: relative;
    bottom: 3px;
    margin-right: 7px;
}
/* .yellow {
    background-color: #ffc200;
    width: 20px;
    border: 1px solid #ffc200;
    height: 20px;
    padding: 0px 0 0 20px;
    border-radius: 16px;
} */
.yellow {
    background-color: #ffc200;
    width: 1px;
    border: 1px solid #ffc200;
    padding: 4px 0 4px 13px;
    border-radius: 37px;
    font-size: 3px;
    position: relative;
    bottom: 3px;
    margin-right: 7px;
}
.gray {
    background-color: gray;
    width: 1px;
    border: 1px solid gray;
    padding: 4px 0 4px 13px;
    border-radius: 37px;
    font-size: 3px;
    position: relative;
    bottom: 3px;
    margin-right: 7px;
}
@media (max-width: 768px) {
 .thm-btn-orange, .thm-btn{
    padding: 5px 14px 5px;
    font-size: 13px;
 }
  
}

</style>


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-blue shadow-lg text-left">
                            
                    <h2 class="card-title_main">Help us with a few details</h2>
                    
                </div>
            </div>
        </div>
        <form action="<?php echo URLROOT; ?>/home/payment_details2" method="post">

        <div class="row">
            <div class="col-lg-4">
                <div class="bg-white shadow-lg" style="min-height:250px;">
                    <div class="card-header text-left" style="background-color: #ffff;">
                    <h3 class="services-two__title"><a href="#">Course Details</a></h3>
                    </div>
                    <div class="bg-white shadow-sm" style="margin:15px 15px;">
                        <img class="" width="100%"  src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/course_image.jpg" alt="dfa">
                        <p class="" style="font-size: 15px;">Career Guidance Report with 1 Counseling</p>
                        <div class="d-flex justify-content-between" style="margin:10px;">
                            <div class="testimonial-one__client-review" >
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                <p class="" style="font-size: 15px;margin-left:4px;">5</p>

                                                    </div>
                        <p class="" style="font-size: 15px;color:var(--insur-base);">&#x20B9;2,495</p>
                        </div>
                           
                    </div>
                </div>
                <div class="bg-white shadow-lg" style="min-height:250px;">
                    <div class="card-header text-left" style="background-color: #ffff;">
                    <h3 class="services-two__title"><a href="#">Teacher Details</a></h3>
                    </div>
                    <div class="bg-white shadow-sm" style="margin:15px 15px;">
                        <img class="" width="100%"  src="<?php echo URLROOT; ?>/assets_home/images/resources/logo-1.png" alt="dfa">
                        <p class="" style="font-size: 15px;">OodlesIn</p>
                        <div class="d-flex justify-content-between" style="margin:10px;">
                            <div class="testimonial-one__client-review" >
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                <p class="" style="font-size: 15px;margin-left:4px;">5</p>

                                                    </div>
                        <p class="" style="font-size: 15px;color:var(--insur-base);">105 Courses</p>
                        </div>
                           
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="bg-white shadow-lg" style="min-height:250px;">
                    <div class="card-header text-left" style="background-color: #ffff;">
                        <h3 class="services-two__title"><a href="#">Additional Information</a></h3>
                        <p class="" style="font-size: 12px;color: #a1a4b0;">Please answer additional questions needed around your course booking</p>
                    </div>
                    <div class="text-left" style="padding: 10px 30px;">
                        <p class="" style="font-size: 12px;">Indicate the Date on which you would like to get started with the counseling</p>
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" style="width:50%;">
											<label style="font-size: 14px;">Tentative Start Date<span>*</span></label>
											<input id="checkbox1" class="form-control mdl-textfield__input" name="start_date" id="start_date" type="date"  required>
										</div>
                    </div>
                    <div class="card-footer text-left" style="background-color: #ffff; padding: 10px 30px;">
                        <p class="" style="font-size: 12px;">Indicate your preferred slot for Counseling (select only one)</p>
                        <div class="row" style="margin-top:10px;">
                        <div class="col-lg-3">
                            <p class="" style="font-size: 12px;"><span class="green"></span> Excellent availability</p>
                        </div>
                        <div class="col-lg-3">
                        <p class="" style="font-size: 12px;"><span class="yellow"></span> Moderate  availability</p>
                        </div>
                        <div class="col-lg-3">
                        <p class="" style="font-size: 12px;"><span class="red"></span> Limited  availability</p>
                        </div>
                        <div class="col-lg-3">
                        <p class="" style="font-size: 12px;"><span class="gray"></span> Not available</p>
                        </div>

                        </div>
                        <div class="radio-buttons" style="margin-top:15px;">
                        <div class="row">
                                <div class="col-lg-4">
                                    <input type="radio" name="time" value="09:00-12:00" id="button1" onclick="changeColor(1)">
                                    <label for="button1" class="radio-button" style="font-size: 12px;">
                                    <span class="green"></span>09:00-12:00</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="radio" name="time" value="12:00-15:00" id="button2" onclick="changeColor(2)">
                                    <label for="button2" class="radio-button" style="font-size: 12px;">
                                    <span class="yellow"></span>12:00-15:00</label>
                                </div>
                                <div class="col-lg-4">
                                    <input type="radio" name="time" value="15:00-18:00" id="button3" onclick="changeColor(3)">
                                    <label for="button3" class="radio-button" style="font-size: 12px;">
                                    <span class="red"></span>15:00-18:00</label>
                                </div>
                            </div>
                            
                        </div>

                        <p class="" style="font-size: 12px;">Note only one hour of teacher’s most available slot will be considered for booking the session.</p>
                        <div class="d-flex justify-content-between" style="margin-top:15px;">
                            <div class="about-one__btn-box">
                                <a href="<?php echo URLROOT; ?>/home/programs" class="thm-btn-orange about-one__btn">Previous</a>
                            </div>
                            <div class="about-one__btn-box">
                                <!-- <a href="<?php echo URLROOT; ?>/home/payment_details2" class="thm-btn about-one__btn">Continue</a> -->
                                <button type="submit" class="thm-btn about-one__btn" style="border:none;">Continue</button>
                            </div>

                        </div>

                </div>
            </div>
        </div>
        </form>

    </div>
</section>




<?php require APPROOT . "/views/inc_home/footer.php"; ?>
<script>
 function changeColor(buttonNum) {
  const buttons = document.querySelectorAll('.radio-button');
  
  buttons.forEach((button, index) => {
    if (index === buttonNum - 1) {
      button.classList.add('active');
    } else {
      button.classList.remove('active');
    }
  });
}

</script>