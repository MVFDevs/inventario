function cargar(pagina){
    var url=pagina
    $.ajax({
        type: "POST",
        url:url,
        data:{},
        success: function(datos){
            $('#paginas').html(datos);
        }
    });
};
$(function(){
	$.post( 'controladores/buscarHolding.php' ).done( function(respuesta)
	{
		$( '#holdingObra' ).html( respuesta );
    $( '#holdingMandante' ).html(respuesta);
	});
	$('#holdingObra').change(function()
	{
		var el_holding = $(this).val();
		$.post( 'controladores/buscarMandante.php', { holding: el_holding} ).done( function( respuesta )
		{
			$( '#mandante' ).html( respuesta );
		});
	});
});
$(function(){
	$.post( 'controladores/buscarFuncionario.php' ).done( function(respuesta)
	{
		$( '#funcionario' ).html( respuesta );
	});
	$('#funcionario').change(function()
	{
		var rut = $(this).val();
		$.post( 'controladores/buscarProductos.php', { rut: rut} ).done( function( respuesta )
		{
			$( '#productos' ).html( respuesta );
		});
	});
});
$(
  function() {
    $.post('controladores/buscarObra.php').done(
      function (respuesta) {
        $('#ObraMod').html(respuesta);
      }
    );
    $('#ObraMod').on('change',
      function () {
        var id_obra = $(this).val();
        $.post( 'controladores/buscarDatosObra.php', { id: id_obra} ).done( function( respuesta )
        {
          $( '#formularioObra' ).html( respuesta );
        });
      }
    );
  }
);
$(
  function() {
    $.post( 'controladores/buscarFuncionarioMod.php' ).done( function(respuesta)
  	{
      $( '#funcionarioMod' ).html( respuesta );
  	});
    $('#funcionarioMod').on('change',
      function () {
        var rut = $(this).val();
        $.post( 'controladores/buscarDatosFun.php', { rut: rut} ).done( function( respuesta )
        {
          $( '#formularioFuncionario' ).html( respuesta );
        });
      }
    );
  }
);
$(
  function() {
    $.post( 'controladores/buscarProdMod.php' ).done( function(respuesta)
  	{
      $( '#producto' ).html( respuesta );
  	});
    $('#producto').on('change',
      function () {
        var codigo = $(this).val();
        $.post( 'controladores/buscarDatosProd.php', { codigo: codigo} ).done( function( respuesta )
        {
          $( '#formularioProducto' ).html( respuesta );
        });
      }
    );
  }
);
