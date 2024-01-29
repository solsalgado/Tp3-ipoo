<?php 
class AgenciaViajes{
    private $infoDestinos = [];
    private $paquetesTuristicos = [];
    private $ventasAgencia = [];
    private $ventasOnline = [];

    public function __construct($infoDestinos, $paquetesTuristicos, $ventasAgencia, $ventasOnline){
        $this->infoDestinos = $infoDestinos;
        $this->paquetesTuristicos = $paquetesTuristicos;
        $this->ventasAgencia = $ventasAgencia;
        $this->ventasOnline = $ventasOnline;
    }

    public function getInfoDestino(){
        return $this->infoDestinos;
    }
    public function getPaquetesTuristicos(){
        return $this->paquetesTuristicos;
    }
    public function getVentasAgencia(){
        return $this->ventasAgencia;
    }
    public function getVentasOnline(){
        return $this->ventasOnline;
    }

    public function setInfoDestino($infoDestinos){
        $this->infoDestinos = $infoDestinos;
    }
    public function setPaquetesTuristicos($paquetesTuristicos){
        $this->paquetesTuristicos = $paquetesTuristicos;
    }
    public function setVentasAgencia($ventasAgencia){
        $this->ventasAgencia = $ventasAgencia;
    }
    public function setVentasOnline($ventasOnline){
        $this->ventasOnline = $ventasOnline;
    }

    public function __toString(){
        return "Informacion de destinos: \n". $this->mostrarInfoDestino(). "\n". 
               "Paquetes turisticos: \n". $this->mostrarPaquetes(). "\n". 
               "Ventas en agencia: \n". $this->mostrarVentasAgencia(). "\n". 
               "Ventas Online: \n". $this->mostrarVentasOnline(). "\n";
    }

