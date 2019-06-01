<?php 
class Product{
    private $con;
    private $id;
    private $name;
    private $category_id;
    private $price;
    private $describ;
    private $imgPath;
    public function __construct($con,$id){
        $this->con = $con;
        $this->id =$id;
        $product_query = mysqli_query($con,"SELECT * FROM products WHERE id='$id' LIMIT 1");
        $row = mysqli_fetch_array($product_query);
        $this->name =$row["name"];
        $this->category_id =$row["category"];
        $this->price =$row["price"];
        $this->describ =$row["describ"];
        $this->imgPath = $row["imgPath"];
    }
    public function getName(){
        return $this->name;

    }
    public function getCategory_id(){
        return $this->category_id;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getDescrib(){
        return $this->describ;
    }
    public function getImgPath(){
        return $this->imgPath;
    }
    public function getCategory(){
        $result = mysqli_query($this->con,"SELECT title FROM categories WHERE id='$this->category_id' LIMIT 1");
        $row = mysqli_fetch_array($result);
        return $row["title"];
    }
}
?>