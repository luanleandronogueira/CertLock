<?php

include "../../provedores/Classes.php";

$Cliente_pj = new ClientesPj;
$Cliente_pf = new ClientesPf;

header('Content-Type: application/json');

$identificador = [];

if (!empty($_GET)) {

    $identificador = $_GET['identificador'];

    if (strlen($identificador) == 11) {

        $PF = $Cliente_pf->BuscaCliente($identificador);

        if ($PF) {

            $PF['identificador'] = 'PF';
            echo json_encode($PF);

        } else {

            echo json_encode(['error' => 'VAZIO']);

        }

    } else if (strlen($identificador) == 14) {

        $PJ = $Cliente_pj->BuscaCliente($identificador);

        if ($PJ) {

            $PJ['identificador'] = 'PJ';
            echo json_encode($PJ);

        } else {

            echo json_encode(['error' => 'VAZIO']);
            
        }

    } else {

        echo json_encode(['error' => 'Identificador inválido']);

    }
} else {

    echo json_encode(['error' => 'Nenhum identificador fornecido']);

}
