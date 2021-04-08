<!DOCTYPE html>
<html lang="en">

<?php

/*** connection credentials *******/
$servername = "www.watzekdi.net";
$username = "watzekdi_cs293";
$password = "KevinBac0n";
$database = "watzekdi_imdb";
$dbport = 3306;

/****** connect to database **************/

try {
  $db = new PDO("mysql:host=$servername;dbname=$database;charset=utf8;port=$dbport", $username, $password);
}
catch(PDOException $e) {
  echo $e->getMessage();
}

?>