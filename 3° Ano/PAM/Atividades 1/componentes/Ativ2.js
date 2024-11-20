import React,{useState} from 'react'

export default function App() {

  const [texto,setTexto] = useState("")
  const [num,setNum] = useState(0)
  
  const contarVogal=(t)=>{
    let text = t.toLocaleLowerCase()
    text = text.split('')
    let conta=0
    for (let i=0; i < text.length; i++) {
        if(text[i]=="a" || text[i]=="e" || text[i]=="i" || text[i]=="o" || text[i]=="u") {
            conta++
        }
    }
    setNum(conta)
  }

  return (
    <>
      <label>Digite o Texto</label>
      <input type="text" value={texto} onChange={(e)=>setTexto(e.target.value)}/>
      <p>Texto Normal: {texto}</p>
      <p>Vogais: {num}</p>
      <button onClick={()=>{contarVogal(texto)}}>Contar Vogal</button>
    </>
  )
}