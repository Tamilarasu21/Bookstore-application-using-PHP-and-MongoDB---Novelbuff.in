<html lang="en">
<head>
    <title>novelbuff - Downloads</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
  	<meta name="viewport" content="width-device-width, initial scale=1.0">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php include "admin_search_books.php";?>
<center>

<?php
include "admin_topnav.php";
session_start();
include "../dbconn.php";

if(isset($_GET['search']))
{
    $keyword=$_GET['keyword'];
    
    $final=$db->book->find(array(
        '$or' => array(
            array('title' => $keyword),
            array('author' => $keyword),
            array('type' => $keyword)
        )
    ));
    echo "<h2 class='text-primary'>Seach Results for '<span class='text-muted'>".$keyword."</span>'</h2>";
    echo "<table class='table table-hover'>";
    foreach ($final as $fin)
    {
        $timezone=new DateTimeZone('Asia/Kolkata');
        $time=new MongoDB\BSON\UTCDateTime((string)$fin->createdOn);
        $DateTime=$time->toDateTime();
        $DateTime->SetTimezone($timezone);
      echo "<tr><td><img src='images/".$fin->fileName."' height='150px' width='150px'></td>";
      echo "<td><p><b class='text-info'>Title : </b>".$fin->title."</p>";
      echo "<p><b class='text-info'>Author : </b>".$fin->author."</p>";
      echo "<p><b class='text-info'>Type : </b>".$fin->author."</p>";
      echo "<p><a href='admin_editbook.php?id=".$fin->_id.
	"&title=".$fin->title.
	"&author=".$fin->author.
	"&path=".$fin->path.
	"&type=".$fin->type.
	"&file=".$fin->fileName."' class='btn btn-warning'><i class='fa fa-eraser'></i>&nbsp;Edit Book</a>&emsp;";
	echo "<a href='admin_deletebook.php?id=".$fin->_id."' class='btn btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete Book</a>&emsp;";
    echo "<a href='".$fin->path."' class='btn btn-success'><i class='fa fa-download'></i>&nbsp;Download</a></p>";
    echo "<p>".$DateTime->format('d/m/Y h:i:s')."</p></td></tr>";
    }
    echo "</table>";
}
include "../footnav.php";
?>
</center>
<!--################################## bootstrap ###########################################-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>