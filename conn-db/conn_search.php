<?php
if (!isset($_SESSION)) {
    session_start();
}
$emp_principal = $_SESSION['emp_principal'];
include_once 'conexao.php';

/*
try {
    $conexao = new PDO(
        "mysql:host=$host; dbname=$dbname",
        "$user",
        "$pass"
    );
    $query_tb_empresa1 = "SELECT EE.`extra_cod`, T.`tipo_equipamento`, M.`modelo_equipamento`, F.`fabricante`, `num_serie`, S.`empresa`, L.`local`, FO.`fornecedor`, `nota_fiscal`, `data_compra`, `situacao`, `informacoes`, `perifericos`
    FROM `tb_equipamento` AS EE 
    LEFT JOIN (SELECT * FROM `tb_fabricante` WHERE `tb_fabricante`.`emp_Principal` = $emp_principal) AS F ON F.`extra_cod` = EE.`fabricante` 
    LEFT JOIN (SELECT * FROM `tb_fornecedor` WHERE `tb_fornecedor`.`emp_Principal` = $emp_principal) AS FO ON FO.`extra_cod` = EE.`fornecedor` 
    LEFT JOIN (SELECT * FROM `tb_local` WHERE `tb_local`.`emp_Principal` = $emp_principal) AS L ON L.`extra_cod` = EE.`local` 
    LEFT JOIN (SELECT * FROM `tb_modelo_equipamento` WHERE `tb_modelo_equipamento`.`emp_Principal` = $emp_principal) AS M ON M.`extra_cod` = EE.`modelo_equipamento` 
    LEFT JOIN (SELECT * FROM `tb_subempresa` WHERE `tb_subempresa`.`emp_Principal` = $emp_principal) AS S ON S.`extra_cod` = EE.`empresa` 
    LEFT JOIN (SELECT * FROM `tb_tipo_equipamento` WHERE `tb_tipo_equipamento`.`emp_Principal` = $emp_principal) AS T ON T.`extra_cod` = EE.`tipo_equipamento` 
    WHERE EE.`emp_Principal` = $emp_principal";

    $statement = $conexao->prepare($query_tb_empresa1);

    $statement->execute();
    $result_tb_empresa = $statement->fetchall(PDO::FETCH_ASSOC);
   
} catch (PDOException $e) {
    echo '<p>' . $e->getMessage() . '</p>';
}
echo "<pre>";
print_r($result_tb_empresa);
echo "</pre>";*/
//print_r($_SESSION);
if (isset($_POST['valor']) && $_POST['valor'] == 'pesq') {
    $_SESSION['conn_pesq'] = true;
} elseif (isset($_POST['valor']) && $_POST['valor'] == 'scan') {
    $_SESSION['conn_scan'] = true;
}
$emp_principal = $_SESSION['emp_principal'];
include_once 'conexao.php';
$num_total = 0;
try {
    $conexao = new PDO(
        "mysql:host=$host; dbname=$dbname",
        "$user",
        "$pass"
    );
    if (isset($_SESSION['conn_pesq'])) {

        if (isset($_POST["query"])) {
            $query_pesquisa = $_POST["query"];

            $query_tb_empresa = "SELECT EE.`extra_cod`, T.`tipo_equipamento`, M.`modelo_equipamento`, F.`fabricante`, `num_serie`, S.`empresa`, L.`local`, FO.`fornecedor`, `nota_fiscal`, `data_compra`, `situacao`, `informacoes`, `perifericos`
            FROM `tb_equipamento` AS EE 
            LEFT JOIN (SELECT * FROM `tb_fabricante` WHERE `tb_fabricante`.`emp_Principal` = $emp_principal) AS F ON F.`extra_cod` = EE.`fabricante` 
            LEFT JOIN (SELECT * FROM `tb_fornecedor` WHERE `tb_fornecedor`.`emp_Principal` = $emp_principal) AS FO ON FO.`extra_cod` = EE.`fornecedor` 
            LEFT JOIN (SELECT * FROM `tb_local` WHERE `tb_local`.`emp_Principal` = $emp_principal) AS L ON L.`extra_cod` = EE.`local` 
            LEFT JOIN (SELECT * FROM `tb_modelo_equipamento` WHERE `tb_modelo_equipamento`.`emp_Principal` = $emp_principal) AS M ON M.`extra_cod` = EE.`modelo_equipamento` 
            LEFT JOIN (SELECT * FROM `tb_subempresa` WHERE `tb_subempresa`.`emp_Principal` = $emp_principal) AS S ON S.`extra_cod` = EE.`empresa` 
            LEFT JOIN (SELECT * FROM `tb_tipo_equipamento` WHERE `tb_tipo_equipamento`.`emp_Principal` = $emp_principal) AS T ON T.`extra_cod` = EE.`tipo_equipamento` 
            WHERE (EE.`extra_cod` LIKE '%" . $query_pesquisa . "%' OR T.`tipo_equipamento` LIKE '%" . $query_pesquisa . "%' OR M.`modelo_equipamento` LIKE '%" . $query_pesquisa . "%' OR F.`fabricante` LIKE '%" . $query_pesquisa . "%' OR `num_serie` LIKE '%" . $query_pesquisa . "%' OR S.`empresa` LIKE '%" . $query_pesquisa . "%' OR L.`local` LIKE '%" . $query_pesquisa . "%' OR FO.`fornecedor` LIKE '%" . $query_pesquisa . "%' OR `nota_fiscal` LIKE '%" . $query_pesquisa . "%' OR `data_compra` LIKE '%" . $query_pesquisa . "%' OR `situacao` LIKE '%" . $query_pesquisa . "%' OR `informacoes` LIKE '%" . $query_pesquisa . "%') AND (EE.`emp_Principal` = $emp_principal)";


            $statement = $conexao->prepare($query_tb_empresa);

            $statement->execute();
            $result_tb_empresa = $statement->fetchall();
            $num_total = $statement->rowCount();
        }

        unset($_SESSION['conn_pesq']);
        unset($_SESSION['conn_scan']);
    } elseif (isset($_SESSION['conn_scan'])) {

        if (isset($_POST["query"])) {
            $query_pesquisa = $_POST["query"];
            $query_tb_empresa = "SELECT EE.`extra_cod`, T.`tipo_equipamento`, M.`modelo_equipamento`, F.`fabricante`, `num_serie`, S.`empresa`, L.`local`, FO.`fornecedor`, `nota_fiscal`, `data_compra`, `situacao`, `informacoes`
            FROM `tb_equipamento` AS EE 
            LEFT JOIN (SELECT * FROM `tb_fabricante` WHERE `tb_fabricante`.`emp_Principal` = $emp_principal) AS F ON F.`extra_cod` = EE.`fabricante` 
            LEFT JOIN (SELECT * FROM `tb_fornecedor` WHERE `tb_fornecedor`.`emp_Principal` = $emp_principal) AS FO ON FO.`extra_cod` = EE.`fornecedor` 
            LEFT JOIN (SELECT * FROM `tb_local` WHERE `tb_local`.`emp_Principal` = $emp_principal) AS L ON L.`extra_cod` = EE.`local` 
            LEFT JOIN (SELECT * FROM `tb_modelo_equipamento` WHERE `tb_modelo_equipamento`.`emp_Principal` = $emp_principal) AS M ON M.`extra_cod` = EE.`modelo_equipamento` 
            LEFT JOIN (SELECT * FROM `tb_subempresa` WHERE `tb_subempresa`.`emp_Principal` = $emp_principal) AS S ON S.`extra_cod` = EE.`empresa` 
            LEFT JOIN (SELECT * FROM `tb_tipo_equipamento` WHERE `tb_tipo_equipamento`.`emp_Principal` = $emp_principal) AS T ON T.`extra_cod` = EE.`tipo_equipamento` 
            WHERE (EE.`extra_cod` = '$query_pesquisa') AND (EE.`emp_Principal` = $emp_principal)";
            
            $statement = $conexao->prepare($query_tb_empresa);

            $statement->execute();
            $result_tb_empresa = $statement->fetchall();
            $num_total = $statement->rowCount();
        }

        unset($_SESSION['conn_pesq']);
        unset($_SESSION['conn_scan']);
    }
    /*
    echo "<pre>";
    print_r($result_tb_empresa);
    echo "</pre>";*/
    if ($num_total > 0) {
?>
        <div style=" height: 300px; overflow-y: scroll;">
            <?php
            foreach ($result_tb_empresa as $lista_itens) {
            ?>
                <p><?php echo 'Código&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[0] . '</br>
                Tipo&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[1] . '</br>
                Modelo&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[2] . '</br>
                Fabricante&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[3] . '</br>
                Nº Serie&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[4] . '</br>
                Empresa&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[5] . '</br>
                Fornecedor&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[7] . '</br>
                Local&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[6] . '</br>
                Nota Fiscal&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[8] . '</br>
                Data&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[9] . '</br>
                Situação&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[10] . '</br>
                Informações&nbsp&nbsp:&nbsp&nbsp' . $lista_itens[11] ?>
                </p>
                <img class="usr_btn" src="../img/plus.png" alt="Sinal_Mais" data-toggle="modal" data-target="#exampleModalScrollable" onclick="extras('<?php echo $lista_itens[0] ?>')">
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
