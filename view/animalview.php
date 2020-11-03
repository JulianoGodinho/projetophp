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



            <div class='row' style='background-color:#80ff00; margin-top:20px'>
                <div class='col-md-4'>
                    <img src='img/$fotoAnimal' style='height:100%; width:100%;border:solid 1px;border-color:black;' alt=''>
                </div>

                <div class='col-md-3' style='padding-top:35px;color:black;'>
                  <ul>
                    <li>$especieAnimal</li>
                    <li>$nomeAnimal</li>
                    <li>$nomeCientificoAnimal</li>
                    <li>$alimentoAnimal</li>
                    <li>$pesoAnimal</li>
                    <li>$habitatAnimal</li>
                  </ul>
                </div>

                <div class='col-md-5'style='text-align:justify; padding-top:35px;padding-right:30px;color:black;'>
                    <p>$descricaoAnimal</p>
                </div>
             </div>


            ";

        }



    }

?>
