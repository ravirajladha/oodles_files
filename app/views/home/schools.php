
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
                    <h2>Schools</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
<!-- Filter start -->
<form method="post" action="<?php echo URLROOT; ?>/home/filter_schools">
            <div class="container">
                <div class="row">
                <div class="col-xl-3">
                <label for="mdl-textfield__label"></label>
                <select name="affiliation_board" class="form-control" required>
												<option value="">-Select Affiliation Board-</option>
												<option value="1">Central Board of Secondary Education (CBSE)
												</option>
												<option value="2">Indian Certificate of Secondary Education (ICSE)
												</option>
												<option value="3">International General Certificate of Secondary Education (IGCSE)
												</option>
												<option value="4">International Baccalaureate (IB)
												</option>
												<option value="5">Others
												</option>
</select>
 </div>
                <div class="col-xl-3">
                <label for="mdl-textfield__label"></label>
												<select name="school_type" class="form-control" required>
                                                <option value="">-Select  School Curriculum-</option>
													<?php foreach($data['get_school_type'] as $school_type){ ?>
													
											<option value="<?php echo $school_type->id?>"><?php echo $school_type->school_type ?></option>
											<?php } ?>

                 </select>

 </div>
                <div class="col-xl-2">
                <label for="mdl-textfield__label"></label>
												
                                                <select name="subtype" class="form-control" required>
												<option value="">-Select Subtype-</option>
												<option value="1">Co-education</option>
												<option value="2">Boys</option>
												<option value="3">Girls</option>
</select>

 </div>
                <div class="col-xl-2">
										
											<label for="list2" class="mdl-textfield__label"></label>
												<br>
												<select name="state" class="form-control" required>
                                                <option value="">-Select State-</option>
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
                </div>
            </div>
       <!-- Filter End -->
        <!--Portfolio Start-->
        <section class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="portfolio-filter style1 post-filter has-dynamic-filters-counter list-unstyled">
                            <!-- <li data-filter=".filter-item" class="active"><span class="filter-text">All</span></li> -->
                            <?php $count=0 ?>
                            <?php foreach($data['get_school_type_limit'] as  $school_type){ 
                                $count++;
                                if($count==1){ ?>
  <li data-filter=.<?php echo $school_type->id?> class="active"><span class="filter-text"><?php echo $school_type->school_type?></span></li>
                              <?php   }else{ ?> 
                          
                                <li data-filter=.<?php echo $school_type->id?>><span class="filter-text"><?php echo $school_type->school_type?></span></li>
                            <?php } ?>
                            <?php } ?>
                            <a href="<?php echo URLROOT?>/home/all_schools">  All</a>
                            <!-- <li data-filter=".insur"><span class="filter-text">Govenment</span></li>
                            <li data-filter=".busi"><span class="filter-text">Corporate</span></li>
                            <li data-filter=".poli"><span class="filter-text last-pd-none">Oodles</span></li> -->
                        </ul>
                    </div>
                </div>
                <div class="row filter-layout masonary-layout">
                    <!--Portfolio Single Start-->
                    <?php foreach($data['get_school_detail'] as $detail){ ?>
                    <div class="col-xl-3 col-lg-6 col-md-6  <?php echo $detail->curriculum?>">
                        <div class="portfolio__single">
                            <div class="portfolio__img">
                                <img src="<?php echo URLROOT; ?>/uploads/<?php echo $detail->school_image?>" alt="" style="max-height:200px; max-width:100%;">
                                <div class="portfolio__plus">
                                    <a href="<?php echo URLROOT; ?>/uploads/<?php echo $detail->school_image?>" class="img-popup"><span class="icon-plus"></span></a>
                                </div>
                                <div class="portfolio__content">
                                    <p class="portfolio__sub-title">School</p>
                                    <h4 class="portfolio__title"><a href="<?php echo URLROOT; ?>/home/ind_school/<?php echo $detail->id?>"><?php echo $detail->institute_name?></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!--Portfolio Single End-->

                    
                   
                   
               
      
                </div>
            </div>
        </section>


        <?php require APPROOT . "/views/inc_home/footer.php"; ?>