export default async function handler(req, res) {
  const now = new Date().toISOString();

  // Replace later with AbuseIPDB / OTX / Spamhaus via env keys
  const events = Array.from({ length: 10 }).map(() => ({
    time: now,
    src: {
      lat: -60 + Math.random() * 120,
      lon: -180 + Math.random() * 360
    },
    dst: {
      lat: -60 + Math.random() * 120,
      lon: -180 + Math.random() * 360
    },
    severity: Math.ceil(Math.random() * 5)
  }));

  res.status(200).json({ events });
}