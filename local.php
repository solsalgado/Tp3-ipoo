<?php 
class Local{
    private $arrayImportados = [];
    private $arrayRegionales = [];
    private $arrayVentas = [];

    public function __construct($arrayImportados, $arrayRegionales, $arrayVentas){
        $this->arrayImportados = $arrayImportados;
        $this->arrayRegionales = $arrayRegionales;
        $this->arrayVentas = $arrayVentas;
    }

    public function getArrayImportados(){
        return $this->arrayImportados;
    }
    public function getArrayRegionales(){
        return $this->arrayRegionales;
    }
    public function getArrayVentas(){
        return $this->arrayVentas;
    }

    public function setArrayImportados($arrayImportados){
        $this->arrayImportados = $arrayImportados;
    }
    public function setArrayRegionales($arrayRegionales){
        $this->arrayRegionales = $arrayRegionales;
    }
    public function setArrayVentas($arrayVentas){
        $this->arrayVentas = $arrayVentas;
    }

    public function __toString(){
        return "Productos importados: \n". $this->mostrarProductosI(). "\n". 
               "Productos regionales: \n". $this->mostrarProductosR(). "\n". 
               "Ventas realizadas: \n". $this->mostrarVentas(). "\n";
    }

    public function mostrarProductosI(){
        $arrayProductosI = $this->getArrayImportados();
        $count = count($arrayProductosI);
        $texto = "";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $arrayProductosI[$i];
        }
        return $texto;
    }

    public function mostrarProductosR(){
        $arrayProductosR = $this->getArrayRegionales();
        $count = count($arrayProductosR);
        $texto = "";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $arrayProductosR[$i];
        }
        return $texto;
    }

    public function mostrarVentas(){
        $arrayVenta = $this->getArrayVentas();
        $count = count($arrayVenta);
        $texto = "";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $arrayVenta[$i];
        }
        return $texto;
    }

    public function productoMasEcomomico($rubro){
        $arrayProductosI = $this->getArrayImportados();
        $arrayProductosR = $this->getArrayRegionales();
        $arrayProductos = array_merge($arrayProductosI, $arrayProductosR);
        $count = count($arrayProductos);
        for ($i=0; $i < $count; $i++) { 
            $descripcionR = $arrayProductos[$i]->getObjRubro();
            if($descripcionR == $rubro){
                $precio = $arrayProductos[$i]->darPrecioVenta();
                $masEconomico = 10000000000;
                if($precio < $masEconomico){
                    $masEconomico = $precio;
                }
            }
        }
        return $masEconomico;
    }

    public function informarProductosMasVendidos($anio, $n){
        $arrayVenta = $this->getArrayVentas();
        $count = count($arrayVenta);
        $i = 0;
        $existe = false;
        $mostrarP = "";
        while($i < $count && $existe == false) { 
            $fecha = $arrayVenta[$i]->getFecha();
            if($fecha == $anio){
                $existe = true;
                $productos = $arrayVenta[$i]->getObjProductos();
                for ($i=0; $i < $n; $i++) { 
                    $mostrarP = $mostrarP. $productos[$i];
                }
            }
            $i++;
        }
        return $mostrarP;
    }

    public function promedioVentasImportados(){
        $arrayVenta = $this->getArrayVentas();
        $count = count($arrayVenta);
        $arrayProductosI = $this->getArrayImportados();
        $count2 = count($arrayProductosI);
        $promedio = ($count2 / $count);
        return $promedio;
    }

    public function informarConsumoCliente($tipoDoc, $numDoc){
        $arrayVenta = $this->getArrayVentas();
        $count = count($arrayVenta);
        $i = 0;
        $existe = false;
        $mostrar = "";
        while($i < $count && $existe == false){
            $cliente = $arrayVenta[$i]->getObjCliente();
            $tipoDocumento = $cliente->getTipoDoc();
            $numDni = $cliente->getDni();
            if($tipoDocumento == $tipoDoc && $numDni == $numDoc){
                $existe = true;
                $mostrar = $mostrar . $arrayVenta[$i];
            }
            $i++;
        }
        return $mostrar;
    }
}