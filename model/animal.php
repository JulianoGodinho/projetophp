<?php
     class Animal {
        private $id;
        private $especie;
        private $nome;
        private $nomeCientifico;
        private $descricao;
        private $alimento;
        private $peso;
        private $habitat;
        private $foto;

        public function __construct($id, $especie, $nome, $nomeCientifico, $descricao, $alimento, $peso, $habitat, $foto) {

            $this->id = $id;
            $this->especie = $especie;
            $this->nome = $nome;
            $this->nomeCientifico = $nomeCientifico;
            $this->descricao = $descricao;
            $this->alimento = $alimento;
            $this->peso = $peso;
            $this->habitat = $habitat;
            $this->foto = $foto;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($novoId) {
            $this->id = $novoId;
        }

        public function getEspecie() {
            return $this->especie;
        }

        public function setEspecie($novaEspecie) {
            $this->especie = $novaEspecie;
        }

        public function getNome() {
            return $this->nome;
        }
        
        public function setNome($novoNome) {
            $this->nome = $novoNome;
        }

        public function getNomeCientifico() {
            return $this->nomeCientifico;
        }

        public function setNomeCientifico($novoNomeCientifico) {
            $this->nomeCientifico = $novoNomeCientifico;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($novaDescricao) {
            $this->descricao = $novaDescricao;
        }

        public function getAlimento() {
            return $this->alimento;
        }

        public function setAlimento($novoAlimento) {
            $this->alimento  = $novoAlimento;
        }

        public function getPeso() {
            return $this->peso;
        }

        public function setPeso($novoPeso) {
            $this->peso = $novoPeso;
        }

        public function getHabitat() {
            return $this->habitat;
        }

        public function setHabitat($novoHabitat) {
            $this->habitat = $novoHabitat;
        }
            
        public function getFoto() {
            return $this->foto;
        }

        public function setFoto($novaFoto) {
            $this->foto = $novaFoto;
        }

   }
?>