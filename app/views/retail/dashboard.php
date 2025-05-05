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
        <h2 class="text" style="font-size:40px;">DASHBOARD</h2>
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

                                <div class="card card-bx card-content bg-primary">
                                <div class="card-body">
                                       
                                       
                                       <!-- <h4 class="title">0</h4> -->
                                       <!-- <p>Purchased</p> -->
                                <h4 style="color:#fff">O R D E R S</h4>
                               </div>
                                </div>
                        </a>
                        <a href="#">

                                <div class="card card-bx card-content bg-secondary">
                                <div class="card-body">
                                       
                                <h4 style="color:#fff">A C T I V I T I E S</h4>
                               </div>
                                </div>
                        </a>
                        <a href="<?php echo URLROOT?>/retail/profile">

                                <div class="card card-bx card-content bg-dark">
                                <div class="card-body">
                                       
                                <h4 style="color:#fff" class="text-center">P R O F I L E</h4>
                               </div>
                                </div>
                        </a>
                        <a href="<?php echo URLROOT?>/retail/enquiry_category">

                                <div class="card card-bx card-content bg-warning">
                                <div class="card-body">
                                       
                                <h4 style="color:#fff">E N Q U I R Y  &ensp;&ensp;S T A T U S</h4>
                               </div>
                                </div>
                        </a>
                        <a href="<?php echo URLROOT?>/retail/feedback">

                                <div class="card card-bx card-content bg-danger">
                                <div class="card-body">
                                       
                                <h4 style="color:#fff">F E E D B A C K</h4>
                               </div>
                                </div>
                        </a>

                            </div>   
                            <?php } elseif(isset($_SESSION['rexkod_distributor_id'])){
                              ?> 
                                <div class="row col p-3 text-center">
                                
                           
                         
                            <a href="<?php echo URLROOT?>/retail/distributor_profile">
    
                                    <div class="card card-bx card-content bg-dark">
                                    <div class="card-body">
                                           
                                    <h4 style="color:#fff" class="text-center">P R O F I L E</h4>
                                   </div>
                                    </div>
                            </a>
                            <a href="<?php echo URLROOT?>/retail/survey_status">
    
                                    <div class="card card-bx card-content bg-warning">
                                    <div class="card-body">
                                           
                                    <h4 style="color:#fff">S U R V E Y &ensp;&ensp;S T A T U S</h4>
                                   </div>
                                    </div>
                            </a>
                            <a href="<?php echo URLROOT?>/retail/feedback">
    
                                    <div class="card card-bx card-content bg-danger">
                                    <div class="card-body">
                                           
                                    <h4 style="color:#fff">F E E D B A C K</h4>
                                   </div>
                                    </div>
                            </a>
    
                                </div>   
                                <?php } ?>
                        </div>    
                    </div> 

                
  



  

    
</div>  
                 </div>
                 </div>
                 </div>
      
    </main>

    <?php require APPROOT . '/views/inc_retail/navbar_footer.php'; ?>
 <?php require APPROOT . '/views/inc_retail/footer.php'; ?>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
