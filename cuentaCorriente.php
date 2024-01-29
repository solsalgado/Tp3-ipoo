<?php 
class CuentaCorriente extends Cuenta{
    private $montoMaximo;

    public function __construct($montoMaximo,$numCuenta , $objCliente, $saldo){
        parent::__construct($numCuenta, $objCliente, $saldo);
        $this->montoMaximo = $montoMaximo;
    }

    public function getMontoMaximo(){
        return $this->montoMaximo;
    }

    public function setMontoMaximo($montoMaximo){
        $this->montoMaximo = $montoMaximo;
    }

    public function __toString(){
        $retorno = parent::__toString();
        $retorno.= "Monto máximo: ". $this->getMontoMaximo(). "\n";
        return $retorno;
    }
}