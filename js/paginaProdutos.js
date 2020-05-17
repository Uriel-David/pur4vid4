// JAVASCRIPT
$(document).ready(function (keyframes, options) {
    // Variáveis do código
    var sum = 0;
    var valorTotal = 0;
    var modeloPreco = 0;
    var addExtra1Preco = 0;
    var addExtra2Preco = 0;
    var addExtra3Preco = 0;
    var addExtra4Preco = 0;

    //Função para adicionar o preço no botão de adicionar o carrinho dinâmicamente
    function addPreco() {
        // Recupera valores do Select com o modelo de prancha escolhido
        idModelo = $("#tamanhoPrancha").find(":selected").val();

        if (idModelo === "5'8") {
            modeloPreco = 300;
        } else if (idModelo === "5'9") {
            modeloPreco = 400;
        } else if (idModelo === "6'0") {
            modeloPreco = 500;
        } else if (idModelo === "") {
            modeloPreco = 0;
        }

        // Recupera valores do Select do adicional 1
        idAdd1 = $("#addExtra1").find(":selected").val();

        if (idAdd1 === "300") {
            addExtra1Preco = 300;
        } else if (idAdd1 === "") {
            addExtra1Preco = 0;
        }

        // Recupera valores do Select do adicional 2
        idAdd2= $("#addExtra2").find(":selected").val();

        if (idAdd2 === "100") {
            addExtra2Preco = 100;
        } else if (idAdd2 === "") {
            addExtra2Preco = 0;
        }

        // Recupera valores do Select do adicional 3
        idAdd3 = $("#addExtra3").find(":selected").val();

        if (idAdd3 === "50") {
            addExtra3Preco = 50;
        } else if (idAdd3 === "") {
            addExtra3Preco = 0;
        }

        // Recupera valores do Select do adicional 4
        idAdd4 = $("#addExtra4").find(":selected").val();

        if (idAdd4 === "150") {
            addExtra4Preco = 150;
        } else if (idAdd4 === "") {
            addExtra4Preco = 0;
        }

        // Soma todos os valores obtidos a 'sum', em sequência 'valorTotal' recebe sum e formata o valor recebido
        sum = modeloPreco + addExtra1Preco + addExtra2Preco + addExtra3Preco + addExtra4Preco;
        valorTotal = sum.toLocaleString("pt-BR", {
            style: "currency",
            currency: "EUR",
            minimumFractionDigits: 2
        });

        // adiciona o texto e o valor da compra de 'valorTotal' até o momento do cliente
        $("#btnCarrinho").text("Adicione ao carrinho: " + valorTotal);
    }

    // verifica quando o Select com o modelo da prancha muda e então altera o valor do produto com a função 'addPreco()'
    $("#tamanhoPrancha").change(function() {
        addPreco();
    });
    $("#tamanhoPrancha").trigger("change");

    // verifica quando o Select com o adicional 1 muda e então altera o valor do produto com a função 'addPreco()'
    $("#addExtra1").change(function() {
        addPreco();
    });
    $("#addExtra1").trigger("change");

    // verifica quando o Select com o adicional 2 muda e então altera o valor do produto com a função 'addPreco()'
    $("#addExtra2").change(function() {
        addPreco();
    });
    $("#addExtra2").trigger("change");

    // verifica quando o Select com o adicional 3 muda e então altera o valor do produto com a função 'addPreco()'
    $("#addExtra3").change(function() {
        addPreco();
    });
    $("#addExtra3").trigger("change");

    // verifica quando o Select com o adicional 4 muda e então altera o valor do produto com a função 'addPreco()'
    $("#addExtra4").change(function() {
        addPreco();
    });
    $("#addExtra4").trigger("change");

});