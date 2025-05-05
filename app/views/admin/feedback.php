<?php require APPROOT . '/views/inc_admin/header.php';
$pageMod = New Page; ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
        <div class="row">
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
						<div class="card bg-primary">
							<div class="card-body">
                            <div class="media align-items-center">
                                <p class="fs-18 text-white mb-2">New Tickets</p>
									<div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">0%</p>
										<span class="fs-48 text-white font-w600">0</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
						<div class="card bg-info overflow-hidden">
							<div class="card-body">
                            <div class="media align-items-center">
                                <p class="fs-18 text-white mb-2">Solved Tickets</p>
									<div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">0%</p>
										<span class="fs-48 text-white font-w600">0</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
						<div class="card bg-success">
							<div class="card-body">
                            <div class="media align-items-center">
                                <p class="fs-18 text-white mb-2">Open Tickets</p>
									<div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">0%</p>
										<span class="fs-48 text-white font-w600">0</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card bg-secondary">
							<div class="card-body">
								<div class="media align-items-center">
                                <p class="fs-18 text-white mb-2">Pending Tickets</p>
									<div class="media-body text-end feature-icon-text">
                                        <p class="fs-18 text-white mb-2">0%</p>
										<span class="fs-48 text-white font-w600">0</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
           
      
        </div>

        <!-- row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h4 class="card-title">Responsive Table</h4> -->
                    </div>
                    <div class="card-body" style=" white-space:nowrap">
                        <div class="table-responsive">
                            <!-- <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                    <th>Ticket Id</th>
											<th>Type</th>
											<th>Reason</th>
											<th>Customer</th>
											<th>Dealer</th>
											<th>Product</th>
											<th>Technician</th>
											<th>Priority</th>
											<th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody> -->
							<table class="table header-border table-responsive-sm" >
                                <thead >
                                    <tr>
                                    <th>Id</th>
                                    <th>Type</th>
											<th>Name</th>
											<th>Phone</th>
											<th>Message</th>
											<th>Created At</th>
                                    </tr>
                                </thead>

								<?php foreach($data['get_all_feedback'] as $feedback):  ?>
                          <tr>
                            <td><?php echo $feedback->id;?></td>
                            <?php 
$pageMod = New Page;
$get_auth_detail = $pageMod->get_auth_detail($feedback->created_by);
                            ?>
                            <td><?php echo strtoupper($get_auth_detail->type)?></td>
                            <td><?php echo strtoupper($get_auth_detail->name)?></td>
                            <td><?php echo strtoupper($get_auth_detail->phone)?></td>
                            <td><?php echo ucwords($feedback->message)?></td>
                            <td><?php echo $feedback->created_at?></td>
                    
							
                          </tr>
						  <?php endforeach; ?>

                       
                                
                                          
                                      
											


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        		
    </div>
</div>


<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
