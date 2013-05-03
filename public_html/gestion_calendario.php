<?php

$ID = isset($_POST['id']) ? $_POST['id'] : -1;
unset($_POST);

include 'Static/head.php';
include 'Static/header.php';

require_once("Clases/fachadaInterface.php");
$instancia = fachadaInterface::singleton();

	
date_default_timezone_set('America/Caracas');

$year = date('Y');
$month = date('n');
$day = date('j');	

$daysInMonth = date("t",mktime(0,0,0,$month,1,$year));
$firstDay = date("w", mktime(0,0,0,$month,1,$year));

// Calcula el todal de Espacios en el Arreglo
$tempDays = $firstDay + $daysInMonth;
// Calcula el Total de Filas que se necesitan
$weeksInMonth = ceil($tempDays/7);

// Crea una Matriz
$counter=0;
for($j=0;$j<$weeksInMonth;$j++) {
    for($i=0;$i<7;$i++) {
        $counter++;
        $week[$j][$i] = $counter; 
        // Inicia en el Primer Dia
        $week[$j][$i] -= $firstDay;
        if (($week[$j][$i] < 1) || ($week[$j][$i] > $daysInMonth)) {
            $week[$j][$i] = "";
        }
    }
}

$_POST['mes'] = $month;
$_POST['anio']= $year;

$Calendario = $instancia->obtenerCalendariodeFecha();

if($ID != -1){
    unset($_POST);
    $_POST['id']=$ID;
    $_POST['TIPO']='Calendario';
    $jornada = $instancia->obtener();

    unset($_POST);
    $_POST['id']=$jornada->local;
    $_POST['TIPO']='Equipo';
    $local = $instancia->obtener();
    
    unset($_POST);
    $_POST['id']=$jornada->visitante;
    $_POST['TIPO']='Equipo';
    $visitante = $instancia->obtener();
    
    unset($_POST);
    $_POST['id']=$jornada->estadio;
    $_POST['TIPO']='Estadio';
    $estadio = $instancia->obtener();
    
    unset($_POST);
    $_POST['jornada']=$ID;
    $_POST['TIPO']='Juego';
    $juego = $instancia->obtener();
    
}
?>

<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="assets/styles/style_calendario.css"  type="text/css" />
<link rel="stylesheet" href="assets/styles/style_showinfo.css"  type="text/css" />
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/showinfo.js"></script>




        <ul id="navigation">
          <li><a href="index.php">Inicio</a></li>
          <li><a href="gestion_jugadores.php">Jugadores</a></li>
          <li><a href="#">Equipos</a></li>
          <li><a href="#">Estadios</a></li>
          <li><a href="#">Mi Perfil</a></li>
          <li><a href="#">Roster</a></li>
          <li><a href="#">Ligas</a></li>
          <li><a class="on" href="gestion_calendario.php">Calendario</a></li>
          <li><a href="#">Resultados</a></li>
          <li><a href="#">Reglas</a></li>
          <li><a href="#">Cont&aacutectenos </a></li>
        </ul>
