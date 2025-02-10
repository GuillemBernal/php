<?php
include ('connexio_curl_word_prod.php');

foreach ($obj as $prod) {
    if ($prod->featured_media!=0) {
        $url="http://localhost/wordpress/?rest_route=/wp/v2/";
        $element="media/".$prod->featured_media;
        $client=curl_init();
        curl_setopt($client, CURLOPT_URL, $url.$element);
        curl_setopt($client, CURLOPT_HEADER, 0);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $json=curl_exec($client);
        curl_close($client);

        $image=json_decode($json);
        $src_image = $image->guid->rendered;
        $alt_image = $image->title->rendered;
    }
}
?>

<a class="example-image.link" href="<?php echo $src_image; ?>" data-lightbox=