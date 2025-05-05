<?php
class Students
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function empty_column_in_student()
    {

        $this->db->query('  SELECT (IF(`f_name` IS  NULL,1,0) + IF(`l_name` IS  NULL,1,0) + IF(`phone_no` IS  NULL,1,0) + IF(`whatsapp_no` IS  NULL,1,0) +IF(`dob` IS  NULL,1,0)+IF(`aadhar` IS  NULL,1,0)+IF(`gender` IS  NULL,1,0)+IF(`comm_state` IS  NULL,1,0)+IF(`religion` IS  NULL,1,0)+IF(`category` IS  NULL,1,0)+IF(`father_name` IS  NULL,1,0)+IF(`f_aadhar` IS  NULL,1,0)+IF(`f_phone` IS  NULL,1,0)+IF(`father_aadhar_doc` IS  NULL,1,0)+IF(`mother_name` IS  NULL,1,0)+IF(`m_aadhar` IS  NULL,1,0)+IF(`m_phone` IS  NULL,1,0)+IF(`mother_aadhar_doc` IS  NULL,1,0)+IF(`siblings` IS  NULL,1,0)+IF(`course` IS  NULL,1,0)+IF(`academic_name` IS  NULL,1,0)++IF(`annual_income` IS  NULL,1,0)+IF(`physically` IS  NULL,1,0)+IF(`student_image` IS  NULL,1,0)+IF(`comm_address` IS  NULL,1,0)+IF(`comm_village` IS  NULL,1,0)+IF(`comm_block` IS  NULL,1,0)+IF(`comm_pin_code` IS  NULL,1,0)+IF(`perm_address` IS  NULL,1,0)+IF(`perm_village` IS  NULL,1,0)+IF(`perm_block` IS  NULL,1,0)+IF(`perm_state` IS  NULL,1,0)+IF(`perm_pin_code` IS  NULL,1,0)+IF(`account_no` IS  NULL,1,0)+IF(`re_account_no` IS  NULL,1,0)+IF(`ifsc_code` IS  NULL,1,0)+IF(`bank_name` IS  NULL,1,0)+IF(`bank_branch` IS  NULL,1,0)+IF(`name_as_per_bank` IS  NULL,1,0)+IF(`admission_toggle` IS  NULL,1,0)+IF(`institute_city` IS  NULL,1,0)+IF(`institute_state` IS  NULL,1,0)+IF(`total_fees` IS  NULL,1,0)+IF(`course_span` IS  NULL,1,0)+IF(`identity_proof` IS  NULL,1,0)+IF(`address_proof` IS  NULL,1,0)+IF(`passbook_statement` IS  NULL,1,0)+IF(`academic_type` IS  NULL,1,0))  as cnt from student where student_id=:user_id');


        $this->db->bind(':user_id', $_SESSION['rexkod_oodles_student_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_wallet_control()
    {
        $this->db->query("SELECT * FROM wallet_control where id=:id");
        $this->db->bind(':id', '1');
        return $result = $this->db->single();
    }
    public function update_auth_referral_detail($joiner_id)
    {
        $this->db->query('UPDATE auth SET referred_by=:referred_by,referred_at=:referred_at where id=:id');
        $date = date('Y/d/m h:i:s');
        $this->db->bind(':referred_by', $joiner_id);
        $this->db->bind(':referred_at', date('Y-m-d H:i:s'));
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_columns()
    {
        $this->db->query('SELECT COUNT(*) FROM student');
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // credited_by_recharge = 1
    // credited_by_admin = 2
    // credited_by_referral = 3
    // credited_by_quiz = 4
    // debited_by_quiz = 5
    // debited_by_admin=6
    public function add_money($amount, $txnid, $type, $quiz_id)
    {
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $balance = intval($balance_amount) + $amount;

        $this->db->query('UPDATE wallets SET balance_amount = :balance WHERE user_id = :id');
        // Bind values

        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);

        // Execute


        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, amount,type,quiz_id,wallet_balance) VALUES(:userid, :txnid, :amount, :type, :quiz_id,:wallet_balance)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);

            $this->db->bind(':type', $type);
            $this->db->bind(':quiz_id', $quiz_id);
            $this->db->bind(':wallet_balance', $balance);


            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function buy_market_product($market_place_id,$bonus_coins,$transaction_id,$type,$quantity,$product_price)
    {
        
        $this->db->query('UPDATE wallets SET bonus_coins = :bonus_coins WHERE user_id = :id');
        // Bind values
        $this->db->bind(':bonus_coins', $bonus_coins);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);

        // Execute

        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, bonus_coins,type,market_place_id,bonus_coins_balance) VALUES(:userid, :transaction_id, :bonus_coins, :type, :market_place_id,:bonus_coins_balance)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
            $this->db->bind(':transaction_id', $transaction_id);
            $this->db->bind(':bonus_coins', $product_price);
            $this->db->bind(':type', $type);
            $this->db->bind(':market_place_id', $market_place_id);
            $this->db->bind(':bonus_coins_balance', $bonus_coins);

            if ($this->db->execute()) {
                $this->db->query('INSERT INTO market_place_orders (user_id, product_id) VALUES(:userid, :product_id)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
        
            $this->db->bind(':product_id', $market_place_id);

            if ($this->db->execute()) {
                $this->db->query('UPDATE  market_place SET quantity=:quantity WHERE id=:id');
                $this->db->bind(':quantity', $quantity);
                $this->db->bind(':id', $market_place_id);
    
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function add_awarded_point($amount, $txnid, $type, $quiz_id)
    {
        $wallet = $this->getWallet();
        $point = $wallet->point;
        $points = intval($point) + $amount;
        // $coins_added = $amount - (($amount * 5) / 100);
        $coins_added = ($amount * 5) / 100;
        $coin = $wallet->coins;
        // commented because intval is taking only the integer not decimal value
        // $coins = intval($coin) + $coins_added;

        $coins = $coin + $coins_added;
        // echo $points;
        // echo "<br>";
        // echo intval($coin);
        // die();

        $this->db->query('UPDATE wallets SET point = :point, coins=:coins WHERE user_id = :id');
        // Bind values

        $this->db->bind(':point', $points);
        $this->db->bind(':coins', $coins);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);

        // Execute


        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, point,coins,type,quiz_id) VALUES(:userid, :txnid, :amount,:coins_added,:type, :quiz_id)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);
            $this->db->bind(':coins_added', $coins_added);
            $this->db->bind(':type', $type);
            $this->db->bind(':quiz_id', $quiz_id);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function redeem_coin($coins, $amount, $txnid1, $txnid2, $type1, $type2)
    {
        $wallet = $this->getWallet();
        $coin = $wallet->coins;
        $final_coin = intval($coin) - $coins;
        $awarded_amount = $wallet->awarded_amount;
        $final_awarded_amount = intval($awarded_amount) + $amount;

        $this->db->query('UPDATE wallets SET coins = :coins,awarded_amount=:awarded_amount WHERE user_id = :id');
        // Bind values

        $this->db->bind(':coins', $final_coin);
        $this->db->bind(':awarded_amount', $final_awarded_amount);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);

        // Execute

        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, awarded_amount,type,awarded_wallet_balance) VALUES(:userid, :txnid1, :amount, :type1,:awarded_wallet_balance)');
            $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
            $this->db->bind(':txnid1', $txnid1);
            $this->db->bind(':amount', $amount);
            $this->db->bind(':type1', $type1);
            $this->db->bind(':awarded_wallet_balance', $final_awarded_amount);

            if ($this->db->execute()) {


                $this->db->query('INSERT INTO transactions (user_id, transaction_id, coins,type) VALUES(:userid, :txnid2, :points, :type2)');

                $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
                $this->db->bind(':txnid2', $txnid2);
                $this->db->bind(':students', $coins);
                $this->db->bind(':type2', $type2);

                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function add_bonus_coins($amount, $txnid, $type)
    {
        $wallet = $this->getWallet();
        $bonus_coins = $wallet->bonus_coins;
        $coins = intval($bonus_coins) + $amount;

        $this->db->query('UPDATE wallets SET bonus_coins = :coins WHERE user_id = :id');
        // Bind values

        $this->db->bind(':coins', $coins);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);

        // Execute


        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, bonus_coins,type) VALUES(:userid, :txnid, :amount, :type)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);

            $this->db->bind(':type', $type);


            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function add_bonus_coins_on_user_id($amount, $txnid, $type, $user_id)
    {
        $wallet = $this->getWallet();
        $bonus_coins = $wallet->bonus_coins;
        $coins = intval($bonus_coins) + $amount;

        $this->db->query('UPDATE wallets SET bonus_coins = :coins WHERE user_id = :id');
        // Bind values

        $this->db->bind(':coins', $coins);
        $this->db->bind(':id', $user_id);

        // Execute


        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, bonus_coins,type) VALUES(:userid, :txnid, :amount, :type)');

            $this->db->bind(':userid', $user_id);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);

            $this->db->bind(':type', $type);


            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // old method of debiting money for quiz
    // can be used for other debiting
    public function debit_money($amount, $txnid, $type, $quiz_id)
    {
        // echo "test1";
        // die();
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $awarded_amount = $wallet->awarded_amount;
        $balance = intval($balance_amount) - $amount;
        if ($amount > $balance_amount + $awarded_amount) {
            return false;
        }

        if ($amount > $balance_amount) {
            $amount -= $balance_amount;
            $balance_amount = 0;
            $awarded_amount -= $amount;
        } else {
            $balance_amount -= $amount;
        }

        $this->db->query('UPDATE wallets SET balance_amount = :balance, awarded_amount = :awarded WHERE user_id = :id');
        // Bind values
        $this->db->bind(':balance', $balance_amount);
        $this->db->bind(':awarded', $awarded_amount);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);



        if ($this->db->execute()) {
            // echo "test2"; 
            // die();
            $this->db->query('INSERT INTO transactions (user_id, transaction_id, amount,type,quiz_id,wallet_balance,awarded_wallet_balance) VALUES(:userid, :txnid, :amount, :type, :quiz_id,:wallet_balance,:awarded_wallet_balance)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);
            $this->db->bind(':type', $type);
            $this->db->bind(':quiz_id', $quiz_id);
            $this->db->bind(':wallet_balance', $balance_amount);
            $this->db->bind(':awarded_wallet_balance', $awarded_amount);

            if ($this->db->execute()) {


                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function debit_money_for_scholarship($amount, $txnid, $type, $scholarship_id)
    {
        // echo "test1";
        // die();
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $awarded_amount = $wallet->awarded_amount;
        $balance = intval($balance_amount) - $amount;
        if ($amount > $balance_amount + $awarded_amount) {
            return false;
        }

        if ($amount > $balance_amount) {
            $amount -= $balance_amount;
            $balance_amount = 0;
            $awarded_amount -= $amount;
        } else {
            $balance_amount -= $amount;
        }

        $this->db->query('UPDATE wallets SET balance_amount = :balance, awarded_amount = :awarded WHERE user_id = :id');
        // Bind values
        $this->db->bind(':balance', $balance_amount);
        $this->db->bind(':awarded', $awarded_amount);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);



        if ($this->db->execute()) {
            // echo "test2"; 
            // die();
            $this->db->query('INSERT INTO transactions (user_id, transaction_id, amount,type,scholarship_id,wallet_balance,awarded_wallet_balance) VALUES(:userid, :txnid, :amount, :type, :scholarship_id,:wallet_balance,:awarded_wallet_balance)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);
            $this->db->bind(':type', $type);
            $this->db->bind(':scholarship_id', $scholarship_id);
            $this->db->bind(':wallet_balance', $balance_amount);
            $this->db->bind(':awarded_wallet_balance', $awarded_amount);

            if ($this->db->execute()) {


                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function debit_money_for_practice_quiz($amount, $txnid, $type, $quiz_id)
    {
        $wallet = $this->getWallet();
        $bonus_coins = $wallet->bonus_coins;
        $balance = intval($bonus_coins) - $amount;
        if ($amount > $bonus_coins) {
            return false;
        }
        $this->db->query('UPDATE wallets SET bonus_coins = :balance WHERE user_id = :id');
        // Bind values

        $this->db->bind(':balance', $balance);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);

        // Execute
        if ($this->db->execute()) {

            $this->db->query('INSERT INTO transactions (user_id, transaction_id, bonus_coins,type,quiz_id) VALUES(:userid, :txnid, :amount, :type, :quiz_id)');

            $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
            $this->db->bind(':txnid', $txnid);
            $this->db->bind(':amount', $amount);
            $this->db->bind(':type', $type);
            $this->db->bind(':quiz_id', $quiz_id);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // New formula to debit money from wallet
    // As told , only check you speed will be having this formula
    // But currently the input for cost is given for all types of quiz except practice
    // Client has told the other types of quiz will run on subscription method
    public function debit_money_for_quiz($amount, $txnid, $type, $quiz_id)
    {
        $wallet = $this->getWallet();
        $balance_amount = $wallet->balance_amount;
        $awarded_amount = $wallet->awarded_amount;
        $bonus_coins = $wallet->bonus_coins;
        if ($amount > 0) {
            $get_wallet_control   = $this->get_wallet_control();
            $reduction_percentage_from_bonus_coins = $get_wallet_control->bonus_coin_reduction_per;
            $amount_to_be_reduced_from_bonus_coins = ($amount * $reduction_percentage_from_bonus_coins) / 100;
            if ($bonus_coins >= $amount_to_be_reduced_from_bonus_coins) {
                $reduced_from_coins = $amount_to_be_reduced_from_bonus_coins;
                $new_bonus_coins = $bonus_coins - $amount_to_be_reduced_from_bonus_coins;
                $reduction_percentage_from_balance = 100 - $reduction_percentage_from_bonus_coins;
                $amount_to_be_reduced_from_balance = ($amount * $reduction_percentage_from_balance) / 100;
                if ($balance_amount >= $amount_to_be_reduced_from_balance) {
                    $reduced_from_balance = $amount_to_be_reduced_from_balance;
                    $new_balance_amount = $balance_amount - $amount_to_be_reduced_from_balance;
                    $reduced_from_awarded_balance = 0;
                    $new_awarded_amount = $awarded_amount;
                } elseif ($balance_amount >= 0 && $balance_amount < $amount_to_be_reduced_from_balance) {
                    $reduced_from_balance = $balance_amount;
                    $remaining_amount_for_quiz = $amount_to_be_reduced_from_balance - $balance_amount;
                    $new_balance_amount = 0;
                    if ($awarded_amount < $remaining_amount_for_quiz) {
                        return false;
                    } else {
                        $reduced_from_awarded_balance = $remaining_amount_for_quiz;
                        $new_awarded_amount = $awarded_amount - $remaining_amount_for_quiz;
                    }
                }
            } else {
                $new_bonus_coins = 0;
                $reduced_from_coins = 0;
                if ($balance_amount >= $amount) {
                    $new_balance_amount = $balance_amount - $amount;
                    $reduced_from_balance = $amount;
                    $new_awarded_amount = $awarded_amount;
                    $reduced_from_awarded_balance = 0;
                } elseif ($balance_amount >= 0 && $balance_amount < $amount) {
                    $remaining_amount_for_quiz = $amount - $balance_amount;
                    $reduced_from_balance = $balance_amount;
                    $new_balance_amount = 0;
                    if ($awarded_amount < $remaining_amount_for_quiz) {
                        return false;
                    } else {
                        $reduced_from_awarded_balance = $remaining_amount_for_quiz;
                        $new_awarded_amount = $awarded_amount - $remaining_amount_for_quiz;
                    }
                }
            }
        } else {
            $new_bonus_coins = $bonus_coins;
            $new_balance_amount = $balance_amount;
            $new_awarded_amount = $awarded_amount;
        }
        //         echo $new_bonus_coins;
        //         echo "<br/>";
        //         echo $new_balance_amount;
        //         echo "<br/>";
        //         echo $new_awarded_amount;
        //         echo "<br/>";
        // die();

        $this->db->query('UPDATE wallets SET balance_amount = :balance_amount,awarded_amount = :awarded_amount,bonus_coins = :bonus_coins WHERE user_id = :id');
        $this->db->bind(':balance_amount', $new_balance_amount);
        $this->db->bind(':awarded_amount', $new_awarded_amount);
        $this->db->bind(':bonus_coins', $new_bonus_coins);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);
        if ($this->db->execute()) {
            if ($amount_to_be_reduced_from_balance > 0) {
                $this->db->query('INSERT INTO transactions (user_id, transaction_id,amount,awarded_amount,bonus_coins,type,quiz_id) VALUES(:userid, :txnid, :amount,:awarded_amount,:bonus_coins,:type,:quiz_id)');
                $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
                $this->db->bind(':txnid', $txnid);
                $this->db->bind(':amount', $reduced_from_balance);
                $this->db->bind(':awarded_amount', $reduced_from_awarded_balance);
                $this->db->bind(':bonus_coins', $reduced_from_coins);
                $this->db->bind(':type', $type);
                $this->db->bind(':quiz_id', $quiz_id);
            }

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getWallet()
    {
        $this->db->query('SELECT * FROM wallets WHERE user_id = :userid');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
        return $this->db->single();
    }

    public function get_user_first_transaction()
    {
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid AND type=:type');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
        $this->db->bind(':type', '1');
        $row = $this->db->single();
        return $row;
    }


    public function getTransactions()
    {
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid ORDER by id desc');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
        $row = $this->db->resultSet();
        return $row;
    }
    public function get_winning_amount_transactions()
    {
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid and type=:type ORDER by id desc');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
        $this->db->bind(':type', '16');
        $row = $this->db->resultSet();
        return $row;
    }
    public function get_awarded_transaction()
    {
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid AND (type=2 OR type=3 OR type=4)');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
        $row = $this->db->resultSet();
        return $row;
    }
    public function get_recharged_transaction()
    {
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid AND type=1');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
        $row = $this->db->resultSet();
        return $row;
    }
    public function get_spent_transaction()
    {
        $this->db->query('SELECT * FROM transactions WHERE user_id = :userid AND (type=5 OR type=6)');
        $this->db->bind(':userid', $_SESSION['rexkod_oodles_student_id']);
        $row = $this->db->resultSet();
        return $row;
    }
    public function get_all_boards()
    {
        $this->db->query('SELECT * FROM boards');
        $row = $this->db->resultSet();
        return $row;
    }


    public function create_profile_db($data)
    {
        $this->db->query('INSERT INTO student (student_id,f_name, l_name, phone_no, whatsapp_no,same_as_phone,same_as_comm_address,dob,aadhar, gender, comm_state, religion, category, father_name, f_aadhar, f_phone,f_email_id, mother_name, m_aadhar, m_phone,m_email_id, siblings, course, annual_income, physically,student_image,comm_address,comm_village,comm_block,comm_pin_code,account_no,re_account_no,ifsc_code,bank_name,bank_branch,name_as_per_bank,institute_city,institute_state,identity_proof,address_proof,passbook_statement,academic_type,academic_name,academic_other_name,perm_address,perm_village,perm_state,perm_pin_code,perm_block,father_aadhar_doc,mother_aadhar_doc,board,hobby,achievements,description,mother_tongue,basic_flag,p_academic_name,p_class,p_cgpa,p_start_date,p_end_date) VALUES (:student_id,:f_name, :l_name, :phone_no, :whatsapp_no,:same_as_phone,:same_as_comm_address, :dob, :aadhar, :gender, :comm_state,  :religion, :category, :father_name, :f_aadhar, :f_phone,:f_email_id, :mother_name, :m_aadhar, :m_phone,:m_email_id, :siblings, :course, :annual_income, :physically,:student_image,:comm_address,:comm_village,:comm_block,:comm_pin_code,:account_no,:re_account_no,:ifsc_code,:bank_name,:bank_branch,:name_as_per_bank,:institute_city,:institute_state,:identity_proof,:address_proof,:passbook_statement,:academic_type,:academic_name,:academic_other_name,:perm_address,:perm_village,:perm_state,:perm_pin_code,:perm_block,:father_aadhar_doc,:mother_aadhar_doc,:board,:hobby,:achievements,:description,:mother_tongue,:basic_flag,:p_academic_name,:p_class,:p_cgpa,:p_start_date,:p_end_date)');
        //bind our parameters
        // echo $data['academic_type'];
        // echo $data['academic_name'];
        // echo $data['academic_other_name'];
        // die();

        $this->db->bind(':student_id', $data['student_id']);
        $this->db->bind(':f_name', $data['f_name']);
        $this->db->bind(':l_name', $data['l_name']);
        $this->db->bind(':phone_no', $data['phone_no']);
        $this->db->bind(':whatsapp_no', $data['whatsapp_no']);
        $this->db->bind(':same_as_phone', $data['same_as_phone']);
        $this->db->bind(':same_as_comm_address', $data['same_as_comm_address']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':aadhar', $data['aadhar']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':comm_state', $data['comm_state']);
        $this->db->bind(':religion', $data['religion']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':father_name', $data['father_name']);
        $this->db->bind(':f_aadhar', $data['f_aadhar']);
        $this->db->bind(':f_phone', $data['f_phone']);
        $this->db->bind(':f_email_id', $data['f_email_id']);
        $this->db->bind(':mother_name', $data['mother_name']);
        $this->db->bind(':m_aadhar', $data['m_aadhar']);
        $this->db->bind(':m_phone', $data['m_phone']);
        $this->db->bind(':m_email_id', $data['m_email_id']);
        $this->db->bind(':siblings', $data['siblings']);
        $this->db->bind(':annual_income', $data['annual_income']);
        $this->db->bind(':physically', $data['physically']);
        // $this->db->bind(':school', $data['school']);
        // $this->db->bind(':college', $data['college']);
        $this->db->bind(':comm_address', $data['comm_address']);
        $this->db->bind(':comm_village', $data['comm_village']);
        $this->db->bind(':comm_block', $data['comm_block']);
        $this->db->bind(':comm_pin_code', $data['comm_pin_code']);
        $this->db->bind(':account_no', $data['account_no']);
        $this->db->bind(':re_account_no', $data['re_account_no']);
        $this->db->bind(':ifsc_code', $data['ifsc_code']);
        $this->db->bind(':bank_name', $data['bank_name']);
        $this->db->bind(':bank_branch', $data['bank_branch']);
        $this->db->bind(':name_as_per_bank', $data['name_as_per_bank']);
        // $this->db->bind(':admission_toggle', $data['admission_toggle']);
        $this->db->bind(':institute_city', $data['institute_city']);
        $this->db->bind(':institute_state', $data['institute_state']);
        // $this->db->bind(':tuition_fees', $data['tuition_fees']);
        // $this->db->bind(':non_tuition_fees', $data['non_tuition_fees']);
        // $this->db->bind(':total_fees', $data['total_fees']);
        // $this->db->bind(':scholarship_verification_toggle', $data['scholarship_verification_toggle']);
        $this->db->bind(':course', $data['course']);
        // $this->db->bind(':course_span', $data['course_span']);
        $this->db->bind(':student_image', $data['student_image']);
        $this->db->bind(':identity_proof', $data['identity_proof']);
        $this->db->bind(':address_proof', $data['address_proof']);
        $this->db->bind(':passbook_statement', $data['passbook_statement']);
        // $this->db->bind(':tuition_fees_receipt', $data['tuition_fees_receipt']);
        // $this->db->bind(':non_tuition_fees_receipt', $data['non_tuition_fees_receipt']);
        $this->db->bind(':academic_type', $data['academic_type']);
        $this->db->bind(':academic_name', $data['academic_name']);
        $this->db->bind(':academic_other_name', $data['academic_other_name']);
        $this->db->bind(':perm_address', $data['perm_address']);
        $this->db->bind(':perm_village', $data['perm_village']);
        $this->db->bind(':perm_state', $data['perm_state']);
        $this->db->bind(':perm_pin_code', $data['perm_pin_code']);
        $this->db->bind(':perm_block', $data['perm_block']);
        $this->db->bind(':father_aadhar_doc', $data['father_aadhar_doc']);
        $this->db->bind(':mother_aadhar_doc', $data['mother_aadhar_doc']);
        // $this->db->bind(':school_temp', $data['school_temp']);
        // $this->db->bind(':college_temp', $data['college_temp']);
        $this->db->bind(':hobby', $data['hobby']);
        $this->db->bind(':board', $data['board']);
        $this->db->bind(':achievements', $data['achievements']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':mother_tongue', $data['mother_tongue']);
        $this->db->bind(':basic_flag', '1');
        // previous academic 
        $this->db->bind(':p_academic_name', $data['p_academic_name']);
        $this->db->bind(':p_class', $data['p_class']);
        $this->db->bind(':p_cgpa', $data['p_cgpa']);
        $this->db->bind(':p_start_date', $data['p_start_date']);
        $this->db->bind(':p_end_date', $data['p_end_date']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_password($phone, $pass)
    {
        $this->db->query('UPDATE auth SET password = :pass WHERE phone = :phone');

        // Bind values
        $this->db->bind(':phone', $phone);
        $this->db->bind(':pass', $pass);
        // $this->db->bind(':utype', "student");
        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_email_id($email)
    {


        $this->db->query('UPDATE auth SET email = :email WHERE id=:id');

        // Bind values
        $this->db->bind(':email', $email);
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function update_profile_db($data)
    {
        // student_image

        $this->db->query('UPDATE student SET f_name=:f_name, l_name=:l_name, phone_no=:phone_no, whatsapp_no=:whatsapp_no,same_as_phone=:same_as_phone,same_as_comm_address=:same_as_comm_address, dob=:dob, aadhar=:aadhar, gender=:gender, perm_state=:perm_state,comm_state=:comm_state,comm_address=:comm_address,comm_village=:comm_village,comm_block=:comm_block,comm_pin_code=:comm_pin_code,perm_address=:perm_address,perm_village=:perm_village,perm_block=:perm_block,perm_pin_code=:perm_pin_code, religion=:religion, category=:category, father_name=:father_name, f_aadhar=:f_aadhar, f_phone=:f_phone,f_email_id=:f_email_id, mother_name=:mother_name, m_aadhar=:m_aadhar, m_phone=:m_phone,m_email_id=:m_email_id, siblings=:siblings, course=:course, annual_income=:annual_income, physically=:physically,student_image=:student_image,account_no=:account_no,re_account_no=:re_account_no,ifsc_code=:ifsc_code,bank_name=:bank_name,bank_branch=:bank_branch,name_as_per_bank=:name_as_per_bank,institute_city=:institute_city,institute_state=:institute_state,identity_proof=:identity_proof,address_proof=:address_proof,passbook_statement=:passbook_statement,academic_type=:academic_type,academic_name=:academic_name,academic_other_name=:academic_other_name,father_aadhar_doc=:father_aadhar_doc,mother_aadhar_doc=:mother_aadhar_doc,basic_flag = :basic_flag,hobby=:hobby,board = :board,mother_tongue=:mother_tongue,description = :description,achievements=:achievements, p_academic_name =:p_academic_name ,p_class =:p_class,p_cgpa =:p_cgpa,p_start_date=:p_start_date,p_end_date=:p_end_date WHERE student_id=:student_id');
        //bind our parameters
        //    echo  $data['student_id'];
        //    die();
        $this->db->bind(':student_id', $data['student_id']);

        $this->db->bind(':f_name', $data['f_name']);
        $this->db->bind(':l_name', $data['l_name']);
        $this->db->bind(':phone_no', $data['phone_no']);
        $this->db->bind(':whatsapp_no', $data['whatsapp_no']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':aadhar', $data['aadhar']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':same_as_phone', $data['same_as_phone']);
        $this->db->bind(':same_as_comm_address', $data['same_as_comm_address']);
        // $this->db->bind(':state', $data['state']);
        // $this->db->bind(':district', $data['district']);
        $this->db->bind(':religion', $data['religion']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':father_name', $data['father_name']);
        $this->db->bind(':f_aadhar', $data['f_aadhar']);
        $this->db->bind(':f_phone', $data['f_phone']);
        $this->db->bind(':f_email_id', $data['f_email_id']);
        $this->db->bind(':mother_name', $data['mother_name']);
        $this->db->bind(':m_aadhar', $data['m_aadhar']);
        $this->db->bind(':m_phone', $data['m_phone']);
        $this->db->bind(':m_email_id', $data['m_email_id']);
        $this->db->bind(':siblings', $data['siblings']);
        $this->db->bind(':annual_income', $data['annual_income']);
        $this->db->bind(':physically', $data['physically']);
        // $this->db->bind(':school', $data['school']);
        // $this->db->bind(':college', $data['college']);


        $this->db->bind(':account_no', $data['account_no']);
        $this->db->bind(':re_account_no', $data['re_account_no']);
        $this->db->bind(':ifsc_code', $data['ifsc_code']);
        $this->db->bind(':bank_name', $data['bank_name']);
        $this->db->bind(':bank_branch', $data['bank_branch']);
        $this->db->bind(':name_as_per_bank', $data['name_as_per_bank']);
        $this->db->bind(':academic_type', $data['academic_type']);
        $this->db->bind(':academic_name', $data['academic_name']);
        $this->db->bind(':academic_other_name', $data['academic_other_name']);
        // $this->db->bind(':admission_toggle', $data['admission_toggle']);
        $this->db->bind(':institute_city', $data['institute_city']);
        $this->db->bind(':institute_state', $data['institute_state']);
        // $this->db->bind(':tuition_fees', $data['tuition_fees']);
        // $this->db->bind(':non_tuition_fees', $data['non_tuition_fees']);
        // $this->db->bind(':total_fees', $data['total_fees']);
        // $this->db->bind(':scholarship_verification_toggle', $data['scholarship_verification_toggle']);
        $this->db->bind(':course', $data['course']);
        // $this->db->bind(':course_span', $data['course_span']);
        $this->db->bind(':student_image', $data['student_image']);
        $this->db->bind(':identity_proof', $data['identity_proof']);
        $this->db->bind(':address_proof', $data['address_proof']);
        $this->db->bind(':passbook_statement', $data['passbook_statement']);
        // $this->db->bind(':tuition_fees_receipt', $data['tuition_fees_receipt']);

        // $this->db->bind(':academic_type', $data['academic_type']);
        $this->db->bind(':perm_state', $data['perm_state']);
        $this->db->bind(':comm_state', $data['comm_state']);
        $this->db->bind(':comm_address', $data['comm_address']);
        $this->db->bind(':comm_village', $data['comm_village']);
        $this->db->bind(':comm_block', $data['comm_block']);
        $this->db->bind(':comm_pin_code', $data['comm_pin_code']);
        $this->db->bind(':perm_address', $data['perm_address']);
        $this->db->bind(':perm_village', $data['perm_village']);
        $this->db->bind(':perm_block', $data['perm_block']);
        $this->db->bind(':perm_pin_code', $data['perm_pin_code']);
        $this->db->bind(':father_aadhar_doc', $data['father_aadhar_doc']);
        $this->db->bind(':mother_aadhar_doc', $data['mother_aadhar_doc']);
        $this->db->bind(':hobby', $data['hobby']);
        $this->db->bind(':board', $data['board']);
        $this->db->bind(':achievements', $data['achievements']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':mother_tongue', $data['mother_tongue']);

        $this->db->bind(':basic_flag', '1');

        $this->db->bind(':p_academic_name', $data['p_academic_name']);
        $this->db->bind(':p_class', $data['p_class']);
        $this->db->bind(':p_cgpa', $data['p_cgpa']);
        $this->db->bind(':p_start_date', $data['p_start_date']);
        $this->db->bind(':p_end_date', $data['p_end_date']);






        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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
    public function get_quiz_score()
    {
        $this->db->query('SELECT * FROM quiz_result where user_id=:user_id');
        $this->db->bind(':user_id',  $_SESSION['rexkod_oodles_student_id']);
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_no_of_attempt($quiz_id)
    {
        $this->db->query('SELECT COUNT(*) as attempt FROM  quiz_result where user_id=:user_id AND quiz_id = :quiz_id');
        $this->db->bind(':user_id', $_SESSION['rexkod_oodles_student_id']);
        $this->db->bind(':quiz_id', $quiz_id);
        $result = $this->db->single();
        return $result->attempt;
    }
    public function apply_scholarship($scholarship_id, $criteria_answer)
    {
        $this->db->query('INSERT INTO scholarship_application (scholarship_id,student_id,criteria_answer,criteria_pass,status) values (:scholarship_id,:student_id,:criteria_answer,:criteria_pass,:status)');
        $this->db->bind(':scholarship_id', $scholarship_id);
        $this->db->bind(':criteria_answer', $criteria_answer);
        $student_id = $_SESSION['rexkod_oodles_student_id'];
        $this->db->bind(':student_id', $student_id);
        $this->db->bind(':criteria_pass', '1');
        $this->db->bind(':status', '1');

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_scholarship_application_document($final_document_submit, $scholarship_id)
    {
        // echo $final_document_submit;
        // die();
        $this->db->query('UPDATE scholarship_application SET documents=:documents WHERE scholarship_id = :scholarship_id AND student_id = :student_id');
        $this->db->bind(':scholarship_id', $scholarship_id);
        $this->db->bind(':documents', $final_document_submit);
        $student_id = $_SESSION['rexkod_oodles_student_id'];
        $this->db->bind(':student_id', $student_id);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function insert_scholarship_application_document($final_document_submit, $scholarship_id,$document_ids)
    {
        $this->db->query('INSERT into  scholarship_application  (documents,scholarship_id,student_id,created_at,document_ids) VALUES (:documents,:scholarship_id,:student_id,:created_at,:document_ids)');
        $this->db->bind(':scholarship_id', $scholarship_id);
        $this->db->bind(':documents', $final_document_submit);
        $student_id = $_SESSION['rexkod_oodles_student_id'];
        $this->db->bind(':student_id', $student_id);
        $this->db->bind(':document_ids', $document_ids);
        $this->db->bind(':created_at', date('Y-m-d H:i:s'));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_scholarship_application_doc($final_document_submit, $application_id)
    {
        $this->db->query('UPDATE scholarship_application SET documents=:documents WHERE id = :id ');
        $this->db->bind(':id', $application_id);
        $this->db->bind(':documents', $final_document_submit);
      

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_quiz_for_student($class)
    {
        // echo $get_student_class;
        // die();
        $this->db->query('SELECT * FROM quizes where class_name=:class OR class_name=0');
        $this->db->bind(':class', $class);
        return $results = $this->db->resultset();
    }
    public function get_quiz_for_category($category_id)
    {
        // echo $get_student_class;
        // die();
        $this->db->query('SELECT * FROM quizes where category=:category ');
        $this->db->bind(':category', $category_id);
        return $results = $this->db->resultset();
    }
    public function get_quiz_for_category_and_subject($category_id, $subject)
    {
        // echo $category_id;
        // die();
        $this->db->query('SELECT * FROM quizes where category=:category AND subject_name=:subject_name');
        $this->db->bind(':category', $category_id);
        $this->db->bind(':subject_name', $subject);
        return $results = $this->db->resultset();
    }
    public function get_quiz_for_category_and_subject_complete($category_id, $subject)
    {
        // echo $category_id;
        // die();
        $this->db->query('SELECT * FROM quizes where category=:category AND subject_name=:subject_name AND start_date IS NOT NULL order by id desc');
        $this->db->bind(':category', $category_id);
        $this->db->bind(':subject_name', $subject);
        return $results = $this->db->resultset();
    }
    public function get_quiz_for_category_and_subject_and_class($category_id, $subject)
    {
        // echo $category_id;
        // die();
        $this->db->query('SELECT * FROM quizes where category=:category AND subject_name=:subject_name AND class_name=:class_name AND status=:status AND created_by IN (SELECT id from auth where type="admin" OR type="subadmin_quiz") and publish=:publish AND start_date IS NOT NULL order by start_date desc ');
        $this->db->bind(':category', $category_id);
        $this->db->bind(':status', '1');
        $this->db->bind(':subject_name', $subject);
        $this->db->bind(':class_name', $_SESSION['rexkod_oodles_student_class']);
        // $this->db->bind(':created_by', '1');
        $this->db->bind(':publish', '1');
        return $results = $this->db->resultset();
    }
    public function get_subject_from_quiz_category($category, $class)
    {
        $this->db->query("SELECT distinct subject_name from quizes where category=:category and class_name=:class_name");
        $this->db->bind(':category', $category);
        $this->db->bind(':class_name', $class);


        return $results = $this->db->resultset();
    }

    public function get_all_selected_school_quiz($category_id, $subject, $academic_name)
    {
        // echo $category_id;
        // die();
        $this->db->query('SELECT * FROM quizes where category=:category AND subject_name=:subject_name AND class_name=:class_name AND status=:status AND created_by IN (SELECT teacher_id from teacher where school=:academic_name) and publish=:publish');
        $this->db->bind(':category', $category_id);
        $this->db->bind(':status', '1');
        $this->db->bind(':subject_name', $subject);
        $this->db->bind(':publish', 1);
        $this->db->bind(':academic_name', $academic_name);
        $this->db->bind(':class_name', $_SESSION['rexkod_oodles_student_class']);
        return $results = $this->db->resultset();
    }

    public function get_quiz_result_count($category, $pass)
    {
        $this->db->query('SELECT * FROM quiz_result where category=:category AND pass=:pass');
        $this->db->bind(':category', $category);
        $this->db->bind(':pass', $pass);
        return $results = $this->db->resultset();
    }
    public function get_quiz_result_count_of_student($category, $pass, $student_id)
    {
        $this->db->query('SELECT * FROM quiz_result where category=:category AND pass=:pass AND user_id=:user_id');

        $this->db->bind(':user_id', $student_id);
        $this->db->bind(':category', $category);
        $this->db->bind(':pass', $pass);
        return $results = $this->db->resultset();
    }
    public function get_quiz_detail($id)
    {
        $this->db->query('SELECT * FROM quizes where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_count_of_quiz($category)
    {
        $this->db->query('SELECT * FROM quizes where category=:category');
        $this->db->bind(':category', $category);
        return $results = $this->db->resultSet();
    }
    public function get_count_of_quiz_created_by_admin($category)
    {

        $this->db->query('SELECT * FROM quizes where category=:category AND created_by =:created_by AND start_date is not Null and publish=:publish');
        $this->db->bind(':category', $category);
        $this->db->bind(':created_by', '1');
        $this->db->bind(':publish', '1');
        return $results = $this->db->resultSet();
    }
    public function get_count_of_quiz_not_created_by_admin($category, $school_id)
    {
        $this->db->query('SELECT * FROM quizes where category=:category AND start_date is not Null AND created_by in  (SELECT teacher_id from teacher where school=:school ) and publish=:publish ');
        $this->db->bind(':category', $category);
        $this->db->bind(':school', $school_id);
        $this->db->bind(':publish', '1');

        return $results = $this->db->resultSet();
    }
    public function add_notifications($user_id, $message)
    {
        $this->db->query('INSERT INTO notifications (user_id,message) VALUES (:user_id,:message)');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':message', $message);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function mark_notifications_read($user_id)
    {
        $this->db->query("UPDATE notifications SET flag=:flag where user_id = :user_id");
        $this->db->bind(':flag', '1');
        $this->db->bind(':user_id', $user_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_notification($value, $user_id)
    {
        $this->db->query("UPDATE notifications SET flag_delete=:flag where user_id = :user_id and id=:id");
        $this->db->bind(':flag', '1');
        $this->db->bind(':id', $value);
        $this->db->bind(':user_id', $user_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function get_notifications($user_id)
    {
        $this->db->query("SELECT * FROM notifications where user_id=:user_id ORDER BY id desc");
        $this->db->bind(':user_id', $user_id);
        return $results = $this->db->resultset();
    }
    public function quiz_ranking_country_wise()
    {
        // $this->db->query('SELECT DISTINCT quiz_result.*, user_id FROM quiz_result order by total_score desc limit 10');
        $this->db->query('SELECT DISTINCT user_id, total_score FROM quiz_result order by total_score desc');
        return $results = $this->db->resultset();
    }
    public function quiz_ranking_country_wise_by_class($class_id)
    {
        // $this->db->query('SELECT DISTINCT quiz_result.*, user_id FROM quiz_result order by total_score desc limit 10');
        $this->db->query('SELECT DISTINCT user_id, coins_earned FROM quiz_result  WHERE user_id in (SELECT id from auth where type=:type AND class=:class) order by total_score');
        $this->db->bind(':type', 'student');
        $this->db->bind(':class', $class_id);

        return $results = $this->db->resultset();
    }
    public function quiz_ranking_country_wise_from_quiz_score($class_id)
    {
        // $this->db->query('SELECT DISTINCT quiz_result.*, user_id FROM quiz_result order by total_score desc limit 10');
        $this->db->query('SELECT * from quiz_score  WHERE user_id in (SELECT id from auth where  class=:class) order by total_score');
        // $this->db->bind(':type', 'student');
        $this->db->bind(':class', $class_id);

        return $results = $this->db->resultset();
    }
    public function get_quiz_score_category_wise($category_id)
    {
        // changes score to coins_earned
        $this->db->query('SELECT user_id, sum(coins_earned) as total_score ,sum(attempt) as total_attempt FROM quiz_result WHERE category = :category GROUP BY user_id ORDER BY SUM(coins_earned) DESC limit 10');
        $this->db->bind(':category', $category_id);
        return $results = $this->db->resultset();
    }
    // public function get_quiz_score_category_wise(){
    //     $this->db->query('SELECT * FROM quiz_result GROUP BY category ');
    //     // $this->db->bind(':category' , $category_id );
    //     return $results = $this->db->resultset();
    // }

    public function quiz_ranking_state_wise($state)
    {
        $this->db->query("SELECT DISTINCT user_id, total_score FROM quiz_result where user_id in (SELECT student_id from student where comm_state=:state) order by total_score desc limit 10");
        $this->db->bind(':state', $state);
        return $results = $this->db->resultset();
    }

    public function quiz_ranking_state_wise_by_class($state, $class_id)
    {
        $this->db->query("SELECT DISTINCT user_id, total_score FROM quiz_result where user_id in (SELECT student_id from student where comm_state=:state) AND user_id in (SELECT id from auth where  class=:class) order by total_score desc limit 10");
        $this->db->bind(':class', $class_id);
        // $this->db->bind(':type', 'student');
        $this->db->bind(':state', $state);
        return $results = $this->db->resultset();
    }
    public function quiz_ranking_state_wise_from_quiz_score($state, $class_id, $academic)
    {
        //  echo $state;
        //  die();
        $this->db->query("SELECT * FROM quiz_score INNER JOIN auth ON auth.id = quiz_score.user_id INNER JOIN student ON student.student_id = quiz_score.user_id where student.comm_state like :state AND  auth.class=:class");
        $this->db->bind(':class', $class_id);
        // $this->db->bind(':type', 'student');
        $this->db->bind(':state', $state);
        return $results = $this->db->resultset();
    }

    public function quiz_ranking_college_wise($college)
    {
        $this->db->query("SELECT DISTINCT user_id, total_score FROM quiz_result where user_id in (SELECT student_id from student where academic_name=:college) order by total_score desc limit 10");
        $this->db->bind(':college', "2" . $college);
        return $results = $this->db->resultset();
    }

    public function quiz_ranking_school_wise($school)
    {
        $this->db->query("SELECT DISTINCT user_id, total_score FROM quiz_result where user_id in (SELECT student_id from student where academic_name=:school) order by total_score desc limit 10");
        $this->db->bind(':school', "1" . $school);
        return $results = $this->db->resultset();
    }

    public function quiz_ranking_course_wise($course)
    {
        $this->db->query("SELECT DISTINCT user_id, total_score FROM quiz_result where user_id in (SELECT student_id from student where course=:course) order by total_score desc limit 10");
        $this->db->bind(':course', $course);
        return $results = $this->db->resultset();
    }

    public function quiz_ranking_course_wise_by_class($class_id)
    {
        $this->db->query("SELECT DISTINCT user_id, total_score FROM quiz_result  WHERE user_id IN (SELECT id from auth where class=:class) order by total_score desc limit 10");

        $this->db->bind(':class', $class_id);
        return $results = $this->db->resultset();
    }
    public function quiz_ranking_course_wise_from_quiz_score($class_id, $student_academic_type, $academic_name)
    {
        //        echo $class_id;
        // echo $student_academic_type.$academic_name;

        // die();
        $this->db->query("SELECT * FROM quiz_score INNER JOIN auth ON auth.id = quiz_score.user_id INNER JOIN student ON student.student_id = quiz_score.user_id where student.academic_name = :academic AND  auth.class=:class");


        $this->db->bind(':class', $class_id);
        if ($student_academic_type == 1) {
            $this->db->bind(':academic', "165");
        } elseif ($student_academic_type == 2) {
            $this->db->bind(':academic', "165");
        } else {
            $this->db->bind(':academic', "165");
        }
        return $results = $this->db->resultset();
    }

    public function get_chapter_detail($class, $subject)
    {
        $this->db->query('SELECT * FROM chapter where class LIKE :class AND subject LIKE :subject');
        // Bind values
        $this->db->bind(':class', $class);
        $this->db->bind(':subject', $subject);
        return $row = $this->db->resultSet();
    }
    public function get_chapter_detail_class_wise($class)
    {
        $this->db->query('SELECT * FROM chapter where class LIKE :class ');
        // Bind values
        $this->db->bind(':class', $class);
        return $row = $this->db->resultSet();
    }

    public function get_criteria_detail($id)
    {
        $this->db->query('SELECT * FROM criteria WHERE id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }
    public function get_class_detail_single($id)
    {
        $this->db->query("SELECT * FROM class where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_board_detail_single($id)
    {
        $this->db->query("SELECT * FROM boards where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }

    public function get_scholarship_document_detail($id)
    {
        $this->db->query('SELECT * FROM scholarship_doc WHERE id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }
    public function get_school_subject($id)
    {
        $this->db->query('SELECT * FROM subject where id=:id');
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_single_student($id)
    {
        $this->db->query('SELECT * FROM student WHERE student_id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }
    public function check_quiz_pass_status($quiz_id)
    {
        $this->db->query('SELECT * FROM quiz_result where quiz_id=:quiz_id AND user_id = :user_id AND pass=:pass ');
        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':pass', '1');
        $this->db->bind(':user_id', $_SESSION['rexkod_oodles_student_id']);
        $result = $this->db->resultSet();
        return $result;
    }
    public function get_current_student()
    {
        $this->db->query('SELECT * FROM student WHERE student_id = :id');
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);
        $result = $this->db->single();
        return $result;
    }

    public function get_student_detail($id)
    {
        $this->db->query('SELECT * FROM student WHERE student_id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }

    public function get_all_student()
    {
        $this->db->query('SELECT * FROM student ORDER BY id ASC');

        return $results = $this->db->resultset();
    }
    public function get_school_detail_single($id)
    {
        $this->db->query("SELECT * FROM school where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->resultSet();
    }
    public function get_corporate_detail($id)
    {
        $this->db->query('SELECT * FROM corporate where corporate_id=:id');
        $this->db->bind(':id',$id);
        return $results = $this->db->single();
    }
    public function get_college_detail_single($id)
    {
        $this->db->query("SELECT * FROM college where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->resultSet();
    }
    public function get_ind_school_detail($id)
    {
        $this->db->query("SELECT * FROM school where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_school_detail($id)
    {
        $this->db->query("SELECT * FROM school where school_id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_ind_college_detail($id)
    {
        $this->db->query("SELECT * FROM college where id=:id");
        $this->db->bind(':id', $id);
        return $results = $this->db->single();
    }
    public function get_scholarship_application($id)
    {
        $this->db->query('SELECT * FROM scholarship_application where student_id=:id AND scholarship_id  = :scholarship_id ');
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);
        $this->db->bind(':scholarship_id', $id);
        // echo $id;
        // echo $_SESSION['rexkod_oodles_student_id'];
        // die();

        $result = $this->db->single();
        return $result;
    }

    public function get_scholarship_detail($id)
    {
        $this->db->query('SELECT * FROM scholarship where id  = :scholarship_id ');
        $this->db->bind(':scholarship_id', $id);
        $result = $this->db->single();
        return $result;
    }
    public function get_all_scholarship_app()
    {
        $this->db->query('SELECT * FROM scholarship_application where student_id=:id ORDER BY id desc ');
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);
        return $results = $this->db->resultset();
    }

    public function check_pincode($pin)
    {
        $this->db->query('SELECT DISTINCT district, state  FROM pincodes WHERE pincode = :pin');
        $this->db->bind(':pin', $pin);
        return $this->db->single();
    }

    public function check_area($pin)
    {
        $this->db->query('SELECT post_office as area FROM pincodes WHERE pincode = :pin');
        $this->db->bind(':pin', $pin);
        return $this->db->resultSet();
    }

    public function get_all_scholarship_application_id()
    {
        $this->db->query('SELECT * FROM scholarship_application where student_id=:id  ORDER BY id desc');
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);
        $results = $this->db->resultset();
        return $results;
    }
    public function search_student_by_name_phone($search_input)
    {
        $this->db->query('SELECT * FROM auth WHERE type=:type AND ( name LIKE concat("%", :search_input, "%")  OR phone LIKE concat("%", :search_input, "%"))');
        $this->db->bind(':type', 'student');
        $this->db->bind(':search_input', $search_input);

        return $row = $this->db->resultSet();
    }
    public function check_auth_detail($id, $name)
    {
        $this->db->query('SELECT * from auth where id=:id and name LIKE concat("%", :name, "%") and type=:type ');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':type', 'student');
        return $row = $this->db->single();
    }
    public function get_auth_detail()
    {
        $this->db->query('SELECT * from auth where id=:id');
        $this->db->bind(':id', $_SESSION['rexkod_oodles_student_id']);
        return $row = $this->db->single();
    }
    public function get_all_subscription_plan()
    {
        $this->db->query('SELECT * FROM subscription where status=:status ');
        $this->db->bind(':status', '1');

        return $this->db->resultSet();
    }
    public function get_contest_registration_detail($quiz_id, $student_id)
    {

        $this->db->query('SELECT * FROM contest_reg where quiz_id=:quiz_id AND  student_id=:student_id');
        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':student_id', $student_id);
        return $results = $this->db->single();
    }
    public function get_my_registered_quizes()
    {

        $this->db->query('SELECT * FROM contest_reg where  student_id=:student_id order by created_at desc');

        $this->db->bind(':student_id', $_SESSION['rexkod_oodles_student_id']);
        return $results = $this->db->resultSet();
    }


    public function initiate_contest_registration($quiz_id)
    {
        $this->db->query('INSERT INTO contest_reg (quiz_id,student_id) values (:quiz_id,:student_id)');
        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':student_id', $_SESSION['rexkod_oodles_student_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // to know the contest quiz has been taken  before or not
    public function get_contest_reg_quiz_status($quiz_id)
    {

        $this->db->query('SELECT * FROM contest_reg where  student_id=:student_id and status=:status and quiz_id=:quiz_id');
        $this->db->bind(':quiz_id', $quiz_id);
        $this->db->bind(':status', 1);

        $this->db->bind(':student_id', $_SESSION['rexkod_oodles_student_id']);
        return $results = $this->db->single();
    }


    public function update_quiz_reg_status($quiz_id)
    {

        $this->db->query('UPDATE contest_reg SET status=:status,quiz_taken_at=:quiz_taken_at where quiz_id=:quiz_id and student_id=:student_id');
        $date = date('Y/d/m h:i:s');
        $this->db->bind(':status', 1);
        $this->db->bind(':quiz_taken_at', date('Y-m-d H:i:s'));
        $this->db->bind(':student_id', $_SESSION['rexkod_oodles_student_id']);
        $this->db->bind(':quiz_id', $quiz_id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // --------------

    public function get_class_by_id($id)
    {
        # code...
        $this->db->query('SELECT * FROM auth where  id=:id');
        $this->db->bind(':id', $id);

        return $results = $this->db->single();
    }

    public function get_criteria()
    {
        # code...
        $this->db->query('SELECT * FROM criteria');
        return $results = $this->db->resultSet();
    }

    public function get_classwise_scholarships($student_class)
    {
        $this->db->query('SELECT * FROM scholarship 
            WHERE FIND_IN_SET(:student_class, course) > 0 
            ORDER BY id DESC;');
        $this->db->bind(':student_class', $student_class);
        return $results = $this->db->resultset();
    }

   
    public function  submit_scholarship_eligibility($scholarship_id, $student_id,$answers,$flag)
    {
        $this->db->query('INSERT INTO scholarship_eligibility (scholarship_id,student_id,answers,status) values (:scholarship_id,:student_id,:answers,:status)');
        $this->db->bind(':scholarship_id', $scholarship_id);
        $this->db->bind(':student_id', $student_id);
        $this->db->bind(':answers', $answers);
        $this->db->bind(':status', $flag);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function check_scholarship_eligibility_status($scholarship_id)
    {
        # code...
        $this->db->query('SELECT * FROM scholarship_eligibility where scholarship_id = :scholarship_id and student_id = :student_id');
        $this->db->bind(':scholarship_id', $scholarship_id);
        $this->db->bind(':student_id', $_SESSION['rexkod_oodles_student_id']);
        return $results = $this->db->single();
    }
    public function get_active_market_place()
    {
        $this->db->query("SELECT * FROM market_place where status=:status order by offer_price asc");
        $this->db->bind(':status', 1);

        return $results = $this->db->resultSet();
    }
    public function check_purchased_market_place_orders($id)
    {
        $this->db->query("SELECT * FROM market_place_orders where product_id=:product_id and user_id=:user_id");
        $this->db->bind(':product_id', $id);
        
        $this->db->bind(':user_id', $_SESSION['rexkod_oodles_student_id']);

        return $results = $this->db->single();
    }

    public function get_total_attempt($user_id){
        $this->db->query("SELECT count(*) as total_attempt FROM quiz_result where user_id=:user_id");
        
        $this->db->bind(':user_id', $user_id);

        return $results = $this->db->single();
    }
  
    public function get_contest_result($category_id){
        $this->db->query('SELECT user_id, sum(accumulated_score) as total_score ,sum(contest_amount) as total_amount FROM quiz_result WHERE category = :category GROUP BY user_id ORDER BY SUM(contest_amount) DESC limit 10');
        $this->db->bind(':category', $category_id);
        return $results = $this->db->resultset();
    }

    // =================================================================================================

    public function get_auth_detail_by_id($id){
        $this->db->query('SELECT * from auth where id=:id');
        $this->db->bind(':id', $id);
        return $row = $this->db->single();
    }
    public function get_hobby($id){
        $this->db->query('SELECT * from hobbies where id=:id');
        $this->db->bind(':id', $id);
        return $row = $this->db->single();
    }
    public function edugorilla_package_response($transaction_id,$msg,$status,$package_id){
        $this->db->query('INSERT INTO edugorilla_package_responses (transaction_id, msg, status, package_id,student_id) VALUES(:transaction_id, :msg, :status, :package_id,:student_id)');

            $this->db->bind(':transaction_id', $transaction_id);
            $this->db->bind(':msg', $msg);
            $this->db->bind(':status', $status);
            $this->db->bind(':package_id', $package_id);
            $this->db->bind(':student_id', $_SESSION['rexkod_oodles_student_id']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
    }
}
