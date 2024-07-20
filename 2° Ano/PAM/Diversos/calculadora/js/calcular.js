const display = document.getElementById('display')
var valor = ''
var resultado = ''
var operacao = ''

document.addEventListener('keydown', function (e) {
    switch (e.key) {
        case '*':
            operacao = e.key
            resultado = valor
            valor = ''
            break
        case '/':
            operacao = e.key
            resultado = valor
            valor = ''
            break
        case '-':
            operacao = e.key
            resultado = valor
            valor = ''
            break
        case '+':
            operacao = e.key
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
            valor += e.key.replace(/[^0-9+\-*/=,.%]/g, '')
            display.innerHTML = valor
    }
})