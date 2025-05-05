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
$get_scholarship_detail = $data['get_single_scholarship'];
$scholarship_id = $data['scholarship_id'];
$get_active_scholarship_doc = $data['get_active_scholarship_doc'];
?>
<div class="page-content-wrapper">
  <div class="page-content">
    <div class="page-bar">
      <div class="page-title-breadcrumb">
        <div class=" pull-left">
          <div class="page-title">Select Criteria and Document</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
          <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li><a class="parent-item" href="">Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
          </li>
          <li class="active">Select Criteria</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class=" col-sm-12">
        <div class="card">
          <div class="card-head">
            <header>Scholarship</header>
          </div>
          <div class="card-body no-padding height-9">


            <div class="row list-separated profile-stat">
              <div class="col-md-6 col-sm-3 col-6">
                <div class="uppercase profile-stat-title"> Scholarship Name </div>
                <div class="uppercase profile-stat-text"> <?php echo $get_scholarship_detail->name; ?></div>
              </div>
              <div class="col-md-6 col-sm-3 col-6">
                <div class="uppercase profile-stat-title"> Corporate Id</div>
                <div class="uppercase profile-stat-text">
                  <?php echo $get_scholarship_detail->offered_by; ?>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <form action="<?php echo URLROOT ?>/admin/add_criteria_and_document_to_scholarship/<?php echo $scholarship_id; ?>" method="POST">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Select Criteria</h4>
              <label class="float-end">
                <input type="checkbox" name="selectall" class="selectall" /> Select all
              </label>
            </div>
            <div class="card-body">
              <?php
              $classes = explode(',', $get_scholarship_detail->course);
              foreach ($classes as $class) {
                $class_detail = $adminMod->get_class_detail_single($class);
                $criteria = $adminMod->get_scholarship_crieria_by_class($class);
              ?>
                <div class="card mb-3">
                  <div class="card-header" style="background:#FCBCFE;">
                    <h5><?php echo $class_detail->class_name; ?></h5>
                    <label class="float-end">
                      <input type="checkbox" name="selectall" class="selectall" /> Select all
                    </label>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <?php foreach ($criteria as $criterion) {
                        $selected_criterias =  explode(',', $get_scholarship_detail->criteria);
                        $flag = 0;
                        foreach ($selected_criterias as $selected_criteria) {
                          if ($selected_criteria == $criterion->id) {
                            $flag = 1;
                          }
                        }
                      ?>
                        <div class="col-md-6 col-lg-4 mb-3">
                          <label class="btn btn-primary deepPink-bgcolor d-block">
                            <input type="checkbox" name="criteria[]" <?php if ($flag == 1) {
                                                                        echo "checked";
                                                                      } ?> value="<?php echo $criterion->id; ?>">
                            <?php echo $criterion->criteria_name; ?>
                          </label>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <header>Select Document</header>
              <label class="float-end">
                <input type="checkbox" name="selectall" class="selectall" /> Select all
              </label>
            </div>
            <div class="card-body">
              <?php
              // $class = explode(',', $get_scholarship_detail->course);
              // foreach ($class as $class) {
              //   $get_class_detail = $adminMod->get_class_detail_single($class);
              //   $document = $adminMod->get_scholarship_document_by_class($class);
              ?>
                <div class="card mb-3">
                  <div class="card-header" style="background:#FED5CD;">
                    <h5></h5>
                    <label class="float-end">
                      <input type="checkbox" name="selectall" class="selectall" /> Select all
                    </label>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <?php foreach ($get_active_scholarship_doc as $document) {
                        $selected_documents =  explode(',', $get_scholarship_detail->documents_required);
                        $flag1 = 0;
                        foreach ($selected_documents as $selected_document) {
                          if ($selected_document == $document->id) {
                            $flag1 = 1;
                          }
                        }
                      ?>
                        <div class="col-md-6 col-lg-4 mb-3">
                          <label class="btn btn-primary deepPink-bgcolor d-block">
                            <input type="checkbox" name="document[]" <?php if ($flag1 == 1) {
                                                                        echo "checked";
                                                                      } ?> value="<?php echo $document->id; ?>">
                            <?php echo $document->name; ?>
                          </label>
                        </div>
                        <?php } ?>
                    </div>
                  </div>
                </div>
            
            </div>
          </div>
        </div>
      </div>

      <style>
        .card-header label {
          margin-bottom: 0;
        }

        .card-body .card {
          margin-bottom: 1.5rem;
        }

        .deepPink-bgcolor {
          background-color: deepPink;
        }
      </style>


      <div class="row">
        <!-- <div class="col-lg-6 col-lg-6">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/admin/quizes" role="button" style="float: right;">Finish</a>
					</div> -->
        <div class="col-lg-6 col-lg-6">
          <button type="submit" class="btn btn-primary" style="float: right;" id="submit">Finish</button>
        </div>
        <div class="col-lg-6 col-lg-6">
          <a href="<?php echo URLROOT; ?>/admin/edit_scholarship/<?php echo $scholarship_id; ?>"> <button type="button" class="btn btn-warning" style="float: right;" id="submit">Go Back</button></a>
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
      $(this).closest('.card').find('input[type=checkbox]').prop('checked', true);
    } else {
      $(this).closest('.card').find('input[type=checkbox]').prop('checked', false);
    }
  });
</script>