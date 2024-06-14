<?php 

include 'Conexao.php';
$conexao = new Conexao;
date_default_timezone_set('America/Sao_Paulo');

class Entidades {

    private $id_entidade;
    private $conexao;
    private $cnpj_entidade;
    private $nome_empresa_entidade;
    private $contato_entidade;
    private $logradouro_entidade;
    private $numero_entidade;
    private $bairro_entidade;
    private $cidade_entidade;
    private $uf_entidade;
    private $cep_entidade;
    private $email_entidade;

    public function __construct() {
        
        $this->conexao = new Conexao();

    }

    public function inserirEntidade(){

        // logica de inserir os dados no db (pausa para assistir o jogo e almoçar)

    }




}
