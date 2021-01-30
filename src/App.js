import { Button, FormControl, InputLabel } from "@material-ui/core";
import React, { useEffect } from "react";
import { useState } from "react";
import db from "./firebase";
import "./App.css";
import Message from "./Message";

function App() {
  const [input, setInput] = useState("");
  const [messages, setMessages] = useState([]);
  const [username, setUsername] = useState("");

  useEffect(() => {
    db.collection("messages").onSnapshot((snapshot) => {
      setMessages(snapshot.docs.map((doc) => doc.data()));
    });
  }, []);

  useEffect(() => {
    setUsername(prompt("Please enter"));
  }, []);

  const sendMessage = (event) => {
    event.preventDefault();
    setMessages([...messages, { username: username, text: input }]);
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

      {messages.map((message) => (
        <Message username={username} message={message} />
      ))}
    </div>
  );
}

export default App;
