<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>

<?php
$adminMod = new Admins;

?>
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Quiz Result</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Quiz Result</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Result</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="panel tab-border card-box">
                    <header class="panel-heading panel-heading-gray custom-tab ">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="#home" data-bs-toggle="tab" class="active">Winnings</a>
                            </li>
                            <!-- <li class="nav-item"><a href="#about" data-bs-toggle="tab">Merit</a>
							</li>
							<li class="nav-item"><a href="#profile" data-bs-toggle="tab">Rapid Fire</a>
							</li>
							<li class="nav-item"><a href="#contact" data-bs-toggle="tab">Contest</a>
							</li> -->
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                    <thead>
                                        <tr>
                                            <!-- <th></th> -->
                                            <th> Rank</th>
                                            <th> i</th>
                                            <th> Winnings</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $quiz = $data['get_quiz_detail'];
                                        ?>
                                        <?php
                                        echo $quiz->quiz_cost;
                                        $quiz_cost = $quiz->quiz_cost;
                                        $prize = $quiz->contest_prize; // 70% of the total prize
                                        $users = $quiz->user_limit; // 60% of the total users
                                        $steps = ($users * ($users + 1)) / 2;
                                        $cur_price = 0;
                                        $no_of_user = 0;
                                        $total = 0;
                                        $count = 0;
                                        $remaining_amount = 0;
                                        ?>
                                        <tr>
                                            <?php
                                            $new_user1  = $users;
                                            $first_prize = (10 / 100) * $prize;
                                            $new_prize1 = $prize - $first_prize;
                                            ?>
                                            <td>1</td>
                                            <td><?php echo $new_user1; ?></td>
                                            <td><?php echo $first_prize ?></td>
                                            <?php
                                            $new_user2  = $new_user1 - 1;
                                            $second_prize = (5 / 100) * $new_prize1;
                                            $new_prize2 = $new_prize1 - $second_prize;
                                            ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $new_user2; ?></td>
                                            <td><?php echo $second_prize ?></td>
                                        </tr>

                                        <?php
                                        for ($i = $users; $i >= 1; $i--) {
                                            $count++;

                                            $cur_price = $prize * $i / $steps;
                                            $cur_price = round($cur_price);
                                            if ($cur_price < $quiz_cost) {
                                                $remaining_amount += $cur_price;
                                                $no_of_user = round($remaining_amount / $quiz_cost);
                                            } else {

                                                echo  "<tr class='odd gradeX'>";
                                                echo "<td class='left'>" . $count . "</td>";
                                                echo "<td class='left'>" . $i . "</td>";
                                                echo "<td class='left'>" . $cur_price . "</td>";
                                                $total += $cur_price;
                                                echo "</tr>";
                                            }
                                        }
                                        if ($no_of_user > 0) {
                                            for ($i = $no_of_user; $i >= 1; $i--) {

                                                echo  "<tr class='odd gradeX'>";
                                                echo "<td class='left'>" . $count . "</td>";
                                                echo "<td class='left'>" . $quiz_cost . "</td>";
                                                $total += $cur_price;
                                                echo "</tr>";
                                                $count++;
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="about">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">

                                </table>
                            </div>
                            <div class="tab-pane" id="profile">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                    <thead>
                                        <tr>
                                            <!-- <th></th> -->
                                            <th> Rank</th>
                                            <th> Winnings</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="odd gradeX">

                                            <td class="left"></td>

                                            <td class="left"></td>




                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="contact">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                    <thead>
                                        <tr>
                                            <!-- <th></th> -->
                                            <th> Rank</th>
                                            <th> Winnings</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="odd gradeX">

                                            <td class="left"></td>

                                            <td class="left"></td>




                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
<!-- end page content -->

<?php require APPROOT . '/views/inc_student/footer.php'; ?>