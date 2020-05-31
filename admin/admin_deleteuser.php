<?php 
session_start(); 	#session start	
 $id=$_GET["id"];

 try
 {
	 include "../dbconn.php";  #database connection
	 $db->user->deleteOne(['_id'=> new MongoDB\BSON\ObjectId($id)]);  	#query execution
 	 header("Location:admin_userlist.php");		#redirecting to userlist.php
 }
 catch(Exception $e)
 {
 	die("error encountered:".$e);

 }


?>