<?php
include("../../config/database.php");

if(isset($_POST["email"]) && $_POST["email"]!="" && isset($_POST["password"]) && $_POST["password"]!=""){
    $verification = login($_POST["email"],$_POST["password"],$con);
    if($verification){
        $_SESSION["loggedInUser"] = $_POST["email"];
    }
    else{
        echo "wrong email or password";
    }
}else{
    echo "missing credecials";
}
function login($email,$pass,$con){
    $password = md5($pass);
    $loginQuery = mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($loginQuery) ==1){
        return true;
    }
    else{
        return false;
       }
}

?>