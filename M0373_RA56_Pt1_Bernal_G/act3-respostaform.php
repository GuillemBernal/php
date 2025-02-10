<?php include ('cap.php');
echo '<h3>Aquest fitxer és '.basename(__FILE__).'</h3>';

print_r($_POST);
print "<h2>Hola ".htmlspecialchars($_POST['nom']). "!</h2>";?>
<p>Tens <?php echo (int)$_POST['edat'];?> anys.</p>

<?php include ('peu.php');?>