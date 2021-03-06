<?php

$url = !empty($_GET['url']) ? $_GET['url'] : "No URL given";
$id = hash("sha256", $url);
$qrcache = "qrcodes";

if (!file_exists($qrcache) && !mkdir($qrcache, 0755, true)) {
    die('Could not create cache directory ' . $qrcache);
}

if(!file_exists("$qrcache/$id.png")){
    exec("qrencode " . escapeshellarg($url) . " -o $qrcache/" . $id . ".png -t png");
    file_put_contents("$qrcache/$id.txt", $url);
}

header('Content-type: image/png');
header('Content-Length: ' . filesize("$qrcache/$id.png"));
$fp = fopen("$qrcache/$id.png", "rb");
fpassthru($fp);


/*  uncomment the next line if you don't want to store the qr images in your filesystem (may be slower) */
//unlink("$qrcache/$id.png");
