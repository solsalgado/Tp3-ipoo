<?php 
class Productos{
    private $codigoBarra;
    private $descripcion;
    private $stock;
    private $iva;
    private $precioCompra;
    private $objRubro;

    public function __construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $objRubro){
        $this->codigoBarra = $codigoBarra;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->iva = $iva;
        $this->precioCompra = $precioCompra;
        $this->objRubro = $objRubro;
    }

    public function getCodigoBarra(){
        return $this->codigoBarra;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getStock(){
        return $this->stock;
    }
    public function getIva(){
        return $this->iva;
    }
    public function getPrecioCompra(){
        return $this->precioCompra;
    }
    public function getObjRubro(){
        return $this->objRubro;
    }

    public function setCodigoBarra($codigoBarra){
        $this->codigoBarra = $codigoBarra;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function setStock($stock){
        $this->stock = $stock;
    }
    public function setIva($iva){
        $this->iva = $iva;
    }
    public function setPrecioCompra($precioCompra){
        $this->precioCompra = $precioCompra;
    }
    public function setObjRubro($objRubro){
        $this->objRubro = $objRubro;
    }

    public function __toString(){
        return "Codigo de barra: ". $this->getCodigoBarra(). "\n". 
               "Descripcion: ". $this->getDescripcion(). "\n". 
               "Stock: ". $this->getStock(). "\n". 
               "Porcentaje de iva: ". $this->getIva(). "\n". 
               "Precio de compra: ". $this->getPrecioCompra(). "\n". 
               "Rubro: \n". $this->getObjRubro();
    }

    public function darPrecioVenta(){
        $precioCompra = $this->getPrecioCompra();
        $porcIva = $this->getIva();
        $rubro = $this->getObjRubro();
        $porcVenta = $rubro->getPorcentajeGanancia();
        $pIva = ($precioCompra * ($porcIva / 100));
        $pVenta = ($precioCompra * ($porcVenta / 100));
        $precioVenta = ($precioCompra + $pIva + $pVenta);
        return $precioVenta;
    }
}