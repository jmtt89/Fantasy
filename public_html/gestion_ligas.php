<?php

$ID = isset($_POST['id']) ? $_POST['id'] : -1;

include 'Static/head.php';
include 'Static/header.php';

require_once("Clases/fachadaInterface.php");
$instancia = fachadaInterface::singleton();

$LigasR = array();
$LigasP = array();
$LigasM = array();
$LigasPv = array();

if(isset($_SESSION['Manager'])){
    //Obtengo las ligas en las que Juega el Roster
    $LigasR = $instancia->obtenerLigasDeRoster();
    $Titulo1 = 'Ligas en las que Juego';
    
    //Obtengo Todas Las Ligas Publicas
    $LigasP = $instancia->obtenerLigasPublicas();
    $Titulo2 = 'Ligas Publicas';
    
    //Obtengo Las Ligas Creadas por este Usuario
    $LigasM = $instancia->obtenerLigasDeManager();
    $Titulo3 = 'Mis Ligas';
    
}  elseif ($_SESSION['Administrador']) {
    $Titulo1 = 'Datos de Liga';
    //Obtener Todas las Ligas Publicas
    $LigasP = $instancia->obtenerLigasPublicas();
    $Titulo2 = 'Ligas Publicas';
    
    //Obtener Todas Las Ligas Privadas
    $LigasPv = $instancia->obtenerLigasPrivadas();
    $Titulo3 = 'Ligas Privadas';
    
} else {
    header('Location: index.php');
}
unset($_POST);



$i=0;
$C1 = ''; 
foreach($LigasR as $Liga){
    if( $i % 2 ) // Impares
        $C1 .= '<tr class="impar">';
    else //Pares
        $C1 .= '<tr class="par">';
    
    $Posicion = $instancia->ObtenerPosicionRoster($Liga)+1;
    unset($_POST);
    $_POST['TIPO']='Manager';
    $_POST['id']=$_SESSION['Manager'];
    $Puntos = $instancia->obtener()->puntaje;
    
    $C1 .= '<td>'.$Posicion.'</td><td>'.$Liga->nombre.'</td><td>'.$Puntos.'</td><td><form action="Datos_L.php" method="post"><input type="hidden" name="id" value="'.$Liga->id.'" /><input type="submit" value="Ver Detalles"/></form></td></tr>';    
    $i++;
}

if($ID >= 0){
    $_POST['TIPO']='Liga';
    $_POST['id']=$ID;
    $Liga = $instancia->obtener();
    $Score = $instancia->ObtenerPuntosJugadores($Liga);
    foreach($Score as $Posicion=>$Manager){
        if( $i % 2 ) // Impares
            $C1 .= '<tr class="impar">';
        else //Pares
            $C1 .= '<tr class="par">';
        
        $_POST['TIPO']='Usuario';
        $_POST['id']= $Manager->usuario;
        
        
        $C1 .= '<td>'.($Posicion+1).'</td><td>'.$instancia->obtener()->username.'</td><td>'.$Manager->puntaje.'</td></tr>';
        $i++;
    }
}
    
$i=0;
$C2 = ''; 
foreach($LigasP as $Liga){
    $Tmp = $instancia->ObtenerJugadorUno($Liga);
    
    if($Tmp == null){
        $nombre  = '-----';
        $puntaje = '-----';
    }else{
        $nombre  = $Tmp->usuario;
        $puntaje = $Tmp->puntaje;
    }    
    
    if( $i % 2 ) // Impares
        $C2 .= '<tr class="impar">';
    else //Pares
        $C2 .= '<tr class="par">  ';
  
    if(isset($_SESSION['Manager']))
        $form2 ='<form action="Datos_L.php" method="post"><input type="hidden" name="id" value="'.$Liga->id.'" /><input type="submit" value="Ver Detalles"/></form><form action="Manejo_L.php" method="post"><input type="hidden" name="id" value="'.$Liga->id.'" /><input type="submit" value="Inscribirme"/></form>';
    else
        $form2 ='<form action="gestion_ligas.php" method="post"><input type="hidden" name="id" value="'.$Liga->id.'" /><input type="submit" value="Ver Detalles"/></form>';
    
        $C2 .= '<td>'.$Liga->nombre.'</td><td>'.$nombre.'</td><td>'.$puntaje.'</td><td>'.$form2.'</td></tr>';
    
    $i++;
}

