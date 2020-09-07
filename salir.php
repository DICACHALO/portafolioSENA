<?php
    session_start();
    session_destroy();
    clearstatcache(); 
    unset($_COOKIE['id_usuario']);
    unset($_COOKIE['clave']);  
    unset($_COOKIE['random_marc_cookie']); 
    header ("Location: index.html");
    exit;
?>