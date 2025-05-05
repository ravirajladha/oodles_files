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
.card-para_main{
    color: #ffff;
}
.popular {
    display: inline-block;
    -ms-transform: rotate(-90deg);
    transform: rotate(-90deg);
    position: absolute;
    top: 34px;
    right: -25px;
    padding: 9px 30px 6px;
    background: #00f;
}
.bg-white ul {
    list-style: none;
    padding: 0;
    margin-bottom: 0;
}
.bg-white li {
    text-align: left;
    font-size: 14px;
    background: #fff!important;
    color: #000;
    font-weight: 545;
    padding: 8px 0;
}
.list_text{
    font-weight: 500;
    font-size: 13px;
    text-align: initial;
    color: #4b4646;
    padding: 0!important;
    margin: 0!important;
    text-transform: none;
}
.list_text img {
    border: 0!important;
    width: 10%;
    position: relative;
    top: 2px;
    margin-right: 6px;
    opacity: .6;
}


.tool {
		cursor: help;
		position: relative;
	}

	.tool::before,
	.tool::after {
		position: absolute;
		left: 50%;
		opacity: 0;
		z-index: -100;
	}

	.tool:hover::before,
	.tool:focus::before,
	.tool:hover::after,
	.tool:focus::after {
		opacity: 1;
		z-index: 100;
	}

	.tool::before {
		border-style: solid;
		border-width: 1em .75em 0 .75em;
		border-color: #3e474f transparent transparent transparent;
		bottom: 100%;
		margin-left: -.5em;
		content: " ";
	}

	.tool::after {
		background: #000;
		border-radius: .25em;
		bottom: 180%;
		color: white;
		width: 19em;
		padding: 1em;
		margin-left: -18em;
		content: attr(data-tip);
        white-space: pre-wrap;
	}
    .tool::after {
    font-size: 14px; /* Set the desired font size */
    line-height: 1.5; /* Set the desired line height */
}

.circular-border-animation {
  position: relative;
  display: inline-block;
}

.circular-border-animation svg {
  position: absolute;
  top: 0;
  left: -32px;
  transform: rotate(-90deg); /* Start the border from the top */
  stroke: var(--insur-base); /* Set the border color */
  stroke-width: 5; /* Set the border width */
  stroke-dasharray: 0 282.74333882; /* Set the initial and total stroke-dasharray length */
  transition: stroke-dasharray 2s linear; /* Use CSS transitions for smoother effects */
}

.circular-border-animation span {
  display: inline-block;
  padding: 10px 20px;
  font-size: 18px;
  position: relative;
  z-index: 1; /* Place the text above the circular border */
}


</style>

<Section>
    
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="bg-blue shadow-lg">
                            
                    <h2 class="card-title_main">Choose the program thats suits you</h2>
                    <p class="card-para_main">Quick access. Anytime. Anywhere.</p>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3" >
                <div class="bg-white shadow-lg" style="min-height:300px;">
                        <h3 class="services-two__title"><a href="#">Career Groups
Applicable To You</a></h3>

<div class="circular-border-animation">
  <svg class="circle-border" width="120" height="120">
    <circle cx="60" cy="60" r="45" fill="transparent" />
  </svg>
  <span style="top: 37px;">17</span>
