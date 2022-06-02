<?php
include_once "class/quadrado.class.php";

$quadrado = new Quadrado(1, 25, "Preto", 2);
$quadrado->Area();
$quadrado->Perimetro();
$quadrado->Diagonal();

echo $quadrado;
?>