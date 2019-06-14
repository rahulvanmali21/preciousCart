<?php include("../includes/partials/admin_head.php");?>
<?php include("../includes/modals/new_category.php");?>

<div class="mt-3">
    <a href="new_product.php"class="btn btn-info">New Product</a>
</div>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">img</th>
      <th scope="col">category</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $customerQuery = mysqli_query($con,"SELECT * FROM  products");
        while($row = mysqli_fetch_array($customerQuery)){
            echo '
            <tr>
                <td>'.$row["name"].'</td>
                <td>'.$row["price"].'</td>
                <td><img src="../assets/'.$row["imgPath"].'" alt="product" width=100></td>
                <td>'.Helper::getCategory($con,$row["category"]).'</td>

            </tr>
            ';
        }
    ?>
  </tbody>
  
<?php include("../includes/partials/admin_footer.php");?>
