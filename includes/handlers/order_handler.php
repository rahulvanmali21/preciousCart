<?php 
if(isset($_POST["placeOrderBtn"])){
 $user = $user_id;
 $address =  $_POST["address"];
 $state =  $_POST["state"];
 $pincode =  $_POST["pincode"];
 $phone =  $_POST["phone"];
 $amount =  Helper::getAmount($con,$user_id);
 $order = new Order($con);
 $result=$order->placeOrder($user,$address,$state,$pincode,$phone,$amount);
 if($result){
     header("Location:invoice.php?orderId=".$order->getOrderId()."");
 }
 $order_id = $order->getOrderId();
}
?>