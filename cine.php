<?php 
class Cine extends Actividad{
    private $genero;
    private $paisOrigen;

    public function __construct($genero, $paisOrigen, $nombre, $horarioInicio, $duracion, $precio){
        parent::__construct($nombre, $horarioInicio, $duracion, $precio);
        $this->genero = $genero;
        $this->paisOrigen = $paisOrigen;
    }

    public function getGenero(){
        return $this->genero;
    }
    public function getPaisOrigen(){
        return $this->paisOrigen;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }
    public function setPaisOrigen($paisOrigen){
        $this->paisOrigen = $paisOrigen;
    }

    public function __toString(){
        $retorno = parent::__toString();
        $retorno = $retorno. "Género: ". $this->getGenero(). "\n". 
                   "Pais de origen: ". $this->getPaisOrigen(). "\n";
        return $retorno;
    }
}