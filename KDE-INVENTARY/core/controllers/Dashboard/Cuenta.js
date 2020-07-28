const API_CUENTA = '../../Core/api/Dashboard/Usuario.php?action=';

$( document ).ready(function() {
    let params = new URLSearchParams( location.search );
    const ID = params.get( 'id' );
    readOneUsuario(ID);
    //Se llama la funcion que permite leer el perfil del cliente
});


function readOneUsuario(id)
{
    $.ajax({
        dataType: 'json',
        url: API_CUENTA + 'readProfile',
        data: { id_usuario_geren: id },
        type: 'post'
    })
    .done(function( response ) {
        if ( response.status ) {
            $( '#Nombres' ).val( response.dataset.nombres );
            $( '#Apellidos' ).val( response.dataset.apellidos);
            $( '#Correo' ).val( response.dataset.correo);
            $( '#Usuario' ).val( response.dataset.usuario );                                    

            
            $( '#telefono' ).val( response.dataset.telefono);

            $( '#idusuario' ).text( response.dataset.id_usuario_geren);

            $( '#Usuario1' ).text( response.dataset.usuario );
            $( '#Correo1' ).text( response.dataset.correo);
        } else {
            $( '#title' ).html( `<i class="material-icons small">cloud_off</i><span class="red-text">${response.exception}</span>` );
            $( '#usuario' ).html( '' );
        }
    })
    .fail(function( jqXHR ) {
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}


//Abre el formulario para poder actualizar los datos del perfil
function openModalProfile()
{
    $( '#profile-modal' ).modal( 'show' );

    $.ajax({
        dataType: 'json',
        url: API_CUENTA + 'readProfile'
    })
    .done(function( response ) {
        if ( response.status ) {          
            $( '#Nombres1' ).val( response.dataset.nombres );
            $( '#Apellidos1' ).val(response.dataset.apellidos);
            $( '#email' ).val( response.dataset.correo);
            $( '#User' ).val( response.dataset.usuario);
            $( '#telefono1' ).val( response.dataset.telefono);
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
}




//Realiza la accion editProfile en el evento submit en el formulario
$( '#edit-perfil' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_CUENTA + 'editProfile',
        data: $( '#edit-perfil' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        if ( response.status ) {
            $( '#profile-modal' ).modal( 'hide' );
            sweetAlert( 1, response.message, 'Perfil.php' );
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
