<!DOCTYPE html>
<html>
<head>
	<title>novelbuff - contact</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
	<meta name="viewport" content="width-device-width, initial scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php include "topnav.php" ?>
		<div class="row justify-content-center">
				<div class="col-3 md-5 mt-5 pt-2">
				<?php
					//session_start();
					include "dbconn.php";
					if(isset($_POST['submit']))
					{
						$qname =$_POST["qname"];
						$qmail =$_POST["qmail"];
						$qcity =$_POST["qcity"];
						$query =$_POST["query"];

						$contact = array('_id' =>  new MongoDB\BSON\ObjectId,
										'qname' => $qname,
										'qmail' => $qmail,
										'qcity'=>$qcity,
										'query' => $query
										);
										$error=' ';
										foreach ($contact as $key => $value) 
										{
											if(empty($value))
											{
												$error.=$key." is empty<br>";
											}
										}
										if($error)
										{
											echo "<p style='color:red;text-align:center'><b>".$error."</b></p>";
										}
										else
										{
										$result=$db->contact->insertOne($contact);		#query execution
										header("location:contsuccess.php");			#redirecting to reqack.php
										}
									}
 				?>	
					<form method="POST" action="" class='form-group'>
						<h1 class="text-center">CONTACT US</h3>
							<label>Name</label><input type="text" name="qname" class="form-control" placeholder="Enter your name">
							<label>Email</label><input type="email" name="qmail" class="form-control" placeholder="Enter your email">
							<label>City</label><input type="text" name="qcity" class="form-control" placeholder="Enter your city">
							<label>Query</label><textarea name="query" placeholder="Place your query here" class="form-control" ></textarea><br>
							<center><input type="submit" name=submit value="submit" class="btn btn-primary"></center>
					</form>
				</div>
		</div>
<?php include "footnav.php"; ?>
<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
