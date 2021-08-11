<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
    <title>Calculando Diferença de Tamanhos</title>
</head>
<body>
    <div class="container" style="justify-content: center">
        <div class="callout large primary">
            <div class="row column text-center">
                <h1>Solucionando Problemas</h1>
                <h2 class="subheader">Problema 1</h2>
            </div>
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Pessoa 1: </label>
            <input type="text" class="form-control" id="nome1" name="nome1" placeholder="Digite o nome da primeira pessoa">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Tamanho: </label>
            <input type="number" class="form-control" id="tamanho1" name="tamanho1" placeholder="Digite o Tamanho da primeira pessoa">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Pessoa 2: </label>
            <input type="text" class="form-control" id="nome2" name="nome2" placeholder="Digite o nome da segunda pessoa">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Tamanho: </label>
            <input type="number" class="form-control" id="tamanho2" name="tamanho2" placeholder="Digite o Tamanho da segunda pessoa">
        </div>
        <button type="button" class="btn btn-danger calcular">Calcular</button>
        <button type="button" class="btn btn-danger limpar">Limpar</button>
        <br><br>
        <div class="card text-white bg-dark mb-3" id="card_escondido" style="max-width: 30rem;">
            <div class="card-header"><h5>Valida diferença entre tamanhos</h5></div>
            <div class="card-body">
                <p class="card-text" id="message">Vai demorar x anos para que Chico seja maior que Juca.</p>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let message;

            $('#card_escondido').hide()
            $('.calcular').click(function () {
                let data = getFormData();
                calcularTamanho(data);
                $('#message').text(message);
                $('#card_escondido').show();
            });

            function getFormData() {
                const data = {};
                data.nome1 = $('#nome1').val();
                data.nome2 = $('#nome2').val();
                data.tamanho1 = $('#tamanho1').val();
                data.tamanho2 = $('#tamanho2').val();
                return data;
                //data.nome1 = $( "input[name='nome1']" )
            }

            function calcularTamanho(data) {

                let tamanhoMaior = parseFloat(data.tamanho1) > parseFloat(data.tamanho2) ? {
                    tamanho: parseFloat(data.tamanho1),
                    nome: data.nome1,
                } : {
                    tamanho: parseFloat(data.tamanho2),
                    nome: data.nome2,
                };

                let tamanhoMenor = parseFloat(data.tamanho1) < parseFloat(data.tamanho2) ? {
                    tamanho: parseFloat(data.tamanho1),
                    nome: data.nome1,
                } : {
                    tamanho: parseFloat(data.tamanho2),
                    nome: data.nome2,
                };

                let anos = 0;
                while (tamanhoMenor.tamanho < tamanhoMaior.tamanho) {
                    tamanhoMaior.tamanho += 0.02;
                    tamanhoMenor.tamanho += 0.03;
                    anos++;
                }

                message = `${tamanhoMenor.nome} será maior que ${tamanhoMaior.nome} daqui ${anos} anos`;
            }

            $('.limpar').click(function(){
                $('#card_escondido').hide()
                $('#nome1').val("");
                $('#nome2').val("");
                $('#tamanho1').val("");
                $('#tamanho2').val("");
            })
        })
    </script>
</body>
</html>
