

<?php include "includes/header.php"; ?>
<?php include "../middleware/adminMiddleware.php"; ?>

<div class="container">
	<div class="row">
     <div class="col-md-12">
      <?php 

      if(isset($_GET['id']))
      {
        $id = $_GET['id'];
        $category = getById('categories', $id);

        if(mysqli_num_rows($category)>0)
        {

          $data = mysqli_fetch_array($category);
             ?>
            <div class="card">
             <div class="card-header">
               <h3>Edit Category</h3>
             </div>

             <div class="card-body">
             <form action="code.php" method="POST" enctype="multipart/form-data">
               <div class="row">

                <div class="col-md-6">
                  <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                  <label for="name"><b>Name:</b></label>
                  <input type="text" name="name" id="name" value="<?= $data['name'] ?>" placeholder="Enter category name" class="form-control">
                </div>

                <div class="col-md-6">
                   <label for="name"><b>Slug:</b></label>
                  <input type="text" name="slug" id="slug" value="<?= $data['slug'] ?>" placeholder="Enter category slug" class="form-control">
                </div>
                <div class="col-md-12">
                  <label for=""><b>Description</b></label>
                  <textarea name="description" placeholder="Enter description"  rows="3" class="form-control"><?= $data['description'] ?></textarea>
                </div>
                <div class="col-md-12">
                  <label for=""><b>Upload Image</b></label>
                  <input type="file" name="image" class="form-control">
                  <label for=""><b>Current Image</b></label>
                  <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                  <img width="110px" height="100px" src="../uploads/<?= $data['image'] ?>" alt="">
                </div>
                <div class="col-md-12">
                  <label for=""><b>Meta Title</b></label>
                  <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" placeholder="enter meta title" class="form-control">
                </div>

                 <div class="col-md-12">
                  <label for=""><b>Meta Description</b></label>
                  <textarea name="meta_description"  placeholder="enter meta description" class="form-control"  rows="3"><?= $data['meta_description'] ?></textarea>
                </div>

                <div class="col-md-12">
                  <label for=""><b>Meta Keywords</b></label>
                  <textarea name="meta_keywords"  placeholder="enter meta keywords" class="form-control"  rows="3"><?= $data['meta_keywords'] ?></textarea>
                </div>

                <div class="col-md-6 mt-2">
                  <label for=""><b>Status</b></label>
                  <input type="checkbox" name="status" <?= $data['status']  ? 'checked':'' ?>>
                </div>

                <div class="col-md-6 mt-2">
                  <label for=""><b>Popular</b></label>
                  <input type="checkbox" name="popular" <?= $data['popular']  ? 'checked':'' ?>>
                </div>
                <div class="col-md-12">
                  <button type="submit" name="update_category" class="btn btn-primary">Update</button>
                </div>
              </div>
               
             </form>
             </div>
            </div>

           <?php 

        }
        else{
          echo "category not found";
        }

       
      }else{
        echo "id is missing from url";
      }

       ?>
       
     </div> 
  </div>
</div>




<?php include "includes/footer.php"; ?>


