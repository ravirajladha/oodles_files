<?php
class Quizes
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get_single_question($id)
    {
        $this->db->query('SELECT * FROM quiz_master where id=:id ');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }

    public function get_single_quizes_in($id)
    {
        $this->db->query('SELECT * FROM quizes where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->resultset();
    }
    public function get_single_quizes_ind($id)
    {
        $this->db->query('SELECT * FROM quizes where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }

    public function add_result($result)
    {
        $this->db->query('INSERT INTO quiz_result (result) values (:result)');
        $this->db->bind(':result', $result);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function add_quiz_result($data)
    {

        $this->db->query('INSERT INTO quiz_result (user_id,user_answer,score,quiz_id,score_per,time_taken,time_balance,category,pass,accumulated_score,reason,token) values (:user_id,:user_answer,:score,:quiz_id,:score_per,:time_taken,:time_balance,:category,:pass,:accumulated_score,:reason,:token)');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':user_answer', $data['user_answer']);
        $this->db->bind(':score', $data['score']);
        $this->db->bind(':quiz_id', $data['quiz_id']);
        $this->db->bind(':score_per', $data['score_per']);
        $this->db->bind(':time_taken', $data['time_taken']);
        $this->db->bind(':time_balance', $data['time_balance']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':pass', $data['pass']);
        $this->db->bind(':reason', $data['reason']);
        $this->db->bind(':token', $data['token']);
        $this->db->bind(':accumulated_score', $data['score'] + $data['time_balance']);
        // $check = $this->db->single();
        // echo $check->id;
        // die();

        if ($this->db->execute()) {
            // working code to find the last added id
            $this->db->query('SELECT * FROM quiz_result ORDER BY id DESC LIMIT 1 ');

            $check = $this->db->single();
            $id = $check->id;

            $this->db->query('SELECT COUNT(*) as attempt FROM quiz_result where user_id=:user_id AND quiz_id = :quiz_id');
            $this->db->bind(':quiz_id', $data['quiz_id']);
            $this->db->bind(':user_id', $data['user_id']);
            $quiz_repetition = $this->db->single();
            $attempt =  $quiz_repetition->attempt;

            $this->db->query('SELECT SUM(score) as total_sum FROM quiz_result where user_id=:user_id');
            $this->db->bind(':user_id', $data['user_id']);
            $quiz_result  = $this->db->single();
            $total_score = $quiz_result->total_sum;
            //    $this->db->query('UPDATE quiz_result SET attempt=:attempt where quiz_id = :quiz_id');
            //    $this->db->bind(':attempt',$attempt);
            //    $this->db->bind(':quiz_id',$data['quiz_id']);

            //    $this->db->bind(':total_score',$total_score);
            //    $this->db->bind(':user_id',$data['user_id']);

            // echo $total_score;
            // echo ($data['user_id']);
            // die();
            // $this->db->bind(':id',$id );

            return array($total_score, $attempt, $id);
        } else {
            return false;
        }
    }
    public function update_total_score($user_id, $total_score, $attempt)
    {
        $this->db->query('UPDATE quiz_result SET total_score=:total_score, attempt=:attempt where user_id = :user_id');
        $this->db->bind(':total_score', $total_score);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':attempt', $attempt);
   
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_current_attempt($id, $attempt,$ip)
    {
        $this->db->query('UPDATE quiz_result SET current_attempt=:attempt,ip=:ip where id=:id');
        $this->db->bind(':id', $id);
        $this->db->bind(':ip', $ip);
        $this->db->bind(':attempt', $attempt);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_quiz_result_coins_earned($id, $coins_earned)
    {
        $this->db->query('UPDATE quiz_result SET coins_earned = :coins_earned where id=:id');
        $this->db->bind(':coins_earned', $coins_earned);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_into_quiz_score()
    {
        $this->db->query('INSERT INTO quiz_score (user_id) values (:user_id)');
        $this->db->bind(':user_id', $_SESSION['rexkod_oodles_student_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_quiz_score($quiz_category, $coin_to_be_added)
    {
        $quiz_score = $this->get_quiz_score();
        if ($quiz_category == 1) {
            $old_practice_score = $quiz_score->practice_score;
            $practice_score = $old_practice_score + $coin_to_be_added;
        } else {
            $practice_score = $quiz_score->practice_score;
        }
        if ($quiz_category == 2) {
            $old_merit_score = $quiz_score->merit_score;
            $merit_score = $old_merit_score + $coin_to_be_added;
        } else {
            $merit_score = $quiz_score->merit_score;
        }
        if ($quiz_category == 3) {
            $old_rapid_fire_score = $quiz_score->rapid_fire_score;
            $rapid_fire_score = $old_rapid_fire_score + $coin_to_be_added;
        } else {
            $rapid_fire_score = $quiz_score->rapid_fire_score;
        }
        if ($quiz_category == 4) {
            $old_contest_score = $quiz_score->contest_score;
            $contest_score = $old_contest_score + $coin_to_be_added;
        } else {
            $contest_score = $quiz_score->contest_score;
        }
        $total_score = $practice_score + $merit_score + $rapid_fire_score + $contest_score;

        $this->db->query('UPDATE quiz_score SET practice_score = :practice_score,merit_score=:merit_score,rapid_fire_score = :rapid_fire_score,contest_score =:contest_score,total_score=:total_score WHERE user_id=:user_id');


        $this->db->bind(':user_id', $_SESSION['rexkod_oodles_student_id']);
        $this->db->bind(':practice_score', $practice_score);
        $this->db->bind(':merit_score', $merit_score);
        $this->db->bind(':rapid_fire_score', $rapid_fire_score);
        $this->db->bind(':contest_score', $contest_score);
        $this->db->bind(':total_score', $total_score);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_quiz_score()
    {
        $this->db->query('SELECT * from quiz_score where user_id=:user_id');
        $this->db->bind(":user_id",  $_SESSION['rexkod_oodles_student_id']);
        $result = $this->db->single();
        return $result;
    }
    public function verify_quiz_score()
    {
        $this->db->query("SELECT  * from quiz_score where user_id = :user_id");

        $this->db->bind(":user_id",  $_SESSION['rexkod_oodles_student_id']);
        $result = $this->db->single();
        return $result;
    }
    public function get_last_quiz_result($quiz_id)
    {
        $this->db->query("SELECT  * from quiz_result where quiz_id = :quiz_id AND user_id = :user_id");
        $this->db->bind(":quiz_id", $quiz_id);
        $this->db->bind(":user_id",  $_SESSION['rexkod_oodles_student_id']);
        $result = $this->db->resultSet();
        return $result;
    }

    public function get_quiz_master_detail($id)
    {
        $this->db->query("SELECT  * from quiz_master where id=:id");
        $this->db->bind(":id", $id);
        $result = $this->db->single();
        return $result;
    }

    public function get_chapter_detail($id)
    {
        $this->db->query("SELECT  * from chapter where id=:id");
        $this->db->bind(":id", $id);
        $result = $this->db->single();
        return $result;
    }
    public function get_quizes_by_category($id)
    {
        $this->db->query('SELECT * FROM quizes where category=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->resultset();
    }

    public function get_participated_quiz($quiz_id)
    {
        $this->db->query('SELECT * FROM quiz_result where quiz_id=:quiz_id AND user_id = :user_id');
        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':user_id', $_SESSION['rexkod_oodles_student_id']);
        return $results = $this->db->resultset();
    }

    public function get_total_attempt($quiz_id){
        $this->db->query('SELECT * FROM quizes where id=:quiz_id');
        $this->db->bind(':quiz_id', $quiz_id);
        return $results = $this->db->single();
    }
    public function get_quiz_results($id, $user_id,$token){
        $this->db->query('SELECT * FROM quiz_result where quiz_id=:quiz_id AND user_id = :user_id AND token = :token');
        $this->db->bind(':quiz_id', $id);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':token', $token);
        return $results = $this->db->single();
    }
}
