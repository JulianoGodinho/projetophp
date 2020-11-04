<?php
    class AnimalView {

        public static function formarAnimal($animal) {

            $especieAnimal = $animal->getEspecie();
            $nomeAnimal = $animal->getNome();
            $nomeCientificoAnimal = $animal->getNomeCientifico();
            $descricaoAnimal = $animal->getDescricao();
            $alimentoAnimal = $animal->getAlimento();
            $pesoAnimal = $animal->getPeso();
            $habitatAnimal = $animal->getHabitat();
            $fotoAnimal = $animal->getFoto();

            echo "



            <div class='row' style='background-color:white; margin-top:20px '>
                <div class='col-md-4'>
                    <img src='img/$fotoAnimal' style='height:100%; width:100%;border:solid 1px;border-color:black;' alt=''>
                </div>

                <div class='col-md-3' style='padding-top:35px;color:black;'>
                  <ul>
                    <li><strong>Espécie:</strong> $especieAnimal</li>
                    <li><strong>Nome: </strong>$nomeAnimal</li>
                    <li><strong>Nome Cientifíco:</strong> $nomeCientificoAnimal</li>
                    <li><strong>Alimentação:</strong> $alimentoAnimal</li>
                    <li><strong>Peso:</strong> $pesoAnimal</li>
                    <li><strong>Habitar:</strong> $habitatAnimal</li>
                  </ul>
                </div>

                <div class='col-md-5'style='text-align:justify; padding-top:35px;color:black;'>
                    <strong>Descrição</strong>
                    <p>$descricaoAnimal</p>
                </div>
             </div>


            ";

        }



    }

?>
