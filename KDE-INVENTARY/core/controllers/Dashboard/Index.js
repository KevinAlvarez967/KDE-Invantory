// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_USUARIOS = '../../core/api/Dashboard/Usuario.php?action=';

$( document ).ready(function() {
    // Se llama a la función que verifica la existencia de usuarios. Se encuentra en el archivo account.js
    checkUsuarios();
});







$( '#Login' ).submit(function( event       )
{
    event.preventDefault();
    $.ajax({
        type: "post",
        url: API_USUARIOS + 'Login',
        data: $('#Login').serialize(),
        dataType: "json"
        
    })
    .done(function( response )
    {
        if ( response.status ) {
            sweetAlert( 1, response.message, 'Inicio.php' );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function (jqXHR) {
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }


      })

});

