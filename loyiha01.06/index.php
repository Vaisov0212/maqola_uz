<?php
require("conn.php");

$sql="SELECT * FROM posts";

$stmt=$conn->prepare($sql);
$stmt->execute();

$posts=$stmt->fetchAll();

?>



<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Postlar | BlogCMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <style>
    :root {
      --ink:       #0f0e0c;
      --cream:     #f5f0e8;
      --sand:      #e8e0d0;
      --accent:    #c8410a;
      --accent2:   #1a4a2e;
      --muted:     #7a7469;
      --card-bg:   #ffffff;
      --border:    #ddd8ce;
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
      background: var(--cream);
      font-family: 'DM Sans', sans-serif;
      color: var(--ink);
      min-height: 100vh;
    }

    /* ── NAVBAR ── */
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
      letter-spacing: -0.5px;
      text-decoration: none;
    }
    .navbar-brand-text span { color: var(--accent); }
    .btn-add-post {
      background: var(--accent);
      color: #fff;
      border: none;
      font-weight: 600;
      font-size: 0.88rem;
      letter-spacing: 0.4px;
      padding: 0.5rem 1.3rem;
      border-radius: 4px;
      transition: background 0.2s;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .btn-add-post:hover { background: #a83408; color: #fff; }

    /* ── PAGE HEADER ── */
    .page-header {
      padding: 3.5rem 0 2rem;
      border-bottom: 1px solid var(--border);
      margin-bottom: 3rem;
    }
    .page-header h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.2rem, 5vw, 3.6rem);
      font-weight: 900;
      color: var(--ink);
      line-height: 1.1;
    }
    .page-header p {
      color: var(--muted);
      font-size: 1rem;
      font-weight: 300;
      margin: 0;
    }
    .post-count-badge {
      background: var(--accent);
      color: #fff;
      font-size: 0.78rem;
      font-weight: 700;
      padding: 3px 10px;
      border-radius: 20px;
      vertical-align: middle;
      margin-left: 10px;
    }

    /* ── CARD ── */
    .post-card {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 0;
      overflow: hidden;
      transition: transform 0.22s ease, box-shadow 0.22s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      position: relative;
    }
    .post-card:hover {
      transform: translateY(-5px);
      box-shadow: 6px 6px 0 var(--ink);
    }

    .post-card-img-wrap {
      position: relative;
      overflow: hidden;
      aspect-ratio: 16/9;
      background: var(--sand);
    }
    .post-card-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .post-card:hover .post-card-img-wrap img {
      transform: scale(1.04);
    }
    .post-card-category {
      position: absolute;
      top: 12px;
      left: 12px;
      background: var(--accent);
      color: #fff;
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      padding: 4px 10px;
    }

    .post-card-body {
      padding: 1.4rem 1.4rem 0.8rem;
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    .post-card-meta {
      font-size: 0.75rem;
      color: var(--muted);
      font-weight: 400;
      margin-bottom: 0.6rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .post-card-meta span { display: inline-flex; align-items: center; gap: 4px; }
    .post-card-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.15rem;
      font-weight: 700;
      color: var(--ink);
      line-height: 1.35;
      margin-bottom: 0.65rem;
      flex: 0 0 auto;
    }
    .post-card-excerpt {
      font-size: 0.88rem;
      color: var(--muted);
      line-height: 1.65;
      font-weight: 300;
      flex: 1;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
    }

    .post-card-footer {
      padding: 0.9rem 1.4rem;
      border-top: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      background: var(--cream);
    }
    .btn-view {
      background: var(--ink);
      color: var(--cream);
      border: none;
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 0.3px;
      padding: 0.42rem 1rem;
      border-radius: 3px;
      transition: background 0.18s;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }
    .btn-view:hover { background: var(--accent); color: #fff; }

    .btn-edit-sm {
      color: var(--accent2);
      border: 1px solid var(--accent2);
      background: transparent;
      font-size: 0.78rem;
      font-weight: 600;
      padding: 0.38rem 0.85rem;
      border-radius: 3px;
      transition: all 0.18s;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 4px;
    }
    .btn-edit-sm:hover { background: var(--accent2); color: #fff; }

    .btn-delete-sm {
      color: #b91c1c;
      border: 1px solid #b91c1c;
      background: transparent;
      font-size: 0.78rem;
      font-weight: 600;
      padding: 0.38rem 0.85rem;
      border-radius: 3px;
      transition: all 0.18s;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 4px;
    }
    .btn-delete-sm:hover { background: #b91c1c; color: #fff; }

    /* ── EMPTY STATE ── */
    .empty-state {
      text-align: center;
      padding: 5rem 1rem;
      color: var(--muted);
    }
    .empty-state i { font-size: 3.5rem; margin-bottom: 1rem; opacity: 0.3; }
    .empty-state h4 { font-family: 'Playfair Display', serif; color: var(--ink); }

    /* ── PAGINATION ── */
    .pagination .page-link {
      color: var(--ink);
      border: 1px solid var(--border);
      border-radius: 0 !important;
      font-size: 0.88rem;
      font-weight: 500;
      padding: 0.45rem 0.9rem;
    }
    .pagination .page-item.active .page-link {
      background: var(--ink);
      border-color: var(--ink);
      color: var(--cream);
    }
    .pagination .page-link:hover {
      background: var(--sand);
      color: var(--ink);
    }

    footer {
      border-top: 1px solid var(--border);
      padding: 2rem 0;
      margin-top: 4rem;
      text-align: center;
      font-size: 0.82rem;
      color: var(--muted);
    }

    @media (max-width: 576px) {
      .page-header { padding: 2rem 0 1.5rem; }
      .post-card-footer { flex-wrap: wrap; }
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-custom">
  <div class="container d-flex align-items-center justify-content-between">
    <a href="index.html" class="navbar-brand-text">Blog<span>CMS</span></a>
    <a href="create.php" class="btn-add-post">
      <i class="bi bi-plus-lg"></i> Yangi post
    </a>
  </div>
</nav>

<!-- PAGE HEADER -->
<div class="page-header">
  <div class="container">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3">
      <div>
        <h1>Barcha postlar <span class="post-count-badge">6</span></h1>
        <p>So'nggi yangiliklar, maqolalar va tahlillar</p>
      </div>
    </div>
  </div>
</div>

<!-- POSTS GRID -->
<div class="container pb-5">
  <div class="row g-4">

    <?php foreach($posts as $post): ?>
        <!-- CARD 1 -->
    <div class="col-12 col-sm-6 col-xl-4">
      <div class="post-card">
        <div class="post-card-img-wrap">
          <img src=<?= "posts/".$post["img"] ?> alt="Post rasmi"/>
        </div>
        <div class="post-card-body">
          <div class="post-card-meta">
            <span><i class="bi bi-calendar3"></i><?= $post["cretaed_at"] ?></span>
        
          </div>
          <div class="post-card-title"><?= substr($post["subject"],0,50) ?>...</div>
          <div class="post-card-excerpt">
            <?= substr($post["text"],0,140) ?> ...
          </div>
        </div>
        <div class="post-card-footer">
          <a href="show.php?id=<?= $post['id'] ?>" class="btn-view"><i class="bi bi-eye"></i> Ko'rish</a>
          <div class="d-flex gap-2">
            <p><i class="bi bi-eye"></i> <?= $post['view'] ?></p>
          
          </div>
        </div>
      </div>
    </div>
    <?php endforeach ?>

  </div><!-- /row -->

  <!-- PAGINATION -->
  <nav class="mt-5 d-flex justify-content-center" aria-label="Sahifalar">
    <ul class="pagination gap-1">
      <li class="page-item disabled"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
    </ul>
  </nav>
</div>

<footer>
  <div class="container">
    <span>&copy; 2025 BlogCMS — Barcha huquqlar himoyalangan</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>