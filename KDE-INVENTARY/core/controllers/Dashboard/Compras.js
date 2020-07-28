const API_COMPRA = '../../core/api/dashboard/Compra.php?action=';

const API_PROVEEDORES = '../../core/api/dashboard/Compra.php?action=readProveedores';
// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_COMPRA);
});


$( '#search-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_COMPRA, this );
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
                <td>${row.fecha_compra}</td>
                <td>${row.total}</td>
                <td>${row.nombre} ${row.apellido}</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" href="DetalleCompras.php?id=${row.id_compra}"><i class="far fa-align-justify"></i></a>               
                <a class="btn" role="button" onclick="openUpdateModal(${row.id_compra})"><i class="fas fa-pencil"></i></i></a>                
                </td>
            </tr>                        
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#compra-table' ).html( content );
}




// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    // Se limpian los campos del formulario.
    $( '#compra-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#ModalAgregar' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Crear Compra' );

    //llenando el fillselect donde se muestran los proveedores ya ingresados en la base de datos para
    //poder ingresar una compra de producto
    fillSelectProveedor( API_PROVEEDORES, 'Proveedor', null );
}




// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#compra-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#ModalAgregar' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Modificar  Compra' );


    $.ajax({
        dataType: 'json',
        url: API_COMPRA + 'readOne',
        data: { id_compra: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_compra' ).val( response.dataset.id_compra );
            $( '#Fecha' ).val( response.dataset.fecha_compra);

            fillSelectProveedor( API_PROVEEDORES, 'Proveedor', response.dataset.id_proveedor);
            
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
$( '#compra-form' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_compra' ).val() ) {
        saveRow( API_COMPRA, 'update', this, 'ModalAgregar' );
    } else {
        saveRow( API_COMPRA, 'create', this, 'ModalAgregar' );
    }
});


    