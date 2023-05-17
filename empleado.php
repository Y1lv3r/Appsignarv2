<?php include("./botonup.php") ?>
<?php include("modulos/empleado.php") ?>
<?php include("./cabeceras/cabecera_empleados.php") ?>
<?php include("./layout.php") ?>
<!-- link del modal-->

<link rel="stylesheet" href="style_asig.css">
  <!-- for Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

  <!-- for Bootstrap 4 -->
  <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
  <!-- include alertify.css -->
  <link rel="stylesheet" href="{PATH}/alertify.css">
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  <link href='archivos/lib/main.css' rel='stylesheet' />
  <script src='archivos/lib/main.js'></script>
  <script src='archivos/js/theme-chooser.js'></script>

  <link rel='stylesheet' href='https://cdn.jsdelivr.net/alertifyjs/1.10.0/css/alertify.min.css'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/alertifyjs/1.10.0/css/themes/default.min.css'>

  <!-- partial -->
  <script src='https://cdn.jsdelivr.net/alertifyjs/1.10.0/alertify.min.js'></script>
<!--fin de link modal-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel='stylesheet' href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css'>

<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.19.1/extensions/filter-control/bootstrap-table-filter-control.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.19.1/bootstrap-table.min.css" />

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />

<!-- Custom fonts for this template -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" />

<link rel="stylesheet" href="extensions/fixed-columns/bootstrap-table-fixed-columns.css">

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<link rel='stylesheet' href='https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css'>
<style>
    button.dt-button,
    div.dt-button,
    a.dt-button {
        padding: 0.2em 0.5em !important;
        display: none;
    }
    div.dt-buttons {
        margin-left: 15px !important;
    }

    .multiselect {
        width: 200px;
    }

    .selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
        font-weight: bold;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkboxes {
        display: none;
        border: 1px #dadada solid;
    }

    #checkboxes label {
        display: block;
    }

    #checkboxes label:hover {
        background-color: #1e90ff;
    }

    div.ex3 {

        height: 178px;
        overflow: auto;
    }
</style>
<br>
   <br>
