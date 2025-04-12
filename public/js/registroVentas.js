function cargarVentas(){

    let id = $('#filtro_id').val();
    let estado = $('#filtro_estado').val();

    $.ajax({
        url: '../controllers/ventas/listarVentas.php',
        type: "POST",
        data: {id: id, estado: estado},
        success: function (respuesta) {
            $('#tablaVentasCafeteria').html(respuesta);
        },
        error: function (xhr, status, error) {
            console.error("Error AJAX:", error);
            $('#tablaVentasCafeteria').html('<p>Ocurrió un error al buscar los pedidos.</p>');
        }
    })
}

function obtenerPedido(id){
    window.location.href = '/proyecto-ventas/app/views/detallePedido.php?id=' + id;
}

window.onload = function() {
    cargarVentas();
}

$('#btnBuscar').on('click', function () {
    cargarVentas();
});
