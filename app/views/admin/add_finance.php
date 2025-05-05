<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Add Fees</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Fees</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Fees</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Add Fees</header>
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul>
								</div>
								<div class="card-body row">
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtroll">
											<label class="mdl-textfield__label">Roll No</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtname">
											<label class="mdl-textfield__label">Student Name</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<input class="mdl-textfield__input" type="text" id="list2" value="" readonly
												tabIndex="-1">
											<label for="list2" class="pull-right margin-0">
												<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
											</label>
											<label for="list2" class="mdl-textfield__label">Department/Class</label>
											<ul data-mdl-for="list2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
												<li class="mdl-menu__item" data-val="DE">Mathematics</li>
												<li class="mdl-menu__item" data-val="BY">Science</li>
												<li class="mdl-menu__item" data-val="BY">Engineering</li>
												<li class="mdl-menu__item" data-val="BY">M.B.A.</li>
												<li class="mdl-menu__item" data-val="OT">Other</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<input class="mdl-textfield__input" type="text" id="list5" value="" readonly
												tabIndex="-1">
											<label class="pull-right margin-0">
												<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
											</label>
											<label class="mdl-textfield__label">Fees Type</label>
											<ul data-mdl-for="list5" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
												<li class="mdl-menu__item" data-val="DE">Annual</li>
												<li class="mdl-menu__item" data-val="BY">Tuition</li>
												<li class="mdl-menu__item" data-val="BY">Transport</li>
												<li class="mdl-menu__item" data-val="BY">Exam</li>
												<li class="mdl-menu__item" data-val="LB">Library</li>
												<li class="mdl-menu__item" data-val="OT">Other</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-2 p-t-20">
										<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
											<input type="radio" id="option-2" class="mdl-radio__button" name="options"
												value="2">
											<span class="mdl-radio__label">Monthly</span>
										</label>
									</div>
									<div class="col-lg-2 p-t-20">
										<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
											<input type="radio" id="option-3" class="mdl-radio__button" name="options"
												value="3" checked>
											<span class="mdl-radio__label">Yearly</span>
										</label>
									</div>
									<div class="col-lg-2 p-t-20">
										<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
											<input type="radio" id="option-1" class="mdl-radio__button" name="options"
												value="1">
											<span class="mdl-radio__label">Session</span>
										</label>
									</div>
									<div class="col-lg-12 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="amount">
											<label class="mdl-textfield__label">Ammount</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="date">
											<label class="mdl-textfield__label">Collection Date</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<input class="mdl-textfield__input" type="text" id="list9" value="" readonly
												tabIndex="-1">
											<label for="list9" class="pull-right margin-0">
												<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
											</label>
											<label for="list9" class="mdl-textfield__label">Payment Type</label>
											<ul data-mdl-for="list9" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
												<li class="mdl-menu__item" data-val="DE">Cash</li>
												<li class="mdl-menu__item" data-val="BY">Cheque</li>
												<li class="mdl-menu__item" data-val="BY">Online Transfer</li>
												<li class="mdl-menu__item" data-val="BY">Draft</li>
												<li class="mdl-menu__item" data-val="OT">Other</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="paymentReference">
											<label class="mdl-textfield__label">Payment Reference Number</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
											<input class="mdl-textfield__input" type="text" id="list8" value="" readonly
												tabIndex="-1">
											<label for="list2" class="pull-right margin-0">
												<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
											</label>
											<label for="list2" class="mdl-textfield__label">Status</label>
											<ul data-mdl-for="list8" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
												<li class="mdl-menu__item" data-val="DE">Paid</li>
												<li class="mdl-menu__item" data-val="BY">Unpaid</li>
												<li class="mdl-menu__item" data-val="BY">Pending</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield txt-full-width">
											<textarea class="mdl-textfield__input" rows="4" id="text7"></textarea>
											<label class="mdl-textfield__label" for="text7">Payment Details</label>
										</div>
									</div>
									<div class="col-lg-12 p-t-20 text-center">
										<button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
										<button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<?php require APPROOT . '/views/inc_admin/footer.php'; ?> 