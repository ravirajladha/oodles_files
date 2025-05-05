<?php
class Distributor extends Controller
{
    public function __construct()
	{
	    
	    $this->distributorModel = $this->model('Distributors'); 
        $this->pageModel = $this->model('Page');
        $this->retailModel = $this->model('Retails');
	}

    public function index() 
	{
	    if (isset($_SESSION['rexkod_user_id']) || isset($_SESSION['rexkod_distributor_id']) ) {
           
            // $get_salary_detail=$this->distributorModel->get_salary_detail_single($_SESSION['rexkod_user_phone']); 
            // $data=[
            //     'get_salary_detail' => $get_salary_detail,
            // ];
            $this->view('distributor/index');
        } else {
            redirect('distributor/login');
        }
        
        
	}
    public function pages() 
	{
	   $this->view('distributor/pages');
        
	}
     public function apply_form() 
	{
	   $this->view('distributor/apply_form');
        
	}
     public function company_detail() 
	{
	   $this->view('distributor/company_detail');
        
	}
    public function error() 
	{
	   $this->view('distributor/error');
        
	}
    public function otp_confirm() 
	{
	   $this->view('distributor/otp_confirm');
        
	}

     public function search()
	{
	   $this->view('distributor/search');
        
	}

    public function ui_accordion()
	{
	   $this->view('distributor/ui_accordion');
        
	}

    public function ui_action_modal()
	{
	   $this->view('distributor/ui_action_modal');
        
	}

    public function ui_action_sheet()
	{
	   $this->view('distributor/ui_action_sheet');
        
	}
    public function ui_alert()
	{
	   $this->view('distributor/ui_alert');
        
	}

    public function ui_badge()
	{
	   $this->view('retbadge');
        
	}


    public function ui_breadcrumb()
	{
	   $this->view('distributor/ui_breadcrumb');
        
	}

    public function ui_button_group()
	{
	   $this->view('distributor/ui_button_group');
        
	}

    public function ui_button()
	{
	   $this->view('distributor/ui_button');
        
	}

    public function ui_card()
	{
	   $this->view('distributor/ui_card');
        
	}

    public function ui_chips()
	{
	   $this->view('distributor/ui_chips');
        
	}

    public function ui_components()
	{
	   $this->view('distributor/ui_components');
        
	}

    public function ui_divider()
	{
	   $this->view('distributor/ui_divider');
        
	}

    public function ui_dropdown()
	{
	   $this->view('distributor/ui_dropdown');
        
	}

    public function ui_input()
	{
	   $this->view('distributor/ui_input');
        
	}

    public function ui_lightgallery()
	{
	   $this->view('distributor/ui_lightgallery');
        
	}

    public function ui_list_group()
	{
	   $this->view('distributor/ui_list_group');
        
	}

    public function ui_modal()
	{
	   $this->view('distributor/ui_modal');
        
	}



    public function ui_progressbar()
	{
	   $this->view('distributor/ui_progressbar');
        
	}

    public function ui_radio()
	{
	   $this->view('distributor/ui_radio');
        
	}

    public function ui_range_slider()
	{
	   $this->view('distributor/ui_range_slider');
        
	}

    public function ui_social()
	{
	   $this->view('distributor/ui_social');
        
	}

    public function ui_spinner()
	{
	   $this->view('distributor/ui_spinner');
        
	}


    public function ui_stepper()
	{
	   $this->view('distributor/ui_stepper');
        
	}


    public function ui_swiper()
	{
	   $this->view('distributor/ui_swiper');
        
	}

    public function ui_switch()
	{
	   $this->view('distributor/ui_switch');
        
	}

    public function ui_tab()
	{
	   $this->view('distributor/ui_tab');
        
	}

    public function ui_timeline()
	{
	   $this->view('distributor/ui_timeline');
        
	}
    public function ui_toast()
	{
	   $this->view('distributor/ui_toast');
        
	}

