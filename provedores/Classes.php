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
    private $status_entidade;

    public function __construct() {
        
        $this->conexao = new Conexao();

    }

    public function inserirEntidade($cnpj_entidade, $nome_empresa_entidade, $contato_entidade, $logradouro_entidade, $numero_entidade, $bairro_entidade, $cidade_entidade, $uf_entidade, $cep_entidade, $email_entidade, $status_entidade){

        // logica de inserir os dados no db (pausa para assistir o jogo e almoçar)

        $query = "INSERT INTO tb_entidades (cnpj_entidade, nome_empresa_entidade, contato_entidade, logradouro_entidade, numero_entidade, bairro_entidade, cidade_entidade, uf_entidade, cep_entidade, email_entidade, status_entidade) VALUES (:cnpj_entidade, :nome_empresa_entidade, :contato_entidade, :logradouro_entidade, :numero_entidade, :bairro_entidade, :cidade_entidade, :uf_entidade, :cep_entidade, :email_entidade, :status_entidade)";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cnpj_entidade', $cnpj_entidade);
        $stmt->bindValue(':nome_empresa_entidade', $nome_empresa_entidade);
        $stmt->bindValue(':contato_entidade', $contato_entidade);
        $stmt->bindValue(':logradouro_entidade', $logradouro_entidade);
        $stmt->bindValue(':numero_entidade', $numero_entidade);
        $stmt->bindValue(':bairro_entidade', $bairro_entidade);
        $stmt->bindValue(':cidade_entidade', $cidade_entidade);
        $stmt->bindValue(':uf_entidade', $uf_entidade);
        $stmt->bindValue(':cep_entidade', $cep_entidade);
        $stmt->bindValue(':email_entidade', $email_entidade);
        $stmt->bindValue(':status_entidade', $status_entidade);

        $stmt->execute();

    }

    public function verificaEntidade($cnpj_entidade) {

        $query = 'SELECT COUNT(*) AS total FROM tb_entidades WHERE cnpj_entidade = :cnpj_entidade';

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cnpj_entidade', $cnpj_entidade);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetch(PDO::FETCH_ASSOC);


    }

}

class Entidades_pf {

    private $id_entidade_pf;
    private $conexao;
    private $cpf_entidade_pf;
    private $nome_entidade_pf;
    private $email_entidade_pf;
    private $contato_entidade_pf;
    private $status_entidade_pf;

    public function __construct() {
        
        $this->conexao = new Conexao();

    }

    public function inserirEntidadePf($cpf_entidade_pf, $nome_entidade_pf, $email_entidade_pf, $contato_entidade_pf, $status_entidade_pf){

        $query = "INSERT INTO tb_entidades_pf (cpf_entidade_pf, nome_entidade_pf, email_entidade_pf, contato_entidade_pf, status_entidade_pf) VALUES (:cpf_entidade_pf, :nome_entidade_pf, :email_entidade_pf, :contato_entidade_pf, :status_entidade_pf)";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_entidade_pf', $cpf_entidade_pf);
        $stmt->bindValue(':nome_entidade_pf', $nome_entidade_pf);
        $stmt->bindValue(':email_entidade_pf', $email_entidade_pf);
        $stmt->bindValue(':contato_entidade_pf', $contato_entidade_pf);
        $stmt->bindValue(':status_entidade_pf', $status_entidade_pf);

        $stmt->execute();

    }

    public function verificaEntidadePF($cpf_entidade_pf) {

        $query = 'SELECT COUNT(*) AS total FROM tb_entidades_pf WHERE cpf_entidade_pf = :cpf_entidade_pf';

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_entidade_pf', $cpf_entidade_pf);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetch(PDO::FETCH_ASSOC);


    }


}
