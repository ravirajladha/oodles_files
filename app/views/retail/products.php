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

<div class="page-content bottom-content">
  <div class="container">
    <div class="row">
      <div class="container mt-3 mb-4 text-center">
        <h4 class="text">Our Products</h4>
      </div>

                 <div class="list item-list recent-jobs-list">
                     <ul>
                         <li>
                             <div class="item-content">
                                 <a href="<?php echo URLROOT?>/retail/solar" class="item-media"><img src="<?php echo URLROOT; ?>/assets_retail/solar_banner.jpg" width="55" alt="logo"></a>
                                 <div class="item-inner">
                                     <div class="item-title-row">
                                       <!--  <div class="item-subtitle">Solar Pumps</div>-->
                                         <h6 class="item-title"><a href="<?php echo URLROOT?>/retail/solar">Solar Pumps</a></h6>
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
                                 <a href="<?php echo URLROOT?>/retail/ev" class="item-media"><img src="<?php echo URLROOT; ?>/assets_retail/ev.png" width="55" alt="logo"></a>
                                 <div class="item-inner">
                                     <div class="item-title-row">
                                         
                                         <h6 class="item-title"><a href="<?php echo URLROOT?>/retail/ev">EV Motors</a></h6>
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
                 </div>
                 </div>
                 </div>
      
    </main>

    <?php require APPROOT . '/views/inc_retail/navbar_footer.php'; ?>
 <?php require APPROOT . '/views/inc_retail/footer.php'; ?>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
