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

function cambiarEstado(boton) {
  let id = parseInt($(boton).closest('tr').find('td:eq(0)').text());
  let estado = $(boton).closest('tr').find('td:eq(3)').text();

  let nuevoEstado = estado === 'pendiente' ? 'preparando' :
                    estado === 'preparando' ? 'listo' :
                    estado === 'listo' ? 'entregado' : 'pendiente';

  Swal.fire({
      title: '¿Estás seguro?',
      text: `¿Quieres cambiar el estado a "${nuevoEstado}"?`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, cambiar',
      cancelButtonText: 'Cancelar'
  }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              url: '../controllers/ventas/cambiarEstado.php',
              type: "POST",
              data: { id: id, estado: nuevoEstado },
              success: function (respuesta) {
                  if (respuesta == 'ok') {
                      Swal.fire({
                          title: '¡Estado cambiado!',
                          text: `El estado del pedido fue actualizado a "${nuevoEstado}".`,
                          icon: 'success',
                          confirmButtonText: 'Aceptar'
                      }).then(() => {
                          cargarVentas();
                      });
                  } else {
                      console.error("Error al cambiar estado:", respuesta);
                  }
              },
              error: function (xhr, status, error) {
                  console.error("Error AJAX:", error);
              }
          });
      }
  });
}

function anularEstado(boton) {
  let id = parseInt($(boton).closest('tr').find('td:eq(0)').text());

  Swal.fire({
      title: '¿Estás seguro?',
      text: '¿Quieres anular el pedido?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, anular',
      cancelButtonText: 'Cancelar'
  }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              url: '../controllers/ventas/anularEstado.php',
              type: "POST",
              data: { id: id },
              success: function (respuesta) {
                  if (respuesta == 'ok') {
                      Swal.fire({
                          title: '¡Pedido anulado!',
                          text: 'El pedido fue anulado correctamente.',
                          icon: 'success',
                          confirmButtonText: 'Aceptar'
                      }).then(() => {
                          cargarVentas();
                      });
                  } else {
                      console.error("Error al anular estado:", respuesta);
                  }
              },
              error: function (xhr, status, error) {
                  console.error("Error AJAX:", error);
              }
          });
      }
  });
}

window.onload = function() {
    cargarVentas();
}

$('#btnBuscar').on('click', function () {
    cargarVentas();
});
