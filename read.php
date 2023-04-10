<?php
$sql = "SELECT * FROM atelier2a26";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - date: " . $row["date"]. " - heure: " . $row["duree"]." - : " . $row["duree"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>