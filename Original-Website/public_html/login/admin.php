

<?php
$dbHostname = 'localhost';
$dbUsername = 'brandon';
$dbPassword = 'bost';
$dbName = 'athens911';

$connect = mysqli_connect($dbHostname, $dbUsername, $dbPassword, $dbName)
  or die("Unable to connect to MySQL: " . mysqli_error());
