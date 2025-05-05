<?php
class Hr extends Controller
{
    public function __construct()
    {
        $this->pageModel = $this->model('Page');

    }

    public function index()
    {
        if (isset($_SESSION['rexkod_admin_id'])) {
            $this->view('hr/index');
        } else {
            redirect('hr/login');
        }
    }

    public function p_attendance_september()
    {
        $users = $this->pageModel->get_perm_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/p_attendance_september', $data);
    }
    public function p_attendance_august()
    {
        $users = $this->pageModel->get_perm_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/p_attendance_august', $data);
    }
    
    public function home()
    {
        $this->view('hr/home');
    }


    public function p_attendance_june()
    {
        $users = $this->pageModel->get_perm_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/p_attendance_june', $data);
    }

    public function p_attendance_april()
    {
        $users = $this->pageModel->get_perm_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/p_attendance_april', $data);
    }
    public function p_attendance_may()
    {
        $users = $this->pageModel->get_perm_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/p_attendance_may', $data);
    }
    public function p_attendance_july()
    {
        $users = $this->pageModel->get_perm_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/p_attendance_july', $data);
    }


    public function attendance()
    {
        $users = $this->pageModel->get_perm_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/attendance', $data);
    }

  public function c_attendance_september()
    {
        $users = $this->pageModel->get_contr_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/c_attendance_september', $data);
    }
  public function c_attendance_august()
    {
        $users = $this->pageModel->get_contr_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/c_attendance_august', $data);
    }

    public function c_attendance_june()
    {
        $users = $this->pageModel->get_contr_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/c_attendance_june', $data);
    }

    public function c_attendance_april()
    {
        $users = $this->pageModel->get_contr_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/c_attendance_april', $data);
    }
    public function c_attendance_may()
    {
        $users = $this->pageModel->get_contr_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/c_attendance_may', $data);
    }

    public function add_reporting_manager(){
        $reporting_manager = $_POST['reporting_manager'];
        $employee_id= $_POST['employee_id'];
        if($reporting_manager  == $employee_id){
            $_SESSION['success'] = "Please do not add Same Employee ID and Reporting Manager";
            redirect('hr/create_reporting_manager');
        }
        $data=[
            'reporting_manager' => $reporting_manager,
            'employee_id'  =>  $employee_id,
        ];
        $add_reporting_manager = $this->pageModel->add_reporting_manager($reporting_manager);
        $add_employee_under_manager = $this->pageModel->add_employee_under_manager($data);
      
        if ($add_employee_under_manager && $add_reporting_manager) {

            $_SESSION['success'] = "Reporting Employee Data Added";

            redirect('hr/create_reporting_manager');
        }else{
            $_SESSION['success'] = "Error Occured";

            redirect('hr/create_reporting_manager');
        }
    }

    public function clear_reporting_manager_from_employer($id){
        $clear_reporting_manager = $this->pageModel->clear_reporting_manager($id);
        
        if ($clear_reporting_manager) {

            $_SESSION['success'] = "Reporting Manager Cleared";

            redirect('hr/create_reporting_manager');
        }else{
            $_SESSION['success'] = "Error Occured";

            redirect('hr/create_reporting_manager');
        }
    }
    public function clear_single_reporting_manager($id){
        $update_reporting_manager_subtype = $this->pageModel->update_reporting_manager_subtype($id);
        $update_employer_reports_to = $this->pageModel->update_employer_reports_to($id);
        
        if ($update_reporting_manager_subtype && $update_employer_reports_to ) {

            $_SESSION['success'] = "Reporting Manager Cleared";

            redirect('hr/create_reporting_manager');
        }else{
            $_SESSION['success'] = "Error Occured";

            redirect('hr/create_reporting_manager');
        }
    }

    public function create_reporting_manager(){
        $employees = $this->pageModel->get_active_employees();
        $get_all_reporting_manager = $this->pageModel->get_all_reporting_manager();
        $data = [
            'employees' => $employees,
            'get_all_reporting_manager' => $get_all_reporting_manager,
        ];
        $this->view('hr/create_reporting_manager',$data);
    }
    public function attendance_contract()
    {
        $users = $this->pageModel->get_contr_users_status();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/attendance_contract', $data);
    }

    
    public function leave()
    {
        $get_all_leaves = $this->pageModel->get_hod_approved_leaves();
        $data = [
            'get_all_leaves' => $get_all_leaves
        ];
        $this->view('hr/leave', $data);
    }
    public function hod_leave()
    {
        $get_all_leaves = $this->pageModel->get_all_leaves();
        $data = [
            'get_all_leaves' => $get_all_leaves
        ];
        $this->view('hr/hod_leave', $data);
    }


