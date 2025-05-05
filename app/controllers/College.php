<?php
require_once(APPROOT . "/libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class College extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admins');
        $this->pageModel = $this->model('Page');
        $this->studentModel = $this->model('Students');
        $this->teacherModel = $this->model('Teachers');
        $this->corporateModel = $this->model('Corporates');
        $this->collegeModel = $this->model('Schools');
        $this->collegeModel = $this->model('Colleges');
    }

    public function index()
    {

        // $_SESSION['nav'] = "home";

        if (isset($_SESSION['rexkod_oodles_college_id'])) {
            $this->view('college/index');
        } else {
            $this->view('college/login');
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
            redirect('college/teacher');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('college/teacher');
        }
    }

    public function wallet()
    {
        $get_wallet_detail = $this->collegeModel->getWallet();
        $get_transaction = $this->collegeModel->getTransactions();
        $get_recharged_transaction = $this->collegeModel->get_recharged_transaction();
        $get_spent_transaction = $this->collegeModel->get_spent_transaction();

        $data = [
            'get_wallet_detail' => $get_wallet_detail,
            'get_transaction' => $get_transaction,
            'get_recharged_transaction' => $get_recharged_transaction,
            'get_spent_transaction' => $get_spent_transaction,

        ];

        $this->view('college/wallet', $data);
    }
    public function add_money($amount, $txnid)
    {
        $type = 1;
        //   $quiz_id = 0;
        $add_money = $this->collegeModel->add_money($amount, $txnid, $type);
        $_SESSION['success'] = "Money added successfully";
        redirect('college/wallet');
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

        $this->view('college/rezorpay', $data);
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
            redirect('college/add_money/' . $amount . '/' . $_SESSION['razorpay_order_id']);
        } else {
            redirect('college/error');
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
                "name"  => $_SESSION['rexkod_oodles_college_id'],
                "email"  => $_SESSION['rexkod_oodles_college_email'],
                "contact" => $_SESSION['rexkod_oodles_college_phone'],
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
        $this->view('college/error');
    }

    public function buy_quiz_for_college()
    {
        $get_wallet_detail = $this->collegeModel->getWallet();
        if ($get_wallet_detail->balance_amount < 100) {
            $_SESSION['success'] = "Wallet Balance Low, Please recharge";
            redirect('college/wallet');
        } else {
            $debit_money  = $this->collegeModel->debit_money(100, 'debited_in_quiz_by_college', 8, 10);
            if ($debit_money) {
                redirect('college/wallet');
            } else {
                $_SESSION['success'] = "Error Occured";
                redirect('college/wallet');
            }
        }
    }

    public function students()
    {
        
            $get_all_students = $this->collegeModel->get_all_students();

            $data = [
                'get_all_students' => $get_all_students,

            ];
        
        $_SESSION['nav'] = "student";

        $this->view('college/students', $data);
    }

    public function transactions()
    {
        $transactions = $this->pageModel->getTransactions();

        $data = [
            'transactions' => $transactions,
        ];

        $this->view('college/transactions', $data);
    }


    public function register()
    {
        if (isset($_SESSION['rexkod_oodles_teacher_id'])) {

            redirect('college/index');
        } else {
            $get_school_detail  = $this->adminModel->get_school_detail();
            $data = [
                'get_school_detail' => $get_school_detail,
            ];
            $this->view('college/register', $data);
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
                redirect('college/register');
            } else if ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('college/register');
            } else {


                if ($this->pageModel->findUserByphno($phone)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('college/register');
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
                        redirect('college/index');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('college/register');
                    }
                }
            }
        } else {
            redirect('college/register');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('college/login');
    }





    public function add_school()
    {
        $get_school_type = $this->adminModel->get_school_type();
        $data = [
            'get_school_type' => $get_school_type,
        ];
        $_SESSION['nav'] = "school";
        $this->view('college/add_school', $data);
    }
    public function update_school($id)
    {
        $get_school_detail = $this->adminModel->get_school_detail_ind($id);
        $get_school_type = $this->adminModel->get_school_type();
        $data = [
            'get_school_detail' => $get_school_detail,
            'get_school_type' => $get_school_type,
        ];
        $_SESSION['nav'] = "school";
        $this->view('college/update_school', $data);
    }

    public function add_class()
    {
        $get_all_school_class = $this->adminModel->get_all_school_class();
        $data = [
            'get_all_school_class' => $get_all_school_class,
        ];
        $_SESSION['nav'] = "school";
        $this->view('college/add_class', $data);
    }
    public function add_quiz_category()
    {
        $get_all_quiz_category = $this->adminModel->get_all_quiz_category();
        $data = [
            'get_all_quiz_category' => $get_all_quiz_category,
        ];
        $_SESSION['nav'] = "school";
        $this->view('college/add_quiz_category', $data);
    }
    public function edit_quiz_category($id)
    {
        $get_quiz_category = $this->adminModel->get_quiz_category($id);
        $get_all_quiz_category = $this->adminModel->get_all_quiz_category();
        $data = [
            'get_quiz_category' => $get_quiz_category,
            'get_all_quiz_category' => $get_all_quiz_category,
        ];
        $_SESSION['nav'] = "school";
        $this->view('college/edit_quiz_category', $data);
    }
    public function edit_class($id)
    {
        $get_school_class = $this->adminModel->get_school_class($id);
        $get_all_school_class = $this->adminModel->get_all_school_class();
        $data = [
            'get_school_class' => $get_school_class,
            'get_all_school_class' => $get_all_school_class,
        ];
        $_SESSION['nav'] = "school";
        $this->view('college/edit_class', $data);
    }
    public function edit_subject($id)
    {
        $get_school_subject = $this->adminModel->get_school_subject($id);
        $get_all_school_subject = $this->adminModel->get_all_school_subject();
        $data = [
            'get_school_subject' => $get_school_subject,
            'get_all_school_subject' => $get_all_school_subject,
        ];
        $_SESSION['nav'] = "school";
        $this->view('college/edit_subject', $data);
    }

    public function add_subject()
    {
        $get_all_school_subject = $this->adminModel->get_all_school_subject();
        $get_all_chapter = $this->adminModel->get_all_chapter();
        $get_all_topic = $this->adminModel->get_all_topic();
        $data = [
            'get_all_school_subject' => $get_all_school_subject,
            'get_all_chapter' => $get_all_chapter,
            'get_all_topic' => $get_all_topic,
        ];
        $_SESSION['nav'] = "school";
        $this->view('college/add_subject', $data);
    }


    public function add_student()
    {
        $_SESSION['nav'] = "student";
        $this->view('college/add_student');
    }


    public function corporate()
    {
        $_SESSION['nav'] = "corporate";
        $this->view('college/corporate');
    }


    public function finance()
    {
        $_SESSION['nav'] = "finance";
        $this->view('college/finance');
    }


    public function finances()
    {
        $_SESSION['nav'] = "finance";
        $this->view('college/finances');
    }


    public function corporates()
    {
        $_SESSION['nav'] = "corporate";
        $this->view('college/corporates');
    }


    public function quiz()
    {
        $_SESSION['nav'] = "quiz";
        $this->view('college/quiz');
    }
    public function teacher()
    {
        $get_all_teacher  = $this->collegeModel->get_all_teacher();
        $data = [
            'get_all_teacher' => $get_all_teacher,
        ];
        $_SESSION['nav'] = "quiz";
        $this->view('college/teacher', $data);
    }
    public function create_teach1er()
    {
        $data = [
            'name' => $_POST['name'],
            'school' => $_POST['school'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'password' => $_POST['password'],
        ];
        $create_teacher = $this->adminModel->create_teacher($data);
        if ($create_teacher) {
            // flash('message', 'Records Updated');
            $_SESSION['success'] = "Teacher Added";
            redirect('college/add_teacher');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('college/add_teacher');
        }
    }

    public function create_teacher()
    { {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $school = $_POST['school'];
                $data = [
                    'name' => $_POST['name'],
                    'school' => $_POST['school'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'password' => $_POST['password'],
                ];

                if (empty($email)) {
                    $_SESSION['success'] = 'Please enter email';
                    redirect('college/add_teacher');
                } else if ($this->pageModel->findUserByemail($email)) {
                    $_SESSION['success'] = 'Email already taken';
                    redirect('college/add_teacher');
                } else {


                    if ($this->pageModel->findUserByphno($phone)) {
                        $_SESSION['success'] = 'Phone number already taken';
                        redirect('college/add_teacher');
                    } else {

                        $pass = password_hash($password, PASSWORD_DEFAULT);
                        if ($this->adminModel->create_teacher($data)) {
                            $user = $this->pageModel->ulogin($email, $_POST['password']);
                            echo $_POST['password'];
                            die();
                            $_SESSION['rexkod_oodles_teacher_id'] = $user->id;
                            // echo  $_SESSION['rexkod_oodles_student_id'];
                            // die();
                            $_SESSION['rexkod_oodles_teacher_name'] = $user->name;
                            $_SESSION['rexkod_oodles_teacher_email'] = $user->email;
                            $_SESSION['rexkod_oodles_teacher_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;

                            $_SESSION['success'] = "Registered Successfully..! ";
                            redirect('college/add_teacher');
                        } else {
                            $_SESSION['success'] = 'Registration Failed!';
                            redirect('college/add_teacher');
                        }
                    }
                }
            } else {
                redirect('college/add_teacher');
            }
        }
    }

    public function scholarship($id)
    {
        $get_all_scholarship_detail = $this->adminModel->get_all_scholarship_by_id($id);
        $data = [
            'get_all_scholarship' => $get_all_scholarship_detail,
        ];
        $_SESSION['nav'] = "scholarship";
        $this->view('college/scholarship', $data);
    }

    public function add_scholarship()
    {
        $get_all_criteria = $this->adminModel->get_all_criteria();
        $get_scholarship_type = $this->adminModel->get_scholarship_type();
        $data = [
            'get_all_criteria' => $get_all_criteria,
            'get_scholarship_type' => $get_scholarship_type,
        ];
        $_SESSION['nav'] = "scholarship";
        $this->view('college/add_scholarship', $data);
    }
    public function create_quiz_first()
    {
        $get_all_quiz_master = $this->adminModel->get_all_quiz_master();
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $get_all_quiz_category = $this->adminModel->get_all_quiz_category();
        $data = [
            'get_all_quiz_master' => $get_all_quiz_master,
            'get_school_detail' => $get_school_detail,
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
            'get_all_quiz_category' => $get_all_quiz_category,
        ];
        $_SESSION['nav'] = "create_quiz_first";
        $this->view('college/create_quiz_first', $data);
    }
    public function create_quiz_second($id)
    {

        $get_all_quiz_master = $this->adminModel->get_all_quiz_master();
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $get_all_quiz_category = $this->adminModel->get_all_quiz_category();
        $get_current_quiz_detail = $this->adminModel->get_single_quizes_i($id);
        $subject_used_in_quiz = $get_current_quiz_detail->subject_name;
        $get_sub_subject = $this->adminModel->get_sub_subject_from_subject($subject_used_in_quiz);
        $data = [
            'get_all_quiz_master' => $get_all_quiz_master,
            'get_school_detail' => $get_school_detail,
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
            'get_all_quiz_category' => $get_all_quiz_category,
            'get_sub_subject' => $get_sub_subject,
        ];
        $_SESSION['nav'] = "create_quiz_second";
        $this->view('college/create_quiz_second', $data);
    }

    public function edit_quiz($id)
    {
        $get_single_quiz = $this->adminModel->get_single_quizes_i($id);
        $get_all_quiz_master = $this->adminModel->get_all_quiz_master($id);
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $get_all_quiz_category = $this->adminModel->get_all_quiz_category();

        $data = [
            'get_single_quiz' => $get_single_quiz,
            'get_school_detail' => $get_school_detail,
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
            'get_all_quiz_master' => $get_all_quiz_master,
            'get_all_quiz_category' => $get_all_quiz_category,
        ];
        $_SESSION['nav'] = "edit_quiz";
        $this->view('college/edit_quiz', $data);
    }


    public function add_criteria()
    {

        $_SESSION['nav'] = "criteria";
        $this->view('college/add_criteria');
    }
    public function create_scholarship()
    {
        if (!empty($_FILES['scholarship_image']['name'])) {
            $f_name = $_FILES['scholarship_image']['name'];
            $f_temp = $_FILES['scholarship_image']['tmp_name'];
            $size = $_FILES['scholarship_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $scholarship_file = $f_newfile;
        } else {
            $scholarship_file = NULL;
        }
        $company_name = $_POST['company_name'];
        $course = $_POST['course'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $state = $_POST['state'];
        $description = $_POST['description'];
        // $scholarship_image =$_POST['scholarship_image'];
        $url = $_POST['url'];

        $conditions_val = $_POST['conditions'];
        // $conditions = implode(', ', $conditions_val);

        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $eligibile_candidates = $_POST['eligibile_candidates'];
        $body = $_POST['body'];
        $offered_by = $_POST['offered_by'];
        $no_of_scholarships = $_POST['no_of_scholarships'];
        $contact_number = $_POST['contact_number'];
        $email_id = $_POST['email_id'];
        $minimum_eligibility = $_POST['minimum_eligibility'];
        $application_process = $_POST['application_process'];
        $reservation = $_POST['reservation'];
        $documents_required = $_POST['documents_required'];
        $detailed_eligibility_url = $_POST['detailed_eligibility_url'];
        $direct_link_to_apply = $_POST['direct_link_to_apply'];
        if (isset($_POST['website_check'])) {
            $website_check = 1;
        } else {
            $website_check = 0;
        }

        if (isset($_POST['checkbox'])) {
            $criteria = implode(',', $_POST['checkbox']);
        } else {
            $criteria = implode(',', array(0));
        }
        $result = $this->adminModel->add_scholarship($type, $name, $state, $description, $scholarship_file, $url, $start_date, $end_date, $criteria, $eligibile_candidates, $body, $offered_by, $no_of_scholarships, $contact_number, $email_id, $minimum_eligibility, $application_process, $reservation, $documents_required, $detailed_eligibility_url, $direct_link_to_apply, $website_check);

        if ($result) {
            flash('message', 'Records Updated');
            $_SESSION['success'] = "Scholarship added Successfully";
            redirect('college/add_scholarship');
        } else {
            $_SESSION['success'] = "Scholarship detail not Updated";
            redirect('college/add_scholarship');
        }
    }
    public function create_subject()
    {
        $subject_name = $_POST['subject_name'];
        $result = $this->adminModel->add_subject($subject_name);
        if ($result) {

            $_SESSION['success'] = "Subject added Successfully";
            redirect('college/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('college/add_subject');
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
            redirect('college/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('college/add_subject');
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
            redirect('college/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('college/add_subject');
        }
    }

    public function create_class()
    {
        $class_name = $_POST['class_name'];
        $result = $this->adminModel->add_class($class_name);
        if ($result) {

            $_SESSION['success'] = "Class added Successfully";
            redirect('college/add_class');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('college/add_class');
        }
    }
    public function create_quiz_category()
    {
        $category = $_POST['category'];
        $result = $this->adminModel->add_quiz_category($category);
        if ($result) {

            $_SESSION['success'] = "Category added Successfully";
            redirect('college/add_quiz_category');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('college/add_quiz_category');
        }
    }
    public function update_quiz_category($id)
    {

        $category = $_POST['category'];
        $result = $this->adminModel->update_quiz_category($category, $id);
        if ($result) {

            $_SESSION['success'] = "Category updated Successfully";
            redirect('college/edit_quiz_category/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('college/edit_quiz_category/' . $id);
        }
    }
    public function update_school_class($id)
    {

        $class_name = $_POST['class_name'];
        $result = $this->adminModel->update_school_class($class_name, $id);
        if ($result) {

            $_SESSION['success'] = "Class updated Successfully";
            redirect('college/edit_class/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('college/edit_class/' . $id);
        }
    }
    public function update_school_subject($id)
    {

        $subject_name = $_POST['subject_name'];
        $result = $this->adminModel->update_school_subject($subject_name, $id);
        if ($result) {

            $_SESSION['success'] = "subject updated Successfully";
            redirect('college/edit_subject/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('college/edit_subject/' . $id);
        }
    }
    public function review_quiz()
    {
        $last_quiz = $this->adminModel->last_added_quiz();
        $data = [
            'last_added_quiz' => $last_quiz,
        ];
        $this->view('college/review_quiz', $data);
    }
    public function view_quiz($id)
    {
        $get_quiz_detail = $this->adminModel->get_single_quizes($id);
        $data = [
            'get_quiz_detail' => $get_quiz_detail,
        ];
        $this->view('college/view_quiz', $data);
    }
    public function test1()
    {
        $this->view('college/test1');
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
            redirect('college/create_quiz_second/' . $current_quiz_id, $data);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('college/create_quiz');
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
            redirect('college/create_quiz_third/' . $quiz_id);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('college/create_quiz');
        }
    }

    public function create_quiz_third()
    {

        $this->view('college/create_quiz_third');
    }
    public function create_quiz_fourth()
    {

        $this->view('college/create_quiz_fourth');
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
            redirect('college/create_quiz_fourth/' . $quiz_id);
        }
    }
    public function add_question_to_quiz($question_id, $quiz_id)
    {
        $add_question_to_quiz = $this->adminModel->add_question_to_quiz($question_id, $quiz_id);
        if ($add_question_to_quiz) {
            redirect('college/create_quiz_fourth/' . $quiz_id);
        }
    }
    public function delete_question_from_quiz($question_id, $quiz_id)
    {
        $delete_question_from_quiz = $this->adminModel->delete_question_from_quiz($question_id, $quiz_id);
        if ($delete_question_from_quiz) {
            redirect('college/create_quiz_fourth/' . $quiz_id);
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

            redirect('college/new_quiz/' . $id);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('college/create_quiz');
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
            redirect('college/add_question');
            // } else {
            //     $_SESSION['success'] = "Question not Updated";
            //     redirect('college/add_question');
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
            redirect('college/add_question_multi');
        } else {
            $_SESSION['success'] = "Question not  Updated";
            redirect('college/add_question');
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
            redirect('college/create_quiz_fourth/' . $id);
            // } else {
            //     $_SESSION['success'] = "Question not Updated";
            //     redirect('college/add_question');
            // }

        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('college/create_quiz_fourth/' . $id);
        }
    }


    public function approve_quiz($id)
    {
        $approve_quiz = $this->adminModel->approve_quiz($id);
        if ($approve_quiz) {
            $_SESSION['success'] = "Quiz approved";
            redirect('college/create_quiz');
        } else {
            $_SESSION['success'] = "Quiz not approved";
            redirect('college/create_quiz');
        }
    }
    public function reject_quiz($id)
    {

        $remove_quiz = $this->adminModel->delete_quiz($id);
        $_SESSION['success'] = "Quiz deleted";
        redirect('college/quizes');
    }
    public function reject_college($id)
    {
        $remove_college = $this->adminModel->delete_college($id);

        $_SESSION['success'] = "College Removed";
        redirect('college/colleges');
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
            redirect('college/quiz_master');
        } else {
            $_SESSION['success'] = "Quiz not updated";
            redirect('college/edit_question/' . $id);
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
            redirect('college/add_criteria');
        } else {
            $_SESSION['success'] = "Criteria detail not  Updated";
            redirect('college/add_criteria');
        }
    }
    public function delete_from_quiz_master($id)
    {
        $this->adminModel->delete_from_quiz_master($id);
        $_SESSION['success'] = "Quiz deleted successfully";

        redirect('college/quiz_master');
    }

    public function students_search()
    {
        $get_student_detail = $this->studentModel->search_student_by_name_phone($_GET['search_input']);
        $data =
            [
                'get_student_detail' => $get_student_detail,
            ];

        $_SESSION['nav'] = "student";
        $this->view('college/students_search', $data);
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
        $this->view('college/scholarships', $data);
    }
    public function quizes()
    {
        if (isset($_SESSION['rexkod_oodles_college_id'])) {
            $get_all_quiz = $this->collegeModel->get_all_quizes();
            $data = [
                'get_all_quiz' => $get_all_quiz,
            ];
        }
        // $_SESSION['nav'] = "scholarship";
        $this->view('college/quizes', $data);
    }

    public function quiz_result()
    {
        $get_quiz_score = $this->adminModel->get_all_quiz_score();
        // $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
        $data = [
            'get_quiz_score' => $get_quiz_score,
            // 'get_student_detail' => $get_student_detail,
        ];
        $this->view('college/quiz_result', $data);
    }

    // college
    public function college($id)
    {
        $_SESSION['nav'] = "college";
        $college_detail = $this->adminModel->get_college_detail_single($id);
        $data = [
            'get_college_detail' => $college_detail,
        ];
        $this->view('college/college', $data);
    }


    public function colleges()
    {
        $school_detail = $this->adminModel->get_college_detail();
        $data = [
            'get_college_detail' => $school_detail,
        ];
        $_SESSION['nav'] = "college";
        $this->view('college/colleges', $data);
    }

    public function school($id)
    {
        $school_detail = $this->adminModel->get_school_detail_single($id);
        $data = [
            'get_school_detail' => $school_detail,
        ];
        $this->view('college/school', $data);
    }


    public function schools()
    {
        $school_detail = $this->adminModel->get_school_detail();
        $data = [
            'get_school_detail' => $school_detail,
        ];
        $_SESSION['nav'] = "school";
        $this->view('college/schools', $data);
    }












    public function login()
    {
        if (isset($_SESSION['rexkod_oodles_college_id'])) {
            redirect('college/index');
        } else {
            if (!isset($_POST['username'])) {

                $this->view('college/login');
            } else {

                if (!isset($_POST['password'])) {
                    $_SESSION['success'] = "Enter Password";
                    $this->view('college/login');
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
                        $this->view('college/login');
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
                            $this->view('college/login');
                        } else {
                            if ($user->type == "college") {
                                $_SESSION['rexkod_oodles_college_id'] = $user->id;
                                $_SESSION['rexkod_oodles_college_name'] = $user->name;
                                $_SESSION['rexkod_oodles_college_email'] = $user->email;
                                $_SESSION['rexkod_oodles_college_phone'] = $user->phone;
                                $_SESSION['rexkod_oodles_login_type'] = $user->type;

                                redirect('college/index');
                            } else {

                                $_SESSION['success'] = "You do not have access!";
                                redirect('college/login');
                            }
                        }
                    }
                }
            }
        }
    }
}
