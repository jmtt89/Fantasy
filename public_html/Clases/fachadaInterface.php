<?php

require_once 'Jugador.php';
require_once 'Equipo.php';
require_once 'Estadio.php';
require_once 'Roster.php';
require_once 'Roster_Equipo.php';
require_once 'Roster_Jugador.php';
require_once 'Estadistica_Pitcheo.php';
require_once 'Estadistica_Bateo.php';
require_once 'Usuario.php';
require_once 'Manager.php';
require_once 'Perfil_Usuario.php';

//Cosas que le tocan a Ñangara
require_once 'Contenidos.php';
require_once 'Liga.php';
require_once 'Participa.php';
require_once 'Calendario.php';
require_once 'Juego.php';

class fachadaInterface {
    
    private static $instancia;
    
    private function __construct(){}
    
    public static function singleton(){
        if (!isset(self::$instancia))
            self::$instancia = new fachadaInterface();
        return self::$instancia;
    }
    
    public function insertar(){
        switch ($_POST['TIPO']):
            case "Jugador":
                $obj = new Jugador($_POST);
                break;
            case "Equipo":
                $obj = new Equipo($_POST);
                break;
            case "Estadio":
                $obj = new Estadio($_POST);
                break;          
            case "Roster":
                $obj = new Roster($_POST);
                break;
            case "Roster_Jugador":
                $obj = new Roster_Jugador($_POST);
                break;
            case "Roster_Equipo":
                $obj = new Roster_Equipo($_POST);
                break;
            case "Usuario":
                $obj = new Usuario($_POST);
                break;
            case "Manager":
                $obj = new Manager($_POST);
                break;
            case "Perfil_Usuario":
                    $obj = new Perfil_Usuario($_POST);
                break;
//Ñangara            
            case "Contenidos":
                $obj = new Contenidos($_POST);
                break;
            case "Liga":
                $obj = new Liga($_POST);
                break; 				
            case "Participa":
                $obj = new Participa($_POST);
                break;
            case "Calendario":
                $obj = new Calendario($_POST);
                break;
            case "Juego":
                $obj = new Juego($_POST);
                break;      
        endswitch;
        
        $obj->insertar();
    }
    
    //De Toda la Gestion de Estadisticas se encarga el Jugador
    public function G_Estadistica(Jugador $Jugador){
        $Jugador->G_Estadistica($_POST);
    }
    
    public function actualizar(){
        switch ($_POST['TIPO']):
            case "Jugador":
                $obj = new Jugador($_POST);
                break;
            case "Equipo":
                $obj = new Equipo($_POST);
                break;
            case "Estadio":
                $obj = new Estadio($_POST);
                break;    
            case "Perfil_Usuario":
                $obj = new Perfil_Usuario($_POST);
                break;
            case "Usuario":
                $obj = new Usuario($_POST);
                break;
            case "Manager":
                $obj = new Manager($_POST);
                break;
            case "Roster":
                $obj = new Roster($_POST);
                break;
            case "Roster_Jugador":
                $obj = new Roster_Jugador($_POST);
                break;            
            case "Roster_Equipo":
                $obj = new Roster_Equipo($_POST);
                break;                        
//Ñangara            
            case "Contenidos":
                $obj = new Contenidos($_POST);
                break;
            case "Liga":
                $obj = new Liga($_POST);
                break; 				
            case "Participa":
                $obj = new Participa($_POST);
                break;
            case "Calendario":
                $obj = new Calendario($_POST);
                break;
            case "Juego":
                $obj = new Juego($_POST);
                break;      
        endswitch;
        
        $obj->actualizar();
    }
    
