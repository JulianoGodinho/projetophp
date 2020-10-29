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

            session_start();
            error_reporting( E_ALL ^E_NOTICE );
            if (!isset($_SESSION["modo"])) {
                $_SESSION["modo"] = 1;
            }

            if (isset($_GET["botaoAcao"])) {
                if ($_GET["botaoAcao"] == "Gravar") {
                    $ani = new Animal(
                       null,
                       $_GET["especie"],
                       $_GET["nome"],
                       $_GET["nomeCientifico"],
                       $_GET["descricao"],
                       $_GET["alimento"],
                       $_GET["peso"],
                       $_GET["habitat"],
                       null  
                    );

                if ($_SESSION["modo"] == 1) {
                    AnimalDAO::inserir($ani);
                }  

                } else if ($_GET["botaoAcao"] == "Excluir") {
                    AnimalDAO::excluir($_GET["nome"]);
                } 
            }

            if (isset($_GET["botaoAcao"])) {
                if ($_GET["botaoAcao"] == "Excluir" || $_GET["botaoAcao"] == "Novo"){
                    $_SESSION["modo"] = 1;//inserção
                } else {
                    $_SESSION["modo"] = 2;//atualizar
                }
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
                            <a class="nav-link" href="cadastro.php">Buscar</a>
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
                <div class="col-md-12" id="jumb">
                    <h1 class="jumbotron" >Cadastro de animais</h1>
                </div>
            </div>

    <section>        
            <form method="get" action="cadastro.php">

                <div class="row">
                    <div class="col-md-4 offset-md-4">   
                        <strong><label for="especie">Espécie</label></strong>
                        <input type="text" name="especie" value= <?php if($_SESSION["modo"]==2) echo $_GET["especie"]; else echo "''"; ?>>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <strong><label for="nome">Nome</label></strong>
                        <input type="text" name="nome" value= <?php if($_SESSION["modo"]==2) echo $_GET["nome"]; else echo "''"; ?>>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <strong><label for="nomeCientidico">Nome Cientifíco</label></strong>
                        <input type="text" name="nomeCientifico" value= <?php if($_SESSION["modo"]==2) echo $_GET["nomeCientifico"]; else echo "''"; ?>>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <strong><label for="descricao">Descrição</label></strong>
                        <input type="text" id="descricao" name="descricao" value= <?php if($_SESSION["modo"]==2) echo $_GET["descricao"]; else echo "''"; ?>>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <strong><label for="alimento">Alimentação</label></strong>
                        <input type="text" name="alimento" value= <?php if($_SESSION["modo"]==2) echo $_GET["alimento"]; else echo "''"; ?>>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <strong><label for="peso">Peso</label></strong>
                        <input type="text" name="peso" value= <?php if($_SESSION["modo"]==2) echo $_GET["peso"]; else echo "''"; ?>>
                    </div>
                    <div class="col-md-4 offset-md-4" id="formulario">
                        <strong><label for="habitat">Habitat</label></strong>
                        <input type="text" name="habitat" value= <?php if($_SESSION["modo"]==2) echo $_GET["habitat"]; else echo "''"; ?>>
                    </div>
                    
                </div>

                <div class="row text-center">
                <div class="col-md-2 offset-md-2">
                    <input type="submit" name="botaoAcao" value="Novo" class="btn btn-primary">
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