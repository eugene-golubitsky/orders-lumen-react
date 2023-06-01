import React, {useState} from "react";
import axios from 'axios';

export const Login = (props) => {
    /**
     * TODO move to .env
     */
    const baseUrl = "http://localhost:8000";

    const [email,setEmail] = useState('');
    const [password,setPassword] = useState('');
    const handleSubmit = async (e) => {
        e.preventDefault();
        let data = await axios.post(`${baseUrl}/api/auth`, {
            email: email,
            password: password
        })
        .catch(err => {console.log(err);})
        const access_token = data?.data?.access_token;
        if(access_token) {
            sessionStorage.setItem('access_token', access_token);
            console.log(`access_token=${access_token}`);
            data = await axios.post(`${baseUrl}/api/products`, {limit: 500}, {headers: { Authorization: `Bearer ${access_token}` }})
            .catch(err => {console.log(err);})
            if(data) {
                props.stateChanger('products');
                props.setProducts(data?.data);
            }
        }
        
    }
    return (
        <div className="auth-form-container">
            <h2>Login</h2>
            <form onSubmit={handleSubmit} className="login-form">
                <label htmlFor="email">Email</label>
                <input value={email} onChange={(e)=>setEmail(e.target.value)} type="email" placeholder="youremail@mail.com" id="email" name="email"/>
                <label htmlFor="password">Password</label>
                <input value={password} onChange={(e)=>setPassword(e.target.value)} type="password" placeholder="*******" id="password" name="passwrod"/>
                <button type="sumbit">Login</button>
            </form>
        </div>
    )
}