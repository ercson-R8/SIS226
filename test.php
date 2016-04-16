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

/*

item history must also display request quantity
stocks view must also display total receive, requested, released

$sql = "INSERT INTO `stock` (`stock_id`, `transaction_id`, `item_number`, `user_id`, `quantity_received`, `quantity_release`, `balance_stock`, `balance_available`, `date_process`) VALUES (NULL, \'30\', \'EL-CM-0000\', \'10010\', \'0\', \'0\', \'0\', \'0\', CURRENT_TIMESTAMP)";

CURRENT_TIMESTAMP()

*/


?>