<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<!-- ==================================================================================================== -->
<style>
    .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
        margin-left: 15px;
        border-radius: 5px;

    }
</style>
<!-- ==================================================================================================== -->
<?php $quiz = $data['get_quiz_detail']; ?>
<?php $quiz11 = $data['get_all_quiz']; ?>
<?php $prize_pool_calculation = $data['contest_prize_calculation']; ?>
<?php $get_amount_registered_for_quiz = $data['get_amount_registered_for_quiz']; ?>
<?php $count_of_quiz_registration = $data['count_of_quiz_registration']; ?>

<?php $contest_prize_calculation_final = $data['contest_prize_calculation_final']; ?>

<?php $adminMod = new Admins; ?>


<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Dispersement of Quiz Money </div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quiz_result2/<?php echo $quiz->id; ?>">Quiz </a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Dispersement of Quiz Money</li>
                </ol>
            </div>
        </div>
        <?php
        // print_r($prize_pool_calculation);
        // die;
        ?>
        <?php if ($quiz->disperse == 0) { ?>
            <form action="<?php echo URLROOT; ?>/admin/disperse_money_for_contest_quiz/<?php echo $quiz->id; ?>" method="POST">
                <button type="submit" class="form-control btn-danger" onclick="return confirm('Are you sure?')">Disperse Money</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                The quiz money has already been dispersed!.
            </div>

        <?php } ?>


        <div class="row">
            <!-- ================================================================= -->

            <div class="col-md-12 col-sm-12">

                <div class="card-box mt-5 p-3">
                    <!-- <?php echo $quiz11->prize_calc_data_id; ?> -->
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <div class="table-responsive">

                            
                            <table class="table table-bordered border-dark table-hover" id="tab_logic">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            Level
                                        </th>
                                        <th class="text-center">
                                            Rank
                                        </th>
                                        <th class="text-center">
                                            Winning Amount
                                        </th>
                                        <th class="text-center">
                                            Student ID
                                        </th>
                                        <th class="text-center">
                                            Student Name
                                        </th>
                                        <th class="text-center">
                                            Contest Score
                                        </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- -------added by ashutosh--- -->
                                <?php
                                if($contest_prize_calculation_final){

                                    $i = 1;
                                    $j = 0;
                                    $count = 0;
                                    $level = 0;
                                    $tttt = json_decode($contest_prize_calculation_final->levels_data);
                                    $get_quiz_scores = $data['get_quiz_score'];
                                    //    echo  count($get_quiz_scores);
                                    //    die();
                                    // print_r($tttt);
                                    // print_r($get_quiz_scores);
                                    ?>

                                    <?php

                                    $j = 0;
                                    foreach ($tttt as $prize_pool_cal) {
                                        $level++;

                                        for ($i = 0; $i < $prize_pool_cal->no_of_winners; $i++) {
                                            if($count<count($get_quiz_scores)){
                                            $count++;
                                            if ($j < count($get_quiz_scores)) {
                                                $quiz_result  = $get_quiz_scores[$j];
                                            }
                                            
                                            $individual_amount_int = intval($prize_pool_cal->individual_amount);
                                        
                                    ?>

                                            <tr>
                                                <td class="text-center"><?php echo $level; ?></td>
                                                <td class="text-center"><?php echo $count; ?></td>
                                                <td class="text-center"><?php echo round($individual_amount_int,2); ?></td>
                                                <?php if ($count <= count($get_quiz_scores)) { ?>
                                                    <?php if ($j < count($get_quiz_scores)) { ?>
                                                        <td class="text-center"><?php echo ($quiz_result->user_id); ?></td>

                                                        <td class="text-center"><?php $user_detail = $adminMod->get_single_student1($quiz_result->user_id);
                                                                                echo $user_detail->name; ?></td>

                                                        <td class="text-center"><?php echo ($quiz_result->accumulated_score); ?></td>

                                                    <?php }
                                                } else { ?>
                                                    <td class="text-center">Nil</td>
                                                    <td class="text-center">Nil</td>
                                                    <td class="text-center">Nil</td>



                                                <?php } ?>
                                            </tr>

                                    <?php
                                            $j++;
                                        }
                                    }
                                }
                                }else{
                                ?>

                                    <!-- ------- -->

                                    <?php
                                    $i = 1;
                                    $j = 0;
                                    $count = 0;
                                    $level = 0;
                                    $tttt = json_decode($prize_pool_calculation->levels_data);
                                    $get_quiz_scores = $data['get_quiz_score'];
                                    //    echo  count($get_quiz_scores);
                                    //    die();
                                    // print_r($tttt);
                                    // print_r($get_quiz_scores);
                                    ?>

                                    <?php

                                    $j = 0;
                                    foreach ($tttt as $prize_pool_cal) {
                                        $level++;

                                        for ($i = 0; $i < $prize_pool_cal->no_of_winners; $i++) {
                                            if($count<count($get_quiz_scores)){
                                            $count++;
                                            if ($j < count($get_quiz_scores)) {
                                                $quiz_result  = $get_quiz_scores[$j];
                                            }
                                            if ($prize_pool_calculation->no_of_participants!=$count_of_quiz_registration) {
                                            $individual_amount_int =  ($get_amount_registered_for_quiz *(100-$prize_pool_calculation->expenses)* intval($prize_pool_cal->prize_amount_percentage)) / ($prize_pool_cal->no_of_winners*100*100);
                                        }else{
                                            $individual_amount_int = intval($prize_pool_cal->individual_amount);
                                        }
                                    ?>

                                            <tr>
                                                <td class="text-center"><?php echo $level; ?></td>
                                                <td class="text-center"><?php echo $count; ?></td>
                                                <td class="text-center"><?php echo round($individual_amount_int,2); ?></td>
                                                <?php if ($count <= count($get_quiz_scores)) { ?>
                                                    <?php if ($j < count($get_quiz_scores)) { ?>
                                                        <td class="text-center"><?php echo ($quiz_result->user_id); ?></td>

                                                        <td class="text-center"><?php $user_detail = $adminMod->get_single_student1($quiz_result->user_id);
                                                                                echo $user_detail->name; ?></td>

                                                        <td class="text-center"><?php echo ($quiz_result->accumulated_score); ?></td>

                                                    <?php }
                                                } else { ?>
                                                    <td class="text-center">Nil</td>
                                                    <td class="text-center">Nil</td>
                                                    <td class="text-center">Nil</td>



                                                <?php } ?>
                                            </tr>

                                    <?php
                                            $j++;
                                        }
                                    }
                                }
                            }
                                    ?>

                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


    </div>
</div>
<!-- end page content -->

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>

<script>
    document.getElementById('disperse-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting immediately
        // ...
    });

    document.querySelector('#disperse-form button').addEventListener('click', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085D6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, disperse it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirmed, submit the form
                document.getElementById('disperse-form').submit();
            }
        });
    });
</script>