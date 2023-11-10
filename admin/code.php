

<?php 

// session_start();
include "../config/connect.php";
include "../functions/myFunctions.php";


if(isset($_POST['add_category'])){

		$name             = $_POST['name'];
		$slug             = $_POST['slug'];
		$description      = $_POST['description'];
		$meta_title       = $_POST['meta_title'];
		$meta_description = $_POST['meta_description'];
		$meta_keywords    = $_POST['meta_keywords'];
		$status           = isset($_POST['status']) ? '1':'0';
		$popular          = isset($_POST['popular']) ? '1':'0';

		$image = $_FILES['image']['name'];

		$path = "../uploads";

		$image_ext = pathinfo($image, PATHINFO_EXTENSION);
		$filename = time().'.'.$image_ext;


		$cat_query = "INSERT INTO `categories` (name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image)VALUES('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$popular', '$filename') ";

		$mysql_query = mysqli_query($conn,$cat_query);


		if($mysql_query){

			move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
			redirect('add-category.php', 'category added successfully');

		}

		else{
			redirect('add-category.php', 'somwthing went wrong!');
		}

}else if(isset($_POST['update_category'])){

		$category_id = $_POST['category_id'];

		$name             = $_POST['name'];
		$slug             = $_POST['slug'];
		$description      = $_POST['description'];
		$meta_title       = $_POST['meta_title'];
		$meta_description = $_POST['meta_description'];
		$meta_keywords    = $_POST['meta_keywords'];
		$status           = isset($_POST['status']) ? '1':'0';
		$popular          = isset($_POST['popular']) ? '1':'0';

		$new_image = $_FILES['image']['name'];
		$old_image = $_POST['old_image'];

		if($new_image !=""){

			$image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
		    $update_filename = time().'.'.$image_ext;

			// $update_filename = $new_image;
		}else{
			$update_filename = $old_image;
		}

		$path = "../uploads";

		$update_query = "UPDATE categories SET name='$name', slug='$slug', description='$description',
		meta_title='$meta_title', meta_description='$meta_description',  meta_keywords='$meta_keywords',
		 status='$status', popular='$popular', image='$update_filename' WHERE id='$category_id'  ";



		 $update_query_result = mysqli_query($conn,$update_query);

		 if($update_query_result){

		 	if($_FILES['image']['name'] !=""){
		 		move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);

		 		if(file_exists('../uploads/'.$old_image)){
		 			unlink('../uploads/'.$old_image);
		 		}   
		 	}
		 	redirect("edit-category.php?id=$category_id", "category Updated successfully");


		 }else{
		 	redirect("edit-category.php?id=$category_id", "something error happening!");
		 }


}else if(isset($_POST['delete_category_btn'])){
	$category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

	$category_query = "SELECT * FROM categories WHERE id='$category_id' ";
	$category_query_run = mysqli_query($conn,$category_query);
	$category_data = mysqli_fetch_array($category_query_run);
	$image = $category_data['image'];


	$delete_query = "DELETE FROM categories WHERE id='$category_id' ";
	$result = mysqli_query($conn, $delete_query);

	if($result){
		
		if(file_exists('../uploads/'.$image)){
 			unlink('../uploads/'.$image);
 		} 
 		// redirect('category.php', 'Category Deleted Successfully');
 		echo 200;
	}else{
		echo 500;
		// redirect('category.php', 'something went wrong!plz try again');
	}
}

