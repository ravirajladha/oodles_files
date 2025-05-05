<?php require APPROOT . '/views/inc_admin/header.php'; ?>


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

<?php $prize_pool_calculation = $data['contest_prize_calculation'];
$adminMod = new admins; ?>
<?php $get_contest_pool_used = $adminMod->get_contest_pool_used($prize_pool_calculation->id); 
                                      $count_of_pool_used = count($get_contest_pool_used);
                               
                                      ?>
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Contest Prize View <?php echo $count_of_pool_used; ?></div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <?php if($count_of_pool_used==0){ ?>
                    <li>  <a class="parent-item" href="<?php echo URLROOT; ?>/admin/edit_contest_pool/<?php echo $prize_pool_calculation->id; ?> ">>All Contest Pool</a>&nbsp;<i class="fa fa-angle-right"></i>
                    <?php }else{ ?>

                        <li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/prize_pool_calculations">All Contest Pool</a>&nbsp;<i class="fa fa-angle-right"></i>

                        <?php } ?>
                    </li>
                    <li class="active">Contest Prize View</li>
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
            <div class="card border-info" >
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

                                // create the HTML table
                                echo '<table>';
                                echo '<thead><tr><th>Winners Range</th><th>Individual Amount (In Rs.)</th></tr></thead>';
                                echo '<tbody>';

                                // initialize the counters
                                $start = 1;
                                $end = 0;
                                $total_amount = 0;

                                // iterate over the prize levels and add up the number of winners
                                foreach ($prize_data as $level) {
                                    $end += $level['no_of_winners'];
                                    $individual_amount = 'Rs ' . $level['individual_amount'];

                                    // combine end date and time into a single string
                                    // $end_datetime = $get_quiz_detail->start_date . ' ' . $get_quiz_detail->start_time;

                                    // convert end datetime to UNIX timestamp
                                    // $end_timestamp = strtotime($end_datetime);

                                    // calculate the timestamp for 10 minutes before the end time
                                    // $ten_minutes_before = $end_timestamp - (10 * 60);

                                    // get the current UNIX timestamp
                                    // $current_timestamp = time();

                                    // check if the current time is less than 10 minutes before the end time
                                    // if ($current_timestamp  < $ten_minutes_before) {
                                    // the button should be enabled
                                    $individual_amount_int = intval($level['individual_amount']);
                                    // } else {
                                    // the button should be disabled


                                    //     $individual_amount_int =  ($get_amount_registered_for_quiz *(100-$prize_pool_calculation->expenses)* intval($level['prize_amount_percentage'])) /($level['no_of_winners']*100*100);
                                    // }

                                    // display the winners range and individual amount in the table
                                    if ($start == $end) {
                                        echo '<tr><td>' . $start . '</td><td>' . $individual_amount_int . '</td></tr>';
                                    } else {
                                        echo '<tr><td>' . $start . '-' . $end . '</td><td>' . $individual_amount_int . '</td></tr>';
                                    }

                                    // calculate the total amount
                                    $total_amount += intval($level['no_of_winners']) * $individual_amount_int;

                                    // update the starting point for the next level
                                    $start = $end + 1;
                                }

                                echo '<tr><td>' . 'Total amount:' . '</td><td>' . $total_amount . '</td></tr>';
                                echo '</tbody></table>';
                                ?>
                            </tbody>

                    </div>
                </div>
            </div>
            </div>
            <!-- ================================================================= -->
        </div>


<br>
<br>
<br>
<div class="card-body row">
<?php if($prize_pool_calculation->publish==0){ ?>
    <div class="mb-3 col-3">
        <!-- <button type="button"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Default</button> -->


    </div>
    <div class="mb-3 col-3">
        <a href="<?php echo URLROOT; ?>/admin/delete_prize_pool/<?php echo $prize_pool_calculation->id; ?>">
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-warning">Delete</button></a>


    </div>
    <div class="mb-3 col-3">
    <a href="<?php echo URLROOT; ?>/admin/edit_contest_pool/<?php echo $prize_pool_calculation->id; ?> ">
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-primary">Edit</button></a>
    </div>
    <div class="mb-3 col-3">
    <a href="<?php echo URLROOT; ?>/admin/publish_prize_pool/<?php echo $prize_pool_calculation->id; ?> ">
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-success">Publish</button>
                            </a>
    </div>
    </div>
    <?php }else{ ?>

        <div class="alert alert-success" role="alert">
Successfully published!
</div>
<?php } ?>
</div>    </div>
<!-- end page content -->

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>