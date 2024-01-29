<?php 
class PaquetesTuristicos{
    private $fechaDesde;
    private $cantidadDias;
    private $objDestino;
    private $cantidadTotalPlaza;
    private $cantidadDispPlaza;

    public function __construct($fechaDesde, $cantidadDias, $objDestino, $cantidadTotalPlaza){
        $this->fechaDesde = $fechaDesde;
        $this->cantidadDias = $cantidadDias;
        $this->objDestino = $objDestino;
        $this->cantidadTotalPlaza = $cantidadTotalPlaza;
    }

    public function getFechaDesde(){
        return $this->fechaDesde;
    }
    public function getCantidadDias(){
        return $this->cantidadDias;
    }
    public function getobjDestino(){
        return $this->objDestino;
    }
    public function getCantidadTotalPlaza(){
        return $this->cantidadTotalPlaza;
    }
    public function getCantidadDispPlaza(){
        return $this->cantidadDispPlaza;
    }

    public function setFechaDesde($fechaDesde){
        $this->fechaDesde = $fechaDesde;
    }
    public function setCantidadDias($cantidadDias){
        $this->cantidadDias = $cantidadDias;
    }
    public function setObjDestino($objDestino){
        $this->objDestino = $objDestino;
    }
    public function setCantidadTotalPlaza($cantidadTotalPlaza){
        $this->cantidadTotalPlaza = $cantidadTotalPlaza;
    }
    public function setCantidadDispPlaza($cantidadDispPlaza){
        $this->cantidadDispPlaza = $cantidadDispPlaza;
    }

    public function __toString()
    {
        return "Fecha desde: ". $this->getFechaDesde(). "\n". 
               "Cantidad de dias: ". $this->getCantidadDias(). "\n". 
               "Destino: \n". $this->getobjDestino(). "\n". 
               "Cantidad de plazas: ". $this->getCantidadTotalPlaza(). "\n";
    }
}