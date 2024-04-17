<?php
$server = 'localhost';
$database = 'web';
$username = 'web';
$password = 'web';

$connect = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno())  {
   die('Could not connect: ' . mysqli_connect_error());
}
?>