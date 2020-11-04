<section>
    <div class="container">
        <section style="margin-top: 15%; border-top: solid 1px black; padding-top: 10%;">
            <div class="row">
                <div class="col-sm-4 ">

                    <input class="btn btn-lg btn_gestao btn-block" type="submit" value="Empresa" data-toggle="modal" data-target="#exampleModalScrollableItens" onclick="itens('empresa')">

                </div>
                <div class="col-sm-4 ">

                    <input class="btn btn-lg btn_gestao btn-block" type="submit" value="Fabricante" data-toggle="modal" data-target="#exampleModalScrollableItens" onclick="itens('fabricante')">

                </div>
                <div class="col-sm-4 ">

                    <input class="btn btn-lg btn_gestao btn-block" type="submit" value="Fornecedor" data-toggle="modal" data-target="#exampleModalScrollableItens" onclick="itens('fornecedor')">

                </div>

            </div>
        </section>
        <section style="padding-top: 5%; padding-bottom: 10%; border-bottom: solid 1px black;">
            <div class="row">
                <div class="col-sm-4 ">

                    <input class="btn btn-lg btn_gestao btn-block" type="submit" value="Local" data-toggle="modal" data-target="#exampleModalScrollableItens" onclick="itens('local')">

                </div>
                <div class="col-sm-4 ">

                    <input class="btn btn-lg btn_gestao btn-block" type="submit" value="Modelo" data-toggle="modal" data-target="#exampleModalScrollableItens" onclick="itens('modelo')">

                </div>
                <div class="col-sm-4 ">

                    <input class="btn btn-lg btn_gestao btn-block" type="submit" value="Tipo" data-toggle="modal" data-target="#exampleModalScrollableItens" onclick="itens('tipo')">

                </div>


            </div>
        </section>
    </div>
</section>
<?php
include 'modal_gestao.php';
?>