<?php include ('connexio_woo.php');?>
<?php

try {
    $products = $woocommerce->get('products');
    
    if (!empty($products)) {
        echo "<ul>";
        foreach ($products as $product) {
            echo "<li>";
            echo "<strong>ID:</strong> " . htmlspecialchars($product->id) . "<br>";
            echo "<strong>Nom:</strong> " . htmlspecialchars($product->name) . "<br>";
            echo "<strong>Descripció curta:</strong> " . htmlspecialchars(strip_tags($product->short_description)) . "<br>";
            
            if (!empty($product->images) && isset($product->images[0]->src)) {
                echo "<img src='" . htmlspecialchars($product->images[0]->src) . "' alt='Imatge de " . htmlspecialchars($product->name) . "' width='150'><br>";
            }
            
            echo "</li><hr>";
        }
        echo "</ul>";
    } else {
        echo "No hi ha productes disponibles.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>