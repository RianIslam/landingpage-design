import {
  Button,
  FormControl,
  InputLabel,
} from "@material-ui/core";
import React from "react";
import { useState } from "react";
import "./App.css";
import Message from "./Message";

function App() {
  const [input, setInput] = useState("");
  const [messages, setMessages] = useState(["geeki", "hdfhd", "dhfdf"]);

  console.log(input);
  console.log(messages);

  const sendMessage = (event) => {
    event.preventDefault();
    setMessages([...messages, input]);
    setInput("");
  };
  return (
    <div className="App">
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
          <Message text={message}/>
         
        ))
      }
     
    </div>
  );
}

export default App;
