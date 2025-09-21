import { useState } from "react";
import { useAuth } from "../store/auth";
import { useNavigate, Link } from "react-router-dom";
import "./AuthForm.css"; // zajednički stil

export default function Register() {
  const { register } = useAuth();
  const navigate = useNavigate();
  const [username, setUsername] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [confirm, setConfirm] = useState("");

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await register(username, email, password, confirm);
      navigate("/dashboard");
    } catch (err) {
      alert("Register failed: " + (err.response?.data?.message || err.message));
    }
  };

  return (
    <div className="auth-page">
      <form onSubmit={handleSubmit} className="auth-card">
        <h2 className="auth-title">Register</h2>

        <input
          type="text"
          placeholder="Username"
          className="input"
          value={username}
          onChange={(e) => setUsername(e.target.value)}
        />

        <input
          type="email"
          placeholder="Email"
          className="input"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
        />

        <input
          type="password"
          placeholder="Password"
          className="input"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
        />

        <input
          type="password"
          placeholder="Confirm Password"
          className="input"
          value={confirm}
          onChange={(e) => setConfirm(e.target.value)}
        />

        <button type="submit" className="btn btn-success">
          Register
        </button>

        <Link to="/login">
          <button type="button" className="btn btn-secondary">
            Nazad na login
          </button>
        </Link>
      </form>
    </div>
  );
}
