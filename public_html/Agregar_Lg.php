<?php
include("Static/head.php");
include("Static/header.php");

require_once("Clases/fachadaInterface.php");
$instancia = fachadaInterface::singleton();

if(isset($_POST['Aplicar'])){
    
    $_POST['usuario']=$_SESSION['Usuario'];        
    if(isset($_SESSION['Manager']))
        $_POST['es_publica']=false;
    
    unset($_POST['Aplicar']);
    $instancia->insertar();
    
    if(isset($_SESSION['Manager']))
        echo '
        <form action="Manejo_L.php" method="post" name="MyForm">
            <input type="hidden" name="id" value="'.$Liga->id.'" />
        </form>

        <script type="text/javascript" language="JavaScript">
            document.MyForm.submit();
        </script>';
    
    header('Location: gestion_ligas.php'); 
	
}
unset($_POST);


?>

<link rel="stylesheet" href="assets/styles/style_Modificar_J.css"  type="text/css" />

<?php if(isset($_SESSION['Manager'])){?>
	<ul id="navigation">
    	<li><a href="index.php">Inicio</a></li>
        <li><a href="gestion_jugadores.php">Jugadores</a></li>
        <li><a href="gestion_equipos.php">Equipos</a></li>
        <li><a href="gestion_estadios.php">Estadios</a></li>
        <li><a href="#">Mi Perfil</a></li>
        <li><a class="on" href="gestion_rosters.php">Roster</a></li>
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
        <li><a href="gestion_equipos.php">Equipos</a></li>
        <li><a href="gestion_estadios.php">Estadios</a></li>
        <li><a class="on" href="gestion_rosters.php">Roster</a></li>
        <li><a href="#">Ligas</a></li>
        <li><a href="#">Calendario</a></li>
        <li><a href="#">Resultados</a></li>
        <li><a href="#">Reglas</a></li>
        <li><a href="#">Cont&aacutectenos</a></li>
		<li><a href="gestion_usuarios.php">Usuarios</a></li>
	</ul>
<?php } else {
	    header('Location: index.php');
	}?>
</div>
    <div id="content">
		
        <div id="contenido_interno">
            <div id="box_info">
                <form id="Alcance" action="Agregar_Lg.php" method="post">
                    
                    <label for="nombre"> Nombre de la Liga:  </label>
                    <input name="nombre" id="nombre" type="text" value="" />
                    
                    <label for="es_publica"> Visibilidad:  </label>
                    <select name="es_publica">
                        <option value="true">Publica</option>
                        <option value="false">Privada</option>
                    </select>
                    
                    <input type="hidden" name="TIPO" value="Liga" />
                    <input type="submit" name="Aplicar" value="Aplicar"  />
                </form>

            </div>

        </div>
        
<?php
include("Static/sideBar.php");
include("Static/footer.php");	
?>
