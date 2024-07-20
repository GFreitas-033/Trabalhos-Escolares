var botoes = document.querySelectorAll('.btn')

var total = 0

botoes.forEach(botao => {
    botao.addEventListener('click', () => {
        var qtde = prompt("Produto selecionado: " + botao.id + "\nValor: " + botao.dataset.value + 
        "\nInforme a quantidade desejada:")

        total += parseFloat(qtde) * parseFloat(botao.dataset.value.replace(',','.'))

        alert(total)
    })
})