export const config = { runtime: "edge" };

export default async function handler(req){
  const encoder = new TextEncoder();
  const stream = new ReadableStream({
    start(controller){
      setInterval(async ()=>{
        const r = await fetch("/api/visitors");
        controller.enqueue(encoder.encode(`data:${await r.text()}\n\n`));
      },3000);
    }
  });
  return new Response(stream,{
    headers:{
      "Content-Type":"text/event-stream",
      "Cache-Control":"no-cache"
    }
  });
}