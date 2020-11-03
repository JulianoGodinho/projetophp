<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!--Tags básicas do head-->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arrays em PHP</title>
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
		include_once "model/animalLista.php";
		include_once "view/animallistaview.php";
		include_once "model/animal.php";
		include_once "dao/animalDAO.php";

		session_start();

		$valor = "";
		$campo = "";
		$operacao = "";
		$ordenacao = "";

		if (isset($_GET["btnFiltro"])) {

			$valor = $_GET["txtFiltro"];
			$campo = $_GET["selTipoFiltro"];
			$operacao = $_GET["selOperacao"];
			$ordenacao = $_GET["selOrdenacao"];

			if ($_GET["btnFiltro"] == "inserir") {

				header("Location: cadastro.php");

			} else if ($_GET["btnFiltro"] == "desfazer") {

				$animais = AnimalDAO::getAnimais("id", "asc", "","");

			} else if ($_GET["btnFiltro"] == "filtrar") {

				if ($valor == "") {

					$animais = AnimalDAO::getAnimais($campo, $ordenacao, "", "");

				} else {

					$animais = AnimalDAO::getAnimais($campo, $ordenacao, $operacao, $valor);

				}

			}

        } else {

			$animais = AnimalDAO::getAnimais("id", "asc", "", "");

		}


	?>
 	<div class="container">

	 <header>
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
	</header>

        <div class="row text-center" id="cabecalhoLista">
            <div class="col-md-12">
                <h1>Listagem de Animais</h1>
                <br>
            </div>

            <div class="col-md-12 text-center">

                <form method="get" action="listagem.php">
                    <div class="row">
                        <div class="col-md-1">
                            Filtro
                        </div>
                        <div class="col-md-2">
                            <input class="ajustavel" type="text" id="txtFiltro" name="txtFiltro" value="">
                        </div>
                        <div class="col-md-2">
                            <select class="ajustavel"  id="selTipoFiltro" name="selTipoFiltro">
                                <option value="especie">Espécie</option>
                                <option value="alimento">Alimentação</option>
                                <option value="habitat">Habitat</option>
								<option value="nome">Nome</option>
								<option value="peso">Peso</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="ajustavel"  id="selOperacao" name="selOperacao">
                                <option value="=">Igual</option>
                                <option value="<>">Diferente</option>
                                <option value=">">Maior</option>
                                <option value=">=">Maior ou igual</option>
                                <option value="<">Menor</option>
                                <option value="<=">Menor ou igual</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="ajustavel" id="selOrdenacao"  name="selOrdenacao">
                                <option value="asc">Crescente</option>
                                <option value="desc">Decrescente</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <input class="btn btn-primary" type="submit" name="btnFiltro" value="filtrar" style="padding:0px!important;">
                        </div>
                        <div class="col-md-1">
                            <input class="btn btn-danger" type="submit" name="btnFiltro" value="desfazer" style="padding:0px!important;">
                        </div>
                        <div class="col-md-1">
                            <input class="btn btn-success" type="submit" name="btnFiltro" value="inserir" style="padding:0px!important;">
                        </div>
					</div>
					<br><br>
                </form>
            </div>
        </div>

		<?php
			AnimalListaView::gerarLista($animais);
			if (isset($_GET["btnFiltro"])) {

				echo "
				<script>
					$('#txtFiltro').val('$valor');
					$('#selTipoFiltro').val('$campo');
					$('#selOperacao').val('$operacao');
					$('#selOrdenacao').val('$ordenacao');
			    </script>
				";

			}


		?>


    </div>


</body>

</html>
