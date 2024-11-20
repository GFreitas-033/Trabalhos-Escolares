import React,{useState} from "react"

export default function Ativ3(){
    const [peso,setPeso] = useState("")
    const [altura,setAltura] = useState("")
    const [imc,setImc] = useState(0)
    const [classe,setClasse] = useState("")

    const verificaIMC = ()=>{
        setImc(peso/(altura*altura))
        verificaClasse()
    }

    const verificaClasse = ()=>{
        if(imc >= 18){
            setClasse("Magro")
        }else if(imc <= 25){
            setClasse("Normal")
        }else if(imc <= 30){
            setClasse("Sobrepeso")
        }else if(imc <= 35){
            setClasse("Obesidade Grau I")
        }else if(imc <= 40){
            setClasse("Obesidade Grau II")
        }else{
            setClasse("Obesidade Grau III")
        }
    }

    return(
        <><br />
            <label>Peso:  </label>
                <input type="text" value={peso} onChange={(e)=>setPeso(e.target.value)}/><br />
            <label>Altura:  </label>
                <input type="text" value={altura} onChange={(e)=>setAltura(e.target.value)}/><br />
            <p>IMC: {imc.toFixed(2)}</p>
            <p>Classe: {classe}</p>
            <button onClick={()=>{verificaIMC()}}>Ver IMC</button><br />
        </>
    )
}