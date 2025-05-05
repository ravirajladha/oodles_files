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
          
<div class="container mt-3 mb-4 text-center">
            <h4 class="text">Home UPS-Inverter</h4>
        </div>
        <div>
            <p style="text-align:justify;">Mecwin offers new range of power back up solutions for household as well as small offices, retail outlets.
<br>
Applications – Lights, Fans, TV & Computer.</div>
        <div class="row">
        <div class="col-xs-6">
            <br><br>
            <img src="<?php echo URLROOT; ?>/assets_retail/inverter1.png" alt="">
        </div>

        <div class="col-xs-6"><br><br>
            <img src="<?php echo URLROOT; ?>/assets_retail/solar_panel.png" alt="">
        </div>
 
        <div class="col-xs-6">
        <br><br>
            <img src="<?php echo URLROOT; ?>/assets_retail/homeups.png" alt="">
        </div></div>
 <br><br><br>
 <?php if(isset($_SESSION['rexkod_user_id'])){ ?>
      <center> <a href="<?php echo URLROOT?>/retail/ups_enquiry"><button class="btn btn-success btn-md">Enquire</button></a></center>
<?php } ?>
 
            
        
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