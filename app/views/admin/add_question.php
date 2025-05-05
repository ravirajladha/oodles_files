<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<style>
	.image-upload>input {
		visibility: hidden;
		width: 0;
		height: 0
	}

	textarea {
		max-width: 100%;
		display: block;
	}

	#previewImg {
		height: 25px;
		width: 30px;
		pointer-events: none
	}

	.mdl-textfield {
		padding: -9px 0 !important;
	}


	textarea::-webkit-input-placeholder {
		color: #ffffff;
		font-size: 12px;
	}

	textarea:-moz-placeholder {
		/* Firefox 18- */
		color: #ffffff;
		font-size: 12px;
	}

	textarea::-moz-placeholder {
		/* Firefox 19+ */
		color: #ffffff;
		font-size: 12px;
	}

	textarea:-ms-input-placeholder {
		color: #ffffff;
		font-size: 12px;
	}

	textarea::placeholder {
		color: #ffffff;
		font-size: 12px;
	}

	.form-group{
		margin-bottom:-49px;
	}
	.preview-image{
		max-width: 100%;
    height: 100px;
	margin: 3px 0px;
	}
</style>
<!-- styling for tooltip -->
<style>
	/* Tooltip container */
.tip{
/* position: absolute; */
display: inline-block;
cursor: help; /*change the cursor symbol to a question mark on mouse over*/
color: inherit; /*inherit text color*/
text-decoration: none; /*remove underline*/

}

/*Tooltip text*/
.tip span {
visibility: hidden;
width:80%;
text-align: center;
padding: 1em 0em 1em 0em;
border: 1px solid;
border-radius: 0.5em;
font: 400 12px Arial;
color: #ffffff;
background-color: #E8D300;
display: inline-block;

/*Position the tooltip text*/
position: relative; /*positioned relative to the tooltip container*/
top: 105%;
z-index:100;
}

.tip:hover span {
visibility: visible;
}
	</style>

<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Question</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Question</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Question</li>
				</ol>

				

			</div>
		</div>

		<div class="tab-pane active fontawesome-demo" id="tab1">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-box">
						<div class="card-head">
							<header>Upload Questions</header>
							<div class="tools">
								<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
								<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
								<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
							</div>
						</div>
							<div class="card-body row">
							<form method="POST" action="<?php echo URLROOT; ?>/admin/bulk_upload_question" enctype="multipart/form-data" autocomplete="OFF">
							<!-- BANK DETAILS -->
							<div class="col-md-12 col-sm-12">
							
									<div class="row">
									<div class="col-lg-4">
									
									<label for="abc">Bulk Uploadation of Question<span>*</span>	
				<input type="file"  name="file" class="form-file-input form-control"></label>
			
							</div>
							<div class="col-lg-4">
						<label> </label>
								<button type="submit" class="btn btn-primary" name="importSubmit" id="submit">Submit</button>
</div>
								<div class="col-lg-4">
								<a href="<?php echo URLROOT?>/assets/files/bulk_upload_question.csv" download="bulk_upload_question.csv">Download Sample File</a>
							

								</div>
						

					
							</div>
							</div>
</form>
							</div>
							</div>
						</div>
					</div>
				</div>
			

		<form method="POST" action="<?php echo URLROOT; ?>/admin/create_question" enctype="multipart/form-data" autocomplete="OFF">
			<div class="row">
				<div class=" col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Add Question </header>
							<!-- <button id="panel-button3" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button3">
							<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
								here</li>
						</ul> -->
						<a href="javascript:void(0)" class="tip">
				
						<p class="icon-info "></p>
