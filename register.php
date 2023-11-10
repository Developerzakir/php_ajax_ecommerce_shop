<?php

 session_start();

 if(isset($_SESSION['auth'])){

	$_SESSION['message'] = "you are already logged in";

	header('Location: index.php');
	exit();
}



 include("includes/header.php"); ?>

<div class="container mt-4">
	<div class="row">
		<div class="col-md-12">

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

			<div class="card w-50 m-auto">
				<div class="card-header">
					<h1>Registration Form</h1>
				</div>

				<div class="card-body">
					<form action="functions/authcode.php" method="POST">

					  <div class="mb-3">
					    <label for="name" class="form-label">Name</label>
					    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
					  </div>

                      <div class="mb-3">
					    <label for="phone" class="form-label">Phone</label>
					    <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
					  </div>

					  <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Email address</label>
					    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
					  </div>

					  <div class="mb-3">
					    <label for="Password1" class="form-label">Password</label>
					    <input type="password" name="password" class="form-control" id="Password1">
					  </div>

					  <div class="mb-3">
					    <label for="Password2" class="form-label">Confirm Password</label>
					    <input type="password" name="con_password" class="form-control" id="Password2">
					  </div>
					
					  <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
				    </form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("includes/footer.php"); ?>