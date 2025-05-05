<?php require APPROOT . '/views/inc_retail/header.php'; ?>
<?php require APPROOT . '/views/inc_retail/navbar.php'; 
// $contact = $data['contact']; ?>

<style>
    .sub-label {
    padding-right: 20px;
    max-width: 160px;
    
}
label{
      padding-left:10px;
    }
</style>
	

    <!-- Page Content -->
    <div class="page-content">
        <div class="content-body fb">
			<div class="dz-banner-heading">
                <!-- <div class="overlay-black-light">
                    <img src="assets/images/bg1.png" class="bnr-img" alt="">
                </div> -->
            </div>
            <div class="container company-detail">
                <div class="media media-60">
                    <img src="assets/images/logo/company-logo2.png" alt="">
                </div>
                <div class="detail-content">
                    <div class="flex-1">
                        <h4>My Profile</h4>
                    </div>
                    <!-- <div class="text-end">
                        <svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.16 6.99999H14.535L12.775 1.31C12.6566 0.931915 12.4205 0.601517 12.1013 0.366937C11.782 0.132357 11.3962 0.00585175 11 0.00585175C10.6038 0.00585175 10.2179 0.132357 9.89867 0.366937C9.5794 0.601517 9.34337 0.931915 9.22497 1.31L7.46497 6.99999H1.83997C1.45649 7.00195 1.08316 7.12335 0.771871 7.34731C0.460586 7.57128 0.226822 7.88667 0.103083 8.24963C-0.0206557 8.6126 -0.0282203 9.0051 0.0814415 9.37257C0.191103 9.74004 0.412541 10.0642 0.714965 10.3L5.33497 13.875L3.60997 19.445C3.48787 19.8456 3.49626 20.2746 3.63395 20.6701C3.77163 21.0656 4.03146 21.4071 4.37593 21.6453C4.72039 21.8835 5.13164 22.006 5.55029 21.9951C5.96893 21.9843 6.37329 21.8407 6.70497 21.585L11 18.26L15.295 21.585C15.6396 21.853 16.0634 21.999 16.5 22C16.8087 21.9998 17.113 21.9271 17.3884 21.7877C17.6638 21.6483 17.9026 21.4462 18.0856 21.1975C18.2685 20.9489 18.3905 20.6608 18.4416 20.3563C18.4927 20.0519 18.4716 19.7397 18.38 19.445L16.665 13.875L21.285 10.3C21.5874 10.0642 21.8088 9.74004 21.9185 9.37257C22.0282 9.0051 22.0206 8.6126 21.8968 8.24963C21.7731 7.88667 21.5393 7.57128 21.2281 7.34731C20.9168 7.12335 20.5434 7.00195 20.16 6.99999Z" fill="#FF912C"/>
                        </svg>
                        <h4 class="text-warning pt-2 mb-3">4.5</h4>
                    </div> -->
                    </div>
                <ul class="contact-box">
                <li class="d-flex align-items-center my-3">
                        <a href="javascript:void(0);" class="contact-icon">
                       Name
                        </a>
                        <div class="ms-3">
                          
                            <h6><a href="javascript:void(0);"><?php echo  $_SESSION['rexkod_distributor_name'];?></a></h6>    
                        </div>
                    </li>
                    <li class="d-flex align-items-center my-3">
                        <a href="javascript:void(0);" class="contact-icon">
                       Phone
                        </a>
                        <div class="ms-3">
                          
                            <h6><a href="javascript:void(0);"><?php echo  $_SESSION['rexkod_distributor_phone'];?></a></h6>    
                        </div>
                    </li>
                    <li class="d-flex align-items-center my-3">
                        <a href="javascript:void(0);" class="contact-icon">
                     Email
                          
                        </a>
                        <div class="ms-3">
                     
                            <h6><a href="javascript:void(0);"><?php echo $_SESSION['rexkod_distributor_email'];?></a></h6>    
                        </div>
                    </li>
               
                </ul>
                <!-- <div class="about-company">
                    <h5>About Company</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <p>
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    </p>
                </div> -->
            </div>
		</div>    
    </div>    
    <?php require APPROOT . '/views/inc_retail/navbar_footer.php'; ?>
 <?php require APPROOT . '/views/inc_retail/footer.php'; ?>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <!-- Page Content End -->
	
   