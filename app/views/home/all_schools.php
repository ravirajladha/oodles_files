
        <?php require APPROOT . "/views/inc_home/header.php"; ?>
        


<section class="page-header">
            <div class="page-header-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/school_cover.png)">
            </div>
            <div class="page-header-shape-1"><img src="<?php echo URLROOT; ?>/assets_home/images/shapes/page-header-shape-1.png" alt=""></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li>Schools</li>
                    </ul>
                    <!-- <h2>Schools</h2> -->
                </div>
            </div>
        </section>
        <!--Page Header End-->

 

 <!--Insurance Page Two Start-->
 <section class="insurance-page-two">
            <div class="container">
                <div class="row">
                    <!--Services Two Single Start-->
                    
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/about/school.png" alt=""  style="height:60px;width:60px; clip-path: circle();">
                                </div>
                            </div>
                            <h3 class="services-two__title"><a href="<?php echo URLROOT?>/home/all_school/1"> Pre School</a></h3>
                            <?php 
$adminMod = New Admins;
$get_all_school_under_category1 = $adminMod->get_school_from_category(1);
$count1 = 0;
$count2 = 0;
$count3 = 0;
foreach($get_all_school_under_category1 as $school1){
    $count1++;
}
$get_all_school_under_category2 = $adminMod->get_school_from_category(2);
$count2 = 0;
foreach($get_all_school_under_category2 as $school2){
    $count2++;
}
$get_all_school_under_category3 = $adminMod->get_school_from_category(3);
$count3 = 0;
foreach($get_all_school_under_category3 as $school3){
    $count3++;
}
                            ?>
                            <p class="services-two__text">No of Schools:&nbsp;<?php echo $count1;?></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/about/school.png" alt=""  style="height:60px;width:60px; clip-path: circle();">
                                </div>
                            </div>
                            <h3 class="services-two__title"><a href="<?php echo URLROOT?>/home/all_school/2"> Primary School</a></h3>
                            <p class="services-two__text">No of Schools:&nbsp;<?php echo $count2;?></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/about/school.png" alt=""  style="height:60px;width:60px; clip-path: circle();">
                                </div>
                            </div>
                            <h3 class="services-two__title"><a href="<?php echo URLROOT?>/home/all_school/3"> Secondary School</a></h3>
                            <p class="services-two__text">No of Schools:&nbsp;<?php echo $count3;?></p>
                        </div>
                    </div>
            
              
                   
                    <!--Services Two Single End-->
                </div>
            </div>
        </section>
        <!--Insurance Page Two End-->
        <?php require APPROOT . "/views/inc_home/footer.php"; ?>