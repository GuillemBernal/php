<?php include("cap.php"); ?>
<?php include("connexio_curl_word_prod.php"); ?>
<?php array_multisort(array_column($obj, 'id'), SORT_ASC, $obj); ?>

<div class="container">
    <h2>Exportar dades a diversos formats</h2>

<?php
$html = "
    <table class='table table-stripped table-bordered'>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Preu</th>
            <th>Imatge</th>
        </tr>
        <tbody>";

foreach ($obj as $product) {
    $id = $product->id;
    $nom = $product->name;
    $preu = $product->price;
    $imatge = $product->images[0]->src;

    $html .= "<tr>
                <td>{$id}</td> 
                <td>{$nom}</td> 
                <td>{$preu} €</td>
                <td><img src='{$imatge}' width='50'></td>
              </tr>";
}
$html .= "</tbody></table>";
print($html);
?>

<div class="well-sm col-sm-12">
    <div class="d-flex justify-content-center">
        <form action="exporta_excel.php" method="post">
            <input type="hidden" name="taula" value="<?php echo htmlentities($html); ?>">
            <button type="submit" class="btn btn-info">Exportar a Excel</button>
        </form>

        <form action="exporta_pdf.php" method="post">
            <input type="hidden" name="taula" value="<?php echo htmlentities($html); ?>">
            <button type="submit" class="btn btn-info">Exportar a PDF</button>
        </form>

        <form action="exporta_csv.php" method="post">
            <input type="hidden" name="taula" value="<?php echo base64_encode(json_encode($obj)); ?>">
            <button type="submit" class="btn btn-info">Exportar a CSV</button>
        </form>
    </div>
</div>

<?php include("peu.php"); ?>