$(document).ready(function() {
    $("#inputData").mask("00/00/0000");
})


function validar() {
    var nome = form12.data.value;
    var n = nome.length;
    var today = new Date();
    var date = String(today.getDate()).padStart(2, '0') + '/' + String(today.getMonth() + 1).padStart(2, '0') + '/' + today.getFullYear(); //Retorna data do servidor

    if (n == 0) { //valida se o campo data esta vazio caso esteja o campo é preenchido com a data atual do servidor

        document.getElementById('inputData').value = date;
        return true;
    }
    if (n > 0 && n <= 8) { //valida se o campo data esta preenchido conforme a mascara 00/00/0000
        document.getElementById("msg_data").innerHTML = "Digite ano completo";

        form12.data.focus();

        document.getElementById("div-erro").style.display = "Block"; //faz aparecer a mensagem de erro.

        return false;
    }
}