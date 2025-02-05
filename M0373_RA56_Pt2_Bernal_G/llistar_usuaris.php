<?php include ('cap.php');?>
<?php include ('connexio_bbdd.php');?>

<?php $sql = "SELECT * FROM `usuaris`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Usuari: " . $row["usuari"]. " - Correu: " . $row["correu"]. " - Nom: " . $row["nom"]. " - Cognoms: " . $row["cognoms"]. " - Contra: " . $row["contra"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();?>

<?php include ('peu.php');?>