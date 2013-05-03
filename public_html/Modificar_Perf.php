<?php 
require_once("Clases/fachadaInterface.php");
$instancia = fachadaInterface::singleton();

if(isset($_POST['aplicar'])){
	$idu = $_POST['idusr'];
	$idp = $_POST['idpusr'];
	$idm = $_POST['idman'];
	$_POST['id']=$idp;
    if($_POST['password'] == "" || strlen($_POST['password']) <= 1){
		$_POST['password'] = $_POST['savepass'];
	}
	$_POST['TIPO']='Perfil_Usuario';	
	$instancia->actualizar();
	$_POST['id']=$idm;
	$_POST['TIPO']='Manager';
	$instancia->actualizar();
	$_POST['id']=$idu;
	$_POST['TIPO']='Usuario';
	$instancia->actualizar();
	unset($_POST);
	$_POST['idusuario']=$idu;
	header('Location: gestion_miperfil.php');
}

$id = $_POST['id'];
unset($_POST);

$_POST['id']=$id;
$_POST['TIPO']='Usuario';
$Usuario = $instancia->obtener();

unset($_POST);
$_POST['TIPO']='Perfil_Usuario';
$_POST['usuario']=$id;
$P_Usuario = $instancia->obtener();

unset($_POST);
$_POST['TIPO']='Manager';
$_POST['usuario']=$id;
$UManager = $instancia->obtener();
include("Static/head.php");
include("Static/header.php");

?>
<link rel="stylesheet" href="assets/styles/style_Modificar_Usr.css"  type="text/css" />
<?php

if(isset($_SESSION['Manager'])){?>
	<ul id="navigation">
    	<li><a href="index.php">Inicio</a></li>
        <li><a href="gestion_jugadores.php">Jugadores</a></li>
        <li><a href="gestion_equipos.php">Equipos</a></li>
        <li><a href="gestion_estadios.php">Estadios</a></li>
        <li><a class="on" href="#">Mi Perfil</a></li>
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
        <li><a class="on" href="gestion_estadios.php">Estadios</a></li>
        <li><a href="gestion_rosters.php">Roster</a></li>
        <li><a href="#">Ligas</a></li>
        <li><a href="#">Calendario</a></li>
        <li><a href="#">Resultados</a></li>
        <li><a href="#">Reglas</a></li>
        <li><a href="#">Cont&aacutectenos</a></li>
		<li><a class="on" href="gestion_usuarios.php">Usuarios</a></li>
	</ul>
<?php } else { 
		echo '<ul id="navigation">
		<li><a href="index.php">Inicio</a></li>
        <li><a href="gestion_jugadores.php">Jugadores</a></li>
        <li><a href="gestion_equipos.php">Equipos</a></li>
        <li><a href="gestion_estadios.php">Estadios</a></li>
        </ul>';
	}?>
</div>

    <div id="content">
		
        <div id="contenido_interno">
            <div id="box_info">
                <form id="Alcance" action="Modificar_Perf.php" method="post">
					<h3><?php echo $Usuario->username;?></h3>
					Password: <input type="password" name="password"/></br>
					Repetir Password: <input type="password" name="repassword"/></br>
					Nombres: <input type="text" name="nombres" value="<?php echo $P_Usuario->nombres;?>"/></br>
					Apellidos: <input type="text" name="apellidos" value="<?php echo $P_Usuario->apellidos;?>"/></br>
					Email: <input type="text" name="email" value="<?php echo $P_Usuario->email;?>"/>
					</br>
					Avatar: <input type="text" name="avatar" value="<?php echo $P_Usuario->avatar;?>"/>
					<input type="hidden" name="savepass" value="<?php echo $Usuario->password?>"/>
					<input type="hidden" name="idusr" value="<?php echo $Usuario->id;?>"/>
					<input type="hidden" name="username" value="<?php echo $Usuario->username;?>"/>
					<input type="hidden" name="idpusr" value="<?php echo $P_Usuario->id;?>"/>
					<input type="hidden" name="pusuario" value="<?php echo $P_Usuario->usuario;?>"/>
					<input type="hidden" name="idman" value="<?php echo $UManager->id;?>"/>
					<input type="hidden" name="musuario" value="<?php echo $UManager->usuario;?>"/>
					<input type="hidden" name="aplicar" value="o"/>
					</br>
					<h3>Avatares disponibles:</h3>
					</br>
					<div class="ava">avatar-1
					</br>
					<img src="assets/images/Avatares/avatar-1.jpg"/>
					</div>
					
					<div class="ava">avatar-2
					</br>
					<img src="assets/images/Avatares/avatar-2.jpg"/>
					</div>
					
					<div class="ava">avatar-3
					</br>
					<img src="assets/images/Avatares/avatar-3.jpg"/>
					</div>
					
					<div class="ava">avatar-4
					</br>
					<img src="assets/images/Avatares/avatar-4.jpg"/>
					</div>
					<div id="Alcance_errorloc" class="errors_string"></div>
					<a href="gestion_miperfil.php"><button type="button">Regresar</button></a>
					<input type="submit" value="Aplicar"/>
				</form>
				<script type="text/javascript">
					var frmvld = new Validator("Alcance");
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
	
<?php
include("Static/sideBar.php");
include("Static/footer.php");	
?>
