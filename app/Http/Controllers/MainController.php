<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calc;

class MainController extends Controller
{
    //
    public function task(Request $request, Calc $calc, $a = 0, $b = 0 ){

        //return (request()->input('number1') + request()->input('number2'));
        $operation = $request->input('calc');
        $number1 = $request->input('number1');
        $number2 = $request->input('number2');

        return $calc->$operation($number1, $number2);
    }

}
