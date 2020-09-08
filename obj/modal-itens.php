<?php
include '../conn-db/conn_db.php';
$exe_tabela = $_POST['tabela'];
if ($exe_tabela == 'empresa') {
    $recebe_lista_itens = $result_tb_subEmp;
} elseif ($exe_tabela == 'fornecedor') {
    $recebe_lista_itens = $result_tb_fornecedor;
} elseif ($exe_tabela == 'fabricante') {
    $recebe_lista_itens = $result_tb_fabricante;
} elseif ($exe_tabela == 'modelo') {
    $recebe_lista_itens = $result_tb_modelo_equipamento;
} elseif ($exe_tabela == 'tipo') {
    $recebe_lista_itens = $result_tb_tipo_equipamento;
} elseif ($exe_tabela == 'local') {
    $recebe_lista_itens = $result_tb_local;
} else {
    $recebe_lista_itens = [];
}

if (count($recebe_lista_itens) > 0) {

?>
    <div style=" height: 150px; overflow-y: scroll;">
        <?php
        foreach ($recebe_lista_itens as $lista_itens) {
        ?>
            <p><?php echo $lista_itens[1] . '&nbsp&nbsp&nbsp&nbsp' . $lista_itens[2] ?></p>
            <p><?php echo "-------------------------------------------------" ?> </p>

        <?php }
        ?>
    </div>
<?php } elseif ($exe_tabela == 'primeiro') { ?>
    <a class="display-4">Selecione uma tabela.</a>
<?php } else { ?>
    <a class="display-4">Não há registros.</a>
<?php } ?>