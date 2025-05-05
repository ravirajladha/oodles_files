<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
    <title>MecWin Technologies</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URLROOT; ?>/assets_admin/icon.png">
    <link href="<?php echo URLROOT; ?>/assets_admin/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_admin/vendor/chartist/css/chartist.min.css">
	<!-- Vectormap -->
    <link href="<?php echo URLROOT; ?>/assets_admin/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/assets_admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?php echo URLROOT; ?>/assets_admin/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
	<link href="<?php echo URLROOT; ?>/assets_admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/assets_admin/css/style.css" rel="stylesheet">
	<script src="<?php echo URLROOT; ?>/assets_admin/vendor/global/global.min.js"></script>
	<script src="<?php echo URLROOT; ?>/assets_admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
	
    


    
</head>


    <!--*******************
        Preloader start
    ********************-->
   
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
   


		
		<!--**********************************
            Header start
        ***********************************-->
      

      
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->



<?php
$employee = $data['employee'];
$salary = $data['salary'];
?>


<?php
$model = new Page;
$start_date = '2022-08-01';
$end_date = '2022-08-31';
// $diff=abs( strtotime($end_date)-strtotime($start_date));
// $payable_days = "$diff[mday]";

$leave_cl_detail = $model->get_count_cl($employee->mec_id, $start_date, $end_date);
$leave_el_detail = $model->get_count_el($employee->mec_id, $start_date, $end_date);
$leave_sl_detail = $model->get_count_sl($employee->mec_id, $start_date, $end_date);
$leave_od_detail = $model->get_count_od($employee->mec_id, $start_date, $end_date);


