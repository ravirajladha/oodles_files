
<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
           <!-- <h4>Meals</h4> -->
           <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Upload Employees</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form custom_file_input">
                                    <form method="POST" action="<?php echo URLROOT; ?>/hr/upload_employees_excel" enctype="multipart/form-data">
                                        

                                        <div class="input-group mb-3">
                                            <div class="form-file">
                                                <input type="file" name="file" class="form-file-input form-control">
                                            </div>
											<!-- <span class="input-group-text">Upload</span> -->
                                            <button class="btn btn-primary btn-sm" type="submit" name="importSubmit">Upload</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <!-- row -->

    </div>
</div>
<!--**********************************
    Content body end
***********************************-->

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>