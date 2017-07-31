# web-helper
Tools and scripts for websites

## qr.php
Requires [qrencode](https://packages.debian.org/de/jessie/qrencode)

    sudo apt-get install qrencode

Generates and caches qr codes. Place qr.php below your websites documentroot or in a subfolder. Creates a folder for the cached qr codes. Make sure it's allowed for the httpd user (e.g. www-data). 

You can embed a qr code with a static text on your website as followed:

    <img src="/qr.php?url=https://hannover38.de/">

Or you can use javascript to use the URL as string dynamically:

    <img id="qrcode" src=""/>
    <script>
        document.getElementById("qrcode").src = "/qr.php?url=" + window.location.href;
    </script>

The parameter url can actually be any string, not just urls.

    <img src="/qr.php?url=This is my string. There are many like it, but this one is mine.">

The string will be hashed and a file with the hash as filename will be generated inside the cache folder. The next time a qr code for this string is requested the cached file will then be used instead.

Example cache:

    -rw-r--r-- 1 www-data www-data 292 Jul 31 16:17 1e57a452a094728c291bc42bf2bc7eb8d9fd8844d1369da2bf728588b46c4e75.png
    -rw-r--r-- 1 www-data www-data 476 Jul 28 17:15 311a4cf4226d3a0703f8c6ada50332b3e201806c700c195658f3f5da8b7552f6.png
    -rw-r--r-- 1 www-data www-data 481 Jul 31 16:23 be62fa85b5f0f9e4d47bcfb0898aeb32568efe3920a0cf14f0e6c569ed2560e1.png
    -rw-r--r-- 1 www-data www-data 410 Jul 31 15:32 dfe3f42987a21c843bb4fdc9b101811415597d9f6cca6ca99899c283bc6e5edf.png
