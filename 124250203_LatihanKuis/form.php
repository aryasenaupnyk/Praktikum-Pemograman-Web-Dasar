<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form Adopsi – AdopMeng</title>
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
      transition: color 0.2s;
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
    .page-header p {
      color: rgba(255,255,255,0.8);
      margin-top: 6px;
    }

    .form-container {
      max-width: 680px;
      margin: 40px auto 60px;
      background: var(--white);
      border-radius: 20px;
      padding: 40px 44px;
      box-shadow: var(--shadow);
    }

    .form-group {
      margin-bottom: 22px;
    }
    .form-group label {
      display: block;
      font-weight: 700;
      font-size: 0.95rem;
      margin-bottom: 7px;
      color: var(--brown);
    }
    .form-group input[type="text"],
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 12px 16px;
      border: 2px solid #e8d8c4;
      border-radius: 12px;
      font-family: 'Nunito', sans-serif;
      font-size: 0.95rem;
      color: var(--brown);
      background: #fffdf7;
      transition: border-color 0.2s, box-shadow 0.2s;
      outline: none;
    }
    .form-group input[type="text"]:focus,
    .form-group textarea:focus,
    .form-group select:focus {
      border-color: var(--yellow);
      box-shadow: 0 0 0 3px rgba(245,197,24,0.2);
    }
    .form-group textarea {
      resize: vertical;
      min-height: 90px;
    }

    .checkbox-group {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .checkbox-item {
      display: flex;
      align-items: center;
      gap: 7px;
      background: #fff8e7;
      border: 2px solid #e8d8c4;
      border-radius: 30px;
      padding: 8px 16px;
      cursor: pointer;
      transition: border-color 0.2s, background 0.2s;
      font-size: 0.88rem;
      font-weight: 600;
    }
    .checkbox-item input[type="checkbox"] {
      accent-color: var(--yellow);
      width: 16px;
      height: 16px;
    }
    .checkbox-item:has(input:checked) {
      border-color: var(--yellow);
      background: #fff3c0;
    }

    .divider {
      border: none;
      border-top: 2px dashed #e8d8c4;
      margin: 28px 0;
    }

    .btn-submit {
      width: 100%;
      background: var(--yellow);
      color: var(--brown);
      font-family: 'Fredoka One', cursive;
      font-size: 1.1rem;
      padding: 14px;
      border: none;
      border-radius: 14px;
      cursor: pointer;
      letter-spacing: 0.5px;
      transition: background 0.2s, transform 0.15s;
      box-shadow: 0 4px 14px rgba(245,197,24,0.4);
      margin-top: 8px;
    }
    .btn-submit:hover {
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
    <h1>Adopsi Meng</h1>
    <p>Saatnya membawa anak bulu untuk menghiburmu!</p>
  </div>

  <div class="form-container">
    <form action="hasil.php" method="GET">

      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap anda" required />
      </div>

      <div class="form-group">
        <label for="kucing">Kucing Pilihan</label>
        <select id="kucing" name="kucing" required>
          <option value="" disabled selected>Meng Available</option>
          <option value="Joko|3000000">Joko (Rp 3.000.000)</option>
          <option value="Juminten|5000000">Juminten (Rp 5.000.000)</option>
          <option value="Iput|4000000">Iput (Rp 4.000.000)</option>
          <option value="Nyimeng|1500000">Nyimeng (Rp 1.500.000)</option>
          <option value="Sukijat|2000000">Sukijat (Rp 2.000.000)</option>
          <option value="Kurniawan|3500000">Kurniawan (Rp 3.500.000)</option>
        </select>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat Rumah</label>
        <textarea id="alamat" name="alamat" placeholder="Tulis Alamat Rumah Anda" required></textarea>
      </div>

      <div class="form-group">
        <label>Tambahan untuk meng</label>
        <div class="checkbox-group">
          <label class="checkbox-item">
            <input type="checkbox" name="tambahan[]" value="Vaksin|600000" />
            Vaksin (600k)
          </label>
          <label class="checkbox-item">
            <input type="checkbox" name="tambahan[]" value="Baju dan Aksesoris|200000" />
            Baju dan Aksesoris (200k)
          </label>
          <label class="checkbox-item">
            <input type="checkbox" name="tambahan[]" value="Snack|100000" />
            Snack (100k)
          </label>
          <label class="checkbox-item">
            <input type="checkbox" name="tambahan[]" value="Kandang Kucing|1000000" />
            Kandang Kucing (1000k)
          </label>
        </div>
      </div>

      <div class="form-group">
        <label for="payment">Metode Pembayaran</label>
        <select id="payment" name="payment" required>
          <option value="" disabled selected>Pilih metode</option>
          <option value="QRIS">QRIS</option>
          <option value="Dana">Dana</option>
          <option value="GoPay">GoPay</option>
          <option value="OVO">OVO</option>
        </select>
      </div>

      <hr class="divider" />

      <button type="submit" class="btn-submit">🐾 Adopsi Sekarang</button>
    </form>
  </div>

  <footer>
    &copy; 2025 <span>AdopMeng</span> – Semua meng layak dicintai 💛
  </footer>

</body>
</html>