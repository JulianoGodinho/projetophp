<?php
    class AnimalListaView {
        public static function gerarLista($lista) {

            echo "
                <form action='cadastro.php' method='get'>

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


                          <div class='row' style='background-color:$cor; margin-bottom:20px'>
                              <div class='col-md-3'>
                                  <button class='btn' type='submit' name='selAnimal' value= $id style='height:100%; width:100%; padding:0px!important;'>
                                      <img src='img/$foto' style='height:100%; width:100%;border:solid 1px;border-color:black;' alt=''>
                                  </button>
                              </div>

                            <div class='col-md-3' style='padding-top:35px;color:black;'>
                              <ul>
                                <li><strong>Espécie:</strong> $especie</li>
                                <li><strong>Nome:</strong> $nome</li>
                                <li><strong>Nome Cientifíco:</strong> $nomeCientifico</li>
                                <li><strong>Alimentação:</strong> $alimento</li>
                                <li><strong>Peso:</strong> $peso</li>
                                <li><strong>Habitar:</strong> $habitat</li>
                              </ul>
                            </div>

                            <div class='col-md-3'style='text-align:justify; padding-top:35px;padding-right:30px;color:black;'>
                                <p>$descricao</p>
                            </div>


                        <div class='col-md-1'>
                            <button class='btn' type='submit' name='delAnimal' value= $id style='padding-top:80px; background-color:transparent;'>
                                <img src= 'img/delete.png' style='height:100%; width:100%;'>
                            </button>
                        </div>

                        <div class='col-md-1'>
                            <button class='btn' type='submit' name='selAnimal' value= $id style=' background-color:transparent;padding-top: 80px;'>
                                <img src= 'img/edit.png' style='height:100%; width:100%;'>
                            </button>
                        </div>


                    </div>



                    ";



                }

                echo "</form>";

        }


    }


?>
