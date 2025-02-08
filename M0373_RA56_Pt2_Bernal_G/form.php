<?php include ('cap.php');?>
<?php include ('connexio_bbdd.php');?>

<form action="login.php" method="POST">
    <label for="usuari">Usuari:</label>
    <input type="text" name="usuari"></input>

    <label for="contra">Contrasenya: </label>
    <input type="text" name="contra"></input>

    <input type="submit"></input>
</form>

<?php include ('peu.php');?>