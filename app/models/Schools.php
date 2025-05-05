<?php
class Schools
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function get_all_teacher(){
        $this->db->query('SELECT * FROM auth where id IN (SELECT teacher_id from teacher where school=:school)');
        $this->db->bind(':school', $_SESSION['rexkod_oodles_school_id']);
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_all_teacher_of_school(){
        $this->db->query('SELECT * FROM teacher where school=:school');
        $this->db->bind(':school', $_SESSION['rexkod_oodles_school_id']);
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_school_detail(){
        $this->db->query("SELECT * FROM school where school_id=:school_id");
        $this->db->bind(':school_id', $_SESSION['rexkod_oodles_school_id']);
        return $results = $this->db->single();
    }
    public function get_all_students()
    {
        $this->db->query("SELECT * FROM student WHERE academic_type=:academic_type AND academic_name=:school_id");
        $this->db->bind(':academic_type', '1');
        $this->db->bind(':school_id', '1'.$_SESSION['rexkod_oodles_school_id']);
        return $result = $this->db->resultSet();
    }

    public function get_subject_from_school_quizes_by_category($category)
    {
        $this->db->query("SELECT distinct subject_name from quizes where category=:category and created_by in (SELECT teacher_id from teacher where school=:school) ");
        $this->db->bind(':category', $category);
        $this->db->bind(':school', $_SESSION['rexkod_oodles_school_id']);
        return $results = $this->db->resultset();
    }

    public function get_premium_school_single_data($id)
    {
        $this->db->query("SELECT * FROM premium_school_data where school=:id AND status=:status");
        $this->db->bind(':id', $id);
        $this->db->bind(':status', '1');

        return $results = $this->db->single();
    }
    public function get_school_wallet($id)
    {
        $this->db->query("SELECT * FROM school_wallet where school_id=:id ");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function update_teacher_balance_from_school_wallet($school_id)
    {
        $get_school_wallet  = $this->get_school_wallet($school_id);
                $get_teacher_balance = $get_school_wallet->teacher_balance;
                $new_teacher_balance = $get_teacher_balance - 1;
                $get_teacher_created_balance = $get_school_wallet->teacher_created;
                $new_teacher_created_balance = $get_teacher_created_balance  + 1;
                $this->db->query('UPDATE school_wallet set teacher_balance=:teacher_balance,teacher_created=:teacher_created where school_id=:school');
                $this->db->bind(':school', $school_id);
                $this->db->bind(':teacher_balance', $new_teacher_balance);
                $this->db->bind(':teacher_created', $new_teacher_created_balance);
                if ($this->db->execute()) {
                    return true;
                }else {
                    return false;
                }
    }

    public function get_student_detail($id){
        $this->db->query("SELECT * FROM auth WHERE id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function add_money($amount, $txnid,$type)
    {
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount)+$amount;
        
        $this->db->query('UPDATE wallets SET balance_amount = :balance WHERE user_id = :id');
        // Bind values
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_school_id']);
      
        // Execute


        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, amount,type,wallet_balance) VALUES(:userid, :txnid, :amount, :type,:wallet_balance)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_school_id']);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);
            $this->db->bind(':wallet_balance', $balance);


            $this->db->bind(':type', $type);
            // $this->db->bind(':quiz_id', $quiz_id);

            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }
    public function debit_money($amount,$txnid,$type,$quiz_balance)
    {
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount)-$amount;
        $current_quiz_balance = $wallet->quiz_balance;
        $new_quiz_balance = intval($current_quiz_balance)+$quiz_balance;
        
        $this->db->query('UPDATE wallets SET balance_amount = :balance,quiz_balance=:quiz_balance WHERE user_id = :id');
        // Bind values
        
        $this->db->bind(':balance', $balance);
        $this->db->bind(':quiz_balance', $new_quiz_balance);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_school_id']);
      
        // Execute


        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, amount,type,wallet_balance) VALUES(:userid, :txnid, :amount, :type,:wallet_balance)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_school_id']);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);
            $this->db->bind(':wallet_balance', $balance);

            $this->db->bind(':type', $type);
            // $this->db->bind(':quiz_id', $quiz_id);

            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }

    public function getWallet(){
        $this->db->query('SELECT * FROM wallets WHERE user_id = :userid');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_school_id']);
        return $this->db->single();
      }

  
      
      public function getTransactions(){
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_school_id']);
        $row = $this->db->resultSet();
        return $row;
      }
   
      public function get_recharged_transaction(){
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid AND type=1');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_school_id']);
        $row = $this->db->resultSet();
        return $row;
      }
      public function get_spent_transaction(){
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid AND type=7');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_school_id']);
        $row = $this->db->resultSet();
        return $row;
      }
      public function get_all_quizes($category_id){
        $this->db->query('SELECT * from quizes where created_by IN (SELECT teacher_id from teacher where school = :school) AND category=:category');
        $this->db->bind(':school', $_SESSION['rexkod_oodles_school_id']);
        $this->db->bind(':category', $category_id);
        $row = $this->db->resultSet();
        return $row;
      }
      public function get_all_quiz_master()
      {
        
          $this->db->query('SELECT * FROM quiz_master where created_by IN (SELECT teacher_id from teacher where school=:school) and delete_flag=:delete_flag');
          $this->db->bind(':delete_flag','1');
          $this->db->bind(':school',$_SESSION['rexkod_oodles_school_id']);
          return $results = $this->db->resultset();
  
      }
      public function get_all_quiz_score($category)
    {
        $this->db->query('SELECT * FROM quiz_result where quiz_id IN (SELECT id from quizes where created_by IN (SELECT teacher_id from teacher WHERE school=:school)) AND category=:category ORDER BY id desc');
        $this->db->bind(':school', $_SESSION['rexkod_oodles_school_id']);
        $this->db->bind(':category', $category);
        $result = $this->db->resultSet();
        return $result;
    }

    public function create_teacher($data, $pass)
    {
        $this->db->query('INSERT INTO auth (type,name,email,phone,password)  VALUES (:type,:name,:email,:phone,:password)');
        $this->db->bind(':type', "teacher");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $pass);

        if ($this->db->execute()) {

            $this->db->query('SELECT * FROM auth WHERE phone = :phone');
            $this->db->bind(':phone', $data['phone']);
            $cur_user = $this->db->single();
            $teacher_id = $cur_user->id;
            // echo $teacher_id;
            // echo $data['school'];


            $this->db->query('INSERT INTO teacher (teacher_id,school) VALUES (:teacher_id,:school)');
            $this->db->bind(':teacher_id', $teacher_id);
            $this->db->bind(':school', $data['school']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function get_quiz_for_category_and_subject($category_id, $subject,$school)
    {
        // echo $category_id;
        // die();
        $this->db->query('SELECT * FROM quizes where category=:category AND subject_name=:subject_name AND created_by IN (SELECT teacher_id FROM teacher where school=:school) AND start_date IS NOT NULL');
        $this->db->bind(':category', $category_id);
        $this->db->bind(':subject_name', $subject);
        $this->db->bind(':school', $school);
        return $results = $this->db->resultset();
    }

    public function update_quiz_status($quiz_id,$status){ 
        $this->db->query('UPDATE quizes SET status=:status where id=:id');
        $this->db->bind(':id', $quiz_id);
        $this->db->bind(':status', $status);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_teacher_detail($teacher_id){
        $this->db->query('SELECT * FROM teacher where teacher_id = :teacher_id');
        $this->db->bind(':teacher_id',$teacher_id);
        $result = $this->db->single();
        return $result;
    }

    
}
