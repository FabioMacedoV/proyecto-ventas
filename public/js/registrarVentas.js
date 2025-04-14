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

function actualizarTotal() {
    let total = 0;

    $("#tableVenta tr").each(function () {
        const precio = parseFloat($(this).find("td:eq(2)").text()) || 0;
        const cantidad = parseInt($(this).find(".cantidad").val()) || 0;

        total += precio * cantidad;
    });

    $("#total").val(total.toFixed(2));
}

function agregarProducto(id, nombre, precio){
    resp = '<tr>';
    resp += '<td style="display: none;">' + id + '</td>';
    resp += '<td>' + nombre + '</td>';
    resp += '<td>' + precio + '</td>';
    resp += '<td><input type="number" class="form-control cantidad" value="1" min="1" onchange="actualizarTotal()"></td>';
    resp += '<td><button type="button" class="btn btn-danger" onclick="eliminarProducto(this)">Eliminar</button></td>'
    resp += '</tr>';
    
    $("#tableVenta").append(resp);
    actualizarTotal();
}

function guardarPedido() {
    let productos = [];

    $("#tableVenta tr").each(function () {
        const idProducto = parseInt($(this).find("td:eq(0)").text());
        const cantidad = parseInt($(this).find(".cantidad").val());
        
        productos.push({ idProducto, cantidad });
    });

    let total = parseFloat($("#total").val());

    $.ajax({
        url: '../controllers/ventas/guardarPedido.php',
        method: 'POST',
        data: { productos: JSON.stringify(productos), total: total },
        success: function (respuesta) {
            alert('Pedido guardado correctamente');
            // limpiar tabla y total
        },
        error: function (xhr, status, error) {
            console.error("Error al guardar:", error);
        }
    });
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

function eliminarProducto(boton) {   
    $(boton).closest('tr').remove();
    actualizarTotal();
}

$('#btnRegistrarVenta').on('click', function () {
    guardarPedido();
});
