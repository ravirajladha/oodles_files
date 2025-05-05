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
      <form action="<?php echo URLROOT; ?>/retail/create_solar_enquiry" method="post" autocomplete="off">
        <div class="main-container">
          <div class="container">


            <div class="card">

              <!-- Basic template start -->

              <div class="form-group">
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
              <div class="form-group">
                <label for="">No. Of Acres<span>*</span></label>
                <input id="acres" class="form-control mb-3" type="number" placeholder="" name="acres" required>
              </div>
              <div class="form-group">
                <label for=""> Well Type<span>*</span></label>

                <select class="form-control mb-3" id="source" name="source" aria-label="Default select example" required>
                  <option value="0">-Select-</option>
                  <option value="1">Borewell</option>
                  <option value="2">Surface Open Well</option>
                </select>
              </div>
              <!-- <label for="">Describe required Bore Details below:</label><br> -->
              <div class="form-group" id="bore_dia" style="display:none;">
                <label for="">Bore Dia</label>(inches)
                <input type="number" class="form-control" style="width: 100%" id="" placeholder="" name="bore_dia">
              </div>
              <br>
              <div class="form-group">
                <label for="">Total Depth (in feet)<span>*</span></label>

                <input id="depth" class="form-control mb-3" type="number" placeholder="" name="depth" required>
              </div>
              <div class="form-group" id="water_source_start" style="display:none;">

                <label for="">Water Source Starts From</label>(feet)
                <input class="form-control mb-3" type="number" placeholder="" name="water_source_starts">
              </div>




              <!-- open well -->


              <div class="form-group" style="display:none;" id="open_pump_type">
                <select class="form-control mb-3" id="open_pump_type" name="open_pump_type" aria-label="Default select example">
                  <option value="1">Pump Required</option>
                  <option value="2">Surface Open Well</option>
                  <option value="3">Submerssible Open Well</option>
                </select>
              </div>
              <div class="form-group">
                <!-- common -->
                <label for="">Water Output Required In</label>(inches)
                <input  class="form-control mb-3" id="water_output" type="number" placeholder="" name="water_output">
              </div>
              <div class="form-group">
                <!-- common -->
                <label for="">Water Required In A Day</label>(liters)
                <input id="" class="form-control mb-3" type="number" placeholder="" name="water_required">
              </div>
              <div class="form-group">
                <label for="">Sprinklers connected</label>
                <input type="radio" id="age1" name="sprinklers" value="1">
                <label for="age1">Yes</label>&ensp;
                <input type="radio" id="age1" name="sprinklers1" value="0" selected>
                <label for="age2">No</label>
              </div>
              <br>
              <div class="form-group">
                <label for="">When You Want To Install</label> (in months)
                <input id="" class="form-control mb-3" type="number" placeholder="" name="install_dur">
              </div>
