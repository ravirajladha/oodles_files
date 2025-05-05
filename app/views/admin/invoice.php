<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
					<!-- start page content -->
					<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Student Invoice</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								<li><a class="parent-item" href="">Fees</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Invoice</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="white-box">
								<h3><b>INVOICE</b> <span class="pull-right">#345766</span></h3>
								<hr>
								<div class="row">
									<div class="col-md-12">
										<div class="pull-left">
											<address>
												<img src="../assets/img/invoice_logo.png" alt="logo"
													class="logo-default" />
												<p class="text-muted m-l-5">
													Aditya University, <br> Opp. Town Hall, <br>
													Sardar Patel Road, <br> Ahmedabad - 380015
												</p>
											</address>
										</div>
										<div class="pull-right text-right">
											<address>
												<p class="addr-font-h3">To,</p>
												<p class="font-bold addr-font-h4">Jayesh Patel</p>
												<p class="text-muted m-l-30">
													207, Prem Sagar Appt., <br> Near Income Tax Office, <br>
													Ashram Road, <br> Ahmedabad - 380057
												</p>
												<p class="m-t-30">
													<b>Invoice Date :</b> <i class="fa fa-calendar"></i> 14th
													July 2017
												</p>
												<p>
													<b>Course :</b> Engineering
												</p>
											</address>
										</div>
									</div>
									<div class="col-md-12">
										<div class="table-responsive m-t-40">
											<table class="table table-hover">
												<thead>
													<tr>
														<th class="text-center">#</th>
														<th class="text-right">Fees Type</th>
														<th class="text-right">Frequency</th>
														<th class="text-right">Date</th>
														<th class="text-right">Invoice number</th>
														<th class="text-right">Amount</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-center">1</td>
														<td class="text-right">Annual Fees</td>
														<td class="text-right">Yearly</td>
														<td class="text-right">2016-11-19</td>
														<td class="text-right">#IN-345609865</td>
														<td class="text-right">$100</td>
													</tr>
													<tr>
														<td class="text-center">2</td>
														<td class="text-right">Tuition Fees</td>
														<td class="text-right">Monthly</td>
														<td class="text-right">2016-11-19</td>
														<td class="text-right">#IN-345604565</td>
														<td class="text-right">$50</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="col-md-12">
										<div class="pull-right m-t-30 text-right">
											<p>Sub - Total amount: $150</p>
											<p>Discount : $10 </p>
											<p>Tax (10%) : $14 </p>
											<hr>
											<h3><b>Total :</b> $164</h3>
										</div>
										<div class="clearfix"></div>
										<hr>
										<div class="text-right">
											<button class="btn btn-danger" type="submit"> Proceed to payment </button>
											<button onclick="javascript:window.print();"
												class="btn btn-default btn-outline" type="button"> <span><i
														class="fa fa-print"></i> Print</span> </button>
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
