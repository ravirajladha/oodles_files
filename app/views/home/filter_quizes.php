<?php require APPROOT . "/views/inc_home/header.php"; ?>


<section class="page-header">
            <div class="page-header-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/quiz_cover.png)">
            </div>
            <div class="page-header-shape-1"><img src="<?php echo URLROOT; ?>/assets_home/images/shapes/page-header-shape-1.png" alt=""></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li>Quizes</li>
                    </ul>
                    <h2>Quizes</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
<!-- Filter start -->
<form method="post" action="<?php echo URLROOT; ?>/home/filter_quizes">
            <div class="container">
                <div class="row">

                <div class="col-md-3">
                <label for="list2" class="mdl-textfield__label"></label>
							
								
                <select name="school" class="form-control" required>
                <option value="">Select School</option>
											<option value="0">All</option>
											<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
												<option value="<?php echo $school_detail->id; ?>"><?php echo $school_detail->institute_name; ?></option>
											<?php } ?>
										</select>
								
										</div>
                                        <div class="col-md-3">
                    <label for="list2" class="mdl-textfield__label"></label>
												<br>
                                                <select name="class" class="form-control" required>
                                                <option value="">Select Class</option>
										<option value="0">All</option>
										<?php foreach ($data['get_all_class'] as $class_detail) { ?>
											<option value="<?php echo $class_detail->id; ?>"><?php echo $class_detail->class_name; ?></option>
										<?php } ?>
									</select>
                    </div>
                                        <div class="col-md-3">
                                        <label for="list2" class="mdl-textfield__label"></label>
									<select name="subject" class="form-control" required>
                                    <option value=""> Select Subject</option>
										<option value="0"> All</option>
										<?php foreach ($data['get_all_subject'] as $subject_detail) { ?>
											<option value="<?php echo $subject_detail->id; ?>"><?php echo $subject_detail->subject_name; ?></option>
										<?php } ?>
									</select>
                    </div>
                    <div class="col-md-3">
								<br>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i>&nbsp;Search</button>

                    </div>
         
                </div>
            </div>
       <!-- Filter End -->
        <!--Portfolio Start-->
        <section class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="portfolio-filter style1 post-filter has-dynamic-filters-counter list-unstyled">
                            <li data-filter=".filter-item" class="active"><span class="filter-text">All</span></li>
                            <!-- <li data-filter=".insur"><span class="filter-text">School</span></li>
                            <li data-filter=".busi"><span class="filter-text">Free</span></li>
                            <li data-filter=".poli"><span class="filter-text last-pd-none">Paid</span></li> -->
                        </ul>
                    </div>
                </div>
                <div class="row filter-layout masonary-layout">
                    <!--Portfolio Single Start-->
                    <?php 
                    $count = 0;
                                        ?>

                    <?php foreach($data['get_quiz_detail'] as $quiz){ 
                        $count++;
                        ?>
                    <div class="col-xl-3 col-lg-6 col-md-6 filter-item stra busi">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                            <img src="<?php echo URLROOT; ?>/uploads/<?php echo $quiz->image?>" alt="" style="max-height:200px; max-width:100%;">
                                <div class="portfolio__plus">
                                    <a href="<?php echo URLROOT; ?>/uploads/<?php echo $quiz->image?>" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">Quiz Name</p>
                                    <h4 class="portfolio__title"><a href="<?php echo URLROOT; ?>/student/login"><?php echo $quiz->name?></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($count == 0) { ?>

No Such Quiz Found, Try again.


                    <?php } ?>
                </div>
            </div>
        </section>


        <?php require APPROOT . "/views/inc_home/footer.php"; ?>