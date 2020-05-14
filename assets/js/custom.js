
$(document).ready(function() {
    $($('.carousel-item.active').children()).addClass('animate');
    $('#myCarousel').on('slid.bs.carousel', function () {
        $($('.carousel-item').children()).removeClass('animate');
        $($('.carousel-item.active').children()).addClass('animate');

    });

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
        $('#erro-buscar').html('');

        if ( $(e.target).hasClass('badge-disponivel')) {

            $('.disponivel').removeClass('hidden');
            $('.comprado').addClass('hidden');
            $('.reservado').addClass('hidden');

        } else if ( $(e.target).hasClass('badge-comprado') ) {

            $('.disponivel').addClass('hidden');
            $('.comprado').removeClass('hidden');
            $('.reservado').addClass('hidden');

        } else if ( $(e.target).hasClass('badge-reservado') ) {

            $('.disponivel').addClass('hidden');
            $('.comprado').addClass('hidden');
            $('.reservado').removeClass('hidden');

        } else if ( $(e.target).hasClass('badge-selecionado') ) {

            verificar_numeros();

        } else {

            $('.disponivel').removeClass('hidden');
            $('.comprado').removeClass('hidden');
            $('.reservado').removeClass('hidden');

        }

    });
    $('.badge-reservado').html('Reservado (' + $('.reservado').length + ')');
    $('.badge-comprado').html('Comprado (' + $('.comprado').length + ')');
    $('.badge-disponivel').html('Disponível (' + $('.disponivel').length + ')');

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

function verificar_numeros() {

    if ($('#meus_numeros').val() == '') {
        $('#modal_buscar').modal('show');
    } else {
        marcar_numeros($('#meus_numeros').val().split(","));
    }

}

function buscar_numeros_consulta( url ){

    telefone = ($('#telefone_buscar').val()).replace(/[^\d]/g, '');
    rifa     = $('#rifa').val();

    if ( telefone.length == 11 && rifa != '' ) {

        $("#erro-label").html('');

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                telefone: telefone,
                rifa    : rifa,
            },
            success: function (retorno) {

                if ( retorno == 'N' ) {
                    $('#erro-buscar').html("Não foram encontrados números para esse telefone!");
                    marcar_numeros( [] );
                } else {
                    $("#meus_numeros").val(retorno);
                    marcar_numeros($('#meus_numeros').val().split(","));
                 }
                $('#modal_buscar').modal('hide');

            },
            error: function (retorno) {

                $("#erro-label").html('Ocorreu um problema ao realizar a operação!');
                $('#modal_buscar').modal('hide');
            }
        });

    } else {
        $("#erro-label").html('Preencha um telefone válido! (XX) X XXXX-XXXX');
    }

}

function marcar_numeros( numeros ) {

    $('.numero-sorteio').addClass('hidden');
    $('.numero-sorteio').each( function(i, e) {
        if ( numeros.indexOf( (i).toString()) != -1) {
            $(e).removeClass('hidden');
        }
    });

}

function validar( form ) {

    erros = "";

    if ( ($("#nome_form").val()).indexOf(' ') == 0 ) {
        erros += "<br>Informe pelo menos um sobrenome (separado por espaço)";
    } else {

        nome = ($("#nome_form").val()).split(" ");
        if (nome.length < 2 ) {
            erros += "<br>O nome deve conter um sobrenome";
        } else {
            if (nome[0].length < 3) {
                erros += "<br>O primeiro nome deve conter no mínimo três letras";
            }
            if (nome[1].length < 3) {
                erros += "<br>O segundo nome deve conter no mínimo três letras";
            }
        }
    }

    if ( erros == "") {
       $(form).submit();
    }  else {
        $('#erros-submit').html(erros + "<br>");
    }

}