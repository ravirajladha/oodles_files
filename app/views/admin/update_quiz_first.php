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
</style>
<!-- start page content -->
<?php
$adminMod = new Admins;
$url = $_SERVER['REQUEST_URI'];
$trimmed_url = trim($url, '/');
$exploded_value = explode('/', $trimmed_url);
$page_path = end($exploded_value);
$get_current_quiz = $adminMod->get_single_quizes_i($page_path);

$subject = $get_current_quiz->subject_name;
$get_all_chapter = $adminMod->get_sub_subject_from_subject($subject);

?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Update Quiz</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Update Quiz</li>
                </ol>
            </div>
        </div>
        <form action="<?php echo URLROOT ?>/admin/add_chapter_to_quiz/<?php echo $page_path ?>" method="POST">
            <div class="row">
                <div class=" col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Select Chapter</header>
                            <label style="float:right;" class="btn btn-warning deepPink-bgcolor ">
                                <input type="checkbox" class="selectall"> Select All
                            </label>
                        </div>

                        <div class="card-body row">
                            <!-- BANK DETAILS -->

                            <div class="card-body row" style="flex-wrap: wrap">
                                <!-- BANK DETAILS -->
                                <div class="col-md-12">
                                    <div class="row">
                                        <?php foreach ($get_all_chapter as $chapter) { ?>
                                            <?php
                                            $flag = 0;
                                            $array = explode(',', $get_current_quiz->chapter);

                                            foreach ($array as $value) {
                                                if ($chapter->id == $value) {
                                                    $flag = 1;
                                                }
                                            }
                                            ?>
	<div class="col-md-6 col-lg-4">
                                            <label class="btn btn-primary deepPink-bgcolor" style="margin-top:8px;">
                                                <?php $HiddenProducts = explode(',', $get_current_quiz->chapter); ?>
                                                <input type="checkbox" name="chapter[]" value="<?php echo  $chapter->id ?>" multiple <?php if ($flag == 1) {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>> <?php echo $chapter->name; ?>
                                            </label>
                                            </div>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
										<div class="col-md-12">
											<div class="btn-group" data-bs-toggle="buttons">
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 1
												</label>
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 2
												</label>
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 3
												</label>
											</div>
											<br>
											<h4 class="sub-title">Multiple buttons group</h4>
										</div>
									</div> -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- <div class="col-lg-6 col-lg-6">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/admin/quizes" role="button" style="float: right;">Finish</a>
					</div> -->
                    <div class="col-lg-6 col-lg-6">
                        <button type="submit" class="btn btn-primary" style="float: right;" id="submit">Select & Proceed</button>
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