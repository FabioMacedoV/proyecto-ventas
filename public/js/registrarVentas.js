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

  if (productos.length === 0 || total <= 0) {
      Swal.fire({
          icon: 'warning',
          title: '¡Atención!',
          text: 'Debe agregar productos antes de guardar el pedido.',
          confirmButtonColor: '#3085d6'
      });
      return;
  }

  Swal.fire({
      title: '¿Desea guardar el pedido?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Sí, guardar',
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33'
  }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              url: '../controllers/ventas/guardarPedido.php',
              method: 'POST',
              data: { productos: JSON.stringify(productos), total: total },
              success: function (respuesta) {
                  Swal.fire({
                      icon: 'success',
                      title: '¡Pedido guardado!',
                      text: 'El pedido se registró correctamente.',
                      confirmButtonColor: '#3085d6'
                  }).then(() => {
                      // Limpiar tabla y total
                      $("#tableVenta").empty();
                      $("#total").val("0.00");
                      $("#btnRegistrarVenta").prop("disabled", true);
                      window.location.href = '/proyecto-ventas/app/views/registroVentas.php';
                  });
              },
              error: function (xhr, status, error) {
                  console.error("Error al guardar:", error);
                  Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: 'Hubo un problema al guardar el pedido.',
                      confirmButtonColor: '#d33'
                  });
              }
          });
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
