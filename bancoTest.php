<?php 
include_once("persona.php");
include_once("cliente.php");
include_once("cuenta.php");
include_once("cuentaCorriente.php");
include_once("cajaAhorro.php");
include_once("banco.php");

$cliente1 = new Cliente(34, "pedro", "gonzales", 12333444);
$cliente2 = new Cliente(67, "sofia", "perez", 22333555);
$clientes = [$cliente1, $cliente2];


$cCorriente1 = new CuentaCorriente(700000, 123, $cliente1, 50000);
$cCorriente2 = new CuentaCorriente(300000, 456, $cliente2, 87000);
$cuentas = [$cCorriente1, $cCorriente2];


$cAhorro1 = new CajaAhorro(678, $cliente1, 50000);
$cAhorro2 = new CajaAhorro(382, $cliente1, 300000);
$cAhorro3 = new CajaAhorro(312, $cliente2, 70000);
$cajas = [$cAhorro1, $cAhorro2, $cAhorro3];

$objBanco = new Banco($cuentas, $cajas, 2, $clientes);


echo "----Depositar---- \n";
$objBanco->realizarDeposito(678, 300);
$objBanco->realizarDeposito(382, 300);
$objBanco->realizarDeposito(312, 300);
echo $objBanco. "\n";

echo "----Transferir---- \n";
$objBanco->transferir(123, 312, 150);
echo $objBanco;