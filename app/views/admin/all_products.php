<?php require APPROOT . '/views/inc_admin/header.php'; ?>


        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Products
                                </h3>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->


            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row products-admin ratio_asos">


                <?php foreach($data['all_pro'] as $product) : ?>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                    <a href="<?php echo URLROOT.'/admin/view_product/'.$product->id; ?>"><img src="<?php echo URLROOT; ?>/uploads/<?php echo $product->p_image; ?>" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                    </div>
                                </div>
                                <div class="product-detail">
                                    
           <a href="<?php echo URLROOT.'/admin/view_product/'.$product->id; ?>">
                                        <h6><?php echo $product->p_name; ?></h6>
                                    </a>
                                    <h5>Starts at <i class="fa fa-inr"></i><?php echo $product->p_price; ?></h5>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    

                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>

        <?php require APPROOT . '/views/inc_admin/footer.php'; ?>