<?php include("cap.php");?>
<?php include("connexio_curl_word.php");?>
<?php array_multisort(array_column($obj, 'id'), SORT_ASC, $obj);?>

<div class="container">
    <h2>Exportar dades a Excel amb PHP</h2>
<?php $html = "
        <table class='table table-stripped table-bordered'>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Status</th>
            </tr>
            <tbody>";

            foreach ($obj as $post) {
                $html .= " <tr><td>{$post->id}</td> <td>{$post->date}</td><td>{$post->status->rendered}</td>";
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
<?php include("peu.php");?>