    public function eliminar(){
        switch ($_POST['TIPO']):
            case "Jugador":
                $obj = new Jugador($_POST);
                break;
            case "Equipo":
                $obj = new Equipo($_POST);
                break;
            case "Estadio":
                $obj = new Estadio($_POST);
                break;
            case "Perfil_Usuario":
                $obj = new Perfil_Usuario($_POST);
                break;
            case "Usuario":
                $obj = new Usuario($_POST);
                break;              
            case "Roster":
                $obj = new Roster($_POST);
                break;
            case "Roster_Jugador":
                $obj = new Roster_Jugador($_POST);
                break;            
            case "Roster_Equipo":
                $obj = new Roster_Equipo($_POST);
                break; 
            case "Manager":
                $obj = new Manager($_POST);
                break;      
//Ñangara            
            case "Contenidos":
                $obj = new Contenidos($_POST);
                break;
            case "Liga":
                $obj = new Liga($_POST);
                break; 				
            case "Participa":
                $obj = new Participa($_POST);
                break;
            case "Calendario":
                $obj = new Calendario($_POST);
                break;
            case "Juego":
                $obj = new Juego($_POST);
                break;      
        endswitch;
        $obj->eliminar();
    }
    
    public function obtener(){
        switch ($_POST['TIPO']):
            case "Jugador":
                $obj = new Jugador($_POST);
                break;
            case "Equipo":
                $obj = new Equipo($_POST);
                break;
            case "Estadio":
                $obj = new Estadio($_POST);
                break;
            case "Perfil_Usuario":
                $obj = new Perfil_Usuario($_POST);
                break;
            case "Usuario":
                $obj = new Usuario($_POST);
                break;
            case "Manager":
                $obj = new Manager($_POST);
                break;              
            case "Roster":
                $obj = new Roster($_POST);
                break;
            case "Roster_Jugador":
                $obj = new Roster_Jugador($_POST);
                break;            
            case "Roster_Equipo":
                $obj = new Roster_Equipo($_POST);
                break;                     
//Ñangara            
            case "Contenidos":
                $obj = new Contenidos($_POST);
                break;
            case "Liga":
                $obj = new Liga($_POST);
                break; 				
            case "Participa":
                $obj = new Participa($_POST);
                break;
            case "Calendario":
                $obj = new Calendario($_POST);
                break;
            case "Juego":
                $obj = new Juego($_POST);
                break;      
        endswitch;       
        $obj->obtener();
        return $obj;
    }
    
    public function obtenerTodos(){
        switch ($_POST['TIPO']):
            case "Jugador":
                $obj = new Jugador($_POST);
                break;
            case "Equipo":
                $obj = new Equipo($_POST);
                break;
            case "Estadio":
                $obj = new Estadio($_POST);
                break;
            case "Usuario":
                $obj = new Usuario($_POST);
                break;
            case "Manager":
                $obj = new Manager($_POST);
                break;                       
            case "Roster":
                $obj = new Roster($_POST);
                break;
            case "Roster_Jugador":
                $obj = new Roster_Jugador($_POST);
                break;            
            case "Roster_Equipo":
                $obj = new Roster_Equipo($_POST);
                break;
//Ñangara            
            case "Contenidos":
                $obj = new Contenidos($_POST);
                break;
            case "Liga":
                $obj = new Liga($_POST);
                break; 				
            case "Participa":
                $obj = new Participa($_POST);
                break;
            case "Calendario":
                $obj = new Calendario($_POST);
                break;
            case "Juego":
                $obj = new Juego($_POST);
                break;      
        endswitch;
        $arr = $obj->obtenerTodos();
        return $arr;
    }
    
