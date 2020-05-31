<!DOCTYPE html>
<head>
    <title>novelbuff - Search</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
  	<meta name="viewport" content="width-device-width, initial scale=1.0">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="mt-5 pt-4">
<?php

include "dbconn.php";
include "topnav.php";
//session_start();
if(isset($_GET['search']))
{
    $keyword=$_GET['keyword'];
    
    $final=$db->book->find(array(
        '$or' => array(
            array('title' => $keyword),
            array('author' => $keyword),
            array('type' => $keyword)
        )
    ));
    echo "<h2 class='text-primary text-center'>Seach Results for - &dblac; <span class='text-muted'>".$keyword."</span> &dblac;</h2>";
    echo "<table class='table'>";
    foreach ($final as $fin)
    {
        echo "<form action='' method='post'>";
        echo "<tr><td style='width:200px'><img src='admin/images/".$fin->fileName."' width='120px' height='120px' class='img-responsive'></td>";
        echo "<td><p><b style='color:#038ead'>Title : </b>".$fin->title."</p><p><b style='color:#038ead'>Author : </b>".$fin->author."</p><p><b style='color:#038ead'>Type : </b>".$fin->type."</p><p><b style='color:#038ead'>Price : </b>&#8377; ".$fin->price."</p>";
        echo "<input type='hidden' name='fileName' value='".$fin->fileName."'>";
        echo "<input type='hidden' name='title' value='".$fin->title ."'>";
        echo "<input type='hidden' name='author' value='".$fin->author ."'>";
        echo "<input type='hidden' name='type' value='".$fin->type ."'>";
        echo "<input type='hidden' name='price' value='".$fin->price ."'>";
        echo "<p><button class='btn btn-success' name='add'><i class='fa fa-shopping-cart'></i>&nbsp;Add to cart</button></p></td></tr>";
        echo "<form>";
    }
    echo "</table>";

    if(isset($_POST['add']))
	{
		$cart=array(
					'_id'=> new MongoDB\BSON\ObjectID,
					'name'=>$_SESSION['username'],
					'fileName'=>$_POST['fileName'],
					'title' =>$_POST['title'],
					'author'=>$_POST['author'],
					'type'=>$_POST['type'],
					'price'=>$_POST['price'] 
					);
		try
		{
			$count_item=$db->cart->count(array('title'=>$_POST['title']));
			if($count_item >1)
			{
				echo "<script>alert('product is already added in the cart')</script>";
				echo "<script>window.location='books.php'</script>";
			}
			else
			{
				$result = $db->cart->insertOne($cart);
				echo "<script>window.location='books.php'</script>";
			}
		}
		catch(Exception $e)
		{
			die("error:".$e);
		}
	}
}
include "footnav.php";
?>
</div>
<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>