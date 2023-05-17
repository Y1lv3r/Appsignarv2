<?php include("./botonup.php") ?>
<?php include("modulos/Perfiles.php") ?>
<?php include("./cabeceras/cabecera_Perfiles.php") ?>
<?php include("./layout.php") ?>

<!-- Inicio Contenido -->

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
    }

    div.dt-buttons {
        margin-left: 15px !important;
    }
</style>

<div class="container-fluid" align="center">
<div class="col-xl-8 col-lg-7" >
    <br>
    <br>
        <div  class="card shadow mb-2">
                <div class="card-header py-3"> 
                    <h4 class="m-0 font-weight-bold text-primary" class="label" align="center">Perfil</h4>
                </div>
    <div class="row">
        <div class="col-xl-12 col-lg-7" align="left">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Modal -->
                <input name="ID" id="ID" value="<?php echo $ID; ?>" class="form-control" type="hidden" REQUIRED placeholder="Enter your last name" />
               
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="m-0 font-weight-bold text-primary">Nombre:</label>
                                        <input type="text" class="form-control <?php echo (isset($error['Nombre'])) ? "is-invalid" : ""; ?>" REQUIRED name="txtNombres" value="<?php echo $txtNombres; ?>" placeholder="" id="txtNombres" require="">
                                        <div class="invalid-feedback">
                                            <?php echo (isset($error['Nombre'])) ? $error['Nombre'] : ""; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-7">
                                <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</Button>
                                <button value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion">Modificar</Button>
                                <button value="btnEliminar" onclick=" return Confirmar('¿Desea eliminar este perfil?');" <?php echo $accionEliminar; ?> class="btn btn-danger" type="submit" name="accion">Eliminar</Button>
                                <button value="btnCancelar" <?php echo $accionCancelar; ?> class="btn btn-primary" type="submit" name="accion">Cancelar</Button>
                            </div>
                        </div>
                 
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary" class="label" align="center">Tabla Perfiles</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table display nowrap" id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr> <th>Acciones</th>
                            <th>Nombre del perfil<span></span></th>
                            <th>Fecha de creación<span></span></th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaEmpleados as $empleado) { ?>
                            <tr>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="ID" value="<?php echo $empleado['ID']; ?>">
                                        <input type="Submit" value="Seleccionar" class="btn btn-info" name="accion">
                                        <button value="btnEliminar" onclick=" return Confirmar('¿Desea eliminar este perfil?');" type="submit" class="btn btn-danger" name="accion">Eliminar</Button>
                                    </form>
                                </td>
                                <td><?php echo $empleado['Nombre'] ?></td>
                                <td><?php echo $empleado['Fecha'] ?></td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
    function Confirmar(Mensaje) {
        return (confirm(Mensaje)) ? true : false;
    }
</script>

<script type="text/javascript">
    function ActivarCasilla(casilla) {
        miscasillas = document.getElementsByTagName('input'); //Rescatamos controles tipo Input
        if (casilla.name == "dia[]") {
            for (i = 0; i < 13; i++) //Ejecutamos y recorremos los controles
            {
                if (miscasillas[i].type == "checkbox" && miscasillas[i].name != "jornada[]") // Ejecutamos si es una casilla de verificacion
                {
                    miscasillas[i].checked = casilla.checked; // Si el input es CheckBox se aplica la funcion ActivarCasilla
                }
            }
        }
        if (casilla.name == "jornada[]") {
            for (i = 0; i < 18; i++) //Ejecutamos y recorremos los controles
            {
                if (miscasillas[i].type == "checkbox" && miscasillas[i].name == "jornada[]") // Ejecutamos si es una casilla de verificacion
                {
                    miscasillas[i].checked = casilla.checked; // Si el input es CheckBox se aplica la funcion ActivarCasilla
                }
            }
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

<!-- Resto de Scripts -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js'></script>
<script src="script.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
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

<!-- Fin Contenido -->


</div>

</div>

</div>


</body>

</html>