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
            <h4 class="text">EV Motors </h4>
        </div>
        <div>
            <p style="text-align:justify;">The future of automobiles is green and electric. The EV powertrains from Mecwin are specially designed for 2 wheelers, 3 wheelers and 4 wheelers.</p>
</div>
        <div class="row">
        <div class="col-xs-6"><br> <br>
            <img src="<?php echo URLROOT; ?>/assets_retail/ev1.png" alt="">
        </div>

        <div class="col-xs-6"><br> <br>
            <img src="<?php echo URLROOT; ?>/assets_retail/ev2.png" alt="">
        </div>
 
        <div class="col-xs-6"><br> <br> <br>
            <img src="<?php echo URLROOT; ?>/assets_retail/ev3.png" alt="">
        </div>  
        </div><br><br>
        <?php if(isset($_SESSION['rexkod_user_id'])){ ?>
       <center><a href="<?php echo URLROOT?>/retail/ev_enquiry"><button class="btn btn-success btn-md">Enquire</button></a></center>
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
