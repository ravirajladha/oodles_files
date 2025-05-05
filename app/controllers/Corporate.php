<?php
class Corporate extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admins');
        $this->pageModel = $this->model('Page');
        $this->studentModel = $this->model('Students');
        $this->teacherModel = $this->model('Teachers');
        $this->corporateModel = $this->model('Corporates');
    }

    public function index()
    {

        // $_SESSION['nav'] = "home";

        if (isset($_SESSION['rexkod_oodles_corporate_id'])) {
            $this->view('corporate/index');
        } else {
            $this->view('corporate/login');
        }
    }

    public function scholarship_status($id, $page_id = Null)
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
        $this->view('corporate/scholarship_status', $data);
    }

    public function register()
    {
        if (isset($_SESSION['rexkod_oodles_teacher_id'])) {

            redirect('corporate/index');
        } else {
            $get_school_detail  = $this->adminModel->get_school_detail();
            $data = [
                'get_school_detail' => $get_school_detail,
            ];
            $this->view('corporate/register', $data);
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
                redirect('corporate/register');
            } else if ($this->pageModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('corporate/register');
            } else {


                if ($this->pageModel->findUserByphno($phone)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('corporate/register');
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
                        redirect('corporate/index');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('corporate/register');
                    }
                }
            }
        } else {
            redirect('corporate/register');
        }
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
     
     if($get_scholarship_application->status !=4){

      
        $doc_verify = $get_scholarship_application->doc_verify;
        $status = $get_scholarship_application->status;
        if (($doc_verify == NULL) || ($doc_verify == 0) ) {
            $doc_verify = $document_id;
        } else {
            $doc_verify = $doc_verify . "," . $document_id;
        }
// this code needs to be improvised later
// checking whether the docs has been completely verified
// the flag denotes that all the document in the scholarship_application matches with the scholarship_required_docs
            $get_scholarship_id = $get_scholarship_application->scholarship_id;
            $get_scholarship_detail = $this->corporateModel->get_ind_scholarship($get_scholarship_id);
            $get_submitted_doc_id = explode(',',$doc_verify);
            $get_required_doc = $get_scholarship_detail->documents_required;
            $get_exploded_required_doc = explode(',',$get_required_doc);
            foreach($get_exploded_required_doc as $doc){
                if (in_array($doc, $get_submitted_doc_id)){
                            $flag = 1;
                            
                    }else{
                        $flag = 0;
                    }
            }
        if($flag==1){
            $status=2;
        }
        $auth_id = $_SESSION['rexkod_oodles_corporate_id'];
        $update_scholarship_application_doc_verify = $this->corporateModel->update_scholarship_app_doc_verify($id, $doc_verify,$flag,$status,$auth_id);
        if ($update_scholarship_application_doc_verify) {
            $_SESSION['success'] = 'Document Status is Verified';
            
           

            redirect('corporate/scholarship_status/' . $id);
        } else {
            $_SESSION['success'] = 'Something went wrong!';
            redirect('corporate/scholarship_status/' . $id);
        }
    } else {
        $_SESSION['success'] = 'The scholarship has already been rejected!';
        redirect('corporate/scholarship_status/' . $id);
    }
    }
    public function scholarship_app_remark($id)
    {

        $get_scholarship_application = $this->corporateModel->get_ind_scholarship_application($id);
       $remark_data = $_POST['remark'];
        $remark = $get_scholarship_application->remark;
        if (($remark == NULL) || ($remark == 0)){
            $remark = $remark_data;
        } else {
            $remark = $remark . "|||||" . $remark_data;
        }
        $auth_id = $_SESSION['rexkod_oodles_corporate_id'];

        $update_scholarship_application_remark= $this->corporateModel->update_scholarship_app_remark($id, $remark,$auth_id);
        if ($update_scholarship_application_remark) {
            $_SESSION['success'] = 'Remark has been added';
            redirect('corporate/scholarship_status/' . $id);
        } else {
            $_SESSION['success'] = 'Something went wrong!';
            redirect('corporate/scholarship_status/' .$id);
        }
    }
    
    public function scholarship_app_grant_money($id)
    {
        $get_scholarship_application = $this->corporateModel->get_ind_scholarship_application($id);
       $dispersement_data = $_POST['dispersement'];
        $dispersement = $get_scholarship_application->dispersement;
        if (($dispersement == NULL) || ($dispersement == 0)){
            $dispersement = $dispersement_data;
        } else {
            $dispersement = $dispersement_data;
        }
        if(isset($_POST['grant'])){
            $status = 3;
        }elseif(isset($_POST['reject'])){
            $status = 4;
        }
        $auth_id = $_SESSION['rexkod_oodles_corporate_id'];

        if($status==3 && (($dispersement_data !== Null) || $dispersement_data !=0 )){ 
        $update_scholarship_application_dispersement= $this->corporateModel->update_scholarship_app_dispersement($id, $dispersement,$status,$auth_id);
        }elseif($status=4){
            $scholarship_grant_cum_reject= $this->corporateModel->scholarship_grant_cum_reject($id, $status,$auth_id);
        }

        if ($update_scholarship_application_dispersement) {
            $_SESSION['success'] = 'Money has been added';
            redirect('corporate/scholarship_status/' . $id);
        } elseif($scholarship_grant_cum_reject) {
            $_SESSION['success'] = 'Scholarship Rejected';
            redirect('corporate/scholarship_status/' .$id);
        } elseif($dispersement_data==NULL) {
            $_SESSION['success'] = 'Please fill the dispersement amount!';
            redirect('corporate/scholarship_status/' .$id);
        }else{
            $_SESSION['success'] = 'Something went wrong';
            redirect('corporate/scholarship_status/' .$id);
        }
    }
    // public function scholarship_grant_cum_reject($id)
    // {
    //     if(isset($_POST['grant'])){
    //         $status = 3;
    //     }else{
    //         $status = 4;
    //     }
      
  
    //     $scholarship_grant_cum_reject= $this->corporateModel->scholarship_grant_cum_reject($id, $status);
    //     if ($scholarship_grant_cum_reject) {
    //         if($status=3){
    //             $_SESSION['success'] = 'Scholarship successfully Granted!';
    //         }else{
    //             $_SESSION['success'] = 'Scholarship Rejected';

    //         }
    //         redirect('corporate/scholarship_status/' . $id);
    //     } else {
    //         $_SESSION['success'] = 'Something went wrong!';
    //         redirect('corporate/scholarship_status/' .$id);
    //     }
    // }



    // $flag = 0;
    // $this->db->query('SELECT * FROM scholarship_application WHERE id=:id');
    // $this->db->bind(':id', $id);
    // $scholarship_app = $this->db->single();
    // $doc_verify = $scholarship_app->doc_verify;
    // $scholarship_id = $scholarship_app->scholarship_id;
   
    // $get_required_doc = $this->get_ind_scholarship($scholarship_id);
    // $explode_required_doc = explode(',', $get_required_doc);
    // $doc_verify1 = explode(',', $doc_verify);
    // foreach($explode_required_doc as $doc){
    //     if (in_array($doc, $doc_verify1)){
    //         $flag = 1;
    // }else{
    //     $flag = 0;
    // }






    public function infographic()
    {
        $_SESSION['nav'] = "home";
        $this->view('corporate/infographic');
    }
    public function quiz_dash()
    {
        $_SESSION['nav'] = "home";
        $this->view('corporate/quiz_dash');
    }


    public function scholarship_dash()
    {
        $_SESSION['nav'] = "home";
        $this->view('corporate/scholarship_dash');
    }


    public function add_corporate()
    {
        $_SESSION['nav'] = "corporate";
        $this->view('corporate/add_corporate');
    }


    public function add_finance()
    {
        $_SESSION['nav'] = "finance";
        $this->view('corporate/add_finance');
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
        $this->view('corporate/add_question', $data);
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
        $_SESSION['nav'] = "question";
        $this->view('corporate/add_question_while_quiz', $data);
    }
    public function add_question_multi()
    {
        $get_all_class = $this->adminModel->get_all_class();
        $get_all_subject = $this->adminModel->get_all_subject();
        $data = [
            'get_all_class' => $get_all_class,
            'get_all_subject' => $get_all_subject,
        ];
        $_SESSION['nav'] = "question";
        $this->view('corporate/add_question_multi', $data);
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
        $this->view('corporate/add_question_beta', $data);
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
        $this->view('corporate/edit_question', $data);
    }


    public function add_college()
    {
        $get_college_course = $this->adminModel->get_college_course();
        $data = [
            'get_college_course' => $get_college_course,
        ];
        $_SESSION['nav'] = "college";
        $this->view('corporate/add_college', $data);
    }
    public function add_college_course()
    {
        $_SESSION['nav'] = "college_course";
        $this->view('corporate/add_college_course');
    }
    public function add_school_type()
    {

        $_SESSION['nav'] = "school_type_image";
        $this->view('corporate/add_school_type');
    }
    public function add_scholarship_type()
    {

        $_SESSION['nav'] = "school_tolarship_image";
        $this->view('corporate/add_scholarship_type');
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
            redirect('corporate/add_school_type');
        } else {
            $_SESSION['success'] = 'School Type Not Added';
            redirect('corporate/add_school_type');
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
            redirect('corporate/add_college_course');
        } else {
            $_SESSION['success'] = 'College Course Not Added';
            redirect('corporate/add_college_course');
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
            redirect('corporate/add_scholarship_type');
        } else {
            $_SESSION['success'] = 'Scholarship Type Not Added';
            redirect('corporate/add_scholarship_type');
        }
    }


    public function add_school()
    {
        $get_school_type = $this->adminModel->get_school_type();
        $data = [
            'get_school_type' => $get_school_type,
        ];
        $_SESSION['nav'] = "school";
        $this->view('corporate/add_school', $data);
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
        $this->view('corporate/update_school', $data);
    }

    public function add_class()
    {
        $get_all_school_class = $this->adminModel->get_all_school_class();
        $data = [
            'get_all_school_class' => $get_all_school_class,
        ];
        $_SESSION['nav'] = "school";
        $this->view('corporate/add_class', $data);
    }
    public function add_quiz_category()
    {
        $get_all_quiz_category = $this->adminModel->get_all_quiz_category();
        $data = [
            'get_all_quiz_category' => $get_all_quiz_category,
        ];
        $_SESSION['nav'] = "school";
        $this->view('corporate/add_quiz_category', $data);
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
        $this->view('corporate/edit_quiz_category', $data);
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
        $this->view('corporate/edit_class', $data);
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
        $this->view('corporate/edit_subject', $data);
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
        $this->view('corporate/add_subject', $data);
    }


    public function add_student()
    {
        $_SESSION['nav'] = "student";
        $this->view('corporate/add_student');
    }


    public function corporate()
    {
        $_SESSION['nav'] = "corporate";
        $this->view('corporate/corporate');
    }


    public function finance()
    {
        $_SESSION['nav'] = "finance";
        $this->view('corporate/finance');
    }


    public function finances()
    {
        $_SESSION['nav'] = "finance";
        $this->view('corporate/finances');
    }


    public function corporates()
    {
        $_SESSION['nav'] = "corporate";
        $this->view('corporate/corporates');
    }


    public function quiz()
    {
        $_SESSION['nav'] = "quiz";
        $this->view('corporate/quiz');
    }
    public function add_teacher()
    {
        $get_school_detail  = $this->adminModel->get_school_detail();
        $data = [
            'get_school_detail' => $get_school_detail,
        ];
        $_SESSION['nav'] = "quiz";
        $this->view('corporate/add_teacher', $data);
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
            redirect('corporate/add_teacher');
        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('corporate/add_teacher');
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
                    redirect('corporate/add_teacher');
                } else if ($this->pageModel->findUserByemail($email)) {
                    $_SESSION['success'] = 'Email already taken';
                    redirect('corporate/add_teacher');
                } else {


                    if ($this->pageModel->findUserByphno($phone)) {
                        $_SESSION['success'] = 'Phone number already taken';
                        redirect('corporate/add_teacher');
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
                            redirect('corporate/add_teacher');
                        }
                    }
                }
            } else {
                redirect('corporate/add_teacher');
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
        $this->view('corporate/scholarship', $data);
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
        $this->view('corporate/add_scholarship', $data);
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
        $this->view('corporate/create_quiz_first', $data);
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
        $this->view('corporate/create_quiz_second', $data);
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
        $this->view('corporate/edit_quiz', $data);
    }


    public function add_criteria()
    {

        $_SESSION['nav'] = "criteria";
        $this->view('corporate/add_criteria');
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
            redirect('corporate/add_scholarship');
        } else {
            $_SESSION['success'] = "Scholarship detail not Updated";
            redirect('corporate/add_scholarship');
        }
    }
    public function create_subject()
    {
        $subject_name = $_POST['subject_name'];
        $result = $this->adminModel->add_subject($subject_name);
        if ($result) {

            $_SESSION['success'] = "Subject added Successfully";
            redirect('corporate/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('corporate/add_subject');
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
            redirect('corporate/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('corporate/add_subject');
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
            redirect('corporate/add_subject');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('corporate/add_subject');
        }
    }

    public function create_class()
    {
        $class_name = $_POST['class_name'];
        $result = $this->adminModel->add_class($class_name);
        if ($result) {

            $_SESSION['success'] = "Class added Successfully";
            redirect('corporate/add_class');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('corporate/add_class');
        }
    }
    public function create_quiz_category()
    {
        $category = $_POST['category'];
        $result = $this->adminModel->add_quiz_category($category);
        if ($result) {

            $_SESSION['success'] = "Category added Successfully";
            redirect('corporate/add_quiz_category');
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('corporate/add_quiz_category');
        }
    }
    public function update_quiz_category($id)
    {

        $category = $_POST['category'];
        $result = $this->adminModel->update_quiz_category($category, $id);
        if ($result) {

            $_SESSION['success'] = "Category updated Successfully";
            redirect('corporate/edit_quiz_category/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('corporate/edit_quiz_category/' . $id);
        }
    }
    public function update_school_class($id)
    {

        $class_name = $_POST['class_name'];
        $result = $this->adminModel->update_school_class($class_name, $id);
        if ($result) {

            $_SESSION['success'] = "Class updated Successfully";
            redirect('corporate/edit_class/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('corporate/edit_class/' . $id);
        }
    }
    public function update_school_subject($id)
    {

        $subject_name = $_POST['subject_name'];
        $result = $this->adminModel->update_school_subject($subject_name, $id);
        if ($result) {

            $_SESSION['success'] = "subject updated Successfully";
            redirect('corporate/edit_subject/' . $id);
        } else {
            $_SESSION['success'] = "Error occurred";
            redirect('corporate/edit_subject/' . $id);
        }
    }
    public function review_quiz()
    {
        $last_quiz = $this->adminModel->last_added_quiz();
        $data = [
            'last_added_quiz' => $last_quiz,
        ];
        $this->view('corporate/review_quiz', $data);
    }
    public function view_quiz($id)
    {
        $get_quiz_detail = $this->adminModel->get_single_quizes($id);
        $data = [
            'get_quiz_detail' => $get_quiz_detail,
        ];
        $this->view('corporate/view_quiz', $data);
    }
    public function test1()
    {
        $this->view('corporate/test1');
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
            redirect('corporate/create_quiz_second/' . $current_quiz_id, $data);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('corporate/create_quiz');
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
            redirect('corporate/create_quiz_third/' . $quiz_id);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('corporate/create_quiz');
        }
    }

    public function create_quiz_third()
    {

        $this->view('corporate/create_quiz_third');
    }
    public function create_quiz_fourth()
    {

        $this->view('corporate/create_quiz_fourth');
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
            redirect('corporate/create_quiz_fourth/' . $quiz_id);
        }
    }
    public function add_question_to_quiz($question_id, $quiz_id)
    {
        $add_question_to_quiz = $this->adminModel->add_question_to_quiz($question_id, $quiz_id);
        if ($add_question_to_quiz) {
            redirect('corporate/create_quiz_fourth/' . $quiz_id);
        }
    }
    public function delete_question_from_quiz($question_id, $quiz_id)
    {
        $delete_question_from_quiz = $this->adminModel->delete_question_from_quiz($question_id, $quiz_id);
        if ($delete_question_from_quiz) {
            redirect('corporate/create_quiz_fourth/' . $quiz_id);
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

            redirect('corporate/new_quiz/' . $id);
        } else {
            $_SESSION['success'] = "Error occured";
            redirect('corporate/create_quiz');
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
            redirect('corporate/add_question');
            // } else {
            //     $_SESSION['success'] = "Question not Updated";
            //     redirect('corporate/add_question');
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
            redirect('corporate/add_question_multi');
        } else {
            $_SESSION['success'] = "Question not  Updated";
            redirect('corporate/add_question');
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
            redirect('corporate/create_quiz_fourth/' . $id);
            // } else {
            //     $_SESSION['success'] = "Question not Updated";
            //     redirect('corporate/add_question');
            // }

        } else {
            $_SESSION['success'] = "Error Occured";
            redirect('corporate/create_quiz_fourth/' . $id);
        }
    }


    public function approve_quiz($id)
    {
        $approve_quiz = $this->adminModel->approve_quiz($id);
        if ($approve_quiz) {
            $_SESSION['success'] = "Quiz approved";
            redirect('corporate/create_quiz');
        } else {
            $_SESSION['success'] = "Quiz not approved";
            redirect('corporate/create_quiz');
        }
    }
    public function reject_quiz($id)
    {

        $remove_quiz = $this->adminModel->delete_quiz($id);
        $_SESSION['success'] = "Quiz deleted";
        redirect('corporate/quizes');
    }
    public function reject_college($id)
    {
        $remove_college = $this->adminModel->delete_college($id);

        $_SESSION['success'] = "College Removed";
        redirect('corporate/colleges');
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
            redirect('corporate/quiz_master');
        } else {
            $_SESSION['success'] = "Quiz not updated";
            redirect('corporate/edit_question/' . $id);
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
            redirect('corporate/add_criteria');
        } else {
            $_SESSION['success'] = "Criteria detail not  Updated";
            redirect('corporate/add_criteria');
        }
    }
    public function delete_from_quiz_master($id)
    {
        $this->adminModel->delete_from_quiz_master($id);
        $_SESSION['success'] = "Quiz deleted successfully";

        redirect('corporate/quiz_master');
    }

    public function students_search()
    {
        $get_student_detail = $this->studentModel->search_student_by_name_phone($_GET['search_input']);
        $data =
            [
                'get_student_detail' => $get_student_detail,
            ];

        $_SESSION['nav'] = "student";
        $this->view('corporate/students_search', $data);
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
        $this->view('corporate/scholarships', $data);
    }
    public function quizes()
    {
        if (isset($_SESSION['rexkod_oodles_teacher_id'])) {
            $get_all_quiz = $this->teacherModel->get_all_quizes();
            $data = [
                'get_all_quiz' => $get_all_quiz,
            ];
        }
        // $_SESSION['nav'] = "scholarship";
        $this->view('corporate/quizes', $data);
    }

    public function quiz_result()
    {
        $get_quiz_score = $this->adminModel->get_all_quiz_score();
        // $get_student_detail = $this->studentModel->get_student_detail($_SESSION['rexkod_oodles_student_id']);
        $data = [
            'get_quiz_score' => $get_quiz_score,
            // 'get_student_detail' => $get_student_detail,
        ];
        $this->view('corporate/quiz_result', $data);
    }

    // college
    public function college($id)
    {
        $_SESSION['nav'] = "college";
        $college_detail = $this->adminModel->get_college_detail_single($id);
        $data = [
            'get_college_detail' => $college_detail,
        ];
        $this->view('corporate/college', $data);
    }


    public function colleges()
    {
        $school_detail = $this->adminModel->get_college_detail();
        $data = [
            'get_college_detail' => $school_detail,
        ];
        $_SESSION['nav'] = "college";
        $this->view('corporate/colleges', $data);
    }

    public function school($id)
    {
        $school_detail = $this->adminModel->get_school_detail_single($id);
        $data = [
            'get_school_detail' => $school_detail,
        ];
        $this->view('corporate/school', $data);
    }


    public function schools()
    {
        $school_detail = $this->adminModel->get_school_detail();
        $data = [
            'get_school_detail' => $school_detail,
        ];
        $_SESSION['nav'] = "school";
        $this->view('corporate/schools', $data);
    }




    public function quiz_master()
    {
        $_SESSION['nav'] = "quiz";
        $get_all_quiz = $this->teacherModel->get_all_quiz_master();
        $data = [
            'get_all_quiz' => $get_all_quiz,
        ];
        $this->view('corporate/quiz_master', $data);
    }
    // public function quizes()
    // {
    //     $_SESSION['nav'] = "quiz";
    //     $get_all_quiz = $this->adminModel->get_all_quizes();
    //     $data = [
    //         'get_all_quiz' => $get_all_quiz,
    //     ];
    //     $this->view('corporate/quizes', $data);
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

        $this->view('corporate/students', $data);
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

        $this->view('corporate/parents', $data);
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

        $this->view('corporate/representatives', $data);
    }
    public function add_webinar()
    {
        $this->view('corporate/add_webinar');
    }
    public function webinars()
    {
        $get_all_webinars = $this->adminModel->get_all_webinars();
        $data = [
            'get_all_webinars' => $get_all_webinars,
        ];

        $this->view('corporate/webinars', $data);
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

        $this->view('corporate/csr_enquiry', $data);
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

        $this->view('corporate/home_enquiry', $data);
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

        $this->view('corporate/all_criteria', $data);
    }

    public function scholarship_application($id)
    {
      
            $get_selected_scholarship_application = $this->adminModel->get_selected_scholarship_application($id);
            $get_ind_scholarship = $this->adminModel->get_ind_scholarship($id);
            $get_all_default_scholarship_status = $this->adminModel->get_all_default_scholarship_status();

            $data = [
                'get_selected_scholarship_application' => $get_selected_scholarship_application,
                'get_ind_scholarship' => $get_ind_scholarship,
                'scholarship_id' => $id,
                'get_all_default_scholarship_status' => $get_all_default_scholarship_status,
            ];
       

        $this->view('corporate/scholarship_application', $data);
    }
    public function update_scholarship_status($id)
    {
        $auth_id = $_SESSION['rexkod_oodles_corporate_id'];
        $status = $_POST['scholarship_status'];
        $statusupdate = $this->adminModel->update_scholarship_status($id, $status . $auth_id);


        if ($statusupdate) {
            $_SESSION['success'] = "Status Updated";
            redirect('corporate/scholarship_application');
        } else {

            $_SESSION['success'] = "Status Not Updated";
            redirect('corporate/scholarship_application');
        }
    }


    public function student($id)
    {

        $student_detail = $this->adminModel->get_single_student($id);
        $data = [
            'get_student_detail' => $student_detail,
        ];
        $_SESSION['nav'] = "student";
        $this->view('corporate/student', $data);
    }


    public function cart()
    {
        $this->view('corporate/cart');
    }

    public function product()
    {
        $this->view('corporate/product');
    }


    public function add_owner()
    {
        $this->view('corporate/add_owner');
    }

    public function add_coassembler()
    {
        $this->view('corporate/add_coassembler');
    }

    public function add_dealer()
    {
        $this->view('corporate/add_dealer');
    }

    public function add_distributor()
    {
        $this->view('corporate/add_distributor');
    }

    public function owners()
    {
        $this->view('corporate/owners');
    }

    public function drivers()
    {
        $drivers = $this->pageModel->get_all_drivers();
        $data = [
            'all_drivers' => $drivers,
        ];
        $this->view('corporate/drivers', $data);
    }

    public function to_orders()
    {
        $orders = $this->pageModel->get_to_orders();
        $data = [
            'all_orders' => $orders,
        ];
        $this->view('corporate/to_orders', $data);
    }


    public function from_orders()
    {
        $orders = $this->pageModel->get_from_orders();
        $data = [
            'all_orders' => $orders,
        ];
        $this->view('corporate/from_orders', $data);
    }



    public function reports()
    {
        $this->view('corporate/reports');
    }



    public function transactions()
    {
        $this->view('corporate/transactions');
    }

    public function users()
    {
        $this->view('corporate/users');
    }



    public function view_product($id)
    {

        $products = $this->pageModel->get_single_products($id);

        $data = [
            'get_pro' => $products,
        ];
        $this->view('corporate/view_product', $data);
    }

    public function login()
    {
        if (isset($_SESSION['rexkod_oodles_corporate_id'])) {
            redirect('corporate/index');
        } else {
            if (!isset($_POST['username'])) {

                $this->view('corporate/login');
            } else {

                if (!isset($_POST['password'])) {
                    $_SESSION['success'] = "Enter Password";
                    $this->view('corporate/login');
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
                        $this->view('corporate/login');
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
                            $this->view('corporate/login');
                        } else {
                            if ($user->type == "corporate") {
                                $_SESSION['rexkod_oodles_corporate_id'] = $user->id;
                                $_SESSION['rexkod_oodles_corporate_name'] = $user->name;
                                $_SESSION['rexkod_oodles_corporate_email'] = $user->email;
                                $_SESSION['rexkod_oodles_corporate_phone'] = $user->phone;
                                $_SESSION['rexkod_oodles_login_type'] = $user->type;

                                redirect('corporate/index');
                            } else {

                                $_SESSION['success'] = "You do not have access!";
                                redirect('corporate/login');
                            }
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
            redirect('corporate/order/' . $id);
        }
    }





    public function add_product()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];


        $this->view('corporate/add_product', $data);
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
            redirect('corporate/index');
        } else {
            $_SESSION['success'] = "try later..!";
            redirect('corporate/index');
        }
    }









    public function all_products()
    {

        $products = $this->pageModel->get_all_products();
        $data = [
            'all_pro' => $products,
        ];

        $this->view('corporate/all_products', $data);
    }

    public function all_cat_subcat()
    {

        $get_all_category = $this->adminModel->get_all_category();
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_category' => $get_all_category,
            'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('corporate/all_cat_subcat', $data);
    }





    public function del_product($id)
    {
        $this->pageModel->delete_product($id);
        $_SESSION['success'] = "product deleted successfully";
        redirect('corporate/all_products');
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
            redirect('corporate/customers_cod');
        } else {

            $_SESSION['success'] = "COD Not Updated";
            redirect('corporate/customers_cod');
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
            redirect('corporate/vendors_cod');
        } else {

            $_SESSION['success'] = "COD Not Updated";
            redirect('corporate/vendors_cod');
        }
    }







    public function change_pass()
    {
        $this->view('corporate/change_pass');
    }





    public function add_coupon_vendor()
    {
        $get_all_vendors = $this->pageModel->get_all_vendors();


        $data = [
            'all_vendors' => $get_all_vendors
        ];

        $this->view('corporate/add_coupon_vendor', $data);
    }




    public function add_coupon_subcat()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('corporate/add_coupon_subcat', $data);
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
                            redirect('corporate/change_pass');
                        } else {
                            $_SESSION['success'] = "Confirm Password not matching with New Password";
                            redirect('corporate/change_pass');
                        }
                    } else {
                        $_SESSION['success'] = "Enter Confirm Password";
                        redirect('corporate/change_pass');
                    }
                } else {
                    $_SESSION['success'] = "Enter New Password";
                    redirect('corporate/change_pass');
                }
            } else {
                $_SESSION['success'] = "current password not matching";
                redirect('corporate/change_pass');
            }
        } else {
            $_SESSION['success'] = "Enter current Password";
            redirect('corporate/change_pass');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('corporate/login');
    }

    function scholarship_promotion()
    {
        $get_all_promotion = $this->corporateModel->get_my_scholarship_application($_SESSION['rexkod_oodles_corporate_id']);
        
        $data = [
           
            'get_all_promotion' => $get_all_promotion,
        ];
        $this->view('corporate/scholarship_promotion', $data);
    }

    

}
