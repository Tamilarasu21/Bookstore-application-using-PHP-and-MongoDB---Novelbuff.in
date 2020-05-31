<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../assets/book.png" type="image/x-icon">
    <title>novelbuff - edit book details</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
include "admin_topnav.php";
session_start();
include "../dbconn.php"; 
$id=$_GET['id'];
$title=$_GET['title'];
$author=$_GET['author'];
$path=$_GET['path'];
$type=$_GET['type'];
$price=$_GET['price'];
$img=$_GET['file'];
?>
<center>

<div class="form-group mt-5 pt-3" style="width:400px;text-align:left">
	<form action="admin_updatebook.php" method="post">
	<h3 style="color:blue"><center>Edit Book</center></h3>
	<input type="hidden" name="id" value="<?php echo $id?>">
	<label for="title">Title</label><input type="text" name="title" id="title" class="form-control" value="<?php echo $title?>">
	<label for="author">Author</label><input type="text" name="author" id="author" class="form-control" value="<?php echo $author?>">
	<label for="path">Path</label><input type="url" name="path" id="path" class="form-control" value="<?php echo $path?>">
	<label for="type">Type</label>
	<select name="type" id="type" class="form-control">
		<option hidden selected disabled></option>
		<option value="academic" <?php if($type=="academic"){echo "selected";}?>>Academic</option>
		<option value="motivational" <?php if($type=="motivational"){echo "selected";}?>>motivational</option>
		<option value="autobiography" <?php if($type=="autobiography"){echo "selected";}?>>autobiography</option>
		<option value="novel" <?php if($type=="novel"){echo "selected";}?>>Novel</option>
	</select>
	<label for="path">Price</label><input type="text" inputmode="numeric" name="price" id="price" class="form-control" value="<?php echo $price?>">
	<label for="file">Image</label><input type="file" name="file" id="file" class="form-control" value="<?php echo $img; ?>"><br>&emsp;&emsp;&emsp;&emsp;<img src="images/<?php echo $img; ?>" width="150px" height="100px"><br><br>
	<input type="submit" name="update" value="update" class="btn btn-success pl-5 pr-5">
	</form>
	</div>
	<?php include "../footnav.php"; ?>	
	</center>
</body>
</html>
