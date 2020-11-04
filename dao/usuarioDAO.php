<?php

    include_once "conexaobanco.php";

    class UsuarioDAO{

        public static function logar($usuario, $senha){
            $con = ConexaoBanco::getConexao();
            $sql = $con->prepare("select * from usuarios where usuario = ? and senha = ?");
            $sql->bindParam(1, $usuario);
            $sql->bindParam(2, $senha);
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            if($sql->fetch()){
                return true;
            } else {
                return false;
            }
        }


    }
?>