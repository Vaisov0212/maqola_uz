<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Post ko'rish | BlogCMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <style>
    :root {
      --ink:     #0f0e0c;
      --cream:   #f5f0e8;
      --sand:    #e8e0d0;
      --accent:  #c8410a;
      --accent2: #1a4a2e;
      --muted:   #7a7469;
      --border:  #ddd8ce;
      --white:   #ffffff;
    }

    body {
      background: var(--cream);
      font-family: 'DM Sans', sans-serif;
      color: var(--ink);
    }

    /* NAVBAR */
    .navbar-custom {
      background: var(--ink);
      padding: 1rem 0;
      border-bottom: 3px solid var(--accent);
    }
    .navbar-brand-text {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      font-weight: 900;
      color: var(--cream) !important;
      text-decoration: none;
    }
    .navbar-brand-text span { color: var(--accent); }
    .navbar-actions { display: flex; gap: 8px; align-items: center; }
    .btn-nav-outline {
      color: var(--cream);
      border: 1px solid rgba(255,255,255,0.25);
      background: transparent;
      font-size: 0.83rem;
      font-weight: 500;
      padding: 0.42rem 1rem;
      border-radius: 3px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: all 0.18s;
    }
    .btn-nav-outline:hover { background: rgba(255,255,255,0.1); color: var(--cream); }
    .btn-nav-red {
      color: #fff;
      border: 1px solid #b91c1c;
      background: #b91c1c;
      font-size: 0.83rem;
      font-weight: 500;
      padding: 0.42rem 1rem;
      border-radius: 3px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: all 0.18s;
    }
    .btn-nav-red:hover { background: #991b1b; color: #fff; }

    /* BREADCRUMB */
    .breadcrumb-bar {
      background: var(--sand);
      border-bottom: 1px solid var(--border);
      padding: 0.7rem 0;
    }
    .breadcrumb { margin: 0; font-size: 0.82rem; }
    .breadcrumb-item a { color: var(--accent); text-decoration: none; font-weight: 500; }
    .breadcrumb-item.active { color: var(--muted); }
    .breadcrumb-item + .breadcrumb-item::before { color: var(--muted); }

    /* HERO IMAGE */
    .post-hero {
      position: relative;
      aspect-ratio: 21/9;
      overflow: hidden;
      background: var(--ink);
    }
    @media (max-width: 768px) { .post-hero { aspect-ratio: 16/9; } }
    .post-hero img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.82;
    }
    .post-hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to bottom, transparent 30%, rgba(15,14,12,0.72) 100%);
    }
    .post-hero-content {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 2.5rem;
    }
    .post-category-pill {
      display: inline-block;
      background: var(--accent);
      color: #fff;
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      padding: 5px 12px;
      margin-bottom: 0.9rem;
    }
    .post-hero-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.6rem, 4vw, 2.8rem);
      font-weight: 900;
      color: #fff;
      line-height: 1.18;
      margin: 0;
      text-shadow: 0 2px 12px rgba(0,0,0,0.35);
    }

    /* ARTICLE BODY */
    .article-wrap {
      background: var(--white);
      border: 1px solid var(--border);
      border-top: none;
    }

    /* META BAR */
    .meta-bar {
      padding: 1.2rem 2.5rem;
      border-bottom: 1px solid var(--border);
      display: flex;
      flex-wrap: wrap;
      gap: 1.2rem;
      align-items: center;
      background: var(--cream);
    }
    .meta-item {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: 0.82rem;
      color: var(--muted);
    }
    .meta-item i { color: var(--accent); }
    .meta-item strong { color: var(--ink); font-weight: 600; }
    .meta-sep {
      width: 1px;
      height: 18px;
      background: var(--border);
    }
    @media (max-width: 576px) {
      .meta-bar { padding: 1rem 1.2rem; }
      .meta-sep { display: none; }
    }

    /* ARTICLE CONTENT */
    .article-content {
      padding: 2.5rem;
      max-width: 760px;
    }
    @media (max-width: 576px) { .article-content { padding: 1.5rem 1.2rem; } }

    .article-content p {
      font-size: 1.05rem;
      line-height: 1.85;
      font-weight: 300;
      color: #2a2820;
      margin-bottom: 1.5rem;
    }
    .article-content h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--ink);
      margin: 2.2rem 0 1rem;
      padding-bottom: 0.4rem;
      border-bottom: 2px solid var(--sand);
    }
    .article-content h3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--ink);
      margin: 1.8rem 0 0.8rem;
    }
    .article-content blockquote {
      border-left: 4px solid var(--accent);
      background: var(--cream);
      padding: 1.2rem 1.5rem;
      margin: 1.8rem 0;
      font-style: italic;
      font-family: 'Playfair Display', serif;
      font-size: 1.1rem;
      color: var(--ink);
      line-height: 1.6;
    }
    .article-content blockquote cite {
      display: block;
      font-style: normal;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.8rem;
      color: var(--muted);
      margin-top: 0.6rem;
    }
    .article-content ul, .article-content ol {
      padding-left: 1.5rem;
      margin-bottom: 1.5rem;
    }
    .article-content li {
      font-size: 1rem;
      line-height: 1.8;
      font-weight: 300;
      color: #2a2820;
      margin-bottom: 0.35rem;
    }
    .article-content .lead {
      font-size: 1.18rem;
      font-weight: 400;
      color: var(--ink);
      line-height: 1.7;
      margin-bottom: 2rem;
      padding-bottom: 1.5rem;
      border-bottom: 1px solid var(--border);
    }

    /* ARTICLE FOOTER */
    .article-footer {
      padding: 1.5rem 2.5rem;
      border-top: 1px solid var(--border);
      background: var(--cream);
      display: flex;
      flex-wrap: wrap;
      gap: 0.6rem;
      align-items: center;
    }
    @media (max-width: 576px) { .article-footer { padding: 1rem 1.2rem; } }
    .tag-pill {
      display: inline-block;
      background: var(--sand);
      color: var(--ink);
      font-size: 0.75rem;
      font-weight: 600;
      padding: 4px 12px;
      border-radius: 20px;
      border: 1px solid var(--border);
      letter-spacing: 0.2px;
    }
    .article-footer span.label {
      font-size: 0.8rem;
      color: var(--muted);
      font-weight: 500;
      margin-right: 4px;
    }

    /* SIDEBAR */
    .sidebar-card {
      background: var(--white);
      border: 1px solid var(--border);
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }
    .sidebar-card h6 {
      font-family: 'Playfair Display', serif;
      font-size: 1rem;
      font-weight: 700;
      color: var(--ink);
      border-bottom: 2px solid var(--sand);
      padding-bottom: 0.5rem;
      margin-bottom: 1.2rem;
    }

    .related-item {
      display: flex;
      gap: 10px;
      align-items: flex-start;
      padding: 0.7rem 0;
      border-bottom: 1px solid var(--border);
      text-decoration: none;
    }
    .related-item:last-child { border-bottom: none; padding-bottom: 0; }
    .related-item:hover .related-title { color: var(--accent); }
    .related-thumb {
      width: 64px;
      height: 48px;
      object-fit: cover;
      flex-shrink: 0;
      border-radius: 2px;
      background: var(--sand);
    }
    .related-title {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--ink);
      line-height: 1.4;
      transition: color 0.18s;
    }
    .related-date {
      font-size: 0.72rem;
      color: var(--muted);
      margin-top: 3px;
    }

    /* ADMIN BOX */
    .admin-actions-box {
      background: var(--ink);
      padding: 1.5rem;
    }
    .admin-actions-box h6 {
      font-size: 0.82rem;
      font-weight: 700;
      color: rgba(245,240,232,0.6);
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 1rem;
    }
    .btn-admin-edit {
      display: flex;
      align-items: center;
      gap: 8px;
      background: rgba(255,255,255,0.08);
      color: var(--cream);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 3px;
      padding: 0.65rem 1rem;
      font-size: 0.87rem;
      font-weight: 600;
      text-decoration: none;
      margin-bottom: 0.6rem;
      transition: background 0.18s;
    }
    .btn-admin-edit:hover { background: rgba(255,255,255,0.14); color: var(--cream); }
    .btn-admin-edit i { font-size: 0.95rem; color: var(--accent); }
    .btn-admin-delete {
      display: flex;
      align-items: center;
      gap: 8px;
      background: rgba(185,28,28,0.15);
      color: #fca5a5;
      border: 1px solid rgba(185,28,28,0.35);
      border-radius: 3px;
      padding: 0.65rem 1rem;
      font-size: 0.87rem;
      font-weight: 600;
      text-decoration: none;
      transition: background 0.18s;
    }
    .btn-admin-delete:hover { background: rgba(185,28,28,0.28); color: #fca5a5; }
    .btn-admin-delete i { font-size: 0.95rem; }

    footer {
      border-top: 1px solid var(--border);
      padding: 1.5rem 0;
      text-align: center;
      font-size: 0.82rem;
      color: var(--muted);
      margin-top: 3rem;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar-custom">
  <div class="container d-flex align-items-center justify-content-between">
    <a href="index.html" class="navbar-brand-text">Blog<span>CMS</span></a>
    <div class="navbar-actions">
      <a href="form.html?id=1" class="btn-nav-outline"><i class="bi bi-pencil"></i> Tahrirlash</a>
      <a href="index.html" class="btn-nav-outline"><i class="bi bi-grid-3x3-gap"></i> Barcha postlar</a>
    </div>
  </div>
</nav>

<!-- BREADCRUMB -->
<div class="breadcrumb-bar">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Postlar</a></li>
        <li class="breadcrumb-item active">Tog'lardagi yashirin yo'llar</li>
      </ol>
    </nav>
  </div>
</div>

<!-- HERO -->
<div class="post-hero">
  <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1400&q=80" alt="Post rasmi"/>
  <div class="post-hero-overlay"></div>
  <div class="post-hero-content">
    <div class="container">
      <div class="post-category-pill">Tabiat</div>
      <h1 class="post-hero-title">
        Tog'lardagi yashirin yo'llar:<br>Sayohatchi uchun qo'llanma
      </h1>
    </div>
  </div>
</div>

<!-- ARTICLE + SIDEBAR -->
<div class="container py-4">
  <div class="row g-4">

    <!-- ARTICLE -->
    <div class="col-12 col-lg-8">
      <div class="article-wrap">

        <!-- META -->
        <div class="meta-bar">
          <div class="meta-item"><i class="bi bi-person-circle"></i> <strong>Admin</strong></div>
          <div class="meta-sep"></div>
          <div class="meta-item"><i class="bi bi-calendar3"></i> 28 May, 2025</div>
          <div class="meta-sep"></div>
          <div class="meta-item"><i class="bi bi-clock"></i> 4 daqiqa o'qish</div>
          <div class="meta-sep"></div>
          <div class="meta-item"><i class="bi bi-eye"></i> 1 247 ko'rishlar</div>
        </div>

        <!-- CONTENT -->
        <div class="article-content">
          <p class="lead">
            Tog' yo'llari har doim sirli va go'zal bo'lgan. Ushbu maqolada siz kam ma'lum lekin ajoyib yo'llarni topasiz — ular orqali tabiatning eng nozik tomonlarini kashf etishingiz mumkin.
          </p>

          <p>
            O'rta Osiyoning baland tog'lari — Pomir, Tyan-Shan va Kopetdog' — nafaqat ulkan cho'qqilar bilan, balki shu cho'qqilar orasida yashiringan so'qmoq yo'llar bilan ham mashhur. Har bir yo'l o'zining tarixi, legendalari va tabiat mo'jizalari bilan farq qiladi.
          </p>

          <h2>Qaysi mavsumda borish kerak?</h2>

          <p>
            Tog'larga borishning eng yaxshi vaqti — iyun oyining oxiridan sentyabr oyining boshigacha. Bu davrda qorlar erigan, o'tloqlar yam-yashil, ariqlar to'la-to'kis oqadi. Havo harorati kunduzi +15°C dan +25°C gacha bo'ladi, kechasi esa sezilarli soviydi.
          </p>

          <blockquote>
            "Tog' yo'lida har qadam seni yangi bir dunyo bilan tanishtiradi. Yuqoriga qarab chiqganingda, pastdagi tashvishlar tobora kichrayib boradi."
            <cite>— Rustam Nazarov, tog' sayyohi</cite>
          </blockquote>

          <h2>Eng mashhur yashirin yo'llar</h2>

          <p>
            Quyida sizga az ma'lum, ammo mahalliy aholi orasida yaxshi tanilgan bir nechta yo'llarni taqdim etamiz:
          </p>

          <ul>
            <li><strong>Chimyon—Kuylyuk dara yo'li</strong> — 14 km uzunlikdagi o'rmon orqali o'tadigan maroqli so'qmoq.</li>
            <li><strong>Ugom tizmasi ziyorat yo'li</strong> — qadimiy vali mozorlariga olib boradigan tarixiy yo'l.</li>
            <li><strong>Ko'ksoy darasi</strong> — sharshara va tog' ko'llari bilan boyitilgan 3 kunlik marshrut.</li>
            <li><strong>Oqtosh qoʻrgʻoni atrofi</strong> — arxeologik qazilmalar yonidagi sirli cho'qqilar.</li>
          </ul>

          <h3>Nima olib borish kerak?</h3>

          <p>
            Har qanday tog' safariga tayyor bo'lish uchun asosiy uskunalar: qattiq poshna trekking botinkasi, yomg'irdan himoya qiluvchi kurtka, ikkita litrelik termos, kompas yoki GPS qurilma va birinchi yordam dorixonasi. Ovqat masalasida yengil, kaloriyali mahsulotlarga ustunlik bering — quruq mevalar, yong'oq, siqilgan bug'doy non va energetik barlar eng qulay tanlov.
          </p>

          <p>
            Va eng muhimi — hech qachon yolg'iz bormang. Kamida uch kishilik guruh bilan chiqing, marshrutingizni uyda qoluvchilarga aniq qilib tushuntiring va qaytish vaqtini belgilab qo'ying.
          </p>

          <h2>Xavfsizlik qoidalari</h2>

          <p>
            Tog'da ob-havo bir zumda o'zgarishi mumkin. Quyosh chiqqanda ham bulut paydo bo'lib, yomg'ir yoki do'l yog'ishi mumkin. Shu sababli, prognozni doimo kuzatib boring va kechqurun soat 16:00 gacha lager joyingizda bo'lishni rejalashtiring.
          </p>

          <p>
            Daryo va sel kanallarini kesib o'tishda ehtiyot bo'ling: tong qorning erishidan keyin suv sathi keskin ko'tarilishi mumkin. Eng xavfsiz vaqt — erta tong, quyosh tepalikka ko'tarilmasdan avval.
          </p>
        </div>

        <!-- TAGS -->
        <div class="article-footer">
          <span class="label"><i class="bi bi-tags me-1"></i> Teglar:</span>
          <span class="tag-pill">Sayohat</span>
          <span class="tag-pill">Tabiat</span>
          <span class="tag-pill">Tog'</span>
          <span class="tag-pill">Trekking</span>
          <span class="tag-pill">O'zbekiston</span>
        </div>

      </div><!-- /article-wrap -->
    </div><!-- /col article -->

    <!-- SIDEBAR -->
    <div class="col-12 col-lg-4">

      <!-- ADMIN ACTIONS -->
      <div class="admin-actions-box mb-3">
        <h6>Boshqaruv</h6>
        <a href="form.html?id=1" class="btn-admin-edit">
          <i class="bi bi-pencil-square"></i> Postni tahrirlash
        </a>
        <a href="#" class="btn-admin-delete">
          <i class="bi bi-trash3-fill"></i> Postni o'chirish
        </a>
      </div>

      <!-- RELATED POSTS -->
      <div class="sidebar-card">
        <h6>O'xshash postlar</h6>

        <a href="detail.html" class="related-item">
          <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=200&q=70" class="related-thumb" alt=""/>
          <div>
            <div class="related-title">Tog' poygasi: O'zbekistonning yangi sport sohasi</div>
            <div class="related-date">15 May, 2025</div>
          </div>
        </a>

        <a href="detail.html" class="related-item">
          <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=200&q=70" class="related-thumb" alt=""/>
          <div>
            <div class="related-title">O'zbek oshxonasi: An'anaviy taomlar tarixi</div>
            <div class="related-date">20 May, 2025</div>
          </div>
        </a>

        <a href="detail.html" class="related-item">
          <img src="https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?w=200&q=70" class="related-thumb" alt=""/>
          <div>
            <div class="related-title">Toshkent 2030: Zamonaviy shahar qurish rejalari</div>
            <div class="related-date">5 May, 2025</div>
          </div>
        </a>

      </div>

      <!-- STATS CARD -->
      <div class="sidebar-card">
        <h6>Post statistikasi</h6>
        <div style="font-size:0.84rem; color:var(--muted);">
          <div class="d-flex justify-content-between py-2 border-bottom" style="border-color:var(--border)!important">
            <span>Ko'rishlar</span><strong style="color:var(--ink)">1 247</strong>
          </div>
          <div class="d-flex justify-content-between py-2 border-bottom" style="border-color:var(--border)!important">
            <span>O'rtacha vaqt</span><strong style="color:var(--ink)">3 min 42 s</strong>
          </div>
          <div class="d-flex justify-content-between py-2 border-bottom" style="border-color:var(--border)!important">
            <span>Ulashishlar</span><strong style="color:var(--ink)">38</strong>
          </div>
          <div class="d-flex justify-content-between pt-2">
            <span>Nashr sanasi</span><strong style="color:var(--ink)">28 May 2025</strong>
          </div>
        </div>
      </div>

    </div><!-- /sidebar -->

  </div>
</div>

<footer>
  <div class="container">
    <span>&copy; 2025 BlogCMS — Barcha huquqlar himoyalangan</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>