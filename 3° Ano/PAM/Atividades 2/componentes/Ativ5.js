import React,{useState} from "react"

export default function Ativ5(){
    const [numero,setNumero] = useState(0)
    const [mensagem,setMensagem] = useState(false)
    const [numAleatorio,setNumAleatorio] = useState((Math.floor(Math.random() * 10) + 1))

    const click = ()=>{
        setMensagem(true)
    }
    const aparece = (m)=>{
        if(m==true){
            if(numAleatorio==numero){
                return <p>Você Ganhou<br /></p>
            }
            if(numAleatorio>numero && (numAleatorio!="" || numAleatorio!=0)){
                return <p>O Número é maior do que o digitado<br /></p>
            }
            if(numAleatorio<numero && (numAleatorio!="" || numAleatorio!=0)){
                return <p>O Número é menor do que o digitado<br /></p>
            }
        }
    }

    return(
        <>
            <button onClick={()=>{click()}}>Começar o Jogo</button><br />
            <label>Escolha um Número de 1 a 10:  </label>
                <input type="number" value={numero} onChange={(e)=>setNumero(e.target.value)}/><br />
            <p>{aparece(mensagem)}</p><br />
        </>
    )
}