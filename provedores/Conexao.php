<?php 

class Conexao {

    private $host = "localhost";
    private $dbnome = "db_certlock";
    private $usuariodb = "root";
    private $senha = "";


    public function Conectar(){

        try {
            $conexao = new PDO(

                "mysql:host=$this->host;
                       dbname=$this->dbnome", 
                       "$this->usuariodb", 
                       "$this->senha",
                       [
                           PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                       ]

            );
            return $conexao;
            
        } 
        catch (PDOException $e){

            echo '<p>' .$e->getMessage() . ' </p>';
            
        }

        
    }

}