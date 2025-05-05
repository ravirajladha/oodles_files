<?php
class Teachers
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function get_teacher_detail()
    {
        $this->db->query('SELECT * FROM teacher where teacher_id = :teacher_id');
        $this->db->bind(':teacher_id', $_SESSION['rexkod_oodles_teacher_id']);
        $result = $this->db->single();
        return $result;
    }
    public function get_all_orders()
    {
        $this->db->query('SELECT * FROM orders ORDER BY id desc');
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_all_quiz_by_filter($data)
    {
        $this->db->query('SELECT * FROM quiz_master where subject=:subject AND class=:class AND topic=:topic AND chapter=:chapter AND created_by = :created_by');
        $this->db->bind(':chapter', $data['chapter']);
        $this->db->bind(':topic', $data['topic']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_teacher_id']);
        return $results = $this->db->resultset();
    }

    public function add_question($data)
    {
        $this->db->query('INSERT INTO quiz_master (chapter,topic,question,option1,option2,option3,option4,answer,question_img,option1_img,option2_img,option3_img,option4_img,explanation,explanation_img,subject,class,score,created_by,status) VALUES(:chapter,:topic,:question,:option1,:option2,:option3,:option4,:answer,:question_img,:option1_img_file,:option2_img_file,:option3_img_file,:option4_img_file,:explanation,:explanation_img,:subject,:class,:score,:created_by,:status)');
        // Bind values
        $this->db->bind(':chapter', $data['chapter']);
        $this->db->bind(':topic', $data['topic']);
        $this->db->bind(':question', $data['question']);
        $this->db->bind(':option1', $data['option1']);
        $this->db->bind(':option2', $data['option2']);
        $this->db->bind(':option3', $data['option3']);
        $this->db->bind(':option4', $data['option4']);
        $this->db->bind(':explanation', $data['explanation']);
        $this->db->bind(':answer', $data['answer']);
        $this->db->bind(':question_img', $data['question_img_file']);
        $this->db->bind(':option1_img_file', $data['option1_img_file']);
        $this->db->bind(':option2_img_file', $data['option2_img_file']);
        $this->db->bind(':option3_img_file', $data['option3_img_file']);
        $this->db->bind(':option4_img_file', $data['option4_img_file']);
        $this->db->bind(':explanation_img', $data['explanation_img']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':score', $data['score']);
        $this->db->bind(':created_by', $data['created_by']);
        $this->db->bind(':status', 0);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_userinfo()
    {
        $this->db->query("SELECT * FROM auth where auth_id = :id");
        $this->db->bind(':id', $_SESSION['user_id']);
        return $results = $this->db->single();
    }
    public function get_current_user_auth()
    {
        $this->db->query("SELECT * FROM auth where id= :id");
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);
        return $results = $this->db->single();
    }
    public function getWallet($id)
    {
        $this->db->query('SELECT * FROM wallets WHERE user_id = :userid');
        $this->db->bind(':userid', $id);
        return $this->db->single();
    }

    public function debit_quiz_balance($id, $quiz_balance)
    {
        $wallet = $this->getWallet($id);

        $current_quiz_balance = $wallet->quiz_balance;
        $new_quiz_balance = intval($current_quiz_balance) - $quiz_balance;

        $this->db->query('UPDATE wallets SET quiz_balance=:quiz_balance WHERE user_id = :id');
        // Bind values

        $this->db->bind(':quiz_balance', $new_quiz_balance);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_all_category()
    {
        $this->db->query('SELECT * FROM category WHERE category_vendor_id = :vid order by category_id DESC');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        return $this->db->resultSet();
    }





    public function create_item_db($name, $subcat, $desc, $price, $discount_price, $price_dine, $discount_price_dine)
    {
        $unqdate = date("Ymd");
        $unqtime = time();
        $unqname = $_SESSION['rexkod_vendor_id'] . "" . $unqdate . "" . $unqtime;

        if (!empty($_FILES['item_image']['name'])) {
            $f_name = $_FILES['item_image']['name'];
            $f_temp = $_FILES['item_image']['tmp_name'];
            $size = $_FILES['item_image']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = '1' . $unqname . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $temp1 = $f_newfile;
        } else {
            $temp1 = NULL;
        }

        $this->db->query("SELECT * FROM subcategory where subcategory_id = :id ");

        $this->db->bind(':id', $subcat);

        $cat_val = $this->db->single();

        $cat_id = $cat_val->category_id;



        $this->db->query('INSERT INTO items(item_name, item_vendor_id, item_cat_id, item_subcat_id, item_img, item_desc, item_price, item_discount_price, item_price_dine, item_discount_price_dine) VALUES (:name, :vid, :catid, :subcatid, :image, :desc, :price, :disprice, :pricedine, :dispricedine)');

        //bind our parameters
        $this->db->bind(':name', $name);
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        $this->db->bind(':catid', $cat_id);
        $this->db->bind(':subcatid', $subcat);
        $this->db->bind(':image', $temp1);
        $this->db->bind(':desc', $desc);

        $this->db->bind(':price', $price);
        $this->db->bind(':disprice', $discount_price);
        $this->db->bind(':pricedine', $price_dine);
        $this->db->bind(':dispricedine', $discount_price_dine);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_all_quiz_score()
    {
        $this->db->query('SELECT * FROM quiz_result ORDER BY id desc');
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_individual_representative($id)
    {
        $this->db->query('SELECT * FROM student WHERE student_id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }
    public function get_individual_parent($id)
    {
        $this->db->query('SELECT * FROM student WHERE student_id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }
    public function get_individual_student($id)
    {
        $this->db->query('SELECT * FROM student WHERE student_id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }
    public function get_single_student($id)
    {
        $this->db->query('SELECT * FROM student WHERE student_id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_all_students_schoolwise($school_id)
    {
        $this->db->query("SELECT * FROM student WHERE academic_type=:academic_type AND academic_name=:school_id");
        $this->db->bind(':academic_type', '1');
        $this->db->bind(':school_id', '1'.$school_id);
        return $result = $this->db->resultSet();
    }

    // public function get_all_single_school_student($id)
    // {
    //     $this->db->query('SELECT * FROM quiz_result WHERE user_id in (SELECT student_id from student where academic_name=:academic_name)');
    //     $this->db->bind(':academic_name', $id);
    //     $result = $this->db->resultSet();
    //     return $result;
    // }
    
    public function get_single_student_subjectwise_result($student_id,$subject_name)
    {
        $this->db->query('SELECT * FROM quiz_result WHERE user_id =:user_id AND quiz_id in (SELECT id from quizes where subject_name=:subject_name)');
        $this->db->bind(':user_id', $student_id);
        $this->db->bind(':subject_name', $subject_name);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_quiz_result_student_wise_and_quiz_wise($student_id,$quiz_id)
    {
        // echo $student_id;
        // echo $quiz_id;
        // die();
        $this->db->query('SELECT * FROM quiz_result WHERE user_id =:user_id AND quiz_id=:quiz_id');
        $this->db->bind(':user_id', $student_id);
        $this->db->bind(':quiz_id', $quiz_id);
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_single_student1($id)
    {
        $this->db->query('SELECT * FROM auth WHERE id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }


    public function get_all_students()
    {
        $this->db->query("SELECT * FROM auth WHERE type = :type");
        $this->db->bind(':type', 'student');
        return $result = $this->db->resultSet();
    }
    public function get_all_parents()
    {
        $this->db->query("SELECT * FROM auth WHERE type = :type");
        $this->db->bind(':type', 'parent');
        return $result = $this->db->resultSet();
    }
    public function get_all_representatives()
    {
        $this->db->query("SELECT * FROM auth WHERE type = :type");
        $this->db->bind(':type', 'representative');
        return $result = $this->db->resultSet();
    }
    public function verify_student()
    {
        $this->db->query("SELECT * FROM auth WHERE id=:id");
        // $this->db->bind(':type', 'student');
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);
        return $result = $this->db->single();
    }

    public function get_all_payouts()
    {
        $this->db->query("SELECT * FROM payouts");
        return $result = $this->db->resultSet();
    }


    public function find_all_order()
    {
        $this->db->query("SELECT * FROM orders where user_id = :id order by id DESC");
        $this->db->bind(':id', $_SESSION['user_id']);
        return $results = $this->db->resultSet();
    }

    public function get_order_details($id)
    {
        $this->db->query("SELECT * FROM orders where id = :id ");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_pharmacy_med_list($id)
    {
        $this->db->query("SELECT * FROM product_order_list where p_id = :booking_id");

        $this->db->bind(':booking_id', $id);


        return $results = $this->db->resultSet();
    }
    public function get_pharmacy_med_list_single($id)
    {
        $this->db->query("SELECT * FROM product_order_list where p_id = :booking_id");

        $this->db->bind(':booking_id', $id);


        return $results = $this->db->single();
    }
    public function change_status($id, $st)
    {
        $assign_time = date("d-M-Y h:i A");

        $this->db->query('UPDATE orders set status = :status, last_updatedAt = :updated_at, last_updatedBy = :user_id WHERE id = :id');
        // Bind values
        $this->db->bind(':status', $st);
        $this->db->bind(':id', $id);
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':updated_at', $assign_time);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_auth_deliveryUser($data)
    {
        $this->db->query('INSERT INTO auth (name, email,phone,password,type, address, pin_code) VALUES(:name, :email, :phno, :pass, :type, :address, :pin_code)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phno', $data['ph_no']);
        $this->db->bind(':pass', $data['password']);
        $this->db->bind(':type', 'delivery');
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':pin_code', $data['pin_code']);
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_deliveryUsers()
    {
        $this->db->query("SELECT * FROM auth where type = :type");

        $this->db->bind(':type', 'delivery');

        return $results = $this->db->resultSet();
    }

    public function get_all_by_ID($id)
    {
        $this->db->query("SELECT * FROM auth where auth_id = :id");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }

    public function update_auth_deliveryUser($data)
    {
        $this->db->query('UPDATE auth set name = :name, email = :email, phone = :ph_no, address = :address, pin_code = :pin_code WHERE auth_id = :auth_id');
        // Bind values
        $this->db->bind(':auth_id', $data['auth_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':ph_no', $data['ph_no']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':pin_code', $data['pin_code']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_auth_deliveryUser1($data)
    {
        $this->db->query('UPDATE auth set name = :name, email = :email, phone = :ph_no, password = :password, address = :address, pin_code = :pin_code WHERE auth_id = :auth_id');
        // Bind values
        $this->db->bind(':auth_id', $data['auth_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':ph_no', $data['ph_no']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':pin_code', $data['pin_code']);
        $this->db->bind(':password', $data['password']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_deliveryUserby_id($id)
    {
        $this->db->query("DELETE FROM auth WHERE auth_id = :auth_id");

        $this->db->bind(':auth_id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_quiz($id)
    {
        $this->db->query("DELETE FROM quizes WHERE id = :id");

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_from_quiz_master($id)
    {
        $this->db->query("DELETE FROM quiz_master WHERE id = :id");

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_college($id)
    {
        $this->db->query("DELETE FROM college WHERE id = :id");

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function change_deliverystatus($id, $delivery_userId, $delivery_userName)
    {
        $assign_time = date("d-M-Y h:i A");

        $this->db->query('UPDATE orders set status = :status, delivery_user = :delivery_userName, delivery_userId = :delivery_userId, last_updatedAt = :updated_at, last_updatedBy = :user_id  WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':status', 3);
        $this->db->bind(':delivery_userId', $delivery_userId);
        $this->db->bind(':delivery_userName', $delivery_userName);
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':updated_at', $assign_time);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function find_all_orderByDelivery()
    {
        $this->db->query("SELECT * FROM orders where delivery_userId = :user_id order by id DESC");
        $this->db->bind(':user_id', $_SESSION['user_id']);

        return $results = $this->db->resultSet();
    }

    public function create_category($category_name, $category_img, $category_start_time, $category_end_time)
    {
        $unqdate = date("Ymd");
        $unqtime = time();
        $unqname = $_SESSION['rexkod_vendor_id'] . "" . $unqdate . "" . $unqtime;



        $this->db->query('INSERT INTO category(category_name, category_vendor_id, category_img, category_start_time, category_end_time) VALUES (:category_name, :vid, :category_img, :starttime, :endtime)');
        //bind our parameters
        $this->db->bind(':category_name', $category_name);
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        $this->db->bind(':category_img', $category_img);
        $this->db->bind(':starttime', $category_start_time);
        $this->db->bind(':endtime', $category_end_time);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function create_coupon($coupon_title, $coupon_vendor, $coupon_subcat, $coupon_code, $coupon_type, $coupon_value, $coupon_cap)
    {
        $this->db->query('INSERT INTO coupons(coupon_title, coupon_code, coupon_type, coupon_value, coupon_cap, coupon_status,coupon_vendor_id,coupon_subcategory_id) VALUES (:coupon_title, :coupon_code, :coupon_type, :coupon_value, :coupon_cap, :coupon_status, :coupon_vendor, :coupon_subcat)');
        //bind our parameters
        $this->db->bind(':coupon_title', $coupon_title);
        $this->db->bind(':coupon_code', $coupon_code);
        $this->db->bind(':coupon_type', $coupon_type);
        $this->db->bind(':coupon_value', $coupon_value);
        $this->db->bind(':coupon_cap', $coupon_cap);
        $this->db->bind(':coupon_status', 1);
        $this->db->bind(':coupon_vendor', $coupon_vendor);
        $this->db->bind(':coupon_subcat', $coupon_subcat);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }





    public function create_subcategory($subcategory_name, $subcategory_img, $category_id, $subcategory_tax)
    {
        $this->db->query('INSERT INTO subcategory(subcategory_name, subcategory_vendor_id, category_id, subcategory_img, subcategory_tax) VALUES (:subcategory_name, :vid, :category_id, :subcategory_img, :subcategory_tax)');
        //bind our parameters
        $this->db->bind(':subcategory_name', $subcategory_name);
        $this->db->bind(':category_id', $category_id);
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        $this->db->bind(':subcategory_img', $subcategory_img);
        $this->db->bind(':subcategory_tax', $subcategory_tax);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getSubcategoryById($id)
    {
        $this->db->query("SELECT * FROM subcategory where subcategory_id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }




    public function add_student($name, $email, $phone, $pass, $agree)
    {
        $this->db->query('INSERT INTO auth (type, name, email, phone, password, status, created_at) VALUES(:type, :name, :email, :phone, :pass, :status, :created_at)');
        // Bind values
        if ($agree == 1) {
            $this->db->bind(':type', 'parent');
        } elseif ($agree == 0) {
            $this->db->bind(':type', 'student');
        } elseif ($agree == 2) {
            $this->db->bind(':type', 'representative');
        }
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':status', '0');
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        if ($this->db->execute()) {
            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phone);
            $cur_user = $this->db->single();

            $this->db->query('INSERT INTO wallets (user_id,balance_amount) VALUES(:userid,:balance)');
            $this->db->bind(':userid', $cur_user->id);
            $this->db->bind(':balance', 0);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function add_scholarship($type, $name, $state, $description, $scholarship_file, $url, $start_date, $end_date, $criteria, $eligible_candidates, $body, $offered_by, $no_of_scholarships, $contact_number, $email_id, $minimum_eligibility, $application_process, $reservation, $documents_required, $detailed_eligibility_url, $direct_link_to_apply, $website_check)
    {
        $this->db->query('INSERT INTO scholarship( type, name, state,description, scholarship_file, url,start_date,end_date,criteria,eligible_candidates,body,offered_by,no_of_scholarships,contact_number,email_id,minimum_eligibility,application_process,reservation,documents_required,detailed_eligibility_url,direct_link_to_apply,website_check) VALUES( :type, :name, :state,:description, :scholarship_file, :url,:start_date,:end_date,:criteria,:eligible_candidates,:body,:offered_by,:no_of_scholarships,:contact_number,:email_id,:minimum_eligibility,:application_process,:reservation,:documents_required,:detailed_eligibility_url,:direct_link_to_apply,:website_check)');
        // Bind values
        // $this->db->bind(':company_name', $company_name);
        // $this->db->bind(':course', $course);
        $this->db->bind(':type', $type);
        $this->db->bind(':name', $name);
        $this->db->bind(':state', $state);
        $this->db->bind(':description', $description);
        $this->db->bind(':scholarship_file', $scholarship_file);
        $this->db->bind(':url', $url);
        // $this->db->bind(':conditions',$conditions);
        $this->db->bind(':start_date', $start_date);
        $this->db->bind(':end_date', $end_date);
        $this->db->bind(':criteria', $criteria);
        $this->db->bind(':eligible_candidates', $eligible_candidates);
        $this->db->bind(':body', $body);
        $this->db->bind(':offered_by', $offered_by);
        $this->db->bind(':no_of_scholarships', $no_of_scholarships);
        $this->db->bind(':contact_number', $contact_number);
        $this->db->bind(':email_id', $email_id);
        $this->db->bind(':minimum_eligibility', $minimum_eligibility);
        $this->db->bind(':application_process', $application_process);
        $this->db->bind(':reservation', $reservation);
        $this->db->bind(':documents_required', $documents_required);
        $this->db->bind(':detailed_eligibility_url', $detailed_eligibility_url);
        $this->db->bind(':direct_link_to_apply', $direct_link_to_apply);
        $this->db->bind(':website_check', $website_check);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_school_wallet($id)
    {
        $this->db->query("SELECT * FROM school_wallet where school_id=:id ");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function add_quiz_first($data)
    {
        // echo $data['school_id'];
        // die();
        $get_school_wallet  = $this->get_school_wallet($data['school_id']);
                $get_quiz_balance = $get_school_wallet->quiz_balance;
                $new_quiz_balance = $get_quiz_balance - 1;
                $get_quiz_created_balance = $get_school_wallet->quiz_created;
                $new_quiz_created_balance = $get_quiz_created_balance  + 1;
                $this->db->query('UPDATE school_wallet set quiz_balance=:quiz_balance,quiz_created=:quiz_created where school_id=:school');
                $this->db->bind(':school', $data['school_id']);
                $this->db->bind(':quiz_balance', $new_quiz_balance);
                $this->db->bind(':quiz_created', $new_quiz_created_balance);
                if ($this->db->execute()) {

        $this->db->query('INSERT INTO quizes (name,class_name,subject_name,category,created_by,status) VALUES (:name,:class_name,:subject_name,:category,:created_by,:status)');
        $this->db->bind(':name', $data['quiz_name']);
        $this->db->bind(':class_name', $data['class']);
        $this->db->bind(':subject_name', $data['subject']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':created_by', $data['created_by']);
        $this->db->bind(':status', '0');
        if ($this->db->execute()) {
            //    $last_id =$this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }else {
        return false;
    }
    }
    public function add_quiz_second($data, $quiz_id)
    {
        $this->db->query('UPDATE quizes SET start_date=:start_date,end_date=:end_date,duration_min=:duration_min,duration_sec=:duration_sec,paid=:paid,school_name=:school,image=:image,attempt=:attempt,quiz_audio=:quiz_audio,passing_per=:passing_per,coins_per_point1=:coins_per_point1,coins_per_point2=:coins_per_point2,coins_per_sec1 = :coins_per_sec1 where id=:quiz_id');
        // Bind values
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':duration_min', $data['quiz_duration_min']);
        $this->db->bind(':duration_sec', $data['quiz_duration_sec']);
        $this->db->bind(':paid', $data['paid']);
        $this->db->bind(':school', $data['school']);
        $this->db->bind(':image', $data['quiz_file']);
        $this->db->bind(':attempt', $data['attempt']);
        $this->db->bind(':quiz_audio', $data['quiz_audio']);

        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':passing_per', $data['passing_per']);
        $this->db->bind(':coins_per_point1', $data['coins_per_point1']);
        $this->db->bind(':coins_per_point2', $data['coins_per_point2']);
        $this->db->bind(':coins_per_sec1', $data['coins_per_sec1']);

        if ($this->db->execute()) {
            //    $last_id =$this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function update_quiz($id, $quiz_name, $start_date, $end_date, $quiz_duration_min, $quiz_duration_sec, $paid, $school, $quiz_master_file, $class_name, $subject_name, $category, $topic, $chapter, $attempt, $quiz_audio, $quiz_resource, $quiz_map)
    {
        $this->db->query('UPDATE quizes set name=:quiz_name,start_date=:start_date,end_date=:end_date,duration_min=:quiz_duration_min,duration_sec=:quiz_duration_sec,paid=:paid,school_name=:school,image=:image,class_name=:class_name,subject_name=:subject_name,status=:status,category=:category,topic=:topic,chapter=:chapter,attempt=:attempt,quiz_audio = :quiz_audio,quiz_resource = :quiz_resource,quiz_map = :quiz_map WHERE id=:id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':quiz_name', $quiz_name);
        $this->db->bind(':start_date', $start_date);
        $this->db->bind(':end_date', $end_date);
        $this->db->bind(':quiz_duration_min', $quiz_duration_min);
        $this->db->bind(':quiz_duration_sec', $quiz_duration_sec);
        $this->db->bind(':paid', $paid);
        $this->db->bind(':school', $school);
        // $this->db->bind(':question', $question);
        $this->db->bind(':image', $quiz_master_file);
        $this->db->bind(':class_name', $class_name);
        $this->db->bind(':subject_name', $subject_name);
        $this->db->bind(':category', $category);
        $this->db->bind(':topic', $topic);
        $this->db->bind(':chapter', $chapter);
        $this->db->bind(':attempt', $attempt);
        $this->db->bind(':quiz_audio', $quiz_audio);
        $this->db->bind(':quiz_resource', $quiz_resource);
        $this->db->bind(':quiz_map', $quiz_map);
        $this->db->bind(':status', '1');

        if ($this->db->execute()) {
            //    $last_id =$this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function get_quiz_for_category_and_subject($category_id, $subject, $created_by)
    {
        // echo $category_id;
        // die();
        $this->db->query('SELECT * FROM quizes where category=:category AND subject_name=:subject_name AND created_by =:created_by and start_date is not null');
        $this->db->bind(':category', $category_id);
        $this->db->bind(':subject_name', $subject);
        $this->db->bind(':created_by', $created_by);
        return $results = $this->db->resultset();
    }
    public function get_completed_quiz_for_category_and_subject_($category_id, $subject, $created_by)
    {
        // echo $category_id;
        // die();
        $this->db->query('SELECT * FROM quizes where category=:category AND subject_name=:subject_name AND created_by =:created_by AND start_date IS NOT NULL');
        $this->db->bind(':category', $category_id);
        $this->db->bind(':subject_name', $subject);
        $this->db->bind(':created_by', $created_by);
        return $results = $this->db->resultset();
    }
    public function get_quiz_result_quiz_wise($quiz_id)
    {
        $this->db->query('SELECT * FROM quiz_result where quiz_id=:quiz_id ORDER BY id');
        $this->db->bind(':quiz_id', $quiz_id);
        return $results = $this->db->resultset();
    }
    public function last_added_quiz()
    {
        $this->db->query('SELECT * FROM quizes ORDER BY id DESC limit 1');
        return $results = $this->db->single();
    }
    public function last_added_college()
    {
        $this->db->query('SELECT * FROM college ORDER BY id DESC limit 1');
        return $results = $this->db->single();
    }


    public function add_subject($subject_name)
    {
        $this->db->query('INSERT INTO subject (subject_name) VALUES(:subject_name)');
        // Bind values
        $this->db->bind(':subject_name', ucwords(strtolower($subject_name)));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function add_chapter($data)
    {
        $this->db->query('INSERT INTO chapter (name,subject,resource,map) VALUES(:chapter,:subject_name,:resource,:map)');
        // Bind values
        $this->db->bind(':chapter', ucwords(strtolower($data['chapter'])));
        $this->db->bind(':subject_name', $data['subject_name']);
        $this->db->bind(':resource', $data['quiz_resource']);
        $this->db->bind(':map', $data['quiz_map']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function add_topic($data)
    {
        $this->db->query('INSERT INTO topic (name,chapter,subject) VALUES(:name,:chapter,:subject)');
        // Bind values
        $this->db->bind(':name', ucwords(strtolower($data['topic'])));
        $this->db->bind(':chapter', $data['chapter']);
        $this->db->bind(':subject', $data['subject']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function add_class($class_name)
    {
        $this->db->query('INSERT INTO class (class_name) VALUES(:class_name)');
        // Bind values
        $this->db->bind(':class_name', ucwords(strtolower($class_name)));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function add_quiz_category($category)
    {
        $this->db->query('INSERT INTO quiz_category (category) VALUES(:category)');
        // Bind values
        $this->db->bind(':category', ucwords(strtolower($category)));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_quiz_detail_by_temp_id($temp_id)
    {
        $this->db->query('SELECT * FROM quizes where temp_id=:temp_id');
        $this->db->bind(':temp_id', $temp_id);
        return $results = $this->db->single();
    }

    public function update_question($question, $option1, $option2, $option3, $option4, $answer, $id, $explanation, $question_img_file, $option1_img_file, $option2_img_file, $option3_img_file, $option4_img_file, $explanation_img, $subject, $class, $score, $chapter, $topic, $status)
    {
        $this->db->query('UPDATE quiz_master SET question=:question, option1=:option1, option2=:option2,option3=:option3,option4=:option4,answer=:answer,explanation=:explanation,question_img=:question_img,option1_img=:option1_img,option2_img = :option2_img,option3_img = :option3_img,option4_img = :option4_img ,explanation_img = :explanation_img,subject = :subject, class = :class,score=:score,chapter=:chapter,topic=:topic,status=:status  WHERE id=:id');

        // Bind values
        $this->db->bind(':question', $question);
        $this->db->bind(':option1', $option1);
        $this->db->bind(':option2', $option2);
        $this->db->bind(':option3', $option3);
        $this->db->bind(':option4', $option4);
        $this->db->bind(':answer', $answer);
        $this->db->bind(':id', $id);
        $this->db->bind(':explanation', $explanation);
        $this->db->bind(':question_img', $question_img_file);
        $this->db->bind(':option1_img', $option1_img_file);
        $this->db->bind(':option2_img', $option2_img_file);
        $this->db->bind(':option3_img', $option3_img_file);
        $this->db->bind(':option4_img', $option4_img_file);
        $this->db->bind(':explanation_img', $explanation_img);
        $this->db->bind(':subject', $subject);
        $this->db->bind(':class', $class);
        $this->db->bind(':score', $score);
        $this->db->bind(':chapter', $chapter);
        $this->db->bind(':topic', $topic);
        $this->db->bind(':status', $status);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function add_criteria($criteria_name, $category_id, $criteria_type, $yes_no_based, $start_date, $end_date, $start_range, $end_range)
    {
        $this->db->query('INSERT INTO criteria (criteria_name, category_id, criteria_type,yes_no_based,start_date,end_date,start_range,end_range) VALUES(:criteria_name, :category_id, :criteria_type,:yes_no_based,:start_date,:end_date,:start_range,:end_range)');
        // Bind values
        $this->db->bind(':criteria_name', $criteria_name);
        $this->db->bind(':category_id', $category_id);
        $this->db->bind(':criteria_type', $criteria_type);
        $this->db->bind(':yes_no_based', $yes_no_based,);
        $this->db->bind(':start_date', $start_date);
        $this->db->bind(':end_date', $end_date);
        $this->db->bind(':start_range', $start_range);
        $this->db->bind(':end_range', $end_range);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_all_quiz_category()
    {
        $this->db->query('SELECT * FROM quiz_category ');
        return $results = $this->db->resultset();
    }
    public function get_all_school_class()
    {
        $this->db->query('SELECT * FROM class');
        return $results = $this->db->resultset();
    }
    public function get_all_school_subject()
    {
        $this->db->query('SELECT * FROM subject');
        return $results = $this->db->resultset();
    }
    public function get_single_school_subject($id)
    {
        $this->db->query('SELECT * FROM subject where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_single_chapter($id)
    {
        $this->db->query('SELECT * FROM chapter where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_all_chapter()
    {
        $this->db->query('SELECT * FROM chapter');
        return $results = $this->db->resultset();
    }
    public function get_single_teacher()
    {
        $this->db->query('SELECT * FROM teacher where teacher_id = :teacher_id');
        $this->db->bind(":teacher_id", $_SESSION['rexkod_oodles_teacher_id']);
        return $results = $this->db->single();
    }
    public function get_all_topic()
    {
        $this->db->query('SELECT * FROM topic');
        return $results = $this->db->resultset();
    }
    public function get_sub_subject_from_subject($id)
    {
        if ($id == 0) {
            $this->db->query('SELECT * FROM chapter');
            return $results = $this->db->resultset();
        } else {
            $this->db->query('SELECT * FROM chapter where subject = :subject');
            $this->db->bind(':subject', $id);
            return $results = $this->db->resultset();
        }
    }
    public function get_topic_from_chapter($id)
    {
        $this->db->query('SELECT * FROM topic where chapter = :chapter');
        $this->db->bind(':chapter', $id);
        return $results = $this->db->resultset();
    }
    public function get_quiz_category($id)
    {
        $this->db->query('SELECT * FROM quiz_category where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_school_class($id)
    {
        $this->db->query('SELECT * FROM class where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_school_subject($id)
    {
        $this->db->query('SELECT * FROM subject where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_all_scholarship()
    {
        $this->db->query('SELECT * FROM scholarship ORDER BY id desc');
        return $results = $this->db->resultset();
    }
    public function get_single_scholarship($id)
    {
        $this->db->query('SELECT * FROM scholarship where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->resultset();
    }
    public function get_all_subject()
    {
        $this->db->query('SELECT * FROM subject');
        return $results = $this->db->resultset();
    }
    public function get_all_class()
    {
        $this->db->query('SELECT * FROM class');
        return $results = $this->db->resultset();
    }


    public function get_all_quiz_master()
    {

        $this->db->query('SELECT * FROM quiz_master where created_by=:created_by and delete_flag=:delete_flag');
        $this->db->bind(':created_by', '1');
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_teacher_id']);
        return $results = $this->db->resultset();
    }


    // public function get_selected_quiz_master($id)
    // {

    //     $this->db->query('SELECT * FROM quiz_master FULL OUTER JOIN quizes ON quiz_master.subject = quizes.subject_name FULL OUTER JOIN quizes ON  quiz_master.class = quizes.class_name WHERE quizes.id = :id');
    //     $this->db->bind(':id', $id);
    //     return $results = $this->db->resultset();
    // }

    public function get_selected_question($subject, $class, $chapter)
    {
        if (($subject == 0) && ($class == 0)) {
            $this->db->query('SELECT * from quiz_master and delete_flag=:delete_flag');
            $this->db->bind(':chapter', $chapter);
            $this->db->bind(':delete_flag', '1');
        } elseif ($class == 0) {
            $this->db->query('SELECT * from quiz_master where subject = :subject AND chapter=:chapter and delete_flag=:delete_flag');
            $this->db->bind(':subject', $subject);
            $this->db->bind(':chapter', $chapter);
            $this->db->bind(':delete_flag', '1');

        } elseif ($subject == 0) {
            $this->db->query('SELECT * from quiz_master where  class=:class AND chapter=:chapter and delete_flag=:delete_flag' );
            $this->db->bind(':class', $class);
            $this->db->bind(':chapter', $chapter);
            $this->db->bind(':delete_flag', '1');

        } else {
            $this->db->query('SELECT * from quiz_master where ((subject = :subject AND class=:class) OR (subject=0 OR class=0)) AND chapter=:chapter and delete_flag=:delete_flag');
            $this->db->bind(':subject', $subject);
            $this->db->bind(':class', $class);
            $this->db->bind(':chapter', $chapter);
            $this->db->bind(':delete_flag', '1');

        }
        return $results = $this->db->resultset();
    }
    public function add_question_to_quiz($question_id, $quiz_id)
    {
        $this->db->query('SELECT * FROM quizes where id=:quiz_id');
        $this->db->bind(':quiz_id', $quiz_id);
        $quiz_detail =  $this->db->single();

        $question  = $quiz_detail->question;
        $question_array[] = $question;
        $checking_duplicate_question = 0;
        foreach (explode(',', $question_array[0]) as $ques) {
            if ($ques == $question_id) {
                $checking_duplicate_question = 1;
            }
        }
        if ($checking_duplicate_question == 0) {
            if ($question == "0" || $question == NULL) {
                $new_question = $question_id;
            } else {
                $new_question = $question . ",$question_id";
            }
        } else {
            $new_question = $question;
        }

        $this->db->query('UPDATE quizes SET question = :question WHERE id=:id ');
        $this->db->bind(':id', $quiz_id);
        $this->db->bind(':question', $new_question);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function update_chapter_to_quiz($chapter_id, $quiz_id)
    {
        $this->db->query('UPDATE quizes SET chapter=:chapter WHERE id=:id ');
        $this->db->bind(':id', $quiz_id);
        $this->db->bind(':chapter', $chapter_id);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function delete_question_from_quiz($question_id, $quiz_id)
    {
        $this->db->query('SELECT * FROM quizes where id=:quiz_id');
        $this->db->bind(':quiz_id', $quiz_id);
        $quiz_detail =  $this->db->single();

        $question  = $quiz_detail->question;
        //    echo $question_id;
        //    die();
        $new_question = 0;
        if ($question == "0" || $question == NULL) {
            $new_question = 0;
        } else {
            $array = explode(',', $question);
            foreach ($array as $value) //loop over values
            {
                // echo $question_id;
                // die();

                // var_dump($value1);
                // die();
                if ($value != $question_id) {
                    $value1[] = $value;
                    $new_question = implode(',', $value1);
                } else {
                    continue;
                }
            }
        }
        $this->db->query('UPDATE quizes SET question = :question WHERE id=:id ');
        $this->db->bind(':id', $quiz_id);
        $this->db->bind(':question', $new_question);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function approve_quiz($id)
    {
        $this->db->query('UPDATE  quizes SET status=:status where id=:id');
        $this->db->bind(':status', '1');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function update_quiz_category($category, $id)
    {
        $this->db->query('UPDATE quiz_category SET category = :category,created_at = now() where id=:id');
        $this->db->bind(':category', $category);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function update_school_class($class_name, $id)
    {
        $this->db->query('UPDATE class SET class_name = :class_name,created_at = now() where id=:id');
        $this->db->bind(':class_name', $class_name);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function update_school_subject($subject_name, $id)
    {
        $this->db->query('UPDATE subject SET subject_name = :subject_name,created_at = now() where id=:id');
        $this->db->bind(':subject_name', $subject_name);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function get_single_question($id)
    {
        $this->db->query('SELECT * FROM quiz_master where id=:id ');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_inactive_quiz_master()
    {
        $this->db->query('SELECT * FROM quiz_master where status=:status ');
        $this->db->bind(':status', '0');
        return $results = $this->db->resultSet();
    }

    public function get_all_quizes($category_id)
    {
        $this->db->query('SELECT * FROM quizes where created_by=:created_by AND category=:category');
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_teacher_id']);
        $this->db->bind(':category', $category_id);

        return $results = $this->db->resultSet();
    }
public function get_quiz_subject_wise($subject_id){
    $this->db->query('SELECT * FROM quizes where subject_name=:subject_name');
    $this->db->bind(':subject_name', $subject_id);
    return $results = $this->db->resultSet();
}
    public function get_single_quizes($id)
    {
        $this->db->query('SELECT * FROM quizes where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->resultSet();
    }
    public function get_single_quizes_i($id)
    {
        $this->db->query('SELECT * FROM quizes where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_single_quizes_in($id)
    {
        $this->db->query('SELECT * FROM quizes where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->resultset();
    }
    public function get_all_criteria()
    {
        $this->db->query('SELECT * FROM criteria');
        return $results = $this->db->resultset();
    }
    public function get_criteria_by_id($id)
    {
        $this->db->query('SELECT * FROM criteria where id =:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }

    public function get_all_scholarship_id($id)
    {
        $this->db->query('SELECT * FROM scholarship where id=:id ');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_all_scholarship_by_id($id)
    {
        $this->db->query('SELECT * FROM scholarship where id=:id ');
        $this->db->bind(':id', $id);
        return $results = $this->db->resultSet();
    }
    public function get_all_scholarship_application()
    {
        $this->db->query('SELECT * FROM scholarship_application ORDER BY id desc');
        return $results = $this->db->resultset();
    }


    public function update_scholarship_status($id, $status)
    {

        $this->db->query('UPDATE scholarship_application set status = :status WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }




    public function getCategoryById($id)
    {
        $this->db->query("SELECT * FROM category where category_id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }

    public function update_category($id, $category_name, $img)
    {

        $temp = 0;
        if (!empty($_FILES['files']['name'])) {
            $f_name = $_FILES['files']['name'];
            $f_temp = $_FILES['files']['tmp_name'];
            $size = $_FILES['files']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $temp = $f_newfile;
        } else {
            $temp = $img;
        }


        $this->db->query('UPDATE category set category_name = :category_name, img = :img  WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':category_name', $category_name);
        $this->db->bind(':img', $temp);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_status_category($id, $status)
    {

        $this->db->query('UPDATE category set hide_status = :hide_status WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':hide_status', $status);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function update_cod_customer($id, $cod_val)
    {

        $this->db->query('UPDATE users set user_permission = :cod_val WHERE user_id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':cod_val', $cod_val);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }


    public function update_cod_vendor($id, $cod_val)
    {

        $this->db->query('UPDATE vendors set vendor_permissions = :cod_val WHERE vendor_id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':cod_val', $cod_val);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }




    public function get_productBy_id($id)
    {
        $this->db->query("SELECT * FROM products where id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }

    public function get_categoryBy_name($category_name)
    {
        $this->db->query("SELECT * FROM category where category_name = :category_name");

        $this->db->bind(':category_name', $category_name);

        return $results = $this->db->single();
    }

    public function update_product_db($id, $name, $price, $discount_price, $cat, $p_details, $product_type, $p_image)
    {
        $temp = 0;
        if (!empty($_FILES['files']['name'])) {
            $f_name = $_FILES['files']['name'];
            $f_temp = $_FILES['files']['tmp_name'];
            $size = $_FILES['files']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = uniqid() . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $temp = $f_newfile;
        } else {
            $temp = $p_image;
        }

        $this->db->query('UPDATE products set p_name = :name, p_image = :image, p_price =:price, discount_price = :discount_price, p_cat = :cat, p_details = :p_details, p_type = :p_type WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':image', $temp);
        $this->db->bind(':price', $price);
        $this->db->bind(':discount_price', $discount_price);
        $this->db->bind(':cat', $cat);
        $this->db->bind(':p_details', $p_details);
        $this->db->bind(':p_type', $product_type);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function viewOrder_deliveryUser($user_id)
    {
        $this->db->query("SELECT * FROM orders where delivery_userId = :user_id order by id DESC");
        $this->db->bind(':user_id', $user_id);

        return $results = $this->db->resultSet();
    }

    public function update_active_status_db($id, $status)
    {
        // $assign_time = date("d-M-Y h:i A");

        $this->db->query('UPDATE auth set active_status = :active_status where auth_id = :id');

        $this->db->bind(':id', $id);
        $this->db->bind(':active_status', $status);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function verify_vendor($id)
    {
        $this->db->query('UPDATE vendors set vendor_verified = :verify where vendor_id = :id');

        $this->db->bind(':id', $id);
        $this->db->bind(':verify', '1');



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function verify_customer($id)
    {
        $this->db->query('UPDATE users set user_verified = :verify where user_id = :id');

        $this->db->bind(':id', $id);
        $this->db->bind(':verify', '1');



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function view_allProdByCat($id)
    {
        $this->db->query("SELECT * FROM products where p_cat = :p_cat ");

        $this->db->bind(':p_cat', $id);

        return $results = $this->db->resultSet();
    }

    public function get_download_content()
    {


        $this->db->query('SELECT * from products');



        $result = $this->db->resultSet();

        return $result;
    }
    public function add_webinar_db($data)
    {
        $this->db->query('INSERT INTO webinar (college_name,subject,image,audience_no,webinar_date,start_time,end_time,webinar_info) VALUES (:college_name,:subject,:image,:audience_no,:webinar_date,:start_time,:end_time,:webinar_info)');
        $this->db->bind(':college_name', $data['college_name']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':audience_no', $data['audience_no']);
        $this->db->bind(':webinar_date', $data['webinar_date']);
        $this->db->bind(':start_time', $data['start_time']);
        $this->db->bind(':end_time', $data['end_time']);
        $this->db->bind(':webinar_info', $data['webinar_info']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }





    public function get_all_webinars()
    {
        $this->db->query("SELECT * FROM webinar ORDER BY id desc");
        return $results = $this->db->resultSet();
    }
    public function get_all_enquiry()
    {
        $this->db->query("SELECT * FROM enquiry ORDER by id desc");
        return $results = $this->db->resultSet();
    }
    public function get_all_home_enquiry()
    {
        $this->db->query("SELECT * FROM comment_home ORDER by id desc");
        return $results = $this->db->resultSet();
    }
    public function get_college_detail()
    {
        $this->db->query("SELECT * FROM college");
        return $results = $this->db->resultSet();
    }
    public function get_college_detail_single($id)
    {
        $this->db->query("SELECT * FROM college where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->resultSet();
    }

    //college end
    public function create_school_type($school_type, $school_type_image)
    {
        $this->db->query('INSERT INTO school_type (school_type,school_type_image)  VALUES (:school_type,:school_type_image)');
        $this->db->bind(':school_type', $school_type);
        $this->db->bind(':school_type_image', $school_type_image);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function create_scholarship_type($scholarship_type, $scholarship_type_image)
    {
        $this->db->query('INSERT INTO scholarship_type (scholarship_type,scholarship_type_image)  VALUES (:scholarship_type,:scholarship_type_image)');
        $this->db->bind(':scholarship_type', $scholarship_type);
        $this->db->bind(':scholarship_type_image', $scholarship_type_image);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_college_detail_ind($id)
    {
        $this->db->query("SELECT * FROM college where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_college_course_detail($id)
    {
        $this->db->query("SELECT * FROM college_course where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_all_college_by_course($id)
    {
        $this->db->query("SELECT * FROM college where college_course=:college_course");
        $this->db->bind(':college_course', $id);
        return $results = $this->db->resultSet();
    }
    public function get_school_type_detail($id)
    {
        $this->db->query("SELECT * FROM school_type where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_all_school_by_type($id)
    {
        $this->db->query("SELECT * FROM school where curriculum=:school_type");
        $this->db->bind(':school_type', $id);
        return $results = $this->db->resultSet();
    }
    public function get_school_type()
    {
        $this->db->query("SELECT * FROM school_type");

        return $results = $this->db->resultSet();
    }

    public function get_college_course()
    {
        $this->db->query("SELECT * FROM college_course");

        return $results = $this->db->resultSet();
    }
    public function get_school_type_limit()
    {
        $this->db->query("SELECT * FROM school_type LIMIT 5");

        return $results = $this->db->resultSet();
    }

    public function get_college_course_limit()
    {
        $this->db->query("SELECT * FROM college_course LIMIT 5");

        return $results = $this->db->resultSet();
    }
    public function get_scholarship_type()
    {
        $this->db->query("SELECT * FROM scholarship_type");

        return $results = $this->db->resultSet();
    }
    public function create_college_course($college_course, $college_course_image)
    {
        $this->db->query('INSERT INTO college_course (college_course,college_course_image)  VALUES (:college_course,:college_course_image)');
        $this->db->bind(':college_course', $college_course);
        $this->db->bind(':college_course_image', $college_course_image);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function create_teacher($data)
    {
        $this->db->query('INSERT INTO auth (type,name,email,phone,password)  VALUES (:type,:name,:email,:phone,:password)');
        $this->db->bind(':type', "teacher");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $data['phone']);
            $cur_user = $this->db->single();
            $teacher_id = $cur_user->id;
            // echo $teacher_id;
            // echo $data['school'];


            $this->db->query('INSERT INTO teacher (teacher_id,school) VALUES (:teacher_id,:school)');
            $this->db->bind(':teacher_id', $teacher_id);
            $this->db->bind(':school', $data['school']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function get_school_detail()
    {
        $this->db->query("SELECT * FROM school");
        return $results = $this->db->resultSet();
    }
    public function get_school_detail_single($id)
    {
        $this->db->query("SELECT * FROM school where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->resultSet();
    }
    public function get_school_detail_single_name($id)
    {
        $this->db->query("SELECT * FROM school where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_school_detail_ind($id)
    {
        $this->db->query("SELECT * FROM school where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_class_detail_single($id)
    {
        $this->db->query("SELECT * FROM class where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_subject_detail_single($id)
    {
        $this->db->query("SELECT * FROM subject where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_subject_from_class($class_id)
    {
        $this->db->query("SELECT * FROM subject where class=:id");
        $this->db->bind(':id', $class_id);
        return $results = $this->db->resultSet();
    }
    public function get_quiz_detail($quiz_id)
    {
        $this->db->query("SELECT * FROM quizes where id=:id");
        $this->db->bind(':id', $quiz_id);
        return $results = $this->db->single();
    }

    public function publish_quiz($quiz_id,$school_id)
    {
      
        $get_school_wallet  = $this->get_school_wallet($school_id);
        $get_quiz_balance = $get_school_wallet->quiz_balance;
        $new_quiz_balance = $get_quiz_balance - 1;
        $get_quiz_created_balance = $get_school_wallet->quiz_created;
        $new_quiz_created_balance = $get_quiz_created_balance  + 1;
        $this->db->query('UPDATE school_wallet set quiz_balance=:quiz_balance,quiz_created=:quiz_created where school_id=:school');
        $this->db->bind(':school', $school_id);
        $this->db->bind(':quiz_balance', $new_quiz_balance);
        $this->db->bind(':quiz_created', $new_quiz_created_balance);
        if ($this->db->execute()) {


        $order_d = array();
        $temp_id = md5(uniqid(rand(), true));

        $quiz = $this->get_quiz_detail($quiz_id);
        $this->db->query('INSERT INTO quizes (name,start_date,end_date,duration_min,duration_sec,quiz_cost,question,school_name,image,quiz_audio,class_name,subject_name,sub_subject,category,topic,chapter,attempt,quiz_resource,quiz_map,passing_per,coins_per_point1,coins_per_point2,coins_per_sec1,user_limit,start_time,end_time,remarks,contest_prize,created_by,status,copied_by,copied_quiz_id,temp_id) VALUES (:name,now(),:end_date,:duration_min,:duration_sec,:quiz_cost,:question,:school_name,:image,:quiz_audio,:class_name,:subject_name,:sub_subject,:category,:topic,:chapter,:attempt,:quiz_resource,:quiz_map,:passing_per,:coins_per_point1,:coins_per_point2,:coins_per_sec1,:user_limit,:start_time,:end_time,:remarks,:contest_prize,:created_by,:status,:copied_by,:copied_quiz_id,:temp_id)');

        $this->db->bind('name', $quiz->name);
        // $this->db->bind('start_date', now());
        // $this->db->bind('end_date', $quiz->end_date);
        // $today_date =  date("Y/m/d");
        // $next_month_date = date("Y/m/d", strtotime("1 month",$today_date));
        $this->db->bind('end_date', date("Y/m/d", strtotime(" +1 months")));
        $this->db->bind('duration_min', $quiz->duration_min);
        $this->db->bind('duration_sec', $quiz->duration_sec);
        $this->db->bind('quiz_cost', '0');
        $this->db->bind('question', $quiz->question);
        $this->db->bind('school_name', $quiz->school_name);
        $this->db->bind('image', $quiz->image);
        $this->db->bind('quiz_audio', $quiz->quiz_audio);
        $this->db->bind('class_name', $quiz->class_name);
        $this->db->bind('subject_name', $quiz->subject_name);
        $this->db->bind('sub_subject', $quiz->sub_subject);
        $this->db->bind('category', $quiz->category);
        $this->db->bind('topic', $quiz->topic);
        $this->db->bind('chapter', $quiz->chapter);
        $this->db->bind('attempt', $quiz->attempt);
        $this->db->bind('quiz_resource', $quiz->quiz_resource);
        $this->db->bind('quiz_map', $quiz->quiz_map);
        $this->db->bind('passing_per', $quiz->passing_per);
        $this->db->bind('coins_per_point1', $quiz->coins_per_point1);
        $this->db->bind('coins_per_point2', $quiz->coins_per_point2);
        $this->db->bind('coins_per_sec1', $quiz->coins_per_sec1);
        $this->db->bind('user_limit', $quiz->user_limit);
        $this->db->bind('start_time', $quiz->start_time);
        $this->db->bind('end_time', $quiz->end_time);
        $this->db->bind('remarks', $quiz->remarks);
        $this->db->bind('contest_prize', $quiz->contest_prize);
        $this->db->bind('created_by', $_SESSION['rexkod_oodles_teacher_id']);
        $this->db->bind('status', '0');
        $this->db->bind('copied_by', $quiz->created_by);
        $this->db->bind('copied_quiz_id', $quiz->id);
        $this->db->bind('temp_id', $temp_id);
        if ($this->db->execute()) {
            return $temp_id;
        } else {
            return false;
        }
    } else {
        return false;
    }

    }

    public function get_rejected_pending_quiz_master()
    {
        $this->db->query("SELECT * FROM quiz_master where (status='0' or status='2')  and  created_by  = :created_by");
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_teacher_id']);
        return $results = $this->db->resultSet();
    }

}
