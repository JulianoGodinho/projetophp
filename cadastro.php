<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <title>Mundo Animal</title>

        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <script src="js/scripts.js"></script>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>

        <?php
            include_once "model/animal.php";
            include_once "dao/animalDAO.php";
            include_once "imagem.php";

            session_start();

	        if(isset($_SESSION["logado"])){
                if($_SESSION["logado"]==false){
                    header("Location: index.php");
                }
            } else {
                header("Location: index.php");
            }

            if (!isset($_SESSION["modo"])) {
                $_SESSION["modo"] = 1;
            }

            $id = "";
            $especie = "";
            $nome = "";
            $nomeCientifico = "";
            $descricao = "";
            $alimento = "";
            $peso = "";
            $habitat = "";
            $foto = "semfoto.jpg";

            if (isset($_POST["botaoAcao"])) {
                if ($_POST["botaoAcao"] == "Gravar") {

                    $id = null;
                    $especie = $_POST["especie"];
                    $nome = $_POST["nome"];
                    $nomeCientifico = $_POST["nomeCientifico"];
                    $descricao = $_POST["descricao"];
                    $alimento = $_POST["alimento"];
                    $peso = $_POST["peso"];
                    $habitat = $_POST["habitat"];
                    $arquivo = $_FILES["fileFoto"];
                    if ($arquivo != "" && $arquivo != null) {
                        $foto = Imagem::uploadImagem($arquivo, 2000, 2000, 5000, "img/");
                    }else {
                        $foto = "";
                    }
                   

                    $ani = new Animal(
                        $id,
                        $especie,
                        $nome,
                        $nomeCientifico,
                        $descricao,
                        $alimento,
                        $peso,
                        $habitat,
                        $foto
                    );

                if ($_SESSION["modo"] == 1) {
                    AnimalDAO::inserir($ani);
                } else {
                    AnimalDAO::atualizar($ani);
                    $animalAux = AnimalDAO::getAnimal($nome);
                    $foto = $animalAux->getFoto();
                }

                } else if ($_POST["botaoAcao"] == "Excluir") {
                    AnimalDAO::excluir($_POST["nome"]);
                }

                if (isset($_POST["botaoAcao"])) {
                    if (($_POST["botaoAcao"] == "Excluir") || ($_POST["botaoAcao"] == "Limpar")){
                        $_SESSION["modo"] = 1;//inserção
                    } else if ($_POST["botaoAcao"] == "Cancelar") {
                        header("Location: listagem.php");
                    }

                    else {
                        $_SESSION["modo"] = 2;//atualizar
                    }

            }


            }

            if(isset($_POST["selAnimal"])) {

                $animal = AnimalDAO::getAnimal($_POST["selAnimal"]);
                $especie = $animal->getEspecie();
                $nome = $animal->getNome();
                $nomeCientifico = $animal->getNomeCientifico();
                $descricao = $animal->getDescricao();
                $alimento = $animal->getAlimento();
                $peso = $animal->getPeso();
                $habitat = $animal->getHabitat();
                $foto = $animal->getFoto();
                $_SESSION["modo"] = 2;

            } else {
                $_SESSION["modo"] = 1;
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

            <div class="row text-center">
                <div class="col-md-12" id="titulo">
                    <h1>Cadastro de animais</h1>
                </div>
            </div>

    <section>
            <form method="post" action="cadastro.php" enctype="multipart/form-data">

                <div class="row" style="color:white;">
                    <div class="col-md-4 offset-md-4">
                        <img src="img/<?php echo $foto;?>" style="width:100%; height:100%;">  
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <input type="file" name="fileFoto">
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <strong><label for="especie">Espécie</label></strong>
                        <input type="text" name="especie" value= "<?php echo $especie;?>">
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <strong><label for="nome">Nome</label></strong>
                        <input type="text" name="nome" value= "<?php echo $nome; ?>">
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <strong><label for="nomeCientidico">Nome Cientifíco</label></strong>
                        <input type="text" name="nomeCientifico" value= "<?php echo $nomeCientifico;?>">
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <strong><label for="descricao">Descrição</label></strong>
                        <textarea name="descricao" rows="8" wrap="hard" style="width: 100%;"><?php echo "$descricao";?></textarea>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <strong><label for="alimento">Alimentação</label></strong>
                        <input type="text" name="alimento" value= "<?php echo $alimento; ?>">
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <strong><label for="peso">Peso</label></strong>
                        <input type="text" name="peso" value= <?php echo $peso; ?>>
                    </div>
                    <div class="col-md-4 offset-md-4" id="formulario">
                        <strong><label for="habitat">Habitat</label></strong>
                        <input type="text" name="habitat" value= "<?php echo $habitat;?>">
                    </div>

                </div>

                <div class="row text-center">
                <div class="col-md-2 offset-md-2">
                    <input type="submit" name="botaoAcao" value="Limpar" class="btn btn-primary">
                </div>
                <div class="col-md-2">
                    <input type="submit" name="botaoAcao" value="Gravar" class="btn btn-success">
                </div>
                <div class="col-md-2">
                    <input type="submit" name="botaoAcao" value="Excluir" class="btn btn-danger">
                </div>
                <div class="col-md-2" id="formulario">
                    <input type="submit" name="botaoAcao" value="Cancelar" class="btn btn-warning">
                </div>
            </div>


            </form>
    </section>

        </div>

</body>
            

</html>
