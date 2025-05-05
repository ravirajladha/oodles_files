<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
// $uri = $_SERVER['REQUEST_URI'];
// echo $uri;


?>


<body style="background-color:white">

        
           <center> <br><br><button class="btn btn-success">Wallet not active</button></center>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->



     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
  <?php } unset($_SESSION['success']); ?>


<script type="text/javascript">
   function change_count(c) 
   {


       var count = $('#count').val();
       count = parseInt(count);
      if(c==1)
      {
         count =  parseInt(count) + 1;
      }else
      {
         if(count < 2)
         {

         }else
         {
            count = parseInt(count) - 1;   
         }
          
      }

      $('#count').val(count);
   }
   function add_to_cart() 
   {

      var product_id = $('#product_id').val();
      var count = $('#count').val();
       count = parseInt(count);

      $.ajax({
            url: "<?php echo URLROOT; ?>/api/cart1",
            type: "POST",
            data: {count,product_id},

            success: function(response)
            {   
               // swal("Item Added to cart");
            }
        });
   }
   function add_to_buy() 
   {
      var product_id = $('#product_id').val();
      var count = $('#count').val();
      count = parseInt(count);
      $.ajax({
            url: "<?php echo URLROOT; ?>/api/add_to_buy",
            type: "POST",
            data: {count,product_id},

            success: function(response)
            {   
               window.location.replace('<?php echo URLROOT; ?>/api/cart');
            }
        });
   }
</script>


<script type="text/javascript">

   // $('#heart2').hide();
   // $('#good2').hide();
   // $('#not_good2').hide();

   function change_heart(id)
   {
      // $('#heart1').hide();
      // $('#heart2').show();

      var prod_id = id;

      $.ajax({
                type:"POST",
                url: "<?php echo URLROOT; ?>/api/change_heart_func",
                data:{prod_id},
                success:function(data)
                {

                  window.location.href = '<?php  echo URLROOT;?>/api/product_details1/'+prod_id;
                     // swal("You rated the product Very Good"); 
                     // $('#good2').hide();
                     // $('#not_good2').hide();   
                }
            });

   }

   function change_good(id)
   {
      // $('#good1').hide();
      // $('#good2').show();

      var prod_id = id;

      $.ajax({
                type:"POST",
                url: "<?php echo URLROOT; ?>/api/change_good_func",
                data:{prod_id},
                success:function(data)
                {
                    // swal("You rated the product Good"); 

                     window.location.href = '<?php  echo URLROOT;?>/api/product_details1/'+prod_id;
                     // $('#heart2').hide();
                     // $('#not_good2').hide();        
                }
            });

   }


   function change_not_good(id)
   {
      // $('#not_good1').hide();
      // $('#not_good2').show();

      var prod_id = id;

      $.ajax({
                type:"POST",
                url: "<?php echo URLROOT; ?>/api/change_not_good_func",
                data:{prod_id},
                success:function(data)
                {
                     // swal("You rated the product Not Good");

                      window.location.href = '<?php  echo URLROOT;?>/api/product_details1/'+prod_id;
                     // $('#heart2').hide();
                     // $('#good2').hide();
                          
                }
            });

   }

   function change_wishlist(id)
   {
      // $('#good1').hide();
      // $('#good2').show();

      var prod_id = id;

      $.ajax({
                type:"POST",
                url: "<?php echo URLROOT; ?>/api/change_wishlist",
                data:{prod_id},
                success:function(data)
                {
                    swal("Product added to wishlist"); 

                     // window.location.href = '<?php  //echo URLROOT;?>/api/product_details1/'+prod_id;
                     // $('#heart2').hide();
                     // $('#not_good2').hide();        
                }
            });

   }

</script>

<?php 
require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>