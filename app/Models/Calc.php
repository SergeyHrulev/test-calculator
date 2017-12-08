<?php

namespace App\Models;

class Calc
{

//    public function calculator($metod, $a, $b){
//        return $this->$metod->($a, $b);
//    }

    public function summ($varA = 0, $varB = 0){
        return $varA + $varB;
    }

    public function substract( $varA = 0, $varB = 0){
        return $varA - $varB;
    }

    public function multiple($varA = 0, $varB = 0){
        return $varA * $varB;
    }

    public function division ($varA = 0, $varB = 0){
        if ($varA === 0){
            return 0;
        }else{
            return $varA / $varB;
        }
    }

}