<div class="container-fluid" align="center">
<div class="col-xl-8 col-lg-7" >
<div class="card shadow mb-4">
<div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary" class="label" align="center">Empleado</h4>
        </div>
    <div class="row">
    
        <div class="col-xl-12 col-lg-7" align="left">
           
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Modal -->
            
                            <div class="modal-body">
                           
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    
                                        <input type="hidden" name="nomasignador" style="display:none" value="<?php echo $nom['Nombre']; ?>" />
                                        <label class="m-0 font-weight-bold text-primary">Nombres y Apellidos:</label>
                                        <input type="text" class="form-control <?php echo (isset($error['Nombres y Apellidos'])) ? "is-invalid" : ""; ?>" REQUIRED name="txtNombres" value="<?php echo $txtNombres; ?>" placeholder="" id="txtNombres" require="">
                                        <div class="invalid-feedback">
                                            <?php echo (isset($error['Nombres'])) ? $error['Nombres'] : ""; ?>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="m-0 font-weight-bold text-primary">División:</label>
                                        <select type="text" class="form-control mb-2 mr-sm-2" REQUIRED name="txtDivision" id="txtDivision">
                                            <option><?php echo  $txtMdivicion ?></option>
                                            <?php foreach ($listaDivision as $opciones) : ?>
                                                <option value="<?php echo $opciones['Nombre'] ?>"><?php echo $opciones['Nombre'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="m-0 font-weight-bold text-primary">Perfil:</label>
                                        <div class="row">
                                            <!-- checkbox -->
                                            <div class="multiselect col-md-12">
                                                <div class="selectBox" onclick="showCheckboxes()">
                                                    <select class="form-control">
                                                        <option> <?php echo $txtMperfil ?></option>
                                                    </select>
                                                    <div class="overSelect"></div>
                                                </div>
                                                <div id="checkboxes" class="col-md-12 ex3">
                                                    <?php foreach ($listaPerfil as $opciones) : ?>
                                                        <label>
                                                            <input type="checkbox" name="programas[]" value="<?php echo $opciones['Nombre'] ?>">&nbsp;&nbsp;<?php echo $opciones['Nombre'] ?>
                                                        </label>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                            <script>
                                                var expanded = false;

                                                function showCheckboxes() {
                                                    var checkboxes = document.getElementById("checkboxes");
                                                    if (!expanded) {
                                                        checkboxes.style.display = "block";
                                                        expanded = true;
                                                    } else {
                                                        checkboxes.style.display = "none";
                                                        expanded = false;
                                                    }
                                                }
                                            </script>
                                            <!-- checkbox -->
                                            <!-- fin: checkbox -->
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="m-0 font-weight-bold text-primary">Correo electrónico:</label>
                                        <input type="email" class="form-control" REQUIRED name="txtCorreo" value="<?php echo $txtCorreo; ?>" placeholder="" id="txtCorreo" require="">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="m-0 font-weight-bold text-primary">Cuenta Skype:</label>
                                        <input type="text" class="form-control" REQUIRED name="skype" value="<?php echo $skype; ?>" placeholder="" id="skype" require="">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="m-0 font-weight-bold text-primary">Contraseña:</label>
                                        <div class="input-group mb-3">
                                            <input ID="txtpass1" type="password" class="form-control" REQUIRED name="txtpassword" value="<?php echo $txtpassword; ?>" placeholder="" id="txtpassword" title="La contraseña debe tener 8 caracteres, incluida 1 letra mayúscula, 1 letra minúscula y caracteres numéricos" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                                            <div class="input-group-append">
                                                <button id="show_password1" class="btn btn-primary" type="button" onclick="mostrarPass1()">
                                                    <span class="fa fa-eye-slash icon"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="m-0 font-weight-bold text-primary">Rol:</label>
                                        <select class="form-control mb-2 mr-sm-2" REQUIRED name="txttiposesion" id="txttiposesion">
                                            <option><?php echo  $txtMrol ?></option>
                                            <?php foreach ($listarol as $opciones) : ?>
                                                <option value="<?php echo $opciones['nombre'] ?>"><?php echo $opciones['nombre'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="m-0 font-weight-bold text-primary">Tipo de Contrato:</label>
                                        <select class="form-control mb-2 mr-sm-2" REQUIRED name="txtcontrato" id="txtcontrato">
                                            <option><?php echo  $txtMcontrato ?></option>
                                            <?php foreach ($listacontrato as $opciones) : ?>
                                                <option value="<?php echo $opciones['Nombre'] ?>"><?php echo $opciones['Nombre'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="m-0 font-weight-bold text-primary">Teléfono:</label>
                                        <input type="text" class="form-control <?php echo (isset($error['Nombres y Apellidos'])) ? "is-invalid" : ""; ?>" name="telemp" value="<?php echo $telemp; ?>" placeholder="" id="telemp">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="m-0 font-weight-bold text-primary">Teléfono Jefe Directo:</label>
                                        <input type="text" class="form-control <?php echo (isset($error['Nombres y Apellidos'])) ? "is-invalid" : ""; ?>" name="teljefe" value="<?php echo $teljefe; ?>" placeholder="" id="teljefe">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="m-0 font-weight-bold text-primary">Foto:</label>
                                        <?php if ($txtFoto != "") { ?>
                                            </br>
                                            <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="./imagenes/perfil/<?php echo $txtFoto; ?>" />
                                            </br>
                                        <?php } ?>
                                        <input type="file" class="form-control" accept="image/*" name="txtFoto" value="<?php echo $txtFoto; ?>" placeholder="" id="txtFoto" require="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                           
                                <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</Button>
                                <button value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion">Modificar</Button>
                                <button value="btnCancelar" <?php echo $accionCancelar; ?> class="btn btn-primary" type="submit" name="accion">Cancelar</Button>
                           
                            </div>
                    
                </div>
           
            </form>
        </div>
    </div>
</div>
</div>


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary" class="label" align="center">Tabla Empleados</h4>
            <a href="./modulos/exportar_excel_emple.php"> <button style="position: absolute;top: 0.3cm;left: 88%; z-index: 2;" class="btn btn-primary">EXCEL&nbsp;&nbsp;&nbsp;<i class="fa fa-download" aria-hidden="true"></i></button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table display nowrap" id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Acción</th>
                            <th>Foto</th>
                            <th>Nombre <span></span></th>
                            <th>División<span></span></th>
                            <th>Perfil<span></span></th>
                            <th>Correo<span></span></th>
                            <th>Skype<span></span></th>
                            <th>Rol<span></span></th>
                            <th>Contrato<span></span></th>
                            <th>Teléfono<span></span></th>
                            <th>Tel. Jefe Directo<span></span></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaEmpleados as $empleado) { ?>
                            <tr>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="txtCorreo" value="<?php echo $empleado['Correo']; ?>">
                                        <input type="Submit" value="Seleccionar" class="btn btn-info" name="accion">
                                        <button value="btnEliminar" onclick=" return Confirmar('¿Desea inactivar este empleado?');" type="submit" class="btn btn-danger" name="accion">Inactivar</Button>
                                    </form>
                                </td>

                                <td><img class="img-thumbnail" width="100px" src="./imagenes/perfil/<?php echo $empleado['Foto']; ?>" /></td>
                                <td><?php echo $empleado['Nombre'] ?></td>
                                <td><?php echo $empleado['Division'] ?></td>
                                <td><?php echo $empleado['Perfil'] ?></td>
                                <td><?php echo $empleado['Correo'] ?></td>
                                <td><?php echo $empleado['Skype'] ?></td>
                                <td><?php echo $empleado['Rol'] ?></td>
                                <td><?php echo $empleado['Contrato'] ?></td>
                                <td><?php echo $empleado['Telefono'] ?></td>
                                <td><?php echo $empleado['Telefono_Jefe_Directo'] ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="ventanaModal" class="modal">
    <div class="contenido-modal">
      <div class="cabecera">
        <input type="hidden" class="cerrar" name="">
        <span onclick="url()" class="close" style="cursor: pointer;">&times;</span>
        <h2>Empleado</h2>
      </div>
      <form name="formulario_01" id="formularioaenviar" action="" method="post">
        <div class="flexbox-container">
          <div>
            <div class="grupo">
              <label for="txtNombres" class="textoformu m-0 font-weight-bold text-primary">Nombres y Apellidos:</label>
              <input class="inputs" type="search" name="txtNombres" id="txtNombres">
            </div>
            <div class="grupo">
              <label for="perfil" class="textoformu m-0 font-weight-bold text-primary">Perfil:</label>
              <input class="inputs" type="text" name="perfil" id="perfil">
            </div>
            <div class="grupo">
              <label for="Skype" class="textoformu m-0 font-weight-bold text-primary">Cuenta Skype:</label>
              <input class="inputs" type="text" name="skype" id="skype">
            </div>
            <div class="grupo">
              <label for="txttiposesion" class="textoformu m-0 font-weight-bold text-primary">Rol:</label>
              <input class="inputs" type="text" name="txttiposesion" id="txttiposesion">
            </div>
            <div class="grupo">
              <label for="telemp" class="textoformu m-0 font-weight-bold text-primary">Telelefono:</label>
              <input class="inputs" type="text" name="telemp" id="telemp">
            </div>
           
          </div>
          <div>
            <div class="grupo">
              <label for="txtDivision" class="textoformu m-0 font-weight-bold text-primary">División:</label>
              <input class="inputs" type="text" name="txtDivision" id="txtDivision">
            </div>
            <div class="grupo">
              <label for="txtCorreo" class="textoformu m-0 font-weight-bold text-primary">Correo:</label>
              <input class="inputs" type="text" name="txtCorreo" id="txtCorreo">
            </div>
            <div class="grupo">
              <label for="txtpassword" class="textoformu m-0 font-weight-bold text-primary">Contraseña:</label>
              <input class="inputs" type="text" name="txtpassword" id="txtpassword">
            </div>
          
            <div class="grupo">
              <label for="txtContrato" class="textoformu m-0 font-weight-bold text-primary">Tipo Contrato:</label>
              <input class="inputs" type="text" name="txtContrato" id="txtContrato">
            </div>
            <div class="grupo">
              <label for="teljefe" class="textoformu m-0 font-weight-bold text-primary">Tel. Jefe Directo:</label>
              <input class="inputs" type="text" name="teljefe" id="teljefe">
            </div>
          </div>
         
        </div>
      </form>

      <div class="pie">
        
        <button id="cerrar"  class="close_modal" onclick="url()">Cerrar</button>
        <input type="button" onclick="resetform()" value="Cancelar">
        <input type="button"  id="btn-ingresar" value="Modificar">
      </div>
    </div>
  </div>
 
  <div id="resp"></div>
</div>
<script>
    function url() {
      //location.href = 'asignacion#ventanaModal';
      location.replace('#ventanaModal');
    };
    function abrirModal() {
        location.href = '#abrirModal';
        document.getElementById("ventanaModal").style.display = "block";
    }
  </script>

 
  <script>
function editarCliente() {
    const action = "editarCliente";
    $.ajax({
        url: 'modulos/empleado.php',
        type: 'GET',
        async: true,
        data: {
            editarCliente: action,
            id: id
        },
        success: function (response) {
            const datos = JSON.parse(response);
            $('#nit').val(datos.nit);
            $('#txtNombre').val(datos.nombre);
            $('#telefono').val(datos.telefono);
            $('#direccion').val(datos.direccion);
            $('#txtcorreo').val(datos.correo);
            $('#txtcorreo').val(datos.idcliente);
            $('#btnAccion').val('Modificar');
        },
        error: function (error) {
            console.log(error);

        }
    });
}

 

    // Ventana modal
    var modal = document.getElementById("ventanaModal");

    // Botón que abre el modal
    var boton = document.getElementById("abrirModal");

    // Botón que cierra el modal
    var botoncerrar = document.getElementById("cerrar");

    // Hace referencia al elemento <span> que tiene la X que cierra la ventana
    var span = document.getElementsByClassName("cerrar")[0];
    // Si el usuario hace click en la x, la ventana se cierra
    span.addEventListener("click", function() {
      modal.style.display = "none";
    });
    botoncerrar.addEventListener("click", function() {
      modal.style.display = "none";
    });
    // Si el usuario hace click fuera de la ventana, se cierra.
    window.addEventListener("click", function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    });
  </script>

<script type="text/javascript">
    $(document).on('ready', function() {
      $('#btn-ingresar').click(function() {
        var url = "modulos/empleado.php";
        var empleado = $("#empleado").val();
        var proyecto = $("#proyecto").val();
        var area = $("#area").val();
        var estado = $("#estado").val();
        var division = $("#division").val();
        var perfil = $("#perfil").val();
        var lugar = $("#lugar").val();
        var fsemana = $("#fsemana").val();
        var finicio = $("#finicio").val();
        var ffinal = $("#ffinal").val();

        var dataString = 'empleado=' + empleado + '&proyecto=' + proyecto + '&area=' + area + '&estado=' + estado + '&division=' + division +
          '&perfil=' + perfil + '&lugar=' + lugar + '&fsemana=' + fsemana + '&finicio=' + finicio + '&ffinal=' + ffinal;

        alertify.confirm("Desea realizar la asignación?", function(asc) {
          if (asc) {
            //ajax call for delete  
            $.ajax({
              type: "POST",
              url: url,
              data: dataString,
              success: function(data) {
                $('#resp').html(data);
                if (data == 'OK') {
                  var msg = alertify.success('Default message');
                  msg.delay(3).setContent('Se actualizó la asignación correctamente.');
                  // setTimeout(function() {
                  //   window.location.reload();
                  // }, 1000);
                  //location. reload();
                  location.replace('#abrirModal');
                  resetform();
                } else {

                  alertify.error('No se pudo guardar la asignación, intentelo de nuevo.', 0);
                }
              }
            });
            alertify.success("Record is deleted.");

          } else {
            alertify.error("You've clicked cancel");
          }
        }, "Default Value");

      });
    });
  </script>



<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- Scripts para la Tabla -->
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>

<!-- Scripts para el Modal -->
<?php if ($mostrarModal) { ?>
    <script>
        $('#exampleModal').modal('show');
    </script>
<?php } ?>
<script>
    function abrir(){
        $('#exampleModal').modal('show');
        location.replace('#exampleModal');
    }
        
    </script>
<script>
    function Confirmar(Mensaje) {
        return (confirm(Mensaje)) ? true : false;
    }
</script>
<!-- Scripts para mostrar y ocultar contraseña -->
<script type="text/javascript">
    function mostrarPass1() {
        var cambio1 = document.getElementById("txtpass1");

        if (cambio1.type == "password") {
            cambio1.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio1.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }
</script>
<script>
    var oTable = $('#example').DataTable({
        fixedHeader: {
            header: false,
            footer: false
        },
        pagingType: "full_numbers",
        bSort: true,
        scrollCollapse: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontró nada, lo siento",
            "info": "Mostrando _START_ a  _END_ de _TOTAL_ registros",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": ">",
                "previous": "<"
            },
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
        },
        responsive: true,
        "order": [
            [0, "asc"]
        ],

        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                var select = $('<br><select style="width:48px;"><option value=""></option></select>')
                    .appendTo($(column.header()).find('span').empty())
                    .on({
                        'change': function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        },
                        'click': function(e) {
                            // stop click event bubbling
                            e.stopPropagation();
                        }
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }

    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#example').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },

            responsive: true,


            "processing": true,

            dom: 'B',
            scrollX: true,
            // buttons: [
            //  'excel', 'csv',
            // ]



        });
    });
