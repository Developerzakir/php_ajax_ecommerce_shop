

<?php include "includes/header.php"; ?>
<?php include "../middleware/adminMiddleware.php"; ?>

<div class="container">
	<div class="row">
     <div class="col-md-12">

        <?php 

        if(isset($_GET['id'])){

          $id = $_GET['id'];
          $product = getById('products', $id);

          if(mysqli_num_rows($product) > 0){
            $data = mysqli_fetch_array($product);
              ?>
               <div class="card">
                 <div class="card-header">
                   <h3>Edit Product</h3>
                 </div>

                 <div class="card-body">
                 <form action="code.php" method="POST" enctype="multipart/form-data">
                   <div class="row">

                    <div class="col-md-6">
                      <label for="name"><b>Select Category</b></label>
                     <select name="category_id" class="form-select">
                      <option selected>Select Category</option>

                      <?php 

                      $categories = getAll("categories");

                      if(mysqli_num_rows( $categories) > 0){

                         foreach($categories as $item){
                           ?>
                             <option value="<?= $item['id'] ?>" <?= $data['category_id']==$item['id'] ?'selected':'' ?>><?= $item['name'] ?></option>
                          <?php 

                           }

                      }else{
                        echo "Category Not Found";
                      }

                      

                       ?>
                      
                    </select>
                    </div>

                    <input type="hidden" name="product_id" value="<?= $data['id']?>">

                     <div class="col-md-6">
                      <label for="name"><b>Name:</b></label>
                      <input type="text" name="name" value="<?= $data['name']?>" id="name" placeholder="Enter category name" class="form-control">
                    </div>

                    <div class="col-md-6">
                       <label for="name"><b>Slug:</b></label>
                      <input type="text" name="slug" value="<?= $data['slug']?>" id="slug" placeholder="Enter category slug" class="form-control">
                    </div>

                    <div class="col-md-12">
                      <label for=""><b>Small Description</b></label>
                      <textarea name="small_description" placeholder="Enter description"  rows="3" class="form-control">
                        <?= $data['small_description']?>   
                        </textarea>
                    </div>

                    <div class="col-md-12">
                      <label for=""><b>Description</b></label>
                      <textarea name="description" placeholder="Enter description"  rows="3" class="form-control">
                        <?= $data['description']?>
                      </textarea>
                    </div>

                    <div class="col-md-6">
                      <label for="name"><b>Original Price:</b></label>
                      <input type="text" name="original_price" id="name" value="<?= $data['original_price']?>" placeholder="original price" class="form-control">
                    </div>

                    <div class="col-md-6">
                      <label for="name"><b>Selling Price:</b></label>
                      <input type="text" name="selling_price" value="<?= $data['selling_price']?>" id="name" placeholder="selling price" class="form-control">
                    </div>

                     
                    <div class="col-md-12">
                      <label for=""><b>Upload Image</b></label>
                      <input type="hidden" name="old_image" value="<?= $data['image'];?>">
                      
                      <input type="file"   name="image" class="form-control">
                      <label for=""><b>Current Image</b></label><br>
                      <img  src="../uploads/<?= $data['image'];?>" width="80px" height="80px" alt="">
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                      <label for="qty"><b>Quantity:</b></label>
                      <input type="number" name="qty" value="<?= $data['qty']?>" id="qty" placeholder="quantity" class="form-control">
                    </div>

                       <div class="col-md-3 mt-2">
                        <label for=""><b>Status</b></label>
                        <input type="checkbox" name="status" <?= $data['status'] ? "checked":""?> >
                      </div>

                        <div class="col-md-3 mt-2">
                          <label for=""><b>Trending</b></label>
                          <input type="checkbox" name="trending" <?= $data['trending'] ? "checked":""?>>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                      <label for=""><b>Meta Title</b></label>
                      <input type="text" name="meta_title" value="<?= $data['meta_title']?>"  placeholder="enter meta title" class="form-control">
                    </div>

                     <div class="col-md-12">
                      <label for=""><b>Meta Description</b></label>
                      <textarea name="meta_description" placeholder="enter meta description" class="form-control"  rows="3">
                        <?= $data['meta_description']?>
                      </textarea>
                    </div>

                    <div class="col-md-12">
                      <label for=""><b>Meta Keywords</b></label>
                      <textarea name="meta_keywords" placeholder="enter meta keywords" class="form-control"  rows="3">
                        <?= $data['meta_keywords']?>
                      </textarea>
                    </div>

                   
                    <div class="col-md-12">
                      <button type="submit" name="update_product" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                   
                 </form>
                 </div>
               </div>
             <?php 

          }

           else{
             echo "Product not found to given id";
            }
        
          }
          else{
             echo "id missing from url";
          }
        ?>

     </div> 
  </div>
</div>




<?php include "includes/footer.php"; ?>


