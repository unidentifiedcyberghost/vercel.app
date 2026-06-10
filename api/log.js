// /api/log.js
let VISITORS = global.VISITORS || [];
global.VISITORS = VISITORS;

export default async function handler(req, res) {
  try {
    const ip =
      req.headers["x-forwarded-for"]?.split(",")[0] ||
      req.socket.remoteAddress;

    const geoRes = await fetch(`https://ipapi.co/${ip}/json/`);
    const geo = await geoRes.json();

    const entry = {
      time: new Date().toISOString(),
      ip,
      country: geo.country_name || "Unknown",
      city: geo.city || "",
      isp: geo.org || "",
      browser: req.headers["user-agent"]
    };

    VISITORS.push(entry);

    // Keep last 500 visits (memory-safe)
    if (VISITORS.length > 500) VISITORS.shift();

    res.status(200).json({ status: "logged" });
  } catch (e) {
    res.status(500).json({ error: "log_failed" });
  }
}