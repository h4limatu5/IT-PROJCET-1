<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Mahasiswa - Sistem Informasi PKL</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <style>
    :root {
      --primary: #0d6efd;
      --success: #198754;
      --warning: #ffc107;
      --danger: #dc3545;
      --dark: #212529;
      --muted: #6c757d;
      --light: #f8f9fa;
      --card: #ffffff;
      --radius: 12px;
      --shadow: 0 8px 24px rgba(16, 24, 40, 0.06);
      --max: 1200px;
      --ff: 'Poppins', sans-serif;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: var(--ff); background-color: #f6f9ff; color: var(--dark); }
    a { color: inherit; text-decoration: none; }

    .container { max-width: var(--max); margin: 24px auto; padding: 0 24px; }

    /* Header & Navigasi */
    header { background: var(--card); position: sticky; top: 0; z-index: 99; border-bottom: 1px solid #eee; }
    .nav { display: flex; align-items: center; justify-content: space-between; padding: 14px 24px; max-width: var(--max); margin: 0 auto; }
    .brand .logo { font-weight: 700; color: var(--primary); font-size: 20px; }
    nav a { margin-left: 18px; color: var(--muted); font-weight: 500; }
    nav a:hover, nav a.active { color: var(--primary); }

    /* Layout Dashboard */
    .dashboard-grid {
      display: grid;
      grid-template-columns: 1fr 320px;
      gap: 24px;
    }

    /* Kartu (Card) */
    .card { background-color: var(--card); border-radius: var(--radius); box-shadow: var(--shadow); border: 1px solid #f1f5f9; padding: 24px; }
    .card-header { font-size: 18px; font-weight: 600; padding-bottom: 12px; margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; }
    .card-header i { color: var(--primary); margin-right: 8px; }

    /* Header Sambutan */
    .welcome-header { margin-bottom: 24px; }
    .welcome-header h1 { font-size: 28px; font-weight: 700; }
    .welcome-header p { color: var(--muted); font-size: 16px; }

    /* Pelacak Kemajuan (Progress Tracker) */
    .progress-tracker { display: flex; justify-content: space-between; list-style: none; }
    .step { text-align: center; flex: 1; position: relative; }
    .step-icon { width: 48px; height: 48px; border-radius: 50%; background-color: #e9ecef; color: var(--muted); display: grid; place-items: center; margin: 0 auto 10px; font-size: 20px; border: 3px solid #e9ecef; }
    .step-label { font-weight: 600; font-size: 13px; }
    .step.completed .step-icon { background-color: #dcfce7; border-color: var(--success); color: var(--success); }
    .step.active .step-icon { background-color: #e0eaff; border-color: var(--primary); color: var(--primary); }
    .step:not(:last-child)::after { content: ''; position: absolute; top: 24px; left: 50%; width: 100%; height: 4px; background-color: #e9ecef; transform: translateX(50%); z-index: -1; }
    .step.completed:not(:last-child)::after { background-color: var(--success); }

    /* Kartu Sidebar */
    .info-list { list-style: none; }
    .info-list li { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #f1f5f9; }
    .info-list li:last-child { border: none; }
    .info-list .label { color: var(--muted); }
    .info-list .value { font-weight: 600; }
    .status-tag { padding: 4px 10px; border-radius: 999px; font-weight: 600; font-size: 12px; }
    .status-diterima { background-color: #dcfce7; color: #166534; }

    .quick-actions .btn { display: block; width: 100%; margin-bottom: 12px; text-align: center; justify-content: center; }
    .quick-actions .btn:last-child { margin: 0; }
    .btn-outline { background-color: transparent; border: 1px solid #e5e7eb; color: var(--dark); }
    .btn-outline:hover { background-color: var(--light); }

    /* Tugas & Laporan */
    .task-list-item { display: flex; align-items: center; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #f1f5f9; }
    .task-list-item:last-child { border-bottom: none; }
    .task-info strong { display: block; font-size: 15px; }
    .task-info span { font-size: 13px; color: var(--muted); }
    .badge-danger { background-color: #fee2e2; color: #991b1b; }


    /* Responsif */
    @media (max-width: 992px) {
      .dashboard-grid { grid-template-columns: 1fr; }
      .welcome-header h1 { font-size: 24px; }
    }
    @media (max-width: 576px) {
      .step-label { font-size: 11px; }
      .step-icon { width: 40px; height: 40px; font-size: 16px; }
      .step:not(:last-child)::after { top: 20px; }
      nav { display: none; } /* Contoh menyembunyikan nav di mobile */
    }
  </style>
</head>
<body>

  <header>
    <div class="nav">
      <a href="#" class="brand"><div class="logo">SISTEM INFORMASI PKL</div></a>
      <nav>
        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('profil') }}" class="active">Profil</a>
        <a href="{{ route('perusahaan') }}">Perusahaan</a>
         <a href="{{ route('laporan.index') }}">Laporan</a>
        <a href="{{ route('jadwal') }}">Jadwal</a>
        <a href="{{ route('logout') }}" >Logout</a>
      </nav>
    </div>
  </header>

  <main class="container">
    
    <div class="welcome-header">
      <h1>Selamat Datang, Ahmad Fikri!</h1>
      <p>Ini adalah halaman utama untuk memantau kemajuan PKL Anda.</p>
    </div>

    <div class="dashboard-grid">
      
      <div class="main-content">
        <div class="card">
          <div class="card-header"><i class="fa-solid fa-bars-progress"></i>Kemajuan PKL Anda</div>
          <ul class="progress-tracker">
            <li class="step completed">
              <div class="step-icon"><i class="fa-solid fa-check"></i></div>
              <div class="step-label">Pendaftaran</div>
            </li>
            <li class="step active">
              <div class="step-icon"><i class="fa-solid fa-person-running"></i></div>
              <div class="step-label">Pelaksanaan</div>
            </li>
            <li class="step">
              <div class="step-icon"><i class="fa-solid fa-file-lines"></i></div>
              <div class="step-label">Bimbingan</div>
            </li>
            <li class="step">
              <div class="step-icon"><i class="fa-solid fa-flag-checkered"></i></div>
              <div class="step-label">Selesai</div>
            </li>
          </ul>
        </div>
        
        <div class="card">
          <div class="card-header"><i class="fa-solid fa-list-check"></i>Tugas & Tenggat Waktu</div>
          <div class="task-list">
            <div class="task-list-item">
              <div class="task-info">
                <strong>Laporan Akhir PKL</strong>
                <span>Tenggat: 30 November 2025</span>
              </div>
              <span class="badge badge-danger">Belum Diunggah</span>
            </div>
            <div class="task-list-item">
              <div class="task-info">
                <strong>Logbook Mingguan (Minggu 3)</strong>
                <span>Tenggat: 28 September 2025</span>
              </div>
              <a href="{{ route('logbook-harian.index') }}" class="btn btn-primary btn-sm">Upload Sekarang</a>
            </div>
          </div>
        </div>
      </div>

      <aside class="sidebar">
        <div class="card">
          <ul class="info-list">
            <li>
              <span class="label">Nama</span>
              <span class="value">Ahmad Fikri</span>
            </li>
            <li>
              <span class="label">NIM</span>
              <span class="value">241735176598</span>
            </li>
            <li>
              <span class="label">Status</span>
              <span class="status-tag status-diterima">Diterima</span>
            </li>
            <li>
              <span class="label">Perusahaan</span>
              <span class="value">PT. Arutmin</span>
            </li>
            <li>
              <span class="label">Dosen Pembimbing</span>
              <span class="value">Dr. Anisa P.</span>
            </li>
             <li>
              <span class="label">Periode PKL</span>
              <span class="value">1 Sep - 30 Nov 2025</span>
            </li>
          </ul>
        </div>
        
        <div class="card quick-actions">
           <a href="{{ route('logbook-harian.index') }}" class="btn btn-primary"><i class="fa-solid fa-book-open"></i> Isi Logbook Harian</a>
           <a href="{{ route('datamitra') }}" class="btn btn-outline"><i class="fa-solid fa-building"></i> Lihat Info Perusahaan</a>
        </div>
      </aside>

    </div>
  </main>

</body>
</html>
