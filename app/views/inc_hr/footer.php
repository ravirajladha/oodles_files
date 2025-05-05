  <!--**********************************
            Footer start
        ***********************************-->
  <div class="footer">
  	<div class="copyright">
  		<p>Copyright © Designed &amp; Developed by <a href="http://mecwintech.com/" target="_blank">MecWin Technologies</a> 2022</p>
  	</div>
  </div>
  <!--**********************************
            Footer end
        ***********************************-->

  <!--**********************************
           Support ticket button start
        ***********************************-->

  <!--**********************************
           Support ticket button end
        ***********************************-->


  </div>
  <!--**********************************
        Main wrapper end
    ***********************************-->

  <!--**********************************
        Scripts
    ***********************************-->
  <!-- Required vendors -->
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/global/global.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/chart.js/Chart.bundle.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/owl-carousel/owl.carousel.js"></script>

  <!-- Chart piety plugin files -->
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/peity/jquery.peity.min.js"></script>

  <!-- Dashboard 1 -->
  <script src="<?php echo URLROOT; ?>/assets_admin/js/dashboard/dashboard-1.js"></script>

  <script src="<?php echo URLROOT; ?>/assets_admin/js/custom.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/js/deznav-init.js"></script>

  <!-- Daterangepicker -->
  <!-- momment js is must -->
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/moment/moment.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- clockpicker -->
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
  <!-- asColorPicker -->
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/jquery-asColor/jquery-asColor.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
  <!-- Material color picker -->
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
  <!-- pickdate -->
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/pickadate/picker.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/pickadate/picker.time.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/pickadate/picker.date.js"></script>


  <script src="<?php echo URLROOT; ?>/assets_admin//vendor/moment/moment.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_admin//vendor/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Daterangepicker -->
  <script src="<?php echo URLROOT; ?>/assets_admin/js/plugins-init/bs-daterange-picker-init.js"></script>
  <!-- Clockpicker init -->
  <script src="<?php echo URLROOT; ?>/assets_admin/js/plugins-init/clock-picker-init.js"></script>
  <!-- asColorPicker init -->
  <script src="<?php echo URLROOT; ?>/assets_admin/js/plugins-init/jquery-asColorPicker.init.js"></script>
  <!-- Material color picker init -->
  <script src="<?php echo URLROOT; ?>/assets_admin/js/plugins-init/material-date-picker-init.js"></script>
  <!-- Pickdate -->
  <script src="<?php echo URLROOT; ?>/assets_admin/js/plugins-init/pickadate-init.js"></script>

  <script src="<?php echo URLROOT; ?>/assets_admin/js/custom.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/js/deznav-init.js"></script>
 

	<!-- Datatable -->
	<script src="<?php echo URLROOT; ?>/assets_admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/js/plugins-init/datatables.init.js"></script>

  <script src="<?php echo URLROOT; ?>/assets_admin/js/custom.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/js/deznav-init.js"></script>


  


  <script>
  	function carouselReview() {
  		/*  testimonial one function by = owl.carousel.js */
  		function checkDirection() {
  			var htmlClassName = document.getElementsByTagName('html')[0].getAttribute('class');
  			if (htmlClassName == 'rtl') {
  				return true;
  			} else {
  				return false;

  			}
  		}
  		jQuery('.testimonial-one').owlCarousel({
  			loop: true,
  			autoplay: true,
  			margin: 15,
  			nav: false,
  			dots: false,
  			left: true,
  			rtl: checkDirection(),
  			navText: ['', ''],
  			responsive: {
  				0: {
  					items: 1
  				},
  				800: {
  					items: 2
  				},
  				991: {
  					items: 2
  				},

  				1200: {
  					items: 2
  				},
  				1600: {
  					items: 2
  				}
  			}
  		})
  		jQuery('.testimonial-two').owlCarousel({
  			loop: true,
  			autoplay: true,
  			margin: 15,
  			nav: false,
  			dots: true,
  			left: true,
  			rtl: checkDirection(),
  			navText: ['', ''],
  			responsive: {
  				0: {
  					items: 1
  				},
  				600: {
  					items: 2
  				},
  				991: {
  					items: 3
  				},

  				1200: {
  					items: 3
  				},
  				1600: {
  					items: 4
  				}
  			}
  		})
  	}
  	jQuery(window).on('load', function() {
  		setTimeout(function() {
  			carouselReview();
  		}, 1000);
  	});


  	$(document).ready(function() {
  		document.getElementById("nav_close").click();
  	});
  </script>

  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/global/global.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets_admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

  

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  

  <?php if (isset($_SESSION['success'])) { ?>
  	<script type="text/javascript">
  		swal("<?php echo $_SESSION['success']; ?>");
  	</script>
  <?php }
	unset($_SESSION['success']); ?>
  </body>

  </html>