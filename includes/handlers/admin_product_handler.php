<?php 
$is_msg = false;
$msg = "";
if(isset($_POST["addProduct"])){
    $name =$_POST["p_name"];
    $categories_id = $_POST["category_id"];
    $price = $_POST["p_price"];
    $descrip = $_POST["details"];
    
    $success = $newProduct->addProduct($name,$categories_id,$price,$descrip);
    if($success){
        $is_msg =true;
        $msg = '<div class="alert alert-success" role="alert">Product Add</div>';
    }else{
        $is_msg =true;
        $msg = '<div class="alert alert-danger" role="alert">failed </div>';
    }
}
?>