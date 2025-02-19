<?php
require __DIR__ .'/vendor/autoload.php';
use Automattic\WooCommerce\Client;

$url_wordpress="http://192.168.56.11/wordpress";
$url_wordpress_rest=$url_wordpress.'/index.php';
$woocommerce=new Client(
    $url_wordpress_rest,
'ck_993ce35d07f1fb9b3986d98c5a1c91bcb62373eb',
'cs_9002a431494e0db5e2511d3e9c432fe8f7cb232e',
[
    'wp_api' => true,
    'query_string_auth' => true,
    'timeout' => 400,
]
);
?>