<?php 
include("includes/partials/head.php");
include("includes/handlers/register_handler.php");
include("includes/partials/navbar.php");
if(!isset($_SESSION["loggedInUser"])){
    header("Location:index.php");
}
$user_id = Helper::getUserId($con,$_SESSION["loggedInUser"]);
?>
<div class="container mt-5 pt-5">
    <div class="row animated fadeIn">
        <div class="col-12">
            <?php 
            $cartQuery = mysqli_query($con,"SELECT * FROM cart_items WHERE user='$user_id' AND order_id=0");
            if(mysqli_num_rows($cartQuery) > 0){
                ?>
            <h1>Your Cart</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col"> </th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0.0;
                            if(mysqli_num_rows($cartQuery)>0){
                                while($row = mysqli_fetch_array($cartQuery)){
                                    $cartProduct = new Product($con,$row["product"]);
                                    
                                    echo '
                                    <tr>
                                    <td><img src="./assets/'.$cartProduct->getImgPath().'"  width=50 height=50/> </td>
                                    <td>'.$cartProduct->getName().'</td>
                                    <td class="font-weight-bold"><a class="ml-1 text-primary" onclick="increaseQuantity('.$row["product"].')"><i class="fas fa-plus"></i></a> '.$row["quantity"].' <a class="ml-1 text-primary" onclick="reduceQuantity('.$row["product"].')"><i class="fas fa-minus"></i></a></td>
                                    <td ><button  class="btn btn-sm btn-danger rounded-pill" onClick="deleteItem('.$row["product"].')"><i class="fa fa-trash"></i> </button> </td>
                                    <td >&#x20b9; '. (float)$cartProduct->getPrice() * (float)$row["quantity"] .' </td>
                                    <tr>   ';
                                    $total = $total + (float)$cartProduct->getPrice() * (float)$row["quantity"] ;
                                }
                            }

                        ?>
                        <tr class="">
                            <td></td>
                            <td></td>
                            <td></td>                            
                            <td class="font-weight-bold py-4 text-right ">Total</td>                                
                            <td class="text-danger py-4 "> &#x20b9; <?php echo $total ?></td>    

                        </tr>
                    </tbody>
                </table>
            </div>
            <script>
               let deleteItem=(product_id)=>{
                   $.post("includes/handlers/delete_item_ajax.php",{product_id:product_id})
                    .done(msg=>{
                        if(msg =="success"){
                         location.reload()}
                    })
               }
               let reduceQuantity=(product_id)=>{
                   $.post("includes/handlers/reduceQuantity_ajax.php",{product_id:product_id})
                    .done(msg=>{
                        if(msg == "success"){
                            location.reload()
                        }
                    })
               }
               let increaseQuantity=(product_id)=>{
                    $.post("includes/handlers/increaseQuantity_ajax.php",{product_id})
                        .done(msg=>{
                            if(msg == "success"){
                            location.reload()
                        }
                    })
               }
            </script>

            <br>
            <div class="row">
                <div class="col-12 col-md-3 offset-md-6">
                    <a href="products.php" class="btn btn-primary btn-block btn-lg mb-2">Back to Products</a>            
                </div>    
                <div class="col-12 col-md-3">
                    <a href="checkout.php" class="btn btn-warning btn-block btn-lg">Checkout</a>
                </div>    
            </div>
            <?php } else {?>
            <h1 class="display-4">Your cart is empty <i class="far fa-grin-squint-tears"></i></h1>
            <a href="products.php" class="btn btn-primary btn-lg mt-3">Continue Shopping <i class="fas fa-backward"></i> </a>
            <?php }?>
        </div>
    </div>
</div>
</body>
</html>