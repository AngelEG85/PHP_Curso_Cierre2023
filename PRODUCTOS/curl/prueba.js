$(document).ready(function() {

    $(function(){
        getProductos();
    });

    function getProductos() {
    var url= 'http://localhost/apirest_php/api/productos';
    $('#contenido').empty();
    $.ajax({
    type:'GET',
    url:url,
    dataType:'json',
    success: function(respuesta){
        console.log(respuesta);
        var productos = respuesta;
        if(producto.length >0){
        jquery.each(productos,function(i,prod){
            var btnEditar ="<button class='btn btn-primary btn-sm btnEditar'>Editar</button>";
            var btnBorrar = "<button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>Borrar</i></button>";
            $('#contenido').append('<tr><td>'+i+'</td><td>'+prod.nombre+'</td><td>'+prod.precio+'</td><td>'+prod.Cantidad + '</td><td>'+btnEditar+btnBorrar+'</td><td>')
        });
        }
    }

    });

    };

});

