	$(document).ready( function(){
 		$('.mascara-telefone').mask('(00) 0 0000-0000');
		$('.mascara-cnpj').mask('00.000.000/0000-00', {reverse: true});
		$('.mascara-percentual').mask('###0,00', {reverse: true});
		$('.mascara-cpf').mask('000.000.000-00', {reverse: true});
		$('.mascara-numero').mask('0000000000');
		$('.mascara-numero-2').mask('00');
		$('.mascara-data-hora').mask('00/00/0000 00:00');
		$('.mascara-hora').mask('00:00');
		$('.mascara-cep').mask('00000-000');
		$('.mascara-data').mask('00/00/0000');
		$('.mascara-data-curta').mask('00/0000');
 	});