<?php require APPROOT . '/views/inc_corporate/header.php'; ?>
<?php
$get_ind_scholarship = $data['get_ind_scholarship'];
$scholarship_id = $data['scholarship_id'];
$get_all_default_scholarship_status = $data['get_all_default_scholarship_status'];
$adminMod = new admins;
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">All Scholarship Application List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/corporate/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?php echo URLROOT; ?>/corporate/all_scholarships">All Scholarships</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Scholarship Application List</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line">
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <!-- <li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">List
                                View</a></li> -->
                        <!-- <li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
                                View</a></li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active fontawesome-demo" id="tab1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-box">
                                        <div class="card-head">
                                            <header>Scholarship Application List</header>
                                            <div class="tools">
                                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                            </div>
                                        </div>


                                        <?php
                                        // Set the number of results to show per page
                                        $results_per_page = 20;

                                        // Get the total number of results
                                        $total_results = count($data['get_selected_scholarship_application']);

                                        // Calculate the total number of pages
                                        $total_pages = ceil($total_results / $results_per_page);

                                        // Get the current page number from the query string
                                        if (!isset($_GET['page']) || $_GET['page'] < 1) {
                                            $current_page = 1;
                                        } elseif ($_GET['page'] > $total_pages) {
                                            $current_page = $total_pages;
                                        } else {
                                            $current_page = $_GET['page'];
                                        }

                                        // Calculate the offset for the current page
                                        $offset = ($current_page - 1) * $results_per_page;

                                        // Get the results for the current page
                                        $results = array_slice($data['get_selected_scholarship_application'], $offset, $results_per_page);
                                        ?>


                                        <div class="card-body ">
                                            <div class="row">
                                                <?php foreach ($data['get_selected_scholarship_application'] as $scholarship_app) {
                                                    $get_current_student = $adminMod->get_current_student($scholarship_app->student_id);
                                                    $get_student_detail = $adminMod->get_auth_detail($scholarship_app->student_id);




                                                ?>
                                                    <div class="col-lg-6 col-md-6 col-6 col-sm-6">
                                                        <div class="blogThumb" style="background-color:#f3f0f0;">
                                                            <!-- <div class="blogThumb"> -->
                                                            <!-- <div class="card tab2-card" >
									<div class="card-header" style="background-color:orange;">
										<h5> Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, aliquid!</h5>
									</div> -->
                                                            <div class="row">
                                                                <div class="col-lg-2 col-md-2  col-sm-2">

                                                                    <img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/uploads/<?php echo $get_current_student->student_image; ?>" style="height:100%;width:100%;">


                                                                </div>
                                                                <div class="col-lg-4 col-md-4  col-sm-4">
                                                                    <a href="<?php echo URLROOT; ?>/corporate/scholarship_status/<?php echo $scholarship_app->id; ?>">
                                                                        <h4 style="font-weight:bold;"><?php

                                                                                                        echo $get_current_student->f_name . ' ' . $get_current_student->l_name; ?></h4>
                                                                    </a>
                                                                    <h5>Graduation:</h5>
                                                                    <h6 style="font-weight:bold;"> <?php echo $get_current_student->dob; ?> <br><?php echo $get_student_detail->email; ?></h6>



                                                                </div>
                                                                <!-- <div class="col-lg-2 col-md-2  col-sm-2">
									


										</div> -->
                                                                <div class="col-lg-4 col-md-4 col-4 col-sm-4">
                                                                    <div class="text-muted" style="margin-top:20px;"><span class="m-r-10">
                                                                            Select Status
                                                                            <select class="form-control" onchange="showModal(this.value, <?php echo $scholarship_app->id; ?>)">
                                                                                <?php foreach ($get_all_default_scholarship_status as $scholarship_status) { ?>
                                                                                    <option value="<?php echo $scholarship_status->id; ?>" <?php if ($scholarship_app->status == $scholarship_status->id) {
                                                                                                                                                echo "selected";
                                                                                                                                            } ?>><?php echo $scholarship_status->name; ?></option>

                                                                                <?php  } ?>

                                                                            </select>
                                                                        </span>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>





                                                <?php } ?>
                                                <!-- modal starts -->
                                                <!-- Bootstrap Modal -->
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel"></h4>
                                                            </div>
                                                            <form action="<?php echo URLROOT; ?>/corporate/update_scholarship_status_for_student/<?php echo $scholarship_app->scholarship_id; ?>" method="post">
                                                                <div class="modal-body">
                                                                    <label>Please submit message<span>*</span></label>
                                                                    <input type="text" name="message" class="form-control" id="inputBox" required>
                                                                    <input type="hidden" type="text" name="application_id" id="studentId">
                                                                    <input type="hidden" type="text" name="status" id="dropdown_value">
                                                                </div>
                                                                <button type="submit" class="form-control btn btn-primary">Submit</button>
                                                            </form>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal end -->


                                            </div>






                                        </div>

                                        <!-- Display the pagination links -->
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-center">
                                                <?php if ($current_page > 1) { ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=<?php echo $current_page - 1; ?>">Previous</a>
                                                    </li>
                                                <?php } ?>
                                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                                    <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($current_page < $total_pages) { ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </nav>
                                        <!-- Display the pagination links -->

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
</div>
</div>
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_corporate/footer.php'; ?>
<script>
    function showModal(value, studentId) {
        // get the name of the selected option
        // alert("showModal() called for value:", value);
        var statusName = $(`select option[value='${value}']`).text();
        //  alert(statusName);
        // set the title of the modal
        $("#myModalLabel").text(statusName);
        // set the student ID in the input field
        $("#studentId").val(studentId);
        $("#dropdown_value").val(value);
        // show the modal
        $('#myModal').modal('show');
    }
</script>