<?php require APPROOT . '/views/inc_distributor/header.php'; ?>
<?php require APPROOT . '/views/inc_distributor/navbar.php'; ?>
 <!-- Banner -->
 <div class="banner-wrapper author-notification">
     <div class="container inner-wrapper">
         <div class="dz-info">
             <span>Welcome</span>
             <h2 class="name mb-0">
                <?php
$distributorMod = new distributors;
if(isset($_SESSION['rexkod_distributor_id'])){
    $get_auth_detail = $distributorMod->get_auth_detail($_SESSION['rexkod_distributor_id']);
}else{
    $get_auth_detail = $distributorMod->get_auth_detail($_SESSION['rexkod_user_id']);
}?>
                
                <?php echo ucwords($get_auth_detail->name); ?>
               </h2>
         </div>
         
     </div>
 </div>
 <!-- Banner End -->
 
 <!-- Page Content -->
 <div class="page-content" style="margin-top:50px">
     
     <div class="content-inner pt-0">
         <div class="container fb">
                
              
         
         <div class="dashboard-area">
                 <!-- Features -->
                 <div class="m-b10">
                     <div class="title-bar">
                         <h5 class="dz-title">Banners</h5>
                         <div class="swiper-defult-pagination pagination-dots style-1 p-0"></div>
                     </div>
                     <div class="swiper-btn-center-lr">
                         <div class="swiper-container tag-group mt-4 dz-swiper recomand-swiper">
                             <div class="swiper-wrapper">
                                
                                 <div class="swiper-slide">
                                     <div class="card job-post">
                                         <div class="card-bdy">
                                            <img src="https://www.dxpe.com/wp-content/uploads/2021/02/centrifugal-pump-types-examples.jpg" alt="">
                                         </div>
                                     </div>       
                                 </div>
                                 <div class="swiper-slide">
                                     <div class="card job-post">
                                         <div class="card-ody">
                                            <img src="<?php echo URLROOT?>/assets_distributor/banner.jpg" alt="">
                                         </div>
                                     </div>       
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- Features End -->
                 
                 <div class="card job-post">
                  <div id="map"></div>     
                </div>

                <!-- <div class="features-box">
                        <div class="row m-b20 g-3">
                        <?php if(isset($_SESSION['rexkod_distributor_id'])){ ?>
                            <div class="row">
                            <a href="<?php echo URLROOT?>/distributor/new_survey">
                                <div class="card card-box card-content" style="background:rgba(4,100,164,1)">
                                    <div class="card-body">
                                            <h4 class="title">0</h4>
                                            <p>Products</p>
                                     <h4 style="color:#fff">Check</h4>
                                    </div>
                                </div>
                                    </a>
                            </div>
                            <?php } ?>
                            <?php if(isset($_SESSION['rexkod_user_id'])){ ?>
                            <div class="row">
                                
                            <a href="<?php echo URLROOT?>/distributor/new_order">

                                <div class="card card-bx card-content bg-secondary">
                                <div class="card-body">
                                       
                                       
                                       <h4 class="title">0</h4>
                                       <p>Purchased</p>
                                <h4 style="color:#fff">Buy</h4>
                               </div>
                                </div>
                        </a>

                            </div>   
                            <?php } ?> 
                        </div>    
                    </div> -->

                 <!-- <div class="categorie-section">
                     <div class="title-bar">
                         <h5 class="dz-title">Quick Action</h5>
                     </div>
                     <ul class="d-flex align-items-center">
                        
                         <li>
                             <a href="" class="btn">
                                 <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path opacity="0.4" d="M19.9925 18.9533H14.2982C13.7426 18.9533 13.2908 19.4123 13.2908 19.9766C13.2908 20.5421 13.7426 21 14.2982 21H19.9925C20.548 21 20.9999 20.5421 20.9999 19.9766C20.9999 19.4123 20.548 18.9533 19.9925 18.9533Z" fill="#130F26"/>
                                     <path d="M10.309 6.90388L15.7049 11.264C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8345 7.72908 20.8452L4.23696 20.8882C4.05071 20.8904 3.88775 20.7614 3.84542 20.5765L3.05175 17.1258C2.91419 16.4916 3.05175 15.8358 3.45388 15.3306L9.88256 6.95548C9.98627 6.82111 10.1778 6.79746 10.309 6.90388Z" fill="#130F26"/>
                                     <path opacity="0.4" d="M18.1205 8.66544L17.0803 9.96401C16.9755 10.0962 16.7872 10.1177 16.657 10.0124C15.3924 8.98901 12.1543 6.36285 11.2559 5.63509C11.1247 5.52759 11.1067 5.33625 11.2125 5.20295L12.2157 3.95706C13.1257 2.78534 14.7131 2.67784 15.9935 3.69906L17.4644 4.87078C18.0676 5.34377 18.4698 5.96726 18.6073 6.62299C18.7661 7.3443 18.5967 8.0527 18.1205 8.66544Z" fill="#130F26"/>
                                 </svg>
                             </a>
                         </li>
                         <li>
                             <a href="" class="btn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                         <polygon points="0 0 24 0 24 24 0 24"/>
                                         <path d="M10.5857864,12 L5.46446609,6.87867966 C5.0739418,6.48815536 5.0739418,5.85499039 5.46446609,5.46446609 C5.85499039,5.0739418 6.48815536,5.0739418 6.87867966,5.46446609 L12,10.5857864 L18.1923882,4.39339828 C18.5829124,4.00287399 19.2160774,4.00287399 19.6066017,4.39339828 C19.997126,4.78392257 19.997126,5.41708755 19.6066017,5.80761184 L13.4142136,12 L19.6066017,18.1923882 C19.997126,18.5829124 19.997126,19.2160774 19.6066017,19.6066017 C19.2160774,19.997126 18.5829124,19.997126 18.1923882,19.6066017 L12,13.4142136 L6.87867966,18.5355339 C6.48815536,18.9260582 5.85499039,18.9260582 5.46446609,18.5355339 C5.0739418,18.1450096 5.0739418,17.5118446 5.46446609,17.1213203 L10.5857864,12 Z" fill="#000000" opacity="0.3" transform="translate(12.535534, 12.000000) rotate(-360.000000) translate(-12.535534, -12.000000) "/>
                                         <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                     </g>
                                 </svg>
                             </a>
                         </li>
                         <li>
                             <a href="" class="btn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                         <polygon points="0 0 24 0 24 24 0 24"/>
                                         <path d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z" fill="#000000" opacity="0.3"/>
                                         <path d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z" fill="#000000"/>
                                     </g>
                                 </svg>
                             </a>
                         </li>
                         <li>
                             <a href="" class="btn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                         <rect x="0" y="0" width="24" height="24"/>
                                         <path d="M17.2718029,8.68536757 C16.8932864,8.28319382 16.9124644,7.65031935 17.3146382,7.27180288 C17.7168119,6.89328641 18.3496864,6.91246442 18.7282029,7.31463817 L22.7282029,11.5646382 C23.0906029,11.9496882 23.0906029,12.5503176 22.7282029,12.9353676 L18.7282029,17.1853676 C18.3496864,17.5875413 17.7168119,17.6067193 17.3146382,17.2282029 C16.9124644,16.8496864 16.8932864,16.2168119 17.2718029,15.8146382 L20.6267538,12.2500029 L17.2718029,8.68536757 Z M6.72819712,8.6853647 L3.37324625,12.25 L6.72819712,15.8146353 C7.10671359,16.2168091 7.08753558,16.8496835 6.68536183,17.2282 C6.28318808,17.6067165 5.65031361,17.5875384 5.27179713,17.1853647 L1.27179713,12.9353647 C0.909397125,12.5503147 0.909397125,11.9496853 1.27179713,11.5646353 L5.27179713,7.3146353 C5.65031361,6.91246155 6.28318808,6.89328354 6.68536183,7.27180001 C7.08753558,7.65031648 7.10671359,8.28319095 6.72819712,8.6853647 Z" fill="#000000" fill-rule="nonzero"/>
                                         <rect fill="#40189d" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-345.000000) translate(-12.000000, -12.000000) " x="11" y="4" width="2" height="16" rx="1"/>
                                     </g>
                                 </svg>
                             </a>
                         </li>
                         <li>
                             <a href="" class="btn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                         <polygon points="0 0 24 0 24 24 0 24"/>
                                         <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                         <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                     </g>
                                 </svg>
                             </a>
                         </li>
                         <li>
                             <a href="" class="btn">
                                 <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M10.1528 5.55553C10.2037 5.65919 10.2373 5.77021 10.2524 5.88434L10.5308 10.0243L10.669 12.1051C10.6705 12.3191 10.704 12.5317 10.7687 12.736C10.9356 13.1326 11.3372 13.3846 11.7741 13.367L18.4313 12.9315C18.7196 12.9268 18.998 13.0346 19.2052 13.2313C19.3779 13.3952 19.4894 13.6096 19.5246 13.8402L19.5364 13.9802C19.2609 17.7949 16.4592 20.9767 12.6524 21.798C8.84555 22.6193 4.94186 20.8843 3.06071 17.5349C2.51839 16.5618 2.17965 15.4923 2.06438 14.389C2.01623 14.0624 1.99503 13.7325 2.00098 13.4025C1.99503 9.31273 4.90747 5.77696 8.98433 4.92457C9.47501 4.84816 9.95603 5.10792 10.1528 5.55553Z" fill="#130F26"/>
                                     <path opacity="0.4" d="M12.8701 2.00082C17.43 2.11683 21.2624 5.39579 22.0001 9.81229L21.993 9.84488L21.9729 9.89227L21.9757 10.0224C21.9652 10.1947 21.8987 10.3605 21.784 10.4945C21.6646 10.634 21.5014 10.729 21.3217 10.7659L21.2121 10.7809L13.5313 11.2786C13.2758 11.3038 13.0214 11.2214 12.8314 11.052C12.6731 10.9107 12.5719 10.7201 12.5433 10.5147L12.0277 2.84506C12.0188 2.81913 12.0188 2.79102 12.0277 2.76508C12.0348 2.55367 12.1278 2.35384 12.2861 2.21023C12.4444 2.06662 12.6547 1.9912 12.8701 2.00082Z" fill="#130F26"/>
                                 </svg>
                             </a>
                         </li>
                         <li>
                             <a href="" class="btn">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                         <polygon points="0 0 24 0 24 24 0 24"/>
                                         <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
                                         <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
                                     </g>
                                 </svg>
                             </a>
                         </li>
                     </ul>
                 </div> -->


                 <div class="title-bar">
                     <h5 class="dz-title">My Products</h5>
                     <a class="btn btn-sm text-primary" href="">More</a>
                 </div>
                 <div class="list item-list recent-jobs-list">
                     <ul>
                         <li>
                             <div class="item-content">
                                 <a href="<?php echo URLROOT?>/distributor/solar" class="item-media"><img src="<?php echo URLROOT; ?>/assets_distributor/solar_banner.jpg" width="55" alt="logo"></a>
                                 <div class="item-inner">
                                     <div class="item-title-row">
                                       <!--  <div class="item-subtitle">Solar Pumps</div>-->
                                         <h6 class="item-title"><a href="<?php echo URLROOT?>/distributor/solar">Solar Pumps</a></h6>
                                     </div>
                                     <div class="d-flex align-items-center mb-2">
                                      
                                         <div class="item-price">Range: 1HP - 50HP</div>
                                     </div>
                                   
                                 </div>
                             </div>
                             <div class="sortable-handler"></div>
                         </li>

                         <li>
                             <div class="item-content">
                                 <a href="<?php echo URLROOT; ?>/distributor/ups" class="item-media"><img src="<?php echo URLROOT; ?>/assets_distributor/inverter.png" width="55" alt="logo"></a>
                                 <div class="item-inner">
                                     <div class="item-title-row">
                                        <div class="item-subtitle"></div>
                                         <h6 class="item-title"><a href="<?php echo URLROOT; ?>/distributor/ups">Home UPS - Inverter</a></h6>
                                     </div>
                                     <div class="d-flex align-items-center mb-2">
                                       
                                         <div class="item-price">Range: 700VA - 5KVA</div>
                                     </div>
                                   
                                 </div>
                             </div>
                             <div class="sortable-handler"></div>
                         </li>

                         <li>
                             <div class="item-content">
                                 <a href="<?php echo URLROOT?>/distributor/ev" class="item-media"><img src="<?php echo URLROOT; ?>/assets_distributor/ev.png" width="55" alt="logo"></a>
                                 <div class="item-inner">
                                     <div class="item-title-row">
                                         
                                         <h6 class="item-title"><a href="<?php echo URLROOT?>/distributor/ev">EV Motors</a></h6>
                                     </div>
                                     <div class="d-flex align-items-center mb-2">
                                        
                                         <div class="item-price">Range:250W - 4.5KW</div>
                                     </div>
                                   
                                 </div>
                             </div>
                             <div class="sortable-handler"></div>
                         </li>
                         
                        
                    </ul>
                 </div>


                 <!-- <div class="title-bar">
                     <h5 class="dz-title">My Products</h5>
                     <a class="btn btn-sm text-primary" href="">More</a>
                 </div>
                 <div class="list item-list recent-jobs-list">
                     <ul>
                         <li>
                             <div class="item-content">
                                 <a href="job-detail.html" class="item-media"><img src="<?php echo URLROOT; ?>/assets_distributor/images/logo/company-logo1.png" width="55" alt="logo"></a>
                                 <div class="item-inner">
                                     <div class="item-title-row">
                                         <div class="item-subtitle">Water Pump</div>
                                         <h6 class="item-title"><a href="job-detail.html">10Kv</a></h6>
                                     </div>
                                     <div class="d-flex align-items-center mb-2">
                                         <svg class="text-primary" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                             <path d="M8.5 23C9.70017 23.0072 10.8898 22.7761 12 22.32C13.109 22.7799 14.2995 23.0112 15.5 23C19.145 23 22 21.055 22 18.571V14.429C22 11.945 19.145 10 15.5 10C15.331 10 15.165 10.008 15 10.017V5.333C15 2.9 12.145 1 8.5 1C4.855 1 2 2.9 2 5.333V18.667C2 21.1 4.855 23 8.5 23ZM20 18.571C20 19.72 18.152 21 15.5 21C12.848 21 11 19.72 11 18.571V17.646C12.3542 18.4696 13.9153 18.8898 15.5 18.857C17.0847 18.8898 18.6458 18.4696 20 17.646V18.571ZM15.5 12C18.152 12 20 13.28 20 14.429C20 15.578 18.152 16.857 15.5 16.857C12.848 16.857 11 15.577 11 14.429C11 13.281 12.848 12 15.5 12ZM8.5 3C11.152 3 13 4.23 13 5.333C13 6.43601 11.152 7.66701 8.5 7.66701C5.848 7.66701 4 6.43701 4 5.333C4 4.229 5.848 3 8.5 3ZM4 8.48201C5.35986 9.28959 6.91876 9.7001 8.5 9.66701C10.0812 9.7001 11.6401 9.28959 13 8.48201V10.33C11.9102 10.6047 10.9107 11.1586 10.1 11.937C9.57422 12.0508 9.03795 12.1091 8.5 12.111C5.848 12.111 4 10.881 4 9.77801V8.48201ZM4 12.927C5.36015 13.7338 6.91891 14.1439 8.5 14.111C8.678 14.111 8.85 14.089 9.025 14.08C9.0101 14.1958 9.00176 14.3123 9 14.429V16.514C8.832 16.524 8.67 16.556 8.5 16.556C5.848 16.556 4 15.326 4 14.222V12.927ZM4 17.371C5.35986 18.1786 6.91876 18.5891 8.5 18.556C8.668 18.556 8.833 18.543 9 18.535V18.571C9.01431 19.4223 9.34144 20.2385 9.919 20.864C9.45111 20.9524 8.97615 20.9979 8.5 21C5.848 21 4 19.77 4 18.667V17.371Z" fill="#40189D"/>
                                         </svg>
                                         <div class="item-price">Active</div>
                                     </div>
                                   
                                 </div>
                             </div>
                             <div class="sortable-handler"></div>
                         </li>

                         <li>
                             <div class="item-content">
                                 <a href="job-detail.html" class="item-media"><img src="<?php echo URLROOT; ?>/assets_distributor/images/logo/company-logo1.png" width="55" alt="logo"></a>
                                 <div class="item-inner">
                                     <div class="item-title-row">
                                         <div class="item-subtitle">Water Pump</div>
                                         <h6 class="item-title"><a href="job-detail.html">10Kv</a></h6>
                                     </div>
                                     <div class="d-flex align-items-center mb-2">
                                         <svg class="text-primary" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                             <path d="M8.5 23C9.70017 23.0072 10.8898 22.7761 12 22.32C13.109 22.7799 14.2995 23.0112 15.5 23C19.145 23 22 21.055 22 18.571V14.429C22 11.945 19.145 10 15.5 10C15.331 10 15.165 10.008 15 10.017V5.333C15 2.9 12.145 1 8.5 1C4.855 1 2 2.9 2 5.333V18.667C2 21.1 4.855 23 8.5 23ZM20 18.571C20 19.72 18.152 21 15.5 21C12.848 21 11 19.72 11 18.571V17.646C12.3542 18.4696 13.9153 18.8898 15.5 18.857C17.0847 18.8898 18.6458 18.4696 20 17.646V18.571ZM15.5 12C18.152 12 20 13.28 20 14.429C20 15.578 18.152 16.857 15.5 16.857C12.848 16.857 11 15.577 11 14.429C11 13.281 12.848 12 15.5 12ZM8.5 3C11.152 3 13 4.23 13 5.333C13 6.43601 11.152 7.66701 8.5 7.66701C5.848 7.66701 4 6.43701 4 5.333C4 4.229 5.848 3 8.5 3ZM4 8.48201C5.35986 9.28959 6.91876 9.7001 8.5 9.66701C10.0812 9.7001 11.6401 9.28959 13 8.48201V10.33C11.9102 10.6047 10.9107 11.1586 10.1 11.937C9.57422 12.0508 9.03795 12.1091 8.5 12.111C5.848 12.111 4 10.881 4 9.77801V8.48201ZM4 12.927C5.36015 13.7338 6.91891 14.1439 8.5 14.111C8.678 14.111 8.85 14.089 9.025 14.08C9.0101 14.1958 9.00176 14.3123 9 14.429V16.514C8.832 16.524 8.67 16.556 8.5 16.556C5.848 16.556 4 15.326 4 14.222V12.927ZM4 17.371C5.35986 18.1786 6.91876 18.5891 8.5 18.556C8.668 18.556 8.833 18.543 9 18.535V18.571C9.01431 19.4223 9.34144 20.2385 9.919 20.864C9.45111 20.9524 8.97615 20.9979 8.5 21C5.848 21 4 19.77 4 18.667V17.371Z" fill="#40189D"/>
                                         </svg>
                                         <div class="item-price">Active</div>
                                     </div>
                                   
                                 </div>
                             </div>
                             <div class="sortable-handler"></div>
                         </li>

                         <li>
                             <div class="item-content">
                                 <a href="job-detail.html" class="item-media"><img src="<?php echo URLROOT; ?>/assets_distributor/images/logo/company-logo1.png" width="55" alt="logo"></a>
                                 <div class="item-inner">
                                     <div class="item-title-row">
                                         <div class="item-subtitle">Water Pump</div>
                                         <h6 class="item-title"><a href="job-detail.html">10Kv</a></h6>
                                     </div>
                                     <div class="d-flex align-items-center mb-2">
                                         <svg class="text-primary" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                             <path d="M8.5 23C9.70017 23.0072 10.8898 22.7761 12 22.32C13.109 22.7799 14.2995 23.0112 15.5 23C19.145 23 22 21.055 22 18.571V14.429C22 11.945 19.145 10 15.5 10C15.331 10 15.165 10.008 15 10.017V5.333C15 2.9 12.145 1 8.5 1C4.855 1 2 2.9 2 5.333V18.667C2 21.1 4.855 23 8.5 23ZM20 18.571C20 19.72 18.152 21 15.5 21C12.848 21 11 19.72 11 18.571V17.646C12.3542 18.4696 13.9153 18.8898 15.5 18.857C17.0847 18.8898 18.6458 18.4696 20 17.646V18.571ZM15.5 12C18.152 12 20 13.28 20 14.429C20 15.578 18.152 16.857 15.5 16.857C12.848 16.857 11 15.577 11 14.429C11 13.281 12.848 12 15.5 12ZM8.5 3C11.152 3 13 4.23 13 5.333C13 6.43601 11.152 7.66701 8.5 7.66701C5.848 7.66701 4 6.43701 4 5.333C4 4.229 5.848 3 8.5 3ZM4 8.48201C5.35986 9.28959 6.91876 9.7001 8.5 9.66701C10.0812 9.7001 11.6401 9.28959 13 8.48201V10.33C11.9102 10.6047 10.9107 11.1586 10.1 11.937C9.57422 12.0508 9.03795 12.1091 8.5 12.111C5.848 12.111 4 10.881 4 9.77801V8.48201ZM4 12.927C5.36015 13.7338 6.91891 14.1439 8.5 14.111C8.678 14.111 8.85 14.089 9.025 14.08C9.0101 14.1958 9.00176 14.3123 9 14.429V16.514C8.832 16.524 8.67 16.556 8.5 16.556C5.848 16.556 4 15.326 4 14.222V12.927ZM4 17.371C5.35986 18.1786 6.91876 18.5891 8.5 18.556C8.668 18.556 8.833 18.543 9 18.535V18.571C9.01431 19.4223 9.34144 20.2385 9.919 20.864C9.45111 20.9524 8.97615 20.9979 8.5 21C5.848 21 4 19.77 4 18.667V17.371Z" fill="#40189D"/>
                                         </svg>
                                         <div class="item-price">Active</div>
                                     </div>
                                   
                                 </div>
                             </div>
                             <div class="sortable-handler"></div>
                         </li>
                         
                        
                    </ul>
                 </div> -->


                 <!-- Categorie -->
             
                 <!-- Categorie End -->
                 
                 <!-- Recomended Jobs -->
                 
                 <!-- Recomended Jobs End -->
                 
                 <!-- Recent Jobs -->
                
                 <!-- Recent Jobs End -->
                 
             </div>
             
            
             
             <!-- Dashboard Area -->
           
         </div>    
     </div>
     
 </div>    



  
 <div id="apply_leave" class="modal custom-modal fade"  style="z-index:9999999;" role="dialog">
                 <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title">Apply Leave</h5>
                             <button type="button" class="close btn btn-sm btn-primary" style="padding:5px 10px" data-bs-dismiss="modal" aria-label="Close">
                                 &times
                             </button>
                         </div>
                         <?php $salary_detail = $data['get_salary_detail']; 
                         $cl= $salary_detail->cl;
                         $el= $salary_detail->el;
                         $sl= $salary_detail->sl;
                         ?>
                         <div class="modal-body">
                             <form action='<?php echo URLROOT; ?>/distributor/apply_leaves' method='POST'>
                                 <div class="row">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <label>Select Leave</label>
                                             <select  class="form-control"  id="user_id" required="" name="type">
                                             <option  value="0">-SELECT-</option>
                                             <?php if(($salary_detail->cl)>0){?><option  value="1">Casual Leave (<?php echo $cl?>)</option><?php }else{ ?>
                                                 <option  value="1" disabled>Casual Leave (<?php echo $cl?>)</option>
                                         <?php 	} ?>
                                             
                                             <?php if(($salary_detail->el)>0){?><option  value="2">Earned Leave (<?php echo $el?>)</option><?php }else{ ?>
                                                 <option  value="2" disabled>Earned Leave (<?php echo $el?>)</option>
                                         <?php 	} ?>
                                                 <?php if(($salary_detail->sl)>0){?><option  value="3">Sick Leave (<?php echo $sl?>)</option><?php }else{ ?>
                                                 <option  value="3" disabled>Sick Leave (<?php echo $sl?>)</option>
                                         <?php 	} ?> 
                                                 ?><option  value="4">Outside Duty</option>
                                 
                                             
                                             </select>
                                         </div>
                                         </div>
                                     
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label>Start Date</label>
                                             <input class="form-control" type="date" id="start_date" name="start_date">
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label>End Date</label>
                                             <input class="form-control" type="date" id="end_date" name="end_date">
                                         </div>
                                     </div>
                                     
                                     
                                     

                                     <div class="submit-section">
                                     <br>
                                     <button class="btn btn-primary submit-btn">Submit</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 
             </div>
             </div> 
     <!-- second modal -->
 

 <!-- Page Content End-->
 
    <!-- Menubar -->
	<div class="menubar-area">
		<div class="toolbar-inner menubar-nav">
			<a href="index.html" class="nav-link active">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z" fill="#130F26"/>
				</svg>
			</a>
			<a href="<?php echo URLROOT ?>/distributor/index" class="nav-link">
			<!-- <a href="<?php echo URLROOT ?>/distributor/pages" class="nav-link"> -->
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M11.776 21.8374C9.49294 20.4273 7.37064 18.7645 5.44791 16.8796C4.09052 15.5338 3.05388 13.8905 2.41718 12.0753C1.27955 8.53523 2.60383 4.48948 6.30113 3.2884C8.25264 2.67553 10.3751 3.05175 12.0071 4.29983V4.29983C13.6397 3.05315 15.7614 2.67705 17.713 3.2884C21.4103 4.48948 22.7435 8.53523 21.6058 12.0753C20.9743 13.8888 19.9438 15.5319 18.5929 16.8796C16.6684 18.7625 14.5463 20.4251 12.2648 21.8374L12.016 22L11.776 21.8374Z" fill="#a19fa8"/>
                    <path d="M12.0109 22L11.776 21.8374C9.49013 20.4274 7.36487 18.7647 5.43902 16.8796C4.0752 15.5356 3.03238 13.8922 2.39052 12.0753C1.26177 8.53523 2.58605 4.48948 6.28335 3.2884C8.23486 2.67553 10.3853 3.05204 12.0109 4.31057V22Z" fill="#a19fa8"/>
                    <path d="M18.2304 9.99922V9.99922C18.0296 9.98629 17.8425 9.8859 17.7131 9.72157C17.5836 9.55723 17.5232 9.3434 17.5459 9.13016V9.13016C17.5677 8.4278 17.168 7.78851 16.5517 7.53977C16.1609 7.43309 15.9243 7.00987 16.022 6.59249C16.1148 6.18182 16.4993 5.92647 16.8858 6.0189C16.9346 6.027 16.9816 6.04468 17.0244 6.07105C18.2601 6.54658 19.0601 7.82641 18.9965 9.22576C18.9944 9.43785 18.9117 9.63998 18.7673 9.78581C18.6229 9.93164 18.4291 10.0087 18.2304 9.99922Z" fill="#a19fa8"/>
                </svg>
			</a>
			<a href="<?php echo URLROOT ?>/distributor/index" class="nav-link">
			<!-- <a href="<?php echo URLROOT ?>/distributor/messages" class="nav-link"> -->
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M22 15.9403C22 18.7303 19.76 20.9903 16.97 21.0003H16.96H7.05C4.27 21.0003 2 18.7503 2 15.9603V15.9503C2 15.9503 2.006 11.5243 2.014 9.2983C2.015 8.8803 2.495 8.6463 2.822 8.9063C5.198 10.7913 9.447 14.2283 9.5 14.2733C10.21 14.8423 11.11 15.1633 12.03 15.1633C12.95 15.1633 13.85 14.8423 14.56 14.2623C14.613 14.2273 18.767 10.8933 21.179 8.9773C21.507 8.7163 21.989 8.9503 21.99 9.3673C22 11.5763 22 15.9403 22 15.9403Z" fill="#a19fa8"/>
                    <path d="M21.4761 5.67369C20.6101 4.04169 18.9061 2.99969 17.0301 2.99969H7.05013C5.17413 2.99969 3.47013 4.04169 2.60413 5.67369C2.41013 6.03869 2.50213 6.4937 2.82513 6.75169L10.2501 12.6907C10.7701 13.1107 11.4001 13.3197 12.0301 13.3197C12.0341 13.3197 12.0371 13.3197 12.0401 13.3197C12.0431 13.3197 12.0471 13.3197 12.0501 13.3197C12.6801 13.3197 13.3101 13.1107 13.8301 12.6907L21.2551 6.75169C21.5781 6.4937 21.6701 6.03869 21.4761 5.67369Z" fill="#a19fa8"/>
                </svg>
			</a>
			<a href="javascript:void(0);" class="menu-toggler">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M16.0755 2H19.4615C20.8637 2 22 3.14585 22 4.55996V7.97452C22 9.38864 20.8637 10.5345 19.4615 10.5345H16.0755C14.6732 10.5345 13.537 9.38864 13.537 7.97452V4.55996C13.537 3.14585 14.6732 2 16.0755 2Z" fill="#a19fa8"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="#a19fa8"/>
                </svg>
			</a>
		</div>
	</div>

    
