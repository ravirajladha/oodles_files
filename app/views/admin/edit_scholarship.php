<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<?php
$get_all_class = $data['get_all_class'];
$scholarship = $data['get_scholarship_data'];
?>
<style>
    .select2 {
        width: 100% !important;
    }

    .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice {
        color: #555;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        cursor: default;
        float: left;
        margin: 5px 0 0 6px;
        padding: 0 6px;
    }

    .select2-container--bootstrap .select2-selection--multiple .select2-selection__choice {
        color: #555;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        cursor: default;
        float: left;
        margin: 5px 0 0 6px;
        padding: 0 6px;
    }

    .select2-selection__choice {
        background-color: #eee !important;
        border: 1px solid #eee !important;
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    user agent stylesheet li {
        display: list-item;
        text-align: -webkit-match-parent;
    }

    .select2-container--bootstrap .select2-selection--multiple .select2-selection__rendered {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        display: block;
        line-height: 1.42857143;
        list-style: none;
        margin: 0;
        overflow: hidden;
        padding: 0;
        width: 100%;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .select2-container .select2-selection--multiple .select2-selection__rendered {
        display: inline-block;
        overflow: hidden;
        padding-left: 8px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .select2-container--bootstrap .select2-selection--multiple .select2-selection__rendered {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        display: block;
        line-height: 1.42857143;
        list-style: none;
        margin: 0;
        overflow: hidden;
        padding: 0;
        width: 100%;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .select2-container .select2-selection--multiple .select2-selection__rendered {
        display: inline-block;
        overflow: hidden;
        padding-left: 8px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    ul,
    ol {
        font-size: 14px;
        line-height: 24px;
    }

    address,
    ul,
    ol {
        font-weight: 400;
        letter-spacing: 0;
    }

    user agent stylesheet ul {
        list-style-type: disc;
    }

    .select2-container--bootstrap .select2-selection {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        color: #555;
        font-size: 14px;
        outline: 0;
    }

    .select2-container .select2-selection--multiple {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        min-height: 32px;
        user-select: none;
        -webkit-user-select: none;
    }

    .select2-container--bootstrap .select2-selection {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        color: #555;
        font-size: 14px;
        outline: 0;
    }

    .select2-container .select2-selection--multiple {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        min-height: 32px;
        user-select: none;
        -webkit-user-select: none;
    }

    .bg-info-light {
        background-color: rgb(226 62 86 / 0.1) !important;
        color: #ff9600 !important;
    }

    .btn-group-sm>.btn,
    .btn-sm {
        padding: .25rem .5rem;
        font-size: .875rem;
        border-radius: .2rem;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">

                    <div class="page-title">Edit Scholarship</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Scholarships</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add Scholarship</li>
                </ol>
            </div>
        </div>
        <!-- <?php print_r($data['get_scholarship_data']->name); ?> -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Scholarship Details</header>
                        <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </button>

                    </div>


                    <form method="post" action="<?php echo URLROOT; ?>/admin/update_scholarship/<?php echo $data['id']; ?>" enctype="multipart/form-data" autocomplete="OFF">

                        <div class="card-body row">
                            <!-- BANK DETAILS -->
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label for="list2" class="">Scholarship Name<span>*</span></label>
                                    <br>
                                    <input class="form-control mdl-textfield__input" placeholder="Enter name" type="text" id="txtTimeLength" name="name" value="<?php print_r($data['get_scholarship_data']->name); ?>">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label for="list2" class="">Select Class<span>*</span></label>
                                    <br>
                                    <select name="course[]" multiple class="form-control mdl-textfield__input select2" style="height:200px !important" required>
                                        <?php
                                        foreach ($get_all_class as $class) {
                                            $get_all_class = explode(',', $scholarship->course);
                                            $flag = 0;
                                            foreach ($get_all_class as $selected_class) {
                                                if ($selected_class == $class->id) {
                                                    $flag = 1;
                                                }
                                            }
                                        ?>
                                            <option value="<?php echo $class->id; ?>" <?php if ($flag == 1) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $class->class_name; ?></option>
                                        <?php } ?>
                                    </select>


                                </div>
                            </div>



                            <div class="col-md-3 col-sm-6">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label>Update Image <a href="<?php echo URLROOT; ?>/uploads/<?php echo $scholarship->scholarship_file; ?>"> <i class="far fa-eye"></i></a></label>
                                    <input class="form-control mdl-textfield__input" type="file" id="maxStu" name="scholarship_image">


                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label>State</label>
                                    <select name="state" class="form-control">
                                        <?php $state = $scholarship->state; ?>

                                        <option value="">Select State</option>
                                        <option value="Andhra Pradesh" <?php if ($state == "Andhra Pradesh") {
                                                                            echo "selected";
                                                                        } ?>>Andhra Pradesh</option>
                                        <option value="Andaman and Nicobar Islands" <?php if ($state == "Andaman and Nicobar Islands") {
                                                                                        echo "selected";
                                                                                    } ?>>Andaman and Nicobar Islands</option>
                                        <option value="Arunachal Pradesh" <?php if ($state == "Arunachal Pradesh") {
                                                                                echo "selected";
                                                                            } ?>>Arunachal Pradesh</option>
                                        <option value="Assam" <?php if ($state == "Assam") {
                                                                    echo "selected";
                                                                } ?>>Assam</option>
                                        <option value="Bihar" <?php if ($state == "Bihar") {
                                                                    echo "selected";
                                                                } ?>>Bihar</option>
                                        <option value="Chandigarh" <?php if ($state == "Chandigarh") {
                                                                        echo "selected";
                                                                    } ?>>Chandigarh</option>
                                        <option value="Chhattisgarh" <?php if ($state == "Chhattisgarh") {
                                                                            echo "selected";
                                                                        } ?>>Chhattisgarh</option>
                                        <option value="Dadar and Nagar Haveli" <?php if ($state == "Dadar and Nagar Haveli") {
                                                                                    echo "selected";
                                                                                } ?>>Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu" <?php if ($state == "Daman and Diu") {
                                                                            echo "selected";
                                                                        } ?>>Daman and Diu</option>
                                        <option value="Delhi" <?php if ($state == "Delhi") {
                                                                    echo "selected";
                                                                } ?>>Delhi</option>
                                        <option value="Lakshadweep" <?php if ($state == "Lakshadweep") {
                                                                        echo "selected";
                                                                    } ?>>Lakshadweep</option>
                                        <option value="Puducherry" <?php if ($state == "Puducherry") {
                                                                        echo "selected";
                                                                    } ?>>Puducherry</option>
                                        <option value="Goa" <?php if ($state == "Goa") {
                                                                echo "selected";
                                                            } ?>>Goa</option>
                                        <option value="Gujarat" <?php if ($state == "Gujarat") {
                                                                    echo "selected";
                                                                } ?>>Gujarat</option>
                                        <option value="Haryana" <?php if ($state == "Haryana") {
                                                                    echo "selected";
                                                                } ?>>Haryana</option>
                                        <option value="Himachal Pradesh" <?php if ($state == "Himachal Pradesh") {
                                                                                echo "selected";
                                                                            } ?>>Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir" <?php if ($state == "Jammu and Kashmir") {
                                                                                echo "selected";
                                                                            } ?>>Jammu and Kashmir</option>
                                        <option value="Jharkhand" <?php if ($state == "Jharkhand") {
                                                                        echo "selected";
                                                                    } ?>>Jharkhand</option>
                                        <option value="Karnataka" <?php if ($state == "Karnataka") {
                                                                        echo "selected";
                                                                    } ?>>Karnataka</option>
                                        <option value="Kerala" <?php if ($state == "Kerala") {
                                                                    echo "selected";
                                                                } ?>>Kerala</option>
                                        <option value="Madhya Pradesh" <?php if ($state == "Madhya Pradesh") {
                                                                            echo "selected";
                                                                        } ?>>Madhya Pradesh</option>
                                        <option value="Maharashtra" <?php if ($state == "Maharashtra") {
                                                                        echo "selected";
                                                                    } ?>>Maharashtra</option>
                                        <option value="Manipur" <?php if ($state == "Manipur") {
                                                                    echo "selected";
                                                                } ?>>Manipur</option>
                                        <option value="Meghalaya" <?php if ($state == "Meghalaya") {
                                                                        echo "selected";
                                                                    } ?>>Meghalaya</option>
                                        <option value="Mizoram" <?php if ($state == "Mizoram") {
                                                                    echo "selected";
                                                                } ?>>Mizoram</option>
                                        <option value="Nagaland" <?php if ($state == "Nagaland") {
                                                                        echo "selected";
                                                                    } ?>>Nagaland</option>
                                        <option value="Odisha" <?php if ($state == "Odisha") {
                                                                    echo "selected";
                                                                } ?>>Odisha</option>
                                        <option value="Punjab" <?php if ($state == "Punjab") {
                                                                    echo "selected";
                                                                } ?>>Punjab</option>
                                        <option value="Rajasthan" <?php if ($state == "Rajasthan") {
                                                                        echo "selected";
                                                                    } ?>>Rajasthan</option>
                                        <option value="Sikkim" <?php if ($state == "Sikkim") {
                                                                    echo "selected";
                                                                } ?>>Sikkim</option>
                                        <option value="Tamil Nadu" <?php if ($state == "Tamil Nadu") {
                                                                        echo "selected";
                                                                    } ?>>Tamil Nadu</option>
                                        <option value="Telangana" <?php if ($state == "Telangana") {
                                                                        echo "selected";
                                                                    } ?>>Telangana</option>
                                        <option value="Tripura" <?php if ($state == "Tripura") {
                                                                    echo "selected";
                                                                } ?>>Tripura</option>
                                        <option value="Uttar Pradesh" <?php if ($state == "Uttar Pradesh") {
                                                                            echo "selected";
                                                                        } ?>>Uttar Pradesh</option>
                                        <option value="Uttarakhand" <?php if ($state == "Uttarakhand") {
                                                                        echo "selected";
                                                                    } ?>>Uttarakhand</option>
                                        <option value="West Bengal" <?php if ($state == "West Bengal") {
                                                                        echo "selected";
                                                                    } ?>>West Bengal</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label>Application Start Date<span>*</span></label><br>
                                    <input class="form-control mdl-textfield__input" type="date" id="start_date" value="<?php echo $scholarship->start_date; ?>" name="start_date">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label>Application End Date<span>*</span></label><br>
                                    <input class="form-control mdl-textfield__input" type="date" id="end_date" value="<?php echo $scholarship->end_date; ?>" name="end_date">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label>Number of scholarships<span>*</span></label>
                                    <input class="form-control mdl-textfield__input" placeholder="Enter number" type="text" value="<?php echo $scholarship->no_of_scholarships; ?>" id="txtTimeLength" name="no_of_scholarships">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Individual Participation Fee <span>*</span></label>
									<input class="form-control mdl-textfield__input" type="number" id="text5" name="student_charge"  value="<?php echo $scholarship->student_charge; ?>"  placeholder="Enter Student Participation Fee " required>

								</div>
							</div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label>Scholarship Amount</label>
                                    <input class="form-control mdl-textfield__input" type="number" id="text5" value="<?php echo $scholarship->scholarship_amount; ?>" name="scholarship_amount" placeholder="Enter Amount">

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label>Type of Scholarship</label>
                                    <select name="type" class="form-control mdl-textfield__input">


                                        <option value="">Select Type</option>
                                        <?php foreach ($data['get_scholarship_type'] as $scholarship_type) { ?>
                                            <option value="<?php echo $scholarship_type->id ?>" <?php if ($scholarship_type->id == $scholarship->type) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $scholarship_type->scholarship_type ?></option>
                                        <?php } ?>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label>Eligibile Candidates</label>
                                    <select name="eligible_candidates" class="form-control mdl-textfield__input">


                                        <option value="0" <?php if ($scholarship->eligible_candidates == 0) {
                                                                echo "selected";
                                                            } ?>>All candidates</option>
                                        <option value="1" <?php if ($scholarship->eligible_candidates == 1) {
                                                                echo "selected";
                                                            } ?>>Girl candidates only</option>
                                        <option value="2" <?php if ($scholarship->eligible_candidates == 2) {
                                                                echo "selected";
                                                            } ?>>Boy candidates only</option>


                                    </select>

                                </div>
                            </div>


                            <div class="col-md-3 col-sm-6">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label>Scholarship Amount</label>
                                    <input class="form-control mdl-textfield__input" type="number" id="text5" name="scholarship_amount" value="<?php echo $scholarship->scholarship_amount; ?>" placeholder="Enter Amount">

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label>Offered By</label>
                                    <select name="offered_by" class="form-control" required>
                                        <option value="" readonly>-Select-</option>
                                        <?php foreach ($data['get_all_corporate'] as $corporate) { ?>
                                            <option value="<?php echo $corporate->corporate_id ?>" <?php if ($corporate->corporate_id == $scholarship->offered_by) {
                                                                                                        echo "selected";
                                                                                                    } ?>><?php echo $corporate->name ?></option>
                                        <?php  } ?>
                                    </select>

                                </div>
                            </div>


                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Contact Details</header>
                        <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </button>

                    </div>




                    <div class="card-body row">
                        <!-- BANK DETAILS -->
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>Official Website</label>
                                <input class="form-control mdl-textfield__input" type="text" placeholder="Enter offical website" id="text5" value="<?php echo $scholarship->url; ?>" name="url">
                                <label class="mdl-textfield__label" for="text5">

                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>Contact number<span>*</span></label><br>
                                <input class="form-control mdl-textfield__input" type="number" value="<?php echo $scholarship->contact_number; ?>" placeholder="Enter contact number" id="text5" name="contact_number">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>URL for detailed eligibility<span>*</span></label><br>
                                <input class="form-control mdl-textfield__input" type="text" value="<?php echo $scholarship->detailed_eligibility_url; ?>" id="text5" placeholder="Enter URL" name="detailed_eligibility_url">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>Query related Email Id<span>*</span></label><br>
                                <input class="form-control mdl-textfield__input" type="text" id="text5" value="<?php echo $scholarship->email_id; ?>" placeholder="Enter Email (for assistance)" name="email_id">
                                <label class="mdl-textfield__label" for="text5">
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-6">
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>Provide URL link to directly apply<span>*</span></label><br>
                                <input class="form-control mdl-textfield__input" type="text" id="text5" value="<?php echo $scholarship->direct_link_to_apply; ?>" placeholder="Enter direct link to apply" name="direct_link_to_apply">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>Enable/Disable<span>*</span></label><br>
                                <input type="checkbox" name="website_check" value="1" <?php if ($scholarship->website_check == 1) {
                                                                                            echo "checked";
                                                                                        } ?>>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>

        <div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Display Purpose</header>
						<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>

					</div>
						<div class="card-body row">
							<!-- BANK DETAILS -->
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Class Display</label>
									<input class="form-control mdl-textfield__input" type="text" placeholder="Enter selected class to be displayed" id="text5" name="class_display" value="<?php echo $scholarship->class_display; ?>">
									<label class="mdl-textfield__label" for="text5">

								</div>
							</div>
						</div>
				</div>
			</div>
		</div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Provide Detailed Information</header>
                        <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </button>

                    </div>
                    <div class="card-body row">
                        <!-- BANK DETAILS -->


                        <div class="col-md-6 col-sm-6">
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>Description<span>*</span></label><br>
                                <textarea rows="4" id="oodles_editor1" cols="200" style="max-width:100%;" name="description"><?php echo $scholarship->description; ?></textarea>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>Eligibility<span>*</span></label><br>
                                <textarea rows="4" id="oodles_editor2" cols="200" style="max-width:100%;" name="minimum_eligibility"><?php echo $scholarship->minimum_eligibility; ?></textarea>

                            </div>
                        </div>



                        <div class="col-md-6 col-sm-6">
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>How to apply?<span>*</span></label><br>
                                <textarea rows="4" cols="200" id="oodles_editor3" name="application_process" style="max-width:100%;"><?php echo $scholarship->application_process; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>Reservation<span>*</span></label><br>
                                <textarea rows="4" cols="200" id="oodles_editor4" name="reservation" style="max-width:100%;"><?php echo $scholarship->reservation; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <label>Instructions<span>*</span></label><br>
                                <textarea rows="4" cols="200" id="oodles_editor5" name="instructions" style="max-width:100%;"><?php echo $scholarship->instructions; ?></textarea>
                            </div>
                        </div>
                        <!-- 
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label for="exampleInputname1">Documents required for Scholarship</label>
								<select name="documents_required[]" multiple class="form-control mdl-textfield__input select2" style="height:200px !important" required>
									<?php foreach ($data['get_all_document'] as $document) { ?>
										<option value="<?php echo $document->id; ?>"><?php echo $document->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label for="exampleInputname1">Select Criteria</label>
								<select name="checkbox[]" multiple class="form-control mdl-textfield__input select2" style="height:200px !important" required>
									<?php foreach ($data['get_all_criteria'] as $criteria) { ?>
										<option value="<?php echo $criteria->id; ?>"><?php echo $criteria->criteria_name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div> -->

                    </div>



                    <div class="card-body row">




                        <div class="col-lg-6 p-t-20 text-center">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Proceed</button>
                        </div>
                        <div class="col-lg-6 col-lg-6">
                            <a href="<?php echo URLROOT; ?>/admin/all_scholarships"> <button type="button" class="btn btn-warning" style="float: right;" id="submit">Go Back</button></a>
                        </div>

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if (isset($_SESSION['success'])) { ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php }
unset($_SESSION['success']); ?>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>


<script>
    $(".checkbox").click(function() {
        if ($(".checkbox").is(':checked')) {
            $(this).parent().find('option').prop("selected", "selected");
            $(this).parent().find('option').trigger("change");
            $(this).parent().find('option').click();

        } else {
            $(this).parent().find('option').removeAttr("selected", "selected");
            $(this).parent().find('option').trigger("change");
        }
    });

    $("#button").click(function() {
        alert($("select").val());
    });

    $(document).ready(function() {
        $('.select2').select2({
            closeOnSelect: false,
            allowClear: false
        });
    });
</script>

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
<script>
    CKEDITOR.replace('oodles_editor2', {
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
<script>
    CKEDITOR.replace('oodles_editor3', {
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
<script>
    CKEDITOR.replace('oodles_editor4', {
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
<script>
    CKEDITOR.replace('oodles_editor4', {
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
<!-- --- -->
<script>
    CKEDITOR.replace('oodles_editor5', {
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
<script src="<?php echo URLROOT ?>/assets/plugins/select2/js/select2.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/select2/select2-init.js"></script>