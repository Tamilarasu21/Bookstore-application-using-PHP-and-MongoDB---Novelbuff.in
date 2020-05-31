<?php
session_start();
include "dbconn.php";

$username =$_POST["username"];
$password =$_POST["password"];

$user = array('_id' =>  new MongoDB\BSON\ObjectId,
			'username' => $username,
			'password' => $password,
			);

$errorMessage = '';
	foreach ($user as $key => $value) {
		if (empty($value)) {
			$errorMessage .= $key . ' field is empty<br />';
		}
	}
	
	if ($errorMessage) {
		#print error message
		echo '<span style="color:red">'.$errorMessage.'</span>';	
	} 
 try
 {
 	$db->user->insertOne($user);	#query execution
 	header("Location:admin_userlist.php");	#redirecting to 
}
catch(Exception $e)
{
die("error encountered: ".$e);
}
?>