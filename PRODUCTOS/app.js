$(document).ready(function () {
  console.log("la app esta funcionando");
 
    //Opciones para inicio de las tablas
    var id_prop, opcion;
    opcion = 4;

  // Validaciones de Login
  $("#formLogin").submit(function (e) {
    e.preventDefault();
    var usuario = $.trim($("#usuario").val());
    var password = $.trim($("#password").val());
    var email = $.trim($("#email").val()); 

    if (usuario.length == "" || password.length == "") {
      swal.fire({
        icon: "warning",
        title: "Debe ingresar un usuario y/o contraseña!!!!!!",
      });
    } else {
      $.ajax({
        url: "logeo.php",
        type: "POST",
        datatype: "json",
        data: {
          usuario: usuario,
          password: password,
          email: email,
        },
        success: function (data) {
          if (data == "null") {
            swal.fire({
              icon: "error",
              title: "usuario y/o password incorrecta",
            });
          } else {
            swal
              .fire({
                icon: "success",
                title: "Conexion Exitosa",
                confirmButtonText: "Ingresar",
              })
              .then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "index.php";
                }
              });
          }
        },
      });
    }
  });

  var fila; //captura la fila, para editar o eliminar
  //submit para el Alta y Actualización
  $("#formProductos").submit(function (e) {
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
   
    Producto = $.trim($("#Producto").val());
    Cantidad = $.trim($("#Cantidad").val());
    Precio = $.trim($("#Precio").val());
    $.ajax({
      url: "http://localhost/apirest_php/api/",
      type: "POST",
      dataType: "json",
      data: {
        nombre: Producto,
        Cantidad: Cantidad,
        Precio: Precio,
        
      },
      success: function (data) {
        console.log(data);
        nombre = data[0].nombre;
        Precio = data[0].Precio;
        Cantidad = data[0].Cantidad;
       
        tablaProductos.ajax.reload(null, false);
      },
    });
    $("#modalCRUD").modal("hide");
  });

  //para limpiar los campos antes de dar de Alta una Persona
  $("#btnNuevo").click(function () {
    opcion = 1; //alta
    id = null;
    $("#formProductos").trigger("reset");
    $(".modal-header").css("background-color", "#17a2b8");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Alta de Usuario");
    $("#modalCRUD").modal("show");
  });

  // var formulario = document.getElementById('formUsuarios');
  // formulario.addEventListener('submit', function(e){
  //   e.preventDefault;
  //   console.log('me diste click');
  //   var datos = new FormData(formulario);
  //   console.log(datos.get('id_prop'));
  //   console.log(datos.get('Apellido'));
  //   console.log(datos.get('Nombre'));
  //   console.log(datos.get('Lote'));
  //   console.log(datos.get('Tarjeta'));
  //   console.log(datos.get('Fecha_Nac'));
  //   console.log(datos.get('Countries'));
  //   console.log(datos.get('Moroso'));
  //   console.log(datos.get('status'));

  // })

  //Editar
  $(document).on("click", ".btnEditar", function () {
    opcion = 2; //editar
    fila = $(this).closest("tr");
    id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
    Producto = fila.find("td:eq(1)").text();
    Precio = fila.find("td:eq(3)").text();
    Cantidad = fila.find("td:eq(2)").text();
    
    $("#Id").val(id);
    $("#Producto").val(Producot);
    $("#Precio").val(Precio);
    $("#Cantidad").val(Cantidad);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Usuario");
    $("#modalCRUD").modal("show");
  });

  //Borrar
  $(document).on("click", ".btnBorrar", function () {
    fila = $(this);
    id = parseInt($(this).closest("tr").find("td:eq(0)").text());
    tabla = "productos" ; //eliminar
    var respuesta = confirm(
      "¿Está seguro de borrar el registro " + id + "?"
    );
    if (respuesta) {
      $.ajax({
        url: "../api/index.php",
        type: "DELETE",
        datatype: "json",
        data: { tabla: tabla, id: id },
        success: function () {
          tablaUsuarios.row(fila.parents("tr")).remove().draw();
        },
      });
    }
  });

  $("#search").click(function () {
    var Inicio = $("#Inicio").val();
    var Final = $("#Final").val();

    console.log(Inicio);
    console.log(Final);

    if (Inicio != "" && Final != "") {
      $.ajax({
        url: "Logica/ListarTodosEntreFechas.php",
        type: "POST",
        data: { Inicio: Inicio, Final: Final },
        success: function (response) {
          const Resultados = JSON.parse(response);
          console.log(Resultados);
          let temporal = "";

          Resultados.forEach((Resultado) => {
            temporal += `
            <tr>
              <td>${Resultado.ID_Tarjeta}</td>
              <td>${Resultado.Apellido}</td>
              <td>${Resultado.Nombre}</td>
              <td>${Resultado.Descripcion}</td>
              <td>${Resultado.Fecha_in}</td>
              <td>${Resultado.Fecha_out}</td>
              <td>${Resultado.LOTE}</td>
            </tr>
            
            `;
          });
          $("#Resultados").html(temporal);
        },
      });
    } else {
      alert("Por favor seleccione las fechas de inicio y final para filtrar");
    }
  });

  $("#ID").change(function () {
    let tarjeta = $("#ID").val();
    console.log("Usando change, valor del input: " + tarjeta);
    $.ajax({
      url: "Logica/buscar.php",
      type: "POST",
      data: { tarjeta },
      success: function (response) {
        const dat2 = JSON.parse(response);
        console.log(dat2);
        dat2.forEach((dato) => {
          if (!(dato.ID == "")) {
            console.log("ID: " + dato.ID);
            $("#ap").val(dato.Apellido);
            $("#nom").val(dato.Nombre);
            $("#lote").val(dato.Lote);
            if (dato.Moroso == 0) {
              $("#moroso").prop("checked", true);
            } else {
              $("#moroso").prop("checked", false);
            }
          }
        });
      },
    });
  });

});
