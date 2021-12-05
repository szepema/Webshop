<?php
	include_once('config.php');

	if($_SERVER["REQUEST_METHOD"] == "POST"){
        include('kosarba.php');
    }

	$sql = "SELECT id, alkategoria_nev from alkategoria WHERE alkategoria_nev = '" . urldecode(explode('/', $_SERVER['REQUEST_URI'])[2]) . "'";
	$query = $pdo->prepare($sql);
	$query->execute();
	$alkategoria = $query->fetch();
?>

<main class="mx-auto">

	<link rel="stylesheet" type="text/css" href="/css/custom.css">
	<link rel="stylesheet" type="text/css" href="/css/alkategoria.css">

	<h1><?php echo $alkategoria['alkategoria_nev']; ?></h1>

	<?php
		$sql1 = "SELECT id, nev, ar, kep_url, raktaron FROM termek WHERE alkategoria_id = " . $alkategoria['id'];
		$query1 = $pdo->prepare($sql1);
		$query1->execute();
		while($row = $query1->fetch()){
			$termek_nev = $row['nev'];
			echo '<div class="row mx-auto my-3">
					<div class="col-xl-3 col-md-6 position-relative">
						<img src="' . $row['kep_url'] . '" class="position-absolute top-50 start-50 translate-middle" alt="' . $termek_nev . '">
					</div>
					<div class="col-xl-6 col-md-12">
						<div class="row mx-auto my-2">
							<h2 class="fs-3">' . $termek_nev . '</h2>
						</div>
						<div class="row mx-auto my-3">
							<div class="col-xl-12 col-md-12">
								<ul class="my-list">';

			$sql2 = "SELECT * FROM termek_adatok WHERE termek_id = " . $row['id'] . " LIMIT 4";
			$query2 = $pdo->prepare($sql2);
			$query2->execute();
			while($row2 = $query2->fetch()){
				echo '	<li>' . $row2['adat_nev'] . ': ' . $row2['adat_ertek'] . ' ' . $row2['mertekegyseg'] . '</li>';
			}

			echo				'</ul>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6">
						<div class="row mx-auto my-2">
							<h2 class="text-danger fs-3">Ár: ' . $row['ar'] . ' Ft</h2>
						</div>
						<div class="row mx-auto my-3">
							<p>Raktáron: ' . $row['raktaron'] . ' db</p>
						</div>
						<div class="row mx-auto my-5">
							<div class="d-flex justify-content-around">
								<a href="' . $_SERVER['REQUEST_URI'] . '/' . urlencode($termek_nev) . '" class="btn btn-primary">Részletek</a>
								<form action=' . $_SERVER["REQUEST_URI"] . ' method="post">
									<input type="hidden" name="hanyDarab" value="1" class="form-control">
									<input type="hidden" name="termekId" value="' . $row["id"] . '" class="form-control">
									<button type="submit" class="btn btn-success">Kosárba</button>
								</form>
							</div>
						</div>
					</div>
				</div>';
		}
	?>

</main>