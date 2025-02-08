<?php include ('cap.php');?>
<?php include ('connexio_bbdd.php');?>

<?php

    $usuari=$_POST['usuari'];
    $contra=$_POST['contra'];

?>
    <h2>Hola <?php echo htmlspecialchars($_POST['usuari']);?>!</h2>
<?php
    $sql = "SELECT * FROM `usuaris` WHERE `usuari`='$usuari'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            $bbdd_usuari=$row['usuari'];
            $bbdd_contra=$row['contra'];
            if ($bbdd_contra === md5($contra)) {
                echo 'Contrasenya Correcta! <br>';
            } else {
                echo 'Contrasenya Incorrecta! <br>';
            }
        }
    } else {
        echo 'Ho sento, no tenim cap usuari anomenat: '.$usuari.' <br>';
    }
    $conn->close();
?>
<?php include ('peu.php');?>