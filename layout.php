
      <!-- Notificaciones -->
      <div class="notificaciones">
        <div class="iconnoti">
          <a class="espacio" href="#" id="botonocultamuestra" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class='fa-solid fa-bell' style='color: white;'></i>
            <!-- Contador - Alertas -->
            <span class="contador contador-rojo contador"><?php echo $row_cnt; ?></span>
          </a>
        </div>
      </div>
      <script>
        var div = document.getElementById("myDiv");
        document.addEventListener("keydown", function (event) {
            if (event.altKey && event.keyCode === 70) { // 70 es el código de la tecla F11
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen();
                } else if (document.documentElement.msRequestFullscreen) {
                    document.documentElement.msRequestFullscreen();
                }
                document.cookie = "fullscreen=true";
            }
        });
    </script>
    <script>
      
    </script>
    
      <!-- Lista Alertas -->
      <div class="desplegar-lista desplegar-menu desplegar-menu-right sombra animacion_menu mostrar_menu" id="divocultamuestra" aria-labelledby="alertsDropdown" style="display:none;">
        <h6 class="cabecera_noti">Notificaciones</h6>
        <div class="contenido_noti ex3len">
          <br>
          <?php foreach ($resulnoti as $opciones) : ?>
            <a class="contenido_item flexus alinear_item_centro" href="notificacion.php">
              <div class="mr-3">
                <div class="icon-circle bg-primary">
                  <i class="fas fa-file-alt text-white" style='color: white;'></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500 font-weight-bold"><?php echo $opciones['fecha']; ?></div>
                <span class="font-weight">
                  <?php echo $opciones['tipo']; ?> realizada por <?php echo $opciones['usuario1']; ?>,
                  en el proyecto de "<?php echo $opciones['proyecto']; ?>", en este rango de fecha:
                  <?php echo $opciones['fechain']; ?> hasta <?php echo $opciones['fechafin']; ?>
                </span>
              </div>
            </a>
          <?php endforeach ?>
        </div>
      </div>
      <!-- Usuario -->
      <div class="usuario">
        <div class="usuar">
          <a class="espacio" href="#" id="botonocultamuestraUsuario" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span style="display: flex;font-size: 0.83em;flex-direction: column;margin-top: -7px;" align="right">
              <font color="#ffffff" style="height: 15px; font-weight: bold !important;">
                <?php echo $nombre ?>
              </font>
              <font color="#ffffff" style="height: -2px;">
                <?php //echo $corr 
                ?>
                <?php echo $per['Perfil']; ?>
              </font>
            </span>&nbsp;&nbsp;&nbsp;
            <img class="img-perfil rounded-circulo" src="./imagenes/perfil/<?php echo $fot['Foto']; ?>">
          </a>
        </div>
      </div>
      <!-- detalles usuario-->
      <div class="desplegar-menu desplegar-menu-righte sombra animacion_menu mostrar_menu" id="usuariomuestra" aria-labelledby="userDropdown" style="display:none;">
        <a class=" usuarioItem" href="config_foto">
          <i class="fas fa-cogs fa-sm fa-fw text-gray-400"></i>
          Cambiar foto de perfil
        </a>
        <a class="usuarioItem" href="config_contra">
          <i class="fas fa-cogs fa-sm fa-fw text-gray-400"></i>
          Cambiar contraseña
        </a>
        <a class="usuarioItem" href="cerrarsesion.php">
          <i class="fas fa-user fa-sm fa-fw text-gray-400"></i>
          Cerrar sesión
        </a>
      </div>
    </div>
    <!-- FIN Menú superior Horizontal -->
    <!-- Menú Lateral -->
    <div class="menu_lateral">
      <div class="logo">
        <img class="logoapp" width="170px" src="./imagenes/logos/logoti.png" alt="...">
      </div>
      <div class="contenedorbar">
        <!-- partial:index.partial.html -->
        <ol class="primera">
          <?php if ($rol['Rol'] == $rol1) { ?>
            <li class="archivo lis listar"><a class="inicio" href="./inicio">&nbsp;&nbsp;&nbsp;Inicio</a></li>

            <li class="lis listar">
              <label class="carpeta grafica" for="menu-1-1">&nbsp;&nbsp;&nbsp;Gráficas</label>
              <input class="inpu" type="checkbox" id="menu-1-1" />
              <ol class="icono_listas">
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./graficaxdivision">% Asignación por mes en una división</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./grafica_emp_div">% Asignación por empleado en una división</a>
                </li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./grafica_area">% Asignación por área</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./tablaperfiles">% Asignación por perfil</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./proyectos_empleado">% Asignación por proyecto - mes</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./barras">% Asignación por proyecto - año</a></li>
              </ol>
            </li>

            <li class="archivo lis listar"><a class="empleado" href="./empleado">&nbsp;&nbsp;&nbsp;Empleados</a></li>

            <li class="lis listar">
              <label class="carpeta asignacion" for="menu-2">&nbsp;&nbsp;&nbsp;Asignaciones</label>
              <input class="inpu" type="checkbox" id="menu-2" />
              <ol class="icono_listas">
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" style="width: 151px !important;" href="./asignar">Asignar</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./consultar_detalles">Consulta Detalles</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./Consulta_Disp_Asig">Consulta Disp. y Asig.</a></li>
              </ol>
            </li>

            <li class="archivo lis listar"><a class="oestados" href="./otros_estados">&nbsp;&nbsp;&nbsp;Otros Estados</a></li>
            <li class="archivo lis listar"><a class="proyectos" href="./proyectos">&nbsp;&nbsp;&nbsp;Proyectos</a></li>
            <li class="lis listar">
              <label class="carpeta datam" for="menu-3">&nbsp;&nbsp;&nbsp;Data Maestra</label>
              <input class="inpu" type="checkbox" id="menu-3" />
              <ol class="icono_listas">
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./divisiones">Divisiones</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./perfil_empleado">Perfiles</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./estados_empleado">Estados</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./findesemana">Fin de Semana</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./festivos">Festivos</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./jornada_laboral">Jornada Laboral</a></li>
              </ol>
            </li>
          <?php } ?>
          <?php if ($rol['Rol'] == $rol2) { ?>
            <li class="archivo lis listar"><a class="inicio" href="./inicio">&nbsp;&nbsp;&nbsp;Inicio</a></li>
            <li class="archivo lis listar"><a class="proyectos" href="./proyectos.php">&nbsp;&nbsp;&nbsp;Proyectos</a></li>
          <?php } ?>
          <?php if ($rol['Rol'] == $rol3) { ?>
            <li class="archivo lis listar"><a class="inicio" href="./inicio">&nbsp;&nbsp;&nbsp;Inicio</a></li>
            <li class="lis listar">
              <label class="carpeta grafica" for="menu-1-1">&nbsp;&nbsp;&nbsp;Gráficas</label>
              <input class="inpu" type="checkbox" id="menu-1-1" />
              <ol>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./graficaxdivision">% Asignación por mes en una división</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./grafica_emp_div">% Asignación por empleado en una división</a>
                </li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./grafica_area">% Asignación por área</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./tablaperfiles">% Asignación por perfil</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./proyectos_empleado">% Asignación por proyecto - mes</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./barras">% Asignación por proyecto - año</a></li>
              </ol>
            </li>
            <li class="archivo lis listar"><a class="empleado" href="./empleado">&nbsp;&nbsp;&nbsp;Empleados</a></li>
            <li class="lis listar">
              <label class="carpeta asignacion" for="menu-2">&nbsp;&nbsp;&nbsp;Asignaciones</label>
              <input class="inpu" type="checkbox" id="menu-2" />
              <ol>
                 <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" style="width: 151px !important;" href="./asignar">Asignar</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./consultar_detalles">Consulta Detalles</a></li>
                <li class="archivo lis listar tletra"><a class="hoversub" style="width: 151px !important;" href="./Consulta_Disp_Asig">Consulta Disp. y Asig.</a></li>
              </ol>
            </li>
            <li class="archivo lis listar"><a class="oestados" href="./otrosestados">&nbsp;&nbsp;&nbsp;Otros Estados</a></li>
            <li class="archivo lis listar"><a class="proyectos" href="./proyectos">&nbsp;&nbsp;&nbsp;Proyectos</a></li>
          <?php } ?>
        </ol>
        <!-- partial -->
      </div>
      <img class="logoapp" width="170px" src="./imagenes/logos/LOGO_SEIDOR.png" alt="...">
    </div>

    <div class="contenido">
      <footer>
        <!-- Footer legal -->
        <section class="ft-legal">
          <ul class="ft-legal-list">
            <li>&copy;
              <script type="text/javascript">
                copyright = new Date();

                update = copyright.getFullYear();

                document.write(" Seidor Colombia | " + update + " " + " - Derechos Reservados");
              </script>
            </li>
          </ul>
        </section>
      </footer>
      <div class="margen">

      