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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <title>Fibonacci</title>
</head>
<body>
    <div class="container" style="justify-content: center">
        <div class="callout large primary">
            <div class="row column text-center">
                <h1>Solucionando Problemas</h1>
                <h2 class="subheader">Problema 4</h2>
            </div>
        </div>
    <h3><center>Validando Números Fibonacci</center></h3>
    <br>
    <br>    
    <form name="formInput">
        @csrf
        <div class="container">
            <div class="mb-3">
                <label for="formGroup" class="form-label">Digite uma sequência de números inteiros, separados por Vírgula: </label>
                <input type="text"
                       size="10"
                       name="dadosInput"
                       class="form-control only-number"
                       data-accept-comma="1"
                       id="dadosInput"
                       placeholder="Ex: 1,2,5,8,1,3,5,4,6"/>
                <button type="button" class="btn btn-danger calcular">Calcular</button>
                <button type="button" class="btn btn-danger limpar">Limpar</button>
                <br><br>
            </div>
            <div class="result">
                <div class="card text-white bg-dark mb-3" id="card_escondido" style="max-width: 30rem;">
                    <div class="card-header"><h5>Fibonacci</h5></div>
                    <div class="card-body">
                        <p>Números que são fibonacci:</p>
                            <span class="card-numbers-fibonacci"></span>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <script>
        $(function(){
            //bloqueia input para receber apenas numeros e virgula.
            $(document).on('keypress', 'input.only-number', function(e) {
                var $this = $(this);
                var key = (window.event)?event.keyCode:e.which;
                var dataAcceptDot = $this.data('accept-dot');
                var dataAcceptComma = $this.data('accept-comma');
                var acceptDot = (typeof dataAcceptDot !== 'undefined' && (dataAcceptDot == true || dataAcceptDot == 1)?true:false);
                var acceptComma = (typeof dataAcceptComma !== 'undefined' && (dataAcceptComma == true || dataAcceptComma == 1)?true:false);

                if((key > 47 && key < 58)
                    || (key == 46 && acceptDot)
                    || (key == 44 && acceptComma)) {
                    return true;
                } else {
                    return (key == 8 || key == 0)?true:false;
                }
            });

            $('#card_escondido').hide();
            $('.calcular').click(function (e) {
                e.preventDefault();
                $('#card_escondido').show();
                var dadosInput = $("#dadosInput").val();
                $.ajax({
                    url: '/api/problema4',
                    type: 'POST',
                    data: {
                        'dadosInput': dadosInput,
                    },
                    dataType: 'json',
                    success: function (resposta){
                        $(".card-numbers-fibonacci").text(resposta);
                    },
                    beforeSend: function(){
                        $(".card-numbers-fibonacci").text("Calculando..");
                    }
                })
            });

            $('.limpar').click(function(){
                $('#card_escondido').hide()
                $('#dadosInput').val("");
            })
        });
    </script>
</body>
</html>
