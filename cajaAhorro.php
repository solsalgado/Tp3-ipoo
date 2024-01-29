<?php 
class CajaAhorro extends Cuenta{

    public function __construct($numCuenta, $objCliente, $saldo){
        parent::__construct($numCuenta, $objCliente, $saldo);
    }
    public function __toString()
    {
        $retorno = parent::__toString(). "\n";
        return $retorno;
    }
}