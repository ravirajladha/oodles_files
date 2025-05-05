<?php
class Retail extends Controller 
{
	public function __construct()
	{
	    $this->pageModel = $this->model('Page'); 
	    $this->retailModel = $this->model('Retails'); 
	}

	public function index() 
	{
	    if (isset($_SESSION['rexkod_user_id'])) {
           
            $get_salary_detail=$this->retailModel->get_salary_detail_single($_SESSION['rexkod_user_phone']); 
            $data=[
                'get_salary_detail' => $get_salary_detail,
            ];
            $this->view('retail/index',$data);
        } else {
            redirect('retail/login');
        }
        
	}


    public function index2() 
	{
	    if (isset($_SESSION['rexkod_user_id'])) {
           
            $get_salary_detail=$this->retailModel->get_salary_detail_single($_SESSION['rexkod_user_phone']); 
            $data=[
                'get_salary_detail' => $get_salary_detail,
            ];
            $this->view('retail/index2',$data);
        } else {
            redirect('retail/login');
        }
        
	}
    public function new_order()
    {               
        
        
        $data = [
                    
                ];
        $this->view('retail/new_order',$data);
    }


    public function check_product()
    {               
        $depth = $_POST['depth'];
        $acres = $_POST['acres'];
        $source = $_POST['source'];
        if($source == 1){
            $product = $this->pageModel->check_bore($depth,$acres);
        }else {
            $product = $this->pageModel->check_surface($depth,$acres);
        }
        $count = 0;
        if($depth){
            echo "Available Options:<br><br>";
        foreach($product as $pro){
            $count++;
            echo $pro->id;
            echo "<option value='".$pro->id."'>";
            echo "Head ".$pro->dynamic_head_in_feet." ,".$pro->capacity_in_hp."HP, Discharge per day: ".$pro->approx_discharge_per_day.", Cost: ₹".$pro->appox_cost;
            echo "</option>";
        }}
    }


    public function new_survey()
    {               
        $data = [
                    
                ];
        $this->view('retail/new_survey',$data);
    }

    public function create_order()
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $village = $_POST['village'];
        $taluk = $_POST['taluk'];
        $district = $_POST['district'];
        $water_source_depth = $_POST['water_source_depth'];
        $water_source_start = $_POST['water_source_start'];
        $water_available = $_POST['water_available'];
        $water_suction_depth = $_POST['water_suction_depth'];
        $irrigation_type = $_POST['irrigation_type'];
        $acres = $_POST['acres'];
        $source = $_POST['source'];
        $electricity_available = $_POST['electricity_available'];
        $diesel_engine = $_POST['diesel_engine'];
        $diesel_consumption = $_POST['diesel_consumption'];
        $know_mecwin = $_POST['know_mecwin'];
        $how_know_mecwin = $_POST['how_know_mecwin'];
        $pump_needed_month = $_POST['pump_needed_month'];
        $product_id= $_POST['product_id'];

        $result = $this->retailModel->create_order($name,$phone,$village,$taluk,$district,$water_source_depth,$water_source_start,$water_available,$water_suction_depth,$irrigation_type,$acres,$source,$electricity_available,$diesel_engine,$diesel_consumption,$know_mecwin,$how_know_mecwin,$pump_needed_month,$product_id);


