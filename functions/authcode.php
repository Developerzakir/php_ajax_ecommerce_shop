

<?php 

session_start();

include "../config/connect.php";


if(isset($_POST['register_btn'])){
	$name  = mysqli_real_escape_string($conn, $_POST['name']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$con_password = mysqli_real_escape_string($conn, $_POST['con_password']);

	//chech if email is already exists

	$check_email_query = "SELECT email FROM `users` where email='$email' ";
	$email_query_run  = mysqli_query($conn, $check_email_query);

	if(mysqli_num_rows($email_query_run) > 0){

		$_SESSION['message'] = "Email is already exists!";
		header('Location: ../register.php');
	}
	else{
			if($password == $con_password){

				$insert_data = "INSERT INTO `users` (name,phone,email,password)
				 VALUES('$name', '$phone', '$email', '$password') ";

				 $query = mysqli_query($conn,$insert_data);

				 if($query){
				 	$_SESSION['message'] = "Registration successfully!";
				 	header('Location: ../login.php');
				 }
				 else{
				 	$_SESSION['message'] = "something went wrong!";
				 	header('Location: ../register.php');

				 }


			}

			else{
				$_SESSION['message'] = "Password don't match!";
				header('Location: ../register.php');

			}
	}



}

else if(isset($_POST['login_btn']))
{
	$email    = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$login_query = "SELECT * FROM `users` where email='$email' AND password='$password' ";

	$result = mysqli_query($conn, $login_query);


	if(mysqli_num_rows($result) > 0){
		$_SESSION['auth'] = true;

		$userdata  = mysqli_fetch_array($result);

		$userid    = $userdata['id'];
		$username  = $userdata['name']; 
		$useremail = $userdata['email']; 
		$role_as   = $userdata['role_as']; 

		$_SESSION['auth_user'] = [

			'user_id'=>$userid,

			'name'  =>$username,
			'email' =>$useremail,

		];

		$_SESSION['role_as'] = $role_as;

		if($role_as == 1){

			$_SESSION['message'] = "welcome to dashboard";
		    header('Location: ../admin/index.php');
		   

		}
		else{
			$_SESSION['message'] = "Logged In Successfully";
		    header('Location: ../index.php');
		}

		

	}

	else{

		$_SESSION['message'] = "Invalid Credencial!";
		header('Location: ../login.php');

	}
	

}








 ?>