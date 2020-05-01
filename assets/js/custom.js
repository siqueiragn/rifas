
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

    $('.legenda-texto').on('click', function (e) {

        if ( $(e.target).hasClass('badge-info')) {

            $('.disponivel').removeClass('hidden');
            $('.comprado').addClass('hidden');
            $('.reservado').addClass('hidden');

        } else if ( $(e.target).hasClass('badge-danger') ) {

            $('.disponivel').addClass('hidden');
            $('.comprado').removeClass('hidden');
            $('.reservado').addClass('hidden');

        } else if ( $(e.target).hasClass('badge-warning') ) {

            $('.disponivel').addClass('hidden');
            $('.comprado').addClass('hidden');
            $('.reservado').removeClass('hidden');

        } else {

            $('.disponivel').removeClass('hidden');
            $('.comprado').removeClass('hidden');
            $('.reservado').removeClass('hidden');

        }

    });

 });

function clonar() {
    $elemento = $('#modelo').clone();
    $($($elemento).children()).children().val(null);
    $('.lista-arquivos').append($elemento);
}

function efetuar_reserva( btn, url ){

    $(btn).prop('disabled', true);
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            rifa          : $('#rifa').val(),
            numeros       : $('#numeros').val(),
            nome_completo : $('#nome_completo').val(),
            cliente       : $('#cliente').val(),
            telefone      : ($('#telefone').val()).replace(/[^\d]/g, ''),
        },
        success: function(retorno){


            $("#area-retorno").html(retorno);

        },
        error: function(retorno){

            $(btn).prop('disabled', false);
            $('#area-retorno').html("Ocorreu um problema ao realizar a operação! Contate o suporte!");
        }
    });
}

function buscar_numeros( btn, url ){
    telefone = ($('#telefone').val()).replace(/[^\d]/g, '');

    if ( telefone.length == 11 ) {
        $(btn).prop('disabled', true);
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                telefone: telefone,
            },
            success: function (retorno) {

                $(".area-comprovantes").html(retorno);
                $('#modal_compra').modal('hide');

            },
            error: function (retorno) {

                $(btn).prop('disabled', false);
                $('.area-comprovantes').html("Ocorreu um problema ao realizar a operação! Contate o suporte!");
                $('#modal_compra').modal('hide');
            }
        });
    } else {
        alert("Preencha um telefone válido!");
    }
}

function  preparar_dados_envio(cliente, rifa) {

    if ( cliente != '' && rifa != '' ){

        $('#modal_upload').modal('show');
        $('#rifa').val(rifa);
        $('#cliente').val(cliente);
    }

}