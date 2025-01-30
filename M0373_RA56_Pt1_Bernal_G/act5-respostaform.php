<?php
function felicitarAniversariEspelmes($edat) {
    $img = "<img src='espelma.jpg' width='50' height='100'>";
    for ($i = 0; $i < $edat; $i++) {
        echo $img;
        if (($i + 1) % 10 == 0) echo "<br>";
    }
}

$nom = htmlspecialchars($_POST['nom']);
$edat = (int)$_POST['edat'];

include ('cap.php');

echo "<h2>Hola $nom!</h2>";
echo "<p>Tens $edat anys. FELICITATS!</p>";

felicitarAniversariEspelmes($edat);

include ('peu.php');?>