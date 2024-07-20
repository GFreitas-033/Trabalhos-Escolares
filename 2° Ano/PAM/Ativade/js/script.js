$(document).ready(function(){
    $('.btn-achar').click(function(e){
        e.preventDefault()

        var cep = $('#CEP').val()
        var achar = `https://viacep.com.br/ws/${cep}/json/`

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            assync: true,
            url: achar,
            success: function(dados){
                $('#logradouro').val(dados.logradouro)
                $('#bairro').val(dados.bairro)
                $('#cidade').val(dados.localidade)
                $('#uf').val(dados.uf)
            }
        })
    })
})