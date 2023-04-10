<?php




require 'connection.php';


$name = $_POST['Id'];
$email = $_POST['date'];
$phone = $_POST['heure'];
$date = $_POST['duree'];



$sql = "INSERT INTO appointments (Id, date, heure, duree, etat) VALUES ('$Id', '$date', '$heure', '$duree')";

if ($conn->query($sql) === TRUE) {
  echo "Appointment created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>