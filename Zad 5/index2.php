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

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="./index.php">Strona główna</a>
				</li>

				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Typ auta
				  </a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#">kupe</a></li>
					<li><a class="dropdown-item" href="#">sedes</a></li>
					<li><a class="dropdown-item" href="#">kombi</a></li>
				  </ul>
				</li>

				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Marki
				  </a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#">Fiat</a></li>
					<li><a class="dropdown-item" href="#">Ford</a></li>
					<li><a class="dropdown-item" href="#">Folkswagen</a></li>
				  </ul>
				</li>
				<li class="nav-item">
				  <a class="nav-link"  href="#">O firmie</a>
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
  
  
	<?php
	if(isset($_GET['id']))
	{
		$q = "SELECT * FROM pojazd WHERE id='$_GET[id]'";
		//echo $q;
		$wynik = mysqli_query($conn, $q);
		while($row = mysqli_fetch_assoc($wynik))
		{
			echo("<div class='container text-center'>");
			echo("<div class='row'>");
			echo("<div class='col-md-6'>");
			echo("<h1>$row[marka] $row[model]</h1>");
			echo("<h2>Cena: $row[cena] PLN</h2>");
			echo("<h2>Przebieg: $row[przebieg] km</h2>");
			echo("</div>");
			echo("<div class='col-md-6'>");
			echo("<img src=\"./img/$row[zdjecie]\" alt=\"$row[zdjecie]\" class='img-fluid img-thumbnail'>");
			echo("</div>");
			echo("</div>");
			echo("</div>");
		}
	}
	?>
	
	<footer class="border">
		strona wykonana przez mm, 2022
	</footer>
	
	<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>