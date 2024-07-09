<?php 

echo '<pre>';
print_r($_POST);
echo '</pre>';

echo $precoVenda = floatval($_POST['preco_vendido_venda']) - floatval($_POST['desconto_venda']);