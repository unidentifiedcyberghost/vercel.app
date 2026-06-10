import pool from "./db.js";

export default async function handler(req,res){
  const { rows } = await pool.query("SELECT * FROM visitors ORDER BY time DESC");

  if(req.query.format === "csv"){
    const csv = rows.map(r=>Object.values(r).join(",")).join("\n");
    res.setHeader("Content-Type","text/csv");
    res.send(csv);
  } else {
    res.json(rows);
  }
}