
$(document).ready(function() {

    $('[data-toggle="popover"]').popover();
    numeros = [];
    $('.numero-sorteio').on('click', function (e) {

            if ($(e.target).hasClass('disponivel')) {
                if ($(e.target).hasClass('selecionado')) {
                    $(e.target).removeClass('selecionado');
                    for( var i = 0; i < numeros.length; i++){
                        if ( numeros[i] === $(e.target).html()) { numeros.splice(i, 1); }
                    }
                } else {
                    numeros.push(($(e.target).html()));
                    $(e.target).addClass('selecionado');
                }
            }

            if ($('.selecionado').length > 0) {
                $('.finalizar-compra').removeClass('hidden');
            } else {
                $('.finalizar-compra').addClass('hidden');
            }

            $('.display-numeros').html("Você escolheu os seguintes números: " + (numeros.toString()).replace(/,/g, ", "));
            $('#numeros').val(numeros.toString())
    });

});
