
// Regex preg_match('/(?:[0-9]|,)*/', $array_input, $encontrados);
$(function(){
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

    $('#card_escondido').hide()
    $('.calcular').click(function (e) {
        $('#card_escondido').show();
        e.preventDefault();
        $.ajax({
            url: '/problema2',
            type: 'POST',
            data: {
                'dadosInput': $("#dadosInput").val(),
            },
            dataType: 'json',
            sucess: function(response){
                console.log(response);
            },
            beforeSend: function(){
                console.log("Enviando dados do Input");
            }
        }).done(function(){
            console.log("Dados do Input Coletados");
        })
    });

    $('.limpar').click(function(){
        $('#card_escondido').hide()
        $('#dadosInput').val("");
    })
});
