const output = document.getElementById("output");
const cmd = document.getElementById("cmd");

const keySound = document.getElementById("key-sound");
const errorSound = document.getElementById("error-sound");

const commands = {
  help: "ls, pwd, whoami, scan",
  ls: "lab.txt tools/",
  pwd: "/home/pinoyunknown",
  whoami: "student",
  scan: "Scan complete (simulated)"
};

cmd.addEventListener("keydown", e => {
  if (e.key !== "Enter") keySound.play().catch(()=>{});
  if (e.key === "Enter") {
    const v = cmd.value.trim();
    print(`$ ${v}`);
    print(commands[v] || "Command not found", !commands[v]);
    cmd.value = "";
  }
});

function print(text, err=false) {
  const d = document.createElement("div");
  d.className = "terminal-line";
  d.textContent = text;
  output.appendChild(d);
  if (err) errorSound.play().catch(()=>{});
}