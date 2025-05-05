<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<style>
	body {
		font-family: Arial, sans-serif;
	}

	.container {
		/* margin: auto; */
		/* max-width: 800px; */
		padding: 10px;
	}

	.row {
		display: flex;
		flex-wrap: wrap;
		margin: 0 -10px;
	}

	.col-md-6 {
		flex: 0 0 50%;
		padding: 0 10px;
	}

	img {
		display: block;
		margin: auto;
		max-width: 100%;
		height: auto;
	}

	h6 {
		margin-top: 0;
		font-size: 20px;
		font-weight: bold;
		text-align: center;
	}

	.address {
		font-size: 16px;
		font-weight: bold;
		margin: 30px 0;
	}

	.address p {
		margin: 5px 0;
	}

	.address p.addr-font-h3 {
		font-size: 20px;
		font-weight: bold;
		margin-bottom: 15px;
	}

	.address p.addr-font-h4 {
		font-size: 18px;
		font-weight: bold;
		margin-bottom: 10px;
	}

	table {
		width: 100%;
		border-collapse: collapse;
		margin-bottom: 40px;
	}

	th,
	td {
		border: 1px solid #ddd;
		padding: 8px;
		text-align: right;
	}

	th {
		text-align: center;
	}

	.text-center {
		text-align: center;
	}

	.text-right {
		text-align: right;
	}

	.badge {
		margin-right: 5px;
	}

	.contact {
		font-size: 16px;
		margin-bottom: 40px;
	}

	.contact h6 {
		font-size: 20px;
		font-weight: bold;
		margin-bottom: 10px;
	}

	.contact .row {
		margin-bottom: 10px;
	}

	.contact .col-sm-2 {
		font-weight: bold;
	}

	.contact a {
		color: #337ab7;
		text-decoration: none;
	}

	.text-right.bold {
		font-weight: bold;
	}

	.text-right.amount {
		font-size: 18px;
	}

	.text-right.invoice-number {
		font-size: 14px;
	}

	.text-right.fees-type {
		font-size: 14px;
		font-weight: bold;
	}

	.text-right.frequency {
		font-size: 14px;
	}

	.text-right.date {
		font-size: 14px;
	}

	.text-center.num {
		font-size: 14px;
	}

	.total {
		font-size: 16px;
		font-weight: bold;
		margin-top: 40px;
		margin-bottom: 20px;
	}

	.total p {
		margin: 10px 0;
	}

	.total hr {
		margin-top: 10px;
		margin-bottom: 10px;
	}

	.total h6 {
		margin-top: 10px;
	}

	.text-right.btn {
		margin-top: 40px;
	}
</style>
<style>
        #header{
    display: grid;
    grid-template-columns: 2fr 5fr;
    background-color: #3498db;
    color: white;
}
#Image{
    height: 150px;
    width: 150px;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-left: 20px;
}
#Name{
    /* letter-spacing: 0.5em; */
    font-weight: bold;
    margin-top: 35px;
}
#Designation{
    /* letter-spacing: 0.2em; */
    margin-top: 10px;
}
#Underline{
    width: 300px;
    height: 7px;
    margin-top: 10px;
    background: #2c3e50;
}
#Title{
    margin-top: 10px;
    border-bottom: 1px solid;
}
#Wrapper{
    padding: 0px;
    margin-top: 50px;
}
    </style>

<?php
$get_scholarship_application = $data['get_scholarship_application'];

$corporateMod = new Corporates;
$get_scholarship = $corporateMod->get_ind_scholarship($get_scholarship_application->scholarship_id);
$page_id = $data['id'];
$application_id = $data['application_id'];
$scholarship_id = $data['scholarship_id'];

$studentMod = new Students;
$adminMod = new Admins;
$get_auth_detail = $adminMod->get_auth_detail($get_scholarship_application->student_id);
$student_detail = $adminMod->get_current_student($get_scholarship_application->student_id);
$student_id = $get_scholarship_application->student_id;
$student = $studentMod->get_class_by_id($get_scholarship_application->student_id);
$get_criteria_detail = $studentMod->get_criteria();
$critieria_for_class = array();
foreach ($get_criteria_detail as $criteria_detail) {
	# code...
	if ($criteria_detail->class == $student->class) {
		// echo $student->class;
		array_push($critieria_for_class, $criteria_detail->id);
	}
}
$all_critieria = array();
foreach ($critieria_for_class as $critieria) {
	# code...
	foreach (explode(',', $get_scholarship->criteria) as $critieria2) {
		# code...
		if ($critieria == $critieria2) {
			# code...
			array_push($all_critieria, $critieria2);
		}
	}
}

$status_detail = $adminMod->get_single_default_scholarship_status($get_scholarship_application->status);

$get_class_detail_single = $adminMod->get_class_detail_single($student->class);
// print_r($status_detail);
// die();
$get_scholarship_data = $data['get_scholarship_data'];
$get_student_detail_from_auth = $data['get_student_detail_from_auth'];
$get_scholarship_student_status = $data['get_scholarship_student_status'];
$get_scholarship_document_status = $data['get_scholarship_document_status'];
?>
<!-- for resume -->
<?php 
$studentModel =new Students;
    // $student = $adminMod->get_current_student($get_scholarship_application->student_id);
    $get_auth_detail_by_id = $adminMod->get_auth_detail($get_scholarship_application->student_id);
    
    ?>
    <?php
