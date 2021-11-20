<?php
    include_once('config.php');
?>

<header class="p-1 text-white mx-auto">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="https://webshop-beadando.000webhostapp.com" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="/img/logo.png" alt="logo" width="50" height="50">
            </a>

            <?php
                $sql = "SELECT * FROM kategoria";
                $query = $pdo->prepare($sql);
                $query->execute();

                while($row = $query->fetch()){
                    $kategoria_nev = $row['kategoria_nev'];
                
                    echo '<div class="dropdown">
                            <a class="btn text-light" href="/' . urlencode($kategoria_nev) . '" role="button"
                                aria-expanded="false">
                                ' . $kategoria_nev . '
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                ';

                    $sql1 = "SELECT alkategoria_nev FROM alkategoria WHERE kategoria_id = " . $row['id'];
                    $query1 = $pdo->prepare($sql1);
                    $query1->execute();

                    while($row1 = $query1->fetch()){
                        $alkategoria_nev = $row1['alkategoria_nev'];

                        echo '<li><a class="dropdown-item" href="/' . urlencode($kategoria_nev) . '/' . urlencode($alkategoria_nev) . '">' . $alkategoria_nev . '</a></li>';
                    }
                    
                    echo '
                        </ul>
                    </div>';
                }
            ?>

            <div
                class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start ms-auto">
                <form class="col-12 col-lg-auto mb-5 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..."
                        aria-label="Search">
                </form>

                <div>
                    <a class="ikon" href="#"><img src="/img/cart.png" alt="kosár" width="30" height="30"></a>
                    <a class="ms-2 ikon" href="/bejelentkezes"><img src="/img/login.png" alt="bejelentkezés" width="30"
                            height="30"></a>
                    <a class="ms-2 ikon" href="/profil"><img src="/img/profile.png" alt="profil" width="30"
                            height="30"></a>
                </div>
            </div>


        </div>
    </div>
</header>