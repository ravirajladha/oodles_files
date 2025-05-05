<?php
class Apis
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }




    public function get_all_products() 
    {
        $this->db->query('SELECT * FROM products');
        $result = $this->db->resultSet();
        return $result;
    }


    public function get_all_services() 
    {
        $this->db->query('SELECT * FROM services');
        $result = $this->db->resultSet();
        return $result;
    }



    public function get_admin_products() 
    {
        $this->db->query('SELECT * FROM products where created_byId="1"');
        $result = $this->db->resultSet();
        return $result;
    }
    public function delete_product($id)
    {
        $this->db->query("DELETE FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_service($id)
    {
        $this->db->query("DELETE FROM services WHERE id = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_cat_products($id) {
        $this->db->query('SELECT * FROM products WHERE p_cat = :id');
         $this->db->bind(':id', $id);
        $result = $this->db->resultSet();
        return $result;
    }


    public function get_single_order($id) {
        $this->db->query('SELECT * FROM product_order_list WHERE p_id = :id');
         $this->db->bind(':id', $id);
        $result = $this->db->resultSet();
        return $result;
    }


      public function get_single_products($id) {
        $this->db->query('SELECT * FROM products WHERE id = :id');
         $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }



    public function get_single_service($id) {
        $this->db->query('SELECT * FROM services WHERE id = :id');
         $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }
    
    public function email_verify($email) 
    {
        $this->db->query('SELECT * FROM auth WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }

    public function email_verify_phone($phone) 
    {
        $this->db->query('SELECT * FROM auth WHERE phone = :phone');

        $this->db->bind(':phone', $phone);

        $row = $this->db->single();
        
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }


    public function vendor_email_verify($email) 
    {
        $this->db->query('SELECT * FROM vendors WHERE vendor_email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }

    public function check_pass($opass)
    {
        $this->db->query('SELECT * from auth where id = :id');
        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        $results = $this->db->single();
        if(password_verify($opass, $results->password))
        {
        return true;
        }
        else
        {
        return false;
        }
    }
    public function update_password($npass, $email)
    {
        $npass = password_hash($npass, PASSWORD_DEFAULT);
        $this->db->query('UPDATE auth set password = :npass, email = :email WHERE id = :id');

        // Bind values
        $this->db->bind(':npass', $npass);
        $this->db->bind(':email', $email);
        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }
    public function findUserByphno($phno)
    {
        $this->db->query('SELECT * FROM auth WHERE phone = :phno');
        // Bind values      
        $this->db->bind(':phno', $phno);
        $row = $this->db->single();
        // Check row 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByPhone($phone)
    {
        $this->db->query('SELECT * FROM auth WHERE phone = :phno');
        // Bind values      
        $this->db->bind(':phno', $phone);
        return $this->db->single();
    }

    public function findUserByemail($email)
    {
        $this->db->query('SELECT * FROM auth WHERE email = :email');
        // Bind values      
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        // Check row 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findVendorByPhone($phone)
    {
        $this->db->query('SELECT * FROM vendors WHERE vendor_phone = :phone');
        // Bind values      
        $this->db->bind(':phone', $phone);
        $row = $this->db->single();
        // Check row 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function add_user($email, $phno, $pass)
    {
        $this->db->query('INSERT INTO auth (type,email,phone,password,created_at) VALUES(:type, :email, :phno, :pass, :createdat)');
        // Bind values
        
        $this->db->bind(':type', 'user');
        $this->db->bind(':email', $email);
        $this->db->bind(':phno', $phno);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':createdat', date('Y-m-d H:i:s'));
        // Execute

        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
}



    public function add_vendor($name, $bname, $email, $phone, $pass, $address, $city, $state, $pincode, $gst, $temp, $timing, $minval, $subcat_id, $commission)
    {
        
        
        $createdat = date("Y/M/D h:i:s a", time());
        $this->db->query('INSERT INTO auth (name, type, email, phone, password, status, created_at) VALUES(:name,:type,:email, :phone, :pass, :status, :created_at)');
        // Bind values
        $this->db->bind(':name', 'name');
        $this->db->bind(':type', 'vendor');
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':status', '0');
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        if ($this->db->execute()) {   

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $phone);
            $cur_user = $this->db->single();
                 
        $this->db->query("SELECT * FROM subcategory where subcategory_id = :id ");

        $this->db->bind(':id', $subcat_id);

        $cat_val = $this->db->single();

        $cat_id = $cat_val->category_id;
        $subcat_name = $cat_val->subcategory_name;

                 
            $this->db->query('INSERT INTO vendors (vendor_id,vendor_name, vendor_address, vendor_city,vendor_state, vendor_pincode, vendor_gst, vendor_gst_cert, vendor_timing, vendor_minorder, vendor_subcategory_id, vendor_commission,vendor_category_id,vendor_subcategory_name) VALUES(:vendorid, :name, :address, :city, :state, :pincode, :gst, :gst_cert, :timing, :minval, :subcat_id, :commission,:cat_id,:subcat_name)');
            // Bind values
            $this->db->bind(':vendorid', $cur_user->id);
            $this->db->bind(':name', $bname);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':pincode', $pincode);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':gst_cert', $temp);
            $this->db->bind(':timing', $timing);
            $this->db->bind(':minval', $minval);
            $this->db->bind(':subcat_id', $subcat_id);
            $this->db->bind(':commission',$commission);
            $this->db->bind(':cat_id', $cat_id);
            $this->db->bind(':subcat_name', $subcat_name);
            // Execute
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }}

    }


    public function add_vendor_profile($name, $address, $city, $state, $pincode, $gst, $timing, $minval,$subcat_id)
    {
        $subcat_id = $_POST['subcat_id'];
        if(!empty($_FILES['gst_cert']['name']))
        {
            $f_name = $_FILES['gst_cert']['name'];
            $f_temp = $_FILES['gst_cert']['tmp_name'];
            $size = $_FILES['gst_cert']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_vendor_id']."".$unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp=$f_newfile;
        }
        else
        {
            $temp = NULL;
        }
            
        $this->db->query("SELECT * FROM subcategory where subcategory_id = :id ");

        $this->db->bind(':id', $subcat_id);

        $cat_val = $this->db->single();

        $cat_id = $cat_val->category_id;



            $this->db->query('INSERT INTO vendors (vendor_id,vendor_name, vendor_address, vendor_city,vendor_state, vendor_pincode, vendor_gst, vendor_gst_cert, vendor_timing, vendor_minorder, vendor_subcategory_id,vendor_category_id) VALUES(:vendorid, :name, :address, :city, :state, :pincode, :gst, :gstcert, :timing, :minval, :subcat_id, :cat_id)');
            // Bind values
            $this->db->bind(':vendorid', $_SESSION['rexkod_vendor_id']);
            $this->db->bind(':name', $name);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':pincode', $pincode);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':gstcert', $temp);
            $this->db->bind(':timing', $timing);
            $this->db->bind(':minval', $minval);
            $this->db->bind(':subcat_id', $subcat_id);
            $this->db->bind(':cat_id',$cat_id);
            // Execute
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }

    }
     public function userlogin($phone)
    {
        $this->db->query('SELECT * FROM auth WHERE phone = :phone');
        $this->db->bind(':phone', $phone);
        $row = $this->db->single();

        if($row) {
            return $row;
        } else {
            return false;
        }
    }

    public function add_user_otp($email, $phno)
    {
        $this->db->query('INSERT INTO auth (type,email,phone,created_at) VALUES(:type, :email, :phno, :createdat)');
        // Bind values
        
        $this->db->bind(':type', 'user');
        $this->db->bind(':email', $email);
        $this->db->bind(':phno', $phno);
        $this->db->bind(':createdat', date('Y-m-d H:i:s'));
        // Execute

        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function add_user_profile($name, $type, $address, $city, $state, $pincode, $gst)
    {

        if(!empty($_FILES['gst_cert']['name']))
        {
            $f_name = $_FILES['gst_cert']['name'];
            $f_temp = $_FILES['gst_cert']['tmp_name'];
            $size = $_FILES['gst_cert']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_user_id']."".$unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp=$f_newfile;
        }
        else
        {
            $temp = NULL;
        }
        $this->db->query('INSERT INTO wallets (user_id,balance_amount) values(:userid,:balance_amount)');
        $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
        $this->db->bind(':balance_amount', '100');
        $xt = $this->db->execute();
        
            $this->db->query('INSERT INTO users (user_id, user_type, user_name, user_address, user_city,user_state, user_pincode, user_country, user_gst, user_gst_cert) VALUES(:userid, :type, :name, :address, :city, :state, :pincode, :country, :gst, :gstcert)');
            // Bind values
            $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
            $this->db->bind(':name', $name);
            $this->db->bind(':type', $type);
            $this->db->bind(':address', $address);
            $this->db->bind(':city', $city);
            $this->db->bind(':state', $state);
            $this->db->bind(':country', 'India');
            $this->db->bind(':pincode', $pincode);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':gstcert', $temp);
            // Execute
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }

    }



  


      // Get Post By ID
      public function getVendorById($id){
        $this->db->query('SELECT * FROM users WHERE user_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }


      public function getOrderById($id){
        $this->db->query('SELECT * FROM orders WHERE id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }
      public function get_bookings_by_id($id){
        $this->db->query('SELECT * FROM bookings WHERE id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }



      public function getTcsById($id){
        $this->db->query('SELECT * FROM tcs_certificate WHERE tcs_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
        // $row = $this->db->resultSet();
        return $row;
      }



      public function getOrderDetailById($id){
        $this->db->query('SELECT * FROM product_order_list WHERE p_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->resultSet();
  
        return $row;
      }

      
  
  
      // Update Post
      public function updateVendor($data){
        // Prepare Query
        $this->db->query('UPDATE testimonials SET name = :name, designation = :designation, content = :content WHERE id = :id');
  
        // Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':designation', $data['designation']);
        $this->db->bind(':content', $data['content']);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
  
      // Delete Post
      public function deleteVendor($id){
        // Prepare Query
        $this->db->query('DELETE FROM testimonials WHERE id = :id');
  
        // Bind Values
        $this->db->bind(':id', $id);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }


    public function ulogin($email, $pass)
    {
        $this->db->query('SELECT * FROM auth WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        $hashed_password = $row->password;

        if (password_verify($pass, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
    public function get_single_product($val)
    {
        $this->db->query('SELECT * FROM products WHERE id = :val');
        $this->db->bind(':val', $val);
        return $this->db->single();
    }

    public function add_item_to_cart_db($data)
    {

        $this->db->query('SELECT * FROM cart WHERE item_id = :id AND created_by = :uid');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
        $x = $this->db->single();
        
        $x1 = 0;
        $qt = 0;
        if ($x) 
        {
            $qt = (int)$data['qty'];
            $p1 = (float)$data['price'];
            $x1 = (float)$data['total'];
            $this->db->query('UPDATE cart SET item_qty=:qty, item_price=:price, item_total_price=:total WHERE id=:id');
            $this->db->bind(':id', $x->id);
            $this->db->bind(':qty', $qt);
            $this->db->bind(':price', $p1);
            $this->db->bind(':total', $x1);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->query('INSERT INTO cart(item_id, item_name, item_qty, item_price, item_total_price, created_by,img,prod_vendorId,prod_vendorName,user_type) VALUES (:id,:name,:qty,:price,:total,:created_by,:img,:prod_vendorId,:prod_vendorName,:user_type)');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':qty', $data['qty']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':total', $data['total']);
            $this->db->bind(':created_by', $data['created_by']);
            $this->db->bind(':img', $data['img']);

            $this->db->bind(':prod_vendorId', $data['created_byId']);
            $this->db->bind(':prod_vendorName', $data['created_byType']);
            $this->db->bind(':user_type', $data['user_type']);


            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function add_service_to_booking($data){
        $this->db->query('INSERT INTO bookings (p_name, user_id,p_image,date_data,time_data,product_id,price,created_by_id,created_by_type,paid_amount,balance_amount,payment_type) VALUES (:p_name,:user_id,:p_image,:date_data,:time_data,:product_id,:price,:created_by_id,:created_by_type,:paid_amount,:balance_amount,:payment_type)');
        $this->db->bind(':p_name', $data['p_name']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':p_image', $data['p_image']);
        $this->db->bind(':date_data', $data['date_data']);
        $this->db->bind(':time_data', $data['time_data']);
        $this->db->bind(':product_id', $data['product_id']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':created_by_id', $data['created_by_id']);
        $this->db->bind(':created_by_type', $data['created_by_type']);
        $this->db->bind(':payment_type', $data['payment_type']);
        $this->db->bind(':paid_amount', $data['paid_amount']);
        $this->db->bind(':balance_amount', $data['balance_amount']);
   
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_sum_cart()
    {
        $this->db->query('SELECT * FROM cart WHERE created_by =:created_by');
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        $x = $this->db->resultSet();
        $a = 0;
        foreach ($x as $k) {
            $a = $a + $k->item_total_price;
        }
        return $a;
    }
    // public function getcart_items()
    // {
    //     $this->db->query('SELECT * FROM cart WHERE created_by=:created_by');
    //     $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
    //     return $this->db->resultSet();
    // }




    public function getSubcategoryById($id)
    {
        $this->db->query("SELECT * FROM subcategory where subcategory_id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }




    public function get_cart_user_check()
    {
        $this->db->query('SELECT * FROM cart WHERE created_by=:usid');
        $this->db->bind(':usid', $_SESSION['rexkod_user_id']);
        return $this->db->resultSet();
        
    }
    
    public function get_cart_vendor_check($vid)
    {
        $this->db->query('SELECT * FROM cart WHERE prod_vendorId=:vid');
        $this->db->bind(':vid', $vid);
        return $this->db->resultSet();
        
    }


    public function getCategoryById($id)
    {
        $this->db->query("SELECT * FROM category where category_id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }


    public function delete_cart_item_db($id)
    {
        $this->db->query("DELETE FROM cart WHERE id=:id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function clear_cart_item_db($id)
    {
        $this->db->query("DELETE FROM cart WHERE created_by=:id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getcart_items_by_item_id($item_id)
    {
        $this->db->query('SELECT * FROM cart WHERE item_id=:item_id AND created_by=:created_by');
         $this->db->bind(':item_id', $item_id);
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        return $this->db->single();
    }
    public function delete_item_to_cart_db($data)
    {
        $this->db->query('UPDATE cart SET item_qty=:qty, item_total_price=:total, item_price=:item_price WHERE id=:id AND created_by=:created_by');
        $this->db->bind(':id', $data['cart_id']);
        $this->db->bind(':qty', $data['qty']);
        $this->db->bind(':item_price', $data['price']);
        $this->db->bind(':total', $data['total']);
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
     public function delete_item_to_cart_db_if_zero($data)
    {
        $this->db->query("DELETE FROM cart WHERE id = :id AND created_by=:created_by");
        $this->db->bind(':id', $data['cart_id']);
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function convert_temp_id_to_user_id_for_pcart()
    {
        $d ='';
        $this->db->query('SELECT * FROM cart WHERE created_by =:created_by');
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id_rec']);
        $x = $this->db->resultSet();
        foreach ($x as $k) 
        {
            $this->db->query('UPDATE cart SET created_by=:created_by WHERE id=:id');
            $this->db->bind(':id', $k->id);
            $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
            $d = $this->db->execute();
        }
        if ($d) {
            return true;
        } else {
            return false;
        }
    }


    public function get_userinfo($id)
    {
        $this->db->query("SELECT * FROM auth where id = :id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }

    public function get_custinfo()
    {
        $this->db->query("SELECT * FROM users where user_id = :id");
        // $this->db->query("SELECT * FROM users");
        $this->db->bind(':id',$_SESSION['rexkod_user_id']);
        return $results = $this->db->single();
    }
    public function get_custinfo1($id)
    {
        $this->db->query("SELECT * FROM users where user_id = :id");
        $this->db->bind(':id',$id);
        $row = $this->db->single();
  
        return $row;
    }
    public function get_custinfo2($id)
    {
        $this->db->query("SELECT * FROM users where user_id = :id");
        $this->db->bind(':id',$id);
        $row = $this->db->single();
  
        return $row;
    }



    public function ulogin_using_rowId($id)
    {
        $this->db->query('SELECT * FROM vendors WHERE vendor_id = :vendor_id');
        $this->db->bind(':vendor_id', $id);
        $row = $this->db->single();

        return $row;
    }
    public function clogin_using_rowId($id)
    {
        $this->db->query('SELECT * FROM subcategory WHERE subcategory_id = :subcategory_id');
        $this->db->bind(':subcategory_id', $id);
        $row = $this->db->single();

        return $row;
    }
    public function clogin_using_row_id_service($id)
    {
        $this->db->query('SELECT * FROM subcategory_service WHERE subcategory_id = :subcategory_id');
        $this->db->bind(':subcategory_id', $id);
        $row = $this->db->single();

        return $row;
    }

          public function get_all_userinfo()
    {
        $this->db->query("SELECT * FROM auth where id = :id");

        $this->db->query("SELECT *
        FROM auth
        INNER JOIN users 
        ON auth.id = users.user_id
        WHERE auth.id=:id
        ;");

        $this->db->bind(':id', $_SESSION['rexkod_user_id']);
        $row = $this->db->single();

        return $row;
    }


    public function get_sum_cart_for_payment()
    {
        $this->db->query('SELECT * FROM cart WHERE created_by =:created_by');
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        $x = $this->db->resultSet();
        $a = 0;
        foreach ($x as $k) {
            $a = $a + $k->item_total_price;
        }
        return $a;
    }
    public function savecookies()
    {

        $this->db->query('UPDATE auth SET temp_id = :order_id, temp_data = :temp_data WHERE id = :user_id');
        $this->db->bind(':order_id', $_SESSION['order_id']);
        $this->db->bind(':temp_data', $_SESSION['temp_data']);
        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function gettempdate($order_id)
    {
        $this->db->query('SELECT * FROM auth WHERE temp_id = :order_id');
        $this->db->bind(':order_id', $order_id);
        return $results = $this->db->single();
    }
    public function add_cart_for_payment($name, $email, $phno, $add, $city, $state, $zipcode, $country, $data)
    {
        $order_d = array();
        $tempID = md5(uniqid(rand(), true));
        $this->db->query('INSERT INTO orders (name, email,phone, address, city, state, zipcode, country,user_id,img,temp_id,pay_status,invoice_exsist, last_updatedAt, last_updatedBy) VALUES(:name, :email, :phno, :add, :city, :state, :zipcode, :country, :user_id, :img, :temp_id,1,1, :last_updatedAt, :last_updatedBy)');



        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phno', $phno);
        $this->db->bind(':add', $add);
        $this->db->bind(':city', $city);
        $this->db->bind(':state', $state);
        $this->db->bind(':zipcode', $zipcode);
        $this->db->bind(':country', $country);
        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $this->db->bind(':img', '');
        $this->db->bind(':temp_id', $tempID);
        $this->db->bind(':last_updatedAt', date('d-m-Y h:i'));
        $this->db->bind(':last_updatedBy', $_SESSION['rexkod_user_id']);

        // Execute
        if ($this->db->execute()) {
            $this->db->query('SELECT id FROM orders WHERE temp_id = :temp_id');
            $this->db->bind(':temp_id', $tempID);
            $temp = $this->db->single();

            $this->db->query('SELECT * FROM cart WHERE created_by =:created_by');
            $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
            $x = $this->db->resultSet();
            foreach ($x as $k) 
            {
                $s = '';
                $this->db->query('INSERT INTO product_order_list(item_id, item_name, item_qty, item_price, item_total_price, created_by, p_id,p_img) VALUES (:id,:name,:qty,:price,:total,:created_by,:p_id,:p_img)');
                $this->db->bind(':id', $k->item_id);
                $this->db->bind(':name', $k->item_name);
                $this->db->bind(':qty', $k->item_qty);
                $this->db->bind(':price', $k->item_price);
                $this->db->bind(':total', $k->item_total_price);
                $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
                $this->db->bind(':p_id', $temp->id);
                $this->db->bind(':p_img', $k->img);
                $xq = $this->db->execute();
                $s = $k->item_id . "|" . $k->item_name . "|" . $k->item_qty . "|" . $k->item_price;
                $order_d[] = $s;
            }
            $order_d = implode("!", $order_d);
            $this->db->query('INSERT INTO product_invoice (booking_id, name, order_details, sub_total, total, pharmacy_med) VALUES(:booking_id, :name, :order_details, :sub_total, :grand_total, 1)');

            $this->db->bind(':booking_id', $temp->id);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':order_details', $order_d);
            $this->db->bind(':sub_total', $data['tprice']);
            $this->db->bind(':grand_total', $data['tprice']);
            $xq1 = $this->db->execute();

            $this->db->query("UPDATE orders SET price = :grand_total where id = :id");
            $this->db->bind(':id', $temp->id);
            $this->db->bind(':grand_total', $data['tprice']);
            $this->db->execute();

            if ($xq1) {
                $this->db->query('INSERT INTO payment (name, email, ph_no, order_id, transaction_id, price, book_id, status, razorpay_order_id, razorpay_signature) VALUES(:name, :email, :phno, :order_id, :transaction_id, :price, :temp_id, 1, :razorpay_order_id, :razorpay_signature)');
                $this->db->bind(':order_id', $data['ORDERID']);
                $this->db->bind(':transaction_id', $data['TXNID']);
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':phno', $data['phone']);
                $this->db->bind(':price', $data['tprice']);
                $this->db->bind(':temp_id', $temp->id);
                $this->db->bind(':razorpay_order_id', $data['razorpay_order_id']);
                $this->db->bind(':razorpay_signature', $data['razorpay_signature']);
                $this->db->execute();

                $this->db->query("DELETE FROM cart WHERE created_by=:created_by");
                $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
                $dd = $this->db->execute();
                if ($dd) 
                {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            die('Error');
        }
    }



    public function update_user($name, $email, $phno, $address, $pincode, $state, $country, $id)
    {


        $this->db->query('UPDATE auth SET name = :name, email = :email, phone = :phno,address = :address,pin_code = :pincode,state = :state,country = :country WHERE id = :id');

        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phno', $phno);

        $this->db->bind(':address', $address);
        $this->db->bind(':pincode', $pincode);
        $this->db->bind(':state', $state);
        $this->db->bind(':country', $country);
        $this->db->bind(':id', $id);
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function change_heart_func($prod_id, $count)
    {
        $this->db->query('UPDATE products SET very_good=:very_good WHERE id=:id');

        $this->db->bind(':id', $prod_id);
        $this->db->bind(':very_good', $count);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function return_order($id)
    {
        $this->db->query('UPDATE orders SET return_status=:returnstatus WHERE id=:id');

        $this->db->bind(':id', $id);
        $this->db->bind(':returnstatus', 1);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function update_cartCoupon($id)
    {
        $this->db->query('UPDATE cart SET coupon_id=:coup_id WHERE created_by=:uid');

        $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
        $this->db->bind(':coup_id', $id);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function change_good_func($prod_id, $count)
    {
        $this->db->query('UPDATE products SET good=:good WHERE id=:id');

        $this->db->bind(':id', $prod_id);
        $this->db->bind(':good', $count);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function change_not_good_func($prod_id, $count)
    {
        $this->db->query('UPDATE products SET not_good=:not_good WHERE id=:id');

        $this->db->bind(':id', $prod_id);
        $this->db->bind(':not_good', $count);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function change_status($id,$st)
    {
        $assign_time = date("d-M-Y h:i A");

        $this->db->query('UPDATE orders set status = :status, last_updatedAt = :updated_at, last_updatedBy = :user_id WHERE id = :id');
        // Bind values
        $this->db->bind(':status', $st);
        $this->db->bind(':id', $id);
        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $this->db->bind(':updated_at', $assign_time);


        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
    }

     public function get_all_address() {
        $this->db->query('SELECT * FROM user_address WHERE user_id = :user_id');
         $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $result = $this->db->resultSet();
        return $result;
    }



    public function get_tcs() {
        $this->db->query('SELECT * FROM tcs_certificate WHERE tcs_user_id = :user_id');
         $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $result = $this->db->resultSet();
        return $result;
    }



    public function checkout_coupons($vid,$sid) {
        $this->db->query('SELECT * FROM coupons WHERE coupon_vendor_id = :vid OR coupon_subcategory_id = :sid');
        $this->db->bind(':vid', $vid);
        $this->db->bind(':sid', $sid);
        $result = $this->db->resultSet();
        return $result;
    }



    public function insert_more_address($address, $pincode, $state, $country)
    {
        $assign_time = date("d-M-Y h:i A");

        $this->db->query('INSERT INTO user_address (address, state, zipcode, country, created_at, user_id) VALUES(:address, :state, :zipcode, :country, :created_at, :user_id)');
        // Bind values

        $this->db->bind(':address', $address);
        $this->db->bind(':zipcode', $pincode);
        $this->db->bind(':state', $state);
        $this->db->bind(':country', $country);
        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $this->db->bind(':created_at', $assign_time);
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_address_by_id($id)
    {
        $this->db->query('SELECT * FROM user_address WHERE id = :id');

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }


    public function cart_active_coupon($id)
    {
        $this->db->query('SELECT * FROM coupons WHERE coupon_id = :id');

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }




    public function make_primary_address($address, $pincode, $state, $country, $id)
    {


        $this->db->query('UPDATE auth SET address = :address,pin_code = :pincode,state = :state,country = :country WHERE id = :id');

        // Bind values
        
        $this->db->bind(':address', $address);
        $this->db->bind(':pincode', $pincode);
        $this->db->bind(':state', $state);
        $this->db->bind(':country', $country);
        $this->db->bind(':id', $id);
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_address_by_id($id)
    {
        $this->db->query("DELETE FROM user_address WHERE id=:id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function change_QR($img)
    {        
        $this->db->query('UPDATE auth SET qr_img = :qr_img WHERE id = :id');

        $this->db->bind(':id', $_SESSION['rexkod_user_id']);

        $this->db->bind(':qr_img', $img);

        if($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    public function update_orderFeedback($feedback, $order_id)
    {
        $this->db->query('UPDATE orders SET feedback=:feedback, feedback_status=:feedback_status WHERE id=:id');
        $this->db->bind(':feedback', $feedback);
        $this->db->bind(':feedback_status', 1);
        $this->db->bind(':id', $order_id);
  

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    } 


    public function add_cart_for_paymentPayAtdel($name, $email, $phno, $add, $city, $state, $zipcode, $country, $data, $data_checkout,$payment_type,$wallet_amount)
    {
        
        $this->db->query('INSERT INTO orders (name, email, phone, address, city, state, zipcode, country,vendor_id, user_id, sub_total, coupon_id, coupon_value, total, buyer_protection, tax_percentage, tax_value, shipping, net_total, created_at,payment_type,balance_amount,paid_amount) VALUES(:name, :email, :phno, :add, :city, :state, :zipcode, :country, :vendorid, :userid, :subtotal, :couponid, :couponval, :total, :buyerpro, :taxpercentage, :taxval, :shipping, :nettotal, :createdat,:payment_type,:balance_amount,:paid_amount)');

        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phno', $phno);
        $this->db->bind(':add', $add);
        $this->db->bind(':city', $city);
        $this->db->bind(':state', $state);
        $this->db->bind(':zipcode', $zipcode);
        $this->db->bind(':country', $country);
        $this->db->bind(':vendorid', $data_checkout->vendor_checkout);
        $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
        $this->db->bind(':subtotal', $data_checkout->subtotal_checkout);
        $this->db->bind(':couponid', $data_checkout->coupon_checkout);
        $this->db->bind(':couponval', $data_checkout->coupon_value_checkout);
        $this->db->bind(':total', $data_checkout->total_checkout);
        $this->db->bind(':buyerpro', $data_checkout->buypro_checkout);
        $this->db->bind(':taxpercentage', $data_checkout->tax_Percentage_checkout);
        $this->db->bind(':taxval', $data_checkout->tax_value_checkout);
        $this->db->bind(':shipping', $data_checkout->shipping_checkout);
        $this->db->bind(':nettotal', $data_checkout->net_total); 
        $this->db->bind(':createdat', date('Y-m-d H:i:s')); 
        
        $this->db->bind(':payment_type', $payment_type); 
        if($payment_type==1){
            $balance_amount = 0;
            $paid_amount = $data_checkout->net_total;
        }elseif($payment_type==2){
            $balance_amount =  $data_checkout->net_total;
            $paid_amount = 0;
        }
      
        elseif($payment_type==3){
            $paid_amount = $wallet_amount;
            $balance_amount = $data_checkout->net_total-$wallet_amount ;
          
        }
        $this->db->bind(':balance_amount', $balance_amount); 
        $this->db->bind(':paid_amount', $paid_amount); 
        // Execute
        if ($this->db->execute()) {

            $this->db->query('SELECT id FROM orders WHERE user_id = :uid ORDER BY id DESC');
            $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
            $temp = $this->db->single();

            $this->db->query('SELECT * FROM cart WHERE created_by =:created_by');
            $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
            $x = $this->db->resultSet();

            foreach ($x as $k) 
            {
                $s = '';
                $this->db->query('INSERT INTO product_order_list(item_id, item_name, item_qty, item_price, item_total_price, created_by, p_id,p_img) VALUES (:id,:name,:qty,:price,:total,:created_by,:p_id,:p_img)');
                $this->db->bind(':id', $k->item_id);
                $this->db->bind(':name', $k->item_name);
                $this->db->bind(':qty', $k->item_qty);
                $this->db->bind(':price', $k->item_price);
                $this->db->bind(':total', $k->item_total_price);
                $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
                $this->db->bind(':p_id', $temp->id);
                $this->db->bind(':p_img', $k->img);

                $xq = $this->db->execute();
            }

            $this->db->query("DELETE FROM cart WHERE created_by=:created_by");
            $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);

            return($this->db->execute());
        
        } else {
            die("Something Went Wrong");
        }
    }

    public function update_wallet($user_id,$wallet_amount){
       
           $this->db->query('UPDATE wallets set balance_amount=:total where user_id=:id');
           $this->db->bind(':id',$user_id);
          
           $this->db->bind(':total',$wallet_amount);
        
     
           if($this->db->execute())
           {
               return true;
           }
           else
           {
                return false;
           }
        }   

        public function update_wallet_product($id,$data_checkout,$wallet_amount){
            if(($wallet_amount- ($data_checkout->net_total))>0){
               $this->db->query('UPDATE wallets set balance_amount=:total where user_id=:id');
               $this->db->bind(':id',$id);
              
               $this->db->bind(':total',$wallet_amount- ($data_checkout->net_total));
            }else{
                $this->db->query('UPDATE wallets set balance_amount=:total where user_id=:id');
               $this->db->bind(':id',$id);
              
               $this->db->bind(':total',0);
            }
               if($this->db->execute())
               {
                   return true;
               }
               else
               {
                    return false;
               }
            }  

        public function get_wallet_info()
        {
            $this->db->query("SELECT * FROM wallets where user_id = :id");
           
            $this->db->bind(':id',$_SESSION['rexkod_user_id']);
            return $results = $this->db->single();
        }
    
        public function getcart_items()
        {
            $this->db->query('SELECT * FROM cart WHERE created_by=:created_by');
            $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
            return $this->db->resultSet();
        }

    public function add_item_to_wishlist_db($data)
    {
        $this->db->query('SELECT * FROM wishlist WHERE item_id = :id');
        $this->db->bind(':id', $data['id']);
        $x = $this->db->single();
        $x1 = 0;
        $qt = 0;
        if ($x) 
        {
            $qt = (int)$data['qty'] + (int)$x->item_qty;
            $x1 = (float)$data['total'] + (float)$x->item_total_price;

            $this->db->query('UPDATE wishlist SET item_qty=:qty, item_total_price=:total WHERE id=:id');

            $this->db->bind(':id', $x->id);
            $this->db->bind(':qty', $qt);
            $this->db->bind(':total', $x1);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->query('INSERT INTO wishlist(item_id, item_name, item_qty, item_price, item_total_price, created_by,img) VALUES (:id,:name,:qty,:price,:total,:created_by,:img)');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':qty', $data['qty']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':total', $data['total']);
            $this->db->bind(':created_by', $data['created_by']);
            $this->db->bind(':img', $data['img']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getwishlist_items()
    {
        $this->db->query('SELECT * FROM wishlist WHERE created_by=:created_by');
        $this->db->bind(':created_by', $_SESSION['rexkod_user_id']);
        return $this->db->resultSet();
    }



    public function add_banner_db($ban_filename,$ban_pos)
    {
        $this->db->query('UPDATE banner SET '.$ban_pos.'=:ban_filename');
        // Bind values
        $this->db->bind(':ban_filename', $ban_filename);
        
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_banner()
    {
        $this->db->query('SELECT * FROM banner order by id DESC limit 1');

        return $results = $this->db->single();
    }

     public function get_all_vendors(){
        $this->db->query("SELECT * FROM vendors");
  
        $results = $this->db->resultset();
  
        return $results;
      }
 

      public function getpropage_points(){
        $this->db->query("SELECT * FROM pro_page_points");
  
        $results = $this->db->resultset();
  
        return $results;
      }



    public function get_all_vendors1()
    {
        $this->db->query('SELECT * FROM vendors');
        
        return $this->db->resultSet();
    }
    public function get_all_subcategory()
    {
        $this->db->query('SELECT * FROM subcategory');
        
        return $this->db->resultSet();
    }
    public function get_all_category()
    {
        $this->db->query('SELECT * FROM category');
        
        return $this->db->resultSet();
    }

    public function get_all_products_forVendor($id) 
    {
        $this->db->query('SELECT * FROM products where created_byId = :created_byId');

        $this->db->bind(':created_byId', $id);

        $result = $this->db->resultSet();
        return $result;
    }
    // get_all_subcategtory?_forCategory
    public function get_all_products_forSubcategory($id) 
    {
        $this->db->query('SELECT * FROM products where p_subcat = :p_subcat');

        $this->db->bind(':p_subcat', $id);

        $result = $this->db->resultSet();
        return $result;
    }
    public function get_all_services_for_subcategory($id) 
    {
        $this->db->query('SELECT * FROM services where p_subcat = :p_subcat');

        $this->db->bind(':p_subcat', $id);

        $result = $this->db->resultSet();
        return $result;
    }
    public function get_all_subcategory_forCategory($id) 
    {
        $this->db->query('SELECT * FROM subcategory where category_id = :category_id');

        $this->db->bind(':category_id', $id);

        $result = $this->db->resultSet();
        
        return $result;
    }
    public function get_all_subcategory_service($id) 
    {
        $this->db->query('SELECT * FROM subcategory_service where category_id = :category_id');

        $this->db->bind(':category_id', $id);

        $result = $this->db->resultSet();
        
        return $result;
    }
    public function get_all_vendor_forSubcategory($id) 
    {
        $this->db->query('SELECT * FROM vendors where vendor_subcategory_id = :p_subcat');

        $this->db->bind(':p_subcat', $id);

        $result = $this->db->resultSet();
        
        return $result;
    }
    public function get_all_vendor_forCategory($id) 
    {
        $this->db->query('SELECT * FROM vendors where vendor_category_id = :p_cat');

        $this->db->bind(':p_cat', $id);

        $result = $this->db->resultSet();
        
        return $result;
    }
    public function get_all_category_bycategoryId($id) 
    {
        $this->db->query('SELECT * FROM category where category_id = :p_cat');

        $this->db->bind(':p_cat', $id);

        $result = $this->db->resultSet();
        
        return $result;
    }
    public function get_all_subcat_bysubcatId($id) 
    {
        $this->db->query('SELECT * FROM subcategory where subcategory_id = :p_cat');

        $this->db->bind(':p_cat', $id);

        $result = $this->db->resultSet();
        
        return $result;
    }

    public function get_products_by_search($search_input)
    {
        $this->db->query('SELECT * FROM products WHERE p_name LIKE concat("%", :search_input, "%")');

        $this->db->bind(':search_input', $search_input);

        return $row = $this->db->resultSet();
    }
    public function get_services_by_search($search_input)
    {
        $this->db->query('SELECT * FROM services WHERE p_name LIKE concat("%", :search_input, "%")');

        $this->db->bind(':search_input', $search_input);

        return $row = $this->db->resultSet();
    }

    public function get_productById($id)
    {
        $this->db->query('SELECT * FROM products WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
        
    }

    public function get_all_product_orders_by_created_by(){
        $this->db->query('SELECT * FROM orders where vendor_id = :vendor_id ORDER BY id DESC');

        $this->db->bind(':vendor_id', $_SESSION['rexkod_user_id']);

        $result = $this->db->resultSet();
        return $result;
    }
    public function get_all_service_orders_by_created_by(){
        $this->db->query('SELECT * FROM bookings where created_by_id = :created_by_id ORDER BY id DESC');

        $this->db->bind(':created_by_id', $_SESSION['rexkod_user_id']);

        $result = $this->db->resultSet();
        return $result;
    }

    public function get_orders_user($user_id) 
    {
        $this->db->query('SELECT * FROM orders where user_id = :user_id ORDER BY id DESC');

        $this->db->bind(':user_id', $user_id);

        $result = $this->db->resultSet();
        return $result;
    }
    public function get_bookings_user($user_id) 
    {
        $this->db->query('SELECT * FROM bookings where user_id = :user_id ORDER BY id DESC');

        $this->db->bind(':user_id', $user_id);

        $result = $this->db->resultSet();
        return $result;
    }

    public function get_orders_fromProdList($id) 
    {
        $this->db->query('SELECT * FROM payment where book_id = :book_id');

        $this->db->bind(':book_id', $id);

        $result = $this->db->single();
        return $result;
    }

    















}
