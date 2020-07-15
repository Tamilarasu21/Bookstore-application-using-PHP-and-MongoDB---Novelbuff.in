<?php 
require "vendor/autoload.php";

$manager=new MongoDB\Client('mongodb://localhost:27017');


$db=$manager->novel; #localserver connection

$sitename='novelbuff.in';

?>