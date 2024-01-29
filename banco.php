<?php
class Banco{
    private $arrayCuentaCorriente = [];
    private $arrayCajaAhorro = [];
    private $ultimoValorCuentaAsignado;
    private $arrayCliente = [];

    public function __construct($arrayCuentaCorriente, $arrayCajaAhorro, $ultimoValorCuentaAsignado, $arrayCliente){
        $this->arrayCuentaCorriente = $arrayCuentaCorriente;
        $this->arrayCajaAhorro = $arrayCajaAhorro;
        $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
        $this->arrayCliente = $arrayCliente;
    }

    public function getArrayCuentaCorriente(){
        return $this->arrayCuentaCorriente;
    }
    public function getArrayCajaAhorro(){
        return $this->arrayCajaAhorro;
    }
    public function getUltimoValorCuentaAsignado(){
        return $this->ultimoValorCuentaAsignado;
    }
    public function getArrayCliente(){
        return $this->arrayCliente;
    }

    public function setArrayCuentaCorriente($arrayCuentaCorriente){
        $this->arrayCuentaCorriente = $arrayCuentaCorriente;
    }
    public function setArrayCajaAhorro($arrayCajaAhorro){
        $this->arrayCajaAhorro = $arrayCajaAhorro;
    }
    public function setUltimoValorCuentaAsignado($ultimoValorCuentaAsignado){
        $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
    }
    public function setArrayCliente($arrayCliente){
        $this->arrayCliente = $arrayCliente;
    }

    public function __toString(){
        return "Cuentas corrientes: \n". $this->mostrarCuentasCorrientes(). "\n". 
               "Cajas de ahorro: \n". $this->mostrarCajasAhorro(). "\n". 
               "Ultimo valor de cuenta asignado: ". $this->getUltimoValorCuentaAsignado(). "\n". 
               "Clientes: \n". $this->mostrarClientes(). "\n";

    }

    public function mostrarCuentasCorrientes(){
        $cuentaCorriente = $this->getArrayCuentaCorriente();
        $count = count($cuentaCorriente);
        $texto = "";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $cuentaCorriente[$i];
        }
        return $texto;
    }

    public function mostrarCajasAhorro(){
        $cajaAhorro = $this->getArrayCajaAhorro();
        $count = count($cajaAhorro);
        $texto = "";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $cajaAhorro[$i];
        }
        return $texto;
    }

    public function mostrarClientes(){
        $clientes = $this->getArrayCliente();
        $count = count($clientes);
        $texto = "";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $clientes[$i];
        }
        return $texto;
    }

    public function incorporarCliente($objCliente){
        $clientes = $this->getArrayCliente();
        array_push($clientes, $objCliente);
        $this->setArrayCliente($clientes);
    }

    public function incorporarCuentaCorriente($numCliente, $montoDescubierto){
        $clientes = $this->getArrayCliente();
        $count = count($clientes);
        $i = 0;
        $existe = false;
        while($i <  $count && $existe == false){
            $nCliente = $clientes[$i]->getNroCliente();
            if($nCliente == $numCliente){
                $existe = true;
                $cuentaC = $this->getArrayCuentaCorriente();
                array_push($cuentaC, $montoDescubierto);
                $this->setArrayCuentaCorriente($cuentaC);
            }
            $i++;
        }
    }

    public function incorporarCajaAhorro($numCliente){
        $clientes = $this->getArrayCliente();
        $count = count($clientes);
        $i = 0;
        $existe = false;
        while($i <  $count && $existe == false){
            $nCliente = $clientes[$i]->getNroCliente();
            if($nCliente == $numCliente){
                $existe = true;
                $cajaAhorro = $this->getArrayCajaAhorro();
                array_push($cajaAhorro);
                $this->setArrayCajaAhorro($cajaAhorro);
            }
            $i++;
        }
    }

    public function realizarDeposito($numCuenta, $monto){
        $cajaAhorro = $this->getArrayCajaAhorro();
        $count = count($cajaAhorro);
        $i = 0;
        $existe = false;
        while($i < $count && $existe == false){
            $nCuenta = $cajaAhorro[$i]->getNumCuenta();
            if($nCuenta == $numCuenta){
                $existe = true;
                $saldo = $cajaAhorro[$i]->getSaldo();
                $deposito = ($saldo + $monto);
                $cajaAhorro[$i]->setSaldo($deposito);
            }
            $i++;
        }
    }

    public function realizarRetiro($numCuenta, $monto){
        $cajaAhorro = $this->getArrayCajaAhorro();
        $count = count($cajaAhorro);
        $i = 0;
        $existe = false;
        while($i < $count && $existe == false){
            $nCuenta = $cajaAhorro[$i]->getNumCuenta();
            if($nCuenta == $numCuenta){
                $saldo = $cajaAhorro[$i]->getSaldo();
                if($saldo > 0){
                    $existe = true;
                    $retiro = ($saldo - $monto);
                    $cajaAhorro[$i]->setSaldo($retiro);
                }
            }
            $i++;
        }
    }

    public function transferir($nCuenta, $nCuentaTransferir, $monto){
        $cuentaCorriente = $this->getArrayCuentaCorriente();
        $count = count($cuentaCorriente);
        $i = 0;
        $existe = false;
        while($i < $count && $existe == false){
            $cuentaC = $cuentaCorriente[$i]->getNumCuenta();
            if($cuentaC == $nCuenta){
                $existe = true;
                $cajaAhorro = $this->getArrayCajaAhorro();
                $count2 = count($cajaAhorro);
                $j = 0;
                $existe2 = false;
                while($j < $count2 && $existe2 == false){
                    $cuentaA = $cajaAhorro[$j]->getNumCuenta();
                    if($cuentaA == $nCuentaTransferir){
                        $existe2 = true;
                        $saldoC = $cuentaCorriente[$i]->getSaldo();
                        $saldoA = $cajaAhorro[$j]->getSaldo();

                        $resta = ($saldoC - $monto);
                        $suma = ($saldoA + $monto);

                        $cuentaCorriente[$i]->setSaldo($resta);
                        $cajaAhorro[$j]->setSaldo($suma);
                    }
                    $j++;
                }
            }
            $i++;
        }
    }
}