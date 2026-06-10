
import express from "express";
import cors from "cors";
import { WebSocketServer } from "ws";

const app = express();
app.use(cors());

const server = app.listen(5000, () => {
  console.log("🔥 Cyber Threat Server running on port 5000");
});

const wss = new WebSocketServer({ server });

const countries = ["USA","China","Russia","Germany","Brazil","India","Philippines","UK"];
const attacks = ["DDoS","SSH Brute Force","SQL Injection","Phishing","Ransomware","Botnet"];

function randomIP(){
  return `${rand(255)}.${rand(255)}.${rand(255)}.${rand(255)}`;
}
function rand(n){ return Math.floor(Math.random()*n); }

function generate(){
  return {
    id: Math.random().toString(36).substring(7),
    source: countries[rand(countries.length)],
    target: countries[rand(countries.length)],
    type: attacks[rand(attacks.length)],
    ip: randomIP(),
    port: rand(9000),
    severity: ["LOW","MEDIUM","HIGH"][rand(3)],
    time: new Date().toISOString()
  };
}

wss.on("connection", (ws) => {
  console.log("Client connected");

  const interval = setInterval(() => {
    ws.send(JSON.stringify({
      activeThreats: rand(9999),
      event: generate(),
      stats: {
        ddos: rand(500),
        phishing: rand(500),
        malware: rand(500)
      }
    }));
  }, 1000);

  ws.on("close", () => clearInterval(interval));
});
