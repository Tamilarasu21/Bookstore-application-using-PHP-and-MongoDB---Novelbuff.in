<!DOCTYPE html>
<html>
<head>
	<title>novelbuff - Add user</title>
  <link rel="shortcut icon" href="../assets/book.png" type="image/x-icon">
	<meta charset="utf-8">
  <meta name="description" content="novelbuff.in">
  <meta name="keywords" content="HTML,Bootstrap">
  <meta name="author" content="Tamilarasu">
	<meta name="viewport" content="width-device-width, initial scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php include 'admin_topnav.php'; ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 mt-5 pt-5">
        <div class="form-group">
            <h1 class="text-center">ADD NEW USER</h1>	
            <form action="admin_adduser.php" method="POST">
              <label>username</label>
              <input type="text" class="form-control" name="username" placeholder="Enter username">
              <label>password</label>
              <input type="text" class="form-control" name="password" placeholder="Enter password">
              <br>
              <input type="submit" name="submit" class="btn btn-primary btn-block">
            </form>
        </div>
      </div>
    </div>
  </div>
<?php include "../footnav.php"; ?>
<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
