import React,{useState} from 'react'

export default function App() {

  const [texto,setTexto] = useState("")
  const [titulo,setTitulo] = useState("")

  const modificador=(texto)=>{
    let text = texto.split(' ')
    for (let i = 0; i < text.length; i++) {
        text[i] = text[i].charAt(0).toUpperCase() + text[i].slice(1).toLowerCase()
    }
    setTitulo(text.join(' '))
  }

  return (
    <>
      <label>Digite o Texto</label>
      <input type="text" value={texto} onChange={(e)=>setTexto(e.target.value)}/>
      <p>Texto Normal: {texto}</p>
      <button onClick={()=>{modificador(texto)}}>Modificar</button>
      <p>Texto em Forma de Título: {titulo}</p>
    </>
  )
}