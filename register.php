
<?php
include("includes/partials/head.php");
include("includes/handlers/register_handler.php");
include("includes/partials/navbar.php");
?>
<div class="row mt-5">
<div class="col-md-4 offset-md-4 col-sm-6 offset-sm-2">
<script>
    $(document).ready(()=>{
        <?php 
        if(isset($_POST["registration_btn"])){
            echo '$("#registerForm").removeClass("animated fadeInDown");
                $("#nav-wrapper").removeClass("animated");
            ';

        }
        ?>
    })
</script>
<div class=" container mt-5 animated fadeInDown" id="registerForm">
    <form action="register.php" method="POST">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First name">
        <?php echo $account->getAllError(Constants::$fn_invalid); ?>

    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name" id="last_name"  placeholder="Enter Last Name">
        <?php echo $account->getAllError(Constants::$ln_invalid); ?>
    </div>

    <div class="form-group">
        <label for="Username">Username</label>
        <input type="ematextil" class="form-control" name="username" id="Username" placeholder="Enter Username">
        <?php echo $account->getAllError(Constants::$un_invalid); ?>
        <?php echo $account->getAllError(Constants::$UserNameExist); ?>
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email"  placeholder="Enter email">
        <?php echo $account->getAllError(Constants::$em_invalid); ?>
        <?php echo $account->getAllError(Constants::$emailNameExist); ?>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <?php echo $account->getAllError(Constants::$pass_type) ?>
        <?php echo $account->getAllError(Constants::$pass_len); ?>
    </div>
    <div class="form-group">
        <label for="password_confirm">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="confirm password">
        <?php echo $account->getAllError(Constants::$pass_match); ?>
    </div> 
    <button type="submit" class="btn btn-primary btn-block" name="registration_btn">Register</button>
    </form>
</div>
</div>
</div>



</body>
</html>