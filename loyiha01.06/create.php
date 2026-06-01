<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Post qo'shish | BlogCMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
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
      min-height: 100vh;
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
    .btn-back {
      color: var(--cream);
      border: 1px solid rgba(255,255,255,0.25);
      background: transparent;
      font-size: 0.85rem;
      font-weight: 500;
      padding: 0.45rem 1.1rem;
      border-radius: 3px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all 0.18s;
    }
    .btn-back:hover { background: rgba(255,255,255,0.1); color: var(--cream); }

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

    /* FORM CARD */
    .form-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-top: 4px solid var(--accent);
      border-radius: 0;
      padding: 2.5rem;
      margin-bottom: 2rem;
    }

    .section-label {
      font-family: 'Playfair Display', serif;
      font-size: 1rem;
      font-weight: 700;
      color: var(--ink);
      border-bottom: 1px solid var(--border);
      padding-bottom: 0.6rem;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .section-label i { color: var(--accent); font-size: 1rem; }

    .form-label {
      font-weight: 600;
      font-size: 0.88rem;
      color: var(--ink);
      margin-bottom: 0.4rem;
    }
    .form-label .req { color: var(--accent); margin-left: 2px; }

    .form-control, .form-select {
      border: 1.5px solid var(--border);
      border-radius: 3px;
      background: var(--cream);
      color: var(--ink);
      font-family: 'DM Sans', sans-serif;
      font-size: 0.92rem;
      padding: 0.6rem 0.9rem;
      transition: border-color 0.18s, box-shadow 0.18s;
    }
    .form-control:focus, .form-select:focus {
      background: var(--white);
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(200,65,10,0.12);
      color: var(--ink);
    }
    .form-control::placeholder { color: #b0a899; }
    textarea.form-control { min-height: 240px; resize: vertical; line-height: 1.7; }

    /* IMAGE UPLOAD */
    .upload-zone {
      border: 2px dashed var(--border);
      background: var(--cream);
      border-radius: 3px;
      padding: 2.5rem 1rem;
      text-align: center;
      cursor: pointer;
      transition: border-color 0.2s, background 0.2s;
      position: relative;
    }
    .upload-zone:hover {
      border-color: var(--accent);
      background: #fdf9f5;
    }
    .upload-zone input[type="file"] {
      position: absolute;
      inset: 0;
      opacity: 0;
      cursor: pointer;
      width: 100%;
      height: 100%;
    }
    .upload-zone .upload-icon {
      font-size: 2.4rem;
      color: var(--muted);
      margin-bottom: 0.7rem;
      display: block;
    }
    .upload-zone .upload-text {
      font-size: 0.88rem;
      color: var(--muted);
      font-weight: 400;
    }
    .upload-zone .upload-hint {
      font-size: 0.76rem;
      color: #b0a899;
      margin-top: 4px;
    }
    .upload-zone strong { color: var(--accent); }

    .img-preview-wrap {
      border: 1.5px solid var(--border);
      border-radius: 3px;
      overflow: hidden;
      aspect-ratio: 16/9;
      background: var(--sand);
    }
    .img-preview-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .img-preview-label {
      font-size: 0.78rem;
      color: var(--muted);
      margin-top: 6px;
      display: flex;
      align-items: center;
      gap: 4px;
    }

    /* URL INPUT */
    .input-group-text {
      background: var(--sand);
      border: 1.5px solid var(--border);
      border-right: none;
      color: var(--muted);
      font-size: 0.85rem;
      border-radius: 3px 0 0 3px;
    }
    .input-group .form-control {
      border-left: none;
      border-radius: 0 3px 3px 0;
    }

    /* CHAR COUNTER */
    .char-counter {
      font-size: 0.75rem;
      color: var(--muted);
      text-align: right;
      margin-top: 4px;
    }
    .char-counter.warn { color: var(--accent); }

    /* FORM HELP */
    .form-text { font-size: 0.78rem; color: var(--muted); }

    /* ACTION BUTTONS */
    .action-bar {
      background: var(--white);
      border: 1px solid var(--border);
      border-top: 3px solid var(--ink);
      padding: 1.4rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
    }
    .btn-save {
      background: var(--accent);
      color: #fff;
      border: none;
      font-weight: 600;
      font-size: 0.95rem;
      padding: 0.65rem 2rem;
      border-radius: 3px;
      transition: background 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 7px;
      text-decoration: none;
    }
    .btn-save:hover { background: #a83408; color: #fff; }

    .btn-draft {
      background: transparent;
      color: var(--ink);
      border: 1.5px solid var(--border);
      font-weight: 600;
      font-size: 0.9rem;
      padding: 0.6rem 1.5rem;
      border-radius: 3px;
      transition: all 0.18s;
      display: inline-flex;
      align-items: center;
      gap: 7px;
      text-decoration: none;
    }
    .btn-draft:hover { border-color: var(--ink); color: var(--ink); background: var(--sand); }

    .btn-cancel {
      color: var(--muted);
      font-size: 0.88rem;
      font-weight: 500;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: color 0.18s;
    }
    .btn-cancel:hover { color: #b91c1c; }

    /* TIPS SIDEBAR */
    .tips-card {
      background: var(--ink);
      color: var(--cream);
      border-radius: 0;
      padding: 1.8rem;
      margin-bottom: 1.5rem;
    }
    .tips-card h6 {
      font-family: 'Playfair Display', serif;
      font-size: 0.95rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: var(--cream);
      display: flex;
      align-items: center;
      gap: 7px;
    }
    .tips-card h6 i { color: var(--accent); }
    .tips-list { list-style: none; padding: 0; margin: 0; }
    .tips-list li {
      font-size: 0.82rem;
      color: rgba(245,240,232,0.72);
      padding: 0.35rem 0;
      border-bottom: 1px solid rgba(255,255,255,0.06);
      display: flex;
      gap: 8px;
      line-height: 1.5;
    }
    .tips-list li:last-child { border-bottom: none; }
    .tips-list li i { color: var(--accent); flex-shrink: 0; margin-top: 2px; }

    .status-card {
      background: var(--white);
      border: 1px solid var(--border);
      padding: 1.5rem;
    }
    .status-card h6 {
      font-weight: 700;
      font-size: 0.88rem;
      margin-bottom: 1rem;
      color: var(--ink);
    }
    .status-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 0.82rem;
      padding: 0.3rem 0;
      color: var(--muted);
    }
    .status-dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: var(--sand);
      display: inline-block;
    }
    .status-dot.green { background: #16a34a; }
    .status-dot.yellow { background: #ca8a04; }

    footer {
      border-top: 1px solid var(--border);
      padding: 1.5rem 0;
      text-align: center;
      font-size: 0.82rem;
      color: var(--muted);
      margin-top: 3rem;
    }

    @media (max-width: 768px) {
      .form-card { padding: 1.5rem; }
      .action-bar { padding: 1rem; }
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar-custom">
  <div class="container d-flex align-items-center justify-content-between">
    <a href="index.html" class="navbar-brand-text">Blog<span>CMS</span></a>
    <a href="index.html" class="btn-back"><i class="bi bi-arrow-left"></i> Orqaga</a>
  </div>
</nav>

<!-- BREADCRUMB -->
<div class="breadcrumb-bar">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Postlar</a></li>
        <li class="breadcrumb-item active">Yangi post qo'shish</li>
      </ol>
    </nav>
  </div>
</div>

<!-- MAIN -->
<div class="container py-4">
  <div class="row g-4">

    <!-- FORM (LEFT) -->
    <form action="save.php" method="POST" enctype="multipart/form-data" >
    <div class="col-12 col-lg-12">
      <!-- ASOSIY MAʼLUMOT -->
      <div class="form-card">
        <div class="section-label"><i class="bi bi-file-text"></i> Asosiy ma'lumot</div>
        <div class="mb-4">
          <label class="form-label">Sarlavha <span class="req">*</span></label>
          <input name="subject" type="text" class="form-control form-control-lg"
            placeholder="Post sarlavhasini kiriting..." maxlength="120"
            style="font-family:'Playfair Display',serif; font-size:1.15rem; font-weight:700;"/>
          <div class="char-counter">0 / 120</div>
        </div>
        <div class="mb-4">
          <label class="form-label">Sarlavha <span class="req">*</span></label>
          <input name="photo" type="file" class="form-control form-control-lg"
            placeholder="Post sarlavhasini kiriting..." maxlength="120"
            style="font-family:'Playfair Display',serif; font-size:1.15rem; font-weight:700;"/>
          <div class="char-counter">0 / 120</div>
        </div>

        <div class="mb-4">
          <label class="form-label">Qisqacha tavsif</label>
          <textarea name="text" type="text" class="form-control"></textarea>
          <div class="form-text">Karta ko'rinishida qisqacha matn sifatida ko'rsatiladi.</div>
        </div>
        <div class="mb-4">
          <button type="submit" class=" btn btn-sm btn-primary">saqlash</button>
        </div>
      </div>
    </div>
  </div>
    </form>
</div>

<footer>
  <div class="container">
    <span>&copy; 2025 BlogCMS — Barcha huquqlar himoyalangan</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>