    public function meals()
    {
        $cur_date = date('y-m-d');
        //$cur_date = date("Y-m-d", strtotime("yesterday"));
        $breakfast = $this->pageModel->get_meal("BreakFast", $cur_date);
        $lunch = $this->pageModel->get_meal("Lunch", $cur_date);
        $dinner = $this->pageModel->get_meal("Dinner", $cur_date);
        $data = [
            'breakfast' => $breakfast,
            'lunch' => $lunch,
            'dinner' => $dinner,
        ];
        $this->view('hr/meals', $data);
    }
    public function hod_approval($id){
        $hod_approval = $_POST['hod_approval'];

        $update_hod_approved = $this->pageModel->update_hod_approved($id,$hod_approval);
        
        if ($update_hod_approved) {

            $_SESSION['success'] = "Leave Updated";

            redirect('hr/hod_leave');
        }
    }
    public function update_leave_status($id)
    {
        $status = $_POST['leave_status'];
      
        $leave_detail = $this->pageModel->get_leaves_detail($id);
        $type_of_leave = $leave_detail->type;

        $start_date = $leave_detail->start_date;
        $timestamp = strtotime($start_date);

            $day = date('D', $timestamp);
            $end_date = $leave_detail->end_date;
            $date1 = new DateTime($start_date);
            $date2 = new DateTime($end_date);
            $interval = $date1->diff($date2);
        
            $number_of_days =  $interval->d;
            if($number_of_days>=0){
                $timestamp = strtotime($start_date);
                $day= date('D', $timestamp);
            $number_of_days=($number_of_days+1);
    }
    // start finding no of sundays
    function getDateForSpecificDayBetweenDates($startDate, $endDate, $weekdayNumber)
{
 $startDate = strtotime($startDate);
 $endDate = strtotime($endDate);

$dateArr = array();

do
{
    if(date("w", $startDate) != $weekdayNumber)
    {
        $startDate += (24 * 3600); // add 1 day
    }
} while(date("w", $startDate) != $weekdayNumber);


while($startDate <= $endDate)
{
    $dateArr[] = date('Y-m-d', $startDate);
    $startDate += (7 * 24 * 3600); // add 7 days
}

return($dateArr);
}
// end finding number of sunday

$dateArr = getDateForSpecificDayBetweenDates($start_date,$end_date, 0);
  
  $count_of_sundays = (count($dateArr));
  $number_of_days = $number_of_days-$count_of_sundays;

    $timestamp = strtotime($start_date);

    $day = date('D', $timestamp);
 
    $current_employer_id=$leave_detail->user_id;
    
    $salary_detail = $this->pageModel->get_salary_detail_single($current_employer_id);

    $number_of_cl = $salary_detail->cl;
    // echo($number_of_cl);
    // die();
     $number_of_sl = $salary_detail->sl;
    $number_of_el = $salary_detail->el;
    $number_of_od = $salary_detail->od;
    if($status == '1'){
    if($type_of_leave==1){
        // for casual leave
        // if($number_of_cl>=$number_of_days){
        $total_cl = $number_of_cl-$number_of_days;
       
        $apply_leave  = $this->pageModel->update_salary_cl($current_employer_id,$total_cl);
        // $apply_leave  = $this->pageModel->apply_leave($type_of_leave,$start_date,$end_date,$number_of_days);
        // }
    }elseif($type_of_leave==3){
        // for sick leave
        // if($number_of_sl>=$number_of_days){
        $total_sl = $number_of_sl-$number_of_days;
        $apply_leave  = $this->pageModel->update_salary_sl($current_employer_id,$total_sl);
        // $apply_leave  = $this->pageModel->apply_leave($type_of_leave,$start_date,$end_date,$number_of_days);
        // }
    }elseif($type_of_leave==2){
        // for earned leave
        // if($number_of_el>=$number_of_days){
        $total_el = $number_of_el-$number_of_days;
        $apply_leave  = $this->pageModel->update_salary_el($current_employer_id,$total_el);
        // $apply_leave  = $this->pageModel->apply_leave($type_of_leave,$start_date,$end_date,$number_of_days);
        // }
    }else{
        // if($number_of_od>=$number_of_days){
        $total_od = $number_of_od-$number_of_days;
        // for od
        $apply_leave  = $this->pageModel->update_salary_od($current_employer_id,$total_od);
        // $apply_leave  = $this->pageModel->apply_leave($type_of_leave,$start_date,$end_date,$number_of_days);
        // }
       
    }
    $status_update = $this->pageModel->update_leave_status($id, $status);
}elseif($status == '4'){
$delete_leave = $this->pageModel->delete_leave($id);
if($type_of_leave==1){
    $total_cl = $number_of_cl+$number_of_days;
   
    $apply_leave  = $this->pageModel->update_salary_cl($current_employer_id,$total_cl);
}elseif($type_of_leave==3){
    $total_sl = $number_of_sl+$number_of_days;
    $apply_leave  = $this->pageModel->update_salary_sl($current_employer_id,$total_sl);
}elseif($type_of_leave==2){
    $total_el = $number_of_el+$number_of_days;
    $apply_leave  = $this->pageModel->update_salary_el($current_employer_id,$total_el);
}else{
    $total_od = $number_of_od+$number_of_days;
    $apply_leave  = $this->pageModel->update_salary_od($current_employer_id,$total_od);


}

}
 
      


        if ($status_update) {

            $_SESSION['success'] = "Leave Updated";

            redirect('hr/leave');
        }
       elseif ($delete_leave && $apply_leave) {
  

            $_SESSION['success'] = "Leave Deleted";

            redirect('hr/leave');
      
    } else {

            $_SESSION['success'] = "Leave Not Deleted";
            redirect('hr/leave');
        }

    }

