<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sequencia Matriz Aleatória</title>
</head>
<body>
    <div class="container" style="justify-content: center">
        <div class="callout large primary">
            <div class="row column text-center">
                <h1>Solucionando Problemas</h1>
                <h2 class="subheader">Problema 3</h2>
            </div>
        </div>
        <br>
        <div class="mb-3">
            <h3>Numeros Aleatórios:</h3>
            <pre>
                <table class="table table-bordered">
                    <tr>
                    @foreach ( $array as $row )                    
                        @foreach ( $row as $value )
                            <td><center>{{ $value }}</center></td> 
                        @endforeach
                    </tr> 
                    @endforeach
                </table>
            </pre>
            <h3>Pares:</h3>
            <pre>
                <table class="table table-bordered">
                    <tr>
                    @foreach ( $arrayPar as $row )                    
                        @foreach ( $row as $value )
                            <td><center>{{ $value }}</center></td> 
                        @endforeach
                    </tr> 
                    @endforeach                  
                </table>
            </pre>
            <h3>Ímpares:</h3>
            <pre>
                <table class="table table-bordered">
                    <tr>
                    @foreach ( $arrayImpar as $row )                    
                        @foreach ( $row as $value )
                            <td><center>{{ $value }}</center></td> 
                        @endforeach
                    </tr> 
                    @endforeach                     
                </table>
            </pre>
        </div>
    </div>
</body>
</html>