$(document).ready(function(){
    $('.links').click(function(e){
        e.preventDefault()
        let url = $(this).attr('href')

        $('#content').empty()
        $('#content').load(url)
    })
})