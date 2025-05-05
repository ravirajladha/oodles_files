<?php
require_once(APPROOT . "/libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class School extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admins');
        $this->pageModel = $this->model('Page');
        $this->studentModel = $this->model('Students');
        $this->teacherModel = $this->model('Teachers');
        $this->corporateModel = $this->model('Corporates');
        $this->schoolModel = $this->model('Schools');
    }

    public function index()
    {

        // $_SESSION['nav'] = "home";

        if (isset($_SESSION['rexkod_oodles_school_id'])) {
            $this->view('school/index');
        } else {
            $this->view('school/login');
        }
    }

    public function change_teacher_status($id)
    {

        if (isset($_POST['activate'])) {
            $status = "1";
        } elseif (isset($_POST['deactivate'])) {
            $status = "0";
        }

        $change_status = $this->adminModel->change_teacher_status($status, $id);
        if ($change_status) {
            $_SESSION['success'] = "Status Updated";
            redirect('school/teacher');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('school/teacher');
        }
    }

    public function wallet()
    {
        $get_wallet_detail = $this->schoolModel->getWallet();
        $get_transaction = $this->schoolModel->getTransactions();
        $get_recharged_transaction = $this->schoolModel->get_recharged_transaction();
        $get_spent_transaction = $this->schoolModel->get_spent_transaction();

        $data = [
            'get_wallet_detail' => $get_wallet_detail,
            'get_transaction' => $get_transaction,
            'get_recharged_transaction' => $get_recharged_transaction,
            'get_spent_transaction' => $get_spent_transaction,

        ];

        $this->view('school/wallet', $data);
    }
    public function add_money($amount, $txnid)
    {
        $type = 1;
        //   $quiz_id = 0;
        $add_money = $this->schoolModel->add_money($amount, $txnid, $type);
        $_SESSION['success'] = "Money added successfully";
        redirect('school/wallet');
    }




    public function pay()
    {
        $api = new Api(RPKID, RPKS);

        $razorpayOrder = $api->order->create(array(
            'receipt'         => rand(),
            'amount'          => $_POST['amount'] * 100, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' =>  1
        ));


        $amount = $razorpayOrder['amount'];

        $razorpayOrderId = $razorpayOrder['id'];

        $_SESSION['razorpay_order_id'] = $razorpayOrderId;

        $data = $this->prepareData($amount, $razorpayOrderId);

        $this->view('school/rezorpay', $data);
    }

    /**
     * This function verifies the payment,after successful payment
     */
    public function verify($amount)
    {
        $amount = $amount / 100;
        $success = true;
        $error = "payment_failed";
        if (empty($_POST['razorpay_payment_id']) === false) {
            $api = new Api(RPKID, RPKS);
            try {
                $attributes = array(
                    'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );
                $api->utility->verifyPaymentSignature($attributes);
            } catch (SignatureVerificationError $e) {
                $success = false;
                $error = 'Razorpay_Error : ' . $e->getMessage();
            }
        }
        if ($success === true) {
            unset($_SESSION['order_type']);
            redirect('school/add_money/' . $amount . '/' . $_SESSION['razorpay_order_id']);
        } else {
            redirect('school/error');
        }
    }


    public function prepareData($amount, $razorpayOrderId)
    {
        $data = array(
            "key" => RPKID,
            "amount" => $amount,
            "name" => "OodlesIn",
            "description" => "Oodles Infology Private Limited",
            "image" => URLROOT . "/assets_home/images/resources/logo-1.png",
            "prefill" => array(
                "name"  => $_SESSION['rexkod_oodles_school_id'],
                "email"  => $_SESSION['rexkod_oodles_school_email'],
                "contact" => $_SESSION['rexkod_oodles_school_phone'],
            ),
            "notes"  => array(
                "address"  => "India",
                "merchant_order_id" => rand(),
            ),
            "theme"  => array(
                "color"  => "#337ab7"
                // change into oodles blue color
            ),
            "order_id" => $razorpayOrderId,
        );
        return $data;
    }

    public function paymentFailed()
    {
        $this->view('school/error');
    }

    public function buy_quiz_for_school()
    {
        $get_wallet_detail = $this->schoolModel->getWallet();
        if ($get_wallet_detail->balance_amount < 100) {
            $_SESSION['success'] = "Wallet Balance Low, Please recharge";
            redirect('school/wallet');
        } else {
            $debit_money  = $this->schoolModel->debit_money(100, 'debited_in_quiz_by_school', 7, 10);
            if ($debit_money) {
                redirect('school/wallet');
            } else {
                $_SESSION['success'] = "Error Occured";
                redirect('school/wallet');
            }
        }
    }

    public function transactions()
    {
        $transactions = $this->pageModel->getTransactions();

        $data = [
            'transactions' => $transactions,
        ];

        $this->view('school/transactions', $data);
    }


    public function register()
    {
        if (isset($_SESSION['rexkod_oodles_teacher_id'])) {

            redirect('school/index');
        } else {
            $get_school_detail  = $this->adminModel->get_school_detail();
            $data = [
                'get_school_detail' => $get_school_detail,
            ];
            $this->view('school/register', $data);
        }
    }
    public function add_teacher()
    {
        $get_school_detail  = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_teacher = $this->adminModel->get_all_teacher();

        $data = [
            'get_school_detail' => $get_school_detail,
            'get_all_teacher' => $get_all_teacher,
            'get_all_class' => $get_all_class,

        ];
        $_SESSION['nav'] = "quiz";
        $this->view('school/add_teacher', $data);
    }

    public function resources()
{
    $get_all_school_class = $this->adminModel->get_all_school_class();

    $get_all_school_subject = $this->adminModel->get_all_school_subject();
    $get_all_chapter = $this->adminModel->get_all_chapter();
    $get_all_topic = $this->adminModel->get_all_topic();
    $get_all_class = $this->adminModel->get_all_class();
    $data = [
        'get_all_school_class' => $get_all_school_class,
        'get_all_school_subject' => $get_all_school_subject,
        'get_all_chapter' => $get_all_chapter,
        'get_all_topic' => $get_all_topic,
        'get_all_class' => $get_all_class,
    ];
  
    $this->view('school/resources', $data);
}

    public function create_teacher()
    { 
        $today = date("Y-m-d");
        $get_school_wallet = $this->schoolModel->get_school_wallet($_SESSION['rexkod_oodles_school_id']);
        $get_premium_school_data = $this->schoolModel->get_premium_school_single_data($_SESSION['rexkod_oodles_school_id']);

        if(isset($get_school_wallet) && $get_school_wallet->teacher_balance>0 && ($get_premium_school_data->start_date<=$today) && ($get_premium_school_data->end_date>=$today) && ($get_school_wallet->status==1)){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $subject = $_POST['subject'];
                // $subject = implode(',', $_POST['subject']);

                $data = [
                    'name' => $_POST['name'],
                    'school' => $_SESSION['rexkod_oodles_school_id'],
                    'class' => $_POST['class'],
                    'subject' => $subject,
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'password' => $_POST['password'],
                ];

                if (empty($email)) {
                    $_SESSION['success'] = 'Please enter email';
                    redirect('school/add_teacher');
                } else if ($this->pageModel->findUserByemail($email)) {
                    $_SESSION['success'] = 'Email already taken';
                    redirect('school/add_teacher');
                } else {


                    if ($this->pageModel->findUserByphno($phone)) {
                        $_SESSION['success'] = 'Phone number already taken';
                        redirect('school/add_teacher');
                    } else {

                        $pass = password_hash($password, PASSWORD_DEFAULT);
                        if ($this->adminModel->create_teacher($data, $pass)) {
                            $update_teacher_balance = $this->schoolModel->update_teacher_balance_from_school_wallet($_SESSION['rexkod_oodles_school_id']);
                            $user = $this->pageModel->ulogin($email, $_POST['password']);
                            $_SESSION['rexkod_oodles_teacher_id'] = $user->id;
                            // echo  $_SESSION['rexkod_oodles_student_id'];
                            // die();
                            $_SESSION['rexkod_oodles_teacher_name'] = $user->name;
                            $_SESSION['rexkod_oodles_teacher_email'] = $user->email;
                            $_SESSION['rexkod_oodles_teacher_phone'] = $user->phone;
                            $_SESSION['rexkod_oodles_teacher_login_type'] = $user->type;

                            $_SESSION['success'] = "Teacher Added Successfully..! ";
                            redirect('school/add_teacher');
                        } else {
                            $_SESSION['success'] = 'Registration Failed!';
                            redirect('school/add_teacher');
                        }
                    }
                }
            } else {
                redirect('school/add_teacher');
            }
        }else{
            if($get_school_wallet->teacher_balance<0){
                $_SESSION['success'] = 'Please recharge, Teacher Balance Low';
                redirect('school/add_teacher');
            }elseif($get_premium_school_data->start_date>=$today){
                $_SESSION['success'] = 'Your plan has not been started yet!';
                redirect('school/add_teacher');
            }elseif($get_premium_school_data->end_date<=$today){
                $_SESSION['success'] = 'Your plan has been expired!';
                redirect('school/add_teacher');
            }elseif($get_school_wallet->status==0){
                $_SESSION['success'] = 'Contact admin to use subscription benefits!';
                redirect('school/add_teacher');
            }
      
        }
       
    }

    public function forgot_password()
    {

        $this->view('school/forgot_password');
    }

    public function update_password()
    {

        $phno = $_POST['phone'];
        $pass = $_POST['password'];

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        if ($this->studentModel->update_password($phno, $pass)) {
            redirect('school/login');
        } else {
            redirect('school/forgot_password');
        }
    }


    public function teacher_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $data = [
                'name' => $_POST['name'],
                'school' => $_POST['school'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'password' => $_POST['password'],
            ];

            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('school/register');
            } else if ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('school/register');
            } else {


                if ($this->pageModel->findUserByphno($phone)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('school/register');
                } else {

                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    if ($this->adminModel->create_teacher($data, $pass)) {
                        $user = $this->pageModel->ulogin($email, $_POST['password']);
                        $_SESSION['rexkod_oodles_teacher_id'] = $user->id;
                        // echo  $_SESSION['rexkod_oodles_teacher_id'];
                        // die();
                        $_SESSION['rexkod_oodles_teacher_name'] = $user->name;
                        $_SESSION['rexkod_oodles_teacher_email'] = $user->email;
                        $_SESSION['rexkod_oodles_teacher_phone'] = $user->phone;
                        $_SESSION['rexkod_login_type'] = $user->type;

                        $_SESSION['success'] = "Registered Successfully..! ";
                        redirect('school/index');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('school/register');
                    }
                }
            }
        } else {
            redirect('school/register');
        }
    }






    public function quiz()
    {
        $_SESSION['nav'] = "quiz";
        $this->view('school/quiz');
    }
    public function teacher()
    {
        $get_all_teacher  = $this->schoolModel->get_all_teacher_of_school();
        $data = [
            'get_all_teacher' => $get_all_teacher,
        ];
        $_SESSION['nav'] = "quiz";
        $this->view('school/teacher', $data);
    }




    public function create_subject()
    {
        $subject_name = $_POST['subject_name'];
        $result = $this->adminModel->add_subject($subject_name);
        if ($result) {

            $_SESSION['success'] = "Subject added Successfully";
            redirect('school/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('school/add_subject');
        }
    }

    public function get_subject_chapter_name()
    {
        $subject_id = $_POST['subject_id'];
        $get_sub_subject_from_subject = $this->adminModel->get_sub_subject_from_subject($subject_id);
        foreach ($get_sub_subject_from_subject as $detail) {
            echo "<option value=$detail->id> $detail->name</option>";
        }
    }

    public function get_topic_chapter_wise()
    {
        $chapter_id = $_POST['chapter_id'];
        $get_topic_from_chapter = $this->adminModel->get_topic_from_chapter($chapter_id);
        foreach ($get_topic_from_chapter as $detail) {
            echo "<option value=$detail->id> $detail->name</option>";
        }
    }

    public function create_chapter()
    {
        if (!empty($_FILES['quiz_resource']['name'])) {
            $f_name = $_FILES['quiz_resource']['name'];
            $f_temp = $_FILES['quiz_resource']['tmp_name'];
            $size = $_FILES['quiz_resource']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $quiz_resource = $f_newfile;
        } else {
            $quiz_resource = NULL;
        }
        if (!empty($_FILES['quiz_map']['name'])) {
            $f_name = $_FILES['quiz_map']['name'];
            $f_temp = $_FILES['quiz_map']['tmp_name'];
            $size = $_FILES['quiz_map']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $quiz_map = $f_newfile;
        } else {
            $quiz_map = NULL;
        }
        $chapter = $_POST['chapter'];
        $subject_name = $_POST['subject_name'];
        $data = [
            'chapter' => $chapter,
            'subject_name' => $subject_name,
            'quiz_resource' => $quiz_resource,
            'quiz_map' => $quiz_map,
        ];
        $result = $this->adminModel->add_chapter($data);
        if ($result) {
            $_SESSION['success'] = "Chapters added Successfully";
            redirect('school/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('school/add_subject');
        }
    }
    public function create_topic()
    {
        $topic   = $_POST['topic'];
        $chapter = $_POST['chapter'];
        $subject = $_POST['subject'];
        $data = [
            'chapter' => $chapter,
            'subject' => $subject,
            'topic' => $topic,
        ];
        $result = $this->adminModel->add_topic($data);
        if ($result) {
            $_SESSION['success'] = "Topic added Successfully";
            redirect('school/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('school/add_subject');
        }
    }

    public function create_class()
    {
        $class_name = $_POST['class_name'];
        $result = $this->adminModel->add_class($class_name);
        if ($result) {

            $_SESSION['success'] = "Class added Successfully";
            redirect('school/add_class');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('school/add_class');
        }
    }
    public function create_quiz_category()
    {
        $category = $_POST['category'];
        $result = $this->adminModel->add_quiz_category($category);
        if ($result) {

            $_SESSION['success'] = "Category added Successfully";
            redirect('school/add_quiz_category');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('school/add_quiz_category');
        }
    }
    public function update_quiz_category($id)
    {

        $category = $_POST['category'];
        $result = $this->adminModel->update_quiz_category($category, $id);
        if ($result) {

            $_SESSION['success'] = "Category updated Successfully";
            redirect('school/edit_quiz_category/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('school/edit_quiz_category/' . $id);
        }
    }
    public function update_school_class($id)
    {

        $class_name = $_POST['class_name'];
        $result = $this->adminModel->update_school_class($class_name, $id);
        if ($result) {

            $_SESSION['success'] = "Class updated Successfully";
            redirect('school/edit_class/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('school/edit_class/' . $id);
        }
    }
    public function update_school_subject($id)
    {

        $subject_name = $_POST['subject_name'];
        $result = $this->adminModel->update_school_subject($subject_name, $id);
        if ($result) {

            $_SESSION['success'] = "subject updated Successfully";
            redirect('school/edit_subject/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('school/edit_subject/' . $id);
        }
    }
    public function review_quiz()
    {
        $last_quiz = $this->adminModel->last_added_quiz();
        $data = [
            'last_added_quiz' => $last_quiz,
        ];
        $this->view('school/review_quiz', $data);
    }
    public function view_quiz($id)
    {
        $get_quiz_detail = $this->adminModel->get_single_quizes($id);
        $data = [
            'get_quiz_detail' => $get_quiz_detail,
        ];
        $this->view('school/view_quiz', $data);
    }


    public function quiz_result_subject_wise($teacher_id)
    {
        $data = [
            'teacher_id' => $teacher_id,
        ];
        $this->view('school/quiz_result_subject_wise', $data);
    }
    public function quiz_result_category_wise($subject, $teacher_id)
    {
        // if (!isset($category)) {
        //     $category = 1;
        // }
        if (!isset($subject)) {
            $subject = 0;
        }
        // $select_category = $_POST['select_category'];
        // echo $select_category;
        // echo "<br>";
        // echo $subject;
        // die();
        // $all_subject_under_quiz_category = $this->adminModel->get_subject_from_quiz_category($category);
        // $subject = $_POST['subject_name'];
        $get_all_subject = $this->adminModel->get_all_subject();
        $get_teacher_detail = $this->schoolModel->get_teacher_detail($teacher_id);

        $school_id = $get_teacher_detail->school;
        $get_all_quiz1 =  $this->teacherModel->get_quiz_for_category_and_subject(1, $subject, $teacher_id);
        $get_all_quiz2 =  $this->teacherModel->get_quiz_for_category_and_subject(3, $subject, $teacher_id);
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_active_class();
        $get_count_of_practice_quiz = $this->studentModel->get_count_of_quiz(1);
        $practice_quiz_count = 0;
        foreach ($get_count_of_practice_quiz as $practice_quiz_count1) {
            $practice_quiz_count++;
        }
        $get_count_of_merit_quiz = $this->studentModel->get_count_of_quiz(2);
        $merit_quiz_count = 0;
        foreach ($get_count_of_merit_quiz as $merit_quiz_count1) {
            $merit_quiz_count++;
        }
        $get_count_of_speed_quiz = $this->studentModel->get_count_of_quiz(3);
        $speed_quiz_count = 0;
        foreach ($get_count_of_speed_quiz as $speed_quiz_count1) {
            $speed_quiz_count++;
        }
        $get_count_of_contest_quiz = $this->studentModel->get_count_of_quiz(4);
        $contest_quiz_count = 0;
        foreach ($get_count_of_contest_quiz as $contest_quiz_count1) {
            $contest_quiz_count++;
        }
        $data = [
            'get_count_of_practice_quiz' => $practice_quiz_count,
            'get_count_of_merit_quiz' => $merit_quiz_count,
            'get_count_of_speed_quiz' => $speed_quiz_count,
            'get_count_of_contest_quiz' => $contest_quiz_count,
            'get_all_subject' => $get_all_subject,
            // 'all_subject' => $all_subject_under_quiz_category,
            // 'get_current_quiz_type' => $select_category,
            'get_current_quiz_subject' => $subject,
            'get_all_quiz1' => $get_all_quiz1,
            'get_all_quiz2' => $get_all_quiz2,
            'get_school_detail' => $get_school_detail,
            'get_all_class' => $get_all_class,
            // 'category' => $category,
        ];


        $this->view('school/quiz_result_category_wise', $data);
    }


    public function quiz_result_student_wise($quiz_id)
    {
        $get_quiz_result_quiz_wise = $this->teacherModel->get_quiz_result_quiz_wise($quiz_id);
        $data = [
            'get_quiz_score' => $get_quiz_result_quiz_wise,
        ];
        $this->view('school/quiz_result_student_wise', $data);
    }

    public function update_quiz_status($quiz_id, $status)
    {
        $update_quiz_status = $this->schoolModel->update_quiz_status($quiz_id, $status);
        if ($update_quiz_status) {
            if ($status == 1) {
                $_SESSION['success'] = 'Quiz Approved';
            } else {
                $_SESSION['success'] = 'Quiz Dis-Approved';
            }
        } else {
            $_SESSION['success'] = 'Something went wrong';
        }
        redirect('school/view_quiz/' . $quiz_id);
    }

    public function test1()
    {
        $this->view('school/test1');
    }
    public function add_quiz_first()
    {
        $quiz_name = $_POST['quiz_name'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $category = $_POST['category'];
        $data = [
            'quiz_name' => $quiz_name,
            'class' => $class,
            'subject' => $subject,
            'category' => $category,
            'created_by' => $_SESSION['rexkod_oodles_teacher_id'],
        ];
        $add_quiz_first = $this->adminModel->add_quiz_first($data);
        if ($add_quiz_first) {
            $last_added_quiz = $this->adminModel->last_added_quiz();
            $current_quiz_id = $last_added_quiz->id;
            $data = [
                'last_added_quiz' => $last_added_quiz,
            ];
            redirect('school/create_quiz_second/' . $current_quiz_id, $data);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('school/create_quiz');
        }
    }
    public function add_quiz_second($quiz_id)
    {
        $_SESSION['nav'] = "add_quiz";

        if (!empty($_FILES['quiz_image']['name'])) {
            $f_name = $_FILES['quiz_image']['name'];
            $f_temp = $_FILES['quiz_image']['tmp_name'];
            $size = $_FILES['quiz_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $quiz_file = $f_newfile;
        } else {
            $quiz_file = NULL;
        }
        if (!empty($_FILES['quiz_audio']['name'])) {
            $f_name = $_FILES['quiz_audio']['name'];
            $f_temp = $_FILES['quiz_audio']['tmp_name'];
            $size = $_FILES['quiz_audio']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $quiz_audio = $f_newfile;
        } else {
            $quiz_audio = NULL;
        }
        if (empty($_POST['start_date'])) {
            $start_date = date("Y/m/d");
        } else {
            $start_date = $_POST['start_date'];
        }
        if (empty($_POST['end_date'])) {
            // $end_date =  date('Y-m-d',strtotime(date("Y-m-d", $start_date) . " + 365 day"));\
            $end_date = date('Y/m/d', strtotime('+1 year', strtotime($start_date)));
        } else {
            $end_date = $_POST['end_date'];
        }
        // echo $start_date;

        // echo $end_date;
        // die();

        $get_teacher_detail = $this->teacherModel->get_single_teacher();
        $get_teacher_school = $get_teacher_detail->school_id;
        $data = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'quiz_duration_min' => $_POST['quiz_duration_min'],
            'quiz_duration_sec' => $_POST['quiz_duration_sec'],
            'paid' => $_POST['paid'],
            'school' => $get_teacher_school,
            'attempt' => $_POST['attempt'],
            'quiz_file' => $quiz_file,
            'quiz_audio' => $quiz_audio,

            'passing_per' => $_POST['passing_per'],
            'coins_per_point1' => $_POST['coins_per_point1'],
            'coins_per_point2' => $_POST['coins_per_point2'],
            'coins_per_sec1' => $_POST['coins_per_sec1'],
        ];
        // echo $_POST['coins_per_sec1'];
        // die();
        $result = $this->adminModel->add_quiz_second($data, $quiz_id);

        if ($result) {
            $_SESSION['success'] = "Please Add Questions to the Quiz";
            // $last_added_quiz = $this->adminModel->last_added_quiz();
            // $current_quiz_id = $last_added_quiz->id;
            // $data = [
            //     'last_added_quiz' => $last_added_quiz,
            // ];
            redirect('school/create_quiz_third/' . $quiz_id);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('school/create_quiz');
        }
    }

    public function create_quiz_third()
    {

        $this->view('school/create_quiz_third');
    }
    public function create_quiz_fourth()
    {

        $this->view('school/create_quiz_fourth');
    }
    public function add_chapter_to_quiz($quiz_id)
    {
        if (isset($_POST['chapter'])) {
            $chapter_id = implode(',', $_POST['chapter']);
        } else {
            $chapter_id = Null;
        }

        // $chapter_id = $_POST['chapter'];
        // echo $chapter_id;
        // die();

        $add_chapter_to_quiz = $this->adminModel->update_chapter_to_quiz($chapter_id, $quiz_id);
        if ($add_chapter_to_quiz) {
            redirect('school/create_quiz_fourth/' . $quiz_id);
        }
    }
    public function add_question_to_quiz($question_id, $quiz_id)
    {
        $add_question_to_quiz = $this->adminModel->add_question_to_quiz($question_id, $quiz_id);
        if ($add_question_to_quiz) {
            redirect('school/create_quiz_fourth/' . $quiz_id);
        }
    }
    public function delete_question_from_quiz($question_id, $quiz_id)
    {
        $delete_question_from_quiz = $this->adminModel->delete_question_from_quiz($question_id, $quiz_id);
        if ($delete_question_from_quiz) {
            redirect('school/create_quiz_fourth/' . $quiz_id);
        }
    }
    public function update_quiz($id)
    {
        $_SESSION['nav'] = "update_quiz";

        if (!empty($_FILES['quiz_image']['name'])) {
            $f_name = $_FILES['quiz_image']['name'];
            $f_temp = $_FILES['quiz_image']['tmp_name'];
            $size = $_FILES['quiz_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $quiz_file = $f_newfile;
        } else {
            $quiz_detail = $this->adminModel->get_single_quizes_i($id);
            $quiz_file = $quiz_detail->image;
        }
        if (!empty($_FILES['quiz_audio']['name'])) {
            $f_name = $_FILES['quiz_audio']['name'];
            $f_temp = $_FILES['quiz_audio']['tmp_name'];
            $size = $_FILES['quiz_audio']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $quiz_audio = $f_newfile;
        } else {
            $quiz_detail = $this->adminModel->get_single_quizes_i($id);
            $quiz_audio = $quiz_detail->audio;
        }
        if (!empty($_FILES['quiz_resource']['name'])) {
            $f_name = $_FILES['quiz_resource']['name'];
            $f_temp = $_FILES['quiz_resource']['tmp_name'];
            $size = $_FILES['quiz_resource']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $quiz_resource = $f_newfile;
        } else {
            $quiz_detail = $this->adminModel->get_single_quizes_i($id);
            $quiz_resource = $quiz_detail->quiz_resource;
        }
        if (!empty($_FILES['quiz_map']['name'])) {
            $f_name = $_FILES['quiz_map']['name'];
            $f_temp = $_FILES['quiz_map']['tmp_name'];
            $size = $_FILES['quiz_map']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $quiz_map = $f_newfile;
        } else {
            $quiz_detail = $this->adminModel->get_single_quizes_i($id);
            $quiz_map = $quiz_detail->quiz_map;
        }

        $quiz_name = $_POST['quiz_name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $quiz_duration_min = $_POST['quiz_duration_min'];
        $quiz_duration_sec = $_POST['quiz_duration_sec'];
        $paid = $_POST['paid'];
        $school = $_POST['school'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $category = $_POST['category'];
        $topic = $_POST['topic'];
        $chapter = $_POST['chapter'];
        $attempt = $_POST['attempt'];


        // if (isset($_POST['checkbox'])) {
        //     $criteria = implode(',', $_POST['checkbox']);
        // } else {
        //     $criteria = implode(',', array(0));
        // }

        $result = $this->adminModel->update_quiz($id, $quiz_name, $start_date, $end_date, $quiz_duration_min, $quiz_duration_sec, $paid, $school, $quiz_file, $class, $subject, $category, $topic, $chapter, $attempt, $quiz_audio, $quiz_resource, $quiz_map);

        if (isset($result)) {

            $_SESSION['success'] = "Please update questions now!";

            redirect('school/new_quiz/' . $id);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('school/create_quiz');
        }
    }
    public function create_question()
    {
        if (!empty($_FILES['question_img']['name'])) {
            $f_name = $_FILES['question_img']['name'];
            $f_temp = $_FILES['question_img']['tmp_name'];
            $size = $_FILES['question_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $question_img_file = $f_newfile;
        } else {
            $question_img_file = NULL;
        }
        if (!empty($_FILES['option1_img']['name'])) {
            $f_name = $_FILES['option1_img']['name'];
            $f_temp = $_FILES['option1_img']['tmp_name'];
            $size = $_FILES['option1_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option1_img_file = $f_newfile;
        } else {
            $option1_img_file = NULL;
        }

        if (!empty($_FILES['option2_img']['name'])) {
            $f_name = $_FILES['option2_img']['name'];
            $f_temp = $_FILES['option2_img']['tmp_name'];
            $size = $_FILES['option2_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option2_img_file = $f_newfile;
        } else {
            $option2_img_file = NULL;
        }
        if (!empty($_FILES['option3_img']['name'])) {
            $f_name = $_FILES['option3_img']['name'];
            $f_temp = $_FILES['option3_img']['tmp_name'];
            $size = $_FILES['option3_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option3_img_file = $f_newfile;
        } else {
            $option3_img_file = NULL;
        }
        if (!empty($_FILES['option4_img']['name'])) {
            $f_name = $_FILES['option4_img']['name'];
            $f_temp = $_FILES['option4_img']['tmp_name'];
            $size = $_FILES['option4_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option4_img_file = $f_newfile;
        } else {
            $option4_img_file = NULL;
        }
        if (!empty($_FILES['explanation_img']['name'])) {
            $f_name = $_FILES['explanation_img']['name'];
            $f_temp = $_FILES['explanation_img']['tmp_name'];
            $size = $_FILES['explanation_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $explanation_img = $f_newfile;
        } else {
            $explanation_img = NULL;
        }
        $data = [
            'chapter' => $_POST['chapter'],
            'topic' => $_POST['topic'],
            'question' => $_POST['question'],
            'option1' => $_POST['option1'],
            'option2' => $_POST['option2'],
            'option3' => $_POST['option3'],
            'option4' => $_POST['option4'],
            'answer' => $_POST['answer'],
            'explanation' => $_POST['explanation'],
            'class' => $_POST['class'],
            'subject' => $_POST['subject'],
            'score' => '1',
            'question_img_file' => $question_img_file,
            'option1_img_file' => $option1_img_file,
            'option2_img_file' => $option2_img_file,
            'option3_img_file' => $option3_img_file,
            'option4_img_file' => $option4_img_file,
            'explanation_img' => $explanation_img,
            'created_by' => $_SESSION['rexkod_oodles_teacher_id'],
        ];


        if ((($_POST['single_question'] == 'single'))) {
            $result1 = $this->adminModel->add_question($data);
            // echo "result";

        } elseif ($_POST['multi_question'] == 'multi') {
            $result2 = $this->adminModel->add_question($data);
            // echo "result1";

        }
        // die();
        if ($result1) {
            flash('message', 'Records Updated');
            $_SESSION['success'] = "Question added Successfully";
            redirect('school/add_question');
            // } else {
            //     $_SESSION['success'] = "Question not Updated";
            //     redirect('school/add_question');
            // }
        } elseif ($result2) {
            unset($_SESSION['class']);
            unset($_SESSION['subject']);
            unset($_SESSION['chapter']);
            unset($_SESSION['topic']);
            $_SESSION['class'] = $data['class'];
            $_SESSION['subject'] = $data['subject'];
            $_SESSION['chapter'] = $data['chapter'];
            $_SESSION['topic'] = $data['topic'];
            flash('message', 'Records Updated');
            $_SESSION['success'] = "Question added Successfully";
            redirect('school/add_question_multi');
        } else {
            $_SESSION['success'] = "Question not  Updated";
            redirect('school/add_question');
        }
    }

    public function create_question_while_quiz($id)
    {
        if (!empty($_FILES['question_img']['name'])) {
            $f_name = $_FILES['question_img']['name'];
            $f_temp = $_FILES['question_img']['tmp_name'];
            $size = $_FILES['question_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $question_img_file = $f_newfile;
        } else {
            $question_img_file = NULL;
        }
        if (!empty($_FILES['option1_img']['name'])) {
            $f_name = $_FILES['option1_img']['name'];
            $f_temp = $_FILES['option1_img']['tmp_name'];
            $size = $_FILES['option1_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option1_img_file = $f_newfile;
        } else {
            $option1_img_file = NULL;
        }

        if (!empty($_FILES['option2_img']['name'])) {
            $f_name = $_FILES['option2_img']['name'];
            $f_temp = $_FILES['option2_img']['tmp_name'];
            $size = $_FILES['option2_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option2_img_file = $f_newfile;
        } else {
            $option2_img_file = NULL;
        }
        if (!empty($_FILES['option3_img']['name'])) {
            $f_name = $_FILES['option3_img']['name'];
            $f_temp = $_FILES['option3_img']['tmp_name'];
            $size = $_FILES['option3_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option3_img_file = $f_newfile;
        } else {
            $option3_img_file = NULL;
        }
        if (!empty($_FILES['option4_img']['name'])) {
            $f_name = $_FILES['option4_img']['name'];
            $f_temp = $_FILES['option4_img']['tmp_name'];
            $size = $_FILES['option4_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option4_img_file = $f_newfile;
        } else {
            $option4_img_file = NULL;
        }
        if (!empty($_FILES['explanation_img']['name'])) {
            $f_name = $_FILES['explanation_img']['name'];
            $f_temp = $_FILES['explanation_img']['tmp_name'];
            $size = $_FILES['explanation_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $explanation_img = $f_newfile;
        } else {
            $explanation_img = NULL;
        }
        $data = [
            'chapter' => $_POST['chapter'],
            'topic' => $_POST['topic'],
            'question' => $_POST['question'],
            'option1' => $_POST['option1'],
            'option2' => $_POST['option2'],
            'option3' => $_POST['option3'],
            'option4' => $_POST['option4'],
            'answer' => $_POST['answer'],
            'explanation' => $_POST['explanation'],
            'class' => $_POST['class'],
            'subject' => $_POST['subject'],
            'score' => '1',
            'question_img_file' => $question_img_file,
            'option1_img_file' => $option1_img_file,
            'option2_img_file' => $option2_img_file,
            'option3_img_file' => $option3_img_file,
            'option4_img_file' => $option4_img_file,
            'explanation_img' => $explanation_img,
            'created_by' => $_SESSION['rexkod_oodles_teacher_id'],
        ];


        if ((($_POST['single_question'] == 'single'))) {
            $result1 = $this->adminModel->add_question($data);
            // echo "result";

        } elseif ($_POST['multi_question'] == 'multi') {
            $result2 = $this->adminModel->add_question($data);
            // echo "result1";

        }
        // die();
        if ($result1) {
            flash('message', 'Records Updated');
            $_SESSION['success'] = "Question Added Successfully";
            redirect('school/create_quiz_fourth/' . $id);
            // } else {
            //     $_SESSION['success'] = "Question not Updated";
            //     redirect('school/add_question');
            // }

        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('school/create_quiz_fourth/' . $id);
        }
    }


    public function approve_quiz($id)
    {
        $approve_quiz = $this->adminModel->approve_quiz($id);
        if ($approve_quiz) {
            $_SESSION['success'] = "Quiz approved";
            redirect('school/create_quiz');
        } else {
            $_SESSION['success'] = "Quiz not approved";
            redirect('school/create_quiz');
        }
    }
    public function reject_quiz($id)
    {

        $remove_quiz = $this->adminModel->delete_quiz($id);
        $_SESSION['success'] = "Quiz deleted";
        redirect('school/quizes');
    }
    public function reject_college($id)
    {
        $remove_college = $this->adminModel->delete_college($id);

        $_SESSION['success'] = "College Removed";
        redirect('school/colleges');
    }
    public function update_question($id)
    {
        $question_detail = $this->adminModel->get_single_question($id);

        if (!empty($_FILES['question_img']['name'])) {
            $f_name = $_FILES['question_img']['name'];
            $f_temp = $_FILES['question_img']['tmp_name'];
            $size = $_FILES['question_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $question_img_file = $f_newfile;
        } else {
            $question_img_file = $question_detail->question_img;
        }
        if (!empty($_FILES['option1_img']['name'])) {
            $f_name = $_FILES['option1_img']['name'];
            $f_temp = $_FILES['option1_img']['tmp_name'];
            $size = $_FILES['option1_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option1_img_file = $f_newfile;
        } else {
            $option1_img_file = $question_detail->option1_img;
        }
        if (!empty($_FILES['option2_img']['name'])) {
            $f_name = $_FILES['option2_img']['name'];
            $f_temp = $_FILES['option2_img']['tmp_name'];
            $size = $_FILES['option2_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option2_img_file = $f_newfile;
        } else {
            $option2_img_file = $question_detail->option2_img;
        }
        if (!empty($_FILES['option3_img']['name'])) {
            $f_name = $_FILES['option3_img']['name'];
            $f_temp = $_FILES['option3_img']['tmp_name'];
            $size = $_FILES['option3_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option3_img_file = $f_newfile;
        } else {
            $option3_img_file = $question_detail->option3_img;
        }
        if (!empty($_FILES['option4_img']['name'])) {
            $f_name = $_FILES['option4_img']['name'];
            $f_temp = $_FILES['option4_img']['tmp_name'];
            $size = $_FILES['option4_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $option4_img_file = $f_newfile;
        } else {
            $option4_img_file = $question_detail->option4_img;
        }
        if (!empty($_FILES['explanation_img']['name'])) {
            $f_name = $_FILES['explanation_img']['name'];
            $f_temp = $_FILES['explanation_img']['tmp_name'];
            $size = $_FILES['explanation_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $explanation_img = $f_newfile;
        } else {
            $explanation_img = $question_detail->explanation_img;
        }

        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $answer = $_POST['answer'];
        $explanation = $_POST['explanation'];
        $subject = $_POST['subject'];
        $class = $_POST['class'];
        $score = $_POST['score'];
        $chapter = $_POST['chapter'];
        $topic = $_POST['topic'];

        $result = $this->adminModel->update_question($question, $option1, $option2, $option3, $option4, $answer, $id, $explanation, $question_img_file, $option1_img_file, $option2_img_file, $option3_img_file, $option4_img_file, $explanation_img, $subject, $class, $score, $chapter, $topic);

        if ($result) {
            $_SESSION['success'] = "Quiz Updated Successfully";
            redirect('school/quiz_master');
        } else {
            $_SESSION['success'] = "Quiz not updated";
            redirect('school/edit_question/' . $id);
        }
    }
    public function create_criteria()
    {

        $criteria_name = $_POST['criteria_name'];
        $category_name = $_POST['category_name'];
        $criteria_type = $_POST['criteria_type'];
        if (!empty($_POST['yes_no_based'])) {
            ($yes_no_based = $_POST['yes_no_based']);
        } else {
            $yes_no_based = NULL;
        }
        if (!empty($_POST['start_date'])) {
            ($start_date = $_POST['start_date']);
        } else {
            $start_date = NULL;
        }
        if (!empty($_POST['end_date'])) {
            ($end_date = $_POST['end_date']);
        } else {
            $end_date = NULL;
        }
        if (!empty($_POST['start_range'])) {
            ($start_range = $_POST['start_range']);
        } else {
            $start_range = NULL;
        }
        if (!empty($_POST['end_range'])) {
            ($end_range = $_POST['end_range']);
        } else {
            $end_range = NULL;
        }


        $result = $this->adminModel->add_criteria($criteria_name, $category_name, $criteria_type, $yes_no_based, $start_date, $end_date, $start_range, $end_range);

        if ($result) {

            $_SESSION['success'] = "Criteria added Successfully";
            redirect('school/add_criteria');
        } else {
            $_SESSION['success'] = "Criteria detail not  Updated";
            redirect('school/add_criteria');
        }
    }
    public function delete_from_quiz_master($id)
    {
        $this->adminModel->delete_from_quiz_master($id);
        $_SESSION['success'] = "Quiz deleted successfully";

        redirect('school/quiz_master');
    }

    public function quiz_result()
    {
        // $get_quiz_score = $this->schoolModel->get_all_quiz_score();
        // $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
        $data = [
            // 'get_quiz_score' => $get_quiz_score,
            // 'get_student_detail' => $get_student_detail,
        ];
        $this->view('school/quiz_result');
    }
    public function students_search()
    {
        $get_student_detail = $this->studentModel->search_student_by_name_phone($_GET['search_input']);
        $data =
            [
                'get_student_detail' => $get_student_detail,
            ];

        $_SESSION['nav'] = "student";
        $this->view('school/students_search', $data);
    }
    public function scholarships()
    {
        if (isset($_SESSION['rexkod_oodles_corporate_id'])) {
            $get_all_scholarship = $this->corporateModel->get_all_scholarship();
            $data = [
                'get_all_scholarship' => $get_all_scholarship,
            ];
        }
        // $_SESSION['nav'] = "scholarship";
        $this->view('school/scholarships', $data);
    }
    //     public function quizes()
    //    {
    //     if(!isset($_POST['select_category'])){
    //         $select_category = 1;
    //     }else{
    //         $select_category = $_POST['select_category'];
    //         $_SESSION['selected_category_in_student_quiz'] = $select_category;
    //     }
    //     $get_all_quiz =  $this->schoolModel->get_all_quizes($select_category);

    //     $data = [
    //         'get_all_quiz' => $get_all_quiz,

    //     ];
    //     $this->view('school/quizes', $data);
    // }


    public function quizes($category, $subject)
    {
        if (!isset($category)) {
            $category = 1;
        }
        if (!isset($subject)) {
            $subject = 0;
        }
        // $select_category = $_POST['select_category'];
        // echo $select_category;
        // echo "<br>";
        // echo $subject;
        // die();
        $all_subject_under_quiz_category = $this->schoolModel->get_subject_from_school_quizes_by_category($category);
        // $subject = $_POST['subject_name'];
        $get_all_subject = $this->adminModel->get_all_subject();
        $school_id = $_SESSION['rexkod_oodles_school_id'];
        $get_all_quiz =  $this->schoolModel->get_quiz_for_category_and_subject($category, $subject, $school_id);


        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_active_class();
        $get_count_of_practice_quiz = $this->studentModel->get_count_of_quiz(1);
        $practice_quiz_count = 0;
        foreach ($get_count_of_practice_quiz as $practice_quiz_count1) {
            $practice_quiz_count++;
        }
        $get_count_of_merit_quiz = $this->studentModel->get_count_of_quiz(2);
        $merit_quiz_count = 0;
        foreach ($get_count_of_merit_quiz as $merit_quiz_count1) {
            $merit_quiz_count++;
        }
        $get_count_of_speed_quiz = $this->studentModel->get_count_of_quiz(3);
        $speed_quiz_count = 0;
        foreach ($get_count_of_speed_quiz as $speed_quiz_count1) {
            $speed_quiz_count++;
        }
        $get_count_of_contest_quiz = $this->studentModel->get_count_of_quiz(4);
        $contest_quiz_count = 0;
        foreach ($get_count_of_contest_quiz as $contest_quiz_count1) {
            $contest_quiz_count++;
        }
        $data = [
            'get_count_of_practice_quiz' => $practice_quiz_count,
            'get_count_of_merit_quiz' => $merit_quiz_count,
            'get_count_of_speed_quiz' => $speed_quiz_count,
            'get_count_of_contest_quiz' => $contest_quiz_count,
            'get_all_subject' => $get_all_subject,
            'all_subject' => $all_subject_under_quiz_category,
            // 'get_current_quiz_type' => $select_category,
            'get_current_quiz_subject' => $subject,
            'get_all_quiz' => $get_all_quiz,
            'get_school_detail' => $get_school_detail,
            'get_all_class' => $get_all_class,
            'category' => $category,
        ];
        $this->view('school/quizes', $data);
    }




    // college
    public function college($id)
    {
        $_SESSION['nav'] = "college";
        $college_detail = $this->adminModel->get_college_detail_single($id);
        $data = [
            'get_college_detail' => $college_detail,
        ];
        $this->view('school/college', $data);
    }


    public function colleges()
    {
        $school_detail = $this->adminModel->get_college_detail();
        $data = [
            'get_college_detail' => $school_detail,
        ];
        $_SESSION['nav'] = "college";
        $this->view('school/colleges', $data);
    }

    public function school($id)
    {
        $school_detail = $this->adminModel->get_school_detail_single($id);
        $data = [
            'get_school_detail' => $school_detail,
        ];
        $this->view('school/school', $data);
    }


    public function schools()
    {
        $school_detail = $this->adminModel->get_school_detail();
        $data = [
            'get_school_detail' => $school_detail,
        ];
        $_SESSION['nav'] = "school";
        $this->view('school/schools', $data);
    }




    public function quiz_master()
    {
        $_SESSION['nav'] = "quiz";
        $get_all_quiz = $this->schoolModel->get_all_quiz_master();
        $data = [
            'get_all_quiz' => $get_all_quiz,
        ];
        $this->view('school/quiz_master', $data);
    }
    // public function quizes()
    // {
    //     $_SESSION['nav'] = "quiz";
    //     $get_all_quiz = $this->adminModel->get_all_quizes();
    //     $data = [
    //         'get_all_quiz' => $get_all_quiz,
    //     ];
    //     $this->view('school/quizes', $data);
    // }


    public function students()
    {

        $get_all_students = $this->schoolModel->get_all_students();

        $data = [
            'get_all_students' => $get_all_students,

        ];

        $_SESSION['nav'] = "student";

        $this->view('school/students', $data);
    }
    public function my_subscription()
    {
        $get_subscribed_plan_detail  = $this->schoolModel->get_premium_school_single_data($_SESSION['rexkod_oodles_school_id']);
        $get_all_students = $this->schoolModel->get_all_students();
        $get_school_wallet = $this->schoolModel->get_school_wallet($_SESSION['rexkod_oodles_school_id']);
        $data = [
            'get_subscribed_plan_detail' => $get_subscribed_plan_detail,
            'get_all_students' => $get_all_students,
            'get_school_wallet' => $get_school_wallet,
        ];
        $this->view('school/my_subscription', $data);
    }
    public function parents()
    {
        if (isset($_SESSION['rexkod_oodles_admin_id'])) {
            $get_all_parents = $this->adminModel->get_all_parents();
            $data = [
                'get_all_parents' => $get_all_parents,
            ];
        }
        $_SESSION['nav'] = "parents";

        $this->view('school/parents', $data);
    }
    public function representatives()
    {
        if (isset($_SESSION['rexkod_oodles_admin_id'])) {
            $get_all_representatives = $this->adminModel->get_all_representatives();
            $data = [
                'get_all_representatives' => $get_all_representatives,
            ];
        }
        $_SESSION['nav'] = "representatives";

        $this->view('school/representatives', $data);
    }
    public function add_webinar()
    {
        $this->view('school/add_webinar');
    }
    public function webinars()
    {
        $get_all_webinars = $this->adminModel->get_all_webinars();
        $data = [
            'get_all_webinars' => $get_all_webinars,
        ];

        $this->view('school/webinars', $data);
    }
    public function csr_enquiry()
    {
        if (isset($_SESSION['rexkod_oodles_admin_id'])) {
            $get_all_enquiry = $this->adminModel->get_all_enquiry();
            $data = [
                'get_all_enquiry' => $get_all_enquiry,
            ];
        }
        $_SESSION['nav'] = "all_enquiry";

        $this->view('school/csr_enquiry', $data);
    }
    public function home_enquiry()
    {
        if (isset($_SESSION['rexkod_oodles_admin_id'])) {
            $get_all_home_enquiry = $this->adminModel->get_all_home_enquiry();
            $data = [
                'get_all_home_enquiry' => $get_all_home_enquiry,
            ];
        }
        $_SESSION['nav'] = "home_enquiry";

        $this->view('school/home_enquiry', $data);
    }
    public function all_criteria()
    {
        if (isset($_SESSION['rexkod_oodles_admin_id'])) {
            $get_all_criteria = $this->adminModel->get_all_criteria();
            $data = [
                'get_all_criteria' => $get_all_criteria,
            ];
        }
        $_SESSION['nav'] = "criteria";

        $this->view('school/all_criteria', $data);
    }

    public function scholarship_application()
    {
        if (isset($_SESSION['rexkod_oodles_corporate_id'])) {
            $get_all_scholarship_app = $this->corporateModel->get_all_scholarship_application();
            $data = [
                'get_all_scholarship_app' => $get_all_scholarship_app,
            ];
        }


        $this->view('school/scholarship_application', $data);
    }
    public function update_scholarship_status($id)
    {
        $status = $_POST['scholarship_status'];
        $statusupdate = $this->adminModel->update_scholarship_status($id, $status);


        if ($statusupdate) {
            $_SESSION['success'] = "Status Updated";
            redirect('school/scholarship_application');
        } else {

            $_SESSION['success'] = "Status Not Updated";
            redirect('school/scholarship_application');
        }
    }


    public function student($id)
    {

        $student_detail = $this->adminModel->get_single_student($id);
        $data = [
            'get_student_detail' => $student_detail,
        ];
        $_SESSION['nav'] = "student";
        $this->view('school/student', $data);
    }


    public function logout()
    {
        session_destroy();
        redirect('school/login');
    }

  public function check_phone_live_and_school()
    {

        $phone = $_POST['phn'];
        $type="school";
        $check = $this->pageModel->check_phone_and_type($phone,$type);
        if ($check) {
           
            echo "1";
        } else {
            echo "0";
        }
    }


    public function login()
    {
        if (isset($_SESSION['rexkod_oodles_school_id'])) {
            redirect('school/index');
        } else {
            if (!isset($_POST['username'])) {

                $this->view('school/login');
            } else {

                if (!isset($_POST['password'])) {
                    $_SESSION['success'] = "Enter Password";
                    $this->view('school/login');
                } else {
                    $user = "";


                    if (is_numeric($_POST['username'])) {
                        // echo ($_POST['username']);
                        // die();
                        $email_verify_phone = $this->pageModel->email_verify_phone($_POST['username']);
                    } else {
                        $check_email = $this->pageModel->email_verify($_POST['username']);
                    }


                    if (empty($check_email) && empty($email_verify_phone)) {
                        $_SESSION['success'] = "Invalid Username";
                        $this->view('school/login');
                    } else {
                        if (!empty($check_email)) {
                            $user_results  = $check_email;

                            $password_res = $check_email->password;
                        }
                        if (!empty($email_verify_phone)) {
                            $user_results  = $email_verify_phone;

                            $password_res = $email_verify_phone->password;
                        }



                        if (password_verify($_POST['password'], $password_res)) {
                            $user = $user_results;
                        } else {
                            $user = "";
                        }
                        if (empty($user)) {

                            $_SESSION['success'] = "Invalid Credential!";
                            $this->view('school/login');
                        } else {
                            if ($user->type == "school") {
                                $_SESSION['rexkod_oodles_school_id'] = $user->id;
                                $_SESSION['rexkod_oodles_school_name'] = $user->name;
                                $_SESSION['rexkod_oodles_school_email'] = $user->email;
                                $_SESSION['rexkod_oodles_school_phone'] = $user->phone;
                                $_SESSION['rexkod_oodles_login_type'] = $user->type;

                                redirect('school/index');
                            } else {

                                $_SESSION['success'] = "You do not have access!";
                                redirect('school/login');
                            }
                        }
                    }
                }
            }
        }
    }
}
