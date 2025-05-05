<?php require APPROOT . '/views/inc_school/header.php'; ?> 
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
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										
									</button>
									


<style>
    
/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 20px;
  margin-left: 50px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #5A55A3;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #5A55A3;
  background-image: #5A55A3;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
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

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
</style>
<?php $get_wallet_detail = $data['get_wallet_detail']; ?>
<div class="container">
	<div class="row">
        <div class="row col-lg-11 col-md-11 col-sm-11 col-xs-11 bhoechie-tab-container">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
				<i class="fa-solid fa-indian-rupee-sign"></i><br/>Wallet
                </a>
                <a href="#" class="list-group-item text-center">
                <i class="fa-solid fa-bolt"></i><br/>Recharge
                </a>
                <a href="#" class="list-group-item text-center">
				<i class="fa-solid fa-magnifying-glass-dollar"></i><br/>Transactions
                </a>
                <a href="#" class="list-group-item text-center">
				<i class="material-icons f-left">person_add</i><br/>Purchase
                </a>
                <a href="#" class="list-group-item text-center">
                <i class="fa-sharp fa-solid fa-circle-info"></i><br/>Info
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
									<span class="info-box-icon push-bottom"><i class="fa fa-inr" ></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Balance</span>
										<span class="info-box-number"><?php echo $get_wallet_detail->balance_amount; ?></span>
										
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-6 col-md-6 col-12">
								<div class="info-box bg-orange">
								<span class="info-box-icon push-bottom"><i class="fa fa-inr" ></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Awarded</span>
										<span class="info-box-number">
											0
										</span>
										
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-6 col-md-6 col-12">
								<div class="info-box bg-purple">
								<span class="info-box-icon push-bottom"><i class="fa fa-inr" ></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Spent</span>
										<span class="info-box-number">
										<?php 
											$total_spent_amount = 0;
											foreach($data['get_spent_transaction'] as $spent_transaction){
												$total_spent_amount+= $spent_transaction->amount;
											}
											echo $total_spent_amount;
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
								<span class="info-box-icon push-bottom"><i class="fa fa-inr" ></i></span>
									<div class="info-box-content">
										<span class="info-box-text"> Recharged</span>
										<span class="info-box-number">
								 <?php 
											$total_recharged_amount = 0;
											foreach($data['get_recharged_transaction'] as $recharged_transaction){
												$total_recharged_amount+= $recharged_transaction->amount;
											}
											echo $total_recharged_amount;
											?>
										</span> 
										
									
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-6 col-md-6 col-12">
								<div class="info-box bg-black">
								<span class="info-box-icon push-bottom"><i class="fa fa-question" ></i></span>
									<div class="info-box-content">
										<span class="info-box-text"> Quiz Balance</span>
										<span class="info-box-number">
									 <?php 
											
										
											echo $get_wallet_detail->quiz_balance;
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
									<form method="post" action="<?php echo URLROOT; ?>/school/pay" enctype="multipart/form-data" autocomplete="OFF">
										<div class="user-content">
											<a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle"
													src="<?php echo URLROOT; ?>/assets/images/payments/coin.webp"></a>
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
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th>Id</th>
														<th>Type</th>
														<th>Coins</th>
														<th>Date</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($data['get_transaction'] as $transaction){?>
													<tr>
														<td><?php echo $transaction->id?></td>
														<td>

														<?php if($transaction->type==1){
															echo "Credited By Recharge";
														}elseif($transaction->type==2){
															echo "Credited By Admin";
														}elseif($transaction->type==3){
															echo "Credited By Referral";
														}elseif($transaction->type==4){
															echo "Credited By Quiz";
														}elseif($transaction->type==5){
															echo "Debited By Quiz";
														}elseif($transaction->type==6){
															echo "Credited By Admin";
														}elseif($transaction->type==7){
															echo "Debited By School";
														}elseif($transaction->type==8){
															echo "Debited By College";
														}?>
														</td>
														<td><?php echo $transaction->amount?></td>
														<td><?php echo $transaction->datetime?></td>
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
									<header>Do Purchase Here!</header>
									
									
								</div>
								<a href="<?php echo URLROOT?>/school/buy_quiz_for_school">
								<div class="card-body">
									<div class="row">
									<div class="col-xl-12 col-md-12 col-12">
								<div class="info-box bg-danger">
								<span class="info-box-icon push-bottom"><i class="fa fa-user" ></i></span>
									<div class="info-box-content">
										<span class="info-box-text"> CLICK TO BUY, 10 QUIZ</span>
										<span class="info-box-number" style="font-size:60px;">
										100 Coins
										</span>
									
									</div>
									<!-- /.info-box-content -->
								</div>
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
													</a>
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
												<a href="javascript:;" class="single-mail"> <span
														class="icon bg-primary"> <i class="fa fa-box"></i>
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
			<?php require APPROOT . '/views/inc_school/footer.php'; ?>