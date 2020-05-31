<?php 
include "../dbconn.php";
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['add'])) {
	$book 		= array('_id' =>  new MongoDB\BSON\ObjectId,
						'title' 		=> $_POST['title'],
						'author' 		=> $_POST['author'],
						'path' 			=> $_POST['path'],
						'type' 			=>$_POST['type'],
						'price'			=>$_POST['price'],
						'createdOn' 	=> date("d-m-Y h:i:s A")
						);

	if($_FILES['file']) 
	{
		if(move_uploaded_file($_FILES['file']['tmp_name'], 'images/'.$_FILES['file']['name'])) 
		{
			$book['fileName'] = $_FILES['file']['name'];
		} 
		else 
		{
			echo "Failed to upload file.";
		}
	}
	$error='';
	foreach ($book as $key => $value) 
	{
		if(empty($value))
		{
			$error.=$key."is empty<br>";
		}
	}
	if($error)
	{
		echo "<p style='color:red'>".$error."</p>";
	}
	try
	{
	$result = $db->book->insertOne($book);
	header("location:admin_downloads.php");
	}
	catch(Exception $e)
	{
		die("error:".$e);
	}
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="../assets/book.png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>novelbuff - Add Book</title>
</head>
<body><center>
<?php include "admin_topnav.php"; ?>
<div class="form-group mt-5 pt-3" style="width:400px;text-align:left">
	<form action="" method="post" enctype="multipart/form-data">
	<h3 style="color:blue"><center>Add Book</center></h3>
	<label for="title">Title</label><input type="text" name="title" id="title" class="form-control">
	<label for="author">Author</label><input type="text" name="author" id="author" class="form-control">
	<label for="path">Path</label><input type="url" name="path" id="path" class="form-control">
	<label for="type">Type</label>
	<select name="type" id="type" class="form-control">
		<option hidden selected disabled></option>
		<option value="academic">Academic</option>
		<option value="motivational">Motivational</option>
		<option value="autobiography">Autobiography</option>
		<option value="novel">Novel</option>
	</select>
	<label for="price">Price</label><input name="price" id="price" type="text" inputmode="numeric" min="1" max="5" class="form-control">
	<label for="file">Image</label><input type="file" name="file" id="file" class="form-control"><br>
	<input type="submit" name="add" value="add" class="btn btn-success pl-5 pr-5">
	</form>
	</div>
	<?php include "../footnav.php"; ?>	
	</center>
<!--######################################### Bootstrap ################################################-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
