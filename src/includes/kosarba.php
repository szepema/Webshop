<?php
    session_start();
    if(!isset($_SESSION['kosarId']) || $_SESSION['kosarId'] == 0){
        if($_SESSION['loggedin']){
            $sql = "INSERT INTO kosar (id, user_id, kuponkod, vegosszeg) VALUES (DEFAULT, " . $_SESSION['id'] . ", NULL, 0)";
            $query = $pdo->prepare($sql);
            $query->execute();

            $sql = "SELECT id FROM kosar ORDER BY id DESC LIMIT 1";
            $query = $pdo->prepare($sql);
            $query->execute();
            $kosarId = $query->fetch();

            $_SESSION['kosarId'] = $kosarId;
        }else{
            $sql = "INSERT INTO kosar (id, user_id, kuponkod, vegosszeg) VALUES (DEFAULT, NULL, NULL, 0)";
            $query = $pdo->prepare($sql);
            $query->execute();

            $sql = "SELECT id FROM kosar ORDER BY id DESC LIMIT 1";
            $query = $pdo->prepare($sql);
            $query->execute();
            $kosarId = $query->fetch();

            $_SESSION['kosarId'] = $kosarId['id'];
        }
    }


    $darab = $_POST["hanyDarab"];
    $termek_id = $_POST["termekId"];

    $kosarId = $_SESSION['kosarId']["id"];

    $sql = "SELECT termek_id, mennyiseg FROM kosar_item WHERE termek_id = " . $termek_id . " AND kosar_id = " . $kosarId;
    $query = $pdo->prepare($sql);
    $query->execute();
    $result = $query->fetch();

    if($result){
        $uj_mennyiseg = $result["mennyiseg"] + $darab;
        $sql = "UPDATE kosar_item SET mennyiseg = " . $uj_mennyiseg . " WHERE termek_id = " . $termek_id . " AND kosar_id = " . $kosarId;
        $query = $pdo->prepare($sql);
        $query->execute();
    }else{
        $sql = "INSERT INTO kosar_item (kosar_id, termek_id, mennyiseg) VALUES (" . $kosarId . ", " . $termek_id . ", " . $darab . ")";
        $query = $pdo->prepare($sql);
        $query->execute();
    }

    header("location: https://webshop-beadando.000webhostapp.com/kosar");
    exit;
?>