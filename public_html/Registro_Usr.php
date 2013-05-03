<?php

require_once("Clases/fachadaInterface.php");
$instancia = fachadaInterface::singleton();

if (isset($_POST['Registrar'])){
	$_POST['TIPO']='Usuario';
	$instancia->insertar();
	$Usuario = $instancia->obtener();
	$id = $Usuario->__get('id');
	$_POST['TIPO']='Perfil_Usuario';
	$_POST['usuario']=$id;
	$instancia->insertar();
	$_POST['TIPO']='Manager';
	$instancia->insertar();
	header('Location: ./index.php');	
}

include("Static/head.php");
include("Static/header.php");

echo '<link rel="stylesheet" href="assets/styles/style_Datos_Urs.css"  type="text/css" />'; 
?>
<?php

if(isset($_SESSION['Manager'])){?>
	<ul id="navigation">
    	<li><a href="index.php">Inicio</a></li>
        <li><a href="gestion_jugadores.php">Jugadores</a></li>
        <li><a href="gestion_equipos.php">Equipos</a></li>
        <li><a href="gestion_estadios.php">Estadios</a></li>
        <li><a href="gestion_miperfil">Mi Perfil</a></li>
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
        <li><a href="gestion_equipos.php">Equipos</a></li>
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
		<div id="contenido_interno">
			<div id="contenido_interno_datos">
            <div id="box_info">
				<h3 align="center"> Nuevo Usuario </h3>
                <form id="Alcance" action="Registro_Usr.php" method="post">
                	<table width="400" border="0" align="center">
							<tr>
								<td align="center">Nombre de usuario</td>
								<td align="center">
									<input type="text" name="username"/>
								</td>								
							</tr>
							<tr>
								<td align="center">Password</td>
								<td align="center">
									<input type="password" name="password"/>
								</td>
							</tr>
							<tr>
								<td align="center">Repetir Password</td>
								<td align="center">
									<input type="password" name="repassword"/>
								</td>
							</tr>                                
							<tr>
        	                    <td align="center">Nombres </td>
                                <td colspan="2" align="center">
									<input type="text" name="nombres"/>		
								</td>
                            </tr>
                            <tr>
		                        <td align="center">Apellidos </td>
                                <td colspan="3" align="center">
									<input type="text" name="apellidos"/>
								</td>
                            </tr>
                            <tr>
                                <td align="center">Email </td>
                                <td colspan="3" align="center">
									<input type="text" name="email"/>
								</td>
                            </tr>
                        	<tr>
                                <td align="center">Avatar </td>
                                <td colspan="3" align="center">
								<input type="text" name="avatar"/>										
								</td>
                        	</tr>
                    	</table>
					<div id="Alcance_errorloc" class="errors_string"></div>
					<input type="submit" name="Registrar" value="Registrar"/>
					<a href="index.php"><button type="button">Regresar</button></a>
	            </form>
			<script type="text/javascript">
				var frmvld = new Validator("Alcance");
				frmvld.addValidation("username","req","Nombre Usuario: es un campo requerido.");
				frmvld.addValidation("username","alnum","Nombre Usuario: Solo caracteres alphanumericos.");
				frmvld.addValidation("username","maxlen=15","Nombre Usuario: Maximo de caracteres 15.");
				frmvld.addValidation("password","req","Password: es un campo requerido.");
				frmvld.addValidation("repassword","req","Repetir Password: es un campo requerido.");
				frmvld.addValidation("password","eqelmnt=repassword","Password: Passwords no coinciden.");				
				frmvld.addValidation("nombres","req","Nombres: es un campo requerido.");
				frmvld.addValidation("nombres","alpha_s","Nombres: no puede contener numeros.");
				frmvld.addValidation("apellidos","req","Apellidos: es un campo requerido.");
				frmvld.addValidation("apellidos","alpha_s","Apellidos : no puede contener numeros.");
				frmvld.addValidation("email","req","email : es un campo requerido");
				frmvld.addValidation("email","email","Email: email no es correcto.");
				frmvld.EnableOnPageErrorDisplaySingleBox();
				//frmvld.EnableMsgsTogether();	
			</script>
            </div>
		</div>
	
</div>';
include("Static/sideBar.php");
include("Static/footer.php");
?>
