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
}
