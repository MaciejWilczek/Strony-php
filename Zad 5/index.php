<?php
require_once('baza.php');

$conn = mysqli_connect($host, $user, $passwd, $db);
if (!$conn) {
	die('' . mysqli_connect_error());
}
?>


<!doctype html>
<html lang="pl">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-md bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="./index.php">
					<img src="img/brand.png" alt="Komis" width="30" height="24">
				</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="./index.php">Strona główna</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								Typ auta
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">kupe</a></li>
								<li><a class="dropdown-item" href="#">sedes</a></li>
								<li><a class="dropdown-item" href="#">kombi</a></li>
							</ul>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								Marki
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Fiat</a></li>
								<li><a class="dropdown-item" href="#">Ford</a></li>
								<li><a class="dropdown-item" href="#">Folkswagen</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">O firmie</a>
						</li>
					</ul>
					<form class="d-flex" role="search">
						<input class="form-control me-2" type="search" placeholder="Szukaj" aria-label="Search">
						<button class="btn btn-outline-success" type="submit">Szukaj</button>
					</form>
				</div>
			</div>
		</nav>
	</header>
	<main>

		<div class="container text-center">

			<div class="row">

				<div class="col d-block mx-auto">

					<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
						<div class="carousel-indicators">
							<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
								class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
								aria-label="Slide 2"></button>
							<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
								aria-label="Slide 3"></button>
						</div>
						<div class="carousel-inner">
							<?php
							$q = "SELECT * FROM pojazd WHERE promowane=1 LIMIT 3";
							$wynik = mysqli_query($conn, $q);
							$iterator = 0;
	
							while ($row = mysqli_fetch_assoc($wynik)) {
								//echo"<pre>"; print_r($row); echo"</pre>";
								if($iterator==0)
									echo ("<div class=\"carousel-item active\">");
								else
									echo ("<div class=\"carousel-item\">");
								echo ("<a href=\"index2.php?id=$row[id]\">");
								echo ("<img src=\"img/$row[zdjecie]\" class=\"d-block w-100 img-fluid\" alt=\"czerwona\">");
								echo ("<div class=\"carousel-caption d-none d-md-block\">");
								echo ("<h5>$row[marka] $row[model]</h5>");
								echo ("<p>Rocznik: $row[rocznik], Przebieg: $row[przebieg]km<br>Okazja!</p>");
								echo ("</div>");
								echo ("</a>");
								echo ("</div>");
								$iterator++;
							}
							?>
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



				</div>

			</div>
			<div class="row">
				<div>
					<h1>Promowane oferty</h1>
				</div>
			</div>

			<div class="row">

				<?php
				$q = "SELECT * FROM pojazd WHERE promowane='1'";
				//echo $q;
				$wynik = mysqli_query($conn, $q);
				//echo"<pre>"; print_r($wynik); echo"</pre>";

				while ($row = mysqli_fetch_assoc($wynik)) {
					//echo"<pre>"; print_r($row); echo"</pre>";
					echo ("<div class=\"col-sm-6 col-md-4\">");
					echo ("<a href=\"index2.php?id=$row[id]\">");
					echo ("<img class=\"img-fluid\" src=\"img/$row[zdjecie]\" alt=\"$row[marka] $row[model]\"><br>");
					echo ("<p class=\"nazwa\">$row[marka] $row[model]</p>");
					echo ("</a>");
					echo ("<p class=\"cena\">cena: $row[cena] zł</p>");
					echo ("</div>");
				}
				?>



			</div>
		</div>


	</main>

	<footer class="border">
		strona wykonana przez mm, 2022
	</footer>

	<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
mysqli_close($conn);
?>