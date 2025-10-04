 <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin PKL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* CSS Reset dan Pengaturan Dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            background-color: #f4f7fc;
        }

        /* --- Sidebar (Menu Kiri) --- */
        .sidebar {
            width: 260px;
            background-color: #1a73e8;
            color: white;
            height: 100vh;
            padding: 20px;
            position: sticky;
            top: 0;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            color: #d4e3ff;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar ul li a i {
            margin-right: 15px;
            width: 20px;
            text-align: center;
        }
        
        /* Memberi highlight pada menu yang aktif */
        .sidebar ul li.active a,
        .sidebar ul li a:hover {
            background-color: #ffffff;
            color: #1a73e8;
        }

        /* --- Konten Utama (Bagian Kanan) --- */
        .main-content {
            flex-grow: 1; /* Mengambil sisa ruang */
        }
        
        .header {
            background-color: #ffffff;
            padding: 15px 30px;
            border-bottom: 1px solid #e0e0e0;
            width: 100%;
            height: 69px;
            background-color:#343a40;
        }

        .content-body {
            padding: 30px;
        }

        .content-body h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 25px;
        }

        /* --- Card Statistik --- */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 kolom dengan lebar sama */
            gap: 25px;
            margin-bottom: 30px;
        }

        .card {
            color: white;
            padding: 25px;
            border-radius: 10px;
            display: flex;
            align-items: center;
        }
        
        .card i {
            font-size: 3em;
            opacity: 0.7;
        }
        
        .card .card-content {
            margin-left: 20px;
        }

        .card .card-title {
            font-size: 16px;
            font-weight: 500;
        }

        .card .card-value {
            font-size: 2.2em;
            font-weight: 700;
        }
        
        /* Warna untuk setiap card */
        .card.blue { background-color: #1a73e8; }
        .card.green { background-color: #28a745; }
        .card.yellow { background-color: #ffc107; }
        .card.red { background-color: #dc3545; }
        .card.purple { background-color: #6f42c1; }
        
        /* --- Tabel Daftar Mahasiswa --- */
        .recent-list {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        .recent-list h2 {
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }
        
        thead th {
            color: #888;
            font-weight: 600;
            font-size: 14px;
        }
        
        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody td {
            color: #555;
            font-size: 15px;
        }

        /* --- Label Status --- */
        .status {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
        }
        
        /* Warna untuk setiap status */
        .status.menunggu { background-color: #fff0c2; color: #f39c12; }
        .status.diterima { background-color: #d4edda; color: #28a745; }
        .status.berjalan { background-color: #d1e7fd; color: #1a73e8; }
        .status.ditolak { background-color: #f2f2f2; color: #888; }

    </style>
</head>
<body>
    <nav class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li class="active"><a href="{{ route('admin.page') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('prodi.index') }}"><i class="fas fa-file-alt"></i> Data Prodi</a></li>
            <li><a href="{{ route('datamitra') }}"><i class="fas fa-building"></i> Data Perusahaan Mitra</a></li>
            <li><a href="{{ route('datadokumen') }}"><i class="fas fa-file-alt"></i> Data Dokumen</a></li>
            <li><a href="{{ route('jadwal-seminar.index') }}"><i class="fas fa-calendar-check"></i> Jadwal Seminar</a></li>
            <li><a href="{{ route('jadwal-bimbingan.index') }}"><i class="fas fa-calendar-alt"></i> Jadwal Bimbingan</a></li>
            <li><a href="{{ route('datadospem') }}"><i class="fas fa-users"></i> Data Pembimbing</a></li>
            <li><a href="{{ route('datamhs') }}"><i class="fas fa-user-graduate"></i> Data Mahasiswa</a></li>
            
    </nav>

    <main class="main-content">
        <header class="header"></header>
        
        <div class="content-body">
            <h1>Dashboard Admin PKL</h1>

            <div class="stats-cards">
                <div class="card blue">
                    <i class="fas fa-users"></i>
                    <div class="card-content">
                        <div class="card-title">Total Mahasiswa PKL</div>
                        <div class="card-value">450</div>
                    </div>
                </div>
                <div class="card green">
                    <i class="fas fa-check-circle"></i>
                    <div class="card-content">
                        <div class="card-title">Selesai PKL</div>
                        <div class="card-value">320</div>
                    </div>
                </div>
                <div class="card yellow">
                    <i class="fas fa-spinner"></i>
                    <div class="card-content">
                        <div class="card-title">Sedang Berjalan</div>
                        <div class="card-value">100</div>
                    </div>
                </div>
                <div class="card red">
                    <i class="fas fa-hourglass-start"></i>
                    <div class="card-content">
                        <div class="card-title">Laporan Menunggu</div>
                        <div class="card-value">{{ $pendingReports ?? 0 }}</div>
                    </div>
                </div>
                <div class="card purple">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <div class="card-content">
                        <div class="card-title">Total Dosen</div>
                        <div class="card-value">{{ $totalDosen ?? 0 }}</div>
                    </div>
                </div>
            </div>

            <div class="recent-list">
                <h2>Daftar Mahasiswa Terbaru</h2>
                <table>
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Perusahaan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2401301010</td>
                            <td>Rina Febriani</td>
                            <td>PT. Inovasi Digital</td>
                            <td>01 September 2025</td>
                            <td><span class="status menunggu">Menunggu</span></td>
                        </tr>
                        <tr>
                            <td>2401301011</td>
                            <td>Bambang Wijaya</td>
                            <td>CV. Solusi Tepat Guna</td>
                            <td>02 September 2025</td>
                            <td><span class="status diterima">Diterima</span></td>
                        </tr>
                        <tr>
                            <td>2401301012</td>
                            <td>Citra Lestari</td>
                            <td>PT. Teknologi Maju</td>
                            <td>03 September 2025</td>
                            <td><span class="status berjalan">Berjalan</span></td>
                        </tr>
                        <tr>
                            <td>2401301013</td>
                            <td>Dedi Hidayat</td>
                            <td>PT. Inovasi Digital</td>
                            <td>04 September 2025</td>
                            <td><span class="status ditolak">Ditolak</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>