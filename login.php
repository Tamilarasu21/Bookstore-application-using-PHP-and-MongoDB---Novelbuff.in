<!DOCTYPE html>
<html>
<head>
	<title>novelbuff - login</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
	<meta name="viewport" content="width-device-width, initial scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<center>
	<?php include "topnav2.php"; ?>
	<div class="mt-5 pt-5">
	<?php
session_start();	#start session

include "dbconn.php";	#connect to database

if(isset($_SESSION['username']))
{
	header("Location:lindex.php");
}

if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$data=array(
				'username'=>$username,
				'password'=>$password
				);

	$errorMessage = '';

	foreach ($data as $key => $value) 
	{
		if (empty($value)) 
		{
			$errorMessage .= $key . ' field is empty<br />';
		}
	}
	
	if ($errorMessage) 
	{
		echo "<b style='color:red'><center>".$errorMessage."</center></b>";	
	}
	else
	{
		$result=$db->user->findOne(array('username'=> $username, 'password'=> $password));	#query execution

		#admin login validate
		if($username=='admin@novelbuff.in' && $password=='admin')
		{
			$_SESSION['username']=$username;
			header("location:admin/admin_lindex.php");
		}
		#user-login validate
		if(isset($result))
		{
			$_SESSION['username']=$username;
			header('Location:lindex.php');   #redirecting to lindex.php	
		}
		else
		{
			echo "<b style='color:red'><center>username and password is wrong</center></b>";	
		}
	}
}
?>
		<form method="POST" action="login.php">
			<div class="form-group" style="width:400px;text-align:left">
				<h3>LOGIN</h3>
				<label style="">username :</label><input type="text" name="username" placeholder="Enter Username" class="form-control mr-5 pr-5"><br>
				<label>password :</label><input type="password" name="password" placeholder="Enter Password" class="form-control"></span><br>
				<input type="submit" name="submit" value="login	" class="btn btn-primary "><br><br>
				<label>no account ? </label><a href="register.php"> Register here!</a>
			</div>
		</form>
	</div>
</center>
<!--######################################### Bootstrap ################################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

