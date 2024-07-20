$(document).ready(function(){

    $('.preloader').hide()

    $('.img-mini').click(function(e){
        e.preventDefault()
        $('.preloader').fadeIn('1000')
        let source = $(this).attr('src')
        setTimeout(function(){
            $('#img-principal').attr('src', source).addClass('img-principal')
            $('.preloader').fadeOut('1000')
        }, 2000);
    })
})