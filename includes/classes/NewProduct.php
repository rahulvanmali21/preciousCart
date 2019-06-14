<?php 
class NewProduct{
    private $con;
    private $path= "../assets/products/";
    private $errors;
    private $newPath;
    public function __construct($con){
        $this->con =$con;
        $this->errors = array();
    }
    public function getAllError($errors_string){
        if(!in_array($errors_string,$this->errors)){
            $errors_string = "";
        }
        return "<span class='text-danger'>$errors_string</span>";
    } 
    public function addProduct($productName,$category_id,$price,$details){
        $productName =ucwords($productName);
        $price = (float)$price;
        $postedOn = date("Y-m-d");
        $this->newPath = uniqid("uploaded") . '.'. strtolower(pathinfo($_FILES['productImage']["name"], PATHINFO_EXTENSION));;
        $imgLocation = "products/" . $this->newPath;
        $this->validateProduct($productName);
        $this->validateCategory($category_id);
        $this->validatePrice($price);
        $this->validateFile();
        $this->validateDetails($details);
        if(empty($this->errors)){
            if($this->uploadFile()){
              return $this->saveNewProduct($productName,$category_id,$price,$details,$imgLocation,$postedOn);
            }
            return false;
        }
        return false;
    }
    private function uploadFile(){
        $location = $this->path . $this->newPath;
        if(move_uploaded_file($_FILES["productImage"]["tmp_name"],$location)){
            return true;
        }else{
            array_push($this->errors,Constants::$p_f_error);            
            return false;
        }
    }
    private function saveNewProduct($name,$category_id,$price,$details,$imgPath,$postedOn){
        $result = mysqli_query($this->con,"INSERT INTO products VALUES('','$name','$category_id','$price','$details','$imgPath','$postedOn')");
        return $result;
    }

    private function validateProduct($productName){
        if(strlen($productName) > 25 || strlen($productName) < 3)
        {
            array_push($this->errors,Constants::$p_name);
            return;
        }
        $result = mysqli_query($this->con,"SELECT * FROM products WHERE name='$productName'");
        if(mysqli_num_rows($result) >0){
            array_push($this->errors,Constants::$p_exist);
            return;
        }    
    }
    private function validatePrice($price){
        if($price <= 0){
            array_push($this->errors,Constants::$p_p_error);
        }
    }
    private function validateDetails($details){
        if(strlen($details) > 300 || strlen($details) < 8)
        {
            array_push($this->errors,Constants::$p_d_error);
            return;
        }
    }
    private function validateCategory($id){
        $result = mysqli_query($this->con,"SELECT * FROM categories WHERE id='$id'");
        if(mysqli_num_rows($result)==0){
            array_push($this->errors,Constants::$p_c_error);
            return;            
        }
    }
    private function validateFile(){
        if(!file_exists($_FILES['productImage']['tmp_name']) || !is_uploaded_file($_FILES['productImage']['tmp_name'])) {
            array_push($this->errors,Constants::$p_f_v);
            return;         
        }
        $ext = pathinfo($_FILES['productImage']["name"], PATHINFO_EXTENSION);
        if(!in_array($ext,array("png","jpg","jpeg"))){
            array_push($this->errors,Constants::$p_f_ext);
        }
    }   
}
?>