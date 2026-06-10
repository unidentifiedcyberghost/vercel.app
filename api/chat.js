import OpenAI from "openai";

const client = new OpenAI({
  apiKey: process.env.OPENAI_API_KEY
});

export default async function handler(req, res) {
  const { message } = req.body;

  const response = await client.chat.completions.create({
    model: "gpt-4o-mini",
    messages: [
      {
        role: "system",
        content: "You are CYBER OS AI, a dystopian operating system assistant from a cyberpunk world."
      },
      { role: "user", content: message }
    ]
  });

  res.status(200).json({
    reply: response.choices[0].message.content
  });
}