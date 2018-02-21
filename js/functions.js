$(function(){
	$.post( 'controladores/holding.php' ).done( function(respuesta)
	{
		$( '#holdingg' ).html( respuesta );
	});
	$('#holdingg').change(function()
	{
		var el_holding = $(this).val();
		$.post( 'controladores/mandante.php', { holdingg: el_holding} ).done( function( respuesta )
		{
			$( '#mandante' ).html( respuesta );
		});
	});
})
