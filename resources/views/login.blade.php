<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DENIMHEAAD — Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500&family=Space+Mono&display=swap" rel="stylesheet"/>
  
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
      --black: #0a0a0a;
      --white: #f5f0eb;
      --accent: #e8ff00;
      --red: #ff2d2d;
      --gray: #1c1c1c;
      --mid: #2e2e2e;
      --text-muted: #666;
    }

    html, body {
      height: 100%;
      background: var(--black);
      color: var(--white);
      font-family: 'DM Sans', sans-serif;
      overflow: hidden;
    }

    /* ---- BACKGROUND GRID ---- */
    .bg-grid {
      position: fixed;
      inset: 0;
      background-image:
        linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
      background-size: 60px 60px;
      z-index: 0;
    }

    .bg-glow {
      position: fixed;
      width: 600px; height: 600px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(232,255,0,0.08) 0%, transparent 70%);
      top: -100px; right: -100px;
      z-index: 0;
      animation: pulseGlow 4s ease-in-out infinite alternate;
    }

    .bg-glow2 {
      position: fixed;
      width: 400px; height: 400px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(255,45,45,0.06) 0%, transparent 70%);
      bottom: -80px; left: -80px;
      z-index: 0;
      animation: pulseGlow 5s ease-in-out infinite alternate-reverse;
    }

    @keyframes pulseGlow {
      from { transform: scale(1); opacity: 0.7; }
      to   { transform: scale(1.2); opacity: 1; }
    }

    /* ---- LAYOUT ---- */
    .wrapper {
      position: relative;
      z-index: 1;
      display: grid;
      grid-template-columns: 1fr 1fr;
      height: 100vh;
    }

    /* ---- LEFT PANEL ---- */
    .left-panel {
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 48px;
      background: var(--gray);
      border-right: 1px solid #2a2a2a;
      overflow: hidden;
    }

    .left-panel::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: linear-gradient(135deg, rgba(232,255,0,0.04) 0%, transparent 60%);
      pointer-events: none;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .brand-icon {
      width: 40px; height: 40px;
      background: var(--accent);
      display: grid;
      place-items: center;
      clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
    }

    .brand-icon svg { width: 20px; height: 20px; }

    .brand-name {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 22px;
      letter-spacing: 3px;
      color: var(--white);
    }

    /* Shoe showcase */
    .shoe-showcase {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      flex: 1;
      justify-content: center;
    }

    .main-shoe {
      position: relative;
      width: 340px;
      animation: floatShoe 3s ease-in-out infinite;
    }

    .main-shoe img {
      width: 100%;
      filter: drop-shadow(0 30px 60px rgba(232,255,0,0.2));
    }

    /* Fallback shoe SVG */
    .shoe-svg-wrap {
      width: 340px;
      height: 200px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    @keyframes floatShoe {
      0%, 100% { transform: translateY(0px) rotate(-2deg); }
      50%       { transform: translateY(-16px) rotate(2deg); }
    }

    .shoe-label {
      text-align: center;
    }

    .shoe-label .model {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 42px;
      letter-spacing: 6px;
      line-height: 1;
      background: linear-gradient(135deg, var(--white) 0%, var(--accent) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .shoe-label .sub {
      font-family: 'Space Mono', monospace;
      font-size: 10px;
      letter-spacing: 4px;
      color: var(--text-muted);
      text-transform: uppercase;
      margin-top: 4px;
    }

    /* Ticker */
    .ticker-wrap {
      width: 100%;
      overflow: hidden;
      border-top: 1px solid #2a2a2a;
      padding-top: 16px;
    }

    .ticker {
      display: flex;
      gap: 40px;
      animation: ticker 12s linear infinite;
      white-space: nowrap;
    }

    .ticker span {
      font-family: 'Space Mono', monospace;
      font-size: 10px;
      letter-spacing: 3px;
      color: var(--text-muted);
      text-transform: uppercase;
    }

    .ticker span.accent { color: var(--accent); }

    @keyframes ticker {
      from { transform: translateX(0); }
      to   { transform: translateX(-50%); }
    }

    /* ---- RIGHT PANEL ---- */
    .right-panel {
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 64px 72px;
      background: var(--black);
    }

    .login-header {
      margin-bottom: 48px;
    }

    .login-tag {
      font-family: 'Space Mono', monospace;
      font-size: 10px;
      letter-spacing: 4px;
      color: var(--accent);
      text-transform: uppercase;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .login-tag::before {
      content: '';
      display: block;
      width: 24px; height: 1px;
      background: var(--accent);
    }

    .login-title {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 64px;
      letter-spacing: 4px;
      line-height: 1;
      color: var(--white);
    }

    .login-title span {
      color: var(--accent);
    }

    .login-sub {
      font-size: 13px;
      color: var(--text-muted);
      margin-top: 10px;
      font-weight: 300;
    }

    /* Form */
    .form { display: flex; flex-direction: column; gap: 20px; }

    .field {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .field label {
      font-family: 'Space Mono', monospace;
      font-size: 10px;
      letter-spacing: 3px;
      color: var(--text-muted);
      text-transform: uppercase;
    }

    .input-wrap {
      position: relative;
    }

    .input-wrap svg {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      width: 16px; height: 16px;
      color: var(--text-muted);
      transition: color 0.3s;
      pointer-events: none;
    }

    .field input {
      width: 100%;
      background: var(--gray);
      border: 1px solid #2a2a2a;
      border-radius: 4px;
      padding: 14px 16px 14px 44px;
      color: var(--white);
      font-family: 'DM Sans', sans-serif;
      font-size: 14px;
      outline: none;
      transition: border-color 0.3s, background 0.3s;
    }

    .field input::placeholder { color: #444; }

    .field input:focus {
      border-color: var(--accent);
      background: #1a1a1a;
    }

    .field input:focus + svg,
    .input-wrap:focus-within svg {
      color: var(--accent);
    }

    /* toggle password */
    .toggle-pass {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      color: var(--text-muted);
      padding: 4px;
      transition: color 0.3s;
    }
    .toggle-pass:hover { color: var(--accent); }

    /* Error */
    .error-msg {
      display: none;
      background: rgba(255,45,45,0.1);
      border: 1px solid rgba(255,45,45,0.3);
      border-radius: 4px;
      padding: 10px 14px;
      font-size: 12px;
      color: var(--red);
      font-family: 'Space Mono', monospace;
      letter-spacing: 1px;
    }

    .error-msg.show { display: block; animation: shake 0.4s ease; }

    @keyframes shake {
      0%,100% { transform: translateX(0); }
      25%      { transform: translateX(-6px); }
      75%      { transform: translateX(6px); }
    }

    /* Submit btn */
    .btn-login {
      position: relative;
      background: var(--accent);
      color: var(--black);
      border: none;
      border-radius: 4px;
      padding: 16px;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 18px;
      letter-spacing: 4px;
      cursor: pointer;
      overflow: hidden;
      transition: transform 0.2s, box-shadow 0.2s;
      margin-top: 8px;
    }

    .btn-login::after {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.15);
      transform: translateX(-100%);
      transition: transform 0.3s ease;
    }

    .btn-login:hover { transform: translateY(-2px); box-shadow: 0 8px 32px rgba(232,255,0,0.3); }
    .btn-login:hover::after { transform: translateX(100%); }
    .btn-login:active { transform: translateY(0); }

    /* Footer */
    .form-footer {
      margin-top: 32px;
      padding-top: 24px;
      border-top: 1px solid #1c1c1c;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .form-footer span {
      font-size: 11px;
      color: var(--text-muted);
      font-family: 'Space Mono', monospace;
    }

    .stats {
      display: flex;
      gap: 24px;
    }

    .stat { text-align: right; }

    .stat .num {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 22px;
      color: var(--white);
      letter-spacing: 2px;
    }

    .stat .lbl {
      font-family: 'Space Mono', monospace;
      font-size: 9px;
      color: var(--text-muted);
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    /* Loading state */
    .btn-login.loading {
      pointer-events: none;
      opacity: 0.8;
    }

    .btn-login.loading::before {
      content: '';
      position: absolute;
      left: 0; top: 0; bottom: 0;
      width: 0%;
      background: rgba(0,0,0,0.1);
      animation: loadBar 1s ease forwards;
    }

    @keyframes loadBar {
      to { width: 100%; }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .wrapper { grid-template-columns: 1fr; }
      .left-panel { display: none; }
      .right-panel { padding: 40px 32px; }
      .login-title { font-size: 48px; }
    }
  </style>
</head>
<body>

<div class="bg-grid"></div>
<div class="bg-glow"></div>
<div class="bg-glow2"></div>

<div class="wrapper">

  <!-- LEFT PANEL -->
  <div class="left-panel">
    <div class="brand">
      <div class="brand-icon">
        <svg viewBox="0 0 24 24" fill="black">
          <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
        </svg>
      </div>
      <span class="brand-name">DENIMHEAAD</span>
    </div>

    <div class="shoe-showcase">
      <div class="main-shoe">
        <!-- Fallback SVG jika image tidak ada -->
        <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg" style="filter:drop-shadow(0 30px 60px rgba(232,255,0,0.25))">
          <!-- Shoe sole -->
          <ellipse cx="200" cy="175" rx="170" ry="18" fill="#1a1a1a"/>
          <!-- Midsole -->
          <path d="M30 165 Q200 155 370 162 L375 178 Q200 188 25 180 Z" fill="#2d2d2d"/>
          <!-- Upper body -->
          <path d="M40 165 Q60 120 120 105 L260 98 Q320 95 360 130 L370 162 Q200 155 30 165 Z" fill="#e8ff00"/>
          <!-- Tongue -->
          <path d="M155 105 L175 60 L200 55 L225 60 L245 105 Z" fill="#d4eb00"/>
          <!-- Laces -->
          <line x1="165" y1="75" x2="235" y2="75" stroke="#0a0a0a" stroke-width="2.5"/>
          <line x1="162" y1="88" x2="238" y2="88" stroke="#0a0a0a" stroke-width="2.5"/>
          <line x1="160" y1="100" x2="240" y2="100" stroke="#0a0a0a" stroke-width="2.5"/>
          <!-- Side swoosh detail -->
          <path d="M80 140 Q160 120 280 128" stroke="#0a0a0a" stroke-width="3" fill="none" stroke-linecap="round"/>
          <!-- Toe cap -->
          <path d="M40 165 Q55 135 90 120 Q70 140 65 162 Z" fill="#cee800"/>
          <!-- Heel -->
          <path d="M340 132 Q365 140 370 162 L355 162 Q348 145 330 138 Z" fill="#cee800"/>
        </svg>
      </div>
      <div class="shoe-label">
        <div class="model">Denim<br>MANAGER</div>
        <div class="sub"></div>
      </div>
    </div>

    <div class="ticker-wrap">
      <div class="ticker">
        <span class="accent">● LIVE</span>
        <span>AIR FORCE 1</span>
        <span class="accent">///</span>
        <span>AIR JORDAN LOW</span>
        <span class="accent">///</span>
        <span>NIKE P-6000</span>
        <span class="accent">///</span>
        <span>STOCK READY</span>
        <span class="accent">●</span>
        <span>AIR FORCE 1</span>
        <span class="accent">///</span>
        <span>AIR JORDAN LOW</span>
        <span class="accent">///</span>
        <span>NIKE P-6000</span>
        <span class="accent">///</span>
        <span>STOCK READY</span>
      </div>
    </div>
  </div>

  <!-- RIGHT PANEL -->
  <div class="right-panel">
    <div class="login-header">
      <div class="login-tag">Admin Portal</div>
      <div class="login-title">MASUK KE<br>SISTEM <span>ANDA</span></div>
      <p class="login-sub">Kelola inventori sepatu dengan mudah dan efisien.</p>
    </div>

    <form class="form" method="POST" action="{{ route('login.post') }}" id="loginForm">
    @csrf


      <div class="error-msg" id="errorMsg">
        ⚠ Username atau password salah
      </div>

      <div class="field">
        <label>Username</label>
        <div class="input-wrap">
          <input type="text" name="username" id="username" placeholder="Masukkan username" autocomplete="username"/>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
          </svg>
        </div>
      </div>

      <div class="field">
        <label>Password</label>
        <div class="input-wrap">
          <input type="password" name="password" id="password" placeholder="Masukkan password" autocomplete="current-password"/>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="pointer-events:none">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
          </svg>
          <button type="button" class="toggle-pass" onclick="togglePass()" title="Lihat password">
            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
      </div>

      <button type="submit" class="btn-login" id="btnLogin">MASUK SEKARANG</button>
    </form>

    <div class="form-footer">
      <span>© 2025 DENIMHEAAD</span>
      <div class="stats">
        <div class="stat">
          <div class="num">3</div>
          <div class="lbl">Produk</div>
        </div>
        <div class="stat">
          <div class="num">24/7</div>
          <div class="lbl">Aktif</div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Cek error dari URL
  const params = new URLSearchParams(window.location.search);
  const error = params.get('error');
  if (error) {
    const el = document.getElementById('errorMsg');
    el.textContent = '⚠ ' + decodeURIComponent(error);
    el.classList.add('show');
  }

  // Toggle password visibility
  function togglePass() {
    const input = document.getElementById('password');
    const icon  = document.getElementById('eyeIcon');
    if (input.type === 'password') {
      input.type = 'text';
      icon.innerHTML = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>`;
    } else {
      input.type = 'password';
      icon.innerHTML = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
    }
  }

  // Loading state on submit
  document.getElementById('loginForm').addEventListener('submit', function(e) {
    const user = document.getElementById('username').value.trim();
    const pass = document.getElementById('password').value.trim();

    if (!user || !pass) {
      e.preventDefault();
      const el = document.getElementById('errorMsg');
      el.textContent = '⚠ Username dan password tidak boleh kosong';
      el.classList.remove('show');
      void el.offsetWidth;
      el.classList.add('show');
      return;
    }

    const btn = document.getElementById('btnLogin');
    btn.classList.add('loading');
    btn.textContent = 'MEMPROSES...';
  });
</script>
</body>
</html>