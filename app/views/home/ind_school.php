<?php require APPROOT . "/views/inc_home/header.php"; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




<style>
    .get-insurance__tab-box .tab-buttons .tab-btn span {

        color: #020202;
        background-color: #fdfdfd;
        text-transform: initial;
    }

    .portfolio-details {

        padding: 10px 0 60px;
    }
</style>
<style>
    .comment-one__single {
        padding-bottom: 21px;
        margin-bottom: 39px;
    }
</style>
<style>
    .rating {
        float: left;
    }

    /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
      follow these rules. Every browser that supports :checked also supports :not(), so
      it doesn’t make the test unnecessarily selective */
    .rating:not(:checked)>input {
        position: absolute;
        /* top: -9999px; */
        clip: rect(0, 0, 0, 0);
    }

    .rating:not(:checked)>label {
        float: right;
        width: 1em;
        /* padding:0 .1em; */
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 150%;
        /* line-height:1.2; */
        color: #ddd;
    }

    .rating:not(:checked)>label:before {
        content: '★ ';
    }

    .rating>input:checked~label {
        color: dodgerblue;

    }

    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: dodgerblue;

    }

    .rating>input:checked+label:hover,
    .rating>input:checked+label:hover~label,
    .rating>input:checked~label:hover,
    .rating>input:checked~label:hover~label,
    .rating>label:hover~input:checked~label {
        color: dodgerblue;

    }

    .rating>label:active {
        position: relative;
        top: 2px;
        left: 2px;
    }
    td{
        padding:20px;
    }
    tr:nth-child(even) {
  background-color: #f2f2f2;
}


</style>
<?php $detail  = $data['get_school_detail']; ?>

<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/school_cover.png)">
    </div>
    <div class="page-header-shape-1"><img src="<?php echo URLROOT; ?>/assets_home/images/shapes/page-header-shape-1.png" alt=""></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>School Details</li>
            </ul>
            <h2><i class="fa fa-university" aria-hidden="true"></i><?php echo $detail->school_name; ?></h2>
            <style>
                .checked_special {
                    color: orange;
                }
            </style>
            <p>
                <span style="font-size:20px;"> 8.0</span>/10
                <span class="fa fa-star checked_special"></span>
                <span class="fa fa-star checked_special"></span>
                <span class="fa fa-star checked_special"></span>
                <span class="fa fa-star checked_special"></span>
                <span class="fa fa-star"></span>

            </p>
            <div class="row">

                <div class="col-md-2">
                    <?php if (isset($detail->school_address)) { ?> <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $detail->school_address ?> <?php } ?>&ensp;
                </div>
                <div class="col-md-2">
                    <?php if (isset($detail->year_of_establishment)) { ?> <i class="fa fa-history" aria-hidden="true"></i>&nbsp;ESTD: <?php echo $detail->year_of_establishment ?> <?php } ?>&ensp;
                </div>
                <div class="col-md-2">

                    <?php if (isset($detail->school_type)) { ?><i class="fa fa-star" aria-hidden="true"></i>
                        <?php if ($detail->school_type == 1) {
                            echo "Private";
                        } elseif ($detail->school_type == 1) {
                            echo "Government";
                        } else {
                            echo "OodlesIN"; ?> <?php }
                                        } ?></i>

                </div>
                <div class="col-md-2">

                    <?php if (isset($detail->recognized_by)) { ?><i class="fa fa-thumb-tack" aria-hidden="true"></i></i>
                        <?php if ($detail->recognized_by == 1) {
                            echo "AICTE";
                        } elseif ($detail->recognized_by == 2) {
                            echo "PCI";
                        } else {
                            echo "NBA"; ?> <?php }
                                    } ?></i>
                </div>
                <div class="col-md-4">
                </div>

            </div>
        </div>
</section>
<!--Page Header End-->

