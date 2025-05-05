<?php require APPROOT . '/views/inc_student/header.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<style>
    input.larger {
        width: 35px;
        height: 35px;
    }
</style>
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Add Wallet</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">My Details</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add Wallet</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class=" col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Add Wallet </header>
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
                    </div>


                    <form method="post" action="<?php echo URLROOT; ?>/student/pay" enctype="multipart/form-data" autocomplete="OFF">

                        <div class="card-body" id="bar-parent2">

                            <!-- <h4><strong>Personal Information:</strong></h4> -->
                            <div class="row">

                                </hr><br>
                                <div class="col-md-4 col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <label>Add Amount<span>*</span></label>
                                        <input type="text" class="form-control mdl-textfield__input" id="amount" name="amount" placeholder="Enter Wallet Amount" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6">
                                <button type="submit" class="btn btn-primary" style="float: right;" id="submit">Save</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        </form>

        <br>
        <div class="row">
            <div class=" col-sm-12">
                <div class="card-box">
                    <div class="card-body" id="bar-parent2">

                        <div class="row">

                            </hr><br>
                            <div class="col-md-4 col-sm-6">
                                <!-- text input -->
                                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <?php $get_wallet_detail = $data['get_wallet_detail']; ?>
                                    <label>
                                        <h1> Wallet Balance: <?php echo $get_wallet_detail->balance_amount; ?></h1>
                                    </label>

                                    <p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>




<?php require APPROOT . '/views/inc_student/footer.php'; ?>