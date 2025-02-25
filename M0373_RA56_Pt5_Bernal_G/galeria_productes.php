<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria d'Imatges</title>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 200px;
            box-shadow: 3px 3px 6px rgba(0,0,0,0.2);
        }
        .product img {
            width: 100%;
            height: auto;
        }
        .product a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
    </style>
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
            <a class="example-image-link" href="<?php echo $src_image;?>" data-lightbox=>
            <?php
        }
        ?>
<script src="dist/js/lightbox-plus-jquery.min.js"></script>
</div>
</section>

</body>
</html>