<?php 
class Helper{
    public static function getUserId($con,$email){
        $result = mysqli_query($con,"SELECT id FROM users WHERE email='$email'");
        $row = mysqli_fetch_array($result);
        return $row["id"];
    }
    public static function getCartCount($con,$userId){
        $result = mysqli_query($con,"SELECT * FROM cart_items WHERE user='$userId' and order_id='0'");
        return mysqli_num_rows($result);
    }
    public static function getAmount($con,$user_id){
        $total_amount =0.0;
        $result = mysqli_query($con,"SELECT quantity,product FROM cart_items where user='$user_id' and order_id=0");
        while ($row = mysqli_fetch_array($result)){
            $product_details = new Product($con,$row["product"]);
            $amt = (float)$product_details->getPrice() * (float)$row["quantity"];
            $total_amount = $total_amount + $amt;
        }
        return $total_amount;
    }
    public static function emptyCart($con,$user_id){
        $result = mysqli_query($con,"SELECT * FROM cart_items WHERE  user='$user_id' and order_id=0");
        if(mysqli_num_rows($result)<1){
            return true;
        }
        return false;
    }
    public static function getProductCategories($con,$category_id){
        $result = mysqli_query($con,"SELECT * FROM products WHERE category='$category_id'");
        return mysqli_num_rows($result);
    }
    public static function validProduct($con,$id){
        $result = mysqli_query($con,"SELECT * FROM products WHERE id=$id");
        if(mysqli_num_rows($result) > 0){
            return true;
        }
        return false;
    }
    public static function getCategory($con,$id){
        $result = mysqli_query($con,"SELECT title FROM categories WHERE id=$id");
        $row = mysqli_fetch_array($result);
        return $row["title"];
    }
    public static function getCustomerCount($con){
        $result = mysqli_query($con,"SELECT * FROM  users");
        return mysqli_num_rows($result);

    }
    public static function getOrderCount($con){
        $result = mysqli_query($con,"SELECT * FROM  orders");
        return mysqli_num_rows($result);
    }
    public static function getProductCount($con){
        $result = mysqli_query($con,"SELECT * FROM  products");
        return mysqli_num_rows($result);
    }
    public static function getCategoryCount($con){
        $result = mysqli_query($con,"SELECT * FROM  categories");
        return mysqli_num_rows($result);
    }
    public static function getUserFullName($con,$email){
        $result = mysqli_query($con,"SELECT * FROM  users WHERE email='$email'");
        $row = mysqli_fetch_array($result);
        return $row["fname"]." ".$row["lname"];
    }

}

?>
