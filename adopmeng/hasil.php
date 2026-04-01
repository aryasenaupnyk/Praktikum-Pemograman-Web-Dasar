<?php
  $nama = isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '';
  $kucingRaw = isset($_GET['kucing']) ? $_GET['kucing'] : '';
  $alamat = isset($_GET['alamat']) ? htmlspecialchars($_GET['alamat']) : '';
  $payment = isset($_GET['payment']) ? htmlspecialchars($_GET['payment']) : '';
  $tambahanArr = isset($_GET['tambahan']) ? $_GET['tambahan'] : [];

  $kucingParts = explode('|', $kucingRaw);
  $kucingNama = htmlspecialchars($kucingParts[0] ?? '');
  $kucingHarga = intval($kucingParts[1] ?? 0);

  $totalTambahan = 0;
  $tambahanList = [];
  foreach ($tambahanArr as $t) {
    $parts = explode('|', $t);
    $tNama = htmlspecialchars($parts[0] ?? '');
    $tHarga = intval($parts[1] ?? 0);
    $tambahanList[] = ['nama' => $tNama, 'harga' => $tHarga];
    $totalTambahan += $tHarga;
  }

  $totalAkhir = $kucingHarga + $totalTambahan;

  function rupiah($n) {
    return 'Rp ' . number_format($n, 0, ',', '.');
  }

  $imgMap = [
    'Joko' => 'images/joko.jpeg',
    'Juminten' => 'images/juminten.jpeg',
    'Iput' => 'images/iput.jpeg',
    'Nyimeng' => 'images/nyimeng.jpeg',
    'Sukijat' => 'images/sukijat.jpeg',
    'Kurniawan' => 'images/kurniawan.jpeg',
  ];
  $kucingImg = $imgMap[$kucingNama] ?? 'images/index.jpeg';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hasil Adopsi – AdopMeng</title>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --yellow: #F5C518;
      --yellow-dark: #e0b000;
      --cream: #FFF8E7;
      --orange: #FF8C42;
      --brown: #5C3D2E;
      --brown-light: #8B5E3C;
      --white: #ffffff;
      --shadow: 0 4px 20px rgba(92,61,46,0.15);
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Nunito', sans-serif;
      background: var(--cream);
      color: var(--brown);
      min-height: 100vh;
    }

    nav {
      background: var(--brown);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 40px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.2);
    }
    .nav-brand {
      font-family: 'Fredoka One', cursive;
      font-size: 1.6rem;
      color: var(--yellow);
    }
    .nav-links { display: flex; gap: 28px; list-style: none; }
    .nav-links a {
      color: var(--cream);
      text-decoration: none;
      font-weight: 700;
      font-size: 0.95rem;
    }
    .nav-links a:hover { color: var(--yellow); }

    .page-header {
      background: linear-gradient(135deg, var(--brown) 0%, var(--brown-light) 100%);
      text-align: center;
      padding: 36px 20px;
      color: var(--white);
    }
    .page-header h1 {
      font-family: 'Fredoka One', cursive;
      font-size: 2.2rem;
      color: var(--yellow);
    }

    .result-container {
      max-width: 620px;
      margin: 40px auto 60px;
    }

    .notif {
      background: var(--white);
      border-radius: 16px;
      padding: 18px 22px;
      display: flex;
      align-items: center;
      gap: 16px;
      box-shadow: var(--shadow);
      border-left: 6px solid var(--yellow);
      margin-bottom: 28px;
      animation: slideIn 0.5s ease;
    }
    @keyframes slideIn {
      from { opacity: 0; transform: translateY(-16px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .notif img {
      width: 64px;
      height: 64px;
      object-fit: cover;
      border-radius: 10px;
      border: 3px solid var(--yellow);
      flex-shrink: 0;
    }
    .notif-text strong {
      display: block;
      font-family: 'Fredoka One', cursive;
      font-size: 1rem;
      color: var(--orange);
      margin-bottom: 4px;
    }
    .notif-text span {
      font-size: 0.9rem;
      color: var(--brown-light);
    }

    .detail-card {
      background: var(--white);
      border-radius: 20px;
      padding: 34px 38px;
      box-shadow: var(--shadow);
    }
    .detail-card h2 {
      font-family: 'Fredoka One', cursive;
      font-size: 1.6rem;
      color: var(--brown);
      text-align: center;
      margin-bottom: 24px;
    }

    .detail-row {
      display: flex;
      gap: 10px;
      padding: 9px 0;
      border-bottom: 1px solid #f0e4d0;
      font-size: 0.95rem;
    }
    .detail-row:last-of-type { border-bottom: none; }
    .detail-label {
      font-weight: 700;
      min-width: 120px;
      color: var(--brown);
    }
    .detail-value { color: var(--brown-light); }

    .cost-section {
      margin-top: 24px;
      background: #fffbee;
      border-radius: 14px;
      padding: 18px 22px;
      border: 2px dashed #f5c518;
    }
    .cost-row {
      display: flex;
      justify-content: space-between;
      padding: 6px 0;
      font-size: 0.93rem;
    }
    .cost-row.indent {
      padding-left: 18px;
      color: var(--brown-light);
      font-size: 0.88rem;
    }
    .cost-row.total-akhir {
      font-family: 'Fredoka One', cursive;
      font-size: 1.2rem;
      color: var(--orange);
      border-top: 2px solid var(--yellow);
      margin-top: 10px;
      padding-top: 12px;
    }
    .tambahan-list {
      list-style: disc;
      padding-left: 22px;
      margin-top: 4px;
    }
    .tambahan-list li {
      font-size: 0.9rem;
      color: var(--brown-light);
      padding: 2px 0;
    }

    .btn-back {
      display: block;
      width: fit-content;
      margin: 28px auto 0;
      background: var(--yellow);
      color: var(--brown);
      font-family: 'Fredoka One', cursive;
      font-size: 1rem;
      padding: 12px 32px;
      border-radius: 30px;
      text-decoration: none;
      transition: background 0.2s, transform 0.15s;
      box-shadow: 0 4px 12px rgba(245,197,24,0.4);
      text-align: center;
    }
    .btn-back:hover {
      background: var(--yellow-dark);
      transform: translateY(-2px);
    }

    footer {
      background: var(--brown);
      color: rgba(255,255,255,0.6);
      text-align: center;
      padding: 18px;
      font-size: 0.85rem;
    }
    footer span { color: var(--yellow); }
  </style>
</head>
<body>

  <nav>
    <div class="nav-brand">🐱 AdopMeng</div>
    <ul class="nav-links">
      <li><a href="index.html">Tentang</a></li>
      <li><a href="index.html#meng-available">Meng Available</a></li>
      <li><a href="form.php">Adopsi</a></li>
    </ul>
  </nav>

  <div class="page-header">
    <h1>Ye! Adopsi Berhasil 🎉</h1>
  </div>

  <div class="result-container">

    <div class="notif">
      <img src="<?= $kucingImg ?>" alt="<?= $kucingNama ?>"/>
      <div class="notif-text">
        <strong>Mantap! <?= $nama ?> berhasil mengadopsi si <?= $kucingNama ?> 🐾</strong>
        <span>Terima kasih sudah memberikan rumah untuk meng!</span>
      </div>
    </div>

    <div class="detail-card">
      <h2>Detail Adopsi</h2>

      <div class="detail-row">
        <span class="detail-label">Nama</span>
        <span class="detail-value"><?= $nama ?></span>
      </div>
      <div class="detail-row">
        <span class="detail-label">Kucing</span>
        <span class="detail-value"><?= $kucingNama ?></span>
      </div>
      <div class="detail-row">
        <span class="detail-label">Alamat</span>
        <span class="detail-value"><?= htmlspecialchars($alamat) ?></span>
      </div>
      <div class="detail-row">
        <span class="detail-label">Payment</span>
        <span class="detail-value"><?= $payment ?></span>
      </div>

      <?php if (!empty($tambahanList)): ?>
      <div class="detail-row" style="flex-direction:column;">
        <span class="detail-label">Tambahan</span>
        <ul class="tambahan-list">
          <?php foreach ($tambahanList as $t): ?>
            <li><?= $t['nama'] ?> (<?= rupiah($t['harga']) ?>)</li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>

      <div class="cost-section">
        <div class="cost-row">
          <span>Harga Meng</span>
          <span><?= rupiah($kucingHarga) ?></span>
        </div>
        <?php if (!empty($tambahanList)): ?>
        <div class="cost-row">
          <span>Tambahan :</span>
        </div>
        <?php foreach ($tambahanList as $t): ?>
        <div class="cost-row indent">
          <span>• <?= $t['nama'] ?></span>
          <span>(<?= rupiah($t['harga']) ?>)</span>
        </div>
        <?php endforeach; ?>
        <div class="cost-row">
          <span>Total Tambahan</span>
          <span><?= rupiah($totalTambahan) ?></span>
        </div>
        <?php endif; ?>
        <div class="cost-row total-akhir">
          <span>🐾 Total Akhir</span>
          <span><?= rupiah($totalAkhir) ?></span>
        </div>
      </div>

      <a href="index.html" class="btn-back">← Kembali</a>
    </div>

  </div>

  <footer>
    &copy; 2025 <span>AdopMeng</span> – Semua meng layak dicintai 💛
  </footer>

</body>
</html>