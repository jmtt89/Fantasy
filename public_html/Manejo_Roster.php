<?php
session_start();
require_once("Clases/fachadaInterface.php");
date_default_timezone_set('America/Caracas');
$instancia = fachadaInterface::singleton();

//Siempre la Entrada para Especificar el Roster (id)
$ID_Roster  = isset($_POST['id']) ? $_POST['id'] : -1;
$ID_Equipo  = isset($_POST['id_Equipo'] ) ? $_POST['id_Equipo'] : -1;
$ID_Jugador = isset($_POST['id_Jugador']) ? $_POST['id_Jugador'] : -1;
$POSICION   = isset($_POST['posicion_jugador']) ? $_POST['posicion_jugador'] : -1;
$vender     = isset($_POST['Vender']);
unset($_POST);

$_POST['TIPO']='Manager';
$_POST['id']=$_SESSION['Manager'];
$Manager = $instancia->obtener();
unset($_POST);

if($vender){
    $_POST['TIPO'] = 'Roster';
    $_POST['manager']=$_SESSION['Manager'];
    $Roster = $instancia->obtener();
    unset($_POST);
    
    if($ID_Equipo != -1){
        $_POST['TIPO'] = 'Roster_Equipo';
        $_POST['roster'] = $Roster->id;
        $_POST['equipo'] = $ID_Equipo;
        $_POST['equipo_activo'] = true;
        $RostersE = $instancia->obtener();
        unset($_POST);
        $_POST['TIPO'] = 'Roster_Equipo';
        $_POST['id']=$RostersE->id;
        $_POST['fecha_venta_equipo'] = date("d/m/Y H:i:s");
        $_POST['equipo_activo'] = 0;
        $instancia->actualizar();
        $Manager->creditos += $RostersE->precio_compra_equipo;
    }
    
    if($ID_Jugador != -1){
        $_POST['TIPO'] = 'Roster_Jugador';
        $_POST['roster'] = $Roster->id;
        $_POST['jugador'] = $ID_Jugador;
        $_POST['jugador_activo'] = true;
        $RostersJ = $instancia->obtener();
        unset($_POST);
        $_POST['TIPO'] = 'Roster_Jugador';
        $_POST['id']=$RostersJ->id;
        $_POST['fecha_venta_jugador'] = date("d/m/Y H:i:s");
        $_POST['jugador_activo'] = 0;
        $instancia->actualizar();
        $Manager->creditos += $RostersJ->precio_compra_jugador;
    }
    
    unset($_POST);
    $_POST['TIPO']='Manager';
    $_POST['id']=$Manager->id;
    $_POST['creditos']= $Manager->creditos;
    $instancia->actualizar();
    
} else {


    if($ID_Equipo != -1){//Agregar Equipo de Lanzadores


        $_POST['TIPO']='Equipo';
        $_POST['id']=$ID_Equipo;
        $Equipo = $instancia->obtener();
        unset($_POST);    

        $Manager->creditos -= $Equipo->precio;

        if($Manager->creditos >= 0){
            $_POST['TIPO']='Manager';
            $_POST['id']=$Manager->id;
            $_POST['creditos']= $Manager->creditos;
            $instancia->actualizar();
            unset($_POST);        

            $_POST['TIPO']='Roster_Equipo';
            $_POST['roster']=$ID_Roster;
            $_POST['equipo']=$Equipo->id;
            $_POST['fecha_compra_equipo'] = date("d/m/Y H:i:s");
            $_POST['precio_compra_equipo'] = $Equipo->precio;
            $_POST['equipo_activo'] = true;
            $instancia->insertar();   
        }
    }

    if($ID_Jugador != -1){//Agregar Jugador


        $_POST['TIPO']='Jugador';
        $_POST['id']  =$ID_Jugador;
        $Jugador = $instancia->obtener();
        unset($_POST);

        $Manager->creditos -= $Jugador->precio;

        if($Manager->creditos >= 0){
            $_POST['TIPO']='Manager';
            $_POST['id']=$Manager->id;
            $_POST['creditos']= $Manager->creditos;
            $instancia->actualizar();
            unset($_POST);  

            $_POST['TIPO']='Roster_Jugador';
            $_POST['roster']=$ID_Roster;
            $_POST['jugador']=$Jugador->id;
            $_POST['fecha_compra_jugador'] = date("d/m/Y H:i:s");
            $_POST['precio_compra_jugador'] = $Jugador->precio;
            $_POST['jugador_activo'] = true;
            $_POST['posicion_jugador'] = $POSICION;
            $instancia->insertar();
            unset($_POST);

        }
    }
    
}


?>

<form action="InterfaceRoster.php" method="post" name="MyForm">
    <input type="hidden" name="id" value="<?php echo $ID_Roster; ?>" />
</form>

<script type="text/javascript" language="JavaScript">
    document.MyForm.submit();
</script>