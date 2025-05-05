<?php
class Corporates
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get_all_scholarship()
    {
        $this->db->query('SELECT * FROM scholarship where offered_by = :offered_by');
        $this->db->bind(':offered_by', $_SESSION['rexkod_oodles_corporate_id']);
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_all_orders()
    {
        $this->db->query('SELECT * FROM orders ORDER BY id desc');
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_ind_criteria($id)
    {
        $this->db->query('SELECT * FROM criteria where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_ind_scholarship_doc($id)
    {
        $this->db->query('SELECT * FROM scholarship_doc where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function update_scholarship_app_doc_verify($id, $doc_verify, $flag, $status,$auth_id)
    {
        $this->db->query('UPDATE scholarship_application SET doc_verify = :doc_verify, doc_verified_by=:doc_verified_by, doc_verified_at = :doc_verified_at,doc_verify_flag =:flag,status=:status WHERE id=:id ');
        $this->db->bind(':id', $id);
        $this->db->bind(':doc_verify', $doc_verify);
        $this->db->bind(':doc_verified_by', $auth_id);
        $this->db->bind(':doc_verified_at', date('d-m-y h:i:s'));
        $this->db->bind(':flag', $flag);
        $this->db->bind(':status', $status);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_scholarship_app_remark($id, $remark,$auth_id)
    {
        $this->db->query('UPDATE scholarship_application SET remark=:remark,remark_by=:remark_by,remark_at=:remark_at WHERE id=:id ');
        $this->db->bind(':id', $id);
        $this->db->bind(':remark', $remark);
        $this->db->bind(':remark_by',$auth_id);
        $this->db->bind(':remark_at', date('d-m-y h:i:s'));
        // $this->db->bind(':status', '3');

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_scholarship_app_dispersement($id, $dispersement, $status,$auth_id)
    {
        $this->db->query('UPDATE scholarship_application SET dispersement=:dispersement,dispersement_by=:dispersement_by,dispersement_at=:dispersement_at,status=:status WHERE id=:id ');
        // echo $dispersement;
        // die();
        $this->db->bind(':id', $id);
        $this->db->bind(':dispersement', $dispersement);
        $this->db->bind(':dispersement_by', $auth_id);
        $this->db->bind(':dispersement_at', date('d-m-y h:i:s'));
        $this->db->bind(':status', $status);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function scholarship_grant_cum_reject($id, $status,$auth_id)
    {
        $this->db->query('UPDATE scholarship_application SET status=:status,rejected_by=:rejected_by,rejected_at=:rejected_at WHERE id=:id ');
        // if($status == 3){
        //     $this->db->bind(':granted_by', $_SESSION['rexkod_oodles_corporate_id']);
        //     $this->db->bind(':granted_at', date('d-m-y h:i:s'));
        //     $this->db->bind(':rejected_by', Null);
        //     $this->db->bind(':rejected_at', Null);
        // }else{

        $this->db->bind(':rejected_by', $auth_id);
        $this->db->bind(':rejected_at', date('d-m-y h:i:s'));
        // }
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
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
    public function get_ind_scholarship($id)
    {
        $this->db->query('SELECT * FROM scholarship where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_ind_scholarship_application($id)
    {
        $this->db->query('SELECT * FROM scholarship_application where id=:id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }

    public function get_all_category()
    {
        $this->db->query('SELECT * FROM category WHERE category_vendor_id = :vid order by category_id DESC');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        return $this->db->resultSet();
    }

    public function get_all_coupons()
    {
        $this->db->query('SELECT * FROM coupons order by coupon_id DESC');

        return $this->db->resultSet();
    }


    public function get_all_subcategory()
    {
        $this->db->query('SELECT * FROM subcategory WHERE subcategory_vendor_id = :vid order by subcategory_id DESC');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);

        return $this->db->resultSet();
    }



    public function create_product_db($name, $subcat, $p_details, $created_byId, $data)
    {
        $unqdate = date("Ymd");
        $unqtime = time();
        $unqname = $_SESSION['rexkod_vendor_id'] . "" . $unqdate . "" . $unqtime;

        if (!empty($_FILES['pro_img1']['name'])) {
            $f_name = $_FILES['pro_img1']['name'];
            $f_temp = $_FILES['pro_img1']['tmp_name'];
            $size = $_FILES['pro_img1']['size'];
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


        if (!empty($_FILES['pro_img2']['name'])) {
            $f_name = $_FILES['pro_img2']['name'];
            $f_temp = $_FILES['pro_img2']['tmp_name'];
            $size = $_FILES['pro_img2']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = '2' . $unqname . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $temp2 = $f_newfile;
        } else {
            $temp2 = NULL;
        }


        if (!empty($_FILES['pro_img3']['name'])) {
            $f_name = $_FILES['pro_img3']['name'];
            $f_temp = $_FILES['pro_img3']['tmp_name'];
            $size = $_FILES['pro_img3']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = '3' . $unqname . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $temp3 = $f_newfile;
        } else {
            $temp3 = NULL;
        }

        if (!empty($_FILES['desc_img']['name'])) {
            $f_name = $_FILES['desc_img']['name'];
            $f_temp = $_FILES['desc_img']['tmp_name'];
            $size = $_FILES['desc_img']['size'];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_newfile = '4' . $unqname . '.' . $f_extension;
            $store = "uploads/" . $f_newfile;
            move_uploaded_file($f_temp, $store);
            $store = "uploads/";
            $temp4 = $f_newfile;
        } else {
            $temp4 = NULL;
        }




        $this->db->query("SELECT * FROM subcategory where subcategory_id = :id ");

        $this->db->bind(':id', $subcat);

        $cat_val = $this->db->single();

        $cat_id = $cat_val->category_id;



        $this->db->query('INSERT INTO products(p_name, p_image, p_image2, p_image3, p_cat, p_subcat, p_details, p_desc_img, p_type, created_byId, created_byType, min1, max1, price1, min2, max2, price2, min3, max3, price3, min4, max4, price4, min5, max5, price5) VALUES (:name,:image,:image2,:image3,:cat,:subcat,:p_details, :p_desc_img, :p_type, :created_byId, :created_byType, :min1, :max1, :price1, :min2, :max2, :price2, :min3, :max3, :price3, :min4, :max4, :price4, :min5, :max5, :price5)');

        //bind our parameters
        $this->db->bind(':name', $name);
        $this->db->bind(':image', $temp1);
        $this->db->bind(':image2', $temp2);
        $this->db->bind(':image3', $temp3);

        $this->db->bind(':cat', $cat_id);
        $this->db->bind(':subcat', $subcat);
        $this->db->bind(':p_details', $p_details);
        $this->db->bind(':p_desc_img', $temp4);

        $this->db->bind(':p_type', '0');

        $this->db->bind(':created_byId', $created_byId);
        $this->db->bind(':created_byType', "vendor");


        $this->db->bind(':min1', $data['min1']);
        $this->db->bind(':max1', $data['max1']);
        $this->db->bind(':price1', $data['price1']);

        $this->db->bind(':min2', $data['min2']);
        $this->db->bind(':max2', $data['max2']);
        $this->db->bind(':price2', $data['price2']);

        $this->db->bind(':min3', $data['min3']);
        $this->db->bind(':max3', $data['max3']);
        $this->db->bind(':price3', $data['price3']);

        $this->db->bind(':min4', $data['min4']);
        $this->db->bind(':max4', $data['max4']);
        $this->db->bind(':price4', $data['price4']);

        $this->db->bind(':min5', $data['min5']);
        $this->db->bind(':max5', $data['max5']);
        $this->db->bind(':price5', $data['price5']);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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
    public function add_quiz_first($data)
    {
        $this->db->query('INSERT INTO quizes (name,class_name,subject_name,category) VALUES (:name,:class_name,:subject_name,:category)');
        $this->db->bind(':name', $data['quiz_name']);
        $this->db->bind(':class_name', $data['class']);
        $this->db->bind(':subject_name', $data['subject']);
        $this->db->bind(':category', $data['category']);
        if ($this->db->execute()) {
            //    $last_id =$this->db->lastInsertId();
            return true;
        } else {
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

    public function add_question($data)
    {
        $this->db->query('INSERT INTO quiz_master (chapter,topic,question,option1,option2,option3,option4,answer,question_img,option1_img,option2_img,option3_img,option4_img,explanation,explanation_img,subject,class,score) VALUES(:chapter,:topic,:question,:option1,:option2,:option3,:option4,:answer,:question_img,:option1_img_file,:option2_img_file,:option3_img_file,:option4_img_file,:explanation,:explanation_img,:subject,:class,:score)');
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
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_question($question, $option1, $option2, $option3, $option4, $answer, $id, $explanation, $question_img_file, $option1_img_file, $option2_img_file, $option3_img_file, $option4_img_file, $explanation_img, $subject, $class, $score, $chapter, $topic)
    {
        $this->db->query('UPDATE quiz_master SET question=:question, option1=:option1, option2=:option2,option3=:option3,option4=:option4,answer=:answer,explanation=:explanation,question_img=:question_img,option1_img=:option1_img,option2_img = :option2_img,option3_img = :option3_img,option4_img = :option4_img ,explanation_img = :explanation_img,subject = :subject, class = :class,score=:score,chapter=:chapter,topic=:topic  WHERE id=:id');

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

        $this->db->query('SELECT * FROM quiz_master where created_by=:created_by');
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
            $this->db->query('SELECT * from quiz_master');
            $this->db->bind(':chapter', $chapter);
        } elseif ($class == 0) {
            $this->db->query('SELECT * from quiz_master where subject = :subject AND chapter=:chapter');
            $this->db->bind(':subject', $subject);
            $this->db->bind(':chapter', $chapter);
        } elseif ($subject == 0) {
            $this->db->query('SELECT * from quiz_master where  class=:class AND chapter=:chapter');
            $this->db->bind(':class', $class);
            $this->db->bind(':chapter', $chapter);
        } else {
            $this->db->query('SELECT * from quiz_master where ((subject = :subject AND class=:class) OR (subject=0 OR class=0)) AND chapter=:chapter');
            $this->db->bind(':subject', $subject);
            $this->db->bind(':class', $class);
            $this->db->bind(':chapter', $chapter);
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

    public function get_all_quizes()
    {
        $this->db->query('SELECT * FROM quizes where created_by=:created_by');
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_teacher_id']);

        return $results = $this->db->resultset();
    }

    public function get_single_quizes($id)
    {
        $this->db->query('SELECT * FROM quizes where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->resultset();
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
        $this->db->query('SELECT * FROM scholarship_application WHERE scholarship_id IN (SELECT id from scholarship where offered_by=:id)');
        $this->db->bind(':id', $_SESSION['rexkod_oodles_corporate_id']);

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


    // college
    public function add_college_elements($data)
    {
        $this->db->query('INSERT INTO college (college_name,college_contact_no,college_address,college_type,year_of_establishment,recognized_by,college_pin_code,college_city,state,legal_name,accreditation_no,accredited_by,registered_address,facility,website_link,website_check,college_info,college_course,auth_signature,auth_designation,auth_aadhar_no,auth_email,auth_contact_number,auth_contact_person,contact_person_designation,contact_person_details,bank_name,account_no,re_account_no,ifsc,branch_name,college_name_as_per_bank,cancelled_cheque,course_offered,mode_of_admission,how_to_apply,admission_criteria,entrance_exam,review_academic,review_accomodation,review_faculty,review_infra,review_placement,review_social,review_course,review_campus,placement,placement_images,gallery,scholarship,cut_off_marks,faculty,faculty_images,hostel,hostel_images,question_faq,answer_faq,alumni,alumni_images,college_image,mou,nda,declaration_form,signatory_aadhar,other_document,auth_image,package_name,package_cost,package_start_date,package_end_date,package_description,package_validity,package_other_detail,package_renewal,package_invoice) VALUES (:college_name,:college_contact_no,:college_address,:college_type,:year_of_establishment,:recognized_by,:college_pin_code,:college_city,:state,:legal_name,:accreditation_no,:accredited_by,:registered_address,:facility,:website_link,:website_check,:college_info,:college_course,:auth_signature,:auth_designation,:auth_aadhar_no,:auth_email,:auth_contact_number,:auth_contact_person,:contact_person_designation,:contact_person_details,:bank_name,:account_no,:re_account_no,:ifsc,:branch_name,:college_name_as_per_bank,:cancelled_cheque,:course_offered,:mode_of_admission,:how_to_apply,:admission_criteria,:entrance_exam,:review_academic,:review_accomodation,:review_faculty,:review_infra,:review_placement,:review_social,:review_course,:review_campus,:placement,:placement_images,:gallery,:scholarship,:cut_off_marks,:faculty,:faculty_images,:hostel,:hostel_images,:question_faq,:answer_faq,:alumni,:alumni_images,:college_image,:mou,:nda,:declaration_form,:signatory_aadhar,:other_document,:auth_image,:package_name,:package_cost,:package_start_date,:package_end_date,:package_description,:package_validity,:package_other_detail,:package_renewal,:package_invoice)');



        $this->db->bind(':college_name', $data['college_name']);
        $this->db->bind(':college_contact_no', $data['college_contact_no']);
        $this->db->bind(':college_address', $data['college_address']);
        $this->db->bind(':college_type', $data['college_type']);
        $this->db->bind(':year_of_establishment', $data['year_of_establishment']);
        $this->db->bind(':recognized_by', $data['recognized_by']);
        $this->db->bind(':college_pin_code', $data['college_pin_code']);
        $this->db->bind(':college_city', $data['college_city']);
        $this->db->bind(':state', $data['state']);
        //  $this->db->bind(':student_teacher_ratio',$data['student_teacher_ratio']);
        $this->db->bind(':legal_name', $data['legal_name']);
        $this->db->bind(':accreditation_no', $data['accreditation_no']);
        $this->db->bind(':accredited_by', $data['accredited_by']);
        $this->db->bind(':registered_address', $data['registered_address']);
        $this->db->bind(':facility', $data['facility']);
        $this->db->bind(':website_link', $data['website_link']);
        $this->db->bind(':website_check', $data['website_check']);
        $this->db->bind(':college_info', $data['college_info']);
        $this->db->bind(':college_course', $data['college_course']);
        $this->db->bind(':auth_signature', $data['auth_signature']);
        $this->db->bind(':auth_designation', $data['auth_designation']);
        $this->db->bind(':auth_aadhar_no', $data['auth_aadhar_no']);
        $this->db->bind(':auth_email', $data['auth_email']);
        $this->db->bind(':auth_contact_number', $data['auth_contact_number']);
        $this->db->bind(':auth_contact_person', $data['auth_contact_person']);
        $this->db->bind(':contact_person_designation', $data['contact_person_designation']);
        $this->db->bind(':contact_person_details', $data['contact_person_details']);
        $this->db->bind(':bank_name', $data['bank_name']);
        $this->db->bind(':account_no', $data['account_no']);
        $this->db->bind(':re_account_no', $data['re_account_no']);
        $this->db->bind(':ifsc', $data['ifsc']);
        $this->db->bind(':branch_name', $data['branch_name']);
        $this->db->bind(':college_name_as_per_bank', $data['college_name_as_per_bank']);
        $this->db->bind(':cancelled_cheque', $data['cancelled_cheque']);
        $this->db->bind(':course_offered', $data['course_offered']);
        $this->db->bind(':mode_of_admission', $data['mode_of_admission']);
        $this->db->bind(':how_to_apply', $data['how_to_apply']);
        $this->db->bind(':admission_criteria', $data['admission_criteria']);
        $this->db->bind(':entrance_exam', $data['entrance_exam']);
        $this->db->bind(':review_academic', $data['review_academic']);
        $this->db->bind(':review_accomodation', $data['review_accomodation']);
        $this->db->bind(':review_faculty', $data['review_faculty']);
        $this->db->bind(':review_infra', $data['review_infra']);
        $this->db->bind(':review_placement', $data['review_placement']);
        $this->db->bind(':review_social', $data['review_social']);
        $this->db->bind(':review_course', $data['review_course']);
        $this->db->bind(':review_campus', $data['review_campus']);
        $this->db->bind(':scholarship', $data['scholarship']);
        // $this->db->bind(':cut_off_year', $data['cut_off_year']);
        $this->db->bind(':cut_off_marks', $data['cut_off_marks']);
        $this->db->bind(':placement', $data['placement']);
        $this->db->bind(':placement_images', $data['placement_images']);
        $this->db->bind(':gallery', $data['gallery']);
        $this->db->bind(':scholarship', $data['scholarship']);
        $this->db->bind(':faculty', $data['faculty']);
        $this->db->bind(':faculty_images', $data['faculty_images']);
        $this->db->bind(':hostel', $data['hostel']);
        $this->db->bind(':hostel_images', $data['hostel_images']);
        $this->db->bind(':question_faq', $data['question_faq']);
        $this->db->bind(':answer_faq', $data['answer_faq']);
        $this->db->bind(':alumni', $data['alumni']);
        $this->db->bind(':alumni_images', $data['alumni_images']);
        $this->db->bind(':college_image', $data['college_image']);
        $this->db->bind(':mou', $data['mou']);
        $this->db->bind(':nda', $data['nda']);
        $this->db->bind(':nda', $data['nda']);
        $this->db->bind(':declaration_form', $data['declaration_form']);
        $this->db->bind(':signatory_aadhar', $data['signatory_aadhar']);
        $this->db->bind(':other_document', $data['other_document']);
        $this->db->bind(':auth_image', $data['auth_image']);
        $this->db->bind(':package_name', $data['package_name']);
        $this->db->bind(':package_cost', $data['package_cost']);
        $this->db->bind(':package_start_date', $data['package_start_date']);
        $this->db->bind(':package_end_date', $data['package_end_date']);
        $this->db->bind(':package_description', $data['package_description']);
        $this->db->bind(':package_validity', $data['package_validity']);
        $this->db->bind(':package_other_detail', $data['package_other_detail']);
        $this->db->bind(':package_renewal', $data['package_renewal']);
        $this->db->bind(':package_invoice', $data['package_invoice']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_college_elements($data, $id)
    {
        $this->db->query('UPDATE college SET college_name=:college_name,college_contact_no=:college_contact_no,college_address=:college_address,college_type=:college_type,year_of_establishment=:year_of_establishment,recognized_by=:recognized_by,college_pin_code=:college_pin_code,college_city=:college_city,state=:state,legal_name=:legal_name,accreditation_no=:accreditation_no,accredited_by=:accredited_by,registered_address=:registered_address,facility=:facility,website_link=:website_link,website_check=:website_check,college_info=:college_info,college_course=:college_course,auth_signature=:auth_signature,auth_designation=:auth_designation,auth_aadhar_no=:auth_aadhar_no,auth_email=:auth_email,auth_contact_number=:auth_contact_number,auth_contact_person=:auth_contact_person,contact_person_designation=:contact_person_designation,contact_person_details=:contact_person_details,bank_name=:bank_name,account_no=:account_no,re_account_no=:re_account_no,ifsc=:ifsc,branch_name=:branch_name,college_name_as_per_bank=:college_name_as_per_bank,cancelled_cheque=:cancelled_cheque,course_offered=:course_offered,mode_of_admission=:mode_of_admission,how_to_apply=:how_to_apply,admission_criteria=:admission_criteria,entrance_exam=:entrance_exam,review_academic=:review_academic,review_accomodation=:review_accomodation,review_faculty=:review_faculty,review_infra=:review_infra,review_placement=:review_placement,review_social=:review_social,review_course=:review_course,review_campus=:review_campus,placement=:placement,placement_images=:placement_images,gallery=:gallery,scholarship=:scholarship,cut_off_year=:cut_off_year,cut_off_marks=:cut_off_marks,faculty=:faculty,faculty_images=:faculty_images,hostel=:hostel,hostel_images=:hostel_images,question_faq=:question_faq,answer_faq=:answer_faq,alumni=:alumni,alumni_images=:alumni_images,college_image=:college_image,mou=:mou,nda=:nda,declaration_form=:declaration_form,signatory_aadhar=:signatory_aadhar,other_document=:other_document,auth_image=:auth_image,package_name=:package_name,package_cost=:package_cost,package_start_date=:package_start_date,package_end_date=:package_end_date,package_description=:package_description,package_validity=:package_validity,package_other_detail=:package_other_detail,package_renewal=:package_renewal,package_invoice=:package_invoice where id=:id');



        $this->db->bind(':college_name', $data['college_name']);
        $this->db->bind(':college_contact_no', $data['college_contact_no']);
        $this->db->bind(':college_address', $data['college_address']);
        $this->db->bind(':college_type', $data['college_type']);
        $this->db->bind(':year_of_establishment', $data['year_of_establishment']);
        $this->db->bind(':recognized_by', $data['recognized_by']);
        $this->db->bind(':college_pin_code', $data['college_pin_code']);
        $this->db->bind(':college_city', $data['college_city']);
        $this->db->bind(':state', $data['state']);
        //  $this->db->bind(':student_teacher_ratio',$data['student_teacher_ratio']);
        $this->db->bind(':legal_name', $data['legal_name']);
        $this->db->bind(':accreditation_no', $data['accreditation_no']);
        $this->db->bind(':accredited_by', $data['accredited_by']);
        $this->db->bind(':registered_address', $data['registered_address']);
        $this->db->bind(':facility', $data['facility']);
        $this->db->bind(':website_link', $data['website_link']);
        $this->db->bind(':website_check', $data['website_check']);
        $this->db->bind(':college_info', $data['college_info']);
        $this->db->bind(':college_course', $data['college_course']);
        $this->db->bind(':auth_signature', $data['auth_signature']);
        $this->db->bind(':auth_designation', $data['auth_designation']);
        $this->db->bind(':auth_aadhar_no', $data['auth_aadhar_no']);
        $this->db->bind(':auth_email', $data['auth_email']);
        $this->db->bind(':auth_contact_number', $data['auth_contact_number']);
        $this->db->bind(':auth_contact_person', $data['auth_contact_person']);
        $this->db->bind(':contact_person_designation', $data['contact_person_designation']);
        $this->db->bind(':contact_person_details', $data['contact_person_details']);
        $this->db->bind(':bank_name', $data['bank_name']);
        $this->db->bind(':account_no', $data['account_no']);
        $this->db->bind(':re_account_no', $data['re_account_no']);
        $this->db->bind(':ifsc', $data['ifsc']);
        $this->db->bind(':branch_name', $data['branch_name']);
        $this->db->bind(':college_name_as_per_bank', $data['college_name_as_per_bank']);
        $this->db->bind(':cancelled_cheque', $data['cancelled_cheque']);
        $this->db->bind(':course_offered', $data['course_offered']);
        $this->db->bind(':mode_of_admission', $data['mode_of_admission']);
        $this->db->bind(':how_to_apply', $data['how_to_apply']);
        $this->db->bind(':admission_criteria', $data['admission_criteria']);
        $this->db->bind(':entrance_exam', $data['entrance_exam']);
        $this->db->bind(':review_academic', $data['review_academic']);
        $this->db->bind(':review_accomodation', $data['review_accomodation']);
        $this->db->bind(':review_faculty', $data['review_faculty']);
        $this->db->bind(':review_infra', $data['review_infra']);
        $this->db->bind(':review_placement', $data['review_placement']);
        $this->db->bind(':review_social', $data['review_social']);
        $this->db->bind(':review_course', $data['review_course']);
        $this->db->bind(':review_campus', $data['review_campus']);
        $this->db->bind(':scholarship', $data['scholarship']);
        $this->db->bind(':cut_off_year', $data['cut_off_year']);
        $this->db->bind(':cut_off_marks', $data['cut_off_marks']);
        $this->db->bind(':placement', $data['placement']);
        $this->db->bind(':placement_images', $data['placement_images']);
        $this->db->bind(':gallery', $data['gallery']);
        $this->db->bind(':scholarship', $data['scholarship']);
        $this->db->bind(':faculty', $data['faculty']);
        $this->db->bind(':faculty_images', $data['faculty_images']);
        $this->db->bind(':hostel', $data['hostel']);
        $this->db->bind(':hostel_images', $data['hostel_images']);
        $this->db->bind(':question_faq', $data['question_faq']);
        $this->db->bind(':answer_faq', $data['answer_faq']);
        $this->db->bind(':alumni', $data['alumni']);
        $this->db->bind(':alumni_images', $data['alumni_images']);
        $this->db->bind(':college_image', $data['college_image']);
        $this->db->bind(':mou', $data['mou']);
        $this->db->bind(':nda', $data['nda']);
        $this->db->bind(':nda', $data['nda']);
        $this->db->bind(':declaration_form', $data['declaration_form']);
        $this->db->bind(':signatory_aadhar', $data['signatory_aadhar']);
        $this->db->bind(':other_document', $data['other_document']);
        $this->db->bind(':auth_image', $data['auth_image']);
        $this->db->bind(':package_name', $data['package_name']);
        $this->db->bind(':package_cost', $data['package_cost']);
        $this->db->bind(':package_start_date', $data['package_start_date']);
        $this->db->bind(':package_end_date', $data['package_end_date']);
        $this->db->bind(':package_description', $data['package_description']);
        $this->db->bind(':package_validity', $data['package_validity']);
        $this->db->bind(':package_other_detail', $data['package_other_detail']);
        $this->db->bind(':package_renewal', $data['package_renewal']);
        $this->db->bind(':package_invoice', $data['package_invoice']);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function add_school_elements($data)
    {

        $this->db->query('INSERT INTO school (school_image,signatory_aadhar,auth_image,mou,nda,declaration_form,other_document,school_name,school_contact_no,school_address,school_type,year_of_establishment,recognized_by,school_pin_code,school_city,school_state,legal_name,student_teacher_ratio,accreditation_no,accredited_by,registered_address,facility,facility_info,facility_images,extra_curricular_info,extra_curricular_images,academic_info,academic_images,website_link,website_check,school_info,auth_name,auth_designation,auth_aadhar_no,auth_email,auth_contact_number,auth_contact_person,contact_person_designation,contact_person_details,bank_name,account_no,re_account_no,school_name_as_per_bank,cancelled_cheque,ifsc,branch_name,mode_of_admission,how_to_apply,scholastic,scholastic_info,coscholastic,coscholastic_info,achievement_info,achievement_images,admission_fee,review_academic,review_faculty,review_infra,review_nonacademic,review_school,faculty_images,gallery,faculty_info,question_faq,answer_faq,package_name,package_cost,package_start_date,package_end_date,package_info,package_validity,package_other_detail,package_renewal,package_invoice) VALUES (:school_image,:signatory_aadhar,:auth_image,:mou,:nda,:declaration_form,:other_document,:school_name,:school_contact_no,:school_address,:school_type,:year_of_establishment,:recognized_by,:school_pin_code,:school_city,:school_state,:legal_name,:student_teacher_ratio,:accreditation_no,:accredited_by,:registered_address,:facility,:facility_info,:facility_images,:extra_curricular_info,:extra_curricular_images,:academic_info,:academic_images,:website_link,:website_check,:school_info,:auth_name,:auth_designation,:auth_aadhar_no,:auth_email,:auth_contact_number,:auth_contact_person,:contact_person_designation,:contact_person_details,:bank_name,:account_no,:re_account_no,:school_name_as_per_bank,:cancelled_cheque,:ifsc,:branch_name,:mode_of_admission,:how_to_apply,:scholastic,:scholastic_info,:coscholastic,:coscholastic_info,:achievement_info,:achievement_images,:admission_fee,:review_academic,:review_faculty,:review_infra,:review_nonacademic,:review_school,:faculty_images,:gallery,:faculty_info,:question_faq,:answer_faq,:package_name,:package_cost,:package_start_date,:package_end_date,:package_info,:package_validity,:package_other_detail,:package_renewal,:package_invoice)');



        $this->db->bind(':school_image', $data['school_image']);
        $this->db->bind(':signatory_aadhar', $data['signatory_aadhar']);
        $this->db->bind(':auth_image', $data['auth_image']);
        $this->db->bind(':mou', $data['mou']);
        $this->db->bind(':nda', $data['nda']);
        $this->db->bind(':declaration_form', $data['declaration_form']);
        $this->db->bind(':other_document', $data['other_document']);
        $this->db->bind(':school_name', $data['school_name']);
        $this->db->bind(':school_contact_no', $data['school_contact_no']);
        $this->db->bind(':school_address', $data['school_address']);
        $this->db->bind(':school_type', $data['school_type']);
        $this->db->bind(':year_of_establishment', $data['year_of_establishment']);
        $this->db->bind(':recognized_by', $data['recognized_by']);
        $this->db->bind(':school_pin_code', $data['school_pin_code']);
        $this->db->bind(':school_city', $data['school_city']);
        $this->db->bind(':school_state', $data['school_state']);
        $this->db->bind(':legal_name', $data['legal_name']);
        $this->db->bind(':student_teacher_ratio', $data['student_teacher_ratio']);
        $this->db->bind(':accreditation_no', $data['accreditation_no']);
        $this->db->bind(':accredited_by', $data['accredited_by']);
        $this->db->bind(':registered_address', $data['registered_address']);
        $this->db->bind(':facility', $data['facility']);
        $this->db->bind(':facility_info', $data['facility_info']);
        $this->db->bind(':facility_images', $data['facility_images']);
        $this->db->bind(':extra_curricular_info', $data['extra_curricular_info']);
        $this->db->bind(':extra_curricular_images', $data['extra_curricular_images']);
        $this->db->bind(':academic_info', $data['academic_info']);
        $this->db->bind(':academic_images', $data['academic_images']);
        $this->db->bind(':website_link', $data['website_link']);
        $this->db->bind(':website_check', $data['website_check']);
        $this->db->bind(':school_info', $data['school_info']);
        $this->db->bind(':auth_name', $data['auth_name']);
        $this->db->bind(':auth_designation', $data['auth_designation']);
        $this->db->bind(':auth_aadhar_no', $data['auth_aadhar_no']);
        $this->db->bind(':auth_email', $data['auth_email']);
        $this->db->bind(':auth_contact_number', $data['auth_contact_number']);
        $this->db->bind(':auth_contact_person', $data['auth_contact_person']);
        $this->db->bind(':contact_person_designation', $data['contact_person_designation']);
        $this->db->bind(':contact_person_details', $data['contact_person_details']);
        $this->db->bind(':bank_name', $data['bank_name']);
        $this->db->bind(':account_no', $data['account_no']);
        $this->db->bind(':re_account_no', $data['re_account_no']);
        $this->db->bind(':school_name_as_per_bank', $data['school_name_as_per_bank']);
        $this->db->bind(':cancelled_cheque', $data['cancelled_cheque']);
        $this->db->bind(':ifsc', $data['ifsc']);
        $this->db->bind(':branch_name', $data['branch_name']);
        $this->db->bind(':mode_of_admission', $data['mode_of_admission']);
        $this->db->bind(':how_to_apply', $data['how_to_apply']);
        $this->db->bind(':scholastic', $data['scholastic']);
        $this->db->bind(':scholastic_info', $data['scholastic_info']);
        $this->db->bind(':coscholastic', $data['coscholastic']);
        $this->db->bind(':coscholastic_info', $data['coscholastic_info']);
        $this->db->bind(':achievement_info', $data['achievement_info']);
        $this->db->bind(':achievement_images', $data['achievement_images']);

        $this->db->bind(':admission_fee', $data['admission_fee']);
        $this->db->bind(':review_academic', $data['review_academic']);
        $this->db->bind(':review_faculty', $data['review_faculty']);
        $this->db->bind(':review_infra', $data['review_infra']);
        $this->db->bind(':review_nonacademic', $data['review_nonacademic']);
        $this->db->bind(':review_school', $data['review_school']);
        $this->db->bind(':faculty_images', $data['faculty_images']);
        $this->db->bind(':gallery', $data['gallery']);

        $this->db->bind(':faculty_info', $data['faculty_info']);
        $this->db->bind(':question_faq', $data['question_faq']);
        $this->db->bind(':answer_faq', $data['answer_faq']);
        $this->db->bind(':package_name', $data['package_name']);
        $this->db->bind(':package_cost', $data['package_cost']);
        $this->db->bind(':package_start_date', $data['package_start_date']);
        $this->db->bind(':package_end_date', $data['package_end_date']);
        $this->db->bind(':package_info', $data['package_info']);
        $this->db->bind(':package_validity', $data['package_validity']);
        $this->db->bind(':package_other_detail', $data['package_other_detail']);
        $this->db->bind(':package_renewal', $data['package_renewal']);
        $this->db->bind(':package_invoice', $data['package_invoice']);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_school_elements($data, $id)
    {

        $this->db->query('UPDATE school set school_image=:school_image,signatory_aadhar=:signatory_aadhar,auth_image=:auth_image,mou=:mou,nda=:nda,declaration_form=:declaration_form,other_document=:other_document,school_name=:school_name,school_contact_no=:school_contact_no,school_address=:school_address,school_type=:school_type,year_of_establishment=:year_of_establishment,recognized_by=:recognized_by,school_pin_code=:school_pin_code,school_city=:school_city,school_state=:school_state,legal_name=:legal_name,student_teacher_ratio=:student_teacher_ratio,accreditation_no=:accreditation_no,accredited_by=:accredited_by,registered_address=:registered_address,facility=:facility,facility_info=:facility_info,facility_images=:facility_images,extra_curricular_info=:extra_curricular_info,extra_curricular_images=:extra_curricular_images,academic_info=:academic_info,academic_images=:academic_images,website_link=:website_link,website_check=:website_check,school_info=:school_info,auth_name=:auth_name,auth_designation=:auth_designation,auth_aadhar_no=:auth_aadhar_no,auth_email=:auth_email,auth_contact_number=:auth_contact_number,auth_contact_person=:auth_contact_person,contact_person_designation=:contact_person_designation,contact_person_details=:contact_person_details,bank_name=:bank_name,account_no=:account_no,re_account_no=:re_account_no,school_name_as_per_bank=:school_name_as_per_bank,cancelled_cheque=:cancelled_cheque,ifsc=:ifsc,branch_name=:branch_name,mode_of_admission=:mode_of_admission,how_to_apply=:how_to_apply,scholastic=:scholastic,scholastic_info=:scholastic_info,coscholastic=:coscholastic,coscholastic_info=:coscholastic_info,achievement_info=:achievement_info,achievement_images=:achievement_images,admission_fee=:admission_fee,review_academic=:review_academic,review_faculty=:review_faculty,review_infra=:review_infra,review_nonacademic=:review_nonacademic,review_school=:review_school,faculty_images=:faculty_images,gallery=:gallery,faculty_info=:faculty_info,question_faq=:question_faq,answer_faq=:answer_faq,package_name=:package_name,package_cost=:package_cost,package_start_date=:package_start_date,package_end_date=:package_end_date,package_info=:package_info,package_validity=:package_validity,package_other_detail=:package_other_detail,package_renewal=:package_renewal,package_invoice=:package_invoice WHERE id=:id');



        $this->db->bind(':school_image', $data['school_image']);
        $this->db->bind(':signatory_aadhar', $data['signatory_aadhar']);
        $this->db->bind(':auth_image', $data['auth_image']);
        $this->db->bind(':mou', $data['mou']);
        $this->db->bind(':nda', $data['nda']);
        $this->db->bind(':declaration_form', $data['declaration_form']);
        $this->db->bind(':other_document', $data['other_document']);
        $this->db->bind(':school_name', $data['school_name']);
        $this->db->bind(':school_contact_no', $data['school_contact_no']);
        $this->db->bind(':school_address', $data['school_address']);
        $this->db->bind(':school_type', $data['school_type']);
        $this->db->bind(':year_of_establishment', $data['year_of_establishment']);
        $this->db->bind(':recognized_by', $data['recognized_by']);
        $this->db->bind(':school_pin_code', $data['school_pin_code']);
        $this->db->bind(':school_city', $data['school_city']);
        $this->db->bind(':school_state', $data['school_state']);
        $this->db->bind(':legal_name', $data['legal_name']);
        $this->db->bind(':student_teacher_ratio', $data['student_teacher_ratio']);
        $this->db->bind(':accreditation_no', $data['accreditation_no']);
        $this->db->bind(':accredited_by', $data['accredited_by']);
        $this->db->bind(':registered_address', $data['registered_address']);
        $this->db->bind(':facility', $data['facility']);
        $this->db->bind(':facility_info', $data['facility_info']);
        $this->db->bind(':facility_images', $data['facility_images']);
        $this->db->bind(':extra_curricular_info', $data['extra_curricular_info']);
        $this->db->bind(':extra_curricular_images', $data['extra_curricular_images']);
        $this->db->bind(':academic_info', $data['academic_info']);
        $this->db->bind(':academic_images', $data['academic_images']);
        $this->db->bind(':website_link', $data['website_link']);
        $this->db->bind(':website_check', $data['website_check']);
        $this->db->bind(':school_info', $data['school_info']);
        $this->db->bind(':auth_name', $data['auth_name']);
        $this->db->bind(':auth_designation', $data['auth_designation']);
        $this->db->bind(':auth_aadhar_no', $data['auth_aadhar_no']);
        $this->db->bind(':auth_email', $data['auth_email']);
        $this->db->bind(':auth_contact_number', $data['auth_contact_number']);
        $this->db->bind(':auth_contact_person', $data['auth_contact_person']);
        $this->db->bind(':contact_person_designation', $data['contact_person_designation']);
        $this->db->bind(':contact_person_details', $data['contact_person_details']);
        $this->db->bind(':bank_name', $data['bank_name']);
        $this->db->bind(':account_no', $data['account_no']);
        $this->db->bind(':re_account_no', $data['re_account_no']);
        $this->db->bind(':school_name_as_per_bank', $data['school_name_as_per_bank']);
        $this->db->bind(':cancelled_cheque', $data['cancelled_cheque']);
        $this->db->bind(':ifsc', $data['ifsc']);
        $this->db->bind(':branch_name', $data['branch_name']);
        $this->db->bind(':mode_of_admission', $data['mode_of_admission']);
        $this->db->bind(':how_to_apply', $data['how_to_apply']);
        $this->db->bind(':scholastic', $data['scholastic']);
        $this->db->bind(':scholastic_info', $data['scholastic_info']);
        $this->db->bind(':coscholastic', $data['coscholastic']);
        $this->db->bind(':coscholastic_info', $data['coscholastic_info']);
        $this->db->bind(':achievement_info', $data['achievement_info']);
        $this->db->bind(':achievement_images', $data['achievement_images']);

        $this->db->bind(':admission_fee', $data['admission_fee']);
        $this->db->bind(':review_academic', $data['review_academic']);
        $this->db->bind(':review_faculty', $data['review_faculty']);
        $this->db->bind(':review_infra', $data['review_infra']);
        $this->db->bind(':review_nonacademic', $data['review_nonacademic']);
        $this->db->bind(':review_school', $data['review_school']);
        $this->db->bind(':faculty_images', $data['faculty_images']);
        $this->db->bind(':gallery', $data['gallery']);

        $this->db->bind(':faculty_info', $data['faculty_info']);
        $this->db->bind(':question_faq', $data['question_faq']);
        $this->db->bind(':answer_faq', $data['answer_faq']);
        $this->db->bind(':package_name', $data['package_name']);
        $this->db->bind(':package_cost', $data['package_cost']);
        $this->db->bind(':package_start_date', $data['package_start_date']);
        $this->db->bind(':package_end_date', $data['package_end_date']);
        $this->db->bind(':package_info', $data['package_info']);
        $this->db->bind(':package_validity', $data['package_validity']);
        $this->db->bind(':package_other_detail', $data['package_other_detail']);
        $this->db->bind(':package_renewal', $data['package_renewal']);
        $this->db->bind(':package_invoice', $data['package_invoice']);
        $this->db->bind(':id', $id);



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
    public function get_my_scholarship_application($id)
    {
        $this->db->query('SELECT * FROM scholarship_promo where scholarship_id in (select id from scholarship where offered_by=:id)');
        $this->db->bind(':id', $id);
        return $results = $this->db->resultSet();
    }

}
