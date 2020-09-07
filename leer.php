<?php
    $archivo = fopen("archivo.txt", "r");
    while(!feof($archivo)){
        $traer = fgets($archivo);
        echo nl2br($traer);
    }
    fclose($archivo);
?>