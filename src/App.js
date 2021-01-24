import React from 'react';
import { useState } from 'react';
import './App.css';

function App() {
  const [input,setInput] = useState('');

  console.log(input);

  const sendMessage = (event) =>{
    
  }
  return (
    <div className="App">
      <input value={input} onChange={event =>setInput(event.target.value)}/>
      <button>Send Message</button>
    </div>
  );
}

export default App;
