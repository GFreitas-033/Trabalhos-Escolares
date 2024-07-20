const display = document.getElementById('display')
var botoes = document.querySelectorAll('.btn')
var valor = ''
var resultado = ''
var operacao = ''

botoes.forEach(function (botao) {
    botao.addEventListener('click', function () {
        var valorbtn = this.dataset.value

        switch (valorbtn) {
            case '*':
                operacao = valorbtn
                resultado = valor
                valor = ''
                break
            case '/':
                operacao = valorbtn
                resultado = valor
                valor = ''
                break
            case '-':
                operacao = valorbtn
                resultado = valor
                valor = ''
                break
            case '+':
                operacao = valorbtn
                resultado = valor
                valor = ''
                break


            case '=':
                if (operacao == '+') {
                    resultado = parseFloat(resultado) + parseFloat(valor)
                } else if (operacao == '-') {
                    resultado = parseFloat(resultado) - parseFloat(valor)
                } else if (operacao == '*') {
                    resultado = parseFloat(resultado) * parseFloat(valor)
                } else if (operacao == '/') {
                    resultado = parseFloat(resultado) / parseFloat(valor)
                }
                valor = ''
                display.innerHTML = resultado
                break

            default:
                console.log(resultado)
                valor += valorbtn.replace(/[^0-9+\-*/=,.]/g, '')
                display.innerHTML = valor
        }
    })
})