<!DOCTYPE html>
<html>
<head>
	<title>novelbuff - register</title>
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

session_start();	 #session start
include "dbconn.php";	 #database connection

if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$data=['_id' =>  new MongoDB\BSON\ObjectId,
		'username'=>$username,
		'password'=>$password
		];

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
		echo "<span style='color:red'><center>".$errorMessage."</center></span>";	
	}
	else
	{
		$db->user->insertOne($data); 	#query execution
		header("Location:login.php"); 	#redirecting to login.php
	}	
}
?>
		<form method="POST" action="register.php">
		<div class="form-group" style="width:400px;text-align:left">
				<h3>REGISTER</h3>
				<label>username :</label><input type="text" name="username" placeholder="Enter Username" class="form-control"><br>
				<label>password :</label><input type="password" name="password" placeholder="Enter Password" class="form-control"><br>
				<input type="submit" name="submit" class="btn btn-success"><br><br>
				<label>Already have an account ? </label><a href="login.php"> Login here!</a>
			</div>
		</form>
	</div>
</center>
<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
