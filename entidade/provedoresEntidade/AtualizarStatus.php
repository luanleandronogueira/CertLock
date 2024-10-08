<?php
session_start();
include "../../provedores/Classes.php";

$Vendas = new Vendas;
$StatusPagamento = new StatusPagamento;

echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<pre>';
print_r($_FILES);
echo '</pre>';

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_POST)) {

        if (empty($_FILES)) {

            // atualiza o status do pagamento
            $Vendas->atualizarStatusPagamentos($_POST['id_venda'], $_POST['status_custo_venda'], $_POST['status_pg_cliente_venda']);

            header("Location: ../statusPagamento.php?status=sucesso&&AtualizarStatus");

        } else {

            if (
                $_FILES['comprovante']['type'] == 'application/pdf' ||
                $_FILES['comprovante']['type'] == 'image/jpg' ||
                $_FILES['comprovante']['type'] == 'image/jpeg' ||
                $_FILES['comprovante']['type'] == 'image/png'
            ) {
                //consulta se já há no db esse dado
                $consultaPagamento = $StatusPagamento->consultaPagamento($_POST['id_venda']);

                // separa a extensão do formato para salvar no nome do arquivo
                $extensao = explode("/", $_FILES['comprovante']['type']);

                // caminho onde será salvo o documento
                $caminho = "../../assets/comprovantes";

                // Recebe o nome renomeado com a extensão
                $nome_arquivo = $_FILES['comprovante']['name'] = $_POST['id_venda'] . $_POST['codigo_venda'] . "." . $extensao[1];
                
                // move para a pasta correta
                move_uploaded_file($_FILES['comprovante']['tmp_name'], $caminho . "/" . $nome_arquivo);

                // atualiza o status do pagamento
                $Vendas->atualizarStatusPagamentos($_POST['id_venda'], $_POST['status_custo_venda'], $_POST['status_pg_cliente_venda']);

                //cria o caminho sem subir pastas cria um caminho absoluto
                $localizarArquivo = "../assets/comprovantes/" . $nome_arquivo;

                if($consultaPagamento != 0){

                    // $nome_comprovante = $caminho . "/" . $nome_arquivo;
                    $StatusPagamento->atualizaPagamento($_POST['id_venda'], $localizarArquivo);
                    print_r($consultaPagamento);

                } else {
                    // insere na tabela de comprovantes    
                    $StatusPagamento->inserirComprovantePagamento($_POST['id_venda'], $localizarArquivo);
                }

                // redireciona novamente para a pasta
                header("Location: ../statusPagamento.php?status=sucesso");

            } else {
                //echo 'Formato não aceito';
                header("Location: ../statusPagamento.php?formato=NA");
            }
        }
    } else {

        header("Location: Sair.php");
        die();
    }
} else {

    header("Location: Sair.php");
    die();
}

