<?php
class Csrs
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function add_enquiry($name,$company_name,$business_email,$phone_no,$designation,$comment)
{
    $this->db->query('INSERT INTO enquiry (name,company_name,business_email,phone_no,designation,comment) VALUES (:name,:company_name,:business_email,:phone_no,:designation,:comment)');
    
         $this->db->bind(':name',$name);
         $this->db->bind(':company_name',$company_name);
         $this->db->bind(':business_email',$business_email);
         $this->db->bind(':phone_no',$phone_no);
         $this->db->bind(':designation',$designation);
         $this->db->bind(':comment',$comment);

        if($this->db->execute())
        {
            return true;
        }
        else
        {
             return false;
        }
}

    public function get_stress($id) 
    {
        $this->db->query('SELECT * FROM stress WHERE test_id = :id');
        $this->db->bind(':id', $id);
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
  

}

?>