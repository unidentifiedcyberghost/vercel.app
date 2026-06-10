
import { useEffect, useState } from "react";

export default function App() {
  const [log, setLog] = useState([]);
  const [active, setActive] = useState(0);

  useEffect(() => {
    const ws = new WebSocket("ws://localhost:5000");

    ws.onmessage = (msg) => {
      const data = JSON.parse(msg.data);
      setActive(data.activeThreats);
      setLog((prev) => [data.event, ...prev.slice(0, 8)]);
    };

    return () => ws.close();
  }, []);

  return (
    <div style={{padding:20}}>
      <h1>🌍 UCG Cyber Threat Command Center</h1>

      <div style={{display:"flex", gap:20}}>
        <div style={{flex:1, padding:10, background:"#0b1220"}}>
          <h2>🔥 Active Threats: {active}</h2>
          <p>Realtime global simulation feed</p>
        </div>

        <div style={{flex:2, padding:10, background:"#0b1220"}}>
          <h2>📡 Live Threat Log</h2>
          {log.map((l,i)=>(
            <div key={i} style={{fontSize:12, marginBottom:5}}>
              {l.time} | {l.source} ➝ {l.target} | {l.type} | {l.severity}
            </div>
          ))}
        </div>
      </div>

      <div style={{marginTop:20, padding:10, background:"#0b1220"}}>
        <h2>📊 Attack Intelligence Panel</h2>
        <p>DDoS / Phishing / Malware stats stream coming from server...</p>
      </div>
    </div>
  );
}