</div>  
<!--**********************************
    Scripts
***********************************-->
<script src="index.js" defer></script>
<script src="<?php echo URLROOT; ?>/assets_distributor/js/jquery.js"></script>
<script src="<?php echo URLROOT; ?>/assets_distributor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets_distributor/js/settings.js"></script>
<script src="<?php echo URLROOT; ?>/assets_distributor/js/custom.js"></script>
<script src="<?php echo URLROOT; ?>/assets_distributor/js/dz.carousel.js"></script><!-- Swiper -->
<script src="<?php echo URLROOT; ?>/assets_distributor/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <?php if (isset($_SESSION['success'])) { ?>
  	<script type="text/javascript">
  		swal("<?php echo $_SESSION['success']; ?>");
  	</script>
  <?php }
	unset($_SESSION['success']); ?>
</body>
</html>

	<!-- Menubar -->
 <?php require APPROOT . '/views/inc_distributor/navbar_footer.php'; ?>
 <?php require APPROOT . '/views/inc_distributor/footer.php'; ?>

<style>
 #map {
height: 180px;
}
</style>

<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDQ69wZR1GPEeLAxyu-vkSSo_dzpZTOV2c"></script>
 <script>
     function loadMap() {

var locations = [
['Mecwin Pump', 12.9740, 77.5970, 4],
['Mecwin Pump', 12.9716, 77.5946, 5],
['Mecwin Pump', 12.9716, 77.5946, 3],
['Mecwin Pump', 12.9716, 77.5946, 2],
['Mecwin Pump', 12.9716, 77.5946, 1]
];

let mapOptions = {
 center: new google.maps.LatLng(12.9716, 77.5946),
zoom: 10,
mapTypeId: google.maps.MapTypeId.ROADMAP
}

// Moved this line up here
this.map = new google.maps.Map(document.getElementById('map'), mapOptions); // changed the "native element" to a standard DOM element for the sake of this example

var infowindow = new google.maps.InfoWindow();

var marker, i;

for (i = 0; i < locations.length; i++) {
marker = new google.maps.Marker({
 position: new google.maps.LatLng(locations[i][1], locations[i][2]),
 map: this.map // You are using this.map here so it needs to be created before
});

google.maps.event.addListener(marker, 'click', (function(marker, i) {
 return function() {
   infowindow.setContent(locations[i][0]);
   infowindow.open(Map, marker);
 }
})(marker, i));
}
}

loadMap();
 </script>