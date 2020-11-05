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

<?php

	include_once "model/animal.php";
	include_once "view/animalview.php";
	include_once "model/animalLista.php";
	include_once "dao/animalDAO.php";
	include_once "dao/usuarioDAO.php";

	$con = ConexaoBanco::getConexao();
	
	session_start();

	if(!isset($_SESSION["logado"])) {

	$_SESSION["logado"] = false;
	}

	if(isset($_GET["entrar"])){
		$usuario = $_GET["txtUsuario"];
		$senha = $_GET["txtSenha"];

		if(UsuarioDAO::logar($usuario, $senha)){
			$_SESSION["logado"] = true;
			session_cache_expire(10);
			header("Location: listagem.php");
		}

	}

	?>



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

		<br>
		<form method="get" action="index.php">
			<div class="row">
				<div class="col-md-5" style="font-size:1.2em; color:white;">
					<strong>Quer editar os Animais?</strong>
				</div>
				<div class="col-md-1 text-center"style="color:white;">
					Usuário:	
				</div>
				<div class="col-md-2">
					<input class='ajustavel' type='text' name='txtUsuario' value='' style="color:black">	
				</div>
				<div class="col-md-1 text-center"style="color:white;">
					Senha:
				</div>
				<div class="col-md-2">
					<input class='ajustavel' type='password' name='txtSenha' value='' style="color:black">	
				</div>
				<div class="col-md-1">
					<button class='btn-primary' type='submit' name='entrar' value='entrar'>Entrar</button>	
				</div>
			</div>
		</form>
		<br>




			<div class="row text-center">

				<div class="col-md-12" id="titulo">
						<h2>Espécies</h2>
				</div>

			</div>



			<?php

				

				$listaAnimal = AnimalDAO::getAnimais("nome", "asc","","");

				foreach ($listaAnimal as $animal) {
					AnimalView::formarAnimal($animal);
				}

			?>





			</div>


</body>

</html>
