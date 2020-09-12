<?php
include("../conn-db/conexao.php");
include_once("../conn-db/conn_db.php");
// definir o numero de itens por pagina
$itens_por_pagina = 1;

// pegar a pagina atual
$pagina = intval($_GET['pagina']);

//==========================================================
// Equipamento2 LIMIT
$query_tb_equipamento2 = "SELECT EE.`extra_cod`, T.`tipo_equipamento`, M.`modelo_equipamento`, F.`fabricante`, `num_serie`, S.`empresa`, L.`local`, FO.`fornecedor`, `nota_fiscal`, `data_compra`, `situacao`, `informacoes`, `perifericos`
FROM `tb_equipamento` AS EE 
LEFT JOIN (SELECT * FROM `tb_fabricante` WHERE `tb_fabricante`.`emp_Principal` = $emp_principal) AS F ON F.`extra_cod` = EE.`fabricante` 
LEFT JOIN (SELECT * FROM `tb_fornecedor` WHERE `tb_fornecedor`.`emp_Principal` = $emp_principal) AS FO ON FO.`extra_cod` = EE.`fornecedor` 
LEFT JOIN (SELECT * FROM `tb_local` WHERE `tb_local`.`emp_Principal` = $emp_principal) AS L ON L.`extra_cod` = EE.`local` 
LEFT JOIN (SELECT * FROM `tb_modelo_equipamento` WHERE `tb_modelo_equipamento`.`emp_Principal` = $emp_principal) AS M ON M.`extra_cod` = EE.`modelo_equipamento` 
LEFT JOIN (SELECT * FROM `tb_subempresa` WHERE `tb_subempresa`.`emp_Principal` = $emp_principal) AS S ON S.`extra_cod` = EE.`empresa` 
LEFT JOIN (SELECT * FROM `tb_tipo_equipamento` WHERE `tb_tipo_equipamento`.`emp_Principal` = $emp_principal) AS T ON T.`extra_cod` = EE.`tipo_equipamento` 
WHERE EE.`emp_Principal` = $emp_principal
    ORDER BY `extra_cod` ASC
    LIMIT $pagina, $itens_por_pagina";

$statement2 = $conexao->prepare($query_tb_equipamento2);

$statement2->execute();

$result_tb_equipamento2 = $statement2->fetchall(PDO::FETCH_ASSOC);
$num = $statement2->rowCount();

$num_paginas = ceil($num_total / $itens_por_pagina);
?>