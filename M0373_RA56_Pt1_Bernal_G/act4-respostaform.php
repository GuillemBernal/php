<?php include ('cap.php');
echo '<h3>Aquest fitxer és '.basename(__FILE__).'</h3>';

$nom=htmlspecialchars($_POST['nom']);
$edat=(int)$_POST['edat'];

print "<h2>Hola $nom!</h2>";
print "<h2>Tens $edat anys.</h2>";

if($edat < 35) {
    echo "<p>Ets molt jove!</p>";
} else {
    echo "<p>Has de passar la ITV!</p>";
}

include ('peu.php');?>