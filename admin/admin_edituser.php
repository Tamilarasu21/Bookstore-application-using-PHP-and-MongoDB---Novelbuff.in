 <!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../assets/book.png" type="image/x-icon">
	<title>novelbuff - Modify user detail</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php 
include 'admin_topnav.php';
session_start(); #session start
include "../dbconn.php";   #database connection

$id=$_GET["id"];
$username=$_GET["username"];
$password=$_GET["password"];
?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 mt-5">	
            <h1 class="text-center">Edit user</h1>
            <form action="admin_update.php" method="POST">
              <a href="userlist.php" class="btn btn-success btn-block">Go to Userlist</a>
              <div class="form-group">
                <input type="hidden" name="id" value= "<?php echo $_GET["id"]; ?>" >
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username" value= "<?php echo $_GET["username"]; ?>" >
                <label>Password</label>
                <input type="text" class="form-control" name="password" placeholder="Enter password" value= "<?php echo $_GET["password"]; ?>" ><br>
	              <input type="submit" name="Update" class="btn btn-primary btn-block">
              </div>
            </form>
      </div>
    </div>
  </div>
  <?php include '../footnav.php';?>
<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
