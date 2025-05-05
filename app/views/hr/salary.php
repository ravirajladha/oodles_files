<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<div class="content-body">
            <div class="container-fluid">
				
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">HR</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Employee Salary (July 2022)</a></li>
					</ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0 table-striped student-tbl">
                                        <thead>
                                            <tr>
                                              
                                                <th>Employee ID</th>
                                                <th>Employee Name</th>
                                                <th>Department</th>
                                                <th class=" ps-5" style="min-width: 200px;">Designation
                                                </th>
                                                <th>Payslip</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody id="customers">
                                        <?php foreach($data['users'] as $emp){ ?>
                                            <tr class="btn-reveal-trigger">
                                             
                                                <td class="py-3">
                                                    <a href="#">
                                                        <div class="media d-flex align-items-center">
                                                            <div class="media-body">
                                                                <h5 class="mb-0 fs--1"><?php echo $emp->mec_id; ?></h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="py-2"><a
                                                        href=""><?php echo $emp->employee_name; ?></a></td>
                                                <td class="py-2"> <?php echo $emp->department; ?></td>
                                                <td class="py-2 ps-5"><?php echo $emp->designation; ?></td>
                                                <td class="py-2"> <a href="<?php echo URLROOT?>/hr/payslip/<?php echo $emp->mec_id; ?>"><button type="button" class="btn btn-primary btn-xs">View</button></a></td>
                                         
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