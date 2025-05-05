<?php require APPROOT . '/views/inc_admin/header.php'; ?>




        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Category
                                </h3>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">

                                <table class="table table-bordernone">
                                        <thead>
                                        <tr>
                                            
                                            <th scope="col">Image</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col"></th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>

                            <?php 
					            foreach($data['all_category'] as $category) :
                            ?>
                                        <tr>
                                        <td class="digits">
                                            <img src="<?php echo URLROOT; ?>/uploads/<?php echo $category->category_img; ?>" width="100" >
                                        </td>
                                         <td class="digits"><?php echo $category->category_name; ?></td>
                                         <td class="digits"><a href="<?php echo URLROOT; ?>/admin/edit_category/<?php echo $category->category_id; ?>"><button class="btn btn-danger btn-xs" style="padding:3px;border-radius:0px;">Edit</button></a></td>
                                        </tr>  
                                        
                            <?php 
                            endforeach;
                            ?>

                                        </tbody>
                                    </table>

                            </div>
                            <div class="card-body">
                                <div class="btn-popup pull-right">
                                    <a href='<?php echo URLROOT;?>/admin/add_category'><button type="button" class="btn btn-primary">Add Category</button></a>
                                </div>
                                <div id="basicScenario" class="product-physical table-responsive"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>


        
   <?php require APPROOT . '/views/inc_admin/footer.php'; ?>
