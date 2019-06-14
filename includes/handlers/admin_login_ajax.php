<?php 
include("../../config/database.php");

if(isset($_POST["admin"]) && $_POST["admin"]!='' &&  isset($_POST["password"]) && $_POST["password"]!=''){
    $veriication = login($_POST["admin"],$_POST["password"],$con);
    if($veriication){
        $_SESSION["Admin"] = $_POST["admin"];
    }else{
        echo "Invalid username and password";
    }
}   
else{
    echo"please enter all details";
}
function login($admin,$pass,$con){
    $password = md5($pass);
    $result = mysqli_query($con,"SELECT * FROM admin WHERE username='$admin' AND pass='$password'");
    if(mysqli_num_rows($result)==1){
        return true;
    }else{
        return false;
    }
}
?>