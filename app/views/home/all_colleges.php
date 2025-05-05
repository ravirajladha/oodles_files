
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
                        <li>Colleges</li>
                    </ul>
                    <!-- <h2>colleges</h2> -->
                </div>
            </div>
        </section>
        <!--Page Header End-->

 

 <!--Insurance Page Two Start-->
 <section class="insurance-page-two">
            <div class="container">
                <div class="row">
                    <!--Services Two Single Start-->
                    <?php foreach($data['get_college_course'] as $all_course){ ?>
                    <div class="col-xl-2 col-lg-2 col-md-6">
                    <a href="<?php echo URLROOT?>/home/all_college/<?php echo $all_course->id?>">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                <img src="<?php echo URLROOT; ?>/uploads/<?php echo $all_course->college_course_image?>" alt="" style="height:50px;width:50px; clip-path: circle();">
                                </div>
                            </div>
                            <h3 class="services-two__title text-dark" style="font-size:13px;"><?php echo $all_course->college_course?></h3>
                            <?php 
                        $count=0;
                        foreach($data['get_college_detail'] as $all_college){ 
                        $required_college_id = $all_course->id;
                        $college_array_id= explode(',', $all_college->college_course);
             if(in_array($required_college_id, $college_array_id)){ 
$count++; ?>
             <?php } ?>
             <?php } ?>
                            <p class="services-two__text">Number:  <?php echo $count; ?></p>
                        </div></a>
                    </div>
                    <?php } ?>
              
                   
                    <!--Services Two Single End-->
                </div>
            </div>
        </section>
        <!--Insurance Page Two End-->
        <?php require APPROOT . "/views/inc_home/footer.php"; ?>