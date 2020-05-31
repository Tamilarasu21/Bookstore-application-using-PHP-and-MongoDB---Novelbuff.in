<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
    <title>novelbuff - Search Result</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php include "admin_topnav.php";?>
<center>
<div class="mt-5 pt-3">
<?php 
session_start();
include "../dbconn.php";
if(isset($_GET['search']))
{
    $keyword=$_GET['keyword'];
    $result=$db->user->find(array('username'=>$keyword));

    echo "<h2 class='text-primary'>Search Results for '<span class='text-muted'>".$keyword."</span>'</h2>";

    echo "<table class='table table-striped table-hover'>
            <thead><th>Username</th><th>Password</th><th>Task</th></thead>";
    foreach ($result as $res)
    {
        echo "<tr><td>".$res->username."</td><td>"
                       .$res->password."</td><td><a href='admin_edituser.php?id="
                       .$res->_id."&username=".$res->username."&password=".$res->password."' class='btn btn-info'><i class='fa fa-eraser'></i>Edit</a>&emsp;<a href='admin_deleteuser.php?id="
                       .$res->_id."' class='btn btn-danger'><i class='fa fa-trash'></i>Delete</a></td></tr>";     
    }
    echo "</table>";
}
?>
</div>
</center>
<?php include "../footnav.php";?>
<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>