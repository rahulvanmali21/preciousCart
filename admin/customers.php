<?php include("../includes/partials/admin_head.php");
 include("../includes/modals/new_category.php");?>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">email</th>
      <th scope="col">total  Orders</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $customerQuery = mysqli_query($con,"SELECT * FROM  users");
        while($row = mysqli_fetch_array($customerQuery)){
            echo '
            <tr>
                <td>'.$row["username"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["id"].'</td>

            </tr>
            ';
        }
    ?>
  </tbody>

<?php include("../includes/partials/admin_footer.php");?>
