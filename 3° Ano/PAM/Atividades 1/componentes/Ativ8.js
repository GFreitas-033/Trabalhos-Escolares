import React,{useState} from 'react'

export default function App() {

  const [texto,setTexto] = useState("")
  const [palavra,setPalavra] = useState("")
  const [num,setNum] = useState(0)
  

  const contarPalavra=(t,p)=>{
    let text = t.toLocaleLowerCase()
    let pal = p.toLocaleLowerCase()
    let conta=0
    
    text = text.split(' ')

    for(let i=0;i<text.length;i++){
        if(text[i]===pal) {
            conta++
        }
    }
    setNum(conta)
  }

  return (
    <>
      <label>Digite o Texto</label>
      <input type="text" value={texto} onChange={(e)=>setTexto(e.target.value)}/><br/>
      <label>Digite a Palavra</label>
      <input type="text" value={palavra} onChange={(e)=>setPalavra(e.target.value)}/>
      <p>Texto Normal: {texto}</p>
      <p>Palavras Iguais: {num}</p>
      <button onClick={()=>{contarPalavra(texto,palavra)}}>Contar Vogal</button>
    </>
  )
}