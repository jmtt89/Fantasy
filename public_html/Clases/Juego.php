<?php

class Juego extends Clases{
    private $id; //Clave
    private $jornada; //Referencia a Calendario
    private $hits_local;
    private $hits_visitante;
    private $carreras_local;
    private $carreras_visitante;
    private $errores_local;
    private $errores_visitante;
    private $terminado;
    
    //Funcion Constructora de la clase
    public function __construct($datos){
            $this->jornada             =(isset($datos['jornada']))            ? $datos['jornada']            : -1;
            $this->hits_local          =(isset($datos['hits_local']))         ? $datos['hits_local']         : -1;
            $this->hits_visitante      =(isset($datos['hits_visitante']))     ? $datos['hits_visitante']     : -1;
            $this->carreras_local      =(isset($datos['carreras_local']))     ? $datos['carreras_local']     : -1;
            $this->carreras_visitante  =(isset($datos['carreras_visitante'])) ? $datos['carreras_visitante'] : -1;
            $this->errores_local       =(isset($datos['errores_local']))      ? $datos['errores_local']      : -1;
            $this->errores_visitante   =(isset($datos['errores_visitante']))  ? $datos['errores_visitante']  : -1;            
            $this->terminado           =(isset($datos['terminado']))          ? $datos['terminado']          : -1;
            $this->id                  =(isset($datos['id']))                 ? $datos['id']                 : -1;
    }

    public function reload($datos){
            $this->jornada             =(isset($datos['jornada']))            ? $datos['jornada']            : $this->jornada;
            $this->hits_local          =(isset($datos['hits_local']))         ? $datos['hits_local']         : $this->hits_local;
            $this->hits_visitante      =(isset($datos['hits_visitante']))     ? $datos['hits_visitante']     : $this->hits_visitante;
            $this->carreras_local      =(isset($datos['carreras_local']))     ? $datos['carreras_local']     : $this->carreras_local;
            $this->carreras_visitante  =(isset($datos['carreras_visitante'])) ? $datos['carreras_visitante'] : $this->carreras_visitante;
            $this->errores_local       =(isset($datos['errores_local']))      ? $datos['errores_local']      : $this->errores_local;
            $this->errores_visitante   =(isset($datos['errores_visitante']))  ? $datos['errores_visitante']  : $this->errores_visitante;            
            $this->terminado           =(isset($datos['terminado']))          ? $datos['terminado']          : $this->terminado;
            $this->id                  =(isset($datos['id']))                 ? $datos['id']                 : $this->id;
                
    }

    public function get(){
        return get_object_vars($this);
    }    

    //php provee esas funciones para realizar todos los gets y sets
    public function __get($name){
        return $this->$name;  
    }

    public function __set($name, $value) {
        $this->$name=$value;
    }    
    
}

?>