    public function mostrarInfoDestino(){
        $destinos = $this->getInfoDestino();
        $count = count($destinos);
        $texto = "";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $destinos[$i];
        }
        return $texto;
    }
    public function mostrarPaquetes(){
        $paquetes = $this->getPaquetesTuristicos();
        $count = count($paquetes);
        $texto = "";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $paquetes[$i];
        }
        return $texto;
    }
    public function mostrarVentasOnline(){
        $arrayOnline = $this->getVentasOnline();
        $count = count($arrayOnline);
        $texto = "";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $arrayOnline[$i];
        }
        return $texto;
    }
    public function mostrarVentasAgencia(){
        $arrayAgencia = $this->getVentasAgencia();
        $count = count($arrayAgencia);
        $texto = "";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $arrayAgencia[$i];
        }
        return $texto;
    }

    public function incorporarPaquete($objPaqueteTuristico){
        $paquetesT = $this->getPaquetesTuristicos();
        $count = count($paquetesT);
        $i = 0;
        $existe = false;
        while($i < $count && $existe == false){
            $fecha = $paquetesT[$i]->getFechaDesde();
            $fechaN = $objPaqueteTuristico->getFechaDesde();
            $destino = $paquetesT[$i]->getobjDestino();
            $destinoN = $objPaqueteTuristico->getobjDestino();
            if($fecha == $fechaN && $destino == $destinoN){
                $existe = true;
            } else {
                array_push($paquetesT, $objPaqueteTuristico);
                $this->setPaquetesTuristicos($paquetesT);
            }
            $i++;
        }
        return $existe;
    }

    public function incorporarVenta($objPaquete, $tipoDoc, $numDoc, $cantPer, $esOnLine){
        $arrayOnline = $this->getVentasOnline();
        $arrayAgencia = $this->getVentasAgencia();
        $arrayVentas = array_merge($arrayOnline, $arrayAgencia);
        $count = count($arrayVentas);
        $i = 0;
        $existe = false;
        $importe = -1;
        while($i < $count && $existe == false){
            if($esOnLine == true){
                $existe = true;

                $arrayVentaNueva = [$objPaquete, $tipoDoc, $numDoc, $cantPer];
                array_push($arrayOnline, $arrayVentaNueva);
                $this->getVentasOnline($arrayOnline);
                $arrayOnline[$i]->setCantPersonas($cantPer);
                $importe = $arrayOnline[$i]->darImporteVenta();
            } else{
                $existe = true;

                $arrayVentaNueva = [$objPaquete, $tipoDoc, $numDoc, $cantPer];
                array_push($arrayAgencia, $arrayVentaNueva);
                $this->getVentasAgencia($arrayAgencia);
                $arrayAgencia[$i]->setCantPersonas($cantPer);
                $importe = $arrayAgencia[$i]->darImporteVenta();
            }
            $i++;
        }
        return $importe;
    }

    public function informarPaquetesTuristicos($fecha, $destino){
        $arrayPaquetes = $this->getPaquetesTuristicos();
        $count = count($arrayPaquetes);
        $i = 0;
        $existe = false;
        $mostrarPaquete = "";
        while($i < $count && $existe == false){
            $fechaP = $arrayPaquetes[$i]->getFechaDesde();
            $destinoP = $arrayPaquetes[$i]->getobjDestino();
            $lugarDestino = $destinoP->getNombreLugar();
            if($fechaP == $fecha && $lugarDestino == $destino){
                $existe = true;
                $mostrarPaquete = $mostrarPaquete. $arrayPaquetes[$i];
            }
            $i++;
        }
        return $mostrarPaquete;
    }

    public function paqueteMasEcomomico($fecha, $destino){
        $arrayPaquetes = $this->getPaquetesTuristicos();
        $count = count($arrayPaquetes);
        $mostrarPaquete = "";
        for ($i=0; $i < $count; $i++) { 
            $fechaP = $arrayPaquetes[$i]->getFechaDesde();
            $destinoP = $arrayPaquetes[$i]->getobjDestino();
            $lugarDestino = $destinoP->getNombreLugar();
            if($fechaP == $fecha && $lugarDestino == $destino){
                $valorDia = $destinoP->getValorDiaPasajero();
                $masEconomico = 10000000;
                if($valorDia < $masEconomico){
                    $masEconomico = $valorDia;
                    $mostrarPaquete = "". $arrayPaquetes[$i];
                }
            }
        }
        return $mostrarPaquete;
    }

    public function informarConsumoCliente($tipoDoc, $numDoc){
        $arrayOnline = $this->getVentasOnline();
        $arrayAgencia = $this->getVentasAgencia();
        $arrayVentas = array_merge($arrayOnline, $arrayAgencia);
        $count = count($arrayVentas);
        $i = 0;
        $existe = false;
        $mostrarPaquete = "";
        while($i < $count && $existe == false){
            $ventas = $arrayVentas[$i]->getObjCliente();
            $tipoDocumento = $ventas->getTipoDoc();
            $numDni = $ventas->getDni();
            if($tipoDocumento == $tipoDoc && $numDni == $numDoc){
                $existe = true;
                $mostrarPaquete = $mostrarPaquete. $arrayVentas[$i];
            }
            $i++;
        }
        return $mostrarPaquete;
    }

    public function informarPaquetesMasVendido($anio, $n){
        $arrayPaquetes = $this->getPaquetesTuristicos();
        $count = count($arrayPaquetes);
        $i = 0;
        $existe = false;
        $mostrarPaquete = "";
        while($i < $count && $existe == false){
            $fecha = $arrayPaquetes[$i]->getFechaDesde();
            if($fecha == $anio){
                $existe = true; 
                for ($i=0; $i < $n; $i++) { 
                    $mostrarPaquete = $mostrarPaquete. $arrayPaquetes[$i];
                }
            }
            $i++;
        }
        return $mostrarPaquete;
    }

    public function promedioVentasOnLine(){
        $arrayOnline = $this->getVentasOnline();
        $arrayAgencia = $this->getVentasAgencia();
        $arrayVentas = array_merge($arrayOnline, $arrayAgencia);
        $count = count($arrayVentas);
        $count2 = count($arrayOnline);
        $promedio = ($count2 / $count);
        return $promedio;
    }

    public function promedioVentasAgencia(){
        $arrayOnline = $this->getVentasOnline();
        $arrayAgencia = $this->getVentasAgencia();
        $arrayVentas = array_merge($arrayOnline, $arrayAgencia);
        $count = count($arrayVentas);
        $count2 = count($arrayAgencia);
        $promedio = ($count2 / $count);
        return $promedio;
    }
}