<span>
Guidlines to enter the Add question given by Admin will be shown here.
</span></a>
						</div>

						<div class="card-body row">
							<!-- BANK DETAILS -->
							<div class="col-md-12 col-sm-12">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<div class="row">
									<div class="col-lg-3">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Class</label><br>
									<select class="form-control" name="class" id="class" required>
										<option readonly>--Select--</option>
										<?php foreach ($data['get_all_class'] as $class) { ?>
											<option value=<?php echo $class->id; ?>><?php echo $class->class_name; ?></option>
										<?php } ?>
									</select>

								</div>
							</div>
							<div class="col-lg-3">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Subjects</label><br>
									<select class="form-control" name="subject" id="subject" required>
										<option readonly>--Select--</option>
										
									</select>

								</div>
							</div>

							<div class="col-lg-3">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Chapter</label><br>

									<select class="form-control" name="chapter" id="chapter" required>
										<option value="">-Select-</option>
									</select>

								</div>
							</div>
										
										<div class="col-lg-3">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label class="mdl-textfield__label">Select Topic</label><br>
										
											<select name="topic" id="topic" class="form-control">
												<option value="">-Select-</option>
											</select>
										</div>
										</div>
										
									</div>

								</div>
							</div>
					
							<div class="col-md-12 col-sm-12">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;">Enter Question <span>*</span>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input">
												&ensp;&ensp;<i class="fa fa-image"></i>
												&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>
											
											<input id="file-input" type="file" onchange="previewImage(event)" name="question_img" />
										</div>
									</label>
									<div class="image-preview" id="image-preview">

									</div>
									<textarea rows="4" name="question" placeholder="Enter Question" style="background-color:#6673fc;color:white;width:100%;" required></textarea>
								</div>
							</div>
						

							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block; max-width: 100%;">1st Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option1" required>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input1">
												&ensp;&ensp;<i class="fa fa-image"></i>&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>

											<input id="file-input1" type="file" onchange="previewOption1Image(event)" name="option1_img" />
										</div>
									</label>
									<div class="image-preview" id="image-option1">

									</div>
									<textarea id="oodles_editor1" rows="4" cols="30" name="option1" placeholder="Enter First Option" style="background-color:#ff7400;"></textarea>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;">2nd Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option2" required>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input2">
												&ensp;&ensp;<i class="fa fa-image"></i>&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>

											<input id="file-input2" type="file" onchange="previewOption2Image(event)" name="option2_img" />
										</div>
									</label>
									<div class="image-preview" id="image-option2">

									</div>
									<textarea id="oodles_editor2" rows="4" cols="30" name="option2" placeholder="Enter Second Option" style="background-color:#ff7400;"></textarea>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;max-width: 100%;">3rd Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option3" required>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input3">
												&ensp;&ensp;<i class="fa fa-image"></i>&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>

											<input id="file-input3" type="file" onchange="previewOption3Image(event)" name="option3_img" />
										</div>
									</label>
									<div class="image-preview" id="image-option3">

									</div>
									<textarea id="oodles_editor3" rows="4" cols="30" name="option3" placeholder="Enter Third Option" style="background-color:#ff7400;"></textarea>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;max-width: 100%;">4th Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option4" required>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input4">
												&ensp;&ensp;<i class="fa fa-image"></i>&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>

											<input id="file-input4" type="file" onchange="previewOption4Image(event)" name="option4_img" style="display: none;" />
										</div>
									</label>
									<div class="image-preview" id="image-option4">

									</div>
									<textarea id="oodles_editor4" rows="4" cols="30" name="option4" placeholder="Enter Fourth Option" style="background-color:#ff7400;"></textarea>
								</div>
							</div>
					
						</div>
					</div>





				</div>

				<!-- second div start -->
<div class="tab-pane active fontawesome-demo" id="tab1">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-box">
						<div class="card-head">
							<header>Enter Explanation</header>
							<div class="tools">
								<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
								<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
								<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
							</div>
						</div>
						<div class="card-body collapse">
							<div class="row">
							<div class="col-md-12 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block; max-width: 100%;">Explanation<span>*</span>

										<div class="image-upload" style="display:inline-block;">
											<label for="file-input5">
												&ensp;&ensp;<i class="fa fa-image"></i>&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>

											<input id="file-input5" type="file" name="explanation_img" />
										</div>
									</label>
									<textarea id="oodles_editor5" rows="2" name="explanation" placeholder="Enter Explanation" style="width:100%;background-color:#800080"></textarea>
								</div>
							</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- second div end -->
				<div class="row">

					<div class="col-lg-6 col-lg-6">
						<button type="submit" class="btn btn-primary" style="float: left;" id="submit" name="single_question"  value="single">Submit</button>
					</div>
					<div class="col-lg-6 col-lg-6">
						<button type="submit" class="btn btn-primary" style="float: right;" id="submit" name="multi_question" value="multi">Submit & Add More</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- First div end -->

