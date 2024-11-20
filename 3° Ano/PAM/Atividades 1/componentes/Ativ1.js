import React,{useState} from 'react'

export default function App() {

  const [texto,setTexto] = useState("")

  return (
    <>
      <label>Digite o Texto</label>
      <input type="text" value={texto} onChange={(e)=>setTexto(e.target.value)}/>
      <p>Texto Normal: {texto}</p>
      <p>Texto Invertido: {texto.split('').reverse().join('')}</p>
    </>
  )
}