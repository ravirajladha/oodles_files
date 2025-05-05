<?php
class Api extends Controller
{
    public function __construct()
    {
        $this->pageModel = $this->model('Apis');  
        $this->adminModel = $this->model('Admins');  
     
    }

    public function index()
    {
      
        if(isset($_SESSION['rexkod_user_id']))
        {
            if(empty($this->pageModel->getVendorById($_SESSION['rexkod_user_id']))){
                redirect('api/add_profile');
            }
            $get_banner = $this->pageModel->get_banner();
            $get_all_category = $this->adminModel->get_all_category();
            $get_all_subcategory = $this->adminModel->get_all_subcategory();
            $get_all_products= $this->pageModel->get_all_products();
            $get_admin_products= $this->pageModel->get_admin_products();

            $service_categories= $this->adminModel->get_all_category_service();
            $services= $this->pageModel->get_all_services();



            $data = [

                'get_banner' => $get_banner,
                'get_category' => $get_all_category,
                'get_subcategory' => $get_all_subcategory,
                'get_product' => $get_all_products,
                'get_admin_product' => $get_admin_products,
                'service_categories' => $service_categories,
                'services' => $services,

            ];   

            $this->view('api/index', $data);
        }
        else
        {
            redirect('api/home');
        }   
        
        
    }

    public function home()
    {               
        $this->view('api/home');
    }


    public function faqs()
    {               
        $this->view('api/faqs');
    }


    public function tnc()
    {               
        $this->view('api/tnc');
    }


    public function wallet()
    {               
        $created_user_id= $_SESSION['rexkod_user_id'];
        $get_wallet_detail = $this->adminModel->get_wallet($created_user_id);
        $data=[
            'get_wallet_detail'=>$get_wallet_detail,
        ];
        $this->view('api/wallet',$data);
    }

    public function privacy_policy()
    {               
        $this->view('api/privacy_policy');
    }


    public function refund_policy()
    {               
        $this->view('api/refund_policy');
    }


    public function invoice($id)
    {
        $get_order = $this->pageModel->getOrderById($id);
        $get_vendor = $this->pageModel->getVendorById($get_order->vendor_id);
        $get_user = $this->pageModel->get_custinfo1($get_order->user_id);
        $get_order_detail = $this->pageModel->getOrderDetailById($id);
        
        $data = [
                    'get_order' => $get_order,
                    'get_vendor' => $get_vendor,
                    'get_user' => $get_user,
                    'get_order_detail' => $get_order_detail
                ];
                
       $this->view('api/invoice',$data); 
    } 

