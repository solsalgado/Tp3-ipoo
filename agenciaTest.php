<?php 
include_once("destinos.php"); 
include_once("paquetesTuristicos.php");
include("cliente2.php");
include_once("ventasAgencia.php");
include_once("ventasOnline.php");
include_once("agenciaViajes.php");

$destino = new Destinos(123, "bariloche", 250);
$destino2 = new Destinos(345, "neuquen", 150);
$destino3 = new Destinos(567, "buenos aires", 400);
$destinos = [$destino, $destino2, $destino3];

$paquetes = new PaquetesTuristicos("23/05/2014", 3, $destino, 25);
$paquetes2 = new PaquetesTuristicos("20/10/2014", 4, $destino2, 5);
$paquetes3 = new PaquetesTuristicos("10/12/2015", 3, $destino3, 30);
$paquetesT = [$paquetes, $paquetes2, $paquetes3];

$cliente = new Cliente("sol", "gonzales", "dni", 11222333);
$cliente2 = new Cliente("elena", "perez", "dni", 22333444);
$cliente3 = new Cliente("matias","rodrigues", "dni", 12333444);
$cliente4 = new Cliente("sergio", "martines", "dni", 44555666);

$ventaOnline = new VentasOnline("21/11/2015", $paquetes3, 2, $cliente2);
$ventaOnline2 = new VentasOnline("15/10/2015", $paquetes3, 1, $cliente3);
$ventasO = [$ventaOnline, $ventaOnline2];
$ventasAgencia = new VentasAgencia("12/04/2014", $paquetes, 4, $cliente);
$ventasAgencia2 = new VentasAgencia("15/10/2014", $paquetes2, 1, $cliente4);
$ventasA = [$ventasAgencia, $ventasAgencia2];

$agencia = new AgenciaViajes($destinos, $paquetesT, $ventasA, $ventasO);

echo $agencia. "\n";

/*
echo "----Importe Venta---- \n";
$v = $ventasAgencia2->darImporteVenta();
echo $v. "\n";
*/

echo "----Incorporar paquete---- \n";
$paqueteNuevo = new PaquetesTuristicos("01/03/2015", 2, $destino2, 13);
$incorporar = $agencia->incorporarPaquete($paqueteNuevo);
if($incorporar == false){
    echo "Se incorporo el paquete. \n";
} else{
    echo "El paquete no se pudo incorporar. \n";
}
echo $agencia. "\n";


echo "----Incorporar venta---- \n";
$incorporarV1 = $agencia->incorporarVenta($paquetes, "dni", 27898654, 5, false);
echo $incorporarV1. "\n";
echo "----Incorporar venta 2---- \n";
$incorporarV2 = $agencia->incorporarVenta($paquetes2, "dni", 27898654, 4, true);
echo $incorporarV2. "\n";
echo "----Incorporar venta 3---- \n";
$incorporarV3 = $agencia->incorporarVenta($paquetes3, "dni", 27898654, 15, true);
echo $incorporarV3. "\n";

/*
echo "----Informar consumo cliente---- \n";
$a = $agencia->informarConsumoCliente("dni", 11222333);
echo $a;
*/