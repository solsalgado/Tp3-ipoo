<?php 
class Actividad{
    private $nombre;
    private $horarioInicio;
    private $duracion;
    private $precio;

    public function __construct($nombre, $horarioInicio, $duracion, $precio){
        $this->nombre = $nombre;
        $this->horarioInicio = $horarioInicio;
        $this->duracion = $duracion;
        $this->precio = $precio;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getHorarioInicio(){
        return $this->horarioInicio;
    }
    public function getDuracion(){
        return $this->duracion;
    }
    public function getPrecio(){
        return $this->precio;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setHorarioInicio($horarioInicio){
        $this->horarioInicio = $horarioInicio;
    }
    public function setDuracion($duracion){
        $this->duracion = $duracion;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function __toString()
    {
        return "Nombre de la funcion: ". $this->getNombre(). "\n". 
               "Horario de inicio: ". $this->getHorarioInicio(). "\n". 
               "Duracion: ". $this->getDuracion(). "\n". 
               "Precio: ". $this->getPrecio(). "\n";
    }
}