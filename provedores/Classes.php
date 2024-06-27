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

    public function chamaEntidade(){

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

    public function chamaEntidadeAtivas(){

        $query = "SELECT id_entidade, nome_empresa_entidade, cnpj_entidade FROM tb_entidades WHERE status_entidade = 'A'";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function atualizarEntidade($cnpj_entidade, $nome_empresa_entidade, $contato_entidade, $logradouro_entidade, $numero_entidade, $bairro_entidade, $cidade_entidade, $uf_entidade, $cep_entidade, $email_entidade, $status_entidade) {

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

    public function inserirEntidadePf($nome_entidade_pf, $email_entidade_pf, $contato_entidade_pf, $status_entidade_pf){

        $query = "INSERT INTO tb_entidades_pf (nome_entidade_pf, email_entidade_pf, contato_entidade_pf, status_entidade_pf) VALUES (:cpf_entidade_pf, :nome_entidade_pf, :email_entidade_pf, :contato_entidade_pf, :status_entidade_pf)";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':nome_entidade_pf', $nome_entidade_pf);
        $stmt->bindValue(':email_entidade_pf', $email_entidade_pf);
        $stmt->bindValue(':contato_entidade_pf', $contato_entidade_pf);
        $stmt->bindValue(':status_entidade_pf', $status_entidade_pf);

        $stmt->execute();

    }

    public function chamaEntidadePf(){

        $query = "SELECT * FROM tb_entidades_pf";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function chamaEntidadePfAtiva(){

        $query = "SELECT * FROM tb_entidades_pf WHERE status_entidade_pf = 'A'";
        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $r = [];

        return $r = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function atualizarEntidadePf($cpf_entidade_pf, $nome_entidade_pf, $email_entidade_pf, $contato_entidade_pf, $status_entidade_pf) {

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

abstract class UsuarioAdm {

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

    public function __construct() {

        $this->conexao = new Conexao();

    }

    abstract function inserirUsuario($dados);
    abstract function verificaUsuario($dados);
    abstract function chamaUsuario($log);
    // abstract function chamaEntidade($id);

}


class UsuarioAdmPj extends UsuarioAdm {


    public function inserirUsuario($dados) {
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

    public function chamaUsuario($email_usuario_adm_pj){

        $query = 'SELECT * FROM tb_usuario_adm_pj WHERE email_usuario_adm_pj = :email_usuario_adm_pj';
        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':email_usuario_adm_pj', $email_usuario_adm_pj);
        
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }


    public function verificaUsuario($dados) {
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

class UsuarioAdmPf extends UsuarioAdm {

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

    public function chamaUsuario($email_usuario_adm_pf){

        $query = 'SELECT * FROM tb_usuario_adm_pf WHERE tb_usuario_adm_pf = :email_usuario_adm_pf';
        $conexao =  new Conexao;

        $conn = $conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':email_usuario_adm_pf', $email_usuario_adm_pf);
        
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function chamaEntidade($id)
    {
        
    }

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

abstract class Clientes {

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

    public function __construct() {

        $this->conexao = new Conexao();

    }

    abstract function inserirCliente($dados);
       

}

class ClientesPj extends Clientes {


    public function __construct() {

        $this->conexao = new Conexao();

    }
    
    public function inserirCliente($dados)
    {
        $query = "INSERT INTO tb_clientes_pj (responsavel_cliente_pj, telefone_cliente_pj, cnpj_cliente_pj, nome_cliente_pj, contato_cliente_pj, logradouro_cliente_pj, numero_cliente_pj, bairro_cliente_pj, cidade_cliente_pj, uf_cliente_pj, cep_cliente_pj, email_cliente_pj, id_usuario_cliente_pj, entidade_cliente_pj) VALUES (:responsavel_cliente_pj, :telefone_cliente_pj, :cnpj_cliente_pj, :nome_cliente_pj, :contato_cliente_pj, :logradouro_cliente_pj, :numero_cliente_pj, :bairro_cliente_pj, :cidade_cliente_pj, :uf_cliente_pj, :cep_cliente_pj, :email_cliente_pj, :id_usuario_cliente_pj, :entidade_cliente_pj)";

        extract($dados);

        $conexao =  new Conexao;
        $conn = $conexao->Conectar();
 
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':responsavel_cliente_pj', ucwords($responsavel_cliente_pj));
        $stmt->bindValue(':telefone_cliente_pj', $telefone_cliente_pj);
        $stmt->bindValue(':cnpj_cliente_pj', $cnpj_cliente_pj);
        $stmt->bindValue(':nome_cliente_pj', ucwords($nome_cliente_pj));
        $stmt->bindValue(':contato_cliente_pj', $contato_cliente_pj);
        $stmt->bindValue(':logradouro_cliente_pj', ucwords($logradouro_cliente_pj));
        $stmt->bindValue(':numero_cliente_pj', $numero_cliente_pj);
        $stmt->bindValue(':bairro_cliente_pj', ucwords($bairro_cliente_pj));
        $stmt->bindValue(':cidade_cliente_pj', ucwords($cidade_cliente_pj));
        $stmt->bindValue(':uf_cliente_pj', strtoupper($uf_cliente_pj));
        $stmt->bindValue(':cep_cliente_pj', $cep_cliente_pj);
        $stmt->bindValue(':email_cliente_pj', $email_cliente_pj);
        $stmt->bindValue(':id_usuario_cliente_pj', $id_usuario_cliente_pj);
        $stmt->bindValue(':entidade_cliente_pj', $entidade_cliente_pj);
        
        $stmt->execute();
    }



}