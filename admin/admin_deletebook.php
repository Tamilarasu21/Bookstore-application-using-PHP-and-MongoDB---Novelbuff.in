<?php
session_start();
include "../dbconn.php";
$id=$_GET['id'];
try
{
    $db->book->deleteOne(array('_id'  => new MongoDB\BSON\ObjectID($id)));
    header("Location:admin_downloads.php");
}
catch(Exception $e)
{
    die("error:".$e);
}
?>