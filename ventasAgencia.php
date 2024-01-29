<?php 
class VentasAgencia{
    private $fecha;
    private $objPaquetes;
    private $cantPersonas;
    private $objCliente;

    public function __construct($fecha, $objPaquetes, $cantPersonas, $objCliente){
        $this->fecha = $fecha;
        $this->objPaquetes = $objPaquetes;
        $this->cantPersonas = $cantPersonas;
        $this->objCliente = $objCliente;
    } 

    public function getFecha(){
        return $this-> fecha;
    }
    public function getObjPaquetes(){
        return $this-> objPaquetes;
    }
    public function getCantPersonas(){
        return $this->cantPersonas;
    }
    public function getObjCliente(){
        return $this-> objCliente;
    }

    public function setFecha($fecha){
        $this-> fecha = $fecha;
    }
    public function setObjPaquetes($objPaquetes){
        $this-> objPaquetes = $objPaquetes;
    }
    public function setCantPersonas($cantPersonas){
        $this->cantPersonas = $cantPersonas;
    }
    public function setObjCliente($objCliente){
        $this-> objCliente = $objCliente;
    }

    public function __toString(){
        return "Fecha: ". $this->getFecha(). "\n". 
               "Paquetes turisticos: \n". $this->getObjPaquetes(). "\n". 
               "Cantidad de personas: ". $this->getCantPersonas(). "\n".
               "Cliente: \n". $this->getObjCliente();
    }

    public function darImporteVenta(){
        $paqueteT = $this->getObjPaquetes();
        $cantDias = $paqueteT->getCantidadDias();
        $destino = $paqueteT->getobjDestino();
        $importeDia = $destino->getValorDiaPasajero(); 
        $cantidadPersonas = $this->getCantPersonas();
        $total = ($cantDias * $importeDia * $cantidadPersonas);
        return $total;
    }
}