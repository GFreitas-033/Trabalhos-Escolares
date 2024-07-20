//Pedra Papel Tesoura
var botoes1 = document.querySelectorAll('.btn')

function aleatorio(min, max) {
    return (Math.random() * (max - min) + min).toFixed()
}

botoes1.forEach(function (botao1){
    botao1.addEventListener('click', function(){
        var valorbtn = this.dataset.value
        console.log(valorbtn)

        var comp = aleatorio(1, 3);
        console.log(comp)

        if((valorbtn==1 && comp==3) || (valorbtn==2 && comp==1) || (valorbtn==3 && comp==2)){
            alert("Você Ganhou!!!")
        }else if((comp==1 && valorbtn==3) || (comp==2 && valorbtn==1) || (comp==3 && valorbtn==2)){
            alert("Computador Ganhou!!!")
        }else{
            alert("Empate")
        }
    })
})

//Escolha dos Personagens
var botoes2 = document.querySelectorAll('.personagens')

botoes2.forEach(function (botao2){
    botao2.addEventListener('click', function(){
        var valor = this.dataset.value
        console.log(valor) 
    })
})


var imagem1 = document.createElement("div")
imagem1.style.backgroundImage = "url('img/pp" + parseInt(valor) + ".png')"
imagem1.classList.add("player", "person")
document.body.appendChild(imagem1)

var perale = aleatorio(1, 3)
var imagem2 = document.createElement("img")
imagem2.src = "img/pp"+parseInt(perale)+".png"
imagem2.classList.add("enemy p1 person")
document.body.appendChild(imagem2)