<?php include("../includes/partials/admin_head.php");
include("../includes/handlers/admin_product_handler.php"); 

?>
<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>

<div class="row mt-4">
<div class="col-md-6 offset-md-2">
    <div class="container">
        <?php 
        if($is_msg){
            echo $msg;
        }
        ?>
    <form action="new_product.php" method="POST" enctype="multipart/form-data">
    <h4 class="mb-2">New Product details</h4>
    <div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text bg-info text-light"><i class="fas fa-gifts"></i></span>
    </div>
    <input type="text" name="p_name"class="form-control" placeholder="product/gift name">
</div>
<?php echo $newProduct->getAllError(Constants::$p_name); ?>
<?php echo $newProduct->getAllError(Constants::$p_exist); ?>

    <div class="input-group mt-3">
    <div class="input-group-prepend ">
        <label class="input-group-text bg-info text-light" for="inputGroupSelect01"><i class="fas fa-filter"></i></label>
    </div>
    <select class="custom-select" id="inputGroupSelect01" name="category_id">
        <option selected disable value="">Please select category</option>
        <?php 
        $categoryQuery = mysqli_query($con,"SELECT * FROM categories");
        while($row  = mysqli_fetch_array($categoryQuery)){
            echo '
                <option value="'.$row["id"].'">'.$row["title"].'</option>            
            ';
        }
        ?>
    </select>
    </div>
<?php echo $newProduct->getAllError(Constants::$p_c_error); ?>

        <div class="input-group mt-3">  
            <div class="input-group-prepend">
                <span class="input-group-text bg-info text-light"><i class="fas fa-rupee-sign"></i></span>
            </div>
            <input type="number" placeholder="eg. 200" name="p_price" class="form-control" aria-label="Amount (to the nearest dollar)">
            <div class="input-group-append">
                <span class="input-group-text ">.00</span>
            </div>
        </div>
        <?php echo $newProduct->getAllError(Constants::$p_p_error); ?>

    <div class="input-group mt-3">
  <div class="input-group-prepend">
    <span class="input-group-text bg-info text-light" id="inputGroupFileAddon01"><i class="fas fa-file-image"></i></span>
  </div>
  <div class="custom-file">
    <input type="file" name="productImage" class="custom-file-input" onchange="preview_image(event)" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>  
</div>
<?php echo $newProduct->getAllError(Constants::$p_f_error); ?>
<?php echo $newProduct->getAllError(Constants::$p_f_v); ?>
<?php echo $newProduct->getAllError(Constants::$p_f_ext); ?>

    <img src="#" alt="" id="output_image" width=200><br>

    <div class="form-group mt-3">
        <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="5" placeholder="product description"></textarea>
      <?php echo $newProduct->getAllError(Constants::$p_d_error); ?>
      
    </div>
    <button type="submit" name="addProduct" class="btn btn-info btn-lg">Add</button>
    </form>
    </div>
</div>
</div>

<?php include("../includes/partials/admin_footer.php");?>
