<?php require APPROOT . "/views/inc_home/header.php"; ?>


<section class="page-header">
            <div class="page-header-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/college_cover.png)">
            </div>
            <div class="page-header-shape-1"><img src="<?php echo URLROOT; ?>/assets_home/images/shapes/page-header-shape-1.png" alt=""></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li>College Details</li>
                    </ul>
                    <h2>College details</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <?php foreach ($data['get_all_college'] as $detail) { ?>
            <?php } ?>
        <!--Portfolio Details Start-->
        <section class="portfolio-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="portfolio-details__img">
                            <img src="<?php echo URLROOT?>/uploads/<?php echo $detail->college_image?>" alt="">
                        </div>
                    </div>
                </div>
          
                <div class="portfolio-details__content">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8">
                            <div class="portfolio-details__content-left">
                                <h3 class="portfolio-details__title"><?php echo $detail->institute_name?></h3>
                                <p class="portfolio-details__text-1"><?php echo $detail->branch_address?> </p>
                               <p class="portfolio-details__text-2"><?php echo $detail->description?></p> 
                               <br>
                               <h6 class="portfolio-details__title" style="font-size:20px;">Courses Offered</h6>
                                <p class="portfolio-details__text-1"><?php echo $detail->course_offered?> </p>
                                <br>
                                <h6 class="portfolio-details__title" style="font-size:20px;">Fees Course Wise</h6>
                                <p class="portfolio-details__text-1"><?php echo $detail->fees_course_wise?> </p>
                                <br>
                                <h6 class="portfolio-details__title" style="font-size:20px;">Eligibility Course Wise</h6>
                                <p class="portfolio-details__text-1"><?php echo $detail->eligibility_course_wise?> </p>
                                <br>
                       
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="portfolio-details__content-right">
                                <div class="portfolio-details__details-box">
                                    <ul class="list-unstyled portfolio-details__details-list">
                                        <!-- <li>
                                            <p class="portfolio-details__client">Affiliation Board</p>
                                            <h4 class="portfolio-details__name"><?php echo $detail->institute_name?></h4>
                                        </li> -->
                                        <li>
                                            <p class="portfolio-details__client">Affiliation Board</p>
                                            <h4 class="portfolio-details__name"><?php echo $detail->affiliation_board?></h4>
                                        </li>
                                        <li>
                                            <p class="portfolio-details__client">Website Link</p>
                                            <h4 class="portfolio-details__name"><a href="<?php echo $detail->website_link?>" target="_blank"><?php echo $detail->website_link?></a></h4>
                                        </li>
                                        <li>
                                            <p class="portfolio-details__client">Email Id</p>
                                            <h4 class="portfolio-details__name"><a href="mailto:<?php echo $detail->authorized_email?>"?><?php echo $detail->authorized_email?></a></h4>
                                        </li>
                                        <li>
                                            <p class="portfolio-details__client">Date of Establishment</p>
                                            <h4 class="portfolio-details__name"><?php echo $detail->date_of_establishment?></h4>
                                        </li>
                                        <li>
                                            <p class="portfolio-details__client">University Affiliated</p>
                                            <h4 class="portfolio-details__name"><?php echo $detail->university_affiliated?></h4>
                                        </li>
                                  
                                        <li>
                                            <p class="portfolio-details__client">University Affiliated</p>
                                            <h4 class="portfolio-details__name"><?php echo $detail->university_affiliated?></h4>
                                        </li>
                                        <li>
                                            <p class="portfolio-details__client">No of Students</p>
                                            <h4 class="portfolio-details__name"><?php echo $detail->no_of_students?></h4>
                                        </li>
                                        <li>
                                            <p class="portfolio-details__client">No of Branches</p>
                                            <h4 class="portfolio-details__name"><?php echo $detail->no_of_branches?></h4>
                                        </li>
                                        <li>
                                            <p class="portfolio-details__client">Mode of Admission</p>
                                            <h4 class="portfolio-details__name"><?php echo $detail->mode_of_admission?></h4>
                                        </li>
                                        <li>
                                            <p class="portfolio-details__client">Admission Status</p>
                                            <h4 class="portfolio-details__name"><?php echo $detail->admission_status?></h4>
                                        </li>
                                  
                                  
                               
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
            </div>
        </section>
  

        <?php require APPROOT . "/views/inc_home/footer.php"; ?>