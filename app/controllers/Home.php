<?php
require_once(APPROOT . "/libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;

class Home extends Controller
{

    public function __construct()
    {
        $this->adminModel = $this->model('Admins');
        $this->pageModel = $this->model('Page');
        $this->studentModel = $this->model('Students');
        $this->homeModel = $this->model('Homes');
        $this->quizModel = $this->model('Quizes');
    }

    public function index()
    {

        // changed main_index to index in view file name
        // and index to index_old
        
        $_SESSION['rexkod_oodles_access_id'] = 1;
        $get_all_quizes = $this->adminModel->get_all_quizes();
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $quiz_ranking_country_wise = $this->studentModel->quiz_ranking_country_wise();
        $data = [
            'get_all_quizes' => $get_all_quizes,
            'get_school_detail' => $get_school_detail,
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
            'quiz_ranking_country_wise'=> $quiz_ranking_country_wise,
        ];
        if (isset($_SESSION['rexkod_oodles_access_id'])) {

            $this->view('home/index',$data);
        } else {
            $_SESSION['success'] = "Please enter correct password... ";
            redirect('home/login',$data);
        }
        $this->view('home/index',$data);
    }

    public function login_access()
    {
        $pass = $_POST['passcode'];
        if ($pass == '2022') {
            $_SESSION['rexkod_oodles_access_id'] = '1';
            redirect('home/index');
        } else {
            $_SESSION['success'] = "Please enter correct password... ";
            $this->view('home/login');
        }
    }

    public function home_user_login($url1, $url2)
    {
        $url = $url1 . '/' . $url2;
        //  echo strlen($url);
        // die();
        if (!isset($_POST['username'])) {

            redirect($url);
        } else {

            if (!isset($_POST['password'])) {
                $_SESSION['success'] = "Enter Password";
                redirect($url);
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
                    redirect($url);
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
                        redirect($url);
                    } else {
                        if ($user->type == "student") {
                            $_SESSION['rexkod_oodles_student_id'] = $user->id;
                            $_SESSION['rexkod_oodles_student_name'] = $user->name;
                            $_SESSION['rexkod_oodles_student_email'] = $user->email;
                            $_SESSION['rexkod_oodles_student_phone'] = $user->phone;
                            $_SESSION['rexkod_oodles_login_type'] = $user->type;

                            // redirect('student/index');
                            $user_detail = $this->studentModel->get_current_student();
                            //                  if(empty($user_detail)){
                            //     redirect('student/add_profile');
                            // }else{
                            redirect($url);
                            // }
                        } else {

                            $_SESSION['success'] = "You do not have access!";
                            redirect($url);
                        }
                    }
                }
            }
        }
    }
    public function webinar_login($id)
    {

        if (!isset($_POST['username'])) {

            $this->view('home/ind_webinar');
        } else {

            if (!isset($_POST['password'])) {
                $_SESSION['success'] = "Enter Password";
                $this->view('home/ind_webinar');
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
                    $this->view('home/ind_webinar');
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
                        $this->view('home/ind_webinar');
                    } else {
                        if ($user->type == "student") {
                            $_SESSION['rexkod_oodles_student_id'] = $user->id;
                            $_SESSION['rexkod_oodles_student_name'] = $user->name;
                            $_SESSION['rexkod_oodles_student_email'] = $user->email;
                            $_SESSION['rexkod_oodles_student_phone'] = $user->phone;
                            $_SESSION['rexkod_oodles_login_type'] = $user->type;

                            // redirect('student/index');
                            $user_detail = $this->studentModel->get_current_student();
                            if (empty($user_detail)) {
                                redirect('student/add_profile');
                            } else {
                                redirect('home/ind_webinar/' . $id);
                            }
                        } else {

                            $_SESSION['success'] = "You do not have access!";
                            redirect('home/ind_webinar');
                        }
                    }
                }
            }
        }
    }
    public function college_login($id)
    {

        if (!isset($_POST['username'])) {

            redirect('home/ind_college/' . $id);
        } else {

            if (!isset($_POST['password'])) {
                $_SESSION['success'] = "Enter Password";
                redirect('home/ind_college/' . $id);
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
                    redirect('home/ind_college/' . $id);
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
                        redirect('home/ind_college/' . $id);
                    } else {
                        if ($user->type == "student") {
                            $_SESSION['rexkod_oodles_student_id'] = $user->id;
                            $_SESSION['rexkod_oodles_student_name'] = $user->name;
                            $_SESSION['rexkod_oodles_student_email'] = $user->email;
                            $_SESSION['rexkod_oodles_student_phone'] = $user->phone;
                            $_SESSION['rexkod_oodles_login_type'] = $user->type;

                            // redirect('student/index');
                            $user_detail = $this->studentModel->get_current_student();
                            if (empty($user_detail)) {
                                redirect('student/add_profile');
                            } else {
                                redirect('home/ind_college/' . $id);
                            }
                        } else {

                            $_SESSION['success'] = "You do not have access!";
                            redirect('home/ind_college/' . $id);
                        }
                    }
                }
            }
        }
    }
    public function school_login($id)
    {

        if (!isset($_POST['username'])) {

            redirect('home/ind_school/' . $id);
        } else {

            if (!isset($_POST['password'])) {
                $_SESSION['success'] = "Enter Password";
                redirect('home/ind_school/' . $id);
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
                    redirect('home/ind_school/' . $id);
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
                        redirect('home/ind_school/' . $id);
                    } else {
                        if ($user->type == "student") {
                            $_SESSION['rexkod_oodles_student_id'] = $user->id;
                            $_SESSION['rexkod_oodles_student_name'] = $user->name;
                            $_SESSION['rexkod_oodles_student_email'] = $user->email;
                            $_SESSION['rexkod_oodles_student_phone'] = $user->phone;
                            $_SESSION['rexkod_oodles_login_type'] = $user->type;

                            // redirect('student/index');
                            $user_detail = $this->studentModel->get_current_student();
                            if (empty($user_detail)) {
                                redirect('student/add_profile');
                            } else {
                                redirect('home/ind_school/' . $id);
                            }
                        } else {

                            $_SESSION['success'] = "You do not have access!";
                            redirect('home/ind_school/' . $id);
                        }
                    }
                }
            }
        }
    }


    public function index3()
    {
        $this->view('home/index3');
    }

    public function contact()
    {
        $this->view('home/contact');
    }

    public function ways_to_give()
    {
        $_SESSION['nav'] = "finance";
        $this->view('home/ways_to_give');
    }
    public function individual_donor()
    {
        $_SESSION['nav'] = "finance";
        $this->view('home/individual_donor');
    }

    public function about()
    {
        $this->view('home/about');
    }

    public function colleges1()
    {
        $this->view('home/colleges1');
    }

    public function tests()
    {
        $this->view('home/tests');
    }

    public function quizes()
    {
        $get_all_quizes = $this->adminModel->get_all_quizes();
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $data = [
            'get_all_quizes' => $get_all_quizes,
            'get_school_detail' => $get_school_detail,
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
        ];


        $this->view('home/quizes', $data);
    }

    public function filter_quiz()
    {
        $class = $_POST['class'];
        $contest = $_POST['contest'];
        $merit = $_POST['merit'];
        $practice = $_POST['practice'];
        $speed = $_POST['speed'];
    }
    public function quiz($category,$class)
    {
        // 1-practice
        // 2-merit
        // 3-speed
        // 4-contest
// echo $class;
// die();
        if(isset($_POST['classes']) ){
            // echo "22";
            // die();
            $class = $_POST['classes'];
            // $subject = $_POST['subject'];
            // echo $subject;
            // die();
            $category = $_POST['category'];
            // $get_quiz = $this->homeModel->get_quiz_by_class_and_subject($class,$subject,$category);
            $get_quiz = $this->homeModel->get_quiz_by_class($class,$category);
            // print_r($get_quiz);
            // die();
            // echo (count($get_quiz));
            // die();
        }else{
            $get_quiz = Null;
        }
        if($class == 'all'){
        //  echo $class;
        //  echo $category;
        //  die();
            $get_quiz = $this->homeModel->get_all_quizes($category);
        }
     
        if($class === 'all'){
            //  echo $class;
            //  echo $category;
            //  die();
                $get_quiz = $this->homeModel->get_all_quizes($category);
            }
        
        if (isset($_POST['practice'])) {
            $category = 1;
        } elseif (isset($_POST['merit'])) {
            $category = 2;
        } elseif (isset($_POST['speed'])) {
            $category = 3;
        } elseif (isset($_POST['contest'])) {
            $category = 4;
        }
        $get_all_class = $this->adminModel->get_all_active_class();
        $get_total_chapter = $this->adminModel->get_all_chapter();
        $get_all_chapter = $this->homeModel->get_chapter_related_to_quiz($class, $category);
        $get_all_subject = $this->homeModel->get_subject_related_to_quiz($class, $category);
        $data = [
            'class' => $class,
            'get_all_class' => $get_all_class,
            'category' => $category,
            'get_total_chapter' => $get_total_chapter,
            'get_all_chapter' => $get_all_chapter,
            'get_all_subject' => $get_all_subject,
            'get_quiz' => $get_quiz,
        ];

        $this->view('home/quiz', $data);
    }


    public function quiz2($category)
    {
        if (isset($_POST['practice'])) {
            $category = 1;
        } elseif (isset($_POST['merit'])) {
            $category = 2;
        } elseif (isset($_POST['speed'])) {
            $category = 3;
        } elseif (isset($_POST['contest'])) {
            $category = 4;
        }
        
        $get_all_class = $this->adminModel->get_all_active_class();
        $get_all_quiz_by_category=$this->homeModel->get_all_quiz_by_category($category);
        $data = [
            'get_all_class' => $get_all_class,
            'category' => $category,
            'get_all_quiz_by_category'=>$get_all_quiz_by_category,
        ];
        $this->view('home/quiz2', $data);   
    }

    public function get_subject_by_class()
    {
       
        $class=$_POST['classes'];
        $category=$_POST['category'];
        // $get_all_subject = $this->homeModel->get_subject_related_to_quiz($class, $category);
        $get_all_subject = $this->adminModel->get_subject_through_class($class);
      // $this->view('pages/devices');
      foreach ($get_all_subject as $subject) {
        # code...
        // $get_subject_name = $this->$adminModel->get_single_subject($subject->subject_name);

        echo '<option value="' . $subject->id . '">' . $subject->subject_name . '</option>';
      }
      
    // print_r ($get_all_subject);
    }
    

    public function filter_quiz2($category)
    {
        // if (isset($_POST['classes'])){
        //     $classes = $_POST['classes'];
        //     $get_all_subject = $this->homeModel->get_subject_related_to_quiz($classes, $category);
        // }

        $classes = $_POST['classes'];
        $get_all_subject = $this->homeModel->get_subject_related_to_quiz($classes, $category);
        $get_all_class = $this->adminModel->get_all_active_class();
        // echo "hii";
        // print_r($get_all_subject);
        // die();
        $data = [
            'get_all_class' => $get_all_class,
            'category' => $category,
            'get_all_subject'=>$get_all_subject,
        ];
        $this->view('home/filter_quiz', $data);
    }



    public function scholarships()
    {
        $get_all_scholarship = $this->adminModel->get_all_scholarship();
        $get_scholarship_type = $this->adminModel->get_scholarship_type();
        $data = [
            'get_all_scholarship' => $get_all_scholarship,
            'get_scholarship_type' => $get_scholarship_type,
        ];
        $this->view('home/scholarships', $data);
    }
    public function corporate_wise_scholarship()
    {
        // $get_all_scholarship_detail = $this->adminModel->get_all_scholarship_by_id();
        // $data = [
        //     'get_all_scholarship' => $get_all_scholarship_detail,
        // ];
   
        $this->view('home/corporate_wise_scholarship');
    }

    public function scholarship($id)
    {
        $get_all_scholarship_detail = $this->adminModel->get_all_scholarship_by_id($id);
        $data = [
            'get_all_scholarship' => $get_all_scholarship_detail,
        ];
        $_SESSION['nav'] = "scholarship";
        $this->view('home/scholarship', $data);
    }


    public function college($id)
    {
        $get_college_detail_single = $this->adminModel->get_college_detail_single($id);
        $data = [
            'get_all_college' => $get_college_detail_single,
        ];
        $_SESSION['nav'] = "college";
        $this->view('home/college', $data);
    }

    public function ind_college($id)
    {
        $get_college_detail_single = $this->adminModel->get_college_detail_single($id);
        $get_rating_college = $this->homeModel->get_rating_college($id);
        $data = [
            'get_all_college' => $get_college_detail_single,
            'get_rating_college' => $get_rating_college,
        ];
        $_SESSION['nav'] = "ind_college";
        $this->view('home/ind_college', $data);
    }

    public function school($id)
    {
        $get_school_detail_single = $this->adminModel->get_school_detail_single($id);
        $data = [
            'get_all_school' => $get_school_detail_single,
        ];
        $_SESSION['nav'] = "school";
        $this->view('home/school', $data);
    }
    public function ind_school($id)
    {
        $get_school_detail = $this->adminModel->get_school_detail_ind($id);

        $get_rating_school = $this->homeModel->get_rating_school($id);

        $data = [
            'get_school_detail' => $get_school_detail,
            'get_rating_school' => $get_rating_school,
        ];
        $_SESSION['nav'] = "school";
        $this->view('home/ind_school', $data);
    }


    public function term_condition()
    {
        $this->view('home/term_condition');
    }
    public function privacy_policy()
    {
        $this->view('home/privacy_policy');
    }
    public function faq()
    {
        $this->view('home/faq');
    }
    public function faq_copy()
    {
        $this->view('home/faq_copy');
    }


    public function school_profile()
    {
        $this->view('home/school_profile');
    }


    public function schools()
    {
        $school_detail = $this->adminModel->get_school_detail();

        $get_school_type = $this->adminModel->get_school_type();
        $get_school_type_limit = $this->adminModel->get_school_type_limit();
        $data = [
            'get_school_detail' => $school_detail,
            'get_school_type' => $get_school_type,
            'get_school_type_limit' => $get_school_type_limit,
        ];
        $_SESSION['nav'] = "school";
        $this->view('home/schools', $data);
    }
    public function all_colleges()
    {
        $college_detail = $this->adminModel->get_college_detail();
        $get_college_course = $this->adminModel->get_college_course();
        $data = [
            'get_college_detail' => $college_detail,
            'get_college_course' => $get_college_course,
        ];
        $_SESSION['nav'] = "all_colleges";
        $this->view('home/all_colleges', $data);
    }
    public function all_college($id)
    {
        $college_detail = $this->adminModel->get_college_detail();
        $get_college_type_detail = $this->adminModel->get_college_course_detail($id);
        $get_all_college = $this->adminModel->get_all_college_by_course($id);
        $data = [
            'get_college_detail' => $college_detail,
            'get_college_type_detail' => $get_college_type_detail,
            'get_all_college' => $get_all_college,
        ];
        $_SESSION['nav'] = "all_college";
        $this->view('home/all_college', $data);
    }
    public function all_schools()
    {
        // <option value="1">Pre School</option>
        // <option value="2">Primary School</option>
        // <option value="3">Higher Secondary School</option>
        $school_detail = $this->adminModel->get_school_detail();
        $get_school_type = $this->adminModel->get_school_type();
        $data = [
            'get_school_detail' => $school_detail,
            'get_school_type' => $get_school_type,
        ];
        $_SESSION['nav'] = "all_schools";
        $this->view('home/all_schools', $data);
    }
    public function all_school($id)
    {
        $get_school_from_category = $this->adminModel->get_school_from_category($id);
        $data = [

            'get_all_school' => $get_school_from_category,
        ];
        $_SESSION['nav'] = "all_school";
        $this->view('home/all_school', $data);
    }
    public function filter_schools()
    {
        $state_name = $_POST['state'];
        $curriculum = $_POST['school_type'];
        $affiliation_board = $_POST['affiliation_board'];
        $subtype = $_POST['subtype'];
        $filter_school_detail = $this->homeModel->get_filter_school_details($state_name, $curriculum, $affiliation_board, $subtype);
        $get_school_type = $this->adminModel->get_school_type();

        $data = [
            'get_school_detail' => $filter_school_detail,
            'get_school_type' => $get_school_type,
        ];
        $this->view('home/filter_schools', $data);
    }
    public function filter_colleges()
    {
        $state_name = $_POST['state'];
        // $college_type = $_POST['college_type'];
        $filter_college_detail = $this->homeModel->get_filter_college_details($state_name);

        $get_college_course = $this->adminModel->get_college_course();
        $get_college_course_limit = $this->adminModel->get_college_course_limit();

        $data = [
            'get_college_detail' => $filter_college_detail,
            'get_college_course' => $get_college_course,
            'get_college_course_limit' => $get_college_course_limit,
        ];
        $this->view('home/filter_colleges', $data);
    }
    public function filter_scholarships()
    {
        $state_name = $_POST['state'];
        $type = $_POST['type'];
        // $class = $_POST['class'];
        $filter_scholarship_detail = $this->homeModel->get_filter_scholarship_details($state_name, $type);

        $get_scholarship_type = $this->adminModel->get_scholarship_type();

        $data = [
            'get_scholarship_detail' => $filter_scholarship_detail,
            'get_scholarship_type' => $get_scholarship_type,
        ];
        $this->view('home/filter_scholarships', $data);
    }
    public function filter_quizes()
    {
        $school = $_POST['school'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $filter_quiz_detail = $this->homeModel->get_filter_quizes_details($school, $class, $subject);

        $data = [
            'get_quiz_detail' => $filter_quiz_detail,
            'get_school_detail' => $get_school_detail,
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
        ];





        $this->view('home/filter_quizes', $data);
    }
    public function rating_college($id)
    {
        $rating1 = $_POST['rating'];
        $rating = implode(', ', $rating1);
        $get_rating_college = $this->homeModel->get_rating_college($id);
        if (!empty($get_rating_college)) {
            if ($get_rating_college->college_id == $id) {
                $total_rating = $get_rating_college->rating;
                $total_rating += $rating;
                $count = $get_rating_college->count;
                $count += 1;
                $submit_rating = $this->homeModel->update_rating_college($id, $total_rating, $count);
            }
        } else {
            $total_rating = $rating;
            $submit_rating = $this->homeModel->rating_college($id, $total_rating);
        }


        if ($submit_rating) {
            redirect('home/ind_college/' . $id);
        }
    }


    public function guidelines()
    {
        $this->view('home/guidelines');
    }

    public function disclaimer()
    {
        $this->view('home/disclaimer');
    }


    // public function rating_school($id){
    //     $rating1 = $_POST['rating'];
    //     $rating = implode(', ', $rating1);
    //    $get_rating_school =$this->homeModel->get_rating_school($id);
    //    if(!empty($get_rating_school)){
    //     if($get_rating_school->school_id == $id){
    //         $total_rating = $get_rating_school->rating;
    //         $total_rating +=$rating;
    //         $count = $get_rating_school->count;
    //         $count +=1;
    //         $submit_rating = $this->homeModel->update_rating_school($id,$total_rating,$count);
    //        }
    //    }
    //   else{
    //     $total_rating = $rating;
    //     $submit_rating = $this->homeModel->rating_school($id,$total_rating);
    //    }


    //    if($submit_rating){
    //     redirect('home/ind_school/'.$id);
    //    }
    // }

    public function rating($user_id, $college_id)
    {
        $review_academic = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_academic_' . $i])) {
                $review_academic = $i;
                break;
            }
        }

        $review_accomodation = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_accomodation_' . $i])) {
                $review_accomodation = $i;
                break;
            }
        }

        $review_faculty = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_faculty_' . $i])) {
                $review_faculty = $i;
                break;
            }
        }

        $review_infrastructure = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_infrastructure_' . $i])) {
                $review_infrastructure = $i;
                break;
            }
        }

        $review_placement = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_placement_' . $i])) {
                $review_placement = $i;
                break;
            }
        }

        $review_social = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_social_' . $i])) {
                $review_social = $i;
                break;
            }
        }

        $review_course = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_course_' . $i])) {
                $review_course = $i;
                break;
            }
        }

        $review_campus = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_campus_' . $i])) {
                $review_campus = $i;
                break;
            }
        }

        $review = $_POST['review'];
        $add_rating_college = $this->homeModel->add_rating_college($review_academic, $review_accomodation, $review_campus, $review_course, $review_faculty, $review_infrastructure, $review_placement, $review_social, $review, $user_id, $college_id);
        if ($add_rating_college) {
            $_SESSION['success'] = "Thank you for your valuable response!";
            redirect('home/ind_college/' . $college_id);
        } else {

            $_SESSION['success'] = "Status Not Updated";
            redirect('admin/scholarship_application');
        }
    }
    public function rating_school($user_id, $school_id)
    {
        $review_academic = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_academic_' . $i])) {
                $review_academic = $i;
                break;
            }
        }


        $review_faculty = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_faculty_' . $i])) {
                $review_faculty = $i;
                break;
            }
        }

        $review_infrastructure = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_infrastructure_' . $i])) {
                $review_infrastructure = $i;
                break;
            }
        }



        $review_nonacademic = Null;
        for ($i = 10; $i > 0; $i--) {
            if (isset($_POST['review_nonacademic_' . $i])) {
                $review_nonacademic = $i;
                break;
            }
        }

        $review = $_POST['review'];
        $add_rating_school = $this->homeModel->add_rating_school($review_academic, $review_faculty, $review_infrastructure, $review_nonacademic, $review, $user_id, $school_id);
        if ($add_rating_school) {
            $_SESSION['success'] = "Thank you for your valuable response!";
            redirect('home/ind_school/' . $school_id);
        } else {

            $_SESSION['success'] = "Status Not Updated";
            redirect('home/ind_school/' . $school_id);
        }
    }
    public function colleges()
    {
        $college_detail = $this->adminModel->get_college_detail();
        $get_college_course = $this->adminModel->get_college_course();
        $get_college_course_limit = $this->adminModel->get_college_course_limit();
        $data = [
            'get_college_detail' => $college_detail,
            'get_college_course' => $get_college_course,
            'get_college_course_limit' => $get_college_course_limit,
        ];
        $_SESSION['nav'] = "college";
        $this->view('home/colleges', $data);
    }
    public function webinar()
    {
        $get_all_webinars = $this->homeModel->get_all_webinars();
        $data = [
            'get_all_webinars' => $get_all_webinars,
        ];
        $this->view('home/webinar', $data);
    }
    public function ind_webinar($id)
    {
        $get_single_webinar = $this->homeModel->get_single_webinar($id);
        $data = [
            'get_single_webinar' => $get_single_webinar,
        ];
        $this->view('home/ind_webinar', $data);
    }
    public function corporate_sponser()
    {
        $this->view('home/corporate_sponser');
    }

    public function register_for_webinar($id)
    {
        $user_id = $_SESSION['rexkod_oodles_student_id'];
        $webinar_id = $id;

        $register_for_webinar = $this->homeModel->register_for_webinar($user_id, $webinar_id);
        if ($register_for_webinar) {
            $_SESSION['success'] = "Registered for Webinar Successfully";
            redirect('home/ind_webinar/' . $id);
        } else {

            $_SESSION['success'] = "Registeration Unsuccessful";
            redirect('home/ind_webinar/' . $id);
        }
    }
    public function logout()
    {
        session_destroy();
        setcookie('oodles', '', time() - 3600, "/", ".oodlesin.com");
        unset($_COOKIE['oodles']);
        unset($_COOKIE['eg_user']);
        setcookie('eg_user', null, time() - 3600, "/",".oodlesin.com");
        // redirect('home/index');

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
        redirect('home/index');
        
        
        }
                                            
    }
  

    public function login()
    {
        $this->view('home/login');
    }
    public function main_index()
    {
        // changed main_index to index in view file name
        // and index to index_old
        $this->view('home/main_index');
    }
    public function add_comment_home()
    {

        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'subject' => $_POST['subject'],
            'message' => $_POST['message'],
        ];
        $add_comment_home = $this->homeModel->add_comment_home($data);
        if ($add_comment_home) {
            $_SESSION['success'] = "Thank you! We will get back to you shortly. ";
            redirect('home/index');
        } else {
            $_SESSION['success'] = 'Comment Not Added';
            redirect('home/index');
        }
    }
    public function add_student()
    {
        $student_id = $_SESSION['rexkod_oodles_student_id'];
        $school_name = $_POST['school'];
        $class_name = $_POST['class'];
        $academic_type = 1;
        $quiz_id = $_POST['quiz_id'];
        $data = [
            'student_id' => $student_id,
            'school_name' => $school_name,
            'class_name' => $class_name,
            'academic_type' => $academic_type,

        ];
        $add_student = $this->homeModel->add_student($data);
        if ($add_student) {
            $get_quiz_detail = $this->quizModel->get_single_quizes_ind($quiz_id);
            $quiz_school = $get_quiz_detail->school_name;
            $quiz_class = $get_quiz_detail->class_name;
            if ((($quiz_school == $school_name) && ($quiz_class == $class_name)) || (($quiz_school == 0 && $quiz_class == 0))) {
                redirect('quiz/index/' . $quiz_id);
            } else {
                $_SESSION['success'] = "User Not Permitted for this Quiz";
                redirect('home/quizes');
            }
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('home/quizes');
        }
    }
    public function update_student()
    {
        $student_id = $_SESSION['rexkod_oodles_student_id'];
        $school_name = $_POST['school'];
        $class_name = $_POST['class'];
        $academic_type = 1;
        $quiz_id = $_POST['quiz_id'];
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

            // echo $quiz_id;
            // "</br>";
            // echo $school_name;
            // "<br>";
            // echo $quiz_id;
            // "<br>";
            // echo $class_name;
            // "<br>";
            // echo $quiz_class;
            // "<br>";
            // echo $quiz_school;
            // "<br>";

            // die();
            if ((($quiz_school == $school_name) && ($quiz_class == $class_name)) || (($quiz_school == 0 && $quiz_class == 0))) {
                redirect('quiz/index/' . $quiz_id);
            } else {
                $_SESSION['success'] = "User Not Permitted for this Quiz";
                redirect('home/quizes');
            }
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('home/quizes');
        }
    }

