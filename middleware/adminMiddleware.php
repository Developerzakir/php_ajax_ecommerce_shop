<?php 

include "../functions/myFunctions.php";

if(isset($_SESSION['auth']))
{
	if($_SESSION['role_as'] !=1)
	{
		redirect("../index.php", "you are not authorized to access this page");
		
	}
}

else{
	redirect("../login.php", "login to continue");
}



 ?>