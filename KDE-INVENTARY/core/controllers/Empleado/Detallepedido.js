
const API_DETALLEPRODUCTO = '../../Core/api/Empleado/Productos.php?action=readAll';

const API_PEDIDOS = '../../Core/api/Empleado/Pedido.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {   
    let params = new URLSearchParams( location.search );
    const ID = params.get( 'id' );
    fillSelect( API_DETALLEPRODUCTO, 'Producto', null );
    readOnePedido( ID );
    readProductosCompra( ID );
});



function readProductosCompra( id )
{
    $.ajax({
        dataType: 'json',
        url: API_PEDIDOS + 'readProductos',
        data: { id_pedido: id },
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
                        <td>${row.cantidad}</td>
                        <td>${row.precio}</td>
                        <td class="d-flex justify-content-center">
                         <a class="btn" role="button" onclick="openDeleteDialog(${row.id_det_pedido})"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                `;


            });
            $( '#detallepedidoscrear' ).html( content );
        } else {    
            $( '#detallecompras' ).html( '' );
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

 
function readOnePedido( id )
{
    $.ajax({
        dataType: 'json',
        url: API_PEDIDOS + 'readOne',
        data: { id_pedido: id },
        type: 'post'
    })
    .done(function( response ) {
        if ( response.status ) {
            $( '#id_pedido' ).val( response.dataset.id_pedido);                
        } else {    
            $( '#detallecompras' ).html( '' );
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



//Evento para crear el detalle de la compra con el id de la compra 
$( '#Detallepedido' ).submit(function( event ) {
    event.preventDefault();
    saveRowPedido( API_PEDIDOS, 'create', this, 'comentarios' );   
    let params = new URLSearchParams( location.search );
    const ID = params.get( 'id' );
    readProductosCompra( ID );
});




// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_det_pedido: id };
    confirmDeletePedido( API_PEDIDOS, identifier );

    
}

