<?php 
include("../../config/database.php");
include ("../classes/Helper.php");
if(isset($_POST["product_id"]) && !empty($_POST["product_id"]) && isset($_SESSION["loggedInUser"])){
    $user_id = Helper::getUserId($con,$_SESSION["loggedInUser"]);
    $product_id = $_POST["product_id"];
    if(deleteItem($con,$user_id,$product_id)){
        echo "success";
    }else{
        echo "failed";
    }

}else{
    echo "not working";
}


function deleteItem($con,$user_id,$product_id){
   return mysqli_query($con,"DELETE FROM cart_items WHERE user='$user_id' AND product='$product_id' AND order_id=0");
}
?>