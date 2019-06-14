<?php 
include("includes/partials/head.php");
include("includes/handlers/register_handler.php");
include("includes/partials/navbar.php");
if(!isset($_SESSION["loggedInUser"])){
    header("Location:index.php");
}
$user_id = Helper::getUserId($con,$_SESSION["loggedInUser"]);
if(Helper::emptyCart($con,$user_id)){
  header("Location:cart.php");
}
include("includes/handlers/order_handler.php");
?>

<div class="container mt-5 animated fadeInDown">
      <div class="py-5 text-center">
        <h2>Checkout form</h2>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill rounded-circle"><?php echo Helper::getCartCount($con,$user_id) ?></span>
          </h4>
          <ul class="list-group mb-3">
              <?php $cart_query = mysqli_query($con,"SELECT * FROM cart_items WHERE user='$user_id' and order_id=0");
                $total = 0.0;
                while($row=mysqli_fetch_array($cart_query)){
                    $cartProducts = new Product($con,$row["product"]);
                    $total = $total + (float)$cartProducts->getPrice() *(float)$row["quantity"];
                    echo '
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                    <h6 class="my-0 text-muted font-weight-bold">'.$cartProducts->getName() .' x '. $row["quantity"] .'</h6>
                    <small class="text-muted">category : '. $cartProducts->getCategory() .'</small>
                    </div>
                    <span class="text-muted">&#x20b9; '. (float)$cartProducts->getPrice() *(float)$row["quantity"].'</span>
                    </li>                
                    ';
                }
              ?>
            <li class="list-group-item d-flex justify-content-between bg-light text-info">
              <span>Total (INR)</span>
              <strong>&#x20b9; <?php echo $total?></strong>
            </li>
          </ul>
        </div>

        <!-- ADDRESS FORM -->
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Cash On Delivery is default payment mode</h4>
          <form class="needs-validation" novalidate action="checkout.php" method="POST">


            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>


            <div class="row">
              <div class="col-md-5 mb-3">
                  <div class="form-group">
                      <label for="phone_no">Phone No</label>
                      <input type="tel" name="phone" id="phone_no" placeholder="999-999-9999" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                      <div class="invalid-feedback">
                      Please enter no. in 000-000-0000 format
                     </div>
                  </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required name="state">
                <option value="">Select State</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                    <option value="Daman and Diu">Daman and Diu</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Orissa">Orissa</option>
                    <option value="Pondicherry">Pondicherry</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttaranchal">Uttaranchal</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="West Bengal">West Bengal</option>
                
                
                </select>
                  <div class="invalid-feedback">
                      Please enter a state
                  </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="401202" name="pincode" required >
                <div class="invalid-feedback">
                      Please enter your pincode
                </div>
              </div>
            </div>
            <p class="lead">Order Now & Get it by <span class="text-dark font-weight-bold"><?php echo date('D d,F Y', strtotime(date('Y-m-d', strtotime(' + 4 days')))); ?>
            </span>
            </p>             
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" name="placeOrderBtn" type="submit">Place Order</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2019 Precious Cart</p>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {

          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>



</body>
</html>