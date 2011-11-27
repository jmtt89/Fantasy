<?php

    require_once("Clases/fachadaInterface.php");
    $instancia = fachadaInterface::singleton();

    //Esta Area es para El Procesamiento del Formulario
    if(isset($_POST['Aplicar'])){

        $fecha = $_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
        $_POST['fecha_fundacion']=$fecha;
        unset($_POST['anio']);
        unset($_POST['mes']);
        unset($_POST['dia']);
        unset($_POST['Aplicar']);

        $instancia->insertar();

        header('Location: gestion_equipos.php'); 

    }
    unset($_POST);


?>

<?php

    //Esta Area es para Calcular todas las Selecciones del Formulario

    $_POST['TIPO']='Estadio';
    $Estadios = $instancia->obtenerTodos();

    unset($_POST);

    date_default_timezone_set('America/Caracas');
    $Es = '<select name="home">';
    foreach($Estadios as $Estadio)
        $Es .= "<option value=".$Estadio->id.">".$Estadio->nombre."</option>";
    $Es .= '</select>';

    $d = '<select name="dia">';
    for ($i = 1 ; $i<=31 ; $i++)
        $d .= "<option value=".$i.">".$i."</option>";
    $d .= '</select>';

    $mes = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Julio", "Junio", "Agosto", "Septiembre","Octubre", "Noviembre", "Diciembre");
    $m = '<select name="mes">';
    for ($i = 0 ; $i < 12 ; $i++)
        $m .= "<option value=".$i.">".$mes[$i]."</option>";
    $m .= '</select>';

    $a = '<select name="anio">';
    for ($i = 1960 ; $i<= date('Y') ; $i++)
        $a .= "<option value=".$i.">".$i."</option>";
    $a .= '</select>';    


    include("Static/head.php");
    include("Static/header.php");
?>

<link rel="stylesheet" href="assets/styles/style_Datos_Es.css"  type="text/css" />
	
        <ul id="navigation">
          <li><a href="index.php">Inicio</a></li>
          <li><a href="gestion_jugadores.php">Jugadores</a></li>
          <li class="on"><a href="gestion_equipos.php">Equipos</a></li>
          <li><a href="gestion_estadios.php">Estadios</a></li>
          <li><a href="#">Mi Perfil</a></li>
          <li><a href="#">Roster</a></li>
          <li><a href="#">Ligas</a></li>
          <li><a href="#">Calendario</a></li>
          <li><a href="#">Resultados</a></li>
          <li><a href="#">Reglas</a></li>
          <li><a href="#">Cont&aacutectenos</a></li>
        </ul>
  </div>


    <div id="content">
    <div id="contenido_interno_datos">

        <div id="box_info">
            <form id="Alcance" action="Agregar_Eq.php" method="post">
                
                <table width="550" border="0">
                    <tr>
                        <td>
                            <img src="assets/images/Fotos_Equipos/generico.jpg" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="550" border="0">
                                <tr>
                                    <td>Nombre del Equipo:</td>
                                    <td colspan="2">
                                        <input size="10" name="nombre" type="text" id="nombre" value="" />
                                    </td>
                                    <td>Siglas:</td>
                                    <td colspan="2">
                                        <input size="10" name="siglas" type="text" id="siglas" value="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" align="center">Fecha de fundación:</td>
                                </tr>
                                <tr>
                                    <td>Día:</td>
                                    <td><?php echo $d; ?></td>
                                    <td>Mes:</td>
                                    <td><?php echo $m; ?></td>
                                    <td>Año:</td>
                                    <td><?php echo $a; ?></td>
                                </tr>
                                <tr>
                                    <td>Casa:</td>
                                    <td colspan="5" align="left"><?php echo $Es; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                
                <input type="hidden" name="TIPO" value="Equipo" />
                <input type="submit" name="Aplicar" value="Aplicar"  />                
            </form>
        </div>
    </div>
        
<?
include("Static/sideBar.php");
include("Static/footer.php");	

?>
