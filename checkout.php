<?php

 session_start(); 
 include("functions/myFunctions.php"); 
 include("includes/header.php");
 include("authenticate.php");

  ?>


  <div class="py-3 bg-primary">
  <div class="container">
    <h6 class="text-white">
        <a href="index.php" class="text-white">Home /</a> 
       <a href="checkout.php" class="text-white">Checkout</a>

   </h6>

  </div>
 </div>

<div class="py-5">
  
<div class="container mt-4">
  <div class="card  shadow">
      <div class="card-body">

        <form action="functions/placeorder.php" method="POST">

            <div class="row">
              <div class="col-md-6">
                <h5 class="text-warning fw-bold">Order Address</h5>
                <hr>
                <div class="row">
                  <div class="col-md-6 mb-3">
                     <label class="fw-bold">Name</label>
                     <input type="text" name="name"   placeholder="Enter your full name" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="fw-bold">Email</label>
                     <input type="email" name="email"  placeholder="Enter your email" class="form-control">
                  </div>

                  <div class="col-md-6 mb-3">
                     <label class="fw-bold">Phone</label>
                     <input type="text" name="phone"  placeholder="Enter your phone number" class="form-control">
                  </div>

                  <div class="col-md-6 mb-3">
                     <label class="fw-bold">Pin Code</label>
                     <input type="text" name="pincode"  placeholder="Enter your pincode" class="form-control">
                  </div>

                  <div class="col-md-12 mb-3">
                     <label class="fw-bold">Address</label>
                     <textarea name="address"   rows="5" class="form-control"></textarea>
                  </div>
                </div>
                
              </div>
                <div class="col-md-6">

                   <div class="row align-items-center">
                    <h6 class="text-warning fw-bold">Order Details</h6>
                        <div class="col-md-5">
                          <h6 class="text-primary ">Product</h6>
                        </div>
                        <div class="col-md-3">
                          <h6 class="text-primary ">Price</h6>
                        </div>

                         <div class="col-md-2">
                          <h6 class="text-primary ">Quantity</h6>
                        </div>

                      </div> 

                   <?php 

                     $items = getCartItems();

                     $totalPrice = 0;

                   foreach ( $items  as $citem)

                     {

                      ?>

                     <div class="card product_data shadow-sm mb-2">
                        <div class="row align-items-center">
                        <div class="col-md-2">
                          <img src="uploads/<?= $citem['image']; ?>" class="w-100" alt="">
                        </div>

                        <div class="col-md-3">
                          <h6><?= $citem['name']; ?></h6>
                        </div>

                        <div class="col-md-3">
                          <h5><?= $citem['selling_price']; ?></h5>
                        </div> 

                         <div class="col-md-3">
                          <h5>x <?= $citem['prod_qty']; ?></h5>
                        </div> 

                      </div>
                     </div>

                      <?php 

                      $totalPrice +=$citem['selling_price'] *  $citem['prod_qty'];

                     }


                    ?>
                    <h5 ><b class="text-warning">Total Price</b> : <span class="float-end fw-bold"><?php echo $totalPrice; ?> tk</span></h5>

                    <div class="mt-5">  
                      <input type="hidden" name="payment_mode" value="COD">
                      <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Confirm and place order | COD</button>
                    </div>

                </div>
             </div>
          
        </form>
        
      </div>


  </div>
  
</div>
</div>


<?php include("includes/footer.php"); ?>