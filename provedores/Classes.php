<?php

include 'Conexao.php';
include 'Interfaces.php';
$conexao = new Conexao;
date_default_timezone_set('America/Sao_Paulo');

class Entidades
{
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

    public function __construct()
    {

        $this->conexao = new Conexao();
    }

    public function inserirEntidade($cnpj_entidade, $nome_empresa_entidade, $contato_entidade, $logradouro_entidade, $numero_entidade, $bairro_entidade, $cidade_entidade, $uf_entidade, $cep_entidade, $email_entidade, $status_entidade)
    {

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

    public function chamaEntidade()
    {

        $query = "SELECT * FROM tb_entidades";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function chamaEntidadeId($id)
    {
        $query = 'SELECT id_entidade, cnpj_entidade, nome_empresa_entidade FROM tb_entidades WHERE id_entidade = :id';

        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function chamaEntidadeAtivas()
    {

        $query = "SELECT id_entidade, nome_empresa_entidade, cnpj_entidade FROM tb_entidades WHERE status_entidade = 'A'";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarEntidade($cnpj_entidade, $nome_empresa_entidade, $contato_entidade, $logradouro_entidade, $numero_entidade, $bairro_entidade, $cidade_entidade, $uf_entidade, $cep_entidade, $email_entidade, $status_entidade)
    {

        $query = "UPDATE tb_entidades SET 
                    nome_empresa_entidade = :nome_empresa_entidade,
                    contato_entidade = :contato_entidade,
                    logradouro_entidade = :logradouro_entidade,
                    numero_entidade = :numero_entidade,
                    bairro_entidade = :bairro_entidade,
                    cidade_entidade = :cidade_entidade,
                    uf_entidade = :uf_entidade,
                    cep_entidade = :cep_entidade,
                    email_entidade = :email_entidade,
                    status_entidade = :status_entidade
                  WHERE cnpj_entidade = :cnpj_entidade";

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



    public function verificaEntidade($cnpj_entidade)
    {

        $query = 'SELECT COUNT(*) AS total FROM tb_entidades WHERE cnpj_entidade = :cnpj_entidade';

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cnpj_entidade', $cnpj_entidade);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

class Entidades_pf
{

    private $id_entidade_pf;
    private $conexao;
    private $cpf_entidade_pf;
    private $nome_entidade_pf;
    private $email_entidade_pf;
    private $contato_entidade_pf;
    private $status_entidade_pf;

    public function __construct()
    {

        $this->conexao = new Conexao();
    }

    public function inserirEntidadePf($cpf_entidade_pf, $nome_entidade_pf, $email_entidade_pf, $contato_entidade_pf, $status_entidade_pf)
    {

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

    public function chamaEntidadePf()
    {

        $query = "SELECT * FROM tb_entidades_pf";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function chamaEntidadePfAtiva()
    {

        $query = "SELECT * FROM tb_entidades_pf WHERE status_entidade_pf = 'A'";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarEntidadePf($cpf_entidade_pf, $nome_entidade_pf, $email_entidade_pf, $contato_entidade_pf, $status_entidade_pf)
    {

        $query = "UPDATE tb_entidades_pf SET 
                    nome_entidade_pf = :nome_entidade_pf,
                    email_entidade_pf = :email_entidade_pf,
                    contato_entidade_pf = :contato_entidade_pf,
                    status_entidade_pf = :status_entidade_pf
                  WHERE cpf_entidade_pf = :cpf_entidade_pf";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_entidade_pf', $cpf_entidade_pf);
        $stmt->bindValue(':nome_entidade_pf', $nome_entidade_pf);
        $stmt->bindValue(':email_entidade_pf', $email_entidade_pf);
        $stmt->bindValue(':contato_entidade_pf', $contato_entidade_pf);
        $stmt->bindValue(':status_entidade_pf', $status_entidade_pf);

        $stmt->execute();
    }



    public function verificaEntidadePF($cpf_entidade_pf)
    {

        $query = 'SELECT COUNT(*) AS total FROM tb_entidades_pf WHERE cpf_entidade_pf = :cpf_entidade_pf';

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_entidade_pf', $cpf_entidade_pf);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

abstract class UsuarioAdm
{

    protected $conexao;
    protected $id_usuario_adm_pj;
    protected $cpf_usuario_adm_pj;
    protected $email_usuario_adm_pj;
    protected $nome_usuario_adm_pj;
    protected $senha_usuario_adm_pj;
    protected $status_usuario_adm_pj;
    protected $id_entidade_usuario_adm_pj;

    //dados para usuario pessoa física

    protected $id_usuario_adm_pf;
    protected $cpf_usuario_adm_pf;
    protected $email_usuario_adm_pf;
    protected $nome_usuario_adm_pf;
    protected $senha_usuario_adm_pf;
    protected $status_usuario_adm_pf;
    protected $id_entidade_usuario_adm_pf;

    public function __construct()
    {

        $this->conexao = new Conexao();
    }

    abstract function inserirUsuario($dados);
    abstract function verificaUsuario($dados);
    abstract function chamaUsuario($log);
    // abstract function chamaEntidade($id);

}


class UsuarioAdmPj extends UsuarioAdm
{


    public function inserirUsuario($dados)
    {
        // Lógica para inserir usuário PJ
        $query = "INSERT INTO tb_usuario_adm_pj (cpf_usuario_adm_pj, email_usuario_adm_pj, nome_usuario_adm_pj, senha_usuario_adm_pj, status_usuario_adm_pj, id_entidade_usuario_adm_pj) VALUES (:cpf_usuario_adm_pj, :email_usuario_adm_pj, :nome_usuario_adm_pj, :senha_usuario_adm_pj, :status_usuario_adm_pj, :id_entidade_usuario_adm_pj)";

        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_usuario_adm_pj', $dados['cpf_usuario_adm_pj']);
        $stmt->bindValue(':email_usuario_adm_pj', $dados['email_usuario_adm_pj']);
        $stmt->bindValue(':nome_usuario_adm_pj', $dados['nome_usuario_adm_pj']);
        $stmt->bindValue(':senha_usuario_adm_pj', $dados['senha_usuario_adm_pj']);
        $stmt->bindValue(':status_usuario_adm_pj', $dados['status_usuario_adm_pj']);
        $stmt->bindValue(':id_entidade_usuario_adm_pj', $dados['id_entidade_usuario_adm_pj']);

        $stmt->execute();
    }

    public function chamaUsuario($email_usuario_adm_pj)
    {

        $query = 'SELECT * FROM tb_usuario_adm_pj WHERE email_usuario_adm_pj = :email_usuario_adm_pj';
        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':email_usuario_adm_pj', $email_usuario_adm_pj);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function verificaUsuario($dados)
    {
        // Lógica para verificar usuário PJ
        $query = "SELECT COUNT(*) AS total FROM tb_usuario_adm_pj WHERE cpf_usuario_adm_pj = :cpf_usuario_adm_pj";

        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_usuario_adm_pj', $dados);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

class UsuarioAdmPf extends UsuarioAdm
{

    public function inserirUsuario($dados)
    {
        $query = "INSERT INTO tb_usuario_adm_pf (cpf_usuario_adm_pf, email_usuario_adm_pf, nome_usuario_adm_pf, senha_usuario_adm_pf, status_usuario_adm_pf, id_entidade_usuario_adm_pf) VALUES (:cpf_usuario_adm_pf, :email_usuario_adm_pf, :nome_usuario_adm_pf, :senha_usuario_adm_pf, :status_usuario_adm_pf, :id_entidade_usuario_adm_pf)";

        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_usuario_adm_pf', $dados['cpf_usuario_adm_pf']);
        $stmt->bindValue(':email_usuario_adm_pf', $dados['email_usuario_adm_pf']);
        $stmt->bindValue(':nome_usuario_adm_pf', $dados['nome_usuario_adm_pf']);
        $stmt->bindValue(':senha_usuario_adm_pf', $dados['senha_usuario_adm_pf']);
        $stmt->bindValue(':status_usuario_adm_pf', $dados['status_usuario_adm_pf']);
        $stmt->bindValue(':id_entidade_usuario_adm_pf', $dados['id_entidade_usuario_adm_pf']);

        $stmt->execute();
    }

    public function chamaUsuario($email_usuario_adm_pf)
    {

        $query = 'SELECT * FROM tb_usuario_adm_pf WHERE tb_usuario_adm_pf = :email_usuario_adm_pf';
        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':email_usuario_adm_pf', $email_usuario_adm_pf);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function chamaEntidade($id) {}

    public function verificaUsuario($dados)
    {
        // Lógica para verificar usuário PJ
        $query = "SELECT COUNT(*) AS total FROM tb_usuario_adm_pf WHERE cpf_usuario_adm_pf = :cpf_usuario_adm_pf";

        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_usuario_adm_pf', $dados);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

abstract class Clientes
{

    protected $id_cliente_pj;
    protected $conexao;
    protected $responsavel_cliente_pj;
    protected $telefone_cliente_pj;
    protected $cnpj_cliente_pj;
    protected $nome_cliente_pj;
    protected $contato_cliente_pj;
    protected $logradouro_cliente_pj;
    protected $numero_cliente_pj;
    protected $bairro_cliente_pj;
    protected $cidade_cliente_pj;
    protected $uf_cliente_pj;
    protected $cep_cliente_pj;
    protected $email_cliente_pj;
    protected $id_usuario_cliente_pj;
    protected $entidade_cliente_pj;

    // atributos clientes pf

    protected $id_cliente_pf;
    protected $cpf_cliente_pf;
    protected $nome_cliente_pf;
    protected $email_cliente_pf;
    protected $contato_cliente_pf;
    protected $id_usuario_cliente_pf;
    protected $entidade_cliente_pf;


    public function __construct()
    {

        $this->conexao = new Conexao();
    }

    abstract function inserirCliente($dados);
    abstract function consultaCliente($identificador);
    abstract function BuscaCliente($cnpj_cliente);
    abstract function ChamaCliente($id_usuario, $id_entidade);
    abstract function atualizaCliente($dados);
}

class ClientesPj extends Clientes
{


    public function __construct()
    {

        $this->conexao = new Conexao();
    }

    public function inserirCliente($dados)
    {
        $query = "INSERT INTO tb_clientes_pj (responsavel_cliente_pj, telefone_cliente_pj, cnpj_cliente_pj, nome_cliente_pj, contato_cliente_pj, logradouro_cliente_pj, numero_cliente_pj, bairro_cliente_pj, cidade_cliente_pj, uf_cliente_pj, cep_cliente_pj, email_cliente_pj, id_usuario_cliente_pj, entidade_cliente_pj) VALUES (:responsavel_cliente_pj, :telefone_cliente_pj, :cnpj_cliente_pj, :nome_cliente_pj, :contato_cliente_pj, :logradouro_cliente_pj, :numero_cliente_pj, :bairro_cliente_pj, :cidade_cliente_pj, :uf_cliente_pj, :cep_cliente_pj, :email_cliente_pj, :id_usuario_cliente_pj, :entidade_cliente_pj)";


        $conexao =  new Conexao;
        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':responsavel_cliente_pj', ucwords($dados['responsavel_cliente_pj']));
        $stmt->bindValue(':telefone_cliente_pj', $dados['telefone_cliente_pj']);
        $stmt->bindValue(':cnpj_cliente_pj', $dados['cnpj_cliente_pj']);
        $stmt->bindValue(':nome_cliente_pj', ucwords($dados['nome_cliente_pj']));
        $stmt->bindValue(':contato_cliente_pj', $dados['contato_cliente_pj']);
        $stmt->bindValue(':logradouro_cliente_pj', ucwords($dados['logradouro_cliente_pj']));
        $stmt->bindValue(':numero_cliente_pj', $dados['numero_cliente_pj']);
        $stmt->bindValue(':bairro_cliente_pj', ucwords($dados['bairro_cliente_pj']));
        $stmt->bindValue(':cidade_cliente_pj', ucwords($dados['cidade_cliente_pj']));
        $stmt->bindValue(':uf_cliente_pj', strtoupper($dados['uf_cliente_pj']));
        $stmt->bindValue(':cep_cliente_pj', $dados['cep_cliente_pj']);
        $stmt->bindValue(':email_cliente_pj', $dados['email_cliente_pj']);
        $stmt->bindValue(':id_usuario_cliente_pj', $dados['id_usuario_cliente_pj']);
        $stmt->bindValue(':entidade_cliente_pj', $dados['entidade_cliente_pj']);

        $stmt->execute();
    }

    public function consultaCliente($cnpj_cliente_pj)
    {
        // Lógica para verificar usuário PJ
        $query = "SELECT COUNT(*) AS total FROM tb_clientes_pj WHERE cnpj_cliente_pj = :cnpj_cliente_pj";

        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cnpj_cliente_pj', $cnpj_cliente_pj);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function BuscaCliente($cnpj_cliente_pj)
    {
        // Lógica para verificar usuário PJ
        $query = "SELECT * FROM tb_clientes_pj WHERE cnpj_cliente_pj = :cnpj_cliente_pj";

        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cnpj_cliente_pj', $cnpj_cliente_pj);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function BuscaClienteNomePj($nome_cliente_pj)
    {
        // Lógica para verificar usuário PJ
        $query = "SELECT cnpj_cliente_pj FROM tb_clientes_pj WHERE nome_cliente_pj = :nome_cliente_pj";

        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':nome_cliente_pj', $nome_cliente_pj);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function ChamaCliente($id_usuario_cliente_pj, $entidade_cliente_pj)
    {

        $query = "SELECT * FROM tb_clientes_pj WHERE id_usuario_cliente_pj = :id_usuario_cliente_pj AND entidade_cliente_pj = :entidade_cliente_pj";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_usuario_cliente_pj', $id_usuario_cliente_pj);
        $stmt->bindValue(':entidade_cliente_pj', $entidade_cliente_pj);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizaCliente($dados)
    {

        $query = "UPDATE tb_clientes_pj SET responsavel_cliente_pj = :responsavel_cliente_pj, telefone_cliente_pj = :telefone_cliente_pj, cnpj_cliente_pj = :cnpj_cliente_pj, nome_cliente_pj = :nome_cliente_pj, contato_cliente_pj = :contato_cliente_pj, logradouro_cliente_pj = :logradouro_cliente_pj, numero_cliente_pj = :numero_cliente_pj, bairro_cliente_pj = :bairro_cliente_pj, cidade_cliente_pj = :cidade_cliente_pj, uf_cliente_pj = :uf_cliente_pj, cep_cliente_pj = :cep_cliente_pj, email_cliente_pj = :email_cliente_pj WHERE id_cliente_pj = :id_cliente_pj";

        $conexao =  new Conexao;
        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':responsavel_cliente_pj', ucwords($dados['responsavel_cliente_pj']));
        $stmt->bindValue(':telefone_cliente_pj', $dados['telefone_cliente_pj']);
        $stmt->bindValue(':cnpj_cliente_pj', $dados['cnpj_cliente_pj']);
        $stmt->bindValue(':nome_cliente_pj', ucwords($dados['nome_cliente_pj']));
        $stmt->bindValue(':contato_cliente_pj', $dados['contato_cliente_pj']);
        $stmt->bindValue(':logradouro_cliente_pj', ucwords($dados['logradouro_cliente_pj']));
        $stmt->bindValue(':numero_cliente_pj', $dados['numero_cliente_pj']);
        $stmt->bindValue(':bairro_cliente_pj', ucwords($dados['bairro_cliente_pj']));
        $stmt->bindValue(':cidade_cliente_pj', ucwords($dados['cidade_cliente_pj']));
        $stmt->bindValue(':uf_cliente_pj', strtoupper($dados['uf_cliente_pj']));
        $stmt->bindValue(':cep_cliente_pj', $dados['cep_cliente_pj']);
        $stmt->bindValue(':email_cliente_pj', $dados['email_cliente_pj']);
        $stmt->bindValue(':id_cliente_pj', $dados['id_cliente_pj']);

        $stmt->execute();
    }
}

class ClientesPf extends Clientes
{
    public function inserirCliente($dados)
    {

        $query = "INSERT INTO tb_clientes_pf (cpf_cliente_pf, nome_cliente_pf, email_cliente_pf, contato_cliente_pf, id_usuario_cliente_pf, entidade_cliente_pf) VALUES (:cpf_cliente_pf, :nome_cliente_pf, :email_cliente_pf, :contato_cliente_pf, :id_usuario_cliente_pf, :entidade_cliente_pf)";

        $conexao =  new Conexao;
        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_cliente_pf', $dados['cpf_cliente_pf']);
        $stmt->bindValue(':nome_cliente_pf', ucwords($dados['nome_cliente_pf']));
        $stmt->bindValue(':email_cliente_pf', $dados['email_cliente_pf']);
        $stmt->bindValue(':contato_cliente_pf', $dados['contato_cliente_pf']);
        $stmt->bindValue(':id_usuario_cliente_pf', $dados['id_usuario_cliente_pf']);
        $stmt->bindValue(':entidade_cliente_pf', $dados['entidade_cliente_pf']);

        $stmt->execute();
    }

    public function consultaCliente($cpf_cliente_pf)
    {
        // Lógica para verificar usuário PJ
        $query = "SELECT COUNT(*) AS total FROM tb_clientes_pf WHERE cpf_cliente_pf = :cpf_cliente_pf";

        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_cliente_pf', $cpf_cliente_pf);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function BuscaCliente($cpf_cliente_pf)
    {
        // Lógica para verificar usuário PJ
        $query = "SELECT * FROM tb_clientes_pf WHERE cpf_cliente_pf = :cpf_cliente_pf";

        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_cliente_pf', $cpf_cliente_pf);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function BuscaClienteNomePf($nome_cliente_pf)
    {
        // Lógica para verificar usuário PJ
        $query = "SELECT cpf_cliente_pf FROM tb_clientes_pf WHERE nome_cliente_pf = :nome_cliente_pf";

        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':nome_cliente_pf', $nome_cliente_pf);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function ChamaCliente($id_usuario_cliente_pf, $entidade_cliente_pf)
    {

        $query = "SELECT * FROM tb_clientes_pf WHERE id_usuario_cliente_pf = :id_usuario_cliente_pf AND entidade_cliente_pf = :entidade_cliente_pf";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_usuario_cliente_pf', $id_usuario_cliente_pf);
        $stmt->bindValue(':entidade_cliente_pf', $entidade_cliente_pf);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizaCliente($dados)
    {

        $query = "UPDATE `tb_clientes_pf` SET `cpf_cliente_pf` = :cpf_cliente_pf, `nome_cliente_pf` = :nome_cliente_pf, `email_cliente_pf` = :email_cliente_pf, `contato_cliente_pf` = :contato_cliente_pf
        WHERE `id_cliente_pf` = :id_cliente_pf";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':cpf_cliente_pf', $dados['cpf_cliente_pf']);
        $stmt->bindValue(':nome_cliente_pf', ucwords($dados['nome_cliente_pf']));
        $stmt->bindValue(':email_cliente_pf', $dados['email_cliente_pf']);
        $stmt->bindValue(':contato_cliente_pf', $dados['contato_cliente_pf']);
        $stmt->bindValue(':id_cliente_pf', $dados['id_cliente_pf']);

        $stmt->execute();
    }
}

class Itens implements InterfaceItens
{

    private $id_item_preco;
    private $conexao;
    private $modelo_item_preco;
    private $custo_item_preco;
    private $preco_venda_item_preco;
    private $id_entidade_item_preco;


    public function __construct()
    {

        $this->conexao = new Conexao();
    }

    public function inserirItem($modelo_item_preco, $custo_item_preco, $preco_venda_item_preco, $validade_item_preco, $categoria_validade_item_preco, $id_entidade_item_preco)
    {

        $query = "INSERT INTO tb_itens_precos (modelo_item_preco, custo_item_preco, preco_venda_item_preco, validade_item_preco, categoria_validade_item_preco, id_entidade_item_preco) VALUES (:modelo_item_preco, :custo_item_preco, :preco_venda_item_preco, :validade_item_preco, :categoria_validade_item_preco, :id_entidade_item_preco)";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':modelo_item_preco', strtoupper($modelo_item_preco));
        $stmt->bindValue(':custo_item_preco', $custo_item_preco);
        $stmt->bindValue(':preco_venda_item_preco', $preco_venda_item_preco);
        $stmt->bindValue(':validade_item_preco', $validade_item_preco);
        $stmt->bindValue(':categoria_validade_item_preco', $categoria_validade_item_preco);
        $stmt->bindValue(':id_entidade_item_preco', $id_entidade_item_preco);

        $stmt->execute();
    }

    public function chamaItens($id_entidade)
    {

        $query = "SELECT * FROM tb_itens_precos WHERE id_entidade_item_preco = :id_entidade";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_entidade', $id_entidade);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizaItem($modelo_item_preco, $custo_item_preco, $preco_venda_item_preco, $id_item_preco)
    {

        $query = "UPDATE tb_itens_precos SET modelo_item_preco = :modelo_item_preco, custo_item_preco = :custo_item_preco, preco_venda_item_preco = :preco_venda_item_preco WHERE id_item_preco = :id_item_preco";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->bindValue(':modelo_item_preco', strtoupper($modelo_item_preco));
        $stmt->bindValue(':custo_item_preco', $custo_item_preco);
        $stmt->bindValue(':preco_venda_item_preco', $preco_venda_item_preco);
        $stmt->bindValue(':id_item_preco', $id_item_preco);

        $stmt->execute();
    }
}

class Vendas implements InterfaceVendas
{

    protected $id_venda;
    protected $conexao;
    protected $id_usuario_venda;
    protected $id_entidade_venda;
    protected $id_produto_venda;
    protected $data_venda;
    protected $codigo_venda;
    protected $nome_cliente_venda;
    protected $item_produto_venda;
    protected $preco_custo_venda;
    protected $desconto_venda;
    protected $preco_vendido_venda;
    protected $status_custo_venda;
    protected $status_pg_cliente_venda;

    public function __construct()
    {

        $this->conexao = new Conexao();
    }

    public function inserirVenda($dados)
    {

        $query = "INSERT INTO tb_vendas (id_usuario_venda, id_entidade_venda, id_produto_venda, data_venda, codigo_venda, nome_cliente_venda, item_produto_venda, preco_custo_venda, desconto_venda, preco_vendido_venda, status_custo_venda, status_pg_cliente_venda) VALUES (:id_usuario_venda, :id_entidade_venda, :id_produto_venda, :data_venda, :codigo_venda, :nome_cliente_venda, :item_produto_venda, :preco_custo_venda, :desconto_venda, :preco_vendido_venda, :status_custo_venda, :status_pg_cliente_venda)";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_usuario_venda', $dados['id_usuario_venda']);
        $stmt->bindValue(':id_entidade_venda', $dados['id_entidade_venda']);
        $stmt->bindValue(':id_produto_venda', $dados['id_produto_venda']);
        $stmt->bindValue(':data_venda', $dados['data_venda']);
        $stmt->bindValue(':codigo_venda', $dados['codigo_venda']);
        $stmt->bindValue(':nome_cliente_venda', $dados['nome_cliente_venda']);
        $stmt->bindValue(':item_produto_venda', $dados['item_produto_venda']);
        $stmt->bindValue(':preco_custo_venda', $dados['preco_custo_venda']);
        $stmt->bindValue(':desconto_venda', floatval(str_replace(',', '.', $dados['desconto_venda'])));
        $stmt->bindValue(':preco_vendido_venda', $dados['preco_vendido_venda']);
        $stmt->bindValue(':status_custo_venda', strtoupper($dados['status_custo_venda']));
        $stmt->bindValue(':status_pg_cliente_venda', strtoupper($dados['status_pg_cliente_venda']));
        $stmt->execute();
    }

    public function chamaVendaPorId($id_usuario_venda, $id_entidade_venda)
    {

        $query = "SELECT data_venda, codigo_venda, item_produto_venda, preco_vendido_venda, status_custo_venda FROM tb_vendas WHERE id_usuario_venda = :id_usuario_venda AND id_entidade_venda = :id_entidade_venda";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_usuario_venda', $id_usuario_venda);
        $stmt->bindValue(':id_entidade_venda', $id_entidade_venda);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function chamaHistoricoVendas($id_usuario_venda, $id_entidade_venda, $dataInicial, $dataFinal)
    {

        $query = "SELECT * FROM tb_vendas 
                    WHERE id_usuario_venda = :id_usuario_venda 
                    AND id_entidade_venda = :id_entidade_venda 
                    AND data_venda BETWEEN :dataInicial AND :dataFinal ORDER BY data_venda DESC";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id_usuario_venda', $id_usuario_venda);
        $stmt->bindParam(':id_entidade_venda', $id_entidade_venda);
        $stmt->bindParam(':dataInicial', $dataInicial);
        $stmt->bindParam(':dataFinal', $dataFinal);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function chamaMovimentacaoVendasMes($id_usuario_venda, $id_entidade_venda, $dataInicial, $dataFinal)
    {
        $query = "SELECT 
            *,
            (SELECT SUM(preco_custo_venda) 
             FROM tb_vendas 
             WHERE id_usuario_venda = :id_usuario_venda 
             AND id_entidade_venda = :id_entidade_venda 
             AND data_venda BETWEEN :dataInicial AND :dataFinal) AS total_preco_custo,

             (SELECT SUM(desconto_venda) 
             FROM tb_vendas 
             WHERE id_usuario_venda = :id_usuario_venda 
             AND id_entidade_venda = :id_entidade_venda 
             AND data_venda BETWEEN :dataInicial AND :dataFinal) AS total_desconto_venda,

             (SELECT SUM(preco_vendido_venda) 
             FROM tb_vendas 
             WHERE id_usuario_venda = :id_usuario_venda 
             AND id_entidade_venda = :id_entidade_venda 
             AND data_venda BETWEEN :dataInicial AND :dataFinal) AS total_preco_vendido_venda

        FROM 
            tb_vendas 
        WHERE 
            id_usuario_venda = :id_usuario_venda 
            AND id_entidade_venda = :id_entidade_venda 
            AND data_venda BETWEEN :dataInicial AND :dataFinal
        ORDER BY 
            data_venda DESC";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id_usuario_venda', $id_usuario_venda);
        $stmt->bindParam(':id_entidade_venda', $id_entidade_venda);
        $stmt->bindParam(':dataInicial', $dataInicial);
        $stmt->bindParam(':dataFinal', $dataFinal);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function vendasStatusAberto($id_usuario_venda, $id_entidade_venda)
    {

        $query = "SELECT id_venda, codigo_venda, status_custo_venda, status_pg_cliente_venda FROM tb_vendas WHERE status_custo_venda = 'ABERTO' AND id_usuario_venda = :id_usuario_venda AND id_entidade_venda = :id_entidade_venda";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_usuario_venda', $id_usuario_venda);
        $stmt->bindParam(':id_entidade_venda', $id_entidade_venda);
        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function vendasStatus($id_usuario_venda, $id_entidade_venda)
    {

        $query = "SELECT 
                    v.id_venda, 
                    v.codigo_venda, 
                    v.status_custo_venda, 
                    v.status_pg_cliente_venda,
                    c.comprovante_pagamento,
                    c.id_venda_comprovante_pagamento 
                  FROM tb_vendas v 
                  LEFT JOIN tb_comprovantes_pagamento c ON v.id_venda = c.id_venda_comprovante_pagamento
                  WHERE v.status_custo_venda != 'ABERTO' AND v.id_usuario_venda = :id_usuario_venda AND v.id_entidade_venda = :id_entidade_venda";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_usuario_venda', $id_usuario_venda);
        $stmt->bindParam(':id_entidade_venda', $id_entidade_venda);
        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarStatusPagamentos($id_venda, $status_custo_venda, $status_pg_cliente_venda)
    {

        $query = "UPDATE tb_vendas SET status_custo_venda = :status_custo_venda, status_pg_cliente_venda = :status_pg_cliente_venda WHERE id_venda = :id_venda";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':status_custo_venda', $status_custo_venda);
        $stmt->bindParam(':status_pg_cliente_venda', $status_pg_cliente_venda);
        $stmt->bindParam(':id_venda', $id_venda);
        $stmt->execute();
    }
}

class Vendas_Pespectivas implements InterfaceVendasPespectivas
{

    private $id_venda_pespectiva;
    private $conexao;
    private $id_usuario_venda_pespectiva;
    private $id_entidade_venda_pespectiva;
    private $id_produto_venda_pespectiva;
    private $nome_venda_pespectiva;
    private $telefone_venda_pespectiva;
    private $data_venda_pespectiva;
    private $item_venda_pespectiva;
    private $preco_venda_pespectiva;
    private $data_prevista_venda_pespectiva;
    private $mes_venda_pespectiva;
    private $ano_venda_pespectiva;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserirVendaPespectiva($dados)
    {

        $query = 'INSERT INTO tb_vendas_pespectivas (id_usuario_venda_pespectiva, id_entidade_venda_pespectiva, id_produto_venda_pespectiva, nome_venda_pespectiva, telefone_venda_pespectiva, data_venda_pespectiva, item_venda_pespectiva, preco_venda_pespectiva, data_prevista_venda_pespectiva, mes_venda_pespectiva, ano_venda_pespectiva) VALUES (:id_usuario_venda_pespectiva, :id_entidade_venda_pespectiva, :id_produto_venda_pespectiva, :nome_venda_pespectiva, :telefone_venda_pespectiva, :data_venda_pespectiva, :item_venda_pespectiva, :preco_venda_pespectiva, :data_prevista_venda_pespectiva, :mes_venda_pespectiva, :ano_venda_pespectiva)';
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_usuario_venda_pespectiva', $dados['id_usuario_venda_pespectiva']);
        $stmt->bindValue(':id_entidade_venda_pespectiva', $dados['id_entidade_venda_pespectiva']);
        $stmt->bindValue(':id_produto_venda_pespectiva', $dados['id_produto_venda_pespectiva']);
        $stmt->bindValue(':nome_venda_pespectiva', $dados['nome_venda_pespectiva']);
        $stmt->bindValue(':telefone_venda_pespectiva', $dados['telefone_venda_pespectiva']);
        $stmt->bindValue(':data_venda_pespectiva', $dados['data_venda_pespectiva']);
        $stmt->bindValue(':item_venda_pespectiva', $dados['item_venda_pespectiva']);
        $stmt->bindValue(':preco_venda_pespectiva', $dados['preco_venda_pespectiva']);
        $stmt->bindValue(':data_prevista_venda_pespectiva', $dados['data_prevista_venda_pespectiva']);
        $stmt->bindValue(':mes_venda_pespectiva', $dados['mes_venda_pespectiva']);
        $stmt->bindValue(':ano_venda_pespectiva', $dados['ano_venda_pespectiva']);


        $stmt->execute();
    }

    public function ChamaVendasPespectivas($id_usuario_venda_pespectiva, $id_entidade_venda_pespectiva)
    {

        $query = "SELECT id_venda_pespectiva, nome_venda_pespectiva, telefone_venda_pespectiva, data_venda_pespectiva, item_venda_pespectiva, preco_venda_pespectiva, data_prevista_venda_pespectiva FROM tb_vendas_pespectivas WHERE id_usuario_venda_pespectiva = :id_usuario_venda_pespectiva AND id_entidade_venda_pespectiva = :id_entidade_venda_pespectiva";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_usuario_venda_pespectiva', $id_usuario_venda_pespectiva);
        $stmt->bindValue(':id_entidade_venda_pespectiva', $id_entidade_venda_pespectiva);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ChamaVendasPespectivasMes($id_usuario_venda_pespectiva, $id_entidade_venda_pespectiva, $mes, $ano)
    {

        $query = "SELECT id_venda_pespectiva, nome_venda_pespectiva
        FROM tb_vendas_pespectivas
        WHERE id_usuario_venda_pespectiva = :id_usuario_venda_pespectiva
        AND id_entidade_venda_pespectiva = :id_entidade_venda_pespectiva
        AND mes_venda_pespectiva = :mes AND ano_venda_pespectiva = :ano";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->bindValue(':id_usuario_venda_pespectiva', $id_usuario_venda_pespectiva);
        $stmt->bindValue(':id_entidade_venda_pespectiva', $id_entidade_venda_pespectiva);
        $stmt->bindValue(':mes', $mes);
        $stmt->bindValue(':ano', $ano);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class ReceitasDespesas implements InterfaceReceitasDespesas
{

    private $id_receita_despesa;
    private $conexao;
    private $id_usuario_receita_despesa;
    private $id_entidade_receita_despesa;
    private $titulo_receita_despesa;
    private $categoria_receita_despesa;
    private $valor_receita_despesa;
    private $data_receita_despesa;
    private $data_mensal_receita_despesa;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserirReceitaDespesa($id_usuario_receita_despesa, $id_entidade_receita_despesa, $titulo_receita_despesa, $categoria_receita_despesa, $valor_receita_despesa, $data_receita_despesa, $data_mensal_receita_despesa)
    {

        $query = "INSERT INTO tb_receitas_despesas (id_usuario_receita_despesa, id_entidade_receita_despesa, titulo_receita_despesa, categoria_receita_despesa, valor_receita_despesa, data_receita_despesa, data_mensal_receita_despesa) VALUES (:id_usuario_receita_despesa, :id_entidade_receita_despesa, :titulo_receita_despesa, :categoria_receita_despesa, :valor_receita_despesa, :data_receita_despesa, :data_mensal_receita_despesa)";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->bindValue(':id_usuario_receita_despesa', $id_usuario_receita_despesa);
        $stmt->bindValue(':id_entidade_receita_despesa', $id_entidade_receita_despesa);
        $stmt->bindValue(':titulo_receita_despesa', $titulo_receita_despesa);
        $stmt->bindValue(':categoria_receita_despesa', $categoria_receita_despesa);
        $stmt->bindValue(':valor_receita_despesa', $valor_receita_despesa);
        $stmt->bindValue(':data_receita_despesa', $data_receita_despesa);
        $stmt->bindValue(':data_mensal_receita_despesa', $data_mensal_receita_despesa);

        $stmt->execute();
    }

    public function chamaReceitaDespesa($categoria_receita_despesa, $id_usuario_receita_despesa, $id_entidade_receita_despesa)
    {
        try {
            $dataMes = date('Y-m');
            $query = "
                SELECT *, 
                (
                    SELECT SUM(valor_receita_despesa) 
                    FROM tb_receitas_despesas 
                    WHERE data_mensal_receita_despesa = :dataMes 
                    AND categoria_receita_despesa = :categoria_receita_despesa 
                    AND id_usuario_receita_despesa = :id_usuario_receita_despesa 
                    AND id_entidade_receita_despesa = :id_entidade_receita_despesa
                ) AS total_valor_receita_despesa 
                FROM tb_receitas_despesas 
                WHERE data_mensal_receita_despesa = :dataMes 
                AND categoria_receita_despesa = :categoria_receita_despesa 
                AND id_usuario_receita_despesa = :id_usuario_receita_despesa 
                AND id_entidade_receita_despesa = :id_entidade_receita_despesa";

            $conn = $this->conexao->Conectar();

            $stmt = $conn->prepare($query);
            $stmt->bindValue(':dataMes', $dataMes);
            $stmt->bindValue(':categoria_receita_despesa', $categoria_receita_despesa);
            $stmt->bindValue(':id_usuario_receita_despesa', $id_usuario_receita_despesa);
            $stmt->bindValue(':id_entidade_receita_despesa', $id_entidade_receita_despesa);

            $stmt->execute();

            $r = [];

            return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Exibe a mensagem de erro
            echo "Erro: " . $e->getMessage();
        }
    }

    public function excluirReceitaDespesa($id_receita_despesa)
    {

        $query = "DELETE FROM tb_receitas_despesas WHERE id_receita_despesa = :id_receita_despesa";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_receita_despesa', $id_receita_despesa);
        $stmt->execute();
    }
}

class Movimentacao implements InterfaceMovimentacao
{
    private int $id_movimentacao;
    private $conexao;
    private $id_usuario_movimentacao;
    private $id_entidade_movimentacao;
    private $data_mensal_movimentacao;
    private $data_atualizacao_movimentacao;
    private $receita_movimentacao;
    private $despesa_movimentacao;
    private $soma_movimentacao;
    private $lucro_prejuizo_movimentacao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserirMovimentacao($id_usuario_movimentacao, $id_entidade_movimentacao, $data_mensal_movimentacao, $data_atualizacao_movimentacao, $receita_movimentacao, $despesa_movimentacao, $soma_movimentacao, $lucro_prejuizo_movimentacao)
    {

        $query = "INSERT INTO tb_movimentacao (id_usuario_movimentacao, id_entidade_movimentacao, data_mensal_movimentacao, data_atualizacao_movimentacao, receita_movimentacao, despesa_movimentacao, soma_movimentacao, lucro_prejuizo_movimentacao) VALUES (:id_usuario_movimentacao, :id_entidade_movimentacao, :data_mensal_movimentacao, :data_atualizacao_movimentacao, :receita_movimentacao, :despesa_movimentacao, :soma_movimentacao, :lucro_prejuizo_movimentacao)";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_usuario_movimentacao', $id_usuario_movimentacao);
        $stmt->bindValue(':id_entidade_movimentacao', $id_entidade_movimentacao);
        $stmt->bindValue(':data_mensal_movimentacao', $data_mensal_movimentacao);
        $stmt->bindValue(':data_atualizacao_movimentacao', $data_atualizacao_movimentacao);
        $stmt->bindValue(':receita_movimentacao', $receita_movimentacao);
        $stmt->bindValue(':despesa_movimentacao', $despesa_movimentacao);
        $stmt->bindValue(':soma_movimentacao', $soma_movimentacao);
        $stmt->bindValue(':lucro_prejuizo_movimentacao', $lucro_prejuizo_movimentacao);

        $stmt->execute();
    }

    public function atualizarMovimentacao($id_usuario_movimentacao, $id_entidade_movimentacao, $data_atualizacao_movimentacao, $receita_movimentacao, $despesa_movimentacao, $soma_movimentacao, $lucro_prejuizo_movimentacao)
    {

        $query = "UPDATE tb_movimentacao SET data_atualizacao_movimentacao = :data_atualizacao_movimentacao, receita_movimentacao = :receita_movimentacao, despesa_movimentacao = :despesa_movimentacao, soma_movimentacao = :soma_movimentacao, lucro_prejuizo_movimentacao = :lucro_prejuizo_movimentacao WHERE id_usuario_movimentacao = :id_usuario_movimentacao AND id_entidade_movimentacao = :id_entidade_movimentacao";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_usuario_movimentacao', $id_usuario_movimentacao);
        $stmt->bindValue(':id_entidade_movimentacao', $id_entidade_movimentacao);
        // $stmt->bindValue(':data_mensal_movimentacao', $data_mensal_movimentacao);
        $stmt->bindValue(':data_atualizacao_movimentacao', $data_atualizacao_movimentacao);
        $stmt->bindValue(':receita_movimentacao', $receita_movimentacao);
        $stmt->bindValue(':despesa_movimentacao', $despesa_movimentacao);
        $stmt->bindValue(':soma_movimentacao', $soma_movimentacao);
        $stmt->bindValue(':lucro_prejuizo_movimentacao', $lucro_prejuizo_movimentacao);

        $stmt->execute();
    }

    public function consultaMovimentacao($data_mensal_movimentacao, $id_usuario_movimentacao, $id_entidade_movimentacao)
    {

        $query = "SELECT COUNT(:data_mensal_movimentacao) AS RESULT FROM tb_movimentacao WHERE data_mensal_movimentacao = :data_mensal_movimentacao AND id_usuario_movimentacao = :id_usuario_movimentacao AND id_entidade_movimentacao = :id_entidade_movimentacao";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_usuario_movimentacao', $id_usuario_movimentacao);
        $stmt->bindValue(':id_entidade_movimentacao', $id_entidade_movimentacao);
        $stmt->bindValue(':data_mensal_movimentacao', $data_mensal_movimentacao);
        $stmt->execute();

        $r = [];

        return $r = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

class StatusPagamento implements InterfaceStatusPagamento
{

    private $id_comprovante_pagamento;
    private $conexao;
    private $id_venda_comprovante_pagamento;
    private $comprovante_pagamento;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserirComprovantePagamento($id_venda_comprovante_pagamento, $comprovante_pagamento)
    {

        $query = "INSERT INTO tb_comprovantes_pagamento (id_venda_comprovante_pagamento, comprovante_pagamento) VALUES (:id_venda_comprovante_pagamento, :comprovante_pagamento)";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_venda_comprovante_pagamento', $id_venda_comprovante_pagamento);
        $stmt->bindValue(':comprovante_pagamento', $comprovante_pagamento);
        $stmt->execute();
    }

    public function consultaPagamento($id_comprovante_pagamento)
    {

        $query = "SELECT id_comprovante_pagamento FROM tb_comprovantes_pagamento WHERE id_venda_comprovante_pagamento = :id_comprovante_pagamento";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_comprovante_pagamento', $id_comprovante_pagamento);
        $stmt->execute();

        $r = [];

        return $r = $stmt->rowCount();
    }

    public function atualizaPagamento($id_comprovante_pagamento, $nome_comprovante)
    {

        // continuar atualização do comprovante
        $query = "UPDATE tb_comprovantes_pagamento SET comprovante_pagamento = :nome_comprovante WHERE id_venda_comprovante_pagamento = :id_comprovante_pagamento";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_comprovante_pagamento', $id_comprovante_pagamento);
        $stmt->bindValue(':nome_comprovante', $nome_comprovante);
        $stmt->execute();
    }
}

class ConsultaPagamentoAdm implements InterfaceConsultaPagamentoAdm
{

    private $id_consulta_pagamento;
    private $conexao;
    private $id_usuario_consulta_pagamento;
    private $id_entidade_consulta_pagamento;
    private $codigo_consulta_pagamento;
    private $status_consulta_pagamento;
    private $data_baixa_consulta_pagamento;
    private $usuario_adm_consulta_pagamento;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserirConsultaPagamentoAdm($id_usuario_consulta_pagamento, $id_entidade_consulta_pagamento, $codigo_consulta_pagamento, $status_consulta_pagamento)
    {

        $query = "INSERT INTO tb_consulta_pagamento_adm (id_usuario_consulta_pagamento, id_entidade_consulta_pagamento, codigo_consulta_pagamento, status_consulta_pagamento) VALUES (:id_usuario_consulta_pagamento, :id_entidade_consulta_pagamento, :codigo_consulta_pagamento, :status_consulta_pagamento)";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_usuario_consulta_pagamento', $id_usuario_consulta_pagamento);
        $stmt->bindValue(':id_entidade_consulta_pagamento', $id_entidade_consulta_pagamento);
        $stmt->bindValue(':codigo_consulta_pagamento', $codigo_consulta_pagamento);
        $stmt->bindValue(':status_consulta_pagamento', $status_consulta_pagamento);

        $stmt->execute();
    }
}

class UsuarioMaster
{

    private int $id_usuario_master;
    private $conexao;
    private $nome_usuario_master;
    private $email_usuario_master;
    private $senha_usuario_master;
    private $cpf_usuario_master;
    private $status_usuario_master;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function chamaUsuarioMaster($email_usuario_master)
    {
        $query = 'SELECT * FROM tb_usuario_master WHERE email_usuario_master = :email_usuario_master';
        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':email_usuario_master', $email_usuario_master);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


function verificaSessao()
{

    // if (empty($_SESSION) || isset($_SESSION['status_usuario_adm_pj']) and $_SESSION['status_usuario_adm_pj'] != 'A' and $_SESSION['tipo_usuario_adm_pj'] != 'U') {

    //     session_destroy();
    //     header("Location: ../login.php?erro=3?usuarioSemAcesso&&function=verificaSessao");
    //     die();
    // }
    if (!empty($_SESSION)){

        if (isset($_SESSION['tipo_usuario_adm_pj']) and $_SESSION['tipo_usuario_adm_pj'] === 'U') {
            if (isset($_SESSION['status_usuario_adm_pj']) and $_SESSION['status_usuario_adm_pj'] != 'A') {
                session_destroy();
                header("Location: ./login.php?erro=1?usuarioSemAcesso&&function=verificaSessao");
                die();
            }
        } else {
            session_destroy();
            header("Location: ./login.php?erro=2?usuarioSemAcesso&&function=verificaSessao");
            die();
        }
    } else {
        session_destroy();
        header("Location: ./login.php?erro=3?usuarioSemAcesso&&function=verificaSessao");
        die();
    }
}

function verificaSessaoMaster()
{
    if (!empty($_SESSION)) {

        if ($_SESSION['status_usuario_master'] === 'A') {
            if (isset($_SESSION['tipo_usuario_master']) and $_SESSION['tipo_usuario_master'] != 'M') {
                session_destroy();
                header("Location: ./login.php?erro=3?usuarioSemAcesso&&function=verificaSessaoMaster");
                die();
            }
        } else {
            session_destroy();
            header("Location: ./login.php?erro=3?usuarioSemAcesso&&function=verificaSessaoMaster");
            die();
        }
    }
}
