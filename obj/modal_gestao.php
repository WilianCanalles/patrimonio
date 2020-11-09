<!DOCTYPE html>
<html lang="pt-br">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Button trigger modal -->
    <script src="../js/bundle.min.js"></script>

    <script>
        function extras(cod) {
            $(document).ready(function() {

                $.ajax({
                    url: "../conn-db/conn_extra_gestao.php",
                    method: "POST",
                    data: {
                        verifica: 'extra',
                        cod: cod
                    },
                    success: function(data) {
                        document.getElementById("result11").innerHTML = data;

                    }
                });

            });

        }

        var campos;

        function altera(campo_edit) {
            id = document.getElementById('codigo').innerHTML;
            //alert(campo_edit);
            campos = campo_edit;
            $(document).ready(function() {

                $.ajax({
                    url: "../conn-db/conn_extra_gestao.php",
                    method: "POST",
                    data: {
                        verifica: 'altera',
                        cod: id,
                        campo: campo_edit
                    },
                    success: function(data) {
                        document.getElementById("result1").innerHTML = data;

                    }
                });

            });
        }
        var tabela;
        var codigo_altera_tabela;

        function altera_itens(valor_tabela, campo_edit, cod_item) {
            id = document.getElementById('codigo').innerHTML;
            tabela = valor_tabela;
            codigo_altera_tabela = cod_item;
            console.log(id + '\n' + tabela);
            //alert(campo_edit);
            campos = campo_edit;
            $(document).ready(function() {

                $.ajax({
                    url: "../conn-db/conn_extra_gestao.php",
                    method: "POST",
                    data: {
                        verifica: 'altera_itens',
                        cod: id,
                        campo: campo_edit
                    },
                    success: function(data) {
                        document.getElementById("result2").innerHTML = data;

                    }
                });

            });
        }

        function new_value() {
            if (campos == 'codigo') {
                value = document.getElementById('extra_cod').value;
                text = document.getElementById('extra_cod').value;
            } else if (campos == 'serie') {
                value = document.getElementById('serie').value;
                text = document.getElementById('serie').value;
            } else if (campos == 'nota') {
                value = document.getElementById('nota').value;
                text = document.getElementById('nota').value;
            } else if (campos == 'data') {
                value = document.getElementById('inputData').value;
                text = document.getElementById('inputData').value;
            } else if (campos == 'informacao') {
                value = document.getElementById('informacoes').value;
                text = document.getElementById('informacoes').value;
            } else {
                select = document.getElementById(campos);
                value = select.options[select.selectedIndex].value;
                text = select.options[select.selectedIndex].text;
            }
            select1 = document.getElementById(campos + '1').value;
            codigo = document.getElementById('codigo1').value;
            //alert(campos);
            console.log(value + 'valor\n' + text + 'text\n' + campos + 'campo\n' + select1 + 'hidee\n\n' + codigo);
            if (text != select1 && text != '') {
                console.log('mudou');
                $.ajax({
                    url: "../conn-db/conn_update.php",
                    method: "POST",
                    data: {
                        tabela: 'update_eqp',
                        campo: campos,
                        value: value,
                        codigo: codigo,
                    },
                    success: function(data) {
                        //$('#result').html(data);
                        location.reload();
                    }
                });
            } else if (text == select1 || text == '') {
                console.log('nun mudou');
                if (campos == 'informacao') {
                    $.ajax({
                        url: "../conn-db/conn_update.php",
                        method: "POST",
                        data: {
                            tabela: 'update_eqp',
                            campo: campos,
                            value: '',
                            codigo: codigo,
                        },
                        success: function(data) {
                            //$('#result').html(data);
                            location.reload();
                        }
                    });
                }
            }
        }

        function new_value_itens() {
            select = document.getElementById(campos);
            value = document.getElementById(campos).value;


            select1 = document.getElementById(campos + '1').value;
            codigo = document.getElementById('codigo1').value;
            //alert(campos);
            console.log('valor ' + value + '\n\ncampo ' + campos + '\n\ncodigo ' + codigo_altera_tabela + '\n\ntabela ' + tabela);
            if (value != select1 && value != '') {
                console.log('mudou');
                $.ajax({
                    url: "../conn-db/conn_update.php",
                    method: "POST",
                    data: {
                        tabela: 'update_etp',
                        campo: campos,
                        value: value,
                        codigo: codigo_altera_tabela,
                        tipo_tabela: tabela,
                    },
                    success: function(data) {
                        //$('#result').html(data);
                        location.reload();
                    }
                });
            } else if (value == select1 || value == '') {
                console.log('nun mudou');
            }
        }

        function ajaxdata() {
            $('#inputData').inputmask({
                "mask": "99/99/9999"
            });
        }

        function itens(cod) {
            $(document).ready(function() {

                $.ajax({
                    url: "../conn-db/conn_extra_gestao.php",
                    method: "POST",
                    data: {
                        verifica: cod,
                    },
                    success: function(data) {
                        document.getElementById("resultEmpresa").innerHTML = data;

                    }
                });

            });

        }
        var verifica_uso;
        var atualiza_periferico;

        function update_periferico(cod, periferico) {
            $(document).ready(function() {

                $.ajax({
                    url: "../conn-db/conn_update.php",
                    method: "POST",
                    data: {
                        tabela: 'update_periferico',
                        codigo: cod,
                        periferico: periferico,
                    },
                    success: function(data) {
                        // document.getElementById("resultEmpresa").innerHTML = data;

                    }
                });

            });
        }

        function periferico(cod) {

            $(document).ready(function() {

                $.ajax({
                    url: "../conn-db/conn_extra_gestao.php",
                    method: "POST",
                    data: {
                        verifica: 'periferico',
                        cod: cod
                    },
                    success: function(data) {

                        document.getElementById("periferico_value").innerHTML = "";
                        document.getElementById("result22").value = data;
                        //console.log((document.getElementById("result22").innerHTML).split(','));
                        array = (document.getElementById("result22").value);

                        value_periferico = array.split(',');
                        if (value_periferico == "") {
                            value_periferico = ""
                        }
                        console.log(value_periferico);
                        /*  array=array.replace(/,?\s+/g, "|");
console.log(array+'passo');
                        usados = (array.split(';'));
                        
                        console.log(usados[0]+usados[1]);

                        verifica_uso = (usados[1]);
                        
                        value_periferico = verifica_uso.split(',');
                        
                        console.log(value_periferico);
                        //tt = value_periferico.toString();
                        */

                        valida = true;
                        var autocomplete = new SelectPure(".autocomplete-select", {
                            options: [
                                <?php include '../conn-db/conn_db.php';

                                foreach ($result_tb_equipamento as $line) {

                                ?> {

                                        label: "<?php echo $line['extra_cod'] . " " . $line['tipo_equipamento'] . " " . $line['modelo_equipamento'] ?>",
                                        value: "<?php echo $line['extra_cod'] ?>",

                                    },
                                <?php } ?>
                            ],
                            value: value_periferico,
                            multiple: true,
                            autocomplete: true,
                            icon: "fa fa-times",

                            onChange: value => {
                                console.log(value);
                                atualiza_periferico = value;
                                //alert(atualiza_periferico.toString());
                                update_periferico(cod, value.toString());
                            },
                            classNames: {
                                select: "select-pure__select",
                                dropdownShown: "select-pure__select--opened",
                                multiselect: "select-pure__select--multiple",
                                label: "select-pure__label",
                                placeholder: "select-pure__placeholder",
                                dropdown: "select-pure__options",
                                option: "select-pure__option",
                                autocompleteInput: "select-pure__autocomplete",
                                selectedLabel: "select-pure__selected-label",
                                selectedOption: "select-pure__option--selected",
                                placeholderHidden: "select-pure__placeholder--hidden",
                                optionHidden: "select-pure__option--hidden",
                            }
                        });
                        var resetAutocomplete = function() {
                            autocomplete.reset();
                        };


                    }
                });

            });

        }
    </script>
    <style>
        body {
            font-family: "Roboto", sans-serif;
        }

        .select-wrapper {
            margin: auto;
            max-width: 600px;
            width: calc(80%);
        }

        .select-pure__select {
            align-items: center;
            background: #f9f9f8;
            border-radius: 4px;
            border: 1px solid rgba(0, 0, 0, 0.15);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            box-sizing: border-box;
            color: #363b3e;
            cursor: pointer;
            display: flex;
            font-size: 16px;
            font-weight: 500;
            justify-content: left;
            min-height: 44px;
            padding: 5px 10px;
            position: relative;
            transition: 0.2s;
            width: 100%;
        }

        .select-pure__options {
            border-radius: 4px;
            border: 1px solid rgba(0, 0, 0, 0.15);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            box-sizing: border-box;
            color: #363b3e;
            display: none;
            left: 0;
            max-height: 135px;
            overflow-y: scroll;
            position: absolute;
            top: 50px;
            width: 100%;
            z-index: 5;
        }

        .select-pure__select--opened .select-pure__options {
            display: block;
        }

        .select-pure__option {
            background: #fff;
            border-bottom: 1px solid #e4e4e4;
            box-sizing: border-box;
            height: 44px;
            line-height: 25px;
            padding: 10px;
        }

        .select-pure__option--disabled {
            color: #e4e4e4;
        }

        .select-pure__option--selected {
            color: #e4e4e4;
            cursor: initial;
            pointer-events: none;
        }

        .select-pure__option--hidden {
            display: none;
        }

        .select-pure__selected-label {
            align-items: 'center';
            background: #5e6264;
            border-radius: 4px;
            color: #fff;
            cursor: initial;
            display: inline-flex;
            justify-content: 'center';
            margin: 5px 10px 5px 0;
            padding: 3px 7px;
        }

        .select-pure__selected-label:last-of-type {
            margin-right: 0;
        }

        .select-pure__selected-label i {
            cursor: pointer;
            display: inline-block;
            margin-left: 7px;
        }

        .select-pure__selected-label img {
            cursor: pointer;
            display: inline-block;
            height: 18px;
            margin-left: 7px;
            width: 14px;
        }

        .select-pure__selected-label i:hover {
            color: #e4e4e4;
        }

        .select-pure__autocomplete {
            background: #f9f9f8;
            border-bottom: 1px solid #e4e4e4;
            border-left: none;
            border-right: none;
            border-top: none;
            box-sizing: border-box;
            font-size: 16px;
            outline: none;
            padding: 10px;
            width: 100%;
        }

        .select-pure__placeholder--hidden {
            display: none;
        }
    </style>
