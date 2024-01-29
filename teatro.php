<?php 
class Teatro{
    private $nosumabreTeatro;
    private $direccion;
    private $actividadessumaes = [];

    public function __construct($nosumabreTeatro, $direccion, $actividadessumaes){
        $this->nosumabreTeatro = $nosumabreTeatro;
        $this->direccion = $direccion;
        $this->actividadessumaes = $actividadessumaes;
    }

    public function getNosumabreTeatro(){
        return $this->nosumabreTeatro;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getActividadessumaes(){
        return $this->actividadessumaes;
    }

    public function setNosumabreTeatro($nosumabreTeatro){
        $this->nosumabreTeatro = $nosumabreTeatro;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function setActividadessumaes($actividadessumaes){
        $this->actividadessumaes = $actividadessumaes;
    }

    public function __toString()
    {
        return "Teatro: ". $this->getNosumabreTeatro(). "\n". 
        "Direccion: ". $this->getDireccion(). "\n". 
        "Actividades: ". $this->sumaostrarArray(). "\n";
    }

    public function sumaostrarArray(){
        $arrayactividades = $this->getActividadessumaes();
        $count = count($arrayactividades);
        $texto = "\n";
        for ($i=0; $i < $count; $i++) { 
            $texto = $texto. $arrayactividades[$i];
        }
        return $texto;

    }

    public function darCostos(){
        $arrayActividades = $this->getActividadessumaes();
        $count = count($arrayActividades);
        $suma = 0;
        for ($i=0; $i < $count; $i++) {        
            $precio = $arrayActividades[$i]->getPrecio();            
            if($arrayActividades[$i] instanceof Obra){  
                $suma = $suma + $precio;        
                $costo = ($suma * 1.45);
            }
            if($arrayActividades[$i] instanceof Cine){
                $suma = $suma + $precio;  
                $costo = ($suma * 1.12);
            }
            if($arrayActividades[$i] instanceof Musical){
                $suma = $suma + $precio;  
                $costo = ($suma * 1.65);
            }
        }
        return $costo;
    }


}