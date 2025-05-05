	<!-- start page container -->
    <div class="page-container">
			<!-- start sidebar menu -->
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="sidebar-user">
									<div class="sidebar-user-picture">
										<a href="<?php echo URLROOT; ?>/student/index">
										<?php if (!empty($user_detail->student_image)) {	?> <img src="<?php echo URLROOT; ?>/uploads/<?php echo $user_detail->student_image ?>" alt="image"> <?php } else { ?>
											<img alt="image" src="<?php echo URLROOT; ?>/assets/img/dp.jpg">
										<?php 	} ?>
										</a>
									</div>
									<div class="sidebar-user-details">
										<div class="user-name"><?php
																if (isset($_SESSION['rexkod_oodles_student_name'])) {
																	echo strtoupper($_SESSION['rexkod_oodles_student_name']);
																} ?></div>
										<!-- <div class="user-role"><?php echo ($_SESSION['rexkod_oodles_student_email']) ?></div> -->
									</div>
								</div>
							</li>
							<li class="nav-item ">
								<!-- <?php if ($_SESSION['nav'] == "home") {
											echo "start active open";
										} ?> -->
								<a href="<?php echo URLROOT; ?>/student/index" class="nav-link nav-toggle">
									<i data-feather="airplay"></i>

									<span class="title">Home</span></a>
								<span class="selected"></span>
								<span class="arrow open"></span>
								</a>
								<ul class="sub-menu">

								</ul>
							</li>

							<!-- <li class="nav-item <?php if ($_SESSION['nav'] == "school") {
															echo "start active open";
														} ?>">
											
												<?php if (isset($_SESSION['rexkod_oodles_student_id'])) {

													if (isset($user_detail->academic_type)) {
														if (($user_detail->academic_type == 1)) {

												?>
														<a href="<?php echo URLROOT; ?>/student/school/<?php echo $user_detail->school ?>" class="nav-link nav-toggle"> <i data-feather="user"></i>
														<span class="title">School</span> <span class="arrow"></span>
													</a>

											<?php 	} elseif ($user_detail->academic_type == 2) { ?>
												<a href="<?php echo URLROOT; ?>/student/college/<?php echo $user_detail->college ?>" class="nav-link nav-toggle"> <i data-feather="user"></i>
														<span class="title">College</span> <span class="arrow"></span>
													</a>
										<?php	} ?>	
										<?php	} ?>	
											<?php 	} else { ?>
								<a href="" class="nav-link nav-toggle"> <i data-feather="user"></i>
									<span class="title">School</span> <span class="arrow"></span>
								</a>
								<?php } ?>
							</li> -->



							<li class="nav-item ">
								<!-- <?php if ($_SESSION['nav'] == "scholarship") {
											echo "start active open";
										} ?> -->
								<a href="#" class="nav-link nav-toggle"> <i data-feather="book"></i>
									<span class="title">Scholarships</span> <span class="arrow"></span>

								</a>
								<ul class="sub-menu">
									<!-- <li class="nav-item">
										<a href="<?php echo URLROOT; ?>/student/apply_scholarship" class="nav-link "> <span class="title"><i data-feather="aperture"></i>Apply Scholarship</span>
										</a>
									</li> -->
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/student/all_scholarships" class="nav-link "> <span class="title"><i data-feather="aperture"></i>All Scholarships</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/student/applied_scholarship" class="nav-link "> <span class="title"><i data-feather="aperture"></i>Applied Scholarships</span>
										</a>
									</li>
									
								</ul>

							</li>

							<!-- <li class="nav-item ">

								<a href="#" class="nav-link nav-toggle">
									<i data-feather="mail"></i>
									<span class="title">Quiz</span>
									<span class="arrow"></span>

								</a>
								<ul class="sub-menu">
								
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/student/quiz_result" class="nav-link "> <span class="title">Quiz Score</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/student/ranking" class="nav-link "> <span class="title">Ranking</span>
										</a>
									</li>
								</ul>
							</li> -->
						
							<li class="nav-item">
							<a href="javascript:;" class="nav-link nav-toggle">
									<i data-feather="chevrons-down"></i>
									<span class="title">Quiz</span>
									<span class="arrow "></span>
								</a>
										<ul class="sub-menu">
											<li class="nav-item">
												<a href="javascript:;" class="nav-link nav-toggle">
													<i data-feather="aperture"></i> Category
													<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li class="nav-item">
														<a href="<?php echo URLROOT?>/student/all_quiz/1/1/0" class="nav-link">
															<i data-feather="battery"></i> Practice</a>
													</li>
													<!-- <li class="nav-item">
														<a href="<?php echo URLROOT?>/student/all_quiz/1/2/0" class="nav-link">
															<i data-feather="award"></i> Merit</a>
													</li> -->
													<!-- <li class="nav-item">
														<a href="<?php echo URLROOT?>/student/all_quiz/1/3/0" class="nav-link">
															<i data-feather="box"></i>Rapid Fire</a>
													</li> -->
													<li class="nav-item">
														<a href="<?php echo URLROOT?>/student/all_quiz/1/4/0" class="nav-link">
														<i data-feather="battery"></i> Contest</a>
													</li>
												</ul>
											</li>
											<li class="nav-item">
												<a href="<?php echo URLROOT; ?>/student/quiz_result" class="nav-link">
													<i data-feather="clock"></i> Score</a>
											</li>
											<li class="nav-item">
												<a href="<?php echo URLROOT; ?>/student/ranking" class="nav-link">
													<i data-feather="database"></i> Rank</a>
											</li>
											<li class="nav-item">
												<a href="<?php echo URLROOT; ?>/student/resources" class="nav-link">
													<i data-feather="database"></i> Resources</a>
											</li>
											
										</ul>
									</li>
								
							<li class="nav-item ">

								<a href="<?php echo URLROOT ?>/student/wallet" class="nav-link nav-toggle">
									<i data-feather="mail"></i>
									<span class="title">Wallet</span>
									<!-- <span class="arrow"></span> -->

								</a>

							</li>
							<li class="nav-item ">

								<a href="<?php echo URLROOT ?>/student/my_quizes" class="nav-link nav-toggle">
								<i data-feather="book"></i>
									<span class="title">My Quizzes</span>
									<!-- <span class="arrow"></span> -->

								</a>

							</li>
							<li class="nav-item ">

								<a href="<?php echo URLROOT ?>/student/faq" class="nav-link nav-toggle">
								<i data-feather="book"></i>
									<span class="title">FAQ's</span>
									<!-- <span class="arrow"></span> -->

								</a>

							</li>
							<li class="nav-item ">

								<a href="<?php echo URLROOT ?>/student/logout" class="nav-link nav-toggle">
								<i data-feather="power"></i>
									<span class="title">Logout</span>
									<!-- <span class="arrow"></span> -->

								</a>

							</li>



							<!-- <li class="nav-item ">
					
												
											
								<a href="javascript:;" class="nav-link nav-toggle"> <i data-feather="anchor"></i>
									<span class="title">Settings</span>
									<span class="arrow"></span>
								</a>

							</li> -->

						</ul>
					</div>
				</div>
			</div>
			</div>