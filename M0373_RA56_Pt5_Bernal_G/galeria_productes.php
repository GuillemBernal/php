<?php include ('connexio_woo.php');?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Productes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    text-align: center;
    background: linear-gradient(135deg, #1e1e1e, #3a3a3a);
    color: #ffffff;
    margin: 0;
    padding: 20px;
}

h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
}

.product {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 20px;
    width: 260px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.4);
}

.product img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.product img:hover {
    transform: scale(1.1);
}

.product h3 {
    font-size: 1.3em;
    margin: 15px 0;
}

a {
    text-decoration: none;
    color: #00bfff;
    font-weight: bold;
    transition: color 0.3s ease;
}

a:hover {
    color: #1e90ff;
}
    </style>
</head>
<body>
    <h1>Galeria de Productes</h1>
    <div class="gallery">
        <?php
        $products = $woocommerce->get('products');
        foreach ($products as $producte) {
            $src_image = !empty($producte->images) ? $producte->images[0]->src : 'placeholder.jpg';
            echo "<div class='product'>";
            echo "<a href='{$producte->permalink}' target='_blank'>";
            echo "<h3>{$producte->name}</h3>";
            echo "</a>";
            echo "<a href='$src_image' data-lightbox='example-set' data-title='{$producte->name}'>";
            echo "<img src='$src_image' alt='{$producte->name}'>";
            echo "</a>";
            echo "</div>";
        }
        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
</body>
</html>