</head>

<body>

    <!-- Modal Principal -->
    <section>

        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Equipamento</h5>
                    </div>
                    <div class="modal-body">
                        <div id="result11"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim Modal Principal -->
    <!-- Modal Edicao -->
    <section>

        <div class="modal fade" id="ModalScrollableEditavel" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Equipamento</h5>
                    </div>
                    <div class="modal-body">
                        <div id="result1"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="new_value()">Alterar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim Modal Edicao -->

    <!-- Modal itens -->
    <section>

        <div class="modal fade" id="exampleModalScrollableItens" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Itens</h5>

                    </div>
                    <div class="modal-body">
                        <div id="resultEmpresa"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim Modal itens -->
    <!-- Modal editar itens -->
    <section>

        <div class="modal fade" id="ModalScrollableItens" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Itens</h5>

                    </div>
                    <div class="modal-body">
                        <div id="result2"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="new_value_itens()">Alterar</button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalScrollableItens" data-dismiss="modal">Voltar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim Modal editar itens -->
    <!-- Modal Periferico -->
    <section>

        <div class="modal fade" id="ModalScrollablePeriferico" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Equipamento</h5>
                    </div>
                    <div class="modal-body">

                        <div class="select-wrapper">
                            <span id="periferico_value" class="autocomplete-select"></span>

                      
                        </div>
                        </br> </br> </br> </br> </br>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-dark btn-btn-sm" type="submit" disabled onclick="resetAutocomplete()" value="Limpar"></input>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim Modal Periferico -->
    <div type="hidden" id="result22"></div>

</body>


<script>
   function resetAutocomplete(){
        value = "";
    };
    $('#ModalScrollablePeriferico').on('hide.bs.modal', function(e) {
        location.reload();
        // Faça algo, aqui...
        // alert('modal fechou');
    })
</script>

</html>