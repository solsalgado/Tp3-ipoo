<?php 
class Cuenta{
    private $numCuenta;
    private $objCliente;
    private $saldo;

    public function __construct($numCuenta, $objCliente, $saldo){
        $this->numCuenta = $numCuenta;
        $this->objCliente = $objCliente;
        $this->saldo = $saldo;

    }

    public function getNumCuenta(){
        return $this->numCuenta;
    }
    public function getObjCliente(){
        return $this->objCliente;
    }
    public function getSaldo(){
        return $this->saldo;
    }

    public function setNumCuenta($numCuenta){
        $this->numCuenta = $numCuenta;
    }
    public function setObjCliente($objCliente){
        $this->objCliente = $objCliente;
    }
    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }

    public function __toString(){
        return "Número de cuenta: ". $this->getNumCuenta(). "\n".
               "Cliente: ". $this->getObjCliente(). 
               "Saldo : ". $this->getSaldo(). "\n";

    }

    public function saldoCuenta(){
        $saldo = $this->getSaldo();
        return $saldo;
    }

    public function realizarDeposito($monto){
        $saldo = $this->getSaldo();
        $deposito = ($saldo + $monto);
        $this->setSaldo($deposito);
    }

    public function realizarRetiro($monto){
        $saldo = $this->getSaldo();
        if($saldo > 0){
            $retiro = ($saldo - $monto);
            $this->setSaldo($retiro);  
        }

    }
}