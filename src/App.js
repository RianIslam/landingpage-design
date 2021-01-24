import React from 'react';
import { useState } from 'react';
import './App.css';

function App() {
  const [input,setInput] = useState('');
  const [messages,setMessages] = useState(["geeki","hdfhd","dhfdf"]);

  console.log(input);
  console.log(messages);

  const sendMessage = (event) =>{
    setMessages ([...messages,input]);
  setInput('')
  }
  return (
    <div className="App">
      <input value={input} onChange={event =>setInput(event.target.value)}/>
      <button onClick={sendMessage}>Send Message</button>
    
    {
      messages.map(messages => (
        <p>{messages}</p>
      ))
    }
    </div>
  );
}

export default App;
