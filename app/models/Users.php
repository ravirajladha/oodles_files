<?php
class Users
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function create_product_db($name1,$price,$cat)
    {
        $temp = 0;
        if(!empty($_FILES['files']['name']))
        {
            $f_name = $_FILES['files']['name'];
            $f_temp = $_FILES['files']['tmp_name'];
            $size = $_FILES['files']['size'];
            $f_extension=explode('.', $f_name);
            $f_extension=strtolower(end($f_extension));
            $f_newfile=uniqid().'.' .$f_extension;
            $store="uploads/" .$f_newfile;
            move_uploaded_file($f_temp, $store);
            $store ="uploads/";
            $temp=$f_newfile;
        }
        else
        {
            $temp = "dumitem.png";
        }
        $this->db->query('INSERT INTO products(p_name, p_image, p_price,p_cat) VALUES (:name,:image,:price,:cat)');
        //bind our parameters
        $this->db->bind(':name',$name1);
        $this->db->bind(':image',$temp);
        $this->db->bind(':price',$price);
        $this->db->bind(':cat',$cat);
        if($this->db->execute())
        {
            return true;
        }
        else
        {
             return false;
        }
    }
    public function get_all_orders() 
    {
        $this->db->query('SELECT * FROM orders ORDER BY id desc');
        $result = $this->db->resultSet();
        return $result;
    }
    public function delete_product($id)
    {
        $this->db->query("DELETE FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_cat_products($id) {
        $this->db->query('SELECT * FROM products WHERE p_cat = :id');
         $this->db->bind(':id', $id);
        $result = $this->db->resultSet();
        return $result;
    }
      public function get_single_products($id) {
        $this->db->query('SELECT * FROM products WHERE id = :id');
         $this->db->bind(':id', $id);
        $result = $this->db->single();
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
    public function check_pass($opass)
    {
        $this->db->query('SELECT * from auth where auth_id = :id');
        $this->db->bind(':id', $_SESSION['user_id']);
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
    public function update_password($npass)
    {
        $npass = password_hash($npass, PASSWORD_DEFAULT);
        $this->db->query('UPDATE auth set password = :npass WHERE auth_id = :id');
        // Bind values
        $this->db->bind(':npass', $npass);
        $this->db->bind(':id', $_SESSION['user_id']);
        if($this->db->execute())
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
    public function add_user($name, $email, $phno, $pass)
    {
        $this->db->query('INSERT INTO auth (name, email,phone,password,type) VALUES(:name, :email, :phno, :pass, :type)');
        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phno', $phno);
        $this->db->bind(':pass', $pass);
        $this->db->bind(':type', 'user');
        // Execute

        if ($this->db->execute()) {
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
     public function get_all_userinfo()
    {
        $this->db->query("SELECT * FROM auth where auth_id = :id");
        $this->db->bind(':id', $_SESSION['user_id']);
        return $results = $this->db->single();
    }
    public function find_all_order()
    {
        $this->db->query("SELECT * FROM orders where user_id = :id order by id DESC");
        $this->db->bind(':id', $_SESSION['user_id']);
        return $results = $this->db->resultSet();
    }

    public function get_order_details($id)
    {
        $this->db->query("SELECT * FROM orders where id = :id ");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_pharmacy_med_list($id)
    {
        $this->db->query("SELECT * FROM product_order_list where p_id = :booking_id");

        $this->db->bind(':booking_id', $id);


        return $results = $this->db->resultSet();
    }
    public function get_pharmacy_med_list_single($id)
    {
        $this->db->query("SELECT * FROM product_order_list where p_id = :booking_id");

        $this->db->bind(':booking_id', $id);


        return $results = $this->db->single();
    }
}
