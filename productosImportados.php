<?php 
class ProductosImportados extends Productos{
    private $incremento;
    private $impuesto;

    public function __construct($incremento, $impuesto, $codigoBarra, $descripcion, $stock, $iva, $precioCompra, $objRubro){
        parent::__construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $objRubro);
        $this->incremento = $incremento;
        $this->impuesto = $impuesto;
    }

    public function getIncremento(){
        return $this-> incremento;
    }
    public function getImpuesto(){
        return $this-> impuesto;
    }

    public function setIncremento($incremento){
        $this-> incremento = $incremento;
    }
    public function setImpuesto($impuesto){
        $this-> impuesto = $impuesto;
    }

    public function __toString(){
        $retorno = parent::__toString();
        $retorno.= "Incremento: ". $this->getIncremento(). "\n".
                   "Impuesto: ". $this->getImpuesto(). "\n";
        return $retorno;
    }

    public function darPrecioVenta(){
        $precioVenta = parent::darPrecioVenta();
        $incremento = $this->getIncremento();
        $impuesto = $this->getImpuesto();
        $incV = ($precioVenta * ($incremento / 100));
        $impV = ($precioVenta * ($impuesto / 100));
        $total = ($precioVenta + $incV + $impV);
        return $total;
    }
}