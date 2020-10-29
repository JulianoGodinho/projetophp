<?php 
    class AnimalListaView {
        public static function gerarLista($lista) {

            echo "
                <form action='cadastro.php' method='get'>
                <div class='row' style='background-color:#555555; color:#ffffff;'>
                    <div class='col-md-1'>

                    </div>
                    <div class='col-md-1 text-center'>
                        Código
                    </div>
                    <div class='col-md-1'>
                        Espécie
                    </div>
                    <div class='col-md-4'>
                        Nome
                    </div>
                    <div class='col-md-1'>
                        Alimentação
                    </div>
                    <div class='col-md-1'>
                        Peso
                    </div>
                    <div class='col-md-2'>
                        Habitat
                    </div>
                ";

                $cont = 0;

                foreach ($lista as $animal) {
                    $cont++;
                    $cor = "#BBBBBB";
                    if ($cont % 2 == 0) {
                        $cor = "#DDDDDD";
                    }

                    $id = $animal->getId();
                    $especie = $animal->getEspecie();
                    $nome = $animal->getNome();
                    $nomeCientifico = $animal->getNomeCientifico();
                    $descricao = $animal->getDescricao();
                    $alimento = $animal->getAlimento();
                    $peso = $animal->getPeso();
                    $habitat = $animal->getHabitat();
                    $foto = $animal->getFoto();

                    echo "
                        <div class='row' style='background-color: $cor; border: 1px solid #AAAAAA;'>
                            <div class='col-md-1 semEspaco' style='padding-left: 0 !important; padding-right: 0 !important;'>
                                <button class='btn' type='submit' name='selPokemon' value= $id style='height:100%; width:100%; padding:0px!important;'>
                                    <img src= 'img/$foto' style='height:100%; width:100%;'>
                                </button> 
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center; justify-content: center;'>
                                <div>$id</div>
                            </div>
                            <div class='col-md-4' style='display:flex; align-items:center;'>
                                $especie
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center;'>
                                $nome
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center;'>
                                $nomeCientifico
                            </div>
                            <div class='col-md-2' style='display:flex; align-items:center;'>
                                $peso
                            </div>
                            <div class='col-md-1'>
                                <button class='btn' type='submit' name='delPokemon' value= $id style='height:100%; background-color:transparent;'>
                                    <img src= 'img/delete.png' style='height:50%; width:50%;'>
                                </button> 
                            </div>
                            <div class='col-md-1'>
                                <button class='btn' type='submit' name='selPokemon' value= $id style='height:100%; background-color:transparent;'>
                                    <img src= 'img/edit.png' style='height:50%; width:50%;'>
                                </button> 
                            </div>

                        </div>
                    ";



                }



        }


    }


?>