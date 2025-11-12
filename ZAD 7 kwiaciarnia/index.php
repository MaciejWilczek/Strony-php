<?php
	require_once("./baza.php");
	$con = mysqli_connect("$hostname","$user","$password","$db");
	if (!$con) { die("". mysqli_connect_error());}
?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kwiaciarnia</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
<body>
	<header>
		<nav class="navbar navbar-expand-md bg-light">
		  <div class="container-fluid">
			<a class="navbar-brand" href="#">
				<img src="img/brand.png" alt="kwiaciarnia" width="30" height="24">
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="#">Strona główna</a>
				</li>

				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Nasze kwiaty
				  </a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#">róże</a></li>
					<li><a class="dropdown-item" href="#">tulipany</a></li>
					<li><a class="dropdown-item" href="#">godziki</a></li>
				  </ul>
				</li>

				<li class="nav-item">
				  <a class="nav-link"  href="#">O kwiaciarni</a>
				</li>
			  </ul>
			 
			</div>
		  </div>
		</nav>
	</header>  
	<main>
	
		<div class="container text-center">


			<div class="row">
				<div>
					<h1>Propozycja bukietów</h1>
				</div>
			</div>
			
		  <div class="row">
		  <?php
		    $q = "SELECT * FROM kwiaty";
			$result = mysqli_query($con, $q);
			while ($row = mysqli_fetch_assoc($result))
			{
				echo("<div class=\"col-sm-6 col-md-4\">");
				echo("<a href=\"opis.php?id=$row[id]\">");
				echo("<img class=\"img-fluid\" src=\"img/$row[zdjecie]\" alt=\"$row[zdjecie]\"><br>");
				echo("<p class=\"nazwa\">$row[nazwa]</p>");
				echo("</a>");
				echo("<p class=\"cena\">cena: $row[cena] zł</p>");
				echo("</div>");
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
	mysqli_close($con);
?>