</div>



                </div>
            </div>
            <div class="col-lg-3">
            <div class="bg-white shadow-lg">
                        <h3 class="services-two__title"><a href="#">Your Career Report</a></h3>
                        <p class="" style="font-size: 12px;color: #a1a4b0;">Complete Career Guidance</p>
                        <!-- <span calss="popular">Popular</span> -->
                        <div class="" style="padding-top:38px;padding-bottom:30px;">
                            <p style="color:var(--insur-base);font-size:34px;">&#x20B9;1495</p>
                        </div>
                        <ul>
                            <li>
                                <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing1.png" alt="">Skill Mapping Analysis 
                            
                                <span class="tool" data-tip="Overall brain score.&#10;Scores across 10 brain areas.&#10;Brain area wise comparative performance." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            
                                </h3>
                                
                            </li>
                            <li>
                            <h3 class="list_text"><img  src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing2.png" alt="">Your 360 Degree Profile
                            <span class="tool" data-tip=" 3 dimensional performance across 8 skill groups.&#10;Areas you are good at & areas of improvement." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            
                            </li>
                            <li>
                            <h3 class="list_text"><img  src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing3.png" alt="">Your Skill Profile <span class="tool" data-tip="Covering 14 skill areas.&#10;Top 3 strength & weakness and tips for success." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                            <li>
                            <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing4.png" alt="">Your Persona Report
                            <span class="tool" data-tip="Persona analysis covering 11 dimensions." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                            <li>
                            <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing5.png" alt="">Career Recommendations
                            <span class="tool" data-tip="Top 3 career options for you.&#10;Career score match and Skill matrix." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                            <li>
                            <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing6.png" alt="">Complete college options<span class="tool" data-tip="Top colleges from 5000+ colleges by stream in the career report." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                        </ul>
                            <!-- <a href="#" class="thm-btn-orange about-one__btn">Buy Now</a> -->
                            <div class="about-one__btn-box" style = "margin-top: 15px;margin-bottom: 15px;">
                                <a href="<?php echo URLROOT; ?>/home/payment_details" class="thm-btn about-one__btn" style = "padding: 6px 14px 6px;">Buy Now</a>
                            </div>
                            <a href="#" style="font-size:13px">View Sample Report</a>
                </div>
            </div>
            <div class="col-lg-3">
            <div class="bg-white shadow-lg">
            <h3 class="services-two__title"><a href="#">The Goal</a></h3>
                        <p class="" style="font-size: 12px;color: #a1a4b0;">Complete Career Guidance + <br>
 One Time Counseling</p>
                        <!-- <span calss="popular">Popular</span> -->
                        <div class="" style="padding-top:10px;padding-bottom:30px;">
                            <p style="color:var(--insur-base);font-size:34px;">&#x20B9;2,495</p>
                        </div>
                       <ul>
                            <li>
                                <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing1.png" alt="">Skill Mapping Analysis 
                            
                                <span class="tool" data-tip="Overall brain score.&#10;Scores across 10 brain areas.&#10;Brain area wise comparative performance." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            
                                </h3>
                                
                            </li>
                            <li>
                            <h3 class="list_text"><img  src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing2.png" alt="">Your 360 Degree Profile
                            <span class="tool" data-tip=" 3 dimensional performance across 8 skill groups.&#10;Areas you are good at & areas of improvement." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            
                            </li>
                            <li>
                            <h3 class="list_text"><img  src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing3.png" alt="">Your Skill Profile <span class="tool" data-tip="Covering 14 skill areas.&#10;Top 3 strength & weakness and tips for success." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                            <li>
                            <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing4.png" alt="">Your Persona Report
                            <span class="tool" data-tip="Persona analysis covering 11 dimensions." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                            <li>
                            <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing5.png" alt="">Career Recommendations
                            <span class="tool" data-tip="Top 3 career options for you.&#10;Career score match and Skill matrix." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                            <li>
                            <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing6.png" alt="">Complete college options<span class="tool" data-tip="Top colleges from 5000+ colleges by stream in the career report." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                        </ul>
                            <!-- <a href="#" class="thm-btn-orange about-one__btn">Buy Now</a> -->
                            <div class="about-one__btn-box" style = "margin-top: 15px;margin-bottom: 15px;">
                                <a href="<?php echo URLROOT; ?>/home/additional_info" class="thm-btn about-one__btn" style = "padding: 6px 14px 6px;">Buy Now</a>
                            </div>
                            <a href="#" style="font-size:13px">View Sample Report</a>
                        
                </div>
            </div>
            <div class="col-lg-3">
                <div class="bg-white shadow-lg" >
                <h3 class="services-two__title"><a href="#">The Path</a></h3>
                        <p class="" style="font-size: 12px;color: #a1a4b0;">Complete Career Guidance + <br>
 2-Sessions Counseling</p>
                        <!-- <span calss="popular">Popular</span> -->
                        <div class="" style="padding-top:10px;padding-bottom:30px;">
                            <p style="color:var(--insur-base);font-size:34px;">&#x20B9;3,495</p>
                        </div>
                        <ul>
                            <li>
                                <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing1.png" alt="">Skill Mapping Analysis 
                            
                                <span class="tool" data-tip="Overall brain score.&#10;Scores across 10 brain areas.&#10;Brain area wise comparative performance." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            
                                </h3>
                                
                            </li>
                            <li>
                            <h3 class="list_text"><img  src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing2.png" alt="">Your 360 Degree Profile
                            <span class="tool" data-tip=" 3 dimensional performance across 8 skill groups.&#10;Areas you are good at & areas of improvement." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            
                            </li>
                            <li>
                            <h3 class="list_text"><img  src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing3.png" alt="">Your Skill Profile <span class="tool" data-tip="Covering 14 skill areas.&#10;Top 3 strength & weakness and tips for success." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                            <li>
                            <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing4.png" alt="">Your Persona Report
                            <span class="tool" data-tip="Persona analysis covering 11 dimensions." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                            <li>
                            <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing5.png" alt="">Career Recommendations
                            <span class="tool" data-tip="Top 3 career options for you.&#10;Career score match and Skill matrix." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                            <li>
                            <h3 class="list_text"><img src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/pricing6.png" alt="">Complete college options<span class="tool" data-tip="Top colleges from 5000+ colleges by stream in the career report." style='float:right;'><i class='fa fa-info-circle'></i></span>
                            </h3>
                            </li>
                        </ul>
                            <!-- <a href="#" class="thm-btn-orange about-one__btn">Buy Now</a> -->
                            <div class="about-one__btn-box" style = "margin-top: 15px;margin-bottom: 15px;">
                                <a href="<?php echo URLROOT; ?>/home/additional_info2" class="thm-btn about-one__btn" style = "padding: 6px 14px 6px;">Buy Now</a>
                            </div>
                            <a href="#" style="font-size:13px">View Sample Report</a>
                        
                </div>
            </div>
        </div>
    </div>
</section>





<?php require APPROOT . "/views/inc_home/footer.php"; ?>

<script>
window.onload = function() {
  const circle = document.querySelector('.circle-border');
  const maxLength = 240; // Set the desired length to stop the circular border
  circle.style.strokeDasharray = `${maxLength} 282.74333882`; /* Set the final stroke-dasharray length */
};



</script>