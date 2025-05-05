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
					<div class="page-title active">Student Wallet</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Wallet</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Student Wallet</li>
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
							<!-- <li class="nav-item"><a href="#about" data-bs-toggle="tab" >Wallet Control</a>
							</li> -->
							<li class="nav-item"><a href="#wallet" data-bs-toggle="tab">Student Wallet</a>
							</li>

						</ul>
					</header>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane active" id="wallet">
								<div class="table-scrollable">

									<div class="card-body " id="bar-parent">
										<table id="exportTable" class="display nowrap" style="width:100%">
											<thead>
												<tr>
													<th> Sl. No.</th>
													<th> Wallet Id</th>
													<th> User ID </th>
													<th> Type</th>
													<th>Name</th>
													<th> Balance Amount </th>
													<th> Awarded Amount </th>
													<th> Withdrawable Amount </th>
													<th> Point </th>
													<th> Bonus Coins </th>
												</tr>
											</thead>
											<tbody>
												<?php $count = 0;
												foreach ($data['get_all_wallet'] as $wallet_detail) { 
													$count++;
													?>

													<tr class="odd gradeX">


														<td class="left"><?php echo $count; ?></td>
														<td class="left"><?php echo $wallet_detail->wallet_id ?></td>

													<?php	if (isset($get_user_detail->type)) {
																				if($get_user_detail->type=="student"){ ?>
														<td class="left">
															<a href="<?php echo URLROOT; ?>/admins/student/<?php echo $wallet_detail->user_id ?>" target="_blank" ><?php echo $wallet_detail->user_id; ?></a></td>
																				<?php }else{ ?>
																					<td class="left">
																				<?php echo $wallet_detail->user_id ?></td>
																			<?php	}
																				 ?>
																			<?php }else{ ?>
																				<td class="left">	<?php echo $wallet_detail->user_id ?></td>
																				<?php } ?>
														<?php $get_user_detail = $adminMod->get_auth_detail($wallet_detail->user_id); ?>
														<td class="left"><?php
																			if (isset($get_user_detail->type)) {
																				echo ucwords($get_user_detail->type);
																			} else {
																				echo "N/a";
																			} ?></td>
														<td class="left"><?php
																			if (isset($get_user_detail->name)) {
																				echo ucwords($get_user_detail->name);
																			} else {
																				echo 	"N/a";
																			}
																			?></td>

														<td class="left"><?php echo $wallet_detail->balance_amount ?></td>
														<td class="left"><?php echo $wallet_detail->awarded_amount ?></td>
														<td class="left"><?php echo ($wallet_detail->awarded_amount +$wallet_detail->balance_amount);?></td>
														
														<td class="left"><?php echo $wallet_detail->point ?></td>
														<td class="left"><?php echo $wallet_detail->bonus_coins ?></td>




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