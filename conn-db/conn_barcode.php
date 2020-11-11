<?php $query_tb_equipamento = "SELECT EE.`extra_cod`, T.`tipo_equipamento`, M.`modelo_equipamento`, F.`fabricante`, `num_serie`, S.`empresa`, L.`local`, FO.`fornecedor`, `nota_fiscal`, `data_compra`, `situacao`, `informacoes`, `perifericos`
    FROM `tb_equipamento` AS EE 
    LEFT JOIN (SELECT * FROM `tb_fabricante` WHERE `tb_fabricante`.`emp_Principal` = $emp_principal) AS F ON F.`extra_cod` = EE.`fabricante` 
    LEFT JOIN (SELECT * FROM `tb_fornecedor` WHERE `tb_fornecedor`.`emp_Principal` = $emp_principal) AS FO ON FO.`extra_cod` = EE.`fornecedor` 
    LEFT JOIN (SELECT * FROM `tb_local` WHERE `tb_local`.`emp_Principal` = $emp_principal) AS L ON L.`extra_cod` = EE.`local` 
    LEFT JOIN (SELECT * FROM `tb_modelo_equipamento` WHERE `tb_modelo_equipamento`.`emp_Principal` = $emp_principal) AS M ON M.`extra_cod` = EE.`modelo_equipamento` 
    LEFT JOIN (SELECT * FROM `tb_subempresa` WHERE `tb_subempresa`.`emp_Principal` = $emp_principal) AS S ON S.`extra_cod` = EE.`empresa` 
    LEFT JOIN (SELECT * FROM `tb_tipo_equipamento` WHERE `tb_tipo_equipamento`.`emp_Principal` = $emp_principal) AS T ON T.`extra_cod` = EE.`tipo_equipamento` 
    WHERE EE.`emp_Principal` = $emp_principal
    ORDER BY EE.`extra_cod` ASC";


$statement = $conexao->prepare($query_tb_equipamento);

$statement->execute();

$result_tb_equipamento = $statement->fetchall();
$num_total = $statement->rowCount();
/*echo '<pre>';
print_r($result_tb_equipamento);
echo '</pre>';
*/?>
    <div class="container">
        <div class="row">
<?php foreach ($result_tb_equipamento as $line) { ?>

            <div style="border: 1px solid black" class="col-6 col-md-4">
                <div onclick="print_barcode(<?php echo $line['extra_cod'];?>)">
                    <img src="../img/barcode.png" alt="icone">
                    <?php echo $line['extra_cod'];?>
                </div>
            </div>

<?php };?>
        </div>
        </div>
