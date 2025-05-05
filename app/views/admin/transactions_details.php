<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<link href="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

<?php
$adminMod = new Admins;

?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title active">Transactions</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Transactions</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Transactions</li>
                </ol>
            </div>
        </div>



        <form action="<?php echo URLROOT; ?>/admin/transaction_filter" method="post">
        <div class="row">
            
            <div class="col-md-3">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>
            <div class="col-md-3">
               <label for="user_id">User ID:</label>
               <input type="text" name="user_id" id="user_id" class="form-control">
            </div>
            <div class="col-md-3">
               <label for="user_id">Quiz ID:</label>
               <input type="text" name="quiz_id" id="quiz_id" class="form-control">
            </div>
            <div class="col-md-3">
               <label for="user_id">Scholarship ID:</label>
               <input type="text" name="scholarship_id" id="scholarship_id" class="form-control">
            </div>
            <div class="col-md-3">
               <label for="user_id">Market Place ID:</label>
               <input type="text" name="market_place_id" id="market_place_id" class="form-control">
            </div>
            <!-- add other filter inputs here -->
            <div class="col-md-3">
                <br>
                <button type="submit" id="filter_btn" class="btn btn-primary" style="width:100%; ">Search</button>
            </div>
            
        </div>
        </form>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="panel tab-border card-box">
                    <header class="panel-heading panel-heading-gray custom-tab ">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="#home" data-bs-toggle="tab" class="active">Transactions</a>
                            </li>
                            <!-- <li class="nav-item"><a href="#about" data-bs-toggle="tab" >Wallet Control</a>
							</li> -->
                            <!-- <li class="nav-item"><a href="#wallet" data-bs-toggle="tab" >Wallet</a>
							</li> -->

                        </ul>
                    </header>


                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <div class="table-scrollable">
                                    <div class="card-body " id="bar-parent">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                            <thead>
                                                <tr>
                                                    <th> Student Id</th>
                                                    <th> User ID </th>
                                                    <th> Date</th>
                                                    <th> Time</th>
                                                    <th> Quiz Id</th>
                                                    <th> Scholarship Id</th>
                                                    <th> Market Place Id</th>
                                                    <th> Phone </th>

                                                    <th> Transaction ID </th>
                                                    <th> Balance Amount</th>
                                                    <th> Awarded Amount</th>
                                                    <th> Bonus Coins</th>


                                                    <th> Wallet Balance</th>
                                                    <th> Awarded Wallet Balance</th>
                                                    <th> Bonus Coins Balance</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data['get_wallet_data'] as $wallet) { ?>
                                                    <?php $get_user_detail = $adminMod->get_auth_detail($wallet->user_id); ?>
                                                    <tr class="odd gradeX">


                                                        <td class="left"><?php echo strtoupper($get_user_detail->type) . $wallet->id ?></td>

                                                        <td class="left"><?php echo intval($wallet->user_id) ?></td>
                                                        <td class="left"><?php echo date('d-m-Y', strtotime($wallet->datetime)) ?></td>

                                                        <td class="left"><?php echo date('h:i a', strtotime($wallet->datetime)) ?></td>
                                                        <td class="left"><?php if (!empty($wallet->quiz_id)) {
                                                                                echo $wallet->quiz_id;
                                                                            } else {
                                                                                echo "N/A";
                                                                            } ?></td>
                                                        <td class="left"><?php if (!empty($wallet->scholarship_id)) {
                                                                                echo $wallet->scholarship_id;
                                                                            } else {
                                                                                echo "N/A";
                                                                            } ?></td>
                                                        <td class="left"><?php if (!empty($wallet->market_place_id)) {
                                                                                echo $wallet->market_place_id;
                                                                            } else {
                                                                                echo "N/A";
                                                                            } ?></td>


                                                        <!-- <td class="left"><?php echo ucwords($get_user_detail->type) ?></td> -->
                                                        <td class="left"><?php echo $get_user_detail->phone ?></td>

                                                        <td>
                                                            <?php if ($wallet->type == 1) {
                                                                echo "Credited By Recharge";
                                                            } elseif ($wallet->type == 2) {
                                                                echo "Credited By Admin";
                                                            } elseif ($wallet->type == 3) {
                                                                echo "Credited By Referral";
                                                            } elseif ($wallet->type == 4) {
                                                                echo "Credited By Quiz";
                                                            } elseif ($wallet->type == 5) {
                                                                echo "Debited By Quiz";
                                                            } elseif ($wallet->type == 6) {
                                                                echo "Credited By Admin";
                                                            } elseif ($wallet->type == 7) {
                                                                echo "Debited In Quiz By School";
                                                            } elseif ($wallet->type == 8) {
                                                                echo "Credited on Bonus Coins on First Recharge";
                                                            } elseif ($wallet->type == 9) {
                                                                echo "Credited By Redeeming Coins";
                                                            } elseif ($wallet->type == 10) {
                                                                echo "Points Credited By Quiz";
                                                            } elseif ($wallet->type == 11) {
                                                                echo "Awarded amount Credited on Redeeminc Coins";
                                                            } elseif ($wallet->type == 12) {
                                                                echo "Points Debited on Redeeming";
                                                            } elseif ($wallet->type == 13) {
                                                                echo "Bonus Coins Credited On Referring";
                                                            } elseif ($wallet->type == 14) {
                                                                echo "Bonus Coins Credited on Using Referral Code";
                                                            } elseif ($wallet->type == 15) {
                                                                echo $wallet->transaction_id;
                                                            } elseif ($wallet->type == 16) { ?>
                                                                <a href="<?php echo URLROOT; ?>/student/contest_winning_amount_transactions"><?php echo $wallet->transaction_id; ?></a>
                                                            <?php         } elseif ($wallet->type == 17) {
                                                                echo $wallet->transaction_id;
                                                            } elseif ($wallet->type == 18) {
                                                                echo  $wallet->transaction_id;
                                                            } elseif ($wallet->type == 19) {
                                                                echo  $wallet->transaction_id;
                                                            } else {
                                                                echo  $wallet->transaction_id;
                                                            }

                                                            ?>
                                                        </td>

                                                        <td class="left"><?php echo $wallet->amount ?></td>
                                                        <td class="left"><?php echo $wallet->awarded_amount ?></td>
                                                        <td class="left"><?php echo $wallet->bonus_coins ?></td>


                                                        <td class="left">

                                                            <?php if (($wallet->wallet_balance == '') || ($wallet->wallet_balance == Null)) {
                                                                echo "--";
                                                            } else {
                                                                echo $wallet->wallet_balance;
                                                            }
                                                            ?>


                                                        </td>
                                                        <td class="left"><?php if (($wallet->awarded_wallet_balance == '') || ($wallet->awarded_wallet_balance == Null)) {
                                                                                echo "--";
                                                                            } else {
                                                                                echo $wallet->awarded_wallet_balance;
                                                                            }
                                                                            ?></td>
                                                        <td class="left"><?php if (($wallet->bonus_coins_balance == '') || ($wallet->bonus_coins_balance == Null)) {
                                                                                echo "--";
                                                                            } else {
                                                                                echo $wallet->bonus_coins_balance;
                                                                            }
                                                                            ?></td>


                                                    </tr>
                                                <?php } ?>

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
    </div>
