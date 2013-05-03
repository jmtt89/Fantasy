<?php
session_start();
require_once("Clases/fachadaInterface.php");
$instancia = fachadaInterface::singleton();

$ID_Liga = $_POST['id'];
unset($_POST);

$_POST['TIPO']='Roster';
$_POST['manager']=$_SESSION['Manager'];
$Roster = $instancia->obtener();
unset($_POST);

//Siempre la Entrada para Especificar la Liga (id)
$_POST['TIPO']='Participa';
$_POST['liga']=$ID_Liga;
$_POST['roster']=$Roster->id;
$instancia->insertar();

header('Location: gestion_ligas.php');

?>
