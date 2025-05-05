
</div>  
<!--**********************************
    Scripts
***********************************-->
<script src="index.js" defer></script>
<script src="<?php echo URLROOT; ?>/assets_retail/js/jquery.js"></script>
<script src="<?php echo URLROOT; ?>/assets_retail/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets_retail/js/settings.js"></script>
<script src="<?php echo URLROOT; ?>/assets_retail/js/custom.js"></script>
<script src="<?php echo URLROOT; ?>/assets_retail/js/dz.carousel.js"></script><!-- Swiper -->
<script src="<?php echo URLROOT; ?>/assets_retail/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <?php if (isset($_SESSION['success'])) { ?>
  	<script type="text/javascript">
  		swal("<?php echo $_SESSION['success']; ?>");
  	</script>
  <?php }
	unset($_SESSION['success']); ?>
</body>
</html>