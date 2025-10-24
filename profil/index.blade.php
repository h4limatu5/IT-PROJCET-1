<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary: #0d6efd;
            --secondary-color: #7cb5e6;
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

        body {
            font-family: var(--ff);
            background-color: #f6f9ff;
            color: var(--dark);
        }

        a { color: inherit; text-decoration: none; }

        .container {
            max-width: var(--max);
            margin: 24px auto;
            padding: 0 24px;
        }

        /* Header */
        header {
            background: var(--card);
            position: sticky;
            top: 0;
            z-index: 99;
            border-bottom: 1px solid #eee;
            margin-bottom: 24px;
        }
        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 24px;
            max-width: var(--max);
            margin: 0 auto;
        }
        .brand .logo {
            font-weight: 700;
            color: var(--primary);
            font-size: 20px;
        }
        nav a { margin-left: 18px; color: var(--muted); font-weight: 500; }
        nav a:hover, nav a.active { color: var(--primary); }

        /* Grid */
        .grid-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 24px;
            align-items: flex-start;
        }

        /* Card */
        .card {
            background-color: var(--card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid #f1f5f9;
            padding: 24px;
            margin-bottom: 24px;
        }
        .card-header {
            padding-bottom: 16px;
            margin-bottom: 16px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 18px;
            font-weight: 600;
        }

        /* Button */
        .btn {
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: 600;
            border: 1px solid transparent;
            cursor: pointer;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
        }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { opacity: 0.9; }

        /* Sidebar */
        .profile-sidebar .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 16px;
            background-color: #eef2ff;
            border: 4px solid #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            display: block;
            object-fit: cover;
        }
        .profile-sidebar h2 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 4px;
        }
        .profile-sidebar .program-studi {
            text-align: center;
            color: var(--muted);
            font-size: 15px;
            margin-bottom: 20px;
        }
        .profile-info { list-style: none; padding: 0; }
        .profile-info li {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            color: var(--muted);
            font-size: 14px;
        }
        .profile-info i { width: 16px; text-align: center; }

        /* Status */
        .status-badge {
            padding: 6px 14px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 16px;
        }
        .status-badge.diterima { background-color: #dcfce7; color: #166534; }

        /* Detail List */
        .detail-list { list-style: none; padding: 0; }
        .detail-list li {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Dokumen */
        .document-list { list-style: none; padding: 0; }
        .document-list li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 8px;
            border-radius: 8px;
            transition: background-color 0.2s ease;
        }
        .document-list li:hover { background-color: #f6f9ff; }

        @media (max-width: 900px) {
            .grid-container { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>
    <header>
        <div class="nav">
            <a href="#" class="brand">
                <div class="logo">POLITEKNIK NEGERI TANAH LAUT</div>
            </a>
            <nav>
                <a href="{{ route('dashboardmhs') }}">Beranda</a>
                <a href="{{ route('profil.index') }}" class="active">Profil</a>
                <a href="{{ route('perusahaan') }}">Perusahaan</a>
                <a href="{{ route('jadwal') }}">Jadwal Seminar</a>
                <a href="{{ route('bimbingan.index') }}">Jadwal Bimbingan</a>
                <form action="#" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer; font-weight: 500;">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="grid-container">

            <!-- Sidebar Profil -->
            <aside class="profile-sidebar">
                <div class="card">
                    <img src="{{ $mahasiswa->foto ? asset('storage/profile_photos/'.$mahasiswa->foto) : asset('carlos.jpg') }}" alt="Foto Profil" class="profile-pic">

                    @if(isset($mahasiswa))
    <h2>{{ $mahasiswa->name ?? $mahasiswa->nama ?? 'Nama tidak tersedia' }}</h2>
    <p class="program-studi">{{ $mahasiswa->program_studi ?? '-' }}</p>
    <ul class="profile-info">
        <li><i class="fa-solid fa-id-card"></i> NIM: {{ $mahasiswa->nim }}</li>
        <li><i class="fa-solid fa-envelope"></i> {{ $mahasiswa->email ?? '-' }}</li>
        <li><i class="fa-solid fa-phone"></i> {{ $mahasiswa->phone ?? $mahasiswa->no_hp ?? '-' }}</li>
        <li><i class="fa-solid fa-id-card"></i> ID: {{ $mahasiswa->id }}</li>
    </ul>
@else
    <p>Data mahasiswa tidak ditemukan.</p>
@endif
                        <!-- resources/views/profil-edit.blade.php -->
                        <a href={{ route('profil.edit') }} class="btn btn-primary">
                            <i class="fa-solid fa-pencil"></i> Edit Profil
                        </a>
                </div>

                <div class="card">
                    <div class="card-header">Informasi Akademik</div>
                    <ul class="detail-list">
                        <li><span>IPK</span><span>3.85</span></li>
                        <li><span>SKS Ditempuh</span><span>80</span></li>
                        <li><span>Dosen Pembimbing</span><span>Dr. Indah Lestari, M.Kom</span></li>
                    </ul>
                </div>
            </aside>

            <!-- Konten Utama -->
            <section class="main-content">
                <div class="card">
                    <div class="card-header">Status PKL</div>
                    <div class="status-badge diterima">
                        <i class="fa-solid fa-circle-check"></i> Diterima
                    </div>
                    <ul class="detail-list">
                        <li><span>Perusahaan</span><span>PT. Arutmin Indonesia</span></li>
                        <li><span>Posisi</span><span>IT Support Intern</span></li>
                        <li><span>Dosen Pembimbing</span><span>Rahmat Hidayat, S.Kom, M.T.</span></li>
                        <li><span>Periode</span><span>1 Agu 2025 - 31 Okt 2025</span></li>
                    </ul>
                    <hr style="margin: 20px 0;">
                    <a href="{{ route('bimbingan.index') }}" class="btn btn-primary"
                       style="background-color: var(--success); width: 100%; display: inline-flex; align-items: center; justify-content: center; gap: 8px; font-weight: 600;">
                        <i class="fa-solid fa-book-open"></i>
                        Lihat Bimbingan
                    </a>
                </div>

                <div class="card">
                    <div class="card-header">Dokumen Persyaratan</div>
                    <ul class="document-list">
                        <li>
                            <div class="document-info">
                                <i class="fa-solid fa-circle-check" style="color: var(--success);"></i>
                                <span>CV (Curriculum Vitae)</span>
                            </div>
                            <a href="#">Lihat</a>
                        </li>
                        <li>
                            <div class="document-info">
                                <i class="fa-solid fa-circle-check" style="color: var(--success);"></i>
                                <span>Transkrip Nilai Terakhir</span>
                            </div>
                            <a href="#">Lihat</a>
                        </li>
                        <li>
                            <div class="document-info">
                                <i class="fa-solid fa-clock" style="color: var(--warning);"></i>
                                <span>Surat Permohonan PKL</span>
                            </div>
                            <a href="#">Tinjau</a>
                        </li>
                        <li>
                            <div class="document-info">
                                <i class="fa-solid fa-circle-xmark" style="color: var(--danger);"></i>
                                <span>Proposal PKL</span>
                            </div>
                            <a href="#">Upload</a>
                        </li>
                    </ul>
                </div>

                <a href="{{ route('dashboardmhs') }}" class="btn btn-primary" style="background-color: var(--secondary-color); color: white; font-weight: 500;">
                    <i class="fa-solid fa-arrow-right"></i> Masuk Ke Dashboard
                </a>
            </section>
        </div>
    </main>
</body>
</html>
