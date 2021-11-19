<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=id17971635_db;", "id17971635_db_user", "InlH(K8w*E^c_h#]");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    
?>