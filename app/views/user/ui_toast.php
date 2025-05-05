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
                        <h5 class="mb-0">Toast</h5>
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
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Toast</h5>    
                </div>
                <div class="card-body">
                    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3982" data-bs-autohide="false">
                        <div class="toast-header">
                            <svg class="text-primary" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <strong class="me-auto ms-2">Bootstrap 5</strong>
                            <small>11 min ago</small>
                            <button class="btn btn-close position-relative p-1" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">Hello, world! This is a toast message.</div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Translucent Toast</h5>    
                </div>
                <div class="card-body bg-dark">
                    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000" data-bs-autohide="false">
                        <div class="toast-header">
                            <svg class="text-primary" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <strong class="me-auto ms-2">Bootstrap 5</strong>
                            <small>11 min ago</small>
                            <button class="btn btn-close position-relative p-1" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">Hello, world! This is a toast message.</div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Different Color Toast</h5>    
                </div>
                <div class="card-body">
                    <div class="toast style-1 fade mb-2 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3982" data-bs-autohide="false">
                        <div class="toast-body">
                            <svg class="text-primary" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Default</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"></button>                        
                        </div>
                    </div>
                    
                    <div class="toast style-1 fade toast-primary mb-2 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3982" data-bs-autohide="false">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Primary</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <div class="toast style-1 fade toast-secondary mb-2 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3982" data-bs-autohide="false">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Secondary</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <div class="toast style-1 fade toast-success mb-2 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3982" data-bs-autohide="false">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Success</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <div class="toast style-1 fade toast-warning mb-2 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3982" data-bs-autohide="false">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Warning</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <div class="toast style-1 fade toast-danger mb-2 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3982" data-bs-autohide="false">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Danger</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <div class="toast style-1 fade toast-info mb-2 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3982" data-bs-autohide="false">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Info</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <div class="toast style-1 fade toast-dark mb-2 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3982" data-bs-autohide="false">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Dark</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Live Toast</h5>    
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-block mb-3 dzToastBtn" id="toastbtn1">Show live toast</button>
                    <div id="dzToast1" class="dzToastArea toast style-1 toast-primary dz-toast on-bottom" role="alert" aria-live="polite" aria-atomic="true">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Primary</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-secondary btn-block my-3 dzToastBtn" id="toastbtn2">Show live toast</button>
                    <div id="dzToast2" class="dzToastArea toast style-1 toast-secondary dz-toast on-bottom" role="alert" aria-live="polite" aria-atomic="true">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Secondary</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-success btn-block my-3 dzToastBtn" id="toastbtn3">Show live toast</button>
                    <div id="dzToast3" class="dzToastArea toast style-1 toast-success dz-toast on-bottom" role="alert" aria-live="polite" aria-atomic="true">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Success</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-warning btn-block my-3 dzToastBtn" id="toastbtn4">Show live toast</button>
                    <div id="dzToast4" class="dzToastArea toast style-1 toast-warning dz-toast on-bottom" role="alert" aria-live="polite" aria-atomic="true">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-4h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Warning</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-danger btn-block my-3 dzToastBtn" id="toastbtn5">Show live toast</button>
                    <div id="dzToast5" class="dzToastArea toast style-1 toast-danger dz-toast on-bottom" role="alert" aria-live="polite" aria-atomic="true">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-41h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Danger</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-info btn-block my-3 dzToastBtn" id="toastbtn6">Show live toast</button>
                    <div id="dzToast6" class="dzToastArea toast style-1 toast-info dz-toast on-bottom" role="alert" aria-live="polite" aria-atomic="true">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-41h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Info</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-dark btn-block my-3 dzToastBtn" id="toastbtn7">Show live toast</button>
                    <div id="dzToast7" class="dzToastArea toast style-1 toast-dark dz-toast on-bottom" role="alert" aria-live="polite" aria-atomic="true">
                        <div class="toast-body">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0       0-4-41h-8zm1.06 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                            </svg>
                            <div class="toast-content ms-3 me-2">
                                <strong>Toast Dark</strong>
                                <small class="d-block">11 min ago</small>
                            </div>
                            <button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close"> </button>                        
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

<script>

    var toastItem = document.querySelectorAll('.dzToastBtn');
    toastItem.forEach(myFunction);
    function myFunction(item, index) {
        var toastID = item.id.split('toastbtn')[1]; 
        const toastTrigger = document.getElementById('toastbtn'+toastID)
        const toastLiveExample = document.getElementById('dzToast' + toastID )
        if (toastTrigger) {
          toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
          })
        }
    }
 
    
</script>
<?php require APPROOT . '/views/inc_user/footer.php'; ?>