import pool from "./db.js";

export default async function handler(req, res) {
  const ip =
    req.headers["x-forwarded-for"]?.split(",")[0] ||
    req.socket.remoteAddress;

  const geo = await fetch(`https://ipapi.co/${ip}/json/`).then(r=>r.json());

  await pool.query(
    "INSERT INTO visitors (ip,country,city,isp,browser) VALUES ($1,$2,$3,$4,$5)",
    [ip, geo.country_name, geo.city, geo.org, req.headers["user-agent"]]
  );

  res.json({ ok:true });
}
