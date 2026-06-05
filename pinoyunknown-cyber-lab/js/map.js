const progress = {
  "linux-basics": true,
  "web-exploit": false,
  "priv-esc": false
};

document.querySelectorAll(".node").forEach(n => {
  const lab = n.dataset.lab;
  if (!progress[lab]) {
    n.classList.add("locked");
  } else {
    n.classList.add("active");
    n.onclick = () => {
      document.getElementById("map").classList.add("hidden");
      document.getElementById("terminal").classList.remove("hidden");
    };
  }
});