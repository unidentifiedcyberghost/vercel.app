export default function handler(req,res){
  const { password } = req.body || {};
  if(password === process.env.ADMIN_PASSWORD){
    res.json({ ok:true });
  } else {
    res.status(401).json({ ok:false });
  }
}