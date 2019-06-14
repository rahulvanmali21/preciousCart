<?php 
ob_start();
session_start();
$timezone = date_default_timezone_set("Asia/Kolkata");
$con = mysqli_connect("localhost","root","","preciousCart");
if(mysqli_connect_errno()){
	echo "unable to connect " . mysqli_connect_errno();
}
?>
<!-- / $con = mysqli_connect("sql305.epizy.com","epiz_23726563","rQOPGCLmNZ28RFV","epiz_23726563_preciouscart"); /  -->