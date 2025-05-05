<?php
class Api_login extends Controller
{
    public $pageModel;
    public $ApiloginModel;

    public function __construct()
    {
        $this->pageModel = $this->model('Page');
        $this->ApiloginModel = $this->model('Apilogin');
    }

    public function apilogin()
    {
        $this->view('api_login/apilogin');
    }

    public function api_user()
    {
        //$request = file_get_contents('php://input');
        //$val = json_decode($request, true);
        
        parse_str(file_get_contents("php://input"), $data);
        $val = (object)$data;

        $username = $val->username;
        $password = $val->password;
        // $country = $val['country'];
        if (!empty($username) && !empty($password)) {
            if (is_numeric($username)) {
                
                $userExists = $this->pageModel->email_verify_phone($username);
                // echo $username;
            }else{
                $userExists = $this->ApiloginModel->find_user_by_email($username);
            }
            if ($userExists) {
                $hashedPassword = $this->ApiloginModel->get_hashed_password_by_email($userExists->email);
                // $hashedPassword = password_hash($hashedPassword, PASSWORD_DEFAULT);
                // echo $hashedPassword;
                // die();
                $passwordMatches = password_verify($password, $hashedPassword);

                if ($passwordMatches) {
                    // User credentials are valid
                    $result = $this->ApiloginModel->get_user($userExists->email);
                    $userid = $result->id;
                    $username = $result->name;
                    $useremail = $result->email;
                    $userphone = $result->phone;
                    $userstatus = $result->status;
                    $data = [
                        'name' => $username,
                        'email' => $useremail,
                        'phone' => $userphone,
                        'picture' => '',
                    ];
                    $data = json_encode(['status' => true, 'msg' => '', 'user_info' => $data]);
                    echo $data;
                    // $this->view('api_login/apiuser', $data);
                } else {
                    // Invalid password
                    // echo 'Invalid password';
                    $data = json_encode(['status' => false, 'msg' => 'Invalid Credentials', 'user_info' => '']);
                    echo $data;
                }
            } else {
                // User not found
                $data = json_encode(['status' => false, 'msg' => 'Invalid Credentials', 'user_info' => '']);
                echo $data;
            }
        } else {
             $data = json_encode(['status' => false, 'msg' => 'Invalid Credentials', 'user_info' => '']);
                echo $data;
        }
    }
    
    
    public function cookie_user()
    {   
        $request = file_get_contents('php://input');
        if (isset($_COOKIE["oodles"])){
        $myfile = fopen("oodles-cookie-log.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $_COOKIE["oodles"]);
        $result = $this->ApiloginModel->get_user($_COOKIE['oodles']);
        $userid = $result->id;
        $username = $result->name;
        $useremail = $result->email;
        $userphone = $result->phone;
        $userstatus = $result->status;
        $data = [
            'name' => $username,
            'email' => $useremail,
            'phone' => $userphone,
            'picture' => '',
        ];
        $data = json_encode(['status' => true, 'msg' => '', 'user_info' => $data]);
        echo $data;
        }
        else {
             $data = json_encode(['status' => false, 'msg' => 'Invalid cookie data', 'user_info' => '']);
             echo $data;
        }
        fwrite($myfile, $data);
        fclose($myfile);
    }
    
    
public function cookie(){
$abc = "response_json";
$cookie_name = "eg_user";
$cookie_value = $abc;
setcookie($cookie_name,$cookie_value,time()+(86400*30),"oodlesin.com");
echo $_COOKIE[$cookie_name];
}

// ---------------------------------------------------------

    public function fetch_cookie(){
        
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode('; ', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = $parts[0];
                $value = isset($parts[1]) ? $parts[1] : '';
                if ($name === 'oodles') {
                    // Use the value of the cookie as needed
                    echo "API Token: " . $value;
                    break;
                    
                }
            }
        } else {
            echo "No cookies found.";
        }

    }
    
    public function set_cookie(){

$this->view('api_login/set_cookie');
    }
    
    
     public function fetch_cookie2(){
        
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode('; ', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = $parts[0];
                $value = isset($parts[1]) ? $parts[1] : '';
                if ($name === 'oodles2') {
                    // Use the value of the cookie as needed
                    echo "API Token: " . $value;
                    break;
                    
                }else{
                    echo "no";
                }
            }
        } else {
            echo "No cookies found.";
        }

    }
}
