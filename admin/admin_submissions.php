<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../assets/book.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>novelbuff - submissions</title>
</head>
<body>
<?php
session_start();    #session start  
include "../dbconn.php";
include "admin_topnav.php";
?>
<h3 class="text-center mt-5 pt-3">Submissions</h3>
<?php
try
{
$result=$db->contact->find();

echo "<table class='table'><thead>
<th>Name</th>
<th>Email</th>
<th>City</th>
<th>Query</th>
</thead>";

foreach ($result as $sub)
{
    echo "<tr><td>".$sub->qname."</td><td>".$sub->qmail."</td><td>".$sub->qcity."</td><td>".$sub->query."</td></tr>";

}
echo "</table>";
}
catch(Exception $e)
{
    die("error occured : ".$e);
}
?>
<?php include "../footnav.php" ?>
<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>