<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>

<?php
$adminMod = new Admins;
$transaction = $data['get_winning_amount_transactions'];


?>
<link href="<?php echo URLROOT ?>/assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
<link href="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Contest Amount Awarded</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/student/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/student/wallet">Wallet</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Contest Amount Awarded</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class=" col-sm-12">
				<div class="card">
					<div class="card-head">
						<header>Quiz</header>
					</div>
				
				</div>
			</div>
		</div>



		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Contest Amount Awarded Details</header>
					</div>
					<div class="card-body " id="bar-parent">
						<table id="exportTable" class="display nowrap" style="width:100%">
							<thead>
								<tr>
                                <th>Id</th>
																				<th>Type</th>
																				<th>Balance</th>
																				<th>Awarded Amount</th>
																				<th>Points</th>
																				<th>Coins</th>
																				<th>Date</th>
																				<th>Time</th>
																				<th>Status</th>
								




								</tr>
							</thead>
                            <tbody>
																			<?php foreach ($transaction as $transaction) { ?>
																				<tr>
																					<td><?php echo $transaction->id ?></td>
																					<td>
																						<?php if ($transaction->type == 1) {
																							echo "Credited By Recharge";
																						} elseif ($transaction->type == 2) {
																							echo "Credited By Admin";
																						} elseif ($transaction->type == 3) {
																							echo "Credited By Referral";
																						} elseif ($transaction->type == 4) {
																							echo "Credited By Quiz";
																						} elseif ($transaction->type == 5) {
																							echo "Debited By Quiz";
																						} elseif ($transaction->type == 6) {
																							echo "Credited By Admin";
																						} elseif ($transaction->type == 7) {
																							echo "Debited In Quiz By School";
																						} elseif ($transaction->type == 8) {
																							echo "Credited on Bonus Coins on First Recharge";
																						} elseif ($transaction->type == 9) {
																							echo "Credited By Redeeming Coins";
																						} elseif ($transaction->type == 10) {
																							echo "Points Credited By Quiz";
																						} elseif ($transaction->type == 11) {
																							echo "Awarded amount Credited on Redeeminc Coins";
																						} elseif ($transaction->type == 12) {
																							echo "Points Debited on Redeeming";
																						} elseif ($transaction->type == 13) {
																							echo "Bonus Coins Credited On Referring";
																						} elseif ($transaction->type == 14) {
																							echo "Bonus Coins Credited on Using Referral Code";
																						} elseif ($transaction->type == 15) {
																							echo $transaction->transaction_id;
																						} elseif ($transaction->type == 16) { ?>
																						<?php 	echo $transaction->transaction_id; ?>

																				<?php 		}
																						?>
																					</td>
																					<td><?php echo $transaction->amount ?></td>
																					<td><?php echo $transaction->awarded_amount ?></td>
																					<td><?php echo $transaction->point ?></td>
																					<td><?php echo $transaction->bonus_coins ?></td>
																					<!-- <td><?php echo $transaction->datetime ?></td> -->
																					<td>
																						<?php
																						$timestamp = $transaction->datetime;
																						$datetime = explode(" ", $timestamp);
																						$date = $datetime[0];
																						echo $newDate = date("d-m-Y", strtotime($date));
																						?>
																					</td>
																					<td><?php echo $time = $datetime[1]; ?></td>
																					<td>
																						<span class="label label-sm label-success">Success</span>
																					</td>

																				</tr>
																			<?php } ?>
																			<!-- <tr>
													<td>1</td>
														<td>xxxx</td>
														<td>xxxx</td>
														<td>xxxx</td>
														<td>
															<span class="label label-sm label-warning">Failed </span>
														</td>
														
													</tr> -->

																		</tbody>
							<!-- <tfoot>
														<tr>
															<th>Id</th>
															<th>Title</th>
															<th>File Present</th>
															<th>Created Date</th>
														</tr>
													</tfoot> -->
						</table>
					</div>
				</div>
			</div>
		</div>



	</div>
</div>
<!-- end page content -->

<?php require APPROOT . '/views/inc_student/footer.php'; ?>
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