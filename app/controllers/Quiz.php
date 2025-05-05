<?php
class Quiz extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admins');
        $this->pageModel = $this->model('Page');
        $this->studentModel = $this->model('Students');
        $this->quizModel = $this->model('Quizes');
        $this->teacherModel = $this->model('Teachers');
    }


    // public function quiz_start()
    // {

    //     $get_single_question = $this->quizModel->get_single_question($_SESSION['current_quiz_id']);
    //     $data = [
    //         'id' => $_SESSION['current_quiz_id'],
    //         'get_single_question' => $get_single_question,
    //     ];
    //     $this->view('quiz/quiz_start', $data);
    // }


    // public function extract_first_question($id)
    // {
    //     $_SESSION['current_quiz_id'] = $id;
    //     $get_single_quizes_in = $this->quizModel->get_single_quizes_in($id);
    //     foreach ($get_single_quizes_in as $quiz_detail) {
    //         $first_question_id = substr($quiz_detail->question, 0, strpos($quiz_detail->question, ','));
    //     }


    //     redirect('quiz/quiz_start/' . $first_question_id);
    // }

    // public function pick_quiz()
    // {
    //     $get_single_question = $this->quizModel->get_single_question($_SESSION['current_quiz_id']);
    //     $data = [
    //         'id' => $_SESSION['current_quiz_id'],
    //         'get_single_question' => $get_single_question,
    //     ];
    //     $this->view('quiz/pick_quiz', $data);
    // }
    // public function quiz()
    // {
    //     $get_all_quiz = $this->quizModel->get_all_quizes();
    //     $data = [
    //         'get_all_quiz' => $get_all_quiz,
    //     ];
    //     $this->view('student/quiz', $data);
    // }
    // public function quiz_submit($test)
    // {

    //     echo $_POST['option1'];
    //     die();

    //     $quiz_val = 0;
    //     if (isset($_POST['option1'])) {
    //         $quiz_val = 1;
    //     } elseif (isset($_POST['option2'])) {
    //         $quiz_val = 2;
    //     } elseif (isset($_POST['option3'])) {
    //         $quiz_val = 3;
    //     } elseif (isset($_POST['option4'])) {
    //         $quiz_val = 4;
    //     } else {
    //         $quiz_val = 0;
    //     }


    //     $_SESSION['switch_off_modal'] = 1;
    //     $_SESSION['get_single_question' . $test] = $quiz_val;
    //     $key = array_search($test, $all_question_id);
    //     $next_test = $all_question_id[$key + 1];
    //     $length_of_array = sizeof($all_question_id);
    //     if ($key < $length_of_array - 1) {
    //         redirect('quiz/quiz_start/' . $next_test);
    //     } else {
    //         redirect('quiz/quiz_result');
    //     }
    // }
    // public function quiz_result()
    // {
    //     $total_result = 0;
    //     $get_current_quiz_detail = $this->quizModel->get_single_quizes_i($_SESSION['current_quiz_id']);

    //     $chars = $get_current_quiz_detail->question;
    //     $array = explode(',', $chars);
    //     foreach ($array as $value) {
    //         $total_result = ($total_result . $_SESSION['get_single_question' . $value] . ",");
    //     }
    //     // echo $total_result;
    //     // die();
    //     $add_result =  $this->quizModel->add_result($total_result);
    //     if ($add_result) {
    //         foreach ($array as $value) {
    //             unset($_SESSION['get_single_question' . $value]);
    //         }
    //         unset($_SESSION['switch_off_modal']);
    //         unset($_SESSION['current_quiz_id']);
    //         redirect('quiz/quiz_submission');
    //     }
    //     $this->view('quiz/quiz_result');
    // }

    public function index($id,$token)
    {
if(isset($_SESSION['quiz_playing_flag'])){
   $playing_flag =  $_SESSION['quiz_playing_flag'];
}else{
    $playing_flag = 0;

}
// echo $playing_flag;
// die();
if($playing_flag==1) {
    if ($this->studentModel->get_contest_reg_quiz_status($id)) {

        $_SESSION['success'] = "Invalid Quiz Attempt. You are redirected to My quizzes.";
        redirect('student/my_quizes');
    } else {
        $update_contest_reg_status = $this->studentModel->update_quiz_reg_status($id);
        $get_single_quizes_ind = $this->quizModel->get_single_quizes_ind($id);
        $quiz_category = $get_single_quizes_ind->category;
        $data = [
            'get_question_detail' => $get_single_quizes_ind,
            'id' => $id,
            'quiz_category' => $quiz_category,
            'token' => $token,
        ];
        unset($_SESSION['quiz_playing_flag']);
        $this->view('quiz/index', $data);
       
    }
}else{
    $_SESSION['success'] = "Invalid attempt to take quiz attempted. ";
    redirect('student/index');
}
    }

    public function quiz_submission($id,$token)
    {
        $ip = file_get_contents("http://ipecho.net/plain");
        unset($_SESSION['score_per']);
        unset($_SESSION['score']);
        unset($_SESSION['total_question']);
        unset($_SESSION['passing_per']);
        $quiz = $this->quizModel->get_single_quizes_ind($id);
        $time_elapsed = $_POST['time_elapsed'];
        $user_id = $_SESSION['rexkod_oodles_student_id'];
        // echo gettype($time_elapsed);

        function TimeToSec($time)
        {
            // $sec = 0;
            // foreach (array_reverse(explode(':', $time)) as $k => $v) $sec += pow(60, $k) * $v;
            // return $sec;
            if (!is_string($time) || empty($time)) {
                return 60;
            }
        
            $sec = 0;
            foreach (array_reverse(explode(':', $time)) as $k => $v) {
                $sec += pow(60, $k) * $v;
            }
        
            return $sec;
        }


        $total_time_given = (intval($quiz->duration_min) * 60) + intval($quiz->duration_sec);
        //    echo gettype ($total_time_given);
        //    die();
        // echo $total_time_given;
        $time_taken = $total_time_given - TimeToSec($time_elapsed);

        // echo $time_balance;
        // echo $total_time_given;

        $time_balance = $total_time_given - $time_taken;

        // echo $time_taken;
        // die();
        // echo gettype($time_balance);
        // echo gettype($time_taken);
        // die();
        // echo $time_balance;
        // echo $time_taken;

        // die();
        $quiz_category = $quiz->category;
        $question_array = $quiz->question;
        $var_temp = explode(',', $question_array);
        $count = 0;
        $score = 0;
        $score_per = 0;
        $total_question = 0;
        $user_answerq = [];
        foreach ($var_temp as $v) {
            $get_single_question = $this->quizModel->get_single_question($v);
            $count++;
            $correct_answer = lcfirst($get_single_question->answer);
            $question_score = $get_single_question->score;
            $answer_collected = $_POST['stp_' . $count . '_select_option'];
            // echo $answer_collected;
            $user_answerq[] = $answer_collected;

            $user_answer =  implode(',', $user_answerq);
            //     echo $user_answer;
            //  die();
            $total_question++;
            if ($correct_answer == $answer_collected) {
                $score = $score + intval($question_score);
            }
        }

        // var_dump($user_answer);
        // die();
        $quiz_id = $quiz->id;
        $score_per  = ($score / $count) * 100;
        // echo $score_per;
        // die();
        $score_per = round($score_per, 2);
        $quiz_category = $quiz->category;
        $add_coin_flag = 0;
        if ($score_per >= $quiz->passing_per) {
            $add_coin_flag = 1;
        }
// Check the time, if the time is end_time fail the student
        $end_time = $quiz->end_time;
        $end_time = strtotime($quiz->end_time);
        $extended_end_time = strtotime('+5 minutes', $end_time);
        
        if ($extended_end_time < time()) {
           $add_coin_flag = 0;
           $reason = "invalid";
        }else{
            $reason = "normal";
        }


        $data = [
            'score' => $score,
            'user_id' => $_SESSION['rexkod_oodles_student_id'],
            'user_answer' => $user_answer,
            'quiz_id' => $id,
            'score_per' => $score_per,
            'time_taken' => $time_taken,
            'time_balance' => $time_balance,
            'category' => $quiz_category,
            'pass' => $add_coin_flag,
            'reason' => $reason,
            'token' => $token,
        ];

        $submit_once = 0;
        // if(isset($get_participated_quiz)){
        $count_of_participation = count($this->quizModel->get_participated_quiz($id));
        // }else{
        // $count_of_participation = 0;
        // }

        //commented this on 5/5 because the for 2nd attempt a new record is not creating

        // if ($submit_once < 1 && $count_of_participation == 0) {
        //     $add_result = $this->quizModel->add_quiz_result($data);
        //     $submit_once++;
        // }
        // $total_score = $add_result[0];
        // $attempt = $add_result[1];
        // $id = $add_result[2];
        // $update_current_attempt = $this->quizModel->update_current_attempt($id, $attempt, $ip);

        // new code

        // check if quiz already submitted
        $get_quiz_results = $this->quizModel->get_quiz_results($id,$_SESSION['rexkod_oodles_student_id'],$token);
        
            if($get_quiz_results == null){
                $add_result = $this->quizModel->add_quiz_result($data);
            }
        
        // $add_result = $this->quizModel->add_quiz_result($data);

        $total_score = $add_result[0];
        $attempt = $add_result[1];
        $id = $add_result[2];
        $update_current_attempt = $this->quizModel->update_current_attempt($id, $attempt, $ip);

        if ($quiz_category == 1) {
            if ($add_coin_flag == 1) {
                // $coin_to_be_added = $score * ($quiz->coins_per_point1);
                // echo $coin_to_be_added;
                // die();
                $check_quiz_pass_status = $this->studentModel->check_quiz_pass_status($quiz_id);
                $pass_attempt = 0;
                foreach ($check_quiz_pass_status as $pass_status) {
                    $pass_attempt++;
                }

                // This will check the practice quiz has beent taken multiple time, if yes then were they pass or fail. If
                // the pass more than 1 times, it means they are not paying for test anyway.
                // So stop the bonus awarded coins to the respective user.
                if ($pass_attempt <= 1) {
                    // commenting on 5/5 because no further connections
                    // $original_coins = (($coin_to_be_added * 5) / 100);
                    $coin_to_be_added = $score * ($quiz->coins_per_point1);
                    $add_awarded_point = $this->studentModel->add_awarded_point($coin_to_be_added, 'points_credited_by_quiz', '10', $quiz_id);
                    $message = "You have received points and ".$original_coins." coins from Practice quiz";
                    $add_notification = $this->studentModel->add_notifications($user_id, $message);
                }
                else{
                    $coin_to_be_added = 0;
                    $add_awarded_point = $this->studentModel->add_awarded_point($coin_to_be_added, 'points_credited_by_quiz', '10', $quiz_id);
                    
                }
            }
        }
        if ($attempt == 1 && $quiz_category == 2) {
            if ($add_coin_flag == 1) {
                $coin_to_be_added = $score * ($quiz->coins_per_point1);

                $add_awarded_point = $this->studentModel->add_awarded_point($coin_to_be_added, 'points_credited_by_quiz', '10', $quiz_id);
                $message = "You have received ".$coin_to_be_added." coins from Merit quiz in First attempt";
                $add_notification = $this->studentModel->add_notifications($user_id, $message);
            }
        }

        if ($attempt == 2 && $quiz_category == 2) {
            if ($add_coin_flag == 1) {
                $coin_to_be_added = $score * ($quiz->coins_per_point2);
                $add_awarded_point = $this->studentModel->add_awarded_point($coin_to_be_added, 'points_credited_by_quiz', '10', $quiz_id);
                $message = "You have received". $coin_to_be_added." coins from Merit quiz in Second attempt";
                $add_notification = $this->studentModel->add_notifications($user_id, $message);
            }
        }

        $time_left = $time_balance;
        // Calculation for Rapid Fire quiz
        if ($quiz_category == 3 && $add_coin_flag == 1) {
            $total_number_of_question = $count;
            $correct_answer_attempted = $score;
            $incorrect_answer_attempted = $count - $score;
            // $coin_to_be_added_by_time = $time_left * ($quiz->coins_per_sec1);
            $coin_to_be_added_by_correct_answer = $score * ($quiz->coins_per_point1);
            // $coin_to_be_added = $coin_to_be_added_by_time + $coin_to_be_added_by_correct_answer;
            $points_earned1 = $correct_answer_attempted * (intval($quiz->coins_per_point1));
            $first_minus_for_wrong_answer = $incorrect_answer_attempted * (intval($quiz->coins_per_point1));
            $bonus_earned_on_answer = $points_earned1 - $first_minus_for_wrong_answer;
            $points_earned2 = $bonus_earned_on_answer * $correct_answer_attempted;
            $total_points_including_bonus = $points_earned2 + $coin_to_be_added_by_correct_answer;
            /************************/
            // Refer excel file shared BY Rakesh SIr for the calculation of Rapid Fire
            // $time_balance = $time_balance;
            // $total_time_given = $total_time_given;
            $time_given_for_each_question = $total_time_given / $total_number_of_question;
            $second_minus_on_time = $time_given_for_each_question * $incorrect_answer_attempted;
            $total_time_left = $time_balance - $second_minus_on_time;
            $points_multiplier_on_time = $total_time_left * (intval($quiz->coins_per_sec1));
            $coin_to_be_added = $total_points_including_bonus + $points_multiplier_on_time;
         
        }
        if ($quiz_category == 4 && $add_coin_flag == 1) {
            $total_number_of_question = $count;
            $correct_answer_attempted = $score;
            $incorrect_answer_attempted = $count - $score;
            // $coin_to_be_added_by_time = $time_left * ($quiz->coins_per_sec1);
            $coin_to_be_added_by_correct_answer = $score * ($quiz->coins_per_point1);
            // $coin_to_be_added = $coin_to_be_added_by_time + $coin_to_be_added_by_correct_answer;
            $points_earned1 = $correct_answer_attempted * (intval($quiz->coins_per_point1));
            $first_minus_for_wrong_answer = $incorrect_answer_attempted * (intval($quiz->coins_per_point1));
            $bonus_earned_on_answer = $points_earned1 - $first_minus_for_wrong_answer;
            $points_earned2 = $bonus_earned_on_answer * $correct_answer_attempted;
            $total_points_including_bonus = $points_earned2 + $coin_to_be_added_by_correct_answer;
            /************************/
            // Refere excel file shared BY Rakesh SIr for the calculation of Rapid Fire 
            // $time_balance = $time_balance;
            // $total_time_given = $total_time_given;
            $time_given_for_each_question = $total_time_given / $total_number_of_question;
            $second_minus_on_time = $time_given_for_each_question * $incorrect_answer_attempted;
            $total_time_left = $time_balance - $second_minus_on_time;
            $points_multiplier_on_time = $total_time_left * (intval($quiz->coins_per_sec1));
            $coin_to_be_added = $total_points_including_bonus + $points_multiplier_on_time;
            // currently stopped for merit and contest quiz
            $add_awarded_point = $this->studentModel->add_awarded_point($coin_to_be_added, 'points_credited_by_quiz', '10', $quiz_id);
            // $message = "You have received $coin_to_be_added coins from Rapid Fire quiz";
            // $add_notification = $this->studentModel->add_notifications($user_id, $message);
        }

        $update_quiz_result = $this->quizModel->update_total_score($_SESSION['rexkod_oodles_student_id'], $total_score, $attempt);
        // echo $coin_to_be_added;
        // echo $id;
        // die();

        $update_quiz_result_coins_earned = $this->quizModel->update_quiz_result_coins_earned($id, $coin_to_be_added);
        // $quiz_category
        if (empty($this->quizModel->verify_quiz_score())) {
            $insert_into_quiz_score = $this->quizModel->insert_into_quiz_score();
        }
        $get_quiz_detail = $this->studentModel->get_quiz_detail($quiz_id);
        $update_quiz_score = $this->quizModel->update_quiz_score($quiz_category, $coin_to_be_added);
        if ($update_quiz_result) {
            $_SESSION['score_per'] = $score_per;
            $_SESSION['score'] = $score;
            $_SESSION['total_question'] = $total_question;
            $_SESSION['passing_per'] = $quiz->passing_per;
            $_SESSION['time_taken'] = $time_taken;
            $_SESSION['time_balance'] = $time_balance;
            $_SESSION['coin_to_be_added']  = $coin_to_be_added;
            $_SESSION['current_quiz_id'] = $quiz_id;
            $_SESSION['quiz_category'] = $quiz_category;
            $_SESSION['answer_array'] = $user_answerq;
            $_SESSION['quiz_subject'] = $get_quiz_detail->subject_name;
            // $_SESSION['success'] = "Quiz Successfully Submitted";
            $_SESSION['thank_you_flag'] = 1;

            redirect('quiz/thank_you');
        } else {
            redirect('student/quiz');
        }
    }
    public function thank_you()
    {
        if(isset($_SESSION['thank_you_flag'])){
            $playing_flag =  $_SESSION['thank_you_flag'];
         }else{
             $playing_flag = 0;
         
         }
         // echo $playing_flag;
         // die();
if($playing_flag==1) {
    $this->view('quiz/thank_you');
}else{
    $_SESSION['success'] = "Thank you page can be visited only after playing quiz!. Thank you";
    redirect('student/index');
}
    }
}
