    <!-- Header Area-->
          <div class="container h-100 d-flex align-items-center justify-content-between" style="background-color:#1520a6;">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="<?php echo URLROOT; ?>/api/index"><img src="<?php echo URLROOT; ?>/assets2/img/white.png" alt="" style="height:25px;margin: 15px 0px;"></a></div>
        <!-- Search Form-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <form method="GET" action="<?php echo URLROOT; ?>/api/search" enctype="multipart/form-data" autocomplete="OFF">
<div class="row">
  <div class="col-md-4">
  <select name="filter" class="form-control" style="height:35px;" required>
    <option value="">Select Filter</option>
    <option value="1">By Product</option>
    <option value="2">By search</option>
  </select>
  <!-- <button class="waves-effect waves-blue btn btn-add z-depth-1" type="submit">Add</button> -->

                </div>
                <div class="col-md-6">
                         <input class="form-control text-center" type="text" placeholder="Search a Product" name="search_input" style="height:35px;">
                      
                 </div>
                 <div class="col-md-2">
                 <button type="submit" class="form-control" style="height:35px;"><i class="fa fa-search"></i></button>
                 </div>
                 </div>
        </form>
                <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <div class="suha-sidenav-wrapper" id="sidenavWrapper">
      <!-- Sidenav Profile-->
      <div class="sidenav-profile">
       <br>
        <div class="user-info">

            <?php
if (isset($_SESSION['rexkod_user_id'])) {
?>
                <h6 class="user-name mb-0"><?php echo $_SESSION['rexkod_user_email']; ?></h6>
          <p class="available-balance">User</p>

        <?php
}
else {
?>  
                <h6 class="user-name mb-0">Guest</h6>
          <p class="available-balance">User</p>

        <?php
}
?>

          
        </div>
      </div>


      
      <!-- Sidenav Nav-->
      <ul class="sidenav-nav ps-0">
        <li><a href="<?php echo URLROOT; ?>/api/index"><i class="lni lni-home"></i>Home</a></li>

        <?php
if (isset($_SESSION['rexkod_user_id'])) {
?>

            <li><a href="<?php echo URLROOT; ?>/api/orders"><i class="lni lni-life-ring"></i>Orders</a></li>

        <?php
}
else {
?>  
            
            <li><a href="<?php echo URLROOT; ?>/api/login"><i class="lni lni-life-ring"></i>Orders</a></li>

        <?php
}
?>

        <li><a href="<?php echo URLROOT; ?>/api/cart" style="margin-top: -3px;"><i class="lni lni-shopping-basket"></i>Cart</a></li>

        <li><a href="<?php echo URLROOT; ?>/api/profile" style="margin-top: -3px;"><i class="lni lni-user"></i>My Profile</a></li>


      

        <li><a href="#" style="margin-top: -3px;"><i class="fa fa-dot-circle-o"></i>FAQs</a></li>

        <li><a href="#" style="margin-top: -3px;"><i class="fa fa-dot-circle-o"></i>  Privacy Policy</a></li>

        <li><a href="#" style="margin-top: -3px;"><i class="fa fa-dot-circle-o"></i>Terms & Conditions</a></li>

        <li><a href="#" style="margin-top: -3px;"><i class="fa fa-dot-circle-o"></i>Refund Policy</a></li>


    

        <?php
if (isset($_SESSION['rexkod_user_id'])) {
?>
            <li>
          <a href="<?php echo URLROOT; ?>/api/logout"><i class="lni lni-power-switch"></i>Log Out</a>
        </li>

        <?php
}
else {
?>  
            <li>
          <a href="<?php echo URLROOT; ?>/api/login"><i class="lni lni-power-switch"></i>Log In</a>
        </li>

        <?php
}
?>


        
      </ul>
            <!-- Go Back Button-->
            <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
    </div>
