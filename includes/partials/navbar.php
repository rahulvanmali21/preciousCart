<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top" style="border-bottom:2px solid grey;">
    <div class="container animated fadeInUp" id="nav-wrapper">
  <a class="navbar-brand text-monospace text-warning" href="index.php"><strong>Precious-Cart <i class="fas fa-gift"></i></strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto font-weight-bold" >
      <?php 
      if(!isset($_SESSION["loggedInUser"])){
        ?>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#loginModalCenter" href="#">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="register.php">Register</a>
        </li>
      </li>
        
     <?php } else{ ?>
        
        <li class="nav-item">
          <a class="nav-link "><?php echo $_SESSION["loggedInUser"]?></a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="cart.php"></span><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-primary rounded-circle" id=counts></a>
        </li>
        <li class="nav-item">
        <a class="nav-link " href="orders.php">Orders</a>
      </li>
        <li class="nav-item">
        <a class="nav-link " style="cursor:pointer" onclick="logout()">Logout</a>
      </li>
      <script>
      $.get("./includes/handlers/cart_count.php").done(msg=>{
        if(msg){
          $("#counts").html(msg);
        }
      });
      </script>
 <?php } ?>
 
      <li class="nav-item">
      <a class="nav-link " href="products.php">Products</a>
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
      <input class="form-control mr-sm-2 sm-w-75 rounded-pill" name="s" type="text" placeholder="Search" aria-label="Search">
      <button class="btn my-2 my-sm-0 " type="submit"><i class="fas fa-search text-warning"></i></button>
    </form>
    
  </div>
  </div>
</nav>
<script>

let loginUser=()=>{
    console.log("click");
  $.post("./includes/handlers/user_login_ajax.php",{email:$("#l_email").val(),password:$("#l_password").val()})
    .done(msg=>{
      if(msg){
      $("#error").html(msg)
      }else{
        location.reload();
      }
    })
}

let check=(e)=>{
  if(e.keyCode == 13){
    loginUser();
  }
}

let logout=()=>{
  $.post("./includes/handlers/user_logout_ajax.php")
    .done(()=>{
      location.reload()
    })
}

</script>

<?php if(!isset($_SESSION["loggedInUser"])){
?>
 <div class="modal fade" id="loginModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h3 class="modal-title mx-auto" id="exampleModalCenterTitle">Login to start shopping</h3>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <span class="text-danger text-center mb-2" id="error"></span>
     <div class="modal-body">
       <div class="form-group">
         <label for="l_email">Email address</label>
         <input type="email" id="l_email" autofocus class="form-control" name="l_email" placeholder="@somesite.com" onkeypress="check(event)">
       </div>
       <div class="form-group">
         <label for="l_password">Password</label>
         <input type="password" id="l_password" class="form-control" name="l_password" placeholder="************" onkeypress="check(event)">
       </div>
       <button name="loginBtn" id="loginBtn" class="btn btn-primary btn-block" onClick="loginUser()">Login</button>

     </div>
   </div>
 </div>
</div>

 
<?php } ?> 