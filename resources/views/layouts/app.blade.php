<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Photo Album</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Orbitron', sans-serif;
      background: black;
      color: #00ffe0;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    header {
      text-align: center;
      padding: 6rem 1rem;
      position: relative;
      z-index: 10;
    }

    .neon-glow {
      text-shadow: 0 0 5px #00ffe0, 0 0 10px #00ffe0, 0 0 20px #00ffe0;
    }

    .album-tile {
      display: inline-block;
      margin: 1rem;
      width: 220px;
      height: 220px;
      background: linear-gradient(145deg, #0f0f0f, #111111);
      border-radius: 1rem;
      text-align: center;
      line-height: 220px;
      font-size: 1.25rem;
      font-weight: bold;
      color: #00ffe0;
      text-decoration: none;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
      box-shadow: 0 0 15px rgba(0, 255, 224, 0.2);
    }

    .album-tile span {
      margin-right: 0.5rem;
      font-size: 1.8rem;
      vertical-align: middle;
      text-shadow: 0 0 10px #00ffe0, 0 0 20px #00ffe0;
      display: inline-block;
      animation: emojiPulse 2s infinite alternate;
    }

    @keyframes emojiPulse {
      0% {
        transform: rotate(-5deg) scale(1);
      }

      50% {
        transform: rotate(5deg) scale(1.1);
      }

      100% {
        transform: rotate(-5deg) scale(1);
      }
    }

    .album-tile::before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(45deg, rgba(0, 255, 224, 0.15), transparent);
      opacity: 0;
      transition: all 0.4s;
      border-radius: 1rem;
    }

    .album-tile:hover::before {
      opacity: 1;
    }

    .album-tile:hover {
      transform: scale(1.1) rotateX(5deg) rotateY(-5deg);
      box-shadow: 0 0 50px #00ffe0, 0 0 100px #00ffe0 inset;
    }

    .watermark {
      position: fixed;
      top: 50%;
      left: 50%;
      font-size: 0.7rem;
      color: rgba(0, 255, 224, 0.03);
      font-weight: bold;
      letter-spacing: 0.3rem;
      transform: translate(-50%, -50%) rotate(-45deg);
      pointer-events: none;
      z-index: 0;
      white-space: nowrap;
    }

    .home-circle {
      position: fixed;
      top: 1rem;
      left: 1rem;
      width: 5rem;
      height: 5rem;
      cursor: pointer;
      z-index: 10;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .inner-circle {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background: rgba(0, 255, 224, 0.05);
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 0 15px #00ffe0, 0 0 30px #00ffe0 inset;
      overflow: hidden;
      position: relative;
    }

    .inner-circle img {
      width: 80%;
      height: 80%;
      object-fit: contain;
      border-radius: 50%;
    }

    .home-circle::after {
      content: "";
      position: absolute;
      inset: 0;
      border: 2px solid #00ffe0;
      border-radius: 50%;
      animation: spin 5s linear infinite;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .floating-circle {
      position: absolute;
      border-radius: 50%;
      opacity: 0.3;
      animation: float 6s ease-in-out infinite alternate;
      mix-blend-mode: screen;
    }

    @keyframes float {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-25px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    canvas {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
    }
  </style>
</head>

<body>
  <canvas id="bgCanvas"></canvas>
  <div class="watermark">Hezron Asutilla</div>

  <a href="{{ route('layouts') }}" class="home-circle">
    <div class="inner-circle">
      <img src="images/alien-logo.png.avif" alt="Album Logo">
    </div>
  </a>


  <div class="floating-circle w-16 h-16 bg-cyan-400 top-24 left-16"></div>
  <div class="floating-circle w-20 h-20 bg-cyan-300 top-72 right-24"></div>
  <div class="floating-circle w-12 h-12 bg-cyan-500 top-1/2 left-1/2"></div>
  <div class="floating-circle w-8 h-8 bg-cyan-400 top-1/4 right-1/3"></div>

  <header>
    <h1 class="text-6xl font-bold neon-glow mb-6 animate-pulse">My Photo Album</h1>
    <p class="text-cyan-300 text-xl mb-12">Click a collection to explore</p>

    <div class="flex flex-wrap justify-center gap-6">
      <a href="{{ route('page1') }}" class="album-tile"><span>🌿</span>Nature Collection</a>
      <a href="{{ route('page2') }}" class="album-tile"><span>🏛️</span>Architecture Collection</a>
      <a href="{{ route('page3') }}" class="album-tile"><span>🐾</span>Animals Collection</a>
      <a href="{{ route('page4') }}" class="album-tile"><span>👥</span>People Collection</a>
      <a href="{{ route('page5') }}" class="album-tile"><span>😂</span>Meme Collection</a>
    </div>
  </header>

  <footer class="text-center text-cyan-300 mt-12 mb-6 text-sm">© 2025 Hezron Asutilla</footer>

  <script>
    const canvas = document.getElementById('bgCanvas');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    let particles = [];
    for (let i = 0; i < 100; i++) {
      particles.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        dx: (Math.random() - 0.5) * 0.6,
        dy: (Math.random() - 0.5) * 0.6,
        radius: Math.random() * 2 + 1
      });
    }

    function animate() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      particles.forEach(p => {
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(0,255,224,0.6)';
        ctx.fill();
        p.x += p.dx;
        p.y += p.dy;
        if (p.x < 0 || p.x > canvas.width) p.dx *= -1;
        if (p.y < 0 || p.y > canvas.height) p.dy *= -1;
      });
      requestAnimationFrame(animate);
    }
    animate();
  </script>
</body>

</html>