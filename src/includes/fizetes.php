<?php
    include('config.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nev = $_POST['vezeteknev'] . ' ' . $_POST['keresztnev'];
        $telefonszam = $_POST['telefonszam'];
        $cim = $_POST['iranyitoszam'] . ' ' . $_POST['varos'] . ', ' . $_POST['utca'] . ' ' . $_POST['hazszam'];

        $id = 'NULL';
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
        }
        
        $sql = "INSERT INTO megrendelesek(id, kosar_id, user_id, megrendeles_ideje, statusz, nev, cim, phone) VALUES (DEFAULT, '" . $_SESSION["kosarId"]["id"] . "', " . $id . ", '" . date("Y.m.d") . "', '" . "előkészítés alatt" . "', '" . $nev . "', '" . $cim . "', '" . $telefonszam . "')";
        $query = $pdo->prepare($sql);
        $query->execute();

        $sql = "UPDATE kosar SET vegosszeg = " . $_SESSION['vegosszeg'] . " WHERE id = " . $_SESSION['kosarId']["id"];
        $query = $pdo->prepare($sql);
        $query->execute();
        
        $_SESSION['kosarId'] = 0;
        $_SESSION['vegosszeg'] = 0;
    }
?>


<main class="container">
<link rel="stylesheet" href="/css/custom.css">
    <div class="row mb-5 justify-content-center">
        <h1 class="mt-5 mb-1 fs-2 text-center">Fizetés: <span class="text-danger"><?php echo $_SESSION["vegosszeg"]; ?> Ft</span></h1>
        <div class="mb-3 text-center"><a href="/bejelentkezes">Jelentkezzen be</a>, vagy rendeljen vendégként!</div>
        <h2 class="fs-3 text-center">Adja meg az alábbi adatokat</h2>
        <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST" class="col-12 col-lg-6 mb-3">
            <div class="row mb-3">
                <div class="fs-5">Teljes név</div>
                <div class="form-floating mb-3 col-12 col-sm-6">
                    <input type="text" name="vezeteknev" class="form-control pt-3 fs-5" id="floatingVezeteknev" placeholder="Vezetéknév" required>
                    <label for="floatingVezeteknev" class="ps-4 pt-1">Vezetéknév</label>
                </div>
                <div class="form-floating mb-3 col-12 col-sm-6">
                    <input type="text" name="keresztnev" class="form-control pt-3 fs-5" id="floatingKeresztnev" placeholder="Keresztnév" required>
                    <label for="floatingKeresztnev" class="ps-4 pt-1">Keresztnév</label>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="telefonszam" class="form-control pt-3 fs-5" id="floatingTelefonszam" placeholder="Telefonszám" required>
                <label for="floatingTelefonszam" class="pt-1">Telefonszám</label>
            </div>
            <div class="row mb-3">
                <div class="fs-5">Cím</div>
                <div class="form-floating mb-3">
                    <input type="text" name="utca" class="form-control pt-3 fs-5" id="floatingUtca" placeholder="Utca" required>
                    <label for="floatingUtca" class="ps-4 pt-1">Utca</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="hazszam" class="form-control pt-3 fs-5" id="floatingHazszam" placeholder="Házszám" required>
                    <label for="floatingHazszam" class="ps-4 pt-1">Házszám (emelet/ajtó)</label>
                </div>
                <div class="form-floating mb-3 col-12 col-sm-6">
                    <input type="text" name="varos" class="form-control pt-3 fs-5" id="floatingVaros" placeholder="Város" required>
                    <label for="floatingVaros" class="ps-4 pt-1">Város</label>
                </div>
                <div class="form-floating mb-3 col-12 col-sm-6">
                    <input type="text" name="iranyitoszam" class="form-control pt-3 fs-5" id="floatingIranyitoszam" placeholder="Irányítószám" required>
                    <label for="floatingIranyitoszam" class="ps-4 pt-1">Irányítószám</label>
                </div>
            </div>
            <div class="d-flex justify-content-evenly">
                <button type="submit" class="btn btn-success px-4">Fizetés</button>
            </div>
        </form>
    </div>
</main>