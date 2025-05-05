<?php require APPROOT . '/views/inc_admin/header.php'; ?>


        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Customers
                                </h3>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card">

                
                                
                

                    <div class="card-header">
                    <div class="btn-poup pull-right">
                                    <a href='<?php echo URLROOT;?>/admin/customers_cod'><button type="button" class="btn btn-primary">Edit COD</button></a>
                        </div>
                        <h5>User Details</h5>
                        
                    </div>
                    <div class="card-body">
                        
                    <table class="table table-bordernone">
                                        <thead>
                                        <tr>
                                            <th scope="col">Customer ID</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Customer Phone</th>
                                            <th scope="col">Customer Email</th>
                                            <th scope="col">Customer State</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                            <?php 
                            $curModel = New Apis;
					        foreach($data['all_customers'] as $cust) :
                            $curcust  = $curModel->get_custinfo2($cust->id);

                                
                            ?>
                                        <tr>
                                        <td class="digits"><?php echo $cust->id; ?></td>
                                         <td class="digits"><?php echo $curcust->user_name; ?></td>
                                         <td class="digits"><?php echo $cust->phone; ?></td>
                                         <td class="digits"><?php echo $cust->email; ?></td>
                                         <td class="digits"><?php echo $curcust->user_state; ?></td>
                                         <td class="digits"><a href="<?php echo URLROOT; ?>/admin/view_customer/<?php echo $curcust->user_id; ?>" >View</a></td>
                                        </tr>  
                                        
                            <?php 
                            endforeach;
                            ?>

                                        </tbody>
                                    </table>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>

        <?php require APPROOT . '/views/inc_admin/footer.php'; ?>
