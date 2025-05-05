
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
                    <h2>Colleges</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
<!-- Filter start -->
<form method="post" action="<?php echo URLROOT; ?>/home/filter_colleges">
            <div class="container">
                <div class="row">
                <!-- <div class="col-xl-4">
                <label for="mdl-textfield__label"></label>
                 <select name="college_course" class="form-control" required>
													<option value=""> Select Type</option>
													<?php foreach($data['get_college_course'] as $college_course){ ?>
											<option value="<?php echo $college_course->id?>"><?php echo $college_course->college_course ?></option>
											<?php } ?>

                 </select> 

 </div> -->
                <div class="col-xl-4"></div>
                <div class="col-xl-3">
										
											<label for="list2" class="mdl-textfield__label"></label>
												<br>
												<select name="state" class="form-control" required>
                                                <option value="">Select State</option>
											<option value="Andhra Pradesh">Andhra Pradesh</option>
											<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
											<option value="Arunachal Pradesh">Arunachal Pradesh</option>
											<option value="Assam">Assam</option>
											<option value="Bihar">Bihar</option>
											<option value="Chandigarh">Chandigarh</option>
											<option value="Chhattisgarh">Chhattisgarh</option>
											<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
											<option value="Daman and Diu">Daman and Diu</option>
											<option value="Delhi">Delhi</option>
											<option value="Lakshadweep">Lakshadweep</option>
											<option value="Puducherry">Puducherry</option>
											<option value="Goa">Goa</option>
											<option value="Gujarat">Gujarat</option>
											<option value="Haryana">Haryana</option>
											<option value="Himachal Pradesh">Himachal Pradesh</option>
											<option value="Jammu and Kashmir">Jammu and Kashmir</option>
											<option value="Jharkhand">Jharkhand</option>
											<option value="Karnataka">Karnataka</option>
											<option value="Kerala">Kerala</option>
											<option value="Madhya Pradesh">Madhya Pradesh</option>
											<option value="Maharashtra">Maharashtra</option>
											<option value="Manipur">Manipur</option>
											<option value="Meghalaya">Meghalaya</option>
											<option value="Mizoram">Mizoram</option>
											<option value="Nagaland">Nagaland</option>
											<option value="Odisha">Odisha</option>
											<option value="Punjab">Punjab</option>
											<option value="Rajasthan">Rajasthan</option>
											<option value="Sikkim">Sikkim</option>
											<option value="Tamil Nadu">Tamil Nadu</option>
											<option value="Telangana">Telangana</option>
											<option value="Tripura">Tripura</option>
											<option value="Uttar Pradesh">Uttar Pradesh</option>
											<option value="Uttarakhand">Uttarakhand</option>
											<option value="West Bengal">West Bengal</option>
											</select>
										</div>
                    <div class="col-xl-2 p-t-20">
								<br>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i>&nbsp;Search</button>

                    </div>
                    <div class="col-xl-3 p-t-20">
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
                    <?php $count=0 ?>
                            <?php foreach($data['get_college_course_limit'] as  $college_course){ 
                                $count++;
                                if($count==1){ ?>
                            <li data-filter=.<?php echo $college_course->id?> class="active"><span class="filter-text"><?php echo $college_course->college_course?></span></li>
                            <?php }else{ ?>
                                <li data-filter=.<?php echo $college_course->id?> ><span class="filter-text"><?php echo $college_course->college_course?></span></li>
                            <?php } ?>
                            <?php } ?>
                            <a href="<?php echo URLROOT?>/home/all_colleges">  All</a>
                        <!-- <li data-filter=".filter-item" class="active"><span class="filter-text">All</span></li>
                            <?php foreach($data['get_college_course'] as  $college_course){ ?>
                            <li data-filter=.<?php echo $college_course->id?>><span class="filter-text"><?php echo $college_course->college_course?></span></li>
                            <?php } ?> -->
                            <!-- <li data-filter=".insur"><span class="filter-text">Govenment</span></li>
                            <li data-filter=".busi"><span class="filter-text">Corporate</span></li>
                            <li data-filter=".poli"><span class="filter-text last-pd-none">Oodles</span></li> -->
                        </ul>
                    </div>
                </div>
                <?php
                $count = 0
                ?>
                <div class="row filter-layout masonary-layout">
                    <!--Portfolio Single Start-->
                    <?php foreach($data['get_college_detail'] as $detail){ 
                  $array = explode(',', $detail->college_course);
                     foreach ($array as $value) //loop over values
                     { ?>
                     <!-- filter-item is used to show all the colleges -->
              <div class="col-xl-3 col-lg-6 col-md-6<?php echo $value?>">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="<?php echo URLROOT; ?>/uploads/<?php echo $detail->college_image?>" alt="" style="max-height:200px; max-width:100%;">
                                <div class="portfolio__plus">
                                    <a href="<?php echo URLROOT; ?>/uploads/<?php echo $detail->college_image?>" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">College</p>
                                    <h4 class="portfolio__title"><a href="<?php echo URLROOT; ?>/home/ind_college/<?php echo $detail->id?>"><?php echo $detail->college_name?></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    <?php if ($value == 0) { ?>

No Such College Found, Try again.


                    <?php } ?>
                    <!--Portfolio Single End-->

                    
                   
                   
               
      
                </div>
            </div>
        </section>


        <?php require APPROOT . "/views/inc_home/footer.php"; ?>