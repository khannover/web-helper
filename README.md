# web-helper
Tools and scripts for websites

## qr.php
Requires qrencode

    sudo apt-get install qrencode

Generates and caches qr codes. Place qr.php below your websites documentroot or in a subfolder. Creates a folder for the cached qr codes. Make sure it's allowed for the httpd user (e.g. www-data). 

You can embed a qr code on your website as followed:

    <img id="qrcode" src="/qr.php?url=https://hannover38.de/">

The parameter url can actually be any string, not just urls.
