<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonacciController extends Controller
{
    public function index()
    {
        return view('problema4.index');
    }

    public function listaFibonacci(Request $request)
    {
        $data = $request->dadosInput;
        $numeros = array_map('intval', explode(",", $data));
        $is_fibonacci = array();

        function fibonacci($n):bool
        {
            $raizNumero = sqrt(5 * $n * $n - 4);
            $raizSegundoNumero= sqrt(5 * $n * $n + 4);
            if ($raizNumero - ceil($raizNumero) == 0) {
                return true;
            } else {
                if ($raizSegundoNumero - ceil($raizSegundoNumero) == 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        foreach($numeros as $numero){
            if(fibonacci($numero)){
                $is_fibonacci[] = $numero;
            }
        }

        sort($is_fibonacci);

        sleep(1);

        return response()->json($is_fibonacci, 200);
    }
}
