<?php
    session_start();
    if($_SESSION['loggedin']){
        $_SESSION['loggedin'] = false;
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        header('location: https://webshop-beadando.000webhostapp.com/');
        exit;
    } else {
        header('location: https://webshop-beadando.000webhostapp.com/');
        exit;
    }
?>