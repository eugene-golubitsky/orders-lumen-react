import React, {useState} from 'react';
import logo from './logo.svg';
import './App.css';
import {Login} from './Login';
import { Products } from './Products';
import {Inventory} from './Inventory';

function App() {
  const [state, setState] = useState('login');
  const [products,setProducts] = useState([]);
  const [inventory,setInventory] = useState([]);
  return (
    <div className="App">
      { 
        state === 'login' && <Login stateChanger={setState} setProducts={setProducts} /> 
      }
      {
        state === 'products' && <Products stateChanger={setState} products={products} setInventory={setInventory}/>
      }
      {
        state === 'inventory' && <Inventory stateChanger={setState} inventory={inventory}/>
      }
    </div>
  );
}

export default App;
