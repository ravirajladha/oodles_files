<?php require APPROOT . '/views/inc_admin/header.php';
$employee = $data['employee'];
$salary = $data['salary'];
?>
<?php
function check($data, $value)
{
    if (!isset($data->$value) == true) {
        echo ('Nil');
    } else {
        echo ($data->$value);
    }
}

?>
<!-- Content body start -->

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="<?php echo URLROOT?>/hr/employees">Employees</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-2 col-lg-2  col-md-2 col-xxl-2 ">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="first">
                                        <img class="img-fluid" src="<?php echo URLROOT; ?>/assets_admin/images/product/1.jpg" alt="" style="height:100px;width:100px;">
                                    </div>

                                </div>
                                <div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
                                    <!-- Nav tabs -->

                                </div>
                            </div>
                            <!--Tab slider End-->
                            <div class="col-xl-5 col-lg-5  col-md-5 col-xxl-5 col-sm-5">
                                <div class="product-detail-content">
                                    <!--Product details-->
                                    <div class="new-arrival-content pr">
                                        
                                        <h4><?php echo $employee->employee_name; ?></h4>
                                        <div class="comment-review star-rating">

                                            <span class="review-text"><?php echo $employee->designation; ?></span><a class="product-review" href="<?php echo URLROOT?>/hr/edit_profile/<?php echo($employee->mec_id); ?>">(Edit Employee)</a>
                                        </div>
                                        <div class="d-table mb-2">
                                            <p class="price float-start d-block">Employee ID: <?php echo $employee->mec_id; ?> </p>
                                        </div>
                                        <p>Department: <span class="item"> <?php echo $employee->department; ?> <i class="fa fa-shopping-basket"></i></span>
                                        </p>
                                        <p>Branch: <span class="item"><?php echo $employee->branch; ?></span> </p>
                                        <p>DOJ: <span class="item"><?php echo $employee->date_of_joining; ?></span></p>
                                        <p>Employment Type: <span class="item"><?php echo $employee->employment_type; ?></span></p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4  col-md-4 col-xxl-4 col-sm-4">
                                <div class="product-detail-content">
                                    <!--Product details-->
                                    <div class="new-arrival-content pr">
                                        <p>Phone: <span class="item"> <?php echo $employee->cell_number; ?> <i class="fa fa-phone"></i></span>
                                        </p>
                                        <p>Email: <span class="item"><?php echo $employee->company_email; ?></span> </p>
                                        <p>Birthday: <span class="item"><?php echo $employee->date_of_birth; ?></span></p>
                                        <p>Address: <span class="item"><?php echo $employee->current_address; ?></span></p>
                                        <p>Gender: <span class="item"><?php echo $employee->gender; ?></span></p>
                                        <p>Blood Group: <span class="item"><?php echo $employee->blood_group; ?></span></p>
                                        <p>Reports to: <span class="item"><?php echo $employee->reports_to; ?></span></p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- review -->

        </div>





        <div class="row">
            <div class="col-lg-12 pro-overview tab-pane fade show active" id="emp_profile">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile</h4>
                        <div class="d-sm-flex d-block">
											<a class="btn btn-primary btn-rounded mb-2" href="<?php echo URLROOT?>/hr/edit_basic_profile/<?php echo($employee->mec_id); ?>">Edit</a>
										</div>
                    </div>
                    <div class="card-body">
                        <div class="basic-list-group">
                            <div class="row">
                                <div class="col-lg-6 col-xl-2">
                                    <div class="list-group mb-4 " id="list-tab" role="tablist"><a class="list-group-item list-group-item-action active" id="list-personal-list" data-bs-toggle="list" href="#list-personal" role="tab">Personal Informations</a>
                                        <a class="list-group-item list-group-item-action" id="list-emergency-list" data-bs-toggle="list" href="#list-emergency" role="tab">Emergency Contact</a>
                                        <a class="list-group-item list-group-item-action" id="list-bankinfo-list" data-bs-toggle="list" href="#list-bankinfo" role="tab">Bank Information</a>
                                        <a class="list-group-item list-group-item-action" id="list-employmentinfo-list" data-bs-toggle="list" href="#list-employmentinfo" role="tab">Employment Information</a>
                                        <a class="list-group-item list-group-item-action" id="list-resignation-list" data-bs-toggle="list" href="#list-resignation" role="tab">Resignation Detail</a>
                                        <a class="list-group-item list-group-item-action" id="list-employeetenure-list" data-bs-toggle="list" href="#list-employeetenure" role="tab">Employee Tenure</a>
                                        <a class="list-group-item list-group-item-action" id="list-insurance-list" data-bs-toggle="list" href="#list-insurance" role="tab">Insurance Details</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-10">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-personal">
                                            <h4 class="mb-4">Personal Informations Content</h4>
                                            <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Passport No<span class="badge badge-primary badge-pill"><?php echo $employee->passport_number; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Issued Date:<span class="badge badge-primary badge-pill"><?php echo $employee->date_of_issue; ?> </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Valid Upto:<span class="badge badge-primary badge-pill"><?php echo $employee->date_of_issue; ?> </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Issued Date:<span class="badge badge-primary badge-pill"><?php echo $employee->valid_upto; ?> </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Nationality<span class="badge badge-primary badge-pill">Indian </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Permanent Address<span class="badge badge-primary badge-pill"><?php echo $employee->permanent_address; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Personal Email-id<span class="badge badge-primary badge-pill"><?php echo $employee->personal_email; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Marital Status<span class="badge badge-primary badge-pill"><?php echo $employee->qualification; ?></span>
                                        </li>

                                        </div>
                                        <div class="tab-pane fade" id="list-emergency" role="tabpanel">
                                            <h4 class="mb-4">Emergency Contact Tab Content</h4>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Name<span class="badge badge-primary badge-pill"><?php echo $employee->person_to_be_contacted; ?></span>
                                        </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Relationship<span class="badge badge-primary badge-pill"><?php echo $employee->relation; ?></span>
                                        </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Phone<span class="badge badge-primary badge-pill"><?php echo $employee->emergency_phone_number; ?></span>
                                        </li>
                                        </div>
                                        <div class="tab-pane fade" id="list-bankinfo">
                                            <h4 class="mb-4">Bank Information Tab Content</h4>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Bank Name<span class="badge badge-primary badge-pill"><?php echo $employee->bank_name; ?></span>
                                        </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Bank Account No<span class="badge badge-primary badge-pill"><?php echo $employee->bank_ac_no; ?></span>
                                        </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           IFSC Code<span class="badge badge-primary badge-pill"><?php echo $employee->ifsc_code; ?></span>
                                        </li>
                                        </div>
                                        <div class="tab-pane fade" id="list-employmentinfo">
                                            <h4 class="mb-4">Employment Tab Content</h4>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Leave Policy<span class="badge badge-primary badge-pill"><?php echo $employee->leave_policy; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Default Shift<span class="badge badge-primary badge-pill"><?php echo $employee->default_shift; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Salary Mode<span class="badge badge-primary badge-pill"><?php echo $employee->salary_mode; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Casual Leave<span class="badge badge-primary badge-pill"><?php echo $employee->cl; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Sick Leave<span class="badge badge-primary badge-pill"><?php echo $employee->sl; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Earned Leave<span class="badge badge-primary badge-pill"><?php echo $employee->el; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Leave Approver<span class="badge badge-primary badge-pill"><?php echo $employee->leave_approver; ?></span>
                                        </li>
                                        </div>
                                        <div class="tab-pane fade" id="list-resignation" role="tabpanel">
                                            <h4 class="mb-4">Resignation Detail Tab Content</h4>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Resignation Letter Data<span class="badge badge-primary badge-pill"><?php echo $employee->resignation_letter_date; ?></span>
                                        </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Relieving Date<span class="badge badge-primary badge-pill"><?php echo $employee->relieving_date; ?></span>
                                        </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Reason for Resignation<span class="badge badge-primary badge-pill"><?php echo $employee->reason_for_resignation; ?></span>
                                        </li>
                                        </div>
                                        <div class="tab-pane fade" id="list-employeetenure" role="tabpanel">
                                            <h4 class="mb-4">Employee Tenure Tab Content</h4>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Fixed Confirmation Date<span class="badge badge-primary badge-pill"><?php echo $employee->scheduled_confirmation_date; ?></span>
                                        </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Final Confirmation Date<span class="badge badge-primary badge-pill"><?php echo $employee->final_confirmation_date; ?></span>
                                        </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Contract End Date<span class="badge badge-primary badge-pill"><?php echo $employee->contract_end_date; ?></span>
                                        </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Notice Period<span class="badge badge-primary badge-pill"><?php echo $employee->notice_number_of_days; ?></span>
                                        </li>
                                        </div>
                                        <div class="tab-pane fade" id="list-insurance" role="tabpanel">
                                            <h4 class="mb-4">Insurance Details Tab Content</h4>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Health Insurance Provider<span class="badge badge-primary badge-pill"><?php echo $employee->health_insurance_provider; ?></span>
                                        </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Insurance Number<span class="badge badge-primary badge-pill"><?php echo $employee->health_insurance_no; ?></span>
                                        </li>
                                          
                                        </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 " id="bank_statutory">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bank & Statutory</h4>
                        <div class="d-sm-flex d-block">
											<a class="btn btn-primary btn-rounded mb-2" href="<?php echo URLROOT?>/hr/edit_salary/<?php echo($employee->mec_id); ?>">Edit</a>
										</div>
                    </div>
                    <div class="card-body">
                        <div class="basic-list-group">
                            <div class="row">
                                <div class="col-lg-6 col-xl-2">
                                    <div class="list-group mb-4 " id="list-tab" role="tablist"><a class="list-group-item list-group-item-action active" id="list-earnings-list" data-bs-toggle="list" href="#list-earnings" role="tab">Earnings</a> 
                                    <a class="list-group-item list-group-item-action" id="list-deduction-list" data-bs-toggle="list" href="#list-deduction" role="tab">Deductions</a> 
                                    <a class="list-group-item list-group-item-action" id="list-employdetail-list" data-bs-toggle="list" href="#list-employdetail" role="tab">Employment Details</a>
                                        <a class="list-group-item list-group-item-action" id="list-leaves-list" data-bs-toggle="list" href="#list-leaves" role="tab">Leaves and OD</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-10">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-earnings">
                                            <h4 class="mb-4">Earnings Tab Content</h4>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Basic DA<span class="badge badge-primary badge-pill"><?php check($salary,$value='Basic_DA'); ?></span></li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           PAN<span class="badge badge-primary badge-pill"><?php check($salary,$value='PAN'); ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                           HRA<span class="badge badge-primary badge-pill"><?php check($salary,$value='HRA'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Washing Allowance<span class="badge badge-primary badge-pill"><?php check($salary,$value='Washing_Allowance'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Telephonic Allowance<span class="badge badge-primary badge-pill"><?php check($salary,$value='Telephonic_Allowance'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Other Allowance<span class="badge badge-primary badge-pill"><?php check($salary,$value='Other_Allowance'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Incentives<span class="badge badge-primary badge-pill"><?php check($salary,$value='Incentive'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Earned Gross<span class="badge badge-primary badge-pill"><?php check($salary,$value='Earned_Gross'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Arrears<span class="badge badge-primary badge-pill"><?php check($salary,$value='Arrears'); ?></span></li>
                                        </div>
                                        <div class="tab-pane fade" id="list-deduction" role="tabpanel">
                                            <h4 class="mb-4">Deductions Tab Content</h4>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Provident Fund<span class="badge badge-primary badge-pill"><?php check($salary,$value='PF'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           ESI<span class="badge badge-primary badge-pill"><?php check($salary,$value='ESI'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Professional Tax<span class="badge badge-primary badge-pill"><?php check($salary,$value='PT'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Advance<span class="badge badge-primary badge-pill"><?php check($salary,$value='Advance'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Loan<span class="badge badge-primary badge-pill"><?php check($salary,$value='Loan'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           TDS<span class="badge badge-primary badge-pill"><?php check($salary,$value='TDS'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Canteen<span class="badge badge-primary badge-pill"><?php check($salary,$value='Canteen'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Other Deduction<span class="badge badge-primary badge-pill"><?php check($salary,$value='Other_Deduction'); ?></span></li>
                                           <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Total Deduction<span class="badge badge-primary badge-pill"><?php check($salary,$value='Total_Deduction'); ?></span></li>
                                         
                                        </div>
                                        <div class="tab-pane fade" id="list-employdetail">
                                            <h4 class="mb-4">Employment Details Tab Content</h4>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           PAN<span class="badge badge-primary badge-pill"><?php check($salary,$value='PAN'); ?></span></li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           ESI Number<span class="badge badge-primary badge-pill"><?php check($salary,$value='ESI_No'); ?></span></li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           UAN<span class="badge badge-primary badge-pill"><?php check($salary,$value='UAN'); ?></span></li>
                                        </div>
                                        <div class="tab-pane fade" id="list-leaves">
                                            <h4 class="mb-4">Leaves and OD Tab Content</h4>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Casual Leave<span class="badge badge-primary badge-pill"><?php check($salary,$value='cl'); ?></span></li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Sick Leave<span class="badge badge-primary badge-pill"><?php check($salary,$value='sl'); ?></span></li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Earned Leave<span class="badge badge-primary badge-pill"><?php check($salary,$value='el'); ?></span></li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                           Outside Duty<span class="badge badge-primary badge-pill"><?php check($salary,$value='od'); ?></span></li>
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
<!--**********************************
            Content body end
        ***********************************-->

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>