import React,{useState} from "react"

export default function Ativ4(){
    const taxaReal = 5.30
    const [valorDolar,setValorDolar] = useState()
    const [valorReal,setValorReal] = useState()

    const converter = ()=>{
        setValorReal(parseFloat(valorDolar*taxaReal).toFixed(2))
    }
    return(
        <><br />
        <label>Valor em Dolar:  </label>
            <input type="number" value={valorDolar} onChange={(e)=>setValorDolar(e.target.value)}/><br />
        <button onClick={()=>{converter()}}>Converter</button><br />
        <p>Valor em Dolar $ {valorDolar}<br />Valor em Real R$ {valorReal}</p><br />
        </>
    )
}