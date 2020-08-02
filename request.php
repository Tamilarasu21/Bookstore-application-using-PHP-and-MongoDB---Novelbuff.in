
<!DOCTYPE html>
<html>
<head>
	<title>novelbuff - Request books</title>
	<link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php include "topnav.php";?>
	<div class="row justify-content-center">
		<div class="col-3 md-6 mt-5 pt-2">
		<?php
			include "dbconn.php";	#database connection
			if(isset($_POST['submit']))
			{
				$aname =$_POST["aname"];
				$title =$_POST["title"];
				$edition =$_POST["edition"];
				$remail =$_POST["remail"];

				$req = array('_id' => new MongoDB\BSON\ObjectId,
							'aname' => $aname,
							'title' => $title,
							'edition'=>$edition,
							'remail' => $remail
							);
				
				$error='';
				foreach ($req as $key => $value) 
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
					$result=$db->requests->insertOne($req);	#query execution
					header("location:reqack.php");	#redirecting to reqack.php
				}
			}
		?>
			<form method="POST" action="">
				<div class="form-group">
					<center><h1 class="text-center">REQUEST BOOKS</h1></center>
					<label>Author name</label><input type="text" name="aname" class="form-control" placeholder="Author name">
					<label>Book title</label><input type="text" name="title" class="form-control" placeholder="Book title">
					<label>Edition</label><input type="text" name="edition" class="form-control" placeholder="Edition of the book">
					<label>Your Email</label><input type="email" name="remail" class="form-control" placeholder="email to notify"><br>
					<center><input type="submit" name="submit" value="Request" class="btn btn-primary"></center>
				</div>
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
