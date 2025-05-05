<?php
class Csr extends Controller 
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admins');
        $this->pageModel = $this->model('Page');
        $this->studentModel = $this->model('Students');
        $this->homeModel = $this->model('Homes'); 
        $this->csrModel = $this->model('Csrs'); 
    }



	public function index()
    {
        
            $this->view('csr/index');
    }
	public function sts()
    {
        
            $this->view('csr/sts');
    }
	public function sms()
    {
        
            $this->view('csr/sms');
    }
	public function s2s()
    {
        
            $this->view('csr/s2s');
    }
    public function add_enquiry()
    {
        $name = $_POST['name'];
        $company_name = $_POST['company_name'];
        $business_email = $_POST['business_email'];
        $phone_no = $_POST['phone_no'];
        $designation = $_POST['designation'];
        $comment = $_POST['comment'];
      
        $add_enquiry  = $this->csrModel->add_enquiry($name,$company_name,$business_email,$phone_no,$designation,$comment);

        if ($add_enquiry) {
            $_SESSION['success'] = "Enquiry Added Successfully..! ";
            redirect('csr/sts');
        } else {
            $_SESSION['success'] = 'Please, Try again later!';
            redirect('csr/sts');
        }
    }
	

}