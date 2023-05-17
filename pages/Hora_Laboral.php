<?php
require_once('../global/conexion.php');


?>
<link rel="shortcut icon" href="../imag/icono.ico">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>APPSIGNAR | Jornada Laboral</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/tailwind.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
  <style>
    .controle {
      font-family: arial;
      display: block;
      position: relative;
      padding-left: 30px;
      margin-bottom: 11px;
      padding-top: 3px;
      cursor: pointer;
      font-size: 16px;
    }

    .controle input {
      position: absolute;
      z-index: -1;
      opacity: 0;
    }

    .controle_indicator {
      position: absolute;
      top: 3px;
      left: 0;
      height: 20px;
      width: 20px;
      background: #b1b1b1;
      border: 0px solid #000000;
      border-radius: undefinedpx;
    }

    .controle:hover input~.controle_indicator,
    .controle input:focus~.controle_indicator {
      background: #4e994b;
    }

    .controle input:checked~.controle_indicator {
      background: #257c27;
    }

    .controle:hover input:not([disabled]):checked~.controle_indicator,
    .controle input:checked:focus~.controle_indicator {
      background: #0e6647;
    }

    .controle input:disabled~.controle_indicator {
      background: #e6e6e6;
      opacity: 0.6;
      pointer-events: none;
    }

    .controle_indicator:after {
      box-sizing: unset;
      content: '';
      position: absolute;
      display: none;
    }

    .controle input:checked~.controle_indicator:after {
      display: block;
    }

    .controle-radio .controle_indicator {
      border-radius: 50%;
    }

    .controle-radio .controle_indicator:after {
      left: 7px;
      top: 7px;
      height: 6px;
      width: 6px;
      border-radius: 50%;
      background: #fff;
      transition: background 250ms;
    }

    .controle-radio input:disabled~.controle_indicator:after {
      background: #7b7b7b;
    }

    .controle-radio .controle_indicator::before {
      content: '';
      display: block;
      position: absolute;
      left: 0;
      top: 0;
      width: 4.5rem;
      height: 4.5rem;
      margin-left: -1.3rem;
      margin-top: -1.3rem;
      background: #2aa1c0;
      border-radius: 3rem;
      opacity: 0.6;
      z-index: 99999;
      transform: scale(0);
    }

    @keyframes s-ripple {
      0% {
        opacity: 0;
        transform: scale(0);
      }

      20% {
        transform: scale(1);
      }

      100% {
        opacity: 0.01;
        transform: scale(1);
      }
    }

    @keyframes s-ripple-dup {
      0% {
        transform: scale(0);
      }

      30% {
        transform: scale(1);
      }

      60% {
        transform: scale(1);
      }

      100% {
        opacity: 0;
        transform: scale(1);
      }
    }

    .controle-radio input+.controle_indicator::before {
      animation: s-ripple 250ms ease-out;
    }

    .controle-radio input:checked+.controle_indicator::before {
      animation-name: s-ripple-dup;
    }

    .izq {
      float: left;

    }

    .derec {
      float: right;

    }

    .centro {

      display: inline-block
    }

    #caja1,
    #caja2,
    #caja3 {

      width: 500px;
      height: 360px;
      margin: 20px;
      float: left;
    }
  </style>
</head>

