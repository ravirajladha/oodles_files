
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<div class="page-footer">
			<div class="page-footer-inner"> 2022 &copy; OodlesIN, Powered by Kods
				
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- end footer -->
	</div>
	<!-- start js include path -->
	
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->


	   <!-- start js include path -->
	   <script src="<?php echo URLROOT; ?>/assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/popper/popper.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/feather/feather.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo URLROOT; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/bootstrap-datepicker/datepicker-init.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" charset="UTF-8"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker-init.js" charset="UTF-8"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js" charset="UTF-8">
    </script>
    <!-- Common js-->
    <script src="<?php echo URLROOT; ?>/assets/js/app.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/js/layout.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/js/theme-color.js"></script>
    <!-- Material -->
    <script src="<?php echo URLROOT; ?>/assets/plugins/material/material.min.js"></script>
    <!-- dropzone -->
    <script src="<?php echo URLROOT; ?>/assets/plugins/dropzone/dropzone.js"></script>
    <!--tags input-->
    <script src="<?php echo URLROOT; ?>/assets/plugins/jquery-tags-input/jquery-tags-input.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/plugins/jquery-tags-input/jquery-tags-input-init.js"></script>
    <!--select2-->
    <script src="<?php echo URLROOT; ?>/assets/plugins/select2/js/select2.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/js/pages/select2/select2-init.js"></script>


	<!-- end js include path -->
</body>

</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php } unset($_SESSION['success']); ?>



<!-- <?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
Swal.fire({
    position: "bottom-end",
    icon: "success",
    title: <?php echo $_SESSION['success']; ?>,
    showConfirmButton: false,
    timer: 1500,
  });
  </script>
  <?php } unset($_SESSION['success']); ?> -->




