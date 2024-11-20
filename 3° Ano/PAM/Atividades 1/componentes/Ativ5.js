import React,{useState} from 'react'

export default function App() {

  const [texto,setTexto] = useState("")
  const [palavra1,setPalavra1] = useState("")
  const [palavra2,setPalavra2] = useState("")
  const [novotexto,setNovoTexto] = useState("")

  const textoModificado=()=>{
    setNovoTexto(texto.replace(palavra1, palavra2))
  }

  return (
    <>
      <label>Digite o Texto</label>
      <input type="text" value={texto} onChange={(e)=>setTexto(e.target.value)}/><br/>
    
      <label>Digite a Palavra do Texto</label>
      <input type="text" value={palavra1} onChange={(e)=>setPalavra1(e.target.value)}/><br/>
      
      <label>Digite a nova Palavra</label>
      <input type="text" value={palavra2} onChange={(e)=>setPalavra2(e.target.value)}/><br/>

      <p>Texto Normal: {texto}</p>
      <p>Palavra 1: {palavra1}</p>
      <p>Palavra 2: {palavra2}</p>
      <button onClick={textoModificado}>Modificar</button>
      <p>Texto Modificado: {novotexto}</p>
    </>
  )
}