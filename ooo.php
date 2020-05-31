<?php
    $manager=new MongoDB\Client('mongodb://localhost:27017');

    $db=$manager->novel; 
    
    $collection=$db->book;

    $page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $limit = 6;
    $skip  = ($page - 1) * $limit;
    $next  = ($page + 1);
    $prev  = ($page - 1);
    $total=$collection->countDocuments();
    //echo $total."<br>";
    $num_of_pages=ceil($total/$limit);
    if($page < 1)
    {
        header("location:ooo.php?page=1");
    }
    
    $filter=array('limit'=>$limit,'skip'=>$skip);
    $final = $collection->find(array(),$filter);
    
    foreach ($final as $r) {
       echo $r->title."<br>";
    }
    echo "<center>";
    if($page != 1){
        echo '<a href="?page=' . $prev . '">Previous</a>&emsp;';      
    } 

    if($page < $num_of_pages) {
        echo '<a href="?page=' . $next . '">Next</a>';
    }
    echo "<br>";
    // for ($page=1; $page <=$num_of_pages ; $page++) 
    // { 
    // echo "<a href='?page=".$page."'>".$page."</a>&emsp;";
    // }
    echo "</center>";
    
    
    
    
    ?>