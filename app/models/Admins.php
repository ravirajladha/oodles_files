<?php
class Admins
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function get_all_orders()
    {
        $this->db->query('SELECT * FROM orders ORDER BY id desc');
        $result = $this->db->resultSet();
        return $result;
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
    public function get_current_user_auth_by_id($id)
    {
        $this->db->query("SELECT * FROM auth where id= :id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_current_student($id)
    {
        $this->db->query('SELECT * FROM student WHERE student_id = :id');
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
    public function get_particular_quiz_result($id)
    {
        $this->db->query('SELECT * FROM quiz_result where category=:category ORDER BY id desc');
        $this->db->bind(':category', $id);
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_particular_quiz_result_by_user_id($id)
    {
        $this->db->query('SELECT * FROM quiz_result where category=:category AND user_id=:user_id ORDER BY id desc');
        $this->db->bind(':category', $id);
        $this->db->bind(':user_id', $_SESSION['rexkod_oodles_student_id']);
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_particular_quiz($id)
    {
        $this->db->query('SELECT * FROM quizes where category=:category ORDER BY id desc');
        $this->db->bind(':category', $id);
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_particular_quiz_result_for_quiz_id($id)
    {
        $get_quiz_detail = $this->get_all_quizes_id($id);
        $passing_per  = $get_quiz_detail->passing_per;
        // Due to error, accumulated_score desc was not working, so by the time coins earened was used to get the result in desc order
        // $this->db->query('SELECT * FROM quiz_result where quiz_id = :quiz_id order by accumulated_score desc');
        $this->db->query('SELECT * FROM quiz_result WHERE quiz_id = :quiz_id  and score_per >= :passing_per and pass=:pass ORDER BY CAST(accumulated_score AS UNSIGNED) desc');
        // $this->db->query('SELECT * FROM quiz_result where quiz_id = :quiz_id order by coins_earned desc');
        $this->db->bind(':quiz_id', $id);
        $this->db->bind(':pass', '1');
        $this->db->bind(':passing_per', intval($passing_per));
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_failed_contest_students($id)
    {
        $get_quiz_detail = $this->get_all_quizes_id($id);
        $passing_per  = $get_quiz_detail->passing_per;
        $this->db->query('SELECT * FROM quiz_result WHERE quiz_id = :quiz_id  and score_per < :passing_per ');
        // $this->db->query('SELECT * FROM quiz_result where quiz_id = :quiz_id order by coins_earned desc');
        $this->db->bind(':quiz_id', $id);
        $this->db->bind(':passing_per', floatval($passing_per));
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
        $result = $this->db->single();
        return $result;
    }
    public function get_single_student1($id)
    {
        $this->db->query('SELECT * FROM auth WHERE id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }

    public function get_all_students_cum_parents()
    {
        $this->db->query("SELECT * FROM auth WHERE type = 'student' OR type = 'parent' or type='representative'");
        // $this->db->bind(':type', 'student');
        return $result = $this->db->resultSet();
    }
    public function get_all_students_cum_parents_last_week()
    {
        $last_week = strtotime('-1 week');
        $this->db->query("SELECT * FROM auth WHERE (type = 'student' OR type = 'parent' OR type = 'representative') AND created_at >= :last_week");
        $this->db->bind(':last_week', $last_week);
        return $result = $this->db->resultSet();
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

    public function get_wallet_control()
    {
        $this->db->query("SELECT * FROM wallet_control where id=:id");
        $this->db->bind(':id', '1');
        return $result = $this->db->single();
    }
    public function find_all_order()
    {
        $this->db->query("SELECT * FROM orders where user_id = :id order by id DESC");
        $this->db->bind(':id', $_SESSION['user_id']);
        return $results = $this->db->resultSet();
    }

    public function update_wallet_control($data)
    {
        $this->db->query("UPDATE wallet_control SET points_reduction=:points_reduction, awarded_amount_addition=:awarded_amount_addition, referral_joinee=:referral_joinee,referral_joiner=:referral_joiner,bonus_coin_reduction_per=:bonus_coin_reduction_per where id=:id");
        $this->db->bind(':id', '1');
        $this->db->bind(':points_reduction', $data['points_reduction']);
        $this->db->bind(':awarded_amount_addition', $data['awarded_amount_addition']);
        $this->db->bind(':referral_joinee', $data['referral_joinee']);
        $this->db->bind(':referral_joiner', $data['referral_joiner']);
        $this->db->bind(':bonus_coin_reduction_per', $data['bonus_coin_reduction_per']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_interview_status($data)
    {
        $this->db->query("UPDATE scholarship_status_interview SET recording_disposition=:recording_disposition, recording_comments=:recording_comments, recording_file=:recording_file,recording_updated_by=:recording_updated_by,recording_updated_at=:recording_updated_at where id=:id");
        $this->db->bind(':id', $data['interview_id']);
        $this->db->bind(':recording_disposition', $data['recording_call_disposition']);
        $this->db->bind(':recording_comments', $data['recording_caller_comments']);
        $this->db->bind(':recording_file', $data['recording_call_file']);
        $this->db->bind(':recording_updated_by', $_SESSION['rexkod_oodles_admin_id']);
        $this->db->bind(':recording_updated_at', date('Y-m-d H:i:s'));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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
    public function create_faq($question, $answer)
    {
        $this->db->query('INSERT INTO faq (question,answer,created_by) VALUES(:question,:answer,:created_by)');
        // Bind values
        $this->db->bind(':question', $question);
        $this->db->bind(':answer', $answer);
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_admin_id']);

        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_all_faqs()
    {
        $this->db->query("SELECT * FROM faq order by id desc");
        return $results = $this->db->resultSet();
    }
    public function get_single_faq($id)
    {
        $this->db->query("SELECT * FROM faq where id=:id");
        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }

    public function get_all_deliveryUsers()
    {
        $this->db->query("SELECT * FROM auth where type = :type");

        $this->db->bind(':type', 'delivery');

        return $results = $this->db->resultSet();
    }

    public function get_auth_detail($id)
    {
        $this->db->query("SELECT * FROM auth where id = :id");

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
    public function update_faq($id, $question, $answer)
    {
        $this->db->query('UPDATE faq set question = :question, answer = :answer where id=:id');
        // Bind values
        $this->db->bind(':question', $question);
        $this->db->bind(':answer', $answer);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_market_place($data)
    {
        $this->db->query('UPDATE market_place set name=:name,price=:price,offer_price=:offer_price,description=:description,quantity=:quantity,image=:image where id=:id');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':offer_price', $data['offer_price']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':id', $data['id']);

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

    public function delete_student_from_auth($id)
    {
        $this->db->query("DELETE FROM auth WHERE id = :id");
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            // echo "auth deleted";
            // die();
            $this->db->query("DELETE FROM wallets WHERE user_id = :id");
            $this->db->bind(':id', $id);


            if ($this->db->execute()) {
                // echo "wallet_deleted";
                // die();
                $this->db->query("DELETE FROM transactions WHERE user_id = :id");
                $this->db->bind(':id', $id);
                if ($this->db->execute()) {
                    // echo "transaction_deleted";
                    // die();
                    $this->db->query("DELETE FROM quiz_result WHERE user_id = :id");
                    $this->db->bind(':id', $id);
                    if ($this->db->execute()) {
                        //     echo "quiz_result";
                        // die();
                        $this->db->query("DELETE FROM scholarship_application where student_id = :id");
                        $this->db->bind(':id', $id);
                        if ($this->db->execute()) {
                            //         echo "scholarship_application";
                            // die();
                            $this->db->query("DELETE FROM webinar_register WHERE user_id = :id");
                            $this->db->bind(':id', $id);
                            if ($this->db->execute()) {
                                //             echo "webinart_delted";
                                // die();
                                $this->db->query("DELETE FROM student WHERE student_id = :id");
                                $this->db->bind(':id', $id);

                                if ($this->db->execute()) {
                                    return true;
                                } else {
                                    return false;
                                }
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
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
        $this->db->query("UPDATE quiz_master set delete_flag=:status WHERE id = :id");

        $this->db->bind(':status', '0');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_contest_prize_in_result($quiz_id, $user_id, $amount)
    { {
            $this->db->query("UPDATE quiz_result set contest_amount=:contest_amount, contest_won=:contest_won WHERE quiz_id=:quiz_id and user_id=:user_id");

            $this->db->bind(':contest_won', '1');
            $this->db->bind(':contest_amount', $amount);
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':quiz_id', $quiz_id);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
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

    public function create_boards($name)
    {
        $this->db->query('INSERT INTO boards (name) VALUES (:name)');
        $this->db->bind(':name', $name);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_boards()
    {
        $this->db->query('SELECT * FROM boards');
        return $results = $this->db->resultSet();
    }

    public function get_ind_boards($id)
    {
        $this->db->query('SELECT * FROM boards where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }


    public function update_boards($id, $name)
    {
        $this->db->query('UPDATE boards set name=:name where id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function create_hobbies($name)
    {
        $this->db->query('INSERT INTO hobbies (name) VALUES (:name)');
        $this->db->bind(':name', $name);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_hobbies()
    {
        $this->db->query('SELECT * FROM hobbies');
        return $results = $this->db->resultSet();
    }

    public function get_ind_hobbies($id)
    {
        $this->db->query('SELECT * FROM hobbies where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }

    public function update_hobbies($id, $name)
    {
        $this->db->query('UPDATE hobbies set name=:name where id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function add_student($name, $email, $phone, $pass, $agree, $class)
    {
        $this->db->query('INSERT INTO auth (type, name, email, phone, password, status,class, created_at) VALUES(:type, :name, :email, :phone, :pass, :status,:class,:created_at)');
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
        $this->db->bind(':class', $class);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        if ($this->db->execute()) {
            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phone);
            $cur_user = $this->db->single();

            $this->db->query('INSERT INTO wallets (user_id,balance_amount,bonus_coins) VALUES(:userid,:balance,:bonus_coins)');
            $this->db->bind(':userid', $cur_user->id);
            $this->db->bind(':balance', 0);
            $this->db->bind(':bonus_coins', 500);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function add_quiz_first($data)
    {
        $this->db->query('INSERT INTO quizes (name,class_name,subject_name,category,created_by) VALUES (:name,:class_name,:subject_name,:category,:created_by)');
        $this->db->bind(':name', $data['quiz_name']);
        $this->db->bind(':class_name', $data['class']);
        $this->db->bind(':subject_name', $data['subject']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':created_by', $data['created_by']);
        if ($this->db->execute()) {
            //    $last_id =$this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function get_all_wallet()
    {

        $this->db->query("SELECT * FROM wallets ORDER BY wallet_id desc");
        return $results = $this->db->resultSet();
    }
    public function get_wallet_data()
    {

        $this->db->query("SELECT * FROM transactions ORDER BY datetime desc");
        return $results = $this->db->resultSet();
    }
    public function add_quiz_second($data, $quiz_id)
    {

        $this->db->query('UPDATE quizes SET start_date=:start_date,end_date=:end_date,start_time=:start_time,end_time=:end_time,remarks=:remarks,duration_min=:duration_min,duration_sec=:duration_sec,quiz_cost=:quiz_cost,image=:image,attempt=:attempt,quiz_audio=:quiz_audio,passing_per=:passing_per,coins_per_point1=:coins_per_point1,coins_per_point2=:coins_per_point2,coins_per_sec1 = :coins_per_sec1,user_limit=:user_limit,contest_prize=:contest_prize,prize_calc_data_id=:prize_calc_data_id,no_of_questions=:no_of_questions where id=:quiz_id');


        // Bind values
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':start_time', $data['start_time']);
        $this->db->bind(':end_time', $data['end_time']);
        $this->db->bind(':remarks', $data['remarks']);
        $this->db->bind(':duration_min', $data['quiz_duration_min']);
        $this->db->bind(':duration_sec', $data['quiz_duration_sec']);
        $this->db->bind(':quiz_cost', $data['quiz_cost']);
        // $this->db->bind(':school', $data['school']);
        $this->db->bind(':image', $data['quiz_file']);
        $this->db->bind(':attempt', $data['attempt']);
        $this->db->bind(':quiz_audio', $data['quiz_audio']);

        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':passing_per', $data['passing_per']);
        $this->db->bind(':coins_per_point1', $data['coins_per_point1']);
        $this->db->bind(':coins_per_point2', $data['coins_per_point2']);
        $this->db->bind(':coins_per_sec1', $data['coins_per_sec1']);
        $this->db->bind(':user_limit', $data['user_limit']);
        $this->db->bind(':contest_prize', $data['contest_prize']);
        $this->db->bind(':prize_calc_data_id', $data['prize_calc_data_id']);
        $this->db->bind(':no_of_questions', $data['no_of_questions']);
        // ========================================================

        if ($this->db->execute()) {
            //    $last_id =$this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }
    public function reschedule_contest_quiz($quiz_id, $start_date, $end_date, $start_time, $end_time, $quiz_duration_min, $quiz_duration_sec)
    {

        $this->db->query('UPDATE quizes SET start_date=:start_date,end_date=:end_date,start_time=:start_time,end_time=:end_time,duration_min=:quiz_duration_min,duration_sec=:quiz_duration_sec where id=:quiz_id');


        // Bind values
        $this->db->bind(':start_date', $start_date);
        $this->db->bind(':end_date', $end_date);
        $this->db->bind(':start_time', $start_time);
        $this->db->bind(':end_time', $end_time);
        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':quiz_duration_min', $quiz_duration_min);
        $this->db->bind(':quiz_duration_sec', $quiz_duration_sec);
        // ========================================================

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


    public function check_class_name($class)
    {
        $this->db->query('SELECT * FROM class where class_name LIKE :class_name');
        // Bind values
        $this->db->bind(':class_name', ucwords(strtolower($class)));

        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function check_subject_name($subject_name, $class)
    {
        $this->db->query('SELECT * FROM subject where subject_name LIKE :subject_name AND class LIKE :class');
        // Bind values
        $this->db->bind(':subject_name', ucwords(strtolower($subject_name)));
        $this->db->bind(':class', $class);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_chapter_name($chapter_name, $class, $subject)
    {
        $this->db->query('SELECT * FROM chapter where name LIKE :chapter_name AND class LIKE :class AND subject LIKE :subject');
        // Bind values
        $this->db->bind(':chapter_name', ucwords(strtolower($chapter_name)));
        $this->db->bind(':class', $class);
        $this->db->bind(':subject', $subject);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_topic_name($topic_name, $class, $subject, $chapter)
    {
        $this->db->query('SELECT * FROM topic where name =:topic_name AND class=:class AND subject=:subject AND chapter=:chapter');
        // Bind values
        $this->db->bind(':topic_name', ucwords(strtolower($topic_name)));
        $this->db->bind(':class', $class);
        $this->db->bind(':subject', $subject);
        $this->db->bind(':chapter', $chapter);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_subject($subject_name, $class)
    {
        $this->db->query('INSERT INTO subject (subject_name,class) VALUES(:subject_name,:class)');
        // Bind values
        $this->db->bind(':subject_name', ucwords(strtolower($subject_name)));
        $this->db->bind(':class', $class);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_subject($subject_name, $id, $class)
    {
        $this->db->query('UPDATE subject set subject_name=:subject_name, class=:class where id=:id');
        // Bind values

        $this->db->bind(':id', $id);
        $this->db->bind(':class', $class);
        $this->db->bind(':subject_name', ucwords(strtolower($subject_name)));
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function add_chapter($data)
    {
        $this->db->query('INSERT INTO chapter (name,subject,class,resource,map) VALUES(:chapter,:subject_name,:class,:resource,:map)');
        // Bind values
        $this->db->bind(':chapter', ucwords(strtolower($data['chapter'])));
        $this->db->bind(':subject_name', $data['subject_name']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':resource', $data['quiz_resource']);
        $this->db->bind(':map', $data['quiz_map']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_chapter($data, $id)
    {
        $this->db->query('UPDATE chapter SET name=:chapter,resource=:resource,map=:map where id=:id');
        // Bind values
        $this->db->bind(':chapter', ucwords(strtolower($data['chapter'])));
        $this->db->bind(':resource', $data['quiz_resource']);
        $this->db->bind(':map', $data['quiz_map']);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_topic($data, $id)
    {
        $this->db->query('UPDATE topic SET name=:topic where id=:id');
        // Bind values
        $this->db->bind(':topic', ucwords(strtolower($data['topic'])));

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function add_topic($data)
    {
        $this->db->query('INSERT INTO topic (name,chapter,subject,class) VALUES(:name,:chapter,:subject,:class)');
        // Bind values
        $this->db->bind(':name', ucwords(strtolower($data['topic'])));
        $this->db->bind(':chapter', $data['chapter']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':class', $data['class']);
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
    public function add_subscription($data)
    {
        $this->db->query('INSERT INTO subscription (name,price,offer_price,validity,coins_offered,btn_on_enable,btn_on_disable,content,image,status,package_id) VALUES(:name,:price,:offer_price,:validity,:coins_offered,:btn_on_enable,:btn_on_disable,:content,:image,:status,:package_id)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':offer_price', $data['offer_price']);
        $this->db->bind(':validity', $data['validity']);
        $this->db->bind(':coins_offered', $data['coins_offered']);
        $this->db->bind(':btn_on_enable', $data['btn_on_enable']);
        $this->db->bind(':btn_on_disable', $data['btn_on_disable']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':status', $data['status']);

        $this->db->bind(':package_id', $data['package_id']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function create_subscription_plans_for_school($data)
    {
        $this->db->query('INSERT INTO school_plan (name,no_of_teacher,no_of_quiz,status) VALUES(:name,:no_of_teacher,:no_of_quiz,:status)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':no_of_teacher', $data['no_of_teacher']);
        $this->db->bind(':no_of_quiz', $data['no_of_quiz']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function assign_subscription_plans_to_school($data)
    {
        $this->db->query('INSERT INTO premium_school_data (plan,school,start_date,end_date,amount,status,created_at) VALUES(:plan,:school,:start_date,:end_date,:amount,:status,now())');
        // Bind values
        $this->db->bind(':plan', $data['plan']);
        $this->db->bind(':school', $data['school']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':status', $data['status']);


        if ($this->db->execute()) {
            $plan_id = $data['plan'];
            $school_plan_detail = $this->get_selected_school_plan($plan_id);
            $this->db->query('INSERT INTO school_wallet (school_id,teacher_balance,quiz_balance) VALUES(:school,:teacher_balance,:quiz_balance)');
            // Bind values
            $this->db->bind(':school', $data['school']);
            $this->db->bind(':teacher_balance', $school_plan_detail->no_of_teacher);
            $this->db->bind(':quiz_balance', $school_plan_detail->no_of_quiz);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function renewal_subscription_plans_to_school($data)
    {
        $this->db->query('UPDATE premium_school_data set status=:status where school=:school');
        $this->db->bind(':school', $data['school']);
        $this->db->bind(':status', '0');



        if ($this->db->execute()) {
            $this->db->query('INSERT INTO premium_school_data (plan,school,start_date,end_date,amount,status,created_at) VALUES(:plan,:school,:start_date,:end_date,:amount,:status,now())');
            // Bind values
            $this->db->bind(':plan', $data['plan']);
            $this->db->bind(':school', $data['school']);
            $this->db->bind(':start_date', $data['start_date']);
            $this->db->bind(':end_date', $data['end_date']);
            $this->db->bind(':amount', $data['amount']);
            $this->db->bind(':status', '1');
            if ($this->db->execute()) {

                $plan_id = $data['plan'];
                $school_plan_detail = $this->get_selected_school_plan($plan_id);
                $school_id = $data['school'];
                $get_school_wallet  = $this->get_school_wallet($school_id);
                $get_teacher_balance = $get_school_wallet->teacher_balance;
                $get_quiz_balance = $get_school_wallet->quiz_balance;
                $new_quiz_balance = $get_quiz_balance + $school_plan_detail->no_of_quiz;
                $new_teacher_balance = $get_teacher_balance + $school_plan_detail->no_of_teacher;

                $this->db->query('UPDATE school_wallet set teacher_balance=:teacher_balance,quiz_balance=:quiz_balance where school_id=:school');
                // Bind values
                $this->db->bind(':school', $data['school']);
                $this->db->bind(':teacher_balance', $new_teacher_balance);
                $this->db->bind(':quiz_balance', $new_quiz_balance);

                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function change_school_wallet_status($school_id, $status)
    {
        $this->db->query('UPDATE school_wallet set status=:status where school_id=:school_id');
        $this->db->bind(':status', $status);
        $this->db->bind(':school_id', $school_id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_all_school_wallet()
    {
        $this->db->query('SELECT * from school_wallet order by id desc');

        return  $row = $this->db->resultSet();
    }
    public function get_all_scholarship_type()
    {
        $this->db->query('SELECT * from scholarship_type order by id desc');

        return  $row = $this->db->resultSet();
    }
    public function get_single_scholarship_type($id)
    {
        $this->db->query('SELECT * from scholarship_type where id=:id');
        $this->db->bind(':id', $id);

        return  $row = $this->db->single();
    }
    public function get_school_wallet($school_id)
    {
        $this->db->query('SELECT * from school_wallet where school_id=:school');
        $this->db->bind(':school', $school_id);
        return  $row = $this->db->single();
    }
    public function check_existing_subscription_plan_for_school($school_id)
    {
        $this->db->query('SELECT * from premium_school_data where school=:school');
        $this->db->bind(':school', $school_id);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function edit_assigned_subscription_plans_to_school($data)
    {
        $this->db->query('UPDATE premium_school_data SET plan=:plan,start_date=:start_date,end_date=:end_date,amount=:amount,status=:status,created_at=now()');
        // Bind values
        $this->db->bind(':plan', $data['plan']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':status', $data['status']);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_assigned_plans_to_school($id)
    {
        $this->db->query('DELETE  FROM  premium_school_data where id=:id');
        // Bind values
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function update_subscription_plans_for_school($data)
    {
        $this->db->query('UPDATE school_plan SET name=:name,no_of_teacher=:no_of_teacher,no_of_quiz=:no_of_quiz,status=:status where id=:id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':no_of_teacher', $data['no_of_teacher']);
        $this->db->bind(':no_of_quiz', $data['no_of_quiz']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_all_school_plan()
    {
        $this->db->query('SELECT * FROM school_plan order by id desc');
        return $this->db->resultSet();
    }
    public function get_selected_school_plan($id)
    {
        $this->db->query('SELECT * FROM school_plan where id=:id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }
    public function update_subscription($data)
    {
        $this->db->query('UPDATE subscription SET name=:name,price=:price,offer_price=:offer_price,validity=:validity,coins_offered=:coins_offered,btn_on_enable=:btn_on_enable,btn_on_disable=:btn_on_disable,content=:content,image=:image,status=:status,package_id = :package_id WHERE id=:id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':offer_price', $data['offer_price']);
        $this->db->bind(':validity', $data['validity']);
        $this->db->bind(':coins_offered', $data['coins_offered']);
        $this->db->bind(':btn_on_enable', $data['btn_on_enable']);
        $this->db->bind(':btn_on_disable', $data['btn_on_disable']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':package_id', $data['package_id']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function get_all_subscription_plan()
    {
        $this->db->query('SELECT * FROM subscription ');

        return $this->db->resultSet();
    }
    public function get_ind_subscription($id)
    {
        $this->db->query('SELECT * FROM subscription where id=:id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    public function getWallet($student_id)
    {
        $this->db->query('SELECT * FROM wallets WHERE user_id = :userid');
        $this->db->bind(':userid', $student_id);
        return $this->db->single();
    }

    public function add_money($student_id, $amount)
    {
        $wallet = $this->getWallet($student_id);
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount) + $amount;

        $this->db->query('UPDATE wallets SET balance_amount = :balance WHERE user_id = :id');
        // Bind values

        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $student_id);

        // Execute


        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, amount,type, wallet_balance) VALUES(:userid, :txnid, :amount, :type,:wallet_balance)');

            $this->db->bind(':userid', $student_id);
            $this->db->bind(':txnid', 'credited_by_admin');
            $this->db->bind(':amount', $amount);
            $this->db->bind(':type', '2');
            $this->db->bind(':wallet_balance', $balance);


            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function add_bonus_coins($student_id, $amount)
    {
        $wallet = $this->getWallet($student_id);
        $balance_amount = $wallet->bonus_coins;
        $balance = intval($balance_amount) + $amount;

        $this->db->query('UPDATE wallets SET bonus_coins = :balance WHERE user_id = :id');
        // Bind values

        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $student_id);

        // Execute


        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, bonus_coins,type,wallet_balance) VALUES(:userid, :txnid, :amount, :type,:wallet_balance)');

            $this->db->bind(':userid', $student_id);
            $this->db->bind(':txnid', 'credited_by_admin');
            $this->db->bind(':amount', $amount);
            $this->db->bind(':type', '2');
            $this->db->bind(':wallet_balance', $balance);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function get_all_teacher()
    {
        $this->db->query('SELECT * from auth where type=:type');
        $this->db->bind(':type', "teacher");
        return $results = $this->db->resultSet();
    }

    public function get_single_teacher($id)
    {
        $this->db->query('SELECT * from teacher where teacher_id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_all_teacher_for_school($id)
    {
        $this->db->query('SELECT * from teacher where school=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->resultSet();
    }

    public function add_question($data)
    {
        $this->db->query('INSERT INTO quiz_master (chapter,topic,question,option1,option2,option3,option4,answer,question_img,option1_img,option2_img,option3_img,option4_img,explanation,explanation_img,subject,class,score,created_by,status) VALUES(:chapter,:topic,:question,:option1,:option2,:option3,:option4,:answer,:question_img,:option1_img_file,:option2_img_file,:option3_img_file,:option4_img_file,:explanation,:explanation_img,:subject,:class,:score,:created_by,:status)');
        // Bind values
        //   echo   $data['option1_img_file'];
        //     die();
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
        $this->db->bind(':status', $data['status']);
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
    public function publish_quiz($quiz_id)
    {
        $this->db->query('UPDATE quizes SET publish=:publish WHERE id=:id');

        // Bind values
        $this->db->bind(':publish', '1');
        $this->db->bind(':id', $quiz_id);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function publish_prize_pool($id)
    {
        $this->db->query('UPDATE contest_prize_calculations SET publish=:publish WHERE id=:id');

        // Bind values
        $this->db->bind(':publish', '1');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_quiz_master_status($id, $status)
    {
        $this->db->query('UPDATE quiz_master SET status=:status where id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function add_criteria($criteria_name, $criteria_type, $yes_no_based, $start_date, $end_date, $start_range, $end_range, $class)
    {
        $this->db->query('INSERT INTO criteria (criteria_name, criteria_type,yes_no_based,start_date,end_date,start_range,end_range,class) VALUES(:criteria_name, :criteria_type,:yes_no_based,:start_date,:end_date,:start_range,:end_range,:class)');
        // Bind values
        $this->db->bind(':criteria_name', $criteria_name);
        // $this->db->bind(':category_id', $category_id);
        $this->db->bind(':criteria_type', $criteria_type);
        $this->db->bind(':yes_no_based', $yes_no_based,);
        $this->db->bind(':start_date', $start_date);
        $this->db->bind(':end_date', $end_date);
        $this->db->bind(':start_range', $start_range);
        $this->db->bind(':end_range', $end_range);
        $this->db->bind(':class', $class);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // public function add_document($document_name, $category_id, $expiry_date, $class)
    // {
    //     $this->db->query('INSERT INTO scholarship_doc (name, category_id,expiry_date,class) VALUES(:document_name, :category_id,:expiry_date,:class)');
    //     $this->db->bind(':document_name', $document_name);
    //     $this->db->bind(':category_id', $category_id);
    //     $this->db->bind(':expiry_date', $expiry_date);
    //     $this->db->bind(':class', $class);

    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

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
    public function get_subject_through_class($class)
    {
        $this->db->query('SELECT * FROM subject where class=:class');
        $this->db->bind(':class', $class);

        return $results = $this->db->resultset();
    }
    public function get_single_school_subject($id)
    {
        $this->db->query('SELECT * FROM subject where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_single_class($id)
    {
        $this->db->query('SELECT * FROM class where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_single_subject($id)
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
    public function get_single_topic($id)
    {
        $this->db->query('SELECT * FROM topic where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }

    public function get_all_chapter()
    {
        $this->db->query('SELECT * FROM chapter');
        return $results = $this->db->resultset();
    }
    public function get_all_topic()
    {
        $this->db->query('SELECT * FROM topic');
        return $results = $this->db->resultset();
    }
    public function get_subject_from_class($id)
    {

        if ($id == 0) {
            $this->db->query('SELECT * FROM subject');
            return $results = $this->db->resultset();
        } else {
            $this->db->query('SELECT * FROM subject where class = :class');
            $this->db->bind(':class', $id);
            return $results = $this->db->resultset();
        }
    }
    public function get_subject_from_quiz_category($category)
    {
        $this->db->query("SELECT distinct subject_name from quizes where category=:category ");
        $this->db->bind(':category', $category);
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
    public function get_subadmin_scholarship()
    {
        $this->db->query('SELECT * FROM scholarship where subadmin=:subadmin ORDER BY id desc');
        $this->db->bind(':subadmin', $_SESSION['rexkod_oodles_admin_id']);

        return $results = $this->db->resultset();
    }

    public function get_single_scholarship($id)
    {
        $this->db->query('SELECT * FROM scholarship where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->resultset();
    }
    public function get_ind_scholarship($id)
    {
        $this->db->query('SELECT * FROM scholarship where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
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
    public function get_all_active_class()
    {
        $this->db->query('SELECT * FROM class where status=:status');
        $this->db->bind(':status', '1');
        return $results = $this->db->resultset();
    }
    public function get_active_faqs()
    {
        $this->db->query('SELECT * FROM faq where status=:status');
        $this->db->bind(':status', '1');
        return $results = $this->db->resultset();
    }


    public function get_all_quiz_master()
    {


        $this->db->query('SELECT * FROM quiz_master where delete_flag=:delete_flag');
        $this->db->bind(':delete_flag', '1');

        return $results = $this->db->resultset();
    }

    // public function get_selected_quiz_master($id)
    // {

    //     $this->db->query('SELECT * FROM quiz_master FULL OUTER JOIN quizes ON quiz_master.subject = quizes.subject_name FULL OUTER JOIN quizes ON  quiz_master.class = quizes.class_name WHERE quizes.id = :id');
    //     $this->db->bind(':id', $id);
    //     return $results = $this->db->resultset();
    // }

    // public function get_selected_question($subject, $class, $chapter)
    // {
    //     if (($subject == 0) && ($class == 0)) {
    //         $this->db->query('SELECT * from quiz_master');
    //         $this->db->bind(':chapter', $chapter);
    //     } elseif ($class == 0) {
    //         $this->db->query('SELECT * from quiz_master where subject = :subject AND chapter=:chapter');
    //         $this->db->bind(':subject', $subject);
    //         $this->db->bind(':chapter', $chapter);
    //     } elseif ($subject == 0) {
    //         $this->db->query('SELECT * from quiz_master where  class=:class AND chapter=:chapter');
    //         $this->db->bind(':class', $class);
    //         $this->db->bind(':chapter', $chapter);
    //     } else {
    //         $this->db->query('SELECT * from quiz_master where ((subject = :subject AND class=:class) OR (subject=0 OR class=0)) AND chapter=:chapter');
    //         $this->db->bind(':subject', $subject);
    //         $this->db->bind(':class', $class);
    //         $this->db->bind(':chapter', $chapter);
    //     }
    //     return $results = $this->db->resultset();
    // }
    public function get_selected_question($chapter)
    {
        $this->db->query('SELECT * from quiz_master where chapter=:chapter AND delete_flag=:delete_flag');
        $this->db->bind(':delete_flag', '1');
        $this->db->bind(':chapter', $chapter);
        return $results = $this->db->resultset();
    }
    public function get_selected_question_for_teacher($chapter, $school)
    {
        $this->db->query('SELECT * from quiz_master where chapter=:chapter AND status=:status AND created_by IN (SELECT teacher_id from teacher where school=:school)');
        $this->db->bind(':status', '1');
        $this->db->bind(':chapter', $chapter);
        $this->db->bind(':school', $school);
        return $results = $this->db->resultset();
    }

    public function get_all_questions_for_chapter($chapter)
    {
        $this->db->query('SELECT * from quiz_master where chapter=:chapter AND status=:status ');
        $this->db->bind(':status', '1');
        $this->db->bind(':chapter', $chapter);

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
            // $new_question = $question;
            // if return false, gives error inthe future, just comment out the above line. Only this it not return false anytime
            // The query will be true, if the quetion is repeated added.
            return false;
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
    public function update_class_status($class_id, $status)
    {
        $this->db->query('UPDATE class SET status=:status where id=:id');
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $class_id);
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
        $this->db->query('SELECT * FROM quizes');
        return $results = $this->db->resultset();
    }
    
    public function get_all_quiz_by_filter($data)
    {
        $this->db->query('SELECT * FROM quiz_master where subject=:subject AND class=:class AND topic=:topic AND chapter=:chapter AND delete_flag=:delete_flag AND status=:status');
        $this->db->bind(':status', '1');
        $this->db->bind(':delete_flag', '1');
        $this->db->bind(':chapter', $data['chapter']);
        $this->db->bind(':topic', $data['topic']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':subject', $data['subject']);
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
    public function get_inactive_quiz_master()
    {
        $this->db->query('SELECT * FROM quiz_master where status=:status ');
        $this->db->bind(':status', '0');
        return $results = $this->db->resultSet();
    }
    public function get_rejected_pending_quiz_master()
    {
        $this->db->query("SELECT * FROM quiz_master where (status='0' or status='2') ");
        // $this->db->bind(':status', '0');
        return $results = $this->db->resultSet();
    }
    public function get_rejected_pending_quiz_master_of_subadmin()
    {
        $this->db->query("SELECT * FROM quiz_master where (status='0' or status='2') and created_by='100' ");
        // $this->db->bind(':status', '0');
        return $results = $this->db->resultSet();
    }

    public function get_all_criteria()
    {
        $this->db->query('SELECT * FROM criteria');
        return $results = $this->db->resultset();
    }
    public function get_scholarship_crieria_by_class($class_id)
    {
        $this->db->query('SELECT * FROM criteria where class=:class');
        $this->db->bind(':class', $class_id);

        return $results = $this->db->resultset();
    }
    public function get_scholarship_document_by_class($class_id)
    {
        $this->db->query('SELECT * FROM scholarship_doc where class=:class');
        $this->db->bind(':class', $class_id);
        return $results = $this->db->resultset();
    }
    public function get_active_scholarship_doc()
    {
        $this->db->query('SELECT * FROM scholarship_doc where status=:status');
        $this->db->bind(':status', 1);
        return $results = $this->db->resultset();
    }

    public function get_all_document()
    {
        $this->db->query('SELECT * FROM scholarship_doc');
        return $results = $this->db->resultset();
    }
    public function get_all_scholarship_promotions()
    {
        $this->db->query('SELECT * FROM scholarship_promo order by id desc');
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
    public function get_selected_scholarship_application($id)
    {
        $this->db->query('SELECT * FROM scholarship_application where scholarship_id=:scholarship_id');
        $this->db->bind(':scholarship_id', $id);
        return $results = $this->db->resultset();
    }
    public function obtain_scholarship_application_selection_sorted_by_creator($id)
    {
        $this->db->query('SELECT * FROM scholarship_application where scholarship_id=:scholarship_id order by application_createdat');
        $this->db->bind(':scholarship_id', $id);
        return $results = $this->db->resultset();
    }
    public function get_single_scholarship_application($application_id)
    {
        $this->db->query('SELECT * FROM scholarship_application where id=:id');
        $this->db->bind(':id', $application_id);
        return $results = $this->db->single();
    }
    public function get_single_default_scholarship_status($status_id)
    {
        $this->db->query('SELECT * FROM default_scholarship_status where id=:id');
        $this->db->bind(':id', $status_id);
        return $results = $this->db->single();
    }
    public function get_all_default_scholarship_status()
    {
        $this->db->query('SELECT * FROM default_scholarship_status');

        return $results = $this->db->resultSet();
    }


    public function update_scholarship_status($id, $status, $auth_id)
    {


        $this->db->query('UPDATE scholarship_application set status = :status WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        if ($id == 0) {
            $this->db->bind(':applied_at', date("Y-m-d h:i:sa"));
            $this->db->bind(':applied_at', date("Y-m-d h:i:sa"));
        } else {
            $this->db->bind(':applied_at', date("Y-m-d h:i:sa"));
        }
        if ($id == 1) {
            $this->db->bind(':processed_at', date("Y-m-d h:i:sa"));
        } else {
            $this->db->bind(':processed_at', date("Y-m-d h:i:sa"));
        }

        if ($id == 2) {
            $this->db->bind(':granted_at', date("Y-m-d h:i:sa"));
        } else {
            $this->db->bind(':granted_at', date("Y-m-d h:i:sa"));
        }
        if ($id == 3) {
            $this->db->bind(':rejected_at', date("Y-m-d h:i:sa"));
        } else {
            $this->db->bind(':rejected_at', date("Y-m-d h:i:sa"));
        }


        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function update_scholarship_current_status($application_id, $status, $message)
    {


        $this->db->query('UPDATE scholarship_application set status = :status, message=:message, status_updated_at=:status_updated_at WHERE id = :id');
        $this->db->bind(':id', $application_id);
        $this->db->bind(':status', $status);
        $this->db->bind(':message', $message);
        $this->db->bind(':status_updated_at', date("Y-m-d h:i:sa"));
        // Bind values

        if ($this->db->execute()) {
            $this->db->query('INSERT INTO scholarship_status (application_id,status,message,created_by,created_at) VALUES (:application_id, :status, :message, :created_by,:created_at)');

            $this->db->bind(':application_id', $application_id);
            $this->db->bind(':status', $status);
            $this->db->bind(':message', $message);
            $this->db->bind(':created_by', $_SESSION['rexkod_oodles_admin_id']);
            $this->db->bind(':created_at', date("Y-m-d h:i:sa"));


            if ($this->db->execute()) {

                return true;
            } else {
                return false;
            }
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
    public function add_college_elements($data, $pass)
    {
        $this->db->query('INSERT INTO auth (type,name,email,phone,password)  VALUES (:type,:name,:email,:phone,:password)');
        $this->db->bind(':type', "college");
        $this->db->bind(':name', $data['auth_signature']);
        $this->db->bind(':email', $data['auth_email']);
        $this->db->bind(':phone', $data['auth_contact_number']);
        $this->db->bind(':password', $pass);

        if ($this->db->execute()) {

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $data['auth_contact_number']);
            $cur_user = $this->db->single();
            $college_id = $cur_user->id;

            $this->db->query('INSERT INTO college (college_id,college_name,college_contact_no,college_address,college_type,year_of_establishment,recognized_by,college_pin_code,college_city,state,legal_name,accreditation_no,accredited_by,registered_address,facility,website_link,website_check,college_info,college_course,auth_signature,auth_designation,auth_aadhar_no,auth_email,auth_contact_number,auth_contact_person,contact_person_designation,contact_person_details,bank_name,account_no,re_account_no,ifsc,branch_name,college_name_as_per_bank,cancelled_cheque,course_offered,mode_of_admission,how_to_apply,admission_criteria,entrance_exam,review_academic,review_accomodation,review_faculty,review_infra,review_placement,review_social,review_course,review_campus,placement,placement_images,gallery,scholarship,cut_off_marks,faculty,faculty_images,hostel,hostel_images,question_faq,answer_faq,alumni,alumni_images,college_image,mou,nda,declaration_form,signatory_aadhar,other_document,auth_image,package_name,package_cost,package_start_date,package_end_date,package_description,package_validity,package_other_detail,package_renewal,package_invoice) VALUES (:college_id,:college_name,:college_contact_no,:college_address,:college_type,:year_of_establishment,:recognized_by,:college_pin_code,:college_city,:state,:legal_name,:accreditation_no,:accredited_by,:registered_address,:facility,:website_link,:website_check,:college_info,:college_course,:auth_signature,:auth_designation,:auth_aadhar_no,:auth_email,:auth_contact_number,:auth_contact_person,:contact_person_designation,:contact_person_details,:bank_name,:account_no,:re_account_no,:ifsc,:branch_name,:college_name_as_per_bank,:cancelled_cheque,:course_offered,:mode_of_admission,:how_to_apply,:admission_criteria,:entrance_exam,:review_academic,:review_accomodation,:review_faculty,:review_infra,:review_placement,:review_social,:review_course,:review_campus,:placement,:placement_images,:gallery,:scholarship,:cut_off_marks,:faculty,:faculty_images,:hostel,:hostel_images,:question_faq,:answer_faq,:alumni,:alumni_images,:college_image,:mou,:nda,:declaration_form,:signatory_aadhar,:other_document,:auth_image,:package_name,:package_cost,:package_start_date,:package_end_date,:package_description,:package_validity,:package_other_detail,:package_renewal,:package_invoice)');



            $this->db->bind(':college_id', $college_id);
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

                $this->db->query('INSERT INTO wallets (user_id,balance_amount) VALUES(:userid,:balance)');
                $this->db->bind(':userid', $college_id);
                $this->db->bind(':balance', 0);
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
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

    public function get_all_corporate()
    {
        $this->db->query('SELECT * FROM corporate');
        return $results = $this->db->resultSet();
    }
    public function get_corporate_detail($id)
    {
        $this->db->query('SELECT * FROM corporate where corporate_id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function add_corporate_elements($data, $pass)
    {
       
        $this->db->query('INSERT INTO auth (type,name,email,phone,password)  VALUES (:type,:name,:email,:phone,:password)');
        $this->db->bind(':type', "corporate");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $pass);

        if ($this->db->execute()) {

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $data['phone']);
            $cur_user = $this->db->single();
            $corporate_id = $cur_user->id;


            $this->db->query('INSERT INTO corporate (corporate_id,entity_type,name,description,organization,trust_type,trust_name,address_1,address_2,pincode,city,state,url,auth_name,auth_designation,auth_aadhar_no,auth_email,auth_contact_number,auth_contact_person,contact_person_designation,contact_person_details,bank_name,ifsc,branch_name,account_no,re_account_no,corporate_name_as_per_bank,image,mou,nda,declaration_form,signatory_aadhar,other_document,auth_image,cancelled_cheque,website_check) VALUES (:corporate_id,:entity_type,:name,:description,:organization,:trust_type,:trust_name,:address_1,:address_2,:pincode,:city,:state,:url,:auth_name,:auth_designation,:auth_aadhar_no,:auth_email,:auth_contact_number,:auth_contact_person,:contact_person_designation,:contact_person_details,:bank_name,:ifsc,:branch_name,:account_no,:re_account_no,:corporate_name_as_per_bank,:image,:mou,:nda,:declaration_form,:signatory_aadhar,:other_document,:auth_image,:cancelled_cheque,:website_check)');
            $this->db->bind(':corporate_id', $corporate_id);
            $this->db->bind(':entity_type', $data['entity_type']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':organization', $data['organization']);
            $this->db->bind(':trust_type', $data['trust_type']);
            $this->db->bind(':trust_name', $data['trust_name']);
            $this->db->bind(':address_1', $data['address_1']);
            $this->db->bind(':address_2', $data['address_2']);
            $this->db->bind(':pincode', $data['pincode']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':state', $data['state']);
            $this->db->bind(':url', $data['url']);
            $this->db->bind(':auth_name', $data['auth_name']);
         
            $this->db->bind(':auth_designation', $data['auth_designation']);
            $this->db->bind(':auth_aadhar_no', $data['auth_aadhar_no']);
            $this->db->bind(':auth_email', $data['email']);
            $this->db->bind(':auth_contact_number', $data['phone']);
            $this->db->bind(':auth_contact_person', $data['auth_contact_person']);
            $this->db->bind(':contact_person_designation', $data['contact_person_designation']);
            $this->db->bind(':contact_person_details', $data['contact_person_details']);
            $this->db->bind(':bank_name', $data['bank_name']);
            $this->db->bind(':ifsc', $data['ifsc']);
            $this->db->bind(':branch_name', $data['branch_name']);
            $this->db->bind(':account_no', $data['account_no']);
            $this->db->bind(':re_account_no', $data['re_account_no']);
            $this->db->bind(':corporate_name_as_per_bank', $data['corporate_name_as_per_bank']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':mou', $data['mou']);
            $this->db->bind(':nda', $data['nda']);
            $this->db->bind(':declaration_form', $data['declaration_form']);
            $this->db->bind(':signatory_aadhar', $data['signatory_aadhar']);
            $this->db->bind(':other_document', $data['other_document']);
            $this->db->bind(':auth_image', $data['auth_image']);
            $this->db->bind(':cancelled_cheque', $data['cancelled_cheque']);
            $this->db->bind(':website_check', $data['website_check']);
            
            if ($this->db->execute()) {

                $this->db->query('INSERT INTO wallets (user_id,balance_amount) VALUES(:userid,:balance)');
                $this->db->bind(':userid', $corporate_id);
                $this->db->bind(':balance', 0);
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function update_corporate_elements($data,$id)
    {
      
        $this->db->query('UPDATE corporate SET entity_type=:entity_type,name=:name,description=:description,organization=:organization,trust_type=:trust_type,trust_name=:trust_name,address_1=:address_1,address_2=:address_2,pincode=:pincode,city=:city,state=:state,url=:url,auth_name=:auth_name,auth_designation=:auth_designation,auth_aadhar_no=:auth_aadhar_no,auth_email=:auth_email,auth_contact_number=:auth_contact_number,contact_person_designation=:contact_person_designation,auth_contact_person=:auth_contact_person,contact_person_details=:contact_person_details,bank_name=:bank_name,ifsc=:ifsc,branch_name=:branch_name,account_no=:account_no,re_account_no=:re_account_no,corporate_name_as_per_bank=:corporate_name_as_per_bank,image=:image,mou=:mou,nda=:nda,declaration_form=:declaration_form,signatory_aadhar=:signatory_aadhar,other_document=:other_document,auth_image=:auth_image,cancelled_cheque=:cancelled_cheque,website_check=:website_check WHERE corporate_id=:corporate_id');

            $this->db->bind(':corporate_id', $id);
            $this->db->bind(':entity_type', $data['entity_type']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':organization', $data['organization']);
            $this->db->bind(':trust_type', $data['trust_type']);
            $this->db->bind(':trust_name', $data['trust_name']);
            $this->db->bind(':address_1', $data['address_1']);
            $this->db->bind(':address_2', $data['address_2']);
            $this->db->bind(':pincode', $data['pincode']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':state', $data['state']);
            $this->db->bind(':url', $data['url']);
            $this->db->bind(':auth_name', $data['auth_name']);
       
            $this->db->bind(':auth_designation', $data['auth_designation']);
            $this->db->bind(':auth_aadhar_no', $data['auth_aadhar_no']);
            $this->db->bind(':auth_email', $data['email']);
            $this->db->bind(':auth_contact_number', $data['phone']);
            $this->db->bind(':auth_contact_person', $data['auth_contact_person']);
            $this->db->bind(':contact_person_designation', $data['contact_person_designation']);
            $this->db->bind(':contact_person_details', $data['contact_person_details']);
            $this->db->bind(':bank_name', $data['bank_name']);
            $this->db->bind(':ifsc', $data['ifsc']);
            $this->db->bind(':branch_name', $data['branch_name']);
            $this->db->bind(':account_no', $data['account_no']);
            $this->db->bind(':re_account_no', $data['re_account_no']);
            $this->db->bind(':corporate_name_as_per_bank', $data['corporate_name_as_per_bank']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':mou', $data['mou']);
            $this->db->bind(':nda', $data['nda']);
            $this->db->bind(':declaration_form', $data['declaration_form']);
            $this->db->bind(':signatory_aadhar', $data['signatory_aadhar']);
            $this->db->bind(':other_document', $data['other_document']);
            $this->db->bind(':auth_image', $data['auth_image']);
            $this->db->bind(':cancelled_cheque', $data['cancelled_cheque']);
            $this->db->bind(':website_check', $data['website_check']);
       
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
      
    
    public function add_subadmin_elements($data)
    {
        $this->db->query('INSERT INTO auth (type,name,email,phone,password,image)  VALUES (:type,:name,:email,:phone,:password,:image)');
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':image', $data['image']);


        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function update_subadmin_elements($data)
    {
        $this->db->query('UPDATE  auth SET type=:type,name=:name,email=:email,phone=:phone,password=:password,image=:image where id=:id');
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':id', $data['id']);


        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function update_auth_user($name,$email,$phone,$password,$id)
    {
        $this->db->query('UPDATE  auth SET name=:name,email=:email,phone=:phone,password=:password where id=:id');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':password', $password);
        $this->db->bind(':id', $id);


        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function update_student_balance($user_id, $balance, $txnid, $quiz_id)
    {
        $this->db->query('SELECT * FROM wallets WHERE user_id = :userid');
        $this->db->bind(':userid', $user_id);
        $user_detail = $this->db->single();
        $current_award_balance  = $user_detail->awarded_amount + $balance;
        // echo $current_award_balance;
        // die(); 
        $this->db->query('UPDATE wallets set awarded_amount=:awarded_amount where user_id=:user_id');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':awarded_amount', $current_award_balance);
        if ($this->db->execute()) {
            $this->db->query('INSERT INTO transactions (user_id, transaction_id, awarded_amount,type,awarded_wallet_balance,quiz_id) VALUES(:userid, :txnid, :amount, :type,:wallet_balance,:quiz_id)');

            $this->db->bind(':userid', $user_id);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $balance);
            $this->db->bind(':quiz_id', $quiz_id);
            $this->db->bind(':type', '16');
            $this->db->bind(':wallet_balance', $current_award_balance);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            // echo 'false';
            // die();

            return false;
        }
    }



    public function update_quiz_disperse_detail($quiz_id, $disperse, $user_id_data, $amount_data, $total_amount, $student_count)
    {

        $this->db->query('UPDATE quizes set disperse=:disperse,dispersed_user_id=:dispersed_user_id,dispersed_amount=:dispersed_amount,dispersed_at=:dispersed_at,total_amount_dispersed=:total_amount_dispersed,student_count=:student_count  where id=:id');
        $this->db->bind(':id', $quiz_id);
        $this->db->bind(':disperse', $disperse);
        $this->db->bind(':dispersed_user_id', $user_id_data);
        $this->db->bind(':dispersed_amount', $amount_data);
        $this->db->bind(':total_amount_dispersed', $total_amount);
        $this->db->bind(':student_count', $student_count);
        $this->db->bind(':dispersed_at', date('Y-m-d H:i:s'));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function add_school_elements($data, $pass)
    {
        $this->db->query('INSERT INTO auth (type,name,email,phone,password)  VALUES (:type,:name,:email,:phone,:password)');
        $this->db->bind(':type', "school");
        $this->db->bind(':name', $data['auth_name']);
        $this->db->bind(':email', $data['auth_email']);
        $this->db->bind(':phone', $data['auth_contact_number']);
        $this->db->bind(':password', $pass);

        if ($this->db->execute()) {

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $data['auth_contact_number']);
            $cur_user = $this->db->single();
            $school_id = $cur_user->id;

            $this->db->query('INSERT INTO school (school_id,school_image,signatory_aadhar,auth_image,mou,nda,declaration_form,other_document,school_name,school_contact_no,school_address,school_type,year_of_establishment,recognized_by,school_pin_code,school_city,school_state,legal_name,student_teacher_ratio,accreditation_no,accredited_by,registered_address,facility,facility_info,facility_images,extra_curricular_info,extra_curricular_images,academic_info,academic_images,website_link,website_check,school_info,auth_name,auth_designation,auth_aadhar_no,auth_email,auth_contact_number,auth_contact_person,contact_person_designation,contact_person_details,bank_name,account_no,re_account_no,school_name_as_per_bank,cancelled_cheque,ifsc,branch_name,mode_of_admission,how_to_apply,scholastic,scholastic_info,coscholastic,coscholastic_info,achievement_info,achievement_images,admission_fee,review_academic,review_faculty,review_infra,review_nonacademic,review_school,faculty_images,gallery,faculty_info,question_faq,answer_faq,package_name,package_cost,package_start_date,package_end_date,package_info,package_validity,package_other_detail,package_renewal,package_invoice,category) VALUES (:school_id,:school_image,:signatory_aadhar,:auth_image,:mou,:nda,:declaration_form,:other_document,:school_name,:school_contact_no,:school_address,:school_type,:year_of_establishment,:recognized_by,:school_pin_code,:school_city,:school_state,:legal_name,:student_teacher_ratio,:accreditation_no,:accredited_by,:registered_address,:facility,:facility_info,:facility_images,:extra_curricular_info,:extra_curricular_images,:academic_info,:academic_images,:website_link,:website_check,:school_info,:auth_name,:auth_designation,:auth_aadhar_no,:auth_email,:auth_contact_number,:auth_contact_person,:contact_person_designation,:contact_person_details,:bank_name,:account_no,:re_account_no,:school_name_as_per_bank,:cancelled_cheque,:ifsc,:branch_name,:mode_of_admission,:how_to_apply,:scholastic,:scholastic_info,:coscholastic,:coscholastic_info,:achievement_info,:achievement_images,:admission_fee,:review_academic,:review_faculty,:review_infra,:review_nonacademic,:review_school,:faculty_images,:gallery,:faculty_info,:question_faq,:answer_faq,:package_name,:package_cost,:package_start_date,:package_end_date,:package_info,:package_validity,:package_other_detail,:package_renewal,:package_invoice,:category)');



            $this->db->bind(':school_id', $school_id);
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
            $this->db->bind(':category', $data['category']);


            if ($this->db->execute()) {

                $this->db->query('INSERT INTO wallets (user_id,balance_amount) VALUES(:userid,:balance)');
                $this->db->bind(':userid', $school_id);
                $this->db->bind(':balance', 0);
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function update_school_elements($data, $id)
    {

        $this->db->query('UPDATE school set school_image=:school_image,signatory_aadhar=:signatory_aadhar,auth_image=:auth_image,mou=:mou,nda=:nda,declaration_form=:declaration_form,other_document=:other_document,school_name=:school_name,school_contact_no=:school_contact_no,school_address=:school_address,school_type=:school_type,year_of_establishment=:year_of_establishment,recognized_by=:recognized_by,school_pin_code=:school_pin_code,school_city=:school_city,school_state=:school_state,legal_name=:legal_name,student_teacher_ratio=:student_teacher_ratio,accreditation_no=:accreditation_no,accredited_by=:accredited_by,registered_address=:registered_address,facility=:facility,facility_info=:facility_info,facility_images=:facility_images,extra_curricular_info=:extra_curricular_info,extra_curricular_images=:extra_curricular_images,academic_info=:academic_info,academic_images=:academic_images,website_link=:website_link,website_check=:website_check,school_info=:school_info,auth_name=:auth_name,auth_designation=:auth_designation,auth_aadhar_no=:auth_aadhar_no,auth_email=:auth_email,auth_contact_number=:auth_contact_number,auth_contact_person=:auth_contact_person,contact_person_designation=:contact_person_designation,contact_person_details=:contact_person_details,bank_name=:bank_name,account_no=:account_no,re_account_no=:re_account_no,school_name_as_per_bank=:school_name_as_per_bank,cancelled_cheque=:cancelled_cheque,ifsc=:ifsc,branch_name=:branch_name,mode_of_admission=:mode_of_admission,how_to_apply=:how_to_apply,scholastic=:scholastic,scholastic_info=:scholastic_info,coscholastic=:coscholastic,coscholastic_info=:coscholastic_info,achievement_info=:achievement_info,achievement_images=:achievement_images,admission_fee=:admission_fee,review_academic=:review_academic,review_faculty=:review_faculty,review_infra=:review_infra,review_nonacademic=:review_nonacademic,review_school=:review_school,faculty_images=:faculty_images,gallery=:gallery,faculty_info=:faculty_info,question_faq=:question_faq,answer_faq=:answer_faq,package_name=:package_name,package_cost=:package_cost,package_start_date=:package_start_date,package_end_date=:package_end_date,package_info=:package_info,package_validity=:package_validity,package_other_detail=:package_other_detail,package_renewal=:package_renewal,package_invoice=:package_invoice, category=:category WHERE id=:id');



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
        $this->db->bind(':category', $data['category']);
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

    public function delete_home_enquiry($id)
    {
        $this->db->query('DELETE  FROM  comment_home where id=:id');
        // Bind values
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function delete_csr_enquiry($id)
    {
        $this->db->query('DELETE  FROM  enquiry where id=:id');
        // Bind values
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
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
        $this->db->query('INSERT INTO scholarship_type (scholarship_type,scholarship_image,created_by)  VALUES (:scholarship_type,:scholarship_type_image,:created_by)');
        $this->db->bind(':scholarship_type', $scholarship_type);
        $this->db->bind(':scholarship_type_image', $scholarship_type_image);
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_admin_id']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_scholarship_type($id, $scholarship_type, $scholarship_type_image)
    {
        $this->db->query('UPDATE scholarship_type  SET scholarship_type=:scholarship_type,scholarship_image=:scholarship_type_image,created_by=:created_by where id=:id');
        $this->db->bind(':scholarship_type', $scholarship_type);
        $this->db->bind(':scholarship_type_image', $scholarship_type_image);
        $this->db->bind(':id', $id);
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_admin_id']);


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
    public function get_school_from_category($id)
    {
        $this->db->query("SELECT * FROM school where category=:category");
        $this->db->bind(':category', $id);
        return $results = $this->db->resultSet();
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
    public function get_active_scholarship_type()
    {
        $this->db->query("SELECT * FROM scholarship_type where status=:status");
        $this->db->bind(':status', 1);

        return $results = $this->db->resultSet();
    }
    public function get_all_schortlisted_students($scholarship_id)
    {
        $this->db->query("SELECT * FROM scholarship_application where scholarship_id=:scholarship_id and status=:status");
        $this->db->bind(':status', 4);
        $this->db->bind(':scholarship_id', $scholarship_id);

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
    public function  change_teacher_status($status, $id)
    {
        $this->db->query('UPDATE auth set status=:status where id=:teacher_id');
        $this->db->bind(':status', $status);
        $this->db->bind(':teacher_id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function create_teacher($data, $pass)
    {
        $this->db->query('INSERT INTO auth (type,name,email,phone,password)  VALUES (:type,:name,:email,:phone,:password)');
        $this->db->bind(':type', "teacher");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $pass);

        if ($this->db->execute()) {

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $data['phone']);
            $cur_user = $this->db->single();
            $teacher_id = $cur_user->id;
            // echo $teacher_id;
            // echo $data['school'];


            $this->db->query('INSERT INTO teacher (teacher_id,school,class,subject) VALUES (:teacher_id,:school,:class,:subject)');
            $this->db->bind(':teacher_id', $teacher_id);
            $this->db->bind(':school', $_SESSION['rexkod_oodles_school_id']);
            $this->db->bind(':class', $data['class']);
            $this->db->bind(':subject', $data['subject']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function empty_column_in_student($id)
    {
        $this->db->query('  SELECT (IF(`f_name` IS  NULL,1,0) + IF(`l_name` IS  NULL,1,0) + IF(`phone_no` IS  NULL,1,0) + IF(`whatsapp_no` IS  NULL,1,0) +IF(`dob` IS  NULL,1,0)+IF(`aadhar` IS  NULL,1,0)+IF(`gender` IS  NULL,1,0)+IF(`comm_state` IS  NULL,1,0)+IF(`religion` IS  NULL,1,0)+IF(`category` IS  NULL,1,0)+IF(`father_name` IS  NULL,1,0)+IF(`f_aadhar` IS  NULL,1,0)+IF(`f_phone` IS  NULL,1,0)+IF(`father_aadhar_doc` IS  NULL,1,0)+IF(`mother_name` IS  NULL,1,0)+IF(`m_aadhar` IS  NULL,1,0)+IF(`m_phone` IS  NULL,1,0)+IF(`mother_aadhar_doc` IS  NULL,1,0)+IF(`siblings` IS  NULL,1,0)+IF(`course` IS  NULL,1,0)+IF(`academic_name` IS  NULL,1,0)++IF(`annual_income` IS  NULL,1,0)+IF(`physically` IS  NULL,1,0)+IF(`student_image` IS  NULL,1,0)+IF(`comm_address` IS  NULL,1,0)+IF(`comm_village` IS  NULL,1,0)+IF(`comm_block` IS  NULL,1,0)+IF(`comm_pin_code` IS  NULL,1,0)+IF(`perm_address` IS  NULL,1,0)+IF(`perm_village` IS  NULL,1,0)+IF(`perm_block` IS  NULL,1,0)+IF(`perm_state` IS  NULL,1,0)+IF(`perm_pin_code` IS  NULL,1,0)+IF(`account_no` IS  NULL,1,0)+IF(`re_account_no` IS  NULL,1,0)+IF(`ifsc_code` IS  NULL,1,0)+IF(`bank_name` IS  NULL,1,0)+IF(`bank_branch` IS  NULL,1,0)+IF(`name_as_per_bank` IS  NULL,1,0)+IF(`admission_toggle` IS  NULL,1,0)+IF(`institute_city` IS  NULL,1,0)+IF(`institute_state` IS  NULL,1,0)+IF(`total_fees` IS  NULL,1,0)+IF(`course_span` IS  NULL,1,0)+IF(`identity_proof` IS  NULL,1,0)+IF(`address_proof` IS  NULL,1,0)+IF(`passbook_statement` IS  NULL,1,0)+IF(`academic_type` IS  NULL,1,0))  as cnt from student where student_id=:user_id');


        $this->db->bind(':user_id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_school_detail()
    {
        $this->db->query("SELECT * FROM school");
        return $results = $this->db->resultSet();
    }
    public function get_unsubscribed_school()
    {
        $this->db->query("SELECT * FROM school where id  NOT IN (SELECT school from premium_school_data)");
        return $results = $this->db->resultSet();
    }
    public function get_premium_school_data()
    {
        $this->db->query("SELECT * FROM premium_school_data ORDER BY id desc");
        return $results = $this->db->resultSet();
    }
    public function get_premium_school_single_data($id)
    {
        $this->db->query("SELECT * FROM premium_school_data where id=:id");
        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }
    public function get_school_detail_single($id)
    {
        $this->db->query("SELECT * FROM school where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->resultSet();
    }
    public function get_school_detail_single_name($id)
    {
        $this->db->query("SELECT * FROM school where school_id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_school_detail_ind($id)
    {
        $this->db->query("SELECT * FROM school where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_ind_school($id)
    {
        $this->db->query("SELECT * FROM school where school_id=:id");
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
    public function check_duplicate_question($question)
    {
        $this->db->query("SELECT * FROM quiz_master where question LIKE concat(" % ", :question, " % ")");
        $this->db->bind(':question', $question);
        return $results = $this->db->resultSet();
    }
    public function upload_bulk_question()
    {
        if (isset($_POST['importSubmit'])) {
            // echo "true";
            // die();

            // Allowed mime types
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

            // Validate whether selected file is a CSV file
            if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

                // If the file is uploaded
                if (is_uploaded_file($_FILES['file']['tmp_name'])) {

                    // Open uploaded CSV file with read-only mode
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

                    // Skip the first line
                    fgetcsv($csvFile);

                    // Parse line from CSV file line by line
                    while (($line = fgetcsv($csvFile)) !== FALSE) {
                        // Get row line
                        if (!isset($line[0])) {
                            $item0 = Null;
                        } else {
                            $item0 = $line[0];
                        }
                        if (!isset($line[1])) {
                            $item1 = Null;
                        } else {
                            $item1 = $line[1];
                        }
                        if (!isset($line[2])) {
                            $item2 = Null;
                        } else {
                            $item2 = $line[2];
                        }
                        if (!isset($line[3])) {
                            $item3 = Null;
                        } else {
                            $item3 = $line[3];
                        }
                        if (!isset($line[4])) {
                            $item4 = Null;
                        } else {
                            $item4 = $line[4];
                        }
                        if (!isset($line[5])) {
                            $item5 = Null;
                        } else {
                            $item5 = $line[5];
                        }
                        if (!isset($line[6])) {
                            $item6 = Null;
                        } else {
                            $item6 = $line[6];
                        }
                        if (!isset($line[7])) {
                            $item7 = Null;
                        } else {
                            $item7 = $line[7];
                        }
                        if (!isset($line[8])) {
                            $item8 = Null;
                        } else {
                            $item8 = $line[8];
                        }
                        if (!isset($line[9])) {
                            $item9 = Null;
                        } else {
                            $item9 = $line[9];
                        }
                        if (!isset($line[10])) {
                            $item10 = Null;
                        } else {
                            $item10 = $line[10];
                        }
                        // $duplicate = $this->check_duplicate_question($item0);
                        // $count = 0;
                        // foreach($duplicate as $dup){
                        //     $count++;
                        // }
                        // && ($count==0)
                        if (($item7 != Null) &&  ($item8 != Null) && ($item9 != Null) && ($item10 != Null)) {


                            // Insert member line in the linebase
                            $this->db->query("INSERT into quiz_master(question, option1, option2, option3, option4, answer, explanation, subject,class,chapter,topic,created_by,status) values(:question, :option1, :option2, :option3, :option4, :answer, :explanation, :subject,:class,:chapter,:topic,:created_by,:status)");

                            $this->db->bind(':question', $item0);
                            $this->db->bind(':option1', $item1);
                            $this->db->bind(':option2', $item2);
                            $this->db->bind(':option3', $item3);
                            $this->db->bind(':option4', $item4);
                            $this->db->bind(':answer', $item5);
                            $this->db->bind(':explanation', $item6);
                            $this->db->bind(':subject', $item7);
                            $this->db->bind(':class', $item8);
                            $this->db->bind(':chapter', $item9);
                            $this->db->bind(':topic', $item10);
                            $this->db->bind(':created_by', '1');
                            if ($_SESSION['rexkod_oodles_admin_id'] == 1) {
                                $this->db->bind(':status', '1');
                            } else {
                                $this->db->bind(':status', '0');
                            }
                        }

                        $this->db->execute();
                    }


                    fclose($csvFile);
                }
                return true;
            } else {
                return false;
            }
        }
    }
    public function create_scholarship_promo($data)
    {
        $this->db->query('INSERT INTO scholarship_promo (name,file,url,start_date,end_date,scholarship_id) VALUES(:name,:file,:url,:start_date,:end_date,:scholarship_id)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':file', $data['file']);
        $this->db->bind(':url', $data['url']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':scholarship_id', $data['scholarship_id']);

        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_scholarship_promo_status($id, $status)
    {


        $this->db->query('UPDATE scholarship_promo set status = :status WHERE id = :id');
        // Bind values
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_market_place_status($id, $status)
    {


        $this->db->query('UPDATE market_place set status = :status WHERE id = :id');
        // Bind values
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_faq_status($id, $status)
    {


        $this->db->query('UPDATE faq set status = :status WHERE id = :id');
        // Bind values
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_scholarship_criteria_and_document($scholarship_id, $criteria, $document)
    {
        // echo $scholarship_id;
        // echo"<br>";
        //  echo gettype($criteria);
        //  echo"<br>";

        //  echo $document;
        //  die();

        $this->db->query('UPDATE scholarship set criteria = :criteria, documents_required=:document WHERE id = :id');
        // Bind values
        $this->db->bind(':criteria', $criteria);
        $this->db->bind(':document', $document);
        $this->db->bind(':id', $scholarship_id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_student_subscription($id, $status)
    {


        $this->db->query('UPDATE subscription set status = :status WHERE id = :id');
        // Bind values
        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_corporate_by_scholarship($id)
    {
        $this->db->query('SELECT * FROM corporate where corporate_id in (select offered_by from scholarship where id=:id)');
        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }


    public function get_all_quizes_id($id)
    {
        $this->db->query('SELECT * FROM quizes WHERE id = :id');
        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }
    public function contest_pool_amount_store($data, $levels_data)
    {
        $token = mt_rand(1000000000, 9999999999);
        $this->db->query('INSERT INTO contest_prize_calculations (token,no_of_participants, entry_fee, total_amount_collected, expenses, total_expenses, prize_pool_amount, no_of_winners_percentage, total_no_of_winners, total_no_of_levels, levels_data,created_by) VALUES(:token,:no_of_participants, :entry_fee, :total_amount_collected, :expenses, :total_expenses, :prize_pool_amount, :no_of_winners_percentage, :total_no_of_winners, :total_no_of_levels, :levels_data,:created_by)');
        // Bind values
        $this->db->bind(':token', $token);

        $this->db->bind(':no_of_participants', $data['no_of_participants']);
        $this->db->bind(':entry_fee', $data['entry_fee']);
        $this->db->bind(':total_amount_collected', $data['total_amount_collected']);
        $this->db->bind(':expenses', $data['expenses']);
        $this->db->bind(':total_expenses', $data['total_expenses']);
        $this->db->bind(':prize_pool_amount', $data['prize_pool_amount']);
        $this->db->bind(':no_of_winners_percentage', $data['no_of_winners_percentage']);
        $this->db->bind(':total_no_of_winners', $data['total_no_of_winners']);
        $this->db->bind(':total_no_of_levels', $data['total_no_of_levels']);

        $this->db->bind(':levels_data', $levels_data);
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_admin_id']);


        // Execute
        if ($this->db->execute()) {
            $this->db->query('SELECT id FROM contest_prize_calculations WHERE token = :token');
            $this->db->bind(':token', $token);
            $result = $this->db->single();
            return $result->id;
        } else {
            // echo "falase";
            // die();
            return false;
        }
    }

    public function get_contest_pool_used($id)
    {
        $this->db->query('SELECT * FROM quizes WHERE prize_calc_data_id = :prize_calc_data_id');
        $this->db->bind(':prize_calc_data_id', $id);

        return $results = $this->db->resultSet();
    }
    public function get_contest_by_id($id)
    {
        $this->db->query("SELECT * FROM contest_prize_calculations where id=:id");
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }


    public function update_contest_pool($id, $data, $levels_data)
    {

        $this->db->query("UPDATE contest_prize_calculations SET no_of_participants=:no_of_participants,entry_fee=:entry_fee,total_amount_collected=:total_amount_collected,
        expenses=:expenses,total_expenses=:total_expenses,prize_pool_amount=:prize_pool_amount,no_of_winners_percentage=:no_of_winners_percentage,total_no_of_winners=:total_no_of_winners,
        total_no_of_levels=:total_no_of_levels,levels_data=:levels_data WHERE id=:id");

        // $this->db->query('INSERT INTO contest_prize_calculations (no_of_participants, entry_fee, total_amount_collected, expenses, total_expenses, prize_pool_amount, no_of_winners_percentage, total_no_of_winners, total_no_of_levels, levels_data) 
        // VALUES(:no_of_participants, :entry_fee, :total_amount_collected, :expenses, :total_expenses, :prize_pool_amount, :no_of_winners_percentage, :total_no_of_winners, :total_no_of_levels, :levels_data)');
        // Bind values
        $this->db->bind(':no_of_participants', $data['no_of_participants']);
        $this->db->bind(':entry_fee', $data['entry_fee']);
        $this->db->bind(':total_amount_collected', $data['total_amount_collected']);
        $this->db->bind(':expenses', $data['expenses']);
        $this->db->bind(':total_expenses', $data['total_expenses']);
        $this->db->bind(':prize_pool_amount', $data['prize_pool_amount']);
        $this->db->bind(':no_of_winners_percentage', $data['no_of_winners_percentage']);
        $this->db->bind(':total_no_of_winners', $data['total_no_of_winners']);
        $this->db->bind(':total_no_of_levels', $data['total_no_of_levels']);
        $this->db->bind(':id', $id);

        $this->db->bind(':levels_data', $levels_data);


        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_prize_pool_calculations()
    {
        $this->db->query("SELECT * FROM prize_pool_calculations");
        return $results = $this->db->resultSet();
    }

    public function get_all_contest_prize_calculations()
    {
        $this->db->query("SELECT * FROM contest_prize_calculations");
        return $results = $this->db->resultSet();
    }
    public function get_all_published_contest_prize_calculations()
    {
        $this->db->query("SELECT * FROM contest_prize_calculations where publish=:publish");
        $this->db->bind(':publish', 1);

        return $results = $this->db->resultSet();
    }


    public function get_prize_pool_calculation($id)
    {
        $this->db->query("SELECT * FROM prize_pool_calculations  where id=:id");
        $this->db->bind(':id', $id);


        return $results = $this->db->single();
    }
    public function get_contest_prize_calculations($id)
    {

        $this->db->query("SELECT * FROM contest_prize_calculations  where id=:id");
        $this->db->bind(':id', $id);


        return $results = $this->db->single();
    }
    // ============================== SCHOLARSHIP STATUS ===================================
    public function add_scholarship_status_interview($data)
    {
        $this->db->query('INSERT INTO scholarship_status_interview (student_id, application_id,scholarship_id,interview_levels,interview_date, interview_time, interview_comments, interview_phone_number, created_at) VALUES(:student_id, :application_id, :scholarship_id, :interview_levels, :interview_date, :interview_time, :interview_comments, :interview_phone_number, :created_at)');
        // Bind values
        $this->db->bind(':student_id', $data['student_id']);
        $this->db->bind(':application_id', $data['application_id']);
        $this->db->bind(':scholarship_id', $data['scholarship_id']);
        $this->db->bind(':interview_levels', $data['interview_levels']);
        $this->db->bind(':interview_date', $data['interview_date']);
        $this->db->bind(':interview_time', $data['interview_time']);
        $this->db->bind(':interview_comments', $data['interview_comments']);
        $this->db->bind(':interview_phone_number', $data['interview_phone_number']);

        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function add_scholarship_document_status($data)
    {
        $this->db->query('INSERT INTO scholarship_doc_status (application_id, doc_id,status,comment,created_by, created_at,created_by_type) VALUES(:application_id,:doc_id,:status,:comment,:created_by,:created_at,:created_by_type)');
        // Bind values
        if (isset($_SESSION['rexkod_oodles_admin_id'])) {
            $session_id   = $_SESSION['rexkod_oodles_admin_id'];
        } else {
            $session_id = 0;
        }
        $this->db->bind(':application_id', $data['application_id']);
        $this->db->bind(':doc_id', $data['doc_id']);
        $this->db->bind(':status', $data['document_status']);
        $this->db->bind(':comment', $data['document_comment']);
        $this->db->bind(':created_by', $session_id);
        $this->db->bind(':created_by_type',  $data['type']);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_last_scholarship_document_status($application_id, $doc_id)
    {

        $this->db->query('SELECT * from  scholarship_doc_status  where application_id=:application_id and doc_id=:doc_id order by id desc limit 1');
        // Bind values

        $this->db->bind(':application_id', $application_id);
        $this->db->bind(':doc_id', $doc_id);

        // Execute

        return $results = $this->db->single();
    }
    public function get_last_scholarship_document_status_by_type($application_id, $doc_id, $created_by_type)
    {

        $this->db->query('SELECT * from  scholarship_doc_status  where application_id=:application_id and doc_id=:doc_id and created_by_type=:created_by_type order by id desc limit 1');
        // Bind values

        $this->db->bind(':application_id', $application_id);
        $this->db->bind(':doc_id', $doc_id);
        $this->db->bind(':created_by_type', $created_by_type);

        // Execute

        return $results = $this->db->single();
    }


    public function get_scholarship_status_interview($id)
    {
        $this->db->query("SELECT * FROM scholarship_status_interview  where application_id=:application_id");
        $this->db->bind(':application_id', $id);

        return $results = $this->db->resultSet();
    }
    public function get_scholarship_document_status($id)
    {
        $this->db->query("SELECT * FROM scholarship_doc_status where application_id=:application_id");
        $this->db->bind(':application_id', $id);

        return $results = $this->db->resultSet();
    }

    public function add_scholarship_status_operations($data)
    {

        // print_r($data);
        // // echo $data['application_id'];
        // die;

        $this->db->query('INSERT INTO scholarship_status_operations (student_id, application_id,scholarship_id,operations_title,operations_date, operations_time, created_at) VALUES(:student_id, :application_id, :scholarship_id, :operations_title, :operations_date, :operations_time, :created_at)');
        // Bind values
        $this->db->bind(':student_id', $data['student_id']);
        $this->db->bind(':application_id', $data['application_id']);
        $this->db->bind(':scholarship_id', $data['scholarship_id']);
        $this->db->bind(':operations_title', $data['operations_title']);

        $this->db->bind(':operations_date', $data['operations_date']);
        $this->db->bind(':operations_time', $data['operations_time']);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function get_scholarship_status_operations($id)
    {
        $this->db->query("SELECT * FROM scholarship_status_operations  where application_id=:application_id");
        $this->db->bind(':application_id', $id);

        return $results = $this->db->resultSet();
    }

    public function delete_scholarship_status_operations($id)
    {
        $this->db->query('DELETE  FROM  scholarship_status_operations where id=:id');
        // Bind values
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function delete_prize_pool($id)
    {
        $this->db->query('DELETE  FROM  contest_prize_calculations where id=:id');
        // Bind values
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }



    public function add_scholarship_status_recordings($data)
    {

        //     print_r($data);
        // // echo $data['application_id'];
        // die;

        $this->db->query('INSERT INTO scholarship_status_recordings (student_id, application_id,scholarship_id,recording_title,recording_caller_name, recording_caller_purpose, recording_call_disposition, recording_caller_comments, recording_call_file, created_at) VALUES(:student_id, :application_id, :scholarship_id, :recording_title, :recording_caller_name, :recording_caller_purpose, :recording_call_disposition, :recording_caller_comments, :recording_call_file, :created_at)');
        // Bind values
        $this->db->bind(':student_id', $data['student_id']);
        $this->db->bind(':application_id', $data['application_id']);
        $this->db->bind(':scholarship_id', $data['scholarship_id']);

        $this->db->bind(':recording_title', $data['recording_title']);
        $this->db->bind(':recording_caller_name', $data['recording_caller_name']);
        $this->db->bind(':recording_caller_purpose', $data['recording_caller_purpose']);
        $this->db->bind(':recording_call_disposition', $data['recording_call_disposition']);
        $this->db->bind(':recording_caller_comments', $data['recording_caller_comments']);
        $this->db->bind(':recording_call_file', $data['recording_call_file']);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function get_single_subadmin($id)
    {
        $this->db->query("SELECT * FROM auth  where (type='subadmin_quiz' or  type='subadmin_scholarship') and id=:id");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }
    public function get_single_corporate_from_auth($id)
    {
        $this->db->query("SELECT * FROM auth  where (type='corporate') and id=:id");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }
    public function get_all_subadmin()
    {
        $this->db->query("SELECT * FROM auth  where type='subadmin_quiz' or  type='subadmin_scholarship'");


        return $results = $this->db->resultSet();
    }
    public function get_all_subadmin_scholarship()
    {
        $this->db->query("SELECT * FROM auth  where  type='subadmin_scholarship'");
        return $results = $this->db->resultSet();
    }
    public function get_all_subadmin_quiz()
    {
        $this->db->query("SELECT * FROM auth  where  type='subadmin_quiz'");
        return $results = $this->db->resultSet();
    }
    public function get_scholarship_status_recordings($id)
    {
        $this->db->query("SELECT * FROM scholarship_status_recordings  where application_id=:application_id");
        $this->db->bind(':application_id', $id);

        return $results = $this->db->resultSet();
    }
    public function get_scholarship_status($id)
    {
        $this->db->query("SELECT * FROM scholarship_status  where application_id=:application_id ");
        $this->db->bind(':application_id', $id);

        return $results = $this->db->resultSet();
    }
    public function get_all_unparticipated_student($quiz_id)
    {
        $this->db->query("SELECT * FROM contest_reg  where quiz_id=:quiz_id and status=:status");
        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':status', '0');
        return $results = $this->db->resultSet();
    }



    public function generate_quiz_to_view($quiz_id)
    {
        $this->db->query("UPDATE quizes SET  generate=:generate where id=:id");

        $this->db->bind(':id', $quiz_id);
        $this->db->bind(':generate', 1);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_contest_registration($quiz_id)
    {

        $this->db->query('SELECT * FROM contest_reg where quiz_id = :quiz_id');
        $this->db->bind(':quiz_id', $quiz_id);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_quiz_result_studentwise($student_id, $quiz_id)
    {
        $this->db->query('SELECT * FROM quiz_result where quiz_id=:quiz_id AND user_id = :user_id ');
        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':user_id', $student_id);
        $result = $this->db->single();
        return $result;
    }

    public function submit_quiz_result_for_unparticipated($student_id, $quiz_id)
    {

        $this->db->query('INSERT INTO quiz_result (user_id,user_answer,score,quiz_id,score_per,time_taken,time_balance,category,pass,accumulated_score) values (:user_id,:user_answer,:score,:quiz_id,:score_per,:time_taken,:time_balance,:category,:pass,:accumulated_score)');
        $this->db->bind(':user_id', $student_id);
        $this->db->bind(':user_answer', Null);
        $this->db->bind(':score', 0);
        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':score_per', 0);
        $this->db->bind(':time_taken', 0);
        $this->db->bind(':time_balance', 0);
        $this->db->bind(':category', Null);
        $this->db->bind(':pass', 0);
        $this->db->bind(':accumulated_score', 0);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_criteria($id, $criteria_name, $criteria_type, $yes_no_based, $start_date, $end_date, $start_range, $end_range, $class)
    {
        $this->db->query('UPDATE criteria SET criteria_name=:criteria_name, criteria_type=:criteria_type, yes_no_based =:yes_no_based,start_date=:start_date,end_date=:end_date,start_range=:start_range,end_range=:end_range,class=:class WHERE id=:id');
        // Bind values
        $this->db->bind(':criteria_name', $criteria_name);
        // $this->db->bind(':category_id', $category_id);
        $this->db->bind(':criteria_type', $criteria_type);
        $this->db->bind(':yes_no_based', $yes_no_based,);
        $this->db->bind(':start_date', $start_date);
        $this->db->bind(':end_date', $end_date);
        $this->db->bind(':start_range', $start_range);
        $this->db->bind(':end_range', $end_range);
        $this->db->bind(':class', $class);
        $this->db->bind(':id', $id);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function add_document($document_name, $expiry_date)
    {
        $this->db->query('INSERT INTO scholarship_doc (name,expiry_date) VALUES(:document_name,:expiry_date)');
        $this->db->bind(':document_name', $document_name);
        // $this->db->bind(':category_id', $category_id);
        $this->db->bind(':expiry_date', $expiry_date);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_document_status($id, $status)
    {
        # code...
        $this->db->query('UPDATE scholarship_doc SET status =:status WHERE id =:id ');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_document_by_id($id)
    {
        $this->db->query('SELECT * FROM scholarship_doc where id =:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function update_document($id, $document_name, $expiry_date)
    {
        # code...
        $this->db->query('UPDATE scholarship_doc SET name=:document_name,expiry_date=:expiry_date WHERE id= :id');
        $this->db->bind(':document_name', $document_name);
        // $this->db->bind(':category_id', $category_id);
        $this->db->bind(':expiry_date', $expiry_date);

        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_criteria_status($id, $status)
    {
        # code...
        $this->db->query('UPDATE criteria SET status =:status WHERE id =:id ');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_subadmin_status($id, $status)
    {
        # code...
        $this->db->query('UPDATE auth SET status =:status WHERE id =:id ');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_scholarship_data($id)
    {
        $this->db->query("SELECT * FROM scholarship where id=:id");
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }




    // ---------------------
    public function update_scholarship_status2($id, $status)
    {
        # code...
        $this->db->query('UPDATE scholarship SET status =:status WHERE id =:id ');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_scholarship_type_status($id, $status)
    {
        # code...
        $this->db->query('UPDATE scholarship_type SET status =:status WHERE id =:id ');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_scholarship_featured($id, $featured)
    {
        # code...
        $this->db->query('UPDATE scholarship SET featured =:featured WHERE id =:id ');
        $this->db->bind(':id', $id);
        $this->db->bind(':featured', $featured);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // ---------------
    public function get_featured_scholarship()
    {
        $this->db->query('SELECT * FROM scholarship where featured=:featured ');
        $this->db->bind(':featured', 1);
        return $results = $this->db->resultSet();
    }




    public function update_scholarship($data, $id)
    {
        // $this->db->query('INSERT INTO scholarship(token,course, type, name, state,description, scholarship_file, url,start_date,end_date,eligible_candidates,offered_by,no_of_scholarships,contact_number,email_id,minimum_eligibility,application_process,reservation,detailed_eligibility_url,direct_link_to_apply,website_check, scholarship_amount) VALUES(:token, :course, :type, :name, :state,:description, :scholarship_file, :url,:start_date,:end_date,:eligible_candidates,:offered_by,:no_of_scholarships,:contact_number,:email_id,:minimum_eligibility,:application_process,:reservation,:detailed_eligibility_url,:direct_link_to_apply,:website_check, :scholarship_amount)');
        $this->db->query('UPDATE scholarship SET course =:course,type =:type,name =:name,state =:state,description =:description,scholarship_file =:scholarship_file,url =:url,start_date =:start_date,end_date =:end_date,eligible_candidates =:eligible_candidates,offered_by =:offered_by,no_of_scholarships =:no_of_scholarships,contact_number =:contact_number,email_id =:email_id,minimum_eligibility =:minimum_eligibility,application_process =:application_process,reservation =:reservation,detailed_eligibility_url =:detailed_eligibility_url,direct_link_to_apply =:direct_link_to_apply,website_check =:website_check,scholarship_amount =:scholarship_amount,instructions =:instructions,student_charge=:student_charge, class_display=:class_display WHERE id =:id ');
        // $this->db->bind(':token', $token);
        $this->db->bind(':id', $id);
        $this->db->bind(':course', $data['course']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':scholarship_file', $data['scholarship_file']);
        $this->db->bind(':url', $data['url']);
        // $this->db->bind(':conditions',$data['']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        // $this->db->bind(':criteria', $data['criteria']);
        $this->db->bind(':eligible_candidates', $data['eligible_candidates']);
        // $this->db->bind(':body', $data['']);
        $this->db->bind(':offered_by', $data['offered_by']);
        $this->db->bind(':no_of_scholarships', $data['no_of_scholarships']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':email_id', $data['email_id']);
        $this->db->bind(':minimum_eligibility', $data['minimum_eligibility']);
        $this->db->bind(':application_process', $data['application_process']);
        $this->db->bind(':reservation', $data['reservation']);
        // $this->db->bind(':documents_required', $data['documents_required']);
        $this->db->bind(':detailed_eligibility_url', $data['detailed_eligibility_url']);
        $this->db->bind(':direct_link_to_apply', $data['direct_link_to_apply']);
        $this->db->bind(':website_check', $data['website_check']);
        $this->db->bind(':scholarship_amount', $data['scholarship_amount']);
        $this->db->bind(':class_display', $data['class_display']);
        $this->db->bind(':student_charge', $data['student_charge']);


        $this->db->bind(':instructions', $data['instructions']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function add_scholarship($data)
    {
        $token = mt_rand(1000000000, 9999999999); // generate a unique 10-digit token
        $this->db->query('INSERT INTO scholarship(token,course, type, name, state,description, scholarship_file, url,start_date,end_date,eligible_candidates,offered_by,no_of_scholarships,contact_number,email_id,minimum_eligibility,application_process,reservation,detailed_eligibility_url,direct_link_to_apply,website_check, scholarship_amount,instructions,subadmin,class_display,student_charge) VALUES(:token, :course, :type, :name, :state,:description, :scholarship_file, :url,:start_date,:end_date,:eligible_candidates,:offered_by,:no_of_scholarships,:contact_number,:email_id,:minimum_eligibility,:application_process,:reservation,:detailed_eligibility_url,:direct_link_to_apply,:website_check, :scholarship_amount,:instructions,:subadmin,:class_display,:student_charge)');
        // Bind values
        // $this->db->bind(':company_name', $company_name);

        $this->db->bind(':token', $token);
        $this->db->bind(':course', $data['course']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':scholarship_file', $data['scholarship_file']);
        $this->db->bind(':url', $data['url']);
        // $this->db->bind(':conditions',$data['']);
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        // $this->db->bind(':criteria', $data['criteria']);
        $this->db->bind(':eligible_candidates', $data['eligible_candidates']);
        // $this->db->bind(':body', $data['']);
        $this->db->bind(':offered_by', $data['offered_by']);
        $this->db->bind(':no_of_scholarships', $data['no_of_scholarships']);
        $this->db->bind(':contact_number', $data['contact_number']);
        $this->db->bind(':email_id', $data['email_id']);
        $this->db->bind(':minimum_eligibility', $data['minimum_eligibility']);
        $this->db->bind(':application_process', $data['application_process']);
        $this->db->bind(':reservation', $data['reservation']);
        // $this->db->bind(':documents_required', $data['documents_required']);
        $this->db->bind(':detailed_eligibility_url', $data['detailed_eligibility_url']);
        $this->db->bind(':direct_link_to_apply', $data['direct_link_to_apply']);
        $this->db->bind(':website_check', $data['website_check']);
        $this->db->bind(':scholarship_amount', $data['scholarship_amount']);

        $this->db->bind(':instructions', $data['instructions']);
        $this->db->bind(':subadmin', $data['subadmin']);
        $this->db->bind(':class_display', $data['class_display']);
        $this->db->bind(':student_charge', $data['student_charge']);

        if ($this->db->execute()) {
            $this->db->query('SELECT id FROM scholarship WHERE token = :token');
            $this->db->bind(':token', $token);
            $result = $this->db->single();
            return $result->id;
        } else {
            // echo "falase";
            // die();
            return false;
        }
    }

    public function update_scholarship_status_operations($id, $flag)
    {
        # code...
        $this->db->query('UPDATE scholarship_status_operations SET flag =:flag WHERE id=:id');

        $this->db->bind(':flag', $flag);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function scholarship_document_verify($id, $status, $document_comment)
    {
        $this->db->query('UPDATE scholarship_application SET doc_verify=:doc_verify,document_comment=:document_comment  WHERE id=:id');

        $this->db->bind(':id', $id);
        $this->db->bind(':doc_verify', $status);
        $this->db->bind(':document_comment', $document_comment);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function find_user_by_email_omit_current_id($email, $id)
    {
        $this->db->query('SELECT * FROM auth WHERE email = :email and id!=:id');
        // Bind values      
        $this->db->bind(':email', $email);
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        // Check row 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function find_user_by_phone_omit_current_id($phno, $id)
    {
        $this->db->query('SELECT * FROM auth WHERE phone = :phno and id!=:id');
        // Bind values      
        $this->db->bind(':phno', $phno);
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        // Check row 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function create_market_place($data)
    {
        $this->db->query('INSERT INTO market_place (name,price,offer_price,image,description,status,quantity,created_by,created_at) VALUES (:name,:price,:offer_price,:image,:description,:status,:quantity,:created_by,:created_at)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':offer_price', $data['offer_price']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':status', 0);
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_admin_id']);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_all_market_place()
    {
        $this->db->query("SELECT * FROM market_place order by id desc");
        return $results = $this->db->resultSet();
    }
    public function get_all_market_place_orders()
    {
        $this->db->query("SELECT * FROM market_place_orders order by id desc");
        return $results = $this->db->resultSet();
    }
    public function get_market_place_order_detail($id)
    {
        $this->db->query("SELECT * FROM market_place_orders where id=:id");
        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }

    public function get_single_market_place($id)
    {
        $this->db->query("SELECT * FROM market_place where id=:id");
        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }
    public function get_market_place_order_log($id)
    {
        $this->db->query("SELECT * FROM market_place_orders_log where order_id=:order_id");
        $this->db->bind(':order_id', $id);

        return $results = $this->db->resultSet();
    }
    public function update_market_place_orders_status($id, $status)
    {
        $this->db->query('UPDATE market_place_orders SET status=:status WHERE id=:id');

        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function update_market_place_order_reject_status($id, $status, $market_place_id, $quantity, $user_id, $product_price, $bonus_coins_balance, $transaction_id, $type)
    {
        $this->db->query('UPDATE market_place_orders SET status=:status WHERE id=:id');

        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);

        if ($this->db->execute()) {
            if ($status != 3) {
                return true;
            } else {
                if ($this->db->execute()) {
                    $this->db->query('UPDATE  market_place SET quantity=:quantity WHERE id=:id');
                    $this->db->bind(':quantity', $quantity);
                    $this->db->bind(':id', $market_place_id);

                    if ($this->db->execute()) {

                        $this->db->query('UPDATE  wallets SET bonus_coins=:bonus_coins WHERE user_id=:user_id');
                        $this->db->bind(':bonus_coins', $bonus_coins_balance);
                        $this->db->bind(':user_id', $user_id);

                        if ($this->db->execute()) {
                            $this->db->query('INSERT INTO transactions (user_id, transaction_id, bonus_coins,bonus_coins_balance,type,market_place_id) VALUES (:user_id, :transaction_id, :bonus_coins, :bonus_coins_balance,:type, :market_place_id)');

                            $this->db->bind(':user_id', $user_id);
                            $this->db->bind(':transaction_id', $transaction_id);
                            $this->db->bind(':bonus_coins', $product_price);
                            $this->db->bind(':bonus_coins_balance', $bonus_coins_balance);
                            $this->db->bind(':type', $type);
                            $this->db->bind(':market_place_id', $market_place_id);
                            if ($this->db->execute()) {
                                return true;
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
    public function insert_market_place_order_log($order_id, $status)
    {
        $this->db->query('INSERT INTO market_place_orders_log (order_id,status,created_by) values (:order_id,:status,:created_by)');

        $this->db->bind(':order_id', $order_id);
        $this->db->bind(':status', $status);
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_admin_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_practice_results($quiz_id){
        $this->db->query("SELECT * FROM quiz_result where quiz_id=:quiz_id");
        $this->db->bind(':quiz_id', $quiz_id);

        return $results = $this->db->resultSet();
    }
    public function get_distinct_user_results($quiz_id){
        $this->db->query("SELECT COUNT(DISTINCT user_id) AS distinct_count FROM quiz_result where quiz_id=:quiz_id");
        $this->db->bind(':quiz_id', $quiz_id);

        return $results = $this->db->single();
    }
    public function get_transactions($user_id,$quiz_id,$created_by){
        $this->db->query("SELECT * FROM transactions where quiz_id=:quiz_id AND user_id=:user_id AND datetime=:created_by");
        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':created_by', $created_by);

        return $results = $this->db->single();
    }

   
    public function get_transaction_filter($start_date, $end_date, $user_id, $quiz_id, $scholarship_id, $market_place_id) {

        $query = "SELECT * FROM transactions WHERE 1=1 ";

        if ($start_date) {
            $query .= "AND DATE(datetime) >= '$start_date' ";
        }

        if ($end_date) {
            $query .= "AND DATE(datetime) <= '$end_date' ";
        }

        if ($user_id) {
            $query .= "AND user_id = '$user_id' ";
        }

        if ($quiz_id) {
            $query .= "AND quiz_id = '$quiz_id' ";
        }

        if ($scholarship_id) {
            $query .= "AND scholarship_id = '$scholarship_id' ";
        }

        if ($market_place_id) {
            $query .= "AND market_place_id = '$market_place_id' ";
        }


        $this->db->query($query);
        return $results = $this->db->resultSet();
    }

    public function final_prize_amount_store($data, $levels_data)
    {

        

        $token = mt_rand(1000000000, 9999999999);
        $this->db->query('INSERT INTO contest_prize_final (quiz_id,token,no_of_participants, entry_fee, total_amount_collected, expenses, total_expenses, prize_pool_amount, no_of_winners_percentage, total_no_of_winners, total_no_of_levels, levels_data,created_by) VALUES(:quiz_id,:token,:no_of_participants, :entry_fee, :total_amount_collected, :expenses, :total_expenses, :prize_pool_amount, :no_of_winners_percentage, :total_no_of_winners, :total_no_of_levels, :levels_data,:created_by)');
        // Bind values
        $this->db->bind(':quiz_id', $data['quiz_id']);
        $this->db->bind(':token', $token);

        $this->db->bind(':no_of_participants', $data['no_of_participants']);
        $this->db->bind(':entry_fee', $data['entry_fee']);
        $this->db->bind(':total_amount_collected', $data['total_amount_collected']);
        $this->db->bind(':expenses', $data['expenses']);
        $this->db->bind(':total_expenses', $data['total_expenses']);
        $this->db->bind(':prize_pool_amount', $data['prize_pool_amount']);
        $this->db->bind(':no_of_winners_percentage', $data['no_of_winners_percentage']);
        $this->db->bind(':total_no_of_winners', $data['total_no_of_winners']);
        $this->db->bind(':total_no_of_levels', $data['total_no_of_levels']);

        $this->db->bind(':levels_data', $levels_data);
        $this->db->bind(':created_by', $_SESSION['rexkod_oodles_admin_id']);


        // Execute
        if ($this->db->execute()) {
            $this->db->query('SELECT id FROM contest_prize_final WHERE token = :token');
            $this->db->bind(':token', $token);
            $result = $this->db->single();

            $this->db->query("UPDATE quizes SET final_prize_data_id=:final_prize_data_id where id=:id");
            $this->db->bind(':final_prize_data_id', $result->id);
            $this->db->bind(':id', $data['quiz_id']);
            $this->db->execute();

            $this->db->query('SELECT * FROM quizes WHERE id = :id');
            $this->db->bind(':id', $data['quiz_id']);
            $result2 = $this->db->single();
            return $result2->prize_calc_data_id;
        } else {
            // echo "falase";
            // die();
            return false;
        }
    }


    public function get_contest_prize_calculations_final($quiz_id)
    {

        $this->db->query("SELECT * FROM contest_prize_final  where quiz_id=:quiz_id");
        $this->db->bind(':quiz_id', $quiz_id);


        return $results = $this->db->single();
    }

    public function get_all_student_registerd_for_quiz(){
        $this->db->query('SELECT * FROM contest_reg');
        return $results = $this->db->resultset();
    }
    public function get_all_student_registerd_for_quiz_last_week()
    {
        $last_week = date('Y-m-d', strtotime('-1 week'));
        $this->db->query("SELECT * FROM contest_reg WHERE created_at >= :last_week");
        $this->db->bind(':last_week', $last_week);
        return $result = $this->db->resultSet();
    }
    public function get_all_quiz_takers()
    {
        $this->db->query('SELECT * FROM quiz_result WHERE category = 4');
        return $results = $this->db->resultset();
    }

    public function get_all_quiz_makers()
    {
        $this->db->query('SELECT * FROM auth WHERE type ="admin" OR type ="subadmin_quiz" ');
        return $results = $this->db->resultset();
    }
    public function get_quiz_result_quizwise($quiz_id){
        $this->db->query('SELECT * FROM quiz_result WHERE quiz_id = :quiz_id ORDER BY contest_amount DESC LIMIT 1');
        $this->db->bind(':quiz_id', $quiz_id);

        return $results = $this->db->single();
    }
    public function get_all_quizes_desc()
    {
        $this->db->query('SELECT * FROM quizes ORDER BY id DESC');
        return $results = $this->db->resultset();
    }
    public function get_all_contest_quiz()
    {
        $this->db->query('SELECT * FROM quizes WHERE category = 4 ORDER BY id DESC');
        return $results = $this->db->resultset();
    }

    public function get_edugorilla_package_responses(){
        $this->db->query('SELECT * FROM edugorilla_package_responses ORDER BY id DESC');
        return $results = $this->db->resultset();
    }
    public function create_counsellor($data, $pass)
    {
        $this->db->query('INSERT INTO auth (type,name,email,phone,password)  VALUES (:type,:name,:email,:phone,:password)');
        $this->db->bind(':type', "counsellor");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $pass);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_all_courses(){
        $this->db->query("SELECT * FROM courses");
        $result = $this->db->resultSet();
        return $result;
    }
    public function update_course($id,$price, $discounted_price)
    {
        $assign_time = date("d-M-Y h:i A");

        $this->db->query('UPDATE courses set price = :price, discounted_price = :discounted_price WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':price', $price);
        $this->db->bind(':discounted_price', $discounted_price);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
