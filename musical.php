<?php 
class Musical extends Actividad{
    private $director;
    private $cantPersonas;

    public function __construct($director, $cantPersonas, $nombre, $horarioInicio, $duracion, $precio){
        parent::__construct($nombre, $horarioInicio, $duracion, $precio);
        $this->director = $director;
        $this->cantPersonas = $cantPersonas;
    }

    public function getDirector(){
        return $this->director;
    }
    public function getCantPersonas(){
        return $this->cantPersonas;
    }

    public function setDirector($director){
        $this->director = $director;
    }
    public function setCantPersonas($cantPersonas){
        $this->cantPersonas = $cantPersonas;
    }

    public function __toString(){
        $retorno = parent::__toString();
        $retorno .= "Director: ". $this->getDirector(). "\n". 
                    "Cantidad de personas en escena: ". $this->getCantPersonas();
        return $retorno;
    }
}