    public function ui_treeview()
	{
	   $this->view('distributor/ui_treeview');
        
	}

    public function ui_typography()
	{
	   $this->view('distributor/ui_typography');
        
	}

    public function welcome()
	{
	   $this->view('distributor/welcome');
        
	}



    public function orders()
	{
        $orders = $this->pageModel->get_orders_all(); 
        
        $data = [
                    'orders' => $orders,
                ];   

	   $this->view('distributor/orders',$data);
        
	}

    

    public function reports() 
	{
	   $this->view('distributor/reports');
        
	}




    public function transactions() 
	{
	   $this->view('distributor/transactions');
        
	}


    public function add_restaurant() 
	{
	   $this->view('distributor/add_restaurant');
        
	}


    




    public function roles() 
	{
	   $this->view('distributor/roles');
        
	}

   



    public function users()
	{
        $get_customers = $this->distributorModel->get_all_customers();
        $data = [
            'customers' =>$get_customers
        ]; 

	   $this->view('distributor/users',$data);
        
	}


    public function view_product($id)
    {

        $products = $this->distributorModel->get_single_products($id);

        $data = [
                    'get_pro' => $products,
                ];
        $this->view('distributor/view_product',$data);
    }

    public function ups()
    {               
        $this->view('distributor/ups');
    }
    public function ev_enquiry()
    {      
        $id = $_SESSION['rexkod_user_id'];
        $get_auth_detail = $this->distributorModel->get_auth_detail($id);          
        $data = [
                    'get_auth_detail' => $get_auth_detail,
                ];
        $this->view('distributor/ev_enquiry',$data);         
    }
    public function solar_pump_enquiry()
    {               
        $id = $_SESSION['rexkod_user_id'];
        $get_auth_detail = $this->distributorModel->get_auth_detail($id);          
        $data = [
                    'get_auth_detail' => $get_auth_detail,
                ];
        $this->view('distributor/solar_pump_enquiry',$data);
    }
    public function index_asha()
    {               
        $this->view('distributor/index_asha');
    }

    public function solar()
    {
        $this->view('distributor/solar');
    }

    public function ev()
    {
        $this->view('distributor/ev');
    }
    
    public function feature()
    {
        $this->view('distributor/feature');
    }