    public function send_otp($phone,$otp)
    {
        
        
        $url = "http://sms.profuseservices.com/sendsms.jsp?user=lsamelec&password=2e9e8f3a08XX&senderid=BLPCLS&tempid=1007163111151840759&mobiles=+91".$phone."&sms=Dear%20User,%20your%20OTP%20for%20login%20is%20".$otp.".%20Please%20do%20not%20share%20with%20anyone.%20Team%20Biglander";

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
    


    public function add_product()
    {
        // $id = $_SESSION['rexkod_user_id'];
        $get_all_subcategory = $this->adminModel->get_all_subcategory();
        // $get_vendor = $this->pageModel->getVendorById($id);
        $get_all_vendor = $this->pageModel->get_all_vendors();
        $data = [
                    'all_subcategory' => $get_all_subcategory,
                    // 'vendor_detail' => $get_vendor,
                    'get_all_vendor' =>$get_all_vendor,
        ];
        

        $this->view('api/add_product', $data);
    }




    public function create_service()
    {
        
        $name = $_POST['name'];
        $price = $_POST['price'];
        $subcat = ['subcat'];
        // $price = $_POST['price'];
        
        $p_details = $_POST['p_details'];

        if(isset($_SESSION['rexkod_admin_id'])){
            $created_byId = $_SESSION['rexkod_admin_id'];
        }else {
            $created_byId = $_SESSION['rexkod_user_id'];
        }
        // $created_byId = $_POST['created_byId'];

        $result = $this->adminModel->create_service_db($name, $subcat, $p_details, $created_byId, $price);


        if($result)
        {
            $_SESSION['success'] = "Service added successfully..!";
            redirect('api/add_service');
        }else
        {
             $_SESSION['success'] = "try later..!";
            redirect('api/add_service');
        }
    }





    public function create_product()
    {
        
        $name = $_POST['name'];
        $price = $_POST['price'];
        $subcat = ['subcat'];
        // $price = $_POST['price'];
        
        $p_details = $_POST['p_details'];

        if(isset($_SESSION['rexkod_admin_id'])){
            $created_byId = $_SESSION['rexkod_admin_id'];
        }else {
            $created_byId = $_SESSION['rexkod_user_id'];
        }
        // $created_byId = $_POST['created_byId'];

        $result = $this->adminModel->create_product_db($name, $subcat, $p_details, $created_byId, $price);


        if($result)
        {
            $_SESSION['success'] = "Product Added successfully..!";
            redirect('api/profile');
        }else
        {
             $_SESSION['success'] = "try later..!";
            redirect('api/add_product');
        }
    }



    public function add_service()
    {
        // $id = $_SESSION['rexkod_user_id'];
        $get_all_subcategory = $this->adminModel->get_all_subcategory_service();
        // $get_vendor = $this->pageModel->getVendorById($id);
        $get_all_vendor = $this->pageModel->get_all_vendors();
        $data = [
                    'all_subcategory' => $get_all_subcategory,
                    // 'vendor_detail' => $get_vendor,
                    'get_all_vendor' =>$get_all_vendor,
        ];
        

        $this->view('api/add_service', $data);
    }



        
    public function add_profile(){


            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {

                
                $name = $_POST['name'];
                if (isset($_POST['user_type'])) {
                    $type = 1;
                } else {
                    $type = 0;
                }
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $pincode = $_POST['pincode'];
                $gst = $_POST['gst'];

                
                        if ($this->pageModel->add_user_profile($name, $type, $address, $city, $state, $pincode, $gst)) 
                        {
                            $_SESSION['success'] = "Profile Added Successfully..! ";
                            redirect('api/index'); 
                        }
                        else
                        {
                            $_SESSION['success'] = 'Profile Not Added';
                            $this->view('api/add_profile'); 
                        }
             }
            else 
            {
                //removed $data from the view
                $this->view('api/add_profile'); 
            }
        }



    public function about()
    {               
        $this->view('api/about');
    }

    public function services_unknown()
    {               
        $this->view('api/services_unknown');
    }

    public function contact()
    {               
        $this->view('api/contact');
    }


    public function vendors()
    {         
        $get_all_vendors = $this->pageModel->get_all_vendors1();

        $data = [

            'get_all_vendors' => $get_all_vendors,
        ];

        $this->view('api/vendors', $data);
    }
    public function category()
    {         
        $get_all_category= $this->pageModel->get_all_category();

        $data = [

            'get_all_category' => $get_all_category,
        ];

        $this->view('api/category', $data);
    }
    public function subcategory()
    {         
        $get_all_subcategory= $this->pageModel->get_all_subcategory();

        $data = [

            'get_all_subcategory' => $get_all_subcategory,
        ];

        $this->view('api/subcategory', $data);
    }





    public function find_productsFor_vendorId($id)
    {
        $products_forVendor = $this->pageModel->get_all_products_forVendor($id);

        $res = $this->pageModel->ulogin_using_rowId($id);

        $data = [

            'products_forVendor' => $products_forVendor,
            'res' => $res,
        ];

        $this->view('api/products_forVendor', $data);
    }
    public function products_forSubcategory($id)
    {
        $products_forSubcategory = $this->pageModel->get_all_products_forSubcategory($id);

        $res = $this->pageModel->clogin_using_rowId($id);

        $data = [

            'products_forSubcategory' => $products_forSubcategory,
            'res' => $res,
        ];

        $this->view('api/products_forSubcategory', $data);
    }
    public function subcategory_forCategoryId($id)
    {
        $subcategory_forCategoryId = $this->pageModel->get_all_subcategory_forCategory($id);

        $res = $this->pageModel->clogin_using_rowId($id);

        $data = [

            'subcategory_forCategoryId' => $subcategory_forCategoryId,
            'res' => $res,
        ];

        $this->view('api/subcategory_forCategoryId', $data);
    }
    public function subcategory_for_category_service($id)
    {
        $subcategory_forCategoryId = $this->pageModel->get_all_subcategory_service($id);

        $res = $this->pageModel->clogin_using_row_id_service($id);

        $data = [

            'subcategory_forCategoryId' => $subcategory_forCategoryId,
            'res' => $res,
        ];

        $this->view('api/subcategory_for_category_service', $data);
    }
    public function vendor_forSubcategoryId($id)
    {
        $vendor_forSubcategoryId = $this->pageModel->get_all_vendor_forSubcategory($id);
        $get_all_subcat_bysubcatId = $this->pageModel->get_all_subcat_bysubcatId($id);

        $res = $this->pageModel->clogin_using_rowId($id);

        $data = [

            'vendor_forSubcategoryId' => $vendor_forSubcategoryId,
            'res' => $res,
            'get_all_subcat_bysubcatId' => $get_all_subcat_bysubcatId,
        ];

        $this->view('api/vendor_forSubcategoryId', $data);
    }

    public function vendor_forCategoryId($id)
    {
        $vendor_forCategoryId = $this->pageModel->get_all_vendor_forCategory($id);
        $get_all_category_bycategoryId=
        $this->pageModel->get_all_category_bycategoryId($id);

        $res = $this->pageModel->clogin_using_rowId($id);

        $data = [

            'vendor_forCategoryId' => $vendor_forCategoryId,
            'res' => $res,
            'get_all_category_bycategoryId' => $get_all_category_bycategoryId,
        ];

        $this->view('api/vendor_forCategoryId', $data);
    }

    public function productsFor_categoryId($id)
    {
        $products_forcategory = $this->pageModel->get_all_products_forcategory($id);

        $res = $this->pageModel->clogin_using_rowId($id);

        $data = [

            'products_forcategory' => $products_forcategory,
            'res' => $res,
        ];

        $this->view('api/products_forcategory', $data);
    }
    public function services($id)
    {
        $services_forcategory = $this->pageModel->get_all_services_for_subcategory($id);

        $res = $this->pageModel->clogin_using_row_id_service($id);

        $data = [

            'services_forcategory' => $services_forcategory,
            'res' => $res,
        ];

        $this->view('api/services', $data);
    }



    
    public function products()
    {    
        $get_all_category = $this->adminModel->get_all_category();

        $products = $this->pageModel->get_all_products();

        $data = [
                    'all_pro' => $products,
                    'all_category' => $get_all_category,
                ];

        $this->view('api/products', $data);
    }
   
    public function product_fb()
    {    
        $get_all_category = $this->adminModel->get_all_category();

        $products = $this->pageModel->get_admin_products();

        $data = [
                    'all_pro' => $products,
                    'all_category' => $get_all_category,
                ];

        $this->view('api/product_fb', $data);
    }
   


    public function single_product($id)
    {
        $get_user_details = $this->pageModel->get_all_userinfo();
        $s = $this->pageModel->get_single_products($id);
        $pro_subcategory = $this->adminModel->getSubcategoryById($s->p_subcat); 
        $cart_products = $this->pageModel->getcart_items(); 
        $pp_points = $this->pageModel->getpropage_points(); 
        $data = [ 
            'get_user_details' =>$get_user_details,
            'single_product'=>$s,
            'cart_products'=>$cart_products,
            'subcategory'=>$pro_subcategory,
            'pp_points'=>$pp_points,
        ];

        $this->view('api/single_product', $data);
    }



    public function single_service($id)
    {
        $get_user_details = $this->pageModel->get_all_userinfo();
        $s = $this->pageModel->get_single_service($id);
        $pro_subcategory = $this->adminModel->getSubcategoryById_service($s->p_subcat); 
        $cart_products = $this->pageModel->getcart_items(); 
        $pp_points = $this->pageModel->getpropage_points(); 
        $data = [ 
            'get_user_details' =>$get_user_details,
            'single_product'=>$s,
            'cart_products'=>$cart_products,
            'subcategory'=>$pro_subcategory,
            'pp_points'=>$pp_points,
        ];

        $this->view('api/single_service', $data);
    }


    public function product_orders(){
        $get_all_product_orders = $this->pageModel->get_all_product_orders_by_created_by();
        $data = [
            'get_all_product_orders' => $get_all_product_orders,
        ];
        $this->view('api/product_orders', $data);
    }

    public function service_orders(){
        $get_all_service_orders = $this->pageModel->get_all_service_orders_by_created_by();
        $data = [
            'get_all_service_orders' => $get_all_service_orders,
        ];
        $this->view('api/service_orders', $data);
    }

    public function wallet_error()
    {
       

        $this->view('api/wallet_error');
    }

    public function update_order_status($id)
    { 
        $status= $_POST['order_status'];
        $statusupdate = $this->adminModel->update_order_status($id,$status);

        
        if($statusupdate){
        $_SESSION['success'] = "Status Updated";
        redirect('api/product_orders');
        } else {
            
            $_SESSION['success'] = "Status Not Updated";
            redirect('api/product_orders');
    
            }
    }

    public function update_bookings_status($id)
    { 
        $status= $_POST['order_status'];
        $status_update = $this->adminModel->update_bookings_status($id,$status);

        
        if($status_update){
        $_SESSION['success'] = "Status Updated";
        redirect('api/service_orders');
        } else {
            
            $_SESSION['success'] = "Status Not Updated";
            redirect('api/service_orders');
    
            }
    }




    


    public function add_to_cart($pro_id)
    {   
       
        $created_by = $_SESSION['rexkod_user_id'];
        $qty = $_POST['qty_count'];
        $incart=0;
        $final_price =0;
        $user_detail=$this->pageModel->get_custinfo();
        $customer_verification=$user_detail->user_verified;
        $cart_products = $this->pageModel->getcart_items();
        foreach ($cart_products as $cart) {
            if($cart->item_id == $pro_id){
              $incart=1;
            }
        }


        $x = $this->pageModel->get_single_product($pro_id);

        $found_user = $this->pageModel->get_cart_user_check();
        $found_vendor = $this->pageModel->get_cart_vendor_check($x->created_byId);
        $found_user_detail = $this->pageModel->get_custinfo();
        $cart_permission = 0;

        if(empty($found_user)){
            $cart_permission =1;
        }
        else if(!empty($found_user) && !empty($found_vendor)){
            $cart_permission =1;
        }



 

    if(!empty($found_user_detail)){

        if($customer_verification==1){
        if($cart_permission==1){
            $final_price = $x->p_price;  
            // if($x->min2 == 0){
                
            //     $final_price = $x->price1;          
            // }else if($x->min3 == 0){
                
            //     if($qty <= $x->max1){
            //         $final_price = $x->price1;
            //     }else {
            //         $final_price = $x->price2;
            //     }
            // }else if($x->min4 == 0){
            
            //     if($qty <= $x->max1){
            //         $final_price = $x->price1;
            //     }else if($qty <= $x->max2){
            //         $final_price = $x->price2;
            //     }else {
            //         $final_price = $x->price3;
            //     }
            // }else if($x->min5 == 0){
                
            //     if($qty <= $x->max1){
            //         $final_price = $x->price1;
            //     }else if($qty <= $x->max2){
            //         $final_price = $x->price2;
            //     }else if($qty <= $x->max3){
            //         $final_price = $x->price3;
            //     }else {
            //         $final_price = $x->price4;
            //     }
            // }else if($x->min5 != 0){
                
            //     if($qty <= $x->max1){
            
            //         $final_price = $x->price1;
            //     }else if($qty <= $x->max2){
                
            //         $final_price = $x->price2;
            //     }else if($qty <= $x->max3){
                
            //         $final_price = $x->price3;
            //     }else if($qty <= $x->max4){
                
            //         $final_price = $x->price4;
            //     }else {
                
            //         $final_price = $x->price5;
            //     }
            // }



        $z = (((float)$final_price) * ((float)$qty));

        $data = [
            'id' => $pro_id,
            'name' => $x->p_name,
            'qty' => $qty,
            'price' => $final_price,
            'total' => $z,
            'created_by' => $created_by,
            'user_type' =>  $found_user_detail->user_type,
            'created_byId' => $x->created_byId,
            'created_byType' => $x->created_byType,
            'img' => $x->p_image,
                ];

                $this->pageModel->add_item_to_cart_db($data);

        
                $_SESSION['success'] = "Item Added to cart";
        
                redirect('api/single_product/'.$pro_id);  
            }
            else {

                $_SESSION['success'] = "Item not added to cart, Clear existing cart!";
        
                redirect('api/single_product/'.$pro_id);  

            }

            }else{
                $_SESSION['success'] = "User not verified!";

                redirect('api/single_product/' . $pro_id);
            }
        }
        else{
            redirect('api/add_profile/');
        }
        
      
    }


    public function add_to_booking($pro_id)
    {   
        $time_data = $_POST['time_data'];
        $date_data = $_POST['date_data'];
       
            
        $user_detail=$this->pageModel->get_custinfo();
        $customer_verification=$user_detail->user_verified;
        $created_by = $_SESSION['rexkod_user_id'];
      
       

       
       

        
        $get_service_detail = $this->pageModel->get_single_service($pro_id);
        $price = $get_service_detail->p_price;
        $wallet_detail = $this->adminModel->get_wallet($created_by);
       $user_wallet_balance =  $wallet_detail->balance_amount;
       $payment_type = $_POST['selector'];

        if($payment_type==1){
            if($user_wallet_balance>=$price){
                $new_user_wallet_balance = $user_wallet_balance-$price;
                $paid_amount = $price;
                $balance_amount=0;
                $payment_type=1;
         }else{
            $_SESSION['success'] = "Wallet Balance Low, contact Admin!";
        
            redirect('api/wallet');  
         }
        }elseif($payment_type==2){
            $new_user_wallet_balance = $user_wallet_balance;
            $balance_amount = $price;
            $paid_amount = 0;
            $payment_type=2;

         }elseif($payment_type==3){
            if($user_wallet_balance>=$price){
                $paid_amount = $price;
                $new_user_wallet_balance = $user_wallet_balance-$paid_amount;
                $balance_amount=0;
            }else{
                $paid_amount = $user_wallet_balance;
                $balance_amount = $price-$paid_amount;
                $new_user_wallet_balance = 0;
        }
         }
       if($customer_verification==1){
        $data = [
            'product_id' => $pro_id,
            'p_name' => $get_service_detail->p_name,
            'time_data' => $time_data,
            'date_data' => $date_data,
            'price' => $price,
            'user_id' =>$created_by,
            'created_by_id' => $get_service_detail->created_byId,
            'created_by_type' => $get_service_detail->created_byType,
            'p_image' => $get_service_detail->p_image,
            'payment_type' =>$payment_type,
            'balance_amount' => $balance_amount,
            'paid_amount' => $paid_amount,
        
                ];
               
              $add_service =  $this->pageModel->add_service_to_booking($data);
            
            //   echo $update_wallet;
            //   die();
                if($add_service){
          $update_wallet =  $this->pageModel->update_wallet($created_by,$new_user_wallet_balance);
                $_SESSION['success'] = "Service Booked Successfully";
        
                redirect('api/single_service/'.$pro_id);  
            }
            else {

                $_SESSION['success'] = "Service Not Added!";
        
                redirect('api/single_service/'.$pro_id);  

            }
       
       
       
   
  
       }else{
        $_SESSION['success'] = "User not verified, contact Admin!";
        
        redirect('api/single_service/'.$pro_id); 
       }
        
    }


    public function cart_delete()
    {
        $created_by = $_SESSION['rexkod_user_id'];
        $p_id = $_POST['product_id'];
        $x = $this->pageModel->getcart_items_by_item_id($p_id); 
        $qty = $_POST['count'];
        $qty_old = $x->item_qty;
        $q = $qty_new = $qty_old-$qty;
        
        if($q==0)
        {
            $z = (((float)$x->item_price) * ((float)$q));
            $data = [
                    'cart_id'=>$x->id,
                    'created_by' => $created_by,
                ];
            $this->pageModel->delete_item_to_cart_db_if_zero($data);

        }else
        {
            $z = (((float)$x->item_price) * ((float)$q));
            $data = [
                    'cart_id'=>$x->id,
                    'id' => $p_id,
                    'name' => $x->item_name,
                    'qty' => $q,
                    'price' => $x->item_price,
                    'total' => $z,
                    'created_by' => $created_by,
                ];
            $this->pageModel->delete_item_to_cart_db($data);
        }
        // echo "Item deleted";       
    }



    public function cart()
    {
      
        $s = $this->pageModel->getcart_items();  

        $data = [ 's'=>$s,
    ];

        $this->view('api/cart',$data);
    }




    public function delete_cart_item($id)
    {
        $update_cart_1 = $this->pageModel->delete_cart_item_db($id);

        $s = $this->pageModel->getcart_items(); 

        $data = [ 's'=>$s, ];

        redirect('api/cart',$data);
    }




    public function update_cart_coupon($id)
    {
        $cart_coupon = $this->pageModel->update_cartCoupon($id);

        $s = $this->pageModel->getcart_items();
        $usr = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']); 

        $data = [ 
            's'=>$s,
            'sum' =>$this->pageModel->get_sum_cart(),
            'userinfo'=>$usr,
        ];
        if($cart_coupon){
            $_SESSION['success'] = "Coupon added successfully";
        }else {
            $_SESSION['success'] = "Coupon not added";
        }
        redirect('api/checkout', $data);
    }


    public function return_order($id)
    {
        $order_return = $this->pageModel->return_order($id); 

        if($order_return){
            $_SESSION['success'] = "Return Requested";
        }else {
            $_SESSION['success'] = "Return Request Failed";
        }
        
        $get_orders_user = $this->pageModel->get_orders_user($_SESSION['rexkod_user_id']);

        $data = [ 

            'get_orders_user' =>$get_orders_user,
        ];

        $this->view('api/orders',$data);
    }



    public function checkout()
    {
        $s = $this->pageModel->getcart_items();
        $usr = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']); 
        $get_wallet_info = $this->pageModel->get_wallet_info();

        $data = [ 
            's'=>$s,
            'sum' =>$this->pageModel->get_sum_cart(),
            'userinfo'=>$usr,
            'get_wallet_info' => $get_wallet_info,
        ];

        $this->view('api/checkout', $data);
    }
    public function checkout_services($id)
    {
        $_SESSION['time_data'] = $_POST['time_data'];
        $_SESSION['date_data'] = $_POST['date_data'];
        $get_single_service = $this->pageModel->get_single_service($id);
        
        $usr = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']); 
        $get_wallet_info = $this->pageModel->get_wallet_info();

        $data = [ 
            'service' =>$get_single_service,
          
            'userinfo'=>$usr,
            'get_wallet_info' => $get_wallet_info,
        ];

        $this->view('api/checkout_services', $data);
    }



    public function address()
    {
        $get_user_details = $this->pageModel->get_all_userinfo();

        $data = [ 

            'get_user_details' =>$get_user_details,
        ];

        $this->view('api/address',$data);

    }




    public function tcs_certificate()
    {
        $tcs_cert = $this->pageModel->get_tcs();
        $data = [
                    'all_tcs' => $tcs_cert,
                ];
        $this->view('api/tcs_certificate',$data);
    }



    

    public function pay_for_payment()
    {
        if(isset($_SESSION['rexkod_user_id']))
        {

                $data_checkout = (object) unserialize($_SESSION['data_checkout']);
                //unset($_SESSION['data_checkout']);

                $i_total = $this->pageModel->get_sum_cart_for_payment();

                $i_total = round($i_total);
                $_SESSION['order_id'] = "ORDS" . rand(10000,99999999);   

                $tx = $this->pageModel->get_userinfo($_SESSION['rexkod_user_id']);
                $txuser = $this->pageModel->get_custinfo($_SESSION['rexkod_user_id']);
                $wallet_detail =  $this->pageModel->get_wallet_info();

            $wallet_amount = $wallet_detail->balance_amount;
            $payment_type = $_POST['selector'];

                $data = [

                    'name' => $txuser->user_name,
                    'email' => $tx->email,
                    'phone' => $tx->phone,
                    'tprice' => $i_total,
                    'ORDERID' => $_SESSION['order_id'],
                    'add' => $txuser->user_address,
                    'zipcode' => $txuser->user_pincode,
                    'city' => $txuser->user_city,
                    'state' => $txuser->user_state,
                    'country' => $txuser->user_country,
                    'payment_type' => $payment_type,
                    
                ];

                $res = $this->pageModel->add_cart_for_paymentPayAtdel($data['name'], $data['email'], $data['phone'], $data['add'], $data['city'], $data['state'], $data['zipcode'], $data['country'], $data, $data_checkout,$data['payment_type'],$wallet_amount);  
                if($data['payment_type']!=2){
                    $customer = $this->pageModel->update_wallet_product($_SESSION['rexkod_user_id'],$data_checkout,$wallet_amount);
                }

                if($res){
                $_SESSION['success'] = "Order Placed Successfully";
                redirect('api/sucess');  
                } 


             
           
        }else
        {
            $_SESSION['success'] = "Login and Continue";
            redirect('api/login');
        }
    } 

    public function logout()
    {
       if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }

        session_destroy();

        redirect('api/index');
    }
    public function paymentStatus_cart()
    {

        echo $_SESSION['order_id'];

        $tx = $this->pageModel->gettempdate($_SESSION['order_id']);

        $x1 = explode("|", $tx->temp_data);
        $_SESSION['price'] = $x1[0];

        $_SESSION['name'] = $tx->name;
        $_SESSION['email'] =  $tx->email;
        $_SESSION['phone'] =   $tx->phone;
        $_SESSION['foxcart_user'] = $tx->auth_id;
        $_SESSION['user_all'] = $tx;
        $_SESSION['rexkod_user_id'] = $tx->auth_id;
        $_SESSION['user_name'] = $tx->name;
        $_SESSION['user_email'] = $tx->email;
        $_SESSION['user_phone'] = $tx->phone;
        $_SESSION['user_img'] = $tx->img;
        $_SESSION['l_name'] = "cart payment";

        if ($_SESSION['payment_status'] == 'success') 
        {
            $data = [
                'name' => $_SESSION['name'],
                'email' => $_SESSION['email'],
                'phone' => $_SESSION['phone'],
                'tprice' => $_SESSION['price'],
                'ORDERID' => $_SESSION['order_id'],
                'TXNID' => $_SESSION['razorpay_payment_id'],
                'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                'razorpay_signature' => $_SESSION['razorpay_signature'],
            ];
            $add = $x1[1];
            $city = $x1[2];
            $state = $x1[3];
            $zipcode = $x1[4];
            $country = $x1[5];

            // var_dump($data);

            $x = $this->pageModel->ulogin_using_rowId($_SESSION['rexkod_user_id']);

            $res = $this->pageModel->add_cart_for_payment($data['name'], $data['email'], $data['phone'], $add, $city, $state, $zipcode, $country,$data);

            $_SESSION['success'] = "Order Placed Successfully";
            redirect('api/success');
        }
        else
        {
            $_SESSION['success'] = "payment failed order not placed";
           redirect('api/index');
        }
    }



