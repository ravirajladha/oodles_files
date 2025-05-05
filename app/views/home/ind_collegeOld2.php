<?php require APPROOT . "/views/inc_home/header.php"; ?>

<style>
    form {
        width: 100px;
    }

    button {
        border: 0;
        background: transparent;
        font-size: 1.2em;
        margin: 0;
        padding: 0;
        float: right;
    }

    button:hover,
    button:hover+button,
    button:hover+button+button,
    button:hover+button+button+button,
    button:hover+button+button+button+button {
        color: #EAC612;
    }
</style>

<style>
    /* .project-tab {
        padding: 7%;
        margin-top: -8%;
    }

    .project-tab #tabs {
        background: #007b5e;
        color: #eee;
    }

    .project-tab #tabs h6.section-title {
        color: #eee;
    }

    .project-tab #tabs .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #0062cc;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        border-bottom: 3px solid !important;
        font-size: 9.5px;
        font-weight: bold;
    }

    .project-tab .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        color: #0062cc;
        font-size: 9.5px;
        font-weight: 600;
    }

    .project-tab .nav-link:hover {
        border: none;
    }

    .project-tab thead {
        background: #f3f3f3;
        color: #333;
    }

    .project-tab a {
        text-decoration: none;
        color: #333;
        font-weight: 600;
    } */

    
</style>

<section class="page-header">
    <div class="page-header-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/college_cover.png)">
    </div>
    <div class="page-header-shape-1"><img src="<?php echo URLROOT; ?>/assets_home/images/shapes/page-header-shape-1.png" alt=""></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>College Details</li>
            </ul>
            <h2>College details</h2>
        </div>
    </div>
</section>
<!--Page Header End-->
<?php foreach ($data['get_all_college'] as $detail) { ?>
<?php } ?>

<section class="get-insurance">
            <!-- <div class="get-insurance-bg" style="background-image: url(<?php echo URLROOT?>/assets_home/images/backgrounds/get-insurance-bg.png);"></div> -->
            <div class="container">
                <div class="row">
              
                    <div class="col-xl-12">
                        <div class="get-insurance__right">
                           
                            <div class="get-insurance__tab">
                                <div class="get-insurance__tab-box tabs-box" style="font-size:5px;">
                                    <ul class="tab-buttons clearfix list-unstyled">
                                        <li data-tab="#overview" class="tab-btn active-btn"><span>Overview</span></li>
                                        <li data-tab="#courses" class="tab-btn"><span>Courses & Fees</span></li>
                                        <li data-tab="#health" class="tab-btn"><span>Admission Procedure</span></li>
                                        <li data-tab="#life" class="tab-btn"><span>Reviews</span></li>
                                        <li data-tab="#home2" class="tab-btn active-btn"><span>Cutoff</span></li>
                                        <li data-tab="#vehicles" class="tab-btn"><span>Placement</span></li>
                                        <li data-tab="#health" class="tab-btn"><span>Gallery</span></li>
                                        <li data-tab="#life" class="tab-btn"><span>Schloarship</span></li>
                                        <li data-tab="#home2" class="tab-btn active-btn"><span>Faculty</span></li>
                                        <li data-tab="#vehicles" class="tab-btn"><span>Hostel</span></li>
                                        <li data-tab="#health" class="tab-btn"><span>FAQ's</span></li>
                                        <li data-tab="#life" class="tab-btn"><span>Alumni</span></li>
                                    </ul>
                                    <div class="tabs-content">
                                        <!--tab-->
                                        <div class="tab active-tab" id="overview">
                                            <div class="get-insurance__content">
                                              
                                                  dfdf
                                              
                                                 
                                              
                                            </div>
                                        </div>
                                        <!--tab-->
                                        <div class="tab" id="courses">
                                            <div class="get-insurance__content">
                                  
                                                    <div class="get-insurance__content-box">
                                                        <div class="get-insurance__input-box">
                                                            <input type="text" placeholder="Full name" name="name">
                                                        </div>
                                                        <div class="get-insurance__input-box">
                                                            <input type="email" placeholder="Email address" name="email">
                                                        </div>
                                                        <div class="get-insurance__input-box">
                                                            <select class="selectpicker" aria-label="Default select example">
                                                                <option selected>Select type of insurance</option>
                                                                <option value="1">Car insurance</option>
                                                                <option value="2">Life insurance</option>
                                                                <option value="3">Home insurance</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="get-insurance__progress">
                                                        <div class="get-insurance__progress-single">
                                                            <h4 class="get-insurance__progress-title">Limits of Balance:</h4>
                                                            <div class="bar">
                                                                <div class="bar-inner count-bar" data-percent="70%">
                                                                    <div class="count-text"></div>
                                                                </div>
                                                            </div>
                                                            <div class="get-insurance__balance-box">
                                                                <p class="get-insurance__balance">$90000</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="thm-btn get-insurance__btn">Get a Quote Now</button>
                                         
                                            </div>
                                        </div>
                                        <!--tab-->
                                        <div class="tab" id="health">
                                            <div class="get-insurance__content">
                                            
                                                    <div class="get-insurance__content-box">
                                                        <div class="get-insurance__input-box">
                                                            <input type="text" placeholder="Full name" name="name">
                                                        </div>
                                                        <div class="get-insurance__input-box">
                                                            <input type="email" placeholder="Email address" name="email">
                                                        </div>
                                                        <div class="get-insurance__input-box">
                                                            <select class="selectpicker" aria-label="Default select example">
                                                                <option selected>Select type of insurance</option>
                                                                <option value="1">Car insurance</option>
                                                                <option value="2">Life insurance</option>
                                                                <option value="3">Home insurance</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="get-insurance__progress">
                                                        <div class="get-insurance__progress-single">
                                                            <h4 class="get-insurance__progress-title">Limits of Balance:</h4>
                                                            <div class="bar">
                                                                <div class="bar-inner count-bar" data-percent="70%">
                                                                    <div class="count-text"></div>
                                                                </div>
                                                            </div>
                                                            <div class="get-insurance__balance-box">
                                                                <p class="get-insurance__balance">$90000</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="thm-btn get-insurance__btn">Get a Quote Now</button>
                                        
                                            </div>
                                        </div>
                                        <!--tab-->
                                        <div class="tab" id="life">
                                            <div class="get-insurance__content">
                                         
                                                    <div class="get-insurance__content-box">
                                                        <div class="get-insurance__input-box">
                                                            <input type="text" placeholder="Full name" name="name">
                                                        </div>
                                                        <div class="get-insurance__input-box">
                                                            <input type="email" placeholder="Email address" name="email">
                                                        </div>
                                                        <div class="get-insurance__input-box">
                                                            <select class="selectpicker" aria-label="Default select example">
                                                                <option selected>Select service</option>
                                                                <option value="1">service One</option>
                                                                <option value="2">service Two</option>
                                                                <option value="3">service Three</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="get-insurance__progress">
                                                        <div class="get-insurance__progress-single">
                                                            <h4 class="get-insurance__progress-title">Limits of Balance:</h4>
                                                            <div class="bar">
                                                                <div class="bar-inner count-bar" data-percent="70%">
                                                                    <div class="count-text"></div>
                                                                </div>
                                                            </div>
                                                            <div class="get-insurance__balance-box">
                                                                <p class="get-insurance__balance">$90000</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="thm-btn get-insurance__btn">Get a Quote Now</button>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Get Insurance End-->



<?php require APPROOT . "/views/inc_home/footer.php"; ?>