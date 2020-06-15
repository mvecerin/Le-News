<?php

header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "root";
$basename = "le_monde";
$table = "clanak";

$dbc = mysqli_connect($servername, $username, $password, $basename) or die("Error connecting to MySql server." . mysqli_connect_error());

mysqli_set_charset($dbc, "utf8");

?>

