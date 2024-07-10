<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../controladores/css/style.css">
    <script src="../controladores/js/script.js"></script>
    <style>
      /* Adicione um estilo específico para telas menores, como celulares */
      @media (max-width: 767px) {
        /* Seletor para a tabela que você deseja adicionar o scroll horizontal */
        .sua-tabela {
          /* Defina a largura máxima da tabela para ativar o scroll horizontal quando necessário */
          max-width: 100%;
          /* Adicione um scroll horizontal quando o conteúdo excede a largura da tabela */
          overflow-x: auto;
          display: block; /* Adicione display: block para forçar a barra de rolagem horizontal */
        }
        /* Opcional: Remova as bordas da tabela para um visual mais limpo */
        .sua-tabela, .sua-tabela th, .sua-tabela td {
          border: none;
        }
      }
    </style>
  </head>
  <body>

  <div class="topo1">
    <div class="">
        <a class="navbar-brand" href="#">
            <img src="https://images.vexels.com/media/users/3/128728/isolated/preview/4979f424070de1dbf7055d91695b74c3-icone-plano-de-cadeado-de-seguranca.png" alt="Logo" width="50" height="30" class="d-inline-block align-text-top">
        </a> Bem Vindo ao CertLock

        <!-- <div class="float-end">
            <a class="navbar-brand" href="#">
                <img width="40" height="30" src="https://cdn-icons-png.flaticon.com/512/266/266033.png" class="rounded-circle border-success" alt="...">
            </a>
        </div>
        <div class="float-end">
            <a class="navbar-brand" href="#">
                <img width="40" height="30" src="https://cdn-icons-png.flaticon.com/512/266/266033.png" class="rounded-circle border-success" alt="...">
            </a>
        </div> -->
        <div class="float-end">
            <a class="navbar-brand" href="#">
                Olá, <strong><?= $_SESSION['nome_usuario_adm_pj'] ?></strong>
                <img width="40" height="30" src="https://cdn-icons-png.flaticon.com/512/266/266033.png" class="rounded-circle border-success" alt="...">
            </a>
        </div>

    </div>

  </div>
  <nav class="navbar navbar-expand-lg color">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php"><img width="40" height="30" src="https://www.imagensempng.com.br/wp-content/uploads/2021/08/02-51.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastrar Cliente
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cadastrarCliente.php">Cadastrar Cliente</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Registrar Vendas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="registrarVenda.php">Registrar Venda</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Projeção de Vendas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Financeiro
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Administrador
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href=".php">Cadastrar um Usuário</a></li>
                        <li><a class="dropdown-item" href="cadastrarItens.php">Cadastrar Itens de Venda</a></li>
                        <li><a class="dropdown-item" href="verItens.php">Ver Itens de Venda</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Configurações
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href=".php">Suporte</a></li>
                        <li><a class="dropdown-item" href="cadastrarItens.php">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
      </div>
    </nav>
