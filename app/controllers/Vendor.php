<?php
class Vendor extends Controller 
{
	public function __construct()
	{
	    $this->pageModel = $this->model('Apis'); 
        $this->adminModel = $this->model('Admins');
	}

	public function index() 
	{
        
        if (!isset($_SESSION['rexkod_admin_id']) && !isset($_SESSION['rexkod_vendor_id'])) 
	    {
	       redirect('vendor/panel_login');
	    } 
        
        else {
            
            if(isset($_SESSION['rexkod_vendor_id'])){
                $get_vendor = $this->pageModel->getVendorById($_SESSION['rexkod_vendor_id']);
            }else{
                $get_vendor = $this->pageModel->getVendorById($_SESSION['rexkod_admin_id']);
            }
        

            $data = [
                        'vendor_detail' => $get_vendor
            ];

	   $this->view('vendor/index');
        }
	   
	}



    public function view_product($id)
    {

        $products = $this->pageModel->get_single_products($id);

        $data = [
                    'get_pro' => $products,
                ];
        $this->view('vendor/view_product',$data);
    }







    public function panel_login()
    {
       
        if(!isset($_POST['username']))
        {
            
            $this->view('vendor/panel_login');
        }
        else
        { 
            
            if(!isset($_POST['password']))
            {
                $_SESSION['success'] = "Enter Password";
                $this->view('vendor/panel_login');
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
                    $this->view('vendor/panel_login');
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
                       $this->view('vendor/panel_login');
                       
                    }else
                    {
                        if($user->type=="admin")
                        {
                            // $_SESSION['rexkod_admin_id'] = $user->id;
                            // $_SESSION['rexkod_admin_name'] = $user->name;
                            // $_SESSION['rexkod_admin_email'] = $user->email;
                            // $_SESSION['rexkod_admin_phone'] = $user->phone;
                            // $_SESSION['rexkod_login_type'] = $user->type;
                            // redirect('admin/index');
                            $_SESSION['success'] = "You do not have access!";
                            redirect('vendor/panel_login');
                        }

                        elseif($user->type=="vendor")
                        {
                            $_SESSION['rexkod_vendor_id'] = $user->id;
                            $_SESSION['rexkod_vendor_name'] = $user->name;
                            $_SESSION['rexkod_vendor_email'] = $user->email;
                            $_SESSION['rexkod_vendor_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('admin/index');
                        }

                        elseif($user->type=="delivery")
                        {
                            $_SESSION['success'] = "You do not have access!";
                            redirect('vendor/panel_login');
                            
                        }
                        else
                        {
                            
                            $_SESSION['success'] = "You do not have access!";
                            redirect('vendor/panel_login');
                        }
                    }
                    
                }
               
            }
        }
    }



    


 
    


	// public function add_product()
    // {
    //     $get_all_subcategory = $this->adminModel->get_all_subcategory();

    //     $data = [
    //                 'all_subcategory' => $get_all_subcategory,
    //     ];
        

    //     $this->view('vendor/add_product', $data);
    // }
    public function add_product()
    {
        $id = $_SESSION['rexkod_vendor_id'];
        $get_all_subcategory = $this->adminModel->get_all_subcategory();
        $get_vendor = $this->pageModel->getVendorById($id);

        $data = [
                    'all_subcategory' => $get_all_subcategory,
                    'vendor_detail' => $get_vendor,
        ];
        

        $this->view('vendor/add_product', $data);
    }
    

    public function update_range_shippping(){

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

        $data = (object) $data;

        $this->adminModel->update_range_shipping($data);

        $_SESSION['success'] = "Shipping Updated";
        redirect('vendor/shipping_range'); 
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
            redirect('vendor/index');
        }else
        {
             $_SESSION['success'] = "try later..!";
            redirect('vendor/index');
        }
    }





    public function products()
    {

        $get_all_category = $this->adminModel->get_all_category();

        if(isset($_SESSION['rexkod_admin_id'])){

        $products = $this->pageModel->get_all_products_forVendor($_SESSION['rexkod_admin_id']);
        }
        else {
            $products = $this->pageModel->get_all_products_forVendor($_SESSION['rexkod_vendor_id']); 
        }
        $data = [
                    'all_pro' => $products,
                    'all_category' => $get_all_category,
                ];

        $this->view('vendor/products',$data);
    }



    public function all_products()
    {

        $products = $this->pageModel->get_all_products();
        $data = [
                    'all_pro' => $products,
                ];

        $this->view('vendor/all_products',$data);
    }

    public function all_cat_subcat()
    {

        $get_all_category = $this->adminModel->get_all_category();
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_category' => $get_all_category,
            'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('vendor/all_cat_subcat',$data);
    }


    public function featured_category()
    {

        $get_all_category = $this->adminModel->get_all_category();
        $get_all_vendors = $this->pageModel->get_all_vendors();
        $featured_category = $this->adminModel->get_featured_category();

        $data = [
            'all_category' => $get_all_category,
            'all_vendors' => $get_all_vendors,
            'featured_category' => $featured_category,
        ];

        $this->view('vendor/featured_category',$data);
    }


    


    public function del_product($id)
    {
        $this->pageModel->delete_product($id);
        $_SESSION['success'] = "product deleted successfully";
        redirect('vendor/all_products');
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
        redirect('vendor/customers_cod');
        } else {
            
            $_SESSION['success'] = "COD Not Updated";
            redirect('vendor/customers_cod');
    
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
        redirect('vendor/vendors_cod');
        } else {
            
            $_SESSION['success'] = "COD Not Updated";
            redirect('vendor/vendors_cod');
    
            }
    }
    






    public function change_pass()
    {
        $this->view('vendor/change_pass');
    }


    public function report($id)
    {
        $data =['report'=>$id];
        $this->view('vendor/report',$data);
    }


    public function tcs_certificates()
    {

        $get_tcs = $this->adminModel->get_all_tcs();

        $data = [
                    'all_tcs' => $get_tcs,
                ];
        $this->view('vendor/tcs_certificates',$data);
    }
 



    public function add_coupon_vendor()
    {
        $get_all_vendors = $this->pageModel->get_all_vendors();
        

        $data = [
                    'all_vendors' => $get_all_vendors
        ];

        $this->view('vendor/add_coupon_vendor',$data);
    }


    public function add_coupon_subcat()
    {
        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('vendor/add_coupon_subcat',$data);
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
                            redirect('vendor/change_pass');
                        }
                        else
                        {
                            $_SESSION['success'] = "Confirm Password not matching with New Password";
                            redirect('vendor/change_pass');
                        }
                    }
                    else
                    {
                        $_SESSION['success'] = "Enter Confirm Password";
                        redirect('vendor/change_pass');
                    }
                }
                else
                {
                    $_SESSION['success'] = "Enter New Password";
                    redirect('vendor/change_pass');
                }
            }
            else
            {
              $_SESSION['success'] = "current password not matching";
              redirect('vendor/change_pass');
            }
        }
        else
        {
          $_SESSION['success'] = "Enter current Password";
          redirect('vendor/change_pass');
        }
    }

    public function logout()
    {
       session_destroy();
       redirect('vendor/panel_login');
    }

    
    public function orders()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('vendor/orders',$data);
    }


    public function tcs_certificate()
    {
        $tcs_cert = $this->adminModel->get_tcs();
        $data = [
                    'all_tcs' => $tcs_cert,
                ];
        $this->view('pages/tcs_certificate',$data);
    }



    public function vendortcs()
    {

        $get_tcs = $this->adminModel->get_all_tcs();

        $data = [
                    'all_tcs' => $get_tcs,
                ];
        $this->view('vendor/vendortcs',$data);
    }




    public function export_enquiry()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('vendor/export_enquiry',$data);
    }


    public function returns()
    {
        $products = $this->adminModel->get_all_return_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('vendor/returns',$data);
    }



    public function label_orders()
    {
        $products = $this->adminModel->get_all_packed_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('vendor/label_orders',$data);
    }



    public function label_returns()
    {
        $products = $this->adminModel->get_all_return_orders_vendorwise();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('vendor/label_returns',$data);
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
        
        $this->view('vendor/order_invoice1', $data);
    }


    
    public function view_order($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        
        $get_order_detail = $this->pageModel->getOrderDetailById($id);
        
        $data = [
                    'get_order' => $get_order,
                    'get_order_detail' => $get_order_detail
                ];
                
       $this->view('vendor/view_order',$data); 
    } 
    public function view_return($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        
        $get_order_detail = $this->pageModel->getOrderDetailById($id);
        
        $data = [
                    'get_order' => $get_order,
                    'get_order_detail' => $get_order_detail
                ];
                
       $this->view('vendor/view_return',$data); 
    } 



    public function change_state($id)
    {
        
        $st  = $_POST['st'];
        $this->adminModel->change_status($id,$st);
        $_SESSION['success'] = "Status changed";
        redirect('vendor/all_orders');
    }


    public function invoice($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        $get_vendor = $this->pageModel->getVendorById($get_order->vendor_id);
        $get_user = $this->pageModel->get_custinfo($get_order->user_id);
        $get_order_detail = $this->pageModel->getOrderDetailById($id);
        
        $data = [
                    'get_order' => $get_order,
                    'get_vendor' => $get_vendor,
                    'get_user' => $get_user,
                    'get_order_detail' => $get_order_detail
                ];
                
       $this->view('vendor/invoice',$data); 
    } 


    public function view_order_export($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        
        $get_order_detail = $this->pageModel->getOrderDetailById($id);
        
        $data = [
                    'get_order' => $get_order,
                    'get_order_detail' => $get_order_detail
                ];
                
       $this->view('vendor/view_order_export',$data); 
    } 

    
    public function transactions()
    {
        $products = $this->adminModel->get_all_orders();
        $data = [
                    'all_orders' => $products,
                ];
        $this->view('vendor/transactions',$data);
    }

    public function reports()
    {
       $this->view('vendor/reports'); 
    }

    public function vendor_verify($id)
    {
        $verified = $this->adminModel->verify_vendor($id);

        if($verified){
        $_SESSION['success'] = "Vendor Verified!";
        redirect('vendor/view_vendor/'.$id);
        }else {
        $_SESSION['success'] = "Vendor Not Verified!";
        redirect('vendor/view_vendor/'.$id);
        }

    }


    public function customer_verify($id)
    {
        $verified = $this->adminModel->verify_customer($id);

        if($verified){
        $_SESSION['success'] = "Customer Verified!";
        redirect('vendor/view_customer/'.$id);
        }else {
        $_SESSION['success'] = "Customer Not Verified!";
        redirect('vendor/view_customer/'.$id);
        }

    }





    public function vendors()
    {

        $get_all_vendors = $this->pageModel->get_all_vendors();
        

        $data = [
                    'all_vendors' => $get_all_vendors
        ];
        
        

       $this->view('vendor/vendors',$data); 
    }


    public function vendors_cod()
    {

        $get_all_vendors = $this->pageModel->get_all_vendors();
        

        $data = [
                    'all_vendors' => $get_all_vendors
        ];
        
        

       $this->view('vendor/vendors_cod',$data); 
    }




    public function view_vendor($id)
    {
        $get_user = $this->pageModel->get_userinfo($id);
        $get_vendor = $this->pageModel->getVendorById($id);
        

        $data = [
                    'user_detail' => $get_user,
                    'vendor_detail' => $get_vendor,
        ];
        
        $this->view('vendor/view_vendor',$data); 
    }


    public function view_customer($id)
    {
        $get_user = $this->pageModel->get_userinfo($id);
        $get_customer = $this->pageModel->get_custinfo($id);
        

        $data = [
            'user_detail' => $get_user,
            'customer_detail' => $get_customer
        ];
        
        $this->view('vendor/view_customer',$data); 
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
        $this->view('vendor/profile',$data); 
    }



    public function admin_register()
    {
       $this->view('vendor/admin_register'); 
    }




    public function add_vendor(){

        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
            'all_subcategory' => $get_all_subcategory,
        ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {

                
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $pass = "myjanant";
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $pincode = $_POST['pincode'];
                $gst = $_POST['gst'];
                $timing = $_POST['timing'];
                $minval = $_POST['minval'];
                $subcat_id = $_POST['subcat_id'];
                $commission = $_POST['commission'];
     
                if (empty($email)) 
                {
                    $_SESSION['success'] = 'Please enter email';
                    $this->view('vendor/add_vendor'); 
                } 
                else 
                {
    
    
                    if ($this->pageModel->email_verify_phone($phone)) 
                    {
                      $_SESSION['success'] = 'Phone number already taken';
                      redirect('vendor/add_vendor'); 
                    } 
                    else 
                    {
    
                        

                        if ($this->pageModel->add_vendor($name, $email, $phone, $pass, $address, $city, $state, $pincode, $gst, $timing, $minval, $subcat_id, $commission)) 
                        {
                            $_SESSION['success'] = "Registered Successfully..! ";
                            $this->view('vendor/add_vendor'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'Registeration Failed';
                            $this->view('vendor/add_vendor'); 
                        }
                    }
                }
            } 
            else 
            {
                $this->view('vendor/add_vendor',$data); 
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
                            redirect('vendor/profile'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'Profile Not Added';
                            $this->view('vendor/add_profile'); 
                        }
             }
            else 
            {
                $this->view('vendor/add_profile',$data); 
            }
        }



        
        public function settings()
        {
           $this->view('vendor/settings'); 
        }

        public function shipping_subcat()
        {
            $get_all_subcategory = $this->adminModel->get_all_subcategory();

            $data = [
                        'all_subcategory' => $get_all_subcategory,
            ];
            $this->view('vendor/shipping_subcat', $data); 
        }



        public function shipping_range()
        {
            $get_shipping = $this->adminModel->get_shipping();

            $data = [
                        'shipping' => $get_shipping,
            ];
           $this->view('vendor/shipping_range',$data); 
        }



        public function tcs_certificate_vendor()
        {

            $get_all_vendors = $this->pageModel->get_all_vendors();
        

            $data = [
                        'all_vendors' => $get_all_vendors
            ];

           $this->view('vendor/tcs_certificate_vendor', $data); 

        }



        public function tcs_certificate_customer()
        {
                  
        $get_all_customers = $this->adminModel->get_all_customers();

        $data = [

            'all_customers' => $get_all_customers,
        ];
           $this->view('vendor/tcs_certificate_customer',$data); 
        }




        
 

    public function add_user()
    {
       $this->view('vendor/add_user'); 
    }




    public function update_order_status($id)
    { 
        $status= $_POST['order_status'];
        $statusupdate = $this->adminModel->update_order_status($id,$status);

        
        if($statusupdate){
        $_SESSION['success'] = "Status Updated";
        redirect('vendor/orders');
        } else {
            
            $_SESSION['success'] = "Status Not Updated";
            redirect('vendor/orders');
    
            }
    }


    public function update_vendor_plan($pval)
    { 
        $start_date = date("Y-m-d");
        $end_date = date('Y-m-d', strtotime($start_date. ' + 30 days'));
        $planupdate = $this->adminModel->update_vendor_plan($pval,$start_date,$end_date);

        
        if($planupdate){
        $_SESSION['success'] = "Plan Subscribed";
        redirect('vendor/index');
        } else {
            
            $_SESSION['success'] = "Plan not Subscribed";
            redirect('vendor/subscription');
    
            }
    }


    public function update_return_status($id)
    { 
        $status= $_POST['order_status'];
        $statusupdate = $this->adminModel->update_return_status($id,$status);

        
        if($statusupdate){
        $_SESSION['success'] = "Status Updated";
        redirect('vendor/returns');
        } else {
            
            $_SESSION['success'] = "Status Not Updated";
            redirect('vendor/returns');
    
            }
    }


    public function payout()
    {
       $this->view('vendor/payout'); 
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
        redirect('vendor/all_deliveryUsers');
    }

    public function all_deliveryUsers()
    {
        $get_all_deliveryUsers = $this->adminModel->get_all_deliveryUsers();

        $data = [ 
            
            'get_all_deliveryUsers' => $get_all_deliveryUsers,
        ];

       $this->view('vendor/all_deliveryUsers', $data); 
    }

    public function edit_deliveryUser($id)
    {

        $get_all_by_ID = $this->adminModel->get_all_by_ID($id);

         $data = [ 
            
            'get_all_by_ID' => $get_all_by_ID,
        ];

       $this->view('vendor/edit_deliveryUser', $data);

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
            redirect('vendor/all_deliveryUsers');

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
            redirect('vendor/all_deliveryUsers');

        }

        
    }

    public function delete_deliveryUser($id)
    {

       $delete_deliveryUserby_id = $this->adminModel->delete_deliveryUserby_id($id);
       
       $_SESSION['success'] = "Delivery user deleted Successfully";
            redirect('vendor/all_deliveryUsers'); 

    }

    public function assign_orders()
    {
        $get_all_deliveryUsers = $this->adminModel->get_all_deliveryUsers();

        $products = $this->adminModel->get_all_orders();
       
        $data = [
                    'all_pro' => $products,
                    'get_all_deliveryUsers' => $get_all_deliveryUsers,
                ];
 
        $this->view('vendor/assign_orders',$data);

    }

    public function assign_deliveryUser($id)
    {

        $get_all_by_ID = $this->adminModel->get_all_by_ID($_POST['delivery_user']);

        $this->adminModel->change_deliverystatus($id,$get_all_by_ID->auth_id, $get_all_by_ID->name);

        $_SESSION['success'] = "Delivery User Assigned Successfully";
        redirect('vendor/assign_orders');

    }

  




    public function add_category()
    {
        $this->view('vendor/add_category');
    }

    public function subscription()
    {
        $this->view('vendor/subscription');
    }


    public function add_subcategory()
    {
        $get_all_category = $this->adminModel->get_all_category();

        $data = [
            'all_category' => $get_all_category,
        ];

        $this->view('vendor/add_subcategory', $data);
    }


    public function create_category()
    {
        $category_name = $_POST['category_name'];

        $this->adminModel->create_category($category_name);

        $_SESSION['success'] = "Category created Successfully";
        redirect('vendor/category'); 
    }


    public function add_label($id)
    {
        if(!empty($_FILES['shipping_label']['name']))
        {
            $f_name = $_FILES['shipping_label']['name'];
            $f_temp = $_FILES['shipping_label']['tmp_name'];
            $size = $_FILES['shipping_label']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_vendor_id']."".$unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $shipping_label=$f_newfile;
        }
        else
        {
            $shipping_label = NULL;
        }
        
        $delivery_agent = $_POST['delivery_agent'];
        $tracking_id = $_POST['tracking_id'];
        $this->adminModel->add_order_label($id,$delivery_agent,$tracking_id,$shipping_label);

        $_SESSION['success'] = "Delivery Details Added";
        redirect('vendor/label_orders'); 
    }





    public function add_return_label($id)
    {
        if(!empty($_FILES['shipping_label']['name']))
        {
            $f_name = $_FILES['shipping_label']['name'];
            $f_temp = $_FILES['shipping_label']['tmp_name'];
            $size = $_FILES['shipping_label']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_vendor_id']."".$unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $shipping_label=$f_newfile;
        }
        else
        {
            $shipping_label = NULL;
        }
        
        $delivery_agent = $_POST['delivery_agent'];
        $tracking_id = $_POST['tracking_id'];
        $this->adminModel->add_return_label($id,$delivery_agent,$tracking_id,$shipping_label);

        $_SESSION['success'] = "Return Details Added";
        redirect('vendor/label_returns'); 
    }




    
    public function update_subcat_shipping($id)
    {
        $shipping_cost = $_POST['shipping_cost'];
        $this->adminModel->update_subcat_shipping($id,$shipping_cost);

        $_SESSION['success'] = "Shipping Updated";
        redirect('vendor/shipping_subcat'); 
    }



    public function update_commission($id)
    {
        $commission = $_POST['commission'];
        $this->adminModel->update_commission($id,$commission);

        $_SESSION['success'] = "Commission Updated";
        redirect('vendor/view_vendor/'.$id); 
    }





    public function add_tcs()
    {
        if(!empty($_FILES['tcs_cert']['name']))
        {
            $f_name = $_FILES['tcs_cert']['name'];
            $f_temp = $_FILES['tcs_cert']['tmp_name'];
            $size = $_FILES['tcs_cert']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $unqdate = date("Ymd");
            $unqtime = time();
            $unqname = $_SESSION['rexkod_admin_id']."".$unqdate."".$unqtime;
            $f_newfile=$unqname.'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $tcs_certificate=$f_newfile;
        }
        else
        {
            $tcs_certificate = NULL;
        }
        
        $tcs_userid = $_POST['tcs_userid'];
        $tcs_remark = $_POST['tcs_remark'];

        $this->adminModel->add_tcs($tcs_userid, $tcs_certificate, $tcs_remark);

        $_SESSION['success'] = "TCS certificate added";
        redirect('vendor/tcs_certificates'); 
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
             redirect('vendor/coupons'); }

    else {
        $_SESSION['success'] = "Coupon not created";
             redirect('vendor/add_coupon'); }
             
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
        redirect('vendor/subcategory'); 
        } else {
            $_SESSION['success'] = "Subcategory Not Created";
            redirect('vendor/add_subcategory'); 
        }
    }



    public function category()
    {

        $get_all_category = $this->adminModel->get_all_category();

        $data = [
                    'all_category' => $get_all_category,
        ];

        $this->view('vendor/category',$data);

    }

  


    public function coupons()
    {

        $get_all_coupons = $this->adminModel->get_all_coupons();

        $data = [
                    'all_coupons' => $get_all_coupons,
        ];

        $this->view('vendor/coupons',$data);

    }


    public function subcategory()
    {

        $get_all_subcategory = $this->adminModel->get_all_subcategory();

        $data = [
                    'all_subcategory' => $get_all_subcategory,
        ];

        $this->view('vendor/subcategory',$data);

    }


    public function payouts()
    {

        $get_payouts = $this->adminModel->get_all_payouts();

        $data = [
                    'all_payouts' => $get_payouts,
        ];

        $this->view('vendor/payouts',$data);

    }



    public function edit_category($id)
    {
        $get_categoryBy_id = $this->adminModel->getCategoryById($id);

        $data = [
            'category' => $get_categoryBy_id,
        ];

        $this->view('vendor/edit_category',$data);
    }


    public function edit_subcategory($id)
    {
        $get_subcategoryBy_id = $this->adminModel->getSubcategoryById($id);

        $data = [
            'subcategory' => $get_subcategoryBy_id,
        ];

        $this->view('vendor/edit_subcategory',$data);
    }




    public function vendor_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $email = $_POST['email'];
            $phno = $_POST['phno'];
            $pass = $_POST['password'];
 
            if (empty($email)) 
            {
                $_SESSION['success'] = 'Please enter email';
                redirect('vendor/admin_register');
            } else if ($this->pageModel->findUserByemail($email)) 
            {
              $_SESSION['success'] = 'Email already taken';
              redirect('vendor/admin_register');
            } 
            else 
            {


                if ($this->pageModel->findUserByphno($phno)) 
                {
                  $_SESSION['success'] = 'Phone number already taken';
                  redirect('vendor/admin_register');
                } 
                else 
                {

                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                    if ($this->adminModel->add_vendor($email, $phno, $pass)) 
                    {
                        
                            $user = $this->pageModel->ulogin($email, $_POST['password']);
                        
                            $_SESSION['rexkod_vendor_id'] = $user->id;
                            $_SESSION['rexkod_vendor_email'] = $user->email;
                            $_SESSION['rexkod_vendor_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;

                        $_SESSION['success'] = "Registered Successfully..! ";
                        redirect('vendor/add_profile');
                    }
                    else
                    {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('vendor/admin_register');
                    }
                }
            }
        } 
        else 
        {
          redirect('vendor/admin_register');
        }
    }




    public function update_category()
    {
        $get_categoryBy_id = $this->adminModel->get_categoryBy_id($_POST['id']);

        $update_category = $this->adminModel->update_category($_POST['id'], $_POST['category_name'], $get_categoryBy_id->img);

        $_SESSION['success'] = "Category updated Successfully";
        redirect('vendor/all_category'); 

    }

    public function change_status_category($id)
    {
        $id_arr = explode("|", $id);

        if($id_arr[1] == 11)
        {
            $status = 1;
        }
        elseif($id_arr[1] == 22)
        {
            $status = 0;
        }

        $update_status_category = $this->adminModel->update_status_category($id_arr[0], $status);

        $_SESSION['success'] = "Status updated Successfully";
        redirect('vendor/all_category'); 
    }

    public function edit_product($id)
    {
        $get_productBy_id = $this->adminModel->get_productBy_id($id);

         $data = [
            'product' => $get_productBy_id,
        ];

        $this->view('vendor/edit_product',$data);

    }

    public function update_product()
    {
        $id = $_POST['id'];

        // echo $_POST['category_name'];

        // $get_categoryBy_name = $this->adminModel->get_categoryBy_name($_POST['category_name']);

        // var_dump($get_categoryBy_name);

        $cat = $_POST['cat'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $discount_price = $_POST['discount_price'];
        $p_details = $_POST['p_details'];
        $product_type = $_POST['product_type'];

        $get_productBy_id = $this->adminModel->get_productBy_id($_POST['id']);


        $result = $this->adminModel->update_product_db($id, $name, $price, $discount_price, $cat, $p_details, $product_type, $get_productBy_id->p_image);
        if($result)
        {
            $_SESSION['success'] = "Product Updated successfully..!";
            redirect('vendor/all_products');
        }else
        {
             $_SESSION['success'] = "try later..!";
            redirect('vendor/all_products');
        }

    }

    public function viewOrder_deliveryUser($user_id)
    {

        $viewOrder_deliveryUser = $this->adminModel->viewOrder_deliveryUser($user_id);

        $get_all_by_ID = $this->adminModel->get_all_by_ID($user_id);

        $data = [
            'viewOrder_deliveryUser' => $viewOrder_deliveryUser,
            'get_all_by_ID' => $get_all_by_ID
        ];

        $this->view('vendor/viewOrder_deliveryUser',$data);

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

        $this->view('vendor/viewOrderbyType_deliveryUser',$data);

    }

    public function pending_orders()
    {
        $products = $this->adminModel->get_all_orders();

        $data = [
            
            'all_pro' => $products,
        ];
        $this->view('vendor/pending_orders',$data);
    }

    public function completed_orders()
    {
        $products = $this->adminModel->get_all_orders();
        
        $data = [
            
            'all_pro' => $products,
        ];
        $this->view('vendor/completed_orders',$data);
    }

    public function update_active_status($id)
    {
        $id_arr = explode("|", $id);

        if($id_arr[1] == 1)
        {
            $update_active_status_db = $this->adminModel->update_active_status_db($id_arr[0], 1);

            $_SESSION['success'] = "Delivery User Activated successfully";    

            redirect('vendor/all_deliveryUsers');

        }
        elseif($id_arr[1] == 0)
        {
            $update_active_status_db = $this->adminModel->update_active_status_db($id_arr[0], 0);

            $_SESSION['success'] = "Delivery User De-Activated successfully";    

            redirect('vendor/all_deliveryUsers');
        }
    }

    public function product_ratings()
    {

        $products = $this->pageModel->get_all_products();
        $data = [
                    'all_pro' => $products,
                ];
        $this->view('vendor/product_ratings',$data);
    }

    public function qr_code()
    {
         $res = $this->pageModel->ulogin_using_rowId($_SESSION['user_id']);

        $data = [
            'res' => $res
        ];

        $this->view('vendor/qr_code', $data);
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

            redirect('vendor/qr_code');
    }


    public function view_orderDetails($id)
    {

        $get_order_details = $this->adminModel->get_order_details($id);

        $data = [ 
                    
            'get_order_details' =>  $get_order_details,            
        ];

        $this->view('vendor/view_orderDetails', $data);
    }

    public function view_allProdByCat($id)
    {

         $view_allProdByCat = $this->adminModel->view_allProdByCat($id);

        $data = [ 
                    
            'all_pro' =>  $view_allProdByCat,            
        ];

        $this->view('vendor/view_allProdByCat', $data);


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

        $this->view('vendor/customers',$data); 
    }


    public function customers_cod()
    {         
        $get_all_customers = $this->adminModel->get_all_customers();

        $data = [

            'all_customers' => $get_all_customers,
        ];

        $this->view('vendor/customers_cod',$data); 
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

        $this->view('vendor/banner', $data);
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
            redirect('vendor/banner');
        } else {
            $_SESSION['success'] = "Banner Not Updated";
            redirect('vendor/banner');
        }
       

    }





}