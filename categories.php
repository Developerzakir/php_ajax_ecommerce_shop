<?php

session_start();
 include("includes/header.php"); 
 include("functions/myFunctions.php"); 

 ?>

 <div class="py-3 bg-primary">
  <div class="container">
    <h6 class="text-white">Home / Categories</h6>
  </div>
 </div>

<div class="py-5">
  <div class="container mt-4">
  <div class="row">
    <div class="col-md-12">

      <h2>All Categoriess</h2>
      <hr>


          <div class="row">
            <?php 

          $categories = getAllActive('categories');

          if(mysqli_num_rows($categories) > 0){

            foreach($categories as $item){

              ?>

              <div class="col-md-3 mb-2">
                <a href="products.php?category=<?= $item['slug']; ?>">
                <div class="card shadow">
                  <div class="card-body">
                    <img src="uploads/<?= $item['image']; ?>" alt="Category Image" class="w-100" height="240px">
                      <h5 class="text-center"><?= $item['name']; ?></h5>  
                  </div>
                </div>
                </a>
              </div>


              <?php 
            }
          }else{
            echo "no data found";
          }

           ?>
          </div>

    </div>
  </div>
</div>
</div>



<?php include("includes/footer.php"); ?>