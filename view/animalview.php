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
            <div class='col-md-4' style='margin-top:10px;'>
            <div class='img-thumbnail' style='background-color: rgba(0,0,0,0.9); color:white;'>
                <img src='img/$fotoAnimal' style='width:100%; height:100%;'>
                <div class='caption'>
                    <h2 style='font-size:1.5em;'>$nomeAnimal</h2>
                    <br>
                    <p style='color:gold;'>Especie: $especieAnimal</p> 
                    <p style='color:gold;'>Nome científico: $nomeCientificoAnimal</p>
                    <p style='font-size:0.8em; text-align:justify; height:100px;'>$descricaoAnimal</p>                    
                    <p style='color:gold;'>Alimentação: $alimentoAnimal</p>
                    <p style='color:deeppink;'>Habitat: $habitatAnimal</p>
                    <p style='color:gold;'>Peso: $pesoAnimal</p>
                </div>
            </div>
        </div>
            ";

        }



    }

?>