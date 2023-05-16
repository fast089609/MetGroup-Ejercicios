<?php 

class ExpresionesRegulares{
    private $string;
    function __construct($string){
        $this->string = $string;
    }

    public function operacion(){
        $regex = '/^[-+*\/\d() ]+$/';
        //verificamos si es una opracion aritmetica
        if (!preg_match($regex, $this->string)) return false;

        $parentesis = 0;
        for ($i = 0; $i < strlen($this->string); $i++) {
            if ($this->string[$i] === '(') {
                $parentesis++;
            } elseif ($this->string[$i] === ')') {
                $parentesis--;
            }
            if ($parentesis < 0) {
                return false;
            }
        }
        if ($parentesis !== 0) {
            return false;
        }

        return true;
    }

    public function compute(){
        // Verificar si la operación es válida según la expresión regular
        $regex = '/^[-+*\/\d() ]+$/';

        if (!preg_match($regex, $this->string)) {
            return false;
        }

        //validamos los parentesis
        $parentesis = 0;
        for ($i = 0; $i < strlen($this->string); $i++) {
            if ($this->string[$i] === '(') {
                $parentesis++;
            } elseif ($this->string[$i] === ')') {
                $parentesis--;
            }
            if ($parentesis < 0) {
                return false;
            }
        }
        if ($parentesis !== 0) {
            return false;
        }
        
        //si todos los parentesis estan bien, validamos la funcion
        $resultado = @eval("return {$this->string};");

        // validamos si se hizo correctamente
        if ($resultado === false || error_get_last() !== null) {
            return false;
        }

        return $resultado;
    }
}