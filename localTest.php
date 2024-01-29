<?php 
include_once("cliente2.php");
include_once("rubro.php");
include_once("producto.php");
include_once("productosImportados.php");
include_once("productosRegionales.php");
include_once("ventas.php");
include_once("local.php");


$cliente1 = new Cliente("sandra", "perez", "dni", 11222333);
$cliente2 = new Cliente("matias", "diaz", "dni", 22333444);
$clientes = [$cliente1, $cliente2];

$rubro1 = new Rubro("conservas", 35);
$rubro2 = new Rubro("regalos", 55);


$producto1Importado = new ProductosImportados(50, 10, 123, "gorro", 2, 10, 2300, $rubro2);
$producto2Importado = new ProductosImportados(50, 10, 432, "juguete", 1, 15, 3000, $rubro2);
$producto3Regional = new ProductosRegionales(10, 234, "mermelada", 4, 5, 1200, $rubro1);
$producto4Regional = new ProductosRegionales(10, 456, "pan", 6, 10, 500, $rubro1);
$productosI = [$producto1Importado, $producto2Importado];
$productosR = [$producto3Regional, $producto4Regional];

$productosVentas =[$producto1Importado, $producto3Regional];
$productosVentas2 =[$producto2Importado, $producto4Regional];

$venta1 = new Ventas(2024, $productosVentas, $cliente1);
$venta2 = new Ventas(2023, $productosVentas2, $cliente2);
$ventas = [$venta1, $venta2];

$local = new Local($productosI, $productosR, $ventas);

//echo $local;

echo "----Dar precio venta---- \n";
$p1 = $producto1Importado->darPrecioVenta();
$p2 = $producto2Importado->darPrecioVenta();
$p3 = $producto3Regional->darPrecioVenta();
$p4 = $producto4Regional->darPrecioVenta();
echo $p1. "\n";
echo $p2. "\n";
echo $p3. "\n";
echo $p4. "\n";

echo "----Importe final---- \n";
$importe = $venta1->importeFinal();
echo $importe. "\n";

echo "----Costo producto local---- \n";
$costoP = $venta2->retornarCostoProductoLocal();
echo $costoP. "\n";

echo "----Importe Producto---- \n";
$importeP = $venta1->retornarImporteProducto(123);
echo $importeP. "\n";

echo "----Mas economico---- \n";
$economico = $local->productoMasEcomomico($rubro1);
echo $economico. "\n";

echo "----Consumo cliente---- \n";
$consumoC = $local->informarConsumoCliente("dni", 11222333);
echo $consumoC. "\n";