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
       <a href="cart.php" class="text-white">Cart</a>

   </h6>

  </div>
 </div>

<div class="py-5">
  
<div class="container mt-4">
  <div class="card card-body shadow">
    <div class="row">
    <div class="col-md-12">

       <div class="row align-items-center">
            <div class="col-md-5">
              <h4 class="text-primary ">Product</h4>
            </div>

            <div class="col-md-3">
              <h4 class="text-primary ">Price</h4>
            </div>

              <div class="col-md-2">
              <h4 class="text-primary ">Quantity</h4>
            </div>


            <div class="col-md-2">
                <h4 class="text-primary ">Remove</h4>
            </div>

          

          </div>

          <div id="mycart">

       <?php 

         $items = getCartItems();

       

       foreach ( $items  as $citem)

         {

          ?>

         <div class="card product_data shadow-sm mb-2">
            <div class="row align-items-center">
            <div class="col-md-2">
              <img src="uploads/<?= $citem['image']; ?>" class="w-100" alt="">
            </div>

            <div class="col-md-3">
              <h5><?= $citem['name']; ?></h5>
            </div>

            <div class="col-md-3">
              <h5>Tk &nbsp; <?= $citem['selling_price']; ?></h5>
              
            </div>

            <div class="col-md-2">
              <input type="hidden" class="prodId" value="<?= $citem['prod_id']; ?>">
                <div class="input-group mb-3" style="width:130px;">
                  <button class="input-group-text decrement-btn updateQty">-</button>
                  <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty']; ?>" disabled>
                  <button class="input-group-text increment-btn updateQty">+</button>
                </div>
            </div>

            <div class="col-md-2">
              <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid']; ?>">
                <i class="fa fa-trash me-2"></i>Remove</button>
            </div>

          </div>
         </div>

          <?php 

         }


        ?>

        </div>

        <div class="float-end">
          <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
        </div>

    </div>
  </div>
  </div>
  
</div>
</div>


<?php include("includes/footer.php"); ?>