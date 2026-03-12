<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Premium Collection</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500&family=Playfair+Display:ital@1&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --cream: #F5F0E8; --black: #0A0A0A; --charcoal: #1A1A1A;
      --accent: #C8A96E; --accent-dark: #9E7A3F;
      --muted: #888; --card-bg: #111111; --border: rgba(255,255,255,0.07);
    }
    html { scroll-behavior: smooth; }
    body { background: var(--black); color: var(--cream); font-family: 'DM Sans', sans-serif; min-height: 100vh; overflow-x: hidden; }
    ::-webkit-scrollbar { width: 4px; }
    ::-webkit-scrollbar-track { background: var(--black); }
    ::-webkit-scrollbar-thumb { background: var(--accent); border-radius: 2px; }

    /* ── NAVBAR ── */
    nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 100;
      display: flex; align-items: center; justify-content: space-between;
      padding: 1.2rem 3rem;
      background: rgba(10,10,10,0.88); backdrop-filter: blur(16px);
      border-bottom: 1px solid var(--border);
    }
    .nav-brand { font-family: 'Bebas Neue', sans-serif; font-size: 1.6rem; letter-spacing: 0.12em; color: var(--cream); text-decoration: none; }
    .nav-brand span { color: var(--accent); }
    .nav-right { display: flex; align-items: center; gap: 1.5rem; }
    .nav-user { font-size: 0.78rem; font-weight: 500; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted); }
    .nav-user strong { color: var(--cream); }

    /* Logout button via form POST */
    .logout-form { display: inline; }
    .btn-logout {
      font-size: 0.72rem; font-weight: 500; letter-spacing: 0.12em;
      text-transform: uppercase; padding: 0.45rem 1.2rem;
      background: transparent; border: 1px solid var(--accent);
      color: var(--accent); border-radius: 2px; cursor: pointer;
      transition: all 0.25s; font-family: 'DM Sans', sans-serif;
    }
    .btn-logout:hover { background: var(--accent); color: var(--black); }

    .cart-icon {
      width: 36px; height: 36px; border: 1px solid var(--border);
      border-radius: 50%; display: flex; align-items: center; justify-content: center;
      cursor: pointer; transition: border-color 0.2s; position: relative;
    }
    .cart-icon:hover { border-color: var(--accent); }
    .cart-badge {
      position: absolute; top: -4px; right: -4px;
      width: 16px; height: 16px; border-radius: 50%;
      background: var(--accent); color: var(--black);
      font-size: 0.6rem; font-weight: 700;
      display: flex; align-items: center; justify-content: center;
    }

    /* ── HERO ── */
    .hero {
      min-height: 100vh; display: flex; align-items: center;
      padding: 0 3rem; position: relative; overflow: hidden;
    }
    .hero-bg {
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse 60% 80% at 70% 50%, rgba(200,169,110,0.08) 0%, transparent 70%),
        radial-gradient(ellipse 40% 60% at 20% 80%, rgba(200,169,110,0.04) 0%, transparent 60%);
    }
    .hero-grid-lines {
      position: absolute; inset: 0; pointer-events: none;
      background-image:
        linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
      background-size: 60px 60px;
    }
    .hero-number {
      position: absolute; left: 3rem; bottom: 3rem;
      font-family: 'Bebas Neue', sans-serif; font-size: 14rem; line-height: 1;
      color: rgba(255,255,255,0.02); user-select: none; pointer-events: none;
    }
    .hero-content { position: relative; z-index: 2; max-width: 580px; }
    .hero-eyebrow {
      font-size: 0.72rem; font-weight: 500; letter-spacing: 0.3em;
      text-transform: uppercase; color: var(--accent); margin-bottom: 1.2rem;
      display: flex; align-items: center; gap: 0.8rem;
    }
    .hero-eyebrow::before { content: ''; width: 30px; height: 1px; background: var(--accent); }
    .hero-title { font-family: 'Bebas Neue', sans-serif; font-size: clamp(4rem, 8vw, 7.5rem); line-height: 0.92; letter-spacing: 0.02em; margin-bottom: 0.3rem; }
    .hero-title-italic { font-family: 'Playfair Display', serif; font-style: italic; font-size: clamp(3rem, 6vw, 5.5rem); color: var(--accent); display: block; }
    .hero-desc { margin: 1.8rem 0 2.5rem; font-size: 0.9rem; line-height: 1.7; color: var(--muted); max-width: 380px; }
    .hero-actions { display: flex; gap: 1rem; align-items: center; }
    .btn-primary-hero {
      padding: 0.85rem 2.5rem; background: var(--accent); color: var(--black);
      font-size: 0.75rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
      border: none; border-radius: 2px; cursor: pointer; transition: all 0.25s; font-family: 'DM Sans', sans-serif;
    }
    .btn-primary-hero:hover { background: var(--accent-dark); transform: translateY(-1px); }
    .btn-ghost-hero {
      padding: 0.85rem 2rem; background: transparent; color: var(--cream);
      font-size: 0.75rem; font-weight: 500; letter-spacing: 0.15em; text-transform: uppercase;
      border: 1px solid var(--border); border-radius: 2px; cursor: pointer; transition: all 0.25s; font-family: 'DM Sans', sans-serif;
    }
    .btn-ghost-hero:hover { border-color: var(--cream); }

    /* ── MARQUEE ── */
    @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }
    .marquee-wrap { background: var(--accent); overflow: hidden; padding: 0.6rem 0; white-space: nowrap; }
    .marquee-track { display: inline-block; animation: marquee 22s linear infinite; }
    .marquee-item { display: inline-block; font-family: 'Bebas Neue', sans-serif; font-size: 0.9rem; letter-spacing: 0.2em; color: var(--black); padding: 0 2rem; }
    .marquee-dot { display: inline-block; width: 4px; height: 4px; background: var(--black); border-radius: 50%; vertical-align: middle; }

    /* ── STATS ── */
    .stats-bar {
      background: var(--charcoal); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);
      padding: 2rem 3rem; display: grid; grid-template-columns: repeat(3, 1fr);
    }
    .stat-item { text-align: center; padding: 0.5rem; border-right: 1px solid var(--border); }
    .stat-item:last-child { border-right: none; }
    .stat-number { font-family: 'Bebas Neue', sans-serif; font-size: 3rem; line-height: 1; color: var(--accent); }
    .stat-label { font-size: 0.7rem; font-weight: 500; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); margin-top: 0.3rem; }

    /* ── SECTION ── */
    .section { padding: 5rem 3rem; }
    .section-header { display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 3rem; }
    .section-title { font-family: 'Bebas Neue', sans-serif; font-size: 2.8rem; letter-spacing: 0.05em; }
    .section-subtitle { font-size: 0.72rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); margin-bottom: 0.4rem; }
    .view-all { font-size: 0.72rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--muted); text-decoration: none; border-bottom: 1px solid var(--muted); padding-bottom: 2px; transition: color 0.2s, border-color 0.2s; }
    .view-all:hover { color: var(--accent); border-color: var(--accent); }

    /* ── PRODUCT GRID ── */
    .product-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5px; }
    .product-card { background: var(--card-bg); position: relative; overflow: hidden; cursor: pointer; transition: transform 0.35s cubic-bezier(0.25,0.46,0.45,0.94); }
    .product-card:hover { transform: translateY(-4px); z-index: 2; }
    .product-card:hover .product-overlay { opacity: 1; }
    .product-card:hover .product-img { transform: scale(1.05); }
    .product-img-wrap { aspect-ratio: 1/1; overflow: hidden; background: #1a1a1a; position: relative; }
    .product-img { width: 100%; height: 100%; object-fit: contain; padding: 1.5rem; transition: transform 0.5s cubic-bezier(0.25,0.46,0.45,0.94); }
    .product-overlay {
      position: absolute; inset: 0; background: rgba(200,169,110,0.08);
      display: flex; align-items: center; justify-content: center; gap: 0.8rem;
      opacity: 0; transition: opacity 0.3s;
    }
    .overlay-btn { padding: 0.6rem 1.4rem; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; border-radius: 2px; cursor: pointer; transition: all 0.2s; font-family: 'DM Sans', sans-serif; }
    .overlay-buy { background: var(--accent); color: var(--black); border: none; }
    .overlay-buy:hover { background: var(--accent-dark); }
    .overlay-wish { background: transparent; color: var(--cream); border: 1px solid rgba(255,255,255,0.4); }
    .overlay-wish:hover { border-color: var(--cream); }
    .overlay-wish.active { color: #ff6b6b; border-color: #ff6b6b; }
    .product-info { padding: 1.2rem 1.4rem 1.4rem; border-top: 1px solid var(--border); }
    .product-tag { font-size: 0.65rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--accent); margin-bottom: 0.3rem; }
    .product-name { font-size: 0.95rem; font-weight: 500; letter-spacing: 0.02em; margin-bottom: 0.6rem; }
    .product-bottom { display: flex; align-items: center; justify-content: space-between; }
    .product-price { font-family: 'Bebas Neue', sans-serif; font-size: 1.3rem; color: var(--cream); letter-spacing: 0.05em; }
    .product-stock { font-size: 0.68rem; color: var(--muted); letter-spacing: 0.1em; text-transform: uppercase; }
    .product-stock.low { color: #e07b54; }
    .product-card.featured { grid-column: span 2; }
    .product-card.featured .product-img-wrap { aspect-ratio: 2/1; }

    /* ── WISHLIST MODAL ── */
    .modal-overlay {
      position: fixed; inset: 0; z-index: 200;
      background: rgba(0,0,0,0.75); backdrop-filter: blur(8px);
      display: flex; align-items: flex-end; justify-content: flex-end;
      opacity: 0; pointer-events: none; transition: opacity 0.3s;
    }
    .modal-overlay.open { opacity: 1; pointer-events: all; }
    .modal-panel {
      width: 380px; max-height: 80vh; background: var(--charcoal);
      border-left: 1px solid var(--border); border-top: 1px solid var(--border);
      display: flex; flex-direction: column;
      transform: translateX(30px); transition: transform 0.35s cubic-bezier(0.25,0.46,0.45,0.94);
    }
    .modal-overlay.open .modal-panel { transform: translateX(0); }
    .modal-head { padding: 1.5rem 1.8rem; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
    .modal-title { font-family: 'Bebas Neue', sans-serif; font-size: 1.4rem; letter-spacing: 0.08em; }
    .modal-close { background: none; border: none; color: var(--muted); font-size: 1.2rem; cursor: pointer; transition: color 0.2s; }
    .modal-close:hover { color: var(--cream); }
    .modal-body { flex: 1; overflow-y: auto; padding: 1rem 1.8rem; }
    .wishlist-item { display: flex; align-items: center; gap: 1rem; padding: 0.8rem 0; border-bottom: 1px solid var(--border); }
    .wishlist-item-name { font-size: 0.85rem; flex: 1; }
    .wishlist-item-remove { background: none; border: none; color: var(--muted); cursor: pointer; font-size: 0.85rem; transition: color 0.2s; }
    .wishlist-item-remove:hover { color: #e07b54; }
    .wishlist-empty { color: var(--muted); font-size: 0.85rem; text-align: center; padding: 2rem 0; }
    .modal-foot { padding: 1.2rem 1.8rem; border-top: 1px solid var(--border); display: flex; gap: 0.8rem; }
    .modal-foot button { flex: 1; padding: 0.7rem; font-size: 0.72rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; border-radius: 2px; cursor: pointer; font-family: 'DM Sans', sans-serif; }
    .btn-clear { background: transparent; border: 1px solid var(--border); color: var(--muted); transition: all 0.2s; }
    .btn-clear:hover { border-color: #e07b54; color: #e07b54; }
    .btn-checkout { background: var(--accent); border: none; color: var(--black); transition: all 0.2s; }
    .btn-checkout:hover { background: var(--accent-dark); }

    /* ── TOAST ── */
    .toast {
      position: fixed; bottom: 2rem; left: 50%; transform: translateX(-50%) translateY(20px);
      background: var(--accent); color: var(--black);
      padding: 0.7rem 1.8rem; border-radius: 2px;
      font-size: 0.78rem; font-weight: 600; letter-spacing: 0.1em;
      opacity: 0; pointer-events: none; z-index: 300;
      transition: all 0.35s cubic-bezier(0.25,0.46,0.45,0.94);
    }
    .toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

    /* ── FOOTER ── */
    footer { background: var(--charcoal); border-top: 1px solid var(--border); padding: 3rem; display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 3rem; }
    .footer-brand { font-family: 'Bebas Neue', sans-serif; font-size: 2rem; letter-spacing: 0.1em; margin-bottom: 0.8rem; }
    .footer-brand span { color: var(--accent); }
    .footer-desc { font-size: 0.82rem; color: var(--muted); line-height: 1.7; max-width: 260px; }
    .footer-col-title { font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); margin-bottom: 1rem; }
    .footer-links { list-style: none; }
    .footer-links li { margin-bottom: 0.5rem; }
    .footer-links a { font-size: 0.82rem; color: var(--muted); text-decoration: none; transition: color 0.2s; }
    .footer-links a:hover { color: var(--cream); }
    .footer-bottom { background: var(--black); border-top: 1px solid var(--border); padding: 1rem 3rem; display: flex; align-items: center; justify-content: space-between; }
    .footer-copy { font-size: 0.72rem; color: var(--muted); letter-spacing: 0.08em; }

    /* ── ANIMATIONS ── */
    @keyframes fadeUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }
    .hero-eyebrow { animation: fadeUp 0.6s 0.1s both; }
    .hero-title   { animation: fadeUp 0.6s 0.2s both; }
    .hero-desc    { animation: fadeUp 0.6s 0.35s both; }
    .hero-actions { animation: fadeUp 0.6s 0.45s both; }

    @media (max-width: 900px) {
      nav { padding: 1rem 1.5rem; }
      .hero { padding: 6rem 1.5rem 3rem; }
      .stats-bar { padding: 1.5rem; }
      .section { padding: 3rem 1.5rem; }
      .product-grid { grid-template-columns: 1fr 1fr; gap: 1px; }
      .product-card.featured { grid-column: span 2; }
      footer { grid-template-columns: 1fr; gap: 2rem; padding: 2rem 1.5rem; }
      .footer-bottom { padding: 1rem 1.5rem; flex-direction: column; gap: 0.5rem; }
    }
    @media (max-width: 600px) {
      .product-grid { grid-template-columns: 1fr; }
      .product-card.featured { grid-column: span 1; }
      .product-card.featured .product-img-wrap { aspect-ratio: 1/1; }
      .modal-panel { width: 100%; border-left: none; }
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav>
    <a href="{{ route('index') }}" class="nav-brand">Cibaduyut<span>.</span></a>
    <div class="nav-right">
      <span class="nav-user">Halo, <strong>{{ session('username') }}</strong></span>

      <!-- Wishlist -->
      <div class="cart-icon" onclick="openWishlist()">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
        </svg>
        <span class="cart-badge" id="wishCountBadge">0</span>
      </div>

      <!-- LOGOUT via POST (aman dengan CSRF) -->
      <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
      </form>
    </div>
  </nav>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid-lines"></div>
    <div class="hero-number">26</div>
    <div class="hero-content">
      <div class="hero-eyebrow">Koleksi 2026</div>
      <h1 class="hero-title">
        Denim<br>
        <span class="hero-title-italic">Premium.</span>
      </h1>
      <p class="hero-desc">Temukan koleksi denim terbaik dari brand ternama dunia. Kualitas original, harga terjangkau, langsung dari Cibaduyut.</p>
      <div class="hero-actions">
        <button class="btn-primary-hero" onclick="document.getElementById('produk').scrollIntoView({behavior:'smooth'})">Lihat Koleksi</button>
        <button class="btn-ghost-hero">Tentang Kami</button>
      </div>
    </div>
  </section>

  <!-- MARQUEE -->
  <div class="marquee-wrap">
    <div class="marquee-track">
      <span class="marquee-item">Denim P-6000</span><span class="marquee-dot"></span>
      <span class="marquee-item">denim Force 1</span><span class="marquee-dot"></span>
      <span class="marquee-item">denim Jordan 1 Low</span><span class="marquee-dot"></span>
      <span class="marquee-item">denim Shipping</span><span class="marquee-dot"></span>
      <span class="marquee-item">denim 100%</span><span class="marquee-dot"></span>
      <span class="marquee-item">Garansi Resmi</span><span class="marquee-dot"></span>
      <span class="marquee-item">denim P-6000</span><span class="marquee-dot"></span>
      <span class="marquee-item">denim Force 1</span><span class="marquee-dot"></span>
      <span class="marquee-item">Air Jordan 1 Low</span><span class="marquee-dot"></span>
      <span class="marquee-item">Free Shipping</span><span class="marquee-dot"></span>
      <span class="marquee-item">Original 100%</span><span class="marquee-dot"></span>
      <span class="marquee-item">Garansi Resmi</span><span class="marquee-dot"></span>
    </div>
  </div>

  <!-- STATS -->
  <div class="stats-bar">
    <div class="stat-item">
      <div class="stat-number" id="cnt1">0</div>
      <div class="stat-label">Total Produk</div>
    </div>
    <div class="stat-item">
      <div class="stat-number" id="cnt2">0</div>
      <div class="stat-label">Stok Tersedia</div>
    </div>
    <div class="stat-item">
      <div class="stat-number" id="cnt3">0</div>
      <div class="stat-label">Kategori</div>
    </div>
  </div>

  <!-- PRODUCTS -->
  <section class="section" id="produk">
    <div class="section-header">
      <div>
        <div class="section-subtitle">Pilihan Terbaik</div>
        <h2 class="section-title">DAFTAR SEPATU</h2>
      </div>
      <a href="#" class="view-all">Lihat Semua →</a>
    </div>

    <div class="product-grid">
      <!-- FEATURED -->
      <div class="product-card featured" data-id="3">
        <div class="product-img-wrap">
          <img class="product-img" src="{{ asset('assets/AIR_JORDAN_1_LOW.jpg') }}" alt="Nike Air Jordan 1 Low"/>
          <div class="product-overlay">
            <button class="overlay-btn overlay-buy" onclick="showToast('Air Jordan 1 Low ditambahkan!')">Beli Sekarang</button>
            <button class="overlay-btn overlay-wish" id="wish-3" onclick="toggleWish(3,'Nike Air Jordan 1 Low',this)">❤ Wishlist</button>
          </div>
        </div>
        <div class="product-info">
          <div class="product-tag">Best Seller · Iconic</div>
          <div class="product-name">Denim 1 Low</div>
          <div class="product-bottom">
            <div class="product-price">Rp 1.799.000</div>
            <div class="product-stock">Stok: 19</div>
          </div>
        </div>
      </div>

      <!-- Nike P-6000 -->
      <div class="product-card" data-id="1">
        <div class="product-img-wrap">
          <img class="product-img" src="{{ asset('assets/NIKE_P_6000.jpg') }}" alt="Nike P-6000"/>
          <div class="product-overlay">
            <button class="overlay-btn overlay-buy" onclick="showToast('Nike P-6000 ditambahkan!')">Beli</button>
            <button class="overlay-btn overlay-wish" id="wish-1" onclick="toggleWish(1,'Nike P-6000',this)">❤ Wishlist</button>
          </div>
        </div>
        <div class="product-info">
          <div class="product-tag">Nudie Denim</div>
          <div class="product-name">Jeans jaccker</div>
          <div class="product-bottom">
            <div class="product-price">Rp 1.429.000</div>
            <div class="product-stock">Stok: 10</div>
          </div>
        </div>
      </div>

      <!-- Nike Air Force 1 -->
      <div class="product-card" data-id="2">
        <div class="product-img-wrap">
          <img class="product-img" src="{{ asset('assets/AIR_FORCE_1.jpg') }}" alt="Nike Air Force 1"/>
          <div class="product-overlay">
            <button class="overlay-btn overlay-buy" onclick="showToast('Air Force 1 ditambahkan!')">Beli</button>
            <button class="overlay-btn overlay-wish" id="wish-2" onclick="toggleWish(2,'Nike Air Force 1',this)">❤ Wishlist</button>
          </div>
        </div>
        <div class="product-info">
          <div class="product-tag">Jeans · Classic</div>
          <div class="product-name">Nike Jacket 1</div>
          <div class="product-bottom">
            <div class="product-price">Rp 1.599.000</div>
            <div class="product-stock low">Stok: 7</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- WISHLIST MODAL -->
  <div class="modal-overlay" id="wishlistModal">
    <div class="modal-panel">
      <div class="modal-head">
        <span class="modal-title">WISHLIST SAYA</span>
        <button class="modal-close" onclick="closeWishlist()">✕</button>
      </div>
      <div class="modal-body" id="wishlistBody">
        <p class="wishlist-empty">Wishlist masih kosong.</p>
      </div>
      <div class="modal-foot">
        <button class="btn-clear" onclick="clearWishlist()">Kosongkan</button>
        <button class="btn-checkout">Checkout →</button>
      </div>
    </div>
  </div>

  <!-- TOAST -->
  <div class="toast" id="toast"></div>

  <!-- FOOTER -->
  <footer>
    <div>
      <div class="footer-brand">Nudie<span>.</span></div>
      <p class="footer-desc">Toko  premium terpercaya sejak 1990. Kami menghadirkan koleksi terbaik untuk gaya hidup aktif Anda.</p>
    </div>
    <div>
      <div class="footer-col-title">Navigasi</div>
      <ul class="footer-links">
        <li><a href="{{ route('index') }}">Beranda</a></li>
        <li><a href="#produk">Koleksi</a></li>
        <li><a href="#">Tentang</a></li>
        <li><a href="#">Kontak</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-col-title">Info</div>
      <ul class="footer-links">
        <li><a href="#">Kebijakan Privasi</a></li>
        <li><a href="#">Syarat & Ketentuan</a></li>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Garansi</a></li>
      </ul>
    </div>
  </footer>
  <div class="footer-bottom">
    <span class="footer-copy"> rights reserved.</span>
    <span class="footer-copy">Made with ♥ in Bandung</span>
  </div>

  <script>
    // Counter animation
    function animateCount(el, target, duration) {
      let start = 0, step = target / (duration / 16);
      const timer = setInterval(() => {
        start += step;
        if (start >= target) { el.textContent = target; clearInterval(timer); return; }
        el.textContent = Math.floor(start);
      }, 16);
    }
    const observer = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          animateCount(document.getElementById('cnt1'), 12, 800);
          animateCount(document.getElementById('cnt2'), 85, 900);
          animateCount(document.getElementById('cnt3'), 3, 600);
          observer.disconnect();
        }
      });
    }, { threshold: 0.3 });
    observer.observe(document.querySelector('.stats-bar'));

    // Wishlist
    let wishlist = {};
    function toggleWish(id, name, btn) {
      if (wishlist[id]) {
        delete wishlist[id]; btn.classList.remove('active');
        showToast(name + ' dihapus dari wishlist.');
      } else {
        wishlist[id] = name; btn.classList.add('active');
        showToast(name + ' ditambahkan ke wishlist!');
      }
      updateBadge(); renderWishlist();
    }
    function renderWishlist() {
      const body = document.getElementById('wishlistBody');
      const items = Object.entries(wishlist);
      if (!items.length) { body.innerHTML = '<p class="wishlist-empty">Wishlist masih kosong.</p>'; return; }
      body.innerHTML = items.map(([id, name]) =>
        `<div class="wishlist-item"><span class="wishlist-item-name">${name}</span><button class="wishlist-item-remove" onclick="removeWish(${id})">✕</button></div>`
      ).join('');
    }
    function removeWish(id) {
      const btn = document.getElementById('wish-' + id);
      if (btn) btn.classList.remove('active');
      delete wishlist[id]; updateBadge(); renderWishlist();
    }
    function clearWishlist() {
      Object.keys(wishlist).forEach(id => { const btn = document.getElementById('wish-' + id); if (btn) btn.classList.remove('active'); });
      wishlist = {}; updateBadge(); renderWishlist();
    }
    function updateBadge() { document.getElementById('wishCountBadge').textContent = Object.keys(wishlist).length; }
    function openWishlist()  { document.getElementById('wishlistModal').classList.add('open'); }
    function closeWishlist() { document.getElementById('wishlistModal').classList.remove('open'); }
    document.getElementById('wishlistModal').addEventListener('click', function(e) { if (e.target === this) closeWishlist(); });

    // Toast
    let toastTimer;
    function showToast(msg) {
      const t = document.getElementById('toast');
      t.textContent = msg; t.classList.add('show');
      clearTimeout(toastTimer);
      toastTimer = setTimeout(() => t.classList.remove('show'), 2500);
    }
  </script>
</body>
</html>