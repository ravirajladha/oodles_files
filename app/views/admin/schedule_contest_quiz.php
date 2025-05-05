<?php require APPROOT . '/views/inc_admin/header.php'; ?>


<style>
</style>
<style>
    .select2 {
        width: 100% !important;
    }
</style>
<style>
    .select2-container .select2-search--inline .select2-search__field {
        border: 0.7px solid #aaa;
        padding: 10px;
        width: 325px !important;
        height: 34px;
    }

    .select2-container .select2-selection--multiple .select2-selection__rendered {
        display: flex;
        padding: 10px;
    }

    .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice__remove {
        border: none;
    }

    .select2-selection__choice {
        background-color: #eee !important;
        border: 1px solid #eee !important;
        padding-right: 10px;
    }

    focus-visible {
        outline: 10px !important;
    }

    .get-inline {
        display: inline-block;
    }
    @media(max-width:640px) {
    .submit-button{
        width: 50%;
    }
    .back-button{
        width: 50%;
    }
}
</style>
<!-- start page content -->
<?php
$adminMod = new Admins;
$quiz_id = $data['quiz_id'];
$get_quiz_detail = $data['get_quiz_detail'];
$category = $get_quiz_detail->category;
$subject = $get_quiz_detail->subject_name;
$quiz_id = $get_quiz_detail->id;


?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Reschedule Quiz</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quizes/<?php echo $category; ?>/<?php echo $subject; ?>">Quizes</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/view_quiz/<?php echo $quiz_id; ?>">View QUiz</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Reschedule Quiz</li>
                </ol>
            </div>
        </div>
        <form action="<?php echo URLROOT ?>/admin/reschedule_quiz/<?php echo $quiz_id ?>" method="POST">
            <div class="row">
                <div class=" col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Fill the form</header>
                        </div>

                        <div class="card-body row">
                            <!-- BANK DETAILS -->

                            <div class="card-body row" style="flex-wrap: wrap">
                                <!-- BANK DETAILS -->
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <label class="btn btn-primary deepPink-bgcolor" style="margin-top:8px;">
                                            Start Date
                                                <input type="date" name="start_date" value="<?php echo $get_quiz_detail->start_date; ?>" min='<?php echo date('Y-m-d'); ?>'>
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <label class="btn btn-primary deepPink-bgcolor" style="margin-top:8px;">
                                            Start Time
                                                <input type="time" name="start_time" id="start_time" value="<?php echo $get_quiz_detail->start_time; ?>" >
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <label class="btn btn-primary deepPink-bgcolor" style="margin-top:8px;">
                                            End date
                                            <input type="date" name="end_date" value="<?php echo $get_quiz_detail->end_date; ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <label class="btn btn-primary deepPink-bgcolor" style="margin-top:8px;">
                                            End Time
                                            <input type="time" name="end_time" value="<?php echo $get_quiz_detail->end_time; ?>">
                                            </label>
                                        </div>
                                        <div class="col-md-1 col-sm-1">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label> Duration<span>*</span></label>
									<select name="quiz_duration_min" class="form-control">
										<option value="0" readonly> Minute</option>
										<?php
										for ($i = 1; $i <= 60; $i++) {
										?>
											<option value="<?php echo $i; ?>" <?php  if($get_quiz_detail->duration_min==$i){echo "selected";} ?>><?php echo $i; ?></option>
										<?php
										}
										?>
									</select>
								
								</div>
							</div>
							<div class="col-md-1 col-sm-1">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label></label>
							<select name="quiz_duration_sec" class="form-control">
							<option value="0" readonly>Seconds</option>

										<?php
										for ($i = 1; $i <= 60; $i++) {
										?>
												<option value="<?php echo $i; ?>" <?php  if($get_quiz_detail->duration_sec==$i){echo "selected";} ?>><?php echo $i; ?></option>
										<?php
										}
										?>
									</select>
									</div>
									</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- <div class="col-lg-6 col-lg-6">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/admin/quizes" role="button" style="float: right;">Finish</a>
					</div> -->
                    <div class="col-lg-6 col-sm-3 submit-button">
                        <button type="submit" class="btn btn-primary " style="float: right;" id="submit">Submit</button>
                    </div>
                    <div class="col-lg-6 col-sm-3 back-button">
                    <a href="<?php echo URLROOT?>/admin/view_quiz/<?php echo $quiz_id;?>"> <button  type="button" class="btn btn-secondary " style="float: right;" >Go Back</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>




<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.selectall').click(function() {
        if ($(this).is(':checked')) {
            $('div input').attr('checked', true);
        } else {
            $('div input').attr('checked', false);
        }
    });
</script>
