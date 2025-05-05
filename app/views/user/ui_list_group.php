<?php require APPROOT . '/views/inc_user/header.php'; ?>
    <!-- Preloader end-->
	
	<!-- Header -->
    <header class="header">
        <div class="main-bar">
            <div class="container">
                <div class="header-content">
                    <div class="left-content">
                        <a href="javascript:void(0);" class="back-btn">
                            <svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z" fill="#a19fa8"/>
							</svg>
                        </a>
                    </div>
                    <div class="mid-content">
                        <h5 class="mb-0">List Group</h5>
                    </div>
                    <div class="right-content">
                        <a href="javascript:void(0);" class="menu-toggler">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path opacity="0.4" d="M16.0755 2H19.4615C20.8637 2 22 3.14585 22 4.55996V7.97452C22 9.38864 20.8637 10.5345 19.4615 10.5345H16.0755C14.6732 10.5345 13.537 9.38864 13.537 7.97452V4.55996C13.537 3.14585 14.6732 2 16.0755 2Z" fill="#a19fa8"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="#a19fa8"/>
							</svg>
						</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    
    <!-- Sidebar -->
    <?php require APPROOT . '/views/inc_user/navbar.php'; ?>
    <!-- Sidebar End -->
    
    <div class="page-content">
        <div class="container fb">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Basic List Group</h5>
                        </div>
                        <div class="card-body py-2">
                            <div class="dz-list">
                                <ul>
                                    <li>
                                        <a href="<?php echo URLROOT ?>/retail/ui_accordion" class="item-content item-link">
                                            <div class="dz-icon bg-red light">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4" d="M13.7505 9.70301V7.68317C13.354 7.68317 13.0251 7.36375 13.0251 6.97857V4.57354C13.0251 4.25318 12.764 4.00047 12.4352 4.00047H5.7911C3.70213 4.00047 2 5.65299 2 7.68317V10.1154C2 10.3043 2.07737 10.4828 2.21277 10.6143C2.34816 10.7449 2.53191 10.82 2.72534 10.82C3.46035 10.82 4.02128 11.3273 4.02128 11.9944C4.02128 12.6905 3.45068 13.2448 2.73501 13.2532C2.33849 13.2532 2 13.5257 2 13.9203V16.3262C2 18.3555 3.70213 19.9995 5.78143 19.9995H12.4352C12.764 19.9995 13.0251 19.7449 13.0251 19.4265V17.3963C13.0251 17.0026 13.354 16.6917 13.7505 16.6917V14.8701C13.354 14.8701 13.0251 14.5497 13.0251 14.1655V10.4076C13.0251 10.0224 13.354 9.70301 13.7505 9.70301" fill="#130F26"></path>
                                                    <path d="M19.9787 11.9948C19.9787 12.69 20.559 13.2443 21.265 13.2537C21.6615 13.2537 22 13.5262 22 13.9113V16.3258C22 18.3559 20.3075 20 18.2186 20H15.0658C14.7466 20 14.4758 19.7454 14.4758 19.426V17.3967C14.4758 17.0022 14.1567 16.6921 13.7505 16.6921V14.8705C14.1567 14.8705 14.4758 14.5502 14.4758 14.1659V10.4081C14.4758 10.022 14.1567 9.70348 13.7505 9.70348V7.6827C14.1567 7.6827 14.4758 7.36328 14.4758 6.9781V4.57401C14.4758 4.25366 14.7466 4 15.0658 4H18.2186C20.3075 4 22 5.64406 22 7.6733V10.0407C22 10.2286 21.9226 10.4081 21.7872 10.5387C21.6518 10.6702 21.4681 10.7453 21.2747 10.7453C20.559 10.7453 19.9787 11.31 19.9787 11.9948" fill="#130F26"></path>
                                                </svg>                                          
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Accordion</span>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="<?php echo URLROOT ?>/retail/ui_action_modal" class="item-content item-link">
                                            <div class="dz-icon bg-blue light">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<path d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z" fill="#fff"></path>
													</g>
												</svg>                                      
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Action Modal</span>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="<?php echo URLROOT ?>/retail/ui_action_sheet" class="item-content item-link">
                                            <div class="dz-icon bg-pink light">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z" fill="#130F26"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07996 6.65V6.66C7.64896 6.66 7.29996 7.01 7.29996 7.44C7.29996 7.87 7.64896 8.22 8.07996 8.22H11.069C11.5 8.22 11.85 7.87 11.85 7.429C11.85 7 11.5 6.65 11.069 6.65H8.07996ZM15.92 12.74H8.07996C7.64896 12.74 7.29996 12.39 7.29996 11.96C7.29996 11.53 7.64896 11.179 8.07996 11.179H15.92C16.35 11.179 16.7 11.53 16.7 11.96C16.7 12.39 16.35 12.74 15.92 12.74ZM15.92 17.31H8.07996C7.77996 17.35 7.48996 17.2 7.32996 16.95C7.16996 16.69 7.16996 16.36 7.32996 16.11C7.48996 15.85 7.77996 15.71 8.07996 15.74H15.92C16.319 15.78 16.62 16.12 16.62 16.53C16.62 16.929 16.319 17.27 15.92 17.31Z" fill="#130F26"></path>
                                                </svg>                                        
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Action Sheet</span>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="<?php echo URLROOT ?>/retail/ui_alert" class="item-content item-link">
                                            <div class="dz-icon bg-yellow light">
                                                <svg xmlns="http://www.w3.org/2000/svg"  width="18" height="18" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                                        <path d="M10.5857864,12 L9.17157288,10.5857864 C8.78104858,10.1952621 8.78104858,9.56209717 9.17157288,9.17157288 C9.56209717,8.78104858 10.1952621,8.78104858 10.5857864,9.17157288 L12,10.5857864 L13.4142136,9.17157288 C13.8047379,8.78104858 14.4379028,8.78104858 14.8284271,9.17157288 C15.2189514,9.56209717 15.2189514,10.1952621 14.8284271,10.5857864 L13.4142136,12 L14.8284271,13.4142136 C15.2189514,13.8047379 15.2189514,14.4379028 14.8284271,14.8284271 C14.4379028,15.2189514 13.8047379,15.2189514 13.4142136,14.8284271 L12,13.4142136 L10.5857864,14.8284271 C10.1952621,15.2189514 9.56209717,15.2189514 9.17157288,14.8284271 C8.78104858,14.4379028 8.78104858,13.8047379 9.17157288,13.4142136 L10.5857864,12 Z" fill="#000000"/>
                                                    </g>
                                                </svg>                                        
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Alert</span>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="<?php echo URLROOT ?>/retail/ui_input" class="item-content item-link">
                                            <div class="dz-icon bg-skyblue light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <rect fill="#000000" opacity="0.3" x="2" y="4" width="20" height="5" rx="1"></rect>
                                                        <path d="M5,7 L8,7 L8,21 L7,21 C5.8954305,21 5,20.1045695 5,19 L5,7 Z M19,7 L19,19 C19,20.1045695 18.1045695,21 17,21 L11,21 L11,7 L19,7 Z" fill="#000000"></path>
                                                    </g>
                                                </svg>                                      
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Input</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Image List Group</h5>
                        </div>
                        <div class="card-body py-2">
                            <div class="dz-list">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);" class="item-content item-link">
                                            <div class="dz-icon">
                                                <img src="assets/images/avatar/1.jpg" alt="/">
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">James</span>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="javascript:void(0);" class="item-content item-link">
                                            <div class="dz-icon">
                                                <img src="assets/images/avatar/2.jpg" alt="/">
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Robert</span>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="javascript:void(0);" class="item-content item-link">
                                            <div class="dz-icon">
                                                <img src="assets/images/avatar/3.jpg" alt="/">
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">John</span>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="javascript:void(0);" class="item-content item-link">
                                            <div class="dz-icon">
                                                <img src="assets/images/avatar/4.jpg" alt="/">
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">David</span>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="javascript:void(0);" class="item-content item-link">
                                            <div class="dz-icon">
                                                <img src="assets/images/avatar/5.jpg" alt="/">
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Richard</span>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="javascript:void(0);" class="item-content item-link">
                                            <div class="dz-icon">
                                                <img src="assets/images/avatar/6.jpg" alt="/">
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Joseph</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Text List Group</h5>
                        </div>
                        <div class="card-body py-2">
                            <div class="dz-list">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);" class="item-content item-link">
                                            <div class="dz-inner">
                                                <div class="dz-title">Notification</div>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="javascript:void(0);" class="item-content item-link">
                                            <div class="dz-inner">
                                                <div class="dz-title">Settings</div>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="javascript:void(0);" class="item-content item-link">
                                            <div class="dz-inner d-flex align-items-center w-100">
                                                <div class="dz-title flex-1">Update</div>
                                                <span class="badge badge-circle badge-primary me-3 mb-1">8</span>
                                            </div>
                                        </a>
                                    </li>
									<li>
                                        <a href="javascript:void(0);" class="item-content item-link">
                                            <div class="dz-inner d-flex align-items-center w-100">
                                                <div class="dz-title flex-1">Email</div>
                                                <span class="badge badge-primary badge-circle me-3 mb-1">1</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>   
    </div>
	
    <!-- Menubar -->
	<?php require APPROOT . '/views/inc_user/navbar_footer.php'; ?>
	<!-- Menubar -->
    
    
    <!-- Theme Color Settings -->
	<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom">
        <div class="offcanvas-body small">
            <ul class="theme-color-settings">
                <li>
                    <input class="filled-in" id="primary_color_8" name="theme_color" type="radio" value="color-primary" />
					<label for="primary_color_8"></label>
                    <span>Default</span>
                </li>
                <li>
					<input class="filled-in" id="primary_color_2" name="theme_color" type="radio" value="color-green" />
					<label for="primary_color_2"></label>
                    <span>Green</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_3" name="theme_color" type="radio" value="color-blue" />
					<label for="primary_color_3"></label>
                    <span>Blue</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_4" name="theme_color" type="radio" value="color-pink" />
					<label for="primary_color_4"></label>
                    <span>Pink</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_5" name="theme_color" type="radio" value="color-yellow" />
					<label for="primary_color_5"></label>
                    <span>Yellow</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_6" name="theme_color" type="radio" value="color-orange" />
					<label for="primary_color_6"></label>
                    <span>Orange</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_7" name="theme_color" type="radio" value="color-purple" />
					<label for="primary_color_7"></label>
                    <span>Purple</span>
                </li>
                <li>
					<input class="filled-in" id="primary_color_1" name="theme_color" type="radio" value="color-red" />
					<label for="primary_color_1"></label>
                    <span>Red</span>
                </li>
                <li>
					<input class="filled-in" id="primary_color_9" name="theme_color" type="radio" value="color-lightblue" />
					<label for="primary_color_9"></label>
                    <span>Lightblue</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_10" name="theme_color" type="radio" value="color-teal" />
					<label for="primary_color_10"></label>
                    <span>Teal</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_11" name="theme_color" type="radio" value="color-lime" />
					<label for="primary_color_11"></label>
                    <span>Lime</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_12" name="theme_color" type="radio" value="color-deeporange" />
					<label for="primary_color_12"></label>
                    <span>Deeporange</span>
                </li>
            </ul>
        </div>
    </div>
	<!-- Theme Color Settings End -->
</div>

<!--**********************************
    Scripts
***********************************-->
<?php require APPROOT . '/views/inc_user/footer.php'; ?>