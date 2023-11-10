

<?php include "includes/header.php"; ?>
<?php include "../middleware/adminMiddleware.php"; ?>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Products
        </div>
        <div class="card-body" id="products_table">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php

              $products = getAll('products');

              if(mysqli_num_rows($products) > 0){

                foreach ($products as $item) {

                  ?>

                   <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td>
                      <img width="100px" height="100px" src="../uploads/<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
                    </td>
                    <td><?= $item['status'] == '0' ? 'Visible':'Hidden' ?></td>
                    <td>
                      <a href="edit-product.php?id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                      
                     
                       
                        <button type="button" class="btn btn-danger btn-sm delete_product_btn" value="<?= $item['id'] ?>">Delete</button>
                      
                    </td>
                  </tr>

                  <?php 
                  
                }
              }

              else{
                echo "no records found";
              }

               ?>
             
            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include "includes/footer.php"; ?>


