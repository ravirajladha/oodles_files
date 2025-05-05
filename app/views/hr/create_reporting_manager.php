<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<div class="content-body">


            <div class="container-fluid">
				
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">HR</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Reporting Manager</a></li>
					</ol>
                </div>
                <form action="<?php echo URLROOT?>/hr/add_reporting_manager" method="POST">
                <div class="row">
                    <div class="col-lg-12">
                    
                            <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-12">
                                    <h4 class="card-title">Select Reporting Manager</h4>
                                    <!-- <p>Select2 can take a regular select box like this...</p> -->
                                </div>

                                <select id="single-select" name="reporting_manager">
                                <option readonly>-Select Reporting Manger-</option>
                                    <?php foreach($data['employees'] as $all_employee){ ?>
                                              <option value="<?php echo $all_employee->mec_id?>"><?php echo $all_employee->employee_name ?></option>
                                  <?php   } ?>
                           
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-12">
                                    <h4 class="card-title">Select Respective Employee</h4>
                                    <!-- <p>Select2 can take a regular select box like this...</p> -->
                                </div>

                                <select id="single-select" name="employee_id">
                                    <option readonly>-Select Employee-</option>
                                <?php foreach($data['employees'] as $all_employee){ ?>
                                              <option value="<?php echo $all_employee->mec_id?>"><?php echo $all_employee->employee_name ?></option>
                                  <?php   } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                    <div class="card-body" style="float:right">
                                <button type="submit" class="btn btn-outline-primary btn-lg" style="align-items:center;">Submit</button>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                                </form>
                                <div class="row">  
                                      <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Reporting Manager </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table primary-table-bg-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Reporting Manager</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($data['get_all_reporting_manager'] as $all_reporting_manager){ ?>
                                            <tr>
                                                <th><?php echo $all_reporting_manager->mec_id?></th>
                                                <td><?php echo $all_reporting_manager->employee_name?></td>
                                                <?php 
                                                $pageMod = New Page;
                                                $user_detail = $pageMod->get_employee( $all_reporting_manager->reports_to);

                                                ?>
                                                
                                                <td>
													<div class="dropdown">
														<button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
															<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="<?php echo URLROOT?>/hr/clear_single_reporting_manager/<?php echo $all_reporting_manager->mec_id?>">Delete</a>
															<!-- <a class="dropdown-item" href="#">Delete</a> -->
														</div>
													</div>
												</td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="row">  
                                      <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reporting Manager Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table primary-table-bg-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Employer Name</th>
                                                <th scope="col">Reporting Manager</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($data['employees'] as $all_employee){ ?>
                                            <tr>
                                                <th><?php echo $all_employee->mec_id?></th>
                                                <td><?php echo $all_employee->employee_name?></td>
                                                <?php 
                                                $pageMod = New Page;
                                                $user_detail = $pageMod->get_employee( $all_employee->reports_to);

                                                ?>
                                                <td>
                                                    <?php if(isset( $user_detail->employee_name)){
                                                        echo $user_detail->employee_name;
                                                    }else{
                                                        echo "Reporting Manager N/A";
                                                    } ?>
                                                </td>
                                                <td>
													<div class="dropdown">
														<button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
															<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="<?php echo URLROOT?>/hr/clear_reporting_manager_from_employer/<?php echo $all_employee->mec_id?>">Clear</a>
															<!-- <a class="dropdown-item" href="#">Delete</a> -->
                                                            
														</div>
													</div>
												</td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <?php require APPROOT . '/views/inc_admin/footer.php'; ?>