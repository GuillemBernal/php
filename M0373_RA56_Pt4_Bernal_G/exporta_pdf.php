<?php
if (isset($_POST["taula"])) {
    $taula = $_POST["taula"];
    require_once('vendor/autoload.php');
    if (!empty($taula)) {
        $fitxer="posts.pdf";
        $mpdf=new \Mpdf\Mpdf();
        $taula='<style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2 }
        </style>'.$taula;
        $mpdf->WriteHTML($taula);
        $mpdf->Output($fitxer, 'D');
    } else {
        echo 'No hi ha dades a exportar';
    }
    exit;
}
?>