<?php

$url = $_GET['url'];
$id = hash("sha256", $url);

if(!file_exists("qrcodes/$id.png")){
     exec("qrencode " . escapeshellarg($url) . " -o qrcodes/" . $id . ".png -t png");
}

header('Content-type: image/png');
header('Content-Length: ' . filesize("qrcodes/$id.png"));
$fp = fopen("qrcodes/$id.png", "rb");
fpassthru($fp);


/*  uncomment the next line if you don't want to store the qr images in your filesystem (may be slower) */
//unlink("qrcodes/$id.png");
