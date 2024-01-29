<?php 
class Obra extends Actividad{

    public function __construct($nombre, $horarioInicio, $duracion, $precio){
        parent::__construct($nombre, $horarioInicio, $duracion, $precio);
    }

    public function __toString(){
        return parent::__toString();
    }
}