import React, { useState } from 'react';

export default function RecuperarSenha(){
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const recupera = (e)=>{
        e.preventDefault()
        if(email==="adm@adm.com.br"){
            setPassword("adm123")
        }
        else{
            setPassword("Email Invalido")
        }
    }

    const volta = (e)=>{
        e.preventDefault();
        window.location.reload()
    }

    return(
        <div className='login-container'>
            <h2>Recuperar Senha</h2>
            <form>
                <label htmlFor="email">Informe um Email Valido:</label>
                <input
                    type="email"
                    id="email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    required
                />
                <label htmlFor="password">A Senha é:</label>
                <input
                    type="text"
                    id="password"
                    value={password}
                    onChange={(e) => setPassword(e.target.value)}
                    disabled
                />
                <button onClick={recupera}>Verificar</button>
                <button onClick={volta}>Voltar ao Login</button>
            </form>
        </div>
    );
}