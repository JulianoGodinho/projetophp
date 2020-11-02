<?php 
    class AnimalListaView {
        public static function gerarLista($lista) {

            echo "
                <form action='cadastro.php' method='get'>
                <div class='row' style='background-color:#555555; color:#ffffff;'>
                    <div class='col-md-1'>
                      
                    </div>
                    <div class='col-md-1 text-center' style='margin-right:50px;'>
                        ID
                    </div>
                    <div class='col-md-1 text-center'>
                        Espécie
                    </div>
                    <div class='col-md-1 text-center' style='margin-left:40px;'>
                        Nome
                    </div>
                    <div class='col-md-1 text-center'style='margin-left:50px;'>
                        Alimentação
                    </div>
                    
                    <div class='col-md-1 text-center' style='margin-left:50px;'>
                        Habitat
                    </div> 
                    
                    <div class='col-md-1 text-center' style='margin-left:40px;'>
                        Peso
                    </div> 
                    
                    
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
                            

                        <div class='col-md-1'>
                            <button class='btn' type='submit' name='selAnimal' value= $id style='height:100%; width:100%; padding:0px!important;'>
                                <img src='img/$foto' style='height:100%; width:100%;' alt=''>
                            </button>
                        </div>
                       

                        <div class='col-md-1' style='margin-right:50px;'>
                            $id
                        </div>

                        <div class='col-md-1' style='margin-right:50px;'>
                            $especie
                        </div>

                        <div class='col-md-1' style='margin-right:50px;'>
                            $nome
                        </div>

                        <div class='col-md-1' style='margin-right:50px;'>
                            $alimento
                        </div>
                        <div class='col-md-1' style='margin-right:50px;'>
                            $habitat
                        </div>

                        <div class='col-md-1'>
                            $peso
                        </div>

                        <div class='col-md-1'>
                            <button class='btn' type='submit' name='delAnimal' value= $id style='height:100%; background-color:transparent;'>
                                <img src= 'img/delete.png' style='height:50%; width:50%;'>
                            </button> 
                        </div>

                        <div class='col-md-1'>
                            <button class='btn' type='submit' name='selAnimal' value= $id style='height:100%; background-color:transparent;'>
                                <img src= 'img/edit.png' style='height:50%; width:50%;'>
                            </button> 
                        </div>
                        
                    
                    </div>

             
                            
                    ";



                }

                echo "</form>";
                
        }

        
    }


?>