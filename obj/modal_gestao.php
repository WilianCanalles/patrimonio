<!DOCTYPE html>
<html lang="pt-br">

<head>
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
        function altera_itens(valor_tabela, campo_edit) {
            id = document.getElementById('codigo').innerHTML;
            tabela = valor_tabela;
            console.log(id + '\n'+ tabela);
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
    </script>
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="">Alterar</button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalScrollableItens" data-dismiss="modal">Voltar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Fim Modal editar itens -->

</body>

</html>