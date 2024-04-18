<?php
$server = 'localhost';
$database = 'test';
$username = 'test';
$password = 'test';

$connect = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno())  {
   die('Could not connect: ' . mysqli_connect_error());
}
?>