<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>

<?php
$adminMod = new Admins;

?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Notifications</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Account</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Notification</li>
				</ol>
			</div>
		</div>
		<form action="<?php echo URLROOT ?>/student/delete_notifications" method="POST">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card  card-box">
						<div class="card-head">
							<header>Notifications </header><button type="submit" style="float:right;">Delete</button>
							<div class="tools">
								<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
								<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
								<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
							</div>
						</div>
						<div class="card-body no-padding height-9">
							<div class="row">
								<div class="noti-information notification-menu">
									<div class="notification-list mail-list not-list small-slimscroll-style">
										<?php
										$count_for_limiting_message = 0;
										
										foreach ($data['get_notifications'] as $notification) {
											// $message_visible should be 0 else its deleted from user side.
											// Its a delete flag
											$message_visible = $notification->flag_delete;
											$count_for_limiting_message++;
											if ($message_visible==0) {
										?>

												<a href="javascript:;" class="single-mail"> <input type="checkbox" name="notification[]" value=<?php echo $notification->id;?>><span class="icon bg-primary"> <i class="fa fa-user-o"></i>
													</span> <?php echo $notification->message; ?>
													<span class="notificationtime">
														<?php if ($notification->flag == 1) { ?>
															<small>Read</small>
														<?php } else { ?>
															<small>UnRead</small>
														<?php  } ?>

													</span>

												</a>

										<?php }
										}
										?>
										<!-- <a href="javascript:;" class="single-mail"> <span
														class="icon blue-bgcolor"> <i class="fa fa-envelope-o"></i>
													</span> <span class="text-purple">John Doe</span> send you a mail
													<span class="notificationtime">
														<small>Just Now</small>
													</span>
												</a>
												<a href="javascript:;" class="single-mail"> <span
														class="icon bg-success"> <i class="fa fa-check-square-o"></i>
													</span> Success Message
													<span class="notificationtime">
														<small> 2 Days Ago</small>
													</span>
												</a>
												<a href="javascript:;" class="single-mail"> <span
														class="icon bg-warning"> <i class="fa fa-warning"></i>
													</span> <strong>Database Overloaded Warning!</strong>
													<span class="notificationtime">
														<small>1 Week Ago</small>
													</span>
												</a>
												<a href="javascript:;" class="single-mail"> <span
														class="icon bg-primary"> <i class="fa fa-user-o"></i>
													</span> <span class="text-purple">Abhay Jani</span> Added you as
													friend
													<span class="notificationtime">
														<small>Just Now</small>
													</span>
												</a>
												<a href="javascript:;" class="single-mail"> <span
														class="icon blue-bgcolor"> <i class="fa fa-envelope-o"></i>
													</span> <span class="text-purple">John Doe</span> send you a mail
													<span class="notificationtime">
														<small>Just Now</small>
													</span>
												</a>
												<a href="javascript:;" class="single-mail"> <span
														class="icon bg-success"> <i class="fa fa-check-square-o"></i>
													</span> Success Message
													<span class="notificationtime">
														<small> 2 Days Ago</small>
													</span>
												</a>
												<a href="javascript:;" class="single-mail"> <span
														class="icon bg-warning"> <i class="fa fa-warning"></i>
													</span> <strong>Database Overloaded Warning!</strong>
													<span class="notificationtime">
														<small>1 Week Ago</small>
													</span>
												</a>
												<a href="javascript:;" class="single-mail"> <span
														class="icon bg-danger"> <i class="fa fa-times"></i>
													</span> <strong>Server Error!</strong>
													<span class="notificationtime">
														<small>10 Days Ago</small>
													</span>
												</a> -->
									</div>
									<!-- <div class="full-width text-center p-t-10">
												<button type="button"
													class="btn purple btn-outline btn-circle margin-0">View All</button>
											</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</form>

	</div>
</div>
<!-- end page content -->

<?php require APPROOT . '/views/inc_student/footer.php'; ?>