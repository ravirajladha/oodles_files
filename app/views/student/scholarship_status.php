<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>
<?php
$get_scholarship_application = $data['get_scholarship_application'];
$application_id = $get_scholarship_application->id;
$corporateMod = new Corporates;
$get_scholarship = $corporateMod->get_ind_scholarship($get_scholarship_application->scholarship_id);
$studentMod = new Students;
$adminMod = new Admins;
$student_id = $get_scholarship_application->student_id;
$get_auth_detail = $adminMod->get_auth_detail($get_scholarship_application->student_id);
$get_scholarship_data = $studentMod->get_scholarship_detail($get_scholarship_application->scholarship_id);
$student = $studentMod->get_class_by_id($get_scholarship_application->student_id);
$student_detail = $adminMod->get_current_student($get_scholarship_application->student_id);
$get_class_detail_single = $adminMod->get_class_detail_single($student->class);
$status_detail = $adminMod->get_single_default_scholarship_status($get_scholarship_application->status);

?>
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
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Scholarship Status</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
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
							
								<div class="uppercase profile-stat-title" style="font-size:14px;">Scholarship Name: <?php echo  $get_scholarship_data->name;?> </div>
								<div class="uppercase profile-stat-title" style="font-size:14px;">Class: <?php echo $get_class_detail_single->class_name; ?></div>
								<div class="uppercase profile-stat-title" style="font-size:14px;">deadline : <?php echo date('d-m-y', strtotime($get_scholarship_data->end_date)); ?></div>

							</div>

							<div class="col-md-4 col-sm-4 col-6">
								<div class="uppercase profile-stat-title" style="font-size:14px;">Application No.: <?php echo $get_scholarship_application->id; ?> </div>
								<div class="uppercase profile-stat-title" style="font-size:14px;">Application Status:
                  <?php if($get_scholarship_application->status==0){echo "Penging";}else{
    echo $status_detail->status;
}?></div>
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
								<a href="#borderBox_tab1" data-bs-toggle="tab" class="active" > Application </a>
							</li>
							<li class="nav-item">
								<a href="#borderBox_tab2" data-bs-toggle="tab" >Verification </a>
							</li>
							<li class="nav-item">
								<a href="#borderBox_tab3" data-bs-toggle="tab"> Proccessing </a>
							</li>
							<li class="nav-item">
								<a href="#borderBox_tab4" data-bs-toggle="tab"> Granted </a>
							</li>
						</ul>
					</div>
					<div class="borderBox-body">
						<div class="tab-content">
							<div class="tab-pane active" id="borderBox_tab1">
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
<!-- end_resume -->

          <div class="text-right">

		  <!-- <a href="<?php echo URLROOT; ?>/student/resume_printout/<?php echo $student_id ; ?>" target="_blank">      <button class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button></a> -->
      <a href="<?php echo URLROOT; ?>/student/resume2/<?php echo $student_id ; ?>" target="_blank">      <button class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button></a>
          </div>

        </div>


							</div>
							<div class="tab-pane " id="borderBox_tab2">

								<?php if ($get_scholarship_application->documents !== Null) { ?>
									<?php
									$all_documents_required = explode(',', $get_scholarship->documents_required); //1,2
									$get_document_to_be_uploaded_by_user = $get_scholarship_application->document_ids; //1,2
									$explode_get_document_to_be_uploaded_by_user = explode(',', $get_document_to_be_uploaded_by_user);
									$explode_get_document_uploaded_by_user = explode(',', $get_scholarship_application->documents);

									// $combine = array_combine($all_critieria,$get_criteria_answer_by_user);
									$student_class = $student->class;
									// $get_document_to_be_uploaded_by_user = explode(',', $get_document_to_be_uploaded_by_user);
									$document_count = 0;

									$count = 0;
					

									?>
									<table>
										<tr>
											<th>Name</th>
											<th>Doc</th>
											<th>First stage</th>
											<th>Second stage</th>
											<th>Third Status</th>
											<th>Re-upload Document </th>
											<th>Action</th>
										</tr>
										<?php
                    $all_document_verified_flag=0;
                    $all_document_verified_admin=0;
                    $all_document_verified_subadmin=0;
                    $all_document_verified_corporate=0;

										foreach ($explode_get_document_to_be_uploaded_by_user as $document_id) {
                     
										
								
												$get_document_detail = $studentMod->get_scholarship_document_detail($document_id);
										?>

												<form action="<?php echo URLROOT ?>/student/update_scholarship_document/<?php echo $application_id ?>" method='POST' id="myForm" enctype="multipart/form-data" autocomplete="OFF">
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
															<?php if ($document_status_by_subadmin_value == 1) {
                                $all_document_verified_subadmin ++;
                                ?>
																<button type="button" class="btn btn-circle btn-success"><i class=" fa fa-plus-circle"></i> Verified </button>
															<?php } elseif ($document_status_by_subadmin_value == 7) { ?>
																<button type="button" class="btn btn-circle btn-danger"><i class=" fa fa-plus-circle"></i> Rejected </button>
															<?php } else { ?>
																<button type="button" class="btn btn-circle btn-secondary"><i class=" fa fa-plus-circle"></i> NotVerified ->

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
															<?php if ($document_status_by_admin_value == 1) {
                                $all_document_verified_admin++;
                                ?>
																<button type="button" class="btn btn-circle btn-success"><i class=" fa fa-plus-circle"></i> Verified </button>
															<?php } elseif ($document_status_by_admin_value == 7) { ?>
																<button type="button" class="btn btn-circle btn-danger"><i class=" fa fa-plus-circle"></i> Rejected </button>
															<?php } else { ?>
																<button type="button" class="btn btn-circle btn-secondary"><i class=" fa fa-plus-circle"></i> NotVerified ->

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
																<button type="button" class="btn btn-circle btn-secondary"><i class=" fa fa-plus-circle"></i> NotVerified ->

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

														<th> <input type="file" name="<?php echo $document_id; ?>" class="form-control input-height" /></th>
														<?php if(($document_status_by_corporate_value == 1) &&  ($document_status_by_corporate_value == 1) && ($document_status_by_corporate_value == 1)){ ?>
															<th><button type="submit" name="submit" class="btn btn-secondary">Submit Disabled</button></th>
														<?php }else{ ?>
															<th><button type="submit" name="submit" class="btn btn-primary">Submit</button></th>
															<?php } ?>
													
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

                <?php if ($all_document_verified_admin == count($explode_get_document_to_be_uploaded_by_user) && $all_document_verified_subadmin == count($explode_get_document_to_be_uploaded_by_user)){
                  ?>
                  <div class="text-center"> 
                  <p class="text-success">All documents are verified. Please pay the convinience fee for further process.</p>
                      <form method="post" action="<?php echo URLROOT; ?>/student/scholarship_pay" enctype="multipart/form-data" autocomplete="OFF">
                      <div class="row">
                        
                        <input type="hidden" class="form-control" name="amount" value="<?php echo $get_scholarship_data->student_charge; ?>" >
                        
                        
                        <button class="btn btn-primary">Pay now Rs.: <?php echo $get_scholarship_data->student_charge; ?></button>
                       
                      </div>
														
											</form>
                  </div>

                <?php }?>
								Note: <ul>
									<li>Student needs to reupload the document if the document status is not verified.</li>
									<li>On re-upload, all the document status will be changed to Pending by default again.</li>
									<li>Once the document has been verified, the student cant reupload the document.</li>
									<li>If the status of the document is rejected, the scholarship application will not be entertained anymore.</li>
								</ul>
							</div>
							<div class="tab-pane" id="borderBox_tab3">

								<div class="form-group row">
									<label class="control-label">Remarks</label>
									<div class="col-sm-12">

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
								<p>

								</p>
							</div>
							</form>
							<div class="tab-pane" id="borderBox_tab4">
								<?php if (($get_scholarship_application->documents !== Null)) { ?>

									<!-- <label class="col-sm-6 control-label">Enter Dispersement Amount</label> -->
									<div class="col-sm-6">
										<?php if ($get_scholarship_application->status == 3) {  ?>
											<button class="btn blue-bgcolor" name="" type="">Granted </button>
										<?php } elseif (($get_scholarship_application->status == 4)) { ?>
											<button class="btn warning" name="" type="">Rejected </button>


										<?php } else { ?>
											<button class="btn secondary" name="" type="">Pending </button>
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
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_student/footer.php'; ?>

<script type="text/javascript">
	function noenter() {
		return !(window.event && window.event.keyCode == 13);
	}
</script>