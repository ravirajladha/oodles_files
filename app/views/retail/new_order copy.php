<?php require APPROOT . '/views/inc_retail/header.php'; ?>
<?php require APPROOT . '/views/inc_retail/navbar.php'; 
// $contact = $data['contact']; ?>

<style>
    .sub-label {
    padding-right: 20px;
    max-width: 160px;
    
}
label{
      padding-left:10px;
    }
</style>

<div class="page-content bottom-content">
        <div class="container">
            <div class="row">
<div class="container mt-3 mb-4 text-center">
            <h4 class="text">Create Your Enquiry</h4>
        </div>

        <!-- page content start -->
        <form action="<?php echo URLROOT; ?>/retail/create_order" method="post" autocomplete="off">
        <div class="main-container">
            <div class="container">
            
                <div class="card">
                <div class="form-group">
                  <input class="form-control mb-3" type="text" placeholder="Enter full name" name="name">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" placeholder="Enter Phone" name="phone">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" placeholder="Enter Village" name="village">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" placeholder="Enter Taluk" name="taluk">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" placeholder="Enter District" name="district">
                </div>
                
                <div class="form-group">
                  <input class="form-control mb-3" type="text" placeholder="Irrigation Type	" name="irrigation_type">
                </div>
                <div class="form-group">
                  <input id="depth" class="form-control mb-3" type="text" placeholder="Water Source Complete Depth (Feet)	" name="water_source_depth">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" placeholder="Water Source Starts From (Feet)	" name="water_source_start">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" placeholder="Water Available (Inches)	" name="water_available">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" placeholder="Required Water Suction Depth (Feet)" name="water_suction_depth">
                </div>
              
                <div class="form-group">
                  <input id="acres" class="form-control mb-3" type="text" placeholder="Acres" name="acres">
                </div>
                
                <div class="form-group">
                  <select class="form-control mb-3" id="source" name="source" aria-label="Default select example">
                    <option value="1">Borewell</option>
                    <option value="2">Surface Open Well</option>
                    <option value="3" disabled>Sub Open Well</option>
                  </select>
                </div>


                <div class="form-group">
                  <label for="" > Electricity available at field</label>
                  <select class="form-control mb-3" name="electricity_available" aria-label="Default select example">
                    <option value="0" selected>No</option>
                    <option value="1">Yes</option>
                  </select>
                </div>

                <div class="form-group">
                   <label for=""> If No Electricity</label>
                  <select class="form-control mb-3" name="diesel_engine" aria-label="Default select example">
                  <option value="1">Not Using Diesel Engine</option>
                    <option value="2">Using Deisel Engine</option>
                  </select>
                </div>


                <div class="form-group">
                   <label for=""> If using Diesel Engine</label>
                  <input class="form-control mb-3" name="diesel_consumption" type="text" placeholder="Enter approx diesel consumption per day ">
                </div>


                <div class="form-group">
                   <label for=""> Are you aware of mecwin brand earlier</label>
                  <select class="form-control mb-3" name="know_mecwin" aria-label="Default select example">
                    <option value="0" selected>No</option>
                    <option value="1">Yes</option>
                  </select>
                </div>

                <div class="form-group">
                   <label for=""> Where you heard of us.</label>
                  <select class="form-control mb-3" name="how_know_mecwin" aria-label="Default select example">
                    <option value="0" selected>Youtube</option>
                    <option value="1">Facebook</option>
                    <option value="2">Others</option>
                  </select>
                </div>

                <div class="form-group">
                   <label for=""> Pump needed within</label>
                  <select class="form-control mb-3" name="pump_needed_month" aria-label="Default select example">
                    <option value="0" selected>1 Month</option>
                    <option value="1">2 Months</option>
                    <option value="1">3 Months</option>

                  </select>
                </div>
               
                <br>
                <div class="card">
                    <div class="card-header">
                     <span id="signIn" class="btn btn-block btn-default rounded">Find Your Product</span>
                     
                    <div class="form-group float-label">
                           
                    <select class="form-control mb-3" id="res_pump" name="product_id" aria-label="Default select example">
                   
                  </select>                         
                       
                    </div>
                    <div class="card-body">
                  

                      <br>
                        <div class="card-footer">
                        <button id="order_btn" type="submit" class="btn btn-block btn-success rounded" disabled>Submit enquiry</button>
                    </div>
                    <!-- <button>
                    <a href="javascript:void(0);" class="item-content item-link" data-bs-toggle="modal" data-bs-target="#exampleModal5">
  </button> -->
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
			$(document).ready(function(){
				$('#signIn').click(function(){
        
					var depth = $('#depth').val();
					var acres = $('#acres').val();
					var source = $('#source').val();
             
						$.ajax({
								url  : '<?php echo URLROOT; ?>/retail/check_product',
								type : 'POST',
								data : {depth,acres,source},

								success : function(res)
								{
                                    
                   document.getElementById("res_pump").innerHTML = res;
                   document.getElementById("order_btn").disabled = false;
                                    

								}

							});
					
				});
			});

           
		</script>

<div class="modal fade" tabindex="-1" id="exampleModal5"  aria-labelledby="exampleModal5" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Sign In</h5>
                                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="modal-body small">
                                            <div class="basic-form style-1">
                                                <form>
                                                    <div class="mb-3 form-input">
                                                        <span class="input-icon">
                                                           <i class="fa fa-at"></i>
                                                        </span>
                                                        <input type="email" class="form-control" placeholder="Email">
                                                    </div>
                                                    <div class="mb-3 form-input">
                                                        <span class="input-icon">
                                                           <i class="fa fa-lock"></i>
                                                        </span>
                                                        <input type="password" class="form-control" placeholder="Password">
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <a href="javascript:void(0);" class="btn-link m-r10">Forgot Password?</a>
                                                        <a href="javascript:void(0);" class="btn-link">Create Account</a>
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-secondary btn-block">LOGIN</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
