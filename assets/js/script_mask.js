$(document).ready(function(){
	
	$('#cpf').inputmask("999.999.999-99");
});




/* M�scara de MOEDA com InputMask
 $(document).ready(function(){
    $("#moeda_im").inputmask( 'currency',{
		"autoUnmask": true,
		radixPoint:",",
		groupSeparator: ".",
		allowMinus: false,
		prefix: 'R$ ',
		digits: 2,
		digitsOptional: false,
		rightAlign: true,
		unmaskAsNumber: true
	});
});
*/