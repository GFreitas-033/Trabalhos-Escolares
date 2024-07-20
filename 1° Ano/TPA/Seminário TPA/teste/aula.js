var menor = Number.parseFloat(prompt('Digite a 1º altura:'));
var maior = menor;

for (var i = 2;i <= 5;i++){
    var altura = Number.parseFloat(prompt('Digite a ' + i + 'º altura:'))
    if (altura > maior){
    maior = altura
}
if (altura < menor){
    menor = altura
}
}

alert('A maior altura é: ' + maior.toFixed(2))
alert('A menor altura é: ' + menor.toFixed(2))