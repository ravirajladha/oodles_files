<?php require APPROOT . "/views/inc_home/header.php"; ?>

<!--Main Slider Start-->
<section class="main-slider clearfix">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 5000
                }}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/v2.jpg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h2 class="main-slider__title" style="font-size:36px;">PLAY <br>QUIZ & <span>EARN</span><br> POCKET SCHOLARSHIP</span></h2>
                                <p class="main-slider__text">POCKET Scholarship programme aimed
                                    at encouraging Indian students<br> to improve their learning continuously by
                                    authenticating their learning <br>levels Quizzes & drive their 'eager to
                                    learn' nature by rewarding monthly<br> e-scholarships.Make your studies fun and rewarding with
                                    Pocket Scholarship! <br>Take Quizzes and get scholarships up to ₹1000 per month!</p>
                                <!-- <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn">Let’s Get Started</a>
                                </div> -->



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/long1.jpg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h4 class="main-slider__title" style="font-size:36px;">Practice Quiz offers high-quality test prep <br> for a variety of academic <span>exams.<span> </h4>
                                <p class="main-slider__text">This Quiz is intended to evaluate your knowledge and understanding <br>
                                    of Subjects by allowing you to practice and learn Chapters finished<br>in your school.p

                                    <hidden>The quiz features MCQ-based questions prepared by <br> subject matter experts that are similar to the topics you may encounter <br>in exams. These questions verify that you understand the Chapter & Topics<br> and are prepared for your academic evaluations. So, what are you holding out for? <br>Take this quiz now to boost your grades!
                                </p>
                                <!-- <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn">Let’s Get Started</a>
                                </div> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/long2.jpg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h2 class="main-slider__title" style="font-size:36px; ">
                                    <span>!!! Contest!!!</span>
                                    <br>खेलो जीतो स्कालरशिप!!!<br>INDIA में सीखने का<br>नया तरीका !!!
                                </h2>
                                <p class="main-slider__text">A platform especially designed for those who have <br>a quest for knowledge and love to explore a new world <br>of learning. Dive in to the OodlesIn of Scholarship & quizzes <br>that we have for you .</p>
                                <!-- <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn">Let’s Get Started</a>
                                </div> -->
                            </div>
                        </div>
                    </div>


                </div>


            </div>

            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/vecteezy.jpg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h2 class="main-slider__title" style="font-size:36px;">Scholarship
                                    <br> for the better <br> school <span>life.</span>
                                </h2>
                                <p class="main-slider__text">Take the Challenge and participate to win cash prizes.<br> You have a limited amount of time to answer each question. <br> The faster
                                    you respond, the greater your score. The higher <br>the score, the higher the
                                    ranking!!! Top the Ranking Leader <br> board to Win Big!!! Are you prepared for it?<br>
                                    Play Now and Start Winning,</p>
                                <!-- <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn">Let’s Get Started</a>
                                </div> -->
                            </div>
                        </div>
                    </div>


                </div>


            </div>

        </div>

        <!-- If we need navigation buttons -->
        <div class="main-slider__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                <i class="icon-right-arrow"></i>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                <i class="icon-right-arrow1"></i>
            </div>
        </div>

    </div>
</section>
<!--Page Header End-->
<!-- Pragraph start -->
<div class="container">
    
<!-- filter start -->
<form method="post" action="<?php echo URLROOT; ?>/home/filter_quiz2/<?php echo $data['category']; ?>">
    <div class="container">
        <div class="row">

            <div class="col-xl-3">
                <label for="list2" class="mdl-textfield__label"></label>

                <select id="classes" name="classes" class="form-control"  required>


                    <option selected>Select Class</option>
                    <?php foreach ($data['get_all_class'] as $class) { ?>
                    <option value=<?php echo $class->id; ?>><?php echo $class->class_name; ?></option>
                    
                    <?php }?>
                    
                </select>

            </div>

            <div class="col-xl-3">
                <label for="list2" class="mdl-textfield__label" required></label>

                <select name="type" class="form-control" id="subject" required>


                    <!-- <option value="">Select Type</option> -->
                    

                </select>
                <!-- <input type="text" id="subject"> -->
                

            </div>
            
            <div class="col-xl-2 p-t-20">
                <br>
                <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i>&nbsp;Search</button>

            </div>
            <div class="col-xl-3 p-t-20">
            </div>
        </div>

                    </form>
        <div class="row">
        <div class="col-xl-4 p-t-20">
            </div>

        <div class="col-xl-4 mt-5">
                <button class="btn btn-success"><a href="<?php echo URLROOT; ?>/home/all_scholarships">View All</a></button><!-- hereeeeeeeeeeeee -->
            </div>
            <div class="col-xl-4 p-t-20">
            </div>
        </div>
    </div>
