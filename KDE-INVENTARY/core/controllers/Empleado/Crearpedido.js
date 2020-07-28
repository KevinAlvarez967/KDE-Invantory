
const API_PEDIDOS = '../../Core/api/Empleado/Detallepedidos.php?action=';
const API_MESERO = '../../Core/api/Empleado/Usuario.php?action=readMesero';
const API_MESA = '../../Core/api/Empleado/Mesas.php?action=readAll';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_PEDIDOS );
});



$( '#search-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_PEDIDOS, this );
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
            <td>${row.id_pedido}</td>
            <td>${row.estado}</td>
            <td>${row.fecha}</td>
            <td>${row.nombre} ${row.apellido}</td>
            <td>${row.numero_mesa}</td>
            <td>${row.precio}</td>
            <td class="d-flex justify-content-center">
                 <a class="btn" role="button" href="CreacionPedidos.php?id=${row.id_pedido}"><i class="far fa-align-justify"></i></a>     
            </td>
        </tr>               
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#pedidos-table' ).html( content );
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
}



// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    // Se limpian los campos del formulario.
    $( '#pedido-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#ModalAgregar' ).modal( 'show' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Crear pedido' );

    fillSelectProveedor( API_MESERO, 'Mesero', null );
    fillSelect( API_MESA, 'Mesa', null );
}



// Evento para crear o modificar un registro.
$( '#pedido-form' ).submit(function( event ) {
    event.preventDefault();
        saveRow( API_PEDIDOS, 'create', this, 'ModalAgregar' );
});

