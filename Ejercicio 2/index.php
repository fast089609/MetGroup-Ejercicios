<?php

require_once('./ExpresionesRegulares.php');

$a = "Hello World";
$b = "2 + 10 / 2 - 20";
$c = "(2 + 10) / 2 - 20";
$d = "(2 +10)     / (2 - 0";

$expresion = new ExpresionesRegulares($d); //cambiar variable segun sea necesario para test.
$operacion = $expresion->operacion();
$compute = $expresion->compute();

echo "Operacion: " . ($operacion == false ? 'false' : 'true') . "<br>"; //se valida o se coloca el booleano en texto ya que el navegador no reconoce el false y saldria en blanco
echo "Compute: " . ($compute == false ? "false" : $compute);