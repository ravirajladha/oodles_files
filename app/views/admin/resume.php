<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<?php
$student_detail_id  = 102;
$adminMod = new admins;
$student_detail_detail = $adminMod->get_current_student($student_detail_id);
$student_detail_detailMod = new Students;
?>
<style>
  body {
    font-family: Arial, sans-serif;
  }

  .container {
    margin: auto;
    max-width: 800px;
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
<!-- start page content -->
<div class="page-content-wrapper">
  <div class="page-content">

    <div class="row">
      <div class="col-md-12">
        <div class="white-box">

          <!--| ABOUT |--------------------------------------------------->
          <section id="about" class="container">
            <div class="row">
              <div class="col-md-6">
                <img src="<?php echo URLROOT; ?>/uploads/<?php echo $student_detail_detail->student_image; ?>" style="height:200px;width:200px;">
                <!-- <h6 class="display-4"><?php echo $student_detail_detail->f_name . " " . $student_detail_detail->l_name; ?></h6> -->
              </div>
              <div class="col-md-6">
                <address style="float:right;">
                  <p class="addr-font-h3">Student</p>
                  <p class="font-bold addr-font-h4"><?php echo $student_detail_detail->f_name . " " . $student_detail_detail->l_name; ?></p>
                  <p class="text-muted m-l-30">
                    <?php if (!empty($student_detail_detail->comm_address)) {
                      echo $student_detail_detail->comm_address;
                    } else {
                      echo "Nill";
                    } ?>&nbsp;<?php if (!empty($student_detail_detail->comm_village)) {
                                                                        echo $student_detail_detail->comm_village;
                                                                      } else {
                                                                        echo "Nill";
                                                                      } ?>&nbsp;<?php if (!empty($student_detail_detail->comm_block)) {
                                                                              echo $student_detail_detail->comm_block;
                                                                            } else {
                                                                              echo "Nill";
                                                                            } ?>&nbsp;<?php if (!empty($student_detail_detail->comm_pin_code)) {
                                                                                    echo $student_detail_detail->comm_pin_code;
                                                                                  } else {
                                                                                    echo "Nill";
                                                                                  } ?></p>
                  </p>
                  <p class="m-t-30">
                    <b>DOB :</b> <i class="fa fa-calendar"></i> <?php if (empty($student_detail_detail->dob)) {
                                                                  $dob = "dd/mm/yy";
                                                                  echo $dob;
                                                                } else {
                                                                  echo $dob = date("d/m/y", strtotime($student_detail_detail->dob));
                                                                }
                                                                ?>
                  </p>
                  <p style="margin-bottom:0px;"><b>Gender :</b> <?php if (!empty($student_detail_detail->gender)) {
                                                                  echo $student_detail_detail->gender;
                                                                } else {
                                                                  echo "Nill";
                                                                } ?> </p>
                  <p style="margin-bottom:0px;"><b>Religion :</b> <?php if (!empty($student_detail_detail->religion)) {
                                                                    echo $student_detail_detail->religion;
                                                                  } else {
                                                                    echo "Nill";
                                                                  } ?> </p>
                  <p style="margin-bottom:0px;"><b>Category :</b> <?php if (!empty($student_detail_detail->category)) {
                                                                    echo $student_detail_detail->gender;
                                                                  } else {
                                                                    echo "Nill";
                                                                  } ?> </p>

                </address>
              </div>
              <p>
              <strong>About:</strong>

                <?php if (!empty($student_detail_detail->description)) {
                  echo ucwords($student_detail_detail->description);
                } else {
                  echo "Nill";
                }
                ?>

              </p>
              <p>
                <strong>Achievements:</strong>
                <?php
                $values = explode(",", $student_detail_detail->achievements);

                foreach ($values as $value) {
                  if (empty($value)) {
                    echo "Null\n";
                  } else {
                ?>
                    <span class="badge badge-info"><?php echo ucwords($value); ?></span>
                <?php
                  }
                }
                ?>



              </p>
          </section>

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

          <!-- CONTACT ----------------------------------------------------->

          <section class="container" id="contact">
          <table class="table table-striped" style="background-color: #F2F2F2; border: none; border-collapse: collapse;">
  <thead>
  <thead>
    <tr>
      <th>Phone</th>
      
      <td><?php if (!empty($student_detail_detail->f_phone)) {
                                      echo $student_detail_detail->f_phone;
                                    } else {
                                      echo "Nill";
                                    } ?></td>
    </tr>
  </thead>
  <tbody>
    <tr>
    <th>Whatsapp</th>
      
    <td><?php if (!empty($student_detail_detail->whatsapp_no)) {
                                      echo $student_detail_detail->whatsapp_no;
                                    } else {
                                      echo "Nill";
                                    } ?></td>
 
    </tr>
    <tr>
    <th>Email</th>
    
      <td><a href="">student@gmail.com</a></td>

    </tr>
  </tbody>
</table>

            <!-- <div class="row">
              <div class="col-sm-12"><strong>Contact</strong></div>
              </div>
            <div class="row">
              <div class="col-sm-6">Phone:</div>
              <div class="col-sm-6"></div>
            </div>
            <div class="row">
              <div class="col-sm-6">Whatsapp:</div>
              <div class="col-sm-6"><?php if (!empty($student_detail_detail->whatsapp_no)) {
                                      echo $student_detail_detail->whatsapp_no;
                                    } else {
                                      echo "Nill";
                                    } ?></div>
            </div>
            <div class="row">
              <div class="col-sm-6">Email:</div>
              <div class="col-sm-6"><a href="">student@gmail.com</a></div>
            </div> -->
                               
          </section>


          <div class="text-right">

          <a href="<?php echo URLROOT; ?>/admin/resume_printout">  <button  class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button></a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<!-- end page content -->

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>