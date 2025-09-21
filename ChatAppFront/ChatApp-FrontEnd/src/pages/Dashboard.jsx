import { useAuth } from "../store/auth";
import { useNavigate } from "react-router-dom";
import "./Dashboard.css";

export default function Dashboard() {
  const { user, logout } = useAuth();
  const navigate = useNavigate();

  return (
    <div className="dashboard-wrapper">
      <div className="dashboard-card">
        <h1>Welcome, {user?.username}</h1>
        <button
          type="button"
          onClick={() => navigate("/chats")}
          className="chats-btn"
        >
          Chats
        </button>
        <button
          onClick={logout}
          className="logout-btn"
        >
          Logout
        </button>
      </div>
    </div>
  );
}