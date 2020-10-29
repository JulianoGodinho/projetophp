<?php
    class AnimalLista {

        private $listaAnimal = Array();

        public function carregarAnimal() {
            $a1 = new Animal(
                null,
                "Mamífero",
                "Leão",
                "Panthera leo",
                "O leão (feminino: leoa) é uma espécie de mamífero carnívoro do gênero Panthera e da família Felidae. A espécie é atualmente encontrada na África subsaariana e na Ásia, com uma única população remanescente em perigo, no Parque Nacional da Floresta de Gir, Gujarat, Índia.",
                "Carne",
                 190,
                 "Savana",
                 "fotoleao.jpg"
            );

            $this->listaAnimal[] = $a1;

        }

        public function pegarAnimal() {
            return $this->listaAnimal;
        }


    }



?>