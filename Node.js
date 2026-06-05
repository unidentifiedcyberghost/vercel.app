import express from "express";
import cors from "cors";
import OpenAI from "openai";

const app = express();
app.use(cors());
app.use(express.json());

const client = new OpenAI({
  apiKey: process.env.OPENAI_API_KEY
});

app.post("/api/ai", async (req, res) => {
  const { message } = req.body;

  const response = await client.chat.completions.create({
    model: "gpt-4.1-mini",
    messages: [
      {
        role: "system",
        content: "You are a cyber security tutor in a training simulator. Teach, do not hack real systems."
      },
      {
        role: "user",
        content: message
      }
    ]
  });

  res.json({
    reply: response.choices[0].message.content
  });
});

app.listen(3000, () => console.log("AI Server running"));
