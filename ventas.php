<?php 
class Ventas{
    private $fecha;
    private $objProductos = [];
    private $objCliente;

    public function __construct($fecha, $objProductos, $objCliente){
        $this->fecha = $fecha;
        $this->objProductos = $objProductos;
        $this->objCliente = $objCliente;
    } 

    public function getFecha(){
        return $this-> fecha;
    }
    public function getObjProductos(){
        return $this-> objProductos;
    }
    public function getObjCliente(){
        return $this-> objCliente;
    }

    public function setFecha($fecha){
        $this-> fecha = $fecha;
    }
    public function setObjProductos($objProductos){
        $this-> objProductos = $objProductos;
    }
    public function setObjCliente($objCliente){
        $this-> objCliente = $objCliente;
    }

    public function __toString(){
        return "Fecha: ". $this->getFecha(). "\n". 
               "Productos: ". $this->mostrarProductos(). "\n". 
               "Cliente: \n". $this->getObjCliente(). "\n";
    }

    public function mostrarProductos(){
        $productos = $this->getObjProductos();
        $count = count($productos);
        $texto = "";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $productos[$i];
        }
        return $texto;
    }

    public function importeFinal(){
        $arrayProductos = $this->getObjProductos();
        $count = count($arrayProductos);
        $i = 0;
        $existe = false;
        while($i < $count && $existe == false){
            $importe = $arrayProductos[$i]->darPrecioVenta();
            $total = $count * $importe;            
            $existe = true;
        }

        return $total;
    }

    public function incorporarProductoLocal($objProducto){
        $arrayP = $this->getObjProductos();
        $count = count($arrayP);
        for ($i=0; $i < $count; $i++) { 
            $codigoBarra = $arrayP[$i]->getCodigoBarra();
            $codigo = $objProducto->getCodigoBarra();
            if($codigoBarra == $codigo){
                $existe = true;
            } else{
                $existe = false;
                array_push($arrayP, $objProducto);
                $this->setObjProductos($arrayP);
            }
        }
        return $existe;
    }

    public function retornarImporteProducto($codProducto){
        $arrayP = $this->getObjProductos();
        $count = count($arrayP);
        $i = 0;
        $existe = false;
        while($i < $count && $existe == false){
            $codigoBarra = $arrayP[$i]->getCodigoBarra();
            if($codigoBarra == $codProducto){
                $precioVenta = $arrayP[$i]->darPrecioVenta();
                $existe = true;
            }
            $i++;
        }
        return $precioVenta;
    }

    public function retornarCostoProductoLocal(){
        $arrayP = $this->getObjProductos();
        $count = count($arrayP);
        $suma = 0;
        for ($i=0; $i < $count; $i++) { 
            $stock = $arrayP[$i]->getStock();
            if($stock > 0){
                $precioV = $arrayP[$i]->darPrecioVenta();
                $suma = $suma + $precioV;
            }
        }     
        return $suma;   
    }
}