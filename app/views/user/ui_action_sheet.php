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
                        <h5 class="mb-0">Action Sheet</h5>
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
    <?php require APPROOT . '/views/inc_user/navbar_user.php'; ?>
    <!-- Sidebar End -->
    
    <div class="page-content">
        <div class="container fb">
            <div class="row">
                <div class="col-12">
                    <div class="card action-sheet">
                        <div class="card-header d-block">
                            <h5 class="title">Action Sheet</h5>
                        </div>
                        <div class="card-body">
                            <div class="dz-list">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);" class="item-content item-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom1" aria-controls="offcanvasBottom1">
                                            <div class="dz-icon bg-red light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M10.9,2 C11.4522847,2 11.9,2.44771525 11.9,3 C11.9,3.55228475 11.4522847,4 10.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,16 C20,15.4477153 20.4477153,15 21,15 C21.5522847,15 22,15.4477153 22,16 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L10.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        <path d="M24.0690576,13.8973499 C24.0690576,13.1346331 24.2324969,10.1246259 21.8580869,7.73659596 C20.2600137,6.12944276 17.8683518,5.85068794 15.0081639,5.72356847 L15.0081639,1.83791555 C15.0081639,1.42370199 14.6723775,1.08791555 14.2581639,1.08791555 C14.0718537,1.08791555 13.892213,1.15726043 13.7542266,1.28244533 L7.24606818,7.18681951 C6.93929045,7.46513642 6.9162184,7.93944934 7.1945353,8.24622707 C7.20914339,8.26232899 7.22444472,8.27778811 7.24039592,8.29256062 L13.7485543,14.3198102 C14.0524605,14.6012598 14.5269852,14.5830551 14.8084348,14.2791489 C14.9368329,14.140506 15.0081639,13.9585047 15.0081639,13.7695393 L15.0081639,9.90761477 C16.8241562,9.95755456 18.1177196,10.0730665 19.2929978,10.4469645 C20.9778605,10.9829796 22.2816185,12.4994368 23.2042718,14.996336 L23.2043032,14.9963244 C23.313119,15.2908036 23.5938372,15.4863432 23.9077781,15.4863432 L24.0735976,15.4863432 C24.0735976,15.0278051 24.0690576,14.3014082 24.0690576,13.8973499 Z" fill="#000000" fill-rule="nonzero" transform="translate(15.536799, 8.287129) scale(-1, 1) translate(-15.536799, -8.287129) "/>
                                                    </g>
                                                </svg>                                           
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Share Thumbs</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="item-content item-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom2" aria-controls="offcanvasBottom2">
                                            <div class="dz-icon bg-blue light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"/>
                                                        <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg>                                        
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Option Bar</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="item-content item-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom3" aria-controls="offcanvasBottom3">
                                            <div class="dz-icon bg-yellow light">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4" d="M13.7505 9.70301V7.68317C13.354 7.68317 13.0251 7.36375 13.0251 6.97857V4.57354C13.0251 4.25318 12.764 4.00047 12.4352 4.00047H5.7911C3.70213 4.00047 2 5.65299 2 7.68317V10.1154C2 10.3043 2.07737 10.4828 2.21277 10.6143C2.34816 10.7449 2.53191 10.82 2.72534 10.82C3.46035 10.82 4.02128 11.3273 4.02128 11.9944C4.02128 12.6905 3.45068 13.2448 2.73501 13.2532C2.33849 13.2532 2 13.5257 2 13.9203V16.3262C2 18.3555 3.70213 19.9995 5.78143 19.9995H12.4352C12.764 19.9995 13.0251 19.7449 13.0251 19.4265V17.3963C13.0251 17.0026 13.354 16.6917 13.7505 16.6917V14.8701C13.354 14.8701 13.0251 14.5497 13.0251 14.1655V10.4076C13.0251 10.0224 13.354 9.70301 13.7505 9.70301" fill="#130F26"/>
                                                    <path d="M19.9787 11.9948C19.9787 12.69 20.559 13.2443 21.265 13.2537C21.6615 13.2537 22 13.5262 22 13.9113V16.3258C22 18.3559 20.3075 20 18.2186 20H15.0658C14.7466 20 14.4758 19.7454 14.4758 19.426V17.3967C14.4758 17.0022 14.1567 16.6921 13.7505 16.6921V14.8705C14.1567 14.8705 14.4758 14.5502 14.4758 14.1659V10.4081C14.4758 10.022 14.1567 9.70348 13.7505 9.70348V7.6827C14.1567 7.6827 14.4758 7.36328 14.4758 6.9781V4.57401C14.4758 4.25366 14.7466 4 15.0658 4H18.2186C20.3075 4 22 5.64406 22 7.6733V10.0407C22 10.2286 21.9226 10.4081 21.7872 10.5387C21.6518 10.6702 21.4681 10.7453 21.2747 10.7453C20.559 10.7453 19.9787 11.31 19.9787 11.9948" fill="#130F26"/>
                                                </svg>                                        
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Success Bar</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="item-content item-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop4" aria-controls="offcanvasTop4">
                                            <div class="dz-icon bg-maroon light">
                                                 <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8861 2H16.9254C19.445 2 21.5 4 21.5 6.44V17.56C21.5 20.01 19.445 22 16.9047 22H11.8758C9.35611 22 7.29083 20.01 7.29083 17.57V12.77H13.6932L12.041 14.37C11.7312 14.67 11.7312 15.16 12.041 15.46C12.1959 15.61 12.4024 15.68 12.6089 15.68C12.8051 15.68 13.0117 15.61 13.1666 15.46L16.1819 12.55C16.3368 12.41 16.4194 12.21 16.4194 12C16.4194 11.8 16.3368 11.6 16.1819 11.46L13.1666 8.55C12.8568 8.25 12.3508 8.25 12.041 8.55C11.7312 8.85 11.7312 9.34 12.041 9.64L13.6932 11.23H7.29083V6.45C7.29083 4 9.35611 2 11.8861 2ZM2.5 11.9999C2.5 11.5799 2.85523 11.2299 3.2815 11.2299H7.29052V12.7699H3.2815C2.85523 12.7699 2.5 12.4299 2.5 11.9999Z" fill="#130F26"/>
                                                </svg>                                       
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Login</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="item-content item-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop5" aria-controls="offcanvasTop5">
                                            <div class="dz-icon bg-skyblue light">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="#130F26"/>
                                                </svg>                                         
                                            </div>
                                            <div class="dz-inner">
                                                <span class="dz-title">Register</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            

                            <!-- Thumbs -->
                            <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom1">
                                <div class="container">
                                    <div class="offcanvas-header">
										<h5 class="offcanvas-title" id="offcanvasBottomLabel">Share</h5>
                                        <button class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa fa-close"></i></button>
                                    </div>
                                    <div class="offcanvas-body small">
                                        <div class="d-flex flex-wrap">
                                            <a href="javascript:void(0);" class="mb-2 me-2 btn btn-icon btn-facebook"><i class="fab fa-facebook-f "></i></a>
                                            <a href="javascript:void(0);" class="mb-2 me-2 btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></a>
                                            <a href="javascript:void(0);" class="mb-2 me-2 btn btn-icon btn-google"><i class="fab fa-google"></i></a>
                                            <a href="javascript:void(0);" class="mb-2 me-2 btn btn-icon btn-whatsapp"><i class="fab fa-whatsapp"></i></a>
                                            <a href="javascript:void(0);" class="mb-2 me-2 btn btn-icon btn-phone"><i class="fa fa-phone"></i></a>
                                            <a href="javascript:void(0);" class="mb-2 me-2 btn btn-icon btn-email"><i class="fa fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Option Bar -->
                            <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom2">
                                <div class="container">
                                    <div class="offcanvas-body small text-center">
										<i class="fa fa-4x fa-info-circle text-secondary"></i>
                                        <h5 class="m-t15 m-b10">Are you sure?</h5>
                                        <p>You can continue with your previous actions.<br> Easy to attach these to success calls.</p>
                                        <div class="text-center m-t20">
                                            <a href="javascrpit:void(0);" class="btn btn-sm btn-danger me-2">Cancel</a>
                                            <a href="javascrpit:void(0);" class="btn btn-sm btn-secondary">Continue</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<!-- Success Bar -->
                            <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom3">
                                <div class="container">
                                    <div class="offcanvas-body small text-center">
										<i class="fa fa-check-circle fa-4x text-success"></i>
										<h5 class="m-t15 m-b10">Success</h5>
                                        <p class="m-b0">You can continue with your previous actions Easy to attach these to success calls.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Login -->
                            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop4" aria-labelledby="offcanvasTopLabel4">
								<div class="offcanvas-header">
									<div class="d-flex align-items-center">
										<h5 class="offcanvas-title" id="offcanvasTopLabel4">Sign</h5>
									</div>
									<button class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
								</div>
								<div class="offcanvas-body small">
									<div class="basic-form style-1">
										<form>
											<div class="mb-3 form-input">
												<span class="input-icon">
												   <i class="fa fa-at"></i>
												</span>
												<input type="email" class="form-control" placeholder="Email">
											</div>
											<div class="mb-3 form-input">
												<span class="input-icon">
												   <i class="fa fa-lock"></i>
												</span>
												<input type="password" class="form-control" placeholder="Password">
											</div>
											<div class="d-flex align-items-center mb-3">
												<a href="javascript:void(0);" class="btn-link m-r10">Forgot Password?</a>
												<a href="javascript:void(0);" class="btn-link">Create Account</a>
											</div>
											<a href="javascript:void(0);" class="btn btn-sm btn-secondary btn-block">LOGIN</a>
										</form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Register -->
                            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop5" aria-labelledby="offcanvasTopLabel5">
								<div class="offcanvas-header">
									<div> 
										<h5 class="offcanvas-title" id="offcanvasTopLabel5">Sign Up</h5>
									</div>
									<button class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
								</div>
								<div class="offcanvas-body small">
									<div class="basic-form style-1">
										<form>
											<div class="mb-3 form-input">
												<span class="input-icon">
												   <i class="fa fa-user"></i>
												</span>
												<input type="text" class="form-control" placeholder="Name">
											</div>
											<div class="mb-3 form-input">
												<span class="input-icon">
												   <i class="fa fa-at"></i>
												</span>
												<input type="email" class="form-control" placeholder="Email">
											</div>
											<div class="mb-3 form-input">
												<span class="input-icon">
												   <i class="fa fa-lock"></i>
												</span>
												<input type="password" class="form-control" placeholder="Password">
											</div>
											<div class="d-flex align-items-center mb-3">
												<a href="javascript:void(0);" class="btn-link m-r10">Forgot Password?</a>
												<a href="javascript:void(0);" class="btn-link">Create Account</a>
											</div>
											<a href="javascript:void(0);" class="btn btn-sm btn-secondary btn-block">LOGIN</a>
										</form>
									</div>
								</div>
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