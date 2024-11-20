$(document).ready(function(){
    var i=1;
    let a = ""
    let n = ""
    let l = ""
    let m = ""
    let que = ""
    $('.tecla').click(function(e){
        e.preventDefault()
        let tecla = $(this).attr('id')
        console.log(tecla)
        if((tecla=="A")||(tecla=="N")||(tecla=="I")||(tecla=="M")||(tecla=="E")){
            if(tecla=="A"){
                $('#a').removeClass('some')
                a="A"
            }else if(tecla=="N"){
                $('#n').removeClass('some')
                n="N"
            }else if(tecla=="I"){
                $('#i').removeClass('some')
                l="I"
            }else if(tecla=="M"){
                $('#m').removeClass('some')
                m="M"
            }else if(tecla=="E"){
                $('#e').removeClass('some')
                que="E"
            }
            $('#'+tecla).removeClass('tecla').addClass('mudaTeclaC')
            if((a=="A") && (n=="N") && (l=="I") && (m=="M") && (que=="E")){
                $('.container-3').removeClass('some')
                $('.container').addClass('some')
            }
        }else{
            $('.forca').attr('src', 'assets/img/forca0'+i+'.png')
            $('#'+tecla).removeClass('tecla').addClass('mudaTeclaE')
            i++
            console.log(i)
            if(i==8){
                $('.container-2').removeClass('some')
                $('.container').addClass('some')
                i=0
            }
        }
    })
    
    $('.recomeca').click(function(e){
        e.preventDefault()
        location.reload()
    })
})