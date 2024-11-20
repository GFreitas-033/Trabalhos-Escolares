import React,{useState} from "react"

export default function Ativ1(){
    const [nome,setNome] = useState("")
    const [email,setEmail] = useState("")
    const [idade,setIdade] = useState("")

    const verificarVazio = ()=>{
        if(nome=="" || email=="" || idade==""){
            alert("Vazio")
        }else{
            if(idade>18){
                alert("Você é maior de idade")
            }else{
                alert("Você é menor de idade")
            }
        }
    }


    return(
        <>
            <label>Nome:  </label>
                <input type="text" value={nome} onChange={(e)=>setNome(e.target.value)}/><br />
            <label>Email:  </label>
                <input type="text" value={email} onChange={(e)=>setEmail(e.target.value)}/><br />
            <label>Idade:  </label>
                <input type="number" value={idade} onChange={(e)=>setIdade(e.target.value)}/><br />
            <button onClick={()=>{verificarVazio()}}>Enviar</button><br />
        </>
    )
}