$present_days = 0;
$absent_days = 0;
$cl_days = 0;
$sl_days = 0;
$el_days = 0;
$od_days = 0;
$sunday_days = 0;
$begin1 = new DateTime("2022-08-01");
$end1   = new DateTime("2022-08-31");
//  $payable_days = $end1-$begin1;
for ($i = $begin1; $i <= $end1; $i->modify('+1 day')) {
    $cur_date = $i->format("Y-m-d");
    $attend1 = $model->get_attendance_date($employee->mec_id, $cur_date);
    if ($attend1) {
        $present_days++;
?>
        <?php } elseif ($cl_accepted = $model->select_cl_date($employee->mec_id, $cur_date)) {
        $cl_days++;
    } elseif ($el_accepted = $model->select_el_date($employee->mec_id, $cur_date)) {
        $el_days++;
    } elseif ($sl_accepted = $model->select_sl_date($employee->mec_id, $cur_date)) {
        $sl_days++;
    } elseif ($od_accepted = $model->select_od_date($employee->mec_id, $cur_date)) {
        $od_days++;
    } else {
        if (date('w', strtotime($cur_date)) % 7 == 0) {
            $sunday_days++; ?>

        <?php     } else {

            $absent_days++; ?>

        <?php } ?>
    <?php } ?>
<?php } ?>
<?php $lop_days = $absent_days ?>
<?php
$payable_days = 31 - $lop_days;
$lop_amount = ($salary->Earned_Gross / 31) * ($lop_days);
$lop_amount = round($lop_amount);
$total_deduction = $salary->Total_Deduction + $lop_amount;
$net_pay = $salary->Earned_Gross - $total_deduction;
?>
	<?php $salary_detail = $model->get_salary($employee->mec_id);
											$remaining_cl = $salary_detail->cl;
											$remaining_el = $salary_detail->el;
											$remaining_sl = $salary_detail->sl;
											$total_pending_leaves = $remaining_cl+$remaining_el+$remaining_sl;
											?>


      
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                <a target="_BLANK" href="<?php echo URLROOT; ?>/hr/print_payslip/<?php echo $employee->mec_id; ?>"> <button type="button" class="btn btn-primary"><i class="fa fa-print fa-lg"></i>Print</button></a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">HR</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Payslip</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header center"><p style="text-align:center;"> Payslip for the month of August, 2022</p></div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                <h6>From:</h6>
                                <div> <strong>Mecwin Technologies</strong> </div>
                                <div>91/1, Kanakadasa Layout</div>
                                <div>3, Seegehally, Off Magadi Main Rd</div>
                                <div>Bengaluru, Karnataka 560091</div>
                            </div>
                            <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        
                            </div>
                            <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                <div class="row align-items-center">
                                    <div class="col-sm-9">
                                        <div class="brand-logo mb-3">
                                            <img class="logo-abbr me-2" src="<?php echo URLROOT; ?>/assets_admin/logo.webp" alt="">

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <div><h5>Bank Details</h5>
                                <div class="table">
                                    <table class="table header-border table-responsive-sm">
                                        <tbody>
                                            <tr>
                                                <td><strong>Employee Name</strong> <span class="float-end"><?php echo $salary->Name; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Employee ID</strong> <span class="float-end"><?php echo $salary->Emp_Id; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Designation</strong> <span class="float-end"><?php echo $salary->Designation; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Date of Joining</strong> <span class="float-end"><?php echo $salary->DOJ; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>UAN</strong> <span class="float-end"><?php echo $salary->UAN; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>ESI No.</strong> <span class="float-end"><?php echo $salary->ESI_No; ?></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-lg-6">
                            <div><h5>Bank Details</h5>
                                <div class="table">
                                    <table class="table header-border table-responsive-sm">
                                        <tbody>
                                            <tr>
                                                <td><strong>Bank Name</strong> <span class="float-end"><?php echo $employee->bank_name; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Account Number</strong> <span class="float-end"><?php echo $employee->bank_ac_no; ?></span></td>
                                            </tr>

                                            <tr>
                                                <td><strong>IFSC Code</strong> <span class="float-end"><?php echo $employee->ifsc_code; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>No. of Working Days</strong> <span class="float-end">31
                                            
                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <strong>Paid Days</strong> <span class="float-end"><?php echo $payable_days ?></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <strong>LOP Days</strong> <span class="float-end"><?php echo $lop_days; ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <strong>Casual Leaves</strong> <span class="float-end"><?php echo $cl_days; ?></span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <strong>Sick Leaves</strong> <span class="float-end"><?php echo $sl_days; ?></span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <strong>Earned Leaves</strong> <span class="float-end"><?php echo $el_days; ?></span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <strong>Outside Duty</strong> <span class="float-end"><?php echo $od_days; ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr><td>
													<div class="row">
														<div class="col-md-12">
															<strong>Pending Leaves</strong> <span class="float-end"><?php echo $total_pending_leaves; ?></span>
														</div>
													
													</div>


												</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div><h5>Earnings</h5>
                                <div class="table">
                                    <table class="table header-border table-responsive-sm">
                                        <tbody>
                                        <tr>
												<td><strong>Basic DA</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Basic_DA; ?></span></td>
											</tr>
											<tr>
												<td><strong>House Rent Allowance (H.R.A)</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->HRA; ?></span></td>
											</tr>
											<tr>
												<td><strong>Washing Allowance</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Washing_Allowance; ?></span></td>
											</tr>
											<tr>
												<td><strong>Telephonic Allowance</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Telephonic_Allowance; ?></span></td>
											</tr>
											<tr>
												<td><strong>Other Allowance</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Other_Allowance; ?></span></td>
											</tr>
											<tr>
												<td><strong>Incentives</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Incentive; ?></span></td>
											</tr>
											<tr>
												<td><strong>Earned Gross</strong> <span class="float-end"><strong><i class="fa fa-inr"></i><?php echo $salary->Earned_Gross; ?></strong></span></td>
											</tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div><h5>Deductions</h5>
                                <div class="table">
                                    <table class="table header-border table-responsive-sm">
                                        <tbody>
                                        <tr>
												<td><strong>Provident Fund</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->PF; ?></span></td>
											</tr>
											<tr>
												<td><strong>ESI</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->ESI; ?></span></td>
											</tr>
											<tr>
												<td><strong>Profesional Tax</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->PT; ?></span></td>
											</tr>
											<tr>
												<td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->TDS; ?></span></td>
											</tr>
											<tr>
												<td><strong>Canteen</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Canteen; ?></span></td>
											</tr>
											<tr>
												<td><strong>Loss of Pay (Leave)</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $lop_amount; ?></span></td>
											</tr>

											<tr>
												<td><strong>Total Deductions</strong> <span class="float-end"><strong><i class="fa fa-inr"></i><?php echo $total_deduction; ?></strong></span></td>
											</tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table header-border table-responsive-sm">
                                        <tbody>
                                        <tr>
												<td><strong>Reimbursement</strong> <span class="float-end"><i class="fa fa-inr"></i>0</span></td>
											</tr>
										
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-5"> </div>
                            <div class="col-lg-4 col-sm-5 ms-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left"><strong>Earned Gross</strong></td>
                                            <td class="right"><i class="fa fa-inr"></i><?php echo $salary->Earned_Gross; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Total Deduction </strong></td>
                                            <td class="right"><i class="fa fa-inr"></i><?php echo $total_deduction; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Total Reimbursement</strong></td>
                                            <td class="right"><i class="fa fa-inr"></i>0</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Total Net Pay</strong></td>
                                            <td class="right"><strong><i class="fa fa-inr"></i><?php echo $net_pay; ?></strong><br>
                                               
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
 








<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
<script>
	window.onload = function() {
		window.print();
	}
</script>