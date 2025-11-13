<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🏛️ Architecture Collection</title>
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

    .neon-glow {
      text-shadow: 0 0 5px #00ffe0, 0 0 10px #00ffe0, 0 0 20px #00ffe0;
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
      z-index: 9999;
      display: flex;
      justify-content: center;
      align-items: center;
      pointer-events: auto;
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

    .album-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1.5rem;
    }

    .album-grid img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 0.5rem;
      box-shadow: 0 0 15px rgba(0, 255, 224, 0.2);
      cursor: pointer;
      transition: transform 0.3s;
    }

    .album-grid img:hover {
      transform: scale(1.05);
    }

    .album-caption {
      text-align: center;
      margin-top: 0.5rem;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all 0.3s ease;
      color: #00ffe0;
    }

    .album-caption:hover {
      color: #0af0e0;
      transform: scale(1.05);
      text-shadow: 0 0 5px #00ffe0, 0 0 10px #00ffe0;
    }

    .lightbox {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.95);
      justify-content: center;
      align-items: center;
      z-index: 100;
      opacity: 0;
      transition: opacity 0.4s ease;
      flex-direction: column;
      padding: 2rem;
    }

    .lightbox.active {
      display: flex;
      opacity: 1;
    }

    .lightbox img {
      max-width: 90%;
      max-height: 70%;
      border-radius: 1rem;
      box-shadow: 0 0 30px rgba(0, 255, 224, 0.4);
      transition: transform 0.3s ease;
    }

    .lightbox img:hover {
      transform: scale(1.02);
    }

    .lightbox-desc {
      margin-top: 1rem;
      font-size: 1.3rem;
      color: #00ffe0;
      text-align: center;
      text-shadow: 0 0 5px #00ffe0, 0 0 10px #00ffe0;
      cursor: pointer;
      transition: all 0.3s ease;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
    }

    .lightbox-desc:hover {
      color: #0af0e0;
      transform: scale(1.05);
      background: rgba(0, 255, 224, 0.05);
      box-shadow: 0 0 10px #00ffe0;
    }

    .lightbox-close {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 2rem;
      color: #00ffe0;
      cursor: pointer;
      transition: color 0.3s;
    }

    .lightbox-close:hover {
      color: white;
    }

    .page-transition {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: black;
      z-index: 200;
      transform: scaleY(0);
      transform-origin: top;
      transition: transform 0.6s ease;
    }

    .page-transition.active {
      transform: scaleY(1);
    }

    .page-nav {
      padding: 1rem 2rem;
      background: rgba(0, 0, 0, 1);
      border: 2px solid #00ffe0;
      border-radius: 1rem;
      color: #00ffe0;
      font-weight: bold;
      cursor: pointer;
      text-align: center;
      transition: all 0.4s ease;
      box-shadow: 0 0 10px #00ffe0;
    }

    .page-nav:hover {
      background: rgba(0, 255, 224, 1);
      color: black;
      transform: scale(1.05);
    }

    .page-nav-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1rem;
      margin-top: 3rem;
      position: relative;
      z-index: 50;
    }
  </style>
</head>

