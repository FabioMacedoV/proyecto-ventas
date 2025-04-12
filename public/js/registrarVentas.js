function cargarMenu(){
    let nombre = $('#nombre').val();
    let id = parseInt($('#id_categorias').val());

    $.ajax({
        url: '../controllers/ventas/cargarMenu.php',
        type: "POST",
        data: {nombre: nombre, id : id},
        success: function (respuesta) {
            $('#tableProductos').html(respuesta);
        },
        error: function (xhr, status, error) {
            console.error("Error AJAX:", error);
            $('#tableProductos').html('<p>Ocurrió un error al cargar el menú.</p>');
        }
    })
}

function agregarProducto(nombre, precio){
    resp = '<tr>';
    resp += '<td>' + nombre + '</td>';
    resp += '<td>' + precio + '</td>';
    resp += '<td><input type="number" class="form-control" value="1" min="1"></td>';
    resp += '<td><button type="button" class="btn btn-danger" onclick="eliminarProducto(this)">Eliminar</button></td>'
    resp += '</tr>';

    $("#tableVenta").append(resp);
}

window.onload = function() {
    cargarMenu();
}

$('#nombre').on('keyup', function () {
    cargarMenu();
});

$('#id_categorias').on('change', function () {
    cargarMenu();
});