</div>
<div class="card">
              <!-- end open and borewell -->
              <div class="form-group">
                <label for=""> Would you like to provide other info?</label>

                <select class="form-control mb-3" id="other_info" aria-label="Default select example" name="other_info" onchange="other_info(this);" required>

                  <option readonly>--Select--</option>
                  <option value="0" selected>No</option>
                  <option value="1">Yes</option>
                </select>
              </div>
              <div class="form-group" id="electricity_available"  style="display:none;">
                <label for=""> Electricity available at field</label>
                <select class="form-control mb-3" name="electricity_available" aria-label="Default select example">
                  <option value="0" selected>No</option>
                  <option value="1">Yes</option>
                </select>
              </div>

              <div class="form-group" id="electricity_alternative" style="display:none;">
                <label for=""> If No Electricity</label>
                <select class="form-control mb-3" name="diesel_alternative" aria-label="Default select example">
                  <option value="1">Not Using Diesel Engine</option>
                  <option value="2">Using Deisel Engine</option>
                  <option value="3">Using Petrol Engine</option>
                </select>
              </div>
              <div class="form-group" id="runtime" style="display:none;">
                <label for="">How many hours/days used</label>
                <input id="" class="form-control mb-3" type="text" placeholder="" name="runtime">
              </div>

              <div class="form-group" id="diesel_consumption" style="display:none;">
                <label for="">Approximate Diesel Consumption(in litres)</label>
                <input class="form-control mb-3" name="diesel_consumption" type="number" placeholder="Enter approx diesel consumption per day" value="0" >
              </div>


              <div class="form-group" id="recognition" style="display:none;">
                <label for=""> Are you aware of mecwin brand earlier?</label>
                <select class="form-control mb-3" name="recognition" aria-label="Default select example">
                  <option value="0" selected>No</option>
                  <option value="1">Yes</option>
                </select>
              </div>

              <div class="form-group" id="advertise_board" style="display:none;">
                <label for=""> Where you heard of us?</label>
                <select class="form-control mb-3" name="advertise_board" aria-label="Default select example">
                  <option value="0" selected>Youtube</option>
                  <option value="1">Facebook</option>
                  <option value="2">Others</option>
                </select>
              </div>

              <div class="form-group" id="delivery_period" style="display:none;">
                <label for=""> Pump needed within</label>
                <select class="form-control mb-3" name="delivery_period" aria-label="Default select example">
                  <option value="1" selected>1 Month</option>
                  <option value="2">2 Months</option>
                  <option value="3">3 Months</option>

                </select>
              </div>

              <br>
              <div class="card">
                <div class="card-header">
                  <div id="signIn" class="btn btn-block btn-default rounded">Find Your Product</div>
</div>     <div class="card-header">
                  <div class="form-group float-label">

                    <select class="form-control mb-3" id="res_pump" name="product_id" style="width:100%;" aria-label="Default select example">

                    </select>

                  </div>
                  </div>
                  <div class="card-body">
                  
                    <div class="card-footer">
                      <button id="order_btn" type="submit" class="btn btn-block btn-success rounded" disabled>Submit Enquiry</button>
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
  $(document).ready(function() {
    $('#signIn').click(function() {

      var depth = $('#depth').val();
      var acres = $('#acres').val();
      var source = $('#source').val();

      $.ajax({
        url: '<?php echo URLROOT; ?>/retail/check_product',
        type: 'POST',
        data: {
          depth,
          acres,
          source
        },

        success: function(res) {

          document.getElementById("res_pump").innerHTML = res;
          document.getElementById("order_btn").disabled = false;


        }

      });

    });
  });

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


  $('#source').on('click', function() {
    if ($(this).val() === "1") {
      $("#bore_dia").show()
      $("#water_source_start").show()
      $("#open_pump_type").hide()

    } else if ($(this).val() === "2") {
      $("#bore_dia").hide()
      $("#water_source_start").hide()
      $("#open_pump_type").show()
    } else {
      $("#bore_dia").hide()
      $("#water_source_start").hide()
      $("#open_pump_type").hide()
    }
  });


  $('#other_info').on('click', function() {
    if ($(this).val() === "0") {
      $("#electricity_available").hide()
      $("#electricity_alternative").hide()
      $("#runtime").hide()
      $("#diesel_consumption").hide()
      $("#recognition").hide()
      $("#advertise_board").hide()
      $("#delivery_period").hide()

    } else if ($(this).val() === "1") {
      $("#electricity_available").show()
      $("#electricity_alternative").show()
      $("#runtime").show()
      $("#diesel_consumption").show()
      $("#recognition").show()
      $("#advertise_board").show()
      $("#delivery_period").show()
    } else {
      $("#electricity_available").hide()
      $("#electricity_alternative").hide()
      $("#runtime").hide()
      $("#diesel_consumption").hide()
      $("#recognition").hide()
      $("#advertise_board").hide()
      $("#delivery_period").hide()
    }
  });
  $('#res_pump').on('click', function() {
    if ($(this).val() === "0") {
      $('input[type="submit"]').attr('disabled','disabled');
 

    } else if ($(this).val() >=1) {
      $('input[type="submit"]').removeAttr('disabled');

    } else {
      $('input[type="submit"]').attr('disabled','disabled');

    }
  });
</script>

