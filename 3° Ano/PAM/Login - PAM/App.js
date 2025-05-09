import React, { useState } from 'react';
import Login from './components/Login';
import Dashboard from './components/Dashboard';

export default function App(){

    const [loggedIn, setLoggedIn] = useState(false);
    const handleLogin = (email, password) => {
        if(email === 'adm@adm.com.br' && password === 'adm123'){
            setLoggedIn(true);
        }else{
            alert('Email e/ou senha inválidos');
        }
    };
    return(
        <div className="App">
            {loggedIn ? <Dashboard/> : <Login onLogin={handleLogin}/>}
        </div>
    );
};