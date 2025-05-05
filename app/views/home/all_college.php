
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
                        <li>colleges</li>
                    </ul>
                    <h2>   <?php echo $data['get_college_type_detail']->college_course ?></h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Portfolio Start-->
        <section class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="portfolio-filter style1 has-dynamic-filters-counter list-unstyled">
                            <!-- <li data-filter=".filter-item" class="active"><span class="filter-text">All</span></li> -->
                          
                          
                              
                           
                        
                           <?php echo $data['get_college_type_detail']->college_course ?>
                            <!-- <li data-filter=".insur"><span class="filter-text">Govenment</span></li>
                            <li data-filter=".busi"><span class="filter-text">Corporate</span></li>
                            <li data-filter=".poli"><span class="filter-text last-pd-none">Oodles</span></li> -->
                        </ul>
                    </div>
                </div>
                <div class="row filter-layout masonary-layout">
                    <!--Portfolio Single Start-->
                   
                    <?php foreach($data['get_college_detail'] as $all_college){ 
                        $required_college_id = $data['get_college_type_detail']->id;
                        $college_array_id= explode(',', $all_college->college_course);
             if(in_array($required_college_id, $college_array_id)){ ?>
                    <div class="col-xl-3 col-lg-6 col-md-6 ">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="<?php echo URLROOT; ?>/uploads/<?php echo $all_college->college_image?>" alt="" style="max-height:200px; max-width:100%;">
                                <div class="portfolio__plus">
                                    <a href="<?php echo URLROOT; ?>/uploads/<?php echo $all_college->college_image?>" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">college</p>
                                    <h4 class="portfolio__title"><a href="<?php echo URLROOT; ?>/home/ind_college/<?php echo $all_college->id?>"><?php echo $all_college->college_name?></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    <!--Portfolio Single End-->

                    
                   
                   
               
      
                </div>
            </div>
        </section>


        <?php require APPROOT . "/views/inc_home/footer.php"; ?>