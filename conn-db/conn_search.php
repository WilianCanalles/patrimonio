<?php
if (!isset($_SESSION)) {
    session_start();
}
//print_r($_SESSION);
$emp_principal = $_SESSION['emp_principal'];
include_once 'conexao.php';
$num_total = 0;
try {
    $conexao = new PDO(
        "mysql:host=$host; dbname=$dbname",
        "$user",
        "$pass"
    );
    if (isset($_POST["query"])) {
        $teste = $_POST["query"];
        $query_tb_empresa = "SELECT `tb_equipamento`.`codigo`,
        `tb_tipo_equipamento`.`tipo_equipamento`, 
        `tb_modelo_equipamento`.`modelo_equipamento`, 
        `tb_fabricante`.`fabricante`,
        `num_serie`,
        a.`empresa`,
        `tb_fornecedor`.`fornecedor`,
        `nota_fiscal`,
        `data_compra`,
        `informacoes`
    
        FROM `tb_equipamento`
        INNER JOIN `tb_subempresa` AS a ON `tb_equipamento`.`empresa` = a.`codigo`
        INNER JOIN `tb_tipo_equipamento` ON `tb_equipamento`.`tipo_equipamento` = `tb_tipo_equipamento`.`codigo`
        INNER JOIN `tb_modelo_equipamento` ON `tb_equipamento`.`modelo_equipamento` = `tb_modelo_equipamento`.`codigo`
        INNER JOIN `tb_fabricante` ON `tb_equipamento`.`fabricante` = `tb_fabricante`.`codigo`
        INNER JOIN `tb_fornecedor` ON `tb_equipamento`.`fornecedor` = `tb_fornecedor`.`codigo`
        INNER JOIN `tb_subempresa` AS b ON `tb_equipamento`.`emp_Principal` = b.`codigo`
        WHERE `tb_equipamento`.`codigo` LIKE '%" . $teste . "%' 
        OR `tb_tipo_equipamento`.`tipo_equipamento` LIKE '%" . $teste . "%' 
        OR `tb_modelo_equipamento`.`modelo_equipamento` LIKE '%" . $teste . "%' 
        OR `tb_fabricante`.`fabricante` LIKE '%" . $teste . "%' 
        OR `num_serie` LIKE '%" . $teste . "%' 
        OR a.`empresa` LIKE '%" . $teste . "%'
        OR `tb_fornecedor`.`fornecedor` LIKE '%" . $teste . "%'
        OR `nota_fiscal` LIKE '%" . $teste . "%'
        OR b.`empresa` LIKE '%" . $teste . "%'";

        $statement = $conexao->prepare($query_tb_empresa);

        $statement->execute();
        $result_tb_empresa = $statement->fetchall();
        $num_total = $statement->rowCount();
    }
    /* echo "<pre>";
    print_r($result_tb_empresa);
    echo "</pre>";*/
    if ($num_total > 0) {
?>
        <div style=" height: 300px; overflow-y: scroll;">
            <?php
            foreach ($result_tb_empresa as $lista_itens) {
            ?>
                <p><?php echo 'Código&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[0] . '</br>Tipo&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[1] . '</br>Modelo&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[2] . '</br>Fabricante&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[3] . '</br>Nº Serie&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[4] . '</br>Empresa&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[5] . '</br>fornecedor&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[6] . '</br>Nota Fiscal&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[7] . '</br>Data&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[8] . '</br>Informações&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[9] ?>
                </p>
                <p><?php echo "-------------------------------------------------" ?> </p>

            <?php }
            ?>
        </div>
    <?php
    } else {
    ?>
        <p class="h3" style="text-align: center;">Pesquise algo válido</p>
<?php
    }
} catch (PDOException $e) {
    echo '<p>' . $e->getMessage() . '</p>';
}
