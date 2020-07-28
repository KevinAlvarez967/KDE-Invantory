/*
*   Función para obtener todos los registros disponibles en los mantenimientos de tablas (operación read).
*
*   Parámetros: api (ruta del servidor para obtener los datos).
*
*   Retorno: ninguno.
*/
function readRows( api )
{
    $.ajax({
        dataType: 'json',
        url: api + 'readAll'
    })
    .done(function( response ) {
        // Si no hay datos se muestra un mensaje indicando la situación.
        if ( ! response.status ) {
            sweetAlert( 4, response.exception, null );
        }
        // Se envían los datos a la función del controlador para que llene la tabla en la vista.
        fillTable( response.dataset );
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














function searchRows( api, form )
{
    $.ajax({
        type: 'post',
        url: api + 'search',
        data: $( '#' + form.id ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se envían los datos a la función del controlador para que llene la tabla en la vista.
            fillTable( response.dataset );
            //sweetAlert( 1, response.message, null );
        } else {
            sweetAlert( 2, response.exception, null );
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







function searchRowsPublic( api, form )
{
    $.ajax({
        type: 'post',
        url: api + 'search',
        data: $( '#' + form.id ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            fillTable( response.dataset );
            // Se envían los datos a la función del controlador para que llene la tabla en la vista.
            sweetAlert( 1, response.message, null );
        } else {
            sweetAlert( 2, response.exception, null );
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










/*
*   Función para cargar las opciones en un select de formulario.
*
*   Parámetros: api (ruta del servidor para obtener los datos), selectId (identificador del select en el formulario) y selected (valor seleccionado).
*
*   Retorno: ninguno.
*/
function fillSelect( api, selectId, selected )
{
    $.ajax({
        dataType: 'json',
        url: api
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria para mostrar los datos, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            let content = '';
            // Si no existe un valor previo para seleccionar, se muestra una opción para indicarlo.
            if ( ! selected ) {
                content += '<option value="0" disabled selected>Seleccione una opción</option>';
            }
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se obtiene el valor del primer campo de la sentencia SQL (valor para cada opción).
                value = Object.values( row )[0];
                // Se obtiene el valor del segundo campo de la sentencia SQL (texto para cada opción).
                text = Object.values( row )[1];
                text1 = Object.values( row )[2];
                // Se verifica si el valor de la API es diferente al valor seleccionado para enlistar una opción, de lo contrario se establece la opción como seleccionada.
                if ( value != selected ) {
                    content += `<option value="${value}">${text}</option>`;
                } else {
                    content += `<option value="${value}" selected> ${text}</option>`;
                }
            });
            // Se agregan las opciones a la etiqueta select mediante su id.
            $( '#' + selectId ).html( content );
        } else {
            $( '#' + selectId ).html( '<option value="">No hay opciones disponibles</option>' );
        }

        // Se inicializa el componente Select del formulario para que muestre las opciones.
         //$( 'select' ).formSelect();
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



//FILL SELECT PROVEEDOR



/*
*   Función para cargar las opciones en un select de formulario.
*
*   Parámetros: api (ruta del servidor para obtener los datos), selectId (identificador del select en el formulario) y selected (valor seleccionado).
*
*   Retorno: ninguno.
*/
function fillSelectProveedor( api, selectId, selected )
{
    $.ajax({
        dataType: 'json',
        url: api
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria para mostrar los datos, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            let content = '';
            // Si no existe un valor previo para seleccionar, se muestra una opción para indicarlo.
            if ( ! selected ) {
                content += '<option value="0" disabled selected>Seleccione una opción</option>';
            }
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se obtiene el valor del primer campo de la sentencia SQL (valor para cada opción).
                value = Object.values( row )[0];
                // Se obtiene el valor del segundo campo de la sentencia SQL (texto para cada opción).
                text = Object.values( row )[1];
                text1 = Object.values( row )[2];
                // Se verifica si el valor de la API es diferente al valor seleccionado para enlistar una opción, de lo contrario se establece la opción como seleccionada.
                if ( value != selected ) {
                    content += `<option value="${value}">${text} ${text1}</option>`;
                } else {
                    content += `<option value="${value}" selected>${text} ${text1}</option>`;
                }
            });
            // Se agregan las opciones a la etiqueta select mediante su id.
            $( '#' + selectId ).html( content );
        } else {
            $( '#' + selectId ).html( '<option value="">No hay opciones disponibles</option>' );
        }

        // Se inicializa el componente Select del formulario para que muestre las opciones.
         //$( 'select' ).formSelect();
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












//FILL SELECT PROVEEDOR



























function saveRow( api, action, form, modalId)
{
    let request = null;
    // Se verifica si el formulario cuenta con un campo de tipo archivo, de lo contrario la petición se hace normal.
    if ( form.enctype == 'multipart/form-data' ) {
        request = $.ajax({
            type: 'post',
            url: api + action,
            data: new FormData( $( '#' + form.id )[0] ),
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false
        });
    } else {
        request = $.ajax({
            type: 'post',
            url: api + action,
            data: $( '#' + form.id ).serialize(),
            dataType: 'json'
        });
    }
    request.done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se cargan nuevamente las filas en la tabla de la vista después de agregar o modificar un registro.
            readRows( api );
            sweetAlert( 1, response.message, null );
            // Se cierra la caja de dialogo (modal) donde está el formulario.
            $( '#' + modalId ).modal( 'hide' );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    });
    request.fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}


function saveRowPedido( api, action, form, modalId)
{
    let request = null;
    // Se verifica si el formulario cuenta con un campo de tipo archivo, de lo contrario la petición se hace normal.
    if ( form.enctype == 'multipart/form-data' ) {
        request = $.ajax({
            type: 'post',
            url: api + action,
            data: new FormData( $( '#' + form.id )[0] ),
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false
        });
    } else {
        request = $.ajax({
            type: 'post',
            url: api + action,
            data: $( '#' + form.id ).serialize(),
            dataType: 'json'
        });
    }
    request.done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se cargan nuevamente las filas en la tabla de la vista después de agregar o modificar un registro.
            //readRows( api );
            sweetAlert( 1, response.message, null );
            // Se cierra la caja de dialogo (modal) donde está el formulario.
            $( '#' + modalId ).modal( 'hide' );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    });
    request.fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}











function saveRowCompra( api, action, form, modalId)
{
    let request = null;
    // Se verifica si el formulario cuenta con un campo de tipo archivo, de lo contrario la petición se hace normal.
    if ( form.enctype == 'multipart/form-data' ) {
        request = $.ajax({
            type: 'post',
            url: api + action,
            data: new FormData( $( '#' + form.id )[0] ),
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false
        });
    } else {
        request = $.ajax({
            type: 'post',
            url: api + action,
            data: $( '#' + form.id ).serialize(),
            dataType: 'json'
        });
    }
    request.done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se cargan nuevamente las filas en la tabla de la vista después de agregar o modificar un registro.
            //readRows( api );
            sweetAlert( 1, response.message, null );
            // Se cierra la caja de dialogo (modal) donde está el formulario.
            $( '#' + modalId ).modal( 'hide' );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    });
    request.fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}





















/*
*   Función para manejar los mensajes de notificación al usuario. Requiere el archivo sweetalert.min.js para funcionar.
*
*   Parámetros: type (tipo de mensaje), text (texto a mostrar) y url (ubicación a direccionar al cerrar el mensaje).
*
*   Retorno: ninguno.
*/
function sweetAlert( type, text, url )
{
    // Se compara el tipo de mensaje a mostrar.
    switch ( type ) {
        case 1:
            title = "Éxito";
            icon = "success";
            break;
        case 2:
            title = "Error";
            icon = "error";
            break;
        case 3:
            title = "Advertencia";
            icon = "warning";
            break;
        case 4:
            title = "Aviso";
            icon = "info";
    }
    // Si existe una ruta definida, se muestra el mensaje y se direcciona a dicha ubicación, de lo contrario solo se muestra el mensaje.
    if ( url ) {
        swal({
            title: title,
            text: text,
            icon: icon,
            button: 'Aceptar',
            closeOnClickOutside: false,
            closeOnEsc: false
        })
        .then(function() {
            location.href = url
        });
    } else {
        swal({
            title: title,
            text: text,
            icon: icon,
            button: 'Aceptar',
            closeOnClickOutside: false,
            closeOnEsc: false
        });
    }
}


/*
*   Función para eliminar un registro seleccionado en los mantenimientos de tablas (operación delete). Requiere el archivo sweetalert.min.js para funcionar.
*
*   Parámetros: api (ruta del servidor para enviar los datos) e identifier (objeto con los datos del registro a eliminar).
*
*   Retorno: ninguno.
*/
function confirmDelete( api, identifier )
{
    swal({
        title: 'Advertencia',
        text: '¿Desea eliminar el registro?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Aceptar para hacer la petición de borrado, de lo contrario no se hace nada.
        if ( value ) {
            $.ajax({
                type: 'post',
                url: api + 'delete',
                data: identifier,
                dataType: 'json'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    // Se cargan nuevamente las filas en la tabla de la vista después de borrar un registro.
                    readRows( api );
                    sweetAlert( 1, response.message, null );
                } else {
                    sweetAlert( 2, response.exception, null );
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
    });
}



function confirmDeletePedido( api, identifier)
{
    swal({
        title: 'Advertencia',
        text: '¿Desea eliminar el registro?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Aceptar para hacer la petición de borrado, de lo contrario no se hace nada.
        if ( value ) {
            $.ajax({
                type: 'post',
                url: api + 'delete',
                data: identifier,
                dataType: 'json'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    // Se cargan nuevamente las filas en la tabla de la vista después de borrar un registro.
                    location.reload();
                    //readRows( api );
                    sweetAlert( 1, response.message, null );
                } else {
                    sweetAlert( 2, response.exception, null );
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
    });
}