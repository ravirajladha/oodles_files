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
                        <h5 class="mb-0">Message</h5>
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
    
    <!-- Page Content -->
    <div class="page-content fb">
        <div class="container pb-0"> 
            <div class="input-group input-search">
                <span class="input-group-text"> 
                    <a href="javascript:void(0);" class="search-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M20.5605 18.4395L16.7528 14.6318C17.5395 13.446 18 12.0262 18 10.5C18 6.3645 14.6355 3 10.5 3C6.3645 3 3 6.3645 3 10.5C3 14.6355 6.3645 18 10.5 18C12.0262 18 13.446 17.5395 14.6318 16.7528L18.4395 20.5605C19.0245 21.1462 19.9755 21.1462 20.5605 20.5605C21.1462 19.9748 21.1462 19.0252 20.5605 18.4395ZM5.25 10.5C5.25 7.605 7.605 5.25 10.5 5.25C13.395 5.25 15.75 7.605 15.75 10.5C15.75 13.395 13.395 15.75 10.5 15.75C7.605 15.75 5.25 13.395 5.25 10.5Z" fill="#B9B9B9"></path>
                        </svg>
                    </a>
                </span>
                <input type="text" id="myInput" placeholder="Search job here..." class="form-control bs-0 ps-0">
            </div>
        </div>
        <div class="container pt-0">
            <!-- Masseges List -->
            <ul class="dz-list message-list">
                <li>
                    <a href="<?php echo URLROOT ?>/retail/messages_detail">
                        <div class="media media-45 rounded-circle">
                            <img src="<?php echo URLROOT ?>/assets_retail/images/message/pic1.jpg" alt="image">
                        </div>
                        <div class="media-content">
                            <div>
                                <h6 class="name">Gustauv Semalam</h6>
                                <p class="my-1">
                                    <svg  enable-background="new 0 0 460.702 460.702" class="text-primary me-1" width="15" height="15" viewBox="0 0 460.702 460.702">
                                        <path d="m316.608 121.805c-8.937-9.037-23.499-9.151-32.576-.254l-170.268 168.282-74.017-76.626c-8.828-9.201-23.443-9.503-32.643-.675-9.201 8.828-9.503 23.443-.675 32.643.04.041.079.082.119.123l90.248 93.526c4.319 4.406 10.222 6.901 16.392 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.797-184.697c9.025-8.95 9.117-23.511.208-32.576z"/>
                                        <path d="m235.318 338.824c4.308 4.395 10.192 6.888 16.346 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.798-184.697c8.467-9.534 7.602-24.126-1.931-32.593-8.643-7.676-21.63-7.777-30.391-.237l-170.199 168.282-6.072-6.303c-8.827-9.201-23.442-9.504-32.643-.676-9.201 8.827-9.504 23.442-.676 32.643.04.042.08.083.12.124z"/>
                                    </svg>
                                    Roger that sir, thankyou
                                </p>
                            </div>
                            <span class="time">2m ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/retail/messages_detail">
                        <div class="media media-45 rounded-circle">
                            <img src="<?php echo URLROOT ?>/assets_retail/images/message/pic2.jpg" alt="image">
                        </div>
                        <div class="media-content">
                            <div>
                                <h6 class="name">Claudia Surrr</h6>
                                <p class="my-1">
                                    <svg enable-background="new 0 0 460.702 460.702" class="text-primary me-1" width="15" height="15" viewBox="0 0 460.702 460.702">
                                        <path d="m316.608 121.805c-8.937-9.037-23.499-9.151-32.576-.254l-170.268 168.282-74.017-76.626c-8.828-9.201-23.443-9.503-32.643-.675-9.201 8.828-9.503 23.443-.675 32.643.04.041.079.082.119.123l90.248 93.526c4.319 4.406 10.222 6.901 16.392 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.797-184.697c9.025-8.95 9.117-23.511.208-32.576z"/>
                                        <path d="m235.318 338.824c4.308 4.395 10.192 6.888 16.346 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.798-184.697c8.467-9.534 7.602-24.126-1.931-32.593-8.643-7.676-21.63-7.777-30.391-.237l-170.199 168.282-6.072-6.303c-8.827-9.201-23.442-9.504-32.643-.676-9.201 8.827-9.504 23.442-.676 32.643.04.042.08.083.12.124z"/>
                                    </svg>
                                    OK. Lorem ipsum dolor sect...
                                </p>
                            </div>
                            <span class="time">2m ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/retail/messages_detail">
                        <div class="media media-45 rounded-circle">
                            <img src="<?php echo URLROOT ?>/assets_retail/images/message/pic3.jpg" alt="image">
                        </div>
                        <div class="media-content">
                            <div>
                                <h6 class="name">Rose Melati</h6>
                                <p class="my-1">
                                    <svg  enable-background="new 0 0 460.702 460.702" class="text-primary me-1" width="15" height="15" viewBox="0 0 460.702 460.702">
                                        <path d="m316.608 121.805c-8.937-9.037-23.499-9.151-32.576-.254l-170.268 168.282-74.017-76.626c-8.828-9.201-23.443-9.503-32.643-.675-9.201 8.828-9.503 23.443-.675 32.643.04.041.079.082.119.123l90.248 93.526c4.319 4.406 10.222 6.901 16.392 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.797-184.697c9.025-8.95 9.117-23.511.208-32.576z"/>
                                        <path d="m235.318 338.824c4.308 4.395 10.192 6.888 16.346 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.798-184.697c8.467-9.534 7.602-24.126-1.931-32.593-8.643-7.676-21.63-7.777-30.391-.237l-170.199 168.282-6.072-6.303c-8.827-9.201-23.442-9.504-32.643-.676-9.201 8.827-9.504 23.442-.676 32.643.04.042.08.083.12.124z"/>
                                    </svg>
                                    Lorem ipsum dolor
                                </p>
                            </div>
                            <span class="time">2m ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/retail/messages_detail">
                        <div class="media media-45 rounded-circle">
                            <img src="<?php echo URLROOT ?>/assets_retail/images/message/pic4.jpg" alt="image">
                        </div>
                        <div class="media-content">
                            <div>
                                <h6 class="name">Olivia James</h6>
                                <p class="my-1">
                                    <svg  enable-background="new 0 0 460.702 460.702" class="text-primary me-1" width="15" height="15" viewBox="0 0 460.702 460.702">
                                        <path d="m316.608 121.805c-8.937-9.037-23.499-9.151-32.576-.254l-170.268 168.282-74.017-76.626c-8.828-9.201-23.443-9.503-32.643-.675-9.201 8.828-9.503 23.443-.675 32.643.04.041.079.082.119.123l90.248 93.526c4.319 4.406 10.222 6.901 16.392 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.797-184.697c9.025-8.95 9.117-23.511.208-32.576z"/>
                                        <path d="m235.318 338.824c4.308 4.395 10.192 6.888 16.346 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.798-184.697c8.467-9.534 7.602-24.126-1.931-32.593-8.643-7.676-21.63-7.777-30.391-.237l-170.199 168.282-6.072-6.303c-8.827-9.201-23.442-9.504-32.643-.676-9.201 8.827-9.504 23.442-.676 32.643.04.042.08.083.12.124z"/>
                                    </svg>
                                    OK. Lorem ipsum dolor sect...
                                </p>
                            </div>
                            <span class="time">2m ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/retail/messages_detail">
                        <div class="media media-45 rounded-circle">
                            <img src="<?php echo URLROOT ?>/assets_retail/images/message/pic5.jpg" alt="image">
                        </div>
                        <div class="media-content">
                            <div>
                                <h6 class="name">Daphne Putri</h6>
                                <p class="my-1">
                                    <svg  enable-background="new 0 0 460.702 460.702" class="text-primary me-1" width="15" height="15" viewBox="0 0 460.702 460.702">
                                        <path d="m316.608 121.805c-8.937-9.037-23.499-9.151-32.576-.254l-170.268 168.282-74.017-76.626c-8.828-9.201-23.443-9.503-32.643-.675-9.201 8.828-9.503 23.443-.675 32.643.04.041.079.082.119.123l90.248 93.526c4.319 4.406 10.222 6.901 16.392 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.797-184.697c9.025-8.95 9.117-23.511.208-32.576z"/>
                                        <path d="m235.318 338.824c4.308 4.395 10.192 6.888 16.346 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.798-184.697c8.467-9.534 7.602-24.126-1.931-32.593-8.643-7.676-21.63-7.777-30.391-.237l-170.199 168.282-6.072-6.303c-8.827-9.201-23.442-9.504-32.643-.676-9.201 8.827-9.504 23.442-.676 32.643.04.042.08.083.12.124z"/>
                                    </svg>
                                    OK. Lorem ipsum dolor sect...
                                </p>
                            </div>
                            <span class="time">2m ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/retail/messages_detail">
                        <div class="media media-45 rounded-circle">
                            <img src="<?php echo URLROOT ?>/assets_retail/images/message/pic1.jpg" alt="image">
                        </div>
                        <div class="media-content">
                            <div>
                                <h6 class="name">David Mckanzie</h6>
                                <p class="my-1">
                                    <svg  enable-background="new 0 0 460.702 460.702" class="text-primary me-1" width="15" height="15" viewBox="0 0 460.702 460.702">
                                        <path d="m316.608 121.805c-8.937-9.037-23.499-9.151-32.576-.254l-170.268 168.282-74.017-76.626c-8.828-9.201-23.443-9.503-32.643-.675-9.201 8.828-9.503 23.443-.675 32.643.04.041.079.082.119.123l90.248 93.526c4.319 4.406 10.222 6.901 16.392 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.797-184.697c9.025-8.95 9.117-23.511.208-32.576z"/>
                                        <path d="m235.318 338.824c4.308 4.395 10.192 6.888 16.346 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.798-184.697c8.467-9.534 7.602-24.126-1.931-32.593-8.643-7.676-21.63-7.777-30.391-.237l-170.199 168.282-6.072-6.303c-8.827-9.201-23.442-9.504-32.643-.676-9.201 8.827-9.504 23.442-.676 32.643.04.042.08.083.12.124z"/>
                                    </svg>
                                    Lorem ipsum dolor sit dvc ..
                                </p>
                            </div>
                            <span class="time">2m ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/retail/messages_detail">
                        <div class="media media-45 rounded-circle">
                            <img src="<?php echo URLROOT ?>/assets_retail/images/message/pic3.jpg" alt="image">
                        </div>
                        <div class="media-content">
                            <div>
                                <h6 class="name">Mace jean</h6>
                                <p class="my-1">
                                    <svg  enable-background="new 0 0 460.702 460.702" class="text-primary me-1" width="15" height="15" viewBox="0 0 460.702 460.702">
                                        <path d="m316.608 121.805c-8.937-9.037-23.499-9.151-32.576-.254l-170.268 168.282-74.017-76.626c-8.828-9.201-23.443-9.503-32.643-.675-9.201 8.828-9.503 23.443-.675 32.643.04.041.079.082.119.123l90.248 93.526c4.319 4.406 10.222 6.901 16.392 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.797-184.697c9.025-8.95 9.117-23.511.208-32.576z"/>
                                        <path d="m235.318 338.824c4.308 4.395 10.192 6.888 16.346 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.798-184.697c8.467-9.534 7.602-24.126-1.931-32.593-8.643-7.676-21.63-7.777-30.391-.237l-170.199 168.282-6.072-6.303c-8.827-9.201-23.442-9.504-32.643-.676-9.201 8.827-9.504 23.442-.676 32.643.04.042.08.083.12.124z"/>
                                    </svg>
                                    OK. Lorem ipsum dolor sect...
                                </p>
                            </div>
                            <span class="time">2m ago</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/retail/messages_detail">
                        <div class="media media-45 rounded-circle">
                            <img src="<?php echo URLROOT ?>/assets_retail/images/message/pic1.jpg" alt="image">
                        </div>
                        <div class="media-content">
                            <div>
                                <h6 class="name">Gustauv Semalam</h6>
                                <p class="my-1">
                                    <svg  enable-background="new 0 0 460.702 460.702" class="text-primary me-1" width="15" height="15" viewBox="0 0 460.702 460.702">
                                        <path d="m316.608 121.805c-8.937-9.037-23.499-9.151-32.576-.254l-170.268 168.282-74.017-76.626c-8.828-9.201-23.443-9.503-32.643-.675-9.201 8.828-9.503 23.443-.675 32.643.04.041.079.082.119.123l90.248 93.526c4.319 4.406 10.222 6.901 16.392 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.797-184.697c9.025-8.95 9.117-23.511.208-32.576z"/>
                                        <path d="m235.318 338.824c4.308 4.395 10.192 6.888 16.346 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.798-184.697c8.467-9.534 7.602-24.126-1.931-32.593-8.643-7.676-21.63-7.777-30.391-.237l-170.199 168.282-6.072-6.303c-8.827-9.201-23.442-9.504-32.643-.676-9.201 8.827-9.504 23.442-.676 32.643.04.042.08.083.12.124z"/>
                                    </svg>
                                    Roger that sir, thankyou
                                </p>
                            </div>
                            <span class="time">2m ago</span>
                            </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/retail/messages_detail">
                        <div class="media media-45 rounded-circle">
                            <img src="<?php echo URLROOT ?>/assets_retail/images/message/pic5.jpg" alt="image">
                        </div>
                        <div class="media-content">
                            <div>
                                <h6 class="name">Pustauv jean</h6>
                                <p class="my-1">
                                    <svg  enable-background="new 0 0 460.702 460.702" class="text-primary me-1" width="15" height="15" viewBox="0 0 460.702 460.702">
                                        <path d="m316.608 121.805c-8.937-9.037-23.499-9.151-32.576-.254l-170.268 168.282-74.017-76.626c-8.828-9.201-23.443-9.503-32.643-.675-9.201 8.828-9.503 23.443-.675 32.643.04.041.079.082.119.123l90.248 93.526c4.319 4.406 10.222 6.901 16.392 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.797-184.697c9.025-8.95 9.117-23.511.208-32.576z"/>
                                        <path d="m235.318 338.824c4.308 4.395 10.192 6.888 16.346 6.926h.254c6.053-.019 11.857-2.415 16.161-6.672l186.798-184.697c8.467-9.534 7.602-24.126-1.931-32.593-8.643-7.676-21.63-7.777-30.391-.237l-170.199 168.282-6.072-6.303c-8.827-9.201-23.442-9.504-32.643-.676-9.201 8.827-9.504 23.442-.676 32.643.04.042.08.083.12.124z"/>
                                    </svg>
                                    OK. Lorem ipsum dolor sect...
                                </p>
                            </div>
                            <span class="time">2m ago</span>
                        </div>
                    </a>
                </li>
            </ul>
            <a href="javascript:void(0);" class="btn scrollTop btn-primary btn-rounded px-3 chat-btn"><i class="fa-solid fa-plus me-2"></i> New Chat</a>
        </div>
    </div>
    <!-- Page Content End-->

    
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

<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".message-list li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>

<?php require APPROOT . '/views/inc_user/footer.php'; ?>