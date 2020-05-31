<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="assets/book.png" type="image/x-icon">
    <title>novelbuff - Download</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
    include "dbconn.php";
    include "topnav.php";
    if(isset($_POST['download']))
    {
        $id=$_POST['id'];
        $title=$_POST['title'];
        $dwn=$db->cart->deleteOne(['_id'=> new MongoDB\BSON\ObjectID($id)]);
        if($dwn)
        {
            $pow=$db->book->find(['title'=>$title]);
            
            if($pow)
            {
                echo '<h1 class="mt-5 pt-3 text-center text-info">Downloads</h1>';
                echo "<table class='table'>";
                foreach($pow as $p)
                {
                    echo "<tr><td style='width:200px'><img src='admin/images/".$p->fileName."' width='120px' height='120px' class='img-responsive'></td>";
                    echo '<td><p><b class="text-info">Title : </b>'.ucfirst($p->title).'</p>';
                    echo '<p><b class="text-info">Author : </b>'.ucfirst($p->author).'</p>';
                    echo "<p><a href=".$p->path." class='btn btn-light border-dark' target='_blank'><i class='fa fa-download'></i>&nbsp;Download</a></p></td></tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "Error Encoutered";
            }
        }
        else
        {
            echo "Error Encoutered";
        }
    }
    include "footnav.php";
?>    
</body>
</html>
