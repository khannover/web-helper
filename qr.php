<?php

$url = $_GET['url'];
$id = hash("sha256", $url);
$qrcache = "qrcodes";

if (!mkdir($qrcache, 0755, true)) {
    die('Could not create cache directory ' . $qrcache);
}

if(!file_exists("$qrcache/$id.png")){
     exec("qrencode " . escapeshellarg($url) . " -o $qrcache/" . $id . ".png -t png");
}

header('Content-type: image/png');
header('Content-Length: ' . filesize("$qrcache/$id.png"));
$fp = fopen("$qrcache/$id.png", "rb");
fpassthru($fp);


/*  uncomment the next line if you don't want to store the qr images in your filesystem (may be slower) */
//unlink("$qrcache/$id.png");
