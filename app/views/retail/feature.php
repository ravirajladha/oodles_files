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
            <h4 class="text"></h4>
        </div>
       
        <div class="row">
        <div class="col-xs-12"><br><br>
            <img src="<?php echo URLROOT; ?>/assets_retail/key.jpg" alt="">
</div>

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
