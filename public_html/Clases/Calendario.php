<?php

class Calendario extends Clases {
    private $id; //Clave
    private $fecha;
    private $local;      //Foranea a Equipo
    private $visitante; //Foranea a Equipo
    private $estadio;   //Foranea a Estadio
    
    //Funcion Constructora de la clase
    public function __construct($datos){
            $this->fecha      =(isset($datos['fecha'])) ? $datos['fecha']         : -1;
            $this->local       =(isset($datos['local'])) ? $datos['local']           : -1;
            $this->visitante  =(isset($datos['visitante'])) ? $datos['visitante'] : -1;
            $this->estadio    =(isset($datos['estadio'])) ? $datos['estadio']     : -1;
            $this->id         =(isset($datos['id'])) ? $datos['id']               : -1;
    }

    public function reload($datos){
            $this->fecha      =(isset($datos['fecha'])) ? $datos['fecha']         : $this->fecha;
            $this->local       =(isset($datos['local'])) ? $datos['local']           : $this->local;
            $this->visitante  =(isset($datos['visitante'])) ? $datos['visitante'] : $this->visitante;
            $this->estadio    =(isset($datos['estadio'])) ? $datos['estadio']     : $this->estadio;
            $this->id         =(isset($datos['id'])) ? $datos['id']               : $this->id;
                
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
