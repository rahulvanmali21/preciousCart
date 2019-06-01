<?php 
class Order{
    private $con;
    private $order_id;
    public function __construct($con){
        $this->con = $con;
    }
    public function placeOrder($userId,$address,$state,$pincode,$phone,$amt){
        $orderedOn = date("Y-m-d");
        $last_order_id = $this->setOrder($userId,$address,$state,$pincode,$phone,$amt,$orderedOn);
        if($last_order_id){
            return $this->updateCart($userId,$last_order_id);
        }
    }
    private function setOrder($userId,$address,$state,$pincode,$phone,$amt,$orderedOn){
       $result = mysqli_query($this->con,"INSERT into orders VALUES('','$userId','$address','$state','$pincode','$phone','$amt','$orderedOn')");
       if($result){
           echo "<script>console.log('".mysqli_insert_id($this->con) ."')</script>";
           $this->order_id = mysqli_insert_id($this->con);
           return $this->order_id;
       }else{
           return null;
       }

    }
    private function updateCart($userId,$order_id){
        return  mysqli_query($this->con,"UPDATE cart_items set order_id='$order_id' WHERE user='$userId' AND order_id=0");
    }

    public function getOrderId(){
        return $this->order_id;
    }
}?>