<body>
  <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
    <!-- Loading screen -->
    <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
      Loading.....
    </div>
    <div class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
      <!-- Brand -->
      <a href="../inicio" class="inline-block mb-6 text-3xl font-bold tracking-wider uppercase text-primary-dark dark:text-light">
        Volver a APPSIGNAR
      </a>
      <main>

        <div id="caja1" class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker izq">
          <h1 class="text-xl font-semibold text-center">Jornada Laboral</h1>
          <form action="enviar_param.php" class="space-y-6" method="post">
            <label for="email">Hora Inicio</label>
            <input autofocus="autofocus" class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" type="time" name="hora_in" list="listainiciotiempo" max="10:00:00" min="05:00:00" required />
            <datalist id="listainiciotiempo">
              <option value="06:00">
              <option value="07:00">
              <option value="08:00">
              <option value="09:00">
            </datalist>

            <label for="email">Hora Fin</label>

            <input class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" type="time" name="hora_fin" list="listafintiempo" max="21:00:00" min="16:00:00" required />
            <datalist id="listafintiempo">
              <option value="17:00">
              <option value="18:00">
              <option value="19:00">
              <option value="20:00">
            </datalist>

            <div>
              <button type="submit" class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                Guardar
              </button>
            </div>
          </form>
        </div>

        <div id="caja2" class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker centro">
          <h1 class="text-xl font-semibold text-center">Fin de Semana</h1>
          <form action="enviar_param.php" class="space-y-6" method="post">
            <label for="email">Habilitar Fin de semana</label>

            <div class="controle-group">
              <label class="controle controle-radio">
                Si
                <input type="radio" name="radio" value="true" />
                <div class="controle_indicator"></div>
              </label>
              <label class="controle controle-radio">
                No
                <input type="radio" name="radio" checked="checked" value="false" />
                <div class="controle_indicator"></div>
              </label>
            </div>

            <div>
              <button type="submit" style="margin-top: 20%;" class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                Guardar
              </button>
            </div>
          </form>
        </div>
        <div id="caja3" class="w-full max-w-sm px-4 py-6  space-y-6 bg-white rounded-md dark:bg-darker derec">
          <h1 class="text-xl font-semibold text-center">Festivos</h1>
          <form action="enviar_param.php" class="space-y-6" method="post">

            <label for="email">Ingrese los días festivos</label>

            <input autofocus="autofocus" class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker" type="date" name="Festivo_dia" required />

            <label for="email"></label>


            <div>
              <button type="submit" style="margin-top: 26%;" class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                Guardar
              </button>
            </div>
          </form>
        </div>

      </main>
    </div>
    <!-- Toggle dark mode button -->
    <div class="fixed bottom-5 left-5">
      <button aria-hidden="true" @click="toggleTheme" class="p-2 transition-colors duration-200 rounded-full shadow-md bg-primary hover:bg-primary-darker focus:outline-none focus:ring focus:ring-primary">
        <svg x-show="isDark" class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
        </svg>
        <svg x-show="!isDark" class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
      </button>
    </div>
  </div>

  <script>
    const setup = () => {
      const getTheme = () => {
        if (window.localStorage.getItem('dark')) {
          return JSON.parse(window.localStorage.getItem('dark'))
        }
        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
      }

      const setTheme = (value) => {
        window.localStorage.setItem('dark', value)
      }

      const getColor = () => {
        if (window.localStorage.getItem('color')) {
          return window.localStorage.getItem('color')
        }
        return 'cyan'
      }

      const setColors = (color) => {
        const root = document.documentElement
        root.style.setProperty('--color-primary', `var(--color-${color})`)
        root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
        root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
        root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
        root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
        root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
        root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
        this.selectedColor = color
        window.localStorage.setItem('color', color)
      }

      return {
        loading: true,
        isDark: getTheme(),
        color: getColor(),
        toggleTheme() {
          this.isDark = !this.isDark
          setTheme(this.isDark)
        },
        setColors,
      }
    }
  </script>
</body>
<?php
/*
$hora_in = (isset($_POST['hora_in'])) ? $_POST['hora_in'] : "";
$hora_fin = (isset($_POST['hora_fin'])) ? $_POST['hora_fin'] : "";

$horaif = $hora_in;
$horaff = $hora_fin;

$hora_in .= ":00";
$hora_fin .= ":00";


$sql = "UPDATE hora_laboral SET  hora_inicio = '$hora_in', hora_fin = '$hora_fin' WHERE id = 1 ";
$query = $bdd->prepare($sql);
if ($query == false) {
  print_r($bdd->errorInfo());
  die('Erreur prepare');
}
$res = $query->execute();
if ($res == false) {
  print_r($query->errorInfo());
  die('Erreur execute');
}
*/
//******************Hora total laborales***************************** */
/*$sql2 = "SELECT @valor := TIMESTAMPDIFF(hour, hora_inicio, hora_fin) as total, (@valor - 1) as hora_lab from hora_laboral; ";
$requ = $bdd->prepare($sql2);
$requ->execute();
$result = $requ->fetchAll();
$hora_fi = '';
$hora_in = '';
foreach ($result as $resultado) :
  $hora_in = $resultado['total'];
  $hora_fi = $resultado['hora_lab'];
endforeach;
//echo $hora_fi;

$sql = "UPDATE hora_laboral SET total = '$hora_fi' WHERE id = 1 ";
$query = $bdd->prepare($sql);
if ($query == false) {
  print_r($bdd->errorInfo());
  die('Erreur prepare');
}
$res = $query->execute();
if ($res == false) {
  print_r($query->errorInfo());
  die('Erreur execute');
}
*/

?>

</html>