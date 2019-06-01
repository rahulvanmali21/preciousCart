<?php include("../includes/partials/admin_head.php");?>
<div id="home">
      <div class="row mt-3 text-light ">
        <div class="col-6 col-md-5"><h3 class="border text-center py-5 mb-2 bg-dark font-weight-bolder"> <?php echo Helper::getCustomerCount($con) ?> Customers</h3></div>
        <div class="col-6 col-md-5"><h3 class="border text-center py-5 mb-2 bg-dark font-weight-bolder"> <?php echo Helper::getOrderCount($con) ?> Orders  </h3></div>
        <div class="col-6 col-md-5"><h3 class="border text-center py-5 mb-2 bg-dark font-weight-bolder"> <?php echo Helper::getProductCount($con) ?> Products</h3></div>
        <div class="col-6 col-md-5"><h3 class="border text-center py-5 mb-2 bg-dark font-weight-bolder">  <?php echo Helper::getCategoryCount($con) ?> Categories</h3></div>
      </div>
<?php include("../includes/partials/admin_footer.php");?>
