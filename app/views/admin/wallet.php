<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<?php
$adminMod = new Admins;

?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title active">Wallet</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Wallet</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Wallet</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="panel tab-border card-box">
					<header class="panel-heading panel-heading-gray custom-tab ">
						<ul class="nav nav-tabs">
							<!-- <li class="nav-item"><a href="#home" data-bs-toggle="tab" class="active">Transactions</a>
							</li> -->
							<li class="nav-item"><a href="#about" data-bs-toggle="tab" >Wallet Control</a>
							</li>
							<!-- <li class="nav-item"><a href="#wallet" data-bs-toggle="tab" >Wallet</a>
							</li> -->

						</ul>
					</header>
					<div class="panel-body">
						<div class="tab-content">
							<!-- <div class="tab-pane active" id="home">
							<div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
									<thead>
										<tr>
											
											<th> Id</th>
											<th> User ID </th>
											<th> User Type </th>
											<th> Phone </th>
											<th> Email </th>
											<th> Transaction ID </th>
											<th> Balance Amount</th>
											<th> Awarded Amount</th>
											<th> Point</th>
											<th> Bonus Coins</th>
											<th> Type</th>
											<th> Quiz Id</th>
											<th> Date</th>
											<th> Time</th>

										</tr>
									</thead>

									<tbody>
										<?php foreach ($data['get_wallet_data'] as $wallet) { ?>

											<tr class="odd gradeX">


												<td class="left"><?php echo $wallet->id ?></td>
												<td class="left"><?php echo $wallet->user_id ?></td>
												<?php $get_user_detail = $adminMod->get_auth_detail($wallet->user_id); ?>

												<td class="left"><?php echo ucwords($get_user_detail->type) ?></td>
												<td class="left"><?php echo $get_user_detail->phone ?></td>
												<td class="left"><?php echo $get_user_detail->email ?></td>
												<td>
														<?php if($wallet->type==1){
															echo "Credited By Recharge";
														}elseif($wallet->type==2){
															echo "Credited By Admin";
														}elseif($wallet->type==3){
															echo "Credited By Referral";
														}elseif($wallet->type==4){
															echo "Credited By Quiz";
														}elseif($wallet->type==5){
															echo "Debited By Quiz";
														}elseif($wallet->type==6){
															echo "Credited By Admin";
														}elseif($wallet->type==7){
															echo "Debited In Quiz By School";
														}elseif($wallet->type==8){
															echo "Credited on Bonus Coins on First Recharge";
														}elseif($wallet->type==9){
															echo "Credited By Redeeming Coins";
														}elseif($wallet->type==10){
															echo "Points Credited By Quiz";
														}elseif($wallet->type==11){
															echo "Awarded amount Credited on Redeeminc Coins";
														}elseif($wallet->type==12){
															echo "Points Debited on Redeeming";
														}elseif($wallet->type==13){
															echo "Bonus Coins Credited On Referring";
														}elseif($wallet->type==14){
															echo "Bonus Coins Credited on Using Referral Code";
														}
														?>
														</td>

												<td class="left"><?php echo $wallet->amount ?></td>
												<td class="left"><?php echo $wallet->awarded_amount ?></td>
												<td class="left"><?php echo $wallet->point ?></td>
												<td class="left"><?php echo $wallet->bonus_coins ?></td>
												<td class="left"><?php echo round($wallet->type) ?></td>
												<td class="left"><?php if (!empty($wallet->quiz_id)) {
																		echo $wallet->quiz_id;
																	} else {
																		echo "N/A";
																	} ?></td>

												<td class="left"><?php echo date('Y-m-d', strtotime($wallet->datetime)) ?></td>

												<td class="left"><?php echo date('h:i a', strtotime($wallet->datetime)) ?></td>
											</tr>
										<?php } ?>

									</tbody>
								</table>
							</div>
							</div> -->
							<div class="tab-pane active" id="about">
								<form action="<?php echo URLROOT ?>/admin/add_money_to_student_from_admin" method="POST">
									<div class="form-group row">
										<label class="col-sm-3 control-label">Add Money</label>
										<div class="col-sm-3">
											<select class="form-control" name="student_id" required>
												<option>-Select Student-</option>
												<?php foreach ($data['get_all_students'] as $student) { ?>

													<option value="<?php echo $student->id; ?>"> <?php echo $student->name; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-sm-3">
											<input type="number" name="money" class="form-control" placeholder="Enter Money to be added" required>
										</div>
										<div class="col-sm-3">
											<button class="btn blue-bgcolor" type="submit"> Submit </button>
										</div>
									</div>
												</form>
												<hr style="height:4px;">
								<form action="<?php echo URLROOT ?>/admin/add_bonus_coins_to_student_from_admin" method="POST">
									<div class="form-group row">
										<label class="col-sm-3 control-label">Add Bonus Coins</label>
										<div class="col-sm-3">
											<select class="form-control" name="student_id" required>
												<option>-Select Student-</option>
												<?php foreach ($data['get_all_students'] as $student) { ?>

													<option value="<?php echo $student->id; ?>"> <?php echo $student->name; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-sm-3">
											<input type="number" name="bonus_coins" class="form-control" placeholder="Enter Bonus Coins to be added" required>
										</div>
										<div class="col-sm-3">
											<button class="btn blue-bgcolor" type="submit"> Submit </button>
										</div>
									</div>
												</form>
									<hr style="height:4px;">
									<form action="<?php echo URLROOT ?>/admin/update_wallet_control" method="POST">
										<div class="form-group row">
											<label class="col-sm-3 control-label">Enter % to be reduced from Bonus Coins for participating in Quiz</label>

											<div class="col-sm-6">
												<input type="number" name="bonus_coin_reduction_per" class="form-control" placeholder="Enter % to be reduced from Bonus Coins for participating in Quiz" value=<?php echo $data['get_wallet_control']->bonus_coin_reduction_per ?> required>
											</div>
											
										</div>
										<div class="form-group row">
									<label class="col-sm-3 control-label">Joiner Referral Amount</label>

									<div class="col-sm-3">
										<input type="number" name="referral_joiner" class="form-control" placeholder="Enter Money for Joiner" value=<?php echo $data['get_wallet_control']->referral_joiner ?>  required>
									</div>
									<label class="col-sm-3 control-label">Joinee Referral Amount</label>
									<div class="col-sm-3">
										<input type="number" name="referral_joinee" class="form-control" placeholder="Enter Money for Joinee"  value=<?php echo $data['get_wallet_control']->referral_joinee ?> required>
									</div>
									
								</div>
								<div class="form-group row">
								<label class="col-sm-2 control-label">Enter number of coins for exchange</label>

								<div class="col-sm-3">
									<input type="number" name="points_reduction" class="form-control" placeholder="Enter points" value=<?php echo $data['get_wallet_control']->points_reduction ?>  required>
								</div>
								<label class="col-sm-2 control-label">Enter Money in Returns of Coins</label>
								<div class="col-sm-3">
									<input type="number" name="awarded_amount_addition" class="form-control" placeholder="Enter Money in return of Points" value=<?php echo $data['get_wallet_control']->awarded_amount_addition ?>  required>
								</div>
								<div class="col-sm-2">
									<button class="btn blue-bgcolor" type="submit"> Submit </button>
								</div>
							</div>
							</form>
							</div>
							<!-- <div class="tab-pane" id="wallet">
							<div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
									<thead>
										<tr>
											
											<th> Id</th>
											<th> User ID </th>
											<th> Type</th>
											<th>Name</th>
								
											<th> Balance Amount </th>
											<th> Awarded Amount </th>
											<th> Point </th>
											<th> Bonus Coins </th>
											

										</tr>
									</thead>

									<tbody>
										<?php foreach ($data['get_all_wallet'] as $wallet_detail) { ?>

											<tr class="odd gradeX">


												<td class="left"><?php echo $wallet_detail->wallet_id ?></td>
												<td class="left"><?php echo $wallet_detail->user_id ?></td>
												<?php $get_user_detail = $adminMod->get_auth_detail($wallet_detail->user_id); ?>
												<td class="left"><?php 
												if(isset($get_user_detail->type)){
												echo ucwords($get_user_detail->type);
												}else{
													echo "N/a";
												} ?></td>
												<td class="left"><?php 
													if(isset($get_user_detail->name)){
												echo ucwords($get_user_detail->name);
													}else{
													echo 	"N/a";
														}
															?></td>
										
												<td class="left"><?php echo $wallet_detail->balance_amount ?></td>
												<td class="left"><?php echo $wallet_detail->awarded_amount ?></td>
												<td class="left"><?php echo $wallet_detail->point ?></td>
												<td class="left"><?php echo $wallet_detail->bonus_coins ?></td>
											

												

											</tr>
										<?php } ?>

									</tbody>
								</table>
							</div>
				</div> -->
						
						

						</div>
				
					

					</div>
				
				</div>
				
				<div class="tab-pane" id="contact">

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