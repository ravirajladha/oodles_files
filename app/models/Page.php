<?php
class Page
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }



    public function get_dine_order($id) {
        $this->db->query('SELECT * FROM orders WHERE user_id = :uid AND table_id = :id AND status != :val AND order_type = 1  AND DATE(created_at) =:date_val');
         $this->db->bind(':id', $id);
         $this->db->bind(':val', 9);
         $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
         $this->db->bind(':date_val', date('Y-m-d'));
         $result = $this->db->resultSet();
         return $result;
    }

    

    public function get_dine_active_orders($id) {
        $this->db->query('SELECT * FROM orders WHERE user_id!=:uid AND table_id = :id AND order_type = 1 AND DATE(created_at) =:date_val AND payment_status=0 ');
         $this->db->bind(':id', $id);
         $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
         $this->db->bind(':date_val', date('Y-m-d'));
         $result = $this->db->single();
         return $result;
    }


    public function get_dine_cur_orders($id) {
        $this->db->query('SELECT * FROM orders WHERE user_id=:uid AND table_id != :id AND order_type = 1 AND DATE(created_at) =:date_val AND payment_status=0 ');
         $this->db->bind(':id', $id);
         $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
         $this->db->bind(':date_val', date('Y-m-d'));
         $result = $this->db->single();
         return $result;
    }


    public function get_dine_active_orders_pay($id) {
        $this->db->query('SELECT * FROM orders WHERE table_id = :id AND order_type = 1 AND DATE(created_at) =:date_val AND payment_status IS NULL');
         $this->db->bind(':id', $id);
         $this->db->bind(':date_val', date('Y-m-d'));
         $result = $this->db->resultSet();
         return $result;
    }


    public function get_dine_orders_pay($id) {
        $this->db->query('SELECT * FROM orders WHERE table_id = :id AND order_type = 1 AND DATE(created_at) =:date_val AND payment_status = 0 AND status = 2');
         $this->db->bind(':id', $id);
         $this->db->bind(':date_val', date('Y-m-d'));
         $result = $this->db->resultSet();
         return $result;
    }



    public function get_dine_orders_cash($id) {
        $this->db->query('SELECT * FROM orders WHERE table_id = :id AND order_type = 1 AND DATE(created_at) =:date_val AND user_id=:uid');
         $this->db->bind(':id', $id);
         $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
         $this->db->bind(':date_val', date('Y-m-d'));
         $result = $this->db->resultSet();
         return $result;
    }


    public function get_dine_orders_byId($orderid) {
        $this->db->query('SELECT * FROM dine_orders WHERE dine_order_id = :id');
         $this->db->bind(':id', $orderid);
        $result = $this->db->single();
        return $result;
    }


    public function get_vendor_dine_orders() {
        $this->db->query('SELECT * FROM dine_orders WHERE vendor_id = :id AND order_status = :val');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $this->db->bind(':val', 0);
         $result = $this->db->resultSet();
        return $result;
    }

    public function get_vendor_orders() {
        $this->db->query('SELECT * FROM orders WHERE vendor_id = :id AND status = :val');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $this->db->bind(':val', 0);
         $result = $this->db->resultSet();
        return $result;
    }


    public function get_vendor_orders_settlements_dine($id) {
        $this->db->query('SELECT * FROM orders WHERE vendor_id = :id AND order_type = 1 AND settled = 0 AND transaction_id IS NOT NULL');
         $this->db->bind(':id', $id);
         $result = $this->db->resultSet();
        return $result;
    }

    public function get_vendor_orders_settlements_delivery($id) {
        $this->db->query('SELECT * FROM orders WHERE vendor_id = :id AND order_type = 0 AND settled = 0 AND transaction_id IS NOT NULL');
         $this->db->bind(':id', $id);
         $result = $this->db->resultSet();
        return $result;
    }


    public function get_vendor_orders_settlements_pickup($id) {
        $this->db->query('SELECT * FROM orders WHERE vendor_id = :id AND order_type = 2 AND settled = 0 AND transaction_id IS NOT NULL');
         $this->db->bind(':id', $id);
         $result = $this->db->resultSet();
        return $result;
    }



    public function get_vendor_orders_settlements($id) {
        $this->db->query('SELECT * FROM orders WHERE vendor_id = :id AND settled = 0 AND transaction_id IS NOT NULL');
         $this->db->bind(':id', $id);
         $result = $this->db->resultSet();
        return $result;
    }

    


    public function get_vendor_dine_orders_all() {
        $this->db->query('SELECT * FROM dine_orders WHERE vendor_id = :id');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $result = $this->db->resultSet();
        return $result;
    }

    public function get_vendor_orders_all() {
        $this->db->query('SELECT * FROM orders WHERE vendor_id = :id AND DATE(created_at)=:today');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $this->db->bind(':today', date("Y-m-d"));
         $result = $this->db->resultSet();
        return $result;
    }


    public function get_vendor_all_orders() {
        $this->db->query('SELECT * FROM orders WHERE vendor_id = :id');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $result = $this->db->resultSet();
        return $result;
    }


    public function get_vendor_all_orders_today() {
        $this->db->query('SELECT * FROM orders WHERE vendor_id = :id AND DATE(created_at) =:today');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $this->db->bind(':today', date("Y-m-d"));
         $result = $this->db->resultSet();
        return $result;
    }


    public function get_vendor_all_orders_pay() {
        $this->db->query('SELECT * FROM orders WHERE status=2 AND vendor_id = :id AND DATE(created_at) =:today');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $this->db->bind(':today', date("Y-m-d"));
         $result = $this->db->resultSet();
        return $result;
    }

    public function sum_vendor_orders_all() {
        $this->db->query('SELECT SUM(sub_total) as total FROM orders WHERE vendor_id = :id AND DATE(created_at)=:today AND (status=1 OR status=2 )');
        $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
        $this->db->bind(':today', date("Y-m-d"));
         $result = $this->db->single();
        return $result;
    }


    

    public function count_vendor_orders_delivery() {
        $this->db->query('SELECT COUNT(order_type) as total FROM orders WHERE order_type=:type AND vendor_id = :id AND DATE(created_at)=:today');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $this->db->bind(':type', 0);
         $this->db->bind(':today', date("Y-m-d"));
         $result = $this->db->single();
        return $result;
    }
    
    
    public function count_vendor_orders_dine() {
        $this->db->query('SELECT COUNT(order_type) as total FROM orders WHERE order_type=:type AND vendor_id = :id AND DATE(created_at)=:today');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $this->db->bind(':type', 1);
         $this->db->bind(':today', date("Y-m-d"));
         $result = $this->db->single();
        return $result;
    }

    public function count_vendor_orders_pickup() {
        $this->db->query('SELECT COUNT(order_type) as total FROM orders WHERE order_type=:type AND vendor_id = :id AND DATE(created_at)=:today');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $this->db->bind(':type', 2);
         $this->db->bind(':today', date("Y-m-d"));
         $result = $this->db->single();
        return $result;
    }


    public function count_vendor_staffs() {
        $this->db->query('SELECT COUNT(id) as total FROM auth WHERE vendor_id = :id');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $result = $this->db->single();
        return $result;
    }


    public function count_vendor_customers()
    {
        $this->db->query("SELECT count(DISTINCT user_id) as total FROM orders WHERE vendor_id = :id");
        $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
        return $result = $this->db->single();
    }



    public function delivery_task($order_id,$task_id){
        // Prepare Query
        $this->db->query('INSERT INTO delivery (order_id, task_id, status) 
        VALUES (:order_id, :task_id, :status)');
  
        // Bind Values
        $this->db->bind(':order_id', $order_id);
        $this->db->bind(':task_id', $task_id);
        $this->db->bind(':status', "Order Created");
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }




      public function create_settlement($vendor_id,$order_ids,$amount,$commission,$transaction_id,$reciept_file){

        $this->db->query('INSERT INTO settlements (vendor_id,order_ids,amount,commission,transaction_id,reciept_file) 
        VALUES (:vendor_id,:order_ids,:amount,:commission,:transaction_id,:reciept_file)');
  
        $this->db->bind(':vendor_id', $vendor_id);
        $this->db->bind(':order_ids', $order_ids);
        $this->db->bind(':amount', $amount);
        $this->db->bind(':commission', $commission);
        $this->db->bind(':transaction_id', $transaction_id);
        $this->db->bind(':reciept_file', $reciept_file);
        
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }



    public function get_orders_all() {
        $this->db->query('SELECT * FROM orders WHERE DATE(created_at)=:today ORDER BY id DESC');
        $this->db->bind(':today', date("Y-m-d"));
        $result = $this->db->resultSet();
        return $result;
    }




    public function get_vendor_orders_admin($id) {
        $this->db->query('SELECT * FROM orders WHERE vendor_id=:vid AND DATE(created_at)=:today ORDER BY id DESC');
        $this->db->bind(':vid', $id);
        $this->db->bind(':today', date("Y-m-d"));
        $result = $this->db->resultSet();
        return $result;
    }
    

    public function get_vendor_dine_orders_accept() {
        $this->db->query('SELECT * FROM dine_orders WHERE vendor_id = :id AND order_status = :val');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $this->db->bind(':val', 1);
         $result = $this->db->resultSet();
        return $result;
    }


    public function get_vendor_settlements($id) {
        $this->db->query('SELECT * FROM settlements WHERE vendor_id = :id ORDER BY id DESC');
         $this->db->bind(':id', $id);
         $result = $this->db->resultSet();
        return $result;
    }



    public function get_settlements() {
        $this->db->query('SELECT * FROM settlements ORDER BY id DESC');
         $result = $this->db->resultSet();
        return $result;
    }


    public function get_vendor_orders_accept() {
        $this->db->query('SELECT * FROM orders WHERE vendor_id = :id AND status = :val');
         $this->db->bind(':id', $_SESSION['rexkod_vendor_id']);
         $this->db->bind(':val', 1);
         $result = $this->db->resultSet();
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
    public function check_phone_and_type($phno,$type)
    {
        $this->db->query('SELECT * FROM auth WHERE phone = :phno and type=:type');
        // Bind values      
        $this->db->bind(':phno', $phno);
        $this->db->bind(':type', $type);
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


    public function add_user($name, $email, $phno, $pass)
    {
        $this->db->query('INSERT INTO auth (name,type,email,phone,password,created_at) VALUES(:name,:type, :email, :phno, :pass, :createdat)');
        // Bind values
        
        $this->db->bind(':name', $name);
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

public function dunzo($val)
{
    $this->db->query('INSERT INTO dunzo (val) VALUES(:val)');
    // Bind values
    
    $this->db->bind(':val', $val);
    // Execute

    if ($this->db->execute()) {
        return true;
    }else {
        return false;
    }
}



public function add_banner($banner_file)
{
    $this->db->query('INSERT INTO banners (banner_file) VALUES(:banner_file)');
    // Bind values
    
    $this->db->bind(':banner_file', $banner_file);
    // Execute

    if ($this->db->execute()) {
        return true;
    }else {
        return false;
    }
}



public function create_rating($orderid,$vendorid,$rating,$review)
{
    $this->db->query('INSERT INTO ratings (user_id,order_id,vendor_id,rating,review) VALUES(:userid,:orderid,:vendorid,:rating,:review)');
    $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
    $this->db->bind(':orderid', $orderid);
    $this->db->bind(':vendorid', $vendorid);
    $this->db->bind(':rating', $rating);
    $this->db->bind(':review', $review);
    if ($this->db->execute()) {
        return true;
    }else {
        return false;
    }
}


public function add_vendor_staff($name, $email, $phno, $sub_type)
{
    
    $pass = password_hash($phno, PASSWORD_DEFAULT);
    
    $this->db->query('INSERT INTO auth (name,type,email,phone,password,created_at,sub_type,vendor_id) VALUES(:name,:type, :email, :phno, :pass, :createdat, :sub_type, :vendor_id)');
    // Bind values
    $this->db->bind(':name', $name);
    $this->db->bind(':type', 'vendor');
    $this->db->bind(':email', $email);
    $this->db->bind(':phno', $phno);
    $this->db->bind(':pass', $pass);
    $this->db->bind(':createdat', date('Y-m-d H:i:s'));
    $this->db->bind(':sub_type', $sub_type);
    $this->db->bind(':vendor_id', $_SESSION['rexkod_vendor_id']);
    // Execute

    if ($this->db->execute()) {
        return true;
    }else {
        return false;
    }
}



public function dine_order_create($vendorid,$tableid,$items,$orderval,$total,$name,$phone,$paymode)
{
    $this->db->query('INSERT INTO dine_orders (vendor_id,table_id,order_items,order_val,order_total,order_name,order_phone,payment_mode) VALUES(:vendorid,:tableid,:items,:orderval,:total,:name,:phone,:paymode)');
    // Bind values
    
    $this->db->bind(':vendorid', $vendorid);
    $this->db->bind(':tableid', $tableid);
    $this->db->bind(':items', $items);
    $this->db->bind(':orderval', $orderval);
    $this->db->bind(':total', $total);
    $this->db->bind(':name', $name);
    $this->db->bind(':phone', $phone);
    $this->db->bind(':paymode', $paymode);
    // Execute

    if ($this->db->execute()) {
        return true;
    }else {
        return false;
    }
}



public function order_create($type, $user_id, $vendor_id, $address_id, $name, $email, $phone, $items, $sub_total, $total, $net_total, $transaction_id )
{
    if($_SESSION['coupon_val']){
        $coupon_val = $_SESSION['coupon_val'];
    } else {
        $coupon_val = 0;
    }
    $this->db->query('INSERT INTO orders (order_type, user_id,vendor_id,address_id,name,email,phone,items,total,delivery_cost, tax_percentage, tax_value, sub_total, coupon_id, coupon_value, net_total,instruction,created_at,payment_status,transaction_id) VALUES(:type,:userid,:vendorid,:addressid,:name,:email,:phone,:items,:total,:delivery_cost,:tax_percentage,:tax_value,:subtotal,:coupon_id,:coupon_value,:nettotal,:instruction,:created_at,:payment_status,:transaction_id)');
    // Bind values
    
    $this->db->bind(':type', $type);
    $this->db->bind(':userid', $user_id);
    $this->db->bind(':vendorid', $vendor_id);
    $this->db->bind(':addressid', $address_id);
    $this->db->bind(':name', $name);
    $this->db->bind(':email', $email);
    $this->db->bind(':phone', $phone);
    $this->db->bind(':items', $items);
    $this->db->bind(':total', $total);
    $this->db->bind(':delivery_cost', $_SESSION['delivery_cost']);
    $this->db->bind(':tax_percentage', 5);
    $this->db->bind(':tax_value', $_SESSION['tax_val']);
    $this->db->bind(':subtotal', $sub_total);
    $this->db->bind(':coupon_id', $_SESSION['coupon_id']);
    $this->db->bind(':coupon_value', $coupon_val);
    $this->db->bind(':nettotal', $net_total);
    $this->db->bind(':instruction', $_SESSION['instruction']);
    $this->db->bind(':payment_status', 1);
    $this->db->bind(':transaction_id', $transaction_id);
    $this->db->bind(':created_at', date('Y-m-d H:i:s')); 
    // Execute

    if ($this->db->execute()) {
        return true;
    }else {
        return false;
    }
}



public function order_create_dine($user_id, $vendor_id, $table_id, $name, $email, $phone, $items, $sub_total, $total, $net_total )
{
    $this->db->query('INSERT INTO orders (order_type,user_id,vendor_id,table_id,name,email,phone,items,sub_total,total,net_total) VALUES(:otype,:userid,:vendorid,:tableid,:name,:email,:phone,:items,:subtotal,:total,:nettotal)');
    // Bind values
    
    $this->db->bind(':otype', 1);
    $this->db->bind(':userid', $user_id);
    $this->db->bind(':vendorid', $vendor_id);
    $this->db->bind(':tableid', $table_id);
    $this->db->bind(':name', $name);
    $this->db->bind(':email', $email);
    $this->db->bind(':phone', $phone);
    $this->db->bind(':items', $items);
    $this->db->bind(':subtotal', $sub_total);
    $this->db->bind(':total', $total);
    $this->db->bind(':nettotal', $net_total);
    // Execute

    if ($this->db->execute()) {
        return true;
    }else {
        return false;
    }
}



public function add_table($table_name)
{
    $this->db->query('INSERT INTO tables (vendor_id,table_name) VALUES(:vid, :name)');
    // Bind values
    
    $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
    $this->db->bind(':name', $table_name);
    // Execute

    if ($this->db->execute()) {
        return true;
    }else {
        return false;
    }
}



    public function add_vendor($name, $rname, $img, $email, $phone, $pass, $address, $latlong, $gst, $fssai, $start_time, $end_time, $start_time2, $end_time2, $bank_number, $bank_ifsc, $gst_file, $fssai_file, $verified)
    {

        $this->db->query('INSERT INTO auth (name,type, email, phone, password, status, created_at) VALUES(:name, :type,:email, :phone, :pass, :status, :created_at)');
        // Bind values
        $this->db->bind(':name', $name);
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
                 
            $this->db->query('INSERT INTO vendors (vendor_id,vendor_name, vendor_img, vendor_address, vendor_latlong,vendor_gst, vendor_fssai, vendor_start_time, vendor_end_time, vendor_start_time2, vendor_end_time2, vendor_bank_account, vendor_bank_ifsc, vendor_verified, gst_file, fssai_file) VALUES(:vendorid, :rname, :img, :address, :latlong, :gst, :fssai, :start_time, :end_time, :start_time2, :end_time2, :bank_number, :bank_ifsc, :verified, :gst_file, :fssai_file)');
            // Bind values
            $this->db->bind(':vendorid', $cur_user->id);
            $this->db->bind(':rname', $rname);
            $this->db->bind(':img', $img);
            $this->db->bind(':address', $address);
            $this->db->bind(':latlong', $latlong);
            $this->db->bind(':gst', $gst);
            $this->db->bind(':fssai', $fssai);
            $this->db->bind(':start_time', $start_time);
            $this->db->bind(':end_time', $end_time);
            $this->db->bind(':start_time2', $start_time2);
            $this->db->bind(':end_time2', $end_time2);
            $this->db->bind(':bank_number', $bank_number);
            $this->db->bind(':bank_ifsc', $bank_ifsc);
            $this->db->bind(':verified', $verified);
            $this->db->bind(':gst_file', $gst_file);
            $this->db->bind(':fssai_file', $fssai_file);
    
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }


    public function add_vendor_profile($name, $address, $city, $state, $pincode, $gst, $timing, $minval,$subcat_id)
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

            $this->db->query('INSERT INTO vendors (vendor_id,vendor_name, vendor_address, vendor_city,vendor_state, vendor_pincode, vendor_gst, vendor_gst_cert, vendor_timing, vendor_minorder, vendor_subcategory_id) VALUES(:vendorid, :name, :address, :city, :state, :pincode, :gst, :gstcert, :timing, :minval, :subcat_id)');
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
            // Executevendor_verified
    
            if ($this->db->execute()) {
                return true;
            } else {
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



  



    public function get_vendor_subcategory($id)
    {
        $this->db->query('SELECT * FROM subcategory WHERE subcategory_vendor_id = :vid order by subcategory_id DESC');
        $this->db->bind(':vid', $id);
        
        return $this->db->resultSet();
    }


    public function get_vendor_category($id)
    {   $time= date('Y-m-d H:i:s');
        $this->db->query('SELECT * FROM category WHERE category_status=1 AND category_vendor_id = :vid AND (category_start_time < :time AND category_end_time > :time)order by category_id DESC');
        $this->db->bind(':vid', $id);
        $this->db->bind(':time', $time);
        return $this->db->resultSet();
    }






      // Get Post By ID
      public function getVendorById($id){
        $this->db->query('SELECT * FROM vendors WHERE vendor_id = :id');
  
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


      public function getrating_order($id){
        $this->db->query('SELECT * FROM ratings WHERE order_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }



      public function get_ratings_vendor($id){
        $this->db->query('SELECT * FROM ratings WHERE vendor_id = :id ORDER BY rating_id DESC');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->resultSet();
  
        return $row;
      }


      public function getAddressById($id){
        $this->db->query('SELECT * FROM address WHERE address_id = :id');
  
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }


      public function getneworder(){
        $this->db->query('SELECT * FROM orders WHERE user_id = :userid ORDER BY id DESC LIMIT 1');
  
        $this->db->bind(':userid', $_SESSION['rexkod_user_id']);
        
        $row = $this->db->single();
  
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



      public function delete_banner($id){
        // Prepare Query
        $this->db->query('DELETE FROM banners WHERE banner_id = :id');
  
        // Bind Values
        $this->db->bind(':id', $id);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }


      
      public function dine_cart_del($id){
        // Prepare Query
        $this->db->query('DELETE FROM cart_dine WHERE table_id = :id');
  
        // Bind Values
        $this->db->bind(':id', $id);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }


      public function cart_del($id){
        // Prepare Query
        $this->db->query('DELETE FROM cart WHERE cart_user_id = :id');
  
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

    public function get_all_subscription_plan()
    {
        $this->db->query('SELECT * FROM subscription where status=:status ');
        $this->db->bind(':status', '1');

        return $this->db->resultSet();
    }
    
    public function create_cart($vid,$items)
    {

        $this->db->query('SELECT * FROM cart WHERE cart_user_id = :uid');
        $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
        $cart_found = $this->db->single();
        
        if ($cart_found) 
        {
            
            $this->db->query('UPDATE cart SET cart_vendor_id=:vid, items=:items WHERE id=:id');
            $this->db->bind(':id', $cart_found->id);
            $this->db->bind(':vid', $vid);
            $this->db->bind(':items', $items);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->query('INSERT INTO cart(cart_user_id, cart_vendor_id, items) VALUES (:id,:vid,:items)');
            $this->db->bind(':id', $_SESSION['rexkod_user_id']);
            $this->db->bind(':vid', $vid);
            $this->db->bind(':items', $items);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }



    public function dine_cart_item($id,$table,$qty,$name,$price)
    {
        $total = $price * $qty;
        $this->db->query('SELECT * FROM cart_dine WHERE item_id = :id AND table_id = :tid AND user_id = :uid');
        $this->db->bind(':id', $id);
        $this->db->bind(':tid', $table);
        $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
        $cart_item = $this->db->single();

        if ($cart_item){
            $this->db->query('UPDATE cart_dine SET item_qty=:qty, item_total_price=:total WHERE id=:id');
            $this->db->bind(':id', $cart_item->id);
            $this->db->bind(':qty', $qty);
            $this->db->bind(':total', $total);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->query('INSERT INTO cart_dine(item_id, user_id, item_name, item_price, item_qty, item_total_price, table_id, created_at) VALUES (:id,:uid,:name,:price,:qty,:total,:tableid,:createdat)');
            $this->db->bind(':id', $id);
            $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
            $this->db->bind(':name', $name);
            $this->db->bind(':price', $price);
            $this->db->bind(':qty', $qty);
            $this->db->bind(':total', $total);
            $this->db->bind(':tableid', $table);
            $this->db->bind(':createdat', date('Y-m-d H:i:s')); 

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }


    public function getItemById($id)
    {
        $this->db->query("SELECT * FROM items where item_id = :id ");

        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }



    public function getItemByCat($id)
    {
        $this->db->query("SELECT * FROM items where item_status=1 AND item_cat_id = :id AND item_discount_price=0 AND item_price!=0 AND stock != 0");

        $this->db->bind(':id', $id);

        return $this->db->resultSet();
    }



    public function getItemByCat_sale($id)
    {
        $this->db->query("SELECT * FROM items where item_status=1 AND item_cat_id = :id AND item_discount_price!=0 AND item_price!=0 AND stock != 0");

        $this->db->bind(':id', $id);

        return $this->db->resultSet();
    }



    public function get_sum_cart()
    {
        $this->db->query('SELECT * FROM cart WHERE cart_user_id =:cart_user_id');
        $this->db->bind(':cart_user_id', $_SESSION['rexkod_user_id']);
        $x = $this->db->resultSet();
        $a = 0;
        foreach ($x as $k) {
            $a = $a + $k->item_total_price;
        }
        return $a;
    }
    public function getcart_items()
    {
        $this->db->query('SELECT * FROM cart WHERE cart_user_id=:cart_user_id');
        $this->db->bind(':cart_user_id', $_SESSION['rexkod_user_id']);
        return $results = $this->db->single();
    }


    public function getcart_items_dine($id)
    {
        $this->db->query('SELECT * FROM cart_dine WHERE user_id=:uid AND table_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
        return $this->db->resultSet();
    }




  




    public function get_cart_user_check()
    {
        $this->db->query('SELECT * FROM cart WHERE cart_user_id=:usid');
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
        $this->db->query("DELETE FROM cart WHERE cart_user_id=:id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getcart_items_by_item_id($item_id)
    {
        $this->db->query('SELECT * FROM cart WHERE item_id=:item_id AND cart_user_id=:cart_user_id');
         $this->db->bind(':item_id', $item_id);
        $this->db->bind(':cart_user_id', $_SESSION['rexkod_user_id']);
        return $this->db->single();
    }
    public function delete_item_to_cart_db($data)
    {
        $this->db->query('UPDATE cart SET item_qty=:qty, item_total_price=:total, item_price=:item_price WHERE id=:id AND cart_user_id=:cart_user_id');
        $this->db->bind(':id', $data['cart_id']);
        $this->db->bind(':qty', $data['qty']);
        $this->db->bind(':item_price', $data['price']);
        $this->db->bind(':total', $data['total']);
        $this->db->bind(':cart_user_id', $_SESSION['rexkod_user_id']);
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
        $this->db->query("DELETE FROM cart WHERE id = :id AND cart_user_id=:cart_user_id");
        $this->db->bind(':id', $data['cart_id']);
        $this->db->bind(':cart_user_id', $_SESSION['rexkod_user_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function convert_temp_id_to_user_id_for_pcart()
    {
        $d ='';
        $this->db->query('SELECT * FROM cart WHERE cart_user_id =:cart_user_id');
        $this->db->bind(':cart_user_id', $_SESSION['rexkod_user_id_rec']);
        $x = $this->db->resultSet();
        foreach ($x as $k) 
        {
            $this->db->query('UPDATE cart SET cart_user_id=:cart_user_id WHERE id=:id');
            $this->db->bind(':id', $k->id);
            $this->db->bind(':cart_user_id', $_SESSION['rexkod_user_id']);
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

    public function get_tables_vendor($id)
    {
        $this->db->query("SELECT * FROM tables where vendor_id = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();

    }


    public function get_staff_vendor()
    {
        $this->db->query("SELECT * FROM auth WHERE sub_type IS NOT NULL AND vendor_id =:vid");
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        return $this->db->resultSet();

    }

    public function get_table_detail($id)
    {
        $this->db->query("SELECT * FROM tables where table_id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();

    }

    public function get_custinfo($id)
    {
        $this->db->query("SELECT * FROM users where user_id = :id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }



    public function ulogin_using_rowId($id)
    {
        $this->db->query('SELECT * FROM vendors WHERE vendor_id = :vendor_id');
        $this->db->bind(':vendor_id', $id);
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






    public function get_vendor_report_sale_all($sdate,$edate) 
    {
        $this->db->query('SELECT * FROM orders WHERE vendor_id=:vid AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $result = $this->db->resultSet();
        return $result;
    }



    public function get_vendor_report_sale_online($sdate,$edate) 
    {
        $this->db->query('SELECT * FROM orders WHERE vendor_id=:vid AND order_type=:type AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $this->db->bind(':type', 0);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_vendor_report_sale_dine($sdate,$edate) 
    {
        $this->db->query('SELECT * FROM orders WHERE vendor_id=:vid AND order_type=:type AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $this->db->bind(':type', 1);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_vendor_report_sale_self($sdate,$edate) 
    {
        $this->db->query('SELECT * FROM orders WHERE vendor_id=:vid AND order_type=:type AND DATE(created_at) BETWEEN :sdate AND :edate ORDER BY id desc');
        $this->db->bind(':vid', $_SESSION['rexkod_vendor_id']);
        $this->db->bind(':sdate', $sdate);
        $this->db->bind(':edate', $edate);
        $this->db->bind(':type', 2);
        $result = $this->db->resultSet();
        return $result;
    }




    public function get_sum_cart_for_payment()
    {
        $this->db->query('SELECT * FROM cart WHERE cart_user_id =:cart_user_id');
        $this->db->bind(':cart_user_id', $_SESSION['rexkod_user_id']);
        $x = $this->db->resultSet();
        $a = 0;
        foreach ($x as $k) {
            $a = $a + $k->item_total_price;
        }
        return $a;
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


    public function update_vendor_staff($name, $email, $phno, $id)
    {


        $this->db->query('UPDATE auth SET name = :name, email = :email, phone = :phno WHERE id = :id');

        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phno', $phno);
        $this->db->bind(':id', $id);
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function update_password($phone, $pass)
    {


        $this->db->query('UPDATE auth SET password = :pass WHERE phone = :phone');

        // Bind values
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function update_item_discount($id, $discount_cost)
    {
        $this->db->query('UPDATE items SET item_discount_price=:discount WHERE item_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':discount', $discount_cost);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function update_item_stock($id, $stock)
    {
        $this->db->query('UPDATE items SET stock=:stock WHERE item_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':stock', $stock);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function update_stock_order($id, $qty)
    {
        $this->db->query('UPDATE items SET stock = stock - :qty WHERE item_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':qty', $qty);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function update_item_discount_dine($id, $discount_cost)
    {
        $this->db->query('UPDATE items SET item_discount_price_dine=:discount WHERE item_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':discount', $discount_cost);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function update_item_status($id, $status)
    {
        $this->db->query('UPDATE items SET item_status=:status WHERE item_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function update_item($item_name, $item_type, $item_cat_id, $item_desc, $item_price,$item_price_dine, $item_img, $id)
    {
        
        $this->db->query('UPDATE items SET item_name=:item_name, item_type=:item_type, item_cat_id=:item_cat_id, item_img=:item_img, item_desc=:item_desc, item_price=:item_price, item_price_dine=:item_price_dine WHERE item_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':item_name', $item_name);
        $this->db->bind(':item_type', $item_type);
        $this->db->bind(':item_cat_id', $item_cat_id);
        $this->db->bind(':item_img', $item_img);
        $this->db->bind(':item_desc', $item_desc);
        $this->db->bind(':item_price', $item_price);
        $this->db->bind(':item_price_dine', $item_price_dine);
        
        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function update_category_status($id, $status)
    {
        $this->db->query('UPDATE category SET category_status=:status WHERE category_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function update_category($category_name,$category_img,$category_start_time,$category_end_time,$id)
    {
        $this->db->query('UPDATE category set category_name = :category_name, category_img = :category_img,category_start_time = :category_start_time,category_end_time = :category_end_time WHERE category_id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':category_name', $category_name);
        $this->db->bind(':category_img', $category_img);
        $this->db->bind(':category_start_time', $category_start_time);
        $this->db->bind(':category_end_time', $category_end_time);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }





    public function update_vendor_status($id, $status)
    {
        $this->db->query('UPDATE vendors SET vendor_status=:status WHERE vendor_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function update_vendor_featured($id, $status)
    {
        $this->db->query('UPDATE vendors SET featured=:status WHERE vendor_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }




    public function update_vendor_verified($id, $status)
    {
        $this->db->query('UPDATE vendors SET vendor_verified=:status WHERE vendor_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }






    public function update_vendor($name, $vendor_name, $vendor_img, $email, $phone, $pass, $vendor_address, $vendor_latlong, $vendor_gst, $vendor_fssai, $vendor_start_time, $vendor_end_time, $vendor_start_time2, $vendor_end_time2, $vendor_bank_account, $vendor_bank_ifsc, $gst_file, $fssai_file, $id)
    {
        $this->db->query('UPDATE auth SET name=:name,email=:email,phone=:phone,password=:pass WHERE id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);

        if ($this->db->execute()) 
        {
        $this->db->query('UPDATE vendors SET vendor_name=:vendor_name, vendor_img=:vendor_img, vendor_address=:vendor_address, vendor_latlong=:vendor_latlong, vendor_gst=:vendor_gst, vendor_fssai=:vendor_fssai, vendor_start_time=:vendor_start_time, vendor_end_time=:vendor_end_time, vendor_start_time2=:vendor_start_time2, vendor_end_time2=:vendor_end_time2, vendor_bank_account=:vendor_bank_account, vendor_bank_ifsc=:vendor_bank_ifsc, gst_file=:gst_file, fssai_file=:fssai_file WHERE vendor_id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':vendor_name', $vendor_name);
        $this->db->bind(':vendor_img', $vendor_img);
        $this->db->bind(':vendor_address', $vendor_address);
        $this->db->bind(':vendor_latlong', $vendor_latlong);
        $this->db->bind(':vendor_gst', $vendor_gst);
        $this->db->bind(':vendor_fssai', $vendor_fssai);
        $this->db->bind(':vendor_start_time', $vendor_start_time);
        $this->db->bind(':vendor_end_time', $vendor_end_time);
        $this->db->bind(':vendor_start_time2', $vendor_start_time2);
        $this->db->bind(':vendor_end_time2', $vendor_end_time2);
        $this->db->bind(':vendor_bank_account', $vendor_bank_account);
        $this->db->bind(':vendor_bank_ifsc', $vendor_bank_ifsc);
        $this->db->bind('gst_file', $gst_file);
        $this->db->bind(':fssai_file', $fssai_file);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
        } 
        else 
        {
            return false;
        }
    }





    public function update_page_count($id)
    {
        $this->db->query('UPDATE page_counter SET pc_val = pc_val +1  WHERE pc_id=:id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function accept_dine_order($orderid)
    {
        $this->db->query('UPDATE dine_orders SET order_status = :status WHERE dine_order_id=:id');

        $this->db->bind(':id', $orderid);
        $this->db->bind(':status', 1);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function complete_dine_order($orderid)
    {
        $this->db->query('UPDATE dine_orders SET order_status = :status WHERE dine_order_id=:id');

        $this->db->bind(':id', $orderid);
        $this->db->bind(':status', 2);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function reject_dine_order($orderid)
    {
        $this->db->query('UPDATE dine_orders SET order_status = :status WHERE dine_order_id=:id');

        $this->db->bind(':id', $orderid);
        $this->db->bind(':status', 9);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function accept_order($orderid)
    {
        $this->db->query('UPDATE orders SET status = :status WHERE id=:id');

        $this->db->bind(':id', $orderid);
        $this->db->bind(':status', 1);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function complete_order($orderid)
    {
        $this->db->query('UPDATE orders SET status = :status WHERE id=:id');

        $this->db->bind(':id', $orderid);
        $this->db->bind(':status', 2);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function order_paid($orderid)
    {
        $this->db->query('UPDATE orders SET payment_status = :status WHERE id=:id');

        $this->db->bind(':id', $orderid);
        $this->db->bind(':status', 1);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function order_picked($orderid)
    {
        $this->db->query('UPDATE orders SET picked = :status WHERE id=:id');

        $this->db->bind(':id', $orderid);
        $this->db->bind(':status', 1);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    
    public function order_settled($orderid)
    {
        $this->db->query('UPDATE orders SET settled = :status WHERE id=:id');

        $this->db->bind(':id', $orderid);
        $this->db->bind(':status', 1);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function pay_cash($orderid)
    {
        $this->db->query('UPDATE orders SET pay_cash = :status WHERE id=:id');

        $this->db->bind(':id', $orderid);
        $this->db->bind(':status', 1);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    public function order_paid_dine($orderid,$txn_id)
    {
        $this->db->query('UPDATE orders SET payment_status = :status,transaction_id =:txn_id WHERE id=:id');
        $this->db->bind(':id', $orderid);
        $this->db->bind(':txn_id', $txn_id);
        $this->db->bind(':status', 1);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }


    public function reject_order($orderid)
    {
        $this->db->query('UPDATE orders SET status = :status WHERE id=:id');

        $this->db->bind(':id', $orderid);
        $this->db->bind(':status', 9);

        if ($this->db->execute()) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }



    public function item_update($orderid,$orderval)
    {
        $this->db->query('UPDATE orders SET items = :orderval WHERE id=:id');

        $this->db->bind(':id', $orderid);
        $this->db->bind(':orderval', $orderval);

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
        $this->db->query('UPDATE cart SET coupon_id=:coup_id WHERE cart_user_id=:uid');

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

     public function get_address() {
        $this->db->query('SELECT * FROM address WHERE user_id = :user_id');
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



    public function add_address($area, $address, $name)
    {
        $latlong = $_SESSION['user_lat'].",".$_SESSION['user_lon'];
        $this->db->query('INSERT INTO address (user_id, latlong, area, address, name) VALUES(:uid, :latlong, :area, :address, :name)');
        // Bind values

        $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
        $this->db->bind(':latlong', $latlong);
        $this->db->bind(':area', $area);
        $this->db->bind(':address', $address);
        $this->db->bind(':name', $name);
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


    public function add_cart_for_paymentPayAtdel($name, $email, $phno, $add, $city, $state, $zipcode, $country, $data, $data_checkout)
    {
        
        $this->db->query('INSERT INTO orders (name, email, phone, address, city, state, zipcode, country,vendor_id, user_id, sub_total, coupon_id, coupon_value, total, buyer_protection, tax_percentage, tax_value, shipping, net_total, created_at) VALUES(:name, :email, :phno, :add, :city, :state, :zipcode, :country, :vendorid, :userid, :subtotal, :couponid, :couponval, :total, :buyerpro, :taxpercentage, :taxval, :shipping, :nettotal, :createdat)');

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
        

        // Execute
        if ($this->db->execute()) {

            $this->db->query('SELECT id FROM orders WHERE user_id = :uid ORDER BY id DESC');
            $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
            $temp = $this->db->single();

            $this->db->query('SELECT * FROM cart WHERE cart_user_id =:cart_user_id');
            $this->db->bind(':cart_user_id', $_SESSION['rexkod_user_id']);
            $x = $this->db->resultSet();

            foreach ($x as $k) 
            {
                $s = '';
                $this->db->query('INSERT INTO product_order_list(item_id, item_name, item_qty, item_price, item_total_price, cart_user_id, p_id,p_img) VALUES (:id,:name,:qty,:price,:total,:cart_user_id,:p_id,:p_img)');
                $this->db->bind(':id', $k->item_id);
                $this->db->bind(':name', $k->item_name);
                $this->db->bind(':qty', $k->item_qty);
                $this->db->bind(':price', $k->item_price);
                $this->db->bind(':total', $k->item_total_price);
                $this->db->bind(':cart_user_id', $_SESSION['rexkod_user_id']);
                $this->db->bind(':p_id', $temp->id);
                $this->db->bind(':p_img', $k->img);

                $xq = $this->db->execute();
            }

            $this->db->query("DELETE FROM cart WHERE cart_user_id=:cart_user_id");
            $this->db->bind(':cart_user_id', $_SESSION['rexkod_user_id']);

            return($this->db->execute());
        
        } else {
            die("Something Went Wrong");
        }
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


    
     public function get_all_vendors(){
        $this->db->query("SELECT * FROM vendors ORDER BY vendor_id DESC");
  
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
        $time= date('Y-m-d H:i:s');
        $this->db->query('SELECT * FROM vendors WHERE vendor_status = 1 AND vendor_verified = 1 AND ((vendor_start_time < :time AND vendor_end_time > :time) OR (vendor_start_time2 < :time AND vendor_end_time2 > :time))');
        $this->db->bind(':time', $time);
        return $this->db->resultSet();
    }

    public function get_all_products_forVendor($id) 
    {
        $this->db->query('SELECT * FROM products where cart_user_idId = :cart_user_idId');

        $this->db->bind(':cart_user_idId', $id);

        $result = $this->db->resultSet();
        return $result;
    }


    public function get_all_vendor_items($id) 
    {
        $this->db->query('SELECT * FROM items where item_vendor_id = :vid');

        $this->db->bind(':vid', $id);

        $result = $this->db->resultSet();
        return $result;
    }

    public function get_all_vendor_items_dine($id) 
    {
        $this->db->query('SELECT * FROM items where item_vendor_id = :vid AND item_price_dine != 0 AND stock != 0');

        $this->db->bind(':vid', $id);

        $result = $this->db->resultSet();
        return $result;
    }


    public function get_all_vendor_items_food($id,$food) 
    {
        $this->db->query("SELECT * FROM items where item_vendor_id = :vid AND item_name LIKE :food");

        $this->db->bind(':vid', $id);
        $this->db->bind(':food', "%".$food."%");
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_productsBySearch($search_input)
    {
        $this->db->query('SELECT * FROM products WHERE p_name LIKE concat("%", :search_input, "%")');

        $this->db->bind(':search_input', $search_input);

        return $row = $this->db->resultSet();
    }

    public function get_search_results($search_input)
    {
        $this->db->query('SELECT DISTINCT item_vendor_id AS vendor_id FROM items WHERE item_name LIKE concat("%", :search_input, "%")');
        $this->db->bind(':search_input', $search_input);
        $row1 = $this->db->resultSet();

        $this->db->query('SELECT DISTINCT vendor_id FROM vendors WHERE vendor_name LIKE concat("%", :search_input, "%")');
        $this->db->bind(':search_input', $search_input);
        $row2 = $this->db->resultSet();

        return $row = array_merge ($row1, $row2);
    }

    public function get_productById($id)
    {
        $this->db->query('SELECT * FROM products WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
        
    }


    public function get_orders_user($user_id) 
    {
        $this->db->query('SELECT * FROM orders where user_id = :user_id ORDER BY id DESC');

        $this->db->bind(':user_id', $user_id);

        $result = $this->db->resultSet();
        return $result;
    }


    public function check_coupon_usage($id) 
    {
        $this->db->query('SELECT * FROM orders where coupon_id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->resultSet();
        return $result;
    }


    public function get_orders_all_user() 
    {
        $this->db->query('SELECT * FROM orders where user_id = :user_id ORDER BY id DESC');

        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);

        $result = $this->db->resultSet();
        return $result;
    }


    public function get_orders() 
    {
        $this->db->query('SELECT * FROM orders where user_id = :user_id AND DATE(created_at) =:date_val ORDER BY id DESC');

        $this->db->bind(':user_id', $_SESSION['rexkod_user_id']);
        $this->db->bind(':date_val', date('Y-m-d'));
        $result = $this->db->resultSet();
        return $result;
    }
    
public function get_delivery_order($order_id){
    $this->db->query("SELECT * FROM delivery WHERE order_id = :order_id");
    $this->db->bind(':order_id', $order_id);
    $row = $this->db->single();
    return $row;
  }


    public function get_orders_fromProdList($id) 
    {
        $this->db->query('SELECT * FROM payment where book_id = :book_id');

        $this->db->bind(':book_id', $id);

        $result = $this->db->single();
        return $result;
    }



       

          public function get_coupon($coupon){
            $this->db->query("SELECT * FROM coupons WHERE coupon_code = :coupon");
            $this->db->bind(':coupon', $coupon);
            $row = $this->db->single();
            return $row;
          }



          public function get_all_coupons($vid)
          {
              $this->db->query('SELECT * FROM coupons WHERE coupon_vendor_id = :val OR coupon_vendor_id = :vid order by coupon_id DESC');
              $this->db->bind(':val', '1');
              $this->db->bind(':vid', $vid);
              return $this->db->resultSet();
          }

          public function get_all_banners()
          {
              $this->db->query('SELECT * FROM banners order by banner_id DESC');
              return $this->db->resultSet();
          }
  
    }  

    
