    public function consultarEstadisticas($obj){
        $Res= array();
        unset($_POST);
        switch (get_class($obj)):
            case "Jugador":
                
                $Res = $obj->obtenerSUMEstadisticas();
                break;
                
            case "Equipo":
                $_POST['TIPO']='Jugador';
                $_POST['equipo']=$obj->id;
                $Jugadores = $this->obtenerTodos();
                
                $i=0;
                $j=0;
                foreach ($Jugadores as $Jugador){
                    if($Jugador->posicion=='P'){
                        $TmpP[$i] = $this->consultarEstadisticas($Jugador);
                        $i++;
                    }else{
                        $TmpB[$j] = $this->consultarEstadisticas($Jugador);
                        $j++;
                    }
                }
                
                $i=0;
                for($i=0;$i<count($TmpP);$i++)
                    foreach ($TmpP[$i] as $key => $value) {
                        if(is_int($value))
                            if(isset($Res[0][$key]))
                                $Res[0][$key]+=$value;
                            else
                                $Res[0][$key]=$value;
                    }
                $i=0;
                for($i=0;$i<count($TmpB);$i++)
                    foreach ($TmpB[$i] as $key => $value) {
                        if(is_int($value))
                            if(isset($Res[1][$key]))
                                $Res[1][$key]+=$value;
                            else
                                $Res[1][$key]=$value;
                    }
                
                break;
        endswitch;
        
        return $Res;
        
        
    }
   
    public function login(){
        session_start();
        if (!isset($_SESSION['Administrador']) && !isset($_SESSION['Manager'])){
            $res = $this->obtener();
            if ($res->id != -1) {
                $_SESSION['Usuario']=$res->id;
                unset($_POST);
                $_POST['TIPO'] = "Manager";
                $_POST['usuario'] = $res->id;
                $res = $this->obtener();
                
                if ($res->id == -1) {
                    $_SESSION['Administrador'] = $res->usuario;
                } else {
                    $_SESSION['Manager'] = $res->id;
                }
            }
        }
    }
    
    public function consultarEstadisticasDetalladas(Jugador $Jugador){
        return $Jugador->obtenerTodasEstadisticas();
    }    
    
    public function obtenerEstadistica(Jugador $Jugador){
        return $Jugador->obtenerEstadistica($_POST);
    }
    
    //Funciones de Ñangara
    public function obtenerLigasPublicas(){
        unset($_POST);
        $_POST['TIPO']= 'Liga';
        $_POST['es_publica'] = true;
        $obj = new Liga($_POST);
        $Ligas = $obj->obtenerTodos();
        
        if($_SESSION['Manager'])
            $LigasI = $this->obtenerLigasDeRoster();
        
        for($i=0;$i<count($LigasI);$i++){
            for($j=0;$j<count($Ligas);$j++){
                if($LigasI[$i]->id == $Ligas[$j]->id)
                    unset($Ligas[$j]);
                    break;
            }
        }
        
        return $Ligas;
    }
    
    public function obtenerLigasPrivadas(){
        unset($_POST);
        $_POST['TIPO']= 'Liga';
        $_POST['es_publica'] = 0;
        $obj = new Liga($_POST);
        return $obj->obtenerTodos();
    }
    
    public function obtenerLigasDeManager(){
        unset($_POST);
        $_POST['TIPO']='Liga';
        $_POST['usuario']= $_SESSION['Usuario'];
        return $this->obtenerTodos();
    }

    public function obtenerLigasDeRoster(){
        unset($_POST);
        $_POST['TIPO']='Roster';
        $_POST['manager'] = $_SESSION['Manager'];
        $Roster = $this->obtener();
        //Obtengo Las Ligas en las Que participa ese roster
        $_POST['TIPO'] = 'Participa';
        $_POST['roster']=$Roster->id;
        $Participa = $this->obtenerTodos();

        $LigasP = array();
        $i=0;
        foreach($Participa as $P_L){
            $_POST['TIPO']='Liga';
            $_POST['id'] = $P_L->liga;
            $LigasP[$i] = $this->obtener();
            $i++;
        }//LigasP Ligas en las que Participa el Roster
        
        return $LigasP;
    }
    
    function cmp(Manager $a,Manager $b) {
        if ($a->puntaje == $b->puntaje)
            return 0;
        
        return ($a->puntaje < $b->puntaje) ? 1 : -1;
    }
    
