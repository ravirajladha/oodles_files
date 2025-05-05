<?php
class Apilogin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all_users()
    {
        $this->db->query('SELECT * FROM auth');
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_user($email){
        $this->db->query('SELECT * FROM auth WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
        $row = $this->db->single();
        return $row;
    }

    public function find_user_by_email($email)
    {
        $this->db->query('SELECT * FROM auth WHERE email = :email');
        $this->db->bind(':email', $email);
        // $this->db->execute();
        // return $this->db->rowCount() > 0;
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

    public function get_hashed_password_by_email($email)
    {
        $this->db->query('SELECT `password` FROM auth WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
        $row = $this->db->single();
        return $row->password ?? null;
    }
}
