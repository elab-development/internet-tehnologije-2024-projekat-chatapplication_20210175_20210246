import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import api from "../api";
import "./ChatList.css";

export default function ChatList() {
  const [chats, setChats] = useState([]);

  useEffect(() => {
    const fetchChats = async () => {
      try {
        const res = await api.get("/chat");
        setChats(res.data.data);
      } catch (err) {
        console.error("Error loading chats", err);
      }
    };
    fetchChats();
  }, []);

  return (
    <div className="chatlist-wrapper">
      <div className="chatlist-card">
        <h2>Your Chats</h2>

        {chats.length === 0 ? (
          <p>No chats yet</p>
        ) : (
          <ul>
            {chats.map((chat) => (
              <li key={chat.id}>
                <span>
                  {chat.name}{" "}
                  <em style={{ color: "#666", fontSize: "0.9rem" }}>
                    ({chat.is_private ? "Private" : "Group"})
                  </em>
                </span>
                <Link to={`/chat/${chat.id}`}>Open</Link>
              </li>
            ))}
          </ul>
        )}

        <div className="chatlist-actions">
          <a href="/new-chat" className="private">+ Private Chat</a>
          <a href="/new-group-chat" className="group">+ Group Chat</a>
          <a href="/dashboard" className="group">Nazad</a>
        </div>
      </div>
    </div>
  );
}
