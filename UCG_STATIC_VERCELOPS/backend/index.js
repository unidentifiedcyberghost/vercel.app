import express from 'express';
import { WebSocketServer } from 'ws';

const app=express();
const server=app.listen(process.env.PORT||8080);
const wss=new WebSocketServer({server});

const C=['USA','China','Russia','India','Brazil','PH'];
const A=['DDoS','SSH','SQLi','Phishing'];

wss.on('connection',ws=>{
 setInterval(()=>{
  ws.send(JSON.stringify({
   time:new Date().toISOString(),
   source:C[Math.random()*C.length|0],
   target:C[Math.random()*C.length|0],
   type:A[Math.random()*A.length|0]
  }));
 },1000);
});