//==============================som========================

    public function all_scholarships()
    {
        // echo 'okk';
        // die;

        $get_all_scholarship = $this->adminModel->get_all_scholarship();
        $get_scholarship_type = $this->adminModel->get_scholarship_type();
        $data = [
            'get_all_scholarship' => $get_all_scholarship,
            'get_scholarship_type' => $get_scholarship_type,
        ];
        $this->view('home/all_scholarships', $data);
    }
    public function scholarship_detail($id)
    {
        // echo $id;
        // die;

        $get_all_scholarship_detail = $this->adminModel->get_all_scholarship_by_id($id);
        $data = [
            'get_all_scholarship' => $get_all_scholarship_detail,
        ];
        $this->view('home/scholarship_detail', $data);
    }



    public function scholarship_instructions($id)
    {
        // echo $id;
        // die;
        $scholarship_instruction = $this->adminModel->get_all_scholarship_by_id($id);
        $check_scholarship_eligibility_status =  $this->studentModel->check_scholarship_eligibility_status($id);

        $get_all_scholarship = $this->adminModel->get_all_scholarship();
        $get_all_scholarship_app = $this->studentModel->get_all_scholarship_app();
        $verify_student = $this->adminModel->verify_student();
        $get_all_scholarship_detail = $this->adminModel->get_all_scholarship_by_id($id);
        $get_single_scholarship = $this->adminModel->get_ind_scholarship($id);
       
        


   
        $data = [
            'check_scholarship_eligibility_status' => $check_scholarship_eligibility_status,
            'get_all_scholarship' => $get_all_scholarship_detail,
            // 'get_all_scholarship' => $get_all_scholarship,
            'get_all_scholarship_app' => $get_all_scholarship_app,
            'verify_student' => $verify_student,
            'get_single_scholarship' => $get_single_scholarship,


            'scholarship_instruction' => $scholarship_instruction,
            
        ];
        

        $this->view('home/scholarship_instructions', $data);
    }



    









    public function contest_pool($id)
    {
        // echo $id;
        // die();

        $contest_prize_calculation = $this->adminModel->get_contest_prize_calculations($id);

       
        $data = [
            'contest_prize_calculation' => $contest_prize_calculation
        ];

        $this->view('home/contest_pool',  $data);
    }


    public function get_prize_pool(){
        $id = $_POST['id'];
       
        $prize_pool_calculation = $this->adminModel->get_contest_prize_calculations($id);



        $html = '<table class="table mb-0">
        <thead>
            <tr>

                <th scope="col" class="ps-4">Rank</th>
                <th scope="col" class="text-end">Winnings</th>
            </tr>
        </thead>

        <tbody>';
        $i = 1;
        $count = 0;
        $level = 0;
        $contest_prize_data = json_decode($prize_pool_calculation->levels_data);
           
        $range_start = 1;
        $range_end = 0;

        foreach ($contest_prize_data as $prize_pool_cal) {

            // Check if this is the first three rows
            if ($prize_pool_cal->level_no <= 3) {
                $range_start = $range_end + 1;
                $range_end = $range_start;
                $class = 'table-danger'; // Add a different color to the first three rows
            } else {
                $range_start = $range_end + 1;
                $range_end = $range_start + $prize_pool_cal->no_of_winners - 1;
                $class = '';
            }
            
            $html .= '<tr>
                    <td class="' . $class . ' h5" style="height: 60px;"># ' . $range_start . (($range_start != $range_end) ? ' - ' . $range_end : '') . '</td>
                    <td style="text-align: end; height: 50px;" class="' . $class . ' h5">Rs. ' . $prize_pool_cal->individual_amount . '</td>
                </tr>';

        }
            
        $html .= '<tr>
                <td class="h5" style="height: 50px;">Total Prize Amount</td>
                <td style="text-align: end; height: 50px;" class="h5">Rs. ' . $prize_pool_calculation->prize_pool_amount . '</td>
            </tr>
        </tbody>
    </table>';

echo $html;
    }