<!--Portfolio Details Start-->
<section class="portfolio-details">
    <div class="container">


        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="get-insurance__right">

                        <div class="get-insurance__tab">
                            <div class="get-insurance__tab-box tabs-box">
                                <ul class="tab-buttons clearfix list-unstyled">
                                    <li data-tab="#overview" class="tab-btn  active-btn"><span>Overview</span></li>

                                    <?php if ((!empty($detail->admission_fee)) ||  (!empty($detail->mode_of_admission)) || (!empty($detail->how_to_apply))) { ?>
                                        <li data-tab="#admission" class="tab-btn"><span>Admission </span></li>
                                    <?php } ?>
                                    <?php if ((!empty($detail->scholastic_info))) { ?>
                                        <li data-tab="#scholastic" class="tab-btn"><span>Scholastic</span></li>
                                    <?php } ?>
                                    <?php if ((!empty($detail->coscholastic_info))) { ?>
                                        <li data-tab="#coscholastic" class="tab-btn"><span>Co-Scholastic</span></li>
                                    <?php } ?>
                                    <?php if ((!empty($detail->achievement_info)) || (!empty($detail->achievement_images))) { ?>
                                        <li data-tab="#achievements" class="tab-btn"><span>Achievements</span></li>
                                    <?php } ?>

                                    <?php if ((!empty($detail->facility_info)) || (!empty($detail->facility_images))) { ?>
                                        <li data-tab="#facility" class="tab-btn"><span>Facilites & Infrastructure</span></li>
                                    <?php } ?>
                                    <?php if ((!empty($detail->extra_curricular_info)) || (!empty($detail->extra_curricular_images))) { ?>
                                        <li data-tab="#extra" class="tab-btn"><span>Extra Curricular</span></li>
                                    <?php } ?>
                                    <?php if ((!empty($detail->academic_info)) || (!empty($detail->academic_images))) { ?>
                                        <li data-tab="#academic" class="tab-btn"><span>Academics</span></li>
                                    <?php } ?>
                                    <?php if ((!empty($detail->faculty_info)) || (!empty($detail->faculty_images))) { ?>
                                        <li data-tab="#faculty" class="tab-btn "><span>Faculty</span></li>
                                    <?php } ?>
                                    <li data-tab="#reviews" class="tab-btn "><span>Reviews</span></li>

                                    <?php if ((!empty($detail->gallery))) { ?>
                                        <li data-tab="#gallery" class="tab-btn"><span>Gallery</span></li>
                                    <?php } ?>
                                    <?php if (!empty($detail->question_faq)) {
                                        if (!empty($detail->question_faq)) {
                                    ?>
                                            <li data-tab="#faq" class="tab-btn"><span>FAQ's</span></li>
                                        <?php } ?>
                                    <?php } ?>

                                </ul>
                                <div class="tabs-content">
                                    <!--tab-->
                                    <div class="tab active-tab" id="overview">
                                        <div class="get-insurance__content">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="portfolio-details__content-left">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="portfolio-details__img" style="text-align:center;">
                                                                    <img src="<?php echo URLROOT ?>/uploads/<?php echo $detail->school_image ?>" alt="" style="height:200px;width:200px; display:inline-block;">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <h3 style="text-align:center;" class="portfolio-details__title"><?php echo $detail->school_name ?></h3>

                                                        <p class="portfolio-details__text-2"><?php echo $detail->school_info ?></p>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <?php if (!empty($detail->admission_fee)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Basic Admission Fee
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title table-responsive-sm table-responsive-md table-responsive-lg"><?php echo $detail->admission_fee ?></h5>
                                                    </div>
                                                </div>
                                                <br>
                                            <?php } ?>
                                            <?php if (!empty($detail->mode_of_admission)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Application Mode
                                                    </div>
                                                    <div class="card-body">
                                                        <?php $array = explode(',', $detail->mode_of_admission);
                                                        foreach ($array as $value) { ?>
                                                            <?php if ($value == 1) { ?>
                                                                Online
                                                            <?php } elseif ($value == 2) { ?>
                                                                Offline
                                                            <?php } elseif ($value == 3) { ?>
                                                                Both
                                                            <?PHP } ?>
                                                        <?PHP } ?>
                                                    </div>
                                                </div>
                                                <br>
                                            <?php } ?>

                                            <?php if (!empty($detail->how_to_apply)) { ?>
                                                <div class="card mb-3" style="max-width: 100%;">
                                                    <div class="card-header">How to Apply?</div>
                                                    <div class="card-body ">
                                                        <h5 class="card-title"><?php echo $detail->how_to_apply ?></h5>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php  if (!empty($detail->scholastic_info)) {  ?>
                                            <div class="card">
                                            <div class="card-header">
                                                Scholastic
                                            </div>
                                            <?php if (!empty($detail->scholastic_info)) { ?>
                                                <div class="card-body">
                                                    <blockquote class="blockquote mb-0">
                                                        <p><?php echo $detail->scholastic_info ?></p>
                                                    </blockquote>
                                                </div>
                                            <?php } ?>

                                        </div>
                                        <br>
                                        <?php } ?>
                                       <?php  if (!empty($detail->scholastic)) {  ?>
                                        <div class="card">
                                            <div class="card-header">
                                                Scholastic Type
                                            </div>
                                            <?php if (!empty($detail->scholastic)) { ?>
                                                <div class="card-body">
                                                    <?php if ($detail->scholastic == 1) { ?>
                                                        A
                                                    <?php } elseif ($detail->scholastic == 2) { ?>
                                                        B
                                                    <?php } elseif ($detail->scholastic == 3) { ?>
                                                        C
                                                    <?php } ?>
                                                </div>

                                            <?php } ?>
                                        </div>
                                        <br>
<?php } ?>
<?php  if (!empty($detail->coscholastic_info)) {  ?>
    <div class="card">
                                            <div class="card-header">
                                                Co-Scholastic
                                            </div>
                                            <?php if (!empty($detail->coscholastic_info)) { ?>
                                                <div class="card-body">
                                                    <blockquote class="blockquote mb-0">
                                                        <p><?php echo $detail->coscholastic_info ?></p>
                                                    </blockquote>
                                                </div>
                                            <?php } ?>

                                        </div>
                                        <br>
                                        <?php } ?>
<?php  if (!empty($detail->coscholastic)) {  ?>
    <div class="card">
                                            <div class="card-header">
                                                Co-Scholastic Type
                                            </div>
                                            <?php if (!empty($detail->coscholastic)) { ?>
                                                <div class="card-body">
                                                    <?php if ($detail->coscholastic == 1) { ?>
                                                        A
                                                    <?php } elseif ($detail->coscholastic == 2) { ?>
                                                        B
                                                    <?php } elseif ($detail->coscholastic == 3) { ?>
                                                        C
                                                    <?php } ?>
                                                </div>

                                            <?php } ?>
                                        </div>
                                        <br>
                                        <?php } ?>
                                        <div class="get-insurance__content">
                                            <?php if (!empty($detail->admission->criteria)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Basic Admission Criteria
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title table-responsive-sm table-responsive-md table-responsive-lg "><?php echo $detail->admission_criteria ?></h5>
                                                    </div>
                                                </div>
                                                <br>
                                            <?php } ?>
                                            <?php if (!empty($detail->mode_of_admission)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Application Mode
                                                    </div>
                                                    <div class="card-body">
                                                        <?php $array = explode(',', $detail->mode_of_admission);
                                                        foreach ($array as $value) { ?>
                                                            <?php if ($value == 1) { ?>
                                                                Online
                                                            <?php } elseif ($value == 2) { ?>
                                                                Offline
                                                            <?php } elseif ($value == 3) { ?>
                                                                Both
                                                            <?PHP } ?>
                                                        <?PHP } ?>
                                                    </div>
                                                </div>

                                                <br>
                                            <?php } ?>
                                            <?php if (!empty($detail->entrance_exam)) { ?>
                                                <div class="card mb-3" style="max-width: 100%;">
                                                    <div class="card-header">University Entrance Exam</div>
                                                    <div class="card-body">
                                                        <?php echo $detail->entrance_exam; ?>
                                                    </div>
                                                </div>
                                                <br>
                                            <?php } ?>
                                            <?php if (!empty($detail->how_to_apply)) { ?>
                                                <div class="card mb-3" style="max-width: 100%;">
                                                    <div class="card-header">How to Apply?</div>
                                                    <div class="card-body ">
                                                        <h5 class="card-title"><?php echo $detail->how_to_apply ?></h5>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php if (!empty($detail->cut_off_year)) { ?>
                                            <div class="get-insurance__content">
                                                <div class="card">
                                                    <div class="card-header">
                                                        CutOff
                                                    </div>
                                                    <div class="card-body">

                                                        <div class="card-body">
                                                            <h5 class="card-title table-responsive-sm table-responsive-md table-responsive-lg"><?php echo $detail->cut_off_marks ?></h5>
                                                        </div>


                                                    </div>


                                                </div>
                                            </div>
                                            <br>
                                        <?php } ?>
                                        <?php if ((!empty($detail->placement_images)) || (!empty($detail->placement))) { ?>
                                            <div class="card">
                                                <div class="card-header">
                                                    Placement
                                                </div>
                                                <?php if (!empty($detail->placement)) { ?>
                                                    <div class="card-body">
                                                        <blockquote class="blockquote mb-0">
                                                            <p><?php echo $detail->placement ?></p>

                                                        </blockquote>
                                                    </div>
                                                <?php } ?>
                                                <?php if (!empty($detail->placement_images)) { ?>
                                                    <div class="row">

                                                        <?php $array = explode(',', $detail->placement_images);
                                                        foreach ($array as $value) { ?>
                                                            <div class="col-md-3">
                                                                <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="..." style="max-height:200px; max-width:100%;">
                                                            </div>
                                                        <?php     } ?>


                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <br>
                                        <?php } ?>
                                        <?php if (!empty($detail->gallery)) { ?>
                                            <div class="get-insurance__content">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Gallery
                                                    </div>


                                                    <div class="row">

                                                        <?php $array = explode(',', $detail->gallery);
                                                        foreach ($array as $value) { ?>
                                                            <div class="col-md-3">
                                                                <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
                                                            </div>
                                                        <?php     } ?>


                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        <?php } ?>
                                        <?php if (!empty($detail->scholarship)) { ?>
                                            <div class="get-insurance__content">

                                                <div class="card">
                                                    <div class="card-header">
                                                        Scholarship
                                                    </div>
                                                    <div class="card-body">
                                                        <!-- <h5 class="card-title">Scholarship</h5> -->

                                                        <p class="portfolio-details__text-1"><?php echo $detail->scholarship ?> </p>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        <?php } ?>
                                        <?php if ((!empty($detail->faculty)) || !empty($detail->faculty_images)) { ?>
                                            <div class="get-insurance__content">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Faculty
                                                    </div>
                                                    <?php if (!empty($detail->faculty)) { ?>
                                                        <div class="card-body">
                                                            <p class="portfolio-details__text-1"><?php echo $detail->faculty ?> </p>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (!empty($detail->faculty_images)) { ?>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <?php $array = explode(',', $detail->faculty_images);
                                                                foreach ($array as $value) { ?>
                                                                    <div class="col-md-3">
                                                                        <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
                                                                    </div>
                                                                <?php     } ?>
                                                            </div>

                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <br>
                                        <?php } ?>
                                        <?php if ((!empty($detail->hostel)) || !empty($detail->hostel_images)) { ?>
                                            <div class="get-insurance__content">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Hostel
                                                    </div>
                                                    <?php if (!empty($detail->hostel)) { ?>
                                                        <div class="card-body">
                                                            <p class="portfolio-details__text-1"><?php echo $detail->hostel ?> </p>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (!empty($detail->hostel_images)) { ?>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <?php $array = explode(',', $detail->hostel_images);
                                                                foreach ($array as $value) { ?>
                                                                    <div class="col-md-3">
                                                                        <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
                                                                    </div>
                                                                <?php     } ?>

                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>



                                                </h6>
                                            </div>
                                            <br>
                                        <?php } ?>
                                        <?php if (!empty($detail->question_faq)) {
                                            if (!empty($detail->question_faq)) {
                                        ?>
                                                <div class="get-insurance__content">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            Featured
                                                        </div>
                                                        <div class="card-body">
                                                            <!--FAQ One Start-->
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-lg-12">
                                                                        <div class="faq-one__single">
                                                                            <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-1">
                                                                                <?php
                                                                                $question_faq = explode(',', $detail->question_faq);
                                                                                $answer_faq = explode(',', $detail->answer_faq);
                                                                                $comma_count = substr_count($detail->question_faq, ",") + 1;
                                                                                for ($x = 0; $x < $comma_count; $x++) { ?>
                                                                                    <div class="accrodion">
                                                                                        <div class="accrodion-title">
                                                                                            <h4><span><?php echo ($x + 1) ?></span> <?php echo $question_faq[$x]; ?></h4>
                                                                                        </div>
                                                                                        <div class="accrodion-content">
                                                                                            <div class="inner">
                                                                                                <p><?php echo $answer_faq[$x]; ?></p>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--FAQ One End-->

                                                        </div>
                                                    </div>

                                                </div>
                                                <br>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if ((!empty($detail->alumni)) || !empty($detail->alumni_images)) { ?>
                                            <div class="get-insurance__content">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Alumni
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="portfolio-details__text-1"><?php echo $detail->alumni ?> </p>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <?php $array = explode(',', $detail->alumni_images);
                                                            foreach ($array as $value) { ?>
                                                                <div class="col-md-3">
                                                                    <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
                                                                </div>
                                                            <?php     } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>
                                    <!-- overview -->


                                    <!--tab-->
                                    <!-- admission tab start -->
                                    <div class="tab " id="admission">
                                        <div class="get-insurance__content">
                                            <?php if (!empty($detail->admission_fee)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Basic Admission Fee
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title table-responsive-sm table-responsive-md table-responsive-lg"><?php echo $detail->admission_fee ?></h5>
                                                    </div>
                                                </div>
                                                <br>
                                            <?php } ?>
                                            <?php if (!empty($detail->mode_of_admission)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Application Mode
                                                    </div>
                                                    <div class="card-body">
                                                        <?php $array = explode(',', $detail->mode_of_admission);
                                                        foreach ($array as $value) { ?>
                                                            <?php if ($value == 1) { ?>
                                                                Online
                                                            <?php } elseif ($value == 2) { ?>
                                                                Offline
                                                            <?php } elseif ($value == 3) { ?>
                                                                Both
                                                            <?PHP } ?>
                                                        <?PHP } ?>
                                                    </div>
                                                </div>
                                                <br>
                                            <?php } ?>

                                            <?php if (!empty($detail->how_to_apply)) { ?>
                                                <div class="card mb-3" style="max-width: 100%;">
                                                    <div class="card-header">How to Apply?</div>
                                                    <div class="card-body ">
                                                        <h5 class="card-title"><?php echo $detail->how_to_apply ?></h5>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <!--tab-->



                                    <div class="tab" id="reviews">
                                        <div class="get-insurance__content">

                                            <!-- Review php code -->
                                            <?php
                                            $academic_count = 0;
                                            $academic_rating_sum = 0;
                                            foreach ($data['get_rating_school'] as $rating_detail) {
                                                if (!empty($rating_detail->academic)) {
                                                    $academic_count++;
                                                    $academic_rating_sum += $rating_detail->academic;
                                                }
                                            }
                                            if (!empty($rating_detail->academic)) {
                                                $final_academic_rating = $academic_rating_sum / $academic_count;
                                            } else {
                                                $final_academic_rating = 10;
                                            }
                                         
                                            $faculty_count = 0;
                                            $faculty_rating_sum = 0;
                                            foreach ($data['get_rating_school'] as $rating_detail) {
                                                if (!empty($rating_detail->faculty)) {
                                                    $faculty_count++;
                                                    $faculty_rating_sum += $rating_detail->faculty;
                                                }
                                            }
                                            if (!empty($rating_detail->faculty)) {
                                                $final_faculty_rating = $faculty_rating_sum / $faculty_count;
                                            } else {
                                                $final_faculty_rating = 10;
                                            }
                                            $infra_count = 0;
                                            $infra_rating_sum = 0;
                                            foreach ($data['get_rating_school'] as $rating_detail) {
                                                if (!empty($rating_detail->infra)) {
                                                    $infra_count++;
                                                    $infra_rating_sum += $rating_detail->infra;
                                                }
                                            }
                                            if (!empty($rating_detail->infra)) {
                                                $final_infra_rating = $infra_rating_sum / $infra_count;
                                            } else {
                                                $final_infra_rating = 10;
                                            }
                                            $nonacademic_count = 0;
                                            $nonacademic_rating_sum = 0;
                                            foreach ($data['get_rating_school'] as $rating_detail) {
                                                if (!empty($rating_detail->nonacademic)) {
                                                    $nonacademic_count++;
                                                    $nonacademic_rating_sum += $rating_detail->nonacademic;
                                                }
                                            }
                                            if (!empty($rating_detail->nonacademic)) {
                                                $final_nonacademic_rating = $nonacademic_rating_sum / $nonacademic_count;
                                            } else {
                                                $final_nonacademic_rating = 10;
                                            }
                                            ?>
                                            <!-- reviews php code end -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="card border-dark mb-3" style="max-width: 12rem;">
                                                        <div class="card-header" style="float:center;">Academic</div>
                                                        <div class="card-body text-dark">

                                                            <h5 class="card-title text-center"><?php echo sprintf('%0.1f', round($final_academic_rating, 1)); ?>/10</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                                <div class="col-md-3">
                                                    <div class="card border-dark mb-3" style="max-width: 12rem;">
                                                        <div class="card-header" style="float:center;">Faculty</div>
                                                        <div class="card-body text-dark">
                                                            <h5 class="card-title text-center"><?php echo sprintf('%0.1f', round($final_faculty_rating, 1)); ?>/10</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card border-dark mb-3" style="max-width: 12rem;">
                                                        <div class="card-header" style="float:center;">Infrastructure</div>
                                                        <div class="card-body text-dark">

                                                            <h5 class="card-title text-center"><?php echo sprintf('%0.1f', round($final_infra_rating, 1)); ?>/10</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card border-dark mb-3" style="max-width: 12rem;">
                                                        <div class="card-header" style="float:center;">Non Academmic</div>
                                                        <div class="card-body text-dark">
                                                            <h5 class="card-title text-center"><?php echo sprintf('%0.1f', round($final_nonacademic_rating, 1)); ?>/10</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                            </div>

                                            <section class="news-details">
                                                <div class="container">
                                                    <div class="row">
                                                        <?php $comment_count = 0;
                                                        foreach ($data['get_rating_school'] as $rating_detail) {
                                                            if (!empty($rating_detail->review)) {
                                                                $comment_count++;
                                                            }
                                                        } ?>
                                                        <div class="col-xl-10 col-lg-10">
                                                            <div class="news-details__left">
                                                                <div class="comment-one">
                                                                    <h3 class="comment-one__title"><?php echo $comment_count ?> comments</h3>
                                                                    <?php
                                                                    $comment_hiding_count = 0;
                                                                    foreach ($data['get_rating_school'] as $rating_detail) {

                                                                    ?>
                                                                        <?php if (!empty($rating_detail->review)) {
                                                                            $comment_hiding_count++;
                                                                            if ($comment_hiding_count <= 4) { ?>

                                                                                <div class="comment-one__single">
                                                                                    <div class="comment-one__image">
                                                                                        <img src="<?php echo URLROOT ?>/assets_home/images/about/user.jpg" alt="">
                                                                                    </div>

                                                                                    <div class="comment-one__content">
                                                                                        <h3><?php echo $rating_detail->user_id ?></h3>
                                                                                        <p><?php echo $rating_detail->review ?></p>
                                                                                        <!-- <a href="" class="thm-btn comment-one__btn" style="float:right";>Reply</a> -->
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </section>
                                            <!-- Rating input -->
                                            <?php
                                            if (isset($_SESSION['rexkod_oodles_student_id'])) {
                                                $user_id =  $_SESSION['rexkod_oodles_student_id'];
                                            } else {
                                                $user_id = 0;
                                            }
                                            $school_id = $detail->id;
                                            ?>
                                            <form action="<?php echo URLROOT; ?>/home/rating_school/<?php echo $user_id ?>/<?php echo $school_id ?>" method="POST">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-3">Academic</div>
                                                        <div class="col-md-3">
                                                            <div class="rating" style="float:left;">

                                                                <input type="radio" id="star10_1" name="review_academic_10" value="10" /><label for="star10_1" title="Rocks!">5 stars</label>
                                                                <input type="radio" id="star9_1" name="review_academic_9" value="9" /><label for="star9_1" title="Rocks!">4 stars</label>
                                                                <input type="radio" id="star8_1" name="review_academic_8" value="8" /><label for="star8_1" title="Pretty good">3 stars</label>
                                                                <input type="radio" id="star7_1" name="review_academic_7" value="7" /><label for="star7_1" title="Pretty good">2 stars</label>
                                                                <input type="radio" id="star6_1" name="review_academic_6" value="6" /><label for="star6_1" title="Meh">1 star</label>
                                                                <input type="radio" id="star5_1" name="review_academic_5" value="5" /><label for="star5_1" title="Meh">5 stars</label>
                                                                <input type="radio" id="star4_1" name="review_academic_4" value="4" /><label for="star4_1" title="Kinda bad">4 stars</label>
                                                                <input type="radio" id="star3_1" name="review_academic_3" value="3" /><label for="star3_1" title="Kinda bad">3 stars</label>
                                                                <input type="radio" id="star2_1" name="review_academic_2" value="2" /><label for="star2_1" title="Sucks big tim">2 stars</label>
                                                                <input type="radio" id="star1_1" name="review_academic_1" value="1" /><label for="star1_1" title="Sucks big time">1 star</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"></div>
                                                     
                                                        <div class="col-md-3">Faculty</div>
                                                        <div class="col-md-3">
                                                            <div class="rating" style="float:left;">

                                                                <input type="radio" id="star10_3" name="review_faculty_10" value="10" /><label for="star10_3" title="Rocks!">5 stars</label>
                                                                <input type="radio" id="star9_3" name="review_faculty_9" value="9" /><label for="star9_3" title="Rocks!">4 stars</label>
                                                                <input type="radio" id="star8_3" name="review_faculty_8" value="8" /><label for="star8_3" title="Pretty good">3 stars</label>
                                                                <input type="radio" id="star7_3" name="review_faculty_7" value="7" /><label for="star7_3" title="Pretty good">2 stars</label>
                                                                <input type="radio" id="star6_3" name="review_faculty_6" value="6" /><label for="star6_3" title="Meh">1 star</label>
                                                                <input type="radio" id="star5_3" name="review_faculty_5" value="5" /><label for="star5_3" title="Meh">5 stars</label>
                                                                <input type="radio" id="star4_3" name="review_faculty_4" value="4" /><label for="star4_3" title="Kinda bad">4 stars</label>
                                                                <input type="radio" id="star3_3" name="review_faculty_3" value="3" /><label for="star3_3" title="Kinda bad">3 stars</label>
                                                                <input type="radio" id="star2_3" name="review_faculty_2" value="2" /><label for="star2_3" title="Sucks big tim">2 stars</label>
                                                                <input type="radio" id="star1_3" name="review_faculty_1" value="1" /><label for="star1_3" title="Sucks big time">1 star</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"></div>
                                                        <div class="col-md-3">Infrastructure</div>
                                                        <div class="col-md-3">
                                                            <div class="rating" style="float:left;">

                                                                <input type="radio" id="star10_4" name="review_infrastructure_10" value="10" /><label for="star10_4" title="Rocks!">5 stars</label>
                                                                <input type="radio" id="star9_4" name="review_infrastructure_9" value="9" /><label for="star9_4" title="Rocks!">4 stars</label>
                                                                <input type="radio" id="star8_4" name="review_infrastructure_8" value="8" /><label for="star8_4" title="Pretty good">3 stars</label>
                                                                <input type="radio" id="star7_4" name="review_infrastructure_7" value="7" /><label for="star7_4" title="Pretty good">2 stars</label>
                                                                <input type="radio" id="star6_4" name="review_infrastructure_6" value="6" /><label for="star6_4" title="Meh">1 star</label>
                                                                <input type="radio" id="star5_4" name="review_infrastructure_5" value="5" /><label for="star5_4" title="Meh">5 stars</label>
                                                                <input type="radio" id="star4_4" name="review_infrastructure_4" value="4" /><label for="star4_4" title="Kinda bad">4 stars</label>
                                                                <input type="radio" id="star3_4" name="review_infrastructure_3" value="3" /><label for="star3_4" title="Kinda bad">3 stars</label>
                                                                <input type="radio" id="star2_4" name="review_infrastructure_2" value="2" /><label for="star2_4" title="Sucks big tim">2 stars</label>
                                                                <input type="radio" id="star1_4" name="review_infrastructure_1" value="1" /><label for="star1_4" title="Sucks big time">1 star</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"></div>
                                                     
                                                    
                                                       
                                                        <div class="col-md-3">Non-Academic Life</div>
                                                        <div class="col-md-3">
                                                            <div class="rating" style="float:left;">

                                                                <input type="radio" id="star108" name="review_nonacademic_10" value="10" /><label for="star108" title="Rocks!">5 stars</label>
                                                                <input type="radio" id="star98" name="review_nonacademic_9" value="9" /><label for="star98" title="Rocks!">4 stars</label>
                                                                <input type="radio" id="star88" name="review_nonacademic_8" value="8" /><label for="star88" title="Pretty good">3 stars</label>
                                                                <input type="radio" id="star78" name="review_nonacademic_7" value="7" /><label for="star78" title="Pretty good">2 stars</label>
                                                                <input type="radio" id="star68" name="review_nonacademic_6" value="6" /><label for="star68" title="Meh">1 star</label>
                                                                <input type="radio" id="star58" name="review_nonacademic_5" value="5" /><label for="star58" title="Meh">5 stars</label>
                                                                <input type="radio" id="star48" name="review_nonacademic_4" value="4" /><label for="star48" title="Kinda bad">4 stars</label>
                                                                <input type="radio" id="star38" name="review_nonacademic_3" value="3" /><label for="star38" title="Kinda bad">3 stars</label>
                                                                <input type="radio" id="star28" name="review_nonacademic_2" value="2" /><label for="star28" title="Sucks big tim">2 stars</label>
                                                                <input type="radio" id="star18" name="review_nonacademic_1" value="1" /><label for="star18" title="Sucks big time">1 star</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"></div>
                                                    </div><br>

                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="comment-form__input-box text-message-box">
                                                                <textarea name="review" placeholder="Write a comment"></textarea>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <br><br>
                                                    <?php
                                                    if (isset($_SESSION['rexkod_oodles_student_id'])) { ?>
                                                        <div class="col-xl-12">
                                                            <div class="comment-form__btn-box">
                                                                <button type="submit" class="thm-btn comment-form__btn">Submit comment</button>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="col-sm-4"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Login to Comment</button></div>
                                                    <?php      } ?>
                                                    <!-- new code for rating -->


                                                </div>

                                            </form>
                                            <!-- Rating input end -->
                                        </div>
                                    </div>


                                    <!--tab-->
                                    <div class="tab" id="scholastic">
                                        <div class="card">
                                            <div class="card-header">
                                                Scholastic
                                            </div>
                                            <?php if (!empty($detail->scholastic_info)) { ?>
                                                <div class="card-body">
                                                    <blockquote class="blockquote mb-0">
                                                        <p><?php echo $detail->scholastic_info ?></p>
                                                    </blockquote>
                                                </div>
                                            <?php } ?>

                                        </div>
                                        <br>
                                        <div class="card">
                                            <div class="card-header">
                                                Scholastic
                                            </div>
                                            <?php if (!empty($detail->scholastic)) { ?>
                                                <div class="card-body">
                                                    <?php if ($detail->scholastic == 1) { ?>
                                                        A
                                                    <?php } elseif ($detail->scholastic == 2) { ?>
                                                        B
                                                    <?php } elseif ($detail->scholastic == 3) { ?>
                                                        C
                                                    <?php } ?>
                                                </div>

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--tab-->
                                    <div class="tab" id="coscholastic">
                                        <div class="card">
                                            <div class="card-header">
                                                Co-Scholastic
                                            </div>
                                            <?php if (!empty($detail->coscholastic_info)) { ?>
                                                <div class="card-body">
                                                    <blockquote class="blockquote mb-0">
                                                        <p><?php echo $detail->coscholastic_info ?></p>
                                                    </blockquote>
                                                </div>
                                            <?php } ?>

                                        </div>
                                        <br>
                                        <div class="card">
                                            <div class="card-header">
                                                Co-Scholastic Type
                                            </div>
                                            <?php if (!empty($detail->coscholastic)) { ?>
                                                <div class="card-body">
                                                    <?php if ($detail->coscholastic == 1) { ?>
                                                        A
                                                    <?php } elseif ($detail->coscholastic == 2) { ?>
                                                        B
                                                    <?php } elseif ($detail->coscholastic == 3) { ?>
                                                        C
                                                    <?php } ?>
                                                </div>

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--tab-->

                                    <div class="tab" id="gallery">
                                        <div class="get-insurance__content">
                                            <?php if (!empty($detail->gallery)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Gallery
                                                    </div>


                                                    <div class="row">

                                                        <?php $array = explode(',', $detail->gallery);
                                                        foreach ($array as $value) { ?>
                                                            <div class="col-md-3">
                                                                <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
                                                            </div>
                                                        <?php     } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--tab-->

                                    <div class="tab" id="achievements">
                                        <div class="get-insurance__content">
                                            <?php if (!empty($detail->achievement_info)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Achievements
                                                    </div>
                                                    <div class="card-body">
                                                        <!-- <h5 class="card-title">Scholarship</h5> -->

                                                        <p class="portfolio-details__text-1"><?php echo $detail->achievement_info ?> </p>
                                                        </h6>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <br>
                                            <?php if (!empty($detail->achievement_images)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Images
                                                    </div>


                                                    <div class="row">

                                                        <?php $array = explode(',', $detail->achievement_images);
                                                        foreach ($array as $value) { ?>
                                                            <div class="col-md-3">
                                                                <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
                                                            </div>
                                                        <?php     } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <!--tab-->
                                    <!--tab-->

                                    <div class="tab" id="facility">
                                        <div class="get-insurance__content">
                                            <?php if (!empty($detail->facility)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Facility Available
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list">
                                                            <?php $array = explode(',', $detail->facility);
                                                            foreach ($array as $value) { ?>

                                                                <?php if ($value == 1) {
                                                                    echo "<li>Library</li>";
                                                                } elseif ($value == 2) {
                                                                    echo "<li>Medical</li>";
                                                                } elseif ($value == 3) {
                                                                    echo "<li>Hostel</li>";
                                                                } elseif ($value == 4) {
                                                                    echo "<li>Medical Ventilated</li>";
                                                                }
                                                                ?>


                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <br>
                                            <?php if (!empty($detail->facility_info)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Facility
                                                    </div>
                                                    <div class="card-body">
                                                        <!-- <h5 class="card-title">Scholarship</h5> -->

                                                        <p class="portfolio-details__text-1"><?php echo $detail->facility_info ?> </p>
                                                        </h6>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <br>
                                            <?php if (!empty($detail->facility_images)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Images
                                                    </div>


                                                    <div class="row">

                                                        <?php $array = explode(',', $detail->facility_images);
                                                        foreach ($array as $value) { ?>
                                                            <div class="col-md-3">
                                                                <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
                                                            </div>
                                                        <?php     } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <!--tab-->
                                    <!--tab-->

                                    <div class="tab" id="extra">
                                        <div class="get-insurance__content">

                                            <?php if (!empty($detail->extra_curricular_info)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Extra Curricular
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="portfolio-details__text-1"><?php echo $detail->extra_curricular_info ?> </p>
                                                        </h6>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <br>
                                            <?php if (!empty($detail->extra_curricular_images)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Images
                                                    </div>
                                                    <div class="row">
                                                        <?php $array = explode(',', $detail->extra_curricular_images);
                                                        foreach ($array as $value) { ?>
                                                            <div class="col-md-3">
                                                                <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
                                                            </div>
                                                        <?php     } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--tab-->

                                    <div class="tab" id="academic">
                                        <div class="get-insurance__content">

                                            <?php if (!empty($detail->academic_info)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Acaedemic </div>
                                                    <div class="card-body">
                                                        <p class="portfolio-details__text-1"><?php echo $detail->academic_info ?> </p>
                                                        </h6>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <br>
                                            <?php if (!empty($detail->academic_images)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Images
                                                    </div>
                                                    <div class="row">
                                                        <?php $array = explode(',', $detail->academic_images);
                                                        foreach ($array as $value) { ?>
                                                            <div class="col-md-3">
                                                                <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
                                                            </div>
                                                        <?php     } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <!--tab-->
                                    <div class="tab" id="faculty">
                                        <div class="get-insurance__content">

                                            <?php if (!empty($detail->faculty_info)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Faculty
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="portfolio-details__text-1"><?php echo $detail->faculty_info ?> </p>
                                                        </h6>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <br>
                                            <?php if (!empty($detail->faculty_images)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Images
                                                    </div>
                                                    <div class="row">
                                                        <?php $array = explode(',', $detail->faculty_images);
                                                        foreach ($array as $value) { ?>
                                                            <div class="col-md-3">
                                                                <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
                                                            </div>
                                                        <?php     } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--tab-->
                                    <div class="tab" id="faculty">
                                        <div class="get-insurance__content">

                                            <?php if (!empty($detail->faculty_info)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Faculty
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="portfolio-details__text-1"><?php echo $detail->faculty_info ?> </p>
                                                        </h6>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <br>
                                            <?php if (!empty($detail->faculty_images)) { ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        Images
                                                    </div>
                                                    <div class="row">
                                                        <?php $array = explode(',', $detail->faculty_images);
                                                        foreach ($array as $value) { ?>
                                                            <div class="col-md-3">
                                                                <img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
                                                            </div>
                                                        <?php     } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                  
                                   <!-- tab -->
                                    <div class="tab" id="faq">
                                        <div class="get-insurance__content">
                                            <div class="card">
                                                <div class="card-header">
                                                    Featured

                                                </div>
                                                <div class="card-body">
                                                    <!--FAQ One Start-->
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12">
                                                                <div class="faq-one__single">
                                                                    <div class="accrodion-grp faq-one-accrodion" data-grp-name="faq-one-accrodion-1">
                                                                        <?php
                                                                        $question_faq = explode(',', $detail->question_faq);
                                                                        $answer_faq = explode(',', $detail->answer_faq);
                                                                        $comma_count = substr_count($detail->question_faq, ",") + 1;
                                                                        for ($x = 0; $x < $comma_count; $x++) { ?>
                                                                            <div class="accrodion">
                                                                                <div class="accrodion-title">
                                                                                    <h4><span><?php echo ($x + 1) ?></span> <?php echo $question_faq[$x]; ?></h4>
                                                                                </div>
                                                                                <div class="accrodion-content">
                                                                                    <div class="inner">
                                                                                        <p><?php echo $answer_faq[$x]; ?></p>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <!--FAQ One End-->

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                   
                                    <!--tab-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
</section>




<!-- Login modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo URLROOT; ?>/home/school_login/<?php echo $college_id ?>" autocomplete="off" class="register-form">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <h2 class="form-title">Login</h2><br> -->
                        <div class="">
                            <input type="text" name="username" placeholder="Your Email ID / Mobile No" class="valo form-control input-height" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="">
                            <input type="password" name="password" placeholder="Password" class="valo form-control input-height" />
                        </div>
                    </div>

                    <div class="form-group form-button" style="text-align:right;">
                        <a href="<?php echo URLROOT; ?>/student/forgot_password" class="signup-image-link">Forgot Password?</a>

                    </div>
                    <!-- style="float:right"  -->
                    <div class="form-group form-button" style="text-align: center;">
                        <!-- <button class="thm-btn comment-form__btn" type="submit">Login</button> -->
                        <!-- <button class="btn btn-round btn-primary" type="submit" >Login</button> -->
                        <!-- <button class="thm-btn main-menu__main-menu-box-get-quote-btn-left" type="submit">Login</button> -->
                    </div>


                    <div class="social-login" style="text-align: center;">
                        <br>

                        <a href="<?php echo URLROOT; ?>/student/register"><span class="social-label">Don't have an account? Create an account</span></a>


                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-round btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal end -->
<?php require APPROOT . "/views/inc_home/footer.php"; ?>