$student_detail_id  = $get_scholarship_application->student_id;
$adminMod = new admins;
$student_detail_detail = $adminMod->get_current_student($student_detail_id);
$student_detail_detailMod = new Students;
?>
<link href="<?php echo URLROOT ?>/assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
<link href="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class="pull-left">
					<div class="page-title">Scholarship Status<?php echo $page_id; ?></div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/all_scholarships">All Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/scholarship_application/<?php echo $scholarship_id; ?>">Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Status</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class=" col-sm-12">
				<div class="card">

					<div class="card-body no-padding height-9" style="padding:9px;">


						<div class="row profile-stat" style="padding-bottom:0px;">


							<div class="col-md-4 col-sm-4 col-6">
								<img src="<?php echo URLROOT; ?>/uploads/<?php echo $get_scholarship_data->scholarship_file; ?>" alt="scholarship_image" style="height:75px;width:250px;">
							</div>
							<div class="col-md-4 col-sm-4 col-6">

								<div class="uppercase profile-stat-title" style="font-size:14px;">Scholarship Name: <?php echo  $get_scholarship_data->name; ?> </div>
								<div class="uppercase profile-stat-title" style="font-size:14px;">Class: <?php echo $get_class_detail_single->class_name; ?></div>
								<div class="uppercase profile-stat-title" style="font-size:14px;">deadline : <?php echo date('d-m-y', strtotime($get_scholarship_data->end_date)); ?></div>

							</div>

							<div class="col-md-4 col-sm-4 col-6">
								<div class="uppercase profile-stat-title" style="font-size:14px;">Application No.: <?php echo $get_scholarship_application->id; ?> </div>
								<div class="uppercase profile-stat-title" style="font-size:14px;">Application Status:
									<?php if ($get_scholarship_application->status == 0) {
										echo "Pending";
									} else {
										echo $status_detail->status;
									} ?></div>
								<div class="uppercase profile-stat-title" style="font-size:14px;">Student Name: <?php echo $get_auth_detail->name; ?></div>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="row">

			<div class="col-md-12 col-sm-12">
				<div class="borderBox light bordered card-box">
					<div class="borderBox-title tabbable-line">
						<div class="caption">
							<span class="caption-subject font-dark bold uppercase">Check status</span>
						</div>
						<ul class="nav nav-tabs">

							<li class="nav-item">
								<!-- <a href="#borderBox_tab1" data-bs-toggle="tab" <?php if ($page_id == Null) {
																						echo "class='active'";
																					} ?>> Applied </a> -->
								<a href="<?php echo URLROOT; ?>/admin/scholarship_status/<?php echo $application_id; ?>" <?php if ($page_id == Null) {
																																echo "class='active'";
																															} ?>> Applied </a>

							</li>
							<li class="nav-item">
								<a href="<?php echo URLROOT; ?>/admin/scholarship_status/<?php echo $application_id; ?>/7" <?php if ($page_id == 7) {
																																echo "class='active'";
																															} ?>> Application </a>
							</li>
							<li class="nav-item">
								<!-- <a href="#borderBox_tab2" data-bs-toggle="tab" <?php if ($page_id == 4) {
																						echo "class='active'";
																					} ?>>Verification </a> -->
								<a href="<?php echo URLROOT; ?>/admin/scholarship_status/<?php echo $application_id; ?>/4" <?php if ($page_id == 4) {
																																echo "class='active'";
																															} ?>>Verification </a>
							</li>
							<li class="nav-item">
								<!-- <a href="#borderBox_tab5" data-bs-toggle="tab" <?php if ($page_id == 1) {
																						echo "class='active'";
																					} ?>> Interview </a> -->
								<a href="<?php echo URLROOT; ?>/admin/scholarship_status/<?php echo $application_id; ?>/1" <?php if ($page_id == 1) {
																																echo "class='active'";
																															} ?>> Interview </a>
							</li>
							<!-- <li class="nav-item">
								<a href="#borderBox_tab6" data-bs-toggle="tab" <?php if ($page_id == 3) {
																					echo "class='active'";
																				} ?>> Recordings </a>
							</li> -->
							<li class="nav-item">
								<a href="<?php echo URLROOT; ?>/admin/scholarship_status/<?php echo $application_id; ?>/2" <?php if ($page_id == 2) {
																																echo "class='active'";
																															} ?>> Operations </a>
								<!-- <a href="#borderBox_tab7" data-bs-toggle="tab" <?php if ($page_id == 2) {
																						echo "class='active'";
																					} ?>> Operations </a> -->
							</li>


							<li class="nav-item">
								<a href="<?php echo URLROOT; ?>/admin/scholarship_status/<?php echo $application_id; ?>/5" <?php if ($page_id == 5) {
																																echo "class='active'";
																															} ?>> Proccessing </a>
								<!-- <a href="#borderBox_tab3" data-bs-toggle="tab" <?php if ($page_id == 5) {
																						echo "class='active'";
																					} ?>> Proccessing </a> -->
							</li>
							<!-- <li class="nav-item">
							
								 	<a href="<?php echo URLROOT; ?>/admin/scholarship_status/<?php echo $application_id; ?>/6"   <?php if ($page_id == 6) {
																																		echo "class='active'";
																																	} ?>> Granted </a>
							</li> -->
						</ul>
					</div>
					<div class="borderBox-body">
						<div class="tab-content">

							<div class="tab-pane <?php if ($page_id == 7) {
														echo 'active';
													} ?>" id="borderBox_tab0">
								<!-- start page content -->

								<div class="white-box">

								<div class="container col-md-offset-2 col-md-8 p-4" id="Wrapper" style="border: solid 2px;">
      <div id="header">
        <div>
          <img src="<?php echo URLROOT; ?>/uploads/<?php echo $student_detail->student_image; ?>" alt="" id="Image" />
        </div>
        <div>
          <h2 id="Name"><?php echo $student_detail->f_name. " " . $student_detail->l_name; ?></h2>
          <p id="Underline"></p>
          <small>Email: <?php echo $get_auth_detail_by_id->email ;?> | Phno: <?php echo $get_auth_detail_by_id->phone ;?></small>
        </div>
      </div>
      <div class="row">
      <div class="col-md-12">
            <div class="table-responsive m-t-40">
              <table class="table table-hover">
                <thead>
                <strong>Current Education</strong>

                  <tr>
                    <th scope="col"><strong>Institute Name</strong></th>
                    <th scope="col"><strong>Class/Course</strong></th>
                    <th scope="col"><strong>Boards</strong></th>
                    <th scope="col"><strong>State</strong></th>
                    <th scope="col"><strong>City</strong></th>


                  </tr>
                </thead>
                <tbody>


                  <tr>
                    <td>
                      <p class="text-muted text-center" style="font-size: 15px;"><?php
                                                                                  if (isset($student_detail_detail->academic_name)) {
                                                                                    if (($student_detail_detail->academic_name != 0) && ($student_detail_detail->academic_name != Null)) {
                                                                                      $academic_type = substr(($student_detail_detail->academic_name), 0, 1);
                                                                                      $academic_name = substr($student_detail_detail->academic_name, 1);

                                                                                      $get_school_detail  = $student_detail_detailMod->get_school_detail_single($academic_name);


                                                                                   
                                                                                      if ($academic_type == 1) {
                                                                                        $get_school_detail  = $student_detail_detailMod->get_school_detail($academic_name);
                                                                                        echo ucwords($get_school_detail->school_name);
                                                                                      } elseif ($academic_type == 2) {
                                                                                        $get_college_detail  = $student_detail_detailMod->get_ind_college_detail($academic_name);
                                                                                        echo $get_college_detail->college_name;
                                                                                      } else {
                                                                                        echo "dfdfdf";
                                                                                      }
                                                                                    } elseif ($student_detail_detail->academic_name == 0) {
                                                                                      echo ucwords($student_detail_detail->academic_other_name);
                                                                                    } else {
                                                                                      echo  "Nill";
                                                                                    }
                                                                                  } else {
                                                                                    echo "Nill";
                                                                                  }
                                                                                  ?></p>
                    </td>
                    <td>
                      <p class="text-muted text-center" style="font-size: 15px;"> <?php if (isset($student_detail_detail->course)) {
                                                                                    $student_detail_detailMod = new Students;
                                                                                    $get_class_detail = $student_detail_detailMod->get_class_detail_single($student_detail_detail->course);
                                                                                    echo ucwords($get_class_detail->class_name);
                                                                                  } else {
                                                                                    echo "Nill";
                                                                                  }
                                                                                  ?></p>
                    </td>
                    <td>
                      <p class="text-muted text-center" style="font-size: 15px;"><?php if (!empty($student_detail_detail->board)) {
                                                                                    $student_detail_detailMod = new Students;
                                                                                    $get_board_detail = $student_detail_detailMod->get_board_detail_single($student_detail_detail->board);
                                                                                    echo $get_board_detail->name;
                                                                                  } else {
                                                                                    echo "Nill";
                                                                                  }
                                                                                  ?></p>
                    </td>
                    <td>
                      <p class="text-muted text-center" style="font-size: 15px;"><?php if (!empty($student_detail_detail->institute_state)) {
                                                                                    echo $student_detail_detail->institute_state;
                                                                                  } else {
                                                                                    echo "Nill";
                                                                                  } ?></p>
                    </td>
                    <td>
                      <p class="text-muted text-center" style="font-size: 15px;"><?php if (!empty($student_detail_detail->institute_city)) {
                                                                                    echo $student_detail_detail->institute_city;
                                                                                  } else {
                                                                                    echo "Nill";
                                                                                  } ?></p>
                    </td>


                  </tr>


                  <tr>

                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-12">
            <div class="table-responsive m-t-40">
              <table class="table table-hover">
                <thead>
                <strong>Previous Education</strong>
                  <tr>
                    <th scope="col"><strong>Academic name</strong></th>
                    <th scope="col"><strong>Class</strong></th>
                    <th scope="col"><strong>%/cgpa</strong></th>
                    <th scope="col"><strong>Start Date</strong></th>
                    <th scope="col"><strong>End Date</strong></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (
                    isset($student_detail_detail->p_academic_name) && !empty($student_detail_detail->p_academic_name)
                    && isset($student_detail_detail->p_class) && !empty($student_detail_detail->p_class)
                    && isset($student_detail_detail->p_cgpa) && !empty($student_detail_detail->p_cgpa)
                    && isset($student_detail_detail->p_start_date) && !empty($student_detail_detail->p_start_date)
                    && isset($student_detail_detail->p_end_date) && !empty($student_detail_detail->p_end_date)
                  ) {


                    $p_academic_name = explode(',', $student_detail_detail->p_academic_name);
                    $p_class = explode(',', $student_detail_detail->p_class);
                    $p_cgpa = explode(',', $student_detail_detail->p_cgpa);
                    $p_start_date = explode(',', $student_detail_detail->p_start_date);
                    $p_end_date = explode(',', $student_detail_detail->p_end_date);
                  ?>
                    <?php $count = 0;
                    foreach ($p_academic_name as $name) {
                      $student_detail_detailMod = new Students;
                      $get_class_detail = $student_detail_detailMod->get_class_detail_single($p_class[$count]);
                    ?>
                      <tr>
                        <td>
                          <p class="text-muted text-center" style="font-size: 15px;"><?php echo $p_academic_name[$count] ?></p>
                        </td>
                        <td>
                          <p class="text-muted text-center" style="font-size: 15px;"><?php echo $get_class_detail->class_name ?></p>
                        </td>
                        <td>
                          <p class="text-muted text-center" style="font-size: 15px;"><?php echo $p_cgpa[$count] ?></p>
                        </td>
                        <td>
                          <p class="text-muted text-center" style="font-size: 15px;"><?php echo $p_start_date[$count] ?></p>
                        </td>
                        <td>
                          <p class="text-muted text-center" style="font-size: 15px;"><?php echo $p_end_date[$count] ?></p>
                        </td>
                      </tr>

                    <?php $count++;
                    } ?>
                  <?php } else {
                  ?>
                    <tr>
                      <td>Nill</td>
                      <td>Nill</td>
                      <td>Nill</td>
                      <td>Nill</td>
                      <td>Nill</td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- ---- -->
        
        <div class="col-lg-12">
          <h4 id="Title">Family Information</h4>
          <div class="row">
            
                        <div class="col-lg-6 d-flex">
                            <h6>No. of siblings :</h6> <span>&nbsp;<?php echo $student_detail->siblings; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Annual Income :</h6> <span>&nbsp;<?php echo $student_detail->annual_income; ?></span>
                        </div>
                        <div class="col-lg-6">
                        <h5>Father's Details</h5>
                        <div class="row">
                        <div class="col-lg-12 d-flex">
                            <h6>Name as per Aadhar :</h6> <span>&nbsp;<?php echo $student_detail->father_name; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Aadhar Number :</h6> <span>&nbsp;<?php echo $student_detail->f_aadhar; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Phone Number :</h6> <span>&nbsp;<?php echo $student_detail->f_phone; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Email Id :</h6> <span>&nbsp;<?php echo $student_detail->f_email_id; ?></span>
                        </div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <h5>Mother's Details</h5>
                        <div class="row">
                        
                        <div class="col-lg-12 d-flex">
                            <h6>Name as per Aadhar :</h6> <span>&nbsp;<?php echo $student_detail->mother_name; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Aadhar Number :</h6> <span>&nbsp;<?php echo $student_detail->m_aadhar; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Phone Number :</h6> <span>&nbsp;<?php echo $student_detail->m_phone; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Email Id :</h6> <span>&nbsp;<?php echo $student_detail->m_email_id; ?></span>
                        </div>
                        </div>
                        </div>


                        
            </div>
          
        </div>
        <div class="col-lg-12">
          <h4 id="Title">Communication Address</h4>
          <div class="row">
            <div class="col-lg-6">
                        <h5>Current Address</h5>
                        <div class="row">
                        <div class="col-lg-12 d-flex">
                            <h6>Communication Address :</h6> <span>&nbsp;<?php echo $student_detail->comm_address; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>PIN Code :</h6> <span>&nbsp;<?php echo $student_detail->comm_pin_code; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Village/Area/Locality :</h6> <span>&nbsp;<?php echo $student_detail->comm_village; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Block/Taluk/Town :</h6> <span>&nbsp;<?php echo $student_detail->comm_block; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>State :</h6> <span>&nbsp;<?php echo $student_detail->comm_village; ?></span>
                        </div>
                        </div>
            </div>
            <div class="col-lg-6">
                        <h5>Permanent Address</h5>
                        <div class="row">
                        <div class="col-lg-12 d-flex">
                            <h6>Communication Address :</h6> <span>&nbsp;<?php echo $student_detail->perm_address; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>PIN Code :</h6> <span>&nbsp;<?php echo $student_detail->perm_pin_code; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Village/Area/Locality :</h6> <span>&nbsp;<?php echo $student_detail->perm_village; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Block/Taluk/Town :</h6> <span>&nbsp;<?php echo $student_detail->perm_block; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>State :</h6> <span>&nbsp;<?php echo $student_detail->perm_village; ?></span>
                        </div>
                        </div>
            </div>

            </div>
        </div>
          
        </div>

        <div class="col-lg-12">
          <h4 id="Title">Bank Details of Parent/Guardian</h4>
          <div class="row">
          <div class="col-lg-6 d-flex">
                            <h6>Bank Name :</h6> <span>&nbsp;<?php echo $student_detail->bank_name; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Bank's Branch Name :</h6> <span>&nbsp;<?php echo $student_detail->bank_branch; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>IFSC Code :</h6> <span>&nbsp;<?php echo $student_detail->ifsc_code; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Bank Bank Passbook/Statement :</h6> <span>&nbsp;<?php echo $student_detail->perm_village; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Account Number :</h6> <span>&nbsp;<?php echo $student_detail->account_no; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Name as per Passbook :</h6> <span>&nbsp;<?php echo $student_detail->name_as_per_bank; ?></span>
                        </div>
                        
          </div>
          
        </div>
        <div class="col-lg-12">
          <h4 id="Title">About Yourself</h4>
          <div class="row">
          <div class="col-lg-6 d-flex">
                            <h6>About yourself :</h6> <span>&nbsp;<?php echo $student_detail->description; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Hobbies  :</h6> <span>&nbsp;<?php
                            $hobbies =  explode(',', $student_detail->hobby);
                            $hobby_count =0;
                             foreach ($hobbies as $hobby) {
                                # code...
                                $hobby_count++;
                                $get_hobby = $studentModel->get_hobby($hobby);
                                if($hobby_count == count($hobbies)){
                                    echo $get_hobby->name;
                                }
                                else{
                                    echo $get_hobby->name .',';
                                }
                                
                             }   ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Achievements :</h6> <span>&nbsp;<?php
                            //  $achievements= explode(',', $student_detail->achievements);
                            // foreach($achievements as $achieve){
                            //     echo $achieve .',';
                            // }
                            echo $student_detail->achievements;
                            ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Mother Tongue :</h6> <span>&nbsp;<?php echo $student_detail->mother_tongue; ?></span>
                        </div>
                       
                        
          </div>
          
        </div>
        
           
            
      </div>
									<div class="text-right">

										<!-- <a href="<?php echo URLROOT; ?>/admin/resume_printout/<?php echo $student_id; ?>" target="_blank"> <button class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button></a> -->
										<a href="<?php echo URLROOT; ?>/admin/resume2/<?php echo $student_id; ?>" target="_blank"> <button class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button></a>
									</div>

								</div>
							</div>
							<div class="tab-pane <?php if ($page_id == Null) {
														echo 'active';
													} ?>">
								<h6>Student Log of Status</h6>
								<style>
									table {
										border-collapse: collapse;
										width: 100%;
									}

									thead {
										background-color: #ddd;
									}

									th,
									td {
										border: 1px solid #ddd;
										padding: 8px;
										text-align: left;
									}

									th {
										font-weight: bold;
									}

									tr:nth-child(even) {
										background-color: #f2f2f2;
									}
								</style>
								<table>
									<thead>
										<tr>
											<th>No.</th>
											<th>Action</th>
											<th>Created by</th>
											<th>Comment</th>
											<th>Created At</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 1; ?>
										<tr>
											<td><?php echo $count ?></td>
											<td>The student status has been changed to Registered</td>
											<td>System</td>

											<td>Pending</td>
											<td><?php echo $formatted_time = date('d-m-Y H:i:s', strtotime($get_scholarship_application->created_at)); ?></td>
										</tr>
										<?php foreach ($get_scholarship_student_status as $student_status) {
											$count++;
											$get_default_scholarship_status = $adminMod->get_single_default_scholarship_status($student_status->status);
										?>
											<tr>
												<td><?php echo $count; ?></td>
												<td>The student status has been changed to <?php echo $get_default_scholarship_status->name; ?></td>
												<td><?php if ($student_status->created_by == 1) {
														echo "Admin";
													} else {
														$get_auth_detail = $adminMod->get_auth_detail($student_status->created_by);
														if ($get_auth_detail->type == "subadmin_scholarship") {
															echo "Subadmin";
														} elseif ($get_auth_detail->type == "corporate") {
															echo "Corporate";
														}
													}; ?></td>

												<td><?php echo $student_status->message; ?></td>
												<td><?php


													echo $formatted_time = date('d-m-Y H:i:s', strtotime($student_status->created_at));  ?></td>




											</tr>
										<?php } ?>
									</tbody>
								</table>

							</div>
							<div class="tab-pane <?php if ($page_id == 1) {
														echo 'active';
													} ?>" id="borderBox_tab5">


								<div class="form-group row">


									<div class="col-md-12 col-sm-12">
										<div class="card card-box">
											<div class="card-head">
												<header>For Interview Use</header>
												<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
													<i class="material-icons">more_vert</i>
												</button>

											</div>
											<div class="card-body" id="bar-parent">
												<form method="post" action="<?php echo URLROOT; ?>/admin/add_scholarship_status_interview/<?php echo $get_scholarship_application->id; ?>" enctype="multipart/form-data" autocomplete="OFF" class="form-horizontal" id="form_sample_1">
													<!-- <form action="#"  > -->

													<input type="hidden" name="student_id" value="<?php echo $get_scholarship_application->student_id; ?>">
													<input type="hidden" name="scholarship_id" value="<?php echo $get_scholarship_application->scholarship_id; ?>">


													<div class="form-body">
														<div class="form-group row">
															<label class="control-label col-md-3">Select Levels
																<span class="required"> * </span>
															</label>
															<div class="col-md-9">
																<select class="form-select input-height" name="interview_levels">
																	<option value="">Select...</option>
																	<option value="1">Telephonic</option>
																	<option value="2">Video Call</option>
																	<option value="3">Face to Face</option>
																</select>
															</div>
														</div>


														<div class="form-group row">
															<label class="control-label col-md-3">Date <span class="required"> * </span>
															</label>
															<div class="col-md-9">
																<input type="date" name="interview_date" placeholder="Course Duration" class="form-control input-height" />
															</div>
														</div>
														<div class="form-group row">
															<label class="control-label col-md-3">Time
																<span class="required"> * </span>
															</label>
															<div class="col-md-9">
																<input type="time" name="interview_time" placeholder="Course Price" class="form-control input-height" />
															</div>
														</div>
														<div class="form-group row">
															<label class="control-label col-md-3">Comment
																<span class="required"> * </span>
															</label>
															<div class="col-md-9">
																<textarea id="oodles_editor1" rows="4" cols="30" name="interview_comments" placeholder="Enter Second Option" style="background-color:#ff7400;"></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="control-label col-md-3">Phone Number
															</label>
															<div class="col-md-9">
																<input type="phone" name="interview_phone_number" placeholder="Enter Phone Number" class="form-control input-height" value="<?php echo $student->phone; ?>" oninput="numberOnly(this.id);" maxlength="10" />
															</div>
														</div>


														<div class="form-actions">
															<div class="row">
																<div class="offset-md-3 col-md-9">
																	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
																	<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button>
																</div>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="card card-box">
											<div class="card-head">
												<header>Interview Details</header>
											</div>
											<div class="card-body " id="bar-parent">
												<table id="exportTable" class="display nowrap" style="width:100%">
													<thead>
														<tr>
															<th>Id</th>
															<th>Levels</th>
															<th>Date</th>
															<th>Time</th>
															<th>Comment</th>
															<th>Phone Number</th>
															<th>Disposition</th>
															<th>File(Only mp3 & mp4)</th>
															<th>Comments</th>
															<th>Action</th>

															<!-- <th>Title</th>
															<th>File Present</th>
															<th>Created Date</th> -->

														</tr>
													</thead>
													<tbody>

														<?php
														$count = 0;
														foreach ($data['get_scholarship_status_interview'] as $interview_status) {
															$count++;
														?>
															<tr class="text-center">
																<form action="<?php echo URLROOT; ?>/admin/update_interview_status/<?php echo $interview_status->id; ?>" method="post" enctype="multipart/form-data" autocomplete="OFF" class="form-horizontal">
																	<input type="hidden" name="student_id" value="<?php echo $get_scholarship_application->student_id; ?>">
																	<input type="hidden" name="application_id" value="<?php echo $get_scholarship_application->id; ?>">
																	<input type="hidden" name="scholarship_id" value="<?php echo $get_scholarship_application->scholarship_id; ?>">

																	<td style="width:5%;"><?php echo $count; ?></td>
																	<td><?php if ($interview_status->interview_levels == 1) {
																			echo "Telephonic";
																		} elseif ($interview_status->interview_levels == 2) {
																			echo "Video Call";
																		} elseif ($interview_status->interview_levels == 3) {
																			echo "Face to Face";
																		} ?></td>
																	<td><?php echo $interview_status->interview_date; ?></td>
																	<td><?php echo $interview_status->interview_time; ?></td>
																	<td><?php echo $interview_status->interview_comments; ?></td>
																	<td><?php echo $interview_status->interview_phone_number; ?></td>
																	<?php if (empty($interview_status->recording_disposition)) { ?>
																		<td>
																			<select class="form-select input-height" name="recording_call_disposition" required>
																				<option value="">--Select--</option>
																				<option value="Connected">Connected</option>
																				<option value="Call Received">Call Received</option>
																				<option value="Unreachable">Unreachable</option>
																				<option value="Call Disconnected">Call Disconnected</option>
																				<option value="Wrong Number">Wrong Number</option>
																			</select>
																		</td>
																		<td><input class="mdl-textfield__input" type="file" name="recording_call_file" /></td>
																		<td><input class="mdl-textfield__input" type="text" name="recording_caller_comments" /></td>
																		<td style="width:5%;"><button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-success">
																				<i class="fa fa-check"></i>
																			</button></td>
																	<?php } else {
																	?>

																		<td>
																			<?php echo $interview_status->recording_disposition; ?>
																		</td>
																		<td><?php if (!empty($interview_status->recording_file)) { ?>
																				<!-- <audio controls>
																					<source src="<?php echo URLROOT; ?>/uploads/<?php echo $interview_status->recording_file; ?>" type="audio/mp3">
																					Your browser does not support the audio element.
																				</audio> -->
																				<!-- <a href="<?php echo URLROOT; ?>/uploads/<?php echo $interview_status->recording_file; ?>" target="_blank"><i class="fa fa-eye"></i></a> -->


																				<?php
																				// $file_name = $interview_status->recording_file;
																				// $file_type = mime_content_type($file_name);
																				$extension_1 = pathinfo($interview_status->recording_file, PATHINFO_EXTENSION);
																				// $extension_2 = pathinfo($file_name_2, PATHINFO_EXTENSION);
																				if ($extension_1 == 'mp4') { ?>
																					<a href="<?php echo URLROOT; ?>/uploads/<?php echo $interview_status->recording_file; ?>" target="_blank"> <i class="fa fa-video"></i></a>
																				<?php } elseif ($extension_1 == 'mp3') { ?>
																					<a href="<?php echo URLROOT; ?>/uploads/<?php echo $interview_status->recording_file; ?>" target="_blank"> <i class="fa fa-music"></i></a>
																				<?php }
																				?>
																			<?php } else { ?>
																				<i class="fa fa-eye-slash"></i>
																			<?php } ?>
																		</td>
																		<td>
																			<?php echo $interview_status->recording_comments; ?>
																		</td>
																		<td><?php if ($interview_status->recording_updated_by == 1) {
																				echo "Admin";
																			} else {
																				$get_auth_detail = $adminMod->get_auth_detail($interview_status->recording_updated_by);
																				if ($get_auth_detail->type == "subadmin_scholarship") {
																					echo "Subadmin";
																				} elseif ($get_auth_detail->type == "corporate") {
																					echo "Corporate";
																				}
																			}; ?></td>



																	<?php } ?>

																</form>
															</tr>


															<!-- <div class="card">
																<div class="card-content">
																	<div class="row">
																		<div class="col-md-6">
																			<label class="control-label">Disposition</label>
																			<p>hello</p>
																		</div>
																		<div class="col-md-6">
																			<label class="control-label">Disposition</label>
																			<p>hello</p>
																		</div>
																	</div>
																</div>

															</div> -->


														<?php } ?>



													</tbody>
													<!-- <tfoot>
														<tr>
															<th>Id</th>
															<th>Title</th>
															<th>File Present</th>
															<th>Created Date</th>
														</tr>
													</tfoot> -->
												</table>
											</div>
										</div>
									</div>
								</div>



								<!-- <p>
										<button class="btn red" type="submit"> Proceed </button>
									</p> -->

							</div>
							<div class="tab-pane <?php if ($page_id == 2) {
														echo 'active';
													} ?>" id="borderBox_tab7">


								<div class="form-group row">


									<div class="col-md-12 col-sm-12">
										<div class="card card-box">
											<div class="card-head">
												<header>Operations</header>
												<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
													<i class="material-icons">more_vert</i>
												</button>

											</div>
											<div class="card-body" id="bar-parent">
												<form method="post" action="<?php echo URLROOT; ?>/admin/add_scholarship_status_operations/<?php echo $get_scholarship_application->id; ?>" enctype="multipart/form-data" autocomplete="OFF" class="form-horizontal" id="form_sample_1">

													<input type="hidden" name="student_id" value="<?php echo $get_scholarship_application->student_id; ?>">
													<input type="hidden" name="scholarship_id" value="<?php echo $get_scholarship_application->scholarship_id; ?>">


													<div class="form-body">



														<div class="form-group row">
															<label class="control-label col-md-3">Enter Title <span class="required"> * </span>
															</label>
															<div class="col-md-9">
																<input type="text" name="operations_title" placeholder="Enter Title" class="form-control input-height" />
															</div>
														</div>
														<div class="form-group row">
															<label class="control-label col-md-3">Date <span class="required"> * </span>
															</label>
															<div class="col-md-9">
																<input type="date" name="operations_date" placeholder="" class="form-control input-height" />
															</div>
														</div>
														<div class="form-group row">
															<label class="control-label col-md-3">Time
																<span class="required"> * </span>
															</label>
															<div class="col-md-9">
																<input type="time" name="operations_time" placeholder="" class="form-control input-height" />
															</div>
														</div>


														<div class="form-actions">
															<div class="row">
																<div class="offset-md-3 col-md-9">
																	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
																	<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button>
																</div>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>


								<!--start calander , to-do & goal process -->
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="card card-box">
											<div class="card-head">
												<header>Operation Track</header>

											</div>
											<div class="card-body ">
												<ul class="to-do-list ui-sortable" id="sortable-todo">
													<?php foreach ($data['get_scholarship_status_operations'] as $interview_status) { ?>

														<li class="clearfix">

															<div class="todo-check pull-left">
																<form method="post" id="todo-form" action="<?php echo URLROOT ?>/admin/update_scholarship_status_operations/<?php echo $interview_status->id; ?>/<?php echo $get_scholarship_application->id; ?>">
																	<input type="checkbox" value="" name="flag" <?php if ($interview_status->flag == 0) {
																													echo "checked";
																												}  ?> id="todo-check">
																	<label for="todo-check"></label></label>
																</form>

															</div>

															<p class="todo-title"><?php echo $interview_status->operations_title; ?></p>

															<div class="todo-actionlist pull-right clearfix">

																<a href="<?php echo URLROOT ?>/admin/delete_scholarship_status_operations/<?php echo $interview_status->id; ?>/<?php echo $get_scholarship_application->id; ?>"><i class="fa-solid fa-times fa-lg"></i></a>


																<span class="pull-right"><?php echo $interview_status->operations_date; ?>, <?php echo $interview_status->operations_time; ?></span>
															</div>

														</li>
													<?php } ?>




												</ul>
											</div>
										</div>
									</div>


								</div>




								<!-- <p>
										<button class="btn red" type="submit"> Proceed </button>
									</p> -->

							</div>
							<!-- The recording tab has been commented out, as all the modules are merged into verification module -->
							<!-- <div class="tab-pane <?php if ($page_id == 3) {
															echo 'active';
														} ?>" id="borderBox_tab6">


								<div class="form-group row">


									<div class="col-md-12 col-sm-12">
										<div class="card card-box">
											<div class="card-head">
												<header>Recording Details</header>
												<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
													<i class="material-icons">more_vert</i>
												</button>

											</div>
											<div class="card-body" id="bar-parent">
												<form method="post" action="<?php echo URLROOT; ?>/admin/add_scholarship_status_recordings/<?php echo $get_scholarship_application->id; ?>" enctype="multipart/form-data" autocomplete="OFF" class="form-horizontal" id="form_sample_1">

													<input type="hidden" name="student_id" value="<?php echo $get_scholarship_application->student_id; ?>">
													<input type="hidden" name="scholarship_id" value="<?php echo $get_scholarship_application->scholarship_id; ?>">

													<div class="form-body">
														<div class="form-group row">
															<label class="control-label col-md-3">Add Title
																<span class="required"> * </span>
															</label>
															<div class="col-md-5">
																<input type="text" name="recording_title" placeholder="Enter Title of the Recording" class="form-control input-height" />
															</div>
														</div>
														<div class="form-group row">
															<label class="control-label col-md-3">Caller Name
																<span class="required"> * </span>
															</label>
															<div class="col-md-5">
																<input type="text" name="recording_caller_name" placeholder="Enter Name of the Caller" class="form-control input-height" />
															</div>
														</div>
														<div class="form-group row">
															<label class="control-label col-md-3">Caller Purpose
																<span class="required"> * </span>
															</label>
															<div class="col-md-5">
																<input type="text" name="recording_caller_purpose" placeholder="Enter Calling Purpose" class="form-control input-height" />
															</div>
														</div>
														<div class="form-group row">
															<label class="control-label col-md-3">Disposition<span class="required"> * </span></label>
															<div class="col-md-5">
																<select class="form-select input-height" name="recording_call_disposition">
																	<option value="">--Select--</option>
																	<option value="Connected">Connected</option>
																	<option value="Call Received<">Call Received</option>
																	<option value="Unreachable">Unreachable</option>
																	<option value="Call Disconnected">Call Disconnected</option>
																	<option value="Wrong Number">Wrong Number</option>
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="control-label col-md-3">Caller Comments
																<span class="required"> * </span>
															</label>
															<div class="col-md-5">
																<input type="text" name="recording_caller_comments" placeholder="Enter Comments on Call" class="form-control input-height" />
															</div>
														</div>


												

														<div class="col-lg-12 p-t-20">
															<label class="control-label col-md-3">Upload Recording</label>
															<input class="mdl-textfield__input" type="file" name="recording_call_file" />

															<div class="col-md-12">
																<div id="id_dropzone" class="dropzone"></div>
															</div>
														</div>


														<div class="form-actions">
															<div class="row">
																<div class="offset-md-3 col-md-9">
																	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
																	<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button>
																</div>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>



							


									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="card card-box">
												<div class="card-head">
													<header> Recording Details</header>


												</div>
												<div class="card-body " id="bar-parent">
													<table class=" table table-bordered display nowrap" style="width:100%">
														<thead>


															<tr>

																<th>Title</th>
																<th>Caller Name</th>
																<th>Caller Purpose</th>
																<th>Disposition</th>
																<th>Commments</th>
																<th>File Present</th>
																<th>File Present</th>
																<th>Created Date</th>

															</tr>
														</thead>
														<tbody>

															<?php foreach ($data['get_scholarship_status_recordings'] as $interview_status) { ?>

																<tr>

																	<td><?php echo $interview_status->recording_title; ?></td>
																	<td><?php echo $interview_status->recording_caller_name; ?></td>
																	<td><?php echo $interview_status->recording_caller_purpose; ?></td>
																	<td><?php echo $interview_status->recording_call_disposition; ?></td>
																	<td><?php echo $interview_status->recording_caller_comments; ?></td>

																	<td><?php echo (!empty($interview_status->recording_call_file) ? 'YES' : 'NO'); ?></td>
																	<td><?php if (!empty($interview_status->recording_call_file)) { ?>
																			<audio controls>
																				<source src="<?php echo URLROOT; ?>/admin/<?php echo $interview_status->recording_call_file; ?>" type="audio/mp3">
																				Your browser does not support the audio element.
																			</audio>
																		<?php } else { ?>
																			Not Present
																		<?php } ?>
																	</td>


																	<td><?php echo $interview_status->created_at; ?></td>


																</tr>
															<?php } ?>



														</tbody>
														<tfoot>
															<tr>
																<th>Title</th>
																<th>Caller Name</th>
																<th>Caller Purpose</th>
																<th>Disposition</th>
																<th>Commments</th>
																<th>File Present</th>
																<th>File Present</th>
																<th>Created Date</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</div>

							





								</div>





							</div> -->
							<div class="tab-pane <?php if ($page_id == 4) {
														echo 'active';
													} ?>" id="borderBox_tab2">

								<?php if ($get_scholarship_application->documents !== Null) { ?>
									<?php
									$all_documents_required = explode(',', $get_scholarship->documents_required);
									$get_document_to_be_uploaded_by_user = $get_scholarship_application->document_ids;
									$explode_get_document_to_be_uploaded_by_user = explode(',', $get_document_to_be_uploaded_by_user);
									$explode_get_document_uploaded_by_user = explode(',', $get_scholarship_application->documents);

									// $combine = array_combine($all_critieria,$get_criteria_answer_by_user);
									$student_class = $student->class;
									$get_document_to_be_uploaded_by_user = explode(',', $get_document_to_be_uploaded_by_user);
									$document_count = 0;

									?>
									<table>
										<tr>
											<th>Name</th>
											<th>Doc</th>
											<th>Subadmin Status</th>
											<th>Admin Status</th>
											<th>Corporate Status</th>
											<th>Status</th>
											<th>Comment</th>
											<th>Action</th>
										</tr>
										<?php
										$count = 0;
										foreach ($get_document_to_be_uploaded_by_user as $document_id) {
											$get_document_detail = $corporateMod->get_ind_scholarship_doc($document_id);

											// echo $get_criteria_detail->criteria_name;
											
												$get_document_detail = $studentMod->get_scholarship_document_detail($get_document_detail->id);
										?>

												<form method="post" action="<?php echo URLROOT; ?>/admin/scholarship_document_status/<?php echo $get_scholarship_application->id; ?>/<?php echo $document_id; ?>" enctype="multipart/form-data" autocomplete="OFF" class="form-horizontal" id="form_sample_1">
													<?php

													$document_status_by_subadmin = $adminMod->get_last_scholarship_document_status_by_type($application_id, $document_id, 'subadmin');
													$document_status_by_admin = $adminMod->get_last_scholarship_document_status_by_type($application_id, $document_id, 'admin');
													$document_status_by_corporate = $adminMod->get_last_scholarship_document_status_by_type($application_id, $document_id, 'corporate');

													if (!empty($document_status_by_subadmin)) {
														$document_status_by_subadmin_value = $document_status_by_subadmin->status;
													} else {
														$document_status_by_subadmin_value = 0;
													}
													if (!empty($document_status_by_admin)) {
														$document_status_by_admin_value = $document_status_by_admin->status;
													} else {
														$document_status_by_admin_value = 0;
													}
													if (!empty($document_status_by_corporate)) {
														$document_status_by_corporate_value = $document_status_by_corporate->status;
													} else {
														$document_status_by_corporate_value = 0;
													}
													?>
													<tr>
														<th><?php echo $get_document_detail->name; ?></th>
														<th><a href="<?php echo URLROOT ?>/uploads/<?php echo $explode_get_document_uploaded_by_user[$document_count] ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a></th>
														<th>
															<?php if ($document_status_by_subadmin_value == 1) { ?>
																<button type="button" class="btn btn-circle btn-success"><i class=" fa fa-plus-circle"></i> Verified </button>
															<?php } elseif ($document_status_by_subadmin_value == 7) { ?>
																<button type="button" class="btn btn-circle btn-danger"><i class=" fa fa-plus-circle"></i> Rejected </button>
															<?php } else { ?>
																<button type="button" class="btn btn-circle btn-secondary"><i class=" fa fa-plus-circle"></i> NotVerified <i class="fas fa-arrow-right"></i>


																	<?php if ($document_status_by_subadmin_value == 0) {
																		echo "Pending";
																	} elseif ($document_status_by_subadmin_value == 2) {
																		echo "InCorrect";
																	} elseif ($document_status_by_subadmin_value == 3) {
																		echo "Missing";
																	} elseif ($document_status_by_subadmin_value == 4) {
																		echo "Blurred";
																	} elseif ($document_status_by_subadmin_value == 5) {
																		echo "Verified";
																	} elseif ($document_status_by_subadmin_value == 6) {
																		echo "Ineligible";
																	}  ?>


																</button>
															<?php } ?>

														</th>
														<th>
															<?php if ($document_status_by_admin_value == 1) { ?>
																<button type="button" class="btn btn-circle btn-success"><i class=" fa fa-plus-circle"></i> Verified </button>
															<?php } elseif ($document_status_by_admin_value == 7) { ?>
																<button type="button" class="btn btn-circle btn-danger"><i class=" fa fa-plus-circle"></i> Rejected </button>
															<?php } else { ?>
																<button type="button" class="btn btn-circle btn-secondary"><i class=" fa fa-plus-circle"></i> NotVerified <i class="fas fa-arrow-right"></i>


																	<?php if ($document_status_by_admin_value == 0) {
																		echo "Pending";
																	} elseif ($document_status_by_admin_value == 2) {
																		echo "InCorrect";
																	} elseif ($document_status_by_admin_value == 3) {
																		echo "Missing";
																	} elseif ($document_status_by_admin_value == 4) {
																		echo "Blurred";
																	} elseif ($document_status_by_admin_value == 5) {
																		echo "Verified";
																	} elseif ($document_status_by_admin_value == 6) {
																		echo "Ineligible";
																	}  ?>


																</button>
															<?php } ?>

														</th>
														<th>
															<?php if ($document_status_by_corporate_value == 1) { ?>
																<button type="button" class="btn btn-circle btn-success"><i class=" fa fa-plus-circle"></i> Verified </button>
															<?php } elseif ($document_status_by_corporate_value == 7) { ?>
																<button type="button" class="btn btn-circle btn-danger"><i class=" fa fa-plus-circle"></i> Rejected </button>
															<?php } else { ?>
																<button type="button" class="btn btn-circle btn-secondary"><i class=" fa fa-plus-circle"></i> NotVerified <i class="fas fa-arrow-right"></i>


																	<?php if ($document_status_by_corporate_value == 0) {
																		echo "Pending";
																	} elseif ($document_status_by_corporate_value == 2) {
																		echo "InCorrect";
																	} elseif ($document_status_by_corporate_value == 3) {
																		echo "Missing";
																	} elseif ($document_status_by_corporate_value == 4) {
																		echo "Blurred";
																	} elseif ($document_status_by_corporate_value == 5) {
																		echo "Verified";
																	} elseif ($document_status_by_corporate_value == 6) {
																		echo "Ineligible";
																	}  ?>


																</button>
															<?php } ?>

														</th>
														<th>
															<?php
															if ($_SESSION['rexkod_oodles_login_type'] == "subadmin_scholarship") {
																$document_status_value = $document_status_by_subadmin_value;
															} elseif ($_SESSION['rexkod_oodles_login_type'] == "admin") {
																$document_status_value = $document_status_by_admin_value;
															} elseif ($_SESSION['rexkod_oodles_login_type'] == "corporate") {
																$document_status_value = $document_status_by_corporate_value;
															}
															?>

															<select name="document_status" class="form-control">
																<option value="0" <?php if ($document_status_value == 0) {
																						echo "selected";
																					} ?>>Pending</option>
																<option value="1" <?php if ($document_status_value == 1) {
																						echo "selected";
																					} ?>>Correct</option>
																<option value="2" <?php if ($document_status_value == 2) {
																						echo "selected";
																					} ?>>InCorrect</option>
																<option value="3" <?php if ($document_status_value == 3) {
																						echo "selected";
																					} ?>>Missing</option>
																<option value="4" <?php if ($document_status_value == 4) {
																						echo "selected";
																					} ?>>Blurred</option>
																<option value="5" <?php if ($document_status_value == 5) {
																						echo "selected";
																					} ?>>Not Verified</option>
																<option value="6" <?php if ($document_status_value == 6) {
																						echo "selected";
																					} ?>>Ineligible</option>
																<option value="7" <?php if ($document_status_value == 7) {
																						echo "selected";
																					} ?>>Rejected</option>
															</select>
														</th>
														<th> <input type="text" name="document_comment" placeholder="Your comment" class="form-control input-height" /></th>
														<th><button type="submit" name="submit" class="btn btn-primary">Submit</button></th>
													</tr>

												</form>


										<?php

										

											$count++;
											$document_count++;
										}
										?>
									</table>
								<?php } else {  ?>
									<p>Pending</p>
								<?php } ?>





								<h6>Document Verfication Log Status</h6>
								<style>
									table {
										border-collapse: collapse;
										width: 100%;
									}

									thead {
										background-color: #ddd;
									}

									th,
									td {
										border: 1px solid #ddd;
										padding: 8px;
										text-align: left;
									}

									th {
										font-weight: bold;
									}

									tr:nth-child(even) {
										background-color: #f2f2f2;
									}
								</style>
								<table>
									<thead>
										<tr>
											<th>No.</th>
											<th>Action</th>
											<th>Created by</th>
											<th>Comment</th>
											<th>Created At</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 0; ?>

										<?php foreach ($get_scholarship_document_status as $student_status) {
											$get_document_by_id = $adminMod->get_document_by_id($student_status->doc_id);
											$count++;
											// $get_default_scholarship_status = $adminMod->get_single_default_scholarship_status($student_status->status);
										?>
											<tr>
												<td><?php echo $count; ?></td>




												<td><?php echo $get_document_by_id->name; ?> status has been changed to <?php if ($student_status->status == 1) {
																															echo "Correct";
																														} elseif ($student_status->status == 2) {
																															echo "InCorrect";
																														} elseif ($student_status->status == 0) {
																															echo "Pending";
																														} elseif ($student_status->status == 3) {
																															echo "Missing";
																														} elseif ($student_status->status == 4) {
																															echo "Blurred";
																														} elseif ($student_status->status == 5) {
																															echo "Not Verified";
																														} elseif ($student_status->status == 6) {
																															echo "Ineligible";
																														} elseif ($student_status->status == 7) {
																															echo "Rejected";
																														} ?>. </td>

												<td><?php if ($student_status->created_by == 1) {
														echo "Admin";
													} elseif (($student_status->created_by == 0) && ($student_status->created_by_type == "admin")) {
														echo "Admin";
													} elseif (($student_status->created_by == 0) && ($student_status->created_by_type == "subadmin")) {
														echo "Subadmin";
													} elseif (($student_status->created_by == 0) && ($student_status->created_by_type == "corporate")) {
														echo "Corporate";
													} else {
														$get_auth_detail = $adminMod->get_auth_detail($student_status->created_by);
														if ($get_auth_detail->type == "subadmin_scholarship") {
															echo "Subadmin";
														} elseif ($get_auth_detail->type == "corporate") {
															echo "Corporate";
														}
													}; ?></td>
												<td><?php echo $student_status->comment; ?></td>
												<td><?php


													echo $formatted_time = date('d-m-Y H:i:s', strtotime($student_status->created_at));  ?></td>




											</tr>
										<?php } ?>
									</tbody>
								</table>


								<!-- <p>
										<button class="btn red" type="submit"> Proceed </button>
									</p> -->

							</div>
							<div class="tab-pane <?php if ($page_id == 5) {
														echo 'active';
													} ?>" id="borderBox_tab3">
								<form action="<?php echo URLROOT ?>/admin/scholarship_app_remark/<?php echo $get_scholarship_application->id ?>" method="POST">
									<div class="form-group row">
										<label class="col-sm-6 control-label">Remarks</label>
										<div class="col-sm-6">
											<input type="text" name="remark" class="form-control" placeholder="Enter Remark for the respective student">
										</div>
									</div>



									<p>
										<button class="btn blue-bgcolor" type="submit"> Post Remark </button>
									</p>

								</form>
								<div class="form-group row">
									<label class="col-sm-6 control-label">Posted Remarks</label>
									<div class="col-sm-6">

										<ul>

											<?php $remark = $get_scholarship_application->remark; ?>
											<?php if (!empty($remark)) { ?>

												<?php $array = explode('|||||', $remark);
												foreach ($array as $value) { ?>
													<li><?php echo $value ?>
													<?php	} ?>
												<?php } else { ?>
													No remarks
												<?php  } ?>
										</ul>

									</div>
								</div>
							</div>
							<div class="tab-pane <?php if ($page_id == 6) {
														echo 'active';
													} ?>" id="borderBox_tab4">
								<?php if (($get_scholarship_application->documents !== Null)) { ?>
									<form action="<?php echo URLROOT ?>/admin/scholarship_app_grant_money/<?php echo $get_scholarship_application->id ?>" method="POST" onkeydown="return event.key != 'Enter';">
										<div class="form-group row">
											<label class="col-sm-6 control-label">Enter Dispersement Amount</label>
											<div class="col-sm-6">
												<input type="number" name="dispersement" class="form-control" placeholder="Enter Dispersement Amount">
											</div>
											<div class="col-sm-4"></div>
											<div class="col-sm-6">
												<?php if ($get_scholarship_application->status == 2) {  ?>
													<button class="btn blue-bgcolor" name="grant" type="submit">Grant </button>
												<?php } ?>
												<?php if (($get_scholarship_application->status == 0) || ($get_scholarship_application->status == 1) || ($get_scholarship_application->status == 2)) { ?>
													<button class="btn warning" name="reject" type="submit">Reject </button>
												<?php } ?>
											</div>
										</div>
										<?php if ($get_scholarship_application->status == 3) { ?>
											<p style="color:green;">The scholarship has already been granted!</p>
										<?php 				} elseif ($get_scholarship_application->status == 4) { ?>
											<p style="color:red;">The scholarship has been rejected!</p>
										<?php	} ?>
									<?php } else {  ?>
										<p>Pending</p>
									<?php } ?>
									</form>
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
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>

<script type="text/javascript">
	function noenter() {
		return !(window.event && window.event.keyCode == 13);
	}
</script>
<script src="<?php echo URLROOT ?>/assets/plugins/dropzone/dropzone.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/dropzone/dropzone-call.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.flash.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/jszip.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/pdfmake.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/vfs_fonts.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.html5.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.print.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/table/table_data.js"></script>
<script>
	CKEDITOR.replace('oodles_editor1', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>
<!-- ------------- -->
<script>
	// Get the form and checkbox elements
	const form = document.getElementById('todo-form');
	const checkbox = document.getElementById('todo-check');

	// Add an event listener to the checkbox to submit the form when it's clicked
	checkbox.addEventListener('click', function() {
		form.submit();
	});

	function numberOnly(id) {
		let input = document.getElementById(id);
		let value = input.value;
		if (value.length > input.maxLength) {
			input.value = value.substring(0, input.maxLength);
		}
	}
</script>