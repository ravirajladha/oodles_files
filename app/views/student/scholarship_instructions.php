<?php require APPROOT . "/views/inc_home/header.php"; ?>
<?php foreach ($data['scholarship_instruction'] as $instructions) { ?>
<?php } ?>


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




<section class="portfolio-details">
    <div class="container">


        <div class="portfolio-details__content">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="portfolio-details__content-left">
                        <h2>Instructions</h2>
                        <p class="portfolio-details__text-1"><?php echo $instructions->description ?> </p>
                        <p class="portfolio-details__text-1"><?php echo $instructions->minimum_eligibility ?> </p>
                        <p class="portfolio-details__text-1"><?php echo $instructions->application_process ?> </p>
                        <p class="portfolio-details__text-1"><?php echo $instructions->reservation ?> </p>
                        <p class="portfolio-details__text-1"><?php echo $instructions->documents_required ?> </p>

                    </div>
                </div>


                <div class="col-xl-4 col-lg-4">
                    <div class="portfolio-details__content-right">
                        <div class="portfolio-details__details-box">
                            <ul class="list-unstyled portfolio-details__details-list">

                                <li>

                                    <?php if (isset($_SESSION['rexkod_oodles_student_id'])) { ?>

                                        <a href="#" target="_blank">
                                            <div class="portfolio-details__social">
                                                <button class="btn btn-success">Start Application</button>
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