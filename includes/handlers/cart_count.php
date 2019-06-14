<?php 
include("../../config/database.php");

if(isset($_SESSION["loggedInUser"])){
    $id =getuserId($con,$_SESSION["loggedInUser"]);
    $result = mysqli_query($con,"SELECT * FROM cart_items WHERE  user='$id' and order_id=0");
    echo mysqli_num_rows($result);
}
function getuserId($con,$email){
    $result = mysqli_query($con,"SELECT id FROM users WHERE email='$email'");
    $row = mysqli_fetch_array($result);
    return $row["id"];
    }
?>