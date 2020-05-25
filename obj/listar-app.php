<?php
include '../conn-db/conn_db.php';
//print_r($result_tb_equipamento);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nosso Patrimonio</title>
    <link rel="icon" href="../img/Phoenix-Patrimonial.png">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <!-- Bootstrap core JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/jquery.mask.min.js"></script>

    <script type="text/javascript" src="../js/jquery-3.5.0.js"></script>
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../js/js_cadastro.js"></script>


</head>

<body>

    <div class="container">
        <div class="row" style="justify-content: center">
            <div class="col-lg-8">
                <h1>Equipamentos</h1>
                <table id="teste" class="display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Modelo</th>
                            <th>Fabricante</th>
                            <th>N° Serie</th>
                            <th>Empresa</th>
                            <th>Fornecedor</th>
                            <th>Nota Fiscal</th>
                            <th>Data Compra</th>
                            <th>Informações</th>
                            <th>Periferico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // print_r($produto);
                        ?>
                        <?php
                        foreach ($result_tb_equipamento as $lista_itens) {
                        ?>
                            <tr>
                                <td><?php echo $lista_itens['0']; ?></td>
                                <td><?php echo $lista_itens['1']; ?></td>
                                <td><?php echo $lista_itens['2']; ?></td>
                                <td><?php echo $lista_itens['3']; ?></td>
                                <td><?php echo $lista_itens['4']; ?></td>
                                <td><?php echo $lista_itens['5']; ?></td>
                                <td><?php echo $lista_itens['6']; ?></td>
                                <td><?php echo $lista_itens['7']; ?></td>
                                <td><?php echo $lista_itens['8']; ?></td>
                                <td><?php echo $lista_itens['9']; ?></td>
                                <td><?php echo $lista_itens['10']; ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Modelo</th>
                            <th>Fabricante</th>
                            <th>N° Serie</th>
                            <th>Empresa</th>
                            <th>Fornecedor</th>
                            <th>Nota Fiscal</th>
                            <th>Data Compra</th>
                            <th>Informações</th>
                            <th>Periferico</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $('#teste').DataTable({
                scrollY: 300,
                "scrollX": true,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nenhum dado encontrado",
                    "info": "Mostrando _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum dado encontrado",
                    "infoFiltered": "(Filtro de _MAX_ registros totais)",
                    "paginate": {
                        "first": "Primeiro",
                        "last": "Ultimo",
                        "next": "Proximo",
                        "previous": "Anterior",
                    },
                    "search": "Busca:",

                },
                //"lengthChange": false,


            });
        });
    </script>
</body>

</html>