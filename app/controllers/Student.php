<?php
require_once(APPROOT . "/libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Facades\Redirect;

class Student extends Controller
{

    public function __construct()
    {
        $this->studentModel = $this->model('Students');
        $this->adminModel = $this->model('Admins');
        $this->pageModel = $this->model('Page');
        $this->homeModel = $this->model('Homes');
        $this->quizModel = $this->model('Quizes');
        $this->teacherModel = $this->model('Teachers');
        $this->corporateModel = $this->model('Corporates');
    }

    public function wallet()
    {
        $get_current_user_auth = $this->adminModel->get_current_user_auth();
        $get_wallet_detail = $this->studentModel->getWallet();
        $get_transaction = $this->studentModel->getTransactions();
        $get_awarded_transaction = $this->studentModel->get_awarded_transaction();
        $get_recharged_transaction = $this->studentModel->get_recharged_transaction();
        $get_spent_transaction = $this->studentModel->get_spent_transaction();
        $data = [
            'get_auth_detail' => $get_current_user_auth,
            'get_wallet_detail' => $get_wallet_detail,
            'get_transaction' => $get_transaction,
            'get_awarded_transaction' => $get_awarded_transaction,
            'get_recharged_transaction' => $get_recharged_transaction,
            'get_spent_transaction' => $get_spent_transaction,
        ];

        $this->view('student/wallet', $data);
    }

    public function add_money($amount, $txnid)
    {
        $type = 1;
        $quiz_id = 0;
        $flag = 1;
        $check_first_transaction = $this->studentModel->get_user_first_transaction();
        if (isset($check_first_transaction)) {
            $flag = 0;
        }
        $add_money = $this->studentModel->add_money($amount, $txnid, $type, $quiz_id);
        if ($flag == 1) {
            if ($amount >= 100) {
                $get_wallet_control = $this->studentModel->get_wallet_control();
                $recharge_bonus = $get_wallet_control->recharge_bonus;
                $txnid = 'credited_bonus_coins_on_first_recharge';
                $type = 8;
                $add_bonus_coins = $this->studentModel->add_bonus_coins(($recharge_bonus * $amount) / 100, $txnid, $type);
            }
        }

        $otp = 5555;
        $get_current_student_detail = $this->adminModel->get_current_user_auth();
        $send_otp = $this->test_otp($get_current_student_detail->phone, $otp);

        $_SESSION['success'] = "Money added successfully";
        if (isset($_SESSION['low_balance_quiz'])) {
            $quiz_id  = $_SESSION['low_balance_quiz'];
            $initiate_contest_registration = $this->initiate_contest_registration($quiz_id);

            // $get_quiz_detail = $this->studentModel->get_quiz_detail($quiz_id);
            //   $quiz_type = $get_quiz_detail->type;
            //   $category = $get_quiz_detail->category;
            //   $subject = $get_quiz_detail->subject_name;
            // redirect('student/all_quiz/'.$quiz_type . '/' . $category . '/' . $subject);
            redirect('student/my_quizes');

            die();
        } elseif (isset($_SESSION['scholarship_payment'])) {
            $scholarship_id  = $_SESSION['scholarship_payment'];
            $_SESSION['success'] = "Money has been added to wallet. Continue payment!";

            redirect('student/final_process_scholarship/' . $scholarship_id);

            die();
        }
        redirect('student/wallet');
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

        $this->view('student/rezorpay', $data);
    }
    public function pay1($amount)
    {
        $api = new Api(RPKID, RPKS);

        $razorpayOrder = $api->order->create(array(
            'receipt'         => rand(),
            'amount'          => $amount * 100, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' =>  1
        ));


        $amount = $razorpayOrder['amount'];

        $razorpayOrderId = $razorpayOrder['id'];

        $_SESSION['razorpay_order_id'] = $razorpayOrderId;

        $data = $this->prepareData($amount, $razorpayOrderId);

        $this->view('student/rezorpay', $data);
    }

    /**
     * This function verifies the payment,after successfull payment
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
            redirect('student/add_money/' . $amount . '/' . $_SESSION['razorpay_order_id']);
        } else {
            redirect('student/error');
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
                "name"  => $_SESSION['rexkod_oodles_student_id'],
                "email"  => $_SESSION['rexkod_oodles_student_email'],
                "contact" => $_SESSION['rexkod_oodles_student_phone'],
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
        $this->view('student/error');
    }

    public function transactions()
    {
        $transactions = $this->pageModel->getTransactions();

        $data = [
            'transactions' => $transactions,
        ];

        $this->view('students/transactions', $data);
    }

    public function redeem_coins_earned()
    {
        $get_wallet_control  = $this->adminModel->get_wallet_control();
        $points = $get_wallet_control->points_reduction;
        $amount = $get_wallet_control->awarded_amount_addition;
        $txnid1 = "awarded_amount_credited_on_redeeming_coins";
        $txnid2 = "coins_debited_on_redeeming";
        $type1 = 11;
        $type2 = 12;
        $redeem_coin = $this->studentModel->redeem_coin($points, $amount, $txnid1, $txnid2, $type1, $type2);
        if ($redeem_coin) {
            $message = "You have redeemed 1000 coins successfully.";
            $add_notification = $this->studentModel->add_notifications($_SESSION['rexkod_oodles_student_id'], $message);
            $_SESSION['success'] = "Your 1000 coins got redemmed into Awarded Balance!";
            redirect('student/wallet');
        } else {
            $_SESSION['success'] = "Something went wrong";
            redirect('student/wallet');
        }
    }
    public function index()
    {
        $_SESSION['nav'] = "home";
        if (isset($_SESSION['rexkod_oodles_student_id'])) {
            $get_current_user_auth = $this->adminModel->get_current_user_auth();
            $user_detail = $this->studentModel->get_current_student();
            $get_all_quiz_master = $this->adminModel->get_all_quiz_master();

            $get_current_student = $this->studentModel->get_current_student();
            if (empty($get_current_student->academic_type)) {
                $student_academic_type = 0;
            } else {
                $student_academic_type = $get_current_student->academic_type;
            }
            if (empty($get_current_student->comm_state)) {
                $student_state = 0;
            } else {
                $student_state = $get_current_student->comm_state;
            }
            if (empty($get_current_student->course)) {
                $student_course = 0;
            } else {
                $student_course = $get_current_student->course;
            }
            $getWallet = $this->studentModel->getWallet();

            $quiz_ranking_country_wise = $this->studentModel->quiz_ranking_country_wise_by_class($get_current_user_auth->class);
            $quiz_ranking_state_wise  = $this->studentModel->quiz_ranking_state_wise($student_state);
            $quiz_ranking_course_wise  = $this->studentModel->quiz_ranking_course_wise($student_course);
            $get_student_detail_from_auth = $this->studentModel->get_auth_detail();
            $get_classwise_scholarships = $this->studentModel->get_classwise_scholarships($get_student_detail_from_auth->class);


            foreach ($get_all_quiz_master as $question_detail) {
                $_SESSION['get_single_question' . $question_detail->id] = 0;
                // echo 'get_single_question'.$question_detail->id;
            }
            $get_current_user_auth = $this->adminModel->get_current_user_auth();
            $get_wallet_detail = $this->studentModel->getWallet();
            $get_transaction = $this->studentModel->getTransactions();
            $get_awarded_transaction = $this->studentModel->get_awarded_transaction();
            $get_recharged_transaction = $this->studentModel->get_recharged_transaction();
            $get_spent_transaction = $this->studentModel->get_spent_transaction();
            $get_all_subscription_plan = $this->pageModel->get_all_subscription_plan();

            $get_current_student = $this->studentModel->get_current_student();
            $get_auth_detail = $this->studentModel->get_auth_detail();
            $class_id = $get_auth_detail->class;
            if (!empty($get_current_student)) {
                if (!empty($get_current_student->academic_name)) {
                    $student_academic_type = substr(($get_current_student->academic_name), 0, 1);
                    $academic_name = substr($get_current_student->academic_name, 1);
                } else {
                    $student_academic_type = 0;
                    $academic_name = 0;
                }
                if (!empty($get_current_student->comm_state)) {
                    $student_state = $get_current_student->comm_state;
                } else {
                    $student_state = "0";
                }
            } else {
                $student_academic_type = 0;
                $academic_name = 0;
                $student_state = "0";
            }

            $quiz_ranking_country_wise_by_class =    $this->studentModel->quiz_ranking_country_wise_from_quiz_score($class_id);
            $quiz_ranking_state_wise_by_class  = $this->studentModel->quiz_ranking_state_wise_from_quiz_score($student_state, $class_id, $academic_name);
            $quiz_ranking_course_wise_by_class  = $this->studentModel->quiz_ranking_course_wise_from_quiz_score($class_id, $student_academic_type, $academic_name);
            $get_active_market_place = $this->studentModel->get_active_market_place();
            $student_detail = $this->studentModel->get_current_student();


            $data = [
                'get_auth_detail' => $get_current_user_auth,
                'user_detail' => $user_detail,
                'get_wallet' => $getWallet,
                'quiz_ranking_country_wise' => $quiz_ranking_country_wise_by_class,
                'quiz_ranking_state_wise' => $quiz_ranking_state_wise_by_class,
                'get_current_student' => $get_current_student,

                'quiz_ranking_course_wise' => $quiz_ranking_course_wise_by_class,
                'get_current_student' => $get_current_student,
                // 'quiz_ranking_academic_wise ' => $quiz_ranking_academic_wise,
                'get_auth_detail' => $get_current_user_auth,
                'get_wallet_detail' => $get_wallet_detail,
                'get_transaction' => $get_transaction,
                'get_awarded_transaction' => $get_awarded_transaction,
                'get_recharged_transaction' => $get_recharged_transaction,
                'get_spent_transaction' => $get_spent_transaction,
                'get_all_subscription_plan' => $get_all_subscription_plan,
                'get_classwise_scholarships' => $get_classwise_scholarships,
                'get_active_market_place' => $get_active_market_place,
                'student_detail' => $student_detail,
            ];
            $this->view('student/index', $data);
        } else {
            $this->view('student/login');
        }
    }

    public function redeem_referral_code($loc)
    {
        $referral_code  = $_POST['referral_code'];
        $number_portion  = preg_replace("/[^0-9]/", '', $referral_code);
        $alphabets  = substr($referral_code, 0, 3);
        // echo $number_portion;
        // echo "<br/>";
        // echo $alphabets;
        // die();
        $get_wallet_control = $this->adminModel->get_wallet_control();
        $joiner_amount = $get_wallet_control->referral_joiner;
        $joinee_amount = $get_wallet_control->referral_joinee;
        $joiner_user_id = $number_portion;

        $txnid1 = 'bonus_coins_credited_on_referring';
        $txnid2 = 'bonus_coins_credited_on_using_referral_code';
        $type1 = 13;
        $type2 = 14;
        $check_auth_detail = $this->studentModel->check_auth_detail($number_portion, $alphabets);
        // echo $number_portion;
        // echo $alphabets;
        // die();
        if (!empty($check_auth_detail)) {
            $update_joiner_bonus_coins = $this->studentModel->add_bonus_coins_on_user_id($joiner_amount, $txnid1, $type1, $joiner_user_id);
            $update_joinee_bonus_coins = $this->studentModel->add_bonus_coins($joinee_amount, $txnid2, $type2);
            $update_auth_referral_detail = $this->studentModel->update_auth_referral_detail($joiner_user_id);
            $_SESSION['success']  =  "Congrats! Please check your credited Coins in wallet.";
            $message = "You have received $joiner_amount referral amount";
            $add_notification = $this->studentModel->add_notifications($joiner_user_id, $message);
            $message = "You have received $joinee_amount on registering using friends referral code.";
            $add_notification = $this->studentModel->add_notifications($_SESSION['rexkod_session_student_id'], $message);
        } else {
            $_SESSION['success']  =  "Invalid Referral Code";
        }
        unset($_SESSION['show_refferal_modal']);
        redirect('student/' . $loc);
    }


    public function quiz_dash()
    {
        $_SESSION['nav'] = "home";
        $this->view('student/quiz_dash');
    }
    public function buy_market_product($id)
    {
        // echo $id;

        $check_purchased_market_place_orders = $this->studentModel->check_purchased_market_place_orders($id);
        if ($check_purchased_market_place_orders == null) {
            $get_single_market_place = $this->adminModel->get_single_market_place($id);
            $get_offer_price = $get_single_market_place->offer_price;
            $get_student_wallet_detail   = $this->studentModel->getWallet();

            $bonus_coins_balance = $get_student_wallet_detail->bonus_coins;
            if ($get_single_market_place->quantity > 0) {
                $quantity = $get_single_market_place->quantity - 1;
                if ($get_offer_price <= $bonus_coins_balance) {
                    $transaction_id = 'Db / MP - ' . $id;
                    $type = 17;
                    $bonus_coins_balance = $bonus_coins_balance - $get_offer_price;

                    //                     echo $bonus_coins_balance;
                    // die();
                    $buy_market_product = $this->studentModel->buy_market_product($id, $bonus_coins_balance, $transaction_id, $type, $quantity, $get_offer_price);
                    $message = "Product " . $get_single_market_place->name . " purchased successfully";
                    $add_notification = $this->studentModel->add_notifications($_SESSION['rexkod_oodles_student_id'], $message);
                    $_SESSION['success']  =  " Successfully Purchased";
                    redirect('student/index');
                } else {
                    $_SESSION['success']  =  "Low Bonus Coins. Play Quiz & Earn Bonus Coins";
                    redirect('student/index');
                }
            } else {

                $_SESSION['success']  =  "Repurchase Not Enabled";
                redirect('student/index');
            }
        } else {

            $_SESSION['success']  =  "Product Out of Stock";
            redirect('student/index');
        }
    }
    public function quiz_result()
    {
        $get_quiz_score = $this->studentModel->get_quiz_score();
        $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
        $data = [
            'get_quiz_score' => $get_quiz_score,
            'get_student_detail' => $get_student_detail,
        ];
        $this->view('student/quiz_result', $data);
    }


    public function scholarship_dash()
    {
        $_SESSION['nav'] = "home";
        $this->view('student/scholarship_dash');
    }

    public function register()
    {
        if (isset($_SESSION['rexkod_oodles_student_id'])) {
            redirect('student/index');
        } else {
            $this->view('student/register');
        }
    }

    public function register_mobile()
    {
        // if (isset($_SESSION['rexkod_oodles_student_id'])) {
        //     redirect('student/index');
        // } else {
        //     $this->view('student/register_mobile');
        // }
        $this->view('student/register_mobile');

    }

    public function add_quiz()
    {
        $_SESSION['nav'] = "quiz";
        $this->view('student/add_quiz');
    }


    public function add_school()
    {
        $_SESSION['nav'] = "school";
        $this->view('student/add_school');
    }


    public function add_student()
    {
        $_SESSION['nav'] = "student";
        $this->view('student/add_student');
    }

    public function school($id)
    {
        $_SESSION['nav'] = "school";
        $school_detail = $this->adminModel->get_school_detail_single($id);
        $data = [
            'get_school_detail' => $school_detail,
        ];
        $this->view('student/school', $data);
    }

    public function college($id)

    {
        // echo($id);
        // die();   
        $_SESSION['nav'] = "college";
        $college_detail = $this->adminModel->get_college_detail_single($id);
        $data = [
            'get_college_detail' => $college_detail,
        ];
        $this->view('student/college', $data);
    }


    public function schools()
    {
        $_SESSION['nav'] = "school";
        $this->view('student/schools');
    }


    public function quizes()
    {
        $_SESSION['nav'] = "quiz";
        $this->view('student/quizes');
    }


    public function students()
    {
        $_SESSION['nav'] = "student";
        $this->view('student/students');
    }



    public function student()
    {
        $_SESSION['nav'] = "student";
        $this->view('student/student');
    }



    public function users()
    {
        $this->view('student/users');
    }

    public function login()
    {
        if ((isset($_SESSION['rexkod_oodles_student_id'])) && (isset($_SESSION['rexkod_oodles_quiz_play_session']))) {

            $quiz_id  = $_SESSION['rexkod_oodles_quiz_play_session'];
            // echo $quiz_id;
            // die();
            $get_quiz_detail = $this->studentModel->get_quiz_detail($quiz_id);
            $quiz_type = $get_quiz_detail->type;
            // echo $quiz_type;
            // die();
            $category = $get_quiz_detail->category;
            $subject = $get_quiz_detail->subject_name;
            //    echo ('student/all_quiz/'.$quiz_type . '/' . $category . '/' . $subject);
            //    die();
            redirect('student/all_quiz/' . $quiz_type . '/' . $category . '/' . $subject);
            die();
        } elseif (isset($_SESSION['rexkod_oodles_student_id'])) {
            redirect('student/index');
        } else {
            if (!isset($_POST['username'])) {

                $this->view('student/login');
            } else {

                if (!isset($_POST['password'])) {
                    $_SESSION['success'] = "Enter Password";
                    $this->view('student/login');
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

                        $this->view('student/login');
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
                            $email = $_POST['username'];
                            setcookie('oodles', $email, time() + (86400 * 30), "/", ".oodlesin.com");
                         
                        } else {
                            $user = "";
                        }
                        if (empty($user)) {

                            $_SESSION['success'] = "Invalid Credential!";
                            $this->view('student/login');
                        } else {
                            if (($user->type == "student") ||   ($user->type == "parent")) {
                                $_SESSION['rexkod_oodles_student_id'] = $user->id;
                                $_SESSION['rexkod_oodles_student_name'] = $user->name;
                                $_SESSION['rexkod_oodles_student_email'] = $user->email;
                                $_SESSION['rexkod_oodles_student_phone'] = $user->phone;
                                $_SESSION['rexkod_oodles_student_class'] = $user->class;
                                $_SESSION['rexkod_oodles_login_type'] = $user->type;



                                if (isset($_POST['scholarship_detail'])) {
                                    $scholarship_detail_id  = $_POST['scholarship_detail'];

                                    redirect('home/scholarship_detail/' . $scholarship_detail_id);
                                    die;
                                }

                                if (isset($_SESSION['rexkod_oodles_quiz_play_session'])) {
                                    $quiz_id  = $_SESSION['rexkod_oodles_quiz_play_session'];
                                    // echo $quiz_id;
                                    // die();
                                    $get_quiz_detail = $this->studentModel->get_quiz_detail($quiz_id);
                                    $quiz_type = $get_quiz_detail->type;
                                    // echo $quiz_type;
                                    // die();
                                    $category = $get_quiz_detail->category;
                                    $subject = $get_quiz_detail->subject_name;

                                    // redirect('student/all_quiz/1/4/0');
                                    redirect('student/all_quiz/' . $quiz_type . '/' . $category . '/' . $subject);
                                    die();
                                }


                                // redirect('student/index');
                                $user_detail = $this->studentModel->get_current_student();
                                if (empty($user_detail)) {
                                    // redirect('student/add_profile');
                                    redirect('student/index');
                                } else {
                                    redirect('student/index');
                                }
                            } else {

                                $_SESSION['success'] = "You do not have access!";
                                redirect('student/login');
                            }
                        }
                    }
                }
            }
        }
    }

    

    public function create_profile()
    {
        $student_id  = $_SESSION['rexkod_oodles_student_id'];
        // $question_faq = $_POST['question_faq'];
        // $q = implode(',',$question_faq);
        // print_r ($q);
        // die();
        if (!empty($_FILES['student_image']['name'])) {
            $f_name = $_FILES['student_image']['name'];
            $f_temp = $_FILES['student_image']['tmp_name'];
            $size = $_FILES['student_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $student_image = $f_newfile;
        } else {
            $student_image = NULL;
        }
        if (!empty($_FILES['identity_proof']['name'])) {
            $f_name = $_FILES['identity_proof']['name'];
            $f_temp = $_FILES['identity_proof']['tmp_name'];
            $size = $_FILES['identity_proof']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $identity_proof = $f_newfile;
        } else {
            $identity_proof = NULL;
        }
        if (!empty($_FILES['address_proof']['name'])) {
            $f_name = $_FILES['address_proof']['name'];
            $f_temp = $_FILES['address_proof']['tmp_name'];
            $size = $_FILES['address_proof']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $address_proof = $f_newfile;
        } else {
            $address_proof = NULL;
        }
        if (!empty($_FILES['passbook_statement']['name'])) {
            $f_name = $_FILES['passbook_statement']['name'];
            $f_temp = $_FILES['passbook_statement']['tmp_name'];
            $size = $_FILES['passbook_statement']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $passbook_statement = $f_newfile;
        } else {
            $passbook_statement = NULL;
        }
        // if (!empty($_FILES['tuition_fees_receipt']['name'])) {
        //     $f_name = $_FILES['tuition_fees_receipt']['name'];
        //     $f_temp = $_FILES['tuition_fees_receipt']['tmp_name'];
        //     $size = $_FILES['tuition_fees_receipt']['size'];
        //     $f_extension = explode('.', $f_name);
        //     $f_extension = strtolower(end($f_extension));
        //     $f_newfile = uniqid() . '.' . $f_extension;
        //     $store = "uploads/" . $f_newfile;
        //     move_uploaded_file($f_temp, $store);
        //     $store = "uploads/";
        //     $tuition_fees_receipt = $f_newfile;
        // } else {
        //     $tuition_fees_receipt = NULL;
        // }
        // if (!empty($_FILES['non_tuition_fees_receipt']['name'])) {
        //     $f_name = $_FILES['non_tuition_fees_receipt']['name'];
        //     $f_temp = $_FILES['non_tuition_fees_receipt']['tmp_name'];
        //     $size = $_FILES['non_tuition_fees_receipt']['size'];
        //     $f_extension = explode('.', $f_name);
        //     $f_extension = strtolower(end($f_extension));
        //     $f_newfile = uniqid() . '.' . $f_extension;
        //     $store = "uploads/" . $f_newfile;
        //     move_uploaded_file($f_temp, $store);
        //     $store = "uploads/";
        //     $non_tuition_fees_receipt = $f_newfile;
        // } else {
        //     $non_tuition_fees_receipt = NULL;
        // }
        if (!empty($_FILES['father_aadhar_doc']['name'])) {
            $f_name = $_FILES['father_aadhar_doc']['name'];
            $f_temp = $_FILES['father_aadhar_doc']['tmp_name'];
            $size = $_FILES['father_aadhar_doc']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $father_aadhar_doc = $f_newfile;
        } else {
            $father_aadhar_doc = NULL;
        }
        if (!empty($_FILES['mother_aadhar_doc']['name'])) {
            $f_name = $_FILES['mother_aadhar_doc']['name'];
            $f_temp = $_FILES['mother_aadhar_doc']['tmp_name'];
            $size = $_FILES['mother_aadhar_doc']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $mother_aadhar_doc = $f_newfile;
        } else {
            $mother_aadhar_doc = NULL;
        }
        if (!empty($_POST['whatsapp_no'])) {
            $whatsapp_no = $_POST['whatsapp_no'];
        } else {
            $whatsapp_no = $_POST['phone_no'];
        }
        if (!empty($_POST['perm_address'])) {
            $perm_address = $_POST['perm_address'];
        } else {
            $perm_address = $_POST['comm_address'];
        }
        if (!empty($_POST['perm_village'])) {
            $perm_village = $_POST['perm_village'];
        } else {
            $perm_village = $_POST['comm_village'];
        }
        if (!empty($_POST['perm_state'])) {
            $perm_state = $_POST['perm_state'];
        } else {
            $perm_state = $_POST['comm_state'];
        }
        if (!empty($_POST['perm_pin_code'])) {
            $perm_pin_code = $_POST['perm_pin_code'];
        } else {
            $perm_pin_code = $_POST['comm_pin_code'];
        }
        if (!empty($_POST['perm_block'])) {
            $perm_block = $_POST['perm_block'];
        } else {
            $perm_block = $_POST['comm_block'];
        }
        if (isset($_POST['same_as_phone'])) {
            $same_as_phone = 1;
        } else {
            $same_as_phone = 0;
        }
        if (isset($_POST['same_as_comm_address'])) {
            $same_as_comm_address = 1;
        } else {
            $same_as_comm_address = 0;
        }
        //    if (!empty($_POST['school'])) {
        //     $school = $_POST['school'];
        // } else {
        //     $school=NULL;
        // }
        //    if (!empty($_POST['college'])) {
        //     $college = $_POST['college'];
        // } else {
        //     $college=NULL;
        // }
        // if (isset($_POST['admission_toggle'])) {
        //     $admission_toggle = '1';
        // } else {
        //     $admission_toggle = '0';
        // }
        // if (isset($_POST['scholarship_verification_toggle'])) {
        //     $scholarship_verification_toggle = '1';
        // } else {
        //     $scholarship_verification_toggle = '0';
        // }
        $academic_type = $_POST['academic_type'];
        $academic_name =  $_POST['academic_name'];
        // if ($academic_type == 1) {
        //     if ($_POST['school'] != "0") {
        //         $school = $_POST['school'];
        //         $school_temp = Null;
        //     } else {
        //         $school = Null;
        //         $college = Null;
        //         $school_temp = $_POST['school_temp'];
        //     }
        // } elseif ($academic_type == 2) {
        //     if ($_POST['college'] != "0") {
        //         $college = $_POST['college'];
        //         $school = Null;
        //         $college_temp = Null;
        //     } else {
        //         $school = Null;
        //         $college = Null;
        //         $college_temp = $_POST['college_temp'];
        //     }
        // }
        if ($academic_name == 0) {
            $academic_other_name = $_POST['academic_other_name'];
        } else {
            $academic_other_name = Null;
        }
        if (!empty($_POST['hobby'])) {
            $hobby = implode(',', $_POST['hobby']);
        } else {
            $hobby = Null;
        }
        if (!empty($_POST['achievements'])) {
            $achievements = implode(',', $_POST['achievements']);
        } else {
            $achievements = Null;
        }
        // echo $hobby;
        // echo "<br>";
        // echo $achievements;
        // die();
        //         echo $same_as_phone;
        // die();
        if (!empty($_POST['p_academic_name'])) {
            $p_academic_name = implode(',', $_POST['p_academic_name']);
        } else {
            $p_academic_name = Null;
        }
        if (!empty($_POST['p_class'])) {
            $p_class = implode(',', $_POST['p_class']);
        } else {
            $p_class = Null;
        }
        if (!empty($_POST['p_cgpa'])) {
            $p_cgpa = implode(',', $_POST['p_cgpa']);
        } else {
            $p_cgpa = Null;
        }
        if (!empty($_POST['p_start_date'])) {
            $p_start_date = implode(',', $_POST['p_start_date']);
        } else {
            $p_start_date = Null;
        }
        if (!empty($_POST['p_end_date'])) {
            $p_end_date = implode(',', $_POST['p_end_date']);
        } else {
            $p_end_date = Null;
        }

        // echo $p_start_date;
        // echo $p_end_date;
        // die();
        $data = [
            'student_id' => $student_id,
            'f_name' => $_POST['f_name'],
            'l_name' => $_POST['l_name'],
            'phone_no' => $_POST['phone_no'],
            'whatsapp_no' => $whatsapp_no,
            'dob' => $_POST['dob'],
            'aadhar' => $_POST['aadhar'],
            'gender' => $_POST['gender'],
            'same_as_phone' => $same_as_phone,
            'same_as_comm_address' => $same_as_comm_address,

            'religion' => $_POST['religion'],
            'category' => $_POST['category'],
            'father_name' => $_POST['father_name'],
            'f_aadhar' => $_POST['f_aadhar'],
            'f_phone' => $_POST['f_phone'],
            'f_email_id' => $_POST['f_email_id'],
            'mother_name' => $_POST['mother_name'],
            'm_aadhar' => $_POST['m_aadhar'],
            'm_phone' => $_POST['m_phone'],
            'm_email_id' => $_POST['m_email_id'],
            'siblings' => $_POST['siblings'],
            'annual_income' => $_POST['annual_income'],
            'physically' => $_POST['physically'],
            // 'school' => $school,
            // 'college' => $college,
            'comm_address' => $_POST['comm_address'],
            'comm_village' => $_POST['comm_village'],
            'comm_block' => $_POST['comm_block'],
            'comm_pin_code' => $_POST['comm_pin_code'],
            'comm_state' => $_POST['comm_state'],
            'account_no' => $_POST['account_no'],
            'perm_address' => $perm_address,
            'perm_village' => $perm_village,
            'perm_block' => $perm_block,
            'perm_pin_code' => $perm_pin_code,
            'perm_state' => $perm_state,
            // 'account_no' => $_POST['account_no'],
            're_account_no' => $_POST['re_account_no'],
            'ifsc_code' => $_POST['ifsc_code'],
            'bank_name' => $_POST['bank_name'],
            'bank_branch' => $_POST['bank_branch'],
            'name_as_per_bank' => $_POST['name_as_per_bank'],
            // 'admission_toggle' => $admission_toggle,
            'course' => $_POST['course'],
            'institute_city' => $_POST['institute_city'],
            'institute_state' => $_POST['institute_state'],
            // 'tuition_fees' => $_POST['tuition_fees'],
            // 'non_tuition_fees' => $_POST['non_tuition_fees'],
            // 'total_fees' => $_POST['total_fees'],
            // 'scholarship_verification_toggle' => $scholarship_verification_toggle,
            // 'course_span' => $_POST['course_span'],
            'student_image' => $student_image,
            'identity_proof' => $identity_proof,
            'address_proof' => $address_proof,
            'passbook_statement' => $passbook_statement,
            // 'tuition_fees_receipt' => $tuition_fees_receipt,
            // 'non_tuition_fees_receipt' => $non_tuition_fees_receipt,
            'academic_type' => $academic_type,
            'academic_name' => $academic_name,
            'academic_other_name' => $academic_other_name,
            'father_aadhar_doc' => $father_aadhar_doc,
            'mother_aadhar_doc' => $mother_aadhar_doc,
            // 'school_temp' => $school_temp,
            // 'college_temp' => $college_temp,
            'board' => $_POST['board'],
            'hobby' => $hobby,
            'achievements' => $achievements,
            'description' => $_POST['description'],
            'mother_tongue' => $_POST['mother_tongue'],
            //----previos academic
            'p_academic_name' => $p_academic_name,
            'p_class' => $p_class,
            'p_cgpa' => $p_cgpa,
            'p_start_date' => $p_start_date,
            'p_end_date' => $p_end_date,
        ];
        $result = $this->studentModel->create_profile_db($data);
        if ($result) {
            $_SESSION['success'] = "Profile added successfully..!</br> Please register now, for quiz";
            if (isset($_SESSION['rexkod_oodles_quiz_preregister'])) {
                $quiz_id = $_SESSION['rexkod_oodles_quiz_preregister'];
                $get_quiz_detail = $this->studentModel->get_quiz_detail($quiz_id);
                $quiz_type = $get_quiz_detail->type;
                $category = $get_quiz_detail->category;
                $subject = $get_quiz_detail->subject_name;
                redirect('student/all_quiz/' . $quiz_type . '/' . $category . '/' . $subject);
            } elseif (isset($_SESSION['rexkod_oodles_quiz_play_session'])) {
                $quiz_id = $_SESSION['rexkod_oodles_quiz_play_session'];
                $get_quiz_detail = $this->studentModel->get_quiz_detail($quiz_id);
                $quiz_type = $get_quiz_detail->type;
                $category = $get_quiz_detail->category;
                $subject = $get_quiz_detail->subject_name;
                redirect('student/all_quiz/' . $quiz_type . '/' . $category . '/' . $subject);
            } else {
                $_SESSION['success'] = "Profile added successfully..!";
                redirect('student/update_profile/' . $student_id);
            }
        } else {
            $_SESSION['success'] = "Try later..!";
            redirect('student/update_profile/' . $student_id);
        }
    }

    public function update_profile_data($id)
    {

        $student_detail = $this->studentModel->get_student_detail($id);
        $url = $_POST['url'];
        $student_id  = $id;
        $email_id = $_POST['email_id'];
        if (!empty($_FILES['student_image']['name'])) {
            $f_name = $_FILES['student_image']['name'];
            $f_temp = $_FILES['student_image']['tmp_name'];
            $size = $_FILES['student_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $student_image = $f_newfile;
        } else {
            $student_image = $student_detail->student_image;
        }
        if (!empty($_FILES['identity_proof']['name'])) {
            $f_name = $_FILES['identity_proof']['name'];
            $f_temp = $_FILES['identity_proof']['tmp_name'];
            $size = $_FILES['identity_proof']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $identity_proof = $f_newfile;
        } else {
            $identity_proof = $student_detail->identity_proof;
        }
        if (!empty($_FILES['address_proof']['name'])) {
            $f_name = $_FILES['address_proof']['name'];
            $f_temp = $_FILES['address_proof']['tmp_name'];
            $size = $_FILES['address_proof']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $address_proof = $f_newfile;
        } else {
            $address_proof = $student_detail->address_proof;
        }
        if (!empty($_FILES['passbook_statement']['name'])) {
            $f_name = $_FILES['passbook_statement']['name'];
            $f_temp = $_FILES['passbook_statement']['tmp_name'];
            $size = $_FILES['passbook_statement']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $passbook_statement = $f_newfile;
        } else {
            $passbook_statement = $student_detail->passbook_statement;
        }
        // if (!empty($_FILES['tuition_fees_receipt']['name'])) {
        //     $f_name = $_FILES['tuition_fees_receipt']['name'];
        //     $f_temp = $_FILES['tuition_fees_receipt']['tmp_name'];
        //     $size = $_FILES['tuition_fees_receipt']['size'];
        //     $f_extension = explode('.', $f_name);
        //     $f_extension = strtolower(end($f_extension));
        //     $f_newfile = uniqid() . '.' . $f_extension;
        //     $store = "uploads/" . $f_newfile;
        //     move_uploaded_file($f_temp, $store);
        //     $store = "uploads/";
        //     $tuition_fees_receipt = $f_newfile;
        // } else {
        //     $tuition_fees_receipt = $student_detail->tuition_fees_receipt;
        // }
        if (!empty($_FILES['father_aadhar_doc']['name'])) {
            $f_name = $_FILES['father_aadhar_doc']['name'];
            $f_temp = $_FILES['father_aadhar_doc']['tmp_name'];
            $size = $_FILES['father_aadhar_doc']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $father_aadhar_doc = $f_newfile;
        } else {
            $father_aadhar_doc = $student_detail->father_aadhar_doc;
        }
        if (!empty($_FILES['mother_aadhar_doc']['name'])) {
            $f_name = $_FILES['mother_aadhar_doc']['name'];
            $f_temp = $_FILES['mother_aadhar_doc']['tmp_name'];
            $size = $_FILES['mother_aadhar_doc']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $mother_aadhar_doc = $f_newfile;
        } else {
            $mother_aadhar_doc = $student_detail->mother_aadhar_doc;
        }
        if (!empty($_POST['whatsapp_no'])) {
            $whatsapp_no = $_POST['whatsapp_no'];
        } else {
            $whatsapp_no = $_POST['phone_no'];
        }

        // if (isset($_POST['admission_toggle'])) {
        //     $admission_toggle = '1';
        // } else {
        //     $admission_toggle = '0';
        // }
        // if (isset($_POST['scholarship_verification_toggle'])) {
        //     $scholarship_verification_toggle = '1';
        // } else {
        //     $scholarship_verification_toggle = '0';
        // }
        // $academic_type = $_POST['academic_type'];
        // if ($academic_type == 1) {
        //     $school = $_POST['school'];
        //     $college = Null;
        // } elseif ($academic_type == 2) {
        //     $college = $_POST['college'];

        //     $school = Null;
        // }
        if (isset($_POST['same_as_phone'])) {
            $same_as_phone = 1;
        } else {
            $same_as_phone = 0;
        }
        if (isset($_POST['same_as_comm_address'])) {
            $same_as_comm_address = 1;
        } else {
            $same_as_comm_address = 0;
        }
        if (!empty($_POST['hobby'])) {
            $hobby = implode(',', $_POST['hobby']);
        } else {
            $hobby = Null;
        }
        if (!empty($_POST['achievements'])) {
            $achievements = implode(',', $_POST['achievements']);
        } else {
            $achievements = Null;
        }

        if (!empty($_POST['perm_address'])) {
            $perm_address = $_POST['perm_address'];
        } elseif ((empty($_POST['perm_address']) &&  ($same_as_comm_address == 1))) {
            $perm_address = $_POST['comm_address'];
        }
        if (!empty($_POST['perm_village'])) {
            $perm_village = $_POST['perm_village'];
        } elseif ((empty($_POST['perm_village']) &&  ($same_as_comm_address == 1))) {
            $perm_village = $_POST['comm_village'];
        }
        if (!empty($_POST['perm_state'])) {
            $perm_state = $_POST['perm_state'];
        } elseif ((empty($_POST['perm_state']) &&  ($same_as_comm_address == 1))) {
            $perm_state = $_POST['comm_state'];
        }
        if (!empty($_POST['perm_pin_code'])) {
            $perm_pin_code = $_POST['perm_pin_code'];
        } elseif ((empty($_POST['perm_pin_code']) &&  ($same_as_comm_address == 1))) {
            $perm_pin_code = $_POST['comm_pin_code'];
        }
        if (!empty($_POST['perm_block'])) {
            $perm_block = $_POST['perm_block'];
        } elseif ((empty($_POST['perm_block']) &&  ($same_as_comm_address == 1))) {
            $perm_block = $_POST['comm_block'];
        }

        $academic_type = $_POST['academic_type'];
        $academic_name =  $_POST['academic_name'];
        if ($academic_name == 0) {
            $academic_other_name = $_POST['academic_other_name'];
        } else {
            $academic_other_name = Null;
        }

        if (!empty($_POST['p_academic_name'])) {
            $p_academic_name = implode(',', $_POST['p_academic_name']);
        } else {
            $p_academic_name = Null;
        }
        if (!empty($_POST['p_class'])) {
            $p_class = implode(',', $_POST['p_class']);
        } else {
            $p_class = Null;
        }
        if (!empty($_POST['p_cgpa'])) {
            $p_cgpa = implode(',', $_POST['p_cgpa']);
        } else {
            $p_cgpa = Null;
        }
        if (!empty($_POST['p_start_date'])) {
            $p_start_date = implode(',', $_POST['p_start_date']);
        } else {
            $p_start_date = Null;
        }
        // echo $p_start_date;
        if (!empty($_POST['p_end_date'])) {
            $p_end_date = implode(',', $_POST['p_end_date']);
        } else {
            $p_end_date = Null;
        }
        // echo $p_end_date;
        // die();
        $data = [

            'student_id' => $student_id,
            'f_name' => $_POST['f_name'],
            'l_name' => $_POST['l_name'],
            'phone_no' => $_POST['phone_no'],
            'whatsapp_no' => $whatsapp_no,
            'same_as_phone' => $same_as_phone,
            'same_as_comm_address' => $same_as_comm_address,
            'dob' => $_POST['dob'],
            'aadhar' => $_POST['aadhar'],
            'gender' => $_POST['gender'],
            'religion' => $_POST['religion'],
            'category' => $_POST['category'],
            'father_name' => $_POST['father_name'],
            'f_aadhar' => $_POST['f_aadhar'],
            'f_phone' => $_POST['f_phone'],
            'f_email_id' => $_POST['f_email_id'],
            'mother_name' => $_POST['mother_name'],
            'm_aadhar' => $_POST['m_aadhar'],
            'm_phone' => $_POST['m_phone'],
            'm_email_id' => $_POST['m_email_id'],
            'siblings' => $_POST['siblings'],
            'annual_income' => $_POST['annual_income'],
            'physically' => $_POST['physically'],
            // 'school' => $school,
            // 'college' => $college,
            'comm_address' => $_POST['comm_address'],
            'comm_village' => $_POST['comm_village'],
            'comm_block' => $_POST['comm_block'],
            'comm_pin_code' => $_POST['comm_pin_code'],
            'comm_state' => $_POST['comm_state'],
            // 'account_no' => $_POST['account_no'],
            'perm_address' => $perm_address,
            'perm_village' => $perm_village,
            'perm_block' => $perm_block,
            'perm_pin_code' => $perm_pin_code,
            'perm_state' => $perm_state,
            'account_no' => $_POST['account_no'],
            're_account_no' => $_POST['re_account_no'],
            'ifsc_code' => $_POST['ifsc_code'],
            'bank_name' => $_POST['bank_name'],
            'bank_branch' => $_POST['bank_branch'],
            'name_as_per_bank' => $_POST['name_as_per_bank'],
            // 'admission_toggle' => $admission_toggle,
            'course' => $_POST['course'],
            'institute_city' => $_POST['institute_city'],
            'institute_state' => $_POST['institute_state'],
            // 'tuition_fees' => $_POST['tuition_fees'],
            // 'non_tuition_fees' => $_POST['non_tuition_fees'],
            // 'total_fees' => $_POST['total_fees'],
            // 'scholarship_verification_toggle' => $scholarship_verification_toggle,
            // 'course_span' => $_POST['course_span'],
            'student_image' => $student_image,
            'identity_proof' => $identity_proof,
            'address_proof' => $address_proof,
            'passbook_statement' => $passbook_statement,
            // 'tuition_fees_receipt' => $tuition_fees_receipt,
            // 'non_tuition_fees_receipt' => $non_tuition_fees_receipt,
            // 'academic_type' => $_POST['academic_type'],
            'academic_type' => $academic_type,
            'academic_name' => $academic_name,
            'academic_other_name' => $academic_other_name,
            'father_aadhar_doc' => $father_aadhar_doc,
            'mother_aadhar_doc' => $mother_aadhar_doc,
            'board' => $_POST['board'],
            'hobby' => $hobby,
            'achievements' => $achievements,
            'description' => $_POST['description'],
            'mother_tongue' => $_POST['mother_tongue'],

            //----previos academic
            'p_academic_name' => $p_academic_name,
            'p_class' => $p_class,
            'p_cgpa' => $p_cgpa,
            'p_start_date' => $p_start_date,
            'p_end_date' => $p_end_date,

        ];
        if (isset($_POST['personal_submit'])) {
            $submit_value = 'tab1';
        } elseif (isset($_POST['academic_submit'])) {
            $submit_value = 'tab2';
        } elseif (isset($_POST['family_submit'])) {
            $submit_value = 'tab3';
        } elseif (isset($_POST['address_submit'])) {
            $submit_value = 'tab4';
        } elseif (isset($_POST['bank_submit'])) {
            $submit_value = 'tab5';
        } elseif (isset($_POST['about_submit'])) {
            $submit_value = 'tab6';
        } elseif (isset($_POST['p_academic_detail'])) {
            $submit_value = 'tab7';
        } else {
            $submit_value = 'tab1';
        }

        $result = $this->studentModel->update_profile_db($data);
        $email_id_change = $this->studentModel->update_email_id($email_id);

        if ($url == "student") {
            if ($result && $email_id_change) {
                $_SESSION['success'] = "Profile updated successfully..!";
                redirect('student/update_profile/' . '#' . $submit_value);
            } else {
                $_SESSION['success'] = "Try later..!";
                redirect('student/update_profile');
            }
        } else {
            if ($result && $email_id_change) {
                $_SESSION['success'] = "Student Profile updated successfully..!";
                redirect('admin/update_student_profile/' . $id);
            } else {
                $_SESSION['success'] = "Try later..!";
                redirect('admin/update_student_profile/' . $id);
            }
        }
    }



    public function scholarship($id)
    {
        $check_scholarship_eligibility_status =  $this->studentModel->check_scholarship_eligibility_status($id);
        $get_all_scholarship = $this->adminModel->get_all_scholarship();
        $get_all_scholarship_app = $this->studentModel->get_all_scholarship_app();
        $verify_student = $this->adminModel->verify_student();
        $get_all_scholarship_detail = $this->adminModel->get_all_scholarship_by_id($id);
        $get_single_scholarship = $this->adminModel->get_ind_scholarship($id);
        $get_scholarship_application = $this->studentModel->get_scholarship_application($id);
        $get_current_student = $this->studentModel->get_current_student();


        $data = [
            'get_all_scholarship' => $get_all_scholarship_detail,
            // 'get_all_scholarship' => $get_all_scholarship,
            'get_all_scholarship_app' => $get_all_scholarship_app,
            'verify_student' => $verify_student,
            'get_single_scholarship' => $get_single_scholarship,
            'scholarship_id' => $id,
            'check_scholarship_eligibility_status' => $check_scholarship_eligibility_status,
            'get_scholarship_application' => $get_scholarship_application,
            'get_current_student' => $get_current_student,
        ];

        $this->view('student/scholarship', $data);
    }
    public function final_process_scholarship($id)
    {

        $get_all_scholarship = $this->adminModel->get_all_scholarship();
        $get_all_scholarship_app = $this->studentModel->get_all_scholarship_app();
        $verify_student = $this->adminModel->verify_student();
        $get_all_scholarship_detail = $this->adminModel->get_all_scholarship_by_id($id);
        $get_single_scholarship = $this->adminModel->get_ind_scholarship($id);
        $data = [
            'get_all_scholarship' => $get_all_scholarship_detail,
            // 'get_all_scholarship' => $get_all_scholarship,
            'get_all_scholarship_app' => $get_all_scholarship_app,
            'verify_student' => $verify_student,
            'get_single_scholarship' => $get_single_scholarship,
            'scholarship_id' => $id,
        ];

        $this->view('student/final_process_scholarship', $data);
    }

    public function apply_scholarship()
    {
        // if(isset($_SESSION['rexkod_oodles_user_id']))

        $get_all_scholarship = $this->adminModel->get_all_scholarship();
        $get_all_scholarship_app = $this->studentModel->get_all_scholarship_app();
        $verify_student = $this->adminModel->verify_student();
        $data = [
            'get_all_scholarship' => $get_all_scholarship,
            'get_all_scholarship_app' => $get_all_scholarship_app,
            'verify_student' => $verify_student,
        ];


        $_SESSION['nav'] = "scholarship";
        $this->view('student/apply_scholarship', $data);
    }
    public function all_scholarships()
    {
        // if(isset($_SESSION['rexkod_oodles_user_id']))
        $get_student_detail_from_auth = $this->studentModel->get_auth_detail();
        $get_classwise_scholarships = $this->studentModel->get_classwise_scholarships($get_student_detail_from_auth->class);
        // print_r($get_classwise_scholarships);
        // die();
        $get_all_scholarship = $this->adminModel->get_all_scholarship();
        $get_all_scholarship_app = $this->studentModel->get_all_scholarship_app();
        $verify_student = $this->adminModel->verify_student();
        $data = [
            'get_student_detail_from_auth' => $get_student_detail_from_auth,
            'get_all_scholarship' => $get_all_scholarship,
            'get_all_scholarship_app' => $get_all_scholarship_app,
            'verify_student' => $verify_student,
            'get_classwise_scholarships' => $get_classwise_scholarships,
        ];


        $_SESSION['nav'] = "scholarship";
        $this->view('student/all_scholarships', $data);
    }

    public function applied_scholarship()
    {

        $get_all_scholarship_app = $this->studentModel->get_all_scholarship_application_id();
        $data = [
            'get_all_scholarship_app' => $get_all_scholarship_app,
        ];




        $this->view('student/applied_scholarship', $data);
    }

    public function sssubmit_criteria_answers1($id)
    {
        $answers = array();
        $check_scholarship_application_presence = $this->studentModel->get_scholarship_application($id);
        if (isset($check_scholarship_application_presence)) {

            $scholarship_id = $id;
            $scholarship_detail  = $this->adminModel->get_ind_scholarship($scholarship_id);
            $array = explode(',', $scholarship_detail->criteria);
            $flag = 0;
            foreach ($array as $criteria_id) {

                $get_criteria_detail = $this->studentModel->get_criteria_detail($criteria_id);
                $student_class = $_SESSION['rexkod_oodles_student_class'];
                if ($get_criteria_detail->criteria_type == 1  && $student_class == $get_criteria_detail->class) {

                    if (isset($_POST[$criteria_id])) {
                        $toggle_answer = 1;
                        $answers[$criteria_id] = $toggle_answer;
                    } else {
                        $toggle_answer = 0;
                        $answers[$criteria_id] = $toggle_answer;
                    }
                    if ($toggle_answer != $get_criteria_detail->yes_no_based) {
                        $flag = 1;
                        $_SESSION['success'] = "Your are not eligible for this scholarship!";
                        redirect('student/scholarship');
                    } else {
                        // $answer = implode(',', array($toggle_answer));
                        $answer[] = $toggle_answer;
                    }
                }

                if ($get_criteria_detail->criteria_type == 2 && $student_class == $get_criteria_detail->class) {
                    $answers[$criteria_id] =  $_POST[$criteria_id];
                    $check = $_POST[$criteria_id];
                    $startDate = $get_criteria_detail->start_date;
                    $endDate = $get_criteria_detail->end_date;

                    if (max($startDate, $check) == min($endDate, $check)) {
                        $date_valid = 1;
                    } else {
                        $date_valid = 0;
                    }
                    if ($date_valid == 0) {
                        $flag = 1;
                        $_SESSION['success'] = "Your are not eligible for this scholarship!";
                        redirect('student/scholarship');
                    } else {
                        // $answer = implode(',', array($check));
                        $answer[] = $check;
                    }
                }

                if ($get_criteria_detail->criteria_type == 3 && $student_class == $get_criteria_detail->class) {
                    $answers[$criteria_id] =  $_POST[$criteria_id];

                    $check = $_POST[$criteria_id];
                    $start_range = $get_criteria_detail->start_range;
                    $end_range = $get_criteria_detail->end_range;
                    if ((($start_range < $check) && ($end_range > $check)) || (($start_range > $check) && ($end_range < $check))) {
                        $check_range = 1;
                    } else {
                        $check_range = 0;
                    }
                    if ($check_range == 0) {
                        $flag = 1;
                        $_SESSION['success'] = "You are not eligible for this scholarship!";
                        redirect('student/scholarship');
                    } else {
                        // $answer = implode(',', array($check));
                        $answer[] = $check;
                    }
                }
            }
            $criteria_answer = implode(',', $answer);

            // Flag has been given for emergency if the above conditions on failing also move forward.
            if ($flag == 0) {
                $result = $this->studentModel->apply_scholarship($scholarship_id, $criteria_answer);
            }
            $student_detail = $this->studentModel->get_current_student();
            $basic_flag = $student_detail->basic_flag;



            if ($result) {
                if ($basic_flag == 0) {
                    $_SESSION['success'] = 'Congrats, You are eligible for this Scholarship. Please complete basic profile to add the documents';
                } else {
                    $_SESSION['success'] = 'Congrats, You are eligible for this Scholarship.Please upload documents for verfication';
                }

                redirect('student/scholarship/' . $id);
            } else {
                $_SESSION['success'] = 'You are not eligible for this scholarship!';
                redirect('student/scholarship/' . $id);
            }
        } else {
            $_SESSION['success'] = 'You are already eligible, please upload documents for verification!';
            redirect('student/scholarship/' . $id);
        }
    }

    public function submit_scholarship_document($id)
    {
        $student_detail = $this->studentModel->get_current_student();
        // The below line check if there profile_details arent fulfulled, dont let them do the payment
        $scholarship_detail  = $this->adminModel->get_ind_scholarship($id);
        $scholarship_charge = $scholarship_detail->student_charge;
        $txnid = "Db / S-" . $id;
        $debit_money  = $this->studentModel->debit_money_for_scholarship($scholarship_charge, $txnid, 19, $id);

        $basic_flag = $student_detail->basic_flag;  // check profile details is filled or not
        if ($debit_money) {


            if ($basic_flag == 1) {
                // echo "tdf";
                $check_scholarship_application_presence = $this->studentModel->get_scholarship_application($id);
                if (empty($check_scholarship_application_presence->documents)) {

                    $scholarship_id = $id;
                    $scholarship_detail  = $this->adminModel->get_ind_scholarship($scholarship_id);
                    $scholarship_name = $scholarship_detail->name;
                    $array = explode(',', $scholarship_detail->documents_required);
                    $flag = 0;
                    $document_ids = '';
                    $student_class = $_SESSION['rexkod_oodles_student_class'];
                    $final_document_submit  = '';
                    foreach ($array as $document) {
                        // $get_document_detail = $this->studentModel->get_scholarship_document_detail($document);

                        $document_ids .= $document . ",";
                        // $document_submit[] = $_POST[$document_id];
                        if (!empty($_FILES[$document]['name'])) {
                            $f_name = $_FILES[$document]['name'];
                            $f_temp = $_FILES[$document]['tmp_name'];
                            $size = $_FILES[$document]['size'];
                            $f_extension = explode('.', $f_name);
                            $f_extension = strtolower(end($f_extension));
                            $f_newfile = uniqid() . '.' . $f_extension;
                            $store = "uploads/" . $f_newfile;
                            move_uploaded_file($f_temp, $store);
                            $store = "uploads/";
                            $document_submit = $f_newfile;
                        } else {
                            $document_submit = null;
                        }


                        if (empty($final_document_submit)) {
                            $final_document_submit = $document_submit;
                        } else {
                            $final_document_submit .= "," . $document_submit;
                        }
                        // Remove extra comma at the end if any

                    }
                    if (isset($final_document_submit)) {
                        $final_document_submit = rtrim($final_document_submit, ",");
                    }
                    $document_ids = rtrim($document_ids, ",");

                    $insert_scholarship_application_document = $this->studentModel->insert_scholarship_application_document($final_document_submit, $scholarship_id, $document_ids);
                    if ($insert_scholarship_application_document) {
                        $message = "Documents are under verification for " . $scholarship_name . "  Scholarship.";
                        $add_notification = $this->studentModel->add_notifications($_SESSION['rexkod_oodles_student_id'], $message);
                        $_SESSION['success'] = 'Documents are under verification. Wait until next notifications. Meanwhile complete the rest of the profile';
                        redirect('student/scholarship/' . $id);
                    } else {
                        $_SESSION['success'] = 'We are trying to find the error';
                        redirect('student/scholarship/' . $id);
                    }
                } else {
                    $_SESSION['success'] = 'We have already collected your documents, verification is still in progress';
                    redirect('student/scholarship/' . $id);
                }
            } else {
                $_SESSION['success'] = 'Please complete basic profile to add the documents';
                redirect('student/scholarship/' . $id);
            }
        } else {
            $_SESSION['success'] = 'Payment Not Done';
            $_SESSION['scholarship_payment'] = $id;

            redirect('student/pay1/' . $scholarship_charge);
        }
    }
    public function update_scholarship_document($application_id)
    {
        $get_scholarship_application = $this->corporateModel->get_ind_scholarship_application($application_id);
        $scholarship_id = $get_scholarship_application->scholarship_id;
        $student_detail = $this->studentModel->get_current_student();

        $scholarship_detail  = $this->adminModel->get_ind_scholarship($scholarship_id);
        $scholarship_name = $scholarship_detail->name;
        $array = explode(',', $scholarship_detail->documents_required);
        $submitted_document = explode(',', $get_scholarship_application->documents);
        $document_ids = '';
        //    echo $document_id = $_FILES[$document_id]['name'];
        //    die();
        foreach ($array as $index => $document) {
            // $get_document_detail = $this->studentModel->get_scholarship_document_detail($document);
            // $document_id = $get_document_detail->id;
            // $document_ids .= $document_id . ",";

            if (!empty($_FILES[$document]['name'])) {
                // Upload the new file
                //                 echo $document;
                // die();
                $submitted_document_id = $document;
                $f_name = $_FILES[$document]['name'];
                // echo $f_name;
                // die();
                $f_temp = $_FILES[$document]['tmp_name'];
                $size = $_FILES[$document]['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $document_submit[] = $f_newfile;
            } else {
                // Use the previously submitted file, if available
                if (isset($submitted_document[$index])) {
                    $document_submit[] = $submitted_document[$index];
                } else {
                    $document_submit[] = null;
                }
            }
        }
        // $document_ids = rtrim($document_ids, ","); // remove the last comma
        // echo $document_ids;
        // die();
        $final_document_submit  = implode(',', $document_submit);
        // echo $final_document_submit;
        // echo "yes";
        // die();
        $update_scholarship_application_document = $this->studentModel->update_scholarship_application_document($final_document_submit, $scholarship_id);
        if ($update_scholarship_application_document) {
            $get_document_detail = $this->studentModel->get_scholarship_document_detail($submitted_document_id);
            $message = "Document " . $get_document_detail->name . " re-uploaded for  " . $scholarship_name . "  Scholarship.";
            $add_notification = $this->studentModel->add_notifications($_SESSION['rexkod_oodles_student_id'], $message);
            $comment = 'Reuploaded';
            $data = [
                'document_status' => 0,
                'document_comment' => $comment,
                'doc_id' => $submitted_document_id,
                // 'scholarship_id' => $_POST['scholarship_id'],
                'application_id' => $application_id,
                'type' => 'admin',
            ];

            $result = $this->adminModel->add_scholarship_document_status($data);
            $data = [
                'document_status' => 0,
                'document_comment' => $comment,
                'doc_id' => $submitted_document_id,
                // 'scholarship_id' => $_POST['scholarship_id'],
                'application_id' => $application_id,
                'type' => 'subadmin',
            ];

            $result = $this->adminModel->add_scholarship_document_status($data);
            $data = [
                'document_status' => 0,
                'document_comment' => $comment,
                'doc_id' => $submitted_document_id,
                // 'scholarship_id' => $_POST['scholarship_id'],
                'application_id' => $application_id,
                'type' => 'corporate',
            ];

            $result = $this->adminModel->add_scholarship_document_status($data);




            $_SESSION['success'] = 'Documents are under verification. Wait until next notifications. Meanwhile complete the rest of the profile';
            redirect('student/scholarship_status/' . $application_id);
        } else {
            $_SESSION['success'] = 'We are trying to find the error';
            redirect('student/scholarship_status/' . $application_id);
        }
    }
    public function resume_printout($student_id)
    {
        $data = [
            'student_id' => $student_id,
        ];
        $this->view('student/resume_printout', $data);
    }
    public function scholarship_status($id)
    {
        $get_scholarship_application = $this->corporateModel->get_ind_scholarship_application($id);
        
        $data = [
            'get_scholarship_application' => $get_scholarship_application,
        ];
        $this->view('student/scholarship_status', $data);
    }

    public function notifications()
    {
        $get_all_notification  = $this->studentModel->get_notifications($_SESSION['rexkod_oodles_student_id']);
        $mark_notifications_read = $this->studentModel->mark_notifications_read($_SESSION['rexkod_oodles_student_id']);
        $data = [
            'get_notifications' => $get_all_notification,
        ];
        $this->view('student/notifications', $data);
    }
    public function delete_notifications()
    {
        $notification = implode(',', $_POST['notification']);
        $array = explode(',', $notification);
        foreach ($array as $value) {
            $delete_notification = $this->studentModel->delete_notification($value, $_SESSION['rexkod_oodles_student_id']);
        }
        redirect('student/notifications');
    }
    public function change_pass()
    {
        $this->view('student/change_pass');
    }

    public function change_password()
    {
        if (isset($_POST['opass'])) {
            $opass = $_POST['opass'];
            $r = $this->pageModel->check_pass($opass);

            if ($r == true) {
                if (isset($_POST['npass'])) {
                    if (isset($_POST['cpass'])) {
                        if ($_POST['npass'] == $_POST['cpass']) {
                            if (empty($_POST['user_email'])) {
                                $email = $r->email;
                            } else {
                                $email = $_POST['user_email'];
                            }

                            $this->pageModel->update_password($_POST['npass'], $email);
                            $message = "Your accounts password has been changed successfully.";
                            $add_notification = $this->studentModel->add_notifications($_SESSION['rexkod_oodles_student_id'], $message);
                            $_SESSION['success'] = "Password Changed successfully..!";
                            redirect('student/change_pass');
                        } else {
                            $_SESSION['success'] = "Confirm Password not matching with New Password";
                            redirect('student/change_pass');
                        }
                    } else {
                        $_SESSION['success'] = "Enter Confirm Password";
                        redirect('student/change_pass');
                    }
                } else {
                    $_SESSION['success'] = "Enter New Password";
                    redirect('student/change_pass');
                }
            } else {
                $_SESSION['success'] = "current password not matching";
                redirect('student/change_pass');
            }
        } else {
            $_SESSION['success'] = "Enter current Password";
            redirect('student/change_pass');
        }
    }

    public function logout()
    {
        session_destroy();
        unset($_COOKIE['oodles']);
        setcookie('oodles', null, time() - 3600, "/",".oodlesin.com");
        unset($_COOKIE['eg_user']);
        setcookie('eg_user', null, time() - 3600, "/",".oodlesin.com");
        // redirect('student/login');

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $is_mobile = false;

        if (strpos($user_agent, 'Mobile') !== false || strpos($user_agent, 'Android') !== false) {
            // User agent indicates a mobile device
            $is_mobile = true;
            
        }
        if ($is_mobile) { 
            // echo 'Mobile';
            // die();
        // redirect('student/register_mobile');
        $externalLink = 'https://learn.oodlesin.com/sso_client/login_initiate';

                        // Perform a redirection
                        header('Location: ' . $externalLink);
                        exit; // Ensure the script stops executing after redirection
        
            
        } else { 
            // echo 'not Mobile';
            // die();
        redirect('student/login');
        
        
        }
    }










    public function add_profile()
    {
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_college_detail = $this->adminModel->get_college_detail();
        $get_current_user_auth = $this->adminModel->get_current_user_auth();
        $get_all_class = $this->adminModel->get_all_active_class();
        $get_all_hobbies = $this->adminModel->get_all_hobbies();
        $get_all_boards = $this->adminModel->get_all_boards();

        $data = [
            'get_current_user_auth' => $get_current_user_auth,
            'get_school_detail' => $get_school_detail,
            'get_college_detail' => $get_college_detail,
            'get_all_class' => $get_all_class,
            'get_all_hobbies' => $get_all_hobbies,
            'get_all_boards' => $get_all_boards,
        ];
        $this->view('student/add_profile', $data);
    }

    public function update_profile()
    {
        $get_all_columns = $this->studentModel->get_all_columns();
        $get_current_student = $this->studentModel->get_current_student();
        $get_current_user_auth = $this->adminModel->get_current_user_auth();
        // echo $_SESSION['rexkod_oodles_student_id'];
        // die();
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_college_detail = $this->adminModel->get_college_detail();
        $empty_column_in_student = $this->studentModel->empty_column_in_student();
        $get_all_class = $this->adminModel->get_all_active_class();
        $get_all_hobbies = $this->adminModel->get_all_hobbies();
        $get_all_boards = $this->adminModel->get_all_boards();
        $data = [
            'get_current_user_auth' => $get_current_user_auth,
            'get_current_student' => $get_current_student,
            'get_school_detail' => $get_school_detail,
            'get_college_detail' => $get_college_detail,
            'empty_column_in_student' => $empty_column_in_student,
            'get_all_columns' => $get_all_columns,
            'get_all_class' => $get_all_class,
            'get_all_hobbies' => $get_all_hobbies,
            'get_all_boards' => $get_all_boards,
        ];
        $this->view('student/update_profile', $data);
    }

    public function test()
    {
        $this->view('student/test');
    }

    public function settings()
    {
        $this->view('student/settings');
    }

    public function add_user()
    {
        $this->view('student/add_user');
    }

    public function create_user()
    {

        $pass = $_POST['password'];

        $pass1 = password_hash($pass, PASSWORD_DEFAULT);

        $data = [

            'name' =>  $_POST['name'],
            'email' =>  $_POST['email'],
            'ph_no' =>  $_POST['ph_no'],
            'address' =>  $_POST['address'],
            'pin_code' =>  $_POST['pin_code'],
            'password' =>  $pass1,
        ];

        $insert_auth_deliveryUser = $this->adminModel->insert_auth_deliveryUser($data);

        $_SESSION['success'] = "Delivery user Created Successfully";
        redirect('student/all_deliveryUsers');
    }






    public function update_user()
    {
        if (empty($_POST['password'])) {

            $data = [

                'auth_id' =>  $_POST['auth_id'],
                'name' =>  $_POST['name'],
                'email' =>  $_POST['email'],
                'ph_no' =>  $_POST['ph_no'],
                'address' =>  $_POST['address'],
                'pin_code' =>  $_POST['pin_code'],
            ];

            $update_auth_deliveryUser = $this->adminModel->update_auth_deliveryUser($data);

            $_SESSION['success'] = "Delivery user Updated Successfully";
            redirect('student/all_deliveryUsers');
        } else {
            $pass = $_POST['password'];

            $pass1 = password_hash($pass, PASSWORD_DEFAULT);


            $data = [

                'auth_id' =>  $_POST['auth_id'],
                'name' =>  $_POST['name'],
                'email' =>  $_POST['email'],
                'ph_no' =>  $_POST['ph_no'],
                'address' =>  $_POST['address'],
                'pin_code' =>  $_POST['pin_code'],
                'password' =>  $pass1,
            ];

            $update_auth_deliveryUser = $this->adminModel->update_auth_deliveryUser1($data);

            $_SESSION['success'] = "Delivery user Updated Successfully";
            redirect('student/all_deliveryUsers');
        }
    }


    public function student_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $agree = $_POST['agree'];
            $class = $_POST['class'];

            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('student/register');
            } else if ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('student/register');
            } else {


                if ($this->pageModel->findUserByphno($phone)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('student/register');
                } else {

                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    if ($this->adminModel->add_student($name, $email, $phone, $pass, $agree, $class)) {
                        $user = $this->pageModel->ulogin($email, $_POST['password']);
                        $_SESSION['rexkod_oodles_student_id'] = $user->id;
                        // echo  $_SESSION['rexkod_oodles_student_id'];
                        // die();
                        $_SESSION['rexkod_oodles_student_name'] = $user->name;
                        $_SESSION['rexkod_oodles_student_email'] = $user->email;
                        $_SESSION['rexkod_oodles_student_phone'] = $user->phone;
                        $_SESSION['rexkod_login_type'] = $user->type;
                        $_SESSION['rexkod_oodles_student_class'] = $user->class;

                        // $_SESSION['success'] = "Registered Successfully..! ";
                        $_SESSION['show_referral_modal'] = 1;
                        $message = "Your registeration is complete. Please complete your profile!";
                        $add_notification = $this->studentModel->add_notifications($_SESSION['rexkod_oodles_student_id'], $message);
                        if (isset($_SESSION['rexkod_oodles_quiz_play_session'])) {
                            $quiz_id  = $_SESSION['rexkod_oodles_quiz_play_session'];
                            // echo $quiz_id;
                            // die();
                            $get_quiz_detail = $this->studentModel->get_quiz_detail($quiz_id);
                            $quiz_type = $get_quiz_detail->type;
                            // echo $quiz_type;
                            // die();
                            $category = $get_quiz_detail->category;
                            $subject = $get_quiz_detail->subject_name;

                            // redirect('student/all_quiz/1/4/0');
                            redirect('student/all_quiz/' . $quiz_type . '/' . $category . '/' . $subject);
                            die();
                        }
                        redirect('student/add_profile');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('student/register');
                    }
                }
            }
        } else {
            redirect('student/register');
        }
    }

    public function student_register_mobile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $agree = $_POST['agree'];
            $class = $_POST['class'];

            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('student/register_mobile');
            } else if ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('student/register_mobile');
            } else {


                if ($this->pageModel->findUserByphno($phone)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('student/register_mobile');
                } else {

                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    if ($this->adminModel->add_student($name, $email, $phone, $pass, $agree, $class)) {
                        $user = $this->pageModel->ulogin($email, $_POST['password']);

                        setcookie('oodles', $email, time() + (86400 * 30), "/", ".oodlesin.com");
                        $_SESSION['rexkod_oodles_student_id'] = $user->id;
                        // echo  $_SESSION['rexkod_oodles_student_id'];
                        // die();
                        $_SESSION['rexkod_oodles_student_name'] = $user->name;
                        $_SESSION['rexkod_oodles_student_email'] = $user->email;
                        $_SESSION['rexkod_oodles_student_phone'] = $user->phone;
                        $_SESSION['rexkod_login_type'] = $user->type;
                        $_SESSION['rexkod_oodles_student_class'] = $user->class;

                        // $_SESSION['success'] = "Registered Successfully..! ";
                        $_SESSION['show_referral_modal'] = 1;
                        $message = "Your registeration is complete. Please complete your profile!";
                        $add_notification = $this->studentModel->add_notifications($_SESSION['rexkod_oodles_student_id'], $message);
                        if (isset($_SESSION['rexkod_oodles_quiz_play_session'])) {
                            $quiz_id  = $_SESSION['rexkod_oodles_quiz_play_session'];
                            // echo $quiz_id;
                            // die();
                            $get_quiz_detail = $this->studentModel->get_quiz_detail($quiz_id);
                            $quiz_type = $get_quiz_detail->type;
                            // echo $quiz_type;
                            // die();
                            $category = $get_quiz_detail->category;
                            $subject = $get_quiz_detail->subject_name;

                            // redirect('student/all_quiz/1/4/0');
                            redirect('student/all_quiz/' . $quiz_type . '/' . $category . '/' . $subject);
                            die();
                        }
                        
                        $externalLink = 'https://learn.oodlesin.com/sso_client/login_initiate';

                        // Perform a redirection
                        header('Location: ' . $externalLink);
                        exit; // Ensure the script stops executing after redirection

                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('student/register_mobile');
                    }
                }
            }
        } else {
            redirect('student/register_mobile');
        }
    }


    public function send_otp($phone, $otp)
    {
        // $oodlesIn = $_SESSION['rexkod_oodles_student_name'];

        $url = "https://manage.smssolutions.in/smsapi/index?key=4634FEEA7A5F49&campaign=0&routeid=16&type=text&contacts=+91" . $phone . "&senderid=OODLES&msg=Your%20one%20time%20password%20is%20" . $otp . ".to%20sign%20to%20your%20account%20OodlesIN";


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 40,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
        ));

        function url($url)
        {
            $result = parse_url($url);
        }
        curl_exec($curl);
        curl_close($curl);
    }
    public function test_otp($phone, $otp)
    {

        $url = "https://manage.smssolutions.in/smsapi/index?key=4634FEEA7A5F49&campaign=0&routeid=16&type=text&contacts=+91" . $phone . "&senderid=OODLES&msg=Your%20one%20time%20password%20is%20" . $otp . ".to%20sign%20to%20your%20account%20OodlesIN";


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 40,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
        ));

        function url1($url)
        {
            $result = parse_url($url);
        }

        curl_exec($curl);
        curl_close($curl);
        return true;
    }
    public function check_email($email)
    {
        // echo $_POST['phn'];
        // echo $email;
        // die();
    }
    public function resources()
    {
        $get_auth_detail = $this->studentModel->get_auth_detail();
        $class = $get_auth_detail->class;

        // $get_all_class = $this->adminModel->get_all_class();
        // if (isset($_POST['class'])) {
        //     $class = $_POST['class'];
        // } else {
        //     $subject = 0;
        // }
        // if (isset($_POST['subject'])) {
        //     $subject = $_POST['subject'];
        // } else {
        //     $subject = 0;
        // }

        $get_chapter_detail = $this->studentModel->get_chapter_detail_class_wise($class);

        $data = [
            // 'get_all_class' => $get_all_class,
            'get_chapter_detail' => $get_chapter_detail,
        ];
        $this->view('student/resources', $data);
    }

    public function check_pincode()
    {
        $pin = $_POST['pin'];
        $pin_data = $this->studentModel->check_pincode($pin);
        $area_data = $this->studentModel->check_area($pin);
        $pin_data = json_decode(json_encode($pin_data), true);
        $area_data = json_decode(json_encode($area_data), true);

        $count = 0;
        $area_val = NULL;
        foreach ($area_data as $area) {
            if ($count) {
                $area_val = $area_val . "*";
            }
            $area_val = $area_val . "" . $area['area'];
            $count++;
        }

        // $service = 0;
        // $all_ads = $this->studentModel->get_ads();
        // foreach ($all_ads as $ad){
        // $adpin = explode(',', $ad->ad_pincodes);
        // foreach($adpin as $pin_cur){
        //     if($pin_cur == $pin){
        //         $service = 1;
        //     } 
        // }
        // }

        // $all_mds = $this->studentModel->get_mds();
        // foreach ($all_mds as $curmd){
        // $ads = explode(',', $curmd->ads);
        // foreach($ads as $ad){
        //     if($ad == $from_ad_id){
        //         $service = 2;
        //     } 

        // }
        // }


        // $all_rds = $this->studentModel->get_rds();
        // foreach ($all_rds as $currd){
        // $mds = explode(',', $currd->mds);
        // foreach($mds as $md){
        //     if($md == $from_md_id){
        //         $service = 3;
        //     } 
        // }
        // }


        // if($service == 0){
        //     $this->studentModel->add_nonpincode($pin);
        // }

        echo $pin_data['district'] . "," . $pin_data['state'] . "," . $area_val;
    }


    public function forgot_password()
    {

        $this->view('student/forgot_password');
    }
    public function forgot_password_mobile()
    {

        $this->view('student/forgot_password_mobile');
    }

    public function extract_first_question($id)
    {
        $_SESSION['current_quiz_id'] = $id;
        $get_single_quizes_in = $this->adminModel->get_single_quizes_in($id);
        foreach ($get_single_quizes_in as $quiz_detail) {
            $first_question_id = substr($quiz_detail->question, 0, strpos($quiz_detail->question, ','));
        }

        redirect('student/pick_quiz/' . $first_question_id);
    }

    public function get_subject_by_category()
    {
        $category = $_POST['category_id'];


        $get_subject_from_category = $this->adminModel->get_subject_from_quiz_category($category);

        echo "<option value=''>--Select-- </option>";

        foreach ($get_subject_from_category as $detail) {
            $get_school_subject = $this->adminModel->get_school_subject($detail->subject_name);
            echo "<option value=$detail->subject_name>$get_school_subject->subject_name</option>";
        }
    }
    public function update_password()
    {

        $phno = $_POST['phone'];
        $pass = $_POST['password'];

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        if ($this->studentModel->update_password($phno, $pass)) {
            redirect('student/login');
        } else {
            redirect('student/forgot_password');
        }
    }
  public function update_password_mobile()
    {

        $phno = $_POST['phone'];
        $pass = $_POST['password'];

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        if ($this->studentModel->update_password($phno, $pass)) {
            // redirect('student/login');
            $externalLink = 'https://learn.oodlesin.com/sso_client/login_initiate';

                        // Perform a redirection
                        header('Location: ' . $externalLink);
                        exit;
        } else {
            redirect('student/forgot_password_mobile');
        }
    }

    public function rankings()
    {
        $get_current_student = $this->studentModel->get_current_student();

        $student_academic_type = substr(($get_current_student->academic_name), 0, 1);
        $academic_name = substr($get_current_student->academic_name, 1);
        $student_state = $get_current_student->comm_state;

        $student_course = $get_current_student->course;

        $quiz_ranking_country_wise = $this->studentModel->quiz_ranking_country_wise();
        $quiz_ranking_state_wise  = $this->studentModel->quiz_ranking_state_wise($student_state);
        $quiz_ranking_course_wise  = $this->studentModel->quiz_ranking_course_wise($student_course);
        if ($student_academic_type == 1) {
            $student_school = $academic_name;
            $quiz_ranking_academic_wise  = $this->studentModel->quiz_ranking_school_wise($student_school);
        } elseif ($student_academic_type == 2) {
            $student_college = $academic_name;
            $quiz_ranking_academic_wise  = $this->studentModel->quiz_ranking_college_wise($student_college);
        }
        $data = [

            'quiz_ranking_course_wise' => $quiz_ranking_course_wise,
            'quiz_ranking_country_wise' => $quiz_ranking_country_wise,
            'quiz_ranking_state_wise' => $quiz_ranking_state_wise,
            'get_current_student' => $get_current_student,
            'quiz_ranking_academic_wise ' => $quiz_ranking_academic_wise,
        ];
        $this->view('student/rankings', $data);
    }

    public function ranking()
    {
        $get_current_student = $this->studentModel->get_current_student();
        $get_auth_detail = $this->studentModel->get_auth_detail();
        $class_id = $get_auth_detail->class;
        if (!empty($get_current_student)) {
            if (!empty($get_current_student->academic_name)) {
                $student_academic_type = substr(($get_current_student->academic_name), 0, 1);
                $academic_name = substr($get_current_student->academic_name, 1);
            } else {
                $student_academic_type = 0;
                $academic_name = 0;
            }
            if (!empty($get_current_student->comm_state)) {
                $student_state = $get_current_student->comm_state;
            } else {
                $student_state = "0";
            }
        } else {
            $student_academic_type = 0;
            $academic_name = 0;
            $student_state = "0";
        }
        // echo $student_academic_type;
        // die();




        $getWallet = $this->studentModel->getWallet();
        $quiz_ranking_country_wise_by_class = $this->studentModel->quiz_ranking_country_wise_from_quiz_score($class_id);
        $quiz_ranking_state_wise_by_class  = $this->studentModel->quiz_ranking_state_wise_from_quiz_score($student_state, $class_id, $academic_name);
        $quiz_ranking_course_wise_by_class  = $this->studentModel->quiz_ranking_course_wise_from_quiz_score($class_id, $student_academic_type, $academic_name);

        $data = [
            'get_wallet' => $getWallet,
            'quiz_ranking_country_wise' => $quiz_ranking_country_wise_by_class,
            'quiz_ranking_state_wise' => $quiz_ranking_state_wise_by_class,
            'get_current_student' => $get_current_student,

            'quiz_ranking_course_wise' => $quiz_ranking_course_wise_by_class,
        ];
        $this->view('student/ranking', $data);
    }



    public function check_phone_live()
    {

        $phone = $_POST['phn'];
        $check = $this->pageModel->findUserByphno($phone);
        if ($check) {

            echo "0";
        } else {
            echo "1";
        }
    }
    public function check_email_live()
    {

        $email = $_POST['email'];
        $check = $this->pageModel->findUserByemail($email);
        if ($check) {
            echo "0";
        } else {
            echo "1";
        }
    }

    public function pick_quiz()
    {
        $get_single_question = $this->adminModel->get_single_question($_SESSION['current_quiz_id']);
        $data = [
            'id' => $_SESSION['current_quiz_id'],
            'get_single_question' => $get_single_question,
        ];
        $this->view('student/pick_quiz', $data);
    }

    public function winnings($id)
    {
        $get_quiz_detail = $this->studentModel->get_quiz_detail($id);
        $data = [
            'get_quiz_detail' => $get_quiz_detail,
        ];
        $this->view('student/winnings', $data);
    }
    public function quiz()
    {
        // if (!isset($_POST['select_category'])) {
        //     $select_category = 1;
        // } else {
        //     $select_category = $_POST['select_category'];

        // }
        if (!isset($_POST['subject_name'])) {
            $subject = 0;
        } else {
            $subject = $_POST['subject_name'];
        }
        $select_category = $_POST['select_category'];
        // echo $select_category;
        // echo "<br>";
        // echo $subject;
        // die();
        $all_subject_under_quiz_category = $this->adminModel->get_subject_from_quiz_category($select_category);
        // $subject = $_POST['subject_name'];
        $get_all_subject = $this->adminModel->get_all_subject();
        $get_all_quiz =  $this->studentModel->get_quiz_for_category_and_subject($select_category, $subject);
        $get_current_student = $this->studentModel->get_current_student();
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_active_class();
        $data = [
            'get_all_subject' => $get_all_subject,
            'all_subject' => $all_subject_under_quiz_category,
            'get_current_quiz_type' => $select_category,
            'get_current_quiz_subject' => $subject,
            'get_all_quiz' => $get_all_quiz,
            'get_school_detail' => $get_school_detail,
            'get_all_class' => $get_all_class,
            'get_current_student' => $get_current_student,
        ];
        $this->view('student/quiz', $data);
    }
    public function all_quiz($type, $category, $subject)
    {

        if (isset($_SESSION['rexkod_oodles_quiz_play_session'])) {
            unset($_SESSION['rexkod_oodles_quiz_play_session']);
        }
        if (isset($_SESSION['rexkod_oodles_quiz_preregister'])) {
            unset($_SESSION['rexkod_oodles_quiz_preregister']);
        }

        if (isset($_SESSION['low_balance_quiz'])) {
            unset($_SESSION['low_balance_quiz']);
        }
        $get_auth_detail = $this->studentModel->get_auth_detail();
        $class_id = $get_auth_detail->class;

        // here there is 2 type: oodles quiz and school_wise_quiz
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
        $all_subject_under_quiz_category = $this->studentModel->get_subject_from_quiz_category($category, $class_id);
        // $subject = $_POST['subject_name'];
        $get_all_subject = $this->adminModel->get_all_subject();
        if ($type == 1) {
            // echo 'dfdfdf';
            // die();
            $get_count_of_practice_quiz = $this->studentModel->get_count_of_quiz_created_by_admin(1, 1);
            $practice_quiz_count = count($get_count_of_practice_quiz);
            $get_count_of_merit_quiz = $this->studentModel->get_count_of_quiz_created_by_admin(2, 1);
            $merit_quiz_count = count($get_count_of_merit_quiz);
            $get_count_of_speed_quiz = $this->studentModel->get_count_of_quiz_created_by_admin(3, 1);
            $speed_quiz_count = count($get_count_of_speed_quiz);
            $get_count_of_contest_quiz = $this->studentModel->get_count_of_quiz_created_by_admin(4, 1);
            $contest_quiz_count = count($get_count_of_contest_quiz);

            $get_all_quiz =  $this->studentModel->get_quiz_for_category_and_subject_and_class($category, $subject);
        } elseif ($type == 2) {
            $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
            $counting_flag = 0;
            if (isset($get_student_detail)) {
                if (isset($get_student_detail->academic_name)) {
                    if (($get_student_detail->academic_name != 0) && ($get_student_detail->academic_name != Null)) {
                        $academic_type = substr(($get_student_detail->academic_name), 0, 1);
                        // check here blunder, substr 1
                        $academic_name = substr($get_student_detail->academic_name, 1);

                        if ($academic_type == 1) {
                            $counting_flag = 1;
                            $get_all_quiz =  $this->studentModel->get_all_selected_school_quiz($category, $subject, $academic_name);
                            $get_count_of_practice_quiz = $this->studentModel->get_count_of_quiz_not_created_by_admin(1, $academic_name);
                            $practice_quiz_count = count($get_count_of_practice_quiz);
                            $get_count_of_merit_quiz = $this->studentModel->get_count_of_quiz_not_created_by_admin(2, $academic_name);
                            $merit_quiz_count = count($get_count_of_merit_quiz);
                            $get_count_of_speed_quiz = $this->studentModel->get_count_of_quiz_not_created_by_admin(3, $academic_name);
                            $speed_quiz_count = count($get_count_of_speed_quiz);
                            $get_count_of_contest_quiz = $this->studentModel->get_count_of_quiz_not_created_by_admin(4, $academic_name);
                            $contest_quiz_count = count($get_count_of_contest_quiz);
                        }
                    }
                }
            }
            if ($counting_flag == 0) {
                $practice_quiz_count = 0;
                $merit_quiz_count = 0;
                $speed_quiz_count = 0;
                $contest_quiz_count = 0;
            }
        } else {
            $practice_quiz_count = 0;
            $merit_quiz_count = 0;
            $speed_quiz_count = 0;
            $contest_quiz_count = 0;
        }



        $get_current_student = $this->studentModel->get_current_student();
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_active_class();


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
            'get_current_student' => $get_current_student,
            'category' => $category,
            'type' => $type,
        ];
        $this->view('student/all_quiz', $data);
    }

    public function explore_answers()
    {
        $this->view('student/explore_answers');
    }
    public function explore_graph()
    {
        $this->view('student/explore_graph');
    }
    public function add_student_data_for_quiz()
    {
        $student_id = $_SESSION['rexkod_oodles_student_id'];
        $school_name = $_POST['school'];
        $class_name = $_POST['class'];
        $academic_type = 1;
        $quiz_id = $_POST['quiz_id']; //comning from jquery

        $data = [
            'student_id' => $student_id,
            'school_name' => $school_name,
            'class_name' => $class_name,
            'academic_type' => $academic_type,
        ];
        // $check = date("Y-m-d");
        $get_quiz_detail = $this->quizModel->get_single_quizes_ind($quiz_id);
        // if (max($quiz_id->start_date,$check) == min($quiz_id->end_date,$check)) {
        $flag = 1;
        // }else{
        //    
        // $flag=0;
        // }
        if ($flag == 1) {
            $add_student = $this->homeModel->add_student($data);
            if ($add_student) {
                $quiz_school = $get_quiz_detail->school_name;
                $quiz_class = $get_quiz_detail->class_name;
                $quiz_cost = $get_quiz_detail->quiz_cost;
                // if ((($quiz_school == $school_name) && ($quiz_class == $class_name)) || (($quiz_school == 0 && $quiz_class == 0))) {
                if ($get_quiz_detail->category == 2) {
                    $debit_money  = $this->studentModel->debit_money($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
                } elseif ($get_quiz_detail->category == 3) {
                    $debit_money  = $this->studentModel->debit_money_for_quiz($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
                } elseif ($get_quiz_detail->category == 4) {
                    $debit_money  = $this->studentModel->debit_money($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
                } elseif ($get_quiz_detail->category == 1) {
                    $check_quiz_pass_status = $this->studentModel->check_quiz_pass_status($quiz_id);
                    if (isset($check_quiz_pass_status)) {
                        $debit_money  = true;
                    } else {
                        $debit_money  = $this->studentModel->debit_money_for_practice_quiz($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
                    }
                }

                if ($debit_money) {
                    redirect('quiz/index/' . $quiz_id);
                } else {
                    $_SESSION['success'] = "Balance Low";
                    redirect('student/quiz');
                }
            } else {
                $_SESSION['success'] = "Error Occured";
                redirect('student/quiz');
            }
        } else {
            $_SESSION['success'] = "Quizes Validity has been expired";
            redirect('student/quiz');
        }
    }
    public function update_student_data_for_quiz()
    {
        $student_id = $_SESSION['rexkod_oodles_student_id'];
        $school_name = $_POST['school'];
        $class_name = $_POST['class'];
        $quiz_id = $_POST['quiz_id'];


        $academic_type = 1;
        $data = [
            'student_id' => $student_id,
            'school_name' => $school_name,
            'class_name' => $class_name,
            'academic_type' => $academic_type,

        ];
        $add_student = $this->homeModel->update_student($data);
        if ($add_student) {
            $get_quiz_detail = $this->quizModel->get_single_quizes_ind($quiz_id);
            $quiz_school = $get_quiz_detail->school_name;
            $quiz_class = $get_quiz_detail->class_name;
            $quiz_cost = $get_quiz_detail->quiz_cost;


            // if ((($quiz_school == $school_name) && ($quiz_class == $class_name)) || (($quiz_school == 0 && $quiz_class == 0))) {
            if ($get_quiz_detail->category == 2) {
                $debit_money  = $this->studentModel->debit_money($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
            } elseif ($get_quiz_detail->category == 3) {
                $debit_money  = $this->studentModel->debit_money_for_quiz($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
            } elseif ($get_quiz_detail->category == 4) {
                $debit_money  = $this->studentModel->debit_money($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
            } elseif ($get_quiz_detail->category == 1) {
                $check_quiz_pass_status = $this->studentModel->check_quiz_pass_status($quiz_id);
                if (!empty($check_quiz_pass_status)) {
                    $debit_money  = true;
                } else {

                    $debit_money  = $this->studentModel->debit_money_for_practice_quiz($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
                }
            }
            if ($debit_money) {
                redirect('quiz/index/' . $quiz_id);
            } else {
                $_SESSION['success'] = "Balance Low";
                redirect('student/quiz');
            }

            // } else {
            //     $_SESSION['success'] = "User Not Permitted for this Quiz";
            //     redirect('student/quiz');
            // }
        } else {
            $_SESSION['success'] = "Balance Low";
            redirect('student/quiz');
        }
    }

    public function take_quiz($id)
    {
       
        $token = uniqid();
        // echo $token;
        // die();

        $student_id = $_SESSION['rexkod_oodles_student_id'];

        $quiz_id = $id;
        $get_quiz_detail = $this->quizModel->get_single_quizes_ind($quiz_id);
        // if($get_quiz_detail->category == 4){
        //     $end_time = $get_quiz_detail->end_time;
        //     $end_time = strtotime($get_quiz_detail->end_time);
        //     $extended_end_time = strtotime('+5 minutes', $end_time);

        //     if ($extended_end_time < time()) {
        //        $add_coin_flag = 0;
        //        $reason = "invalid";
        //     }else{
        //         $reason = "normal";
        //     }

        //     $_SESSION['success'] = "Quiz timeout.";
        //         redirect('student/my_quizes');
        // }

        $quiz_cost = $get_quiz_detail->quiz_cost;
        $quiz_category = $get_quiz_detail->category;

        if ($get_quiz_detail->category == 2) {
            $debit_money  = $this->studentModel->debit_money_for_practice_quiz($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
        } elseif ($get_quiz_detail->category == 3) {
            $debit_money  = $this->studentModel->debit_money_for_practice_quiz($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
        } elseif ($get_quiz_detail->category == 4) {

            if ($this->studentModel->get_contest_reg_quiz_status($quiz_id)) {
                // echo 'dfdf';
                // die();
                $_SESSION['success'] = "Quiz already taken. Please wait for the result.";
                redirect('student/my_quizes');
                die();
            } else {
                // echo 'd222222fdf';
                // die();
                $debit_money  = true;
            }
            // $contest_prize = $this->adminModel->get_contest_prize_calculations($get_quiz_detail->prize_calc_data_id);
            // $quiz_cost = $contest_prize->entry_fee;
            // $debit_money  = $this->studentModel->debit_money($contest_prize->entry_fee, 'debited_by_quiz', 5, $quiz_id);
        } elseif ($get_quiz_detail->category == 1) {
            $count = 0;
            $check_quiz_pass_status = $this->studentModel->check_quiz_pass_status($quiz_id);
            foreach ($check_quiz_pass_status as $check_pass_status) {
                $count++;
            }

            if ($count > 0) {
                $debit_money  = true;
            } else {
                $debit_money  = $this->studentModel->debit_money_for_practice_quiz($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
            }
        }

        if ($debit_money) {
            $_SESSION['quiz_playing_flag'] = 1;

            redirect('quiz/index/' . $quiz_id . '/' . $token);
        } else {

            $_SESSION['success'] = "Balance Low";
            $_SESSION['low_balance_quiz'] = $quiz_id;

            redirect('student/pay1/' . $quiz_cost);
            // redirect('student/all_quiz/' . '1/'.$quiz_category . '/'.$get_quiz_detail->subject_name);
        }
    }
    public function retake_test($quiz_id)
    {
        $get_count = $this->studentModel->get_no_of_attempt($quiz_id);
        $get_quiz_detail = $this->quizModel->get_single_quizes_ind($quiz_id);
        if (($get_count < $get_quiz_detail->attempt) || $get_quiz_detail->attempt == 0) {

            $quiz_cost = $get_quiz_detail->quiz_cost;
            if ($get_quiz_detail->category == 2) {
                $debit_money  = $this->studentModel->debit_money($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
            } elseif ($get_quiz_detail->category == 3) {
                $debit_money  = $this->studentModel->debit_money_for_quiz($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
            } elseif ($get_quiz_detail->category == 4) {
                $debit_money  = $this->studentModel->debit_money($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
            } elseif ($get_quiz_detail->category == 1) {
                // This checks whether they have been pass or fail in the practice quiz.
                // If they already cleared the test, then we wont take the money from them.
                $check_quiz_pass_status = $this->studentModel->check_quiz_pass_status($quiz_id);
                if (isset($check_quiz_pass_status)) {
                    $debit_money  = true;
                } else {
                    $debit_money  = $this->studentModel->debit_money_for_practice_quiz($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
                }
            }
            if ($debit_money) {
                redirect('quiz/index/' . $quiz_id);
            } else {
                $_SESSION['success'] = "Balance Low";
                redirect('quiz/thank_you');
            }
        } else {
            $_SESSION['success'] = "Attempts Finished";
            redirect('quiz/thank_you');
        }
    }
    public function next_test($quiz_id)
    {
        $get_count = $this->studentModel->get_no_of_attempt($quiz_id);
        $get_quiz_detail = $this->quizModel->get_single_quizes_ind($quiz_id);
        if (($get_count < $get_quiz_detail->attempt) || $get_quiz_detail->attempt == 0) {

            $quiz_cost = $get_quiz_detail->quiz_cost;
            if ($get_quiz_detail->category == 2) {
                $debit_money  = $this->studentModel->debit_money($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
            } elseif ($get_quiz_detail->category == 3) {
                $debit_money  = $this->studentModel->debit_money_for_quiz($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
            } elseif ($get_quiz_detail->category == 4) {
                $debit_money  = $this->studentModel->debit_money($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
            } elseif ($get_quiz_detail->category == 1) {
                $debit_money  = $this->studentModel->debit_money_for_practice_quiz($quiz_cost, 'debited_by_quiz', 5, $quiz_id);
            }
            if ($debit_money) {
                redirect('quiz/index/' . $quiz_id);
            } else {
                $_SESSION['success'] = "Balance Low";
                redirect('quiz/thank_you');
            }
        } else {
            $_SESSION['success'] = "Attempts Finished";
            redirect('quiz/thank_you');
        }
    }
    public function quiz_submit($test)
    {
        $get_single_quizes_in = $this->adminModel->get_single_quizes_in($_SESSION['current_quiz_id']);
        foreach ($get_single_quizes_in as $quiz_detail) {
            $all_question_id = explode(',', ($quiz_detail->question));
        }

        if ($_POST['radio'] == NULL) {
            $quiz_val = 0;
        } else {
            $quiz_val = $_POST['radio'];
        }
        $_SESSION['switch_off_modal'] = 1;
        $_SESSION['get_single_question' . $test] = $quiz_val;
        $key = array_search($test, $all_question_id);
        $next_test = $all_question_id[$key + 1];
        $length_of_array = sizeof($all_question_id);
        if ($key < $length_of_array - 1) {
            redirect('student/pick_quiz/' . $next_test);
        } else {
            redirect('student/quiz_result');
        }
    }
    // public function quiz_result()
    // {
    //     $total_result = 0;
    //     $get_current_quiz_detail = $this->adminModel->get_single_quizes_i($_SESSION['current_quiz_id']);

    //     $chars = $get_current_quiz_detail->question;
    //     $array = explode(',', $chars);
    //     foreach ($array as $value) {
    //         $total_result = ($total_result . $_SESSION['get_single_question' . $value] . ",");
    //     }

    //     $add_result =  $this->studentModel->add_result($total_result);




    //     if ($add_result) {

    //         foreach ($array as $value) {
    //             unset ($_SESSION['get_single_question' . $value]);
    //         }
    //         unset($_SESSION['switch_off_modal']);
    //         unset($_SESSION['current_quiz_id']);
    //          redirect('student/index');
    //         }
    // }


    public function exportProductDatabase($productResult)
    {

        $timestamp = time();
        $filename = 'Export_excel_' . $timestamp . '.xls';

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");

        $isPrintHeader = false;

        foreach ($productResult as $file) {
            $result = [];
            array_walk_recursive($file, function ($item) use (&$result) {
                $result[] = $item;
            });
            // fputcsv($output, $result);



            // foreach ($productResult as $row) {
            if (!$isPrintHeader) {
                echo implode("\t", array_keys($result)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($result)) . "\n";
        }
        exit();
    }

    public function ranking_new()
    {
        $this->view('student/ranking_new');
    }




    public function contest_prize_detail($quiz_id, $id)
    {


        $contest_prize_calculation = $this->adminModel->get_contest_prize_calculations($id);
        $get_total_count_of_registration = $this->adminModel->get_contest_registration($quiz_id);
        $count_of_quiz_registration = count($get_total_count_of_registration);
        $get_quiz_particpation_fee = $contest_prize_calculation->entry_fee;
        $get_amount_registered_for_quiz = $get_quiz_particpation_fee * $count_of_quiz_registration;
        $get_quiz_detail = $this->adminModel->get_all_quizes_id($quiz_id);

        $contest_prize_calculation_final = $this->adminModel->get_contest_prize_calculations_final($quiz_id);



        $data = [
            'contest_prize_calculation' => $contest_prize_calculation,
            'get_amount_registered_for_quiz' => $get_amount_registered_for_quiz,
            'get_quiz_detail' => $get_quiz_detail,
            'count_of_quiz_registration' => $count_of_quiz_registration,

            'contest_prize_calculation_final' => $contest_prize_calculation_final,

        ];

        $this->view('student/contest_prize_detail',  $data);
    }

    public function start_play_now_session_quiz($quiz_id)
    {
        $_SESSION['rexkod_oodles_quiz_play_session'] = $quiz_id;
        redirect('student/login');
    }

    public function initiate_session_for_preregister($quiz_id)
    {
        $_SESSION['rexkod_oodles_quiz_preregister'] = $quiz_id;
        $get_quiz_detail = $this->adminModel->get_quiz_detail($quiz_id);
        $category = $get_quiz_detail->category;
        $subject     = $get_quiz_detail->subject_name;

        // redirect('student/add_profile');
        redirect('student/all_quiz/1/' . $category . '/' . $subject);
    }


    public function initiate_contest_registration($quiz_id)
    {
        if (isset($_SESSION['low_balance_quiz'])) {
            unset($_SESSION['low_balance_quiz']);
        }

        $get_quiz_detail = $this->quizModel->get_single_quizes_ind($quiz_id);
        $get_contest_registration_detail = $this->studentModel->get_contest_registration_detail($quiz_id, $_SESSION['rexkod_oodles_student_id']);
        if (($get_contest_registration_detail) == null) {
            $quiz_cost = $get_quiz_detail->quiz_cost;
            $quiz_category = $get_quiz_detail->category;
            $contest_prize = $this->adminModel->get_contest_prize_calculations($get_quiz_detail->prize_calc_data_id);
            $quiz_cost = $contest_prize->entry_fee;
            $txnid = "Db / Q-" . $quiz_id;
            $debit_money  = $this->studentModel->debit_money($contest_prize->entry_fee, $txnid, 15, $quiz_id);

            if ($debit_money) {
                $_SESSION['success'] = "Registration for the quiz is successfull. Thank you!";

                $initiate_contest_registration = $this->studentModel->initiate_contest_registration($quiz_id);
                redirect('student/my_quizes');
            } else {

                $_SESSION['success'] = "Balance Low";
                $_SESSION['low_balance_quiz'] = $quiz_id;

                redirect('student/pay1/' . $quiz_cost);

                // redirect('student/all_quiz/' . '1/'.$quiz_category . '/'.$get_quiz_detail->subject_name);
            }
        } else {
            $_SESSION['success'] = "Several attempts to register has been made. Already registered";
            redirect('student/my_quizes');
        }
    }

    public function my_quizes()
    {
        $get_current_student = $this->studentModel->get_current_student();
        $get_my_quizes = $this->studentModel->get_my_registered_quizes();
        $data = [
            'get_my_quizes' => $get_my_quizes,
            'get_current_student' => $get_current_student,
        ];
        $this->view('student/my_quizes', $data);
    }

    public function contest_winning_amount_transactions()
    {
        $get_winning_amount_transactions = $this->studentModel->get_winning_amount_transactions();
        $data = [
            'get_winning_amount_transactions' => $get_winning_amount_transactions,
        ];
        $this->view('student/contest_winning_amount_transactions', $data);
    }

    public function generate_detail($id)
    {
        // echo $id;
        // die();
        $_SESSION['nav'] = "add_quiz";

        $get_all_quiz = $this->adminModel->get_all_quizes_id($id);
        $get_quiz_score = $this->adminModel->get_particular_quiz_result_for_quiz_id($id);
        $get_quiz_detail = $this->studentModel->get_quiz_detail($id);
        $get_total_count_of_registration = $this->adminModel->get_contest_registration($id);
        $count_of_quiz_registration = count($get_total_count_of_registration);
        $contest_prize_calculation = $this->adminModel->get_contest_prize_calculations($get_all_quiz->prize_calc_data_id);
        $get_quiz_particpation_fee = $contest_prize_calculation->entry_fee;
        $get_amount_registered_for_quiz = $get_quiz_particpation_fee * $count_of_quiz_registration;
        $data = [
            'get_all_quiz' => $get_all_quiz,
            'get_quiz_score' => $get_quiz_score,
            'get_quiz_detail' => $get_quiz_detail,
            'count_of_quiz_registration' => $count_of_quiz_registration,
            'contest_prize_calculation' => $contest_prize_calculation,
            'get_amount_registered_for_quiz' => $get_amount_registered_for_quiz,
        ];

        $this->view('student/generate_detail',  $data);
    }

    public function submit_criteria_answers($id)
    {
        $answers = array();
        $student_detail = $this->studentModel->get_current_student();
        $basic_flag = $student_detail->basic_flag;
        $check_scholarship_application_presence = $this->studentModel->get_scholarship_application($id);
        if (isset($check_scholarship_application_presence)) {
            $scholarship_id = $id;
            $scholarship_detail  = $this->adminModel->get_ind_scholarship($scholarship_id);
            $array = explode(',', $scholarship_detail->criteria);
            $flag = 1;
            foreach ($array as $criteria_id) {
                $get_criteria_detail = $this->studentModel->get_criteria_detail($criteria_id);
                $student_class = $_SESSION['rexkod_oodles_student_class'];
                if ($get_criteria_detail->criteria_type == 1 && $student_class == $get_criteria_detail->class) {
                    if (isset($_POST[$criteria_id])) {
                        $toggle_answer = 1;
                        $answers[$criteria_id] = $toggle_answer;
                    } else {
                        $toggle_answer = 0;
                        $answers[$criteria_id] = $toggle_answer;
                    }
                    if ($toggle_answer != $get_criteria_detail->yes_no_based) {
                        $flag = 0;
                        $_SESSION['success'] = "You are not eligible for this scholarship!";
                        // redirect('student/scholarship/' . $id);
                    } else {
                        // $answer = implode(',', array($toggle_answer));
                        $answer[] = $toggle_answer;
                    }
                }

                if ($get_criteria_detail->criteria_type == 2 && $student_class == $get_criteria_detail->class) {
                    $answers[$criteria_id] =  $_POST[$criteria_id];
                    $check = $_POST[$criteria_id];
                    $startDate = $get_criteria_detail->start_date;
                    $endDate = $get_criteria_detail->end_date;

                    if (max($startDate, $check) == min($endDate, $check)) {
                        $date_valid = 1;
                    } else {
                        $date_valid = 0;
                    }
                    if ($date_valid == 0) {
                        $flag = 0;
                        $_SESSION['success'] = "Your are not eligible for this scholarship!";
                        // redirect('student/scholarship/' . $id);
                    } else {
                        // $answer = implode(',', array($check));
                        $answer[] = $check;
                    }
                }

                if ($get_criteria_detail->criteria_type == 3 && $student_class == $get_criteria_detail->class) {
                    $answers[$criteria_id] =  $_POST[$criteria_id];
                    $check = $_POST[$criteria_id];
                    $start_range = $get_criteria_detail->start_range;
                    $end_range = $get_criteria_detail->end_range;
                    if ((($start_range < $check) && ($end_range > $check)) || (($start_range > $check) && ($end_range < $check))) {
                        $check_range = 1;
                    } else {
                        $check_range = 0;
                    }
                    if ($check_range == 0) {
                        $flag = 0;
                        $_SESSION['success'] = "You are not eligible for this scholarship!";
                        // redirect('student/scholarship/' . $id);

                    } else {
                        // $answer = implode(',', array($check));
                        $answer[] = $check;
                    }
                }
            }

            // $criteria_answer = implode(',', $answer);
            // submit elgiblity test result, (for both , pass and failed)
            $answers = json_encode($answers);
            // echo gettype($answers);
            // die();
            $student_id  = $_SESSION['rexkod_oodles_student_id'];
            $url = 1;   //1 is given for student controller, by default 0 is for home controller
            $submit_scholarship_eligibility = $this->studentModel->submit_scholarship_eligibility($scholarship_id, $student_id, $answers, $flag, $url);
            // Flag has been given for emergency if the above conditions on failing also move forward.
            if ($flag == 1) {

                if ($basic_flag == 0) {
                    $_SESSION['success'] = 'Congrats, You are eligible for this Scholarship. Please complete basic profile to add the documents';
                    redirect('student/scholarship/' . $id);
                } else {
                    $_SESSION['success'] = 'Congrats, You are eligible for this Scholarship.Please upload documents for verfication';
                    redirect('student/scholarship/' . $id);
                }
            } elseif ($flag == 0) {
                $_SESSION['success'] = "You are not eligible for this scholarship!";
                redirect('student/scholarship/' . $id);
            }
        } else {
            $_SESSION['success'] = 'You are already eligible, please upload documents for verification!';
            redirect('student/scholarship/' . $id);
        }
    }

    public function faq()
    {
        $get_all_faqs = $this->adminModel->get_active_faqs();
        $data = [
            'get_all_faqs' => $get_all_faqs,
        ];
        $this->view('student/faq', $data);
    }

    public function resume()
    {
        $this->view('student/resume');
    }
    public function find_matched_scholarship()
    {
        $scholarship_id = $_POST['id'];
        $scholarship = $this->studentModel->get_scholarship_detail($scholarship_id);


        echo '<div class="col-lg-12 col-md-12 col-12 col-sm-12">';
        echo '<div class="card tab2-card">';
        echo '<div class="card-header" style="background-color:orange;">';
        echo '<h5>' . $scholarship->name . '</h5>';
        echo '</div>';
        echo '<div class="row">';
        echo '<div class="col-lg-4 col-md-4 col-sm-4">';
        echo '<div class="thumb-center">';
        echo '<a href="' . URLROOT . '/student/scholarship/' . $scholarship->id . '"><button type="button" class="btn btn-circle btn-default" style="margin-top:15px;">View Details</button></a><br>';
        echo '<a href="' . URLROOT . '/student/all_scholarships"><button type="button" class="btn btn-circle btn-success" style="margin-top:20px;">Apply Now</button></a>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-lg-8 col-md-8 col-8 col-sm-8">';
        echo '<div class="thumb-center"></div>';
        echo '<div class="course-box">';
        echo '<div class="row">';
        echo '<div class="col-lg-6">';
        echo '<h4 style="font-weight:bold;">Eligibility</h4>';
        echo '</div>';
        echo '<div class="col-lg-6">';
        echo '<p style="color:blue;font-size:16px;text-decoration: underline;margin-top:15px;"><i class="material-icons f-left" style="font-size: 16px;">today</i>Deadline: ' . $scholarship->end_date . '</p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="text-muted"><span class="m-r-10">' . $scholarship->name . '</span></div>';
        echo '<p><span><i class="fa fa-graduation-cap"></i> Benefits: ' . $scholarship->course . '.</span></p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    // =============================================ashutosh====================================================

    public function resume2($student_id) {

        $student_details = $this->studentModel->get_student_detail($student_id);
        $data = [
            'student_id' => $student_id,
            'student_details' => $student_details,
        ];
        $this->view('student/resume2',$data);
    }
    public function submit_scholarship_document2($id)
    {
        $student_detail = $this->studentModel->get_current_student();
        // The below line check if there profile_details arent fulfulled, dont let them do the payment
        $scholarship_detail  = $this->adminModel->get_ind_scholarship($id);
        $scholarship_charge = $scholarship_detail->student_charge;
        $txnid = "Db / S-" . $id;
        // $debit_money  = $this->studentModel->debit_money_for_scholarship($scholarship_charge, $txnid, 19, $id);

        $basic_flag = $student_detail->basic_flag;  // check profile details is filled or not
        if (1) {


            if ($basic_flag == 1) {
                // echo "tdf";
                $check_scholarship_application_presence = $this->studentModel->get_scholarship_application($id);
                if (empty($check_scholarship_application_presence->documents)) {

                    $scholarship_id = $id;
                    $scholarship_detail  = $this->adminModel->get_ind_scholarship($scholarship_id);
                    $scholarship_name = $scholarship_detail->name;
                    $array = explode(',', $scholarship_detail->documents_required);
                    $flag = 0;
                    $document_ids = '';
                    $student_class = $_SESSION['rexkod_oodles_student_class'];
                    $final_document_submit  = '';
                    foreach ($array as $document) {
                        // $get_document_detail = $this->studentModel->get_scholarship_document_detail($document);

                        $document_ids .= $document . ",";
                        // $document_submit[] = $_POST[$document_id];
                        if (!empty($_FILES[$document]['name'])) {
                            $f_name = $_FILES[$document]['name'];
                            $f_temp = $_FILES[$document]['tmp_name'];
                            $size = $_FILES[$document]['size'];
                            $f_extension = explode('.', $f_name);
                            $f_extension = strtolower(end($f_extension));
                            $f_newfile = uniqid() . '.' . $f_extension;
                            $store = "uploads/" . $f_newfile;
                            move_uploaded_file($f_temp, $store);
                            $store = "uploads/";
                            $document_submit = $f_newfile;
                        } else {
                            $document_submit = null;
                        }


                        if (empty($final_document_submit)) {
                            $final_document_submit = $document_submit;
                        } else {
                            $final_document_submit .= "," . $document_submit;
                        }
                        // Remove extra comma at the end if any

                    }
                    if (isset($final_document_submit)) {
                        $final_document_submit = rtrim($final_document_submit, ",");
                    }
                    $document_ids = rtrim($document_ids, ",");

                    $insert_scholarship_application_document = $this->studentModel->insert_scholarship_application_document($final_document_submit, $scholarship_id, $document_ids);
                    if ($insert_scholarship_application_document) {
                        $message = "Documents are under verification for " . $scholarship_name . "  Scholarship.";
                        $add_notification = $this->studentModel->add_notifications($_SESSION['rexkod_oodles_student_id'], $message);
                        $_SESSION['success'] = 'Documents are under verification. Wait until next notifications. Meanwhile complete the rest of the profile';
                        redirect('student/scholarship/' . $id);
                    } else {
                        $_SESSION['success'] = 'We are trying to find the error';
                        redirect('student/scholarship/' . $id);
                    }
                } else {
                    $_SESSION['success'] = 'We have already collected your documents, verification is still in progress';
                    redirect('student/scholarship/' . $id);
                }
            } else {
                $_SESSION['success'] = 'Please complete basic profile to add the documents';
                redirect('student/scholarship/' . $id);
            }
        } else {
            $_SESSION['success'] = 'Payment Not Done';
            $_SESSION['scholarship_payment'] = $id;

            redirect('student/pay1/' . $scholarship_charge);
        }
    }
    public function scholarship_pay()
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

        $this->view('student/scholarship_payment', $data);
    }

    // ==========================subcription payment(new) and api integration of edugarrila============================
    public function subscription_pay($amount, $package_id)
    {
        $api = new Api(RPKID, RPKS);

        $razorpayOrder = $api->order->create(array(
            'receipt'         => rand(),
            'amount'          => $amount * 100, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' =>  1
        ));


        $amount = $razorpayOrder['amount'];

        $razorpayOrderId = $razorpayOrder['id'];

        $_SESSION['razorpay_order_id'] = $razorpayOrderId;
        $_SESSION['package_id'] = $package_id;


        $data = $this->prepareData($amount, $razorpayOrderId);

        $this->view('student/rezorpay_subscription', $data);
    }
      /**
     * This function verifies the payment,after successfull payment
     */
    public function subscription_verify($amount)
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
            if($_SESSION['package_id']){

            redirect('student/activate_edugorilla_package/' . $_SESSION['package_id']);
            unset($_SESSION['package_id']);
            }
            unset($_SESSION['order_type']);
            // redirect('student/add_money/' . $amount . '/' . $_SESSION['razorpay_order_id']);
        } else {
            redirect('student/error');
        }
    }
    public function activate_edugorilla_package($package_id){

        $get_current_student = $this->studentModel->get_current_student();
        $image_url = URLROOT."/". "uploads/". $get_current_student->student_image ;

        $url="https://learn.oodlesin.com/sso_client/api/v1/activate_package";
        $data = [
            "product_id" => (int)$package_id,
            "user_info" =>[
                "name" => $_SESSION['rexkod_oodles_student_name'],
                "email" => $_SESSION['rexkod_oodles_student_email'],
                "phone" =>$_SESSION['rexkod_oodles_student_phone'],
                "picture" => $image_url
            ]
        
        ];
        $data = json_encode($data);
        $authenticationKey = '2f45dae103784dadb4354ae39fa0284e' ; 
        // Set up cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json', // Set the Content-Type header
            'Authorization: ' . $authenticationKey // Add the authentication key to the header
        ));
        // Execute the request
