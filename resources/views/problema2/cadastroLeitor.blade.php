<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
    <title>Cadastro de Leitores</title>
</head>
<body>
<div class="mx-5 my-5">
    <h1>Cadastro de Leitores - Biblioteca de Universidade</h1>

        <form method="post" nome="cadastroLeitor">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do Leitor">
            </div>

            <div class="form-group">
                <label for="tipoLeitor">Tipo:</label>
                <select id="tipo" name="tipo" class="form-control">
                    <option value="">Selecione</option>
                    <option value="P">Professor</option>
                    <option value="A">Aluno</option>
                </select>
            </div>  

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Digite o seu email">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Digite o seu telefone">
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Digite o seu endereço">
            </div>

            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" class="form-control" placeholder="Digite o seu CEP">
            </div>
            <br>
            <button type="submit" for="cadastroLeitor" class="btn btn-primary" id="btn-cadastroLeitor">Cadastrar</button>
            <br><br>            
        </form>
    </div>
    <script src="/js/cadastroLeitores.js"></script>
</body>
</html>
