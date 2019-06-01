<?php include("../includes/partials/admin_head.php");?>
<?php include("../includes/modals/new_category.php");?>

<div class="mt-3">
     <button class="btn btn-danger p-3 mb-3" data-toggle="modal" data-target="#categoryModal">New Category</button>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">products</th>
    </tr>
  </thead>
  <tbody>
<?php 
$category_query = mysqli_query($con,"SELECT * FROM categories");
$i= 1;
while($row = mysqli_fetch_array($category_query)){
?>

    <tr>
      <th scope="row"><?php echo $i;?></th>
      <td><?php echo $row["title"] ?></td>
      <td><?php  echo Helper::getProductCategories($con,$row["id"])?></td>
    </tr>

<?php $i =$i+1; } ?>
  </tbody>
</table>
<?php include("../includes/partials/admin_footer.php");?>
