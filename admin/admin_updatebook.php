<?php
session_start();
include "../dbconn.php";
if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $title=$_POST['title'];
    $author=$_POST['author'];
    $path=$_POST['path'];
	$type=$_POST['type'];
    $price=$_POST['price'];

    $filter   =   array('title' 		=> $title,
                        'author' 		=> $author,
                        'path' 			=> $path,
						'type' 			=> $type,
                        'price' 		=> $price,
                        'createdOn' 	=> new MongoDB\BSON\UTCDateTime
                        );
    
	if($_FILES['file']) 
	{
		if(move_uploaded_file($_FILES['file']['tmp_name'], 'images/'.$_FILES['file']['name'])) 
		{
			$filter['fileName'] = $_FILES['file']['name'];
		} 
		else 
		{
			echo "Failed to upload file.";
		}
	}
	$error='';
	foreach ($filter as $key => $value) 
	{
		if(empty($value))
		{
			$error.=$key."is empty<br>";
		}
	}
	if($error)
	{
		echo "<p style='color:red'>".$error."</p>";
	}else{
	try
	{
        $db->book->updateOne(
                            array('_id'=>new MongoDB\BSON\ObjectID($id)),
                            array('$set'=>$filter)
                            );
        header("location:admin_downloads.php");
	}
	catch(Exception $e)
	{
		die("error:".$e);
	}
    }
}
?>