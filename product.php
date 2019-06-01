<?php 
if(!isset($_GET["id"]) && empty($_GET["id"])){
        header("Location:error.php");
        exit;
}
include("includes/partials/head.php");
include("includes/partials/navbar.php");
$id = $_GET["id"];
if(!Helper::validProduct($con,$id)){
    header("Location:error.php");
}
$product = new Product($con,$id);
?>

<div class="container mt-5">

<div class="row pt-5">

<div class="col-12 col-md-5">
    <img src="./assets/<?php echo $product->getImgPath() ?>" alt="..." class="img-thumbnail animated fadeIn">
</div>

<div class="col-12 col-md-7 animated fadeIn">
    <h1 class="font-weight-bold"><?php echo $product->getName() ?></h1>
    <hr>
    <p><small class="text-muted">category</small> <?php echo $product->getCategory() ?></p>
    <label class="text-muted" for="quantity">Quantity</label>
    <select class="form-control mb-3" style="width:30%" id="quantity">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    </select>

    <h3 class="font-weight-bold text-warning"><i class="fas fa-rupee-sign"></i> <?php echo $product->getPrice() ?></h3>
    <?php 
    if(isset($_SESSION["loggedInUser"])){
        echo '
        <button class="btn btn-primary btn-lg mb-2" onclick="add_to_cart()">Add to cart</button>    
        ';
    }
    else{
        echo '
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#loginModalCenter">Buy Now</button>        
        ';
    }
    ?>
</div>
<div class="p-3 mt-4 w-100 animated fadeIn">
<h3 class="text-capitalize">description</h3>
<hr>
<p class="lead">
<?php echo $product->getDescrib() ?>
</p>
</div>
</div>
</div>
<script>
let add_to_cart=()=>{
    let cart_data={
    product_id: <?php echo $_GET["id"]?>,
    quantity : $("#quantity").val()}

$.post("./includes/handlers/cart_ajax.php",{cart_data:cart_data})
    .done(msg=>{
        if(msg =='success'){
            location.replace("cart.php");
        }
    });
}
</script>
</body>
</html>