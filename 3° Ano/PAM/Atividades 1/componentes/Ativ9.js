import React,{useState} from 'react'

export default function App() {

  const [texto,setTexto] = useState("")
  const [semcaracter,setSemCaracter] = useState("")

  const removeCaracteres=(t)=>{
    let text = t.replace(/[^a-zA-Z0-9À-ÿ]/g, " ")
    text = text.normalize('NFD').replace(/[\u0300-\u036f]/g, " ")
    setSemCaracter(text)
  }

  return (
    <>
      <label>Digite o Texto</label>
      <input type="text" value={texto} onChange={(e)=>setTexto(e.target.value)}/>
      <p>Texto Normal: {texto}</p>
      <button onClick={()=>{removeCaracteres(texto)}}>Remover Caracteres Especiais</button>
      <p>Texto sem Caracteres Especiais: {semcaracter}</p>
    </>
  )
}