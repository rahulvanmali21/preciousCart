<?php 
include("includes/partials/head.php");
include("includes/handlers/register_handler.php");
include("includes/partials/navbar.php");

if(!isset($_SESSION["loggedInUser"]) && !isset($_GET["orderId"]) && empty($_GET["orderId"])){
    header("Location:index.php");
}

$user_id = Helper::getUserId($con,$_SESSION["loggedInUser"]);
?>
<div class="container mt-5 pt-5">
<h1>your orders</h1>

<?php 
$order_query = mysqli_query($con,"SELECT * FROM orders WHERE user='$user_id' ORDER BY OrderOn DESC");
while($row = mysqli_fetch_array($order_query)){
?>
<div class="card mt-2 sm-w-50">
  <div class="card-body">
    <h6 class="card-subtitle mb-2 text-muted">Ordered On <?php echo date("D d F y",strtotime($row["OrderOn"])) ?></h6>
    <p class="card-text">By : <?php echo Helper::getUserFullName($con,$_SESSION["loggedInUser"]) ?>. <br>
    Total amount : <?php echo $row["amt"] ?>
    </p>

    <a href="invoice.php?orderId=<?php echo $row["id"] ?>" class="card-link">show details</a>
  </div>
</div>
<?php } ?>

</div>
</body>
</html>