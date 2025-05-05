<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<!-- start page content -->
<?php $corporate = $data['get_corporate_detail'];
?>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Profile Detail</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Corporate</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Profile Detail</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <div class="card card-box">
                    <div class="card-head">
                        <!-- <header>ACCORDIONS</header> -->
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body" id="line-parent">
                        <div class="panel-group accordion" id="accordion3">
                            <div class="panel panel-default">
                                <div class="panel-heading panel-heading-gray">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled" data-bs-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
                                            <?php if (!empty($corporate->name)) {
                                                echo strtoupper($corporate->name);
                                            } else {
                                            } ?> </a>
                                    </h4>
                                </div>
                                <div id="collapse_3_1" class="panel-collapse in">
                                    <!-- <div class="panel-body"> -->
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">

                                            <!-- <div class="profile-sidebar"> -->
                                            <div class="card">
                                                <div class="card-head">
                                                    <header style="text-align:center;"> </header>
                                                    <p style="text-align:center;"> </p>
                                                </div>
                                                <div class="card-body no-padding height-9">
                                                    <div class="profile-desc">
                                                        <?php if (!empty($corporate->description)) {
                                                            echo $corporate->description;
                                                        } else {
                                                            echo "Nill";
                                                        ?>

                                                      
<br>
                                                        </div>
                                                        <div class="profile-desc">
                                                        <?php         } ?>
                                                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $corporate->image; ?>" alt="corporate_image" style="width:100px;height:100px;">

                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <!-- </div> -->

                                        <!-- </div> -->


                                        <div class="col-md-9 col-sm-6">
                                            <div class="borderBox light bordered card-box">
                                                <div class="borderBox-title tabbable-line">
                                                    <div class="caption">
                                                        <span class="caption-subject font-dark bold uppercase">EXPLORE TABS <i class="fas fa-chevron-right"></i></span>
                                                    </div>

                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item">
                                                            <a href="#borderBox_tab5" data-bs-toggle="tab" style="font-size: 10px;"> Corporate Information </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#borderBox_tab4" data-bs-toggle="tab" style="font-size: 10px;"> College Documents</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#borderBox_tab3" data-bs-toggle="tab" style="font-size:  10px;">Personal Information </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#borderBox_tab2" data-bs-toggle="tab" style="font-size:  10px;">Auth Documents</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#borderBox_tab1" data-bs-toggle="tab" class="active" style="font-size:  10px;"> Bank Details</a>
                                                        </li>
                                                        <!-- <li class="nav-item">
                                                            <a href="#borderBox_tab6" data-bs-toggle="tab" class="">Former Education</a>
                                                        </li> -->
                                                    </ul>

                                                </div>
                                                <div class="borderBox-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="borderBox_tab1">
                                                            <div id="biography">
                                                                <div class="row">
                                                                    <div class="col-md-3 col-6"> <strong>Bank Name</strong>
                                                                        <br>
                                                                        <p class="text-muted"><?php if (!empty($corporate->bank_name)) {
                                                                                                    echo $corporate->bank_name;
                                                                                                } else {
                                                                                                    echo "Nill";
                                                                                                } ?></p>
                                                                    </div>

                                                                    <div class="col-md-3 col-6"> <strong>Branch Name</strong>
                                                                        <br>
                                                                        <p class="text-muted"><?php if (!empty($corporate->branch_name)) {
                                                                                                    echo $corporate->branch_name;
                                                                                                } else {
                                                                                                    echo "Nill";
                                                                                                } ?></p>
                                                                    </div>

                                                                    <div class="col-md-6 col-6 b-r"> <strong>Account Number</strong>
                                                                        <br>
                                                                        <p class="text-muted"><?php if (!empty($corporate->account_no)) {
                                                                                                    echo $corporate->account_no;
                                                                                                } else {
                                                                                                    echo "Nill";
                                                                                                } ?></p>
                                                                    </div>
                                                                    <div class="col-md-3 col-6"> <strong>Name Of Institute As Per Bank Records</strong>
                                                                        <br>
                                                                        <p class="text-muted"><?php if (!empty($corporate->corporate_name_as_per_bank)) {
                                                                                                    echo $corporate->corporate_name_as_per_bank;
                                                                                                } else {
                                                                                                    echo "Nill";
                                                                                                } ?></p>
                                                                    </div>


                                                                    <div class="col-md-3 col-6"> <strong>Cancelled Cheque</strong>
                                                                        <br>
                                                                        <p class="text-muted"><?php if (!empty($corporate->cancelled_cheque)) {
                                                                                                    echo $corporate->cancelled_cheque;
                                                                                                } else {
                                                                                                    echo "Nill";
                                                                                                } ?></p>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>








                                                        <div class="tab-pane" id="borderBox_tab2">
                                                            <div id="biography">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-6 b-r"> <strong> Aadhar Of Authorized Signatory</strong>
                                                                        <br>
                                                                        <p class="text-muted">

                                                                            <?php if (isset($corporate->signatory_aadhar)) { ?>
                                                                                <a href="<?php echo URLROOT ?>/uploads/<?php echo $corporate->signatory_aadhar ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
                                                                            <?php } else { ?>
                                                                                <i class='fa-solid fa-eye-slash'></i>
                                                                            <?php
                                                                            } ?>

                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6 col-6 b-r"> <strong> Image Of Authorized Signatory</strong>
                                                                        <br>
                                                                        <p class="text-muted">
                                                                            <?php if (isset($corporate->auth_image)) { ?>
                                                                                <a href="<?php echo URLROOT ?>/uploads/<?php echo $corporate->auth_image ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
                                                                            <?php } else { ?>
                                                                                <i class='fa-solid fa-eye-slash'></i>
                                                                            <?php
                                                                            } ?>
                                                                        </p>
                                                                    </div>
                                                                </div>




                                                            </div>
                                                        </div>



                                                        <div class="tab-pane" id="borderBox_tab3">
                                                            <div class="row">

                                                                <div class="col-md-6 col-6 b-r"> <strong>Name</strong>
                                                                </div>
                                                                <div class="col-md-6 col-6 b-r">
                                                                    <span class="text-muted">
                                                                        <?php if (isset($corporate->auth_name)) { ?>
                                                                            <p><?php echo $corporate->auth_name ?></p> <?php } else {
                                                                                                                        echo "Nill";
                                                                                                                    } ?>
                                                                    </span>
                                                                </div>


                                                                <div class="col-md-6 col-6 b-r"> <strong>Designation</strong>
                                                                </div>
                                                                <div class="col-md-6 col-6 b-r">
                                                                    <span class="text-muted">
                                                                        <?php if (isset($corporate->designation)) { ?>
                                                                            <p><?php echo $corporate->designation ?></p> <?php } else {
                                                                                                                            echo "Nill";
                                                                                                                        } ?>
                                                                    </span>
                                                                </div>

                                                                <div class="col-md-6 col-6 b-r"> <strong>Aadhar Number</strong>
                                                                </div>
                                                                <div class="col-md-6 col-6 b-r">
                                                                    <span class="text-muted">
                                                                        <?php if (isset($corporate->auth_aadhar_no)) { ?>
                                                                            <p><?php echo $corporate->auth_aadhar_no ?></p> <?php } else {
                                                                                                                            echo "Nill";
                                                                                                                        } ?>
                                                                    </span>
                                                                </div>

                                                                <div class="col-md-6 col-6 b-r"> <strong>Email-Id</strong>
                                                                </div>
                                                                <div class="col-md-6 col-6 b-r">
                                                                    <span class="text-muted">
                                                                        <?php if (isset($corporate->auth_email)) { ?>
                                                                            <p><?php echo $corporate->auth_email ?></p> <?php } else {
                                                                                                                        echo "Nill";
                                                                                                                    } ?>
                                                                    </span>
                                                                </div>

                                                                <div class="col-md-6 col-6 b-r"> <strong>Enter Password</strong>
                                                                </div>
                                                                <div class="col-md-6 col-6 b-r">
                                                                    <span class="text-muted">
                                                                        <?php if (isset($corporate->password)) { ?>
                                                                            <p><?php echo $corporate->password ?></p> <?php } else {
                                                                                                                        echo "Nill";
                                                                                                                    } ?>
                                                                    </span>
                                                                </div>

                                                                <div class="col-md-6 col-6 b-r"> <strong>Contact Number</strong>
                                                                </div>
                                                                <div class="col-md-6 col-6 b-r">
                                                                    <span class="text-muted">
                                                                        <?php if (isset($corporate->auth_contact_number)) { ?>
                                                                            <p><?php echo $corporate->auth_contact_number ?></p> <?php } else {
                                                                                                                                    echo "Nill";
                                                                                                                                } ?>
                                                                    </span>
                                                                </div>

                                                                <div class="col-md-6 col-6 b-r"> <strong>First Contact Person(Name)</strong>
                                                                </div>
                                                                <div class="col-md-6 col-6 b-r">
                                                                    <span class="text-muted">
                                                                        <?php if (isset($corporate->auth_contact_person)) { ?>
                                                                            <p><?php echo $corporate->auth_contact_person ?></p> <?php } else {
                                                                                                                        echo "Nill";
                                                                                                                    } ?>
                                                                    </span>
                                                                </div>

                                                                <div class="col-md-6 col-6 b-r"> <strong>Contact Person Designation</strong>
                                                                </div>
                                                                <div class="col-md-6 col-6 b-r">
                                                                    <span class="text-muted">
                                                                        <?php if (isset($corporate->contact_person_designation)) { ?>
                                                                            <p><?php echo $corporate->contact_person_designation ?></p>
                                                                        <?php } else {
                                                                            echo "Nill";
                                                                        } ?>
                                                                    </span>
                                                                </div>

                                                                <div class="col-md-6 col-6 b-r"> <strong>Contact Person Details</strong>
                                                                </div>
                                                                <div class="col-md-6 col-6 b-r">
                                                                    <span class="text-muted">
                                                                        <?php if (isset($corporate->contact_person_details)) { ?>
                                                                            <p><?php echo $corporate->contact_person_details ?></p> <?php } else {
                                                                                                                                    echo "Nill";
                                                                                                                                } ?>
                                                                    </span>
                                                                </div>

                                                            </div>


                                                        </div>




                                                        <div class="tab-pane" id="borderBox_tab4">
                                                            <div id="biography">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-6 b-r"> <strong>MOU</strong>
                                                                        <br>
                                                                        <p class="text-muted"><?php if (isset($corporate->mou)) { ?>
                                                                                <a href="<?php echo URLROOT ?>/uploads/<?php echo $corporate->mou ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
                                                                            <?php } else { ?>
                                                                                <i class='fa-solid fa-eye-slash'></i>
                                                                            <?php
                                                                                                } ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r"> <strong>NDA</strong>
                                                                        <br>
                                                                        <p class="text-muted"><?php if (isset($corporate->nda)) { ?>
                                                                                <a href="<?php echo URLROOT ?>/uploads/<?php echo $corporate->nda ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
                                                                            <?php } else { ?>
                                                                                <i class='fa-solid fa-eye-slash'></i>
                                                                            <?php
                                                                                                } ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r"> <strong>Declaration Form</strong>
                                                                        <br>
                                                                        <p class="text-muted">


                                                                            <?php if (isset($corporate->declaration_form)) { ?>
                                                                                <a href="<?php echo URLROOT ?>/uploads/<?php echo $corporate->declaration_form ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
                                                                            <?php } else { ?>
                                                                                <i class='fa-solid fa-eye-slash'></i>
                                                                            <?php
                                                                            } ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6 col-6"> <strong>Other Documents</strong>
                                                                        <br>
                                                                        <p class="text-muted"> <?php if (isset($corporate->other_document)) { ?>
                                                                                <a href="<?php echo URLROOT ?>/uploads/<?php echo $corporate->other_document ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
                                                                            <?php } else { ?>
                                                                                <i class='fa-solid fa-eye-slash'></i>
                                                                            <?php
                                                                                                } ?>
                                                                        </p>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>



                                                        <div class="tab-pane" id="borderBox_tab5">
                                                            <div id="biography">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-6 b-r"> <strong>Type of Entity</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->entity_type)) { ?>
                                                                                <p>
                                                                                    <?php if ($corporate->entity_type == 1) {
                                                                                        echo "Education Fund Provider";
                                                                                    } elseif ($corporate->entity_type == 1) {
                                                                                        echo "Individual";
                                                                                    } ?>
                                                                                </p> <?php } else {
                                                                                        echo "Nill";
                                                                                    } ?>
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r"> <strong>Name</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->name)) { ?>
                                                                                <p><?php echo $corporate->name ?></p> <?php } else {
                                                                                                                        echo "Nill";
                                                                                                                    } ?>
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r"> <strong>Description</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->description)) { ?>
                                                                                <p><?php echo $corporate->description ?></p> <?php } else {
                                                                                                                                echo "Nill";
                                                                                                                            } ?>
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-6 col-6 b-r"> <strong>Type Of Organization</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->organization)) { ?>
                                                                                <p><?php if ($corporate->organization == 1) {
    echo "Artificial Juridical Person";
} elseif ($corporate->organization == 2) {
    echo "Associate of Persons";
} elseif ($corporate->organization == 3) {
    echo "Body of Individuals";
} elseif ($corporate->organization == 4) {
    echo "Government Organization";
} elseif ($corporate->organization == 5) {
    echo "Hindu Undivided Family";
} elseif ($corporate->organization == 6) {
    echo "Institute";
} elseif ($corporate->organization == 7) {
    echo "LLP";
} elseif ($corporate->organization == 8) {
    echo "Local Authority";
} elseif ($corporate->organization == 9) {
    echo "Partnership Firm";
} elseif ($corporate->organization == 10) {
    echo "Private Limited Company";
} elseif ($corporate->organization == 11) {
    echo "Proprietor";
} elseif ($corporate->organization == 12) {
    echo "Public Limited Company";
} elseif ($corporate->organization == 13) {
    echo "Trust";
} elseif ($corporate->organization == 14) {
    echo "Others";
}?></p> <?php } else {
                                                                                                                                echo "Nill";
                                                                                                                            } ?>
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-6 col-6 b-r"> <strong>Trust Type</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->trust_type)) { ?>
                                                                                <p><?php echo $corporate->trust_type ?></p> <?php } else {
                                                                                                                            echo "Nill";
                                                                                                                        } ?>
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-6 col-6 b-r"> <strong>Trust Name</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->trust_name)) { ?>
                                                                                <p><?php echo $corporate->trust_name ?></p> <?php } else {
                                                                                                                            echo "Nill";
                                                                                                                        } ?>
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-6 col-6 b-r"> <strong>Address Line-1</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->address_1)) { ?>
                                                                                <p><?php echo $corporate->address_1 ?></p> <?php } else {
                                                                                                                            echo "Nill";
                                                                                                                        } ?>
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-6 col-6 b-r"> <strong>Address Line-2</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->address_2)) { ?>
                                                                                <p><?php echo $corporate->address_2 ?></p>
                                                                            <?php } else {
                                                                                echo "Nill";
                                                                            } ?>
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-6 col-6 b-r"> <strong>State</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->state)) { ?>
                                                                                <p><?php echo $corporate->state ?></p>
                                                                            <?php } else {
                                                                                echo "Nill";
                                                                            } ?>
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-6 col-6 b-r"> <strong>City</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->city)) { ?>
                                                                                <p><?php echo $corporate->city ?></p>
                                                                            <?php } else {
                                                                                echo "Nill";
                                                                            } ?>
                                                                        </span>
                                                                    </div>

                                                                    <div class="col-md-6 col-6 b-r"> <strong>PinCode</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->pincode)) { ?>
                                                                                <p><?php echo $corporate->pincode ?></p>
                                                                            <?php } else {
                                                                                echo "Nill";
                                                                            } ?>
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r"> <strong>Website Url</strong>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 b-r">
                                                                        <span class="text-muted">
                                                                            <?php if (isset($corporate->url)) { ?>
                                                                                <p><?php echo $corporate->url ?>
                                                                            <?php if($corporate->website_check==1){echo "(Visible)";}else{echo "(Hidden)";} ?>
                                                                            </p>
                                                                            <?php } else {
                                                                                echo "Nill";
                                                                            } ?>
                                                                        </span>
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


            </div>
        </div>
    </div>
</div>
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>