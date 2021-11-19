<?php
	include_once('config.php');
	include_once('utils.php');


	$sql = "SELECT * from kategoria";
	$query = $pdo->prepare($sql);
	$query->execute();
	while($row = $query->fetch()){
		if( atalakitas_link($row['kategoria_nev']) == explode('/', $_SERVER['REQUEST_URI'])[1] ){
			$kategoria_nev = $row['kategoria_nev'];
			$kategoria_id = $row['id'];
		}
	}
?>

<main class="mx-auto">

	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/kategoria.css">

	<h1><?php echo $kategoria_nev; ?></h1>

	<?php
		$sql1 = "SELECT id, alkategoria_nev FROM alkategoria WHERE kategoria_id = " . $kategoria_id;
		$query1 = $pdo->prepare($sql1);
		$query1->execute();
		while($row = $query1->fetch()){
			$alkategoria_nev = $row['alkategoria_nev'];
			$alkategoria_id = $row['id'];

			echo '<div class="row mx-auto my-3">
					<a href="' . $_SERVER['REQUEST_URI'] . '/' . atalakitas_link($alkategoria_nev) . '" style="color: inherit; text-decoration: inherit;">
						<h3 class="my-1">' . $alkategoria_nev . '</h3>
					</a>';

			$sql2 = "SELECT nev, ar, kep_url FROM termek WHERE alkategoria_id = " . $alkategoria_id . " LIMIT 4";
			$query2 = $pdo->prepare($sql2);
			$query2->execute();
			while($row2 = $query2->fetch()){
				$termek_nev = $row2['nev'];

				echo '<div class="col-xl-3 col-md-6 col-mb-3">
						<div class="card my-2">
							<img src="' . $row2['kep_url'] . '" class="card-img-top mt-2 mx-auto px-2" alt="' . $termek_nev . '">
							<div class="card-body">
								<h2 class="card-title fs-3" title="' . $termek_nev . '">' . $termek_nev . '</h2>
								<p class="text-danger my-3 fs-4">Ár: ' . $row2['ar'] . ' Ft</p>
								<div class="d-flex justify-content-around kosar-reszletek">
									<a href="' . $_SERVER['REQUEST_URI'] . '/' . atalakitas_link($alkategoria_nev) . '/' . atalakitas_link($termek_nev) . '" class="btn btn-primary">Részletek</a>
									<form>
										<button type="submit" class="btn btn-success">Kosárba</button>
									</form>
								</div>
							</div>
						</div>
					</div>';
			}

			echo	'</div>';
		}
	?>


</main>