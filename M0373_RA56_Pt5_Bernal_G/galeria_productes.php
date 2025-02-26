<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria d'Imatges</title>
    <link rel="stylesheet" href="dist/css/lightbox.min.css">
</head>
<body>
<section>
    <h1>Galeria Lightbox</h1>
    <div class="lightbox">
        <?php
        include("connexio_woo.php");
        foreach ($woocommerce->get('products') as $producte) {
            $src_image=$producte->images[0]->src;
            ?>
            <a class="example-image-link" href="<?php echo $src_image;?>">
            <?php
        }
        ?>
<script src="dist/js/lightbox-plus-jquery.min.js"></script>
</div>
</section>

</body>
</html>