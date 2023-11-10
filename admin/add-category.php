

<?php include "includes/header.php"; ?>
<?php include "../middleware/adminMiddleware.php"; ?>

<div class="container">
	<div class="row">
     <div class="col-md-12">
       <div class="card">
         <div class="card-header">
           <h3>Add Category</h3>
         </div>

         <div class="card-body">
         <form action="code.php" method="POST" enctype="multipart/form-data">
           <div class="row">

            <div class="col-md-6">
              <label for="name"><b>Name:</b></label>
              <input type="text" name="name" id="name" placeholder="Enter category name" class="form-control">
            </div>

            <div class="col-md-6">
               <label for="name"><b>Slug:</b></label>
              <input type="text" name="slug" id="slug" placeholder="Enter category slug" class="form-control">
            </div>
            <div class="col-md-12">
              <label for=""><b>Description</b></label>
              <textarea name="description" placeholder="Enter description"  rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-12">
              <label for=""><b>Upload Image</b></label>
              <input type="file" name="image" class="form-control">
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

            <div class="col-md-6 mt-2">
              <label for=""><b>Status</b></label>
              <input type="checkbox" name="status">
            </div>

            <div class="col-md-6 mt-2">
              <label for=""><b>Popular</b></label>
              <input type="checkbox" name="popular">
            </div>
            <div class="col-md-12">
              <button type="submit" name="add_category" class="btn btn-primary">Submit</button>
            </div>
          </div>
           
         </form>
         </div>
       </div>
     </div> 
  </div>
</div>




<?php include "includes/footer.php"; ?>


