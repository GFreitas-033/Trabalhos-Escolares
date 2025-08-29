$(document).ready(function(){
    $('.btn-login').click(function(e){
        e.preventDefault()
        let email = $('#email').val()
        let senha = $('#senha').val()

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            assync: true,
            data: {
                email: email,
                senha: senha,
                operacao: 'login'
            },
            url: 'backend/models/autorModel.php',
            success: function(dados){
                
            }
        })
    })
})