$response = curl_exec($ch);

$response = json_decode($response);
// print_r($response);
if($response->status == true){
//    echo $response->transaction_id;
    $transaction_id = $response->transaction_id;
    $msg =  $response->msg;
    $status = $response->status;
$edugorilla_package_response = $this->studentModel->edugorilla_package_response($transaction_id,$msg,$status,$package_id);
redirect('student/index');
$_SESSION['success'] = $response->msg;

}
else{
    $transaction_id = null;
    $msg =  $response->msg;
    $status = $response->status;
$edugorilla_package_response = $this->studentModel->edugorilla_package_response($transaction_id,$msg,$status,$package_id);
redirect('student/index');
$_SESSION['success'] = $response->msg;
}

    }





    // ==================send a message with link to download the app ================= 

    public function send_app_link($phone)
    {
        // $oodlesIn = $_SESSION['rexkod_oodles_student_name'];

        $app_url = "https://play.google.com/store/apps/details?id=com.app.testseries.oodlesin";
        $otp = 5555;

        $url = "https://manage.smssolutions.in/smsapi/index?key=4634FEEA7A5F49&campaign=0&routeid=16&type=text&contacts=+91" . $phone . "&senderid=OODLES&msg=Your%20one%20time%20password%20is%20" . $otp . ".to%20sign%20to%20your%20account%20OodlesIN";


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 40,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
        ));

        function url($url)
        {
            $result = parse_url($url);
        }
        curl_exec($curl);
        curl_close($curl);
    }
}
