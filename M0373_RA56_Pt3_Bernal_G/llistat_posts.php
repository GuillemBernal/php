<?php
include('connexio_curl_word.php');
array_multisort(array_column($obj, 'id'), SORT_ASC, $obj);
foreach ($obj as $post) {
    echo '<h1>';
    print($post->id);
    echo '.-';
    print($post->title->rendered);
    echo '</h1>';
    print($post->content->rendered);

    echo '<hr/>';
}
?>