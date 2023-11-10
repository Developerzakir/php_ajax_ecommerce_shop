<?php

session_start(); 
 include("includes/header.php");


  ?>


<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">

      <h1 class="text-center">Welcome to our Home Page</h1>

      <?php  if(isset($_SESSION['message']))

      {

        ?>

      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey </strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <?php 
       unset($_SESSION['message']);

        }

        ?>

    </div>
  </div>
</div>


<?php include("includes/footer.php"); ?>