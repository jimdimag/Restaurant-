<?php

function db_connect()
{ 
$db = new PDO("mysql:host=localhost; dbname=rest", "guest", "eatAtJoes");
return($db);
}
?>