<?php 
class ProductosRegionales extends Productos{
    private $porcDescuento;

    public function __construct($porcDescuento, $codigoBarra, $descripcion, $stock, $iva, $precioCompra, $objRubro){
        parent::__construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $objRubro);
        $this->porcDescuento = $porcDescuento;
    }

    public function getPorcDescuento(){
        return $this-> porcDescuento;
    }

    public function setPorcDescuento($porcDescuento){
        $this-> porcDescuento = $porcDescuento;
    }

    public function __toString(){
        $retorno = parent:: __toString(). 
                 "Porcentaje de descuento: ". $this->getPorcDescuento();
        return $retorno;
        
    }

    public function darPrecioVenta(){
        $precioVenta = parent::darPrecioVenta();
        $porcDesc = $this->getPorcDescuento();
        $pDescuento = ($precioVenta * ($porcDesc / 100));
        $total = ($precioVenta - $pDescuento);
        return $total;
    }
}