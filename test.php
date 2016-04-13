<?php

echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <script type="text/javascript" src="js/sha512.js"></script> 
            <script type="text/javascript" src="js/forms.js"></script> 
        </head>
        <body>
        <b>hi</b>
        <br>
        <span id="p"></span>
        
            <script>
                document.getElementById("p").innerHTML = hex_sha512(\'password\');
                alert(hex_sha512(\'password\'));
            </script>
        </body>
        </html>';


?>