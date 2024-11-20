import React, { useState } from 'react';

export default function RecuperarSenha(){
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const recupera = ()=>{
        if(email==="adm@adm.com.br"){
            setPassword("adm123")
        }
        else{
            setPassword("Email Invalido")
        }
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
                    
                />
                <button type="submit" onClick={recupera}>Verificar</button>
                <button type="submit">Voltar ao Login</button>
            </form>
        </div>
    );
}