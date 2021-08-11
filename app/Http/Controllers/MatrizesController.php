<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatrizesController extends Controller
{
    public function index()
    {
        $qtdAleatorio = 25;
        $array = array();
        $arrayPar = array();
        $arrayImpar = array();

        for($coluna = 0; $coluna < 5; $coluna++){
            for($linha = 0; $linha < 5; $linha++){
                $array[$coluna][$linha] = rand(1,100);
                $array[$coluna][$linha] = rand(1,100);
                $array[$coluna][$linha] = rand(1,100);
                $array[$coluna][$linha] = rand(1,100);
                $array[$coluna][$linha] = rand(1,100);
            }
        }
    
        $i = 0;
        $j = 0;
        for($coluna = 0; $coluna < 5; $coluna++){
            for($linha = 0; $linha < 5; $linha++){
                if(($array[$coluna][$linha] % 2) == 0){
                    $arrayPar[$i][$j] = $array[$coluna][$linha];
                }
                if(($array[$coluna][$linha] % 2) == 1){
                    $arrayImpar[$i][$j] = $array[$coluna][$linha];
                }
                $j++;
            }
            $i++;
        }

        return view('problema3.index', compact('array', 'arrayPar', 'arrayImpar'));

       // Código feito para converter array em array multidimencional
        
       //for($i = 0; $i < $qtdAleatorio; $i++){
       //    $array[$i] = rand(1,100);

       //    if(($array[$i] % 2) == 0){
       //        $arrayPar[] = $array[$i];
       //    }
       //
       //    if(($array[$i] % 2) == 1){
       //        $arrayImpar[] = $array[$i];
       //    }
       //}

       //function array_chunk_vertical($array, $columns) 
       //{
       //    $n = count($array);
       //    $per_column = floor($n / $columns);
       //    $rest = $n % $columns;
       //
       //    $per_columns = array( );
       //    for ( $i = 0; $i < $columns; $i++ ) {
       //        $per_columns[$i] = $per_column + ($i < $rest ? 1 : 0);
       //    }
       //
       //    $tabular = array( );
       //    foreach ( $per_columns as $rows ) {
       //        for ( $i = 0; $i < $rows; $i++ ) {
       //            $tabular[$i][ ] = array_shift($array);
       //        }
       //    }
       //
       //    return $tabular;
       //}

       //$data = array_chunk_vertical($array, 5);
       //$dataPar = array_chunk_vertical($arrayPar, 4);
       //$dataImpar = array_chunk_vertical($arrayImpar, 4);


       //return view('problema3.index', compact('data', 'dataPar', 'dataImpar'));
    }
}
