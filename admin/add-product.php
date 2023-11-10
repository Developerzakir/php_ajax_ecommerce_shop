

<?php include "includes/header.php"; ?>
<?php include "../middleware/adminMiddleware.php"; ?>

<div class="container">
	<div class="row">
     <div class="col-md-12">
       <div class="card">
         <div class="card-header">
           <h3>Add Product</h3>
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
                     <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                  <?php 

                   }

              }else{
                echo "Category Not Found";
              }

              

               ?>
              
            </select>
            </div>

             <div class="col-md-6">
              <label for="name"><b>Name:</b></label>
              <input type="text" name="name" id="name" placeholder="Enter category name" class="form-control">
            </div>

            <div class="col-md-6">
               <label for="name"><b>Slug:</b></label>
              <input type="text" name="slug" id="slug" placeholder="Enter category slug" class="form-control">
            </div>

            <div class="col-md-12">
              <label for=""><b>Small Description</b></label>
              <textarea name="small_description" placeholder="Enter description"  rows="3" class="form-control"></textarea>
            </div>

            <div class="col-md-12">
              <label for=""><b>Description</b></label>
              <textarea name="description" placeholder="Enter description"  rows="3" class="form-control"></textarea>
            </div>

            <div class="col-md-6">
              <label for="name"><b>Original Price:</b></label>
              <input type="text" name="original_price" id="name" placeholder="original price" class="form-control">
            </div>

            <div class="col-md-6">
              <label for="name"><b>Selling Price:</b></label>
              <input type="text" name="selling_price" id="name" placeholder="selling price" class="form-control">
            </div>

             
            <div class="col-md-12">
              <label for=""><b>Upload Image</b></label>
              <input type="file" name="image" class="form-control">
            </div>

            <div class="row">

              <div class="col-md-6">
              <label for="qty"><b>Quantity:</b></label>
              <input type="number" name="qty" id="qty" placeholder="quantity" class="form-control">
            </div>

               <div class="col-md-3 mt-2">
                <label for=""><b>Status</b></label>
                <input type="checkbox" name="status">
              </div>

                <div class="col-md-3 mt-2">
                  <label for=""><b>Trending</b></label>
                  <input type="checkbox" name="trending">
                </div>
            </div>
            
            <div class="col-md-12">
              <label for=""><b>Meta Title</b></label>
              <input type="text" name="meta_title" placeholder="enter meta title" class="form-control">
            </div>

             <div class="col-md-12">
              <label for=""><b>Meta Description</b></label>
              <textarea name="meta_description" placeholder="enter meta description" class="form-control"  rows="3"></textarea>
            </div>

            <div class="col-md-12">
              <label for=""><b>Meta Keywords</b></label>
              <textarea name="meta_keywords" placeholder="enter meta keywords" class="form-control"  rows="3"></textarea>
            </div>

           
            <div class="col-md-12">
              <button type="submit" name="add_product" class="btn btn-primary">Submit</button>
            </div>
          </div>
           
         </form>
         </div>
       </div>
     </div> 
  </div>
</div>




<?php include "includes/footer.php"; ?>


