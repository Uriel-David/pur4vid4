// JAVASCRIPT
$(document).ready(function (keyframes, options) {
    // Fazer a página voltar ao topo \\
    let windowH = $(window).height() / 2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $(".subir").css('display','flex');
        } else {
            $(".subir").css('display','none');
        }
    });

    $('.subir').click(function(){
        $('html, body').animate({scrollTop: 0}, 500);
    });
});
// Fim do Script \\