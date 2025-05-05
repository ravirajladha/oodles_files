<?php require APPROOT . '/views/inc_retail/header.php'; ?>
<?php require APPROOT . '/views/inc_retail/navbar.php'; 
 ?>

<style>
    .sub-label {
    padding-right: 20px;
    max-width: 160px;
    
}
</style>
<div class="container mt-3 mb-4 text-center">
            <h4 class="text-white">Create Survey</h4>
        </div>

        <!-- page content start -->
        
      <div class="main-container">
            <div class="container">
              
                <div class="ard">
                  
                <form action="<?php echo URLROOT; ?>/retail/create_survey" method="post" autocomplete="off">
                  
                  <input class="form-control mb-3" type="text" name="village" placeholder="Site located village">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="mandal" placeholder="Mandal">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="district" placeholder="District">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="name" placeholder="Site contact person name">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="phone" placeholder="Site person contact no">
                </div>
                <div class="form-group">
                  <input id="depth" class="form-control mb-3" type="text" name="long" placeholder="Longitude">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="lat" placeholder="Latitude">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="borewell_depth" placeholder="Borewell depth total in feet">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="bore_dia" placeholder="Bore dia in inch">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="casing_pipe" placeholder="Casing pipe thickness in mm">
                </div>
                <div class="form-group">
                  <input id="acres" class="form-control mb-3" type="text" name="casing_pipe_depth" placeholder="Depth of casing pipe inserted n feet">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="water_source_depth" placeholder="Water source available depth">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="water_source_volume" placeholder="Water source available in volume ">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="water_required" placeholder="Water required per day in litres">
                </div>
                <div class="form-group">
                  <input id="acres" class="form-control mb-3" type="text" name="vertical_head" placeholder="Vertical head after bore output">
                </div>

                



                <div class="form-group">
                  <input id="acres" class="form-control mb-3" type="text" name="horizontal_head" placeholder="Horizantal head in meters">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="sprinklers_connected" placeholder="Any sprinklers connected in detail">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="shadow_free" placeholder="Shadow free area">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="distance_bore_solar" placeholder="Distance from bore to solar panel installation">
                </div>
                <div class="form-group">
                  <input id="acres" class="form-control mb-3" type="text" name="pump_type" placeholder="Pump type suggested">
                </div>


                <div class="form-group">
                  <input id="acres" class="form-control mb-3" type="text" name="capacity" placeholder="Capacity suggested ">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="mounting_type" placeholder="Mounting type of controller box required">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="solar_panel" placeholder="Solar panel details">
                </div>
                <div class="form-group">
                  <input class="form-control mb-3" type="text" name="panel_numbers" placeholder="No of panels in series and parallel">
                </div>
                <div class="form-group">
                  <input id="acres" class="form-control mb-3" type="text" name="pump_solar_grid" placeholder="Pump will be run only on solar and grid">
                </div>
               
                <br>
                <div class="card">
                    <div class="card-header">
                    
                    <div class="card-body">
                  

                      <br>
                        <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-success rounded">Submit Survey</button>
                    </div>
                    </div>
                    
                </div>

              </form>



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
                                    
                   document.getElementById("response").innerHTML = res;
                                    

								}

							});
					
				});
			});

           
		</script>
