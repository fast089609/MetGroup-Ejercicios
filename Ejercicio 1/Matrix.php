<?php 

class Matriz {

    private $matriz;

    function __construct($matriz){
        $this->matriz = $matriz;
    }

    public function dimension(){
        return $this->getDimension($this->matriz);
    }

    public function compute(){
        return $this->getCompute($this->matriz);
    }

    public function straight() {
        $getStraight = function($numeroOrArray) use (&$getStraight) {
            if (!is_array($numeroOrArray)) {
                return null;
            }
            
            $straights = [];
            
            foreach ($numeroOrArray as $numero) {
                $straights[] = $getStraight($numero);
            }
            
            if (array_reduce($straights, function ($carry, $straight) {
                return $carry && ($straight === null);
            }, true)) {
                return count($straights);
            }
            
            sort($straights);
            
            if ($straights[0] !== $straights[count($straights) - 1]) {
                return false;
            }
            
            return true;
        };
    
        return $getStraight($this->matriz);
    }

    private function getCompute($numeroOArray){
        if (!is_array($numeroOArray)) return $numeroOArray;

        $suma = 0;
        foreach ($numeroOArray as $numeroArray) {
            $suma += $this->getCompute($numeroArray);
        }

        return $suma;
    }

    private function getDimension($numeroOrArray, $contador = 0) {
        if (!is_array($numeroOrArray)) return $contador;
        
        $contadores = [];
        foreach ($numeroOrArray as $numero) {
            $contadores[] = $this->getDimension($numero, $contador + 1);
        }
        
        return max($contadores);
    }


}