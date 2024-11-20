import React,{useState} from 'react'

export default function App() {

  const [texto,setTexto] = useState("")
  const [palavra,setPalavra] = useState("")
  const [vf,setVF] = useState()

  const verifica=(t)=>{
    t = t.toLowerCase().replace(/\s/g, '')
    let invertido = t.split('').reverse().join('')
    if(t === invertido){
        setVF(true)
    }else{
        setVF(false)
    }
  }

  return (
    <>
      <label>Digite o Texto</label>
      <input type="text" value={texto} onChange={(e)=>setTexto(e.target.value)}/>
      <p>Texto Normal: {texto}</p>
      <button onClick={()=>{verifica(texto)}}>Verificar</button>
      <p>{vf?"Verdade":"Falso"}</p>
    </>
  )
}