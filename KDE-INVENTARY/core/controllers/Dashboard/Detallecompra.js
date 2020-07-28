

const API_PRODUCTO = '../../Core/api/dashboard/Productos.php?action=';
const API_PRODUCTOSCOMPRA = '../../Core/api/dashboard/Productos.php?action=readAll';

const API_SUBCATEGORIAS = '../../Core/api/dashboard/Subcategoria.php?action=readAll';
const API_COMPRA = '../../core/api/dashboard/Compra.php?action=';

const API_DETCOMPRA = '../../core/api/dashboard/Detallecompra.php?action=';

// Método que se ejecuta cuando el documento está listo.
$(document).ready(function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    let params = new URLSearchParams( location.search );
    const ID = params.get( 'id' );
    readOneCompra( ID );
    readProductosCompra( ID );
    fillSelect( API_SUBCATEGORIAS, 'Subcategoria', null );
    fillSelect( API_PRODUCTOSCOMPRA, 'Producto', null );
});



function readProductosCompra( id )
{
    $.ajax({
        dataType: 'json',
        url: API_DETCOMPRA + 'readProductos',
        data: { id_compra: id },
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
                    <td>${row.sub_categoria}</td>                    
                    <td>${row.cantidad}</td>
                    <td>${row.precio}</td>
                    <td class="d-flex justify-content-center">
                    <a class="btn" role="button" ><i class="fas fa-times"></i></a>
                    </td>
                </tr>
                `;


            });
            $( '#productos-detalle' ).html( content );
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














   
    function readOneCompra( id )
    {
        $.ajax({
            dataType: 'json',
            url: API_COMPRA + 'readOne',
            data: { id_compra: id },
            type: 'post'
        })
        .done(function( response ) {
            if ( response.status ) {
                $( '#fecha_compra' ).val( response.dataset.fecha_compra);
                $( '#NombreApellidos' ).val( response.dataset.nombre);
                $( '#id_compra' ).val( response.dataset.id_compra);                
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
    
    

    function readOneDetCompra( id )
    {
        $.ajax({
            dataType: 'json',
            url: API_DETCOMPRA  + 'readOne',
            data: { id_compra: id },
            type: 'post'
        })
        .done(function( response ) {
            if ( response.status ) {
                $( '#fecha_compra' ).val( response.dataset.fecha_compra);
                $( '#NombreApellidos' ).val( response.dataset.nombre);
                $( '#id_compra' ).val( response.dataset.id_compra);                
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
$( '#Proveedor-compra-form' ).submit(function( event ) {
    event.preventDefault();
        saveRow( API_DETCOMPRA, 'create', this, 'comentarios' );
         // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    let params = new URLSearchParams( location.search );
    const ID = params.get( 'id' );
        readProductosCompra( ID )
        
});








$( '#agregar-producto' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_proovedor' ).val() ) {
        saveRowCompra( API_PRODUCTO, 'update', this, 'comentarios' );
    } else {
        saveRowCompra( API_PRODUCTO, 'create', this, 'comentarios' );
        $( '#agregar-producto' )[0].reset();
    }
});



