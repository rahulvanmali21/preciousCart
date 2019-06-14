<?php
include("../config/database.php"); 
if(isset($_SESSION["Admin"])){
  header("Location:dashboard.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
    <script  src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Admin login</title>
</head>
<body>
<script>
let check =(e)=>{
  if (e.keyCode == 13) {
        login()
    }
}
 let login =()=>{
   $.post("../includes/handlers/admin_login_ajax.php",{admin:$("#admin").val(),password:$("#password").val()})
    .done(msg=>{
      if(msg){
        $("#error").html(msg)
        return
      }
      location.reload();
      
    })
 }
</script>
<form class="form-signin  animated fadeInDown">
  <div class="text-center mb-4">
      <h1><strong> Login to ADMIN</strong></h1>
 </div>
  <div class="form-label-group">
    <input type="username" id="admin" class="form-control" placeholder="eg. tony stark" autofocus onkeypress="check(event)">
    <label for="username">Username</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="password" class="form-control" placeholder="**************" onkeypress="check(event)">
    <label for="password">Password</label>
  </div>
  <span class="text-center text-danger mb-2" id="error"></span>

  <button class="btn btn-lg btn-primary btn-block mt-3" type="button" onClick="login()"><i class="fas fa-sign-in-alt"></i> Sign in</button>
  <div class="text-center my-2">
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2019 Precious Cart <br>
        <small>development done by Kunal Patil</small> </p>
</form>
<style>
    html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;inputPassword
}

.form-signin {
  width: 100%;
  max-width: 420px;
  padding: 15px;
  margin: auto;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group > input,
.form-label-group > label {
  height: 3.125rem;
  padding: .75rem;
}

.form-label-group > label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  line-height: 1.5;
  color: #495057;
  pointer-events: none;
  cursor: text; 
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: 1.25rem;
  padding-bottom: .25rem;
}

.form-label-group input:not(:placeholder-shown) ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}
@supports (-ms-ime-align: auto) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}
@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}
</style>

</body>
</html>