// ----------------------

public function submit_criteria_answers($id)
    {
    // echo $_POST[2];
    // echo $_POST[5];
    // echo $_POST[4];
    // die();
    $check_scholarship_application_presence = $this->studentModel->get_scholarship_application($id);
    if (isset($check_scholarship_application_presence)) {
        $scholarship_id = $id;
        $scholarship_detail  = $this->adminModel->get_ind_scholarship($scholarship_id);
        $array = explode(',', $scholarship_detail->criteria);
        $flag = 1;
        foreach ($array as $criteria_id) {
            $get_criteria_detail = $this->studentModel->get_criteria_detail($criteria_id);
            $student_class=$_SESSION['rexkod_oodles_student_class'];
            if ($get_criteria_detail->criteria_type == 1 && $student_class==$get_criteria_detail->class) {
                if (isset($_POST[$criteria_id])) {
                    $toggle_answer = 1;
                    $answers[$criteria_id] =  $_POST[$criteria_id];
                } else {
                    $toggle_answer = 0;
                    $answers[$criteria_id] =  $_POST[$criteria_id];
                }
                // echo $toggle_answer;
                //     die();
                if ($toggle_answer != $get_criteria_detail->yes_no_based) {

                    $flag = 0;
                    $_SESSION['success'] = "Your are not eligible for this scholarship!";
                    redirect('home/scholarship_instructions/' .$id);
                } else {
                    // $answer = implode(',', array($toggle_answer));
                    $answer[] = $toggle_answer;

                }
            }

            if ($get_criteria_detail->criteria_type == 2 && $student_class==$get_criteria_detail->class) {
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
                    redirect('home/scholarship_instructions/'.$id);
                } else {
                    // $answer = implode(',', array($check));
                    $answer[] = $check;
                }
            }

            if ($get_criteria_detail->criteria_type == 3 && $student_class==$get_criteria_detail->class) {
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
                    redirect('home/scholarship_instructions/'.$id);
                } else {
                    // $answer = implode(',', array($check));
                    $answer[] = $check;

                }
            }
        }
        $criteria_answer = implode(',', $answer);
        $answers = json_encode($answers);
        $student_id  = $_SESSION['rexkod_oodles_student_id'];
        $url = 0;   //1 is given for student controller, by default 0 is for home controller
        $submit_scholarship_eligibility = $this->studentModel->submit_scholarship_eligibility($scholarship_id, $student_id, $answers, $flag, $url);
        // Flag has been given for emergency if the above conditions on failing also move forward.
        $student_detail = $this->studentModel->get_current_student();
        $basic_flag = $student_detail->basic_flag;
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
            redirect('home/scholarship_instructions/'.$id);
        }





    }


}




