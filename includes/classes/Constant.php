<?php 
class Constants{
    // Registeration  Errors
    public static $pass_type = "Your password must only contain letters and numbers";
    public static $pass_match = "Your password are not matching";
    public static $pass_len = "your password must have at least 6 character";
    public static $em_invalid = "Please Enter an Valid Email!!";
    public static $un_invalid = "your user name must between 5 to 25 characters!!";
    public static $fn_invalid = "your first name must between 3 to 25 characters!!";
    public static $ln_invalid = "your last name must between 3 to 25 characters!!";
    public static $UserNameExist = "Username already taken";
    public static $emailNameExist = "Email ID is already in use";


    // Product Entry Errors;
    public static $p_name = "name should have 3 to 25 characters!!";
    public static $p_exist = "Product with same Name exist";
    public static $p_d_error = "details should have at least 8 to 100 character";
    public static $p_f_error = "image not uploaded";
    public static $p_p_error = "please enter valid price";
    public static $p_c_error = "please select valid category";
    public static $p_f_v = "please select a valid file";
    public static $p_f_ext = "please select only .jpg and .png";
    


}
?>