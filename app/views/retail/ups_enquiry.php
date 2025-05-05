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
      <form action="<?php echo URLROOT; ?>/retail/create_ups_enquiry" method="post" autocomplete="off">
        <div class="main-container">
          <div class="container">


            <div class="card">
            <div class="card-header text-center" style="color:black;">
           Add Personal Details
           </div>
              <!-- Basic template start -->

              <div class="form-group" style="color:black;padding-top:10px;">
                <label for=""> Your Name</label>
                <input class="form-control mb-3" type="text" placeholder="<?php echo $data['get_auth_detail']->name; ?>" value="<?php echo ucwords($data['get_auth_detail']->name); ?>" name="name" readonly>
              </div>
              <div class="form-group">
                <label for=""> Phone no.</label>
                <input class="form-control mb-3" type="text" placeholder="<?php echo $data['get_auth_detail']->phone; ?>" value="<?php echo $data['get_auth_detail']->phone; ?>" name="phone" id="phone" oninput="numberOnly(this.id);" maxlength="10" readonly>
              </div>
              <div class="form-group">
                <label for="">Alternate Phone no.</label> <input type="checkbox" id="checkbox1">
                <input class="form-control mb-3" type="number" name="alt_phone" id="alt_phone" placeholder=""  oninput="numberOnly(this.id);" maxlength="10">
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
              <div class="form-group">
                <label for=""> Required for<span>*</span></label>

                <select class="form-control mb-3" id="requirement" name="requirement" aria-label="Default select example" required>
                  <option value="" readonly>-Select-</option>
                  <option value="1">Office</option>
                  <option value="2">Home</option>
                  <option value="3">Other Use</option>
                </select>
              </div>
              <div class="form-group">
                <label for=""> Select Product<span>*</span></label>

                <select class="form-control mb-3" id="product" name="product" aria-label="Default select example" required>
                  <option value="" readonly>-Select-</option>
                  <option value="1">Solar Inverter(PWM)</option>
                  <option value="2">Solar Inverter (MPPT)</option>
                  <option value="3">Li-Ion Hybrid Inverter</option>
                </select>
              </div>
              <div class="form-group">
                <label for=""> Select Range<span>*</span></label>

                <select class="form-control mb-3" id="range" name="range" aria-label="Default select example" required>
                  <option value="" readonly>-Select-</option>
                  <option value="1">700VA</option>
                  <option value="2">900VA</option>
                  <option value="3">1100VA</option>
                  <option value="4">1600VA</option>
                  <option value="5">2100VA</option>
                </select>
              </div>
          
</div>

              <div class="card">
                <div class="card-header">
           
                  </div>
                  <div class="card-body">


                  
                    <div class="card-footer">
                      <button  type="submit" class="btn btn-block btn-success rounded">Submit enquiry</button>
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

</script>
  