</script>
<script>
    var table = document.getElementsByTagName("table")[0];
    var datatable = new DataTable(table, {
        perPage: 10,
    });
    var inputs = [],
        visible = [],
        hidden = [];
    var checkboxes = document.getElementById("controls-dropdown-menu");
    var tbutton = document.getElementById("table-button");


    function setCheckboxes() {
        inputs = [];
        visible = [];
        checkboxes.innerHTML = "";
        var fragment = document.createDocumentFragment();
        var isVisible = false;

        document.onclick = function(e) {
            if (!tbutton.contains(e.target.parentNode)) {
                checkboxes.style.cssText = "display:none;";
                isVisible = false;
            }
        };

        tbutton.onclick = function(e) {
            if (checkboxes.contains(e.target)) {
                return true;
            }
            if (!isVisible) {
                checkboxes.style.cssText = "display:block;";
                isVisible = true;
            } else {
                checkboxes.style.cssText = "display:none;";
                isVisible = false;
            }
        };

        [].forEach.call(datatable.headings, function(heading, i) {
            var checkbox = document.createElement("li");
            checkbox.className = "checkbox";
            var input = document.createElement("input");
            input.type = "checkbox";
            input.id = "checkbox-" + i;
            input.name = "checkbox";
            var label = document.createElement("label");
            label.htmlFor = "checkbox-" + i;
            label.className = "checkbox-label";
            label.appendChild(
                document.createTextNode(heading.textContent || heading.innerText)
            );

            // IE 8 supports `Object.defineProperty` on DOM nodes so no p!
            if (Object.defineProperty) {
                Object.defineProperty(input, "idx", {
                    value: i,
                    writable: false,
                    configurable: true,
                    enumerable: true
                });
            } else if (input.__defineGetter__) {
                input.__defineGetter("idx", function() {
                    return i;
                })
            }

            if (datatable.columns().visible(heading.cellIndex)) {
                input.checked = true;
                visible.push(i);
            } else {
                if (hidden.indexOf(i) < 0) {
                    hidden.push(i);
                }
            }

            checkbox.appendChild(input)
            checkbox.appendChild(label)

            fragment.appendChild(checkbox);

            inputs.push(input);
        });

        [].forEach.call(inputs, function(input, i) {

            input.onchange = function(e) {
                if (input.checked) {
                    hidden.splice(hidden.indexOf(input.idx), 1);
                    visible.push(input.idx);
                } else {
                    visible.splice(visible.indexOf(input.idx), 1);
                    hidden.push(input.idx);
                }

                updateColumns();
            };
        });

        checkboxes.appendChild(fragment);
    }

    function updateColumns() {
        try {
            datatable.columns().show(visible);
            datatable.columns().hide(hidden);
        } catch (e) {
            console.log(e);
        }
    }

    setCheckboxes();
</script>
<script>
    var $table = $('#table')

    $(function() {
        $('#toolbar').find('select').change(function() {
            $table.bootstrapTable('destroy').bootstrapTable({
                exportDataType: $(this).val(),
                exportTypes: ['xml', 'csv', 'excel'],
            })
        }).trigger('change')
        $('#toolbarr').find('select').change(function() {
            $table.bootstrapTable('destroy').bootstrapTable({
                exportDataType: $(this).val(),
                exportTypes: ['xml', 'csv', 'excel'],
            })
        }).trigger('change')

    });
</script>

<!-- <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js'></script>
<script src="script.js"></script>

<!-- Bootstrap core JavaScript-->
<!--<script src="vendor/jquery/jquery.min.js"></script> -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/86186/moment.js'></script>
<script src='https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js'></script>

<!-- partial -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
<script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script>
<script src="./semdetalle.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/themes/bootstrap-table/bootstrap-table.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/key-events/bootstrap-table-key-events.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>

<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
</div>

</div>

</div>


</body>

</html>