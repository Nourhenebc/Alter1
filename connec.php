<?php
$servername = "127.0.0.1";
$username = "System";
$password = "system";
$dbname = "atelier2a26";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>