<!-- filter end -->


<section class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <ul class="portfolio-filter style1 post-filter has-dynamic-filters-counter list-unstyled">
                        <li data-filter=".filter-item" class="active"><span class="filter-text">All</span></li>
                        <!-- <?php foreach ($data['get_scholarship_type'] as  $scholarship_type) { ?>
                            <li data-filter=.<?php echo $scholarship_type->id ?>><span class="filter-text"><?php echo $scholarship_type->scholarship_type ?></span></li>
                        <?php } ?> -->
                        <!-- <li data-filter=".insur"><span class="filter-text">Govenment</span></li>
                            <li data-filter=".busi"><span class="filter-text">Corporate</span></li>
                            <li data-filter=".poli"><span class="filter-text last-pd-none">Oodles</span></li> -->
                    </ul>
                </div>
            </div>

            <?php foreach ($data['get_all_subject'] as $quiz) { ?>
                    <!-- <?php echo $quizes->name ?> -->
                 
                    <div class="col-lg-3 col-md-6 col-12 col-sm-6">
					    <div class="blogThumb" style="height:480px;">
                            <div class="thumb-center"><img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/uploads/<?php echo $quiz->image ?>" style="height:200px;width:100%;"></div>
                                <div class="white-box" style="padding:3px;">
									<div class="text-muted"><span class="m-r-10" style="font-size:14px;">
												<?php $out = strlen($quiz->name) > 33 ? substr($quiz->name, 0, 33) . "..." : $quiz->name; ?>
											<h5 style="color:black;"><?php echo strtoupper($out); ?></h5>
										</span>
                                    </div>
										<div class="text-muted"><span class="m-r-10" style="font-size:12px;">
											FROM: <span style="color:green;"><?php echo date("d/m/y", strtotime($quiz->start_date)) ?></span>
                                            </span>
                                            <span class="m-r-10" style="float:right;font-size:12px;">
                                                TO: <span style="color:red;"><?php echo date("d/m/y", strtotime($quiz->end_date)) ?></span>
                                            </span>

									    </div>

                                        <?php if (isset($quiz->start_time) && isset($quiz->end_time)) { ?>
														<div class="text-muted"><span class="m-r-10" style="font-size:12px;">
																START: <span style="color:green;"><?php echo $quiz->start_time; ?></span>
															</span>
															<span class="m-r-10" style="float:right;font-size:12px;">
																END: <span style="color:red;"><?php echo $quiz->end_time; ?></span>
															</span>

														</div>
													<?php } ?>
                                   
                                                    <div>
                                                <?php if ($quiz->category == 1) { ?>
																<i class='fas fa-coins'></i>&nbsp; <?php echo $quiz->quiz_cost ?>
															<?php } elseif ($quiz->category == 2) { ?>
																<i class="fa fa-coins"></i>&nbsp; <?php echo $quiz->quiz_cost ?>

															<?php } elseif ($quiz->category == 3) { ?>
																<i class='fas fa-coins'></i>&nbsp; <?php echo $quiz->quiz_cost ?>
															<?php } elseif ($quiz->category == 4) { ?>
																<a href="<?php echo URLROOT ?>/student/contest_prize_detail/<?php echo $quiz->prize_calc_data_id; ?>">
																<button type="button" class="btn btn-sm rounded-pill btn-outline-info mb-2"><i class="fa fa-inr"></i>&nbsp; 
																<?php $contest_prize = $adminMod->get_contest_prize_calculations($quiz->prize_calc_data_id); if (isset($contest_prize->prize_pool_amount)){echo $contest_prize->prize_pool_amount;} ?>

															</button>
																</a>
																
																
															<?php	}
															?>
                                     				    <span style="font-size:12px;float:right;"><?php echo intval(($quiz->duration_min)) * 60 + intval($quiz->duration_sec); ?>&nbsp;sec</span>

                                                    <?php $present_date = date('Y-m-d');
																	$present_date = date('Y-m-d', strtotime($present_date));
																	//echo $present_date; // echos today! 
																	$quiz_start_date = date('Y-m-d', strtotime($quiz->start_date));
																	$quiz_end_date = date('Y-m-d', strtotime($quiz->end_date));
                                                    if (($present_date >= $quiz_start_date) && ($present_date <= $quiz_end_date)) { ?>
																		<a href="<?php echo URLROOT ?>/student/take_quiz/<?php echo $quiz->id ?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Play Now</a>
																	<?php } elseif (($present_date <= $quiz_start_date) && ($present_date <= $quiz_end_date)) { ?>
																		<a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Coming Soon</a>
																	<?php } else { ?>
																		<a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Expired</a>
																	<?php }
																	?>
                                                        </div>

                                                        <p><i class="ti-alarm-clock"></i><a class="" data-toggle="modal" data-target="#terms">
															<span style="color:#32c5d2;">View T&C</span>
														</a>
														
                                                        <span class="tool" data-tip="coins will be debited from your wallet." style='float:right;'><i class='fa fa-info-circle'></i></span>
													</p>
                                                
                                                    <hr style='border:1px solid;width:100%;margin:-8px 0 8px 0;'>
													<p style="margin:0 0 -15px;font-size:10px;line-height:8px">Remarks: <?php echo $quiz->remarks; ?></p>
                                                
                            </div>
                        </div>
                    </div>

                <?php } ?>
        </div>
