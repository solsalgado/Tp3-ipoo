<?php
include_once("teatro.php");
include_once("actividad.php");
include_once("obra.php");
include_once("cine.php");
include_once("musical.php");

$obra = new Obra("abc", "21:30", "02:00", 500);
$obra2 = new Obra("def", "23:00", "01:30", 200);
$obras = [$obra, $obra2];

$cine = new Cine("comedia", "argentina", "abcde", "18", "01:30", 300);
$cine2 = new Cine("romance", "argentina", "amor", "14:00", "01:00", 250);
$peliculas = [$cine, $cine2];

$musical = new Musical("sol", 5, "abcmusical", "23:00", "02:00", 500);
$musical2 = new Musical("sol", 2, "high school musical", "12:00", "02:00", 400);
$musicales = [$musical, $musical2];

$teatro = new Teatro("teatro1", "av siempre viva", $musicales);

echo $teatro. "\n";

echo "----Dar Costo---- \n";
$costo = $teatro->darCostos();
echo $costo. "\n";