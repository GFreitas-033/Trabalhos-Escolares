import React, { useState } from 'react';
import Recupera from "./Recuperar"

export default function Login({onLogin}){
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [click, setClick] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();
        onLogin(email, password);
    };

    const verClick = ()=>{
        setClick(!click);
    }

    return(
        <div className='login-container'>
            {click ? <Recupera/> : 
                <div>
                    <h2>Login</h2>
                    <form onSubmit={handleSubmit}>
                        <label htmlFor="email">Email:</label>
                        <input
                            type="email"
                            id="email"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                            required
                        />
                        <label htmlFor="password">Senha:</label>
                        <input
                            type="password"
                            id="password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                            required
                        />
                        <button>Logar</button>
                        <button id="forgot-password" onClick={verClick}>Recuperar Senha</button>
                    </form>
                </div>
            }
        </div>
    );
}