    public function ObtenerPuntosJugadores(Liga $Liga){
        unset($_POST);
        $_POST['TIPO']='Participa';
        $_POST['liga']=$Liga->id;
        $Participantes = $this->obtenerTodos();
        
        $Managers = array();
        $i=0;
        foreach($Participantes as $Participante){
            $_POST['TIPO']='Roster';
            $_POST['id']=$Participante->roster;
            $_POST['id'] = $this->obtener()->manager ;
            $_POST['TIPO']='Manager';
            $Managers[$i] = $this->obtener();
            $i++;
        }
        
        //Ordenar Segun Puntaje
        usort($Managers, array('fachadaInterface','cmp'));
        
        return $Managers;
    }
    
    public function ObtenerPosicionRoster(Liga $Liga){
        unset($_POST);
        $_POST['TIPO']='Participa';
        $_POST['liga']=$Liga->id;
        $Participantes = $this->obtenerTodos();
        
        $Managers = array();
        $i=0;
        foreach($Participantes as $Participante){
            $_POST['TIPO']='Roster';
            $_POST['id']=$Participante->roster;
            $_POST['id'] = $this->obtener()->manager ;
            $_POST['TIPO']='Manager';
            $Managers[$i] = $this->obtener();
            $i++;
        }
        
        usort($Managers, array('fachadaInterface','cmp'));
        
        foreach($Managers as $key => $value)
            if($value->id == $_SESSION['Manager'])
                return $key;
            
        return -1;
    }
    
    public function PerteneceRoster(Liga $Liga){
        unset($_POST);
        $_POST['TIPO']='Participa';
        $_POST['liga']=$Liga->id;
        $Participantes = $this->obtenerTodos();
        unset($_POST);
        $_POST['TIPO'] = 'Roster';
        $_POST['manager']=$_SESSION['Manager'];
        $Roster = $this->obtener();
        
        foreach($Participantes as $Participante){
            if($Participante->roster == $Roster->id)
                return true;
        }
            
        return false;
    }    
    
    public function ObtenerJugadorUno(Liga $Liga){
        unset($_POST);
        $_POST['TIPO']='Participa';
        $_POST['liga']=$Liga->id;
        $Participantes = $this->obtenerTodos();
        
        $Manager = null;
        foreach($Participantes as $Participante){
            $_POST['TIPO']='Roster';
            $_POST['id']=$Participante->roster;
            $_POST['id'] = $this->obtener()->manager ;
            $_POST['TIPO']='Manager';
            $Tmp = $this->obtener();
            if($Manager != null){
                if($Manager->puntaje < $Tmp->puntaje)
                    $Manager = $Tmp;
            }else
                $Manager = $Tmp;
            
        }
        
        
        return $Manager;
    }
    
    
    public function obtenerCalendariodeFecha(){
        //por $_Post deberia entrar Anio y Mes y dia
        
        $dia = isset($_POST['dia'])  ? $_POST['dia']  : -1;
        $mes = isset($_POST['mes'])  ? $_POST['mes']  : -1;
        $anio= isset($_POST['anio']) ? $_POST['anio'] : -1; 
        
        $_POST['TIPO'] = 'Calendario';
        $Calendarios = $this->obtenerTodos();
        
        $Res = array();
        $i=0;
        foreach($Calendarios as $Calendario){
            $Aux = explode(" ", $Calendario->fecha); //Año-Mes-Dia Hora:Minutos:Segundos TimeZone
            $Aux2 = explode("-", $Aux[0]); //Año-Mes-Dia
            
            $c1 = ($dia > -1)  ? $Aux2[2] == $dia  : true ;
            $c2 = ($mes > -1)  ? $Aux2[1] == $mes  : true ;
            $c3 = ($anio > -1) ? $Aux2[0] == $anio : true ;
            
            if(  $c1 && $c2 && $c3 ){
                $Res[$i] = $Calendario;
                $i++;
            }
        
        }
        
        return $Res;
        
    }
    
}

?>
