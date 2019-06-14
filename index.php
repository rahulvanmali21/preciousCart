<?php 
include("config/database.php");
include("includes/classes/Account.php");
include("includes/classes/Constant.php");

$account = new Account($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Precious Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script  src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<?php include("includes/partials/navbar.php");?>
<style>
.landing{
  background:linear-gradient(to right, rgba(142, 14, 0,0.5), rgba(255, 246, 245, 0.5)),url("./assets/imgs/1.png") no-repeat center !important;
  height:100vh;
  width:100%;
  background-size:cover;
  background-position: right;
}
.header{
  position:absolute;
  margin-top:15%;
  margin-left:10%;
}
</style>
<div class="landing">
  <div class="header">
    <h1 class="display-4 text-light font-bold animated fadeInRight ">A Place Where You can Buy </h1>
    <h1 class="text-light animated fadeInLeft">Precious Gifts <i class="fas fa-gifts"></i></h1>
    <a href="products.php" class="btn btn-light btn-lg mt-4 rounded-pill text-warning animated fadeInUp delay-1s font-weight-bold">Show Products</a>
  </div>
</div>
</div>
</body>
<style>
@media only screen and (max-width: 600px) {
  
    h1{
      margin-top:10%;
    }
  
}
</style> 
</html>