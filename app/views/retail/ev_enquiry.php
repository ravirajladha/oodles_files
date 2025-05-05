<?php require APPROOT . '/views/inc_retail/header.php'; ?>
<?php require APPROOT . '/views/inc_retail/navbar.php';
// $contact = $data['contact']; 
?>

<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<style>
  .sub-label {
    padding-right: 20px;
    max-width: 160px;

  }

  label {
    padding-left: 10px;
  }
</style>

<div class="page-content bottom-content">
  <div class="container">
    <div class="row">
      <div class="container mt-3 mb-4 text-center">
        <h4 class="text">Create Enquiry</h4>
      </div>
      <!-- page content start -->
      <form action="<?php echo URLROOT; ?>/retail/create_ev_enquiry" method="post" autocomplete="off">
        <div class="main-container">
          <div class="container">


            <div class="card">
              <div class="card-header">
                Add Personal Details
              </div>
              <!-- Basic template start -->

              <div class="form-group" style="padding-top:10px;">
                <label for=""> Your Name</label>
                <input class="form-control mb-3" type="text" placeholder="<?php echo $data['get_auth_detail']->name; ?>" value="<?php echo ucwords($data['get_auth_detail']->name); ?>" name="name" readonly>
              </div>
              <div class="form-group">
                <label for=""> Phone no.</label>
                <input class="form-control mb-3" type="text" placeholder="<?php echo $data['get_auth_detail']->phone; ?>" value="<?php echo $data['get_auth_detail']->phone; ?>" name="phone" id="phone" oninput="numberOnly(this.id);" maxlength="10" readonly>
              </div>
              <div class="form-group">
                <label for="">Alternate Phone no.</label> <input type="checkbox" id="checkbox1">
                <input class="form-control mb-3" type="number" name="alt_phone" id="alt_phone" placeholder="" oninput="numberOnly(this.id);" maxlength="10">
              </div>
              <div class="form-group">
                <label for="">Address<span>*</span></label>
                <input class="form-control mb-3" type="text" placeholder="" name="address" required>
              </div>
              <div class="form-group">
                <label for="">Town/Village<span>*</span></label>
                <input class="form-control mb-3" type="text" placeholder="" name="town" required>
              </div>
              <div class="form-group">
                <label for="">District<span>*</span></label>
                <input class="form-control mb-3" type="text" placeholder="" name="district" required>
              </div>
              <!-- Basic template end -->
              <div class="form-group">
                <label for="">State<span>*</span></label>
                <input class="form-control mb-3" type="text" placeholder="" name="state" required>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                Provide Product Details
              </div>



              <div class="form-group" style="padding-top:10px;">
                <label for="">Required For:&ensp;</label>
                <input type="radio" id="age1" name="product_range" value="1" checked>
                <label for="age1">2W</label>&ensp;
                <input type="radio" id="age1" name="product_range" value="2">
                <label for="age2">3W</label>
                <input type="radio" id="age1" name="product_range" value="3">
                <label for="age2">4W</label>
              </div>
              <div class="form-group">
                <label for="">Motor Type:&ensp;</label>
                <input type="radio" id="age13" name="motor_type" value="1" checked>
                <label for="age1">Hub</label>&ensp;
                <input type="radio" id="age13" name="motor_type" value="2">
                <label for="age2">Mid</label>

              </div>
              </div>
              <div class="card">
              <div class="form-group">
                <label for=""> Are you OEM?</label>

                <select class="form-control mb-3" id="oem" aria-label="Default select example" name="oem" required>

                  <option readonly>--Select--</option>
                  <option value="0" selected>No</option>
                  <option value="1">Yes</option>
                </select>
              </div>

         
              <!-- If Yes -->
              <div class="form-group" id="company_name" style="display:none;">
                <label for="">Company Name<span>*</span></label>
                <input class="form-control mb-3" type="text" placeholder="" name="company_name">
              </div>
              <div class="form-group" id="contact_person" style="display:none;">
                <label for="">Contact Person Name<span>*</span></label>
                <input class="form-control mb-3" type="text" placeholder="" name="contact_person">
              </div>
              <div class="form-group" id="designation" style="display:none;">
                <label for="">Contact Person Designation<span>*</span></label>
                <input class="form-control mb-3" type="text" placeholder="" name="designation">
              </div>
              <div class="form-group" id="contact_no" style="display:none;">
                <label for="">Contact No<span>*</span></label>
                <input class="form-control mb-3" type="number" placeholder="" name="contact_no">
              </div>
              <div class="form-group" id="contact_email_id" style="display:none;">
                <label for="">Contact Person Email ID<span>*</span></label>
                <input class="form-control mb-3" type="email" placeholder="" name="contact_email_id">
              </div>
              <div class="form-group" id="oem_enquiry" style="display:none;">
                <label for="">Share Your Detailed Enquiry <span>*</span></label>
                <textarea class="form-control mb-3" type="text" placeholder="" name="oem_enquiry" row=3></textarea>
              </div>
              <div class="form-group" id="retrofit" style="display:none;">
                <label for="">Are you looking for Retrofit?&ensp;</label>
                <input type="radio" id="age12" name="retrofit" value="1" checked>
                <label for="age1">Yes</label>&ensp;
                <input type="radio" id="age12" name="retorfit" value="0">
                <label for="age2">No</label>

              </div>
              <div class="form-group" id="retrofit_enquiry" style="display:none;">
                <label for="">Share Your Detailed Enquiry <span>*</span></label>
                <textarea class="form-control mb-3" type="text" placeholder="" name="retrofit_enquiry" row=3></textarea>
              </div>
            </div>

            <div class="card">
              <div class="card-header">

              </div>
              <div class="card-body">



                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-success rounded">Submit enquiry</button>
                </div>
              </div>

            </div>





          </div>
        </div>
    </div>
  </div>
  </form>
</div>
</div>
</div>
</div>

</main>

<?php require APPROOT . '/views/inc_retail/navbar_footer.php'; ?>
<?php require APPROOT . '/views/inc_retail/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
  function numberOnly(id) {
    let input = document.getElementById(id);
    let value = input.value;
    if (value.length > input.maxLength) {
      input.value = value.substring(0, input.maxLength);
    }

  }
</script>
<script>
  $("#checkbox1").click(function() {
    $("#alt_phone").attr("disabled", this.checked);
  });
</script>
<script>
  $(document).ready(function() {
    $("#checkbox1").on("change", function() {

      if (this.checked) {
        $("#alt_phone").val($("#phone").val());

      } else {

        $('#alt_phone').val("");
        $("#alt_phone").attr("placeholder", "Enter Alt Phone");
      }

    });

  });

  $('#oem').on('click', function() {
    if ($(this).val() === "1") {
      $("#company_name").show()
      $("#contact_person").show()
      $("#desingation").show()
      $("#contact_no").show()
      $("#contact_email_id").show()
      $("#oem_enquiry").show()
      $("#retrofit").hide()
      $("#retrofit_enquiry").hide()

    } else if ($(this).val() === "0") {
      $("#company_name").hide()
      $("#contact_person").hide()
      $("#desingation").hide()
      $("#contact_no").hide()
      $("#contact_email_id").hide()
      $("#oem_enquiry").hide()
      $("#retrofit").show()
      $("#retrofit_enquiry").show()
    } else {
      $("#company_name").hide()
      $("#contact_person").hide()
      $("#desingation").hide()
      $("#contact_no").hide()
      $("#contact_email_id").hide()
      $("#oem_enquiry").hide()
      $("#retrofit").hide()
      $("#retrofit_enquiry").hide()
    }
  });

</script>