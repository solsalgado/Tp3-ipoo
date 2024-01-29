<?php 
class Cliente extends Persona{
    private $nroCliente;

    public function __construct($nroCliente, $nombre, $apellido, $dni){
        parent::__construct($nombre, $apellido, $dni);
        $this->nroCliente = $nroCliente;
    }

    public function getNroCliente(){
        return $this->nroCliente;
    }

    public function setNroCliente($nroCliente){
        $this->nroCliente = $nroCliente;
    }

    public function __toString(){
        $retorno = parent::__toString();
        $retorno.= "Número de cliente: ". $this->getNroCliente();
        return $retorno;
    }
}