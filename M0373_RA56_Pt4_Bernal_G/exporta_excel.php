<?php
if (isset($_POST["taula"])) {
    $taula = $_POST["taula"];

    if (!empty($taula)) {
        $fitxer="usuaris.xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$fitxer);
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $taula;
    } else {
        echo "No hi ha dades a exportar";
    }
    exit;
}
?>