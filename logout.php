<?php
session_start();	#start session

include "dbconn.php";	#connect to database

if(!isset($_SESSION['username']))  #if there is no user exists...
{
	header("Location:index.php"); #redirecting to index.php
}

unset($_SESSION['username']);	#clear session
header("Location:index.php");	#redirecting to homepage and exit
exit();
?>