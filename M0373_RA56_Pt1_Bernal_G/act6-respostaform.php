<?php include ('cap.php');

$numeros_str = $_POST['numeros'];
$numeros = explode(",", $numeros_str);
$numeros = array_map('trim', $numeros);

$pares = array_filter($numeros, function($num) {
    return $num % 2 == 0;
});

echo "<p>Vector original: " . implode(", ", $numeros) . "</p>";
echo "<p>Vector de números parells: " . implode(", ", $pares) . "</p>";
echo "<p>Total de números parells: " . count($pares) . "</p>";

include ('peu.php');?>