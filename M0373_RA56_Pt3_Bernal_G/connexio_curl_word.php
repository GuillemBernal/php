<?php
    $url="http://localhost/wordpress/?rest_route=/wp/v2/";
    $element="posts";
    $client = curl_init();
    curl_setopt($client,CURLOPT_URL, $url.$element);
    curl_setopt($client,CURLOPT_HEADER, 0);
    curl_setopt($client,CURLOPT_RETURNTRANSFER, true);

    $json=curl_exec($client);
    curl_close($client);

    $obj=json_decode($json);
    print_r($obj);

?>