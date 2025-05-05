<?php require APPROOT . '/views/inc_retail/header.php'; ?>
<?php require APPROOT . '/views/inc_retail/navbar.php'; ?>
    
    <!-- Page Content -->
    <div class="page-content bottom-content">
        
        <!-- Banner -->
        <div class="head-details">
            <div class=" container">
              
            </div>
        </div>
			
        <div class="fixed-content p-0"> 
            <div class="container">
                <div class="main-content">
                    <div class="left-content">
                        <a href="<?php echo URLROOT?>/retail/dashboard" class="back-btn">
                            <svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z" fill="#a19fa8"/>
							</svg>
                        </a>
                    </div>
                    <div class="mid-content">
                        <h5 class="mb-0">Give Feedback</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->
        
        <div class="container">
			<form class="my-2" action="<?php echo URLROOT?>/retail/submit_feedback" method="POST">
				<!-- <div class="input-group">
					<input type="file" class="imageuplodify" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
				</div> -->
				<div class="input-group">
					<textarea type="text" name="message" placeholder="Please provide your valuable feedback" class="form-control"></textarea>
				</div>
				<!-- <div class="input-group">
					<input type="text" placeholder="User email" class="form-control">
				</div>
				<div class="input-group">
					<input type="text" placeholder="Phone number" class="form-control">
				</div> -->
                <div class="card-body">
                  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-success rounded">Submit Feedback</button>
                  </div>
                </div>
			</form>
        </div>
    
		<!-- Page Content End -->
        
        <?php require APPROOT . '/views/inc_retail/navbar_footer.php'; ?>
 <?php require APPROOT . '/views/inc_retail/footer.php'; ?>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<script src="<?php echo URLROOT?>/assets_retail/vendor/imageuplodify/imageuploadify.min.js"></script>
<script>
	$(document).ready(function() {
		$('input[type="file"]').imageuploadify();
	})
</script>