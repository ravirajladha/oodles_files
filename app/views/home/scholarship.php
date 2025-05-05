<?php require APPROOT . "/views/inc_home/header.php"; ?>


<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/scholarship_cover.png)">
    </div>
    <div class="page-header-shape-1"><img src="<?php echo URLROOT; ?>/assets_home/images/shapes/page-header-shape-1.png" alt=""></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>Scholarship Details</li>
            </ul>
            <h2>Scholarship details</h2>


        </div>
    </div>
</section>
<!--Page Header End-->
<?php foreach ($data['get_all_scholarship'] as $detail) { ?>
<?php } ?>
<!--Portfolio Details Start-->
<section class="portfolio-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="portfolio-details__img">
                    <img src="<?php echo URLROOT ?>/uploads/<?php echo $detail->scholarship_file ?>" alt="" width="200px" height="300px">
                </div>
            </div>
        </div>

        <div class="portfolio-details__content">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="portfolio-details__content-left">
                        <h3 class="portfolio-details__title"><?php echo $detail->name ?></h3>
                        <p class="portfolio-details__text-1"><?php echo $detail->description ?> </p>
                        <!-- <p class="portfolio-details__text-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, humour and the like.</p> -->
                        <h6 class="portfolio-details__title" style="font-size:20px;">Minimum Eligiblity criteria</h6>
                        <p class="portfolio-details__text-1"><?php echo $detail->minimum_eligibility ?> </p>
                        <h6 class="portfolio-details__title" style="font-size:20px;">How to apply?</h6>
                        <p class="portfolio-details__text-1"><?php echo $detail->application_process ?> </p>

                        <h6 class="portfolio-details__title" style="font-size:20px;">Reservations</h6>
                        <p class="portfolio-details__text-1"><?php echo $detail->reservation ?> </p>
                        <h6 class="portfolio-details__title" style="font-size:20px;">Documents Required for Application</h6>
                        <p class="portfolio-details__text-1"><?php echo $detail->documents_required ?> </p>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="portfolio-details__content-right">
                        <div class="portfolio-details__details-box">
                            <ul class="list-unstyled portfolio-details__details-list">
                                <li>
                                    <p class="portfolio-details__client">Offered By</p>
                                    <h4 class="portfolio-details__name"><?php echo $detail->offered_by ?></h4>
                                </li>
                                <li>
                                    <p class="portfolio-details__client">Body</p>
                                    <h4 class="portfolio-details__name"><?php echo $detail->body ?></h4>
                                </li>
                                <li>
                                    <p class="portfolio-details__client">Scholarship Type:</p>
                                    <h4 class="portfolio-details__name"> <?php if ($detail->type == 0) { ?>All <?php } elseif ($detail->type == 1) { ?>Government Scholarship<?php } elseif ($detail->type == 2) { ?>Private Scholarship<?php } elseif ($detail->type == 3) { ?>OodlesIn Scholarship<?php } ?></h4>
                                </li>
                                <li>
                                    <p class="portfolio-details__client">Category</p>
                                    <h4 class="portfolio-details__name">
                                        <?php if ($detail->type == 1) { ?>All type of candidates allowed.<?php } elseif ($detail->type == 2) { ?>Girl candidates allowed.<?php } elseif ($detail->type == 3) { ?>Boy candidates allowed.<?php } ?>
                                    </h4>
                                </li>
                                <li>
                                    <p class="portfolio-details__client">No of Scholarship</p>
                                    <h4 class="portfolio-details__name"><?php echo $detail->no_of_scholarships ?></h4>
                                </li>
                                <li>
                                    <p class="portfolio-details__client">Email Id</p>
                                    <a href="mailto:<?php echo $detail->email_id ?>">
                                        <h4 class="portfolio-details__name"><?php echo $detail->email_id ?></h4>
                                    </a>
                                </li>
                                <li>
                                    <p class="portfolio-details__client">Contact Number</p>
                                    <a href="tel:<?php echo $detail->contact_number ?>">
                                        <h4 class="portfolio-details__name"> <?php echo $detail->contact_number ?></h4>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $detail->detailed_eligibility_url ?>" target="_blank">
                                        <p class="portfolio-details__client" style="color:#0000FF;">Link to Detailed Eligibility Crtiera </p>
                                    </a>

                                </li>
                                <!-- <li>
                                         <a href="<?php echo $detail->direct_link_to_apply ?>">   <p class="portfolio-details__client" style="color:blue;">Direct Link to Apply</p></a>
                                           
                                        </li> -->

                                <li>
                                    <p class="portfolio-details__client">Start Date:</p>
                                    <h4 class="portfolio-details__name"><?php echo $detail->start_date ?></h4>
                                </li>
                                <li>
                                    <p class="portfolio-details__client">End Date:</p>
                                    <h4 class="portfolio-details__name"><?php echo $detail->end_date ?></h4>
                                </li>
                                <li>

                                    <?php if (isset($_SESSION['rexkod_oodles_student_id'])) { ?>

                                        <a href="<?php echo URLROOT ?>/student/apply_scholarship" target="_blank">
                                            <div class="portfolio-details__social">
                                                <button class="btn btn-success">Apply Now</button>
                                            </div>
                                        </a>
                                    <?php } else { ?>

                                        <a href="<?php echo URLROOT ?>/student/login" target="_blank">
                                            <div class="portfolio-details__social">
                                                <button class="btn btn-success">Login To Apply</button>
                                            </div>
                                        </a>
                                    <?php } ?>

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