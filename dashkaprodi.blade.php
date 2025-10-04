<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kaprodi PKL</title>
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
            grid-template-columns: repeat(4, 1fr); /* 4 kolom dengan lebar sama */
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

        /* --- Tabel Daftar Prodi --- */
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

        /* --- Button --- */
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <h2>Dashboard Kaprodi</h2>
        <ul>
            <li class="active"><a href="{{ route('kaprodi.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('prodi.index') }}"><i class="fas fa-graduation-cap"></i> Kelola Prodi</a></li>
            <li><a href="#"><i class="fas fa-user-graduate"></i> Data Mahasiswa</a></li>
            <li><a href="#"><i class="fas fa-calendar-alt"></i> Jadwal PKL</a></li>
            <li><a href="#"><i class="fas fa-calendar-check"></i> Jadwal Seminar</a></li>
            <li><a href="#"><i class="fas fa-calendar-alt"></i> Jadwal Bimbingan</a></li>
            <li><a href="{{ route('kaprodi.validasi-dokumen.index') }}"><i class="fas fa-file-alt"></i> Validasi Dokumen</a></li>
        </ul>
    </nav>

    <main class="main-content">
        <header class="header"></header>

        <div class="content-body">
            <h1>Dashboard Kaprodi PKL</h1>

            <div class="stats-cards">
                <div class="card blue">
                    <i class="fas fa-graduation-cap"></i>
                    <div class="card-content">
                        <div class="card-title">Total Prodi</div>
                        <div class="card-value">{{ $prodis->count() }}</div>
                    </div>
                </div>
                <div class="card green">
                    <i class="fas fa-users"></i>
                    <div class="card-content">
                        <div class="card-title">Total Mahasiswa</div>
                        <div class="card-value">{{ \App\Models\Mahasiswa::count() }}</div>
                    </div>
                </div>
                <div class="card yellow">
                    <i class="fas fa-file-alt"></i>
                    <div class="card-content">
                        <div class="card-title">Dokumen Validasi</div>
                        <div class="card-value">{{ \App\Models\ValidasiDokumen::count() }}</div>
                    </div>
                </div>
                <div class="card red">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="card-content">
                        <div class="card-title">Jadwal PKL</div>
                        <div class="card-value">{{ \App\Models\JadwalPkl::count() }}</div>
                    </div>
                </div>
            </div>

            <div class="recent-list">
                <h2>Daftar Prodi</h2>
                <a href="{{ route('prodi.create') }}" class="btn btn-primary">Tambah Prodi</a>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Prodi</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prodis as $prodi)
                        <tr>
                            <td>{{ $prodi->nama }}</td>
                            <td>
                                @if($prodi->foto)
                                    <img src="{{ asset('storage/' . $prodi->foto) }}" alt="Foto Prodi" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('prodi.show', $prodi) }}" class="btn btn-primary">Lihat</a>
                                <a href="{{ route('prodi.edit', $prodi) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('prodi.destroy', $prodi) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus prodi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Belum ada data prodi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>
