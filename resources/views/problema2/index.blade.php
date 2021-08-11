<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>
    <title>Teste 2</title>
</head>
<body>
    <div class="container" style="justify-content: center">
        <div class="callout large primary">
            <div class="row column text-center">
                <h1>Solucionando Problemas</h1>
                <h2 class="subheader">Problema 2</h2>
            </div>
        </div>
        <h3><center>Cadastro de Livros - Biblioteca de Universidade</center></h3>
        <br><br>
        <form>
            @csrf
            <div>
                <label for="nome">Nome Livro: </label>
                <input type="text" id="nomeLivro" name="nomeLivro" class="form-control" placeholder="Digite o nome do Livro">
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
                <label for="leitor">Leitor:</label>
                <select id="leitor" name="leitor" class="form-control">
                    @if(!empty( $leitores))
                        @foreach( $leitores as $leitor )
                            <option data-name="{{ $leitor->nome }}" value="{{ $leitor->tipo }}">{{ $leitor->nome }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <br>
            <button type="button" class="btn btn-primary" id="cadastraLivro">Cadastrar</button>
        </form>
        <br><br>
        <div class="form-group">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Livro</th>
                    <th scope="col">Leitor</th>
                    <th scope="col">Tipo Leitor</th>
                    <th scope="col">Data Cadastro</th>
                    <th scope="col">Recibo</th>
                </tr>
                </thead>
                <tbody class="dados-tabela">
                    <!-- Aqui é injetado o corpo da tabela utilizando javascript -->
                </tbody>
            </table>
              <!-- Modal para imprimir recibo -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Recibo de Empréstimo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Livro:  </strong><span id="rec_livro">NomeLivro</span></p>
                        <p><strong>Leitor:  </strong><span id="rec_leitor">NomeLeitor</span></p>
                        <p><strong>TipoLeitor:  </strong><span id="rec_tipo">TipoLeitor Por extenso</span></p>
                        <p><strong>Data Emprestimo:  </strong><span id="rec_data_emprestimo">Data Emprestimo</span></p>
                        <p><strong>Data Entrega:  </strong><span id="rec_data_entrega">Data Entrega</span></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <a href="/cadastroLeitor" class="btn btn-primary" id="cadastro-leitor">Cadastrar Leitor</a>
        </div>
    </div>
    <script src="/js/biblioteca.js"></script>
</body>
</html>
