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
        <a href="my-orders.php" class="text-white">My Orders Page</a>
   </h6>

  </div>
 </div>

<div class="py-5">
  
<div class="container mt-4">
  <div class="card card-body shadow">
    <div class="row">
      <div class="col-md-12">
        
      </div>
    
    </div>
  </div>
  
</div>
</div>


<?php include("includes/footer.php"); ?>