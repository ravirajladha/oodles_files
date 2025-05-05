<?php require APPROOT . '/views/inc_retail/header.php'; ?>
<?php require APPROOT . '/views/inc_retail/navbar.php'; ?>
 <!-- Banner -->
 

                 <div class="title-bar">
                     <h5 class="dz-title">My Products</h5>
                     <a class="btn btn-sm text-primary" href="">More</a>
                 </div>
                 <div class="list item-list recent-jobs-list">
                     <ul>
                         <li>
                             <div class="item-content">
                                 <a href="job-detail.html" class="item-media"><img src="<?php echo URLROOT; ?>/assets_retail/solar.png" width="55" alt="logo"></a>
                                 <div class="item-inner">
                                     <div class="item-title-row">
                                       <!--  <div class="item-subtitle">Solar Pumps</div>-->
                                         <h6 class="item-title"><a href="job-detail.html">Solar Pumps</a></h6>
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
                                 <a href="<?php echo URLROOT; ?>/retail/ups" class="item-media"><img src="<?php echo URLROOT; ?>/assets_retail/inverter.png" width="55" alt="logo"></a>
                                 <div class="item-inner">
                                     <div class="item-title-row">
                                        <div class="item-subtitle"></div>
                                         <h6 class="item-title"><a href="<?php echo URLROOT; ?>/retail/ups">Home UPS - Inverter</a></h6>
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
                                 <a href="job-detail.html" class="item-media"><img src="<?php echo URLROOT; ?>/assets_retail/ev.png" width="55" alt="logo"></a>
                                 <div class="item-inner">
                                     <div class="item-title-row">
                                         
                                         <h6 class="item-title"><a href="job-detail.html">EV Motors</a></h6>
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


                 <!-- Categorie -->
             
                 <!-- Categorie End -->
                 
                 <!-- Recomended Jobs -->
                 
                 <!-- Recomended Jobs End -->
                 
                 <!-- Recent Jobs -->
                
                 <!-- Recent Jobs End -->
                 
             </div>
             
            
             
             <!-- Dashboard Area -->
           
     <!-- second modal -->
 

 <!-- Page Content End-->
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