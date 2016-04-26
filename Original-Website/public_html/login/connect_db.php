<?php
// Created by Athens State University CS452 Senior Engineering Project
// Members: Mallory Patterson, Brandon Bost, Jordan Hopkins, Keith Robinson

$username = "brandon";
$password = "bost";
$hostname = "localhost";
$database = "athens911";

$dbhandle = mysqli_connect($hostname, $username, $password, $database)
  or die("Unable to connect to MySQL " . mysqli_connect_error());
?>
