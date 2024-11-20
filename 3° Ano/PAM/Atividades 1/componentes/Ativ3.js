import React,{useState} from 'react'

export default function App() {

  const [texto,setTexto] = useState("")
  const [letra,setLetra] = useState("")

  let text = texto.split('')
  let verifica
  
  if(text[0]===letra){
    verifica = true
  }else{
    verifica = false
  }

  return (
    <>
      <label>Digite o Texto</label>
      <input type="text" value={texto} onChange={(e)=>setTexto(e.target.value)}/><br/>
      <label>Digite a Letra</label>
      <input type="text" value={letra} onChange={(e)=>setLetra(e.target.value)}/>

      <p>Texto: {texto}</p>
      <p>Letra: {letra}</p>
      
      <p>{verifica?"Verdade":"Falso"}</p>
    </>
  )
}