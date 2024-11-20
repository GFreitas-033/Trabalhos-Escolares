const formulario = document.getElementById('contatoForm')
const nomeInput = document.getElementById('nome')
const emailInput = document.getElementById('email')
const msgInput = document.getElementById('msg')

formulario.addEventListener(
    'submit', function(event){
        event.preventDefault()
        if(nomeInput.value.trim()===''){
            alert('Preencha o Campo!')
            nomeInput.focus()
            return
        }
        if(!validateEmail(emailInput)){
            alert('Email Inválido!')
            emailInput.focus()
            return
        }
        alert('Formulário enviado com sucesso!')
        formulario.submit()
    }
    
)

function validateEmail(email){
    const regex = /^[a-Za-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+(?.[a-zA-Z0-9-]+)*$/
    return regex.test(email)
}