   public function test(){


    $this->view('hr/test');
   }
    public function employees()
    {
        $employees = $this->pageModel->get_enabled_employees();

        $data = [

            'employees' => $employees
        ];

        $this->view('hr/employees', $data);
    }
    public function discharged_employees()
    {
        $employees = $this->pageModel->get_disabled_employees();

        $data = [

            'employees' => $employees
        ];

        $this->view('hr/discharged_employees', $data);
    }

    public function search_by_id()
    {

        $id = $_POST['emp_id'];
        if ($id == NULL) {
            redirect("hr/employees");
        } elseif (!empty($this->pageModel->get_employee($id))) {
            redirect("hr/employee/$id");
        } else {
            redirect("hr/employees");
        }
    }

    public function search_employee()
    {
        $search_input = $_GET['search_input'];
        $employees = $this->pageModel->get_employee_by_search($search_input);

        $data = [

            'employees' => $employees
        ];

        $this->view('hr/search_employee', $data);
    }


    public function employee($id)
    {
        $employee = $this->pageModel->get_employee($id);
        $salary = $this->pageModel->get_salary($id);
        $data = [
            'employee' => $employee,
            'salary' => $salary,
        ];

        $this->view('hr/employee', $data);
    }
    public function edit_salary($id)
    {
        $employee = $this->pageModel->get_employee($id);
        $salary = $this->pageModel->get_salary($id);
        $data = [
            'employee' => $employee,
            'salary' => $salary,
        ];

        $this->view('hr/edit_salary', $data);
    }


    public function edit_profile($id)
    {
        $employee = $this->pageModel->get_employee($id);
        $salary = $this->pageModel->get_salary($id);
        $data = [
            'employee' => $employee,
            'salary' => $salary,
        ];

        $this->view('hr/edit_profile', $data);
    }

    public function edit_basic_profile($id)
    {
        $employee = $this->pageModel->get_employee($id);
        $salary = $this->pageModel->get_salary($id);
        $data = [
            'employee' => $employee,
            'salary' => $salary,
        ];

        $this->view('hr/edit_basic_profile', $data);
    }
    public function update_profile($id)
    {
        $data = [
            'mec_id'  => $id,
            'employee_name' => $_POST['employee_name'],
            'designation' => $_POST['designation'],
            'department' => $_POST['department'],
            'branch' => $_POST['branch'],
            'date_of_joining' => $_POST['date_of_joining'],
            'employment_type' => $_POST['employment_type'],
            'cell_number' => $_POST['cell_number'],
            'company_email' => $_POST['company_email'],
            'date_of_birth' => $_POST['date_of_birth'],
            'current_address' => $_POST['current_address'],
            'gender' => $_POST['gender'],
            'blood_group' => $_POST['blood_group'],
            'reports_to' => $_POST['reports_to'],

        ];
        $this->pageModel->update_profile($data);

        flash('message', 'Records Updated');
        redirect('hr/edit_profile/' . $id);
    }