</section>
  
   
<!-- </div> -->
</div>
<!--Portfolio Carousel Page End-->



<div class="modal fade " id="terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered  modal-lg modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">View T&C</h5>
				<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
			</div>
			<div class="modal-body">
				<div class="form-group">
					<!-- <h2 class="form-title">Login</h2><br> -->
					<div class="">
						<ol style="font-size:12px;">
							<li>
								PARTICIPANTS FROM ALL OVER THE WORLD AND
								OF ALL NATIONALITIES ARE ELIGIBLE TO ENTER THE QUIZ.
							</li>
							<li>
								THE QUIZ WILL BE AVAILABLE FOR ALL
								CONTESTANTS FOR THE PERIOD MENTIONED ACCORDINGLY IN THE QUIZ, IN WHICH THEY
								HAVE TO SCORE/ACHEIVE MINIMUM/PASS CRITERIA
							</li>
							<li>
								THESE QUESTIONS WILL BE BASED ON NCERT,
								CBSE, STATE AND BOARDS CURRICULUM. THE QUIZ WILL START AS SOON AS THE
								PARTICIPANT CLICKS THE START QUIZ BUTTON.
							</li>
							<li>
								YOU WILL BE REQUIRED TO PROVIDE YOUR
								NAME, CLASS EMAIL ADDRESS, TELEPHONE NUMBER AND POSTAL ADDRESS. BY SUBMITTING
								YOUR CONTACT DETAILS, YOU WILL GIVE CONSENT TO THESE DETAILS BEING USED FOR THE
								PURPOSE OF THE QUIZ. YOU NEED TO COMPLETE THE PROFILE TO GET MATCHED QUIZ /
								POCKET SCHOLARSHIPS.
							</li>
							<li>
								DISCOVERY/DETECTION/NOTICING OF USE OF
								ANY UNFAIR/SPURIOUS MEANS/ MALPRACTICES, INCLUDING BUT NOT LIMITED TO
								IMPERSONATION, DOUBLE PARTICIPATION ETC. DURING THE PARTICIPATION IN THE QUIZ,
								WILL RESULT IN THE PARTICIPATION BEING DECLARED NULL AND VOID AND HENCE,
								REJECTED. THE ORGANIZERS OF THE QUIZ
								COMPETITION OR ANY AGENCY ACTING ON THEIR BEHALF RESERVES THE RIGHT IN THIS
								REGARD.
							</li>
							<li>
								ONCE SUBMITTED AN ENTRY CANNOT BE
								WITHDRAWN.
							</li>
							<li>
								ENTRY
								FEES IN CASE OF A PAID QUIZ, ONCE PAID IS NON-REFUNDABLE.
							</li>
							<li>
								ORGANIZERS WILL NOT ACCEPT ANY
								RESPONSIBILITY FOR ENTRIES THAT ARE LOST, ARE LATE OR INCOMPLETE OR HAVE NOT
								BEEN TRANSMITTED DUE TO COMPUTER ERROR OR ANY OTHER ERROR BEYOND THE
								ORGANIZER’S REASONABLE CONTROL. PLEASE NOTE PROOF OF SUBMISSION OF THE ENTRY IS
								NOT PROOF OF RECEIPT OF THE SAME.
							</li>
							<li>
								IN THE EVENT OF UNFORESEEN
								CIRCUMSTANCES, ORGANIZERS RESERVE THE RIGHT TO AMEND OR WITHDRAW THE QUIZ AT
								ANY TIME. FOR THE AVOIDANCE OF DOUBT THIS INCLUDES THE RIGHT TO AMEND THESE
								TERMS AND CONDITIONS.
							</li>
							<li>

								THE
								PARTICIPANT SHALL ABIDE BY ALL THE RULES AND REGULATIONS OF PARTICIPATING IN
								THE QUIZ FROM TIME TO TIME.
							</li>
							<li>
								ORGANISERS
								RESERVE ALL RIGHTS TO DISQUALIFY OR REFUSE PARTICIPATION TO ANY PARTICIPANT IF
								THEY DEEM PARTICIPATION OR ASSOCIATION OF ANY PARTICIPANT WHICH IS DETRIMENTAL
								TO THE QUIZ OR THE ORGANIZERS OR PARTNERS OF THE QUIZ. THE REGISTRATIONS SHALL
								BE VOID IF THE INFORMATION RECEIVED BY THE ORGANIZERS IS ILLEGIBLE, INCOMPLETE,
								DAMAGED, FALSE OR ERRONEOUS.
							</li>
							<li>
								ORGANISER’S
								DECISION ON THE QUIZ SHALL BE FINAL AND BINDING AND NO CORRESPONDENCE WILL BE
								ENTERED INTO REGARDING THE SAME.
							</li>
							<li>
								THESE
								TERMS AND CONDITIONS SHALL BE GOVERNED BY THE LAWS OF THE INDIAN JUDICIARY.
							</li>
							<li>
								BY
								ENTERING THE QUIZ, THE PARTICIPANT ACCEPTS AND AGREES TO BE BOUND BY THESE
								TERMS AND CONDITIONS, MENTIONED ABOVE.
							</li>
						</ol>
					</div>
				</div>

				<div class="form-group">
					<div class="">

					</div>
				</div>
				<input type="text" readonly class="form-control" name="quiz_id" id="add_quiz_id" hidden>
				<div class="form-group form-button" style="text-align: center;">

				</div>


				<div class="social-login" style="text-align: center;">
					<br>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>

