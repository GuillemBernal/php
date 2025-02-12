<?php
$sql = "SELECT * FROM usuaris";
$result = $conn->query($sql);
?>

<div class="container">
    <h2>Exportar dades a Excel amb PHP</h2>
<?php $html = "
        <table class='table table-stripped table-bordered'>
            <tr>
                <th>Usuari</th>
                <th>Correu</th>
                <th>Nom</th>
            </tr>
            <tbody>";

            if ($result->num_rows > 0) {
                while ($obj = $result->fetch_object()) {
                    $html .= " <tr><td>$obj->usuari</td> <td>$obj->correu</td><td>$obj->nom $obj->cognoms</td>";
            }
            $html .= "</tbody>
            </table>
    </div>";
    
print($html);
?>
<div class="well-sm col-sm-12">
    <div class="d-flex justify-content-center">
        <form action="exporta_excel.php" method="post">
        <input type="hidden" name="taula" value="<?php echo $html; ?>">
            <button type="submit" id="exporta_excel" name='exporta_excel'
                value="Exporta a Excel" class="btn btn-info">Exportar a Excel</button>
        </form>

        <form action="exporta_pdf.php" method="post">
        <input type="hidden" name="taula" value="<?php echo $html; ?>">
            <button type="submit" id="exporta_pdf" name='exporta_pdf'
                value="Exporta a PDF" class="btn btn-info">Exportar a PDF</button>
        </form>

    </div>
</div>

</div>