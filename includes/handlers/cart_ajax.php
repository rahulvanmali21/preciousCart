<?php 
include("../../config/database.php");
if(isset($_POST["cart_data"]) && $_POST["cart_data"]!=null){
    $data =$_POST["cart_data"];
    $product_id = $data["product_id"];
    $quantity = $data["quantity"];
    $user_id = getuserId($_SESSION["loggedInUser"],$con);
    if(productExist($con,$product_id,$user_id)){
        updateQuanity($con,$product_id,$user_id,$quantity);
        echo "success";
    }else{
        updateCart($con,$product_id,$quantity,$user_id);
        echo "success";
        
    }

}else{
    echo "please";
}
function getuserId($email,$con){
    $result = mysqli_query($con,"SELECT id FROM users WHERE email='$email' LIMIT 1");
    $row = mysqli_fetch_array($result);
    return $row["id"];

}

function productExist($con,$product_id,$user_id){
    $result = mysqli_query($con,"SELECT * FROM cart_items WHERE product='$product_id' AND user='$user_id' AND order_id=0");
    if(mysqli_num_rows($result)==1){
        return true;
    }
    else{
        return false;
    }
}

function updateQuanity($con,$product_id,$user_id,$quantity){
    $result = mysqli_query($con,"SELECT quantity FROM cart_items WHERE product='$product_id' AND user='$user_id' AND order_id=0");
    $row = mysqli_fetch_array($result);
    $new_quanity = (int)$row["quantity"] + (int)$quantity;
    return mysqli_query($con,"UPDATE cart_items SET quantity='$new_quanity' WHERE user='$user_id' AND product='$product_id'");
}


function updateCart($con,$product_id,$quantity,$user_id){
    $updateOn = date("Y-m-d");
    $order_id = 0;
    return mysqli_query($con,"INSERT INTO cart_items VALUES('','$user_id','$product_id','$quantity','$order_id','$updateOn')");
}

?>