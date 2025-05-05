<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>


<!-- ==================================================================================================== -->
<style>
    .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
        margin-left: 15px;
        border-radius: 5px;

    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: center;
        padding: 8px;
        border: 1px solid black;
    }

    th {
        background-color: #ddd;
    }
</style>
<!-- ==================================================================================================== -->

<?php $prize_pool_calculation = $data['contest_prize_calculation']; ?>
<?php $count_of_quiz_registration = $data['count_of_quiz_registration']; ?>
<?php $get_quiz_detail = $data['get_quiz_detail']; ?>
<?php $get_amount_registered_for_quiz = $data['get_amount_registered_for_quiz']; ?>

<?php $contest_prize_calculation_final = $data['contest_prize_calculation_final']; ?>

<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Contest Prize Detail</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Contest Prize Detail</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active"></li>
                </ol>
            </div>
        </div>
        <?php
        // print_r($prize_pool_calculation);
        // die;
        ?>
        <div class="row">
            <div class="col-lg-4 col-sm-12 mx-auto">
            <!-- <div class="card border-info" style="width: 40%;margin-left: 30%;"> -->
            <div class="card border-info">
                <div class="card-body">
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>  -->
                    <h5 class="card-title text-primary fw-bold fs-3 text-center my-4">Contest Prize Amount</h5>
                    <!-- <p class="card-text">Some quick example text to build.</p> -->

                    <div>
                        <table class="table mb-0">
                            <thead>
                                <tr>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                // assuming that $contest_prize_data is already defined and contains the JSON object

                                // decode the JSON object into a PHP associative array
                                $prize_data = json_decode($prize_pool_calculation->levels_data, true);

                                if($contest_prize_calculation_final){
                                    $prize_data_final = json_decode($contest_prize_calculation_final->levels_data, true);

                                }


                                // create the HTML table
                                echo '<table>';
                                echo '<thead><tr><th>Winners Range</th><th>Individual Amount</th></tr></thead>';
                                echo '<tbody>';

                                // initialize the counters
                                $start = 1;
                                $end = 0;
                                $total_amount = 0;

                                if (! $contest_prize_calculation_final) {
                                // iterate over the prize levels and add up the number of winners
                                foreach ($prize_data as $level) {
                                    $end += $level['no_of_winners'];
                                    $individual_amount = 'Rs ' . $level['individual_amount'];

                                    // combine end date and time into a single string
                                    $end_datetime = $get_quiz_detail->start_date . ' ' . $get_quiz_detail->start_time;

                                    // convert end datetime to UNIX timestamp
                                    $end_timestamp = strtotime($end_datetime);

                                    // calculate the timestamp for 10 minutes before the end time
                                    $ten_minutes_before = $end_timestamp - (10 * 60);

                                    // get the current UNIX timestamp
                                    $current_timestamp = time();

                                    // check if the current time is less than 10 minutes before the end time
                                    if ($current_timestamp  < $ten_minutes_before) {
                                        // the button should be enabled
                                        $individual_amount_int = intval($level['individual_amount']);
                                    } else {
                                        // the button should be disabled


                                        if ($prize_pool_calculation->no_of_participants!=$count_of_quiz_registration) {
                                            $individual_amount_int =  ($get_amount_registered_for_quiz *(100-$prize_pool_calculation->expenses)* intval($level['prize_amount_percentage'])) /($level['no_of_winners']*100*100);
                                        }else{
                                            $individual_amount_int = intval($level['individual_amount']);
                                        
                                        }
                                    }

                                    // display the winners range and individual amount in the table
                                    if ($start == $end) {
                                        echo '<tr><td>' . $start . '</td><td>' . round($individual_amount_int,2) . '</td></tr>';
                                    } else {
                                        echo '<tr><td>' . $start . '-' . $end . '</td><td>' . round($individual_amount_int,2) . '</td></tr>';
                                    }

                                    // calculate the total amount
                                    $total_amount += intval($level['no_of_winners']) * $individual_amount_int;

                                    // update the starting point for the next level
                                    $start = $end + 1;
                                }
                            }else{
                                foreach ($prize_data_final as $level) {
                                    $end += $level['no_of_winners'];
                                    // $individual_amount = 'Rs ' . $level['individual_amount'];
                                        $individual_amount_int = intval($level['individual_amount']);


                                    // combine end date and time into a single string
                                    $end_datetime = $get_quiz_detail->start_date . ' ' . $get_quiz_detail->start_time;

                                    // convert end datetime to UNIX timestamp
                                    $end_timestamp = strtotime($end_datetime);

                                    // calculate the timestamp for 10 minutes before the end time
                                    $ten_minutes_before = $end_timestamp - (10 * 60);

                                    // get the current UNIX timestamp
                                    $current_timestamp = time();

                                    // check if the current time is less than 10 minutes before the end time
                                    // if ($current_timestamp  < $ten_minutes_before) {
                                    //     // the button should be enabled
                                    //     $individual_amount_int = intval($level['individual_amount']);
                                    // } else {
                                    //     // the button should be disabled


                                    //     if ($prize_pool_calculation->no_of_participants!=$count_of_quiz_registration) {
                                    //         $individual_amount_int =  ($get_amount_registered_for_quiz *(100-$prize_pool_calculation->expenses)* intval($level['prize_amount_percentage'])) /($level['no_of_winners']*100*100);
                                    //     }else{
                                    //         $individual_amount_int = intval($level['individual_amount']);
                                        
                                    //     }
                                    // }

                                    // display the winners range and individual amount in the table
                                    if ($start == $end) {
                                        echo '<tr><td>' . $start . '</td><td>' . round($individual_amount_int,2) . '</td></tr>';
                                    } else {
                                        echo '<tr><td>' . $start . '-' . $end . '</td><td>' . round($individual_amount_int,2) . '</td></tr>';
                                    }

                                    // calculate the total amount
                                    $total_amount += intval($level['no_of_winners']) * $individual_amount_int;

                                    // update the starting point for the next level
                                    $start = $end + 1;
                                }
                            }

                                echo '<tr><td>' . 'Total amount:' . '</td><td>' . $total_amount . '</td></tr>';
                                echo '</tbody></table>';
                                ?>
                            </tbody>



                    </div>
                </div>
            </div>
            <!-- ================================================================= -->


            </div>
        </div>
        <br>
        <br>
        <br>

    </div>
</div>
<!-- end page content -->

<?php require APPROOT . '/views/inc_student/footer.php'; ?>