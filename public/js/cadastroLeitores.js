$(function(){

    $("#btn-cadastroLeitor").on("click", function(){  
        getInputs();
    })
})

function getInputs(){
    var nome = $("#nome").val();
    var tipo = $("#tipo").val();
    var email = $("#email").val();
    var telefone = $("#telefone").val();
    var endereco = $("#endereco").val();
    var cep = $("#cep").val();

    console.log("Teste");

    $.ajax({
        url: '/cadastroLeitor',
        type: 'POST',
        data: {
            'nome': nome,
            'tipo': tipo,
            'email': email,
            'telefone': telefone,
            'endereco': endereco,
            'cep': cep,
        },
        beforeSend: function(){
            console.log("Coletando dados dos formulários...");
        }
    })
    .done(function(resposta){
        console.log("Tudo certo, pode prosseguir!!!");
        location.reload();
    })
}   