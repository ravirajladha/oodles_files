<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<!--select2-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT ?>/assets/plugins/jquery-tags-input/jquery-tags-input.css" rel="stylesheet">
<link href="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT; ?>/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="<?php echo URLROOT; ?>/assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
<?php $studentMod = new Students; ?>
<?php $adminMod = new Admins; ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title"> Market Place Orders</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<!-- <li><a class="parent-item" href=""></a>&nbsp;<i class="fa fa-angle-right"></i></li> -->
					<li class="active"> Market Place Orders</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h1>MARKET PLACE ORDERS</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="owl-demo2" class="owl-carousel">
					<?php foreach ($data['get_all_market_place'] as $market_place) { ?>

						<div class="carousel-text">
							<div class="card" style="margin-left:10pxpx;">
								<div class="card-body text-center">
									<div class="item"><img src="<?php echo URLROOT; ?>/uploads/<?php echo  $market_place->image; ?>" alt="" style="width:100%;height:300px;"></div>
									<h5 class="card-title"><?php echo  $market_place->name; ?></h5>
									<h6 class="card-subtitle mb-0 text-muted">Offer Price: <?php echo  $market_place->offer_price; ?> coins</h6>
									<p class="card-text">Price: <s><?php echo  $market_place->price; ?> coins</s></p>
									<p class="card-text"><?php echo  $market_place->description; ?></p>
									<p class="card-text">Quantity: <?php echo  $market_place->quantity; ?></p>
									<?php if ($market_place->status == 0) { ?>
										<button class="btn btn-danger btn-outline btn-circle m-b-10" style="width:100%;">INACTIVE
										</button>
									<?php } else { ?>
										<button class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">ACTIVE
										</button>
									<?php } ?>

								</div>
							</div>
						</div>
						<!-- &nbsp; -->
					<?php } ?>

				</div>
			</div>
		</div>



		<div class="row">
			<div class="col-md-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Market Place Orders</header>
						<button id="sdntmenu" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="sdntmenu">
							<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
								here</li>
						</ul>
					</div>
					<div class="card-body ">
						<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
							<thead>
								<tr>
									<th class="center">Id</th>
									<th class="center"> Product Id </th>
									<th class="center"> Product Name </th>
									<th class="center"> Student Id </th>
									<th class="center"> Student Name </th>
									<th class="center"> Coins </th>
									<th class="center"> Purchased At </th>

									<th class="center"> Status </th>
									<th class="center"> Action </th>
									<th class="center"> Submit </th>

								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['get_all_market_place_orders'] as $order) {
									$get_single_market_place = $adminMod->get_single_market_place($order->product_id);
									$user_detail = $adminMod->get_auth_detail($order->user_id);
									$get_market_place_order_log = $adminMod->get_market_place_order_log($order->id);
								?>
									<tr class="odd gradeX">
										<td class="center"><?php echo $order->id; ?></td>


										<td class="center"><?php echo $order->product_id; ?></td>
										<td class="center"><?php echo $get_single_market_place->name; ?></td>
										<td class="center"><?php echo $order->user_id; ?></td>
										<td class="center"><?php echo $user_detail->name; ?></td>
										<td class="center"><?php echo $get_single_market_place->offer_price; ?></td>
										<td class="center"><?php echo $order->created_at; ?></td>

										<td class="center">
											<?php if ($order->status == 0) { ?>
												<span class="label label-sm label-primary">Order Placed</span>
											<?php } elseif ($order->status == 1) { ?>
												<span class="label label-sm label-secondary">In Transit</span>

											<?php } elseif ($order->status == 2) { ?>
												<span class="label label-sm label-success">Delivered</span>

											<?php } elseif ($order->status == 3) { ?>
												<span class="label label-sm label-danger">Rejected</span>

											<?php } ?>
										</td>
										<form action="<?php echo URLROOT; ?>/admin/update_market_place_orders_status/<?php echo $order->id; ?>" method="POST">
											<td class="center">
												<select class="form-control" name="status">
													<option value="0" <?php if ($order->status == 0) {
																			echo "selected";
																		} ?>>Order Placed</option>
													<option value="1" <?php if ($order->status == 1) {
																			echo "selected";
																		} ?>>In Transit</option>
													<option value="2" <?php if ($order->status == 2) {
																			echo "selected";
																		} ?>>Delivered</option>
													<option value="3" <?php if ($order->status == 3) {
																			echo "selected";
																		} ?>>Rejected</option>
												</select>
											</td>
											<?php if ($order->status == 2 || $order->status == 3) { ?>
												<td class="center"><button type="submit" disabled><i class="fa fa-check"></i></button></td>
											<?php } else { ?>
												<td class="center"><button type="submit"><i class="fa fa-check"></i></button></td>

											<?php } ?>
										</form>
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>



<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<!--select2-->
<script src="<?php echo URLROOT ?>/assets/plugins/select2/js/select2.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/select2/select2-init.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/table/table_data.js"></script>

<script src="<?php echo URLROOT; ?>/assets/plugins/owl-carousel/owl.carousel.js"></script>
<script src="<?php echo URLROOT; ?>/assets/js/pages/owl-carousel/owl_data.js"></script>