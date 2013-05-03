<?php

class Participa extends Clases {
    private $id;    //Clave
    private $liga;  //Foranea a Liga
    private $roster;//Foranea a Roster
    
    //Funcion Constructora de la clase
    public function __construct($datos){
            $this->liga    =(isset($datos['liga'])) ? $datos['liga']     : -1;
            $this->roster  =(isset($datos['roster'])) ? $datos['roster'] : -1;
            $this->id      =(isset($datos['id'])) ? $datos['id']         : -1;
    }

    public function reload($datos){
            $this->liga    =(isset($datos['liga'])) ? $datos['liga']     : $this->liga;
            $this->roster  =(isset($datos['roster'])) ? $datos['roster'] : $this->roster;
            $this->id      =(isset($datos['id'])) ? $datos['id']         : $this->id;
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
