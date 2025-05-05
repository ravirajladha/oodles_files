<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>
<link href="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

<style>
	.table-wrapper {
		overflow-x: visible;
		overflow-y: visible;
	}
	@media(max-width:640px) {
		.visible {
			display: block !important;
			width: 95% !important;
		}

		.circle label {
			font-weight: 700 !important;
			line-height: 4 !important;
		}

		.menunav {

			display: block !important;
			left: 0% !important;

		}

		.unsel img {
			width: 150px;
		}

		h1 {
			font-size: 20px !important;
		}
		.fullscreen-btn{
			display: none !important;
		}
		
		.page-header-inner {
			display: flex !important;
			justify-content: space-between !important;
		}
		.page-header.navbar .top-menu .navbar-nav > li.dropdown-notification .dropdown-menu {
    margin-right: -48px;
}
.page-header.navbar .top-menu .navbar-nav > li.dropdown-notification .dropdown-menu:after, .page-header.navbar .top-menu .navbar-nav > li.dropdown-notification .dropdown-menu:before {
    margin-right: 58px;
}
.page-header.navbar .page-logo {
    width: auto;
}
.visible {
    width: auto;
}
.container{
	padding-left: 0;
	padding-right: 0;
}
div.bhoechie-tab-container {
	margin-left: 0 !important;
	padding-left: 0; 	
}
.row>*{
	padding-right:0;
}
	}
	.info-box {
		width: 92%;
	}
	.card-body {
		/* padding:0; */
	}
	div.bhoechie-tab-content {
    
    padding-left: 0 !important;
    
}
</style>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Wallet</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<!-- <header>Basic Information</header> -->
						<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">

						</button>



						<style>
							/*  bhoechie tab */
							div.bhoechie-tab-container {
								z-index: 10;
								background-color: #ffffff;
								padding: 0 !important;
								border-radius: 4px;
								-moz-border-radius: 4px;
								border: 1px solid #ddd;
								margin-top: 20px;
								margin-left: 50px;
								-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
								box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
								-moz-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
								background-clip: padding-box;
								opacity: 0.97;
								filter: alpha(opacity=97);
							}

							div.bhoechie-tab-menu {
								padding-right: 0;
								padding-left: 0;
								padding-bottom: 0;
							}

							div.bhoechie-tab-menu div.list-group {
								margin-bottom: 0;
							}

							div.bhoechie-tab-menu div.list-group>a {
								margin-bottom: 0;
							}

							div.bhoechie-tab-menu div.list-group>a .glyphicon,
							div.bhoechie-tab-menu div.list-group>a .fa {
								color: #5A55A3;
							}

							div.bhoechie-tab-menu div.list-group>a:first-child {
								border-top-right-radius: 0;
								-moz-border-top-right-radius: 0;
							}

							div.bhoechie-tab-menu div.list-group>a:last-child {
								border-bottom-right-radius: 0;
								-moz-border-bottom-right-radius: 0;
							}

							div.bhoechie-tab-menu div.list-group>a.active,
							div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
							div.bhoechie-tab-menu div.list-group>a.active .fa {
								background-color: #5A55A3;
								background-image: #5A55A3;
								color: #ffffff;
							}

							div.bhoechie-tab-menu div.list-group>a.active:after {
								content: '';
								position: absolute;
								left: 100%;
								top: 50%;
								margin-top: -13px;
								border-left: 0;
								border-bottom: 13px solid transparent;
								border-top: 13px solid transparent;
								border-left: 10px solid #5A55A3;
							}

							div.bhoechie-tab-content {
								background-color: #ffffff;
								/* border: 1px solid #eeeeee; */
								padding-left: 20px;
								padding-top: 10px;
							}

							div.bhoechie-tab div.bhoechie-tab-content:not(.active) {
								display: none;
							}
						</style>
						<style>
							.glow {
								font-size: 90px;
								color: #1158AC;
								text-align: center;
								font-weight: 100px;
								-webkit-animation: glow 1s ease-in-out infinite alternate;
								-moz-animation: glow 1s ease-in-out infinite alternate;
								animation: glow 1s ease-in-out infinite alternate;
							}

							@keyframes glow {
								from {
									text-shadow: 0 0 10px #eeeeee, 0 0 20px #1AC4FA, 0 0 30px #1AC4FA, 0 0 40px #1AC4FA,
										0 0 50px #9554b3, 0 0 60px #9554b3, 0 0 70px #9554b3;
								}

								to {
									text-shadow: 0 0 20px #eeeeee, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6,
										0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
								}
							}
						</style>
						<?php $get_wallet_detail = $data['get_wallet_detail']; ?>
						<div class="container">
							<div class="row">
								<div class="row col-lg-11 col-md-11 col-sm-11 col-xs-11 bhoechie-tab-container">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
										<div class="list-group">
											<a href="#" class="list-group-item active text-center" style="font-size:12px;">
												<i class="fa-solid fa-indian-rupee-sign"></i><br />Wallet
											</a>
											<a href="#" class="list-group-item text-center" style="font-size:12px;">
												<i class="fa-solid fa-bolt"></i><br />Recharge
											</a>
											<a href="#" class="list-group-item text-center" style="font-size:12px;">
												<i class="fa-solid fa-magnifying-glass-dollar"></i><br />Transactions
											</a>
											<a href="#" class="list-group-item text-center" style="font-size:12px;">
												<i class="material-icons f-left">person_add</i><br />Referrals
											</a>
											<a href="#" class="list-group-item text-center" style="font-size:12px;">
												<i class="fa-sharp fa-solid fa-circle-info"></i><br />Info
											</a>
										</div>
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
										<!-- flight section -->
										<div class="bhoechie-tab-content active">
											<div class="state-overview"><br>
												<div class="row">
													<div class="col-xl-6 col-md-6 col-12">
														<div class="info-box bg-blue">
															<span class="info-box-icon push-bottom"><i class="fa fa-inr"></i></span>
															<div class="info-box-content">
																<span class="info-box-text">Balance</span>
																<?php $balance = $get_wallet_detail->balance_amount; ?>
																<span class="info-box-number"><?php echo $balance; ?></span>

															</div>
															<!-- /.info-box-content -->
														</div>
														<!-- /.info-box -->
													</div>
													<!-- /.col -->
													<div class="col-xl-6 col-md-6 col-12">
														<div class="info-box bg-orange">
															<span class="info-box-icon push-bottom"><i class="fa fa-inr"></i></span>
															<div class="info-box-content">
																<span class="info-box-text">Awarded</span>
																<span class="info-box-number">
																	<?php
																	// $total_awarded_amount = 0;
																	// foreach($data['get_awarded_transaction'] as $awarded_transaction){
																	// 	$total_awarded_amount+= $awarded_transaction->amount;
																	// }
																	// echo $total_awarded_amount;
																	echo $total_awarded_amount = $get_wallet_detail->awarded_amount; ?>

																</span>

															</div>
															<!-- /.info-box-content -->
														</div>
														<!-- /.info-box -->
													</div>
													<!-- /.col -->
													<div class="col-xl-6 col-md-6 col-12">
														<div class="info-box bg-orange">
															<span class="info-box-icon push-bottom"><i class="fa fa-inr"></i></span>
															<div class="info-box-content">
																<span class="info-box-text">Withdrawal Amount</span>
																<span class="info-box-number">
																	<?php

																	echo $total_awarded_amount + $balance;
																	?>
																</span>

															</div>
															<!-- /.info-box-content -->
														</div>
														<!-- /.info-box -->
													</div>
													<!-- /.col -->
													<div class="col-xl-6 col-md-6 col-12">
														<div class="info-box bg-success">
															<span class="info-box-icon push-bottom"><i class="fa fa-coins"></i></span>
															<div class="info-box-content">
																<!-- <span class="info-box-text">Spent</span> -->
																<span class="info-box-text">Points Earned</span>
																<span class="info-box-number">
																	<?php
																	// $total_spent_amount = 0;
																	// foreach($data['get_spent_transaction'] as $spent_transaction){
																	// 	$total_spent_amount+= $spent_transaction->amount;
																	// }
																	// echo $total_spent_amount;
																	echo $get_wallet_detail->point;
																	?>
																</span>
																&ensp;
																<!-- <form action="<?php echo URLROOT ?>/student/redeem_coins_earned" method="POST" style="display:inline-block;">
										<?php if (($get_wallet_detail->point) > 1000) { ?>
											<span>
										<button type="submit" class="form-control sucess">Redeem</button>
										</span>
										<?php } ?>
										</form> -->
															</div>
															<!-- /.info-box-content -->
														</div>
														<!-- /.info-box -->
													</div>
													<div class="col-xl-6 col-md-6 col-12">
														<div class="info-box bg-success">
															<span class="info-box-icon push-bottom"><i class="fa fa-coins"></i></span>
															<div class="info-box-content">
																<!-- <span class="info-box-text">Spent</span> -->
																<span class="info-box-text">Coins Earned</span>
																<span class="info-box-number">
																	<?php
																	// $total_spent_amount = 0;
																	// foreach($data['get_spent_transaction'] as $spent_transaction){
																	// 	$total_spent_amount+= $spent_transaction->amount;
																	// }
																	// echo $total_spent_amount;
																	echo $get_wallet_detail->coins;
																	?>
																</span>
																&ensp;
																<form action="<?php echo URLROOT ?>/student/redeem_coins_earned" method="POST" style="display:inline-block;">
																	<?php if (($get_wallet_detail->coins) > 1000) { ?>
																		<span>
																			<button type="submit" class="form-control sucess">Redeem</button>
																		</span>
																	<?php } ?>
																</form>
															</div>
															<!-- /.info-box-content -->
														</div>
														<!-- /.info-box -->
													</div>
													<!-- /.col -->
													<div class="col-xl-6 col-md-6 col-12">
														<div class="info-box bg-success">
															<span class="info-box-icon push-bottom"><i class="fa fa-coins"></i></span>
															<div class="info-box-content">
																<!-- <span class="info-box-text"> Recharged</span> -->
																<span class="info-box-text"> Bonus Coins</span>
																<span class="info-box-number">
																	<?php
																	echo $get_wallet_detail->bonus_coins;
																	?>
																</span>

															</div>
															<!-- /.info-box-content -->
														</div>
														<!-- /.info-box -->
													</div>
													<!-- /.col -->
													<div class="col-xl-6 col-md-6 col-12">
														<div class="info-box bg-purple">
															<span class="info-box-icon push-bottom"><i class="fa fa-inr"></i></span>
															<div class="info-box-content">
																<!-- <span class="info-box-text"> Recharged</span> -->
																<span class="info-box-text"> Transferred to Bank A/c</span>
																<span class="info-box-number">
																	<?php
																	echo "0";
																	?>
																</span>

															</div>
															<!-- /.info-box-content -->
														</div>
														<!-- /.info-box -->
													</div>
													<!-- /.col -->
												</div>
											</div>
										</div>
										<!-- train section -->
										<div class="bhoechie-tab-content">
											<div class="col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="white-box border-gray">
													<div class="user-bg">
														<div class="overlay-box">
															<form method="post" action="<?php echo URLROOT; ?>/student/pay" enctype="multipart/form-data" autocomplete="OFF">
																<div class="user-content">
																	<a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="<?php echo URLROOT; ?>/assets/images/payments/coin.webp"></a>
																	<div class="input-group input-group-sm">
																		<br><br><br><br><br>
																		<input style="margin-top:80px" type="number" class="form-control" name="amount" placeholder="Enter Amount">
																		<span style="margin-top:80px" class="input-group-btn">
																			<button type="submit" class="btn btn-success btn-flat">Go!</button>
																		</span>
																	</div>
																</div>
															</form>
														</div>
													</div>

												</div>
											</div>

										</div>

										<!-- hotel search -->
										<div class="bhoechie-tab-content">
											<div>
												<div>
													<div>
														<div class="card-head">
															<header>Transactions</header>

														</div>
														<div class="card-body ">
															<div class="table-wrap ">
																<div class="table-responsive scrollable">
																<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
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
																			<?php foreach ($data['get_transaction'] as $transaction) { ?>
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
																							<a href="<?php echo URLROOT; ?>/student/contest_winning_amount_transactions"><?php 	echo $transaction->transaction_id; ?></a>

																				<?php 		}
																				elseif ($transaction->type == 17) {
																					echo $transaction->transaction_id;
																				}
																				elseif ($transaction->type == 18) {
																					echo  $transaction->transaction_id;
																				}
																				elseif ($transaction->type == 19) {
																					echo  $transaction->transaction_id;
																				}
																						?>
																					</td>
																					<td><?php echo $transaction->amount ?></td>
																					<td><?php echo $transaction->awarded_amount ?></td>
																					<td><?php echo $transaction->point ?></td>
																					<td><?php echo $transaction->coins ?></td>
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
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="bhoechie-tab-content">
											<div>
												<div>
													<div class="card-head">
														<header></header>


													</div>
													<div class="card-body ">
														<div class="row">
															<div class="col-xl-12 col-md-12 col-12">
																<div class="info-box bg-success">
																	<span class="info-box-icon push-bottom"><i class="fa fa-user"></i></span>
																	<div class="info-box-content">
																		<span class="info-box-text"> Referral ID</span>
																		<span class="info-box-number" style="font-size:60px;">
																			<?php echo strtoupper(substr($_SESSION['rexkod_oodles_student_name'], 0, 3)) ?><?php echo $_SESSION['rexkod_oodles_student_id'] ?>
																		</span>

																	</div>
																	<!-- /.info-box-content -->
																</div>
																<form action="<?php echo URLROOT ?>/student/redeem_referral_code/wallet" method="POST">
																	<div class="info-box bg-danger" style="background-image: url('<?php echo URLROOT ?>/assets/img/pages/referral.jpg');height:250px;">
																		<span class="info-box-icon push-bottom"><i class="fa fa-user"></i></span>
																		<?php if (($data['get_auth_detail']->referred_by) == 0) { ?>
																			<div class="info-box-content">
																				<span class="info-box-text"> Referral ID</span>
																				<span class="info-box-number" style="font-size:60px;opacity:0.7">
																					<input class="form-control" type="text" name="referral_code">
																				</span>
																				<button type="submit" class="btn btn-round btn-primary" id="add-event">Verify</button>
																			</div>
																		<?php } else { ?>
																			<h3 class="glow"> You have already redemmed the referral code once! <br /> Refer your friends to earn free coins</h4>
																			<?php  } ?>
																	</div>
																</form>
																<!-- /.info-box -->
															</div>
															<!-- <ul class="docListWindow" style="height:300px">
											<li>
												<div class="prog-avatar">
													<img src="../assets/img/user/user1.jpg" alt="" width="40"
														height="40">
												</div>
												<div class="details">
													<div class="title">
														<a href="#">Name</a> School
													</div>
													<div>
														<span class="clsAvailable">Success</span>
													</div>
												</div>
											</li>
											<li>
												<div class="prog-avatar">
													<img src="../assets/img/user/user2.jpg" alt="" width="40"
														height="40">
												</div>
												<div class="details">
													<div class="title">
														<a href="#">Name</a> School
													</div>
													<div>
														<span class="clsAvailable">Success</span>
													</div>
												</div>
											</li>
										
											<li>
												<div class="prog-avatar">
													<img src="../assets/img/user/user4.jpg" alt="" width="40"
														height="40">
												</div>
												<div class="details">
													<div class="title">
														<a href="#">Name</a> School
													</div>
													<div>
														<span class="clsOnLeave">Failed</span>
													</div>
												</div>
											</li>
										</ul> -->

														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="bhoechie-tab-content">
											<div>
												<div>
													<div class="card-head">
														<header>Documents</header>
													</div>
													<div class="card-body no-padding height-9">
														<div class="row">
															<div class="noti-information notification-menu">
																<div class="notification-list mail-list not-list small-slimscroll-style">
																	<a href="javascript:;" class="single-mail"> <span class="icon bg-primary"> <i class="fa fa-box"></i>
																		</span> <span class="text-purple">Document Name</span> Document Type

																	</a>

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
						</div>
						<br><br>
						<script>
							$(document).ready(function() {
								$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
									e.preventDefault();
									$(this).siblings('a.active').removeClass("active");
									$(this).addClass("active");
									var index = $(this).index();
									$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
									$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
								});
							});
						</script>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_student/footer.php'; ?>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/table/table_data.js"></script>