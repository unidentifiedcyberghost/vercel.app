export default async function handler(req, res) {
  try {
    const ip =
      req.headers["x-forwarded-for"]?.split(",")[0] ||
      req.socket.remoteAddress;

    const r = await fetch(`https://ipapi.co/${ip}/json/`);
    const geo = await r.json();

    res.status(200).json({
      ip,
      country: geo.country_name,
      country_code: geo.country_code,
      city: geo.city,
      lat: geo.latitude,
      lon: geo.longitude,
      org: geo.org,
      asn: geo.asn
    });
  } catch (e) {
    res.status(500).json({ error: "Geo lookup failed" });
  }
}