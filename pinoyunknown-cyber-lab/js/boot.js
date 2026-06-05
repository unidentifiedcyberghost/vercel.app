const canvas = document.getElementById("matrix");
const ctx = canvas.getContext("2d");

function resize() {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
}
resize();
window.addEventListener("resize", resize);

const chars = "01ABCDEFGHIJKLMNOPQRSTUVWXYZ";
const drops = Array(Math.floor(canvas.width / 14)).fill(0);

setInterval(() => {
  ctx.fillStyle = "rgba(0,0,0,0.05)";
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  ctx.fillStyle = "#00ff00";
  ctx.font = "14px monospace";
  drops.forEach((y, i) => {
    const t = chars[Math.floor(Math.random() * chars.length)];
    ctx.fillText(t, i * 14, y * 14);
    drops[i] = y * 14 > canvas.height ? 0 : y + 1;
  });
}, 33);

document.addEventListener("click", () => {
  document.getElementById("boot-sound").play().catch(()=>{});
}, { once: true });

const bootText = document.getElementById("boot-text");
const bootScreen = document.getElementById("boot-screen");
const app = document.getElementById("app");

const lines = [
  "Booting PINOYUNKNOWN Cyber System...",
  "[ OK ] Matrix Engine Loaded",
  "[ OK ] AI Tutor Ready",
  "[ OK ] Lab Network Online",
  "WELCOME :: PINOYUNKNOWN"
];

let i = 0;
(function type() {
  if (i < lines.length) {
    bootText.textContent += lines[i++] + "\n";
    setTimeout(type, 120);
  } else {
    setTimeout(() => {
      bootScreen.style.display = "none";
      app.classList.remove("hidden");
      document.getElementById("map").classList.remove("hidden");
    }, 1000);
  }
})();