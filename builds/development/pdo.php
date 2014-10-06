<?php

function db_connect()
{ 
$db = new PDO("mysql:host=localhost; dbname=bookcell_rest", "bookcell_guest", "Eat52589!");
return($db);
}
?>