    public function update_basic_profile($id)
    {
        $data = [


            'mec_id'  => $id,
            'passport_number' => $_POST['passport_number'],
            'date_of_issue' => $_POST['date_of_issue'],
            'valid_upto' => $_POST['valid_upto'],
            'permanent_address' => $_POST['permanent_address'],
            'personal_email' => $_POST['personal_email'],
            'marital_status' => $_POST['marital_status'],
            'qualification' => $_POST['qualification'],
            'person_to_be_contacted' => $_POST['person_to_be_contacted'],
            'relation' => $_POST['relation'],
            'emergency_phone_number' => $_POST['emergency_phone_number'],
            'bank_name' => $_POST['bank_name'],
            'bank_ac_no' => $_POST['bank_ac_no'],
            'ifsc_code' => $_POST['ifsc_code'],
            'leave_policy' => $_POST['leave_policy'],
            'default_shift' => $_POST['default_shift'],
            'salary_mode' => $_POST['salary_mode'],
            'cl' => $_POST['cl'],
            'sl' => $_POST['sl'],
            'el' => $_POST['el'],
            'leave_approver' => $_POST['leave_approver'],

        ];
        $this->pageModel->update_basic_profile($data);

        flash('message', 'Records Updated');
        redirect('hr/edit_basic_profile/' . $id);
    }
    public function add_attendance()
    {
        $get_users = $this->pageModel->get_users();
        $data = [

            'user_id' => $_POST['user_id'],
            'start_date' => $_POST['start_date'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'meal' => $_POST['meal'],

        ];
        $this->pageModel->add_attendance_mannual($data);

        // flash('message', 'Records Updated');
        redirect('hr/attendance/');
        // $this->view('hr/attendance');
    }
    public function delete_attendance($id)
    {
        $this->pageModel->delete_attendance($id);
        redirect('hr/attendance');
    }
    public function delete_attendance_april($id)
    {
        $this->pageModel->delete_attendance($id);
        redirect('hr/attendance_april');
    }
    public function delete_attendance_may($id)
    {
        $this->pageModel->delete_attendance($id);
        redirect('hr/attendance_may');
    }
    public function disable_employee($id)
    {
        
        $discharge_time  = $_POST['discharge_time'];
        // echo($discharge_time);
        // die();
        $disable_employee = $this->pageModel->disable_employee($id,$discharge_time);
        if ($disable_employee) {
            $_SESSION['success'] = 'Employee successfully disabled';
            redirect('hr/employee/' . $id);
        } else {
            $_SESSION['success'] = 'Error occurred';
            redirect('hr/employee/' . $id);
        }
    }
    public function enable_employee($id)
    {
        $enable_employee = $this->pageModel->enable_employee($id);
        if ($enable_employee) {
            $_SESSION['success'] = 'Employee successfully enabled';
            redirect('hr/employee/' . $id);
        } else {
            $_SESSION['success'] = 'Error occurred';
            redirect('hr/employee/' . $id);
        }
    }
    public function update_salary($id)
    {

        if($_POST['cl']==NULL){
            $cl = 0;
        }else{
            $cl = $_POST['cl'];
        }
        if($_POST['sl']==NULL){
            $sl = 0;
        }else{
            $sl = $_POST['sl'];
        }
        if($_POST['el']==NULL){
            $el = 0;
        }else{
            $el = $_POST['el'];
        }
        if($_POST['od']==NULL){
            $od = 0;
        }else{
            $od = $_POST['od'];
        }
        $data = [
            'Emp_Id'  => $id,
            'Basic_DA' => $_POST['Basic_DA'],
            'PAN' => $_POST['PAN'],
            'HRA' => $_POST['HRA'],
            'Washing_Allowance' => $_POST['Washing_Allowance'],
            'Telephonic_Allowance' => $_POST['Telephonic_Allowance'],
            'Other_Allowance' => $_POST['Other_Allowance'],
            'Incentive' => $_POST['Incentive'],
            'Earned_Gross' => $_POST['Earned_Gross'],
            'Arrears' => $_POST['Arrears'],
            'PF' => $_POST['PF'],
            'ESI_No' => $_POST['ESI_No'],
            'ESI' => $_POST['ESI'],
            'PT' => $_POST['PT'],
            'Advance' => $_POST['Advance'],
            'Loan' => $_POST['Loan'],
            'TDS' => $_POST['TDS'],
            'Canteen' => $_POST['Canteen'],
            'Other_Deduction' => $_POST['Other_Deduction'],
            'Total_Deduction' => $_POST['Total_Deduction'],

            'cl' => $cl,
            'sl' => $sl,
            'el' => $el,
            'od' => $od,

            'UAN' => $_POST['UAN'],
        ];

        $this->pageModel->update_salary($data);

        flash('message', 'Records Updated');
        redirect('hr/edit_salary/' . $id);
    }
    public function add_db_salary($id)
    {
        $basic_da = $_POST['Basic_DA'];
        $washing_allowance = $_POST['Washing_Allowance'];
        $Telephonic_Allowance = $_POST['Telephonic_Allowance'];
        $Other_Allowance = $_POST['Other_Allowance'];
        $HRA = $_POST['HRA'];
        $Arrears = $_POST['Arrears'];
        $Incentive = $_POST['Incentive'];

        $allowances_pf = intval($basic_da) + intval($washing_allowance) + intval($Telephonic_Allowance) + intval($Other_Allowance);

        $allowances_esi = intval($basic_da) + intval($HRA) +  intval($Telephonic_Allowance) + intval($Other_Allowance);
        $earned_gross =  intval($basic_da) + intval($washing_allowance) + intval($Telephonic_Allowance) + intval($Other_Allowance) + intval($HRA) + intval($Arrears) + intval($Incentive);
        if ($allowances_pf >= 15000) {
            $PF = 1800;
        } else {
            $PF = $allowances_pf * (12 / 100);
        }
        if ($allowances_esi >= 21000) {
            $ESI = 0;
        } else {
            $ESI = $allowances_esi * (0.75 / 100);
        }
        if ($earned_gross >= 15000) {
            $PT = 200;
        } else {
            $PT = 0;
        }
        $advance = $_POST['Advance'];
        $loan = $_POST['Loan'];
        $TDS = $_POST['TDS'];
        $canteen = $_POST['Canteen'];
        $other_deduction = $_POST['Other_Deduction'];
        $total_deduction = intval($ESI) + intval($PT) + intval($advance) + intval($loan) + intval($TDS) + intval($other_deduction) + intval($PF)+intval($canteen);
        
        if(!empty($_POST['cl'])){
            $cl= $_POST['cl'];
        }else{
           $cl= '0';
        }
        if(!empty($_POST['el'])){
            $el= $_POST['el'];
        }else{
           $el= '0';
        }
        if(!empty($_POST['sl'])){
            $sl= $_POST['sl'];
        }else{
           $sl= '0';
        }
        if(!empty($_POST['od'])){
            $od= $_POST['od'];
        }else{
           $od= '0';
        }
        $data = [
            'Emp_Id'  => $id,
            'Basic_DA' => $_POST['Basic_DA'],
            'PAN' => $_POST['PAN'],
            'HRA' => $_POST['HRA'],
            'Washing_Allowance' => $_POST['Washing_Allowance'],
            'Telephonic_Allowance' => $_POST['Telephonic_Allowance'],
            'Other_Allowance' => $_POST['Other_Allowance'],
            'Incentive' => $_POST['Incentive'],
            'Earned_Gross' => $earned_gross,
            'Arrears' => $_POST['Arrears'],

            'PF' => $PF,
            'ESI_No' => $_POST['ESI_No'],
            'ESI' => $ESI,
            'PT' => $PT,
            'Advance' => $_POST['Advance'],
            'Loan' => $_POST['Loan'],
            'TDS' => $_POST['TDS'],
            'Canteen' => $_POST['Canteen'],
            'Other_Deduction' => $_POST['Other_Deduction'],

            'Total_Deduction' => $total_deduction,
            'cl'=> $cl,
            'el'=> $el,
            'sl'=> $sl,
            'od'=> $od,
            
            

            'UAN' => $_POST['UAN'],
        ];

        $this->pageModel->add_db_salary($data);

        flash('message', 'Salary Data Added ');
        redirect('hr/employee/' . $id);
    }



    public function add_salary($id)
    {
        $employee_detail = $this->pageModel->get_employee_detail($id);
        $data = [
            'get_employee_detail' => $employee_detail,
        ];
        $this->view('hr/add_salary', $data);
    }
    public function attendance_employee()
    {
        $this->view('hr/attendance_employee');
    }

    public function departments()
    {
        $this->view('hr/departments');
    }

    public function designations()
    {
        $this->view('hr/designations');
    }

    public function payroll_items()
    {
        $this->view('hr/payroll_items');
    }

    public function payslip_reports()
    {
        $this->view('hr/payslip_reports');
    }

    public function salary()
    {
        $users = $this->pageModel->get_users();
        $data = [
            'users' => $users,
        ];
        $this->view('hr/salary', $data);
    }

    public function payslip($id)
    {
        $employee = $this->pageModel->get_employee($id);
        $salary = $this->pageModel->get_salary($id);
        $data = [
            'employee' => $employee,
            'salary' => $salary,
        ];
        $this->view('hr/payslip', $data);
    }

    public function print_payslip($id)
    {
        $employee = $this->pageModel->get_employee($id);
        $salary = $this->pageModel->get_salary($id);
        $data = [
            'employee' => $employee,
            'salary' => $salary,
        ];
        $this->view('hr/print_payslip', $data);
    }

    public function upload_employees()
    {
        $this->view('hr/upload_employees');
    }
  
    public function upload_employees_excel()
    {
        $upload = $this->pageModel->upload_users();
        if ($upload) {
            $_SESSION['success'] = 'Uploaded';
            redirect('hr/upload_employees');
        } else {
            $_SESSION['success'] = 'Invalid CSV Format';
            redirect('hr/upload_employees');
        }
    }
    
    public function upload_leaves_excel()
    {
        $upload = $this->pageModel->upload_leaves();
        if ($upload) {
            $_SESSION['success'] = 'Uploaded';
            redirect('hr/leaves');
        } else {
            $_SESSION['success'] = 'Invalid CSV Format';
            redirect('hr/leaves');
        }
    }


    public function salary_settings()
    {
        $this->view('hr/salary_settings');
    }

    public function salary_view()
    {
        $this->view('hr/salary_view');
    }


    public function logout()
    {
        session_destroy();
        redirect('hr/login');
    }



    public function faqs()
    {
        $this->view('hr/faqs');
    }


    public function tnc()
    {
        $this->view('hr/tnc');
    }

    public function privacy_policy()
    {
        $this->view('hr/privacy_policy');
    }


    public function refund_policy()
    {
        $this->view('hr/refund_policy');
    }


    public function invoice($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        $get_vendor = $this->pageModel->getVendorById($get_order->vendor_id);
        $get_user = $this->pageModel->get_custinfo($get_order->user_id);
        $get_order_detail = $this->pageModel->getOrderDetailById($id);

        $data = [
            'get_order' => $get_order,
            'get_vendor' => $get_vendor,
            'get_user' => $get_user,
            'get_order_detail' => $get_order_detail
        ];

        $this->view('hr/invoice', $data);
    }



    public function add_profile()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $name = $_POST['name'];
            if (isset($_POST['user_type'])) {
                $type = 1;
            } else {
                $type = 0;
            }
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $pincode = $_POST['pincode'];
            $gst = $_POST['gst'];


            if ($this->pageModel->add_user_profile($name, $type, $address, $city, $state, $pincode, $gst)) {
                $_SESSION['success'] = "Profile Added Successfully..! ";
                redirect('hr/profile');
            } else {
                $_SESSION['success'] = 'Profile Not Added';
                $this->view('hr/add_profile');
            }
        } else {
            $this->view('hr/add_profile', $data);
        }
    }



    public function about()
    {
        $this->view('hr/about');
    }

    public function services()
    {
        $this->view('hr/services');
    }

    public function contact()
    {
        $this->view('hr/contact');
    }

    

    public function vendors()
    {
        $get_all_vendors = $this->pageModel->get_all_vendors1();

        $data = [

            'get_all_vendors' => $get_all_vendors,
        ];

        $this->view('hr/vendors', $data);
    }





    public function find_productsFor_vendorId($id)
    {
        $products_forVendor = $this->pageModel->get_all_products_forVendor($id);

        $res = $this->pageModel->ulogin_using_rowId($id);

        $data = [

            'products_forVendor' => $products_forVendor,
            'res' => $res,
        ];

        $this->view('hr/products_forVendor', $data);
    }




    public function products()
    {
        $get_all_category = $this->pageModel->get_all_category();

        $products = $this->pageModel->get_all_products();

        $data = [
            'all_pro' => $products,
            'all_category' => $get_all_category,
        ];

        $this->view('hr/products', $data);
    }



    public function single_product($id)
    {

        $s = $this->pageModel->get_single_products($id);
        $pro_subcategory = $this->pageModel->getSubcategoryById($s->p_subcat);
        $cart_products = $this->pageModel->getcart_items();
        $pp_points = $this->pageModel->getpropage_points();
        $data = [
            'single_product' => $s,
            'cart_products' => $cart_products,
            'subcategory' => $pro_subcategory,
            'pp_points' => $pp_points,
        ];

        $this->view('hr/single_product', $data);
    }









    public function add_to_cart($pro_id)
    {

        $created_by = $_SESSION['rexkod_user_id'];
        $qty = $_POST['qty_count'];
        $incart = 0;
        $final_price = 0;

        $cart_products = $this->pageModel->getcart_items();
        foreach ($cart_products as $cart) {
            if ($cart->item_id == $pro_id) {
                $incart = 1;
            }
        }


        $x = $this->pageModel->get_single_product($pro_id);

        $found_user = $this->pageModel->get_cart_user_check();
        $found_vendor = $this->pageModel->get_cart_vendor_check($x->created_byId);

        $cart_permission = 0;

        if (empty($found_user)) {
            $cart_permission = 1;
        } else if (!empty($found_user) && !empty($found_vendor)) {
            $cart_permission = 1;
        }







        if ($cart_permission == 1) {

            if ($x->min2 == 0) {

                $final_price = $x->price1;
            } else if ($x->min3 == 0) {

                if ($qty <= $x->max1) {
                    $final_price = $x->price1;
                } else {
                    $final_price = $x->price2;
                }
            } else if ($x->min4 == 0) {

                if ($qty <= $x->max1) {
                    $final_price = $x->price1;
                } else if ($qty <= $x->max2) {
                    $final_price = $x->price2;
                } else {
                    $final_price = $x->price3;
                }
            } else if ($x->min5 == 0) {

                if ($qty <= $x->max1) {
                    $final_price = $x->price1;
                } else if ($qty <= $x->max2) {
                    $final_price = $x->price2;
                } else if ($qty <= $x->max3) {
                    $final_price = $x->price3;
                } else {
                    $final_price = $x->price4;
                }
            } else if ($x->min5 != 0) {

                if ($qty <= $x->max1) {

                    $final_price = $x->price1;
                } else if ($qty <= $x->max2) {

                    $final_price = $x->price2;
                } else if ($qty <= $x->max3) {

                    $final_price = $x->price3;
                } else if ($qty <= $x->max4) {

                    $final_price = $x->price4;
                } else {

                    $final_price = $x->price5;
                }
            }



            $z = (((float)$final_price) * ((float)$qty));

            $data = [
                'id' => $pro_id,
                'name' => $x->p_name,
                'qty' => $qty,
                'price' => $final_price,
                'total' => $z,
                'created_by' => $created_by,
                'created_byId' => $x->created_byId,
                'created_byType' => $x->created_byType,
                'img' => $x->p_image,
            ];

            $this->pageModel->add_item_to_cart_db($data);


            $_SESSION['success'] = "Item Added to cart";

            redirect('hr/single_product/' . $pro_id);
        } else {

            $_SESSION['success'] = "Item not added to cart, Clear existing cart!";

            redirect('hr/single_product/' . $pro_id);
        }
    }






    public function cart_delete()
    {
        $created_by = $_SESSION['rexkod_user_id'];
        $p_id = $_POST['product_id'];
        $x = $this->pageModel->getcart_items_by_item_id($p_id);
        $qty = $_POST['count'];
        $qty_old = $x->item_qty;
        $q = $qty_new = $qty_old - $qty;

        if ($q == 0) {
            $z = (((float)$x->item_price) * ((float)$q));
            $data = [
                'cart_id' => $x->id,
                'created_by' => $created_by,
            ];
            $this->pageModel->delete_item_to_cart_db_if_zero($data);
        } else {
            $z = (((float)$x->item_price) * ((float)$q));
            $data = [
                'cart_id' => $x->id,
                'id' => $p_id,
                'name' => $x->item_name,
                'qty' => $q,
                'price' => $x->item_price,
                'total' => $z,
                'created_by' => $created_by,
            ];
            $this->pageModel->delete_item_to_cart_db($data);
        }
        // echo "Item deleted";       
    }



    public function cart()
    {
        $s = $this->pageModel->getcart_items();

        $data = ['s' => $s,];

        $this->view('hr/cart', $data);
    }




    public function delete_cart_item($id)
    {
        $update_cart_1 = $this->pageModel->delete_cart_item_db($id);

        $s = $this->pageModel->getcart_items();

        $data = ['s' => $s,];

        redirect('hr/cart', $data);
    }




    public function update_cart_coupon($id)
    {
        $cart_coupon = $this->pageModel->update_cartCoupon($id);

        $s = $this->pageModel->getcart_items();
        $usr = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']);

        $data = [
            's' => $s,
            'sum' => $this->pageModel->get_sum_cart(),
            'userinfo' => $usr,
        ];
        if ($cart_coupon) {
            $_SESSION['success'] = "Coupon added successfully";
        } else {
            $_SESSION['success'] = "Coupon not added";
        }
        redirect('hr/checkout', $data);
    }


    public function return_order($id)
    {
        $order_return = $this->pageModel->return_order($id);

        if ($order_return) {
            $_SESSION['success'] = "Return Requested";
        } else {
            $_SESSION['success'] = "Return Request Failed";
        }

        $get_orders_user = $this->pageModel->get_orders_user($_SESSION['rexkod_user_id']);

        $data = [

            'get_orders_user' => $get_orders_user,
        ];

        $this->view('hr/orders', $data);
    }



    public function checkout()
    {
        $s = $this->pageModel->getcart_items();
        $usr = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']);

        $data = [
            's' => $s,
            'sum' => $this->pageModel->get_sum_cart(),
            'userinfo' => $usr,
        ];

        $this->view('hr/checkout', $data);
    }



    public function address()
    {
        $get_user_details = $this->pageModel->get_all_userinfo();

        $data = [

            'get_user_details' => $get_user_details,
        ];

        $this->view('hr/address', $data);
    }




    public function tcs_certificate()
    {
        $tcs_cert = $this->pageModel->get_tcs();
        $data = [
            'all_tcs' => $tcs_cert,
        ];
        $this->view('hr/tcs_certificate', $data);
    }





    public function pay_for_payment()
    {
        if (isset($_SESSION['rexkod_user_id'])) {

            $data_checkout = (object) unserialize($_SESSION['data_checkout']);
            //unset($_SESSION['data_checkout']);

            $i_total = $this->pageModel->get_sum_cart_for_payment();

            $i_total = round($i_total);
            $_SESSION['order_id'] = "ORDS" . rand(10000, 99999999);

            $tx = $this->pageModel->get_userinfo($_SESSION['rexkod_user_id']);
            $txuser = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']);

            $data = [

                'name' => $txuser->user_name,
                'email' => $tx->email,
                'phone' => $tx->phone,
                'tprice' => $i_total,
                'ORDERID' => $_SESSION['order_id'],
                'add' => $txuser->user_address,
                'zipcode' => $txuser->user_pincode,
                'city' => $txuser->user_city,
                'state' => $txuser->user_state,
                'country' => $txuser->user_country,

            ];

            $res = $this->pageModel->add_cart_for_paymentPayAtdel($data['name'], $data['email'], $data['phone'], $data['add'], $data['city'], $data['state'], $data['zipcode'], $data['country'], $data, $data_checkout);

            if ($res) {
                $_SESSION['success'] = "order placed successfully";
                redirect('hr/sucess');
            }
        } else {
            $_SESSION['success'] = "login and continue";
            redirect('hr/login');
        }
    }


    public function paymentStatus_cart()
    {

        echo $_SESSION['order_id'];

        $tx = $this->pageModel->gettempdate($_SESSION['order_id']);

        $x1 = explode("|", $tx->temp_data);
        $_SESSION['price'] = $x1[0];

        $_SESSION['name'] = $tx->name;
        $_SESSION['email'] =  $tx->email;
        $_SESSION['phone'] =   $tx->phone;
        $_SESSION['foxcart_user'] = $tx->auth_id;
        $_SESSION['user_all'] = $tx;
        $_SESSION['rexkod_user_id'] = $tx->auth_id;
        $_SESSION['user_name'] = $tx->name;
        $_SESSION['user_email'] = $tx->email;
        $_SESSION['user_phone'] = $tx->phone;
        $_SESSION['user_img'] = $tx->img;
        $_SESSION['l_name'] = "cart payment";

        if ($_SESSION['payment_status'] == 'success') {
            $data = [
                'name' => $_SESSION['name'],
                'email' => $_SESSION['email'],
                'phone' => $_SESSION['phone'],
                'tprice' => $_SESSION['price'],
                'ORDERID' => $_SESSION['order_id'],
                'TXNID' => $_SESSION['razorpay_payment_id'],
                'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                'razorpay_signature' => $_SESSION['razorpay_signature'],
            ];
            $add = $x1[1];
            $city = $x1[2];
            $state = $x1[3];
            $zipcode = $x1[4];
            $country = $x1[5];

            // var_dump($data);

            $x = $this->pageModel->ulogin_using_rowId($_SESSION['rexkod_user_id']);

            $res = $this->pageModel->add_cart_for_payment($data['name'], $data['email'], $data['phone'], $add, $city, $state, $zipcode, $country, $data);

            $_SESSION['success'] = "Order Placed Successfully";
            redirect('hr/success');
        } else {
            $_SESSION['success'] = "payment failed order not placed";
            redirect('hr/index');
        }
    }



    public function login()
    {
        $this->view('hr/login');
    }






    public function user_login()
    {
       
        if(!isset($_POST['username']))
        {
            $_SESSION['success'] = "Enter User Email / Phone";
            redirect('hr/login');
        }
        else
        { 
            
            if(!isset($_POST['password']))
            {
                $_SESSION['success'] = "Enter Password";
                redirect('hr/login');
            }
            else
            {
                $user = "";

                if ( is_numeric($_POST['username']) ) {
                    $email_verify_phone = $this->pageModel->email_verify_phone($_POST['username']);
                } else {
                    $check_email = $this->pageModel->email_verify($_POST['username']);
                }
                

                if(empty($check_email) && empty($email_verify_phone))
                {
                    $_SESSION['success'] = "Invalid Username";
                    redirect('hr/login');
                }
                else
                {
                    if(!empty($check_email))
                    {
                        $user_results  = $check_email;

                        $password_res = $check_email->password;
                    }
                    elseif(!empty($email_verify_phone))
                    {
                        $user_results  = $email_verify_phone;

                        $password_res = $email_verify_phone->password;
                    }


                    if(password_verify($_POST['password'], $password_res))
                    {
                        $user = $user_results;
                    }
                    else
                    {
                         $user = "";
                    }
                    if(empty($user))
                    {

                       $_SESSION['success'] = "Invalid Credential!";
                       redirect('hr/login');
                       
                    }else
                    {
                        if($user->type=="admin")
                        {
                            $_SESSION['rexkod_admin_id'] = $user->id;
                            $_SESSION['rexkod_admin_email'] = $user->email;
                            $_SESSION['rexkod_admin_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('admin/index');
                        }

                        elseif($user->type=="hr")
                        {
                            $_SESSION['rexkod_admin_id'] = $user->id;
                            $_SESSION['rexkod_admin_email'] = $user->email;
                            $_SESSION['rexkod_admin_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('hr/index');
                        }
                        elseif($user->type=="hod")
                        {
                            $_SESSION['rexkod_admin_id'] = $user->id;
                            $_SESSION['rexkod_admin_email'] = $user->email;
                            $_SESSION['rexkod_admin_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('hr/index');
                        }

                        else
                        {
                            
                           
                        }
                    }
                    
                }
               
            }
        }
    }




    public function search()
    {

        $res = $this->pageModel->get_productsBySearch($_POST['search_input']);



        $data = [
            'res' => $res,
            'search_input' => $_POST['search_input'],
        ];


        $this->view('hr/search', $data);
    }

    public function orders()
    {

        $get_orders_user = $this->pageModel->get_orders_user($_SESSION['rexkod_user_id']);

        $data = [

            'get_orders_user' => $get_orders_user,
        ];

        $this->view('hr/orders', $data);
    }



    public function order_detail($id)
    {

        $get_order = $this->pageModel->getOrderById($id);

        $get_order_detail = $this->pageModel->getOrderDetailById($id);

        $data = [
            'get_order' => $get_order,
            'get_order_detail' => $get_order_detail
        ];

        $this->view('hr/order_detail', $data);
    }




    public function tcs_detail($id)
    {

        $tcs_details = $this->pageModel->getTcsById($id);


        $data = [
            'tcs_detail' => $tcs_details
        ];

        $this->view('hr/tcs_detail', $data);
    }




    public function register()
    {

        $this->view('hr/register');
    }



    public function attendance_log()
    {
        $cams = $this->pageModel->get_cams();
        $data = [
            'cams' => $cams,
        ];
        $this->view('hr/attendance_log', $data);
    }

    public function attendance_update()
    {
        $cams_val = $this->pageModel->get_cams();
        foreach ($cams_val as $cams) {
            $punch_val = $cams->cams;
            $punch = json_decode($punch_val, TRUE);
            $entry = $punch['RealTime']['PunchLog'];
            $date_val =  explode(" ", $entry['LogTime']);
            $date_cur = $date_val[0];
            $time_cur = $date_val[1];

            $date =  date('Y-m-d', strtotime($date_cur));
            $time =  date('H:i:s', strtotime($time_cur));
            $meal = $entry['Type'];
            $user_id = $entry['UserId'];

            $attend = $this->pageModel->get_attendance_date($user_id, $date);
            if ($attend) {
                $this->pageModel->update_attendance($attend->id, $date, $time);
            } else {
                $this->pageModel->add_attendance($user_id, $date, $time, $meal);
            }
        }

        //$this->view('hr/attendance_update', $data);
    }


    public function user_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $phno = $_POST['phno'];
            $pass = $_POST['password'];

            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('hr/register');
            } else if ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('hr/register');
            } else {


                if ($this->pageModel->findUserByphno($phno)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('hr/register');
                } else {

                    $pass = password_hash($pass, PASSWORD_DEFAULT);

                    if ($this->pageModel->add_user($email, $phno, $pass)) {

                        $user = $this->pageModel->ulogin($email, $_POST['password']);

                        $_SESSION['rexkod_user_id'] = $user->id;
                        $_SESSION['rexkod_user_email'] = $user->email;
                        $_SESSION['rexkod_user_phone'] = $user->phone;
                        $_SESSION['rexkod_login_type'] = $user->type;

                        redirect('hr/index');

                        $_SESSION['success'] = "Registered Successfully..! ";
                        redirect('hr/add_profile');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('hr/register');
                    }
                }
            }
        } else {
            redirect('hr/register');
        }
    }




    public function profile()
    {
        $get_user_details = $this->pageModel->get_all_userinfo();

        $data = [

            'get_user_details' => $get_user_details,
        ];

        $this->view('hr/profile', $data);
    }



    public function success()
    {
        $this->view('hr/success');
    }
}
