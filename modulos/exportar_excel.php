<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
define("DB_NAME", "appsignar_cambios");
define("DB_USER", "root");
define("DB_PASS", "");

class Conexion{
    public $cnx;
    public function conectar(){
        try {
            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
            );
            $this->cnx = new PDO(
                "mysql:host=localhost;
                dbname=".DB_NAME,
                DB_USER, 
                DB_PASS,
                $opciones
            );
            return $this->cnx;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function desconectar(){
        $this->cnx = null;
    }
}
class Consulta{
    private $_db;
    private  $lista_usuarios;

    public function __construct(){
        $this->_db = new Conexion();
    }

    public function buscar(){
        
        $this->_db->conectar();

        $consulta = $this->_db->cnx->prepare("SELECT
         start,
         SEC_TO_TIME(TIME_TO_SEC(start)) as hora_inicio,
         SEC_TO_TIME(TIME_TO_SEC(end)) as hora_fin,
        TIMEDIFF(end,start) as horas_asignadas_total_dia,
         month(start) as mes,
         semana,
         dia,
          empleado,
          title,
          lugar,
          estado,
          division_e,
          perfil_e,division,
          perfil,
          area 
          FROM `events` 
          WHERE empleado LIKE '%%' and empleado <> 'Administrador' and semana <> 0 GROUP by empleado,semana,start");
        
        $consulta->execute();

        while($row = $consulta->fetch(PDO::FETCH_OBJ)){
            $this->lista_usuarios[] =$row;
        }

        $this->_db->desconectar();
        return $this->lista_usuarios;

    }

}

$usuario = new Consulta();
$salida = "";
$salida .= "<table>";
$salida .= "<thead> <th>Fecha</th> <th>Semana</th> <th>Empleado</th> <th>Proyecto</th> <th>Area</th> <th>Estado</th> <th>Horas Asignadas</th> <th>Dia</th> <th>Hora inico</th> <th>Hora fin</th> <th>Lugar</th> <th>Division empleado</th> <th>Perfil empleado</th></thead>";
foreach($usuario->buscar() as $r){
    $salida .= "<tr> <td>".$r->start."</td> <td>".$r->semana."</td> <td>".$r->empleado."</td> <td>".$r->title."</td>  <td>".$r->area."</td> <td>".$r->estado."</td> <td>".$r->horas_asignadas_total_dia."</td> <td>".$r->dia."</td> <td>".$r->hora_inicio."</td> <td>".$r->hora_fin."</td> <td>".$r->lugar."</td> <td>".$r->division_e."</td> <td>".$r->perfil_e."</td>";
}
$salida .= "</table>";




header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=\"Asignaciones_".time().".xls\"");
header("Expires: 0");
header("Cache-Control: max-age=0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
echo $salida;
?>
