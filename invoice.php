<?php 
include("includes/partials/head.php");
include("includes/handlers/register_handler.php");
include("includes/partials/navbar.php");

if(!isset($_SESSION["loggedInUser"]) && !isset($_GET["orderId"]) && empty($_GET["orderId"])){
    header("Location:index.php");
}

$user_id = Helper::getUserId($con,$_SESSION["loggedInUser"]);
$order_id = $_GET["orderId"];

$orderDetails = new OrderDetails($con,$order_id);
?>
<div class="container mt-5 pt-5 animated fadeInDown">
    <h3>Thank you,Your order is Comfirm </h3>  
    
<div class="row">
    <div class="col-12 col-md-8">
    <div class="card">   
        <div class="card-body font-weight-bold text-muted">
            <h4>Order Information</h4>
            <hr>
            <table class="table table-borderless table-hover">
            <tbody>
                <tr>
                    <td class="text-muted">Name :</td>
                    <td><?php echo $orderDetails->getUsername() ?></td>
                </tr>
                <tr>
                    <td class="text-muted">Shipping Address :</td>
                    <td><?php echo $orderDetails->getaddress() ?></td>
                </tr>
                <tr>
                    <td class="text-muted">Contact no. :</td>
                    <td><?php echo $orderDetails->getPhone() ?></td>
                </tr>
                <tr>
                    <td class="text-muted">Ordered On :</td>
                    <td><?php echo date("D F Y",strtotime($orderDetails->getdate())) ?></td>
                </tr>
                <tr>
                    <td class="text-muted">Total Amt:</td>
                    <td><?php echo " &#8377;".$orderDetails->getAmt() ?></td>
                </tr>
            </tbody>
            </table>
            <hr>
            <p>An Email invoice has been send to <?php echo $_SESSION["loggedInUser"]?></p>
        </div>
    </div>
    </div>
</div>
    <a href="products.php" class="btn btn-primary btn-lg mt-3">Back to shopping</a>
</div>
<footer class="my-5 pt-5 text-muted text-center text-small">
<p class="mb-1">&copy; 2017-2019 Precious Cart</p>
</footer>
</div>
</body>
</html>