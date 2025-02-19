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
            <th>DescripciÃ³</th>
            <th>Imatge</th>
        </tr>
        <tbody>";

    foreach ($obj as $product) {
        $id = $product->id;
        $nom = $product->title->rendered ?? 'Sense nom';
        $descripcio = $product->content->rendered ?? '';

        // Obtener URL del JSON para la imagen destacada
        $urlmedia = isset($product->_links->{'wp:featuredmedia'}[0]->href) ? $product->_links->{'wp:featuredmedia'}[0]->href : 'imatge_no_disponible.jpg';

        $src_image = 'default.jpg'; // Imagen por defecto
        $alt_image = 'Imatge del producte'; // Texto alternativo

        if ($product->featured_media != 0) {  // Verificamos que haya una imagen asignada
            $client = curl_init();
            curl_setopt($client, CURLOPT_URL, $urlmedia);
            curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

            $json = curl_exec($client);
            curl_close($client);

            $image = json_decode($json);
            if ($image) {
                $src_image = $image->guid->rendered ?? 'default.jpg';
                $alt_image = $image->title->rendered ?? 'Imatge del producte';
            }
        }
        $html .= "<tr>
                <td>{$id}</td> 
                <td>{$nom}</td> 
                <td>{$descripcio}</td>
                <td><img src='{$src_image}' width='200' alt='{$alt_image}'></td>
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