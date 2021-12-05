<?php
	include_once('config.php');

	if($_SERVER["REQUEST_METHOD"] == "POST"){
        include('kosarba.php');
    }

	$sql = "SELECT * FROM termek WHERE nev = '" . urldecode(explode('/', $_SERVER['REQUEST_URI'])[3]) . "'";
	$query = $pdo->prepare($sql);
	$query->execute();
	$termek= $query->fetch();
?>

<main class="mx-auto">

	<link rel="stylesheet" type="text/css" href="/css/custom.css">
	<link rel="stylesheet" type="text/css" href="/css/termek.css">


	<div class="row mx-auto my-3">
		<div class="col-xl-3 col-md-6 position-relative">
			<img src="<?php echo $termek['kep_url']; ?>" class="position-absolute top-50 start-50 translate-middle" alt="<?php echo $termek['nev']; ?>">
		</div>
		<div class="col-xl-6 col-md-12">
			<div class="row mx-auto my-2">
				<h2 class="fs-3"><?php echo $termek['nev']; ?></h2>
			</div>
			<div class="row mx-auto my-3">
				<div class="col-xl-12">
					<ul class="my-list">
						<?php
							$sql1 = "SELECT * FROM termek_adatok WHERE termek_id = " . $termek['id'] . " LIMIT 4";
							$query1 = $pdo->prepare($sql1);
							$query1->execute();
							while($row = $query1->fetch()){
								echo '<li>' . $row['adat_nev'] . ': ' . $row['adat_ertek'] . ' ' . $row['mertekegyseg'] . '</li>';
							}
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="row mx-auto my-2">
				<h2 class="text-danger fs-3">Ár: <?php echo $termek['ar']; ?> Ft</h2>
			</div>
			<div class="row mx-auto my-3">
				<p>Raktáron: <?php echo $termek['raktaron']; ?> db</p>
			</div>
			<div class="row mx-auto my-5">
				<div class="d-flex justify-content-around">
					<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
						<select name="hanyDarab" id="hanyDarab">
							<?php
								for($i = 0; $i <= intval($termek['raktaron']); $i++){
									echo '<option value="' . $i . '">' . $i . '</option>';
								}
							?>
						</select>
						<input type="hidden" name="termekId" value="<?php echo $termek['id']; ?>" class="form-control">
						<button type="submit" class="btn btn-success mt-2">Kosárba</button>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="row mx-auto my-3">
		<h3 class="my-1">Hasonló termékek</h3>
		<?php
			$sql2 = "SELECT id, nev, ar, kep_url FROM termek WHERE alkategoria_id = " . $termek['alkategoria_id'] . " AND id != " . $termek['id'] . " LIMIT 4";
			$query2 = $pdo->prepare($sql2);
			$query2->execute();
			$termek_id = [];
			while($row = $query2->fetch()){
				array_push($termek_id, $row['id']);
			}
			while(sizeof($termek_id) != 4){
				$random = mt_rand(0,20);
				if(!(in_array((string) $random, $termek_id)) && (string) $random != $termek['id']){
					array_push($termek_id, (string) $random);
				}
			}
			$sql4 = "SELECT * FROM termek JOIN alkategoria on termek.alkategoria_id = alkategoria.id join kategoria on alkategoria.kategoria_id = kategoria.id WHERE termek.id = " . $termek_id[0] . " OR termek.id = " . $termek_id[1] . " OR termek.id = " . $termek_id[2] . " OR termek.id = " . $termek_id[3];
			$query4 = $pdo->prepare($sql4);
			$query4->execute();
			while($row = $query4->fetch()){
				echo '<div class="col-xl-3 col-md-6">
						<div class="card my-2">
							<img src="' . $row['kep_url'] . '" class="mt-2 mx-auto" alt="' . $row['nev'] . '">
							<div class="card-body">
								<h2 class="card-title fs-3">' . $row['nev'] . '</h2>
								<p class="text-danger my-3 fs-4">Ár: ' . $row['ar'] . ' Ft</p>
								<div class="d-flex justify-content-around">
									<a href="https://webshop-beadando.000webhostapp.com' . '/' . urlencode($row['kategoria_nev']) . '/' . urlencode($row['alkategoria_nev']) . '/' . urlencode($row['nev']) . '" class="btn btn-primary">Részletek</a>
									<form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
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
	</div>

	<div class="row mx-auto my-3">
		<div class="col-xl col-md-3 col-mb">
			<table class="table table-striped mb-5">
				<thead>
					<tr>
						<th colspan="2" class="text-center">Adatok</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql3 = "SELECT * FROM termek_adatok WHERE termek_id = " . $termek['id'];
						$query3 = $pdo->prepare($sql3);
						$query3->execute();
						while($row = $query3->fetch()){
							echo '<tr>
									<th>' . $row['adat_nev'] . '</th>
									<td>' . $row['adat_ertek'] . $row['mertekegyseg'] . '</td>
								</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
		<div class="col-xl col-md-6 my-3">
			<h1 class="my-1 text-center">Leírás</h1>
			<div>
				<?php
					echo $termek['leiras'];
				?>
			</div>
		</div>
	</div>
</main>