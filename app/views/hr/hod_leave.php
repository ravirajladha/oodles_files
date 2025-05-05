
<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
           <!-- <h4>Meals</h4> -->
           <div class="row">
           <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Upload Employees</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form custom_file_input">
                                    <form action="<?php echo URLROOT; ?>/hr/upload_leaves_excel" enctype="multipart/form-data">
                                        

                                        <div class="input-group mb-3">
                                            <div class="form-file">
                                                <input type="file" name="file" class="form-file-input form-control">
                                            </div>
											<!-- <span class="input-group-text">Upload</span> -->
                                            <button class="btn btn-primary btn-sm" type="submit" name="importSubmit">Upload</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="page-titles">
                    <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Leaves Status</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th class="width80"><strong>ID</strong></th>
                                                <th><strong>EMPLOYEE ID</strong></th>
                                                <th><strong>TYPE</strong></th>
                                                <th><strong>START DATE</strong></th>
                                                <th><strong>END DATE</strong></th>
                                                <th><strong>STATUS</strong></th>

                                               

                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($data['get_all_leaves'] as $leave_detail){ ?>
                                            <tr>
                                                <td><strong><?php echo $leave_detail->leave_id ?></strong></td>
                                                <?php 
                                                $pageMod = New Page;
                                                $user_detail = $pageMod->get_employee($leave_detail->user_id);
                                                ?>
                                                <td><?php echo $user_detail->employee_name?></td>

                                                <td><?php if($leave_detail->type==1){echo "Casual Leave";}elseif($leave_detail->type==2){echo "Earned Leave";}elseif($leave_detail->type==3){echo "Sick Leave";}elseif($leave_detail->type==4){echo "Outside Duty";} ?></td>
                                                <td><?php echo $leave_detail->start_date?></td>
                                                <td><?php echo $leave_detail->end_date?></td>
                                                <!-- <td><span class="badge light badge-success">Successful</span></td> -->
                                                <td class="badge light badge-success">
                                                <form action="<?php echo URLROOT; ?>/hr/hod_approval/<?php echo $leave_detail->leave_id; ?>" method="post">
                                         <select class='form-control' name="hod_approval"  id="mySelect" onchange="this.form.submit()" style="font-size:12px;">
                        <option value="0" <?php if($leave_detail->hod_approved==0){echo "selected";} ?> >Request for Approval</option>
                        <option value="1" <?php if($leave_detail->hod_approved==1){echo "selected";} ?> >Accept</option>
                        <option value="2" <?php if($leave_detail->hod_approved==2){echo "selected";} ?> >Reject</option>
                                                                </select>


                                </form>
								<?php } ?>
                                         </td>
<!-- 
                                                <td>
													<div class="dropdown">
														<button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
															<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="#">Edit</a>
															<a class="dropdown-item" href="#">Delete</a>
														</div>
													</div>
												</td> -->
                                            </tr>
                                      
											<!-- <tr>
                                                <td><strong>02</strong></td>
                                                <td>Mr. Bobby</td>
                                                <td>Dr. Jackson</td>
                                                <td>01 August 2020</td>
                                                <td><span class="badge light badge-danger">Canceled</span></td>
                                                <td>$21.56</td>
                                                <td>
													<div class="dropdown">
														<button type="button" class="btn btn-danger light sharp" data-bs-toggle="dropdown">
															<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="#">Edit</a>
															<a class="dropdown-item" href="#">Delete</a>
														</div>
													</div>
												</td>
                                            </tr>
											<tr>
                                                <td><strong>03</strong></td>
                                                <td>Mr. Bobby</td>
                                                <td>Dr. Jackson</td>
                                                <td>01 August 2020</td>
                                                <td><span class="badge light badge-warning">Pending</span></td>
                                                <td>$21.56</td>
                                                <td>
													<div class="dropdown">
														<button type="button" class="btn btn-warning light sharp" data-bs-toggle="dropdown">
															<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="#">Edit</a>
															<a class="dropdown-item" href="#">Delete</a>
														</div>
													</div>
												</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
        </div>
        </div>
        <!-- row -->

    </div>
</div>
</div>
<!--**********************************
    Content body end
***********************************-->

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>