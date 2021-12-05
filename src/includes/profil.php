<main class="mx-auto">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/profil.css">
    <div class="container px-0">
        <div class="row pt-4">
            <div class="col-3">
                <h1 class="fs-2">Profil</h1>
                <div class="fs-5"><?php echo $_SESSION['email'] ?></div>
            </div>
            <div class="col-9">
                <table class="table table-striped mb-5">
                    <caption class="fs-3 text-center">Folyamatban lévő megrendelések</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dátum</th>
                            <th scope="col">Státusz</th>
                            <th scope="col">Ár</th>
                            <th scope="col">Cím</th>
                            <th scope="col">Név</th>
                            <th scope="col">Telefonszám</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            session_start();
                            $sql = "SELECT * FROM megrendelesek join kosar on megrendelesek.kosar_id = kosar.id WHERE megrendelesek.user_id = " . $_SESSION["id"] . " AND statusz != 'kézbesítve'";
                            $query = $pdo->prepare($sql);
                            $query->execute();

                            while($row = $query->fetch()){
                                echo '<tr>
                                        <th scope="row">' . $row['id'] . '</th>
                                        <td>' . $row['megrendeles_ideje'] . '</td>
                                        <td>' . $row['statusz'] . '</td>
                                        <td>' . $row['vegosszeg'] . ' Ft</td>
                                        <td>' . $row['cim'] . '</td>
                                        <td>' . $row['nev'] . '</td>
                                        <td>' . $row['phone'] . '</td>
                                    </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <table class="table table-striped mb-5">
                    <caption class="fs-3 text-center">Korábbi megrendelések</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dátum</th>
                            <th scope="col">Státusz</th>
                            <th scope="col">Ár</th>
                            <th scope="col">Cím</th>
                            <th scope="col">Név</th>
                            <th scope="col">Telefonszám</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM megrendelesek join kosar on megrendelesek.kosar_id = kosar.id WHERE megrendelesek.user_id = " . $_SESSION["id"] . " AND statusz = 'kézbesítve'";
                        $query = $pdo->prepare($sql);
                        $query->execute();

                        while($row = $query->fetch()){
                            echo '<tr>
                                    <th scope="row">' . $row['id'] . '</th>
                                    <td>' . $row['megrendeles_ideje'] . '</td>
                                    <td>' . $row['statusz'] . '</td>
                                    <td>' . $row['vegosszeg'] . ' Ft</td>
                                    <td>' . $row['cim'] . '</td>
                                    <td>' . $row['nev'] . '</td>
                                    <td>' . $row['phone'] . '</td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>