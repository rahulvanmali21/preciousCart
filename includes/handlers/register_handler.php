<?php
function purifyPassword($inputData){
    $inputText = strip_tags($inputData);
    return $inputData;
}
function purifyFormInput($inputData){
    $inputData = strip_tags($inputData);
    $inputData = str_replace(" ","",$inputData);
    return $inputData;
}

function purifyFormString($inputData){
    $inputData = strip_tags($inputData);
    $inputData = str_replace(" ","",$inputData);
    return $inputData;
}
if(isset($_POST["registration_btn"])){
    $userName  = purifyFormInput($_POST['username']);
    $firstName = purifyFormString($_POST['first_name']);
    $lastName  = purifyFormString($_POST['last_name']);
    $email     = purifyFormString($_POST['email']);
    $password  = purifyFormString($_POST['password']);
    $password2  = purifyFormString($_POST['password_confirm']);
    
    $wasSuccessfull = $account->register($userName,$firstName,$lastName,$email,$password,$password2);
     if($wasSuccessfull){
         $_SESSION['loggedInUser'] = $email;
         header("Location:index.php");
     } 
}
?>