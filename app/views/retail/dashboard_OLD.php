<?php require APPROOT . '/views/inc_retail/header.php'; ?>
<?php require APPROOT . '/views/inc_retail/navbar.php'; ?>
 <!-- Banner -->
 <div class="banner-wrapper author-notification">
     <div class="container inner-wrapper">
         <div class="dz-info">
             <!-- <span>Welcome</span> -->
             <h2 class="name mb-0">
                <?php
                $retailModel = new Retails;
                if(isset($_SESSION['rexkod_distributor_id'])){
                $get_auth_detail = $retailModel->get_auth_detail($_SESSION['rexkod_distributor_id']);
                }else{
                 $get_auth_detail = $retailModel->get_auth_detail($_SESSION['rexkod_user_id']);
                }?>
                
             DASHBOARD
               </h2>
         </div>
         
     </div>
 </div>

                <div class="features-box" style="padding:20px">
                        <div class="row m-b20 g-3">
                        <?php if(isset($_SESSION['rexkod_distributor_id'])){ ?>
                            <div class="row">
                            <a href="<?php echo URLROOT?>/retail/new_survey">
                                <div class="card card-box card-content" style="background:rgba(4,100,164,1)">
                                  
                            </div>
                            <?php } ?>
                            <?php if(isset($_SESSION['rexkod_user_id'])){ ?>
                            <div class="row col p-3 text-center">
                                
                            <a href="">

                                <div class="card card-bx card-content bg-secondary">
                                <div class="card-body">
                                       
                                       
                                       <!-- <h4 class="title">0</h4> -->
                                       <!-- <p>Purchased</p> -->
                                <h4 style="color:#fff">ORDERS</h4>
                               </div>
                                </div>
                        </a>
                        <a href="#">

                                <div class="card card-bx card-content bg-secondary">
                                <div class="card-body">
                                       
                                <h4 style="color:#fff">ACTIVITIES</h4>
                               </div>
                                </div>
                        </a>
                        <a href="<?php echo URLROOT?>/retail/profile">

                                <div class="card card-bx card-content bg-secondary">
                                <div class="card-body">
                                       
                                <h4 style="color:#fff" class="text-center">PROFILE</h4>
                               </div>
                                </div>
                        </a>
                        <a href="<?php echo URLROOT?>/retail/enquiry_category">

                                <div class="card card-bx card-content bg-secondary">
                                <div class="card-body">
                                       
                                <h4 style="color:#fff">ENQUIRY STATUS</h4>
                               </div>
                                </div>
                        </a>
                        <a href="<?php echo URLROOT?>/retail/feedback">

                                <div class="card card-bx card-content bg-secondary">
                                <div class="card-body">
                                       
                                <h4 style="color:#fff">FEEDBACK</h4>
                               </div>
                                </div>
                        </a>

                            </div>   
                            <?php } ?> 
                        </div>    
                    </div> 

                
  



  

    
</div>  
<!--**********************************
    Scripts
***********************************-->
<script src="index.js" defer></script>
<script src="<?php echo URLROOT; ?>/assets_retail/js/jquery.js"></script>
<script src="<?php echo URLROOT; ?>/assets_retail/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets_retail/js/settings.js"></script>
<script src="<?php echo URLROOT; ?>/assets_retail/js/custom.js"></script>
<script src="<?php echo URLROOT; ?>/assets_retail/js/dz.carousel.js"></script><!-- Swiper -->
<script src="<?php echo URLROOT; ?>/assets_retail/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
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
 <?php require APPROOT . '/views/inc_retail/navbar_footer.php'; ?>
 <?php require APPROOT . '/views/inc_retail/footer.php'; ?>

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