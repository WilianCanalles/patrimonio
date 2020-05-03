<?php
include '../conn-db/conn_db.php';
$exe_tabela = $_POST['tabela'];
if ($exe_tabela == 'empresa') {
    $recebe_lista_itens = $result_tb_empresa;
} elseif ($exe_tabela == 'compra') {
    $recebe_lista_itens = $result_tb_loc_aquisicao;
} elseif ($exe_tabela == 'fabricante') {
    $recebe_lista_itens = $result_tb_fabricante;
} elseif ($exe_tabela == 'modelo') {
    $recebe_lista_itens = $result_tb_modelo_equipamento;
} elseif ($exe_tabela == 'tipo') {
    $recebe_lista_itens = $result_tb_tipo_equipamento;
} else{
    $recebe_lista_itens = [];
}

if (count($recebe_lista_itens) > 0) {

?>

    <select multiple class="form-control">
        <?php
        foreach ($recebe_lista_itens as $lista_itens) {
        ?>
            <option><?php echo $lista_itens[0] . '&nbsp&nbsp&nbsp&nbsp' . $lista_itens[1] ?></option>
        <?php }
        ?>
    </select>
<?php } elseif($exe_tabela == 'primeiro') { ?>
    <a class="display-4">Selecione uma tabela.</a>
<?php } else { ?>
    <a class="display-4">Não há registros.</a>
<?php } ?>