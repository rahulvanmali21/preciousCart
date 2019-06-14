<?php
include("includes/partials/head.php");
include("includes/partials/navbar.php");
?>
<div class="container mt-5 pt-3">
<div class="row">
 <?php 
    $query = $_GET["s"];
 
 $productQuery = mysqli_query($con,"SELECT * FROM products WHERE name LIKE '%$query%' OR  name LIKE '_$query%'");
    while($p_row = mysqli_fetch_array($productQuery)){
        echo '
        <div class="col-12 col-md-3">
        <div class="card my-3 animated fadeInDown ">
        <img src="./assets/'.$p_row["imgPath"].'" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title font-weight-bold">'.$p_row["name"].'</h4>
            <h5 class="text-warning font-weight-bold">&#x20b9; '.$p_row['price'] .'</h4>
            <a href="product.php?id='.$p_row["id"].'" class="btn btn-primary btn-block">View</a>
            </div>
            </div>
        </div>
        ';
    }
    if(mysqli_num_rows($productQuery) == 0){
        echo '<div class="text-center"><h1 class="mt-5 pt-4">No products Found </h1></div>';
    }
?>
    
       
</div>
</div>
</body>
</html>
