const API_DETPEDIDO = '../../Core/api/dashboard/Detallepedido.php?action=';


// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_DETPEDIDO );
});




$( '#search-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_DETPEDIDO, this );
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
                <td>${row.numero_mesa}</td>
                <td>${row.fecha}</td>
                <td>${row.estado}</td>
                <td>${row.nombre}${row.apellido}</td>
                <td>${row.precio}</td>
                <td class="d-flex justify-content-center">
                    <a class="btn btn-outline-info" onclick="readProductosPedido(${row.id_det_pedido})">Ver mas</a>
                </td>
            </tr>  
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#pedido-table' ).html( content );
    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
}





function readProductosPedido( id )
{

     // Se abre la caja de dialogo (modal) que contiene el formulario.
     $( '#Moreinfo' ).modal( 'show' );
    $.ajax({
        dataType: 'json',
        url: API_DETPEDIDO + 'readOne',
        data: { id_det_pedido: id },
        type: 'post'
    })
    .done(function( response ) {
        if ( response.status ) {
            let content = '';
            
            response.dataset.forEach(function( row ) {

                content += 
                `
                <tr>
                    <td>${row.producto}</td>
                    <td>${row.precio}</td>
                    <td>${row.cantidad}</td>                                
                </tr>              
                `;


            });
            $( '#productos-pedidos' ).html( content );
        } else {    
            $( '#detallepedido' ).html( '' );
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
