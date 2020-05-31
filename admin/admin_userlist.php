<!DOCTYPE html>
<head>
	<title>novelbuff - userlist</title>
	<meta charset="utf-8">
  <link rel="shortcut icon" href="../assets/book.png" type="image/x-icon">
  <meta name="author" content="Tamilarasu">
	<meta name="viewport" content="width-device-width, initial scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <?php include 'admin_topnav.php';?>
  <div align="right" class="mt-5 pt-3" >
  <form action="admin_search_user.php" method="get" style="width:400px" class="pr-3">
    <input type="search" name="keyword" placeholder="Search user.." style="border-radius:5px;border:1px solid grey;padding:3px 5px">
    <button name="search" class="btn btn-secondary"><i class="fa fa-search"></i></button><hr>
  </form>
</div>
<h2 class="text-center text-primary">List</h2>
<?php 

try{
include "../dbconn.php"; #connect to database

$rows = $db->user->find();

echo "<table class='table table-striped table-hover'>
<thead>
<th>Username</th>
<th>Password</th>
<th>Tasks</th>
</thead>";
    foreach($rows as $row)
    {
      echo "<tr>".
      "<td>".$row->username."</td>".
      "<td>".$row->password."</td>".
      "<td><a  class='btn btn-info' href='admin_edituser.php?id=".$row->_id.
      "&username=".$row->username.
      "&password=".$row->password."'><i class='fa fa-eraser'></i>&nbsp;Edit</a> ".
      "<a class='btn btn-danger' href='admin_deleteuser.php?id=".$row->_id."'><i class='fa fa-trash'></i>&nbsp;Delete</a></td>".
      "</tr>";  
    }  
    echo "</table>";   
    include "../footnav.php";   
}
catch(MongoDB\Driver\Exception\Exception $e)
{
die("error encountered: ".$e);
}
?>
<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

