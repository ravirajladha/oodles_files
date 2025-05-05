<?php
class Teacher extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admins');
        $this->pageModel = $this->model('Page');
        $this->studentModel = $this->model('Students');
        $this->teacherModel = $this->model('Teachers');
        $this->schoolModel = $this->model('Schools');
    }

    public function index()
    {

        // $_SESSION['nav'] = "home";

        if (isset($_SESSION['rexkod_oodles_teacher_id'])) {
            $this->view('teacher/index');
        } else {
            $this->view('teacher/login');
        }
    }



    public function register()
    {
        if (isset($_SESSION['rexkod_oodles_teacher_id'])) {

            redirect('teacher/index');
        } else {
            $get_school_detail  = $this->adminModel->get_school_detail();
            $data = [
                'get_school_detail' => $get_school_detail,
            ];
            $this->view('teacher/register', $data);
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
                redirect('teacher/register');
            } else if ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('teacher/register');
            } else {


                if ($this->pageModel->findUserByphno($phone)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('teacher/register');
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
                        redirect('teacher/index');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('teacher/register');
                    }
                }
            }
        } else {
            redirect('teacher/register');
        }
    }

    public function question_bank_pending()
    {
            $get_all_inactive_question = $this->teacherModel->get_rejected_pending_quiz_master();

        $data = [
            'get_all_inactive_question' => $get_all_inactive_question,
        ];
        $this->view('teacher/question_bank_pending', $data);
    }
    public function infographic()
    {
        $_SESSION['nav'] = "home";
        $this->view('teacher/infographic');
    }
    public function quiz_dash()
    {
        $_SESSION['nav'] = "home";
        $this->view('teacher/quiz_dash');
    }


    public function scholarship_dash()
    {
        $_SESSION['nav'] = "home";
        $this->view('teacher/scholarship_dash');
    }


    public function add_corporate()
    {
        $_SESSION['nav'] = "corporate";
        $this->view('teacher/add_corporate');
    }


    public function add_finance()
    {
        $_SESSION['nav'] = "finance";
        $this->view('teacher/add_finance');
    }


    public function add_question()
    {
        // $get_all_class = $this->adminModel->get_all_class();
        $get_teacher_detail = $this->teacherModel->get_teacher_detail();
        $get_all_subject = $this->adminModel->get_all_subject();
        $data = [
            // 'get_all_class' => $get_all_class,
            'get_teacher_detail' => $get_teacher_detail,
            'get_all_subject' => $get_all_subject,
        ];
        $_SESSION['nav'] = "question";
        $this->view('teacher/add_question', $data);
    }


    public function get_subject_class_name()
    {
        $class = $_POST['class_id'];

        $get_subject_from_class = $this->adminModel->get_subject_from_class($class);
        $get_teacher_detail = $this->teacherModel->get_teacher_detail();
        $subject = $get_teacher_detail->subject;

        echo "<option value=''>--Select-- </option>";
        $each_subject = explode(',', $subject);
        foreach ($each_subject as $key) {
            // foreach ($get_subject_from_class as $detail) {
            $get_school_subject = $this->adminModel->get_school_subject($key);
            echo "<option value=$key>$get_school_subject->subject_name</option>";
        }
    }

    public function add_question_while_quiz($id)
    {
        $get_teacher_detail = $this->teacherModel->get_teacher_detail();
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $data = [

            'get_teacher_detail' => $get_teacher_detail,
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
            'get_quiz_id' => $id,
        ];
        $_SESSION['nav'] = "question";
        $this->view('teacher/add_question_while_quiz', $data);
    }
    public function add_question_multi()
    {
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $get_all_topic = $this->adminModel->get_all_topic();
        $get_all_chapter = $this->adminModel->get_all_chapter();
        $data = [
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
            'get_all_topic' => $get_all_topic,
            'get_all_chapter' => $get_all_chapter,
        ];
        $_SESSION['nav'] = "question";
        $this->view('teacher/add_question_multi', $data);
    }

    public function add_question_beta()
    {
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $data = [
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
        ];
        $_SESSION['nav'] = "question";
        $this->view('teacher/add_question_beta', $data);
    }
    public function edit_question($id)
    {
        $get_single_quiz = $this->adminModel->get_single_question($id);
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();

        $data = [
            'get_single_question' => $get_single_quiz,
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
        ];
        $_SESSION['nav'] = "quiz";
        $this->view('teacher/edit_question', $data);
    }

    public function forgot_password()
    {
        $this->view('teacher/forgot_password');
    }
    public function update_password()
    {

        $phno = $_POST['phone'];
        $pass = $_POST['password'];

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        if ($this->studentModel->update_password($phno, $pass)) {
            redirect('teacher/login');
        } else {
            redirect('teacher/forgot_password');
        }
    }

    public function check_phone_live_and_school()
    {

        $phone = $_POST['phn'];
        $type = "teacher";
        $check = $this->pageModel->check_phone_and_type($phone, $type);
        if ($check) {

            echo "1";
        } else {
            echo "0";
        }
    }

    public function add_college()
    {
        $get_college_course = $this->adminModel->get_college_course();
        $data = [
            'get_college_course' => $get_college_course,
        ];
        $_SESSION['nav'] = "college";
        $this->view('teacher/add_college', $data);
    }
    public function add_college_course()
    {
        $_SESSION['nav'] = "college_course";
        $this->view('teacher/add_college_course');
    }
    public function add_school_type()
    {

        $_SESSION['nav'] = "school_type_image";
        $this->view('teacher/add_school_type');
    }
    public function add_scholarship_type()
    {

        $_SESSION['nav'] = "school_tolarship_image";
        $this->view('teacher/add_scholarship_type');
    }
    public function create_school_type()
    {
        $school_type = $_POST['school_type'];
        if (!empty($_FILES['school_type_image']['name'])) {
            $f_name = $_FILES['school_type_image']['name'];
            $f_temp = $_FILES['school_type_image']['tmp_name'];
            $size = $_FILES['school_type_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $school_type_image = $f_newfile;
        } else {
            $school_type_image = NULL;
        }
        $create_school_type = $this->adminModel->create_school_type($school_type, $school_type_image);
        if ($create_school_type) {
            $_SESSION['success'] = "School Type Added Successfully..! ";
            redirect('teacher/add_school_type');
        } else {
            $_SESSION['success'] = 'School Type Not Added';
            redirect('teacher/add_school_type');
        }
    }
    public function create_college_course()
    {
        $college_course = $_POST['college_course'];
        if (!empty($_FILES['college_course_image']['name'])) {
            $f_name = $_FILES['college_course_image']['name'];
            $f_temp = $_FILES['college_course_image']['tmp_name'];
            $size = $_FILES['college_course_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $college_course_image = $f_newfile;
        } else {
            $college_course_image = NULL;
        }
        $create_college_course = $this->adminModel->create_college_course($college_course, $college_course_image);
        if ($create_college_course) {
            $_SESSION['success'] = "College Course Added Successfully..! ";
            redirect('teacher/add_college_course');
        } else {
            $_SESSION['success'] = 'College Course Not Added';
            redirect('teacher/add_college_course');
        }
    }
    public function create_scholarship_type()
    {
        $scholarship_type = $_POST['scholarship_type'];
        if (!empty($_FILES['scholarship_type_image']['name'])) {
            $f_name = $_FILES['scholarship_type_image']['name'];
            $f_temp = $_FILES['scholarship_type_image']['tmp_name'];
            $size = $_FILES['scholarship_type_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $scholarship_type_image = $f_newfile;
        } else {
            $scholarship_type_image = NULL;
        }
        $create_scholarship_type = $this->adminModel->create_scholarship_type($scholarship_type, $scholarship_type_image);
        if ($create_scholarship_type) {
            $_SESSION['success'] = "Scholarship Type Added Successfully..! ";
            redirect('teacher/add_scholarship_type');
        } else {
            $_SESSION['success'] = 'Scholarship Type Not Added';
            redirect('teacher/add_scholarship_type');
        }
    }


    public function add_school()
    {
        $get_school_type = $this->adminModel->get_school_type();
        $data = [
            'get_school_type' => $get_school_type,
        ];
        $_SESSION['nav'] = "school";
        $this->view('teacher/add_school', $data);
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
        $this->view('teacher/update_school', $data);
    }

    public function add_class()
    {
        $get_all_school_class = $this->adminModel->get_all_school_class();
        $data = [
            'get_all_school_class' => $get_all_school_class,
        ];
        $_SESSION['nav'] = "school";
        $this->view('teacher/add_class', $data);
    }
    public function add_quiz_category()
    {
        $get_all_quiz_category = $this->adminModel->get_all_quiz_category();
        $data = [
            'get_all_quiz_category' => $get_all_quiz_category,
        ];
        $_SESSION['nav'] = "school";
        $this->view('teacher/add_quiz_category', $data);
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
        $this->view('teacher/edit_quiz_category', $data);
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
        $this->view('teacher/edit_class', $data);
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
        $this->view('teacher/edit_subject', $data);
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
        $this->view('teacher/add_subject', $data);
    }


    public function add_student()
    {
        $_SESSION['nav'] = "student";
        $this->view('teacher/add_student');
    }


    public function corporate()
    {
        $_SESSION['nav'] = "corporate";
        $this->view('teacher/corporate');
    }


    public function finance()
    {
        $_SESSION['nav'] = "finance";
        $this->view('teacher/finance');
    }


    public function finances()
    {
        $_SESSION['nav'] = "finance";
        $this->view('teacher/finances');
    }


    public function corporates()
    {
        $_SESSION['nav'] = "corporate";
        $this->view('teacher/corporates');
    }


    public function quiz()
    {
        $_SESSION['nav'] = "quiz";
        $this->view('teacher/quiz');
    }
    public function add_teacher()
    {
        $get_school_detail  = $this->adminModel->get_school_detail();
        $data = [
            'get_school_detail' => $get_school_detail,
        ];
        $_SESSION['nav'] = "quiz";
        $this->view('teacher/add_teacher', $data);
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
            redirect('teacher/add_teacher');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('teacher/add_teacher');
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
                    redirect('teacher/add_teacher');
                } else if ($this->pageModel->findUserByemail($email)) {
                    $_SESSION['success'] = 'Email already taken';
                    redirect('teacher/add_teacher');
                } else {


                    if ($this->pageModel->findUserByphno($phone)) {
                        $_SESSION['success'] = 'Phone number already taken';
                        redirect('teacher/add_teacher');
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
                            redirect('student/add_teacher');
                        } else {
                            $_SESSION['success'] = 'Registration Failed!';
                            redirect('teacher/add_teacher');
                        }
                    }
                }
            } else {
                redirect('teacher/add_teacher');
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
        $this->view('teacher/scholarship', $data);
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
        $this->view('teacher/add_scholarship', $data);
    }
    public function create_quiz_first()
    {
        $get_all_quiz_master = $this->adminModel->get_all_quiz_master();
        $get_teacher_detail = $this->teacherModel->get_teacher_detail();
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $get_all_quiz_category = $this->adminModel->get_all_quiz_category();
        $data = [
            'get_teacher_detail' => $get_teacher_detail,

            'get_all_quiz_master' => $get_all_quiz_master,
            'get_school_detail' => $get_school_detail,
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
            'get_all_quiz_category' => $get_all_quiz_category,
        ];
        $_SESSION['nav'] = "create_quiz_first";
        $this->view('teacher/create_quiz_first', $data);
    }
    public function create_quiz_second($id)
    {
        $get_teacher_detail = $this->teacherModel->get_teacher_detail();
        $get_all_quiz_master = $this->adminModel->get_all_quiz_master();
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $get_all_quiz_category = $this->adminModel->get_all_quiz_category();
        $get_current_quiz_detail = $this->adminModel->get_single_quizes_i($id);
        $subject_used_in_quiz = $get_current_quiz_detail->subject_name;
        $get_sub_subject = $this->adminModel->get_sub_subject_from_subject($subject_used_in_quiz);
        $data = [
            'get_teacher_detail' => $get_teacher_detail,
            'get_all_quiz_master' => $get_all_quiz_master,
            'get_school_detail' => $get_school_detail,
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
            'get_all_quiz_category' => $get_all_quiz_category,
            'get_sub_subject' => $get_sub_subject,
            'get_current_quiz_detail' => $get_current_quiz_detail,
        ];
        $_SESSION['nav'] = "create_quiz_second";
        $this->view('teacher/create_quiz_second', $data);
    }

    public function update_quiz_first($id)
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
        $this->view('teacher/update_quiz_first', $data);
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
        $this->view('teacher/edit_quiz', $data);
    }


    public function add_criteria()
    {

        $_SESSION['nav'] = "criteria";
        $this->view('teacher/add_criteria');
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
            redirect('teacher/add_scholarship');
        } else {
            $_SESSION['success'] = "Scholarship detail not Updated";
            redirect('teacher/add_scholarship');
        }
    }
    public function create_subject()
    {
        $subject_name = $_POST['subject_name'];
        $result = $this->adminModel->add_subject($subject_name);
        if ($result) {

            $_SESSION['success'] = "Subject added Successfully";
            redirect('teacher/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('teacher/add_subject');
        }
    }

    public function get_subject_chapter_name()
    {
        $subject_id = $_POST['subject_id'];
        $get_sub_subject_from_subject = $this->adminModel->get_sub_subject_from_subject($subject_id);
        echo "<option value=''>--Select-- </option>";
        foreach ($get_sub_subject_from_subject as $detail) {
            echo "<option value=$detail->id> $detail->name</option>";
        }
    }

    public function get_topic_chapter_wise()
    {
        $chapter_id = $_POST['chapter_id'];
        echo "<option value=''>--Select-- </option>";
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
            redirect('teacher/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('teacher/add_subject');
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
            redirect('teacher/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('teacher/add_subject');
        }
    }

    public function create_class()
    {
        $class_name = $_POST['class_name'];
        $result = $this->adminModel->add_class($class_name);
        if ($result) {

            $_SESSION['success'] = "Class added Successfully";
            redirect('teacher/add_class');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('teacher/add_class');
        }
    }
    public function create_quiz_category()
    {
        $category = $_POST['category'];
        $result = $this->adminModel->add_quiz_category($category);
        if ($result) {

            $_SESSION['success'] = "Category added Successfully";
            redirect('teacher/add_quiz_category');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('teacher/add_quiz_category');
        }
    }
    public function update_quiz_category($id)
    {

        $category = $_POST['category'];
        $result = $this->adminModel->update_quiz_category($category, $id);
        if ($result) {

            $_SESSION['success'] = "Category updated Successfully";
            redirect('teacher/edit_quiz_category/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('teacher/edit_quiz_category/' . $id);
        }
    }
    public function update_school_class($id)
    {

        $class_name = $_POST['class_name'];
        $result = $this->adminModel->update_school_class($class_name, $id);
        if ($result) {

            $_SESSION['success'] = "Class updated Successfully";
            redirect('teacher/edit_class/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('teacher/edit_class/' . $id);
        }
    }
    public function update_school_subject($id)
    {

        $subject_name = $_POST['subject_name'];
        $result = $this->adminModel->update_school_subject($subject_name, $id);
        if ($result) {

            $_SESSION['success'] = "subject updated Successfully";
            redirect('teacher/edit_subject/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('teacher/edit_subject/' . $id);
        }
    }
    public function review_quiz()
    {
        $last_quiz = $this->adminModel->last_added_quiz();
        $data = [
            'last_added_quiz' => $last_quiz,
        ];
        $this->view('teacher/review_quiz', $data);
    }
    public function view_quiz($id)
    {
        $get_quiz_detail = $this->adminModel->get_single_quizes($id);
        $data = [
            'get_quiz_detail' => $get_quiz_detail,
        ];
        $this->view('teacher/view_quiz', $data);
    }
    public function test1()
    {
        $this->view('teacher/test1');
    }
    public function add_quiz_first()
    {
        $get_teacher_detail = $this->teacherModel->get_teacher_detail();
        $school_id = $get_teacher_detail->school;
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
            'school_id' => $school_id,
        ];



        $get_school_wallet = $this->schoolModel->get_school_wallet($school_id);
        $today = date("Y-m-d");
        $get_premium_school_data = $this->schoolModel->get_premium_school_single_data($school_id);
        if ($get_school_wallet->quiz_balance > 0 && ($get_premium_school_data->start_date <= $today) && ($get_premium_school_data->end_date >= $today)  && ($get_school_wallet->status == 1)) {

            // $get_wallet_quiz_balance = $this->teacherModel->getWallet($school_id);
            // if ($get_wallet_quiz_balance->quiz_balance > 0) {
            //     $debit_quiz_balance = $this->teacherModel->debit_quiz_balance($school_id, 1);
            // }
            // if ($debit_quiz_balance) {

            $add_quiz_first = $this->teacherModel->add_quiz_first($data);

            if ($add_quiz_first) {

                $last_added_quiz = $this->adminModel->last_added_quiz();
                $current_quiz_id = $last_added_quiz->id;
                $data = [
                    'last_added_quiz' => $last_added_quiz,
                ];
                // $_SESSION['success'] = "Your Total Coin left: ".($get_wallet_quiz_balance->quiz_balance)-1;
                $_SESSION['success'] = "Proceed to the further part of the quiz";
                redirect('teacher/create_quiz_second/' . $current_quiz_id, $data);
            } else {
                $_SESSION['success'] = "Error occured";
                redirect('teacher/create_quiz_first');
            }
        } else {
            if ($get_school_wallet->teacher_balance < 0) {
                $_SESSION['success'] = 'Please recharge, Teacher Balance Low';
                redirect('school/create_quiz_first');
            } elseif ($get_premium_school_data->start_date >= $today) {
                $_SESSION['success'] = 'Your plan has not been started yet!';
                redirect('school/create_quiz_first');
            } elseif ($get_premium_school_data->end_date <= $today) {
                $_SESSION['success'] = 'Your plan has not been expired!';
                redirect('school/create_quiz_first');
            } elseif ($get_school_wallet->status == 0) {
                $_SESSION['success'] = 'Contact admin to use subscription benefits!';
                redirect('school/create_quiz_first');
            }
        }
        // } else {
        //     $_SESSION['success'] = "Please Updgrade your package.";
        //     redirect('teacher/create_quiz_first');
        // }
    }

    public function student_report()
    {
        $get_single_teacher = $this->teacherModel->get_single_teacher();
        $class_id = $get_single_teacher->class;
        $get_subject_from_class = $this->teacherModel->get_subject_from_class($class_id);
        $get_all_students_schoolwise  = $this->teacherModel->get_all_students_schoolwise($get_single_teacher->school);
        $data = [
            'get_subject_from_class' => $get_subject_from_class,
            'get_all_students' => $get_all_students_schoolwise,
        ];
        $this->view('teacher/student_report', $data);
    }

    public function explore_graph()
    {

        $this->view('teacher/explore_graph');
    }

    public function search_each_student_subjectwise()
    {
        // $get_single_teacher = $this->teacherModel->get_single_teacher();
        // $data = [
        //     'get_single_teacher' => $get_single_teacher,
        // ];
        $student_id = $_POST['student_id'];
        redirect('teacher/student_subjectwise/' . $student_id);
    }
    public function search_each_student_each_subject_all_quizes()
    {
        $get_single_teacher = $this->teacherModel->get_single_teacher();
        $data = [
            'get_single_teacher' => $get_single_teacher,
        ];
        $student_id = $_POST['student_id'];
        $subject_id = $_POST['subject_id'];
        redirect('teacher/student_subject_quiz_wise/' . $student_id . '/' . $subject_id);
    }
    // public function search_each_subject_subjectwise()
    // {
    //     $subject_id = $_POST['subject_id'];
    //     redirect('teacher/all_student_subject_wise/'.$subject_id);
    // }
    public function search_all_student_subject_wise()
    {
        $subject_id = $_POST['subject_id'];
        redirect('teacher/all_student_subject_wise/' . $subject_id);
    }

    public function all_student_subject_wise($subject_id)
    {
        $get_single_teacher = $this->teacherModel->get_single_teacher();
        $get_quiz_subject_wise = $this->teacherModel->get_quiz_subject_wise($subject_id);
        $get_all_students_schoolwise  = $this->teacherModel->get_all_students_schoolwise($get_single_teacher->school);
        $data = [
            'get_single_teacher' => $get_single_teacher,
            'get_all_quizes' => $get_quiz_subject_wise,
            'get_all_student' => $get_all_students_schoolwise,
            'subject_id' => $subject_id,
        ];
        $this->view('teacher/all_student_subject_wise', $data);
    }

    public function all_subject($student_id, $subject_id)
    {
        $get_single_teacher = $this->teacherModel->get_single_teacher();
        $get_quiz_subject_wise = $this->teacherModel->get_quiz_subject_wise($subject_id);

        $data = [
            'get_single_teacher' => $get_single_teacher,
            'get_all_quizes' => $get_quiz_subject_wise,
            'student_id' => $student_id,
            'subject_id' => $subject_id,
        ];
        $this->view('teacher/student_subject_quiz_wise', $data);
    }

    public function student_subject_quiz_wise($student_id, $subject_id)
    {
        $get_single_teacher = $this->teacherModel->get_single_teacher();
        $get_quiz_subject_wise = $this->teacherModel->get_quiz_subject_wise($subject_id);

        $data = [
            'get_single_teacher' => $get_single_teacher,
            'get_all_quizes' => $get_quiz_subject_wise,
            'student_id' => $student_id,
            'subject_id' => $subject_id,
        ];
        $this->view('teacher/student_subject_quiz_wise', $data);
    }

    public function student_subjectwise($id)
    {
        $get_single_teacher = $this->teacherModel->get_single_teacher();
        $get_subject_from_class = $this->teacherModel->get_subject_from_class($get_single_teacher->class);
        $data = [
            'get_single_teacher' => $get_single_teacher,
            'get_all_subject' => $get_subject_from_class,
            'student_id' => $id,
        ];
        $this->view('teacher/student_subjectwise', $data);
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


        if (empty($_POST['start_time'])) {
            $start_time = date("H:i");
        } else {
            $start_time = $_POST['start_time'];
        }
        if (empty($_POST['end_time'])) {
            // $end_time =  time('Y-m-d',strtotime(time("Y-m-d", $start_time) . " + 365 day"));\
            $end_time = date("H:i");
        } else {
            $end_time = $_POST['end_time'];
        }
        // echo $start_time;
        // echo "<br>";
        // echo $end_time;
        // echo "<br>";
        // die();
        // echo $start_date;

        // echo $end_date;
        // die();
        $quiz_duration_sec = $_POST['quiz_duration_sec'];
        if (empty($quiz_duration_sec)) {
            $quiz_duration_sec = 0;
        }
        $data = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'remarks' => $_POST['remarks'],
            'quiz_duration_min' => $_POST['quiz_duration_min'],
            'quiz_duration_sec' => $quiz_duration_sec,
            'quiz_cost' => $_POST['quiz_cost'],
            'school' => $_POST['school'],
            'attempt' => $_POST['attempt'],
            'quiz_file' => $quiz_file,
            'quiz_audio' => $quiz_audio,
            'user_limit' => $_POST['user_limit'],
            'contest_prize' => $_POST['contest_prize'],
            'passing_per' => $_POST['passing_per'],
            'coins_per_point1' => $_POST['coins_per_point1'],
            'coins_per_point2' => $_POST['coins_per_point2'],
            'coins_per_sec1' => $_POST['coins_per_sec1'],
        ];
        // echo $_POST['coins_per_sec1'];
        // die();
        $result = $this->adminModel->add_quiz_second($data, $quiz_id);

        if ($result) {
            // $_SESSION['success'] = "Please Add Questions to the Quiz";
            // $last_added_quiz = $this->adminModel->last_added_quiz();
            // $current_quiz_id = $last_added_quiz->id;
            // $data = [
            //     'last_added_quiz' => $last_added_quiz,
            // ];
            redirect('teacher/create_quiz_third/' . $quiz_id);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('teacher/create_quiz_first');
        }
    }

    public function create_quiz_third()
    {

        $this->view('teacher/create_quiz_third');
    }
    public function create_quiz_fourth()
    {

        $this->view('teacher/create_quiz_fourth');
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
            redirect('teacher/create_quiz_fourth/' . $quiz_id);
        }
    }
    public function add_question_to_quiz($question_id, $quiz_id)
    {
        $add_question_to_quiz = $this->adminModel->add_question_to_quiz($question_id, $quiz_id);
        if ($add_question_to_quiz) {
            redirect('teacher/create_quiz_fourth/' . $quiz_id . '#' . $question_id);
        } else {
            redirect('teacher/create_quiz_fourth/' . $quiz_id . '#' . $question_id);
        }
    }
    public function delete_question_from_quiz($question_id, $quiz_id)
    {
        $delete_question_from_quiz = $this->adminModel->delete_question_from_quiz($question_id, $quiz_id);
        if ($delete_question_from_quiz) {
            redirect('teacher/create_quiz_fourth/' . $quiz_id);
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

            redirect('teacher/new_quiz/' . $id);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('teacher/create_quiz');
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
            $result1 = $this->teacherModel->add_question($data);
            // echo "result";
        } elseif ($_POST['multi_question'] == 'multi') {
            $result2 = $this->teacherModel->add_question($data);
            // echo "result1";
        }
        // die();
        if ($result1) {
            flash('message', 'Records Updated');
            $_SESSION['success'] = "Question Added Successfully";
            redirect('teacher/add_question');
            // } else {
            //     $_SESSION['success'] = "Question not Updated";
            //     redirect('teacher/add_question');
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
            $_SESSION['success'] = "Question Added, Admin Approval Pending!";
            redirect('teacher/add_question_multi');
        } else {
            $_SESSION['success'] = "Question not Updated";
            redirect('teacher/add_question');
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
            $result1 = $this->teacherModel->add_question($data);
            // echo "result";

        } elseif ($_POST['multi_question'] == 'multi') {
            $result2 = $this->teacherModel->add_question($data);
            // echo "result1";

        }
        // die();
        if ($result1) {
            flash('message', 'Records Updated');
            $_SESSION['success'] = "Question Added Successfully!";
            redirect('teacher/create_quiz_fourth/' . $id);
            // } else {
            //     $_SESSION['success'] = "Question not Updated";
            //     redirect('teacher/add_question');
            // }

        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('teacher/create_quiz_fourth/' . $id);
        }
    }


    public function approve_quiz($id)
    {
        $approve_quiz = $this->adminModel->approve_quiz($id);
        if ($approve_quiz) {
            $_SESSION['success'] = "Quiz approved";
            redirect('teacher/create_quiz');
        } else {
            $_SESSION['success'] = "Quiz not approved";
            redirect('teacher/create_quiz');
        }
    }
    public function reject_quiz($id)
    {

        $remove_quiz = $this->adminModel->delete_quiz($id);
        $_SESSION['success'] = "Quiz deleted";
        redirect('teacher/quizes');
    }
    public function reject_college($id)
    {
        $remove_college = $this->adminModel->delete_college($id);

        $_SESSION['success'] = "College Removed";
        redirect('teacher/colleges');
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
        $status = $question_detail->status;
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

        $result = $this->teacherModel->update_question($question, $option1, $option2, $option3, $option4, $answer, $id, $explanation, $question_img_file, $option1_img_file, $option2_img_file, $option3_img_file, $option4_img_file, $explanation_img, $subject, $class, $score, $chapter, $topic, $status);

        if ($result) {
            $_SESSION['success'] = "Quiz Updated Successfully";
            redirect('teacher/quiz_master');
        } else {
            $_SESSION['success'] = "Quiz not updated";
            redirect('teacher/edit_question/' . $id);
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
            redirect('teacher/add_criteria');
        } else {
            $_SESSION['success'] = "Criteria detail not  Updated";
            redirect('teacher/add_criteria');
        }
    }
    public function delete_from_quiz_master($id)
    {
        $this->adminModel->delete_from_quiz_master($id);
        $_SESSION['success'] = "Quiz deleted successfully";

        redirect('teacher/quiz_master');
    }

    public function students_search()
    {
        $get_student_detail = $this->studentModel->search_student_by_name_phone($_GET['search_input']);
        $data =
            [
                'get_student_detail' => $get_student_detail,
            ];

        $_SESSION['nav'] = "student";
        $this->view('teacher/students_search', $data);
    }
    public function scholarships()
    {
        if (isset($_SESSION['rexkod_oodles_admin_id'])) {
            $get_all_scholarship = $this->adminModel->get_all_scholarship();
            $data = [
                'get_all_scholarship' => $get_all_scholarship,
            ];
        }
        // $_SESSION['nav'] = "scholarship";
        $this->view('teacher/scholarships', $data);
    }



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
        $all_subject_under_quiz_category = $this->adminModel->get_subject_from_quiz_category($category);
        // $subject = $_POST['subject_name'];
        $get_all_subject = $this->adminModel->get_all_subject();
        $get_teacher_detail = $this->teacherModel->get_teacher_detail();
        $teacher_id = $get_teacher_detail->teacher_id;
        $school_id = $get_teacher_detail->school;
        // $get_all_quiz =  $this->teacherModel->get_quiz_for_category_and_subject($category, $subject, $teacher_id);
        // This checks the quiz second page isfilled or not
        $get_all_quiz =  $this->teacherModel->get_completed_quiz_for_category_and_subject_($category, $subject, $teacher_id);

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
        $this->view('teacher/quizes', $data);
    }
    public function quiz_library($category, $subject)
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
        $all_subject_under_quiz_category = $this->adminModel->get_subject_from_quiz_category($category);
        // $subject = $_POST['subject_name'];
        $get_all_subject = $this->adminModel->get_all_subject();
        $get_teacher_detail = $this->teacherModel->get_teacher_detail();
        $teacher_id = $get_teacher_detail->teacher_id;
        $school_id = $get_teacher_detail->school;
        $get_all_quiz =  $this->teacherModel->get_quiz_for_category_and_subject($category, $subject, 1);
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
        $this->view('teacher/quiz_library', $data);
    }
    public function quiz_result_subject_wise()
    {
        $this->view('teacher/quiz_result_subject_wise');
    }
    public function quiz_result_category_wise($subject)
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
        $get_teacher_detail = $this->teacherModel->get_teacher_detail();
        $teacher_id = $get_teacher_detail->teacher_id;
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


        $this->view('teacher/quiz_result_category_wise', $data);
    }


    public function quiz_result_student_wise($quiz_id)
    {
        $get_quiz_result_quiz_wise = $this->teacherModel->get_quiz_result_quiz_wise($quiz_id);
        $data = [
            'get_quiz_score' => $get_quiz_result_quiz_wise,
        ];
        $this->view('teacher/quiz_result_student_wise', $data);
    }
    public function quiz_result()
    {
        $get_quiz_score = $this->adminModel->get_all_quiz_score();
        // $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
        $data = [
            'get_quiz_score' => $get_quiz_score,
            // 'get_student_detail' => $get_student_detail,
        ];
        $this->view('teacher/quiz_result', $data);
    }

    // college
    public function college($id)
    {
        $_SESSION['nav'] = "college";
        $college_detail = $this->adminModel->get_college_detail_single($id);
        $data = [
            'get_college_detail' => $college_detail,
        ];
        $this->view('teacher/college', $data);
    }


    public function colleges()
    {
        $school_detail = $this->adminModel->get_college_detail();
        $data = [
            'get_college_detail' => $school_detail,
        ];
        $_SESSION['nav'] = "college";
        $this->view('teacher/colleges', $data);
    }

    public function school($id)
    {
        $school_detail = $this->adminModel->get_school_detail_single($id);
        $data = [
            'get_school_detail' => $school_detail,
        ];
        $this->view('teacher/school', $data);
    }


    public function schools()
    {
        $school_detail = $this->adminModel->get_school_detail();
        $data = [
            'get_school_detail' => $school_detail,
        ];
        $_SESSION['nav'] = "school";
        $this->view('teacher/schools', $data);
    }



    public function quiz_master($class, $subject, $chapter, $topic)
    {


        if (isset($_POST['class'])) {

            $class = $_POST['class'];
        }

        if (isset($_POST['subject'])) {
            $subject = $_POST['subject'];
        }
        if (isset($_POST['chapter'])) {
            $chapter = $_POST['chapter'];
        }

        if (isset($_POST['topic'])) {
            $topic = $_POST['topic'];
        }

        $data = [
            'chapter'  => $chapter,
            'subject' => $subject,
            'topic' => $topic,
            'class' => $class,
        ];
        $get_teacher_detail = $this->teacherModel->get_teacher_detail();

        $_SESSION['nav'] = "quiz";
        $get_all_quiz_by_filter = $this->teacherModel->get_all_quiz_by_filter($data);
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();

        $get_all_quiz = $this->adminModel->get_all_quiz_master();
        $data = [
            'get_teacher_detail' => $get_teacher_detail,
            'get_all_quiz_by_filter' => $get_all_quiz_by_filter,
            'get_all_quiz' => $get_all_quiz,
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
            'chapter'  => $chapter,
            'subject' => $subject,
            'topic' => $topic,
            'class' => $class,
        ];
        // $this->view('admin/quiz_master/'.$class.'/'.$subject.'/'.$chapter.'/'.$topic, $data);
        $this->view('teacher/quiz_master', $data);
    }
    // public function quizes()
    // {
    //     $_SESSION['nav'] = "quiz";
    //     $get_all_quiz = $this->adminModel->get_all_quizes();
    //     $data = [
    //         'get_all_quiz' => $get_all_quiz,
    //     ];
    //     $this->view('teacher/quizes', $data);
    // }


    public function students()
    {
        if (isset($_SESSION['rexkod_oodles_admin_id'])) {
            $get_all_students = $this->adminModel->get_all_students();

            $data = [
                'get_all_students' => $get_all_students,

            ];
        }
        $_SESSION['nav'] = "student";

        $this->view('teacher/students', $data);
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

        $this->view('teacher/parents', $data);
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

        $this->view('teacher/representatives', $data);
    }
    public function add_webinar()
    {
        $this->view('teacher/add_webinar');
    }
    public function webinars()
    {
        $get_all_webinars = $this->adminModel->get_all_webinars();
        $data = [
            'get_all_webinars' => $get_all_webinars,
        ];

        $this->view('teacher/webinars', $data);
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

        $this->view('teacher/csr_enquiry', $data);
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

        $this->view('teacher/home_enquiry', $data);
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

        $this->view('teacher/all_criteria', $data);
    }

    public function scholarship_application()
    {
        if (isset($_SESSION['rexkod_oodles_admin_id'])) {
            $get_all_scholarship_app = $this->adminModel->get_all_scholarship_application();
            $data = [
                'get_all_scholarship_app' => $get_all_scholarship_app,
            ];
        }


        $this->view('teacher/scholarship_application', $data);
    }
    public function update_scholarship_status($id)
    {
        $status = $_POST['scholarship_status'];
        $statusupdate = $this->adminModel->update_scholarship_status($id, $status);


        if ($statusupdate) {
            $_SESSION['success'] = "Status Updated";
            redirect('teacher/scholarship_application');
        } else {

            $_SESSION['success'] = "Status Not Updated";
            redirect('teacher/scholarship_application');
        }
    }


    public function student($id)
    {

        $student_detail = $this->adminModel->get_single_student($id);
        $data = [
            'get_student_detail' => $student_detail,
        ];
        $_SESSION['nav'] = "student";
        $this->view('teacher/student', $data);
    }










    public function cart()
    {
        $this->view('teacher/cart');
    }

    public function product()
    {
        $this->view('teacher/product');
    }


    public function add_owner()
    {
        $this->view('teacher/add_owner');
    }

    public function add_coassembler()
    {
        $this->view('teacher/add_coassembler');
    }

    public function add_dealer()
    {
        $this->view('teacher/add_dealer');
    }

    public function add_distributor()
    {
        $this->view('teacher/add_distributor');
    }

    public function owners()
    {
        $this->view('teacher/owners');
    }

    public function drivers()
    {
        $drivers = $this->pageModel->get_all_drivers();
        $data = [
            'all_drivers' => $drivers,
        ];
        $this->view('teacher/drivers', $data);
    }

    public function to_orders()
    {
        $orders = $this->pageModel->get_to_orders();
        $data = [
            'all_orders' => $orders,
        ];
        $this->view('teacher/to_orders', $data);
    }


    public function from_orders()
    {
        $orders = $this->pageModel->get_from_orders();
        $data = [
            'all_orders' => $orders,
        ];
        $this->view('teacher/from_orders', $data);
    }



    public function reports()
    {
        $this->view('teacher/reports');
    }



    public function transactions()
    {
        $this->view('teacher/transactions');
    }

    public function users()
    {
        $this->view('teacher/users');
    }



    public function view_product($id)
    {

        $products = $this->pageModel->get_single_products($id);

        $data = [
            'get_pro' => $products,
        ];
        $this->view('teacher/view_product', $data);
    }

    // public function teacher_login(){
    //     $this->view('teacher/teacher_login');
    // }





    public function login()
    {

        if (!isset($_POST['username'])) {

            $this->view('teacher/login');
        } else {

            if (!isset($_POST['password'])) {
                $_SESSION['success'] = "Enter Password";
                $this->view('teacher/login');
            } else {
                $user = "";


                if (is_numeric($_POST['username'])) {
                    $email_verify_phone = $this->pageModel->email_verify_phone($_POST['username']);
                    if ($email_verify_phone->status == 0) {
                        // $_SESSION['success'] = "Please wait for the Approval from Admin!";
                        // $this->view('teacher/login');
                        redirect('teacher/login');
                    }
                } else {
                    $check_email = $this->pageModel->email_verify($_POST['username']);
                    if ($check_email->status == 0) {
                        // $_SESSION['success'] = "Please wait for the Approval from Admin!";
                        redirect('teacher/login');
                    }
                }
                // echo $_POST['username'];
                // echo $_POST['password'];
                // die();
                // if(!empty($check_email)){
                //     if($check_email->status==0){
                //         $_SESSION['success'] = "Please wait for the Approval from Admin!";
                //         redirect('teacher/login');
                //     }
                // }
                // if(!empty($email_verify_phone)){
                //     if($email_verify_phone->status==0){
                //         $_SESSION['success'] = "Please wait for the Approval from Admin!";
                //         redirect('teacher/login');
                //     }
                // }
                if (empty($check_email) && empty($email_verify_phone)) {
                    $_SESSION['success'] = "Invalid Username";
                    $this->view('teacher/login');
                } elseif (($email_verify_phone->status == 0) && ($check_email->status == 0)) {
                    $_SESSION['success'] = "Please wait for the Approval from Admin!";

                    redirect('teacher/login');
                } else {
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
                        $this->view('teacher/login');
                    } else {
                        if ($user->type == "teacher") {
                            $_SESSION['rexkod_oodles_teacher_id'] = $user->id;
                            $_SESSION['rexkod_oodles_teacher_name'] = $user->name;
                            $_SESSION['rexkod_oodles_teacher_email'] = $user->email;
                            $_SESSION['rexkod_oodles_teacher_phone'] = $user->phone;
                            $_SESSION['rexkod_oodles_teacher_login_type'] = $user->type;
                            redirect('teacher/index');
                        } else {

                            $_SESSION['success'] = "You do not have access!";
                            redirect('teacher/login');
                        }
                    }
                }
            }
        }
    }




    public function order_update($id, $status)
    {
        $this->pageModel->order_update($id, $status);

        $_SESSION['success'] = "Status updated Successfully";
        if ($status <= 2) {
            redirect('drivers/pickup_orders');
        } else {
            redirect('teacher/order/' . $id);
        }
    }





    public function add_product()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];


        $this->view('teacher/add_product', $data);
    }



    public function send_otp_forgot($phone, $otp)
    {


        $url = "http://pro.icubesms.com/app/smsapi/index.php?key=46145CA66DF68C&campaign=0&routeid=3&type=text&contacts=" . $phone . "&%20senderid=HLOCRT&msg=Hellow%20Cart%20OTP%20" . $otp . "%20to%20change%20your%20Password%20Enjoy%20eating!&template_id=1207161916033431171";

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




    public function change_pass()
    {
        $this->view('teacher/change_pass');
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

                            $_SESSION['success'] = "Password Changed successfully..!";
                            redirect('teacher/change_pass');
                        } else {
                            $_SESSION['success'] = "Confirm Password not matching with New Password";
                            redirect('teacher/change_pass');
                        }
                    } else {
                        $_SESSION['success'] = "Enter Confirm Password";
                        redirect('teacher/change_pass');
                    }
                } else {
                    $_SESSION['success'] = "Enter New Password";
                    redirect('teacher/change_pass');
                }
            } else {
                $_SESSION['success'] = "current password not matching";
                redirect('teacher/change_pass');
            }
        } else {
            $_SESSION['success'] = "Enter current Password";
            redirect('teacher/change_pass');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('teacher/login');
    }


    public function publish_quiz($quiz_id)
    {
        $get_teacher_detail = $this->teacherModel->get_teacher_detail();
        $school_id = $get_teacher_detail->school;
        $get_school_wallet = $this->schoolModel->get_school_wallet($school_id);
        $today = date("Y-m-d");
        $get_premium_school_data = $this->schoolModel->get_premium_school_single_data($school_id);
        $get_premium_school_data->start_date;

        if ($get_school_wallet->quiz_balance > 0 && ($get_premium_school_data->start_date <= $today) && ($get_premium_school_data->end_date >= $today) && ($get_school_wallet->status == 1)) {
            $publish_quiz  = $this->teacherModel->publish_quiz($quiz_id, $school_id);
            if ($publish_quiz) {
                $temp_id = $publish_quiz;
                $get_new_added_quiz = $this->teacherModel->get_quiz_detail_by_temp_id($temp_id);
                $new_quiz_id = $get_new_added_quiz->id;
                $_SESSION['success'] = "Quiz copied Successfully";
                redirect('teacher/update_quiz_first/' . $new_quiz_id);
            } else {
                $_SESSION['success'] = "Criteria detail not Updated";
                redirect('teacher/view_quiz/' . $quiz_id);
            }
        } else {

            if ($get_school_wallet->teacher_balance < 0) {
                $_SESSION['success'] = 'Please recharge, Teacher Balance Low';
                redirect('teacher/view_quiz/' . $quiz_id);
            } elseif ($get_premium_school_data->start_date >= $today) {
                $_SESSION['success'] = 'Your plan has not been started yet!';
                redirect('teacher/view_quiz/' . $quiz_id);
            } elseif ($get_premium_school_data->end_date <= $today) {
                $_SESSION['success'] = 'Your plan has  been expired!';
                redirect('teacher/view_quiz/' . $quiz_id);
            } elseif ($get_school_wallet->status == 0) {
                $_SESSION['success'] = 'Contact admin to use subscription benefits!';
                redirect('teacher/view_quiz/' . $quiz_id);
            }
        }
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

        $this->view('teacher/resources', $data);
    }

    public function notifications()
    {
        $get_all_notification  = $this->studentModel->get_notifications($_SESSION['rexkod_oodles_student_id']);
        $mark_notifications_read = $this->studentModel->mark_notifications_read();
        $data = [
            'get_notifications' => $get_all_notification,
        ];
        $this->view('teacher/notifications', $data);
    }


}
