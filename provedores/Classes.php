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

        $query = "INSERT INTO tb_vendas (id_usuario_venda, id_entidade_venda, id_produto_venda, data_venda, codigo_venda, item_produto_venda, preco_custo_venda, desconto_venda, preco_vendido_venda, status_custo_venda, status_pg_cliente_venda) VALUES (:id_usuario_venda, :id_entidade_venda, :id_produto_venda, :data_venda, :codigo_venda, :item_produto_venda, :preco_custo_venda, :desconto_venda, :preco_vendido_venda, :status_custo_venda, :status_pg_cliente_venda)";

        $conn = $this->conexao->Conectar();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_usuario_venda', $dados['id_usuario_venda']);
        $stmt->bindValue(':id_entidade_venda', $dados['id_entidade_venda']);
        $stmt->bindValue(':id_produto_venda', $dados['id_produto_venda']);
        $stmt->bindValue(':data_venda', $dados['data_venda']);
        $stmt->bindValue(':codigo_venda', $dados['codigo_venda']);
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

    public function ChamaVendasPespectivasMes($id_usuario_venda_pespectiva, $id_entidade_venda_pespectiva, $mes , $ano)
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
