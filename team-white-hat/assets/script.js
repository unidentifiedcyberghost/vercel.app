document.addEventListener("DOMContentLoaded", function(){
  const boot = document.getElementById("boot-screen");
  const main = document.getElementById("main-app");
  const enterBtn = document.getElementById("enter-btn");
  const canvas = document.getElementById("boot-canvas");

  function resizeCanvas(){
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const ctx = canvas.getContext("2d");
  const cols = Math.floor(canvas.width / 14);
  const drops = new Array(cols).fill(1);
  function matrixLoop(){
    ctx.fillStyle = "rgba(0,0,0,0.08)";
    ctx.fillRect(0,0,canvas.width,canvas.height);
    ctx.fillStyle = "#00ff9f";
    ctx.font = "14px monospace";
    for (let i = 0; i < drops.length; i++) {
      const text = String.fromCharCode(33 + Math.random() * 94);
      ctx.fillText(text, i * 14, drops[i] * 14);
      if (drops[i] * 14 > canvas.height && Math.random() > 0.975) drops[i] = 0;
      drops[i]++;
    }
    requestAnimationFrame(matrixLoop);
  }
  matrixLoop();

  enterBtn.addEventListener("click", function(){
    boot.style.display = "none";
    main.classList.remove("hidden");
    const firstInput = document.querySelector("input[name=\"name\"]");
    if (firstInput) firstInput.focus();
  });

  const clearBtn = document.getElementById("clear-btn");
  if (clearBtn){
    clearBtn.addEventListener("click", function(){
      const form = document.getElementById("info-form");
      form.reset();
    });
  }

  const form = document.getElementById("info-form");
  if (form){
    form.addEventListener("submit", function(e){
      const consent = form.querySelector("input[name=\"consent\"]");
      if (!consent.checked){
        e.preventDefault();
        alert("Please give consent to collect your information.");
      }
    });
  }

  // Lightweight deterrent: disable right-click and common dev keys
  document.addEventListener("contextmenu", function(e){ e.preventDefault(); });
  document.addEventListener("keydown", function(e){
    if (e.key === "F12" || (e.ctrlKey && e.shiftKey && ["I","J","C"].includes(e.key.toUpperCase())) || (e.ctrlKey && e.key.toUpperCase() === "U")) {
      e.preventDefault();
      alert("Developer tools are disabled on this page.");
    }
  });
});
