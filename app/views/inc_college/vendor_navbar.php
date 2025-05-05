  <!-- Page Sidebar Start-->
  <div class="page-sidebar">
            <div class="main-header-left d-none d-lg-block">
                <div class="logo-wrapper"><a href="#">
                <img class="blur-up lazyloaded" src="<?php echo URLROOT; ?>/assets3/logo.png" alt="" width="120" style='margin-left:20%;'></a></div>
            </div>
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div>
                    </div>
                    <?php
                    // echo $_SESSION['rexkod_vendor_email'];
                    //  if (strpos($_SERVER['REQUEST_URI'], 'Add_profile') !== false)
                        // car found
                      
                    if(isset($_SESSION['rexkod_vendor_id'])){
                    echo "<h6 class='mt-3 f-14'>".$_SESSION['rexkod_vendor_name']."</h6><p>".$_SESSION['rexkod_vendor_email']."</p>";
                    }
                
                    ?>
                   
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="<?php echo URLROOT; ?>/admin/index"><i data-feather="home"></i><span>
                    Dashboard1</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                                    <li><a href="<?php echo URLROOT; ?>/admin/products"><i class="fa fa-circle"></i>Products</a></li>
                                    <li><a href="<?php echo URLROOT; ?>/vendor/add_product"><i class="fa fa-circle"></i>Add Product</a></li>
                                </ul>
                    </li>

                    


                    <li><a class="sidebar-header" href=""><i data-feather="shopping-cart"></i><span>Sales</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo URLROOT; ?>/admin/orders"><i class="fa fa-circle"></i>Orders</a></li>
                            <li><a href="<?php echo URLROOT; ?>/vendor/label_orders"><i class="fa fa-circle"></i>Labels (Orders)</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/transactions"><i class="fa fa-circle"></i>Transactions</a></li>
                         
                            
                        </ul>
                    </li>


                    <li><a class="sidebar-header" href=""><i data-feather="clipboard"></i><span>Returns</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo URLROOT; ?>/admin/returns"><i class="fa fa-circle"></i>Return Orders</a></li>
                            <li><a href="<?php echo URLROOT; ?>/vendor/label_returns"><i class="fa fa-circle"></i>Labels (Returns)</a></li>
                         
                            
                        </ul>
                    </li>

                    <li><a class="sidebar-header" href="<?php echo URLROOT; ?>/admin/vendortcs"><i data-feather="bar-chart"></i><span>TCS Certificate</span></a></li>
                    <li><a class="sidebar-header" href="<?php echo URLROOT; ?>/admin/vendor_penalty"><i data-feather="log-in"></i><span>Penalties</span></a></li>
                    
                    
                    <li><a class="sidebar-header" href=""><i data-feather="settings" ></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo URLROOT; ?>/admin/profile"><i class="fa fa-circle"></i>Profile</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/settings"><i class="fa fa-circle"></i>Settings</a></li>
                        </ul>
                    </li>

                    </li>



                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->
