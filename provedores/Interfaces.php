<?php 

interface InterfaceItens {

    public function inserirItem($modelo_item_preco, $custo_item_preco, $preco_venda_item_preco, $validade_item_preco, $categoria_validade_item_preco, $id_entidade_item_preco);

    public function chamaItens($id_entidade);

    public function atualizaItem($modelo_item_preco, $custo_item_preco, $preco_venda_item_preco, $id_item_preco);
    

}