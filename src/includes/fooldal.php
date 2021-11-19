<?php
    include('config.php');
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

    <div class="col-xl-3 col-md-6 col-mb-3">
        <div class="card my-2">
            <img src="img/phone1.jpg" class="card-img-top mt-2 mx-auto px-2" alt="termék neve">
            <div class="card-body">
                <h2 class="card-title fs-3"> Termék neve</h2>
                <p class="text-danger my-3 fs-4">Ár: 100 Ft</p>
                <div class="d-flex justify-content-around kosar-reszletek">
                    <a href="termek.html" class="btn btn-primary">Részletek</a>
                    <form>
                        <button type="submit" class="btn btn-success">Kosárba</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-mb-3">
        <div class="card my-2">
            <img src="img/phone1.jpg" class="card-img-top mt-2 mx-auto px-2" alt="termék neve">
            <div class="card-body">
                <h2 class="card-title fs-3"> Termék neve</h2>
                <p class="text-danger my-3 fs-4">Ár: 100 Ft</p>
                <div class="d-flex justify-content-around kosar-reszletek">
                    <a href="termek.html" class="btn btn-primary">Részletek</a>
                    <form>
                        <button type="submit" class="btn btn-success">Kosárba</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-mb-3">
        <div class="card my-2">
            <img src="img/phone1.jpg" class="card-img-top mt-2 mx-auto px-2" alt="termék neve">
            <div class="card-body">
                <h2 class="card-title fs-3"> Termék neve</h2>
                <p class="text-danger my-3 fs-4">Ár: 100 Ft</p>
                <div class="d-flex justify-content-around kosar-reszletek">
                    <a href="termek.html" class="btn btn-primary">Részletek</a>
                    <form>
                        <button type="submit" class="btn btn-success">Kosárba</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-mb-3">
        <div class="card my-2">
            <img src="img/phone1.jpg" class="card-img-top mt-2 mx-auto px-2" alt="termék neve">
            <div class="card-body">
                <h2 class="card-title fs-3"> Termék neve</h2>
                <p class="text-danger my-3 fs-4">Ár: 100 Ft</p>
                <div class="d-flex justify-content-around kosar-reszletek">
                    <a href="termek.html" class="btn btn-primary">Részletek</a>
                    <form>
                        <button type="submit" class="btn btn-success">Kosárba</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mx-auto my-3">
    <h3 class="my-1">Kiemelt termékek</h3>
    <div class="col-xl-3 col-md-6 col-mb-3">
        <div class="card my-2">
            <img src="img/phone1.jpg" class="card-img-top mt-2 mx-auto px-2" alt="termék neve">
            <div class="card-body">
                <h2 class="card-title fs-3"> Termék neve</h2>
                <p class="text-danger my-3 fs-4">Ár: 100 Ft</p>
                <div class="d-flex justify-content-around kosar-reszletek">
                    <a href="termek.html" class="btn btn-primary">Részletek</a>
                    <form>
                        <button type="submit" class="btn btn-success">Kosárba</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 col-mb-3">
        <div class="card my-2">
            <img src="img/phone1.jpg" class="card-img-top mt-2 mx-auto px-2" alt="termék neve">
            <div class="card-body">
                <h2 class="card-title fs-3"> Termék neve</h2>
                <p class="text-danger my-3 fs-4">Ár: 100 Ft</p>
                <div class="d-flex justify-content-around kosar-reszletek">
                    <a href="termek.html" class="btn btn-primary">Részletek</a>
                    <form>
                        <button type="submit" class="btn btn-success">Kosárba</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 col-mb-3">
        <div class="card my-2">
            <img src="img/phone1.jpg" class="card-img-top mt-2 mx-auto px-2" alt="termék neve">
            <div class="card-body">
                <h2 class="card-title fs-3"> Termék neve</h2>
                <p class="text-danger my-3 fs-4">Ár: 100 Ft</p>
                <div class="d-flex justify-content-around kosar-reszletek">
                    <a href="termek.html" class="btn btn-primary">Részletek</a>
                    <form>
                        <button type="submit" class="btn btn-success">Kosárba</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-mb-3">
        <div class="card my-2">
            <img src="img/phone1.jpg" class="card-img-top mt-2 mx-auto px-2" alt="termék neve">
            <div class="card-body">
                <h2 class="card-title fs-3"> Termék neve</h2>
                <p class="text-danger my-3 fs-4">Ár: 100 Ft</p>
                <div class="d-flex justify-content-around kosar-reszletek">
                    <a href="termek.html" class="btn btn-primary">Részletek</a>
                    <form>
                        <button type="submit" class="btn btn-success">Kosárba</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</main>