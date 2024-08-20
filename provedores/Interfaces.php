<?php 

interface InterfaceItens {

    public function inserirItem($modelo_item_preco, $custo_item_preco, $preco_venda_item_preco, $validade_item_preco, $categoria_validade_item_preco, $id_entidade_item_preco);
    public function chamaItens($id_entidade);
    public function atualizaItem($modelo_item_preco, $custo_item_preco, $preco_venda_item_preco, $id_item_preco);

}

interface InterfaceVendas {

    public function inserirVenda($dados);
    public function chamaVendaPorId($id_usuario_venda, $id_entidade_venda);
    public function chamaHistoricoVendas($id_usuario_venda, $id_entidade_venda, $dataInicial, $dataFinal);
    public function chamaMovimentacaoVendasMes($id_usuario_venda, $id_entidade_venda, $dataInicial, $dataFinal);

}

interface InterfaceVendasPespectivas {

    public function inserirVendaPespectiva($dados);
    public function ChamaVendasPespectivas($id_usuario_venda_pespectiva, $id_entidade_venda_pespectiva);
    public function ChamaVendasPespectivasMes($id_usuario_venda_pespectiva, $id_entidade_venda_pespectiva, $mes , $ano);

}

interface InterfaceReceitasDespesas {

    public function inserirReceitaDespesa($id_usuario_receita_despesa, $id_entidade_receita_despesa, $titulo_receita_despesa, $categoria_receita_despesa, $valor_receita_despesa, $data_receita_despesa, $data_mensal_receita_despesa);
    public function chamaReceitaDespesa($categoria_receita_despesa, $id_usuario_receita_despesa, $id_entidade_receita_despesa);

}

interface InterfaceMovimentacao {

    public function inserirMovimentacao($id_usuario_movimentacao, $id_entidade_movimentacao, $data_mensal_movimentacao, $data_atualizacao_movimentacao, $receita_movimentacao, $despesa_movimentacao, $soma_movimentacao, $lucro_prejuizo_movimentacao);

    public function atualizarMovimentacao($id_usuario_movimentacao, $id_entidade_movimentacao, $data_atualizacao_movimentacao, $receita_movimentacao, $despesa_movimentacao, $soma_movimentacao, $lucro_prejuizo_movimentacao);
    
    public function consultaMovimentacao($data_mensal_movimentacao, $id_usuario_movimentacao, $id_entidade_movimentacao);

}