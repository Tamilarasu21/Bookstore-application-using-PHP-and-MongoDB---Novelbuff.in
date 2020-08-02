<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../assets/book.png" type="image/x-icon">
	<title>novelbuff - Downloads</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php include "admin_search_books.php";?>
<div class="text-center">
<?php
session_start();
include "../dbconn.php";
include 'admin_topnav.php'; 

$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$limit=5;

$skip  = ($page - 1) * $limit;

$next  = ($page + 1);
$prev  = ($page - 1);
$total=$db->book->countDocuments(); #to count number of documents in the collection

$num_of_pages=ceil($total/$limit);
    if($page < 1)
    {
        header("location:admin_downloads.php?page=1");
    }
    
    $filter=array('limit'=>$limit,'skip'=>$skip);
	$result = $db->book->find(array(),$filter);  #query for limit and skip douments
	
echo "<h1 class='text-center text-info'>Books</h1>";
echo "<table class='table'>";
foreach($result as $books)
{
	echo "<tr><td style='width:200px'><img src='images/".$books->fileName."' width='150px' height='150px'></td>";
	echo "<td><p><b class='text-info'>Title : </b>".$books->title ."</p>";
	echo "<p><b class='text-info'>Author : </b>".$books->author ."</p>";
	echo "<p><b class='text-info'>Type : </b>".ucfirst($books->type) ."</p>";
	echo "<p><b class='text-info'>Price : </b>&#8377;.".$books->price ."</p>";
	echo "<p><a href='admin_editbook.php?id=".$books->_id.
	"&title=".$books->title.
	"&author=".$books->author.
	"&path=".$books->path.
	"&type=".$books->type.
	"&price=".$books->price.
	"&file=".$books->fileName."' class='btn btn-warning'><i class='fa fa-eraser'></i>&nbsp;Edit Book</a>&emsp;";
	echo "<a href='admin_deletebook.php?id=".$books->_id."' class='btn btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete Book</a>&emsp;";
	echo "<p>".$books->createdOn."</p></td></tr>";
}
echo "</table>";
if($page != 1){
	echo "<a href='?page=" . $prev . "' class='btn btn-secondary btn-sm'>&laquo;&emsp;Prev</a>&emsp;";      
} 

if($page < $num_of_pages) {
	echo "<a href='?page=" . $next . "' class='btn btn-secondary btn-sm'>Next&emsp;&raquo;</a>";
}
?>
</div>
<br>
<?php
include '../footnav.php';
?>
<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
