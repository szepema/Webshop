<?php
    require_once('config.php');
    session_start();
    $_SESSION["vegosszeg"] = 0;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "DELETE FROM kosar_item WHERE kosar_id = " . $_SESSION['kosarId']['id'] . " AND termek_id = " . $_POST['termekId'];
        $query = $pdo->prepare($sql);
        $query->execute();
    }
?>

<main class="container">
    
    <link rel="stylesheet" type="text/css" href="/css/kosar.css">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <div class="row">
        <div class="col-12 col-lg-8">
            <h1 class="mt-5 mb-3">Kosár tartalma</h1>
                <?php
                    if(isset($_SESSION['kosarId']["id"]) && $_SESSION['kosarId']["id"] != 0){
                        $sql = "SELECT * FROM kosar_item join termek on kosar_item.termek_id = termek.id where kosar_id = " . $_SESSION['kosarId']["id"];
                        $query = $pdo->prepare($sql);
                        $query->execute();
                        while($row = $query->fetch()){
                            echo '<div class="row my-3">
                                    <div class="col-3">
                                        <img src="' . $row["kep_url"] . '" class="img-fluid">
                                    </div>
                                    <div class="col-9">
                                        <span class="fs-4 text-secondary">' . $row["nev"] . '</span>
                                        <div class="mt-3 fs-5 d-flex justify-content-between">
                                            <span class="amount">' . $row["mennyiseg"] . ' db</span>
                                            <span class="text-danger">' . $row["ar"] . ' Ft</span>
                                        </div>
                                        <div class="text-end">
                                            <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
                                                <input type="hidden" name="termekId" value="' . $row["id"] . '" class="form-control">
                                                <button type="submit" class="button btn-danger">eltávolít</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                                $_SESSION["vegosszeg"] += $row["mennyiseg"] * $row["ar"];
                        }
                    }
                ?>
        </div>

        <div class="col-12 col-lg-4">
            <h2 class="mt-5 mb-3">Összegzés</h2>
            <span class="fs-3"><strong>Végösszeg:</strong></span>
            <span id="finalSumValue" class="fs-4 text-danger"><strong><?php echo $_SESSION["vegosszeg"]; ?> Ft</strong></span>
            <hr>
            <a href="/fizetes" class="btn btn-success btn-lg my-3">Tovább a fizetéshez</a>
        </div>
    </div>
</main>