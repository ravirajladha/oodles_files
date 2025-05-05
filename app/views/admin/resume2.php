<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OodlesIN Resume</title>
    <link rel="stylesheet" href="Resume.css" />
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- favicon -->
	<link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/img/favicon.ico" />
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
$studentModel =new Students;
    $student = $data['student_details'];
    $get_auth_detail_by_id = $studentModel->get_auth_detail_by_id($student->id);
    
    ?>
    <?php
$student_detail_id  = $data['student_id'];
$adminMod = new admins;
$student_detail_detail = $adminMod->get_current_student($student_detail_id);
$student_detail_detailMod = new Students;
?>
  </head>
  <body>
    <div class="container col-md-offset-2 col-md-8 p-4" id="Wrapper" style="border: solid 2px;">
      <div id="header">
        <div>
          <img src="<?php echo URLROOT; ?>/uploads/<?php echo $student->student_image; ?>" alt="" id="Image" />
        </div>
        <div>
          <h2 id="Name"><?php echo $student->f_name. " " . $student->l_name; ?></h2>
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
                            <h6>No. of siblings :</h6> <span>&nbsp;<?php echo $student->siblings; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Annual Income :</h6> <span>&nbsp;<?php echo $student->annual_income; ?></span>
                        </div>
                        <div class="col-lg-6">
                        <h5>Father's Details</h5>
                        <div class="row">
                        <div class="col-lg-12 d-flex">
                            <h6>Name as per Aadhar :</h6> <span>&nbsp;<?php echo $student->father_name; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Aadhar Number :</h6> <span>&nbsp;<?php echo $student->f_aadhar; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Phone Number :</h6> <span>&nbsp;<?php echo $student->f_phone; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Email Id :</h6> <span>&nbsp;<?php echo $student->f_email_id; ?></span>
                        </div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="row">
                        <h5>Mother's Details</h5>
                        <div class="col-lg-12 d-flex">
                            <h6>Name as per Aadhar :</h6> <span>&nbsp;<?php echo $student->mother_name; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Aadhar Number :</h6> <span>&nbsp;<?php echo $student->m_aadhar; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Phone Number :</h6> <span>&nbsp;<?php echo $student->m_phone; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Email Id :</h6> <span>&nbsp;<?php echo $student->m_email_id; ?></span>
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
                            <h6>Communication Address :</h6> <span>&nbsp;<?php echo $student->comm_address; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>PIN Code :</h6> <span>&nbsp;<?php echo $student->comm_pin_code; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Village/Area/Locality :</h6> <span>&nbsp;<?php echo $student->comm_village; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Block/Taluk/Town :</h6> <span>&nbsp;<?php echo $student->comm_block; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>State :</h6> <span>&nbsp;<?php echo $student->comm_village; ?></span>
                        </div>
                        </div>
            </div>
            <div class="col-lg-6">
                        <h5>Permanent Address</h5>
                        <div class="row">
                        <div class="col-lg-12 d-flex">
                            <h6>Communication Address :</h6> <span>&nbsp;<?php echo $student->perm_address; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>PIN Code :</h6> <span>&nbsp;<?php echo $student->perm_pin_code; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Village/Area/Locality :</h6> <span>&nbsp;<?php echo $student->perm_village; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>Block/Taluk/Town :</h6> <span>&nbsp;<?php echo $student->perm_block; ?></span>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <h6>State :</h6> <span>&nbsp;<?php echo $student->perm_village; ?></span>
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
                            <h6>Bank Name :</h6> <span>&nbsp;<?php echo $student->bank_name; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Bank's Branch Name :</h6> <span>&nbsp;<?php echo $student->bank_branch; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>IFSC Code :</h6> <span>&nbsp;<?php echo $student->ifsc_code; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Bank Bank Passbook/Statement :</h6> <span>&nbsp;<?php echo $student->perm_village; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Account Number :</h6> <span>&nbsp;<?php echo $student->account_no; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Name as per Passbook :</h6> <span>&nbsp;<?php echo $student->name_as_per_bank; ?></span>
                        </div>
                        
          </div>
          
        </div>
        <div class="col-lg-12">
          <h4 id="Title">About Yourself</h4>
          <div class="row">
          <div class="col-lg-6 d-flex">
                            <h6>About yourself :</h6> <span>&nbsp;<?php echo $student->description; ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Hobbies  :</h6> <span>&nbsp;<?php
                            $hobbies =  explode(',', $student->hobby);
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
                            //  $achievements= explode(',', $student->achievements);
                            // foreach($achievements as $achieve){
                            //     echo $achieve .',';
                            // }
                            echo $student->achievements;
                            ?></span>
                        </div>
                        <div class="col-lg-6 d-flex">
                            <h6>Mother Tongue :</h6> <span>&nbsp;<?php echo $student->mother_tongue; ?></span>
                        </div>
                       
                        
          </div>
          
        </div>
        
           
            
      </div>
      
  </body>
</html>
