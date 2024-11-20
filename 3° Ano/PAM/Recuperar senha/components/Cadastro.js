import React, {useState} from "react"
import './App.css'

export default function Cadastro({onSubmit}) {
  const [nome, setNome] = useState('')
  const [endereco, setEndereco] = useState('')
  const [sexo, setSexo] = useState('')
  const [idade, setIdade] = useState('')
  
  const handleSubmit = (e)=>{
    e.preventDefault()
    onSubmit({nome, endereco, sexo, idade})
  }

  return (
    <div>
      <h1>Cadastro</h1>
      <form onSubmit={handleSubmit}>
        <div>
          <label>Nome:</label>
          <input type="text" placeholder="Nome"
          value={nome}
          onChange={(e)=> setNome(e.target.value)}
          required />
        </div>

        <div>
          <label>Endereço:</label>
          <input type="text" placeholder="Endereço"
          value={endereco}
          onChange={(e)=> setEndereco(e.target.value)}
          required />
        </div>

        <div>
          <label>Sexo:</label>
          <select value={sexo} onChange={(e)=> setSexo(e.target.value)}>
            <option value="" disabled>Selecione</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="Outro">Outro</option>
          </select>
        </div>

        <div>
          <label>Idade:</label>
          <input type="number" placeholder="Idade"
          value={idade}
          onChange={(e)=> setIdade(e.target.value)}
          required />
        </div>

        <button type="submit">Cadastrar</button>
      </form>
    </div>
  )
}

function CriarLogin({onSubmit}){
  const [email, setEmail] = useState('')
  const [senha, setSenha] = useState('')

  const validarSenha = (senha) => {
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/
    return regex.test(senha)
  }
  
  const handleSubmit = (e) => {
    e.preventDefault()
    if(!validarSenha(senha)){
      alert("Erro")
    }
    onSubmit({email,senha})
  }

  return(
    <div>
      <h2>Criar Login</h2>
      <form onSubmit={handleSubmit}>
        <div>
          <label>Email:</label>
          <input type="email" value={email}
          onChange={(e)=>setEmail(e.target.value)} required />
        </div>
        <div>
          <label>Senha:</label>
          <input type="password" value={senha}
          onChange={(e)=> setSenha(e.target.value)} required />
        </div>
        <button type="submit">Criar Login</button>
      </form>
    </div>
  )
}

export default function App(){
  const [userData, setUserData] = useState(null)
  
  const handleCadastroSubmit = (data) => {
    setUserData(data)
  }

  const handleLoginSubmit = (data) => {
    alert("Usuário logado com sucesso!"+data.email)
    setUserData(null)
  }

  return(
    <div className="App">
      {userData ? (
        <CriarLogin onSubmit={handleLoginSubmit} />
      ):(
        <Cadastro onSubmit={handleCadastroSubmit} />
      )}
    </div>
  )
}