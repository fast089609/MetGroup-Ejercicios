<?php
require_once("./Matrix.php");

$a = [1,2] ;
$b = [[1,2],[2,4]] ;
$c = [[1,2],[2,4],[2,4]] ;
$d = [[[3,4],[6,5]]] ;
$e = [[[1, 2,3]], [[5, 6, 7],[5, 4, 3]], [[3, 5, 6], [4, 8, 3], [2, 3]]] ;
$f = [[[1, 2, 3], [2, 3, 4]], [[5, 6, 7], [5, 4, 3]], [[3,5, 6], [4, 8, 3]]];

$myMatrix = new Matriz($f); //se debe cambiar la variable segun sea la prueba
$straight = $myMatrix->straight();
$compute = $myMatrix->compute();
$dimension = $myMatrix->dimension();

echo "Straight => " . ($straight == false ? "false" : "true") . "<br>"; //se interpreta el false para que no quede vacio
echo "Compute => " . $compute . "<br>";
echo "Dimension => " . $dimension . "<br>";