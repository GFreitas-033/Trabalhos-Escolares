import React from "react"

const users = [
    {name: 'José', email: 'j@email.com'},
    {name: 'Maria', email: 'm@email.com'},
    {name: 'João', email: 'jj@email.com'},
]

export default function Dashboard(){
    return(
        <div className="dashboard-container">
            <h2>Dados do Usuário</h2>

            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    {users.map((user, index)=>(
                        <tr key={index}>
                            <td>{user.name}</td>
                            <td>{user.email}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    )
}