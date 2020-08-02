<!DOCTYPE html>
<html>
<head>
	<title>novelbuff - Downloads</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
  	<meta name="viewport" content="width-device-width, initial scale=1.0">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
	<body>
	<?php 
	include "topnav.php";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	?>
	<center>
	<div class="ml-4">
	<?php
	include "dbconn.php";

	$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;

	$limit=5;

	$rows=$db->book->find();

	$skip  = ($page - 1) * $limit;

	$next  = ($page + 1);
	$prev  = ($page - 1);
	$total=$db->book->countDocuments(); #to count number of documents in the collection

	$num_of_pages=ceil($total/$limit);
		if($page < 1)
		{
			header("location:books.php?page=1");
		}
		
		$filter=array('limit'=>$limit,'skip'=>$skip);
		$final = $db->book->find(array(),$filter);
		echo "<h3 class='text-primary'>BOOKS</h3>";
		echo "<table class='table'>";
	foreach($final as $books)
	{
		echo "<form action='addToCart.php' method='post'>";
		echo "<input type='hidden' name='id' value='".$books->_id."'>";
		echo "<tr><td style='width:200px'><img src='admin/images/".$books->fileName."' width='120px' height='120px'></td>";
		echo "<td><p><b style='color:#038ead'>Title : </b>".$books->title ."</p>";
		echo "<p><b style='color:#038ead'>Author : </b>".$books->author ."</p>";
		echo "<p><b style='color:#038ead'>Type : </b>".ucfirst($books->type) ."</p>";
		echo "<p><b style='color:#038ead'>Price : </b>&#8377;.".$books->price ."</p>";
		echo "<input type='hidden' name='fileName' value='".$books->fileName."'>";
		echo "<input type='hidden' name='title' value='".$books->title ."'>";
		echo "<input type='hidden' name='author' value='".$books->author ."'>";
		echo "<input type='hidden' name='type' value='".$books->type ."'>";
		echo "<input type='hidden' name='price' value='".$books->price ."'>";
		echo "<input type='hidden' name='path' value='".$books->path ."'>";
		echo "<button type='submit' class='btn btn-success' name='add'><i class='fa fa-shopping-cart'></i>&nbsp;Add to cart</button></td></tr>";
		echo "</form>";
	}
	echo "</table>";
	#pagination script
    if($page != 1){
        echo "<a href='?page=" . $prev . "' class='btn btn-secondary btn-sm'>&laquo;&emsp;Prev</a>&emsp;";      
    } 

    if($page < $num_of_pages) {
        echo "<a href='?page=" . $next . "' class='btn btn-secondary btn-sm'>Next&emsp;&raquo;</a>";
    }
    //echo "<br>";
    // for ($page=1; $page <=$num_of_pages ; $page++) 
    // { 
    // echo "<a href='?page=".$page."'>".$page."</a>&emsp;";
    // }
	
?>
</center>
<br>
	<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php 
	include "footnav.php";
?>