    public function login()
    {
       
        if(!isset($_POST['username']))
        {
            
            $this->view('distributor/login');
        }
        else
        { 
            
            if(!isset($_POST['password']))
            {
                $_SESSION['success'] = "Enter Password";
                $this->view('distributor/login');
            }
            else
            {
                $user = "";

                if ( is_numeric($_POST['username']) ) {
                    $email_verify_phone = $this->distributorModel->email_verify_phone($_POST['username']);
                } else {
                    $check_email = $this->distributorModel->email_verify($_POST['username']);
                }
                

                if(empty($check_email) && empty($email_verify_phone))
                {
                    $_SESSION['success'] = "Invalid Username";
                    $this->view('distributor/login');
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
                       $this->view('distributor/login');
                       
                    }else
                    {
                        if($user->type=="admin")
                        {
                            $_SESSION['rexkod_admin_id'] = $user->id;
                            $_SESSION['rexkod_admin_email'] = $user->email;
                            $_SESSION['rexkod_admin_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('distributor/index');
                        }

                        elseif($user->type=="vendor")
                        {
                            $_SESSION['rexkod_vendor_id'] = $user->id;
                            $_SESSION['rexkod_vendor_email'] = $user->email;
                            $_SESSION['rexkod_vendor_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('distributor/index');
                        }
                        elseif($user->type=="user")
                        {
                        $_SESSION['rexkod_user_id'] = $user->id;
                        $_SESSION['rexkod_user_email'] = $user->email;
                        $_SESSION['rexkod_user_phone'] = $user->phone;
                        $_SESSION['rexkod_user_name'] = $user->name;
                        $_SESSION['rexkod_user_type'] = $user->type;
                        }
                        elseif($user->type=="distributor")
                        {
                           
                        $_SESSION['rexkod_distributor_id'] = $user->id;
                        $_SESSION['rexkod_distributor_email'] = $user->email;
                        $_SESSION['rexkod_distributor_phone'] = $user->phone;
                        $_SESSION['rexkod_distributor_name'] = $user->name;
                        $_SESSION['rexkod_distributor_type'] = $user->type;
                            
                        }
                        else
                        {
                            
                            $_SESSION['success'] = "You do not have access!";
                            redirect('distributor/login');
                        }

                        
                    }
                    
                }
               
            }
        }
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
                redirect('distributor/register');
            }else if (empty($name)) {
                $_SESSION['success'] = 'Please enter name';
                redirect('distributor/register');
            } else if ($this->distributorModel->findUserByemail($email)) {
                $_SESSION['success'] = 'Email already taken';
                redirect('distributor/register');
            
            }else{
                if ($this->distributorModel->findUserByphno($phno)) {
                    $_SESSION['success'] = 'Phone number already taken';
                    redirect('distributor/register');
                } else {
                    if ($this->distributorModel->add_user_otp($email, $phno,$name)) {
                        $user = $this->distributorModel->userlogin($phno);
                        $_SESSION['rexkod_user_id'] = $user->id;
                        $_SESSION['rexkod_user_email'] = $user->email;
                        $_SESSION['rexkod_user_phone'] = $user->phone;
                        $_SESSION['rexkod_user_name'] = $user->name;
                        $_SESSION['rexkod_user_type'] = $user->type;
                   

                        $_SESSION['success'] = "Registered Successfully..! Please wait for the approval from the admin to login ";
                      
                        redirect('retail/login');
                    } else {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('distributor/register');
                    }
                }
            }
        } else {
             
            redirect('distributor/register');
        }
    }
    


    public function user_login()
    {

        if (!isset($_POST['user_phone'])) {
            $_SESSION['success'] = "Enter your phone number";
            redirect('distributor/login');
        } else {


            $user = "";

            $email_verify_phone = $this->retailModel->email_verify_phone($_POST['user_phone']);

            if (empty($email_verify_phone)) {
                $_SESSION['success'] = "Invalid Phone";
                redirect('distributor/login');
            } else {
                $user = $email_verify_phone;

                if (empty($user)) {

                    $_SESSION['success'] = "Invalid Credential!";
                    redirect('distributor/login');
                } else {
                    if ($user->type == "admin") {
                        $_SESSION['success'] = "Please Login From Vendor App";
                        redirect('distributor/login');
                    } elseif ($user->type == "vendor") {
                        $_SESSION['success'] = "Please Login From Vendor App";
                        redirect('retail/login');
                    } elseif ($user->type == "delivery") {
                        $_SESSION['success'] = "Please Login From Delivery App";
                        redirect('retail/login');
                    } elseif ($user->type == "distributor") {
                    
                        $_SESSION['rexkod_distributor_id'] = $user->id;
                        $_SESSION['rexkod_distributor_name'] = $user->id;
                        $_SESSION['rexkod_distributor_email'] = $user->email;
                        $_SESSION['rexkod_distributor_phone'] = $user->phone;
                        $_SESSION['rexkod_login_type'] = $user->type;
                        redirect('retail/index');
                    } elseif (($user->type == "retail")) {
                        $_SESSION['rexkod_user_id'] = $user->id;
                        $_SESSION['rexkod_user_name'] = $user->name;
                        $_SESSION['rexkod_user_email'] = $user->email;
                        $_SESSION['rexkod_user_phone'] = $user->phone;
                        $_SESSION['rexkod_login_type'] = $user->type;
                        redirect('distributor/index');
                    }
                }
            }
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

    public function register()
    {
       $this->view('distributor/register'); 
    }






}