</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>

<script>
	$(document).ready(function() {
		$(document).on('change', '#subject', function() {
			var subject_id = $(this).val();

			if (subject_id.length != 0) {
				$.ajax({
					type: 'POST',
					url: '<?php echo URLROOT ?>/admin/get_subject_chapter_name',
					data: {
						subject_id
					},
					success: function(data) {
						$('#chapter').html(data);
					},

					error: function(jqXHR, textStatus, errorThrown) {
						// error
					}
				});
			} else {
				$('#chapter').html('<option value="">-Select-</option>');
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$(document).on('change', '#class', function() {
			var class_id = $(this).val();
			if (class_id.length != 0) {
				$.ajax({
					type: 'POST',
					url: '<?php echo URLROOT ?>/admin/get_subject_class_name',
					data: {
						class_id
					},
					success: function(data) {
						$('#subject').html(data);
					},

					error: function(jqXHR, textStatus, errorThrown) {
						// error
					}
				});
			} else {
				$('#subject').html('<option value="">-Select-</option>');
			}
		});
	});
</script>
<script>
    $(document).ready(function(){
        $(document).on('change', '#chapter', function(){
            var chapter_id = $(this).val();
		
            if(chapter_id.length != 0){
                $.ajax({
                    type: 'POST',
                    url: '<?php echo URLROOT?>/admin/get_topic_chapter_wise',
                    data: {chapter_id},
                    success: function(data){
                        $('#topic').html(data);
                    },

                    error: function(jqXHR, textStatus, errorThrown){
                        // error
                    }
                });
            }else{
                $('#topic').html('<option value="">-Select-</option>');
            }
        });
    });
</script>
<script>
									$(function() {
    $('#change_id').click(function() {
        $(this).attr('editor', 'oodles_editor');
    });
});
</script>
<script>
	CKEDITOR.replace('oodles_editor1', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>
<script>
	CKEDITOR.replace('oodles_editor2', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>
<script>
	CKEDITOR.replace('oodles_editor3', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>
<script>
	CKEDITOR.replace('oodles_editor4', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>
<script>
	CKEDITOR.replace('oodles_editor5', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>

<!-- imgae preview -->
<script>
    function previewImage(event) {
      var input = event.target;
      var reader = new FileReader();
      
      reader.onload = function() {
        var imagePreview = document.getElementById('image-preview');
        imagePreview.innerHTML = '<img class="preview-image" src="' + reader.result + '" alt="Image Preview">';
      }
      
      reader.readAsDataURL(input.files[0]);
    }
	function previewOption1Image(event) {
      var input = event.target;
      var reader = new FileReader();
      
      reader.onload = function() {
        var imagePreview = document.getElementById('image-option1');
        imagePreview.innerHTML = '<img class="preview-image" src="' + reader.result + '" alt="Image Preview">';
      }
      
      reader.readAsDataURL(input.files[0]);
    }
	function previewOption2Image(event) {
      var input = event.target;
      var reader = new FileReader();
      
      reader.onload = function() {
        var imagePreview = document.getElementById('image-option2');
        imagePreview.innerHTML = '<img class="preview-image" src="' + reader.result + '" alt="Image Preview">';
      }
      
      reader.readAsDataURL(input.files[0]);
    }
	function previewOption3Image(event) {
      var input = event.target;
      var reader = new FileReader();
      
      reader.onload = function() {
        var imagePreview = document.getElementById('image-option3');
        imagePreview.innerHTML = '<img class="preview-image" src="' + reader.result + '" alt="Image Preview">';
      }
      
      reader.readAsDataURL(input.files[0]);
    }
	function previewOption4Image(event) {
      var input = event.target;
      var reader = new FileReader();
      
      reader.onload = function() {
        var imagePreview = document.getElementById('image-option4');
        imagePreview.innerHTML = '<img class="preview-image" src="' + reader.result + '" alt="Image Preview">';
      }
      
      reader.readAsDataURL(input.files[0]);
    }
  </script>
