import {
  Button,
  FormControl,
  InputLabel,
} from "@material-ui/core";
import React, { useEffect } from "react";
import { useState } from "react";
import "./App.css";
import Message from "./Message";

function App() {
  const [input, setInput] = useState("");
  const [messages, setMessages] = useState([
  {username : 'rian',text :'hey guys'},
  {username : 'qazi',text: 'whats up'},
  {username : 'haha',text : 'How are u?'}]);
  const [username,setUsername] = useState('');


  useEffect(() =>{
    setUsername(prompt('Please enter'))
  },[])


  const sendMessage = (event) => {
    event.preventDefault();
    setMessages([...messages, input]);
    setInput("");
  };
  return (
    <div className="App">
    <h2>Welcome {username}</h2>
      <form>
        <FormControl>
          <InputLabel>Enter a message</InputLabel>
          <input
            value={input}
            onChange={(event) => setInput(event.target.value)}
          />
          <Button
            disabled={!input}
            variant="contained"
            color="primary"
            type="submit"
            onClick={sendMessage}
          >
            Send Message
          </Button>
        </FormControl>
      </form>

      {
        messages.map(message =>(
          <Message username={message.username} text={message.text}/>
         
        ))
      }
     
    </div>
  );
}

export default App;