<!-- Add student modal start -->
<div class="modal fade" id="add_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Information</h5>
            </div>


            <form method="post" action="<?php echo URLROOT; ?>/home/add_student/" autocomplete="off" class="register-form">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <h2 class="form-title">Login</h2><br> -->
                        <div class="">
                            <select class="form-control" name="school">
                                <option readonly>-Select School-</option>
                                <?php foreach ($data['get_school_detail'] as $school_detail) { ?>
                                    <option value="<?php echo $school_detail->id; ?>"><?php echo $school_detail->school_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="">
                            <select class="form-control" name="class">
                                <option readonly>-Select Class-</option>
                                <?php foreach ($data['get_all_class'] as $class_detail) { ?>
                                    <option value=" <?php echo $class_detail->id; ?>"><?php echo $class_detail->class_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input type="text" readonly class="form-control" name="quiz_id" id="add_quiz_id" hidden>
                    <div class="form-group form-button" style="text-align: center;">

                    </div>


                    <div class="social-login" style="text-align: center;">
                        <br>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-round btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add student modal end -->
<!-- Update modal start -->
<div class="modal fade" id="update_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Information</h5>
                <!-- <button class="btn btn-round btn-primary" ><a href="<?php echo URLROOT ?>/student/register"> Signup</a></button> -->
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                        <span aria-hidden="true">&times;</span>
                                                    </button> -->
                <!-- <button class="btn btn-round btn-primary" type="submit">Login</button> -->
            </div>


            <form method="post" action="<?php echo URLROOT; ?>/home/update_student" autocomplete="off" class="register-form">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <h2 class="form-title">Login</h2><br> -->
                        <div class="">
                            <select class="form-control" name="school">
                                <option readonly>-Select School-</option>
                                <?php foreach ($data['get_school_detail'] as $school_detail) { ?>
                                    <option value="<?php echo $school_detail->id; ?>" <?php if ($get_student_detail->school == $school_detail->id) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $school_detail->school_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="">
                            <select class="form-control" name="class">
                                <option readonly>-Select Class-</option>
                                <?php foreach ($data['get_all_class'] as $class_detail) { ?>
                                    <option value="<?php echo $class_detail->id; ?>" <?php if ($get_student_detail->course == $class_detail->id) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $class_detail->class_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input type="text" readonly class="form-control" name="quiz_id" id="update_quiz_id" hidden>
                    <div class="form-group form-button" style="text-align: center;">

                    </div>


                    <div class="social-login" style="text-align: center;">
                        <br>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-round btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php require APPROOT . "/views/inc_home/footer.php"; ?>
<script>
    function update_student_modal(bid) {
        $('#update_quiz_id').val(bid);
    }

    function add_student_modal(bid) {
        $('#add_quiz_id').val(bid);
    }



    $(document).ready(function() {
        $('#subject').click(function() {
            var classes = $('#classes').val();
            var category=<?php echo $data['category']; ?>

            // alert(category);
            $.ajax({
                url: '<?php echo URLROOT; ?>/home/get_subject_by_class',
                type: 'POST',
                data: {
                    classes,category
                }, 
                success: function(res) {
                    document.getElementById("subject").innerHTML = res;
                    document.getElementById("subject").style.display = 'block';
                }
            });
        });
    });
   
</script>