else if(isset($_POST['add_product'])){

	    $category_id         = $_POST['category_id'];
	    $name                = $_POST['name'];
		$slug                = $_POST['slug'];
		$small_description   = $_POST['small_description'];
		$description         = $_POST['description'];
		$original_price      = $_POST['original_price'];
		$selling_price       = $_POST['selling_price'];
		$qty                 = $_POST['qty'];
		$meta_title          = $_POST['meta_title'];
		$meta_description    = $_POST['meta_description'];
		$meta_keywords       = $_POST['meta_keywords'];
		$status              = isset($_POST['status']) ? '1':'0';
		$trending            = isset($_POST['trending']) ? '1':'0';

		$image = $_FILES['image']['name'];

		$path = "../uploads";

		$image_ext = pathinfo($image, PATHINFO_EXTENSION);
		$filename = time().'.'.$image_ext;

		$product_query = "INSERT INTO products(category_id,name,slug,small_description,description,original_price,selling_price,qty,meta_title,meta_description,meta_keywords,status,trending,image) 
		VALUES('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price',
			'$qty','$meta_title','$meta_description','$meta_keywords','$status','$trending','$filename')";

		$product_query_run = mysqli_query($conn,$product_query);

		if($product_query_run){

			move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
			redirect('add-product.php', 'Product added successfully');

		}

		else{
			redirect('add-product.php', 'something went wrong!');
		}

}else if(isset($_POST['update_product'])){

		$product_id          = $_POST['product_id'];
	    $category_id         = $_POST['category_id'];
	    $name                = $_POST['name'];
		$slug                = $_POST['slug'];
		$small_description   = $_POST['small_description'];
		$description         = $_POST['description'];
		$original_price      = $_POST['original_price'];
		$selling_price       = $_POST['selling_price'];
		$qty                 = $_POST['qty'];
		$meta_title          = $_POST['meta_title'];
		$meta_description    = $_POST['meta_description'];
		$meta_keywords       = $_POST['meta_keywords'];
		$status              = isset($_POST['status']) ? '1':'0';
		$trending            = isset($_POST['trending']) ? '1':'0';


		$path = "../uploads";

		$new_image = $_FILES['image']['name'];
		$old_image = $_POST['old_image'];

		if($new_image !=""){

		    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
		    $update_filename = time().'.'.$image_ext;
		    move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
		    if(file_exists('../uploads/'.$old_image)){
		        unlink('../uploads/'.$old_image);
		    }
		}
		else{
		    $update_filename = $old_image;
		}

   $update_product_query = "UPDATE products SET category_id='$category_id', name='$name', slug='$slug',
  small_description='$small_description', description='$description', original_price='$original_price',
  selling_price='$selling_price', qty='$qty', meta_title='$meta_title', meta_description='$meta_description',
  meta_keywords='$meta_keywords', status='$status', trending='$trending', image='$update_filename' WHERE id='$product_id' ";

		// if($new_image !=""){

		// 	$image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
		//     $update_filename = time().'.'.$image_ext;

			
		// }else{
		// 	$update_filename = $old_image;
		// }

		// $update_product_query = "UPDATE products SET category_id='$category_id', name='$name', slug='$slug',
		//   small_description='$small_description', description='$description', original_price='$original_price',
		//   selling_price='$selling_price', qty='$qty', meta_title='$meta_title', meta_description='$meta_description',
		//   meta_keywords='$meta_keywords', status='$status', trending='$trending', image='$update_filename' WHERE id='$product_id' ";

		$update_product_run = mysqli_query($conn, $update_product_query);

	   if($update_product_run){

		 	if($_FILES['image']['name'] !=""){
		 		move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);

		 		if(file_exists('../uploads/'.$old_image)){
		 			unlink('../uploads/'.$old_image);
		 		}   
		 	}
		 	redirect("edit-product.php?id=$product_id", "Product Updated successfully");


		 }

		 else{
		 	redirect("edit-product.php?id=$product_id", "something error happening!");
		 }
}else if(isset($_POST['delete_product_btn'])){

		$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);

		$product_query = "SELECT * FROM products WHERE id='$product_id' ";
		$product_query_run = mysqli_query($conn,$product_query);
		$product_data = mysqli_fetch_array($product_query_run);
		$image = $product_data['image'];


		$delete_query = "DELETE FROM products WHERE id='$product_id' ";
		$result = mysqli_query($conn, $delete_query);

		if($result){
			
			if(file_exists('../uploads/'.$image)){
	 			unlink('../uploads/'.$image);
	 		} 
	 		// redirect('products.php', 'Product Deleted Successfully');
	 		echo 200;
		}else{
			// redirect('products.php', 'something went wrong!plz try again');
			echo 500;
		}

}

else{
	header('Location: ../index.php');
}






 ?>