const USUARIOS_GEREN = '../../Core/api/Dashboard/Usuario.php?action=';


// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que verifica la existencia de usuarios. Se encuentra en el archivo account.js
        checkUsuarios();
});



//Evento submit que permite el registrarse 
$( '#Usuario-form' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: USUARIOS_GEREN + 'register',
        data: $( '#Usuario-form' ).serialize(),
        dataType: 'json'    
    })
    .done(function( response ) {
        if ( response.status ) {
            sweetAlert( 1, response.message, '/KDE-Invantory/KDE-INVENTARY/views/Dashboard/Index.php' );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});