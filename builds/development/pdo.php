<?php

function db_connect()
{ 
$db = new PDO("mysql:host=localhost; dbname=rest", "guest", "Eat52589!");
return($db);
}
?>