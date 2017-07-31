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
