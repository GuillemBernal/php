<?php
include ('connexio_curl_word_prod.php');
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
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
    <h1>Galeria de productes</h1>
    <div class="gallery">
        <?php foreach ($obj as $prod): ?>
            <?php if ($prod->featured_media != 0): ?>
                <?php
                $url="http://localhost/wordpress/?rest_route=/wp/v2/media/" . $prod->featured_media;
                $client=curl_init();
                curl_setopt($client, CURLOPT_URL, $url);
                curl_setopt($client, CURLOPT_HEADER, 0);
                curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

                $json=curl_exec($client);
                curl_close($client);

                $image=json_decode($json);
                $src_image=$image->guid->rendered ?? 'default.jpg';
                $alt_image=$image->title->rendered ?? 'Imatge del producte';
                ?>
                <div class="product">
                    <a href="<?php echo $prod->link; ?>" target="_blank">
                        <img src="<?php echo $src_image; ?>" alt="<?php echo htmlspecialchars($alt_image); ?>">
                        <p><?php echo htmlspecialchars($prod->title->rendered); ?></p>
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</body>
</html>