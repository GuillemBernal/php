<?php
if (isset($_POST["taula"])) {
    $json_data = base64_decode($_POST["taula"]);
    $products = json_decode($json_data, true);

    if (!empty($products)) {
        $fitxer = "products.csv";
        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=" . $fitxer);
        header("Pragma: no-cache");
        header("Expires: 0");

        $output = fopen("php://output", "w");

        fputcsv($output, ["ID", "Nom", "Preu", "Enllaç Imatge"]);

        foreach ($products as $product) {
            fputcsv($output, [
                $product["id"],
                $product["name"],
                $product["price"] . " €",
                $product["images"][0]["src"] ?? "Sense imatge"
            ]);
        }
        fclose($output);
    } else {
        echo "No hi ha dades a exportar";
    }
    exit;
}
?>