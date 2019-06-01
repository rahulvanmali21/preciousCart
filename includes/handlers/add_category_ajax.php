<?php
include("../../config/database.php");
if(isset($_POST["category"]) && $_POST["category"]!=""){
    $category = $_POST["category"];
    if(isExist($category,$con)){
        echo "category already exist";
    }
    else{
        $result = mysqli_query($con,"INSERT INTO categories VALUES('','$category')");
        if($result){
            echo "new category Add";
        }
        else{
            echo "Failed";
        }
    }

}
function isExist($category,$con){
    if(mysqli_num_rows(mysqli_query($con,"SELECT id FROM categories WHERE title='$category'"))>0){
        return true;
    }else{
        return false;
    }
}
?>
