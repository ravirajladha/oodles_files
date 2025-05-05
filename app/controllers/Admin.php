<?php

class Admin extends Controller
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


    protected function handle404Error()
    {
        header("HTTP/1.0 404 Not Found");
        $this->view('admin/reload_404');
        exit();
    }

    protected function handle500Error()
    {
        header("HTTP/1.0 500 Internal Server Error");
        $this->view('admin/reload_500');
        exit();
    }

    public function index()
    {

        // $_SESSION['nav'] = "home";

        if (isset($_SESSION['rexkod_oodles_admin_id'])) {
            $get_all_students_cum_parents = $this->adminModel->get_all_students_cum_parents();
            $count_of_students = count($get_all_students_cum_parents);
            $get_all_scholarship = $this->adminModel->get_all_scholarship();
            $get_all_quizes = $this->adminModel->get_all_quizes();
            $data = [
                'count_of_students' => $count_of_students,
                'count_of_scholarship' => count($get_all_scholarship),
                'count_of_quizes' => count($get_all_quizes),
            ];




            $this->view('admin/index', $data);
        } else {
            $this->view('admin/login');
        }
    }



    public function infographic()
    {
        $_SESSION['nav'] = "home";
        $this->view('admin/infographic');
    }
    public function quiz_dash()
    {
        $get_all_students_cum_parents = $this->adminModel->get_all_students_cum_parents();
        $get_all_students_cum_parents_last_week = $this->adminModel->get_all_students_cum_parents_last_week();
        $get_all_quizes = $this->adminModel->get_all_quizes_desc();
        $get_all_quiz_takers = $this->adminModel->get_all_quiz_takers();


        $get_all_student_registerd_for_quiz = $this->adminModel->get_all_student_registerd_for_quiz();
        $get_all_student_registerd_for_quiz_last_week = $this->adminModel->get_all_student_registerd_for_quiz_last_week();

        $get_all_quiz_makers = $this->adminModel->get_all_quiz_makers();
        $get_all_contest_quiz = $this->adminModel->get_all_contest_quiz();
        

        $data = [
            'count_of_students' => count($get_all_students_cum_parents),
            'count_of_students_last_week' => count($get_all_students_cum_parents_last_week),
            'count_of_quizes' => count($get_all_quizes),
            'count_of_quiz_takers' => count($get_all_quiz_takers),

            'get_all_student_registerd_for_quiz' => count($get_all_student_registerd_for_quiz),
            'get_all_student_registerd_for_quiz_last_week' => count($get_all_student_registerd_for_quiz_last_week),
            'get_all_quiz_makers' => $get_all_quiz_makers,
            'get_all_quizes' => $get_all_quizes,
            'get_all_contest_quiz'=> count($get_all_contest_quiz),
        ];
        $this->view('admin/quiz_dash', $data);
    }


    public function scholarship_dash()
    {
        $get_all_students_cum_parents = $this->adminModel->get_all_students_cum_parents();
        $get_all_students_cum_parents_last_week = $this->adminModel->get_all_students_cum_parents_last_week();

        $get_all_scholarship = $this->adminModel->get_all_scholarship();
        $get_all_scholarship_application = $this->adminModel->get_all_scholarship_application();
        $data = [
            'count_of_students' => count($get_all_students_cum_parents),
            'count_of_students_last_week' => count($get_all_students_cum_parents_last_week),
            'count_of_scholarship' => count($get_all_scholarship),
            'count_of_scholarship_application' => count($get_all_scholarship_application),

        ];
        $this->view('admin/scholarship_dash', $data);
    }


    public function add_corporate()
    {

        $this->view('admin/add_corporate');
    }
    public function edit_corporate($id)
    {
        $get_corporate_detail = $this->adminModel->get_corporate_detail($id);
        $data = [
'get_corporate_detail' => $get_corporate_detail,
        ];

        $this->view('admin/edit_corporate', $data);
    }
    public function add_subadmin()
    {
        $get_all_subadmin = $this->adminModel->get_all_subadmin();
        $data = [
            'get_all_subadmin' => $get_all_subadmin,
        ];
        $this->view('admin/add_subadmin', $data);
    }
    public function edit_subadmin($id)
    {
        $get_single_subadmin = $this->adminModel->get_single_subadmin($id);
        $data = [
            'get_single_subadmin' => $get_single_subadmin,
        ];
        $this->view('admin/edit_subadmin', $data);
    }

    public function add_finance()
    {
        $_SESSION['nav'] = "finance";
        $this->view('admin/add_finance');
    }
    public function add_faq()
    {
        $get_all_faqs = $this->adminModel->get_all_faqs();
        $data = [
            'get_all_faqs' => $get_all_faqs,
        ];
        $this->view('admin/add_faq', $data);
    }
    public function edit_faq($id)
    {
        $get_single_faq = $this->adminModel->get_single_faq($id);
        $data = [
            'faq_id' => $id,
            'get_single_faq' => $get_single_faq,
        ];
        $this->view('admin/edit_faq', $data);
    }

    public function add_boards()
    {
        $get_all_boards = $this->adminModel->get_all_boards();
        $data = [
            'get_all_boards' => $get_all_boards,
        ];
        $this->view('admin/add_boards', $data);
    }

    public function edit_boards($id)
    {
        $get_ind_boards = $this->adminModel->get_ind_boards($id);
        $data = [
            'get_ind_boards' => $get_ind_boards,
        ];
        $this->view('admin/edit_boards', $data);
    }

    public function update_boards($id)
    {
        $name  = $_POST['name'];

        $update_boards = $this->adminModel->update_boards($id, $name);
        if ($update_boards) {
            $_SESSION['success'] = "Boards Updated ";
            redirect('admin/add_boards');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/add_boards');
        }
    }
    public function update_faq($id)
    {
        $question  = $_POST['question'];
        $answer  = $_POST['answer'];

        $update_faq = $this->adminModel->update_faq($id, $question, $answer);
        if ($update_faq) {
            $_SESSION['success'] = "FAQs Updated ";
            redirect('admin/edit_faq/' . $id);
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/edit_faq/' . $id);
        }
    }

    public function create_boards()
    {
        $name = $_POST['name'];
        $create_boards = $this->adminModel->create_boards($name);
        if ($create_boards) {
            $_SESSION['success'] = 'Boards Added';
            redirect('admin/add_boards');
        } else {
            $_SESSION['success'] = 'Error Occured';
            redirect('admin/add_boards');
        }
    }
    public function create_faq()
    {
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $create_faq = $this->adminModel->create_faq($question, $answer);
        if ($create_faq) {
            $_SESSION['success'] = 'FAQs Added';
            redirect('admin/add_faq');
        } else {
            $_SESSION['success'] = 'Error Occured';
            redirect('admin/add_faq');
        }
    }
    public function add_hobbies()
    {
        $get_all_hobbies = $this->adminModel->get_all_hobbies();
        $data = [
            'get_all_hobbies' => $get_all_hobbies,
        ];
        $this->view('admin/add_hobbies', $data);
    }

    public function edit_hobbies($id)
    {
        $get_ind_hobbies = $this->adminModel->get_ind_hobbies($id);
        $data = [
            'get_ind_hobbies' => $get_ind_hobbies,
        ];
        $this->view('admin/edit_hobbies', $data);
    }

    public function update_hobbies($id)
    {
        $name  = $_POST['name'];

        $update_hobbies = $this->adminModel->update_hobbies($id, $name);
        if ($update_hobbies) {
            $_SESSION['success'] = "Hobbies Updated ";
            redirect('admin/add_hobbies');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/add_hobbies');
        }
    }

    public function create_hobbies()
    {
        $name = $_POST['name'];
        $create_hobbies = $this->adminModel->create_hobbies($name);
        if ($create_hobbies) {
            $_SESSION['success'] = 'Hobbies Added';
            redirect('admin/add_hobbies');
        } else {
            $_SESSION['success'] = 'Error Occured';
            redirect('admin/add_hobbies');
        }
    }
    public function add_question()
    {
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $data = [
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
        ];
        $_SESSION['nav'] = "question";
        $this->view('admin/add_question', $data);
    }

    public function add_question_while_quiz($id)
    {
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $data = [
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
            'get_quiz_id' => $id,
        ];
        // echo $data;
        $_SESSION['nav'] = "question";
        $this->view('admin/add_question_while_quiz', $data);
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
        $this->view('admin/add_question_multi', $data);
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
        $this->view('admin/add_question_beta', $data);
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
        $this->view('admin/edit_question', $data);
    }


    public function add_college()
    {
        $get_college_course = $this->adminModel->get_college_course();
        $data = [
            'get_college_course' => $get_college_course,
        ];
        $_SESSION['nav'] = "college";
        $this->view('admin/add_college', $data);
    }
    public function add_college_course()
    {
        $_SESSION['nav'] = "college_course";
        $this->view('admin/add_college_course');
    }
    public function add_school_type()
    {

        $_SESSION['nav'] = "school_type_image";
        $this->view('admin/add_school_type');
    }
    public function add_scholarship_type()
    {
        $get_all_scholarship_type = $this->adminModel->get_all_scholarship_type();
        $data = [
            'get_all_scholarship_type' => $get_all_scholarship_type,
        ];
        $this->view('admin/add_scholarship_type', $data);
    }
    public function edit_scholarship_type($id)
    {
        $get_single_scholarship_type = $this->adminModel->get_single_scholarship_type($id);
        $data = [
            'get_single_scholarship_type' => $get_single_scholarship_type,
        ];
        $this->view('admin/edit_scholarship_type', $data);
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
            $school_type_image = null;
        }
        $create_school_type = $this->adminModel->create_school_type($school_type, $school_type_image);
        if ($create_school_type) {
            $_SESSION['success'] = "School Type Added Successfully..! ";
            redirect('admin/add_school_type');
        } else {
            $_SESSION['success'] = 'School Type Not Added';
            redirect('admin/add_school_type');
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
            $college_course_image = null;
        }
        $create_college_course = $this->adminModel->create_college_course($college_course, $college_course_image);
        if ($create_college_course) {
            $_SESSION['success'] = "College Course Added Successfully..! ";
            redirect('admin/add_college_course');
        } else {
            $_SESSION['success'] = 'College Course Not Added';
            redirect('admin/add_college_course');
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
            $scholarship_type_image = null;
        }
        $create_scholarship_type = $this->adminModel->create_scholarship_type($scholarship_type, $scholarship_type_image);
        if ($create_scholarship_type) {
            $_SESSION['success'] = "Scholarship Type Added Successfully..! ";
            redirect('admin/add_scholarship_type');
        } else {
            $_SESSION['success'] = 'Scholarship Type Not Added';
            redirect('admin/add_scholarship_type');
        }
    }
    public function update_scholarship_type($id)
    {
        $get_single_scholarship_type = $this->adminModel->get_single_scholarship_type($id);

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
            $scholarship_type_image = $get_single_scholarship_type->scholarship_image;
        }
        $update_scholarship_type = $this->adminModel->update_scholarship_type($id, $scholarship_type, $scholarship_type_image);
        if ($update_scholarship_type) {
            $_SESSION['success'] = "Scholarship Type Added Successfully..! ";
            redirect('admin/edit_scholarship_type/' . $id);
        } else {
            $_SESSION['success'] = 'Scholarship Type Not Added';
            redirect('admin/edit_scholarship_type/' . $id);
        }
    }


    public function add_school()
    {
        $get_school_type = $this->adminModel->get_school_type();
        $data = [
            'get_school_type' => $get_school_type,
        ];
        $_SESSION['nav'] = "school";
        $this->view('admin/add_school', $data);
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
        $this->view('admin/update_school', $data);
    }

    public function add_class()
    {
        $get_all_school_class = $this->adminModel->get_all_school_class();
        $data = [
            'get_all_school_class' => $get_all_school_class,
        ];
        $_SESSION['nav'] = "school";
        $this->view('admin/add_class', $data);
    }
    public function add_quiz_category()
    {
        $get_all_quiz_category = $this->adminModel->get_all_quiz_category();
        $data = [
            'get_all_quiz_category' => $get_all_quiz_category,
        ];
        $_SESSION['nav'] = "school";
        $this->view('admin/add_quiz_category', $data);
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
        $this->view('admin/edit_quiz_category', $data);
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
        $this->view('admin/edit_class', $data);
    }

    public function change_class_status($class_id, $status)
    {
        $update_class_status = $this->adminModel->update_class_status($class_id, $status);
        redirect('admin/add_category');
    }
    public function edit_subject($id)
    {
        $get_school_subject = $this->adminModel->get_school_subject($id);
        $get_all_school_subject = $this->adminModel->get_all_school_subject();
        $get_all_class = $this->adminModel->get_all_class();
        $data = [
            'get_school_subject' => $get_school_subject,
            'get_all_school_subject' => $get_all_school_subject,
            'get_all_class' => $get_all_class,
        ];
        $_SESSION['nav'] = "school";
        $this->view('admin/edit_subject', $data);
    }
    public function edit_chapter($id)
    {
        $get_single_chapter = $this->adminModel->get_single_chapter($id);

        $get_all_class = $this->adminModel->get_all_class();
        $data = [
            'get_single_chapter' => $get_single_chapter,

            'get_all_class' => $get_all_class,
        ];
        $_SESSION['nav'] = "school";
        $this->view('admin/edit_chapter', $data);
    }
    public function edit_topic($id)
    {
        $get_single_topic = $this->adminModel->get_single_topic($id);

        $get_all_class = $this->adminModel->get_all_class();
        $data = [
            'get_single_topic' => $get_single_topic,

            'get_all_class' => $get_all_class,
        ];
        $_SESSION['nav'] = "school";
        $this->view('admin/edit_topic', $data);
    }

    public function add_category()
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
        $_SESSION['nav'] = "school";
        $this->view('admin/add_category', $data);
    }
    public function all_category()
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
        $_SESSION['nav'] = "school";
        $this->view('admin/all_category', $data);
    }

    public function add_category_test()
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
        $_SESSION['nav'] = "school";
        $this->view('admin/add_category_test', $data);
    }



    public function add_student()
    {
        $_SESSION['nav'] = "student";
        $this->view('admin/add_student');
    }


    public function corporate($id)
    {
        $get_corporate_detail = $this->adminModel->get_corporate_detail($id);
        $data = [
            'get_corporate_detail' => $get_corporate_detail,
        ];
        $this->view('admin/corporate', $data);
    }


    public function finance()
    {
        $_SESSION['nav'] = "finance";
        $this->view('admin/finance');
    }


    public function finances()
    {
        $_SESSION['nav'] = "finance";
        $this->view('admin/finances');
    }


    public function corporates()
    {
        $_SESSION['nav'] = "corporate";
        $get_all_corporate  = $this->adminModel->get_all_corporate();
        $data = [
            'get_all_corporate' => $get_all_corporate,
        ];
        $this->view('admin/corporates', $data);
    }


    public function quiz()
    {
        $_SESSION['nav'] = "quiz";
        $this->view('admin/quiz');
    }

    public function add_teacher()
    {
        $get_school_detail  = $this->adminModel->get_school_detail();
        $get_all_teacher = $this->adminModel->get_all_teacher();

        $data = [
            'get_school_detail' => $get_school_detail,
            'get_all_teacher' => $get_all_teacher,
        ];
        $_SESSION['nav'] = "quiz";
        $this->view('admin/add_teacher', $data);
    }

    // public function create_teacher(){
    //     $data = [
    //         'name' => $_POST['name'],
    //         'school' => $_POST['school'],
    //         'email' => $_POST['email'],
    //         'phone' => $_POST['phone'],
    //         'password' => $_POST['password'],
    //     ];
    //     $create_teacher = $this->adminModel->create_teacher($data);
    //     if ($create_teacher) {
    //         // flash('message', 'Records Updated');
    //         $_SESSION['success'] = "Teacher Added";
    //         redirect('admin/add_teacher');
    //     } else {
    //         $_SESSION['success'] = "Error Occured";
    //         redirect('admin/add_teacher');
    //     }
    // }

    public function create_teacher()
    {
        {
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
                    redirect('admin/add_teacher');
                } elseif ($this->pageModel->findUserByemail($email)) {
                    $_SESSION['success'] = 'Email already taken';
                    redirect('admin/add_teacher');
                } else {


                    if ($this->pageModel->findUserByphno($phone)) {
                        $_SESSION['success'] = 'Phone number already taken';
                        redirect('admin/add_teacher');
                    } else {

                        $pass = password_hash($password, PASSWORD_DEFAULT);
                        if ($this->adminModel->create_teacher($data, $pass)) {
                            $user = $this->pageModel->ulogin($email, $_POST['password']);
                            $_SESSION['rexkod_oodles_teacher_id'] = $user->id;
                            // echo  $_SESSION['rexkod_oodles_student_id'];
                            // die();
                            $_SESSION['rexkod_oodles_teacher_name'] = $user->name;
                            $_SESSION['rexkod_oodles_teacher_email'] = $user->email;
                            $_SESSION['rexkod_oodles_teacher_phone'] = $user->phone;
                            $_SESSION['rexkod_oodles_teacher_login_type'] = $user->type;

                            $_SESSION['success'] = "Teacher Added Successfully..! ";
                            redirect('admin/add_teacher');
                        } else {
                            $_SESSION['success'] = 'Registration Failed!';
                            redirect('admin/add_teacher');
                        }
                    }
                }
            } else {
                redirect('admin/add_teacher');
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
        $this->view('admin/scholarship', $data);
    }

    public function add_scholarship()
    {
        $get_all_active_class = $this->adminModel->get_all_active_class();

        $get_all_criteria = $this->adminModel->get_all_criteria();
        $get_all_document = $this->adminModel->get_all_document();
        $get_all_corporate = $this->adminModel->get_all_corporate();
        $get_scholarship_type = $this->adminModel->get_active_scholarship_type();
        $get_all_subadmin_scholarship  = $this->adminModel->get_all_subadmin_scholarship();
        $data = [
            'get_all_criteria' => $get_all_criteria,
            'get_all_document' => $get_all_document,
            'get_all_corporate' => $get_all_corporate,
            'get_scholarship_type' => $get_scholarship_type,
            'get_all_class' => $get_all_active_class,
            'get_all_subadmin_scholarship' => $get_all_subadmin_scholarship,
        ];
        $_SESSION['nav'] = "scholarship";
        $this->view('admin/add_scholarship', $data);
    }
    public function create_quiz_first()
    {
        $get_all_quiz_master = $this->adminModel->get_all_quiz_master();
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_all_class = $this->adminModel->get_all_active_class();
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
        $this->view('admin/create_quiz_first', $data);
    }
    public function create_quiz_second($id)
    {
        // $data1 = $this->adminModel->get_all_prize_pool_calculations();
        // $array = array();
        // foreach ($data1 as $item) {
        // $array[] = json_decode($item->json_data, true);
        // }
        $get_all_quizes_id = $this->adminModel->get_all_quizes_id($id);
        $image = $get_all_quizes_id->image;
        if (empty($image)) {
            $all_contest_prize_calculations = $this->adminModel->get_all_published_contest_prize_calculations();

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
                'get_current_quiz_detail' => $get_current_quiz_detail,
                'all_contest_prize_calculations' => $all_contest_prize_calculations,



                // 'sss' => $array,
                //         'ids' => $data1
            ];


            $_SESSION['nav'] = "create_quiz_second";
            $this->view('admin/create_quiz_second', $data);
        } else {
            redirect('admin/quizes/' . $get_all_quizes_id->category . '/0');
        }
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
        $this->view('admin/update_quiz_first', $data);
    }
    public function schedule_contest_quiz($quiz_id)
    {
        $get_quiz_detail = $this->adminModel->get_single_quizes_i($quiz_id);
        $data = [
            'get_quiz_detail' => $get_quiz_detail,
            'quiz_id' => $quiz_id,
        ];
        $this->view('admin/schedule_contest_quiz', $data);
    }

    public function publish_quiz($quiz_id)
    {
        $publish_quiz = $this->adminModel->publish_quiz($quiz_id);

        $_SESSION['success'] = "The quiz has been successfully published. ";

        redirect('admin/view_quiz/' . $quiz_id);
    }
    public function publish_prize_pool($id)
    {
        $publish_prize_pool = $this->adminModel->publish_prize_pool($id);

        $_SESSION['success'] = "The prize pool has been successfully published. ";

        redirect('admin/prize_pool_calculations');
    }


    public function reschedule_quiz($quiz_id)
    {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $quiz_duration_min = $_POST['quiz_duration_min'];
        $quiz_duration_sec = $_POST['quiz_duration_sec'];
        $flag = 0;
        if (strtotime($start_date) <= strtotime($end_date)) {


            if ($start_date == $end_date) {
                if ($end_time >= $start_time) {
                    $flag = 1;
                }
            } else {
                $flag = 1;
            }
        }

        if ($flag == 1) {
            $reschedule_contest_quiz = $this->adminModel->reschedule_contest_quiz($quiz_id, $start_date, $end_date, $start_time, $end_time, $quiz_duration_min, $quiz_duration_sec);
            $get_quiz_detail = $this->adminModel->get_all_quizes_id($quiz_id);
            $get_quiz_name = $get_quiz_detail->name;
            if ($reschedule_contest_quiz) {
                $message = "The quiz " . $get_quiz_name . " has been rescheduled.";
                $get_contest_registration = $this->adminModel->get_contest_registration($quiz_id);
                foreach ($get_contest_registration as $contest_reg) {
                    $add_notifications = $this->studentModel->add_notifications($contest_reg->student_id, $message);
                }
            }
            $_SESSION['success'] = "Quiz Resheduled Successfully";
        } else {
            $_SESSION['success'] = "Please enter correct timings.";
        }
        redirect('admin/schedule_contest_quiz/' . $quiz_id);
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
        $this->view('admin/edit_quiz', $data);
    }


    public function add_criteria()
    {

        $_SESSION['nav'] = "criteria";
        $get_all_class = $this->adminModel->get_all_active_class();
        $get_all_criteria = $this->adminModel->get_all_criteria();
        $data = [
            'get_all_criteria' => $get_all_criteria,
            'get_all_class' => $get_all_class,
        ];
        $this->view('admin/add_criteria', $data);
    }

    public function add_document()
    {

        $_SESSION['nav'] = "document";
        $get_all_class = $this->adminModel->get_all_active_class();

        $get_all_document = $this->adminModel->get_all_document();
        $data = [
            'get_all_document' => $get_all_document,
            'get_all_class' => $get_all_class,

        ];
        $this->view('admin/add_document', $data);
    }


    public function select_criteria_and_document($scholarship_id)
    {
        $get_ind_scholarship = $this->adminModel->get_ind_scholarship($scholarship_id);
        $get_active_scholarship_doc = $this->adminModel->get_active_scholarship_doc();

        $data = [
            'scholarship_id' => $scholarship_id,
            'get_single_scholarship' => $get_ind_scholarship,
            'get_active_scholarship_doc' => $get_active_scholarship_doc,
        ];
        $this->view('admin/select_criteria_and_document', $data);
    }
    public function create_subject()
    {
        $subject_name = $_POST['subject_name'];
        $class = $_POST['class'];
        $check_subject_name   = $this->adminModel->check_subject_name($subject_name, $class);
        if (!$check_subject_name) {
            $result = $this->adminModel->add_subject($subject_name, $class);
        }
        if ($result) {

            $_SESSION['success'] = "Subject added Successfully";
            redirect('admin/add_category');
        } else {
            $_SESSION['success'] = "The subject already exists. Please enter different subject";
            redirect('admin/add_category');
        }
    }
    public function add_criteria_and_document_to_scholarship($scholarship_id)
    {
        if (!empty($_POST['criteria'])) {
            $criteria = implode(',', $_POST['criteria']);
        } else {
            $criteria = null;
        }
        if (!empty($_POST['document'])) {
            $document = implode(',', $_POST['document']);
        } else {
            $document = null;
        }


        $update_scholarship_criteria_and_document = $this->adminModel->update_scholarship_criteria_and_document($scholarship_id, $criteria, $document);

        if ($update_scholarship_criteria_and_document) {
            $_SESSION['success'] = "Scholarship added Successfully";

            redirect('admin/all_scholarships');
        } else {
            $_SESSION['success'] = "Failed";

            redirect('admin/add_scholarship');
        }
    }
    public function update_subject($id)
    {
        $subject_name = $_POST['subject_name'];
        $class = $_POST['class'];
        // echo $subject_name;
        // echo $class;
        // die();
        $check_subject_name   = $this->adminModel->check_subject_name($subject_name, $class);
        if (!$check_subject_name) {
            $result = $this->adminModel->update_subject($subject_name, $id, $class);
        }
        if ($result) {

            $_SESSION['success'] = "Subject updated Successfully";
            redirect('admin/add_category');
        } else {
            $_SESSION['success'] = "The subject already exists. Please enter different subject";
            redirect('admin/update_category/' . $id);
        }
    }

    public function bulk_upload_question()
    {
        $upload = $this->adminModel->upload_bulk_question();
        if ($upload) {
            $_SESSION['success'] = 'Uploaded';
            redirect('admin/add_question');
        } else {
            $_SESSION['success'] = 'Invalid CSV Format';
            redirect('admin/add_question');
        }
    }

    public function get_subject_class_name()
    {
        $class = $_POST['class_id'];

        $get_subject_from_class = $this->adminModel->get_subject_from_class($class);

        echo "<option value=''>--Select-- </option>";

        foreach ($get_subject_from_class as $detail) {
            echo "<option value=$detail->id>$detail->subject_name</option>";
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
        $get_topic_from_chapter = $this->adminModel->get_topic_from_chapter($chapter_id);
        echo "<option value=''>--Select-- </option>";
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
            $quiz_resource = null;
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
            $quiz_map = null;
        }
        $class = $_POST['class'];
        $chapter = $_POST['chapter'];
        $subject_name = $_POST['subject_name'];
        $data = [
            'chapter' => $chapter,
            'subject_name' => $subject_name,
            'quiz_resource' => $quiz_resource,
            'quiz_map' => $quiz_map,
            'class' => $class,
        ];
        $check_chapter = $this->adminModel->check_chapter_name($chapter, $class, $subject_name);
        if (!$check_chapter) {
            $result = $this->adminModel->add_chapter($data);
        }
        if ($result) {
            $_SESSION['success'] = "Chapters added Successfully";
            redirect('admin/add_category');
        } else {
            $_SESSION['success'] = "The chapter already exists. Please enter different chapter";
            redirect('admin/add_category');
        }
    }

    public function update_chapter($id)
    {
        $get_chapter_detail = $this->adminModel->get_single_chapter($id);
        $class = $get_chapter_detail->class;
        $subject = $get_chapter_detail->subject;
        $old_chapter = $get_chapter_detail->name;
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
            $quiz_resource = $get_chapter_detail->resource;
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
            $quiz_map = $get_chapter_detail->map;
        }
        $chapter = $_POST['chapter'];
        // $subject_name = $get_chapter_detail->subject;
        $data = [
            'chapter' => $chapter,
            // 'subject_name' => $subject_name,
            'quiz_resource' => $quiz_resource,
            'quiz_map' => $quiz_map,
        ];

        $check_chapter = $this->adminModel->check_chapter_name($chapter, $class, $subject);
        if ((!$check_chapter) || $old_chapter == $chapter) {
            $result = $this->adminModel->update_chapter($data, $id);
        }
        if ($result) {
            $_SESSION['success'] = "Chapters updated Successfully";
            redirect('admin/add_category');
        } else {
            $_SESSION['success'] = "The chapter already exists. Please enter different chapter";
            redirect('admin/add_category');
        }
    }
    public function update_topic($id)
    {
        $get_topic_detail = $this->adminModel->get_single_topic($id);
        $class = $get_topic_detail->class;
        $subject = $get_topic_detail->subject;
        $chapter = $get_topic_detail->chapter;

        $topic = $_POST['topic'];
        $data = [
            'topic' => $topic,
        ];

        $check_topic = $this->adminModel->check_topic_name($topic, $class, $subject, $chapter);
        if ((!$check_topic)) {
            $result = $this->adminModel->update_topic($data, $id);
        }
        if ($result) {
            $_SESSION['success'] = "Topic Updated Successfully";
            redirect('admin/add_category');
        } else {
            $_SESSION['success'] = "The topic already exists. Please enter different topic";
            redirect('admin/add_category');
        }
    }

    public function create_topic()
    {
        $class   = $_POST['class'];
        $topic   = $_POST['topic'];
        $chapter = $_POST['chapter'];
        $subject = $_POST['subject'];
        $data = [
            'chapter' => $chapter,
            'subject' => $subject,
            'topic' => $topic,
            'class' => $class,
        ];
        $check_topic = $this->adminModel->check_topic_name($topic, $class, $subject, $chapter);
        if (!$check_topic) {
            $result = $this->adminModel->add_topic($data);
        }

        if ($result) {
            $_SESSION['success'] = "Topic added Successfully";
            redirect('admin/add_category');
        } else {
            $_SESSION['success'] = "The topic already exists. Please enter different topic";
            redirect('admin/add_category');
        }
    }

    public function create_class()
    {
        $class_name = $_POST['class_name'];
        $result = $this->adminModel->add_class($class_name);
        if ($result) {

            $_SESSION['success'] = "Class added Successfully";
            redirect('admin/add_category');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('admin/add_category');
        }
    }
    public function create_quiz_category()
    {
        $category = $_POST['category'];
        $result = $this->adminModel->add_quiz_category($category);
        if ($result) {

            $_SESSION['success'] = "Category added Successfully";
            redirect('admin/add_quiz_category');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('admin/add_quiz_category');
        }
    }
    public function update_quiz_category($id)
    {

        $category = $_POST['category'];
        $result = $this->adminModel->update_quiz_category($category, $id);
        if ($result) {

            $_SESSION['success'] = "Category updated Successfully";
            redirect('admin/edit_quiz_category/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('admin/edit_quiz_category/' . $id);
        }
    }
    public function update_school_class($id)
    {

        $class_name = $_POST['class_name'];
        $check_class_name = $this->adminModel->check_class_name($class_name);
        if (!$check_class_name) {
            $result = $this->adminModel->update_school_class($class_name, $id);
        }
        if ($result) {
            $_SESSION['success'] = "Class updated Successfully";
            redirect('admin/add_category');
        } else {
            $_SESSION['success'] = "Duplicate class name has been found. Please enter different class";
            redirect('admin/add_category');
        }
    }
    public function update_school_subject($id)
    {

        $subject_name = $_POST['subject_name'];
        $result = $this->adminModel->update_school_subject($subject_name, $id);
        if ($result) {

            $_SESSION['success'] = "subject updated Successfully";
            redirect('admin/edit_subject/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('admin/edit_subject/' . $id);
        }
    }
    public function review_quiz()
    {
        $last_quiz = $this->adminModel->last_added_quiz();
        $data = [
            'last_added_quiz' => $last_quiz,
        ];
        $this->view('admin/review_quiz', $data);
    }
    // public function view_quiz($id)
    // {
    //     $get_quiz_detail = $this->adminModel->get_single_quizes($id);
    //     $data = [
    //         'get_quiz_detail' => $get_quiz_detail,
    //     ];
    //     $this->view('admin/view_quiz', $data);
    // }
    public function reload_404()
    {

        $this->view('admin/reload_404');
    }
    public function reload_500()
    {

        $this->view('admin/reload_500');
    }



    public function view_quiz($id)
    {
        try {
            $get_quiz_detail = $this->adminModel->get_single_quizes_i($id);
            if (!$get_quiz_detail) {
                $this->handle404Error();
            }
            $data = [
                'get_quiz_detail' => $get_quiz_detail,
            ];
            $this->view('admin/view_quiz', $data);
        } catch (Exception $e) {
            $this->handle500Error();
        }
    }

    public function test_1()
    {
        $this->view('admin/test_1');
    }
    public function wallet()
    {
        $get_all_wallet = $this->adminModel->get_all_wallet();
        $get_wallet_control = $this->adminModel->get_wallet_control();
        $get_wallet_data = $this->adminModel->get_wallet_data();
        $get_all_students = $this->adminModel->get_all_students();
        $data = [
            'get_all_wallet' => $get_all_wallet,
            'get_wallet_control' => $get_wallet_control,
            'get_wallet_data' => $get_wallet_data,
            'get_all_students' => $get_all_students,
        ];
        $this->view('admin/wallet', $data);
    }
    public function update_wallet_control()
    {
        // $bonus_coin_reduction_per =  $_POST['bonus_coin_reduction_per'];
        // if (empty($bonus_coin_reduction_per)) {
        //     $bonus_coin_reduction_per = 0;
        // }
        // $bonus_coin_reduction_per =  $_POST['bonus_coin_reduction_per'];
        // if (empty($bonus_coin_reduction_per)) {
        //     $bonus_coin_reduction_per = 0;
        // }
        $data = [

            'bonus_coin_reduction_per' => $_POST['bonus_coin_reduction_per'],
            'referral_joiner' => $_POST['referral_joiner'],
            'referral_joinee' => $_POST['referral_joinee'],
            'points_reduction' => $_POST['points_reduction'],
            'awarded_amount_addition' => $_POST['awarded_amount_addition'],
        ];
        $update_wallet_control = $this->adminModel->update_wallet_control($data);
        if ($update_wallet_control) {
            $_SESSION['success'] = 'Successfully Updated';
        } else {
            $_SESSION['success'] = 'Error Occured';
        }
        redirect('admin/wallet');
    }
    public function add_money_to_student_from_admin()
    {
        $student_id = $_POST['student_id'];
        $money = $_POST['money'];

        $add_money = $this->adminModel->add_money($student_id, $money);
        if ($add_money) {

            $_SESSION['success'] = "Money added Successfully";
            redirect('admin/wallet');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('admin/wallet');
        }
    }
    public function add_bonus_coins_to_student_from_admin()
    {
        $student_id = $_POST['student_id'];
        $bonus_coins = $_POST['bonus_coins'];

        $add_bonus_coins = $this->adminModel->add_bonus_coins($student_id, $bonus_coins);
        if ($add_bonus_coins) {
            $_SESSION['success'] = "Bonus Coins Added Successfully";
            redirect('admin/wallet');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('admin/wallet');
        }
    }


    public function add_quiz_first()
    {
        $quiz_name = $_POST['quiz_name'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $category = $_POST['category'];
        $created_by = $_SESSION['rexkod_oodles_admin_id'];
        $data = [
            'quiz_name' => $quiz_name,
            'class' => $class,
            'subject' => $subject,
            'category' => $category,
            'category' => $category,
            'created_by' => $created_by,
        ];
        $add_quiz_first = $this->adminModel->add_quiz_first($data);
        if ($add_quiz_first) {
            $last_added_quiz = $this->adminModel->last_added_quiz();
            $current_quiz_id = $last_added_quiz->id;
            $data = [
                'last_added_quiz' => $last_added_quiz,
            ];
            redirect('admin/create_quiz_second/' . $current_quiz_id, $data);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('admin/create_quiz');
        }
    }
    public function add_quiz_second($quiz_id)
    {

        // $data = $_REQUEST;
        // unset($data["submit"]);
        // print_r($data);
        // die;

        // echo $_POST['prize_calc_data_id'];
        // die;

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
            $quiz_file = null;
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
            $quiz_audio = null;
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
        $prize_calc_data_id = $_POST['prize_calc_data_id'];
        if (!isset($_POST['quiz_cost'])) {
            $quiz_cost = 0;
        } else {
            $quiz_cost = $_POST['quiz_cost'];
        }
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
            'quiz_cost' => $quiz_cost,
            'school' => $_POST['school'],
            'attempt' => $_POST['attempt'],
            // 'attempt' => 2,
            'quiz_file' => $quiz_file,
            'quiz_audio' => $quiz_audio,
            // 'user_limit' => $_POST['user_limit'],
            // 'contest_prize' => $_POST['contest_prize'],
            'passing_per' => $_POST['passing_per'],
            'coins_per_point1' => $_POST['coins_per_point1'],
            'coins_per_point2' => $_POST['coins_per_point2'],
            'no_of_questions' => $_POST['no_of_questions'],
            // 'coins_per_point2' => 2,
            'coins_per_sec1' => $_POST['coins_per_sec1'],
            'prize_calc_data_id' => $prize_calc_data_id,


            // ============================================




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
            redirect('admin/create_quiz_third/' . $quiz_id);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('admin/create_quiz_first');
        }
    }

    public function create_quiz_third($id)
    {
        $get_current_quiz_detail = $this->adminModel->get_single_quizes_i($id);
        $subject_used_in_quiz = $get_current_quiz_detail->subject_name;
        $get_sub_subject = $this->adminModel->get_sub_subject_from_subject($subject_used_in_quiz);
        $data = [
            'get_sub_subject' => $get_sub_subject,
            'get_current_quiz_detail' => $get_current_quiz_detail,
        ];
        $this->view('admin/create_quiz_third', $data);
    }

    public function create_quiz_fourth()
    {

        $this->view('admin/create_quiz_fourth');
    }
    public function add_chapter_to_quiz($quiz_id)
    {
        if (isset($_POST['chapter'])) {
            $chapter_id = implode(',', $_POST['chapter']);
        } else {
            $chapter_id = null;
        }


        $add_chapter_to_quiz = $this->adminModel->update_chapter_to_quiz($chapter_id, $quiz_id);
        if ($add_chapter_to_quiz) {
            redirect('admin/create_quiz_fourth/' . $quiz_id);
        }
    }
    public function add_question_to_quiz($question_id, $quiz_id)
    {
        $add_question_to_quiz = $this->adminModel->add_question_to_quiz($question_id, $quiz_id);
        if ($add_question_to_quiz) {
            redirect('admin/create_quiz_fourth/' . $quiz_id . '#' . $question_id);
        } else {
            $_SESSION['success'] = "Question Already Present";

            redirect('admin/create_quiz_fourth/' . $quiz_id . '#' . $question_id);
        }
    }
    public function delete_question_from_quiz($question_id, $quiz_id)
    {
        $delete_question_from_quiz = $this->adminModel->delete_question_from_quiz($question_id, $quiz_id);
        if ($delete_question_from_quiz) {
            redirect('admin/create_quiz_fourth/' . $quiz_id);
        }
    }
    public function view_teacher($school_id)
    {
        $get_all_teacher_for_school = $this->adminModel->get_all_teacher_for_school($school_id);
        $data = [
            'get_all_teacher_for_school' => $get_all_teacher_for_school,
        ];
        $this->view('admin/view_teacher', $data);
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

            redirect('admin/new_quiz/' . $id);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('admin/create_quiz');
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
            $question_img_file = null;
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
            $option1_img_file = null;
        }
        // echo $option1_img_file;
        // die();
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
            $option2_img_file = null;
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
            $option3_img_file = null;
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
            $option4_img_file = null;
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
            $explanation_img = null;
        }
        if ($_SESSION['rexkod_oodles_admin_id'] == 1) {
            $status = 1;
        } else {
            $status = 0;
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
            'created_by' => $_SESSION['rexkod_oodles_admin_id'],
            'status' => $status,
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
            // flash('message', 'Records Updated');
            $_SESSION['success'] = "Question Added Successfully";
            redirect('admin/add_question');
        // } else {
        //     $_SESSION['success'] = "Question not Updated";
        //     redirect('admin/add_question');
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
            // flash('message', 'Records Updated');
            $_SESSION['success'] = "Question Added Successfully";
            redirect('admin/add_question_multi');
        } else {
            $_SESSION['success'] = "Question not  Updated";
            redirect('admin/add_question');
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
            $question_img_file = null;
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
            $option1_img_file = null;
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
            $option2_img_file = null;
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
            $option3_img_file = null;
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
            $option4_img_file = null;
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
            $explanation_img = null;
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
            'created_by' => $_SESSION['rexkod_oodles_admin_id'],
            'status' => 1,
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
            redirect('admin/create_quiz_fourth/' . $id);
        // } else {
        //     $_SESSION['success'] = "Question not Updated";
        //     redirect('admin/add_question');
        // }

        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/create_quiz_fourth/' . $id);
        }
    }


    public function approve_quiz($id)
    {
        $approve_quiz = $this->adminModel->approve_quiz($id);
        if ($approve_quiz) {
            $_SESSION['success'] = "Quiz approved";
            redirect('admin/create_quiz');
        } else {
            $_SESSION['success'] = "Quiz not approved";
            redirect('admin/create_quiz');
        }
    }
    public function reject_quiz($id)
    {

        $remove_quiz = $this->adminModel->delete_quiz($id);
        $_SESSION['success'] = "Quiz deleted";
        redirect('admin/quizes');
    }
    public function reject_college($id)
    {
        $remove_college = $this->adminModel->delete_college($id);

        $_SESSION['success'] = "College Removed";
        redirect('admin/colleges');
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

        $data = [
            'chapter'  => $chapter,
            'subject' => $subject,
            'topic' => $topic,
            'class' => $class,
        ];
        $get_all_quiz_by_filter = $this->adminModel->get_all_quiz_by_filter($data);
        $data = [
            'get_all_quiz_by_filter' => $get_all_quiz_by_filter,
        ];
        if ($result) {
            $_SESSION['success'] = "Quiz Updated Successfully";
            redirect('admin/quiz_master/' . $class . '/' . $subject . '/' . $chapter . '/' . $topic, $data);
        } else {
            $_SESSION['success'] = "Quiz not updated";
            redirect('admin/edit_question/' . $id, $data);
        }
    }
    public function create_criteria()
    {


        $criteria_name = $_POST['criteria_name'];
        // $category_name = $_POST['category_name'];
        $criteria_type = $_POST['criteria_type'];
        $class = $_POST['class'];

        // die();
        if ($criteria_type == 1) {
            if (!isset($_POST['yes_no_based'])) {
                $_SESSION['success'] = "Please select Yes or No";
                redirect('admin/add_criteria');
                exit();
            }
        }
        if ($criteria_type == 2) {
            if (empty($_POST['start_date'])) {
                $_SESSION['success'] = "Please fill Start Date";
                redirect('admin/add_criteria');
                exit();
            }
            if (empty($_POST['end_date'])) {
                $_SESSION['success'] = "Please fill End Date";
                redirect('admin/add_criteria');
                exit();
            }
        }
        if ($criteria_type == 3) {
            if (empty($_POST['start_range'])) {
                $_SESSION['success'] = "Please fill Start Range";
                redirect('admin/add_criteria');
                exit();
            }
            if (empty($_POST['end_range'])) {
                $_SESSION['success'] = "Please fill End Range";
                redirect('admin/add_criteria');
                exit();
            }
        }
        if ($criteria_type == 1) {
            ($yes_no_based = $_POST['yes_no_based']);
        } else {
            $yes_no_based = null;
        }
        if (!empty($_POST['start_date'])) {
            ($start_date = $_POST['start_date']);
        } else {
            $start_date = null;
        }
        if (!empty($_POST['end_date'])) {
            ($end_date = $_POST['end_date']);
        } else {
            $end_date = null;
        }
        if (!empty($_POST['start_range'])) {
            ($start_range = $_POST['start_range']);
        } else {
            $start_range = null;
        }
        if (!empty($_POST['end_range'])) {
            ($end_range = $_POST['end_range']);
        } else {
            $end_range = null;
        }


        $result = $this->adminModel->add_criteria($criteria_name, $criteria_type, $yes_no_based, $start_date, $end_date, $start_range, $end_range, $class);

        if ($result) {

            $_SESSION['success'] = "Criteria added Successfully";
            redirect('admin/add_criteria');
        } else {
            $_SESSION['success'] = "Criteria detail not  Updated";
            redirect('admin/add_criteria');
        }
    }

    public function update_student_profile($id)
    {
        $get_all_columns = $this->studentModel->get_all_columns();
        $get_current_student = $this->adminModel->get_current_student($id);
        $get_current_user_auth = $this->adminModel->get_current_user_auth_by_id($id);
        // echo $_SESSION['rexkod_oodles_student_id'];
        // die();
        $get_school_detail = $this->adminModel->get_school_detail();
        $get_college_detail = $this->adminModel->get_college_detail();
        $empty_column_in_student = $this->adminModel->empty_column_in_student($id);
        $get_all_class = $this->adminModel->get_all_active_class();
        $get_all_hobbies = $this->adminModel->get_all_hobbies();
        $get_all_boards = $this->adminModel->get_all_boards();
        $student_id = $id;
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
            'student_id' => $student_id,
        ];
        $this->view('admin/update_student_profile', $data);
    }


    public function update_profile_data($id)
    {
        // echo $id;
        // die();

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
            $hobby = null;
        }
        if (!empty($_POST['achievements'])) {
            $achievements = implode(',', $_POST['achievements']);
        } else {
            $achievements = null;
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
            $academic_other_name = null;
        }
        if (!empty($_POST['p_academic_name'])) {
            $p_academic_name = implode(',', $_POST['p_academic_name']);
        } else {
            $p_academic_name = null;
        }
        if (!empty($_POST['p_class'])) {
            $p_class = implode(',', $_POST['p_class']);
        } else {
            $p_class = null;
        }
        if (!empty($_POST['p_cgpa'])) {
            $p_cgpa = implode(',', $_POST['p_cgpa']);
        } else {
            $p_cgpa = null;
        }
        if (!empty($_POST['p_start_date'])) {
            $p_start_date = implode(',', $_POST['p_start_date']);
        } else {
            $p_start_date = null;
        }
        // echo $p_start_date;
        if (!empty($_POST['p_end_date'])) {
            $p_end_date = implode(',', $_POST['p_end_date']);
        } else {
            $p_end_date = null;
        }
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
        } else {
            $submit_value = 'tab1';
        }

        $result = $this->studentModel->update_profile_db($data);
        $email_id_change = $this->studentModel->update_email_id($email_id);

        if ($url == "student") {
            if ($result && $email_id_change) {
                $_SESSION['success'] = "Profile updated successfully..!";
                redirect('admin/update_student_profile/' . $id);
            } else {
                $_SESSION['success'] = "Try later..!";
                redirect('admin/students');
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


    public function delete_from_quiz_master($id)
    {

        $get_single_question = $this->adminModel->get_single_question($id);
        $class = $get_single_question->class;
        $subject = $get_single_question->subject;
        $chapter = $get_single_question->chapter;
        $topic = $get_single_question->topic;


        $this->adminModel->delete_from_quiz_master($id);
        $_SESSION['success'] = "Quiz deleted successfully";

        $data = [
            'chapter'  => $chapter,
            'subject' => $subject,
            'topic' => $topic,
            'class' => $class,
        ];

        $get_all_quiz_by_filter = $this->adminModel->get_all_quiz_by_filter($data);
        $data = [
            'get_all_quiz_by_filter' => $get_all_quiz_by_filter,
        ];



        redirect('admin/quiz_master/' . $class . '/' . $subject . '/' . $chapter . '/' . $topic, $data);
    }

    public function students_search()
    {
        $get_student_detail = $this->studentModel->search_student_by_name_phone($_GET['search_input']);
        $data =
            [
                'get_student_detail' => $get_student_detail,
            ];

        $_SESSION['nav'] = "student";
        $this->view('admin/students_search', $data);
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
        $this->view('admin/scholarships', $data);
    }
    public function all_scholarships()
    {
        if (($_SESSION['rexkod_oodles_login_type'] == 'admin')) {
            $get_all_scholarship = $this->adminModel->get_all_scholarship();
            $data = [
                'get_all_scholarship' => $get_all_scholarship,
            ];
        } elseif ($_SESSION['rexkod_oodles_login_type'] == 'subadmin_scholarship') {
            $get_all_scholarship = $this->adminModel->get_subadmin_scholarship();
            $data = [
                'get_all_scholarship' => $get_all_scholarship,
            ];
        }
        // $_SESSION['nav'] = "scholarship";
        $this->view('admin/all_scholarships', $data);
    }
    public function shortlisted_students($scholarship_id)
    {

        $get_all_schortlisted_students = $this->adminModel->get_all_schortlisted_students($scholarship_id);
        $data = [
            'get_all_schortlisted_students' => $get_all_schortlisted_students,
            'scholarship_id' => $scholarship_id,
        ];

        $this->view('admin/shortlisted_students', $data);
    }
    public function scholarship_report($scholarship_id)
    {
        $get_scholarship_data = $this->adminModel->get_scholarship_data($scholarship_id);
        $get_all_applicants= $this->adminModel->obtain_scholarship_application_selection_sorted_by_creator($scholarship_id);
        $data = [
            'get_all_applicants' => $get_all_applicants,
            'scholarship_id' => $scholarship_id,
            'get_scholarship_data' => $get_scholarship_data,
        ];

        $this->view('admin/scholarship_report', $data);
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

        // $get_all_quiz =  $this->studentModel->get_quiz_for_category_and_subject($category, $subject);
        $get_all_quiz =  $this->studentModel->get_quiz_for_category_and_subject_complete($category, $subject);



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
        $this->view('admin/quizes', $data);
    }

    public function disperse_money_for_contest($id)
    {
        $get_all_student = $this->adminModel->get_particular_quiz_result_for_quiz_id($id);
    }



    public function quiz_result()
    {
        $get_quiz_score = $this->adminModel->get_all_quiz_score();
        // $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
        $data = [
            'get_quiz_score' => $get_quiz_score,
            // 'get_student_detail' => $get_student_detail,
        ];
        $this->view('admin/quiz_result', $data);
    }
    public function quiz_practice_result()
    {
        $get_quiz_score = $this->adminModel->get_all_quiz_score();
        // $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
        $data = [
            'get_quiz_score' => $get_quiz_score,
            // 'get_student_detail' => $get_student_detail,
        ];
        $this->view('admin/quiz_practice_result', $data);
    }
    public function quiz_rapid_fire_result()
    {
        $get_quiz_score = $this->adminModel->get_all_quiz_score();
        // $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
        $data = [
            'get_quiz_score' => $get_quiz_score,
            // 'get_student_detail' => $get_student_detail,
        ];
        $this->view('admin/quiz_rapid_fire_result', $data);
    }
    public function quiz_contest_result()
    {
        $get_quiz_score = $this->adminModel->get_all_quiz_score();
        // $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
        $data = [
            'get_quiz_score' => $get_quiz_score,
            // 'get_student_detail' => $get_student_detail,
        ];
        $this->view('admin/quiz_contest_result', $data);
    }
    public function quiz_contest_report($quiz_id)
    {
        $get_quiz_score = $this->adminModel->get_all_quiz_score();
        $get_all_registered_student_for_this_quiz = $this->adminModel->get_contest_registration($quiz_id);
        $get_quiz_detail = $this->adminModel->get_all_quizes_id($quiz_id);

        $get_prize_pool_detail = $this->adminModel->get_contest_by_id($get_quiz_detail->prize_calc_data_id);
        $get_contest_registration = $this->adminModel->get_contest_registration($quiz_id);
        $count_of_registered_student = count($get_contest_registration);


        $data = [
            'get_quiz_score' => $get_quiz_score,
            // 'get_student_detail' => $get_student_detail,
            'get_all_registered_student' => $get_all_registered_student_for_this_quiz,
            'quiz_id' => $quiz_id,
            'get_quiz_detail' => $get_quiz_detail,
            'get_prize_pool_detail' => $get_prize_pool_detail,
            'count_of_registered_student' => $count_of_registered_student,
        ];
        $this->view('admin/quiz_contest_report', $data);
    }
    //quiz practice report
    public function quiz_practice_report($quiz_id)
    {
        // $get_quiz_score = $this->adminModel->get_all_quiz_score();
        // $get_all_registered_student_for_this_quiz = $this->adminModel->get_contest_registration($quiz_id);
        // $get_quiz_detail = $this->adminModel->get_all_quizes_id($quiz_id);

        // $get_prize_pool_detail = $this->adminModel->get_contest_by_id($get_quiz_detail->prize_calc_data_id);
        // $get_contest_registration = $this->adminModel->get_contest_registration($quiz_id);
        // $count_of_registered_student = count($get_contest_registration);

        $quiz_results = $this->adminModel->get_all_practice_results($quiz_id);
        $get_distinct_user_results= $this->adminModel->get_distinct_user_results($quiz_id);

        $data = [
            // 'get_quiz_score' => $get_quiz_score,
            // // 'get_student_detail' => $get_student_detail,
            // 'get_all_registered_student' => $get_all_registered_student_for_this_quiz,
            // 'quiz_id' => $quiz_id,
            // 'get_quiz_detail' => $get_quiz_detail,
            // 'get_prize_pool_detail' => $get_prize_pool_detail,
            // 'count_of_registered_student' => $count_of_registered_student,

            'quiz_results' => $quiz_results,
            'get_distinct_user_results' => $get_distinct_user_results,
        ];
        $this->view('admin/quiz_practice_report', $data);
    }




    public function quiz_merit_result()
    {
        $get_quiz_score = $this->adminModel->get_all_quiz_score();
        // $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
        $data = [
            'get_quiz_score' => $get_quiz_score,
            // 'get_student_detail' => $get_student_detail,
        ];
        $this->view('admin/quiz_merit_result', $data);
    }
    public function quiz_result1()
    {
        $get_quiz_score = $this->adminModel->get_all_quiz_score();
        // $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
        $data = [
            'get_quiz_score' => $get_quiz_score,
            // 'get_student_detail' => $get_student_detail,
        ];
        $this->view('admin/quiz_result1', $data);
    }
    public function quiz_result2($id)
    {

        $get_quiz_score = $this->adminModel->get_particular_quiz_result_for_quiz_id($id);
        $get_quiz_detail = $this->adminModel->get_single_quizes_i($id);
        $get_failed_students = $this->adminModel->get_failed_contest_students($id);
        if ($get_quiz_detail->generate == 1) {
            // $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
            $data = [
                'get_quiz_score' => $get_quiz_score,
                'get_quiz_detail' => $get_quiz_detail,
                'get_failed_students' => $get_failed_students,
                // 'get_student_detail' => $get_student_detail,
            ];
            $this->view('admin/quiz_result2', $data);
        } else {
            $this->view('admin/quiz_result');
        }
    }

    // college
    public function college($id)
    {
        $_SESSION['nav'] = "college";
        $college_detail = $this->adminModel->get_college_detail_single($id);
        $data = [
            'get_college_detail' => $college_detail,
        ];
        $this->view('admin/college', $data);
    }


    public function colleges()
    {
        $school_detail = $this->adminModel->get_college_detail();
        $data = [
            'get_college_detail' => $school_detail,
        ];
        $_SESSION['nav'] = "college";
        $this->view('admin/colleges', $data);
    }

    public function school($id)
    {
        $school_detail = $this->adminModel->get_school_detail_single($id);
        $data = [
            'get_school_detail' => $school_detail,
        ];
        $this->view('admin/school', $data);
    }


    public function schools()
    {
        $school_detail = $this->adminModel->get_school_detail();
        $data = [
            'get_school_detail' => $school_detail,
        ];
        $_SESSION['nav'] = "school";
        $this->view('admin/schools', $data);
    }

    public function approve_question($quiz_master_id, $status)
    {
        $update_quiz_master_status = $this->adminModel->update_quiz_master_status($quiz_master_id, $status);
        $get_single_question = $this->adminModel->get_single_question($quiz_master_id);
        $class = $get_single_question->class;
        $subject = $get_single_question->subject;
        $chapter = $get_single_question->chapter;
        $topic = $get_single_question->topic;

        $data = [
            'chapter'  => $chapter,
            'subject' => $subject,
            'topic' => $topic,
            'class' => $class,
        ];

        $get_all_quiz_by_filter = $this->adminModel->get_all_quiz_by_filter($data);
        $data = [
            'get_all_quiz_by_filter' => $get_all_quiz_by_filter,
        ];
        if ($update_quiz_master_status) {
            if ($status == 1) {
                $_SESSION['success'] = 'Question Approved';
            } else {
                $_SESSION['success'] = 'Question Dis-Approved';
            }
        } else {
            $_SESSION['success'] = 'Something went wrong';
        }
        redirect('admin/quiz_master/' . $class . '/' . $subject . '/' . $chapter . '/' . $topic, $data);
    }

    public function question_bank()
    {
        $get_all_inactive_question = $this->adminModel->get_inactive_quiz_master();
        $data = [
            'get_all_inactive_question' => $get_all_inactive_question,
        ];
        $this->view('admin/question_bank', $data);
    }
    public function question_bank_pending()
    {
        if ($_SESSION['rexkod_oodles_admin_id'] == 1) {
            $get_all_inactive_question = $this->adminModel->get_rejected_pending_quiz_master();
        } elseif ($_SESSION['rexkod_oodles_admin_id'] == 100) {
            $get_all_inactive_question = $this->adminModel->get_rejected_pending_quiz_master_of_subadmin();
        }
        $data = [
            'get_all_inactive_question' => $get_all_inactive_question,
        ];
        $this->view('admin/question_bank_pending', $data);
    }


    public function change_status_of_quiz_master()
    {
        if (!empty($_POST['checkbox'])) {
            $checkbox = implode(',', $_POST['checkbox']);
            if (isset($_POST['submit_approve'])) {
                $submit = 1;
            } elseif (isset($_POST['submit_trash'])) {
                $submit = 2;
            }

            foreach (explode(',', $checkbox) as $checked_value) {
                $update_quiz_master_status = $this->adminModel->update_quiz_master_status($checked_value, $submit);
            }
            if ($update_quiz_master_status) {
                if ($submit == 1) {
                    $_SESSION['success'] = 'Question Approved';
                    redirect('admin/question_bank');
                } elseif ($submit == 2) {
                    $_SESSION['success'] = 'Question Rejected';
                    redirect('admin/question_bank');
                }
            } else {
                $_SESSION['success'] = 'Error Occured';
                redirect('admin/question_bank');
            }
        } else {
            $_SESSION['success'] = 'Please select any question, Thank you!';
            redirect('admin/question_bank');
        }
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
        $_SESSION['nav'] = "quiz";
        $get_all_quiz_by_filter = $this->adminModel->get_all_quiz_by_filter($data);
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();

        $get_all_quiz = $this->adminModel->get_all_quiz_master();
        $data = [
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
        $this->view('admin/quiz_master', $data);
    }
    // public function quizes()
    // {
    //     $_SESSION['nav'] = "quiz";
    //     $get_all_quiz = $this->adminModel->get_all_quizes();
    //     $data = [
    //         'get_all_quiz' => $get_all_quiz,
    //     ];
    //     $this->view('admin/quizes', $data);
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

        $this->view('admin/students', $data);
    }

    public function delete_student($id)
    {
        $delete_student_from_auth = $this->adminModel->delete_student_from_auth($id);
        if ($delete_student_from_auth) {
            $_SESSION['success'] = "Student successfully deleted";
        } else {
            $_SESSION['success'] = "Error Occured";
        }
        redirect('admin/students');
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

        $this->view('admin/parents', $data);
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

        $this->view('admin/representatives', $data);
    }
    public function add_webinar()
    {
        $this->view('admin/add_webinar');
    }
    public function webinars()
    {
        $get_all_webinars = $this->adminModel->get_all_webinars();
        $data = [
            'get_all_webinars' => $get_all_webinars,
        ];

        $this->view('admin/webinars', $data);
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

        $this->view('admin/csr_enquiry', $data);
    }
    public function delete_csr_enquiry()
    {
        $checkedIds = isset($_POST['id']) ? $_POST['id'] : array();
        $checkedIdsString = implode(',', $checkedIds);
        foreach ($checkedIds as $checkedId) {
            $delete_csr_enquiry  = $this->adminModel->delete_csr_enquiry($checkedId);

        }

        $_SESSION['success'] = "Deleted successfully";


        redirect('admin/csr_enquiry');
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

        $this->view('admin/home_enquiry', $data);
    }
    public function delete_home_enquiry()
    {
        $checkedIds = isset($_POST['id']) ? $_POST['id'] : array();
        $checkedIdsString = implode(',', $checkedIds);
        foreach ($checkedIds as $checkedId) {
            $delete_home_enquiry  = $this->adminModel->delete_home_enquiry($checkedId);

        }

        $_SESSION['success'] = "Deleted successfully";


        redirect('admin/home_enquiry');
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

        $this->view('admin/all_criteria', $data);
    }

    public function scholarship_application($id)
    {
        if (isset($_SESSION['rexkod_oodles_admin_id'])) {
            $get_selected_scholarship_application = $this->adminModel->get_selected_scholarship_application($id);
            $get_ind_scholarship = $this->adminModel->get_ind_scholarship($id);
            $get_all_default_scholarship_status = $this->adminModel->get_all_default_scholarship_status();

            $data = [
                'get_selected_scholarship_application' => $get_selected_scholarship_application,
                'get_ind_scholarship' => $get_ind_scholarship,
                'scholarship_id' => $id,
                'get_all_default_scholarship_status' => $get_all_default_scholarship_status,
            ];
        }
        $this->view('admin/scholarship_application', $data);
    }

    public function scholarship_document_verify($id, $document_id)
    {

        // if(isset($_POST['doc_verify'])){
        //     $doc_verify = implode(',',$_POST['doc_verify']);
        // }else{
        //     $value = array('0');
        //     $doc_verify = implode(',',$value);
        // }

        $get_scholarship_application = $this->corporateModel->get_ind_scholarship_application($id);

        if ($get_scholarship_application->status != 4) {


            $doc_verify = $get_scholarship_application->doc_verify;
            $status = $get_scholarship_application->status;
            if (($doc_verify == null) || ($doc_verify == 0)) {
                $doc_verify = $document_id;
            } else {
                $doc_verify = $doc_verify . "," . $document_id;
            }
            // this code needs to be improvised later
            // checking whether the docs has been completely verified
            // the flag denotes that all the document in the scholarship_application matches with the scholarship_required_docs
            $get_scholarship_id = $get_scholarship_application->scholarship_id;
            $get_scholarship_detail = $this->corporateModel->get_ind_scholarship($get_scholarship_id);
            $get_submitted_doc_id = explode(',', $doc_verify);
            $get_required_doc = $get_scholarship_detail->documents_required;
            $get_exploded_required_doc = explode(',', $get_required_doc);
            foreach ($get_exploded_required_doc as $doc) {
                if (in_array($doc, $get_submitted_doc_id)) {
                    $flag = 1;
                } else {
                    $flag = 0;
                }
            }
            if ($flag == 1) {
                $status = 2;
            }
            $auth_id = $_SESSION['rexkod_oodles_admin_id'];
            $update_scholarship_application_doc_verify = $this->corporateModel->update_scholarship_app_doc_verify($id, $doc_verify, $flag, $status, $auth_id);
            if ($update_scholarship_application_doc_verify) {
                $_SESSION['success'] = 'Document Status is Verified';
                redirect('admin/scholarship_status/' . $id . '/4');
            } else {
                $_SESSION['success'] = 'Something went wrong!';
                redirect('admin/scholarship_status/' . $id . '/4');
            }
        } else {
            $_SESSION['success'] = 'The scholarship has already been rejected!';
            redirect('admin/scholarship_status/' . $id . '/4');
        }
    }
    public function scholarship_admin_document_verify($id)
    {
        $get_scholarship_application = $this->corporateModel->get_ind_scholarship_application($id);

        $get_document_id = explode(',', $get_scholarship_application->document_ids);
        $status =  $_POST['document_status'];
        $document_comment =  $_POST['document_comment'];
        $status  =  implode(',', $status);
        $document_comment  =  implode(',', $document_comment);
        $status = rtrim($status, ",");
        $document_comment = rtrim($document_comment, ",");

        $update_scholarship_application_doc_verify = $this->adminModel->scholarship_document_verify($id, $status, $document_comment);
        if ($update_scholarship_application_doc_verify) {
            // $_SESSION['success'] = 'Document Status is Verified';
            redirect('admin/scholarship_status/' . $id . '/4');
        } else {
            // $_SESSION['success'] = 'Something went wrong!';
            redirect('admin/scholarship_status/' . $id . '/4');
        }
    }




    public function update_scholarship_status($id)
    {
        $status = $_POST['scholarship_status'];
        $statusupdate = $this->adminModel->update_scholarship_status($id, $status);


        if ($statusupdate) {
            $_SESSION['success'] = "Status Updated";
            redirect('admin/scholarship_application');
        } else {

            $_SESSION['success'] = "Status Not Updated";
            redirect('admin/scholarship_application');
        }
    }
    public function update_scholarship_status_for_student($scholarship_id)
    {
        $application_id = $_POST['application_id'];
        $status = $_POST['status'];
        $message = $_POST['message'];
        $get_scholarship_data = $this->adminModel->get_scholarship_data($scholarship_id);
        $get_single_scholarship_application = $this->adminModel->get_single_scholarship_application($application_id);
        $get_single_default_scholarship_status = $this->adminModel->get_single_default_scholarship_status($status);
        $statusupdate = $this->adminModel->update_scholarship_current_status($application_id, $status, $message);


        if ($statusupdate) {
            $_SESSION['success'] = "Status Updated";
            $message = 'Your status for Scholarship: ' . $get_scholarship_data->name . ' has been changed to ' . $get_single_default_scholarship_status->name;
            $this->studentModel->add_notifications($get_single_scholarship_application->student_id, $message);
            redirect('admin/scholarship_application/' . $scholarship_id);
        } else {

            $_SESSION['success'] = "Status Not Updated";
            redirect('admin/scholarship_application/' . $scholarship_id);
        }
    }



    public function student($id)
    {
        $get_current_user_auth = $this->adminModel->get_current_user_auth_by_id($id);
        $student_detail = $this->adminModel->get_single_student($id);
        $get_wallet_detail = $this->adminModel->getWallet($id);
        $data = [
            'get_auth_detail' => $get_current_user_auth,
            'get_student_detail' => $student_detail,
            'student_id' => $id,
            'get_wallet_detail' => $get_wallet_detail,
        ];
        $_SESSION['nav'] = "student";
        $this->view('admin/student', $data);
    }

    public function cart()
    {
        $this->view('admin/cart');
    }

    public function product()
    {
        $this->view('admin/product');
    }


    public function add_owner()
    {
        $this->view('admin/add_owner');
    }

    public function add_coassembler()
    {
        $this->view('admin/add_coassembler');
    }

    public function add_dealer()
    {
        $this->view('admin/add_dealer');
    }

    public function add_distributor()
    {
        $this->view('admin/add_distributor');
    }

    public function owners()
    {
        $this->view('admin/owners');
    }

    public function drivers()
    {
        $drivers = $this->pageModel->get_all_drivers();
        $data = [
            'all_drivers' => $drivers,
        ];
        $this->view('admin/drivers', $data);
    }

    public function to_orders()
    {
        $orders = $this->pageModel->get_to_orders();
        $data = [
            'all_orders' => $orders,
        ];
        $this->view('admin/to_orders', $data);
    }


    public function from_orders()
    {
        $orders = $this->pageModel->get_from_orders();
        $data = [
            'all_orders' => $orders,
        ];
        $this->view('admin/from_orders', $data);
    }



    public function reports()
    {
        $this->view('admin/reports');
    }



    public function transactions()
    {
        $this->view('admin/transactions');
    }

    public function users()
    {
        $this->view('admin/users');
    }



    public function view_product($id)
    {

        $products = $this->pageModel->get_single_products($id);

        $data = [
            'get_pro' => $products,
        ];
        $this->view('admin/view_product', $data);
    }







    public function login()
    {

        if (!isset($_POST['username'])) {

            $this->view('admin/login');
        } else {

            if (!isset($_POST['password'])) {
                $_SESSION['success'] = "Enter Password";
                $this->view('admin/login');
            } else {
                $user = "";


                if (is_numeric($_POST['username'])) {
                    $email_verify_phone = $this->pageModel->email_verify_phone($_POST['username']);
                } else {
                    $check_email = $this->pageModel->email_verify($_POST['username']);
                }


                if (empty($check_email) && empty($email_verify_phone)) {
                    $_SESSION['success'] = "Invalid Username";
                    $this->view('admin/login');
                } else {
                    if (!empty($check_email)) {
                        $user_results = $check_email;

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
                        $this->view('admin/login');
                    } else {
                        if ($user->type == "admin") {
                            $_SESSION['rexkod_oodles_admin_id'] = $user->id;
                            $_SESSION['rexkod_oodles_admin_name'] = $user->name;
                            $_SESSION['rexkod_oodles_admin_email'] = $user->email;
                            $_SESSION['rexkod_oodles_admin_phone'] = $user->phone;
                            $_SESSION['rexkod_oodles_login_type'] = $user->type;
                            redirect('admin/index');
                        } elseif ($user->type == "subadmin_scholarship") {
                            $_SESSION['rexkod_oodles_admin_id'] = $user->id;
                            $_SESSION['rexkod_oodles_admin_name'] = $user->name;
                            $_SESSION['rexkod_oodles_admin_email'] = $user->email;
                            $_SESSION['rexkod_oodles_admin_phone'] = $user->phone;
                            $_SESSION['rexkod_oodles_login_type'] = $user->type;
                            redirect('admin/index');
                        } elseif ($user->type == "subadmin_quiz") {
                            $_SESSION['rexkod_oodles_admin_id'] = $user->id;
                            $_SESSION['rexkod_oodles_admin_name'] = $user->name;
                            $_SESSION['rexkod_oodles_admin_email'] = $user->email;
                            $_SESSION['rexkod_oodles_admin_phone'] = $user->phone;
                            $_SESSION['rexkod_oodles_login_type'] = $user->type;
                            redirect('admin/quiz_dash');
                        } else {

                            $_SESSION['success'] = "You do not have access!";
                            redirect('admin/login');
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
            redirect('admin/order/' . $id);
        }
    }

    public function add_subscription()
    {
        $this->view('admin/add_subscription');
    }

    public function add_market_place()
    {
        $get_all_market_place = $this->adminModel->get_all_market_place();
        $data = [
            'get_all_market_place' => $get_all_market_place,
        ];

        $this->view('admin/add_market_place', $data);
    }

    public function market_place_orders()
    {
        $get_all_market_place = $this->adminModel->get_all_market_place();
        $get_all_market_place_orders = $this->adminModel->get_all_market_place_orders();
        $data = [
            'get_all_market_place' => $get_all_market_place,
            'get_all_market_place_orders' => $get_all_market_place_orders,
        ];

        $this->view('admin/market_place_orders', $data);
    }
    public function edit_market_place($id)
    {
        $get_single_market_place = $this->adminModel->get_single_market_place($id);
        $data = [
            'get_single_market_place' => $get_single_market_place,
            'id' => $id,
        ];

        $this->view('admin/edit_market_place', $data);
    }

    public function add_plans_for_school()
    {

        $get_all_school_plan = $this->adminModel->get_all_school_plan();
        $data = [
            'get_school_plan' => $get_all_school_plan,
        ];
        $this->view('admin/add_plans_for_school', $data);
    }
    public function assign_plans_to_school()
    {
        $get_all_school_wallet = $this->adminModel->get_all_school_wallet();
        $get_school_detail = $this->adminModel->get_unsubscribed_school();
        $get_premium_school_data = $this->adminModel->get_premium_school_data();
        $get_all_school_plan = $this->adminModel->get_all_school_plan();
        $data = [
            'get_all_school_wallet' => $get_all_school_wallet,
            'get_school_detail' => $get_school_detail,
            'premium_school' => $get_premium_school_data,
            'get_school_plan' => $get_all_school_plan,
        ];
        $this->view('admin/assign_plans_to_school', $data);
    }
    public function update_school_wallet_status($school_id, $status)
    {
        $change_school_wallet_status = $this->adminModel->change_school_wallet_status($school_id, $status);
        if ($change_school_wallet_status && $status == 1) {
            $_SESSION['success'] = "School enabled to use Subscription benefits!";
            redirect('admin/assign_plans_to_school');
        } elseif ($change_school_wallet_status && $status == 0) {
            $_SESSION['success'] = "School disabled to use Subscription benefits!";
            redirect('admin/assign_plans_to_school');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/assign_plans_to_school');
        }
    }

    public function update_assigned_plans_to_school($id)
    {
        $get_selected_school_plan = $this->adminModel->get_premium_school_single_data($id);
        $get_school_detail = $this->adminModel->get_unsubscribed_school();
        $get_premium_school_data = $this->adminModel->get_premium_school_data();
        $get_all_school_plan = $this->adminModel->get_all_school_plan();

        $data = [
            'get_selected_school_plan' => $get_selected_school_plan,
            'get_school_detail' => $get_school_detail,
            'premium_school' => $get_premium_school_data,
            'get_school_plan' => $get_all_school_plan,

        ];
        $this->view('admin/update_assigned_plans_to_school', $data);
    }
    public function delete_assigned_plans_to_school($id)
    {
        $delete_assigned_plan  = $this->adminModel->delete_assigned_plans_to_school($id);
        redirect('admin/assign_plans_to_school');
    }
    public function edit_plans_for_school($id)
    {
        $get_school_plan = $this->adminModel->get_selected_school_plan($id);
        $data = [
            'get_school_plan' => $get_school_plan,
        ];
        $this->view('admin/edit_plans_for_school', $data);
    }


    public function create_subscription_plans_for_school()
    {
        $data = [

            'name' => $_POST['name'],
            'no_of_quiz' => $_POST['no_of_quiz'],
            'no_of_teacher' => $_POST['no_of_teacher'],
            'status' => $_POST['status'],
        ];
        $create_plans = $this->adminModel->create_subscription_plans_for_school($data);

        if ($create_plans) {
            $_SESSION['success'] = "Subscription Plan Addded";
            redirect('admin/add_plans_for_school');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/add_plans_for_school');
        }
    }

    public function assign_subscription_plans_to_school()
    {
        $data = [
            'plan' => $_POST['plan'],
            'school' => $_POST['school'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'amount' => $_POST['amount'],
            'status' => $_POST['status'],
        ];
        // echo $_POST['school'];
        // die();
        $school_id = $_POST['school'];
        $check = $this->adminModel->check_existing_subscription_plan_for_school($school_id);
        if ($check > 0) {
            $assign_plans = $this->adminModel->renewal_subscription_plans_to_school($data);
        } else {
            $assign_plans = $this->adminModel->assign_subscription_plans_to_school($data);
        }

        if ($assign_plans) {
            $_SESSION['success'] = "Subscription Plan Assigned";
            redirect('admin/assign_plans_to_school');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/assign_plans_to_school');
        }
    }

    public function edit_assigned_subscription_plans_to_school()
    {

        $data = [
            'plan' => $_POST['plan'],

            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'amount' => $_POST['amount'],
            'status' => $_POST['status'],
        ];
        $update_assigned_plans = $this->adminModel->edit_assigned_subscription_plans_to_school($data);

        if ($update_assigned_plans) {
            $_SESSION['success'] = "Subscription Plan Updated";
            redirect('admin/assign_plans_to_school');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/assign_plans_to_school');
        }
    }

    public function update_subscription_plans_for_school($id)
    {
        $data = [
            'id' => $id,
            'name' => $_POST['name'],
            'no_of_quiz' => $_POST['no_of_quiz'],
            'no_of_teacher' => $_POST['no_of_teacher'],
            'status' => $_POST['status'],
        ];
        $create_plans = $this->adminModel->update_subscription_plans_for_school($data);

        if ($create_plans) {
            $_SESSION['success'] = "Subscription Plan Addded";
            redirect('admin/add_plans_for_school');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/add_plans_for_school');
        }
    }
    public function update_market_place($id)
    {
        $get_market_place_detail = $this->adminModel->get_single_market_place($id);
        if (!empty($_FILES['image']['name'])) {
            $f_name = $_FILES['image']['name'];
            $f_temp = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $image = $f_newfile;
        } else {
            $image = $get_market_place_detail->image;
        }
        $data = [
            'id' => $id,
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'offer_price' => $_POST['offer_price'],
            'description' => $_POST['description'],
            'quantity' => $_POST['quantity'],
            'image' => $image,

        ];
        $update_market_place = $this->adminModel->update_market_place($data);

        if ($update_market_place) {
            $_SESSION['success'] = "Market Place Updated";
            redirect('admin/edit_market_place/' . $id);
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/edit_market_place/' . $id);
        }
    }
    public function add_subscription_elements()
    {
        if (!empty($_FILES['image']['name'])) {
            $f_name = $_FILES['image']['name'];
            $f_temp = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $image = $f_newfile;
        } else {
            $image = null;
        }

        $data = [
            'image' => $image,
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'offer_price' => $_POST['offer_price'],
            'validity' => $_POST['validity'],
            'coins_offered' => $_POST['coins_offered'],
            'btn_on_enable' => $_POST['btn_on_enable'],
            'btn_on_disable' => $_POST['btn_on_disable'],
            'content' => $_POST['content'],
            'status' => $_POST['status'],

            'package_id' => $_POST['package_id'],

        ];
        $add_subscription = $this->adminModel->add_subscription($data);

        if ($add_subscription) {
            $_SESSION['success'] = "Subscription Addded";
            redirect('admin/add_subscription');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/add_subscription');
        }
    }
    public function subscription_plan()
    {
        $get_all_subscription_plan = $this->adminModel->get_all_subscription_plan();
        $data = [
            'get_all_subscription_plan' => $get_all_subscription_plan,
        ];
        $this->view('admin/subscription_plan', $data);
    }

    public function edit_subscription($id)
    {

        $get_ind_subscription = $this->adminModel->get_ind_subscription($id);
        $data = [
            'get_ind_subscription' => $get_ind_subscription,
        ];
        $this->view('admin/edit_subscription', $data);
    }
    public function update_subscription($id)
    {
        $get_ind_subscription = $this->adminModel->get_ind_subscription($id);
        if (!empty($_FILES['image']['name'])) {
            $f_name = $_FILES['image']['name'];
            $f_temp = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $image = $f_newfile;
        } else {
            $image = $get_ind_subscription->image;
        }

        $data = [
            'id' => $id,
            'image' => $image,
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'offer_price' => $_POST['offer_price'],
            'validity' => $_POST['validity'],
            'coins_offered' => $_POST['coins_offered'],
            'btn_on_enable' => $_POST['btn_on_enable'],
            'btn_on_disable' => $_POST['btn_on_disable'],
            'content' => $_POST['content'],
            'status' => $_POST['status'],

            'package_id' => $_POST['package_id'],


        ];
        $update_subscription = $this->adminModel->update_subscription($data);

        if ($update_subscription) {
            $_SESSION['success'] = "Subscription editded";
            redirect('admin/edit_subscription/' . $id);
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/edit_subscription/' . $id);
        }
    }


    public function add_product()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];


        $this->view('admin/add_product', $data);
    }



    public function send_otp_forgot($phone, $otp)
    {

        // The existing api for otp from hello cart was not working, so changed it to Biglander
        // $url = "http://pro.icubesms.com/app/smsapi/index.php?key=46145CA66DF68C&campaign=0&routeid=3&type=text&contacts=" . $phone . "&%20senderid=HLOCRT&msg=Hellow%20Cart%20OTP%20" . $otp . "%20to%20change%20your%20Password%20Enjoy%20eating!&template_id=1207161916033431171";
        // $url = "http://sms.profuseservices.com/sendsms.jsp?user=lsamelec&password=2e9e8f3a08XX&senderid=BLPCLS&tempid=1007163111151840759&mobiles=+91" . $phone . "&sms=Dear%20User,%20your%20OTP%20for%20login%20is%20" . $otp . ".%20Please%20do%20not%20share%20with%20anyone.%20Team%20Biglander";
        $url = "https://manage.smssolutions.in/smsapi/index?key=4634FEEA7A5F49&campaign=0&routeid=16&type=text&contacts=+91" . $phone . "&senderid=OODLES&msg=Your%20one%20time%20password%20is%20" . $otp . ".to%20sign%20to%20your%20account%20madhuOodlesIN";

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





    public function create_pro()
    {

        $name = $_POST['name'];
        $subcat = $_POST['subcat'];
        // $price = $_POST['price'];

        $p_details = $_POST['p_details'];

        if (isset($_SESSION['rexkod_admin_id'])) {
            $created_byId = $_SESSION['rexkod_admin_id'];
        } else {
            $created_byId = $_SESSION['rexkod_vendor_id'];
        }

        $min1 = $_POST['min1'];
        $max1 = $_POST['max1'];
        $price1 = $_POST['price1'];

        $min2 = $_POST['min2'];
        $max2 = $_POST['max2'];
        $price2 = $_POST['price2'];

        $min3 = $_POST['min3'];
        $max3 = $_POST['max3'];
        $price3 = $_POST['price3'];

        $min4 = $_POST['min4'];
        $max4 = $_POST['max4'];
        $price4 = $_POST['price4'];


        $min5 = $_POST['min5'];
        $max5 = $_POST['max5'];
        $price5 = $_POST['price5'];

        $data = [
            'min1' => $min1,
            'max1' => $max1,
            'price1' => $price1,
            'min2' => $min2,
            'max2' => $max2,
            'price2' => $price2,
            'min3' => $min3,
            'max3' => $max3,
            'price3' => $price3,
            'min4' => $min4,
            'max4' => $max4,
            'price4' => $price4,
            'min5' => $min5,
            'max5' => $max5,
            'price5' => $price5,
        ];
        $result = $this->adminModel->create_product_db($name, $subcat, $p_details, $created_byId, $data);


        if ($result) {
            $_SESSION['success'] = "product added successfully..!";
            redirect('admin/index');
        } else {
            $_SESSION['success'] = "try later..!";
            redirect('admin/index');
        }
    }









    public function all_products()
    {

        $products = $this->pageModel->get_all_products();
        $data = [
            'all_pro' => $products,
        ];

        $this->view('admin/all_products', $data);
    }

    public function all_cat_subcat()
    {

        $get_all_category = $this->adminModel->get_all_category();
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_category' => $get_all_category,
            'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('admin/all_cat_subcat', $data);
    }





    public function del_product($id)
    {
        $this->pageModel->delete_product($id);
        $_SESSION['success'] = "product deleted successfully";
        redirect('admin/all_products');
    }


    public function update_cod_customer($id)
    {
        if (isset($_POST['cod'])) {
            $cod_val = '1';
        } else {
            $cod_val = '0';
        }

        $codupdate = $this->adminModel->update_cod_customer($id, $cod_val);


        if ($codupdate) {
            $_SESSION['success'] = "COD Updated";
            redirect('admin/customers_cod');
        } else {

            $_SESSION['success'] = "COD Not Updated";
            redirect('admin/customers_cod');
        }
    }


    public function update_cod_vendor($id)
    {
        if (isset($_POST['cod'])) {
            $cod_val = '1';
        } else {
            $cod_val = '0';
        }

        $codupdate = $this->adminModel->update_cod_vendor($id, $cod_val);


        if ($codupdate) {
            $_SESSION['success'] = "COD Updated";
            redirect('admin/vendors_cod');
        } else {

            $_SESSION['success'] = "COD Not Updated";
            redirect('admin/vendors_cod');
        }
    }







    public function change_pass()
    {
        $this->view('admin/change_pass');
    }





    public function add_coupon_vendor()
    {
        $get_all_vendors = $this->pageModel->get_all_vendors();


        $data = [
            'all_vendors' => $get_all_vendors
        ];

        $this->view('admin/add_coupon_vendor', $data);
    }




    public function add_coupon_subcat()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('admin/add_coupon_subcat', $data);
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
                            redirect('admin/change_pass');
                        } else {
                            $_SESSION['success'] = "Confirm Password not matching with New Password";
                            redirect('admin/change_pass');
                        }
                    } else {
                        $_SESSION['success'] = "Enter Confirm Password";
                        redirect('admin/change_pass');
                    }
                } else {
                    $_SESSION['success'] = "Enter New Password";
                    redirect('admin/change_pass');
                }
            } else {
                $_SESSION['success'] = "current password not matching";
                redirect('admin/change_pass');
            }
        } else {
            $_SESSION['success'] = "Enter current Password";
            redirect('admin/change_pass');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('admin/login');
    }


    public function orders2()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
            'all_orders' => $products,
        ];
        $this->view('admin/orders', $data);
    }


    public function returns()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
            'all_orders' => $products,
        ];
        $this->view('admin/returns', $data);
    }
    public function add_profile_temp()
    {

        $this->view('admin/add_profile_temp');
    }
    public function create_profile()
    {
        // $question_faq = $_POST['question_faq'];

        // $q = implode(',',$question_faq);
        // print_r ($q);

        // die();

        $this->view('admin/create_profile');
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
            redirect('admin/add_teacher');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/add_teacher');
        }
    }

    public function label_orders()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
            'all_orders' => $products,
        ];
        $this->view('admin/label_orders', $data);
    }


    // public function order_invoice1($id)
    // {
    //     $p_details = $this->adminModel->get_all_userinfo();
    //     $all_lab = $this->adminModel->find_all_order();

    //     $get_order_details = $this->adminModel->get_order_details($id);
    //     $all_order = $this->adminModel->get_pharmacy_med_list($id);
    //     $get_invoice_details = $this->adminModel->get_pharmacy_med_list_single($id);

    //     $data = [
    //         // 'p_details' => $p_details,
    //         // 'all_lab' => $all_lab,
    //         'sa' => 'n_book',
    //         'get_order_details' =>  $get_order_details,
    //         'get_invoice_details' => $get_invoice_details,
    //         'sa' => 'p_book',
    //         'id' => $id,
    //         'all_order' => $all_order,
    //     ];

    //     $this->view('admin/order_invoice1', $data);
    // }


    public function change_state($id)
    {
        // echo 111;
        $st = $_POST['st'];
        $this->adminModel->change_status($id, $st);
        $_SESSION['success'] = "Status changed";
        redirect('admin/all_orders');
    }


    public function update_pod($id)
    {
        $pod_number = $_POST['pod_number'];
        $pod_transport_type = $_POST['pod_transport_type'];
        $pod_vehicle_name = $_POST['pod_vehicle_name'];
        $pod_vehicle_number = $_POST['pod_vehicle_number'];
        $pod_booking_time = $_POST['pod_booking_time'];
        $pod_contact_number = $_POST['pod_contact_number'];
        $this->pageModel->updatePOD($id, $pod_number, $pod_transport_type, $pod_vehicle_name, $pod_vehicle_number, $pod_booking_time, $pod_contact_number);
        $_SESSION['success'] = "pod Updated";
        redirect('admin/order/' . $id);
    }


    public function view_order($id)
    {
        $get_order = $this->pageModel->getOrderById($id);

        $get_order_detail = $this->pageModel->getOrderDetailById($id);

        $data = [
            'get_order' => $get_order,
            'get_order_detail' => $get_order_detail
        ];

        $this->view('admin/view_order', $data);
    }


    public function driver($id)
    {
        $get_driver = $this->pageModel->getDriverById($id);

        $data = [
            'driver' => $get_driver,
        ];

        $this->view('admin/driver', $data);
    }



    public function transactions2()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
            'all_orders' => $products,
        ];
        $this->view('admin/transactions', $data);
    }

    public function reports2()
    {
        $this->view('admin/reports');
    }

    public function vendor_verify($id)
    {
        $verified = $this->adminModel->verify_vendor($id);

        if ($verified) {
            $_SESSION['success'] = "Vendor Verified!";
            redirect('admin/view_vendor/' . $id);
        } else {
            $_SESSION['success'] = "Vendor Not Verified!";
            redirect('admin/view_vendor/' . $id);
        }
    }


    public function customer_verify($id)
    {
        $verified = $this->adminModel->verify_customer($id);

        if ($verified) {
            $_SESSION['success'] = "Customer Verified!";
            redirect('admin/view_customer/' . $id);
        } else {
            $_SESSION['success'] = "Customer Not Verified!";
            redirect('admin/view_customer/' . $id);
        }
    }





    public function vendors()
    {

        $get_all_vendors = $this->pageModel->get_all_vendors();
        $data = [
            'vendors' => $get_all_vendors
        ];

        $this->view('admin/vendors', $data);
    }


    public function delivery()
    {

        $get_all_delivery = $this->pageModel->getDelivery();
        $data = [
            'deliveries' => $get_all_delivery
        ];

        $this->view('admin/delivery', $data);
    }


    public function vendors_cod()
    {

        $get_all_vendors = $this->pageModel->get_all_vendors();


        $data = [
            'all_vendors' => $get_all_vendors
        ];



        $this->view('admin/vendors_cod', $data);
    }




    public function view_vendor($id)
    {
        $get_user = $this->pageModel->get_userinfo($id);
        $get_vendor = $this->pageModel->getVendorById($id);


        $data = [
            'user_detail' => $get_user,
            'vendor_detail' => $get_vendor,
        ];

        $this->view('admin/view_vendor', $data);
    }


    public function view_customer($id)
    {
        $get_user = $this->pageModel->get_userinfo($id);
        $get_customer = $this->pageModel->get_custinfo($id);


        $data = [
            'user_detail' => $get_user,
            'customer_detail' => $get_customer
        ];

        $this->view('admin/view_customer', $data);
    }



    public function profile()
    {
        $id = $_SESSION['rexkod_vendor_id'];
        $get_user = $this->pageModel->get_userinfo($id);
        $get_vendor = $this->pageModel->getVendorById($id);


        $data = [
            'user_detail' => $get_user,
            'vendor_detail' => $get_vendor,
        ];
        $this->view('admin/profile', $data);
    }



    public function admin_register()
    {
        $this->view('admin/admin_register');
    }




    public function add_driver()
    {

        $this->view('admin/add_driver');
    }

    public function add_delivery()
    {

        $this->view('admin/add_delivery');
    }


    public function driver2()
    {

        $this->view('admin/driver2');
    }




    public function add_profile()
    {

        $get_all_subcategory = $this->adminModel->get_all_subcategory();


        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $name = $_POST['name'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $pincode = $_POST['pincode'];
            $gst = $_POST['gst'];
            $timing = $_POST['timing'];
            $minval = $_POST['minval'];
            $subcat_id = $_POST['subcat_id'];


            if ($this->pageModel->add_vendor_profile($name, $address, $city, $state, $pincode, $gst, $timing, $minval, $subcat_id)) {
                $_SESSION['success'] = "Profile Added Successfully..! ";
                redirect('admin/profile');
            } else {
                $_SESSION['success'] = 'Profile Not Added';
                $this->view('admin/add_profile');
            }
        } else {
            $this->view('admin/add_profile', $data);
        }
    }

    public function create_driver()
    {


        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $licence_number = $_POST['licence_number'];
        $vehicle_maker = $_POST['vehicle_maker'];
        $vehicle_model = $_POST['vehicle_model'];
        $vehicle_number = $_POST['vehicle_number'];
        $aadhaar_number = $_POST['aadhaar_number'];

        if (!empty($_FILES['photo_file']['name'])) {
            $f_name = $_FILES['photo_file']['name'];
            $f_temp = $_FILES['photo_file']['tmp_name'];
            $size = $_FILES['photo_file']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_admin_id'] . "" . $unqdate . "" . $unqtime;
            $f_newfile = $unqname . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $pfile = $f_newfile;
        } else {
            $pfile = null;
        }



        if (!empty($_FILES['licence_file']['name'])) {
            $f_name = $_FILES['licence_file']['name'];
            $f_temp = $_FILES['licence_file']['tmp_name'];
            $size = $_FILES['licence_file']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_admin_id'] . "" . $unqdate . "" . $unqtime;
            $f_newfile = $unqname . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $lfile = $f_newfile;
        } else {
            $lfile = null;
        }


        if (!empty($_FILES['vehicle_file']['name'])) {
            $f_name = $_FILES['vehicle_file']['name'];
            $f_temp = $_FILES['vehicle_file']['tmp_name'];
            $size = $_FILES['vehicle_file']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_admin_id'] . "" . $unqdate . "" . $unqtime;
            $f_newfile = $unqname . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $vfile = $f_newfile;
        } else {
            $vfile = null;
        }

        if (!empty($_FILES['aadhaar_file']['name'])) {
            $f_name = $_FILES['aadhaar_file']['name'];
            $f_temp = $_FILES['aadhaar_file']['tmp_name'];
            $size = $_FILES['aadhaar_file']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_admin_id'] . "" . $unqdate . "" . $unqtime;
            $f_newfile = $unqname . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $afile = $f_newfile;
        } else {
            $afile = null;
        }



        if ($this->pageModel->create_driver($first_name, $last_name, $email, $phone, $address, $city, $state, $pincode, $pfile, $licence_number, $lfile, $vehicle_maker, $vehicle_model, $vehicle_number, $vfile, $aadhaar_number, $afile)) {
            $_SESSION['success'] = "Driver Added Successfully..! ";
            redirect('admin/drivers');
        } else {
            $_SESSION['success'] = 'Driver Not Added';
            $this->view('admin/add_driver');
        }
    }


    public function create_delivery()
    {


        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $pass = password_hash($phone, PASSWORD_DEFAULT);


        if ($this->pageModel->create_delivery($name, $email, $phone, $pass)) {
            $_SESSION['success'] = "Delivery Agent Added Successfully..! ";
            redirect('admin/delivery');
        } else {
            $_SESSION['success'] = 'Delivery Agent Not Added';
            $this->view('admin/add_delivery');
        }
    }




    public function settings()
    {
        $this->view('admin/settings');
    }

    public function shipping_subcat()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];
        $this->view('admin/shipping_subcat', $data);
    }

    public function shipping_range()
    {
        $this->view('admin/shipping_range');
    }

    public function tcs_certificate_vendor()
    {
        $this->view('admin/tcs_certificate_vendor');
    }

    public function tcs_certificate_customer()
    {
        $this->view('admin/tcs_certificate_customer');
    }


    public function add_user()
    {
        $this->view('admin/add_user');
    }

    public function payout()
    {
        $this->view('admin/payout');
    }

    public function invoice()
    {
        $this->view('admin/invoice');
    }
    public function resume()
    {
        $this->view('admin/resume');
    }
    public function resume_printout($student_id)
    {
        $data = [
            'student_id' => $student_id,
        ];
        $this->view('admin/resume_printout', $data);
    }
    public function resume_single()
    {
        $this->view('admin/resume_single');
    }

    public function create_user()
    {

        $pass = $_POST['password'];

        $pass1 = password_hash($pass, PASSWORD_DEFAULT);

        $data = [

            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'ph_no' => $_POST['ph_no'],
            'address' => $_POST['address'],
            'pin_code' => $_POST['pin_code'],
            'password' => $pass1,
        ];

        $insert_auth_deliveryUser = $this->adminModel->insert_auth_deliveryUser($data);

        $_SESSION['success'] = "Delivery user Created Successfully";
        redirect('admin/all_deliveryUsers');
    }

    public function all_deliveryUsers()
    {
        $get_all_deliveryUsers = $this->adminModel->get_all_deliveryUsers();

        $data = [

            'get_all_deliveryUsers' => $get_all_deliveryUsers,
        ];

        $this->view('admin/all_deliveryUsers', $data);
    }

    public function edit_deliveryUser($id)
    {

        $get_all_by_ID = $this->adminModel->get_all_by_ID($id);

        $data = [

            'get_all_by_ID' => $get_all_by_ID,
        ];

        $this->view('admin/edit_deliveryUser', $data);
    }

    public function update_user()
    {
        if (empty($_POST['password'])) {

            $data = [

                'auth_id' => $_POST['auth_id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'ph_no' => $_POST['ph_no'],
                'address' => $_POST['address'],
                'pin_code' => $_POST['pin_code'],
            ];

            $update_auth_deliveryUser = $this->adminModel->update_auth_deliveryUser($data);

            $_SESSION['success'] = "Delivery user Updated Successfully";
            redirect('admin/all_deliveryUsers');
        } else {
            $pass = $_POST['password'];

            $pass1 = password_hash($pass, PASSWORD_DEFAULT);


            $data = [

                'auth_id' => $_POST['auth_id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'ph_no' => $_POST['ph_no'],
                'address' => $_POST['address'],
                'pin_code' => $_POST['pin_code'],
                'password' => $pass1,
            ];

            $update_auth_deliveryUser = $this->adminModel->update_auth_deliveryUser1($data);

            $_SESSION['success'] = "Delivery user Updated Successfully";
            redirect('admin/all_deliveryUsers');
        }
    }

    public function delete_deliveryUser($id)
    {

        $delete_deliveryUserby_id = $this->adminModel->delete_deliveryUserby_id($id);

        $_SESSION['success'] = "Delivery user deleted Successfully";
        redirect('admin/all_deliveryUsers');
    }

    public function assign_orders()
    {
        $get_all_deliveryUsers = $this->adminModel->get_all_deliveryUsers();

        $products = $this->adminModel->get_all_orders();

        $data = [
            'all_pro' => $products,
            'get_all_deliveryUsers' => $get_all_deliveryUsers,
        ];

        $this->view('admin/assign_orders', $data);
    }

    public function assign_deliveryUser($id)
    {

        $get_all_by_ID = $this->adminModel->get_all_by_ID($_POST['delivery_user']);

        $this->adminModel->change_deliverystatus($id, $get_all_by_ID->auth_id, $get_all_by_ID->name);

        $_SESSION['success'] = "Delivery User Assigned Successfully";
        redirect('admin/assign_orders');
    }








    public function add_subcategory()
    {
        $get_all_category = $this->adminModel->get_all_category();

        $data = [
            'all_category' => $get_all_category,
        ];

        $this->view('admin/add_subcategory', $data);
    }


    public function create_category()
    {
        $category_name = $_POST['category_name'];

        $this->adminModel->create_category($category_name);

        $_SESSION['success'] = "Category created Successfully";
        redirect('admin/index');
    }


    public function create_coupon()
    {
        $coupon_title = $_POST['coupon_title'];
        $coupon_vendor = $_POST['coupon_vendor'];
        if (!isset($coupon_vendor)) {
            $coupon_vendor = 0;
        }
        $coupon_subcat = $_POST['coupon_subcat'];
        if (!isset($coupon_subcat)) {
            $coupon_subcat = 0;
        }
        $coupon_code = $_POST['coupon_code'];
        $coupon_type = $_POST['coupon_type'];
        $coupon_value = $_POST['coupon_value'];
        $coupon_cap = $_POST['coupon_cap'];

        $coupon_stat = $this->adminModel->create_coupon($coupon_title, $coupon_vendor, $coupon_subcat, $coupon_code, $coupon_type, $coupon_value, $coupon_cap);

        if ($coupon_stat) {
            $_SESSION['success'] = "Coupon created Successfully";
            redirect('admin/coupons');
        } else {
            $_SESSION['success'] = "Coupon not created";
            redirect('admin/add_coupon');
        }
    }



    public function create_subcategory()
    {
        $subcategory_name = $_POST['subcategory_name'];
        $category_id = $_POST['category_id'];
        $subcategory_hsn = $_POST['subcategory_hsn'];
        $subcategory_tax = $_POST['subcategory_tax'];
        $shipping_cost = $_POST['shipping_cost'];

        $cursub = $this->adminModel->create_subcategory($subcategory_name, $category_id, $subcategory_hsn, $subcategory_tax, $shipping_cost);

        if ($cursub) {
            $_SESSION['success'] = "Subcategory created Successfully";
            redirect('admin/subcategory');
        } else {
            $_SESSION['success'] = "Subcategory Not Created";
            redirect('admin/add_subcategory');
        }
    }



    public function category()
    {

        $get_all_category = $this->adminModel->get_all_category();

        $data = [
            'all_category' => $get_all_category,
        ];

        $this->view('admin/category', $data);
    }




    public function coupons()
    {

        $get_all_coupons = $this->adminModel->get_all_coupons();

        $data = [
            'all_coupons' => $get_all_coupons,
        ];

        $this->view('admin/coupons', $data);
    }


    public function subcategory()
    {

        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('admin/subcategory', $data);
    }


    public function payouts()
    {

        $get_payouts = $this->adminModel->get_all_payouts();

        $data = [
            'all_payouts' => $get_payouts,
        ];

        $this->view('admin/payouts', $data);
    }



    public function edit_category($id)
    {
        $get_categoryBy_id = $this->adminModel->getCategoryById($id);

        $data = [
            'category' => $get_categoryBy_id,
        ];

        $this->view('admin/edit_category', $data);
    }


    public function edit_subcategory($id)
    {
        $get_subcategoryBy_id = $this->adminModel->getSubcategoryById($id);

        $data = [
            'subcategory' => $get_subcategoryBy_id,
        ];

        $this->view('admin/edit_subcategory', $data);
    }




    public function vendor_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $phno = $_POST['phno'];
            $pass = $_POST['password'];

            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('admin/admin_register');
            } elseif ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('admin/admin_register');
            } else {


                if ($this->pageModel->findUserByphno($phno)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('admin/admin_register');
                } else {

                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                    if ($this->adminModel->add_vendor($email, $phno, $pass)) {

                        $user = $this->pageModel->ulogin($email, $_POST['password']);

                        $_SESSION['rexkod_vendor_id'] = $user->id;
                        $_SESSION['rexkod_vendor_email'] = $user->email;
                        $_SESSION['rexkod_vendor_phone'] = $user->phone;
                        $_SESSION['rexkod_login_type'] = $user->type;

                        $_SESSION['success'] = "Registered Successfully..! ";
                        redirect('admin/index');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('admin/admin_register');
                    }
                }
            }
        } else {
            redirect('admin/admin_register');
        }
    }




    public function update_category()
    {
        $get_categoryBy_id = $this->adminModel->get_categoryBy_id($_POST['id']);

        $update_category = $this->adminModel->update_category($_POST['id'], $_POST['category_name'], $get_categoryBy_id->img);

        $_SESSION['success'] = "Category updated Successfully";
        redirect('admin/all_category');
    }


    public function update_delivery_agent($oid)
    {
        $agentid = $_POST['delivery_agent'];
        $update_delivery = $this->pageModel->update_delivery_agent($oid, $agentid);

        $_SESSION['success'] = "Delivery Agent Added Successfully";
        redirect('admin/order/' . $oid);
    }

    public function update_pickup_agent($oid)
    {
        $agentid = $_POST['pickup_agent'];
        $update_delivery = $this->pageModel->update_pickup_agent($oid, $agentid);

        $_SESSION['success'] = "Pickup Agent Added Successfully";
        redirect('admin/order/' . $oid);
    }

    public function change_status_category($id)
    {
        $id_arr = explode("|", $id);

        if ($id_arr[1] == 11) {
            $status = 1;
        } elseif ($id_arr[1] == 22) {
            $status = 0;
        }

        $update_status_category = $this->adminModel->update_status_category($id_arr[0], $status);

        $_SESSION['success'] = "Status updated Successfully";
        redirect('admin/all_category');
    }


    public function change_status_order($id)
    {
        $id_arr = explode("|", $id);

        if ($id_arr[1] == 11) {
            $status = 1;
        } elseif ($id_arr[1] == 22) {
            $status = 0;
        }

        $update_status_order = $this->adminModel->update_status_order();

        $_SESSION['success'] = "Status updated Successfully";
        redirect('admin/all_category');
    }

    public function edit_product($id)
    {
        $get_productBy_id = $this->adminModel->get_productBy_id($id);

        $data = [
            'product' => $get_productBy_id,
        ];

        $this->view('admin/edit_product', $data);
    }





    public function update_active_status($id)
    {
        $id_arr = explode("|", $id);

        if ($id_arr[1] == 1) {
            $update_active_status_db = $this->adminModel->update_active_status_db($id_arr[0], 1);

            $_SESSION['success'] = "Delivery User Activated successfully";

            redirect('admin/all_deliveryUsers');
        } elseif ($id_arr[1] == 0) {
            $update_active_status_db = $this->adminModel->update_active_status_db($id_arr[0], 0);

            $_SESSION['success'] = "Delivery User De-Activated successfully";

            redirect('admin/all_deliveryUsers');
        }
    }

    public function product_ratings()
    {

        $products = $this->pageModel->get_all_products();
        $data = [
            'all_pro' => $products,
        ];
        $this->view('admin/product_ratings', $data);
    }

    public function qr_code()
    {
        $res = $this->pageModel->ulogin_using_rowId($_SESSION['user_id']);

        $data = [
            'res' => $res
        ];

        $this->view('admin/qr_code', $data);
    }

    public function create_QR()
    {
        if (!empty($_FILES['files_display']['name'])) {
            $f_name = $_FILES['files_display']['name'];
            $f_temp = $_FILES['files_display']['tmp_name'];
            $size = $_FILES['files_display']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $_SESSION['attachment'] = $f_newfile;
        } else {
            $_SESSION['attachment'] = "demo.png";
        }

        $products = $this->pageModel->change_QR($_SESSION['attachment']);

        $_SESSION['success'] = "QR code uploaded successfully";

        redirect('admin/qr_code');
    }


    public function view_orderDetails($id)
    {

        $get_order_details = $this->adminModel->get_order_details($id);

        $data = [

            'get_order_details' => $get_order_details,
        ];

        $this->view('admin/view_orderDetails', $data);
    }

    public function view_allProdByCat($id)
    {

        $view_allProdByCat = $this->adminModel->view_allProdByCat($id);

        $data = [

            'all_pro' => $view_allProdByCat,
        ];

        $this->view('admin/view_allProdByCat', $data);
    }


    public function download_excel()
    {




        $productResult = $this->adminModel->get_download_content();



        $this->exportProductDatabase($productResult);
    }



    public function customers()
    {
        $get_all_customers = $this->adminModel->get_all_customers();

        $data = [

            'all_customers' => $get_all_customers,
        ];

        $this->view('admin/customers', $data);
    }


    public function customers_cod()
    {
        $get_all_customers = $this->adminModel->get_all_customers();

        $data = [

            'all_customers' => $get_all_customers,
        ];

        $this->view('admin/customers_cod', $data);
    }





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

    public function banner()
    {
        $get_banner = $this->pageModel->get_banner();

        $data = [

            'get_banner' => $get_banner
        ];

        $this->view('admin/banner', $data);
    }
    public function clients()
    {


        $this->view('admin/clients');
    }
    public function admin_login()
    {


        $this->view('admin/admin_login');
    }
    public function ecom_invoice()
    {


        $this->view('admin/ecom_invoice');
    }



    public function create_banner()
    {

        if (!empty($_FILES['ban_file']['name'])) {
            $f_name = $_FILES['ban_file']['name'];
            $f_temp = $_FILES['ban_file']['tmp_name'];
            $size = $_FILES['ban_file']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $ban_filename = $f_newfile;
            $ban_pos = $_POST['ban_pos'];


            switch ($ban_pos) {
                case "Banner 1":
                    $ban_pos = "ban1";
                    break;
                case "Banner 2":
                    $ban_pos = "ban2";
                    break;
                case "Banner 3":
                    $ban_pos = "ban3";
                    break;
                case "Banner 4":
                    $ban_pos = "ban4";
                    break;
                case "Banner 5":
                    $ban_pos = "ban5";
                    break;
                case "Deal 1":
                    $ban_pos = "deal1";
                    break;
                case "Deal 2":
                    $ban_pos = "deal2";
                    break;
                case "Deal 3":
                    $ban_pos = "deal3";
                    break;
            }



            $result = $this->pageModel->add_banner_db($ban_filename, $ban_pos);
        }


        if ($result) {
            $_SESSION['success'] = "Banner Updated Successfully";
            redirect('admin/banner');
        } else {
            $_SESSION['success'] = "Banner Not Updated";
            redirect('admin/banner');
        }
    }

    // college
    public function test()
    {




        $this->view('admin/test');
    }
    public function test_result()
    {

        $abc = $_POST['abc'];
        $a = implode(',', $abc);

        $xyz = $_POST['xyz'];
        $z = implode(',', $xyz);
        echo $a;
        "</br>";
        echo $z;
        die();
    }

    public function update_college($id)
    {
        $get_college_detail = $this->adminModel->get_college_detail_ind($id);
        $get_college_course = $this->adminModel->get_college_course();
        $data = [
            'get_college_detail' => $get_college_detail,
            'get_college_course' => $get_college_course,
        ];
        $this->view('admin/update_college', $data);
    }

    public function view_college($id)
    {
        $get_college_detail = $this->adminModel->get_college_detail_ind($id);
        $get_college_course = $this->adminModel->get_college_course();
        $data = [
            'get_college_detail' => $get_college_detail,
            'get_college_course' => $get_college_course,
        ];
        $this->view('admin/view_college', $data);
    }
    public function review_college()
    {
        $last_college = $this->adminModel->last_added_college();
        $get_college_course = $this->adminModel->get_college_course();
        $data = [
            'last_added_college' => $last_college,
            'get_college_course' => $get_college_course,
        ];
        $this->view('admin/review_college', $data);
    }

    public function add_webinar_db()
    {

        if (!empty($_FILES['image']['name'])) {
            $f_name = $_FILES['image']['name'];
            $f_temp = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $image = $f_newfile;
        } else {
            $image = null;
        }
        $data = [
            'college_name' => $_POST['college_name'],
            'subject' => $_POST['subject'],
            'audience_no' => $_POST['audience_no'],
            'webinar_date' => $_POST['webinar_date'],
            'start_time' => $_POST['start_time'],
            'end_time' => $_POST['end_time'],
            'webinar_info' => $_POST['webinar_info'],
            'image' => $image,
        ];
        $add_webinar_db = $this->adminModel->add_webinar_db($data);
        if ($add_webinar_db) {
            $_SESSION['success'] = "Webinar Added Successfully..! ";
            redirect('admin/webinars');
        } else {
            $_SESSION['success'] = 'Webinar Not Added';
            redirect('admin/add_webinar');
        }
    }
    public function add_college_elements()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['auth_signature'];
            $phone = $_POST['auth_contact_number'];
            $email = $_POST['auth_email'];
            $password = $_POST['password'];

            if (!empty($_FILES['college_image']['name'])) {
                $f_name = $_FILES['college_image']['name'];
                $f_temp = $_FILES['college_image']['tmp_name'];
                $size = $_FILES['college_image']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $college_image = $f_newfile;
            } else {
                $college_image = null;
            }
            if (!empty($_FILES['mou']['name'])) {
                $f_name = $_FILES['mou']['name'];
                $f_temp = $_FILES['mou']['tmp_name'];
                $size = $_FILES['mou']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $mou = $f_newfile;
            } else {
                $mou = null;
            }
            if (!empty($_FILES['nda']['name'])) {
                $f_name = $_FILES['nda']['name'];
                $f_temp = $_FILES['nda']['tmp_name'];
                $size = $_FILES['nda']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $nda = $f_newfile;
            } else {
                $nda = null;
            }
            if (!empty($_FILES['declaration_form']['name'])) {
                $f_name = $_FILES['declaration_form']['name'];
                $f_temp = $_FILES['declaration_form']['tmp_name'];
                $size = $_FILES['declaration_form']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $declaration_form = $f_newfile;
            } else {
                $declaration_form = null;
            }
            if (!empty($_FILES['signatory_aadhar']['name'])) {
                $f_name = $_FILES['signatory_aadhar']['name'];
                $f_temp = $_FILES['signatory_aadhar']['tmp_name'];
                $size = $_FILES['signatory_aadhar']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $signatory_aadhar = $f_newfile;
            } else {
                $signatory_aadhar = null;
            }
            if (!empty($_FILES['other_document']['name'])) {
                $f_name = $_FILES['other_document']['name'];
                $f_temp = $_FILES['other_document']['tmp_name'];
                $size = $_FILES['other_document']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $other_document = $f_newfile;
            } else {
                $other_document = null;
            }
            if (!empty($_FILES['auth_image']['name'])) {
                $f_name = $_FILES['auth_image']['name'];
                $f_temp = $_FILES['auth_image']['tmp_name'];
                $size = $_FILES['auth_image']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $auth_image = $f_newfile;
            } else {
                $auth_image = null;
            }
            if (!empty($_FILES['cancelled_cheque']['name'])) {
                $f_name = $_FILES['cancelled_cheque']['name'];
                $f_temp = $_FILES['cancelled_cheque']['tmp_name'];
                $size = $_FILES['cancelled_cheque']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $cancelled_cheque = $f_newfile;
            } else {
                $cancelled_cheque = null;
            }
            if (!empty($_FILES['package_invoice']['name'])) {
                $f_name = $_FILES['package_invoice']['name'];
                $f_temp = $_FILES['package_invoice']['tmp_name'];
                $size = $_FILES['package_invoice']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $package_invoice = $f_newfile;
            } else {
                $package_invoice = null;
            }

            $count = 0;
            foreach ($_FILES['gallery']['name'] as $key => $val) {
                if ($val) {
                    $count++;
                    $f_name = $_FILES['gallery']['name'][$key];
                    $f_temp = $_FILES['gallery']['tmp_name'][$key];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $count . "" . $unqdate . "" . $unqtime;
                    $f_newfile = $unqname . '.' . $f_extension;
                    $store = "uploads/" . $f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $gallery[] = $f_newfile;
                } else {
                    $gallery = null;
                }
            }
            if ($gallery) {
                $gallery = implode(',', $gallery);
            }


            $count = 0;
            foreach ($_FILES['faculty_images']['name'] as $key => $val) {
                if ($val) {
                    $count++;
                    $f_name = $_FILES['faculty_images']['name'][$key];
                    $f_temp = $_FILES['faculty_images']['tmp_name'][$key];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $count . "" . $unqdate . "" . $unqtime;
                    $f_newfile = $unqname . '.' . $f_extension;
                    $store = "uploads/" . $f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $faculty_images[] = $f_newfile;
                } else {
                    $faculty_images = null;
                }
            }
            if ($faculty_images) {
                $faculty_images = implode(',', $faculty_images);
            }

            $count = 0;
            foreach ($_FILES['hostel_images']['name'] as $key => $val) {
                if ($val) {
                    $count++;
                    $f_name = $_FILES['hostel_images']['name'][$key];
                    $f_temp = $_FILES['hostel_images']['tmp_name'][$key];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $count . "" . $unqdate . "" . $unqtime;
                    $f_newfile = $unqname . '.' . $f_extension;
                    $store = "uploads/" . $f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $hostel_images[] = $f_newfile;
                } else {
                    $hostel_images = null;
                }
            }
            if ($hostel_images) {
                $hostel_images = implode(',', $hostel_images);
            }

            $count = 0;
            foreach ($_FILES['placement_images']['name'] as $key => $val) {
                if ($val) {
                    $count++;
                    $f_name = $_FILES['placement_images']['name'][$key];
                    $f_temp = $_FILES['placement_images']['tmp_name'][$key];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $count . "" . $unqdate . "" . $unqtime;
                    $f_newfile = $unqname . '.' . $f_extension;
                    $store = "uploads/" . $f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $placement_images[] = $f_newfile;
                } else {
                    $placement_images = null;
                }
            }
            if ($placement_images) {
                $placement_images = implode(',', $placement_images);
            }

            $count = 0;
            foreach ($_FILES['alumni_images']['name'] as $key => $val) {
                if ($val) {
                    $count++;
                    $f_name = $_FILES['alumni_images']['name'][$key];
                    $f_temp = $_FILES['alumni_images']['tmp_name'][$key];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $count . "" . $unqdate . "" . $unqtime;
                    $f_newfile = $unqname . '.' . $f_extension;
                    $store = "uploads/" . $f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $alumni_images[] = $f_newfile;
                } else {
                    $alumni_images = null;
                }
            }
            if ($alumni_images) {
                $alumni_images = implode(',', $alumni_images);
            }


            // if($_POST['cut_off_year']){
            //     $cut_off_year = implode(',', $_POST['cut_off_year']);
            // }else{
            //     $cut_off_year= Null;
            // }
            if ($_POST['question_faq']) {
                $question_faq = implode(',', $_POST['question_faq']);
            } else {
                $question_faq = null;
            }
            if ($_POST['answer_faq']) {
                $answer_faq = implode(',', $_POST['answer_faq']);
            } else {
                $answer_faq = null;
            }
            if ($_POST['college_course']) {
                $college_course = implode(',', $_POST['college_course']);
            } else {
                $college_course = null;
            }


            $cut_off_marks = $_POST['cut_off_marks'];

            if (empty($review_academic)) {
                $review_academic = 0;
            } else {
                $review_academic = 1;
            }

            if (empty($_POST['review_accomodation'])) {
                $review_accomodation = 0;
            } else {
                $review_accomodation = 1;
            }

            if (empty($_POST['review_faculty'])) {
                $review_faculty = 0;
            } else {
                $review_faculty = 1;
            }

            if (empty($_POST['review_infra'])) {
                $review_infra = 0;
            } else {
                $review_infra = 1;
            }

            if (empty($_POST['review_placement'])) {
                $review_placement = 0;
            } else {
                $review_placement = 1;
            }

            if (empty($_POST['review_social'])) {
                $review_social = 0;
            } else {
                $review_social = 1;
            }

            if (empty($_POST['review_course'])) {
                $review_course = 0;
            } else {
                $review_course = 1;
            }

            if (empty($_POST['review_campus'])) {
                $review_campus = 0;
            } else {
                $review_campus = 1;
            }




            $admission_criteria  = $_POST['admission_criteria'];

            // if($_POST['entrance_exam']){
            //     $entrance_exam = implode(',', $_POST['entrance_exam']);
            // }else{
            //     $entrance_exam= Null;
            // }

            if ($_POST['facility']) {
                $facility = implode(',', $_POST['facility']);
            } else {
                $facility = null;
            }
            if ($_POST['recognized_by']) {
                $recognized_by = implode(',', $_POST['recognized_by']);
            } else {
                $recognized_by = null;
            }

            $placement = $_POST['placement'];

            if (isset($_POST['website_check'])) {
                $website_check = 1;
            } else {
                $website_check = 0;
            }

            if (isset($_POST['package_renewal'])) {
                $package_renewal = 1;
            } else {
                $package_renewal = 0;
            }
            $data = [
                'college_image' => $college_image,
                'signatory_aadhar' => $signatory_aadhar,
                'auth_image' => $auth_image,
                'mou' => $mou,
                'nda' => $nda,
                'declaration_form' => $declaration_form,
                'other_document' => $other_document,
                'college_name' => $_POST['college_name'],
                'college_contact_no' => $_POST['college_contact_no'],
                'college_address' => $_POST['college_address'],
                'college_type' => $_POST['college_type'],
                'year_of_establishment' => $_POST['year_of_establishment'],
                'recognized_by' => $recognized_by,
                'college_pin_code' => $_POST['college_pin_code'],
                'college_city' => $_POST['college_city'],
                'state' => $_POST['state'],
                // 'student_teacher_ratio' => $_POST['student_teacher_ratio'],
                'legal_name' => $_POST['legal_name'],
                'accreditation_no' => $_POST['accreditation_no'],
                'accredited_by' => $_POST['accredited_by'],
                'registered_address' => $_POST['registered_address'],
                'facility' => $facility,
                'website_link' => $_POST['website_link'],
                'website_check' => $website_check,
                'college_info' => $_POST['college_info'],
                'college_course' => $college_course,
                'auth_signature' => $_POST['auth_signature'],
                'auth_designation' => $_POST['auth_designation'],
                'auth_aadhar_no' => $_POST['auth_aadhar_no'],
                'auth_email' => $_POST['auth_email'],
                'auth_contact_number' => $_POST['auth_contact_number'],
                'auth_contact_person' => $_POST['auth_contact_person'],
                'contact_person_designation' => $_POST['contact_person_designation'],
                'contact_person_details' => $_POST['contact_person_details'],
                'bank_name' => $_POST['bank_name'],
                'account_no' => $_POST['account_no'],
                're_account_no' => $_POST['re_account_no'],
                'college_name_as_per_bank' => $_POST['college_name_as_per_bank'],
                'cancelled_cheque' => $cancelled_cheque,
                'ifsc' => $_POST['ifsc'],
                'branch_name' => $_POST['branch_name'],
                'course_offered' => $_POST['course_offered'],
                'mode_of_admission' => $_POST['mode_of_admission'],
                'how_to_apply' => $_POST['how_to_apply'],
                'admission_criteria' => $admission_criteria,
                'entrance_exam' => $_POST['entrance_exam'],
                'review_academic' => $review_academic,
                'review_accomodation' => $review_accomodation,
                'review_faculty' => $review_faculty,
                'review_infra' => $review_infra,
                'review_placement' => $review_placement,
                'review_social' => $review_social,
                'review_course' => $review_course,
                'review_campus' => $review_campus,
                // 'cut_off_year' => $cut_off_year,
                'cut_off_marks' => $cut_off_marks,
                'placement' => $placement,
                'faculty_images' => $faculty_images,
                'hostel_images' => $hostel_images,
                'placement_images' => $placement_images,
                'gallery' => $gallery,
                'scholarship' => $_POST['scholarship'],
                'faculty' => $_POST['faculty'],
                'hostel' => $_POST['hostel'],
                'question_faq' => $question_faq,
                'answer_faq' => $answer_faq,
                'alumni' => $_POST['alumni'],
                'alumni_images' => $alumni_images,
                'package_name' => $_POST['package_name'],
                'package_cost' => $_POST['package_cost'],
                'package_start_date' => $_POST['package_start_date'],
                'package_end_date' => $_POST['package_end_date'],
                'package_description' => $_POST['package_description'],
                'package_validity' => $_POST['package_validity'],
                'package_other_detail' => $_POST['package_other_detail'],
                'package_renewal' => $package_renewal,
                'package_invoice' => $package_invoice,

            ];

            //     $add_college = $this->adminModel->add_college_elements($data);
            //     if ($add_college) {
            //         $_SESSION['success'] = "Please re-verify your fields";
            //         redirect('admin/review_college');
            //     } else {
            //         $_SESSION['success'] = 'College Not Added';
            //         redirect('admin/add_college');
            //     }
            // }
            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('admin/add_college');
            } elseif ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('admin/add_college');
            } else {


                if ($this->pageModel->findUserByphno($phone)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('admin/add_college');
                } else {

                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    if ($this->adminModel->add_college_elements($data, $pass)) {
                        $user = $this->pageModel->ulogin($email, $_POST['password']);
                        $_SESSION['success'] = "Please re-verify your fields";
                        redirect('admin/review_college');
                    } else {
                        $_SESSION['success'] = 'College Not Added!';
                        redirect('admin/add_college');
                    }
                }
            }
        } else {
            $_SESSION['success'] = 'School Not Added';
            redirect('admin/add_college');
        }
    }

    public function update_college_elements($id)
    {
        $get_college_detail = $this->adminModel->get_college_detail_ind($id);
        if (!empty($_FILES['college_image']['name'])) {
            $f_name = $_FILES['college_image']['name'];
            $f_temp = $_FILES['college_image']['tmp_name'];
            $size = $_FILES['college_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $college_image = $f_newfile;
        } else {
            $college_image = $get_college_detail->college_image;
        }
        if (!empty($_FILES['mou']['name'])) {
            $f_name = $_FILES['mou']['name'];
            $f_temp = $_FILES['mou']['tmp_name'];
            $size = $_FILES['mou']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $mou = $f_newfile;
        } else {
            $mou = $get_college_detail->mou;
        }
        if (!empty($_FILES['nda']['name'])) {
            $f_name = $_FILES['nda']['name'];
            $f_temp = $_FILES['nda']['tmp_name'];
            $size = $_FILES['nda']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $nda = $f_newfile;
        } else {
            $nda = $get_college_detail->nda;
        }
        if (!empty($_FILES['declaration_form']['name'])) {
            $f_name = $_FILES['declaration_form']['name'];
            $f_temp = $_FILES['declaration_form']['tmp_name'];
            $size = $_FILES['declaration_form']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $declaration_form = $f_newfile;
        } else {
            $declaration_form = $get_college_detail->declaration_form;
        }
        if (!empty($_FILES['signatory_aadhar']['name'])) {
            $f_name = $_FILES['signatory_aadhar']['name'];
            $f_temp = $_FILES['signatory_aadhar']['tmp_name'];
            $size = $_FILES['signatory_aadhar']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $signatory_aadhar = $f_newfile;
        } else {
            $signatory_aadhar = $get_college_detail->signatory_aadhar;
        }
        if (!empty($_FILES['other_document']['name'])) {
            $f_name = $_FILES['other_document']['name'];
            $f_temp = $_FILES['other_document']['tmp_name'];
            $size = $_FILES['other_document']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $other_document = $f_newfile;
        } else {
            $other_document = $get_college_detail->other_document;
        }
        if (!empty($_FILES['auth_image']['name'])) {
            $f_name = $_FILES['auth_image']['name'];
            $f_temp = $_FILES['auth_image']['tmp_name'];
            $size = $_FILES['auth_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $auth_image = $f_newfile;
        } else {
            $auth_image = $get_college_detail->auth_image;
        }
        if (!empty($_FILES['cancelled_cheque']['name'])) {
            $f_name = $_FILES['cancelled_cheque']['name'];
            $f_temp = $_FILES['cancelled_cheque']['tmp_name'];
            $size = $_FILES['cancelled_cheque']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $cancelled_cheque = $f_newfile;
        } else {
            $cancelled_cheque = $get_college_detail->cancelled_cheque;
        }
        if (!empty($_FILES['package_invoice']['name'])) {
            $f_name = $_FILES['package_invoice']['name'];
            $f_temp = $_FILES['package_invoice']['tmp_name'];
            $size = $_FILES['package_invoice']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $package_invoice = $f_newfile;
        } else {
            $package_invoice = $get_college_detail->package_invoice;
        }

        $count = 0;
        foreach ($_FILES['gallery']['name'] as $key => $val) {
            if ($val) {
                $count++;
                $f_name = $_FILES['gallery']['name'][$key];
                $f_temp = $_FILES['gallery']['tmp_name'][$key];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $count . "" . $unqdate . "" . $unqtime;
                $f_newfile = $unqname . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $gallery[] = $f_newfile;
            } else {
                $gallery = null;
            }
        }
        if ($gallery) {
            $gallery = implode(',', $gallery);
        } else {
            $gallery = $get_college_detail->gallery;
        }


        $count = 0;
        foreach ($_FILES['faculty_images']['name'] as $key => $val) {
            if ($val) {
                $count++;
                $f_name = $_FILES['faculty_images']['name'][$key];
                $f_temp = $_FILES['faculty_images']['tmp_name'][$key];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $count . "" . $unqdate . "" . $unqtime;
                $f_newfile = $unqname . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $faculty_images[] = $f_newfile;
            } else {
                $faculty_images = null;
            }
        }
        if ($faculty_images) {
            $faculty_images = implode(',', $faculty_images);
        } else {
            $faculty_images = $get_college_detail->faculty_images;
        }

        $count = 0;
        foreach ($_FILES['hostel_images']['name'] as $key => $val) {
            if ($val) {
                $count++;
                $f_name = $_FILES['hostel_images']['name'][$key];
                $f_temp = $_FILES['hostel_images']['tmp_name'][$key];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $count . "" . $unqdate . "" . $unqtime;
                $f_newfile = $unqname . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $hostel_images[] = $f_newfile;
            } else {
                $hostel_images = null;
            }
        }
        if ($hostel_images) {
            $hostel_images = implode(',', $hostel_images);
        } else {
            $hostel_images = $get_college_detail->hostel_images;
        }

        $count = 0;
        foreach ($_FILES['placement_images']['name'] as $key => $val) {
            if ($val) {
                $count++;
                $f_name = $_FILES['placement_images']['name'][$key];
                $f_temp = $_FILES['placement_images']['tmp_name'][$key];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $count . "" . $unqdate . "" . $unqtime;
                $f_newfile = $unqname . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $placement_images[] = $f_newfile;
            } else {
                $placement_images = null;
            }
        }
        if ($placement_images) {
            $placement_images = implode(',', $placement_images);
        } else {
            $placement_images = $get_college_detail->placement_images;
        }

        $count = 0;
        foreach ($_FILES['alumni_images']['name'] as $key => $val) {
            if ($val) {
                $count++;
                $f_name = $_FILES['alumni_images']['name'][$key];
                $f_temp = $_FILES['alumni_images']['tmp_name'][$key];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $count . "" . $unqdate . "" . $unqtime;
                $f_newfile = $unqname . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $alumni_images[] = $f_newfile;
            } else {
                $alumni_images = null;
            }
        }
        if ($alumni_images) {
            $alumni_images = implode(',', $alumni_images);
        } else {
            $alumni_images = $get_college_detail->alumni_images;
        }


        // if($_POST['cut_off_year']){
        //     $cut_off_year = implode(',', $_POST['cut_off_year']);
        // }else{
        //     $cut_off_year= Null;
        // }
        // if($_POST['question_faq']){
        //     $question_faq = implode(',', $_POST['question_faq']);
        // }else{
        //     $question_faq= Null;
        // }
        // if($_POST['answer_faq']){
        //     $answer_faq = implode(',', $_POST['answer_faq']);
        // }else{
        //     $answer_faq= Null;
        // }
        $cut_off_year = $get_college_detail->cut_off_year;
        $question_faq = $get_college_detail->question_faq;
        $answer_faq = $get_college_detail->answer_faq;
        if ($_POST['college_course']) {
            $college_course = implode(',', $_POST['college_course']);
        } else {
            $college_course = null;
        }

        $cut_off_marks = $_POST['cut_off_marks'];

        if (empty($review_academic)) {
            $review_academic = 0;
        } else {
            $review_academic = 1;
        }

        if (empty($_POST['review_accomodation'])) {
            $review_accomodation = 0;
        } else {
            $review_accomodation = 1;
        }

        if (empty($_POST['review_faculty'])) {
            $review_faculty = 0;
        } else {
            $review_faculty = 1;
        }

        if (empty($_POST['review_infra'])) {
            $review_infra = 0;
        } else {
            $review_infra = 1;
        }

        if (empty($_POST['review_placement'])) {
            $review_placement = 0;
        } else {
            $review_placement = 1;
        }

        if (empty($_POST['review_social'])) {
            $review_social = 0;
        } else {
            $review_social = 1;
        }

        if (empty($_POST['review_course'])) {
            $review_course = 0;
        } else {
            $review_course = 1;
        }

        if (empty($_POST['review_campus'])) {
            $review_campus = 0;
        } else {
            $review_campus = 1;
        }

        $admission_criteria  = $_POST['admission_criteria'];

        // if ($_POST['entrance_exam']) {
        //     $entrance_exam = implode(',', $_POST['entrance_exam']);
        // } else {
        //     $entrance_exam = Null;
        // }

        if ($_POST['facility']) {
            $facility = implode(',', $_POST['facility']);
        } else {
            $facility = null;
        }
        if ($_POST['recognized_by']) {
            $recognized_by = implode(',', $_POST['recognized_by']);
        } else {
            $recognized_by = null;
        }

        $placement = $_POST['placement'];

        if (isset($_POST['website_check'])) {
            $website_check = 1;
        } else {
            $website_check = 0;
        }
        if (isset($_POST['package_renewal'])) {
            $package_renewal = 1;
        } else {
            $package_renewal = 0;
        }
        $data = [
            'college_image' => $college_image,
            'signatory_aadhar' => $signatory_aadhar,
            'auth_image' => $auth_image,
            'mou' => $mou,
            'nda' => $nda,
            'declaration_form' => $declaration_form,
            'other_document' => $other_document,
            'college_name' => $_POST['college_name'],
            'college_contact_no' => $_POST['college_contact_no'],
            'college_address' => $_POST['college_address'],
            'college_type' => $_POST['college_type'],
            'year_of_establishment' => $_POST['year_of_establishment'],
            'recognized_by' => $recognized_by,
            'college_pin_code' => $_POST['college_pin_code'],
            'college_city' => $_POST['college_city'],
            'state' => $_POST['state'],
            'student_teacher_ratio' => $_POST['student_teacher_ratio'],
            'legal_name' => $_POST['legal_name'],
            'accreditation_no' => $_POST['accreditation_no'],
            'accredited_by' => $_POST['accredited_by'],
            'registered_address' => $_POST['registered_address'],
            'facility' => $facility,
            'website_link' => $_POST['website_link'],
            'website_check' => $website_check,
            'college_info' => $_POST['college_info'],
            'college_course' => $college_course,
            'auth_signature' => $_POST['auth_signature'],
            'auth_designation' => $_POST['auth_designation'],
            'auth_aadhar_no' => $_POST['auth_aadhar_no'],
            'auth_email' => $_POST['auth_email'],
            'auth_contact_number' => $_POST['auth_contact_number'],
            'auth_contact_person' => $_POST['auth_contact_person'],
            'contact_person_designation' => $_POST['contact_person_designation'],
            'contact_person_details' => $_POST['contact_person_details'],
            'bank_name' => $_POST['bank_name'],
            'account_no' => $_POST['account_no'],
            're_account_no' => $_POST['re_account_no'],
            'college_name_as_per_bank' => $_POST['college_name_as_per_bank'],
            'cancelled_cheque' => $cancelled_cheque,
            'ifsc' => $_POST['ifsc'],
            'branch_name' => $_POST['branch_name'],
            'course_offered' => $_POST['course_offered'],
            'mode_of_admission' => $_POST['mode_of_admission'],
            'how_to_apply' => $_POST['how_to_apply'],
            'admission_criteria' => $admission_criteria,
            'entrance_exam' => $_POST['entrance_exam'],
            'review_academic' => $review_academic,
            'review_accomodation' => $review_accomodation,
            'review_faculty' => $review_faculty,
            'review_infra' => $review_infra,
            'review_placement' => $review_placement,
            'review_social' => $review_social,
            'review_course' => $review_course,
            'review_campus' => $review_campus,
            'cut_off_year' => $cut_off_year,
            'cut_off_marks' => $cut_off_marks,
            'placement' => $placement,
            'faculty_images' => $faculty_images,
            'hostel_images' => $hostel_images,
            'placement_images' => $placement_images,
            'gallery' => $gallery,
            'scholarship' => $_POST['scholarship'],
            'faculty' => $_POST['faculty'],
            'hostel' => $_POST['hostel'],
            'question_faq' => $question_faq,
            'answer_faq' => $answer_faq,
            'alumni' => $_POST['alumni'],
            'alumni_images' => $alumni_images,
            'package_name' => $_POST['package_name'],
            'package_cost' => $_POST['package_cost'],
            'package_start_date' => $_POST['package_start_date'],
            'package_end_date' => $_POST['package_end_date'],
            'package_description' => $_POST['package_description'],
            'package_validity' => $_POST['package_validity'],
            'package_other_detail' => $_POST['package_other_detail'],
            'package_renewal' => $package_renewal,
            'package_invoice' => $package_invoice,
        ];

        $update_college = $this->adminModel->update_college_elements($data, $id);
        if ($update_college) {
            $_SESSION['success'] = "College Saved Successfully..! ";
            redirect('admin/colleges');
        } else {
            $_SESSION['success'] = 'College Not Updated';
            redirect('admin/colleges');
        }
    }
    public function add_corporate_elements()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['auth_contact_number'];
            $email = $_POST['auth_email'];
            $password = $_POST['password'];
            // all the datas

            if (!empty($_FILES['image']['name'])) {
                $f_name = $_FILES['image']['name'];
                $f_temp = $_FILES['image']['tmp_name'];
                $size = $_FILES['image']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $image = $f_newfile;
            } else {
                $image = null;
            }
            if (!empty($_FILES['mou']['name'])) {
                $f_name = $_FILES['mou']['name'];
                $f_temp = $_FILES['mou']['tmp_name'];
                $size = $_FILES['mou']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $mou = $f_newfile;
            } else {
                $mou = null;
            }
            if (!empty($_FILES['nda']['name'])) {
                $f_name = $_FILES['nda']['name'];
                $f_temp = $_FILES['nda']['tmp_name'];
                $size = $_FILES['nda']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $nda = $f_newfile;
            } else {
                $nda = null;
            }
            if (!empty($_FILES['declaration_form']['name'])) {
                $f_name = $_FILES['declaration_form']['name'];
                $f_temp = $_FILES['declaration_form']['tmp_name'];
                $size = $_FILES['declaration_form']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $declaration_form = $f_newfile;
            } else {
                $declaration_form = null;
            }
            if (!empty($_FILES['signatory_aadhar']['name'])) {
                $f_name = $_FILES['signatory_aadhar']['name'];
                $f_temp = $_FILES['signatory_aadhar']['tmp_name'];
                $size = $_FILES['signatory_aadhar']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $signatory_aadhar = $f_newfile;
            } else {
                $signatory_aadhar = null;
            }
            if (!empty($_FILES['other_document']['name'])) {
                $f_name = $_FILES['other_document']['name'];
                $f_temp = $_FILES['other_document']['tmp_name'];
                $size = $_FILES['other_document']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $other_document = $f_newfile;
            } else {
                $other_document = null;
            }
            if (!empty($_FILES['auth_image']['name'])) {
                $f_name = $_FILES['auth_image']['name'];
                $f_temp = $_FILES['auth_image']['tmp_name'];
                $size = $_FILES['auth_image']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $auth_image = $f_newfile;
            } else {
                $auth_image = null;
            }
            if (!empty($_FILES['cancelled_cheque']['name'])) {
                $f_name = $_FILES['cancelled_cheque']['name'];
                $f_temp = $_FILES['cancelled_cheque']['tmp_name'];
                $size = $_FILES['cancelled_cheque']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $cancelled_cheque = $f_newfile;
            } else {
                $cancelled_cheque = null;
            }

            if(isset($_POST['website_check'])) {
                $website_check = 1;

            } else {
                $website_check = 0;
            }



            $data = [




                'entity_type' => $_POST['entity_type'],
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'organization' => $_POST['organization'],
                'trust_type' => $_POST['trust_type'],
                'trust_name' => $_POST['trust_name'],
                'address_1' => $_POST['address_1'],
                'address_2' => $_POST['address_2'],
                'pincode' => $_POST['pincode'],
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'url' => $_POST['url'],
                'auth_name' => $_POST['auth_name'],
                'password' => $_POST['password'],
                'auth_designation' => $_POST['auth_designation'],
                'auth_aadhar_no' => $_POST['auth_aadhar_no'],
                'email' => $_POST['auth_email'],
                'phone' => $_POST['auth_contact_number'],
                'auth_contact_person' => $_POST['auth_contact_person'],
                'contact_person_designation' => $_POST['contact_person_designation'],
                'contact_person_details' => $_POST['contact_person_details'],
                'bank_name' => $_POST['bank_name'],
                'ifsc' => $_POST['ifsc'],
                'branch_name' => $_POST['branch_name'],
                'account_no' => $_POST['account_no'],
                're_account_no' => $_POST['re_account_no'],
                'corporate_name_as_per_bank' => $_POST['corporate_name_as_per_bank'],
                'image' => $image,
                'mou' => $mou,
                'nda' => $nda,
                'declaration_form' => $declaration_form,
                'signatory_aadhar' => $signatory_aadhar,
                'other_document' => $other_document,
                'auth_image' => $auth_image,
                'cancelled_cheque' => $cancelled_cheque,
                'website_check' => $website_check,
            ];


            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('admin/add_corporate');
            } elseif ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('admin/add_corporate');
            } else {


                if ($this->pageModel->findUserByphno($phone)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('admin/add_corporate');
                } else {

                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    if ($this->adminModel->add_corporate_elements($data, $pass)) {
                        $user = $this->pageModel->ulogin($email, $_POST['password']);
                        // $_SESSION['rexkod_oodles_teacher_id'] = $user->id;

                        // $_SESSION['rexkod_oodles_teacher_name'] = $user->name;
                        // $_SESSION['rexkod_oodles_teacher_email'] = $user->email;
                        // $_SESSION['rexkod_oodles_teacher_phone'] = $user->phone;
                        // $_SESSION['rexkod_login_type'] = $user->type;

                        // $_SESSION['success'] = "Registered Successfully..! ";
                        $_SESSION['success'] = 'Corporate Data added successfully!';
                        redirect('admin/add_corporate');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('admin/add_corporate');
                    }
                }
            }
        } else {
            redirect('admin/add_corporate');
        }
    }
    public function update_corporate_elements($id)
    {
        $get_corporate_detail = $this->adminModel->get_corporate_detail($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['auth_name'];
            $phone = $_POST['auth_contact_number'];
            $email = $_POST['auth_email'];
            $password = $_POST['password'];
            // all the datas

            if (!empty($_FILES['image']['name'])) {
                $f_name = $_FILES['image']['name'];
                $f_temp = $_FILES['image']['tmp_name'];
                $size = $_FILES['image']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $image = $f_newfile;
            } else {
                $image = $get_corporate_detail->image;
            }
            if (!empty($_FILES['mou']['name'])) {
                $f_name = $_FILES['mou']['name'];
                $f_temp = $_FILES['mou']['tmp_name'];
                $size = $_FILES['mou']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $mou = $f_newfile;
            } else {
                $mou = $get_corporate_detail->mou;

            }
            if (!empty($_FILES['nda']['name'])) {
                $f_name = $_FILES['nda']['name'];
                $f_temp = $_FILES['nda']['tmp_name'];
                $size = $_FILES['nda']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $nda = $f_newfile;
            } else {
                $nda = $get_corporate_detail->nda;

            }
            if (!empty($_FILES['declaration_form']['name'])) {
                $f_name = $_FILES['declaration_form']['name'];
                $f_temp = $_FILES['declaration_form']['tmp_name'];
                $size = $_FILES['declaration_form']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $declaration_form = $f_newfile;
            } else {
                $declaration_form = $get_corporate_detail->declaration_form;

            }
            if (!empty($_FILES['signatory_aadhar']['name'])) {
                $f_name = $_FILES['signatory_aadhar']['name'];
                $f_temp = $_FILES['signatory_aadhar']['tmp_name'];
                $size = $_FILES['signatory_aadhar']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $signatory_aadhar = $f_newfile;
            } else {
                $signatory_aadhar = $get_corporate_detail->signatory_aadhar;


            }
            if (!empty($_FILES['other_document']['name'])) {
                $f_name = $_FILES['other_document']['name'];
                $f_temp = $_FILES['other_document']['tmp_name'];
                $size = $_FILES['other_document']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $other_document = $f_newfile;
            } else {
                $other_document = $get_corporate_detail->other_document;

            }
            if (!empty($_FILES['auth_image']['name'])) {
                $f_name = $_FILES['auth_image']['name'];
                $f_temp = $_FILES['auth_image']['tmp_name'];
                $size = $_FILES['auth_image']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $auth_image = $f_newfile;
            } else {

                $auth_image = $get_corporate_detail->auth_image;

            }
            if (!empty($_FILES['cancelled_cheque']['name'])) {
                $f_name = $_FILES['cancelled_cheque']['name'];
                $f_temp = $_FILES['cancelled_cheque']['tmp_name'];
                $size = $_FILES['cancelled_cheque']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $cancelled_cheque = $f_newfile;
            } else {

                $cancelled_cheque = $get_corporate_detail->cancelled_cheque;

            }

            if(isset($_POST['website_check'])) {
                $website_check = 1;

            } else {
                $website_check = 0;
            }



            $data = [

                'entity_type' => $_POST['entity_type'],
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'organization' => $_POST['organization'],
                'trust_type' => $_POST['trust_type'],
                'trust_name' => $_POST['trust_name'],
                'address_1' => $_POST['address_1'],
                'address_2' => $_POST['address_2'],
                'pincode' => $_POST['pincode'],
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'url' => $_POST['url'],
                'auth_name' => $_POST['auth_name'],
                'password' => $_POST['password'],
                'auth_designation' => $_POST['auth_designation'],
                'auth_aadhar_no' => $_POST['auth_aadhar_no'],
                'email' => $_POST['auth_email'],
                'phone' => $_POST['auth_contact_number'],
                'auth_contact_person' => $_POST['auth_contact_person'],
                'auth_contact_person' => $_POST['auth_contact_person'],
                'contact_person_designation' => $_POST['contact_person_designation'],
                'contact_person_details' => $_POST['contact_person_details'],
                'bank_name' => $_POST['bank_name'],
                'ifsc' => $_POST['ifsc'],
                'branch_name' => $_POST['branch_name'],
                'account_no' => $_POST['account_no'],
                're_account_no' => $_POST['re_account_no'],
                'corporate_name_as_per_bank' => $_POST['corporate_name_as_per_bank'],
                'image' => $image,
                'mou' => $mou,
                'nda' => $nda,
                'declaration_form' => $declaration_form,
                'signatory_aadhar' => $signatory_aadhar,
                'other_document' => $other_document,
                'auth_image' => $auth_image,
                'cancelled_cheque' => $cancelled_cheque,
                'website_check' => $website_check,
            ];


            // $name = $_POST['auth_name'];
            // $phone = $_POST['auth_contact_number'];
            // $email = $_POST['auth_email'];
            // $password = $_POST['password'];




            $get_single_corporate_from_auth = $this->adminModel->get_single_corporate_from_auth($id);
            $old_pass = 0;
            if (empty($_POST['password'])) {
                $old_pass = 1;

                $pass = $get_single_corporate_from_auth->password;
            }

            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('admin/edit_subadmin/' . $id);
            } elseif ($this->adminModel->find_user_by_email_omit_current_id($email, $id)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('admin/edit_corporate/' . $id);
            } else {


                if ($this->adminModel->find_user_by_phone_omit_current_id($phone, $id)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('admin/edit_corporate/' . $id);
                } else {
                    if ($old_pass == 0) {
                        $pass = password_hash($password, PASSWORD_DEFAULT);
                    } else {
                    }
                    if ($this->adminModel->update_corporate_elements($data, $id)) {
                        $update_auth_user = $this->adminModel->update_auth_user($name, $email, $phone, $pass, $id);
                        $_SESSION['success'] = 'Corporate Data Updated successfully!';
                        redirect('admin/edit_corporate/' . $id);
                    } else {
                        $_SESSION['success'] = 'Updation  Failed!';
                        redirect('admin/edit_corporate/' . $id);
                    }
                }
            }
        } else {
            redirect('admin/add_subadmin');
        }
    }

    public function create_subadmin()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['auth_name'];
            $phone = $_POST['auth_contact_number'];
            $email = $_POST['auth_email'];
            $password = $_POST['password'];

            $password = password_hash($password, PASSWORD_DEFAULT);
            $type = $_POST['type'];
            if ($type == 1) {
                $type = "subadmin_quiz";
            } elseif ($type == 2) {
                $type = "subadmin_scholarship";
            }
            // all the datas

            if (!empty($_FILES['image']['name'])) {
                $f_name = $_FILES['image']['name'];
                $f_temp = $_FILES['image']['tmp_name'];
                $size = $_FILES['image']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $image = $f_newfile;
            } else {
                $image = null;
            }

            $data = [

                'image' => $image,
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'password' => $password,
                'type' => $type,


            ];
            // echo $image;
            // die();

            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('admin/add_subadmin');
            } elseif ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('admin/add_subadmin');
            } else {


                if ($this->pageModel->findUserByphno($phone)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('admin/add_subadmin');
                } else {

                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    if ($this->adminModel->add_subadmin_elements($data)) {
                        $user = $this->pageModel->ulogin($email, $_POST['password']);

                        $_SESSION['success'] = 'Subadmin Data added successfully!';
                        redirect('admin/add_subadmin');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('admin/add_subadmin');
                    }
                }
            }
        } else {
            redirect('admin/add_subadmin');
        }
    }

    public function update_subadmin($id)
    {
        $get_single_subadmin = $this->adminModel->get_single_subadmin($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['auth_name'];
            $phone = $_POST['auth_contact_number'];
            $email = $_POST['auth_email'];
            $password = $_POST['password'];
            $type = $_POST['type'];
            if ($type == 1) {
                $type = "subadmin_quiz";
            } elseif ($type == 2) {
                $type = "subadmin_scholarship";
            }
            $old_pass = 0;
            if (empty($pass)) {
                $old_pass = 1;

                $pass = $get_single_subadmin->password;
            }
            // all the datas

            if (!empty($_FILES['image']['name'])) {
                $f_name = $_FILES['image']['name'];
                $f_temp = $_FILES['image']['tmp_name'];
                $size = $_FILES['image']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $image = $f_newfile;
            } else {
                $image = $get_single_subadmin->image;
            }

            $data = [

                'image' => $image,
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'password' => $password,
                'type' => $type,
                'id' => $id,


            ];
            // echo $image;
            // die();

            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('admin/edit_subadmin/' . $id);
            } elseif ($this->adminModel->find_user_by_email_omit_current_id($email, $id)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('admin/edit_subadmin/' . $id);
            } else {


                if ($this->adminModel->find_user_by_phone_omit_current_id($phone, $id)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('admin/edit_subadmin/' . $id);
                } else {
                    if ($old_pass == 0) {
                        $pass = password_hash($password, PASSWORD_DEFAULT);
                    } else {
                    }
                    if ($this->adminModel->update_subadmin_elements($data)) {
                        $_SESSION['success'] = 'Subadmin Data Updated successfully!';
                        redirect('admin/edit_subadmin/' . $id);
                    } else {
                        $_SESSION['success'] = 'Updation  Failed!';
                        redirect('admin/edit_subadmin/' . $id);
                    }
                }
            }
        } else {
            redirect('admin/add_subadmin');
        }
    }




    public function add_school_elements()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['auth_name'];
            $phone = $_POST['auth_contact_number'];
            $email = $_POST['auth_email'];
            $password = $_POST['password'];

            if (!empty($_FILES['school_image']['name'])) {
                $f_name = $_FILES['school_image']['name'];
                $f_temp = $_FILES['school_image']['tmp_name'];
                $size = $_FILES['school_image']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $school_image = $f_newfile;
            } else {
                $school_image = null;
            }
            if (!empty($_FILES['mou']['name'])) {
                $f_name = $_FILES['mou']['name'];
                $f_temp = $_FILES['mou']['tmp_name'];
                $size = $_FILES['mou']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $mou = $f_newfile;
            } else {
                $mou = null;
            }
            if (!empty($_FILES['nda']['name'])) {
                $f_name = $_FILES['nda']['name'];
                $f_temp = $_FILES['nda']['tmp_name'];
                $size = $_FILES['nda']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $nda = $f_newfile;
            } else {
                $nda = null;
            }
            if (!empty($_FILES['declaration_form']['name'])) {
                $f_name = $_FILES['declaration_form']['name'];
                $f_temp = $_FILES['declaration_form']['tmp_name'];
                $size = $_FILES['declaration_form']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $declaration_form = $f_newfile;
            } else {
                $declaration_form = null;
            }
            if (!empty($_FILES['signatory_aadhar']['name'])) {
                $f_name = $_FILES['signatory_aadhar']['name'];
                $f_temp = $_FILES['signatory_aadhar']['tmp_name'];
                $size = $_FILES['signatory_aadhar']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $signatory_aadhar = $f_newfile;
            } else {
                $signatory_aadhar = null;
            }
            if (!empty($_FILES['other_document']['name'])) {
                $f_name = $_FILES['other_document']['name'];
                $f_temp = $_FILES['other_document']['tmp_name'];
                $size = $_FILES['other_document']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $other_document = $f_newfile;
            } else {
                $other_document = null;
            }
            if (!empty($_FILES['auth_image']['name'])) {
                $f_name = $_FILES['auth_image']['name'];
                $f_temp = $_FILES['auth_image']['tmp_name'];
                $size = $_FILES['auth_image']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $auth_image = $f_newfile;
            } else {
                $auth_image = null;
            }
            if (!empty($_FILES['cancelled_cheque']['name'])) {
                $f_name = $_FILES['cancelled_cheque']['name'];
                $f_temp = $_FILES['cancelled_cheque']['tmp_name'];
                $size = $_FILES['cancelled_cheque']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $cancelled_cheque = $f_newfile;
            } else {
                $cancelled_cheque = null;
            }

            if (!empty($_FILES['package_invoice']['name'])) {
                $f_name = $_FILES['package_invoice']['name'];
                $f_temp = $_FILES['package_invoice']['tmp_name'];
                $size = $_FILES['package_invoice']['size'];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $store = "uploads/";
                $package_invoice = $f_newfile;
            } else {
                $package_invoice = null;
            }

            $count = 0;
            foreach ($_FILES['gallery']['name'] as $key => $val) {
                if ($val) {
                    $count++;
                    $f_name = $_FILES['gallery']['name'][$key];
                    $f_temp = $_FILES['gallery']['tmp_name'][$key];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $count . "" . $unqdate . "" . $unqtime;
                    $f_newfile = $unqname . '.' . $f_extension;
                    $store = "uploads/" . $f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $gallery[] = $f_newfile;
                } else {
                    $gallery = null;
                }
            }
            if ($gallery) {
                $gallery = implode(',', $gallery);
            }


            $count = 0;
            foreach ($_FILES['faculty_images']['name'] as $key => $val) {
                if ($val) {
                    $count++;
                    $f_name = $_FILES['faculty_images']['name'][$key];
                    $f_temp = $_FILES['faculty_images']['tmp_name'][$key];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $count . "" . $unqdate . "" . $unqtime;
                    $f_newfile = $unqname . '.' . $f_extension;
                    $store = "uploads/" . $f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $faculty_images[] = $f_newfile;
                } else {
                    $faculty_images = null;
                }
            }
            if ($faculty_images) {
                $faculty_images = implode(',', $faculty_images);
            }

            $count = 0;
            foreach ($_FILES['extra_curricular_images']['name'] as $key => $val) {
                if ($val) {
                    $count++;
                    $f_name = $_FILES['extra_curricular_images']['name'][$key];
                    $f_temp = $_FILES['extra_curricular_images']['tmp_name'][$key];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $count . "" . $unqdate . "" . $unqtime;
                    $f_newfile = $unqname . '.' . $f_extension;
                    $store = "uploads/" . $f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $extra_curricular_images[] = $f_newfile;
                } else {
                    $extra_curricular_images = null;
                }
            }
            if ($extra_curricular_images) {
                $extra_curricular_images = implode(',', $extra_curricular_images);
            }

            $count = 0;
            foreach ($_FILES['academic_images']['name'] as $key => $val) {
                if ($val) {
                    $count++;
                    $f_name = $_FILES['academic_images']['name'][$key];
                    $f_temp = $_FILES['academic_images']['tmp_name'][$key];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $count . "" . $unqdate . "" . $unqtime;
                    $f_newfile = $unqname . '.' . $f_extension;
                    $store = "uploads/" . $f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $academic_images[] = $f_newfile;
                } else {
                    $academic_images = null;
                }
            }
            if ($academic_images) {
                $academic_images = implode(',', $academic_images);
            }

            $count = 0;
            foreach ($_FILES['facility_images']['name'] as $key => $val) {
                if ($val) {
                    $count++;
                    $f_name = $_FILES['facility_images']['name'][$key];
                    $f_temp = $_FILES['facility_images']['tmp_name'][$key];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $count . "" . $unqdate . "" . $unqtime;
                    $f_newfile = $unqname . '.' . $f_extension;
                    $store = "uploads/" . $f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $facility_images[] = $f_newfile;
                } else {
                    $facility_images = null;
                }
            }
            if ($facility_images) {
                $facility_images = implode(',', $facility_images);
            }

            $count = 0;
            foreach ($_FILES['achievement_images']['name'] as $key => $val) {
                if ($val) {
                    $count++;
                    $f_name = $_FILES['achievement_images']['name'][$key];
                    $f_temp = $_FILES['achievement_images']['tmp_name'][$key];
                    $f_extension = explode('.', $f_name);
                    $f_extension = strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $count . "" . $unqdate . "" . $unqtime;
                    $f_newfile = $unqname . '.' . $f_extension;
                    $store = "uploads/" . $f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $achievement_images[] = $f_newfile;
                } else {
                    $achievement_images = null;
                }
            }
            if ($achievement_images) {
                $achievement_images = implode(',', $achievement_images);
            }

            if (isset($_POST['question_faq'])) {
                $question_faq = implode(',', $_POST['question_faq']);
            } else {
                $question_faq = null;
            }
            if (isset($_POST['answer_faq'])) {
                $answer_faq = implode(',', $_POST['answer_faq']);
            } else {
                $answer_faq = null;
            }

            if (empty($review_academic)) {
                $review_academic = 0;
            } else {
                $review_academic = 1;
            }

            if (empty($_POST['review_faculty'])) {
                $review_faculty = 0;
            } else {
                $review_faculty = 1;
            }

            if (empty($_POST['review_infra'])) {
                $review_infra = 0;
            } else {
                $review_infra = 1;
            }

            if (empty($_POST['review_non_academic'])) {
                $review_non_academic = 0;
            } else {
                $review_non_academic = 1;
            }

            if (empty($_POST['review_school'])) {
                $review_school = 0;
            } else {
                $review_school = 1;
            }

            if (isset($_POST['facility'])) {
                $facility = implode(',', $_POST['facility']);
            } else {
                $facility = null;
            }
            if (isset($_POST['recognized_by'])) {
                $recognized_by = implode(',', $_POST['recognized_by']);
            } else {
                $recognized_by = null;
            }

            if (isset($_POST['website_check'])) {
                $website_check = 1;
            } else {
                $website_check = 0;
            }

            if (isset($_POST['package_renewal'])) {
                $package_renewal = 1;
            } else {
                $package_renewal = 0;
            }

            $data = [
                'school_image' => $school_image,
                'signatory_aadhar' => $signatory_aadhar,
                'auth_image' => $auth_image,
                'mou' => $mou,
                'nda' => $nda,
                'declaration_form' => $declaration_form,
                'other_document' => $other_document,
                'school_name' => $_POST['school_name'],
                'school_contact_no' => $_POST['school_contact_no'],
                'school_address' => $_POST['school_address'],
                'school_type' => $_POST['school_type'],
                'year_of_establishment' => $_POST['year_of_establishment'],
                'recognized_by' => $recognized_by,
                'school_pin_code' => $_POST['school_pin_code'],
                'school_city' => $_POST['school_city'],
                'school_state' => $_POST['school_state'],
                'legal_name' => $_POST['legal_name'],
                'student_teacher_ratio' => $_POST['student_teacher_ratio'],
                'accreditation_no' => $_POST['accreditation_no'],
                'accredited_by' => $_POST['accredited_by'],
                'registered_address' => $_POST['registered_address'],
                'facility' => $facility,
                'facility_info' => $_POST['facility_info'],
                'facility_images' => $facility_images,
                'extra_curricular_info' => $_POST['extra_curricular_info'],
                'extra_curricular_images' => $extra_curricular_images,
                'academic_info' => $_POST['academic_info'],
                'academic_images' => $academic_images,
                'website_link' => $_POST['website_link'],
                'website_check' => $website_check,
                'school_info' => $_POST['school_info'],
                'auth_name' => $_POST['auth_name'],
                'auth_designation' => $_POST['auth_designation'],
                'auth_aadhar_no' => $_POST['auth_aadhar_no'],
                'auth_email' => $_POST['auth_email'],
                'auth_contact_number' => $_POST['auth_contact_number'],
                'auth_contact_person' => $_POST['auth_contact_person'],
                'contact_person_designation' => $_POST['contact_person_designation'],
                'contact_person_details' => $_POST['contact_person_details'],
                'bank_name' => $_POST['bank_name'],
                'account_no' => $_POST['account_no'],
                're_account_no' => $_POST['re_account_no'],
                'school_name_as_per_bank' => $_POST['school_name_as_per_bank'],
                'cancelled_cheque' => $cancelled_cheque,
                'ifsc' => $_POST['ifsc'],
                'branch_name' => $_POST['branch_name'],
                'mode_of_admission' => $_POST['mode_of_admission'],
                'how_to_apply' => $_POST['how_to_apply'],
                'scholastic' => $_POST['scholastic'],
                'scholastic_info' => $_POST['scholastic_info'],
                'coscholastic' => $_POST['coscholastic'],
                'coscholastic_info' => $_POST['coscholastic_info'],
                'achievement_info' => $_POST['achievement_info'],
                'achievement_images' => $achievement_images,
                'admission_fee' => $_POST['admission_fee'],
                'review_academic' => $review_academic,
                'review_faculty' => $review_faculty,
                'review_infra' => $review_infra,
                'review_nonacademic' => $review_non_academic,
                'review_school' => $review_school,
                'faculty_images' => $faculty_images,
                'gallery' => $gallery,
                'faculty_info' => $_POST['faculty_info'],
                'question_faq' => $question_faq,
                'answer_faq' => $answer_faq,
                'package_name' => $_POST['package_name'],
                'package_cost' => $_POST['package_cost'],
                'package_start_date' => $_POST['package_start_date'],
                'package_end_date' => $_POST['package_end_date'],
                'package_info' => $_POST['package_info'],
                'package_validity' => $_POST['package_validity'],
                'package_other_detail' => $_POST['package_other_detail'],
                'package_renewal' => $package_renewal,
                'package_invoice' => $package_invoice,
                'category' => $_POST['category']
            ];



            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('admin/add_school');
            } elseif ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('admin/add_school');
            } else {

                if ($this->pageModel->findUserByphno($phone)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('admin/add_school');
                } else {

                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    if ($this->adminModel->add_school_elements($data, $pass)) {
                        $user = $this->pageModel->ulogin($email, $_POST['password']);
                        $_SESSION['success'] = 'School Added Successfully';
                        redirect('admin/add_school');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('admin/add_school');
                    }
                }
            }
        } else {
            $_SESSION['success'] = 'School Not Added';
            redirect('admin/add_school');
        }
    }


    public function update_school_elements($id)
    {
        $get_school_detail = $this->adminModel->get_school_detail_ind($id);
        if (!empty($_FILES['school_image']['name'])) {
            $f_name = $_FILES['school_image']['name'];
            $f_temp = $_FILES['school_image']['tmp_name'];
            $size = $_FILES['school_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $school_image = $f_newfile;
        } else {
            $school_image = $get_school_detail->school_image;
        }
        if (!empty($_FILES['mou']['name'])) {
            $f_name = $_FILES['mou']['name'];
            $f_temp = $_FILES['mou']['tmp_name'];
            $size = $_FILES['mou']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $mou = $f_newfile;
        } else {
            $mou = $get_school_detail->mou;
        }
        if (!empty($_FILES['nda']['name'])) {
            $f_name = $_FILES['nda']['name'];
            $f_temp = $_FILES['nda']['tmp_name'];
            $size = $_FILES['nda']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $nda = $f_newfile;
        } else {
            $nda = $get_school_detail->nda;
        }
        if (!empty($_FILES['declaration_form']['name'])) {
            $f_name = $_FILES['declaration_form']['name'];
            $f_temp = $_FILES['declaration_form']['tmp_name'];
            $size = $_FILES['declaration_form']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $declaration_form = $f_newfile;
        } else {
            $declaration_form = $get_school_detail->declaration_form;
        }
        if (!empty($_FILES['signatory_aadhar']['name'])) {
            $f_name = $_FILES['signatory_aadhar']['name'];
            $f_temp = $_FILES['signatory_aadhar']['tmp_name'];
            $size = $_FILES['signatory_aadhar']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $signatory_aadhar = $f_newfile;
        } else {
            $signatory_aadhar = $get_school_detail->signatory_aadhar;
        }
        if (!empty($_FILES['other_document']['name'])) {
            $f_name = $_FILES['other_document']['name'];
            $f_temp = $_FILES['other_document']['tmp_name'];
            $size = $_FILES['other_document']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $other_document = $f_newfile;
        } else {
            $other_document = $get_school_detail->other_document;
        }
        if (!empty($_FILES['auth_image']['name'])) {
            $f_name = $_FILES['auth_image']['name'];
            $f_temp = $_FILES['auth_image']['tmp_name'];
            $size = $_FILES['auth_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $auth_image = $f_newfile;
        } else {
            $auth_image = $get_school_detail->auth_image;
        }
        if (!empty($_FILES['cancelled_cheque']['name'])) {
            $f_name = $_FILES['cancelled_cheque']['name'];
            $f_temp = $_FILES['cancelled_cheque']['tmp_name'];
            $size = $_FILES['cancelled_cheque']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $cancelled_cheque = $f_newfile;
        } else {
            $cancelled_cheque = $get_school_detail->cancelled_cheque;
        }

        if (!empty($_FILES['package_invoice']['name'])) {
            $f_name = $_FILES['package_invoice']['name'];
            $f_temp = $_FILES['package_invoice']['tmp_name'];
            $size = $_FILES['package_invoice']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $package_invoice = $f_newfile;
        } else {
            $package_invoice = $get_school_detail->package_invoice;
        }

        $count = 0;
        foreach ($_FILES['gallery']['name'] as $key => $val) {
            if ($val) {
                $count++;
                $f_name = $_FILES['gallery']['name'][$key];
                $f_temp = $_FILES['gallery']['tmp_name'][$key];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $count . "" . $unqdate . "" . $unqtime;
                $f_newfile = $unqname . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $gallery[] = $f_newfile;
            } else {
                $gallery = null;
            }
        }
        if ($gallery) {
            $gallery = implode(',', $gallery);
        } else {
            $gallery = $get_school_detail->gallery;
        }


        $count = 0;
        foreach ($_FILES['faculty_images']['name'] as $key => $val) {
            if ($val) {
                $count++;
                $f_name = $_FILES['faculty_images']['name'][$key];
                $f_temp = $_FILES['faculty_images']['tmp_name'][$key];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $count . "" . $unqdate . "" . $unqtime;
                $f_newfile = $unqname . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $faculty_images[] = $f_newfile;
            } else {
                $faculty_images = null;
            }
        }
        if ($faculty_images) {
            $faculty_images = implode(',', $faculty_images);
        } else {
            $faculty_images = $get_school_detail->faculty_images;
        }

        $count = 0;
        foreach ($_FILES['extra_curricular_images']['name'] as $key => $val) {
            if ($val) {
                $count++;
                $f_name = $_FILES['extra_curricular_images']['name'][$key];
                $f_temp = $_FILES['extra_curricular_images']['tmp_name'][$key];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $count . "" . $unqdate . "" . $unqtime;
                $f_newfile = $unqname . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $extra_curricular_images[] = $f_newfile;
            } else {
                $extra_curricular_images = null;
            }
        }
        if ($extra_curricular_images) {
            $extra_curricular_images = implode(',', $extra_curricular_images);
        } else {
            $extra_curricular_images = $get_school_detail->extra_curricular_images;
        }

        $count = 0;
        foreach ($_FILES['academic_images']['name'] as $key => $val) {
            if ($val) {
                $count++;
                $f_name = $_FILES['academic_images']['name'][$key];
                $f_temp = $_FILES['academic_images']['tmp_name'][$key];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $count . "" . $unqdate . "" . $unqtime;
                $f_newfile = $unqname . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $academic_images[] = $f_newfile;
            } else {
                $academic_images = null;
            }
        }
        if ($academic_images) {
            $academic_images = implode(',', $academic_images);
        } else {
            $academic_images = $get_school_detail->academic_images;
        }

        $count = 0;
        foreach ($_FILES['facility_images']['name'] as $key => $val) {
            if ($val) {
                $count++;
                $f_name = $_FILES['facility_images']['name'][$key];
                $f_temp = $_FILES['facility_images']['tmp_name'][$key];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $count . "" . $unqdate . "" . $unqtime;
                $f_newfile = $unqname . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $facility_images[] = $f_newfile;
            } else {
                $facility_images = null;
            }
        }
        if ($facility_images) {
            $facility_images = implode(',', $facility_images);
        } else {
            $facility_images = $get_school_detail->facility_images;
        }

        $count = 0;
        foreach ($_FILES['achievement_images']['name'] as $key => $val) {
            if ($val) {
                $count++;
                $f_name = $_FILES['achievement_images']['name'][$key];
                $f_temp = $_FILES['achievement_images']['tmp_name'][$key];
                $f_extension = explode('.', $f_name);
                $f_extension = strtolower(end($f_extension));
                $unqdate = date("Ymd");
                $unqtime = time();
                $unqname = $count . "" . $unqdate . "" . $unqtime;
                $f_newfile = $unqname . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $achievement_images[] = $f_newfile;
            } else {
                $achievement_images = null;
            }
        }
        if ($achievement_images) {
            $achievement_images = implode(',', $achievement_images);
        } else {
            $achievement_images = $get_school_detail->achievement_images;
        }

        if (isset($_POST['question_faq'])) {
            $question_faq = implode(',', $_POST['question_faq']);
        } else {
            $question_faq = $get_school_detail->question_faq;
        }
        // echo $question_faq;
        // die();
        if (isset($_POST['question_faq1'])) {
            $question_faq = implode(',', $_POST['question_faq1']);
            echo $question_faq;
            die();
        }

        if (isset($_POST['answer_faq'])) {
            $answer_faq = implode(',', $_POST['answer_faq']);
        } else {
            $answer_faq = $get_school_detail->answer_faq;
        }
        if (isset($_POST['answer_faq1'])) {
            $answer_faq = implode(',', $_POST['answer_faq1']);
        }

        if (empty($review_academic)) {
            $review_academic = 0;
        } else {
            $review_academic = 1;
        }

        if (empty($_POST['review_faculty'])) {
            $review_faculty = 0;
        } else {
            $review_faculty = 1;
        }

        if (empty($_POST['review_infra'])) {
            $review_infra = 0;
        } else {
            $review_infra = 1;
        }

        if (empty($_POST['review_non_academic'])) {
            $review_non_academic = 0;
        } else {
            $review_non_academic = 1;
        }

        if (empty($_POST['review_school'])) {
            $review_school = 0;
        } else {
            $review_school = 1;
        }

        if (isset($_POST['facility'])) {
            $facility = implode(',', $_POST['facility']);
        } else {
            $facility = null;
        }
        if (isset($_POST['recognized_by'])) {
            $recognized_by = implode(',', $_POST['recognized_by']);
        } else {
            $recognized_by = null;
        }

        if (isset($_POST['website_check'])) {
            $website_check = 1;
        } else {
            $website_check = 0;
        }

        if (isset($_POST['package_renewal'])) {
            $package_renewal = 1;
        } else {
            $package_renewal = 0;
        }

        $data = [
            'school_image' => $school_image,
            'signatory_aadhar' => $signatory_aadhar,
            'auth_image' => $auth_image,
            'mou' => $mou,
            'nda' => $nda,
            'declaration_form' => $declaration_form,
            'other_document' => $other_document,
            'school_name' => $_POST['school_name'],
            'school_contact_no' => $_POST['school_contact_no'],
            'school_address' => $_POST['school_address'],
            'school_type' => $_POST['school_type'],
            'year_of_establishment' => $_POST['year_of_establishment'],
            'recognized_by' => $recognized_by,
            'school_pin_code' => $_POST['school_pin_code'],
            'school_city' => $_POST['school_city'],
            'school_state' => $_POST['school_state'],
            'legal_name' => $_POST['legal_name'],
            'student_teacher_ratio' => $_POST['student_teacher_ratio'],
            'accreditation_no' => $_POST['accreditation_no'],
            'accredited_by' => $_POST['accredited_by'],
            'registered_address' => $_POST['registered_address'],
            'facility' => $facility,
            'facility_info' => $_POST['facility_info'],
            'facility_images' => $facility_images,
            'extra_curricular_info' => $_POST['extra_curricular_info'],
            'extra_curricular_images' => $extra_curricular_images,
            'academic_info' => $_POST['academic_info'],
            'academic_images' => $academic_images,
            'website_link' => $_POST['website_link'],
            'website_check' => $website_check,
            'school_info' => $_POST['school_info'],
            'auth_name' => $_POST['auth_name'],
            'auth_designation' => $_POST['auth_designation'],
            'auth_aadhar_no' => $_POST['auth_aadhar_no'],
            'auth_email' => $_POST['auth_email'],
            'auth_contact_number' => $_POST['auth_contact_number'],
            'auth_contact_person' => $_POST['auth_contact_person'],
            'contact_person_designation' => $_POST['contact_person_designation'],
            'contact_person_details' => $_POST['contact_person_details'],
            'bank_name' => $_POST['bank_name'],
            'account_no' => $_POST['account_no'],
            're_account_no' => $_POST['re_account_no'],
            'school_name_as_per_bank' => $_POST['school_name_as_per_bank'],
            'cancelled_cheque' => $cancelled_cheque,
            'ifsc' => $_POST['ifsc'],
            'branch_name' => $_POST['branch_name'],
            'mode_of_admission' => $_POST['mode_of_admission'],
            'how_to_apply' => $_POST['how_to_apply'],
            'scholastic' => $_POST['scholastic'],
            'scholastic_info' => $_POST['scholastic_info'],
            'coscholastic' => $_POST['coscholastic'],
            'coscholastic_info' => $_POST['coscholastic_info'],
            'achievement_info' => $_POST['achievement_info'],
            'achievement_images' => $achievement_images,
            'admission_fee' => $_POST['admission_fee'],
            'review_academic' => $review_academic,
            'review_faculty' => $review_faculty,
            'review_infra' => $review_infra,
            'review_nonacademic' => $review_non_academic,
            'review_school' => $review_school,
            'faculty_images' => $faculty_images,
            'gallery' => $gallery,
            'faculty_info' => $_POST['faculty_info'],
            'question_faq' => $question_faq,
            'answer_faq' => $answer_faq,
            'package_name' => $_POST['package_name'],
            'package_cost' => $_POST['package_cost'],
            'package_start_date' => $_POST['package_start_date'],
            'package_end_date' => $_POST['package_end_date'],
            'package_info' => $_POST['package_info'],
            'package_validity' => $_POST['package_validity'],
            'package_other_detail' => $_POST['package_other_detail'],
            'package_renewal' => $package_renewal,
            'package_invoice' => $package_invoice,
            'category' => $_POST['category'],
        ];

        $add_school = $this->adminModel->update_school_elements($data, $id);

        if ($add_school) {
            $_SESSION['success'] = "School Updated Successfully..! ";
            redirect('admin/update_school/' . $id);
        } else {
            $_SESSION['success'] = 'School Not Added';
            redirect('admin/update_school/' . $id);
        }
    }


    // public function add_school_elements()
    // {

    //     if (!empty($_FILES['school_image']['name'])) {
    //         $f_name = $_FILES['school_image']['name'];
    //         $f_temp = $_FILES['school_image']['tmp_name'];
    //         $size = $_FILES['school_image']['size'];
    //         $f_extension = explode('.', $f_name);
    //         $f_extension = strtolower(end($f_extension));
    //         $f_newfile = uniqid() . '.' . $f_extension;
    //         $store = "uploads/" . $f_newfile;
    //         move_uploaded_file($f_temp, $store);
    //         $store = "uploads/";
    //         $school_image = $f_newfile;
    //     } else {
    //         $school_image = NULL;
    //     }
    //     if (!empty($_FILES['mou']['name'])) {
    //         $f_name = $_FILES['mou']['name'];
    //         $f_temp = $_FILES['mou']['tmp_name'];
    //         $size = $_FILES['mou']['size'];
    //         $f_extension = explode('.', $f_name);
    //         $f_extension = strtolower(end($f_extension));
    //         $f_newfile = uniqid() . '.' . $f_extension;
    //         $store = "uploads/" . $f_newfile;
    //         move_uploaded_file($f_temp, $store);
    //         $store = "uploads/";
    //         $mou = $f_newfile;
    //     } else {
    //         $mou = NULL;
    //     }
    //     if (!empty($_FILES['nda']['name'])) {
    //         $f_name = $_FILES['nda']['name'];
    //         $f_temp = $_FILES['nda']['tmp_name'];
    //         $size = $_FILES['nda']['size'];
    //         $f_extension = explode('.', $f_name);
    //         $f_extension = strtolower(end($f_extension));
    //         $f_newfile = uniqid() . '.' . $f_extension;
    //         $store = "uploads/" . $f_newfile;
    //         move_uploaded_file($f_temp, $store);
    //         $store = "uploads/";
    //         $nda = $f_newfile;
    //     } else {
    //         $nda = NULL;
    //     }
    //     if (!empty($_FILES['declaration_form']['name'])) {
    //         $f_name = $_FILES['declaration_form']['name'];
    //         $f_temp = $_FILES['declaration_form']['tmp_name'];
    //         $size = $_FILES['declaration_form']['size'];
    //         $f_extension = explode('.', $f_name);
    //         $f_extension = strtolower(end($f_extension));
    //         $f_newfile = uniqid() . '.' . $f_extension;
    //         $store = "uploads/" . $f_newfile;
    //         move_uploaded_file($f_temp, $store);
    //         $store = "uploads/";
    //         $declaration_form = $f_newfile;
    //     } else {
    //         $declaration_form = NULL;
    //     }
    //     if (!empty($_FILES['signatory_aadhar']['name'])) {
    //         $f_name = $_FILES['signatory_aadhar']['name'];
    //         $f_temp = $_FILES['signatory_aadhar']['tmp_name'];
    //         $size = $_FILES['signatory_aadhar']['size'];
    //         $f_extension = explode('.', $f_name);
    //         $f_extension = strtolower(end($f_extension));
    //         $f_newfile = uniqid() . '.' . $f_extension;
    //         $store = "uploads/" . $f_newfile;
    //         move_uploaded_file($f_temp, $store);
    //         $store = "uploads/";
    //         $signatory_aadhar = $f_newfile;
    //     } else {
    //         $signatory_aadhar = NULL;
    //     }
    //     if (!empty($_FILES['other_document']['name'])) {
    //         $f_name = $_FILES['other_document']['name'];
    //         $f_temp = $_FILES['other_document']['tmp_name'];
    //         $size = $_FILES['other_document']['size'];
    //         $f_extension = explode('.', $f_name);
    //         $f_extension = strtolower(end($f_extension));
    //         $f_newfile = uniqid() . '.' . $f_extension;
    //         $store = "uploads/" . $f_newfile;
    //         move_uploaded_file($f_temp, $store);
    //         $store = "uploads/";
    //         $other_document = $f_newfile;
    //     } else {
    //         $other_document = NULL;
    //     }
    //     if (!empty($_FILES['auth_image']['name'])) {
    //         $f_name = $_FILES['auth_image']['name'];
    //         $f_temp = $_FILES['auth_image']['tmp_name'];
    //         $size = $_FILES['auth_image']['size'];
    //         $f_extension = explode('.', $f_name);
    //         $f_extension = strtolower(end($f_extension));
    //         $f_newfile = uniqid() . '.' . $f_extension;
    //         $store = "uploads/" . $f_newfile;
    //         move_uploaded_file($f_temp, $store);
    //         $store = "uploads/";
    //         $auth_image = $f_newfile;
    //     } else {
    //         $auth_image = NULL;
    //     }
    //     if (!empty($_FILES['cancelled_cheque']['name'])) {
    //         $f_name = $_FILES['cancelled_cheque']['name'];
    //         $f_temp = $_FILES['cancelled_cheque']['tmp_name'];
    //         $size = $_FILES['cancelled_cheque']['size'];
    //         $f_extension = explode('.', $f_name);
    //         $f_extension = strtolower(end($f_extension));
    //         $f_newfile = uniqid() . '.' . $f_extension;
    //         $store = "uploads/" . $f_newfile;
    //         move_uploaded_file($f_temp, $store);
    //         $store = "uploads/";
    //         $cancelled_cheque = $f_newfile;
    //     } else {
    //         $cancelled_cheque = NULL;
    //     }

    //     if (!empty($_FILES['package_invoice']['name'])) {
    //         $f_name = $_FILES['package_invoice']['name'];
    //         $f_temp = $_FILES['package_invoice']['tmp_name'];
    //         $size = $_FILES['package_invoice']['size'];
    //         $f_extension = explode('.', $f_name);
    //         $f_extension = strtolower(end($f_extension));
    //         $f_newfile = uniqid() . '.' . $f_extension;
    //         $store = "uploads/" . $f_newfile;
    //         move_uploaded_file($f_temp, $store);
    //         $store = "uploads/";
    //         $package_invoice = $f_newfile;
    //     } else {
    //         $package_invoice = NULL;
    //     }

    //     $count = 0;
    //     foreach ($_FILES['gallery']['name'] as $key => $val) {
    //         if ($val) {
    //             $count++;
    //             $f_name = $_FILES['gallery']['name'][$key];
    //             $f_temp = $_FILES['gallery']['tmp_name'][$key];
    //             $f_extension = explode('.', $f_name);
    //             $f_extension = strtolower(end($f_extension));
    //             $unqdate = date("Ymd");
    //             $unqtime = time();
    //             $unqname = $count . "" . $unqdate . "" . $unqtime;
    //             $f_newfile = $unqname . '.' . $f_extension;
    //             $store = "uploads/" . $f_newfile;
    //             move_uploaded_file($f_temp, $store);
    //             $gallery[] = $f_newfile;
    //         } else {
    //             $gallery = NULL;
    //         }
    //     }
    //     if ($gallery) {
    //         $gallery = implode(',', $gallery);
    //     }


    //     $count = 0;
    //     foreach ($_FILES['faculty_images']['name'] as $key => $val) {
    //         if ($val) {
    //             $count++;
    //             $f_name = $_FILES['faculty_images']['name'][$key];
    //             $f_temp = $_FILES['faculty_images']['tmp_name'][$key];
    //             $f_extension = explode('.', $f_name);
    //             $f_extension = strtolower(end($f_extension));
    //             $unqdate = date("Ymd");
    //             $unqtime = time();
    //             $unqname = $count . "" . $unqdate . "" . $unqtime;
    //             $f_newfile = $unqname . '.' . $f_extension;
    //             $store = "uploads/" . $f_newfile;
    //             move_uploaded_file($f_temp, $store);
    //             $faculty_images[] = $f_newfile;
    //         } else {
    //             $faculty_images = NULL;
    //         }
    //     }
    //     if ($faculty_images) {
    //         $faculty_images = implode(',', $faculty_images);
    //     }

    //     $count = 0;
    //     foreach ($_FILES['extra_curricular_images']['name'] as $key => $val) {
    //         if ($val) {
    //             $count++;
    //             $f_name = $_FILES['extra_curricular_images']['name'][$key];
    //             $f_temp = $_FILES['extra_curricular_images']['tmp_name'][$key];
    //             $f_extension = explode('.', $f_name);
    //             $f_extension = strtolower(end($f_extension));
    //             $unqdate = date("Ymd");
    //             $unqtime = time();
    //             $unqname = $count . "" . $unqdate . "" . $unqtime;
    //             $f_newfile = $unqname . '.' . $f_extension;
    //             $store = "uploads/" . $f_newfile;
    //             move_uploaded_file($f_temp, $store);
    //             $extra_curricular_images[] = $f_newfile;
    //         } else {
    //             $extra_curricular_images = NULL;
    //         }
    //     }
    //     if ($extra_curricular_images) {
    //         $extra_curricular_images = implode(',', $extra_curricular_images);
    //     }

    //     $count = 0;
    //     foreach ($_FILES['academic_images']['name'] as $key => $val) {
    //         if ($val) {
    //             $count++;
    //             $f_name = $_FILES['academic_images']['name'][$key];
    //             $f_temp = $_FILES['academic_images']['tmp_name'][$key];
    //             $f_extension = explode('.', $f_name);
    //             $f_extension = strtolower(end($f_extension));
    //             $unqdate = date("Ymd");
    //             $unqtime = time();
    //             $unqname = $count . "" . $unqdate . "" . $unqtime;
    //             $f_newfile = $unqname . '.' . $f_extension;
    //             $store = "uploads/" . $f_newfile;
    //             move_uploaded_file($f_temp, $store);
    //             $academic_images[] = $f_newfile;
    //         } else {
    //             $academic_images = NULL;
    //         }
    //     }
    //     if ($academic_images) {
    //         $academic_images = implode(',', $academic_images);
    //     }

    //     $count = 0;
    //     foreach ($_FILES['facility_images']['name'] as $key => $val) {
    //         if ($val) {
    //             $count++;
    //             $f_name = $_FILES['facility_images']['name'][$key];
    //             $f_temp = $_FILES['facility_images']['tmp_name'][$key];
    //             $f_extension = explode('.', $f_name);
    //             $f_extension = strtolower(end($f_extension));
    //             $unqdate = date("Ymd");
    //             $unqtime = time();
    //             $unqname = $count . "" . $unqdate . "" . $unqtime;
    //             $f_newfile = $unqname . '.' . $f_extension;
    //             $store = "uploads/" . $f_newfile;
    //             move_uploaded_file($f_temp, $store);
    //             $facility_images[] = $f_newfile;
    //         } else {
    //             $facility_images = NULL;
    //         }
    //     }
    //     if ($facility_images) {
    //         $facility_images = implode(',', $facility_images);
    //     }

    //     $count = 0;
    //     foreach ($_FILES['achievement_images']['name'] as $key => $val) {
    //         if ($val) {
    //             $count++;
    //             $f_name = $_FILES['achievement_images']['name'][$key];
    //             $f_temp = $_FILES['achievement_images']['tmp_name'][$key];
    //             $f_extension = explode('.', $f_name);
    //             $f_extension = strtolower(end($f_extension));
    //             $unqdate = date("Ymd");
    //             $unqtime = time();
    //             $unqname = $count . "" . $unqdate . "" . $unqtime;
    //             $f_newfile = $unqname . '.' . $f_extension;
    //             $store = "uploads/" . $f_newfile;
    //             move_uploaded_file($f_temp, $store);
    //             $achievement_images[] = $f_newfile;
    //         } else {
    //             $achievement_images = NULL;
    //         }
    //     }
    //     if ($achievement_images) {
    //         $achievement_images = implode(',', $achievement_images);
    //     }

    //     if (isset($_POST['question_faq'])) {
    //         $question_faq = implode(',', $_POST['question_faq']);
    //     } else {
    //         $question_faq = Null;
    //     }
    //     if (isset($_POST['answer_faq'])) {
    //         $answer_faq = implode(',', $_POST['answer_faq']);
    //     } else {
    //         $answer_faq = Null;
    //     }

    //     if (empty($review_academic)) {
    //         $review_academic = 0;
    //     } else {
    //         $review_academic = 1;
    //     }

    //     if (empty($_POST['review_faculty'])) {
    //         $review_faculty = 0;
    //     } else {
    //         $review_faculty = 1;
    //     }

    //     if (empty($_POST['review_infra'])) {
    //         $review_infra = 0;
    //     } else {
    //         $review_infra = 1;
    //     }

    //     if (empty($_POST['review_non_academic'])) {
    //         $review_non_academic = 0;
    //     } else {
    //         $review_non_academic = 1;
    //     }

    //     if (empty($_POST['review_school'])) {
    //         $review_school = 0;
    //     } else {
    //         $review_school = 1;
    //     }

    //     if (isset($_POST['facility'])) {
    //         $facility = implode(',', $_POST['facility']);
    //     } else {
    //         $facility = Null;
    //     }
    //     if (isset($_POST['recognized_by'])) {
    //         $recognized_by = implode(',', $_POST['recognized_by']);
    //     } else {
    //         $recognized_by = Null;
    //     }

    //     if (isset($_POST['website_check'])) {
    //         $website_check = 1;
    //     } else {
    //         $website_check = 0;
    //     }

    //     if (isset($_POST['package_renewal'])) {
    //         $package_renewal = 1;
    //     } else {
    //         $package_renewal = 0;
    //     }

    //     $data = [
    //         'school_image' => $school_image,
    //         'signatory_aadhar' => $signatory_aadhar,
    //         'auth_image' => $auth_image,
    //         'mou' => $mou,
    //         'nda' => $nda,
    //         'declaration_form' => $declaration_form,
    //         'other_document' => $other_document,
    //         'school_name' => $_POST['school_name'],
    //         'school_contact_no' => $_POST['school_contact_no'],
    //         'school_address' => $_POST['school_address'],
    //         'school_type' => $_POST['school_type'],
    //         'year_of_establishment' => $_POST['year_of_establishment'],
    //         'recognized_by' => $recognized_by,
    //         'school_pin_code' => $_POST['school_pin_code'],
    //         'school_city' => $_POST['school_city'],
    //         'school_state' => $_POST['school_state'],
    //         'legal_name' => $_POST['legal_name'],
    //         'student_teacher_ratio' => $_POST['student_teacher_ratio'],
    //         'accreditation_no' => $_POST['accreditation_no'],
    //         'accredited_by' => $_POST['accredited_by'],
    //         'registered_address' => $_POST['registered_address'],
    //         'facility' => $facility,
    //         'facility_info' => $_POST['facility_info'],
    //         'facility_images' => $facility_images,
    //         'extra_curricular_info' => $_POST['extra_curricular_info'],
    //         'extra_curricular_images' => $extra_curricular_images,
    //         'academic_info' => $_POST['academic_info'],
    //         'academic_images' => $academic_images,
    //         'website_link' => $_POST['website_link'],
    //         'website_check' => $website_check,
    //         'school_info' => $_POST['school_info'],
    //         'auth_name' => $_POST['auth_name'],
    //         'auth_designation' => $_POST['auth_designation'],
    //         'auth_aadhar_no' => $_POST['auth_aadhar_no'],
    //         'auth_email' => $_POST['auth_email'],
    //         'auth_contact_number' => $_POST['auth_contact_number'],
    //         'auth_contact_person' => $_POST['auth_contact_person'],
    //         'contact_person_designation' => $_POST['contact_person_designation'],
    //         'contact_person_details' => $_POST['contact_person_details'],
    //         'bank_name' => $_POST['bank_name'],
    //         'account_no' => $_POST['account_no'],
    //         're_account_no' => $_POST['re_account_no'],
    //         'school_name_as_per_bank' => $_POST['school_name_as_per_bank'],
    //         'cancelled_cheque' => $cancelled_cheque,
    //         'ifsc' => $_POST['ifsc'],
    //         'branch_name' => $_POST['branch_name'],
    //         'mode_of_admission' => $_POST['mode_of_admission'],
    //         'how_to_apply' => $_POST['how_to_apply'],
    //         'scholastic' => $_POST['scholastic'],
    //         'scholastic_info' => $_POST['scholastic_info'],
    //         'coscholastic' => $_POST['coscholastic'],
    //         'coscholastic_info' => $_POST['coscholastic_info'],
    //         'achievement_info' => $_POST['achievement_info'],
    //         'achievement_images' => $achievement_images,
    //         'admission_fee' => $_POST['admission_fee'],
    //         'review_academic' => $review_academic,
    //         'review_faculty' => $review_faculty,
    //         'review_infra' => $review_infra,
    //         'review_nonacademic' => $review_non_academic,
    //         'review_school' => $review_school,
    //         'faculty_images' => $faculty_images,
    //         'gallery' => $gallery,
    //         'faculty_info' => $_POST['faculty_info'],
    //         'question_faq' => $question_faq,
    //         'answer_faq' => $answer_faq,
    //         'package_name' => $_POST['package_name'],
    //         'package_cost' => $_POST['package_cost'],
    //         'package_start_date' => $_POST['package_start_date'],
    //         'package_end_date' => $_POST['package_end_date'],
    //         'package_info' => $_POST['package_info'],
    //         'package_validity' => $_POST['package_validity'],
    //         'package_other_detail' => $_POST['package_other_detail'],
    //         'package_renewal' => $package_renewal,
    //         'package_invoice' => $package_invoice,
    //     ];

    //     $add_school = $this->adminModel->add_school_elements($data);

    //     if ($add_school) {
    //         $_SESSION['success'] = "School Added Successfully..! ";
    //         redirect('admin/schools');
    //     } else {
    //         $_SESSION['success'] = 'School Not Added';
    //         redirect('admin/add_school');
    //     }
    // }


    public function del()
    {
        $this->view('admin/del');
    }
    public function test2($user, $percentage)
    {
        $percentage = $percentage / 100;
        $data = [
            'user' => $user,
            'percentage' => $percentage,

        ];
        $this->view('admin/test2', $data);
    }
    public function add_scholarship_promotion()
    {
        $get_all_promotion = $this->adminModel->get_all_scholarship_promotions();
        $get_all_scholarship = $this->adminModel->get_all_scholarship();

        $data = [
            'get_all_scholarship' => $get_all_scholarship,
            'get_all_promotion' => $get_all_promotion,
        ];
        $this->view('admin/add_scholarship_promotion', $data);
    }
    public function create_scholarship_promo()
    {
        $file = $_POST['file'];
        if (!empty($_FILES['file']['name'])) {
            $f_name = $_FILES['file']['name'];
            $f_temp = $_FILES['file']['tmp_name'];
            $size = $_FILES['file']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $file = $f_newfile;
        } else {
            $file = null;
        }

        $data = [
            'file' => $file,
            'name' => $_POST['name'],
            'url' => $_POST['url'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'scholarship_id' => $_POST['scholarship_id'],
        ];
        $create_scholarship_promo = $this->adminModel->create_scholarship_promo($data);
        if ($create_scholarship_promo) {
            $_SESSION['success'] = "Promotion Added Successfully..! ";
            redirect('admin/add_scholarship_promotion');
        } else {
            $_SESSION['success'] = 'Promotion Not Added';
            redirect('admin/add_scholarship_promotion');
        }
    }


    public function update_scholarship_promotion_status($id, $status)
    {


        if ($status == 1) {
            $update_active_status_db = $this->adminModel->update_scholarship_promo_status($id, $status);
            $_SESSION['success'] = "Activate successfully";
            redirect('admin/add_scholarship_promotion');
        } elseif ($status == 0) {
            $update_active_status_db = $this->adminModel->update_scholarship_promo_status($id, $status);
            $_SESSION['success'] = "De-Activated successfully";
            redirect('admin/add_scholarship_promotion');
        }
    }

    public function update_faq_status($id, $status)
    {


        if ($status == 1) {
            $update_active_status_db = $this->adminModel->update_faq_status($id, $status);
            $_SESSION['success'] = "Activate successfully";
            redirect('admin/add_faq');
        } elseif ($status == 0) {
            $update_active_status_db = $this->adminModel->update_faq_status($id, $status);
            $_SESSION['success'] = "De-Activated successfully";
            redirect('admin/add_faq');
        }
    }
    public function update_student_subscription($id, $status)
    {
        // echo $id;
        // echo $status;
        //     die();

        if ($status == 1) {
            $update_active_status_db = $this->adminModel->update_student_subscription($id, $status);
            $_SESSION['success'] = "Activate successfully";
            redirect('admin/subscription_plan');
        } elseif ($status == 0) {
            $update_active_status_db = $this->adminModel->update_student_subscription($id, $status);
            $_SESSION['success'] = "De-Activated successfully";
            redirect('admin/subscription_plan');
        }
    }
    public function student_scholarship_view()
    {
        $this->view('admin/student_scholarship_view');
    }


    public function temp()
    {
        $_SESSION['nav'] = "add_quiz";

        $this->view('admin/temp');
    }
    public function temp2()
    {
        $_SESSION['nav'] = "add_quiz";

        $this->view('admin/temp2');
    }

    public function generate_detail($id)
    {
        // echo $id;
        // die();
        $_SESSION['nav'] = "add_quiz";
        $get_all_quiz = $this->adminModel->get_all_quizes_id($id);
        $get_quiz_score = $this->adminModel->get_particular_quiz_result_for_quiz_id($id);
        $get_quiz_detail = $this->studentModel->get_quiz_detail($id);

        $contest_prize_calculation = $this->adminModel->get_contest_prize_calculations($get_quiz_detail->prize_calc_data_id);
        $contest_prize_calculation->id;
        $get_total_count_of_registration = $this->adminModel->get_contest_registration($id);
        $count_of_quiz_registration = count($get_total_count_of_registration);
        $get_quiz_particpation_fee = $contest_prize_calculation->entry_fee;
        $get_amount_registered_for_quiz = $get_quiz_particpation_fee * $count_of_quiz_registration;

        $contest_prize_calculation_final = $this->adminModel->get_contest_prize_calculations_final($id);

        $data = [
            'get_all_quiz' => $get_all_quiz,
            'get_quiz_score' => $get_quiz_score,
            'get_quiz_detail' => $get_quiz_detail,
            'get_amount_registered_for_quiz' => $get_amount_registered_for_quiz,

            'contest_prize_calculation' => $contest_prize_calculation,
            'count_of_quiz_registration' => $count_of_quiz_registration,

            'contest_prize_calculation_final' => $contest_prize_calculation_final,
        ];

        $this->view('admin/generate_detail', $data);
    }


    //  public function quizes()
    //     {
    //         $_SESSION['nav'] = "quiz";
    //         $get_all_quiz = $this->adminModel->get_all_quizes();
    //         $data = [
    //             'get_all_quiz' => $get_all_quiz,
    //         ];
    //         $this->view('admin/quizes', $data);
    //     }


    public function test1()
    {


        $_SESSION['nav'] = "quiz";
        $this->view('admin/test1');
    }
    public function contest_pool_amount()
    {


        $_SESSION['nav'] = "quiz";
        $this->view('admin/contest_pool_amount');
    }
    // public function contest_pool_amount5()
    // {


    //     $_SESSION['nav'] = "quiz";
    //     $this->view('admin/contest_pool_amount5');
    // }
    // public function contest_pool_amount_new()
    // {


    //     $_SESSION['nav'] = "quiz";
    //     $this->view('admin/contest_pool_amount_new');
    // }
    public function contest_pool_amount_store()
    {

        $data = [
            'no_of_participants' => $_POST['no_of_participants'],
            'entry_fee' => $_POST['entry_fee'],
            'total_amount_collected' => $_POST['total_amount_collected'],
            'expenses' => $_POST['expenses'],
            'total_expenses' => $_POST['total_expenses'],
            'prize_pool_amount' => $_POST['prize_pool_amount'],
            'no_of_winners_percentage' => $_POST['no_of_winners_percentage'],
            'total_no_of_winners' => $_POST['total_no_of_winners'],
            'total_no_of_levels' => $_POST['total_no_of_levels']
        ];

        for ($i = 0; $i < $_POST['total_no_of_levels']; $i++) {
            $levels_data[$i] = [
                "level_no" =>  $_POST['level_no' . $i],
                "winners_percentage" =>  $_POST['lv_winners_percentage' . $i],
                "no_of_winners" =>  $_POST['lv_no_of_winners' . $i],
                "individual_amount" =>  $_POST['lv_individual_amount' . $i],
                "total_amount" =>  $_POST['lv_total_amount' . $i],
                "prize_amount_percentage" =>  $_POST['lv_prize_amount_percentage' . $i]

            ];
        }
        $levels_data = json_encode($levels_data);

        // echo $levels_data;
        // die;

        $result = $this->adminModel->contest_pool_amount_store($data, $levels_data);

        if ($result) {
            $_SESSION['success'] = "Please preview the prize pool and Click on Publish ";
            redirect('admin/contest_prize_view/' . $result);
        } else {
            $_SESSION['success'] = 'Prize Pool Calculation not added';
            redirect('admin/contest_pool_amount');
        }

        // print_r($lenght);
        // die;


        // print_r($levelsdata);
        // die;

        // $form_data = $_REQUEST;

        // print_r($form_data);
        // die;
        // $json_data = json_encode($form_data);
        // $lenght = sizeof($form_data);


        // $i=0;
        // echo $_POST['lv_winners_percentage'.$i];
        // die;
        // echo $_POST['total_no_of_levels'];
        // $levelsdata[] = array();



    }


    public function edit_contest_pool($id)
    {
        $contests = $this->adminModel->get_contest_by_id($id);
        $data = [
            'contests' => $contests,
            'levels' => json_decode($contests->levels_data),
        ];

        // echo $contests->levels_data;
        // die();
        // $result=[
        //     'res'=>json_decode($contests->levels_data),
        // ];

        // print_r($result['res']);
        // die();
        $this->view('admin/edit_contest_pool', $data);
    }


    public function update_contest_pool($id)
    {
        $data = [
            'no_of_participants' => $_POST['no_of_participants'],
            'entry_fee' => $_POST['entry_fee'],
            'total_amount_collected' => $_POST['total_amount_collected'],
            'expenses' => $_POST['expenses'],
            'total_expenses' => $_POST['total_expenses'],
            'prize_pool_amount' => $_POST['prize_pool_amount'],
            'no_of_winners_percentage' => $_POST['no_of_winners_percentage'],
            'total_no_of_winners' => $_POST['total_no_of_winners'],
            'total_no_of_levels' => $_POST['total_no_of_levels']

        ];
        // echo $data['total_no_of_levels'];
        // die();

        for ($i = 0; $i < $_POST['total_no_of_levels']; $i++) {
            $levels_data[$i] = [
                "level_no" =>  $_POST['level_no' . $i],
                "winners_percentage" =>  $_POST['lv_winners_percentage' . $i],
                "no_of_winners" =>  $_POST['lv_no_of_winners' . $i],
                "individual_amount" =>  $_POST['lv_individual_amount' . $i],
                "total_amount" =>  $_POST['lv_total_amount' . $i],
                "prize_amount_percentage" =>  $_POST['lv_prize_amount_percentage' . $i]

            ];
        }
        $levels_data = json_encode($levels_data);

        // echo $levels_data;
        // die;

        $result = $this->adminModel->update_contest_pool($id, $data, $levels_data);


        if ($result) {
            $_SESSION['success'] = "Prize Pool Calculation Updated Successfully..! ";
            redirect('admin/contest_prize_view/' . $id);
        } else {
            $_SESSION['success'] = 'Prize Pool Calculation not updated';
            redirect('admin/prize_pool_calculations');
        }
    }



    public function contest_pool_amount2()
    {
        $_SESSION['nav'] = "quiz";
        $this->view('admin/contest_pool_amount2');
    }
    public function contest_pool_amount3()
    {
        $_SESSION['nav'] = "quiz";
        $this->view('admin/contest_pool_amount3');
    }
    public function contest_pool_amount6()
    {
        $_SESSION['nav'] = "quiz";
        $this->view('admin/contest_pool_amount6');
    }
    public function contest_pool_amount_n1()
    {
        $_SESSION['nav'] = "quiz";
        $this->view('admin/contest_pool_amount_n1');
    }


    public function get_all_prize_pool_calculations()
    {
        // echo $id;
        // die();
        $_SESSION['nav'] = "quiz";


        $data1 = $this->adminModel->get_all_prize_pool_calculations();



        $array = array();
        foreach ($data1 as $item) {
            $array[] = json_decode($item->json_data, true);
        }
        // foreach ($array as $item) {

        //     }

        // $data1 = $array;

        $data = [
            'sss' => $array,
            'ids' => $data1

        ];


        // print_r($data1);
        // print_r('<br>');
        // print_r($get_all_scholarship);
        // die;



        $this->view('admin/get_all_prize_pool_calculations', $data);
    }


    public function prize_pool_calculations()
    {
        $_SESSION['nav'] = "quiz";


        $all_contest_prize_calculations = $this->adminModel->get_all_contest_prize_calculations();


        $data = [

            'all_contest_prize_calculations' => $all_contest_prize_calculations,
        ];

        $this->view('admin/prize_pool_calculations', $data);
    }






    // ================= scholarship =======================











    public function contest_prize_detail($quiz_id, $id)
    {
        // echo $id;
        // die();

        $contest_prize_calculation = $this->adminModel->get_contest_prize_calculations($id);
        $get_total_count_of_registration = $this->adminModel->get_contest_registration($quiz_id);
        $count_of_quiz_registration = count($get_total_count_of_registration);
        $get_quiz_particpation_fee = $contest_prize_calculation->entry_fee;
        $get_amount_registered_for_quiz = $get_quiz_particpation_fee * $count_of_quiz_registration;
        $get_quiz_detail = $this->adminModel->get_all_quizes_id($quiz_id);

        // added by ashutosh -- prizepool after registration closed
        $contest_prize_calculation_final = $this->adminModel->get_contest_prize_calculations_final($quiz_id);
        


        $data = [
            'contest_prize_calculation' => $contest_prize_calculation,
            'get_amount_registered_for_quiz' => $get_amount_registered_for_quiz,
            'get_quiz_detail' => $get_quiz_detail,
            'count_of_quiz_registration' => $count_of_quiz_registration,

            'contest_prize_calculation_final' => $contest_prize_calculation_final,
            
        ];

        $this->view('admin/contest_prize_detail', $data);
    }
    public function contest_prize_view($id)
    {
        // echo $id;
        // die();

        $contest_prize_calculation = $this->adminModel->get_contest_prize_calculations($id);
        // $get_total_count_of_registration = $this->adminModel->get_contest_registration($quiz_id);
        // $count_of_quiz_registration = count($get_total_count_of_registration);
        $get_quiz_particpation_fee = $contest_prize_calculation->entry_fee;
        // $get_amount_registered_for_quiz = $get_quiz_particpation_fee*$count_of_quiz_registration;
        // $get_quiz_detail = $this->adminModel->get_all_quizes_id($quiz_id);


        $data = [
            'contest_prize_calculation' => $contest_prize_calculation,
            // 'get_amount_registered_for_quiz' => $get_amount_registered_for_quiz,
            // 'get_quiz_detail' => $get_quiz_detail,
            // 'count_of_quiz_registration' => $count_of_quiz_registration,
        ];

        $this->view('admin/contest_prize_view', $data);
    }
    public function contest_prize_detail_final($quiz_id, $id)
    {
        // echo $id;
        // die();

        $contest_prize_calculation = $this->adminModel->get_contest_prize_calculations($id);
        $get_total_count_of_registration = $this->adminModel->get_contest_registration($quiz_id);
        $count_of_quiz_registration = count($get_total_count_of_registration);
        $get_quiz_particpation_fee = $contest_prize_calculation->entry_fee;
        $get_amount_registered_for_quiz = $get_quiz_particpation_fee * $count_of_quiz_registration;
        $get_quiz_detail = $this->adminModel->get_all_quizes_id($quiz_id);


        $data = [
            'contest_prize_calculation' => $contest_prize_calculation,
            'get_amount_registered_for_quiz' => $get_amount_registered_for_quiz,
            'get_quiz_detail' => $get_quiz_detail,
            'count_of_quiz_registration' => $count_of_quiz_registration,
        ];

        $this->view('admin/contest_prize_detail_final', $data);
    }












    // $data = json_decode($rawdata, true);



    // $this->pageModel->cams_update($rawdata);






    // $punch = $data;
    // $entry = $punch['RealTime']['PunchLog'];
    // $date_val =  explode(" ", $entry['LogTime']);
    // $date_cur = $date_val[0];
    // $time_cur = $date_val[1];

    // $date =  date('Y-m-d', strtotime($date_cur));
    // $time =  date('H:i:s', strtotime($time_cur));
    // $meal = $entry['Type'];
    // $user_id = $entry['UserId'];



    // {"url":"admin\/contest_pool_amount_store","no_of_participants":"1111","entry_fee":"11","total_amount":"12221","expenses":"22","diburse_as_prize":"2688.62","no_of_winners_1":"11","winners_percentage_1":"53","amount_percentage_1":"10","individual_amount_1":"953.2380000000002","total_1":"50521.61400000001","no_of_winners_2":"9","winners_percentage_2":"43","amount_percentage_2":"3","individual_amount_2":"285.9714","total_2":"12296.7702","no_of_winners_3":"7","winners_percentage_3":"34","amount_percentage_3":"2","individual_amount_3":"190.6476","total_3":"6482.018400000001","no_of_winners_4":"5","winners_percentage_4":"24","amount_percentage_4":"1","individual_amount_4":"95.3238","total_4":"2287.7712","no_of_winners_5":"3","winners_percentage_5":"14","amount_percentage_5":"0.5","individual_amount_5":"47.6619","total_5":"667.2666","no_of_winners_6":"1","winners_percentage_6":"4","amount_percentage_6":"0.1","individual_amount_6":"9.532380000000002","total_6":"38.12952000000001","no_of_winners_7":"","winners_percentage_7":"0","amount_percentage_7":"","individual_amount_7":"0","total_7":"0","no_of_winners_8":"","winners_percentage_8":"0","amount_percentage_8":"","individual_amount_8":"0","total_8":"0"}


    //     public function get_all_prize_pool_calculations()
    //     {
    //         // echo $id;
    //         // die();
    //         $_SESSION['nav'] = "add_quiz";

    //         $data1 = $this->adminModel->get_all_prize_pool_calculations();
    // // Assume the first array is called $array1 and the second array is called $array2
    // // Loop through each object in $array1





    // //         $array = array();
    // //     foreach ($data as $item) {
    // //     $array[] = json_decode($item->json_data, true);
    // // }

    // // $get_all_promotion = $this->adminModel->get_all_scholarship_promotions();
    // $get_all_scholarship = $this->adminModel->get_all_scholarship();

    //         // $json_string = $data->json_data;
    //         // $array = json_decode($json_string, true);

    //         // $data = $array;

    //             $data = [
    //     // 'get_all_scholarship' => $get_all_scholarship,


    //                 'array' => $data1,
    //             ];

    //             $array2 = array();

    //             foreach ($data['array'] as $key => $obj) {
    //                 // Decode the "json_data" property into an associative array
    //                 $data = json_decode($obj->json_data, true);

    //                 // Modify the corresponding object in $array2 with the converted data
    //                 $array2[$key]->id = $obj->id;
    //                 $array2[$key]->url = $data['url'];
    //               }

    //               // Combine the two arrays
    //               $finalArray = array_merge($data['array'] , $array2);

    //               $data1 = [
    //     'get_all_scholarship' => $get_all_scholarship,

    //                 'finalArray' => $finalArray,
    //               ];

    //             // print_r($array);
    //             // die;

    //         $this->view('admin/get_all_prize_pool_calculations',  $data1);
    //     }

    public function disperse_money_for_contest_quiz($quiz_id)
    {
        $get_all_quiz = $this->adminModel->get_all_quizes_id($quiz_id);
        $get_quiz_scores = $this->adminModel->get_particular_quiz_result_for_quiz_id($quiz_id);
        $get_quiz_detail = $this->studentModel->get_quiz_detail($quiz_id);
        $contest_prize_calculation = $this->adminModel->get_contest_prize_calculations($get_quiz_detail->prize_calc_data_id);
        $get_total_count_of_registration = $this->adminModel->get_contest_registration($quiz_id);
        $count_of_quiz_registration = count($get_total_count_of_registration);
        $get_quiz_particpation_fee = $contest_prize_calculation->entry_fee;
        $get_amount_registered_for_quiz = $get_quiz_particpation_fee * $count_of_quiz_registration;



        $prize_pool_calculation = $this->adminModel->get_contest_prize_calculations($get_all_quiz->prize_calc_data_id);

        // added by ashutosh-- after edit prize pool calculation
        $prize_pool_calculation_final = $this->adminModel->get_contest_prize_calculations_final($get_all_quiz->id);
if($prize_pool_calculation_final) {
    $user_id_data = '';
    $amount_data = '';
    $total_amount = 0;
    $i = 1;
    $j = 0;
    $count = 0;
    $level = 0;
    $tttt = json_decode($prize_pool_calculation_final->levels_data);
    $count_of_user = count($get_quiz_scores);

    $count_of_winners_by_contest_pool = 0;
    foreach ($tttt as $prize_pool_cal) {
        $level++;

        for ($i = 0; $i < $prize_pool_cal->no_of_winners; $i++) {
            $count_of_winners_by_contest_pool++;
        }
    }

    $j = 0;

    foreach ($tttt as $prize_pool_cal) {
        $level++;

        for ($i = 0; $i < $prize_pool_cal->no_of_winners; $i++) {
            $count++;
            if ($j < count($get_quiz_scores)) {
                $quiz_result  = $get_quiz_scores[$j];
            }


            // $amount =  ($get_amount_registered_for_quiz * (100 - $prize_pool_calculation->expenses) * intval($prize_pool_cal->prize_amount_percentage)) / ($prize_pool_cal->no_of_winners * 100 * 100);
            $amount   = $prize_pool_cal->individual_amount;


            if ($j < count($get_quiz_scores)) {
                $amount_data .= $amount;
                $total_amount += $amount;
                if ($j < $count_of_user - 1) {
                    $amount_data .= ', ';
                }
            }

            if ($count <= count($get_quiz_scores)) {
                if ($j < count($get_quiz_scores)) {
                    $user_id = $quiz_result->user_id;

                    $user_id_data .= $user_id;
                    if ($j < $count_of_user - 1) {
                        $user_id_data .= ', ';
                    }


                    // echo ($user_id_data);
                    // echo "<br>";
                    // echo ($amount_data);
                    // die();

                    $txnid = "Cr / Q-" . $quiz_id;
                    $update_student_balance = $this->adminModel->update_student_balance($user_id, $amount, $txnid, $quiz_id);
                    $message = 'Congratulations! You have won an amount of Rs. ' . $amount . ' from OodlesIn Contest Competition.';
                    $otp = 5555;
                    $get_auth_detail = $this->adminModel->get_auth_detail($user_id);
                    // echo $get_auth_detail->phone;
                    // die();
                    $send_otp = $this->test_otp($get_auth_detail->phone, $otp);

                    $update_quiz_result = $this->adminModel->update_contest_prize_in_result($quiz_id, $user_id, $amount);
                    $add_notifications = $this->studentModel->add_notifications($user_id, $message);
                }
            }

            $j++;
        }
    }
}else{

    $user_id_data = '';
    $amount_data = '';
    $total_amount = 0;
    $i = 1;
    $j = 0;
    $count = 0;
    $level = 0;
    $tttt = json_decode($prize_pool_calculation->levels_data);
    $count_of_user = count($get_quiz_scores);

    $count_of_winners_by_contest_pool = 0;
    foreach ($tttt as $prize_pool_cal) {
        $level++;

        for ($i = 0; $i < $prize_pool_cal->no_of_winners; $i++) {
            $count_of_winners_by_contest_pool++;
        }
    }

    $j = 0;

    foreach ($tttt as $prize_pool_cal) {
        $level++;

        for ($i = 0; $i < $prize_pool_cal->no_of_winners; $i++) {
            $count++;
            if ($j < count($get_quiz_scores)) {
                $quiz_result  = $get_quiz_scores[$j];
            }


            $amount =  ($get_amount_registered_for_quiz * (100 - $prize_pool_calculation->expenses) * intval($prize_pool_cal->prize_amount_percentage)) / ($prize_pool_cal->no_of_winners * 100 * 100);
            // $amount   = $prize_pool_cal->individual_amount;


            if ($j < count($get_quiz_scores)) {
                $amount_data .= $amount;
                $total_amount += $amount;
                if ($j < $count_of_user - 1) {
                    $amount_data .= ', ';
                }
            }

            if ($count <= count($get_quiz_scores)) {
                if ($j < count($get_quiz_scores)) {
                    $user_id = $quiz_result->user_id;

                    $user_id_data .= $user_id;
                    if ($j < $count_of_user - 1) {
                        $user_id_data .= ', ';
                    }


                    // echo ($user_id_data);
                    // echo "<br>";
                    // echo ($amount_data);
                    // die();

                    $txnid = "Cr / Q-" . $quiz_id;
                    $update_student_balance = $this->adminModel->update_student_balance($user_id, $amount, $txnid, $quiz_id);
                    $message = 'Congratulations! You have won an amount of Rs. ' . $amount . ' from OodlesIn Contest Competition.';
                    $otp = 5555;
                    $get_auth_detail = $this->adminModel->get_auth_detail($user_id);
                    // echo $get_auth_detail->phone;
                    // die();
                    $send_otp = $this->test_otp($get_auth_detail->phone, $otp);

                    $update_quiz_result = $this->adminModel->update_contest_prize_in_result($quiz_id, $user_id, $amount);
                    $add_notifications = $this->studentModel->add_notifications($user_id, $message);
                }
            }

            $j++;
        }
    }
}

        // echo ($user_id_data);
        // echo "<br>";
        // echo ($amount_data);
        // die();
        $update_quiz_disperse_detail =  $this->adminModel->update_quiz_disperse_detail($quiz_id, 1, $user_id_data, $amount_data, $total_amount, $count_of_user);
        $_SESSION['success'] = "The total amount of Rs. " . $total_amount . ' has been successfullly dispersed into the award balance of the students.';
        redirect('admin/generate_detail/' . $quiz_id);
    }


    public function test_otp($phone, $otp)
    {

        $url = "https://manage.smssolutions.in/smsapi/index?key=4634FEEA7A5F49&campaign=0&routeid=16&type=text&contacts=+91" . $phone . "&senderid=OODLES&msg=Your%20one%20time%20password%20is%20" . $otp . ".to%20sign%20to%20your%20account%20madhuOodlesIN";


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

        // function url1($url)
        // {
        //     $result = parse_url($url);
        // }

        curl_exec($curl);
        curl_close($curl);
        return true;
    }


    public function generate_quiz_to_view($quiz_id)
    {

        $generate_function  = $this->adminModel->generate_quiz_to_view($quiz_id);
        $get_all_unparticipated_student = $this->adminModel->get_all_unparticipated_student($quiz_id);

        foreach ($get_all_unparticipated_student as $student) {
            $submit_quiz_result_for_unparticipated = $this->adminModel->submit_quiz_result_for_unparticipated($student->student_id, $quiz_id);
            $get_quiz_detail = $this->adminModel->get_all_quizes_id($quiz_id);
            $message = "The quiz named " . $get_quiz_detail->name . " is finished. Try again,next time.";
            $add_notifications = $this->studentModel->add_notifications($student->student_id, $message);
        }
        $_SESSION['success'] = "The quiz view has been generated! The admin can disperse money now.";
        redirect('admin/quiz_result2/' . $quiz_id);
    }
    public function view_participants_for_contest_quiz($quiz_id)
    {

        $view_participants  = $this->adminModel->get_contest_registration($quiz_id);
        $data = [
            'view_participants' => $view_participants,
        ];
        $this->view('admin/view_participants_for_contest_quiz', $data);
    }


    public function edit_criteria($id)
    {

        $_SESSION['nav'] = "criteria";
        $get_all_class = $this->adminModel->get_all_active_class();
        $get_all_criteria = $this->adminModel->get_all_criteria();
        $get_single_criteria = $this->adminModel->get_criteria_by_id($id);
        $data = [
            'get_all_criteria' => $get_all_criteria,
            'get_all_class' => $get_all_class,
            'get_single_criteria' => $get_single_criteria,
        ];
        $this->view('admin/edit_criteria', $data);
    }


    public function update_criteria($id)
    {


        $criteria_name = $_POST['criteria_name'];
        // $category_name = $_POST['category_name'];
        $criteria_type = $_POST['criteria_type'];
        $class = $_POST['class'];

        // die();
        if ($criteria_type == 1) {
            if (!isset($_POST['yes_no_based'])) {
                $_SESSION['success'] = "Please select Yes or No";
                redirect('admin/add_criteria');
                exit();
            }
        }
        if ($criteria_type == 2) {
            if (empty($_POST['start_date'])) {
                $_SESSION['success'] = "Please fill Start Date";
                redirect('admin/add_criteria');
                exit();
            }
            if (empty($_POST['end_date'])) {
                $_SESSION['success'] = "Please fill End Date";
                redirect('admin/add_criteria');
                exit();
            }
        }
        if ($criteria_type == 3) {
            if (empty($_POST['start_range'])) {
                $_SESSION['success'] = "Please fill Start Range";
                redirect('admin/add_criteria');
                exit();
            }
            if (empty($_POST['end_range'])) {
                $_SESSION['success'] = "Please fill End Range";
                redirect('admin/add_criteria');
                exit();
            }
        }
        if (!empty($_POST['yes_no_based'])) {
            ($yes_no_based = $_POST['yes_no_based']);
        } else {
            $yes_no_based = 0;
        }
        if (!empty($_POST['start_date'])) {
            ($start_date = $_POST['start_date']);
        } else {
            $start_date = null;
        }
        if (!empty($_POST['end_date'])) {
            ($end_date = $_POST['end_date']);
        } else {
            $end_date = null;
        }
        if (!empty($_POST['start_range'])) {
            ($start_range = $_POST['start_range']);
        } else {
            $start_range = null;
        }
        if (!empty($_POST['end_range'])) {
            ($end_range = $_POST['end_range']);
        } else {
            $end_range = null;
        }


        $result = $this->adminModel->update_criteria($id, $criteria_name, $criteria_type, $yes_no_based, $start_date, $end_date, $start_range, $end_range, $class);

        if ($result) {

            $_SESSION['success'] = "Criteria updated Successfully";
            redirect('admin/edit_criteria/' . $id);
        } else {
            $_SESSION['success'] = "Criteria detail not  Updated";
            redirect('admin/edit_criteria/' . $id);
        }
    }

    public function create_document()
    {

        $document_name = $_POST['name'];
        // $category_name = $_POST['category_name'];
        $expiry_date = $_POST['expiry_date'];
        $result = $this->adminModel->add_document($document_name, $expiry_date);
        if ($result) {
            $_SESSION['success'] = "Scholarship Document added Successfully";
            redirect('admin/add_document');
        } else {
            $_SESSION['success'] = "Scholarship Document detail not  Updated";
            redirect('admin/add_document');
        }
    }
    public function update_document_status($id, $status)
    {
        # code...
        $result = $this->adminModel->update_document_status($id, $status);

        if ($result) {

            $_SESSION['success'] = "Status updated Successfully";
            redirect('admin/add_document');
        } else {
            $_SESSION['success'] = "Status detail not  Updated";
            redirect('admin/add_document');
        }
    }
    public function update_document($id)
    {

        $document_name = $_POST['name'];
        // $category_name = $_POST['category_name'];
        $expiry_date = $_POST['expiry_date'];
        // $class = $_POST['class'];

        $result = $this->adminModel->update_document($id, $document_name, $expiry_date);

        if ($result) {

            $_SESSION['success'] = "Scholarship Document Updated Successfully";
            redirect('admin/edit_document/' . $id);
        } else {
            $_SESSION['success'] = "Scholarship Document detail not  Updated";
            redirect('admin/edit_document/' . $id);
        }
    }
    public function edit_document($id)
    {

        $_SESSION['nav'] = "document";
        $get_all_class = $this->adminModel->get_all_active_class();

        $get_all_document = $this->adminModel->get_all_document();
        $get_single_document = $this->adminModel->get_document_by_id($id);

        $data = [
            'get_all_document' => $get_all_document,
            'get_all_class' => $get_all_class,
            'get_single_document' => $get_single_document,
        ];
        $this->view('admin/edit_document', $data);
    }
    public function update_criteria_status($id, $status)
    {
        # code...
        $result = $this->adminModel->update_criteria_status($id, $status);

        if ($result) {

            $_SESSION['success'] = "Status updated Successfully";
            redirect('admin/add_criteria');
        } else {
            $_SESSION['success'] = "Status detail not  Updated";
            redirect('admin/add_criteria');
        }
    }
    public function update_subadmin_status($id, $status)
    {
        # code...
        $result = $this->adminModel->update_subadmin_status($id, $status);

        if ($result) {

            $_SESSION['success'] = "Status updated Successfully";
            redirect('admin/add_subadmin');
        } else {
            $_SESSION['success'] = "Status detail not  Updated";
            redirect('admin/add_subadmin');
        }
    }


    // public  function image($id){
    //     $get_scholarship_data= $this->adminModel->get_scholarship_data($id);
    //     $data=[
    //         'get_scholarship_data'=>$get_scholarship_data,
    //     ];
    //     $this->view('admin/image',$data);
    // }

    public function edit_scholarship($id)
    {
        // $data=[
        //     'id'=>$id,
        // ];
        // $this->view('admin/edittt_scholarship',$data);
        $get_all_active_class = $this->adminModel->get_all_active_class();
        $get_all_criteria = $this->adminModel->get_all_criteria();
        $get_all_document = $this->adminModel->get_all_document();
        $get_all_corporate = $this->adminModel->get_all_corporate();
        $get_scholarship_type = $this->adminModel->get_scholarship_type();
        $get_scholarship_data = $this->adminModel->get_scholarship_data($id);
        $data = [
            'get_all_criteria' => $get_all_criteria,
            'get_all_document' => $get_all_document,
            'get_all_corporate' => $get_all_corporate,
            'get_scholarship_type' => $get_scholarship_type,
            'get_all_class' => $get_all_active_class,
            'get_scholarship_data' => $get_scholarship_data,
            'id' => $id,
        ];
        $_SESSION['nav'] = "scholarship";
        // $this->view('admin/add_scholarship', $data);
        $this->view('admin/edit_scholarship', $data);
    }


    // -------------------------

    public function update_scholarship_status2($id, $status)
    {
        # code...
        $result = $this->adminModel->update_scholarship_status2($id, $status);

        if ($result) {

            $_SESSION['success'] = "Status updated Successfully";
            redirect('admin/all_scholarships');
        } else {
            $_SESSION['success'] = "Status detail not  Updated";
            redirect('admin/all_scholarships');
        }
    }
    public function update_scholarship_type_status($id, $status)
    {
        # code...
        $result = $this->adminModel->update_scholarship_type_status($id, $status);

        if ($result) {

            $_SESSION['success'] = "Status updated Successfully";
            redirect('admin/add_scholarship_type');
        } else {
            $_SESSION['success'] = "Status detail not  Updated";
            redirect('admin/add_scholarship_type');
        }
    }
    public function update_scholarship_featured($id, $featured)
    {
        # code...
        $result = $this->adminModel->update_scholarship_featured($id, $featured);

        if ($result) {

            $_SESSION['success'] = "Status updated Successfully";
            redirect('admin/all_scholarships');
        } else {
            $_SESSION['success'] = "Status detail not  Updated";
            redirect('admin/all_scholarships');
        }
    }

    // -----------

    public function transactions_details()
    {
        // $get_all_wallet = $this->adminModel->get_all_wallet();
        // $get_wallet_control = $this->adminModel->get_wallet_control();
        $get_wallet_data = $this->adminModel->get_wallet_data();
        // $get_all_students = $this->adminModel->get_all_students();
        $data = [
            // 'get_all_wallet' => $get_all_wallet,
            // 'get_wallet_control' => $get_wallet_control,
            'get_wallet_data' => $get_wallet_data,
            // 'get_all_students' => $get_all_students,
        ];
        $this->view('admin/transactions_details', $data);
    }
    public function student_wallet()
    {
        $get_all_wallet = $this->adminModel->get_all_wallet();
        $get_wallet_control = $this->adminModel->get_wallet_control();
        $get_wallet_data = $this->adminModel->get_wallet_data();
        $get_all_students = $this->adminModel->get_all_students();
        $data = [
            'get_all_wallet' => $get_all_wallet,
            'get_wallet_control' => $get_wallet_control,
            'get_wallet_data' => $get_wallet_data,
            'get_all_students' => $get_all_students,
        ];
        $this->view('admin/student_wallet', $data);
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
            $scholarship_file = null;
        }


        if (isset($_POST['website_check'])) {
            $website_check = 1;
        } else {
            $website_check = 0;
        }

        // if (isset($_POST['checkbox'])) {
        //     $criteria = implode(',', $_POST['checkbox']);
        // } else {
        //     $criteria = implode(',', array(0));
        // }
        // if (isset($_POST['checkbox'])) {
        //     $criteria = implode(',', $_POST['checkbox']);
        // } else {
        //     $criteria = implode(',', array(0));
        // }
        // if (isset($_POST['documents_required'])) {
        //     $documents_required = implode(',', $_POST['documents_required']);
        // } else {
        //     $documents_required = implode(',', array(0));
        // }
        if (isset($_POST['course'])) {
            $course = implode(',', $_POST['course']);
        }

        $data = [

            'course' => $course,
            'type' => $_POST['type'],
            'eligible_candidates' => $_POST['eligible_candidates'],
            'name' => $_POST['name'],
            'state' => $_POST['state'],
            'offered_by' => $_POST['offered_by'],
            'no_of_scholarships' => $_POST['no_of_scholarships'],
            'url' => $_POST['url'],
            'description' => $_POST['description'],
            'minimum_eligibility' => $_POST['minimum_eligibility'],
            'application_process' => $_POST['application_process'],
            'reservation' => $_POST['reservation'],
            'contact_number' => $_POST['contact_number'],
            'detailed_eligibility_url' => $_POST['detailed_eligibility_url'],
            'direct_link_to_apply' => $_POST['direct_link_to_apply'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'email_id' => $_POST['email_id'],
            'scholarship_amount' => $_POST['scholarship_amount'],
            'website_check' => $website_check,
            // 'criteria' => $criteria,
            // 'documents_required' => $documents_required,
            'scholarship_file' => $scholarship_file,
            'instructions' => $_POST['instructions'],
            'class_display' => $_POST['class_display'],
            'student_charge' => $_POST['student_charge'],
            'subadmin' => $_POST['subadmin'],

        ];


        $result = $this->adminModel->add_scholarship($data);

        if ($result) {
            flash('message', 'Records Updated');
            // $_SESSION['success'] = "Scholarship added Successfully";
            redirect('admin/select_criteria_and_document/' . $result);
        } else {
            $_SESSION['success'] = "Scholarship detail not Updated";
            redirect('admin/add_scholarship');
        }
    }

    public function update_scholarship($id)
    {

        $get_ind_scholarship = $this->adminModel->get_ind_scholarship($id);


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
            $scholarship_file = $get_ind_scholarship->scholarship_file;
        }
        if (isset($_POST['website_check'])) {
            $website_check = 1;
        } else {
            $website_check = 0;
        }
        // if (isset($_POST['checkbox'])) {
        //     $criteria = implode(',', $_POST['checkbox']);
        // } else {
        //     $criteria = implode(',', array(0));
        // }
        // if (isset($_POST['checkbox'])) {
        //     $criteria = implode(',', $_POST['checkbox']);
        // } else {
        //     $criteria = implode(',', array(0));
        // }
        // if (isset($_POST['documents_required'])) {
        //     $documents_required = implode(',', $_POST['documents_required']);
        // } else {
        //     $documents_required = implode(',', array(0));
        // }
        if (isset($_POST['course'])) {
            $course = implode(',', $_POST['course']);
        }
        $data = [
            'course' => $course,
            'type' => $_POST['type'],
            'eligible_candidates' => $_POST['eligible_candidates'],
            'name' => $_POST['name'],
            'state' => $_POST['state'],
            'offered_by' => $_POST['offered_by'],
            'no_of_scholarships' => $_POST['no_of_scholarships'],
            'url' => $_POST['url'],
            'description' => $_POST['description'],
            'minimum_eligibility' => $_POST['minimum_eligibility'],
            'application_process' => $_POST['application_process'],
            'reservation' => $_POST['reservation'],
            'contact_number' => $_POST['contact_number'],
            'detailed_eligibility_url' => $_POST['detailed_eligibility_url'],
            'direct_link_to_apply' => $_POST['direct_link_to_apply'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'email_id' => $_POST['email_id'],
            'scholarship_amount' => $_POST['scholarship_amount'],
            'website_check' => $website_check,
            'student_charge' => $_POST['student_charge'],

            // 'criteria' => $criteria,
            // 'documents_required' => $documents_required,
            'scholarship_file' => $scholarship_file,

            'instructions' => $_POST['instructions'],
            'class_display' => $_POST['class_display'],
        ];
        $result = $this->adminModel->update_scholarship($data, $id);
        if ($result) {
            flash('message', 'Records Updated');
            $_SESSION['success'] = "Scholarship edited Successfully";
            redirect('admin/select_criteria_and_document/' . $id);
        } else {
            $_SESSION['success'] = "Scholarship detail not Updated";
            redirect('admin/edit_scholarship/' . $id);
        }
    }

    public function update_scholarship_status_operations($id, $application_id)
    {
        # code...
        // $flag  = $_POST['flag'];
        if (isset($_POST['flag'])) {
            $flag = 0;
        } else {
            $flag = 1;
        }


        $update_flag = $this->adminModel->update_scholarship_status_operations($id, $flag);

        if ($update_flag) {
            // $_SESSION['success'] = "Done";
            redirect('admin/scholarship_status/' . $application_id . '/2');
        } else {
            // $_SESSION['success'] = "Not Done";
            redirect('admin/scholarship_status/' . $application_id . '/2');
        }
    }

    public function scholarship_status($id, $page_id = null)
    {
        $get_scholarship_application = $this->corporateModel->get_ind_scholarship_application($id);
        $student_id = $get_scholarship_application->student_id;
        $get_student_detail_from_auth = $this->adminModel->get_auth_detail($student_id);

        $scholarship_id = $get_scholarship_application->scholarship_id;
        $get_scholarship_data = $this->adminModel->get_scholarship_data($scholarship_id);
        $get_scholarship_status_interview = $this->adminModel->get_scholarship_status_interview($id);
        $get_scholarship_status_operations = $this->adminModel->get_scholarship_status_operations($id);
        $get_scholarship_status_recordings = $this->adminModel->get_scholarship_status_recordings($id);
        $get_scholarship_student_status = $this->adminModel->get_scholarship_status($id);
        $get_scholarship_document_status = $this->adminModel->get_scholarship_document_status($id);

        $data = [
            'get_scholarship_application' => $get_scholarship_application,
            'get_scholarship_status_interview' => $get_scholarship_status_interview,
            'get_scholarship_status_operations' => $get_scholarship_status_operations,
            'get_scholarship_status_recordings' => $get_scholarship_status_recordings,
            'id' => $page_id,
            'get_scholarship_data' => $get_scholarship_data,
            'get_student_detail_from_auth' => $get_student_detail_from_auth,
            'application_id' => $id,
            'scholarship_id' => $scholarship_id,
            'get_scholarship_student_status' => $get_scholarship_student_status,
            'get_scholarship_document_status' => $get_scholarship_document_status,
        ];
        // print_r($get_scholarship_status_recordings);
        // die;

        // echo  $page_id;
        // die();
        $this->view('admin/scholarship_status', $data);
    }


    public function add_scholarship_status_interview($application_id)
    {

        // echo $_POST['interview_date'];
        // die;

        $data = [

            'student_id' => $_POST['student_id'],
            'application_id' => $application_id,
            'scholarship_id' => $_POST['scholarship_id'],

            'interview_levels' => $_POST['interview_levels'],
            'interview_date' => $_POST['interview_date'],
            'interview_time' => $_POST['interview_time'],
            'interview_comments' => $_POST['interview_comments'],
            'interview_phone_number' => $_POST['interview_phone_number']

        ];

        $result = $this->adminModel->add_scholarship_status_interview($data);

        if ($result) {
            $_SESSION['success'] = "Done";
            redirect('admin/scholarship_status/' . $application_id . '/1');
        } else {
            $_SESSION['success'] = "Not Done";
            redirect('admin/scholarship_status/' . $application_id . '/1');
        }
    }

    public function add_scholarship_status_operations($application_id)
    {

        // print_r($_REQUEST);
        // echo $_POST['application_id'];
        // die;

        $data = [

            'student_id' => $_POST['student_id'],
            'application_id' => $application_id,
            'scholarship_id' => $_POST['scholarship_id'],

            'operations_title' => $_POST['operations_title'],
            'operations_date' => $_POST['operations_date'],
            'operations_time' => $_POST['operations_time']

        ];

        $result = $this->adminModel->add_scholarship_status_operations($data);

        if ($result) {
            $_SESSION['success'] = "Done";
            redirect('admin/scholarship_status/' . $application_id . '/2');
        } else {
            $_SESSION['success'] = "Not Done";
            redirect('admin/scholarship_status/' . $application_id . '/2');
        }
    }

    public function add_scholarship_status_recordings($application_id)
    {

        // print_r($_FILES['recording_call_file']['name']);

        // echo $_POST['interview_date'];
        // die;

        if (!empty($_FILES['recording_call_file']['name'])) {
            $f_name = $_FILES['recording_call_file']['name'];
            $f_temp = $_FILES['recording_call_file']['tmp_name'];
            $size = $_FILES['recording_call_file']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $allowed_extensions = array('mp3'); // add any other allowed extensions here
            if (in_array($f_extension, $allowed_extensions)) {
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $recording_call_file = $f_newfile;
            } else {
                // the file extension is not allowed
                $_SESSION['success'] = "Done";
                redirect('admin/scholarship_status/' . $application_id . '/3');
                $recording_call_file = null;
                // you may want to display an error message to the user here
            }
        } else {
            $recording_call_file = null;
        }

        $data = [

            'student_id' => $_POST['student_id'],
            'application_id' => $application_id,
            'scholarship_id' => $_POST['scholarship_id'],

            'recording_title' => $_POST['recording_title'],
            'recording_caller_name' => $_POST['recording_caller_name'],
            'recording_caller_purpose' => $_POST['recording_caller_purpose'],
            'recording_call_disposition' => $_POST['recording_call_disposition'],
            'recording_caller_comments' => $_POST['recording_caller_comments'],
            'recording_call_file' => $recording_call_file

        ];

        $result = $this->adminModel->add_scholarship_status_recordings($data);

        if ($result) {
            $_SESSION['success'] = "Done";
            redirect('admin/scholarship_status/' . $application_id . '/3');
        } else {
            $_SESSION['success'] = "Not Done";
            redirect('admin/scholarship_status/' . $application_id . '/3');
        }
    }
    public function update_interview_status($interview_id)
    {

        // print_r($_FILES['recording_call_file']['name']);

        // echo $_POST['interview_date'];
        // die;

        if (!empty($_FILES['recording_call_file']['name'])) {
            $f_name = $_FILES['recording_call_file']['name'];
            $f_temp = $_FILES['recording_call_file']['tmp_name'];
            $size = $_FILES['recording_call_file']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $allowed_extensions = array('mp3', 'mp4'); // add any other allowed extensions here
            if (in_array($f_extension, $allowed_extensions)) {
                $f_newfile = uniqid() . '.' . $f_extension;
                $store = "uploads/" . $f_newfile;
                move_uploaded_file($f_temp, $store);
                $recording_call_file = $f_newfile;
            } else {
                // the file extension is not allowed
                $_SESSION['success'] = "Done";
                redirect('admin/scholarship_status/' . $interview_id . '/1');
                $recording_call_file = null;
                // you may want to display an error message to the user here
            }
        } else {
            $recording_call_file = null;
        }
        $application_id = $_POST['application_id'];
        $data = [

            // 'student_id' => $_POST['student_id'],
            'interview_id' => $interview_id,
            // 'scholarship_id' => $_POST['scholarship_id'],
            // 'application_id' => $_POST['application_id'],
            'recording_call_disposition' => $_POST['recording_call_disposition'],
            'recording_caller_comments' => $_POST['recording_caller_comments'],
            'recording_call_file' => $recording_call_file,
            'interview_flag' => 1,

        ];

        $result = $this->adminModel->update_interview_status($data);
        // echo $application_id;
        // die();
        if ($result) {
            $_SESSION['success'] = "Done";
            redirect('admin/scholarship_status/' . $application_id . '/1');
        } else {
            $_SESSION['success'] = "Not Done";
            redirect('admin/scholarship_status/' . $application_id . '/1');
        }
    }
    public function scholarship_document_status($application_id, $doc_id)
    {
        if ($_SESSION['rexkod_oodles_login_type'] == "admin") {
            $type = "admin";
        } elseif ($_SESSION['rexkod_oodles_login_type'] == "subadmin_scholarship") {
            $type = "subadmin";
        } elseif ($_SESSION['rexkod_oodles_login_type'] == "corporate") {
            $type = "corporate";
        }
        $data = [
            'document_status' => $_POST['document_status'],
            'document_comment' => $_POST['document_comment'],
            'doc_id' => $doc_id,
            // 'scholarship_id' => $_POST['scholarship_id'],
            'application_id' => $application_id,
            'type' => $type,
        ];

        $result = $this->adminModel->add_scholarship_document_status($data);

        if ($result) {


            if(isset($_SESSION['rexkod_oodles_admin_id'])) {
                $_SESSION['success'] = "Done";
                redirect('admin/scholarship_status/' . $application_id . '/4');
            } elseif(isset($_SESSION['rexkod_oodles_corporate_id'])) {
                $_SESSION['success'] = "Done";
                redirect('corporate/scholarship_status/' . $application_id . '/4');
            } else {
                $_SESSION['success'] = "Not Done";
                redirect('admin/scholarship_status/' . $application_id . '/4');
            }
        }
    }

    public function scholarship_app_remark($id)
    {
        $get_scholarship_application = $this->corporateModel->get_ind_scholarship_application($id);
        $remark_data = $_POST['remark'];
        $remark = $get_scholarship_application->remark;
        if (($remark == null) || ($remark == 0)) {
            $remark = $remark_data;
        } else {
            $remark = $remark . "|||||" . $remark_data;
        }
        $auth_id = $_SESSION['rexkod_oodles_admin_id'];

        $update_scholarship_application_remark = $this->corporateModel->update_scholarship_app_remark($id, $remark, $auth_id);
        if ($update_scholarship_application_remark) {
            $_SESSION['success'] = 'Remark has been added';
            redirect('admin/scholarship_status/' . $id . '/5');
        } else {
            $_SESSION['success'] = 'Something went wrong!';
            redirect('admin/scholarship_status/' . $id . '/5');
        }
    }

    public function scholarship_app_grant_money($id)
    {
        $get_scholarship_application = $this->corporateModel->get_ind_scholarship_application($id);
        $dispersement_data = $_POST['dispersement'];
        $dispersement = $get_scholarship_application->dispersement;
        if (($dispersement == null) || ($dispersement == 0)) {
            $dispersement = $dispersement_data;
        } else {
            $dispersement = $dispersement_data;
        }
        if (isset($_POST['grant'])) {
            $status = 3;
        } elseif (isset($_POST['reject'])) {
            $status = 4;
        }
        $auth_id = $_SESSION['rexkod_oodles_admin_id'];

        if ($status == 3 && (($dispersement_data !== null) || $dispersement_data != 0)) {
            $update_scholarship_application_dispersement = $this->corporateModel->update_scholarship_app_dispersement($id, $dispersement, $status, $auth_id);
        } elseif ($status = 4) {
            $scholarship_grant_cum_reject = $this->corporateModel->scholarship_grant_cum_reject($id, $status, $auth_id);
        }

        if ($update_scholarship_application_dispersement) {
            $_SESSION['success'] = 'Money has been added';
            redirect('admin/scholarship_status/' . $id . '/6');
        } elseif ($scholarship_grant_cum_reject) {
            $_SESSION['success'] = 'Scholarship Rejected';
            redirect('admin/scholarship_status/' . $id . '/6');
        } elseif ($dispersement_data == null) {
            $_SESSION['success'] = 'Please fill the dispersement amount!';
            redirect('admin/scholarship_status/' . $id . '/6');
        } else {
            $_SESSION['success'] = 'Something went wrong';
            redirect('admin/scholarship_status/' . $id . '/6');
        }
    }
    public function delete_scholarship_status_operations($id, $application_id)
    {

        // print_r($_REQUEST);
        // echo $_POST['application_id'];
        // die;


        $result = $this->adminModel->delete_scholarship_status_operations($id);

        if ($result) {
            $_SESSION['success'] = "Done";
            redirect('admin/scholarship_status/' . $application_id . '/2');
        } else {
            $_SESSION['success'] = "Not Done";
            redirect('admin/scholarship_status/' . $application_id . '/2');
        }
    }
    public function delete_prize_pool($id)
    {



        $result = $this->adminModel->delete_prize_pool($id);

        if ($result) {
            $_SESSION['success'] = "Contest Pool Deleted";
            redirect('admin/prize_pool_calculations');
        } else {
            $_SESSION['success'] = "Not Done";
            redirect('admin/prize_pool_calculations');
        }
    }

    public function create_market_place()
    {
        if (!empty($_FILES['image']['name'])) {
            $f_name = $_FILES['image']['name'];
            $f_temp = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $image = $f_newfile;
        } else {
            $image = null;
        }

        $data = [

            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'offer_price' => $_POST['offer_price'],
            'image' => $image,
            'description' => $_POST['description'],
            'quantity' => $_POST['quantity'],

        ];
        $create_plans = $this->adminModel->create_market_place($data);

        if ($create_plans) {
            $_SESSION['success'] = "Market Place Addded";
            redirect('admin/add_market_place');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/add_market_place');
        }
    }
    public function update_market_place_status($id, $status)
    {
        if ($status == 1) {
            $update_active_status_db = $this->adminModel->update_market_place_status($id, $status);
            $_SESSION['success'] = "Activate successfully";
            redirect('admin/add_market_place');
        } elseif ($status == 0) {
            $update_active_status_db = $this->adminModel->update_market_place_status($id, $status);
            $_SESSION['success'] = "De-Activated successfully";
            redirect('admin/add_market_place');
        }
    }
    public function update_market_place_orders_status($order_id)
    {

        $status = $_POST['status'];
        $get_market_place_order_detail = $this->adminModel->get_market_place_order_detail($order_id);
        $user_id = $get_market_place_order_detail->user_id;
        $market_place_id = $get_market_place_order_detail->product_id;
        $get_single_market_place = $this->adminModel->get_single_market_place($get_market_place_order_detail->product_id);
        $new_quantity = intval($get_single_market_place->quantity) + 1; //post rejecting, increase the quantity by 1
        $getWallet = $this->adminModel->getWallet($user_id);
        $product_price = $get_single_market_place->offer_price;
        // echo $bonus_coins;

        $transaction_id = 'Cr / MP  - ' . $market_place_id;
        $type = 18;

        $new_bonus_coins = intval($getWallet->bonus_coins) + $product_price; //post rejecting, add the bonus coins back
        // echo $new_bonus_coins;
        // die();
        if ($status != 3) {

            $update_market_place_orders_status = $this->adminModel->update_market_place_orders_status($order_id, $status);
        } else {
            if($get_market_place_order_detail->status!=3) {
                $update_market_place_orders_status = $this->adminModel->update_market_place_order_reject_status($order_id, $status, $market_place_id, $new_quantity, $user_id, $product_price, $new_bonus_coins, $transaction_id, $type);
            } else {
                $_SESSION['success'] = "Multiple Rejection of Orders Detected! Already status rejected placed";
                redirect('admin/market_place_orders');
                die();
            }

        }
        // echo $order_id->product_id;
        // die();


        $insert_market_place_order_log = $this->adminModel->insert_market_place_order_log($order_id, $status);

        if ($update_market_place_orders_status && $status == 0) {
            $_SESSION['success'] = "Order Id: " . $order_id . " status changed to Order Placed";
            redirect('admin/market_place_orders');
        } elseif ($update_market_place_orders_status && $status == 1) {
            $_SESSION['success'] = "Order Id: " . $order_id . " status changed to In Transit";
            $message = "Your purchase of product " . $get_single_market_place->name . "  status changed to In Transit";
            $add_notifications = $this->studentModel->add_notifications($user_id, $message);
            redirect('admin/market_place_orders');
        } elseif ($update_market_place_orders_status && $status == 2) {
            $_SESSION['success'] = "Your purchase of product " . $get_single_market_place->name . "  status changed to Delivered";
            $message = "Your purchase of product " . $get_single_market_place->name . "  status changed to Delivered";
            $add_notifications = $this->studentModel->add_notifications($user_id, $message);
            redirect('admin/market_place_orders');
        } elseif ($update_market_place_orders_status && $status == 3) {
            $_SESSION['success'] = "Order Id: " . $order_id . " status changed to Rejected";
            $message = "Your purchase of product " . $get_single_market_place->name . "  status changed to Rejected. The subsequent coins i.e., " . $product_price . " will be returned to your wallet.";

            $add_notifications = $this->studentModel->add_notifications($user_id, $message);

            redirect('admin/market_place_orders');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('admin/market_place_orders');
        }
    }



    // transction filter  ----by ashutosh

    // public function transaction_filter(){
    //     $start_date = $_POST['start_date'];
    //     $end_date = $_POST['end_date'];
    //     $get_wallet_data = $this->adminModel->get_transaction_filter($start_date,$end_date);
    //     $data = [

    //         'get_wallet_data' => $get_wallet_data,

    //     ];
    //     $this->view('admin/transactions_details', $data);

    // }


    public function transaction_filter()
    {
        // Get the input values from the form
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
        $quiz_id = isset($_POST['quiz_id']) ? $_POST['quiz_id'] : null;
        $scholarship_id = isset($_POST['scholarship_id']) ? $_POST['scholarship_id'] : null;
        $market_place_id = isset($_POST['market_place_id']) ? $_POST['market_place_id'] : null;


        // Filter the transactions based on the input
        $get_wallet_data = $this->adminModel->get_transaction_filter($start_date, $end_date, $user_id, $quiz_id, $scholarship_id, $market_place_id);

        // Render the view
        $data = [

            'get_wallet_data' => $get_wallet_data,

        ];
        $this->view('admin/transactions_details', $data);
    }
// edit the prize pool after registration closed

    public function edit_prize_after_registration($quiz_id){

        // echo "hii";
        $get_quiz_detail = $this->adminModel->get_all_quizes_id($quiz_id);

        $contest_prize_calculation = $this->adminModel->get_contest_prize_calculations($get_quiz_detail->prize_calc_data_id);
        $get_total_count_of_registration = $this->adminModel->get_contest_registration($quiz_id);
        $count_of_quiz_registration = count($get_total_count_of_registration);
        $get_quiz_particpation_fee = $contest_prize_calculation->entry_fee;
        $get_amount_registered_for_quiz = $get_quiz_particpation_fee * $count_of_quiz_registration;
        

        $data = [
            'contest_prize_calculation' => $contest_prize_calculation,
            'get_amount_registered_for_quiz' => $get_amount_registered_for_quiz,
            'get_quiz_detail' => $get_quiz_detail,
            'count_of_quiz_registration' => $count_of_quiz_registration,
        ];

        $this->view('admin/edit_prize_after_registration', $data);
    }

    public function final_prize_amount_store($id)
    {

        $data = [
            'quiz_id' => $id,
            'no_of_participants' => $_POST['no_of_participants'],
            'entry_fee' => $_POST['entry_fee'],
            'total_amount_collected' => $_POST['total_amount_collected'],
            'expenses' => $_POST['expenses'],
            'total_expenses' => $_POST['total_expenses'],
            'prize_pool_amount' => $_POST['prize_pool_amount'],
            'no_of_winners_percentage' => $_POST['no_of_winners_percentage'],
            'total_no_of_winners' => $_POST['total_no_of_winners'],
            'total_no_of_levels' => $_POST['total_no_of_levels']
        ];

        for ($i = 0; $i < $_POST['total_no_of_levels']; $i++) {
            $levels_data[$i] = [
                "level_no" =>  $_POST['level_no' . $i],
                "winners_percentage" =>  $_POST['lv_winners_percentage' . $i],
                "no_of_winners" =>  $_POST['lv_no_of_winners' . $i],
                "individual_amount" =>  $_POST['lv_individual_amount' . $i],
                "total_amount" =>  $_POST['lv_total_amount' . $i],
                "prize_amount_percentage" =>  $_POST['lv_prize_amount_percentage' . $i]

            ];
        }
        $levels_data = json_encode($levels_data);

        // echo $levels_data;
        // die;

        $result = $this->adminModel->final_prize_amount_store($data, $levels_data);

        if ($result) {
            $_SESSION['success'] = "Prize Pool Updated Successfully ";
            redirect('admin/contest_prize_detail/' . $id . '/' .$result);
        } else {
            $_SESSION['success'] = 'Prize Pool Calculation not added';
            redirect('admin/edit_prize_after_registration/'. $id);
        }




    }
    public function resume2($student_id) {

        $student_details = $this->studentModel->get_student_detail($student_id);
        $data = [
            'student_id' => $student_id,
            'student_details' => $student_details,
        ];
        $this->view('admin/resume2',$data);
    }

    public function courses(){

        $courses = $this->adminModel->get_all_courses();
        $data = [
            'courses' => $courses,
        ];
        $this->view('admin/courses',$data);
    
    }
    public function update_course($id){
        $price = $_POST['price'];
        $discounted_price = $_POST['discounted_price'];

        $courses = $this->adminModel->update_course($id,$price, $discounted_price);
        
        redirect('admin/courses');

    
    }
    public function subscriptions_taken(){

        $get_edugorilla_package_responses = $this->adminModel->get_edugorilla_package_responses();
        $data = [
            'get_edugorilla_package_responses' => $get_edugorilla_package_responses,
        ];
        $this->view('admin/subscriptions_taken',$data);
    
    }
}
