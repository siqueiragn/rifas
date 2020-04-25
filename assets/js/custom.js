
$(document).ready(function() {

    $('.numero-sorteio').on('click', function (e) {

            if ($(e.target).hasClass('disponivel')) {
                if ($(e.target).hasClass('selecionado')) {
                    $(e.target).removeClass('selecionado');
                } else {
                    $(e.target).addClass('selecionado');
                }
            }

    });

    $('.numero-sorteio').each( function(i, e) {
        console.log(window.innerHeight);
    });
});
