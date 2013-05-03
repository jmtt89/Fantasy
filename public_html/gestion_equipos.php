<?php

require_once("Clases/fachadaInterface.php");

$instancia = fachadaInterface::singleton();
$_POST['TIPO']='Equipo';
$Equipos = $instancia->obtenerTodos();

include("Static/head.php");
include("Static/header.php");

echo '<link rel="stylesheet" href="assets/styles/style_gestionar_equipos.css"  type="text/css" />'; 
?>
<?php if(isset($_SESSION['Manager'])){?>
	<ul id="navigation">
    	<li><a href="index.php">Inicio</a></li>
        <li><a href="gestion_jugadores.php">Jugadores</a></li>
        <li><a class="on" href="gestion_equipos.php">Equipos</a></li>
        <li><a href="gestion_estadios.php">Estadios</a></li>
        <li><a href="#">Mi Perfil</a></li>
        <li><a href="gestion_rosters.php">Roster</a></li>
        <li><a href="#">Ligas</a></li>
        <li><a href="#">Calendario</a></li>
        <li><a href="#">Resultados</a></li>
        <li><a href="#">Reglas</a></li>
        <li><a href="#">Cont&aacutectenos</a></li>
    </ul>
<?php } elseif(isset($_SESSION['Administrador'])){?>
	<ul id="navigation">
    	<li><a href="index.php">Inicio</a></li>
        <li><a href="gestion_jugadores.php">Jugadores</a></li>
        <li><a class="on" href="gestion_equipos.php">Equipos</a></li>
        <li><a href="gestion_estadios.php">Estadios</a></li>
        <li><a href="gestion_rosters.php">Roster</a></li>
        <li><a href="#">Ligas</a></li>
        <li><a href="#">Calendario</a></li>
        <li><a href="#">Resultados</a></li>
        <li><a href="#">Reglas</a></li>
        <li><a href="#">Cont&aacutectenos</a></li>
		<li><a href="gestion_usuarios.php">Usuarios</a></li>
	</ul>
<?php } else { 
		echo '<ul id="navigation">
		<li><a href="index.php">Inicio</a></li>
        <li><a href="gestion_jugadores.php">Jugadores</a></li>
        <li><a href="gestion_equipos.php">Equipos</a></li>
        <li><a href="gestion_estadios.php">Estadios</a></li>
        </ul>';
	}
echo '</div>

	   
	<div id="content">
		<div id="contenido_interno">';
		
		echo '<form id="form" action="Agregar_Eq.php" method="post">
		        <input type="submit" value="Agregar Equipo"/>
		      </form>';
		
		echo '<h2>Equipos</h2>';
		
		for($i=0;$i<count($Equipos);$i++){
			echo'
				<div class="alcanceEquipo">
					<form class="Fila" action="Datos_Eq.php" method="post" >
						<input type="hidden" name="id" value="'.$Equipos[$i]->id.'">
						<input class="imagen" type="image" src="'.$Equipos[$i]->logo.'" />
						<div class="datos">
							<div>Nombre: '.$Equipos[$i]->nombre.'</div>
							<div>Siglas: '.$Equipos[$i]->siglas.'</div>
							<div>Fecha de Fundacion: '.$Equipos[$i]->fecha_fundacion.'</div>
						</div>
					</form>
				</div>';
		}
		
echo '</div>';
include("Static/sideBar.php");
include("Static/footer.php");

?>
