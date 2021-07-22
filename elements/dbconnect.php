<?php
$serverAddress = "localhost";
$username = "root";
$password = "";
$database = "users";
$connection = mysqli_connect($serverAddress, $username, $password, $database);
$table_name = "credentials";

if (!$connection) {
die("Connection failed : " . mysqli_connect_error());
}
?>