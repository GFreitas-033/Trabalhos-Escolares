$(document).ready(function(){
    $('tbody').empty()

    var dados = 'operacao=read'
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        assync: true,
        data: dados,
        url: 'backend/models/noticiaModel.php',
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
        }
    })
})