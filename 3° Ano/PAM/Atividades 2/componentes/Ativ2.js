import React,{useState} from "react"

export default function Ativ2(){
    const [nome,setNome] = useState("")
    const [idade,setIdade] = useState("")
    const [endereco,setEndereco] = useState("")
    const [mostrar,setMostrar] = useState(false)

    const mudarCheckbox = (e) => {
        setMostrar(e.target.checked)
    }

    return(
        <><br />
            <label>Nome:  </label>
                <input type="text" value={nome} onChange={(e)=>setNome(e.target.value)}/><br />
            <label>Idade:  </label>
                <input type="number" value={idade} onChange={(e)=>setIdade(e.target.value)}/><br />

            <input type="checkbox" checked={mostrar} onChange={mudarCheckbox}/>Mostrar Outro Campo

            <div style={{ display: mostrar ? "block" : "none" }}>
                <label>Endereço:  </label>
                    <input type="text" value={endereco} onChange={(e)=>setEndereco(e.target.value)}/><br />
            </div><br />
        </>
    )
}