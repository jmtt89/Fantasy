<?php

class Liga extends Clases{
    private $id; //Clave
    private $nombre;
    private $usuario;//Foranea a Usuario
//    private $perfil_usuario; //Foranea a Perfil_Usuario
    private $es_publica; //True si la Liga es Publica
    
    //Funcion Constructora de la clase
    public function __construct($datos){
            $this->nombre      =(isset($datos['nombre'])) ? $datos['nombre']         : -1;
            $this->usuario     =(isset($datos['usuario'])) ? $datos['usuario']       : -1;
            $this->es_publica  =(isset($datos['es_publica'])) ? $datos['es_publica'] : -1;
            $this->id          =(isset($datos['id'])) ? $datos['id']                 : -1;
    }

    public function reload($datos){
            $this->nombre          =(isset($datos['nombre'])) ? $datos['nombre']         : $this->nombre;
            $this->usuario         =(isset($datos['usuario'])) ? $datos['usuario']       : $this->usuario;
            $this->es_publica      =(isset($datos['es_publica'])) ? $datos['es_publica'] : $this->es_publica;
            $this->id              =(isset($datos['id'])) ? $datos['id']                 : $this->id;
                
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
