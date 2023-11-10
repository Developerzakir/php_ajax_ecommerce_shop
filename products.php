<?php

session_start();
 include("includes/header.php"); 
 include("functions/myFunctions.php"); 


 if(isset($_GET['category']))
 {


 $category_slug      = $_GET['category'];
 $category_data      = getSlugActive("categories",$category_slug);
 $category           = mysqli_fetch_array($category_data);

 if($category){
  $cid                = $category['id'];



 ?>

 <div class="py-3 bg-primary">
  <div class="container">
    <h6 class="text-white">
      <a class="text-white" href="index.php">Home</a> / 
      <a class="text-white" href="categories.php">Categories</a>  /
       <?= $category['name'];  ?></h6>
  </div> 
 </div>

<div class="py-5">
  <div class="container mt-4">
  <div class="row">
    <div class="col-md-12">

      <h2><?= $category['name'];  ?></h2>
      <hr>


          <div class="row">
            <?php 

          $products = getProductByCategory($cid);

          if(mysqli_num_rows($products) > 0){

            foreach($products as $item){

              ?>

              <div class="col-md-3 mb-2">
                <a href="product-view.php?product=<?= $item['slug']; ?>">
                <div class="card shadow">
                  <div class="card-body">
                    <img src="uploads/<?= $item['image']; ?>" alt="Product Name" class="w-100" height="240px">
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


<?php

 }
 else{
  echo "something went wrong!";

}

 

}

else{
  echo "something went wrong!";

}

 include("includes/footer.php");  ?>


