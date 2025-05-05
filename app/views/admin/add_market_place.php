<?php require APPROOT . '/views/inc_admin/header.php'; ?>

  <!--select2-->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT ?>/assets/plugins/jquery-tags-input/jquery-tags-input.css" rel="stylesheet"> -->



<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Market Place</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<!-- <li><a class="parent-item" href=""></a>&nbsp;<i class="fa fa-angle-right"></i></li> -->
					<li class="active">Add Market Place</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class=" col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Create Market Place </header>
						<!-- <button id="panel-button3" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button3">
							<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
								here</li>
						</ul> -->
					</div>

					<form method="post" action="<?php echo URLROOT; ?>/admin/create_market_place" enctype="multipart/form-data" autocomplete="OFF">

							<div class="card-body row">
								<!-- BANK DETAILS -->

								<div class="col-md-4 col-sm-4">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Name</label>
										<input type="text" id="name" name="name" class="form-control mdl-textfield__input" placeholder="Enter Name" required>

									</div>
								</div>
								
								<div class="col-md-4 col-sm-4">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Offer Price (in coins, original)</label>
										<input type="number" id="offer_price" name="offer_price" class="form-control mdl-textfield__input" placeholder="Enter Offer Price" required>
									</div>
								</div>
								<div class="col-md-4 col-sm-4">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Price (in coins)</label>
										<input type="number" id="price" name="price" class="form-control mdl-textfield__input" placeholder="Enter Price" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Quantity </label>
										<input type="number" id="price" name="quantity" class="form-control mdl-textfield__input" placeholder="Enter Quantity" required>
									</div>
								</div>
							
								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Choose  Photo<span>*</span></label><br>
										<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="image" required>

									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Add Description</label>
										<textarea  name="description"  id="oodles_editor1" class="form-control mdl-textfield__input" placeholder="Enter Content for Description" required></textarea>
									</div>
								</div>
								

								
							</div>
						</div>
			</div>



			<div class="row">
				<!-- <div class="col-lg-6 col-lg-6">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/student" role="button">Skip All</a>
					</div> -->

				<div class="col-lg-6 col-lg-6">
					<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Save</button>
				</div>

				</form>
			</div>
			<div class="white-box">

			<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
		<tr>
			<th>Sl No</th>
			<th>Image</th>
			<th>Name</th>
			<th>Offer Price</th>
			<th>Price</th>
			
			<th>Quantity</th>
			<th>Description</th>
			
			<th>Action</th>
			<th>Update</th>
		</tr>
		<?php $count = 0;
		foreach($data['get_all_market_place'] as $market_place){
			$count++;
			 ?>

		<tr>
			<td><?php echo $count; ?></td>
			<td class="patient-img">
																<img src="<?php echo URLROOT?>/uploads/<?php echo $market_place->image?>" alt="">

																		</td>
			<td><?php echo $market_place->name; ?></td>
			<td><?php echo $market_place->offer_price; ?></td>
			<td><?php echo $market_place->price; ?></td>
			<td><?php echo $market_place->quantity; ?></td>
			<td><?php echo $market_place->description; ?></td>
			<td class="left">
																<?php if($market_place->status==0){ ?>
															<a href="<?php echo URLROOT ?>/admin/update_market_place_status/<?php echo $market_place->id;?>/1"><button class="btn btn-primary">Approve</button></a>
														<?php }else{ ?>
															<a href="<?php echo URLROOT ?>/admin/update_market_place_status/<?php echo $market_place->id;?>/0"><button class="btn btn-warning">Disapprove</button></a>
														<?php } ?>
														</td>
			<td class="left">
			<a href="<?php echo URLROOT ?>/admin/edit_market_place/<?php echo $market_place->id;?>"><i class="fa fa-pencil fa-fw"></i>
														</td>
		</tr>
		<?php } ?>
		</table>
		</div>
			</div>
	</div>
</div>
</div>

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


<script>
	CKEDITOR.replace('oodles_editor1', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>





    <!-- <script src="<?php echo URLROOT?>/assets/plugins/select2/js/select2.js"></script>
    <script src="<?php echo URLROOT?>/assets/js/pages/select2/select2-init.js"></script> -->