$i=0;
$C3 = ''; 
foreach($LigasM as $Liga){
    $Tmp = $instancia->ObtenerJugadorUno($Liga);
    
    if($Tmp == null){
        $nombre  = '-----';
        $puntaje = '-----';
    }else{
        $nombre  = $Tmp->usuario;
        $puntaje = $Tmp->puntaje;
    }
    
    if( $i % 2 ) // Impares
        $C3 .= '<tr class="impar">';
    else //Pares
        $C3 .= '<tr class="par">  ';
    
    $C3 .= '<td>'.$Liga->nombre.'</td><td>'.$nombre.'</td><td>'.$puntaje.'</td>';
    
    
    
   $form2 = '<form action="Datos_L.php" method="post"><input type="hidden" name="id" value="'.$Liga->id.'" /><input type="submit" value="Ver Detalles"/></form><form action="Manejo_L.php" method="post"><input type="hidden" name="id" value="'.$Liga->id.'" /><input type="submit" value="Inscribirme"/></form>';
   $form1 = '<form action="Datos_L.php" method="post"><input type="hidden" name="id" value="'.$Liga->id.'" /><input type="submit" value="Ver Detalles"/></form>';
    
    
    if($instancia->PerteneceRoster($Liga))
        $C3 .= '<td>'.$form1.'</td></tr>';
    else    
        $C3 .= '<td>'.$form2.'</td></tr>';
    
    $i++;
}

foreach($LigasPv as $Liga){
    $Tmp = $instancia->ObtenerJugadorUno($Liga);
    
    if($Tmp == null){
        $nombre  = '-----';
        $puntaje = '-----';
    }else{
        $nombre  = $Tmp->usuario;
        $puntaje = $Tmp->puntaje;
    }    
    
    if( $i % 2 ) // Impares
        $C3 .= '<tr class="impar">';
    else //Pares
        $C3 .= '<tr class="par">  ';
    
    if(isset($_SESSION['Manager']))
        $form2 ='<form action="Datos_L.php" method="post"><input type="hidden" name="id" value="'.$Liga->id.'" /><input type="submit" value="Ver Detalles"/></form><form action="Manejo_L.php" method="post"><input type="hidden" name="id" value="'.$Liga->id.'" /><input type="submit" value="Inscribirme"/></form>';
    else
        $form2 ='<form action="gestion_ligas.php" method="post"><input type="hidden" name="id" value="'.$Liga->id.'" /><input type="submit" value="Ver Detalles"/></form>';    
    
    $C3 .= '<td>'.$Liga->nombre.'</td><td>'.$nombre.'</td><td>'.$puntaje.'</td><td>'.$form2.'</td></tr>';
        
    $i++;
}


?>

<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="assets/styles/style_roster.css"  type="text/css" />
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
          <li><a class="on" href="#">Ligas</a></li>
          <li><a href="#">Calendario</a></li>
          <li><a href="#">Resultados</a></li>
          <li><a href="#">Reglas</a></li>
          <li><a href="#">Cont&aacutectenos </a></li>
        </ul>
</div>

	   
	<div id="content">
            <div id="contenido_roster">
                
                <form id="form" action="Agregar_Lg.php" method="post">
                    <input type="submit" value="Crear Nueva Liga"/>
		</form>
                
                <h2><?php echo $Titulo1; ?></h2>
                <div class="campo_juego">
                    <table width="300" border="0">
                      <tr class="impar">
                        <td>Posicion:</td>
                        <td>Nombre:</td>
                        <td>Puntaje:</td>
                      </tr>
                      <?php echo $C1; ?>
                    </table>
                </div>

          
                <div id="lista_jugadores">
                    <div id="Accordion1" class="Accordion" tabindex="0">
                        <div class="AccordionPanel">
                            <div class="AccordionPanelTab"><h1><?php echo $Titulo2; ?></h1></div>
                            <div class="AccordionPanelContent">

                                <table width="350" border="0">
                                  <tr class="impar">
                                    <td>Nombre:</td>
                                    <td>Primer Lugar:</td>
                                    <td>Puntos:</td>
                                  </tr>
                                  <?php echo $C2; ?>
                                </table>
                                
                            </div>
                        </div>
                        <div class="AccordionPanel">
                            <div class="AccordionPanelTab"><h1><?php echo $Titulo3; ?></h1></div>
                            <div class="AccordionPanelContent">

                                <table width="350" border="0">
                                <tr class="impar">
                                    <td>Nombre:</td>
                                    <td>Primer Lugar:</td>
                                    <td>Puntos:</td>
                                </tr>
                                <?php echo $C3; ?>
                                </table> 
                                
                            </div>
                        </div>
                    </div>
                </div>
	  </div>
		 
		 
      <div id="sideBar">
			
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