<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Employees</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Discharged Employees</a></li>
            </ol>
        </div>
        <!-- row -->

        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Discharge Employees</h4>
                        <button class="btn btn-success btn-search" onclick="ExportToExcel('xlsx')">Export</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display table-responsive-md" id="tbl_exporttable_to_xls">
                                <thead>
                                    <tr>
                                        <!-- <th></th> -->
                                        <th claass="bg-success">Employee ID</th>
                                        <th claass="bg-success">Employee Name</th>
                                        <th>Employment Type</th>
                                        <th>Qualification</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Status</th>
                                        <th>Gender</th>
                                        <th>Date of Joining</th>
                                        <th>Date of Birth</th>
                                        <th>Emergency Phone Number</th>
                                        <th>Person to be Contacted</th>
                                        <th>Relation</th>
                                        <th>Scheduled Confirmation Date</th>
                                        <th>Final Confirmation Date</th>
                                        <th>Contract End Date</th>
                                        <th>Notice Number of Days</th>
                                        <th>Date of Retirement</th>
                                        <th>Reports to</th>
                                        <th>Grade</th>
                                        <th>Branch</th>
                                        <th>Leave Policy</th>
                                        <th>Attendence Device Id</th>
                                        <th>Holiday List</th>
                                        <th>Default Shift</th>
                                        <th>Leave Approver</th>
                                        <th>Salary Mode</th>
                                        <th>Bank Name</th>
                                        <th>Bank Account Number</th>
                                        <th>IFSC Code</th>
                                        <th>Health Insurance Provider</th>
                                        <th>Phone Number</th>
                                        <th>Company Email ID</th>
                                        <th>Personal Email ID</th>
                                        <th>Permanent Address</th>
                                        <th>Current Address</th>
                                        <th>Passport Number</th>
                                        <th>Date of Issue</th>
                                        <th>Valid Upto</th>
                                        <th>Marital Status</th>
                                        <th>Blood Group</th>
                                        <th>Resignation Letter Date</th>
                                        <th>Relieving Date</th>
                                        <th>Reason for Leaving</th>
                                        <th>Leave Encashed</th>
                                        <th>Encashment Date</th>
                                        <th>Reason for Resignation</th>
                                        <th>Discharged at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['employees'] as $employee) { ?>
                                        <tr>
                                            <!-- <td><img class="rounded-circle" width="35" src="<?php echo URLROOT?>/assets_admin/images/profile/small/pic1.jpg" alt=""></td> -->
                                            <td><?php echo $employee->mec_id; ?></td>
                                            <td><a href="<?php echo URLROOT; ?>/hr/employee/<?php echo $employee->mec_id; ?>"><?php echo $employee->employee_name; ?></a></td>
                                            <td><?php echo $employee->employment_type; ?></td>
                                            <td><?php echo $employee->qualification; ?></td>
                                            <td><?php echo $employee->department; ?></td>
                                            <td><?php echo $employee->designation; ?></td>
                                            <td><?php echo $employee->status; ?></td>
                                            <td><?php echo $employee->gender; ?></td>
                                            <td><?php echo $employee->date_of_joining; ?></td>
                                            <td><?php echo $employee->date_of_birth; ?></td>
                                            <td><?php echo $employee->emergency_phone_number; ?></td>
                                            <td><?php echo $employee->person_to_be_contacted; ?></td>
                                            <td><?php echo $employee->relation; ?></td>
                                            <td><?php echo $employee->scheduled_confirmation_date; ?></td>
                                            <td><?php echo $employee->final_confirmation_date; ?></td>
                                            <td><?php echo $employee->contract_end_date; ?></td>
                                            <td><?php echo $employee->notice_number_of_days; ?></td>
                                            <td><?php echo $employee->date_of_retirement; ?></td>
                                            <td><?php echo $employee->reports_to; ?></td>
                                            <td><?php echo $employee->grade; ?></td>
                                            <td><?php echo $employee->branch; ?></td>
                                            <td><?php echo $employee->leave_policy; ?></td>
                                            <td><?php echo $employee->attendance_device_id; ?></td>
                                            <td><?php echo $employee->holiday_list; ?></td>
                                            <td><?php echo $employee->default_shift; ?></td>
                                            <td><?php echo $employee->leave_approver; ?></td>
                                            <td><?php echo $employee->salary_mode; ?></td>
                                            <td><?php echo $employee->bank_name; ?></td>
                                            <td><?php echo $employee->bank_ac_no; ?></td>
                                            <td><?php echo $employee->ifsc_code; ?></td>
                                            <td><?php echo $employee->health_insurance_provider; ?></td>
                                            <td><?php echo $employee->health_insurance_no; ?></td>
                                            <td><?php echo $employee->cell_number; ?></td>
                                            <td><?php echo $employee->company_email; ?></td>
                                            <td><?php echo $employee->personal_email; ?></td>
                                            <td><?php echo $employee->permanent_address; ?></td>
                                            <td><?php echo $employee->current_address; ?></td>
                                            <td><?php echo $employee->passport_number; ?></td>
                                            <td><?php echo $employee->date_of_issue; ?></td>
                                            <td><?php echo $employee->valid_upto; ?></td>
                                            <td><?php echo $employee->marital_status; ?></td>
                                            <td><?php echo $employee->blood_group; ?></td>
                                            <td><?php echo $employee->resignation_letter_date; ?></td>
                                            <td><?php echo $employee->relieving_date; ?></td>
                                            <td><?php echo $employee->reason_for_leaving; ?></td>
                                            <td><?php echo $employee->leave_encashed; ?></td>
                                            <td><?php echo $employee->reason_for_resignation; ?></td>
                                            <td><?php echo $employee->discharged_at; ?></td>
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


<!--**********************************-->
            Footer start
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
<script>
	function ExportToExcel(type, fn, dl) {
		var elt = document.getElementById('tbl_exporttable_to_xls');
		var wb = XLSX.utils.table_to_book(elt, {
			sheet: "sheet1"
		});
		return dl ?
			XLSX.write(wb, {
				bookType: type,
				bookSST: true,
				type: 'base64'
			}) :
			XLSX.writeFile(wb, fn || ('Discharged Employees List.' + (type || 'xlsx')));
	}
</script>