<body>

  <canvas id="bgCanvas"></canvas>
  <div class="watermark">Hezron Asutilla</div>

  <a href="{{ route('layouts') }}" id="homeLogo" class="home-circle">
    <div class="inner-circle">
      <img src="images/alien-logo.png.avif" alt="Album Logo">
    </div>
  </a>

  <div class="floating-circle w-16 h-16 bg-cyan-400 top-24 left-16"></div>
  <div class="floating-circle w-20 h-20 bg-cyan-300 top-72 right-24"></div>
  <div class="floating-circle w-12 h-12 bg-cyan-500 top-1/2 left-1/2"></div>
  <div class="floating-circle w-8 h-8 bg-cyan-400 top-1/4 right-1/3"></div>

  <header class="text-center py-6">
    <h1 class="text-5xl font-bold neon-glow mb-4">🏛️ Architecture Collection</h1>
    <p class="text-cyan-300 text-lg mb-10">A selection of impressive buildings and architectural wonders.</p>
  </header>

  <main class="relative z-10 container mx-auto px-6 py-6">
    <div class="album-grid">
      <div><img src="images/page2/1.jpeg" alt="Architecture 1">
        <div class="album-caption">Modern skyscraper</div>
      </div>
      <div><img src="images/page2/2.jpeg" alt="Architecture 2">
        <div class="album-caption">Ancient temple</div>
      </div>
      <div><img src="images/page2/3.jpeg" alt="Architecture 3">
        <div class="album-caption">Historic castle</div>
      </div>
      <div><img src="images/page2/4.jpeg" alt="Architecture 4">
        <div class="album-caption">Glass office building</div>
      </div>
      <div><img src="images/page2/5.jpeg" alt="Architecture 5">
        <div class="album-caption">Bridge at sunset</div>
      </div>
      <div><img src="images/page2/6.avif" alt="Architecture 6">
        <div class="album-caption">Cathedral interior</div>
      </div>
      <div><img src="images/page2/7.avif" alt="Architecture 7">
        <div class="album-caption">Futuristic museum</div>
      </div>
      <div><img src="images/page2/8.jpeg" alt="Architecture 8">
        <div class="album-caption">Classic villa</div>
      </div>
      <div><img src="images/page2/9.jpeg" alt="Architecture 9">
        <div class="album-caption">City skyline</div>
      </div>
      <div><img src="images/page2/10.webp" alt="Architecture 10">
        <div class="album-caption">Renaissance palace</div>
      </div>
      <div><img src="images/page2/11.webp" alt="Architecture 11">
        <div class="album-caption">Modern library</div>
      </div>
      <div><img src="images/page2/12.jpeg" alt="Architecture 12">
        <div class="album-caption">Stone bridge</div>
      </div>
      <div><img src="images/page2/13.webp" alt="Architecture 13">
        <div class="album-caption">Historic monument</div>
      </div>
      <div><img src="images/page2/14.jpeg" alt="Architecture 14">
        <div class="album-caption">Urban street view</div>
      </div>
      <div><img src="images/page2/15.jpeg" alt="Architecture 15">
        <div class="album-caption">Art deco theater</div>
      </div>
      <div><img src="images/page2/16.jpeg" alt="Architecture 16">
        <div class="album-caption">Famous mosque</div>
      </div>
      <div><img src="images/page2/17.webp" alt="Architecture 17">
        <div class="album-caption">Old lighthouse</div>
      </div>
      <div><img src="images/page2/18.jpeg" alt="Architecture 18">
        <div class="album-caption">Glass dome structure</div>
      </div>
      <div><img src="images/page2/19.jpeg" alt="Architecture 19">
        <div class="album-caption">Skylight atrium</div>
      </div>
      <div><img src="images/page2/20.jpeg" alt="Architecture 20">
        <div class="album-caption">Historic city gate</div>
      </div>
    </div>

    <div class="page-nav-container">
      <a href="{{ route('page1') }}" class="page-nav">🌿 Page 1</a>
      <a href="{{ route('page2') }}" class="page-nav">🏛️ Page 2</a>
      <a href="{{ route('page3') }}" class="page-nav">🐾 Page 3</a>
      <a href="{{ route('page4') }}" class="page-nav">👥 Page 4</a>
      <a href="{{ route('page5') }}" class="page-nav">😂 Page 5</a>
    </div>
  </main>

  <div class="lightbox" id="lightbox">
    <span class="lightbox-close">&times;</span>
    <img src="" alt="Expanded view">
    <div class="lightbox-desc" id="lightboxDesc"></div>
  </div>

  <div class="page-transition" id="pageTransition"></div>

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

    const images = document.querySelectorAll('.album-grid img');
    const captions = document.querySelectorAll('.album-caption');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = lightbox.querySelector('img');
    const lightboxDesc = document.getElementById('lightboxDesc');
    const closeBtn = lightbox.querySelector('.lightbox-close');

    function openLightbox(img) {
      lightbox.classList.add('active');
      lightboxImg.src = img.src;
      lightboxDesc.textContent = img.nextElementSibling ? img.nextElementSibling.textContent : '';
    }
    images.forEach(img => img.addEventListener('click', () => openLightbox(img)));
    captions.forEach(cap => cap.addEventListener('click', () => openLightbox(cap.previousElementSibling)));
    closeBtn.addEventListener('click', () => lightbox.classList.remove('active'));
    lightbox.addEventListener('click', e => {
      if (e.target === lightbox) lightbox.classList.remove('active');
    });

    const homeLogo = document.getElementById('homeLogo');
    const pageTransition = document.getElementById('pageTransition');
    homeLogo.addEventListener('click', e => {
      e.preventDefault();
      pageTransition.classList.add('active');
      setTimeout(() => {
        window.location.href = "{{ route('layouts') }}";
      }, 600);
    });

    const pageLinks = document.querySelectorAll('.page-nav');
    pageLinks.forEach(link => {
      link.addEventListener('click', e => {
        e.preventDefault();
        const href = link.getAttribute('href');
        pageTransition.classList.add('active');
        setTimeout(() => {
          window.location.href = href;
        }, 600);
      });
    });
  </script>

</body>

</html>