public function career_assesment_test(){
    $this->view('home/career_assesment_test');

}
public function ccp(){
    $this->view('home/ccp');
}
public function career_counsellor(){
    $this->view('home/career_counsellor');
}
public function career_counsellor2(){
    $this->view('home/career_counsellor2');
}
public function courses(){

    $this->view('home/courses');

}
public function programs(){

    $this->view('home/programs');

}
public function payment_details(){

    $this->view('home/payment_details');

}
public function payment_details2(){
    $start_date = $_POST['start_date'];
    $time = $_POST['time'];
    
    $data = [
        'start_date' => $start_date,
        'time' => $time,
    ];

    $this->view('home/payment_details2',$data);

}
public function payment_details3(){
    $start_date = $_POST['start_date'];
    $time = $_POST['time'];
    
    $data = [
        'start_date' => $start_date,
        'time' => $time,
    ];

    $this->view('home/payment_details3',$data);

}
public function additional_info(){

    $this->view('home/additional_info');

}
public function additional_info2(){

    $this->view('home/additional_info2');

}
//======================= counsellor =====================
public function payment_counsellor(){

    $courses = $this->homeModel->get_all_counsellor_courses();
    $data = [
        'courses' => $courses,
    ];
    $this->view('counsellor/payment_counsellor',$data);
}
public function counsellor_register_view(){
    $this->view('counsellor/register');
}
public function counsellor_index(){
    $this->view('counsellor/index');
}
public function counsellor_register(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $country = $_POST['country'];
        $postal_code = $_POST['postal_code'];


        $data = [
            'name' => $_POST['f_name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'password' => $_POST['password'],
        ];

        if (empty($email)) {
            $_SESSION['success'] = 'Please enter email';
            redirect('home/counsellor_register_view');
        } else if ($this->pageModel->findUserByemail($email)) {
            $_SESSION['success'] = 'Email already taken';
            redirect('home/counsellor_register_view');
        } else {


            if ($this->pageModel->findUserByphno($phone)) {
                $_SESSION['success'] = 'Phone number already taken';
                redirect('home/counsellor_register_view');
            } else {

                $pass = password_hash($password, PASSWORD_DEFAULT);
                if ($this->adminModel->create_counsellor($data, $pass)) {
                    $user = $this->pageModel->ulogin($email, $_POST['password']);
                    $_SESSION['rexkod_oodles_counsellor_id'] = $user->id;
                    // echo  $_SESSION['rexkod_oodles_counsellor_id'];
                    // die();
                    $_SESSION['rexkod_oodles_counsellor_name'] = $user->name;
                    $_SESSION['rexkod_oodles_counsellor_email'] = $user->email;
                    $_SESSION['rexkod_oodles_counsellor_phone'] = $user->phone;
                    $_SESSION['rexkod_login_type'] = $user->type;

                    $_SESSION['success'] = "Registered Successfully..! ";
                    redirect('home/payment_counsellor');
                } else {
                    $_SESSION['success'] = 'Registration Failed!';
                    redirect('home/counsellor_register_view');
                }
            }
        }
    } else {
        redirect('home/counsellor_register_view');
    }
}
public function counsellor_logout()
{
    session_destroy();
    redirect('home/ccp');
}
// public function counsellor_login_view(){
//     $this->view('counsellor/register');
// }
public function counsellor_login()
{

    if (!isset($_POST['username'])) {

        $this->view('counsellor/login');
    } else {

        if (!isset($_POST['password'])) {
            $_SESSION['success'] = "Enter Password";
            $this->view('counsellor/login');
        } else {
            $user = "";


            if (is_numeric($_POST['username'])) {
                $email_verify_phone = $this->pageModel->email_verify_phone($_POST['username']);
                if ($email_verify_phone->status == 0) {
                    // $_SESSION['success'] = "Please wait for the Approval from Admin!";
                    // $this->view('teacher/login');
                    redirect('home/counsellor_login');
                }
            } else {
                $check_email = $this->pageModel->email_verify($_POST['username']);
                if ($check_email->status == 0) {
                    // $_SESSION['success'] = "Please wait for the Approval from Admin!";
                    redirect('home/counsellor_login');
                }
            }
            
            if (empty($check_email) && empty($email_verify_phone)) {
                $_SESSION['success'] = "Invalid Username";
                $this->view('counsellor/login');
            }  else {
                if (!empty($check_email)) {
                    $user_results = $check_email;

                    $password_res = $check_email->password;
                }
                if (!empty($email_verify_phone)) {
                    $user_results = $email_verify_phone;

                    $password_res = $email_verify_phone->password;
                }


                if (password_verify($_POST['password'], $password_res)) {
                    $user = $user_results;
                } else {
                    $user = "";
                }
                if (empty($user)) {

                    $_SESSION['success'] = "Invalid Credential!";
                    $this->view('counsellor/login');
                } else {
                    if ($user->type == "counsellor") {
                        $_SESSION['rexkod_oodles_counsellor_id'] = $user->id;
                        $_SESSION['rexkod_oodles_counsellor_name'] = $user->name;
                        $_SESSION['rexkod_oodles_counsellor_email'] = $user->email;
                        $_SESSION['rexkod_oodles_counsellor_phone'] = $user->phone;
                        $_SESSION['rexkod_oodles_counsellor_login_type'] = $user->type;
                        redirect('home/payment_counsellor');
                    } else {

                        $_SESSION['success'] = "You do not have access!";
                        redirect('home/counsellor_login');
                    }
                }
            }
        }
    }
}


// ==============counsellor end===============
// ----------------------------payment for course------------------------------------
public function pay1()
    {
        $amount = $_POST['amount'];
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
                // "name"  => $_SESSION['rexkod_oodles_student_id'],
                // "email"  => $_SESSION['rexkod_oodles_student_email'],
                // "contact" => $_SESSION['rexkod_oodles_student_phone'],
                "name"  => "rex1",
                "email"  => "rex1@gmail.com",
                "contact" => "9066666482",
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


}
