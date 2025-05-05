

    <!-- All JavaScript Files-->
    <script src="<?php echo URLROOT; ?>/assets2/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/jquery.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/waypoints.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/jquery.easing.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/owl.carousel.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/jquery.counterup.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/jquery.countdown.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/default/jquery.passwordstrength.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/default/dark-mode-switch.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/default/no-internet.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/default/active.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/pwa.js"></script>
  </body>
</html>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php } unset($_SESSION['success']); ?>