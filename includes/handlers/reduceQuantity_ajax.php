<?php
include ("../classes/Helper.php");
include("../../config/database.php");

if(isset($_POST["product_id"]) && !empty($_POST["product_id"]) && isset($_SESSION["loggedInUser"])){
    $user_id = Helper::getUserId($con,$_SESSION["loggedInUser"]);
    $product_id = $_POST["product_id"];
    if(checkQuantity($con,$product_id,$user_id) == 1){
        deleteItem($con,$product_id,$user_id);
        echo "success";
    }else{
        if(update_cart($con,$product_id,$user_id)){
        echo "success";
        }else{
        echo "failed";
        }
    }
} else{
    echo "not working";
}

function update_cart($con,$product_id,$user_id){
    return mysqli_query($con,"UPDATE cart_items set quantity=quantity - 1 WHERE user='$user_id' AND product='$product_id' AND order_id=0 ");
} 
function checkQuantity($con,$product_id,$user_id){
    $result = mysqli_query($con,"SELECT quantity FROM cart_items WHERE product='$product_id' AND user='$user_id' AND order_id=0");
    $row = mysqli_fetch_array($result);
    return $row["quantity"];
}
function deleteItem($con,$user_id,$product_id){
    return mysqli_query($con,"DELETE FROM cart_items WHERE user='$user_id' AND product='$product_id' AND order_id=0");
 }
?>