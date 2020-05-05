// JAVASCRIPT
$(document).ready(function (keyframes, options) {
    // slide-show para os produtos e suas configurações
    function atualizarInformacoes() {
        $('#productName').text($('.slick-center').data("name"));
        let productPrice = parseFloat($('.slick-center').data("price")).toLocaleString("pt-BR", {
            style: "currency",
            currency: "BRL",
            minimumFractionDigits: 2
        });
        $('#productPrice').text(productPrice);
    }

    $('.slide-slick').on('init', function () {
        atualizarInformacoes();
    });


    $('.slide-slick').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        centerMode: true,
        autoplay: true,
        prevArrow: $('#arrowPrev'),
        nextArrow: $('#arrowNext'),
        responsive: [{
            breakpoint: 576,
            settings: {
                slidesToShow: 1
            }
        }]
    });

    $('.slide-slick').on('afterChange', function () {
        atualizarInformacoes();
    });
});
// Fim do Script \\