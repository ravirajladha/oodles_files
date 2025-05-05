<?php require APPROOT . "/views/inc_home/header.php"; ?>

<style>
    hr {
        height: 7px;
        color: white;

    }
</style>
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/scholarship_cover.png)">
    </div>
    <div class="page-header-shape-1"><img src="<?php echo URLROOT; ?>/assets_home/images/shapes/page-header-shape-1.png" alt=""></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>Scholarships</li>
            </ul>
            <h2>Scholarships</h2>
        </div>
    </div>
</section>

<section class="container">

    <div class="inbox">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body height-9 p-5">
                        <div class="row">


                            <div class="col-md-10">
                                <div class="row">
                                    <?php foreach ($data['get_all_scholarship'] as $detail) { ?>

                                        <div class="col-lg-6 col-md-6 col-6 col-sm-6 m-3" style="width: 47%;">

                                            <div class="blogThumb">
                                                <div class="row p-2" style="background-color:#E9F4FF;">
                                                    <div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
                                                        <div class="thumb-center">
                                                    <a href="<?php echo URLROOT; ?>/home/scholarship_detail/<?php echo $detail->id ?>">
                                                            <img class="img-responsive" alt="user" src="<?php echo URLROOT ?>/uploads/<?php echo $detail->scholarship_file; ?>" style="width:100px;height:90px;">
                                                    </a>
                                                </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
                                                        <?php
                                                        $end_date = strtotime($detail->end_date);
                                                        $current_date = time();
                                                        $diff_in_seconds = $end_date - $current_date;
                                                        $diff_in_days = floor($diff_in_seconds / (60 * 60 * 24));

                                                        if ($diff_in_days >= 0) {
                                                            if ($diff_in_days == 0) {
                                                                $countdown_text = "Today";
                                                            } else if ($diff_in_days == 1) {
                                                                $countdown_text = "1 Day to go";
                                                            } else {
                                                                $countdown_text = "{$diff_in_days} Days to go";
                                                            }
                                                        } else {
                                                            if ($diff_in_days == -1) {
                                                                $countdown_text = "1 Day ago";
                                                            } else {
                                                                $countdown_text = abs($diff_in_days) . " Days ago";
                                                            }
                                                        }
                                                        
                                                        ?>
                                                        <div class="thumb-center" style="margin-top:10px;background-color:#e9e9d7;vertical-align:center;">
                                                            <i class="material-icons f-left"></i> <?php echo $countdown_text; ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="course-box py-2">
                                                    <a href="<?php echo URLROOT; ?>/home/scholarship_detail/<?php echo $detail->id ?>">
                                                        <h4 style="text-align:center;"><b><u><?php echo $detail->name ?></u></b></h4>
                                                    </a>
                                                </div>

                                                <div class="row" style="background-color:#46aaeb;">
                                                    <div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
                                                        <div class="thumb-center">
                                                            <div class="thumb-center" style="margin-top:10px;"><span style="float:left;font-size:14px;color:blue;">Prize Offer</span><br>
                                                                <p style="font-size:12px;">
                                                                    Rs <?php echo $detail->scholarship_amount ?>, prize<BR>medal and future secure.
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
                                                        <div class="thumb-center" style="margin-top:10px;"><span style="float:left;font-size:14px;color:blue;">Company Name</span><br>
                                                            <p style="font-size:12px;">
                                                                <?php echo $detail->company_name ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-0">
                                                    <a href="<?php echo URLROOT; ?>/home/scholarship_detail/<?php echo $detail->id ?>" class="btn btn-success btn-sm">View Scholarship</a>
                                                </div>
                                            </div>

                                        </div>

                                    <?php } ?>





                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="inbox-sidebar">
                                    <div class="d-grid gap-2">
                                        <a href="email_compose.html" class="btn dark" type="button"><i class="fa fa-edit"></i>Featured Scholarships</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="img-responsive" alt="user" src="../assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
                                        </div>
                                        <div class="col-md-6" style="font-size:12px;">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates impedit exercitationem est.
                                        </div>
                                    </div>
                                    <hr style="height: 7px;color: white;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="img-responsive" alt="user" src="../assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
                                        </div>
                                        <div class="col-md-6" style="font-size:12px;">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates impedit exercitationem est.
                                        </div>
                                    </div>
                                    <hr style="height: 7px;color: white;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="img-responsive" alt="user" src="../assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
                                        </div>
                                        <div class="col-md-6" style="font-size:12px;">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates impedit exercitationem est.
                                        </div>
                                    </div>
                                    <hr style="height: 7px;color: white;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="img-responsive" alt="user" src="../assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
                                        </div>
                                        <div class="col-md-6" style="font-size:12px;">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates impedit exercitationem est.
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>
<!-- start page content -->

<!-- end page content -->
<?php require APPROOT . '/views/inc_home/footer.php'; ?>