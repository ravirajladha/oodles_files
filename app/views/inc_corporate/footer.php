
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<div class="page-footer">
			<div class="page-footer-inner"> 2022 &copy; Oodles In, Powered by Kods
				
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- end footer -->
	</div>
	<!-- start js include path -->
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

<!-- <script type="text/javascript">
var toolbarGroups = [
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others', groups: [ 'others' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'cleanup', 'basicstyles'] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'about', groups: [ 'about' ] },
		
		
];
var removeButtons = '';
var initEditor = function() {
  return CKEDITOR.replace( 'oodles_editor',{
    toolbarGroups,
	removeButtons
   });
}
initEditor();
</script> -->
<!-- <script src="https://cdn.ckeditor.com/4.16.0/full-all/ckeditor.js"></script> 

<script>
    CKEDITOR.replace('oodles_editor', {
        extraPlugins: 'mathjax',
        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
        height: 320
    });

    if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
        document.getElementById('ie8-warning').className = 'tip alert';
    }

    function domChanged() {
        renderMathInElement(document.body);
    }
</script> -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if(isset($_SESSION['success'])){ ?>
 <script type="text/javascript">
     swal("<?php echo $_SESSION['success']; ?>");
 </script>
<?php } unset($_SESSION['success']); ?>
<script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML" async>
    </script>


<script src="https://cdn.ckeditor.com/4.16.0/full-all/ckeditor.js"></script> 
<!-- <textarea id="oodles_editor" name="oodles_editor">Oodles</textarea> -->
<script>
    CKEDITOR.replace('oodles_editor', {
        extraPlugins: 'mathjax',
        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
        height: 50
    });

    if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
        document.getElementById('ie8-warning').className = 'tip alert';
    }

    function domChanged() {
        renderMathInElement(document.body);
    }

	
</script>

<script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML" async>
    </script>