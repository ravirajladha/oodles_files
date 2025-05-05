<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">All Criterias List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Criterias</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Criterias List</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tabbable-line">
								<ul class="nav customtab nav-tabs" role="tablist">
									<!-- <li class="nav-item"><a href="#tab1" class="nav-link active"
											data-bs-toggle="tab">List
											View</a></li>
									<li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
											View</a></li> -->
								</ul>
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo" id="tab1">
										<div class="row">
											<div class="col-md-12">
												<div class="card card-box">
													<div class="card-head">
														<header>All criterias List</header>
														<div class="tools">
															<a class="fa fa-repeat btn-color box-refresh"
																href="javascript:;"></a>
															<a class="t-collapse btn-color fa fa-chevron-down"
																href="javascript:;"></a>
															<!-- <a class="t-close btn-color fa fa-times"
																href="javascript:;"></a> -->
														</div>
													</div>
													<div class="card-body ">
														<div class="row">
															<div class="col-md-6 col-sm-6 col-6">
															
															</div>
														</div>
														<table
															class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
															id="example4">
															<thead>
																<tr>
																
																	<th> Id </th>
																	<th> Category Name </th>
																	<th> Criterna Name </th>
																	<th> Criteria Type </th>
																
																</tr>
															</thead>
														
															<tbody>
															<?php foreach ($data['get_all_criteria'] as $criteria){ ?>
																<tr class="odd gradeX">
																	<!-- <td class="patient-img">
																		<img src="<?php echo URLROOT ;?>/uploads/<?php echo $criteria->image?>" alt="No data">

																		
																	</td> -->
																	<td class="left"><?php echo $criteria->id ?></td>
																
																
                                                         
                                                            <?php if($criteria->category_id==1){?>
                                                                <td >Government Scholarship</td>
                                                                <?php }elseif($criteria->category_id==2){?>
                                                                    <td>Private Scholarship</td>
                                                                    <?php }elseif($criteria->category_id==3){?>
                                                                        <td >OodlesIn Scholarship</td>
                                                                    <?php }elseif($criteria->category_id==4){?>
                                                                        <td >OodlesIn Scholarship</td>
                                                                  
                                                                    <?php }else{?>
                                                                        <td >Scholarship Not Selected</td>
                                                                        <?php } ?>
                                                             
                                                                    <td> <?php echo $criteria->criteria_name ?> </td>
                                                                    
                                                            
                                                                    
                                                            <?php if($criteria->criteria_type==1){?>
                                                                <td >Yes/No</td>
                                                                <?php }elseif($criteria->criteria_type==2){?>
                                                                    <td>Date Based</td>
                                                                    <?php }elseif($criteria->criteria_type==3){?>
                                                                        <td >Range Based</td>
                                                                    <?php }else{?>
                                                                        <td >Criteria Type Not Selected</td>
                                                                  
                                                                        <?php } ?>

                                                                    <?php } ?>
																		<!-- <a href="#" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a> -->
																	</td>
																</tr>
																
									
															</tbody>
														</table>
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
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<?php require APPROOT . '/views/inc_admin/footer.php'; ?> 