<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!--Tags básicas do head-->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mundo Animal</title>
	<!--Link dos nossos arquivos CSS e JS padrão-->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="js/scripts.js"></script>
	<!--Link dos arquivos CSS e JS do Bootstrap-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>

<body>
	<div class="container">
		<div class="row">	

		   <div class="col-md-12"> 
			   <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nave">
					<a class="navbar-brand" href="#">Mundo Animal</a>
				    <button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="cadastro.php">Cadastro</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="listagem.php">Buscar</a>
							</li>					
							
						</ul>
						<form class="form-inline my-2 my-lg-0">
							<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form>
					</div>
				</nav>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div id="demo" class="carousel slide" data-ride="carousel">

					<!-- Indicators -->
					<ul class="carousel-indicators">
						<li data-target="#demo" data-slide-to="0" class="active"></li>
						<li data-target="#demo" data-slide-to="1"></li>
						<li data-target="#demo" data-slide-to="2"></li>
					</ul>

					<!-- The slideshow -->
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="img/leao.jpg" alt="Leão">
						</div>
						<div class="carousel-item">
							<img src="img/aguia.jpg" alt="Chicago">
						</div>
						<div class="carousel-item">
							<img src="img/iguana.jpg" alt="New York">
						</div>
					</div>

					<!-- Left and right controls -->
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>

				</div>
			</div>
		</div>	


			

			<div class="row text-center">

				<div class="col-md-12" id="jumb">
					<h1 class="jumbotron">Espécies</h1>
				</div>

			</div>

			

			<?php

				include_once "model/animal.php";
				include_once "view/animalview.php";
				include_once "model/animalLista.php";

				$lista = new AnimalLista();
				$lista->carregarAnimal();

				$listaAnimal = $lista->pegarAnimal();

				foreach ($listaAnimal as $animal) {
					AnimalView::formarAnimal($animal);
				}
 
			?>

			



			</div>


</body>

</html>