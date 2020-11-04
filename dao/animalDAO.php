<?php
    include "conexaobanco.php";
    class AnimalDAO {

        public static function inserir($animal) {

            $con = ConexaoBanco::getConexao();
            $sql = $con->prepare("insert into animal values (null, ?, ?, ?, ?, ?, ?, ?, ?)");

            $especie = $animal->getEspecie();
            $nome = $animal->getNome();
            $nomeCientifico = $animal->getNomeCientifico();
            $descricao = $animal->getDescricao();
            $alimento = $animal->getAlimento();
            $peso = $animal->getPeso();
            $habitat = $animal->getHabitat();
            $foto = $animal->getFoto();

            $sql->bindParam(1, $especie);
            $sql->bindParam(2, $nome);
            $sql->bindParam(3, $nomeCientifico);
            $sql->bindParam(4, $descricao);
            $sql->bindParam(5, $alimento);
            $sql->bindParam(6, $peso);
            $sql->bindParam(7, $habitat);
            $sql->bindParam(8, $foto);
            $sql->execute();

        }

        public static function excluir($animal) {

            $con = ConexaoBanco::getConexao();
            $sql = null;

            if (is_numeric($animal)) {

                $sql = $con->prepare("delete from animal where id = ?");
                $sql->bindParam(1, $animal);

            } else if (is_string($animal)) {

                $sql = $con->prepare("delete from animal where nome = ?");
                $sql->bindParam(1, $animal);

            } else {

                $nome = $animal->getNome();
                $sql = $con->prepare("delete from animal where nome = ?");
                $sql->bindParam(1, $nome);

            }

            $sql->execute();

        }

        public static function atualizar($animal) {
            
            $con = ConexaoBanco::getConexao();

            $id = $animal->getId();
            $especie = $animal->getEspecie();
            $nome = $animal->getNome();
            $nomeCientifico = $animal->getNomeCientifico();
            $descricao = $animal->getDescricao();
            $alimento = $animal->getAlimento();
            $peso = $animal->getPeso();
            $habitat = $animal->getHabitat();
            $foto = $animal->getFoto();

            
            if ($id > 0) {
                if ($foto =="" || $foto == null){
                    $sql = $con->prepare("update animal set especie = ?, nome = ?, nomeCientifico = ?, descricao = ?, 
                    alimento = ?, peso = ?, habitat = ? where id = ?");
                    $sql->bindParam(8, $id);
                } else {
                    $sql = $con->prepare("update animal set especie = ?, nome = ?, nomeCientifico = ?, descricao = ?, 
                    alimento = ?, peso = ?, habitat = ?, foto = ? where id = ?");
                    $sql->bindParam(8, $foto);
                    $sql->bindParam(9, $id);

                    }
            } else {
                if ($foto =="" || $foto == null){
                    $sql = $con->prepare("update animal set especie = ?, nome = ?, nomeCientifico = ?, descricao = ?,
                    alimento = ?, peso = ?, habitat = ? where nome = ?");
                    $sql->bindParam(8, $nome);
                } else {
                    $sql = $con->prepare("update animal set especie = ?, nome = ?, nomeCientifico = ?, descricao = ?,
                    alimento = ?, peso = ?, habitat = ?, foto = ? where nome = ?");
                    $sql->bindParam(8, $foto);
                    $sql->bindParam(9, $nome);
                }
            }

                $sql->bindParam(1, $especie);
                $sql->bindParam(2, $nome);
                $sql->bindParam(3, $nomeCientifico);
                $sql->bindParam(4, $descricao);
                $sql->bindParam(5, $alimento);
                $sql->bindParam(6, $peso);
                $sql->bindParam(7, $habitat);
                

                $sql->execute();
                
        }

        public static function getAnimal($identificacao) {

            $con = ConexaoBanco::getConexao();
            $sql = null;

            if (is_numeric($identificacao)) {

                $sql = $con->prepare("select * from animal where id = ?");
                $sql->bindParam(1, $identificacao);

            } else {

                $sql = $con->prepare("select * from animal where nome = ?");
                $sql->bindParam(1, $identificacao);

            }

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();
            
            $animal = null;
            
            if ($registro = $sql->fetch()) {

                $animal = new Animal($registro["id"],
                                     $registro["especie"],
                                     $registro["nome"],
                                     $registro["nomeCientifico"],
                                     $registro["descricao"],
                                     $registro["alimento"],
                                     $registro["peso"],
                                     $registro["habitat"],
                                     $registro["foto"] );
                                                       
            } 
            
            return $animal;
            
               
        }

        public static function getAnimais($campo, $ordem, $operador, $valor) {

            $con = ConexaoBanco::getConexao();

            if ($operador == "") {

                $sql = $con->prepare("select * from animal order by  $campo $ordem");

            } else {

                $sql = $con->prepare("select * from animal where $campo $operador ? order by $campo $ordem");
                $sql->bindParam(1, $valor);

            }

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $animalLista = array();

            while ($registro = $sql->fetch()) {

                $animal = new Animal($registro["id"],
                                     $registro["especie"],
                                     $registro["nome"],
                                     $registro["nomeCientifico"],
                                     $registro["descricao"],
                                     $registro["alimento"],
                                     $registro["peso"],
                                     $registro["habitat"],
                                     $registro["foto"] 
                                    );
                $animalLista[] = $animal;

            }
            
            return $animalLista;

        }

    }


?>