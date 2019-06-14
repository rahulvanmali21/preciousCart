<?php
class Account{
    private $con;
    private $errors;
    public  function __construct($con){
        $this->con = $con;
        $this->errors = array();
    }
    public function getAllError($errors_string){
        if(!in_array($errors_string,$this->errors)){
            $errors_string = "";
        }
        return "<span class='text-danger animated bounceIn'>$errors_string</span>";
    } 
    
    public function register($uName,$fName,$lName,$email,$pass,$pass2){
        $this->validate_first_name($fName);
        $this->validate_last_name($lName);
        $this->validate_username($uName);
        $this->validate_email($email);
        $this->validate_password($pass,$pass2);
        if(empty($this->errors) == true){
            return $this->registerNewUser($uName,$fName,$lName,$email,$pass);
            } 
        else{
            return false;  
            }
    }

    private function registerNewUser($uName,$fName,$lName,$email,$pass){
        $password_hash = md5($pass);
        $this->debug("registering");
        $result = mysqli_query($this->con,"INSERT INTO users VALUES('','$fName','$lName','$uName','$email','$password_hash')");
        return $result;
    }

    private function validate_first_name($lName){
        if (strlen($lName) > 25 || strlen($lName) < 3){
            array_push($this->errors,Constants::$fn_invalid);
            return;
        }
    }

    private function validate_last_name($lName){
        if (strlen($lName) > 25 || strlen($lName) < 3){
            array_push($this->errors,Constants::$ln_invalid);
            return;
        }
    }

    private function validate_password($pass,$pass2){
        if($pass != $pass2){
            array_push($this->errors,Constants::$pass_match);
            return;
        }
        if(preg_match('/[^A-Za-z0-9]/',$pass)){
            array_push($this->errors,Constants::$pass_type);
            return;
        }
        if (strlen($pass) < 6){
            array_push($this->errors,Constants::$pass_len);
            return;
        }  
    }
    

    private function validate_username($uName){
        if (strlen($uName) > 25 || strlen($uName) < 5){
            array_push($this->errors,Constants::$un_invalid);
            return;
        }
        $checkUserNameQuery = mysqli_query($this->con,"SELECT username FROM  users WHERE username='$uName'");
        if(mysqli_num_rows($checkUserNameQuery)!= 0 ){
            array_push($this->errors,Constants::$UserNameExist);
        }
    }
    private function validate_email($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            array_push($this->errors,Constants::$em_invalid);
            return;
        }
        $checkEmailQuery = mysqli_query($this->con,"SELECT email FROM  users WHERE email='$email'");
        if(mysqli_num_rows($checkEmailQuery)!= 0 ){
            array_push($this->errors,Constants::$emailNameExist);
        } 
    }
    public function debug($msg){
        echo "<script>console.log(".$msg.")</script>";
    }
}
?>