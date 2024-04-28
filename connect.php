<?php
$server = 'localhost';
$database = 'thistle';
$username = 'thistle';
$password = 'thistle';

$connect = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno())  {
   die('Could not connect: ' . mysqli_connect_error());
}
?>