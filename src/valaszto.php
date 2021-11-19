<?php 
    $tomb = explode('/', $_SERVER['REQUEST_URI']);
    $oldal=$tomb[1];
    if($oldal == ""){
        $oldal = "fooldal";
    }
    $alkategoria = "";
    $termek = "";
    if(isset($tomb[2])){
        $alkategoria=$tomb[2];
    }
    if(isset($tomb[3])){
        $termek=$tomb[3];
    }
?>