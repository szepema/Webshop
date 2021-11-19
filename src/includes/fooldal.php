<?php
    include_once('config.php');
    include_once('utils.php');
?>

<main class="mx-auto">

<link rel="stylesheet" type="text/css" href="css/fooldal.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/carousel1.jpg" class="d-block w-100" alt="leárazás">
            <div class="carousel-caption d-none d-md-block text-dark fs-3">
                <h2>Leárazás</h2>
                <p>Nagy akció minden leárazott termékre!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/carousel2.jpg" class="d-block w-100" alt="leárazás">
            <div class="carousel-caption d-none d-md-block text-dark fs-3">
                <h2>Black friday</h2>
                <p>Pénteken minden termékre 30% kedvezmény!</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="row mx-auto my-3">
    <h3 class="my-1">Népszerű termékek</h3>

    <?php
        $sql = "SELECT nev, ar, kep_url, alkategoria_id FROM termek LIMIT 4";
        $query = $pdo->prepare($sql);
        $query->execute();

        while($row = $query->fetch()){
            $termek_nev = $row['nev'];
            $termek_link = atalakitas_link($termek_nev);
            $termek_ar = $row['ar'];
            $termek_kep = $row['kep_url'];
            $termek_alkategoria = $row['alkategoria_id'];

            $sql1 = "SELECT alkategoria_nev, kategoria_id FROM alkategoria WHERE id = " . $termek_alkategoria;
            $query1 = $pdo->prepare($sql1);
            $query1->execute();
            $alkategoria = $query1->fetch();
            $kategoria_id = $alkategoria['kategoria_id'];
            $alkategoria_link = atalakitas_link($alkategoria['alkategoria_nev']);

            $sql2 = "SELECT kategoria_nev FROM kategoria WHERE id = " . $kategoria_id;
            $query2 = $pdo->prepare($sql2);
            $query2->execute();
            $kategoria = $query2->fetch();
            $kategoria_link = atalakitas_link($kategoria['kategoria_nev']);

            echo '<div class="col-xl-3 col-md-6 col-mb-3">
                    <div class="card my-2">
                        <img src="' . $termek_kep . '" class="card-img-top mt-2 mx-auto px-2" alt="' . $termek_nev . '">
                        <div class="card-body">
                            <h2 class="card-title fs-3" title="' . $termek_nev . '">' . $termek_nev . '"</h2>
                            <p class="text-danger my-3 fs-4">Ár: ' . $termek_ar . ' Ft</p>
                            <div class="d-flex justify-content-around kosar-reszletek">
                                <a href="' . $kategoria_link . '/' . $alkategoria_link . '/' . $termek_link . '" class="btn btn-primary">Részletek</a>
                                <form>
                                    <button type="submit" class="btn btn-success">Kosárba</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    ?>
</div>

<div class="row mx-auto my-3">
    <h3 class="my-1">Kiemelt termékek</h3>

    <?php
        $sql = "SELECT nev, ar, kep_url, alkategoria_id FROM termek LIMIT 4";
        $query = $pdo->prepare($sql);
        $query->execute();

        while($row = $query->fetch()){
            $termek_nev = $row['nev'];
            $termek_link = atalakitas_link($termek_nev);
            $termek_ar = $row['ar'];
            $termek_kep = $row['kep_url'];
            $termek_alkategoria = $row['alkategoria_id'];

            $sql1 = "SELECT alkategoria_nev, kategoria_id FROM alkategoria WHERE id = " . $termek_alkategoria;
            $query1 = $pdo->prepare($sql1);
            $query1->execute();
            $alkategoria = $query1->fetch();
            $kategoria_id = $alkategoria['kategoria_id'];
            $alkategoria_link = atalakitas_link($alkategoria['alkategoria_nev']);

            $sql2 = "SELECT kategoria_nev FROM kategoria WHERE id = " . $kategoria_id;
            $query2 = $pdo->prepare($sql2);
            $query2->execute();
            $kategoria = $query2->fetch();
            $kategoria_link = atalakitas_link($kategoria['kategoria_nev']);

            echo '<div class="col-xl-3 col-md-6 col-mb-3">
                    <div class="card my-2">
                        <img src="' . $termek_kep . '" class="card-img-top mt-2 mx-auto px-2" alt="' . $termek_nev . '">
                        <div class="card-body">
                            <h2 class="card-title fs-3" title="' . $termek_nev . '">' . $termek_nev . '</h2>
                            <p class="text-danger my-3 fs-4">Ár: ' . $termek_ar . ' Ft</p>
                            <div class="d-flex justify-content-around kosar-reszletek">
                                <a href="' . $kategoria_link . '/' . $alkategoria_link . '/' . $termek_link . '" class="btn btn-primary">Részletek</a>
                                <form>
                                    <button type="submit" class="btn btn-success">Kosárba</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    ?>
</div>

</main>