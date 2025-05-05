<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>
<h2 style="color:black; text-align:center">SERVICE ORDERS</h2>
<div class="page-content-wrapper" style="margin: 100px;">
      <div class="container">

<table class="table table-striped" style=', Courier, monospace; font-size:70%' .>
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">User Name</th>
      <th scope="col">User ID</th>
      <th scope="col">Scheduled Date</th>
      <th scope="col">Scheduled Time</th>
      <th scope="col">Time & Date</th>
      <th scope="col">Order Value</th>
      <th scope="col">Payment Type</th>
      <th scope="col">Paid Amount</th>
      <th scope="col">Balance Amount</th>
      <th scope="col">Status</th>
    
    </tr>
  </thead>
  <tbody>
  <?php 
    $count = 0;
    foreach ($data['get_all_service_orders'] as $order){ 
      $count++;
      ?> 
    <tr>
      <th scope="row"><?php echo $order->id ?></th>
      <?php 
                                    $pageMod = New Apis;
                                    $user_detail= $pageMod->get_custinfo1($order->user_id)
                                    ?>

      <td><?php echo $user_detail->user_name ?></td>
      <td><?php echo $order->user_id ?></td>
      <td><?php echo $order->date_data ?></td>
      <td><?php echo $order->time_data ?></td>
      <td><?php echo  date("M jS Y, h:m A", strtotime("$order->created_at")); ?></td>
     
      <td><?php echo $order->price?></td>
      <?php if($order->payment_type ==1){
                                             $payment_type="Paid Through Wallet";
                                         }elseif($order->payment_type ==2){
                                            $payment_type="COD";
                                             
                                         }elseif($order->payment_type ==3){
                                            $payment_type="Partial COD + Wallet";
                                          } ?>
      <td><?php echo $payment_type; ?></td>
      <td><?php echo $order->paid_amount?></td>
      <td><?php echo $order->balance_amount?></td>
    <td> <form action="<?php echo URLROOT; ?>/api/update_bookings_status/<?php echo $order->id; ?>" method="post">
                                         <select class='form-control' name="order_status"  id="mySelect" onchange="this.form.submit()" style="font-size:12px;">
                        <option value="0" <?php if($order->status==0){echo "selected";} ?> >Placed</option>
                        <option value="1" <?php if($order->status==1){echo "selected";} ?> >Packed</option>
                        <option value="2" <?php if($order->status==2){echo "selected";} ?> >Shipped</option>
                        <option value="3" <?php if($order->status==3){echo "selected";} ?> >Delivered</option>
                                                                </select>

                                </form></td>
 
    </tr>
<?php } ?>
  </tbody>
  <?php if($count == 0){ ?>
 <tr> No Bookings has been alloted </tr>
<?php } ?>
</table>



</div>
</div>




<?php 
  $profile_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>
