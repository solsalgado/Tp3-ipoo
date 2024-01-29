<?php 
class VentasOnline extends VentasAgencia{
    private $porcDescuento;

    public function __construct($fecha, $objPaquetes, $cantPersonas, $objCliente){
        parent::__construct($fecha, $objPaquetes, $cantPersonas, $objCliente);
        $this->porcDescuento = 20;
    }

    public function getPorcDescuento(){
        return $this->porcDescuento;
    }
    public function setPorcDescuento($porcDescuento){
        $this->porcDescuento = $porcDescuento;
    }

    public function __toString(){
        $retorno = parent::__toString();
        $retorno .= "Porcentaje de descuento: ". $this->getPorcDescuento(). "\n";
        return $retorno;
    }

    public function darImporteVenta(){
        $totalAgencia = parent::darImporteVenta();
        $porcentajeDesc = $this->getPorcDescuento();
        $porc = ($totalAgencia * ($porcentajeDesc / 100));
        $totalOnline = ($totalAgencia - $porc);
        return $totalOnline;
    }
}