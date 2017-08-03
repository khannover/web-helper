# web-helper
Tools and scripts for websites

## qr.php
Requires [qrencode](https://packages.debian.org/de/jessie/qrencode)

    sudo apt-get install qrencode

Generates and caches qr codes. Place qr.php below your websites documentroot or in a subfolder. Creates a folder for the cached qr codes. Make sure it's allowed for the httpd user (e.g. www-data) to create files and directories parallel to the qr.php script. 

Example of embedding a qr code with a static text on your website:

    <img src="/qr.php?url=https://hannover38.de/">

Or you can use javascript to use the current URL as string:

    <img id="qrcode" src=""/>
    <script>
        document.getElementById("qrcode").src = "/qr.php?url=" + window.location.href;
    </script>

The parameter "url" can actually be any string, not just urls.

    <img src="/qr.php?url=This is my string. There are many like it, but this one is mine.">

The string will be hashed and a file with the hash as filename will be generated inside the cache folder. The next time a qr code for a former string is requested the cached file will then be used. There will also be written a text file with the same hash as filename and the string as content.

Example cache:

    -rw-r--r--  1 www-data www-data   61 Jul 31 22:00 d4abfb5bddc875fd63b73edd2583e728ccf0d8cacb237ba383da273159139e7d.txt
    -rw-r--r--  1 www-data www-data  480 Jul 31 22:00 d4abfb5bddc875fd63b73edd2583e728ccf0d8cacb237ba383da273159139e7d.png
    -rw-r--r--  1 www-data www-data   39 Jul 31 22:00 51ddda88dcd3d13bfc0531561ad44a3a81004fc34456560a21d33779c781f6eb.txt
    -rw-r--r--  1 www-data www-data  407 Jul 31 22:00 51ddda88dcd3d13bfc0531561ad44a3a81004fc34456560a21d33779c781f6eb.png
    -rw-r--r--  1 www-data www-data   56 Jul 31 22:00 7a24eb879602b56bee4cb0427a7c6216c3d39c7c4836d854e1763cea66ef2dad.txt
    -rw-r--r--  1 www-data www-data  480 Jul 31 22:00 7a24eb879602b56bee4cb0427a7c6216c3d39c7c4836d854e1763cea66ef2dad.png
