<?php
class Colleges
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function get_all_teacher(){
        $this->db->query('SELECT * FROM auth where id IN (SELECT teacher_id from teacher where school=:school)');
        $this->db->bind(':school', $_SESSION['rexkod_oodles_college_id']);
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_school_detail(){
        $this->db->query("SELECT * FROM school where school_id=:school_id");
        $this->db->bind(':school_id', $_SESSION['rexkod_oodles_college_id']);
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
        $this->db->bind(':id', $_SESSION['rexkod_oodles_college_id']);
      
        // Execute


        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, amount,type,wallet_balance) VALUES(:userid, :txnid, :amount, :type,:wallet_balance)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_college_id']);
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
        $this->db->bind(':id', $_SESSION['rexkod_oodles_college_id']);
      
        // Execute


        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, amount,type,wallet_balance) VALUES(:userid, :txnid, :amount, :type,:wallet_balance)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_college_id']);
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
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_college_id']);
        return $this->db->single();
      }

  
      
      public function getTransactions(){
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_college_id']);
        $row = $this->db->resultSet();
        return $row;
      }
   

      public function get_recharged_transaction(){
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid AND type=1');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_college_id']);
        $row = $this->db->resultSet();
        return $row;
      }
      public function get_spent_transaction(){
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid AND type=8');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_college_id']);
        $row = $this->db->resultSet();
        return $row;
      }
      public function get_all_quizes(){
        $this->db->query('SELECT * from quizes where created_by IN (SELECT teacher_id from teacher where school = :school)');
        $this->db->bind(':school', $_SESSION['rexkod_oodles_college_id']);
        $row = $this->db->resultSet();
        return $row;
      }
    
      public function get_all_students()
      {
          $this->db->query("SELECT * FROM student WHERE academic_type=:academic_type AND college=:college_id");
          $this->db->bind(':academic_type', '2');
          $this->db->bind(':college_id', $_SESSION['rexkod_oodles_college_id']);
          return $result = $this->db->resultSet();
      }
  
      public function get_student_detail($id){
          $this->db->query("SELECT * FROM auth WHERE id=:id");
          $this->db->bind(':id', $id);
          return $results = $this->db->single();
  
      }
}
