<?php 
class Destinos{
    private $identificacion;
    private $nombreLugar;
    private $valorDiaPasajero;

    public function __construct($identificacion, $nombreLugar, $valorDiaPasajero){
        $this->identificacion = $identificacion;
        $this->nombreLugar = $nombreLugar;
        $this->valorDiaPasajero = $valorDiaPasajero;
    }

    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function getNombreLugar(){
        return $this->nombreLugar;
    }
    public function getValorDiaPasajero(){
        return $this->valorDiaPasajero;
    }

    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }
    public function setNombreLugar($nombreLugar){
        $this->nombreLugar = $nombreLugar;
    }
    public function setValorDiaPasajero($valorDiaPasajero){
        $this->valorDiaPasajero = $valorDiaPasajero;
    }

    public function __toString(){
        return "ID: ". $this->getIdentificacion(). "\n". 
               "Nombre: ". $this->getNombreLugar(). "\n". 
               "Valor por dia: ". $this->getValorDiaPasajero(). "\n";
    }
}