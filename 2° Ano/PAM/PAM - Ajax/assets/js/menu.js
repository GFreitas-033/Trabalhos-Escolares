$(document).ready(function(){
    $('a').click(function(e){
        e.preventDefault()

        var url = $(this).attr('href')
        $('#main').empty()

        $.ajax({
            dataType: 'html',
            url: url,
            success: function(result){
                $('#main').html(result)
            }
        })
    })
})