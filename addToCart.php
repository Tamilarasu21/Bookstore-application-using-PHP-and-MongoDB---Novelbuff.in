<?php
session_start();
include "dbconn.php";
if(isset($_POST['add']))
	{
		$cart=array(
					'_id'=> new MongoDB\BSON\ObjectID,
					'name'=>$_SESSION['username'],
					'fileName'=>$_POST['fileName'],
					'title' =>$_POST['title'],
					'author'=>$_POST['author'],
					'type'=>$_POST['type'],
					'price'=>$_POST['price'],
					'path'=>$_POST['path'] 
					);
		try
		{
            
			$count_item=$db->cart->countDocuments(array(
				             '$and'=>array(
							  array('title'=>$_POST['title']),
							  array('name'=>$_SESSION['username'])
                            )));
           echo $count_item;
			if($count_item >= 1)
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
    ?>