</div>


<!-- end page content -->

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>

<script src="<?php echo URLROOT ?>/assets/plugins/dropzone/dropzone.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/dropzone/dropzone-call.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.flash.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/jszip.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/pdfmake.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/vfs_fonts.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.html5.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.print.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/table/table_data.js"></script>

<script>



</script>
<!-- <script>
    $(document).ready(function() {
        var table = $('#example4').DataTable();

        // add event listener for filter button
        $('#filter_btn').on('click', function() {
             var user_id = $('#user_id').val();
            // alert(user_id);

    
    
            
            var scholarship_id = $('#scholarship_id').val();
            var quiz_id = $('#quiz_id').val();
            // alert(quiz_id);
            var market_place_id = $('#market_place_id').val();
            var start_date = $('#start_date').val();
            var date_obj = new Date(start_date);
            var day = date_obj.getDate().toString().padStart(2, '0');
            var month = (date_obj.getMonth() + 1).toString().padStart(2, '0');
            var year = date_obj.getFullYear().toString();
            var formatted_start_date = day + '-' + month + '-' + year;
            var end_date = $('#end_date').val();
            var date_obj = new Date(end_date);
            var day = date_obj.getDate().toString().padStart(2, '0');
            var month = (date_obj.getMonth() + 1).toString().padStart(2, '0');
            var year = date_obj.getFullYear().toString();
            var formatted_end_date = day + '-' + month + '-' + year;
           
            // get other filter values here
  table.columns(1).search(user_id).draw();
            table.columns(2).search(formatted_start_date + '|' + formatted_end_date, true, false);
          
            table.columns(5).search(scholarship_id).draw();
            table.columns(4).search(quiz_id).draw();
            table.columns(6).search(market_place_id).draw();
            // set other column filters here
        });
    });
</script> -->