        if($result)
        {
            $_SESSION['success'] = "Order Created!";
            redirect('retail/index');
        }else
        {
             $_SESSION['success'] = "Order Not Created.";
            redirect('retail/index');
        }
    }


    public function create_survey()
    {
        $village = $_POST['village'];
        $mandal = $_POST['mandal'];
        $district = $_POST['district'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $long = $_POST['long'];
        $lat = $_POST['lat'];
        $latlong = $lat.",".$long;
        $borewell_depth = $_POST['borewell_depth'];
        $bore_dia = $_POST['bore_dia'];
        $casing_pipe = $_POST['casing_pipe'];
        $casing_pipe_depth = $_POST['casing_pipe_depth'];
        $water_source_depth = $_POST['water_source_depth'];
        $water_source_volume = $_POST['water_source_volume'];
        $water_required = $_POST['water_required'];
        $vertical_head = $_POST['vertical_head'];
        $horizontal_head = $_POST['horizontal_head'];
        $sprinklers_connected = $_POST['sprinklers_connected'];
        $shadow_free = $_POST['shadow_free'];
        $distance_bore_solar = $_POST['distance_bore_solar'];
        $pump_type = $_POST['pump_type'];
        $capacity = $_POST['capacity'];
        $mounting_type = $_POST['mounting_type'];
        $solar_panel = $_POST['solar_panel'];
        $panel_numbers = $_POST['panel_numbers'];
        $pump_solar_grid = $_POST['pump_solar_grid'];

        $result = $this->retailModel->create_survey($village, $mandal, $district, $name, $phone, $latlong, $borewell_depth, $bore_dia, $casing_pipe, $casing_pipe_depth, $water_source_depth, $water_source_volume, $water_required, $vertical_head, $horizontal_head, $sprinklers_connected, $shadow_free, $distance_bore_solar, $pump_type, $capacity, $mounting_type, $solar_panel, $panel_numbers, $pump_solar_grid);


        if($result)
        {
            $_SESSION['success'] = "Order Created!";
            redirect('retail/index');
        }else
        {
             $_SESSION['success'] = "Order Not Created.";
            redirect('retail/index');
        }
    }

    public function pages() 
	{
	   $this->view('retail/pages');
        
	}
    public function messages() 
	{
	   $this->view('retail/messages');
        
	}
    public function apply_form() 
	{
	   $this->view('retail/apply_form');
        
	}
    public function company_detail() 
	{
	   $this->view('retail/company_detail');
        
	}
    public function error() 
	{
	   $this->view('retail/error');
        
	}

    public function forgot_password() 
	{
	   $this->view('retail/forgot_password');
        
	}

    public function job_detail() 
	{
	   $this->view('retail/job_detail');
        
	}

    public function language() 
	{
	   $this->view('retail/language');
        
	}

    public function messages_detail() 
	{
	   $this->view('retail/messages_detail');
        
	}


    public function notification() 
	{
	   $this->view('retail/notification');
        
	}

    public function onboading() 
	{
	   $this->view('retail/onboading');
        
	}


    public function otp_confirm() 
	{
	   $this->view('retail/otp_confirm');
        
	}

  

    // public function register()
	// {
	//    $this->view('retail/register');
        
	// }

    public function result_stress()
	{
	   $this->view('retail/result_stress');
        
	}

    public function search()
	{
	   $this->view('retail/search');
        
	}

    public function ui_accordion()
	{
	   $this->view('retail/ui_accordion');
        
	}

    public function ui_action_modal()
	{
	   $this->view('retail/ui_action_modal');
        
	}

    public function ui_action_sheet()
	{
	   $this->view('retail/ui_action_sheet');
        
	}
    public function ui_alert()
	{
	   $this->view('retail/ui_alert');
        
	}

    public function ui_badge()
	{
	   $this->view('retbadge');
        
	}


    public function ui_breadcrumb()
	{
	   $this->view('retail/ui_breadcrumb');
        
	}

    public function ui_button_group()
	{
	   $this->view('retail/ui_button_group');
        
	}

    public function ui_button()
	{
	   $this->view('retail/ui_button');
        
	}

    public function ui_card()
	{
	   $this->view('retail/ui_card');
        
	}

    public function ui_chips()
	{
	   $this->view('retail/ui_chips');
        
	}

    public function ui_components()
	{
	   $this->view('retail/ui_components');
        
	}

    public function ui_divider()
	{
	   $this->view('retail/ui_divider');
        
	}

    public function ui_dropdown()
	{
	   $this->view('retail/ui_dropdown');
        
	}

    public function ui_input()
	{
	   $this->view('retail/ui_input');
        
	}

    public function ui_lightgallery()
	{
	   $this->view('retail/ui_lightgallery');
        
	}

    public function ui_list_group()
	{
	   $this->view('retail/ui_list_group');
        
	}

    public function ui_modal()
	{
	   $this->view('retail/ui_modal');
        
	}



    public function ui_progressbar()
	{
	   $this->view('retail/ui_progressbar');
        
	}

    public function ui_radio()
	{
	   $this->view('retail/ui_radio');
        
	}

    public function ui_range_slider()
	{
	   $this->view('retail/ui_range_slider');
        
	}

    public function ui_social()
	{
	   $this->view('retail/ui_social');
        
	}

    public function ui_spinner()
	{
	   $this->view('retail/ui_spinner');
        
	}


    public function ui_stepper()
	{
	   $this->view('retail/ui_stepper');
        
	}


    public function ui_swiper()
	{
	   $this->view('retail/ui_swiper');
        
	}

    public function ui_switch()
	{
	   $this->view('retail/ui_switch');
        
	}

    public function ui_tab()
	{
	   $this->view('retail/ui_tab');
        
	}

    public function ui_timeline()
	{
	   $this->view('retail/ui_timeline');
        
	}
    public function ui_toast()
	{
	   $this->view('retail/ui_toast');
        
	}

    public function ui_treeview()
	{
	   $this->view('retail/ui_treeview');
        
	}

    public function ui_typography()
	{
	   $this->view('retail/ui_typography');
        
	}

    public function welcome()
	{
	   $this->view('retail/welcome');
        
	}



    public function orders()
	{
        $orders = $this->pageModel->get_orders_all(); 
        
        $data = [
                    'orders' => $orders,
                ];   

	   $this->view('retail/orders',$data);
        
	}

    

    public function reports() 
	{
	   $this->view('retail/reports');
        
	}




    public function transactions() 
	{
	   $this->view('retail/transactions');
        
	}


    public function add_restaurant() 
	{
	   $this->view('retail/add_restaurant');
        
	}


    




    public function roles() 
	{
	   $this->view('retail/roles');
        
	}

   



    public function users()
	{
        $get_customers = $this->adminModel->get_all_customers();
        $data = [
            'customers' =>$get_customers
        ]; 

	   $this->view('retail/users',$data);
        
	}


    public function view_product($id)
    {

        $products = $this->pageModel->get_single_products($id);

        $data = [
                    'get_pro' => $products,
                ];
        $this->view('retail/view_product',$data);
    }







    public function login()
    {
       
        if(!isset($_POST['username']))
        {
            
            $this->view('retail/login');
        }
        else
        { 
            
            if(!isset($_POST['password']))
            {
                $_SESSION['success'] = "Enter Password";
                $this->view('retail/login');
            }
            else
            {
                $user = "";

                if ( is_numeric($_POST['username']) ) {
                    $email_verify_phone = $this->pageModel->email_verify_phone($_POST['username']);
                } else {
                    $check_email = $this->pageModel->email_verify($_POST['username']);
                }
                

                if(empty($check_email) && empty($email_verify_phone))
                {
                    $_SESSION['success'] = "Invalid Username";
                    $this->view('retail/login');
                }
                else
                {
                    if(!empty($check_email))
                    {
                        $user_results  = $check_email;

                        $password_res = $check_email->password;
                    }
                    elseif(!empty($email_verify_phone))
                    {
                        $user_results  = $email_verify_phone;

                        $password_res = $email_verify_phone->password;
                    }


                    if(password_verify($_POST['password'], $password_res))
                    {
                        $user = $user_results;
                    }
                    else
                    {
                         $user = "";
                    }
                    if(empty($user))
                    {

                       $_SESSION['success'] = "Invalid Credential!";
                       $this->view('retail/login');
                       
                    }else
                    {
                        if($user->type=="admin")
                        {
                            $_SESSION['rexkod_admin_id'] = $user->id;
                            $_SESSION['rexkod_admin_email'] = $user->email;
                            $_SESSION['rexkod_admin_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('retail/index');
                        }

                        elseif($user->type=="vendor")
                        {
                            $_SESSION['rexkod_vendor_id'] = $user->id;
                            $_SESSION['rexkod_vendor_email'] = $user->email;
                            $_SESSION['rexkod_vendor_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('retail/index');
                        }

                        elseif($user->type=="user")
                        {
                            $_SESSION['rexkod_user_id'] = $user->id;
                        $_SESSION['rexkod_user_email'] = $user->email;
                        $_SESSION['rexkod_user_phone'] = $user->phone;
                        $_SESSION['rexkod_user_name'] = $user->name;
                        $_SESSION['rexkod_user_type'] = $user->type;
                            
                        }
                        else
                        {
                            
                            $_SESSION['success'] = "You do not have access!";
                            redirect('retail/login');
                        }
                    }
                    
                }
               
            }
        }
    }



    


 
    


	public function add_product()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
                    'all_subcategory' => $get_all_subcategory,
        ];
        

        $this->view('retail/add_product', $data);
    }
    




    public function create_product()
    {
        
        $name = $_POST['name'];
        $subcat = $_POST['subcat'];
        // $price = $_POST['price'];
        
        $p_details = $_POST['p_details'];

        if(isset($_SESSION['rexkod_admin_id'])){
            $created_byId = $_SESSION['rexkod_admin_id'];
        }else {
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


        if($result)
        {
            $_SESSION['success'] = "product added successfully..!";
            redirect('retail/index');
        }else
        {
             $_SESSION['success'] = "try later..!";
            redirect('retail/index');
        }
    }





    



    public function all_products()
    {

        $products = $this->pageModel->get_all_products();
        $data = [
                    'all_pro' => $products,
                ];

        $this->view('retail/all_products',$data);
    }

    public function all_cat_subcat()
    {

        $get_all_category = $this->adminModel->get_all_category();
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_category' => $get_all_category,
            'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('retail/all_cat_subcat',$data);
    }


    


    public function del_product($id)
    {
        $this->pageModel->delete_product($id);
        $_SESSION['success'] = "product deleted successfully";
        redirect('retail/all_products');
    }


    public function update_cod_customer($id)
    { 
        if(isset($_POST['cod'])){
            $cod_val='1';
        }else {
            $cod_val='0';
        }
        
        $codupdate = $this->adminModel->update_cod_customer($id,$cod_val);

        
        if($codupdate){
        $_SESSION['success'] = "COD Updated";
        redirect('retail/customers_cod');
        } else {
            
            $_SESSION['success'] = "COD Not Updated";
            redirect('retail/customers_cod');
    
            }
    }


    public function update_cod_vendor($id)
    { 
        if(isset($_POST['cod'])){
            $cod_val='1';
        }else {
            $cod_val='0';
        }
        
        $codupdate = $this->adminModel->update_cod_vendor($id,$cod_val);

        
        if($codupdate){
        $_SESSION['success'] = "COD Updated";
        redirect('retail/vendors_cod');
        } else {
            
            $_SESSION['success'] = "COD Not Updated";
            redirect('retail/vendors_cod');
    
            }
    }
    






    public function change_pass()
    {
        $this->view('retail/change_pass');
    }

 



    public function add_coupon_vendor()
    {
        $get_all_vendors = $this->pageModel->get_all_vendors();
        

        $data = [
                    'all_vendors' => $get_all_vendors
        ];

        $this->view('retail/add_coupon_vendor',$data);
    }


    public function add_coupon_subcat()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('retail/add_coupon_subcat',$data);
    }



    public function change_password()
    {
        if(isset($_POST['opass']))
        {
            $opass = $_POST['opass'];
            $r = $this->pageModel->check_pass($opass);

            if($r == true)
            {
                if(isset($_POST['npass']))
                {
                    if(isset($_POST['cpass']))
                    {
                        if($_POST['npass'] == $_POST['cpass'])
                        {
                            if(empty($_POST['user_email']))
                            {
                                $email = $r->email;
                            }
                            else
                            {
                                $email = $_POST['user_email'];
                            }

                            $this->pageModel->update_password($_POST['npass'], $email);

                            $_SESSION['success'] = "Password Changed successfully..!";
                            redirect('retail/change_pass');
                        }
                        else
                        {
                            $_SESSION['success'] = "Confirm Password not matching with New Password";
                            redirect('retail/change_pass');
                        }
                    }
                    else
                    {
                        $_SESSION['success'] = "Enter Confirm Password";
                        redirect('retail/change_pass');
                    }
                }
                else
                {
                    $_SESSION['success'] = "Enter New Password";
                    redirect('retail/change_pass');
                }
            }
            else
            {
              $_SESSION['success'] = "current password not matching";
              redirect('retail/change_pass');
            }
        }
        else
        {
          $_SESSION['success'] = "Enter current Password";
          redirect('retail/change_pass');
        }
    }

    public function logout()
    {
       session_destroy();
       redirect('retail/login');
    }

    public function user_login()
    {

        if (!isset($_POST['user_phone'])) {
            $_SESSION['success'] = "Enter your phone number";
            redirect('retail/login');
        } else {


            $user = "";

            $email_verify_phone = $this->retailModel->email_verify_phone($_POST['user_phone']);

            if (empty($email_verify_phone)) {
                $_SESSION['success'] = "Invalid Phone";
                redirect('retail/login');
            } else {
                $user = $email_verify_phone;

                if (empty($user)) {

                    $_SESSION['success'] = "Invalid Credential!";
                    redirect('retail/login');
                } else {
                    if ($user->type == "admin") {
                        $_SESSION['success'] = "Please Login From Vendor App";
                        redirect('retail/login');
                    } elseif ($user->type == "vendor") {
                        $_SESSION['success'] = "Please Login From Vendor App";
                        redirect('retail/login');
                    } elseif ($user->type == "delivery") {
                        $_SESSION['success'] = "Please Login From Delivery App";
                        redirect('retail/login');
                    } else {

                        $_SESSION['rexkod_user_id'] = $user->id;
                        $_SESSION['rexkod_user_email'] = $user->email;
                        $_SESSION['rexkod_user_phone'] = $user->phone;
                        $_SESSION['rexkod_login_type'] = $user->type;
                        redirect('retail/index');
                    }
                }
            }
        }
    }

    

    public function apply_leaves(){

        $type_of_leave = $_POST['type'];
        $start_date = $_POST['start_date'];
        $timestamp = strtotime($start_date);

            $day = date('D', $timestamp);
          

        $end_date = $_POST['end_date'];
        // getting the leaves taken
        $date1 = new DateTime($start_date);
        $date2 = new DateTime($end_date);
        $interval = $date1->diff($date2);
  
        $number_of_days =  $interval->d;

        $number_of_days=($number_of_days+1);

   
        $timestamp = strtotime($start_date);

        $day = date('D', $timestamp);
     
        $current_employer_id=$_SESSION['rexkod_emp_id'];
        $salary_detail = $this->retailModel->get_salary_detail_single($_SESSION['rexkod_user_phone']);

        $number_of_cl = $salary_detail->cl;
        $number_of_sl = $salary_detail->sl;
        $number_of_el = $salary_detail->el;
        $number_of_od = $salary_detail->od;
        
    if($type_of_leave==1){
        // for casual leave
        if($number_of_cl>=$number_of_days){
        $apply_leave  = $this->retailModel->apply_leave($type_of_leave,$start_date,$end_date,$number_of_days);
        }
    }elseif($type_of_leave==3){
        // for sick leave
        if($number_of_sl>=$number_of_days){
        $apply_leave  = $this->retailModel->apply_leave($type_of_leave,$start_date,$end_date,$number_of_days);
        }
    }elseif($type_of_leave==2){
        // for earned leave
        if($number_of_el>=$number_of_days){
        $apply_leave  = $this->retailModel->apply_leave($type_of_leave,$start_date,$end_date,$number_of_days);
        }
    }elseif($type_of_leave==4){
        if($number_of_od>=$number_of_days){
        // for od
        $apply_leave  = $this->retailModel->apply_leave($type_of_leave,$start_date,$end_date,$number_of_days);
        }
       
    }
   
    if($apply_leave){
        $_SESSION['success'] = "Leave applied successfully! ";
        redirect('retail/index'); 
    }
    else{
        $_SESSION['success'] = "Applied Leaves Exceeding than Available!";
    redirect('retail/index'); 
    }


}

public function punch_in(){
    $current_date = date("Y-m-d");
    $current_time = date("h:i:s");
    $get_salary_detail = $this->retailModel->get_salary_detail_single($_SESSION['rexkod_user_phone']);
    $get_current_user = $get_salary_detail->Emp_Id;
    $data=[
        'current_date' => $current_date,
        'current_time' => $current_time,
        'user_id' => $get_current_user,
    ];
    $add_punch_in = $this->retailModel->add_punch_in($data);
    if($add_punch_in){
        $_SESSION['success'] = "Attendance Punched In successfully! ";
        redirect('retail/index'); 
    }
    else{
        $_SESSION['success'] = "Some Error Occured!";
    redirect('retail/index'); 
    }


}
    public function orders2()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('retail/orders',$data);
    }


    public function returns()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('retail/returns',$data);
    }



    public function label_orders()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('retail/label_orders',$data);
    }


     public function order_invoice1($id)
    {
        $p_details = $this->adminModel->get_all_userinfo();
        $all_lab = $this->adminModel->find_all_order();

        $get_order_details = $this->adminModel->get_order_details($id);
        $all_order = $this->adminModel->get_pharmacy_med_list($id);
        $get_invoice_details = $this->adminModel->get_pharmacy_med_list_single($id);

        $data = [ 
            // 'p_details' => $p_details,
            // 'all_lab' => $all_lab,
            'sa' => 'n_book',
            'get_order_details' =>  $get_order_details,
            'get_invoice_details' => $get_invoice_details,
            'sa' => 'p_book',
            'id' => $id,
            'all_order' => $all_order,
        ];
        
        $this->view('retail/order_invoice1', $data);
    }


    public function change_state($id)
    {
        // echo 111;
        $st  = $_POST['st'];
        $this->adminModel->change_status($id,$st);
        $_SESSION['success'] = "Status changed";
        redirect('retail/all_orders');
    }


    public function view_order($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        
        $get_order_detail = $this->pageModel->getOrderDetailById($id);
        
        $data = [
                    'get_order' => $get_order,
                    'get_order_detail' => $get_order_detail
                ];
                
       $this->view('retail/view_order',$data); 
    } 

    

 

    public function vendor_verify($id)
    {
        $verified = $this->adminModel->verify_vendor($id);

        if($verified){
        $_SESSION['success'] = "Vendor Verified!";
        redirect('retail/view_vendor/'.$id);
        }else {
        $_SESSION['success'] = "Vendor Not Verified!";
        redirect('retail/view_vendor/'.$id);
        }

    }


    public function customer_verify($id)
    {
        $verified = $this->adminModel->verify_customer($id);

        if($verified){
        $_SESSION['success'] = "Customer Verified!";
        redirect('retail/view_customer/'.$id);
        }else {
        $_SESSION['success'] = "Customer Not Verified!";
        redirect('retail/view_customer/'.$id);
        }

    }





    public function vendors()
    {

        $get_all_vendors = $this->pageModel->get_all_vendors();
        

        $data = [
                    'all_vendors' => $get_all_vendors
        ];
        
        

       $this->view('retail/vendors',$data); 
    }


    public function vendors_cod()
    {

        $get_all_vendors = $this->pageModel->get_all_vendors();
        

        $data = [
                    'all_vendors' => $get_all_vendors
        ];
        
        

       $this->view('retail/vendors_cod',$data); 
    }




    public function view_vendor($id)
    {
        $get_user = $this->pageModel->get_userinfo($id);
        $get_vendor = $this->pageModel->getVendorById($id);
        

        $data = [
                    'user_detail' => $get_user,
                    'vendor_detail' => $get_vendor,
        ];
        
        $this->view('retail/view_vendor',$data); 
    }


    public function view_customer($id)
    {
        $get_user = $this->pageModel->get_userinfo($id);
        $get_customer = $this->pageModel->get_custinfo($id);
        

        $data = [
            'user_detail' => $get_user,
            'customer_detail' => $get_customer
        ];
        
        $this->view('retail/view_customer',$data); 
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
        $this->view('retail/profile',$data); 
    }



    public function register()
    {
       $this->view('retail/register'); 
    }




    public function add_vendor(){


        


            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {


                $name = $_POST['admin_name'];
                $rname = $_POST['vendor_name'];
                $email = $_POST['vendor_email'];
                $phone = $_POST['vendor_phone'];
                $pass = $_POST['vendor_phone'];
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $address = $_POST['vendor_address'];
                $latlong = $_POST['vendor_latlong'];
                $gst = $_POST['vendor_gst'];
                $fssai = $_POST['vendor_fssai'];
                $start_time = $_POST['vendor_start_time'];
                $end_time = $_POST['vendor_end_time'];
                $bank_number = $_POST['vendor_bank_number'];
                $bank_ifsc = $_POST['vendor_bank_ifsc'];
     
                if (empty($email)) 
            {
                $_SESSION['success'] = 'Please enter email';
                $this->view('retail/add_vendor'); 
            } else if ($this->pageModel->findUserByemail($email)) 
            {
              $_SESSION['success'] = 'Email already taken';
              $this->view('retail/add_vendor'); 
            } 
            else 
            {
    
    
                    if ($this->pageModel->email_verify_phone($phone)) 
                    {
                      $_SESSION['success'] = 'Phone number already taken';
                      redirect('retail/add_vendor'); 
                    } 
                    else 
                    {

                        

                    if(!empty($_FILES['vendor_image']['name']))
                     {
                    $f_name = $_FILES['vendor_image']['name'];
                    $f_temp = $_FILES['vendor_image']['tmp_name'];
                    $size = $_FILES['vendor_image']['size'];
                    $f_extension=explode('.', $f_name);
                    $f_extension=strtolower(end($f_extension));
                    $unqdate = date("Ymd");
                    $unqtime = time();
                    $unqname = $unqdate."".$unqtime;
                    $f_newfile=$unqname.'.' .$f_extension;
                    $store="uploads/" .$f_newfile;
                    move_uploaded_file($f_temp, $store);
                    $store ="uploads/";
                    $img=$f_newfile;
                     }
                     else
                        {
                        $img = "vendor.png";
                    }
    

                        if ($this->pageModel->add_vendor($name, $rname, $img, $email, $phone, $pass, $address, $latlong, $gst, $fssai, $start_time, $end_time, $bank_number, $bank_ifsc)) 
                        {
                            $_SESSION['success'] = "Registered Successfully..! ";
                            $this->view('retail/add_vendor'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'Registeration Failed';
                            $this->view('retail/add_vendor'); 
                        }
                    }
                }
            } 
            else 
            {
                $this->view('retail/add_vendor'); 
            }
        }



        
    public function add_profile(){

        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {

                
                $name = $_POST['name'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $pincode = $_POST['pincode'];
                $gst = $_POST['gst'];
                $timing = $_POST['timing'];
                $minval = $_POST['minval'];
                $subcat_id = $_POST['subcat_id'];
     
                
                        if ($this->pageModel->add_vendor_profile($name, $address, $city, $state, $pincode, $gst, $timing, $minval, $subcat_id)) 
                        {
                            $_SESSION['success'] = "Profile Added Successfully..! ";
                            redirect('retail/profile'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'Profile Not Added';
                            $this->view('retail/add_profile'); 
                        }
             }
            else 
            {
                $this->view('retail/add_profile',$data); 
            }
        }



        
        public function settings()
        {
           $this->view('retail/settings'); 
        }

        public function shipping_subcat()
        {
            $get_all_subcategory = $this->adminModel->get_all_subcategory();

            $data = [
                        'all_subcategory' => $get_all_subcategory,
            ];
            $this->view('retail/shipping_subcat', $data); 
        }

        public function shipping_range()
        {
           $this->view('retail/shipping_range'); 
        }

        public function tcs_certificate_vendor()
        {
           $this->view('retail/tcs_certificate_vendor'); 
        }

        public function tcs_certificate_customer()
        {
           $this->view('retail/tcs_certificate_customer'); 
        }
 

    public function add_user()
    {
       $this->view('retail/add_user'); 
    }

    public function payout()
    {
       $this->view('retail/payout'); 
    }

    public function invoice()
    {
       $this->view('retail/invoice'); 
    }

    public function create_user()
    {

        $pass = $_POST['password'];

        $pass1 = password_hash($pass, PASSWORD_DEFAULT);

        $data = [ 

            'name' =>  $_POST['name'],
            'email' =>  $_POST['email'],
            'ph_no' =>  $_POST['ph_no'],
            'address' =>  $_POST['address'],
            'pin_code' =>  $_POST['pin_code'],
            'password' =>  $pass1,            
        ];

        $insert_auth_deliveryUser = $this->adminModel->insert_auth_deliveryUser($data);

        $_SESSION['success'] = "Delivery user Created Successfully";
        redirect('retail/all_deliveryUsers');
    }

    public function all_deliveryUsers()
    {
        $get_all_deliveryUsers = $this->adminModel->get_all_deliveryUsers();

        $data = [ 
            
            'get_all_deliveryUsers' => $get_all_deliveryUsers,
        ];

       $this->view('retail/all_deliveryUsers', $data); 
    }

    public function edit_deliveryUser($id)
    {

        $get_all_by_ID = $this->adminModel->get_all_by_ID($id);

         $data = [ 
            
            'get_all_by_ID' => $get_all_by_ID,
        ];

       $this->view('retail/edit_deliveryUser', $data);

    }

    public function update_user()
    {
        if(empty($_POST['password']))
        {

            $data = [ 

                'auth_id' =>  $_POST['auth_id'],
                'name' =>  $_POST['name'],
                'email' =>  $_POST['email'],
                'ph_no' =>  $_POST['ph_no'],
                'address' =>  $_POST['address'],
                'pin_code' =>  $_POST['pin_code'],            
            ];

            $update_auth_deliveryUser = $this->adminModel->update_auth_deliveryUser($data);

            $_SESSION['success'] = "Delivery user Updated Successfully";
            redirect('retail/all_deliveryUsers');

        }
        else
        {
            $pass = $_POST['password'];

            $pass1 = password_hash($pass, PASSWORD_DEFAULT);
     
            
            $data = [ 

                'auth_id' =>  $_POST['auth_id'],
                'name' =>  $_POST['name'],
                'email' =>  $_POST['email'],
                'ph_no' =>  $_POST['ph_no'],
                'address' =>  $_POST['address'],
                'pin_code' =>  $_POST['pin_code'],  
                'password' =>  $pass1,          
            ];

            $update_auth_deliveryUser = $this->adminModel->update_auth_deliveryUser1($data);

            $_SESSION['success'] = "Delivery user Updated Successfully";
            redirect('retail/all_deliveryUsers');

        }

        
    }

    public function delete_deliveryUser($id)
    {

       $delete_deliveryUserby_id = $this->adminModel->delete_deliveryUserby_id($id);
       
       $_SESSION['success'] = "Delivery user deleted Successfully";
            redirect('retail/all_deliveryUsers'); 

    }

    public function assign_orders()
    {
        $get_all_deliveryUsers = $this->adminModel->get_all_deliveryUsers();

        $products = $this->adminModel->get_all_orders();
       
        $data = [
                    'all_pro' => $products,
                    'get_all_deliveryUsers' => $get_all_deliveryUsers,
                ];
 
        $this->view('retail/assign_orders',$data);

    }

    public function assign_deliveryUser($id)
    {

        $get_all_by_ID = $this->adminModel->get_all_by_ID($_POST['delivery_user']);

        $this->adminModel->change_deliverystatus($id,$get_all_by_ID->auth_id, $get_all_by_ID->name);

        $_SESSION['success'] = "Delivery User Assigned Successfully";
        redirect('retail/assign_orders');

    }

  




    public function add_category()
    {
        $this->view('retail/add_category');
    }


    public function add_subcategory()
    {
        $get_all_category = $this->adminModel->get_all_category();

        $data = [
            'all_category' => $get_all_category,
        ];

        $this->view('retail/add_subcategory', $data);
    }


    public function create_category()
    {
        $category_name = $_POST['category_name'];

        $this->adminModel->create_category($category_name);

        $_SESSION['success'] = "Category created Successfully";
        redirect('retail/index'); 
    }


    public function create_coupon()
    {
        $coupon_title = $_POST['coupon_title'];
        $coupon_vendor = $_POST['coupon_vendor'];
        if(!isset($coupon_vendor)){$coupon_vendor = 0;}
        $coupon_subcat = $_POST['coupon_subcat'];
        if(!isset($coupon_subcat)){$coupon_subcat = 0;}
        $coupon_code = $_POST['coupon_code'];
        $coupon_type = $_POST['coupon_type'];
        $coupon_value = $_POST['coupon_value'];
        $coupon_cap = $_POST['coupon_cap'];

        $coupon_stat = $this->adminModel->create_coupon($coupon_title,$coupon_vendor,$coupon_subcat,$coupon_code,$coupon_type,$coupon_value,$coupon_cap);

        if($coupon_stat){
            $_SESSION['success'] = "Coupon created Successfully";
             redirect('retail/coupons'); }

    else {
        $_SESSION['success'] = "Coupon not created";
             redirect('retail/add_coupon'); }
             
    }
    


    public function create_subcategory()
    {
        $subcategory_name = $_POST['subcategory_name'];
        $category_id = $_POST['category_id'];
        $subcategory_hsn = $_POST['subcategory_hsn'];
        $subcategory_tax = $_POST['subcategory_tax'];
        $shipping_cost = $_POST['shipping_cost'];

        $cursub = $this->adminModel->create_subcategory($subcategory_name,$category_id,$subcategory_hsn,$subcategory_tax,$shipping_cost);

        if($cursub){
        $_SESSION['success'] = "Subcategory created Successfully";
        redirect('retail/subcategory'); 
        } else {
            $_SESSION['success'] = "Subcategory Not Created";
            redirect('retail/add_subcategory'); 
        }
    }



    public function category()
    {

        $get_all_category = $this->adminModel->get_all_category();

        $data = [
                    'all_category' => $get_all_category,
        ];

        $this->view('retail/category',$data);

    }

  


    public function coupons()
    {

        $get_all_coupons = $this->adminModel->get_all_coupons();

        $data = [
                    'all_coupons' => $get_all_coupons,
        ];

        $this->view('retail/coupons',$data);

    }


    public function subcategory()
    {

        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
                    'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('retail/subcategory',$data);

    }


    public function payouts()
    {

        $get_payouts = $this->adminModel->get_all_payouts();

        $data = [
                    'all_payouts' => $get_payouts,
        ];

        $this->view('retail/payouts',$data);

    }



    public function edit_category($id)
    {
        $get_categoryBy_id = $this->adminModel->getCategoryById($id);

        $data = [
            'category' => $get_categoryBy_id,
        ];

        $this->view('retail/edit_category',$data);
    }


    public function edit_subcategory($id)
    {
        $get_subcategoryBy_id = $this->adminModel->getSubcategoryById($id);

        $data = [
            'subcategory' => $get_subcategoryBy_id,
        ];

        $this->view('retail/edit_subcategory',$data);
    }




   
  

    

    

    public function user_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $phno = $_POST['phno'];
            $name = $_POST['name'];
            // $pass = $_POST['password'];
            
            if (empty($email)) {
                $_SESSION['success'] = 'Please enter email';
                redirect('retail/register');
            }else if (empty($name)) {
                $_SESSION['success'] = 'Please enter name';
                redirect('retail/register');
            } else if ($this->retailModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('retail/register');
            
            }else{


                if ($this->retailModel->findUserByphno($phno)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('retail/register');
                } else {

                    if ($this->retailModel->add_user_otp($email, $phno,$name)) {

                        $user = $this->retailModel->userlogin($phno);

                        $_SESSION['rexkod_user_id'] = $user->id;
                        $_SESSION['rexkod_user_email'] = $user->email;
                        $_SESSION['rexkod_user_phone'] = $user->phone;
                        $_SESSION['rexkod_user_name'] = $user->name;
                        $_SESSION['rexkod_user_type'] = $user->type;

                        redirect('retail/index');

                        $_SESSION['success'] = "Registered Successfully..! ";
                        redirect('retail/index');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('retail/register');
                    }
                }
            }
        } else {
            redirect('retail/register');
        }
    }
    
       public function send_otp($phone,$otp)
    {
        
        
        $url = "http://pro.icubesms.com/app/smsapi/index.php?key=56229D264B2BB3&campaign=0&routeid=26&type=text&contacts=".$phone."&%20senderid=MTIPLA&msg=YOU+ARE+OTP+".$otp."+MECWIN+TECHNOLOGIES+INDIA+PRIVITE+LIMITED&template_id=1507164924222850425";

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



    public function viewOrderbyType_deliveryUser($comb_id)
    {
        $comb_arr = explode("|", $comb_id);

        $viewOrder_deliveryUser = $this->adminModel->viewOrder_deliveryUser($comb_arr[1]);

        $get_all_by_ID = $this->adminModel->get_all_by_ID($comb_arr[1]);

        $data = [
            'viewOrder_deliveryUser' => $viewOrder_deliveryUser,
            'get_all_by_ID' => $get_all_by_ID,
            'status' => $comb_arr[0] 
        ];

        $this->view('retail/viewOrderbyType_deliveryUser',$data);

    }

    public function pending_orders()
    {
        $products = $this->adminModel->get_all_orders();

        $data = [
            
            'all_pro' => $products,
        ];
        $this->view('retail/pending_orders',$data);
    }

    public function completed_orders()
    {
        $products = $this->adminModel->get_all_orders();
        
        $data = [
            
            'all_pro' => $products,
        ];
        $this->view('retail/completed_orders',$data);
    }

    public function update_active_status($id)
    {
        $id_arr = explode("|", $id);

        if($id_arr[1] == 1)
        {
            $update_active_status_db = $this->adminModel->update_active_status_db($id_arr[0], 1);

            $_SESSION['success'] = "Delivery User Activated successfully";    

            redirect('retail/all_deliveryUsers');

        }
        elseif($id_arr[1] == 0)
        {
            $update_active_status_db = $this->adminModel->update_active_status_db($id_arr[0], 0);

            $_SESSION['success'] = "Delivery User De-Activated successfully";    

            redirect('retail/all_deliveryUsers');
        }
    }

    public function product_ratings()
    {

        $products = $this->pageModel->get_all_products();
        $data = [
                    'all_pro' => $products,
                ];
        $this->view('retail/product_ratings',$data);
    }

    public function qr_code()
    {
         $res = $this->pageModel->ulogin_using_rowId($_SESSION['user_id']);

        $data = [
            'res' => $res
        ];

        $this->view('retail/qr_code', $data);
    }

    public function create_QR()
    {
        if(!empty($_FILES['files_display']['name']))
        {
            $f_name = $_FILES['files_display']['name'];
            $f_temp = $_FILES['files_display']['tmp_name'];
            $size = $_FILES['files_display']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile=uniqid().'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $_SESSION['attachment']=$f_newfile;
        }
        else
        {
            $_SESSION['attachment']="demo.png";
        }

        $products = $this->pageModel->change_QR($_SESSION['attachment']);

        $_SESSION['success'] = "QR code uploaded successfully";    

            redirect('retail/qr_code');
    }


    public function view_orderDetails($id)
    {

        $get_order_details = $this->adminModel->get_order_details($id);

        $data = [ 
                    
            'get_order_details' =>  $get_order_details,            
        ];

        $this->view('retail/view_orderDetails', $data);
    }

    public function view_allProdByCat($id)
    {

         $view_allProdByCat = $this->adminModel->view_allProdByCat($id);

        $data = [ 
                    
            'all_pro' =>  $view_allProdByCat,            
        ];

        $this->view('retail/view_allProdByCat', $data);


    }


     public function download_excel() {




        $productResult=$this->adminModel->get_download_content();

        

          $this->exportProductDatabase($productResult);


    }



    public function customers()
    {         
        $get_all_customers = $this->adminModel->get_all_customers();

        $data = [

            'all_customers' => $get_all_customers,
        ];

        $this->view('retail/customers',$data); 
    }


    public function customers_cod()
    {         
        $get_all_customers = $this->adminModel->get_all_customers();

        $data = [

            'all_customers' => $get_all_customers,
        ];

        $this->view('retail/customers_cod',$data); 
    }



       

      public function exportProductDatabase($productResult) {
      
        $timestamp = time();
        $filename = 'Export_excel_' . $timestamp . '.xls';
        
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        
        $isPrintHeader = false;

        foreach ($productResult as $file) {
                        $result = [];
                        array_walk_recursive($file, function($item) use (&$result) {
                        $result[] = $item;
                        });
                     // fputcsv($output, $result);
                 


        // foreach ($productResult as $row) {
            if (! $isPrintHeader) {
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

        $this->view('retail/banner', $data);
    }



    public function create_banner()
    {

        if(!empty($_FILES['ban_file']['name']))
        {
            $f_name = $_FILES['ban_file']['name'];
            $f_temp = $_FILES['ban_file']['tmp_name'];
            $size = $_FILES['ban_file']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile=uniqid().'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $ban_filename=$f_newfile;
            $ban_pos = $_POST['ban_pos'];
            

            switch ($ban_pos) {
                case "Banner 1":
                  $ban_pos="ban1";
                  break;
                case "Banner 2":
                  $ban_pos="ban2";
                  break;
                case "Banner 3":
                  $ban_pos="ban3";
                  break;
                case "Banner 4":
                  $ban_pos="ban4";
                  break;
                case "Banner 5":
                  $ban_pos="ban5";
                  break;
                case "Deal 1":
                  $ban_pos="deal1";
                  break;
                case "Deal 2":
                   $ban_pos="deal2";
                    break;
                case "Deal 3":
                    $ban_pos="deal3";
                    break;
            
              }


            
            $result = $this->pageModel->add_banner_db($ban_filename,$ban_pos);
        }

        
        if($result){
            $_SESSION['success'] = "Banner Updated Successfully";
            redirect('retail/banner');
        } else {
            $_SESSION['success'] = "Banner Not Updated";
            redirect('retail/banner');
        }
       

    }





}