<?php
$username = "brandon";
$password = "bost";
$hostname = "localhost";
$database = "athens911";

$dbhandle = mysqli_connect($hostname, $username, $password, $database)
  or die("Unable to connect to MySQL " . mysqli_connect_error());
?>
