const API_PRODUCTO = '../../Core/api/dashboard/Productos.php?action=';
const API_SUBCATEGORIAS = '../../Core/api/dashboard/Subcategoria.php?action=readAll';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_PRODUCTO);
});

$( '#search-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_PRODUCTO, this );
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
                <td>${row.producto}</td>
                <td>${row.precio}</td>
                <td>${row.sub_categoria}</td>
                <td>${row.categoria}</td>
                <td class="d-flex justify-content-center">
                <a class="btn" role="button" onclick="openUpdateModal(${row.id_producto})"><i class="fas fa-edit"></i></a>
                <a class="btn" role="button" onclick="openDeleteDialog(${row.id_producto})"><i class="fas fa-times"></i></a>
                </td>
            </tr>                        
         `;
     });
     // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
     $( '#Productos-table' ).html( content );
 }





 
// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#form-Actualizar' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#Agregar' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Modificar Producto' );


    $.ajax({
        dataType: 'json',
        url: API_PRODUCTO + 'readOne',
        data: { id_producto: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            $( '#id_producto' ).val( response.dataset.id_producto );
            $( '#Nombre' ).val( response.dataset.producto);
            $( '#Precio' ).val( response.dataset.precio);

            fillSelect( API_SUBCATEGORIAS, 'Subcategoria', response.dataset.id_subcategoria );
   
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
$( '#form-Actualizar' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_producto' ).val() ) {
        saveRow( API_PRODUCTO, 'update', this, 'Agregar' );
    } else {
        saveRow( API_PRODUCTO, 'create', this, 'Agregar' );
    }
});




// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_producto: id };
    confirmDelete( API_PRODUCTO, identifier );
}
