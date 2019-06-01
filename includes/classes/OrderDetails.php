<?php 
class OrderDetails{
    private $con;
    private $id;
    private $userId;
    private $address;
    private $state;
    private $pincode;
    private $phone;
    private $amt;
    private $orderedOn;


    public function __construct($con,$id){
        $this->con = $con;
        $this->id =$id;
        $result = mysqli_query($this->con,"SELECT * FROM orders WHERE id='$id'");
        $row = mysqli_fetch_array($result);
        $this->userId = $row["user"];
        $this->address = $row["address"];
        $this->state = $row["state"];
        $this->pincode = $row["pincode"];
        $this->phone = $row["phone"];
        $this->amt = $row["amt"];
        $this->orderedOn = $row["OrderOn"];
    }
    public function getUserId(){
        return $this->userId;
    }
    public function getUsername(){
        $result = mysqli_query($this->con,"SELECT * FROM users WHERE id='$this->userId'");
        $row = mysqli_fetch_array($result);
        return $row["fname"] ." ". $row["lname"];
    }
    public function getaddress(){
        return $this->address;        
    }
    public function getState(){
        return $this->state;
    }
    public function getPincode(){
        return $this->pincode;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getAmt(){
        return $this->amt;        
    }
    public function getdate(){
        return $this->orderedOn;
    }
}
?>