    public function login()
    {
        $this->view('api/login');
    }






    public function user_login()
    {
       
        if(!isset($_POST['user_phone']))
        {
            $_SESSION['success'] = "Enter your phone number";
            redirect('api/login');
        }
        else
        { 
            
            
                $user = "";
                
                $email_verify_phone = $this->pageModel->email_verify_phone($_POST['user_phone']);
                
                

                if(empty($email_verify_phone))
                {
                    $_SESSION['success'] = "Invalid Phone";
                    redirect('api/login');
                }
                else
                {
                    $user = $email_verify_phone;

                    if(empty($user))
                    {

                       $_SESSION['success'] = "Invalid Credential!";
                       redirect('api/login');
                       
                    }else
                    {
                        if($user->type=="admin")
                        {
                            $_SESSION['success'] = "Please Login From Vendor App";
                            redirect('api/login');
                        }

                        elseif($user->type=="vendor")
                        {
                            $_SESSION['success'] = "Please Login From Vendor App";
                            redirect('api/login');
                        }

                        elseif($user->type=="delivery")
                        {
                            $_SESSION['success'] = "Please Login From Delivery App";
                            redirect('api/login');
                        }
                        else
                        {
                            
                            $_SESSION['rexkod_user_id'] = $user->id;
                            $_SESSION['rexkod_user_email'] = $user->email;
                            $_SESSION['rexkod_user_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            redirect('api/index');
                        }
                    }
                    
                }
               
            
        }
    }


    

    public function search()
    {
        $search_input = $_GET['search_input'];
        $filter= $_GET['filter'];
        // echo $search_input;
        // die();
       if($filter=='1'){
        $result = $this->pageModel->get_products_by_search($search_input);
        $data = [ 
            'result'=>$result,
            'search_input' =>$search_input,
        ];
        $this->view('api/product_search',$data);
       }else{
        $result = $this->pageModel->get_services_by_search($search_input);
        $data = [ 
            'result'=>$result,
            'search_input' =>$search_input,
        ];
       $this->view('api/service_search',$data);
       }
        
      
       


    }
    public function product_search(){
        $this->view('api/product_search');
    }
    public function service_search(){
        $this->view('api/service_search');
    }
    public function orders()
    {
        
        $get_orders_user = $this->pageModel->get_orders_user($_SESSION['rexkod_user_id']);
        $get_bookings_user = $this->pageModel->get_bookings_user($_SESSION['rexkod_user_id']);

        $data = [ 

            'get_orders_user' =>$get_orders_user,
            'get_bookings_user' =>$get_bookings_user,
        ];

        $this->view('api/orders',$data);
    }



    public function order_detail($id)
    {
        
        $get_order = $this->pageModel->getOrderById($id);
        
        $get_order_detail = $this->pageModel->getOrderDetailById($id);
        
        $data = [
                    'get_order' => $get_order,
                    'get_order_detail' => $get_order_detail
                ];

        $this->view('api/order_detail',$data);
    }




    public function tcs_detail($id)
    {
        
        $tcs_details = $this->pageModel->getTcsById($id);
        
        
        $data = [
                    'tcs_detail' => $tcs_details
                ];

        $this->view('api/tcs_detail',$data);
    }




    public function register()
    {
        
        $this->view('api/register');
         
    }

    public function user_register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $email = $_POST['email'];
            $phno = $_POST['phno'];
            // $pass = $_POST['password'];
 
            if (empty($email)) 
            {
                $_SESSION['success'] = 'Please enter email';
                redirect('api/register');
            } else if ($this->pageModel->findUserByemail($email)) 
            {
              $_SESSION['success'] = 'Email already taken';
              redirect('api/register');
            } 
            else 
            {


                if ($this->pageModel->findUserByphno($phno)) 
                {
                  $_SESSION['success'] = 'Phone number already taken';
                  redirect('api/register');
                } 
                else 
                {

                    if ($this->pageModel->add_user_otp($email, $phno)) 
                    {
                        
                        $user = $this->pageModel->userlogin($phno);
                        
                            $_SESSION['rexkod_user_id'] = $user->id;
                            $_SESSION['rexkod_user_email'] = $user->email;
                            $_SESSION['rexkod_user_phone'] = $user->phone;
                            $_SESSION['rexkod_login_type'] = $user->type;
                            
                            redirect('api/index');

                        $_SESSION['success'] = "Registered Successfully..! ";
                        redirect('api/add_profile');
                    }
                    else
                    {
                        $_SESSION['success'] = 'Registration Failed!';
                        redirect('api/register');
                    }
                }
            }
        } 
        else 
        {
          redirect('api/register');
        }
    }




    public function profile()
    {
        $get_user_details = $this->pageModel->get_all_userinfo();

        $data = [ 

            'get_user_details' =>$get_user_details,
        ];

        $this->view('api/profile',$data);

    }



    public function success()
    {
        $this->view('api/success');
    }



}




                            
                            