</div>


    <div id="content">
        <div id="contenido_Jornada">

            <form id="form" action="Agregar_Jornada.php" method="post">
                <input type="submit" value="Agregar Nueva Jornada"/>
            </form>

            <div class="campo_juego">
                <table width="300" border="0">
                    <caption>
                        Resultados de la Jornada
                    </caption>
                    <tr>
                        <th>Fecha: </th>
                        <td><?php echo isset($jornada) ? $jornada->fecha : '----------' ; ?></td>
                    </tr>
                    <tr>
                        <th>Local: </th>
                        <td><?php echo isset($jornada) ? $local->nombre : '----------'; ?></td>
                        <th>Visitante: </th>
                        <td><?php echo isset($jornada) ? $visitante->nombre : '---------'; ?></td>
                    </tr>
                    <tr>
                        <th>Estadio: </th>
                        <td><?php echo isset($jornada) ? $estadio->nombre : '----------'; ?></td>
                    </tr>
                    <tr>
                        <th>Hits Local</th>
                        <td><?php echo isset($juego) ? (($juego->terminado == 't')  ? $juego->hits_local         : '-----------') : '-----------'; ?></td>
                        <th>Hits Visitantes</th>
                        <td><?php echo isset($juego) ? (($juego->terminado == 't')  ? $juego->hits_visitante     : '-----------') : '-----------'; ?></td>
                    </tr>
                    <tr>
                        <th>Carreras Local</th>
                        <td><?php echo isset($juego) ? (($juego->terminado == 't')  ? $juego->carreras_local     : '-----------'): '------------'; ?></td>
                        <th>Carreras Visitantes</th>
                        <td><?php echo isset($juego) ? (($juego->terminado == 't')  ? $juego->carreras_visitante : '-----------'): '------------'; ?></td>
                    </tr>
                    <tr>
                        <th>Errores Local</th>
                        <td><?php echo isset($juego) ? (($juego->terminado == 't')  ? $juego->errores_local      : '-----------'): '------------'; ?></td>
                        <th>Errores Visitantes</th>
                        <td><?php echo isset($juego) ? (($juego->terminado == 't')  ? $juego->errores_visitante  : '-----------'): '------------'; ?></td>
                    </tr>                    
                </table>
            </div>

        </div>
		 
        <div id="sideBar">
            <table id="calendar" cellspacing="0" cellpadding="0">
                <caption>
                    <a href="#" title="Mes Anterior" class="nav">&laquo;</a><?php echo date('M', mktime(0,0,0,$month,1,$year)).' '.$year; ?><a href="#" title="Mes Siguiente" class="nav">&raquo;</a>
                </caption>
                <tr>
                    <th scope="col" abbr="Domingo" title="Domingo">D</th>
                    <th scope="col" abbr="Lunes" title="Lunes">L</th>	
                    <th scope="col" abbr="Martes" title="Martes">M</th>
                    <th scope="col" abbr="Miercoles" title="Miercoles">M</th>
                    <th scope="col" abbr="Jueves" title="Jueves">J</th>
                    <th scope="col" abbr="Viernes" title="Viernes">V</th>
                    <th scope="col" abbr="Sabado" title="Sabado">S</th>
                </tr>

                <?php
                    $k=2;
                    foreach ($week as $key => $val) {
                        echo "<tr>";
                        for ($i=0;$i<7;$i++) {
                            $j=0;
                            foreach($Calendario as $jornada){
                                $Aux = explode(" ", $jornada->fecha); //Año-Mes-Dia Hora:Minutos:Segundos TimeZone
                                $Aux2 = explode("-", $Aux[0]); //Año-Mes-Dia
                                if($Aux2[2]==$val[$i]){
                                    if($val[$i]==$day){
                                        $Casilla = "<td class='today' align='center'>";// Hoy
                                    }elseif($val[$i]<$day){
                                        $Casilla = "<td class='btoday' align='center'>";//  Antes de Hoy
                                    }else {
                                        $Casilla = "<td class='atoday' align='center'>";// Despues de Hoy
                                    }
                                    $Casilla .= '<form action="gestion_calendario.php" method="post"><input type="hidden" name="id" value="'.$jornada->id.'" /><a href="javascript:document.forms['.$k.'].submit()">'.$val[$i].'</a></form>';
                                    $k++;
                                    //unset($Calendario[$j]);
                                    break;
                                }
                                $j++;
                            }
                            if($j >= count($Calendario)){
                                if($val[$i]==$day){
                                    $Casilla = "<td class='today' align='center'>";//  $val[$i]</td>";
                                }else{
                                    $Casilla = "<td align='center'>";//$val[$i]</td>";
                                }
                                $Casilla .= $val[$i];
                            }
                            $Casilla .= "</td>";
                            echo $Casilla;
                        }
                        echo "</tr>";
                    }
                ?>
            </table> 	
        </div>
    </div>

	
    <div id="footer"> 
        <span class="logoCluster"></span>
            <div id="contacto">
            <p> Powered by Cluster System Solutions & &Ntildeangara <br />
            Septiembre-Diciembre 2011. </p>
            </div>
        <span class="logoNiangara"></span>
    </div>
	
</div>
<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
 
</body>
</html>