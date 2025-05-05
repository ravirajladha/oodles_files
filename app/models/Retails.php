<?php
class Retails
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
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
    public function add_user_otp($email, $phno,$name)
    {
        $this->db->query('INSERT INTO auth (type,name,email,phone,created_at) VALUES(:type,:name, :email, :phno, :createdat)');
        // Bind values
        
        $this->db->bind(':type', 'retail');
        $this->db->bind(':name', $name);
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
    public function get_user_info($phone){
        $this->db->query('SELECT * FROM users WHERE cell_number = :phone');

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

    public function get_salary_detail_single($phno){
        $this->db->query('SELECT * FROM salary where Emp_Id = (select mec_id from users where cell_number = :phno)');
        // INNER JOIN users where users.user_id = salary.Emp_Id AND users.cell_number = :phno');
        $this->db->bind(':phno',$phno);
        $row = $this->db->single();
        return $row;

    }
   
public function get_today_attendance($id){
    $this->db->query('SELECT * FROM attendance where user_id=:user_id AND start_date = :start_date');
    $this->db->bind(':user_id',$id);
    $this->db->bind(':start_date',date('y-m-d'));
    $row = $this->db->resultSet();
    return $row;


}
public function apply_leave($type_of_leave, $start_date, $end_date,$number_of_days,$get_current_user)
{
    $this->db->query('INSERT INTO leaves (type,user_id,start_date,end_date,number_of_days) VALUES (:type,:user_id,:start_date,:end_date,:number)');
    $this->db->bind(':type', $type_of_leave);
    $this->db->bind(':start_date', $start_date);
    $this->db->bind(':end_date', $end_date);
    $this->db->bind(':user_id', $get_current_user);
    //  echo $get_current_user;
    //  die();
    // $diff = strtotime($end_date)-strtotime($start_date);

    // $diff = abs(strtotime($end_date) - strtotime($start_date));
    // $print_date = getdate($diff);
    // echo(strtotime($print_date));
    // echo ($diff);
    // die();

   
    $this->db->bind(':number', $number_of_days);
   

  

    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}
public function add_punch_in($data)
{
    $this->db->query('INSERT INTO attendance (user_id,start_date,start_time) VALUES(:user_id,:start_date,:start_time)');
    // Bind values
    
$this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':start_date', $data['current_date']);
    $this->db->bind(':start_time', $data['current_time']);

    if ($this->db->execute()) {
        return true;
    }else {
        return false;
    }
}



public function create_order($name,$phone,$village,$taluk,$district,$water_source_depth,$water_source_start,$water_available,$water_suction_depth,$irrigation_type,$acres,$source,$electricity_available,$diesel_engine,$diesel_consumption,$know_mecwin,$how_know_mecwin,$pump_needed_month,$product_id)
{
    
    
    

    $this->db->query('INSERT INTO orders(user_id,name,phone,village,taluk,district,water_source_depth,water_source_start,water_available,water_suction_depth,irrigation_type,acres,source,electricity_available,diesel_engine,diesel_consumption,know_mecwin,how_know_mecwin,pump_needed_month,product_id) VALUES (:uid,:name,:phone,:village,:taluk,:district,:water_source_depth,:water_source_start,:water_available,:water_suction_depth,:irrigation_type,:acres,:source,:electricity_available,:diesel_engine,:diesel_consumption,:know_mecwin,:how_know_mecwin,:pump_needed_month,:product_id)');
    //bind our parameters

    $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
    $this->db->bind(':name', $name);
    $this->db->bind(':phone', $phone);
    $this->db->bind(':village', $village);
    $this->db->bind(':taluk', $taluk);
    $this->db->bind(':district', $district);
    $this->db->bind(':water_source_depth', $water_source_depth);
    $this->db->bind(':water_source_start', $water_source_start);
    $this->db->bind(':water_available', $water_available);
    $this->db->bind(':water_suction_depth', $water_suction_depth);
    $this->db->bind(':irrigation_type', $irrigation_type);
    $this->db->bind(':acres', $acres);
    $this->db->bind(':source', $source);
    $this->db->bind(':electricity_available', $electricity_available);
    $this->db->bind(':diesel_engine', $diesel_engine);
    $this->db->bind(':diesel_consumption', $diesel_consumption);
    $this->db->bind(':know_mecwin', $know_mecwin);
    $this->db->bind(':how_know_mecwin', $how_know_mecwin);
    $this->db->bind(':pump_needed_month', $pump_needed_month);
    $this->db->bind(':product_id', $product_id);

    if($this->db->execute())
    {
        return true;
    }
    else
    {
         return false;
    }
}






public function create_survey($village, $mandal, $district, $name, $phone, $latlong, $borewell_depth, $bore_dia, $casing_pipe, $casing_pipe_depth, $water_source_depth, $water_source_volume, $water_required, $vertical_head, $horizontal_head, $sprinklers_connected, $shadow_free, $distance_bore_solar, $pump_type, $capacity, $mounting_type, $solar_panel, $panel_numbers, $pump_solar_grid)
{
    $this->db->query('INSERT INTO surveys(user_id,village, mandal, district, name, phone, latlong, borewell_depth, bore_dia, casing_pipe, casing_pipe_depth, water_source_depth, water_source_volume, water_required, vertical_head, horizontal_head, sprinklers_connected, shadow_free, distance_bore_solar, pump_type, capacity, mounting_type, solar_panel, panel_numbers, pump_solar_grid) VALUES (:uid,:village, :mandal, :district, :name, :phone, :latlong, :borewell_depth, :bore_dia, :casing_pipe, :casing_pipe_depth, :water_source_depth, :water_source_volume, :water_required, :vertical_head, :horizontal_head, :sprinklers_connected, :shadow_free, :distance_bore_solar, :pump_type, :capacity, :mounting_type, :solar_panel, :panel_numbers, :pump_solar_grid)');
    //bind our parameters

    $this->db->bind(':uid', $_SESSION['rexkod_user_id']);
    $this->db->bind(':village', $village);
    $this->db->bind(':mandal', $mandal);
    $this->db->bind(':district', $district);
    $this->db->bind(':name', $name);
    $this->db->bind(':phone', $phone);
    $this->db->bind(':latlong', $latlong);
    $this->db->bind(':borewell_depth', $borewell_depth);
    $this->db->bind(':bore_dia', $bore_dia);
    $this->db->bind(':casing_pipe', $casing_pipe);
    $this->db->bind(':casing_pipe_depth', $casing_pipe_depth);
    $this->db->bind(':water_source_depth', $water_source_depth);
    $this->db->bind(':water_source_volume', $water_source_volume);
    $this->db->bind(':water_required', $water_required);
    $this->db->bind(':vertical_head', $vertical_head);
    $this->db->bind(':horizontal_head', $horizontal_head);
    $this->db->bind(':sprinklers_connected', $sprinklers_connected);
    $this->db->bind(':shadow_free', $shadow_free);
    $this->db->bind(':distance_bore_solar', $distance_bore_solar);
    $this->db->bind(':pump_type', $pump_type);
    $this->db->bind(':capacity', $capacity);
    $this->db->bind(':mounting_type', $mounting_type);
    $this->db->bind(':solar_panel', $solar_panel);
    $this->db->bind(':panel_numbers', $panel_numbers);
    $this->db->bind(':pump_solar_grid', $pump_solar_grid);

    if($this->db->execute())
    {
        return true;
    }
    else
    {
         return false;
    }
}


}
    ?>