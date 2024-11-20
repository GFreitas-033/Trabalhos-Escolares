$(document).ready(function(){
    $('tbody').empty()

    $('#formCrud').hide()

    var dados = 'operacao=read'
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        assync: true,
        data: dados,
        url: 'backend/models/eventoModel.php',
        success: function(dados){
            for(const dado of dados){
                $('tbody').append(`
                <tr>
                    <td class="text-center">${dado.ID}</td>
                    <td>${dado.TITULO}</td>
                    <td class="text-center">
                        <button id="${dado.ID}" class="btn btn-blue btn-view"><i class="fa-solid fa-eye"></i></button>
                        <button id="${dado.ID}" class="btn btn-yellow btn-edit"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button id="${dado.ID}" class="btn btn-red btn-delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>    
                `)    
            }

            $('.btn-view').click(function(e){
                e.preventDefault()

                let dados = `operacao=view&ID=${$(this).attr('id')}`
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    assync: true,
                    data: dados,
                    url: 'backend/models/eventoModel.php',
                    success: function(dados){
                        $('.form-title').empty().append('Visualição de Registro')
                        $('input[type=text]').attr('disabled', true)
                        $('input[type=password').attr('disabled', true)
                        $('#titulo').val(dados[0].TITULO)
                        $('#resumo').val(dados[0].RESUMO)
                        $('#corpo').val(dados[0].CORPO)
                        $('.btn-save').hide()
                        $('#formCrud').toggle(1000)
                    }
                })
            })

            $('.btn-edit').click(function(e){
                e.preventDefault()

                let dados = `operacao=view&ID=${$(this).attr('id')}`
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    assync: true,
                    data: dados,
                    url: 'backend/models/eventoModel.php',
                    success: function(dados){
                        $('.form-title').empty().append('Edição de Registro')
                        $('input[type=text]').attr('disabled', false)
                        $('input[type=password').attr('disabled', false)
                        $('#titulo').val(dados[0].TITULO)
                        $('#resumo').val(dados[0].RESUMO)
                        $('#corpo').val(dados[0].CORPO)
                        $('#id').val(dados[0].ID)
                        $('.btn-save').attr('data-operation', 'update').show()
                        $('#formCrud').toggle(1000)
                    }
                })
            })

            $('.btn-delete').click(function(e){
                e.preventDefault()

                let dados = `operacao=delete&ID=${$(this).attr('id')}`
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    assync: true,
                    data: dados,
                    url: 'backend/models/eventoModel.php',
                    success: function(dados){
                        $('#content').empty()
                        $('#content').load('frontend/screens/views/evento.html')
                    }
                })
            })
        }
    })

    $('.btn-new').click(function(e){
        e.preventDefault()
        $('#formCrud').toggle(1000)

        $('.form-title').empty().append('Cadastro de Eventos')
        $('input[type=text]').attr('disabled', false)
        $('input[type=password').attr('disabled', false)
        $('input[type=text]').val('')
        $('input[type=password').val('')

        $('.btn-save').attr('data-operation', 'create').show()
    })

    $('.btn-save').click(function(e){
        e.preventDefault()
        let dados = $('#form-evento').serialize()
        dados += `&operacao=${$('.btn-save').attr('data-operation')}`
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            assync: true,
            data: dados,
            url: 'backend/models/eventoModel.php',
            success: function(dados){
                $('#content').empty()
                $('#content').load('frontend/screens/views/evento.html')
            }
        })
    })
})