moment.locale('pt-br'); //Converte datas pro idioma brasileiro
$(function(){

    /**
     * Escuta a seleção do Tipo de Leitor
     * Exibe Leitor conforme o Tipo selecionado
     */
    $("#tipo").on("change", function(){
        var tipo = $("#tipo").val();
        $("#leitor option").each(function(leitor){    

            var option = $( this ).attr('value');
            if(option != tipo){
                $( this ).attr('hidden', true);
            } else {
                $( this ).attr('hidden', false);
            }
        });
    });

    /**
     * Requisição ajax para buscar todos os Leitores
     */
    $.ajax({
        url: '/problema2',
        type: 'GET',
        data: {
            'tipo': $("#tipo").val(),
        },
        dataType: 'json',
        beforeSend: function(){
            console.log("Buscando todos os leitores...");
        }
    })
    .done(function(resposta){
        console.log(resposta);
    })

    /**
     * Escuta evento de click no botão de cadastro
     * Realiza requisição POST
     * Registra no banco de dados, o empréstimo de um livro
     */
    $("#cadastraLivro").on('click', function(e){
        e.preventDefault();

        var nomeLivro = $('#nomeLivro').val();
        var tipoLeitor = $("#tipo").val();
        var selectLeitor = $('#leitor option:selected').data('name'); //Obtém o seletor posicionado no momento da gravação.
        $.ajax({
            url: '/api/problema2',
            type: 'POST',
            data: {
                'nomeLivro': nomeLivro,
                'tipo': tipoLeitor,
                'leitor': selectLeitor,
            },
            dataType: 'json', //Recebe um JSON como resposta
            beforeSend: function(){
                console.log("Gravando no banco...");
            }
        })
        .done(function(resposta){
            location.reload();
        })
    });

    /**
     * Requisição GET para buscar todos os livros emprestados
     */
    $.ajax({
        url: '/api/problema2/reservas',
        type: 'GET',
        dataType: 'json', //Recebe os dados como JSON
        beforeSend: function(){
            console.log("Buscando todos os livros emprestados...");
        }
    })
    .done(function(resposta){
        reservas = resposta; 
        popularTabela(); //Chamada da função popularTabela, quando obter resposta da requisição.
    })
})

/**
 * Função para preenchimento da tabela com os Livros emprestados.
 * Chama a Variável reservas e realiza um mapeamento (um loop de cada linha da tabela)
 * 
 */
function popularTabela(){
    
    var table = reservas.map(element => {
        let date = moment(element.created_at).format('L'); //Formatando a data de empréstimo.
        if(element.tipoLeitor == "P"){ //Valida se é professor
            element.tipoLeitor = "Professor"; //Altera o nome para Professor
        }
        if(element.tipoLeitor == "A"){ //Valida se é aluno
            element.tipoLeitor = "Aluno"; //Altera o nome para Aluno
        }
        /**
         * retorna uma tabela, onde cada coluna é um dado que veio da resposta JSON, que veio da requisição ajax
         * Utiliza template literals para concatenar com as tags da tabela.
         * A sintaxe de template literals permite que cada elemento do array possa injetar o seu valor string dentro da posição aonde foi chamado.
         * Botão imprimir recibo tem uma função para popular dados da reserva conforme o ID que estiver posicionado
         */
        return `<tr id="${element.id}">
                    <td data-type="id">${element.id}</td>
                    <td data-type="rec_livro">${element.nomeLivro}</td>
                    <td data-type="rec_leitor">${element.leitor}</td>
                    <td data-type="rec_tipo">${element.tipoLeitor}</td>      
                    <td data-type="rec_data_emprestimo" data-date="${element.created_at}">${date}</td>
                    <td>
                        <button type="button" 
                                class="btn btn-danger" 
                                data-bs-toggle="modal" 
                                data-bs-target="#exampleModal" 
                                data-id="${element.id}" 
                                id="button" 
                                onclick="popularDadosReserva(${element.id})">Imprimir Recibo
                        </button>
                    </td>
                </tr>`
    });
    
    $(".dados-tabela").append(table); //Na tbody do html, é injetado a tabela pronta, utilizando o append função
}

/**
 * Função para Imprimir Recibo
 * Recebe o ID que foi pressionado no botão para selecionar o livro que foi reservado
 * Cria um array com todas as classes definidas como atributo na tabela
 * Variavel tableData recebe como um objeto de strings, cada valor que está nos seletor de elemento da tag td
 */
function popularDadosReserva(elemento){
    let camposModal = [
        "rec_livro",
        "rec_leitor",
        "rec_tipo",
        "rec_data_emprestimo",
        "rec_data_entrega"
    ];
    let tableData = $(`#${elemento} td`);
    let reservasTableData = {}; //Variável definida como objeto

    tableData.each(function(){ //Percorre o laço do objeto para fazer validações.
        if($(this).data('type') != undefined){ //Validação para ignorar o valor undefined que é gerado por conta do botão imprimir Recibo
            if($(this).data('date')){ //Selecionado o data-type do tipo data 
                reservasTableData[$(this).data('type')] = $(this).data('date'); //Atribuíndo valor a chave reservasTableData[do tipo data] a data recebida
            } else {
                reservasTableData[$(this).data('type')] = $(this).text(); //buscando o texto que existe na tabela e atribuíndo ao reservasTableData[da respectiva chave]
            }
        }     
    })
    
    /**
     * Validando o tipo de Leitor para atribuir a data de entrega conforme data de registro do empréstimo
     * Formatando as datas para um formato mais legível
     */
    if(reservasTableData["rec_tipo"] == "Professor"){
        reservasTableData["rec_data_entrega"] = moment(reservasTableData["rec_data_emprestimo"]).add(10, 'days').format('L'); //Acrescentando 10 dias para Professor
    }
    if( reservasTableData["rec_tipo"] == "Aluno"){
        reservasTableData["rec_data_entrega"] = moment(reservasTableData["rec_data_emprestimo"]).add(3, 'days').format('L'); //Acrescentando 3 dias para Aluno
    }
    console.log(reservasTableData);
    reservasTableData["rec_data_emprestimo"] = moment(reservasTableData["rec_data_emprestimo"]).format('L');
    
    /**
     * Populando o modal de recibo com os items recebidos da função popularDadosReserva
     * Laço percorre cada item do array
     * Seleciona na view, o mesmo item (classe definida) e preenche o valor do texto com os dados da reservasTableData[de cada item]
     */
    camposModal.forEach(function(item){
        $(`#${item}`).text(reservasTableData[item]); 
    });
}