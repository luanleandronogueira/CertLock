<?php 

interface InterfaceItens {

    public function inserirItem($modelo_item_preco, $custo_item_preco, $preco_venda_item_preco, $validade_item_preco, $categoria_validade_item_preco, $id_entidade_item_preco);

    public function chamaItens($id_entidade);

    public function atualizaItem($modelo_item_preco, $custo_item_preco, $preco_venda_item_preco, $id_item_preco);
    

}

interface InterfaceVendas {

    public function inserirVenda($dados);
    public function chamaVendaPorId($id_usuario_venda, $id_entidade_venda);

}

interface InterfaceVendasPespectivas {

    public function inserirVendaPespectiva($dados);
    public function ChamaVendasPespectivas($id_usuario_venda_pespectiva, $id_entidade_venda_pespectiva);
    public function ChamaVendasPespectivasMes($id_usuario_venda_pespectiva, $id_entidade_venda_pespectiva, $mes , $ano);

}