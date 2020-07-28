const API_EMPLEADO = '../../Core/api/dashboard/Empleado.php?action=';

const API_ESTADOS = '../../Core/api/dashboard/Empleado.php?action=readEstados';
const API_TIPOS = '../../Core/api/dashboard/Empleado.php?action=readTipos';
// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_EMPLEADO);
});




$( '#search-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_EMPLEADO, this );
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {

       // Se crean y concatenan las filas de la tabla con los datos de cada registro.
       content += `
            <tr>
                <td>${row.nombre}</td>
                <td>${row.apellido}</td>
                <td>${row.usuario}</td>
                <td>${row.correo}</td>
                <td>${row.telefono}</td>
                <td>${row.tipo}</td>
                <td>${row.estado}</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" onclick="openUpdateModal(${row.id_usuario})"><i class="fas fa-edit"></i></a>
                
                </td>
            </tr>       
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#Usuarios' ).html( content );
}



function openCreateModal()
 {
     // Se limpian los campos del formulario.
     $( '#Agregar-form' )[0].reset();
     // Se abre la caja de dialogo (modal) que contiene el formulario.
     $( '#ModalAgregar' ).modal( 'show' );
     // Se asigna el título para la caja de dialogo (modal).
     $( '#modal-title' ).text( 'Crear usuario' );

     fillSelect( API_ESTADOS, 'Estado', null );
     fillSelect( API_TIPOS, 'Tipo', null );
 }



 
// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
   // Se limpian los campos del formulario.
   $( '#Agregar-form' )[0].reset();
   // Se abre la caja de dialogo (modal) que contiene el formulario.
   $( '#ModalAgregar' ).modal( 'show' );
   // Se asigna el título para la caja de dialogo (modal).
   $( '#modal-title' ).text( 'Modificar Usuario' );


    $.ajax({
        dataType: 'json',
        url: API_EMPLEADO + 'readOne',
        data: { id_usuario: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_usuario' ).val( response.dataset.id_usuario );
            $( '#nombres' ).val( response.dataset.nombre);
            $( '#apellidos' ).val( response.dataset.apellido);
            $( '#usuario' ).val( response.dataset.usuario);
            $( '#telefono' ).val( response.dataset.telefono);
            $( '#correo' ).val( response.dataset.correo);
            fillSelect( API_ESTADOS, 'Estado', response.dataset.id_tipo );
            fillSelect( API_TIPOS, 'Tipo',response.dataset.id_estado);
        } else {
            sweetAlert( 2, result.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}



// Evento para crear o modificar un registro.
$( '#Agregar-form' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_usuario' ).val() ) {
        saveRow( API_EMPLEADO, 'update', this, 'ModalAgregar' );
    } else {
        saveRow( API_EMPLEADO, 'create', this, 'ModalAgregar' );
    }
});

