<?php ob_start(); ?>
<!doctype html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>webshop</title>
    <link rel="stylesheet" href="/css/custom.css">
</head>

<body>
    <?php
        include('valaszto.php');

        if($oldal != 'bejelentkezes' && $oldal != 'regisztracio'){
            include('includes/header.php');
        }

        if($termek != ""){
            include('includes/termek.php');
        }else if($alkategoria != ""){
            include('includes/alkategoria.php');
        }else if($oldal != "bejelentkezes" && $oldal != "kijelentkezes" && $oldal != "regisztracio" && $oldal != "fooldal" && $oldal != "kosar" && $oldal != "profil" && $oldal != "fizetes"){
            include('includes/kategoria.php');
        }else{
            include('includes/' . $oldal . '.php');
        }

        include('includes/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="/javascript/script.js"></script>

</body>

</html>
