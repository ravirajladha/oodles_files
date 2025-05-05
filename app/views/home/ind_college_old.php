<?php require APPROOT . "/views/inc_home/header.php"; ?>

<style>
    form {
        width: 100px;
    }

    button {
        border: 0;
        background: transparent;
        font-size: 1.2em;
        margin: 0;
        padding: 0;
        float: right;
    }

    button:hover,
    button:hover+button,
    button:hover+button+button,
    button:hover+button+button+button,
    button:hover+button+button+button+button {
        color: #EAC612;
    }
</style>

<style>
    .project-tab {
        padding: 7%;
        margin-top: -8%;
    }

    .project-tab #tabs {
        background: #007b5e;
        color: #eee;
    }

    .project-tab #tabs h6.section-title {
        color: #eee;
    }

    .project-tab #tabs .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #0062cc;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        border-bottom: 3px solid !important;
        font-size: 9.5px;
        font-weight: bold;
    }

    .project-tab .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        color: #0062cc;
        font-size: 9.5px;
        font-weight: 600;
    }

    .project-tab .nav-link:hover {
        border: none;
    }

    .project-tab thead {
        background: #f3f3f3;
        color: #333;
    }

    .project-tab a {
        text-decoration: none;
        color: #333;
        font-weight: 600;
    }
</style>

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
                    <img src="<?php echo URLROOT ?>/uploads/<?php echo $detail->college_image ?>" alt="">
                </div>
            </div>
        </div>


        <section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Courses & Fees</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Admission Procedure</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Reviews</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Cutoff</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Placement</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Gallery</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Schloarship</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Faculty</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Hostel</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">FAQ's</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Alumni</a>
                            </div>
                        </nav>


                                                






                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="portfolio-details__content">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-8">
                                            <div class="portfolio-details__content-left">
                                                <h3 class="portfolio-details__title"><?php echo $detail->institute_name ?> </h3>
                                                <?php
                                                if (!empty($data['get_rating_college'])) {
                                                    $rating = $data['get_rating_college']->rating;
                                                    $count = $data['get_rating_college']->count;
                                                    // gettype($rating);
                                                    // die();

                                                    $avg_rating = ($rating) / ($count);
                                                }

                                                ?>

                                                <p class="portfolio-details__text-1"><?php echo $detail->branch_address ?>, <?php if (!empty($data['get_rating_college'])) {
                                                                                                                                if ($avg_rating == 5) {
                                                                                                                                    for ($x = 1; $x <= 5; $x++) {
                                                                                                                                        echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    }
                                                                                                                                } elseif ($avg_rating >= 4.5) {
                                                                                                                                    for ($x = 1; $x <= 4; $x++) {
                                                                                                                                        echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    }
                                                                                                                                    echo "<i class='fa-solid fa-star-half-stroke'></i>";
                                                                                                                                } elseif (($avg_rating >= 4)) {
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                } elseif (($avg_rating >= 3.5)) {
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star-half-stroke'></i>";
                                                                                                                                } elseif (($avg_rating >= 3)) {
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                } elseif (($avg_rating >= 2.5)) {
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star-half-stroke'></i>";
                                                                                                                                } elseif (($avg_rating >= 2)) {
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                } elseif (($avg_rating >= 1.5)) {
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                    echo "<i class='fa-solid fa-star-half-stroke'></i>";
                                                                                                                                } elseif (($avg_rating >= 1)) {
                                                                                                                                    echo "<i class='fa-solid fa-star'></i>";
                                                                                                                                } elseif (($avg_rating >= 0.5)) {
                                                                                                                                    echo "<i class='fa-solid fa-star-half-stroke'></i>";
                                                                                                                                }
                                                                                                                            }  ?>


                                                </p>
                                                <p class="portfolio-details__text-2"><?php echo $detail->description ?></p>
                                                <br>
                                                <h6 class="portfolio-details__title" style="font-size:20px;">Courses Offered</h6>
                                                <p class="portfolio-details__text-1"><?php echo $detail->course_offered ?> </p>
                                                <br>
                                                <h6 class="portfolio-details__title" style="font-size:20px;">Fees Course Wise</h6>
                                                <p class="portfolio-details__text-1"><?php echo $detail->fees_course_wise ?> </p>
                                                <br>
                                                <h6 class="portfolio-details__title" style="font-size:20px;">Eligibility Course Wise</h6>
                                                <p class="portfolio-details__text-1"><?php echo $detail->eligibility_course_wise ?> </p>
                                                <br>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="portfolio-details__content-right">
                                                <div class="portfolio-details__details-box">
                                                    <ul class="list-unstyled portfolio-details__details-list">
                                                        <!-- <li>
                                            <p class="portfolio-details__client">Affiliation Board</p>
                                            <h4 class="portfolio-details__name"><?php echo $detail->institute_name ?></h4>
                                        </li> -->
                                                        <li>
                                                            <p class="portfolio-details__client">Accreditation No</p>
                                                            <h4 class="portfolio-details__name"><?php echo $detail->accreditation_no ?></h4>
                                                        </li>
                                                        <li>
                                                            <p class="portfolio-details__client">Website Link</p>
                                                            <h4 class="portfolio-details__name"><a href="<?php echo $detail->website_link ?>" target="_blank"><?php echo $detail->website_link ?></a></h4>
                                                        </li>
                                                        <li>
                                                            <p class="portfolio-details__client">Email Id</p>
                                                            <h4 class="portfolio-details__name"><a href="mailto:<?php echo $detail->authorized_email ?>" ?><?php echo $detail->authorized_email ?></a></h4>
                                                        </li>
                                                        <li>
                                                            <p class="portfolio-details__client">Date of Establishment</p>
                                                            <h4 class="portfolio-details__name"><?php echo $detail->date_of_establishment ?></h4>
                                                        </li>
                                                        <li>
                                                            <p class="portfolio-details__client">University Affiliated</p>
                                                            <h4 class="portfolio-details__name"><?php echo $detail->university_affiliated ?></h4>
                                                        </li>

                                                        <li>
                                                            <p class="portfolio-details__client">University Affiliated</p>
                                                            <h4 class="portfolio-details__name"><?php echo $detail->university_affiliated ?></h4>
                                                        </li>
                                                        <li>
                                                            <p class="portfolio-details__client">No of Students</p>
                                                            <h4 class="portfolio-details__name"><?php echo $detail->no_of_students ?></h4>
                                                        </li>

                                                        <li>
                                                            <p class="portfolio-details__client">Mode of Admission</p>
                                                            <h4 class="portfolio-details__name"><?php echo $detail->mode_of_admission ?></h4>
                                                        </li>


                                                        <li>
                                                            <p class="portfolio-details__client">Provide Ratings</p>
                                                            <h4 class="portfolio-details__name">

                                                                <form action="<?php echo URLROOT ?>/home/rating_college/<?php echo $detail->id ?>" method="POST">

                                                                    <!-- <input type="hidden" name="rating[post_id]" value="3"> -->
                                                                    <button type="submit" name="rating[rating]" value="5">&#9733;</button>
                                                                    <button type="submit" name="rating[rating]" value="4">&#9733;</button>
                                                                    <button type="submit" name="rating[rating]" value="3">&#9733;</button>
                                                                    <button type="submit" name="rating[rating]" value="2">&#9733;</button>
                                                                    <button type="submit" name="rating[rating]" value="1">&#9733;</button>

                                                                </form>

                                                            </h4>
                                                        </li>






                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</section>


<?php require APPROOT . "/views/inc_home/footer.php"; ?>